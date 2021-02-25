<?php 
	session_start();

  if(!isset($_SESSION['islogin']) && $_SESSION['islogin'] != true){
      header("Location: ../login.php");
  }  
  $checkpermission = 0;
    if (count($_SESSION['permission']) > 0) {
        for ($i=0; $i < count($_SESSION['permission']); $i++) { 
            if(empty(array_search("selectPermissionRole", $_SESSION['permission'][$i] ))){   
                continue;
            }
            else{
                $checkpermission = 1;
            }

        }    
    }
    
    if ($checkpermission ==0) {
        header("Location: ../index.php");
    }

   	require_once('../connection.php');
	$id = $_GET['id'];


	$query = "select groupName from tb_group where groupid =".$id;
	$role = $conn->query($query)->fetch_assoc() or die($conn->error);

	$query = "select COUNT(permissionid) as total from tb_permissions";
	$totalPermission = $conn->query($query)->fetch_assoc() or die($conn->error);

	$query = "Select * from tb_permissions";
	$result = $conn->query($query) or die($conn->error);
	$list_full = array();
  	while ($row = $result->fetch_assoc()) {
    # code...
    	$list_full[]= $row;
 	 }  	

	$query = "select * from tb_permissionsstaffgroup where groupid =".$id;

	$result = $conn->query($query) or die($conn->error);

	$list_had = array();
  	while ($row = $result->fetch_assoc()) {
    # code...
    	$list_had[]= $row;
 	 }   

 ?>
<!DOCTYPE html>
<html>
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin 2 - Tables</title>

  <!-- Custom fonts for this template -->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="../css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>
<body id="page-top">
<form action="role_permission_update.php?id=<?=$id?>&total=<?=$totalPermission['total']?>" method="POST" role="form" enctype="multipart/form-data">
  <!-- Page Wrapper -->
  <div id="wrapper">
  	<?php require_once('menu.php'); ?>
	


  	<div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">
      	<h1>Role : <?= $role['groupName'] ?></h1>
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
         
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Permission Name</th>
                      <th>CheckBox</th>                                  
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>                      
                      <th>ID</th>
                      <th>Permission Name</th>
                      <th>CheckBox</th>                
                    </tr>
                  </tfoot>
                  <tbody>
                  	
                  	<?php
                  		$runcount = 0;
                  		foreach ($list_full as $value) {
        		
        	 		?>
        			<tr>
                <td><label><?=$value['permissionID']?></label></td>
		          <td>
		            <input type="hidden" name="id_<?=$value['permissionID']?>" value="<?=$value['permissionID']?>">
		            <div class="form-group">
		            <label><?=$value['permissionDetail']?></label>		              
		                
		            </div>            
		            
	        		</td>
			          <td>
			          	<input onclick="$(this).attr('value', this.checked ? <?=$value['permissionID']?> : 0)" type="CheckBox" name="box_<?=$runcount?>" <?php 
			          		$out = "value = 0";
			          		foreach ($list_had as $key) {
			          			if ($key['permissionID'] == $value['permissionID']) {			          				
			          				$out = "value =".$value['permissionID']." checked";
			          				break;
			          			}
			          			else{
			          				continue;
			          			}
			          		}
			          		echo $out;

			          	 ?> >
			          </td>        
        			</tr>
        			<?php 
        			$runcount++;
        				} ?>	
        			<button type="submit" class="btn btn-primary">Update</button>
                  	
                  	
        
        
      			</tbody>
                </table>
              </div>
            </div>
         
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
</form>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>
  </div>
	

	  <!-- Bootstrap core JavaScript-->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="../js/demo/datatables-demo.js"></script>

</body>

</html>