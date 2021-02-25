<?php
  session_start();

  if(!isset($_SESSION['islogin']) && $_SESSION['islogin'] != true){
      header("Location: ../login.php");
  }  
  require_once('../connection.php');

  $query = "select * from tb_categories";
  $result = $conn->query($query) or die($conn->error);

  $category = array();
  while ($row = $result->fetch_assoc()) {
    # code...
    $category[]= $row;
  }   

  ?>
<!DOCTYPE html>
<html lang="en">

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

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <?php require_once('menu.php'); ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
         
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
              <?php 
              if(count($_SESSION['permission'])!=0){
              
              for ($i=0; $i < count($_SESSION['permission']); $i++) { 
               
               if(!empty(array_search("insertUser", $_SESSION['permission'][$i]))){ 
                
                ?>
                <a href="permission_add.php" class="btn btn-primary">Create</a>
                <?php break;}
              }
              } ?>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Name</th>  
                      <th>Description</th> 
                                    
                      <th>Action</th>            
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>                      
                      <th>ID</th>
                      <th>Name</th>  
                      <th>Description</th> 
                                    
                      <th>Action</th>            
                    </tr>
                  </tfoot>
                  <tbody>
        <?php 
            foreach ($category as $key) {
              # code...
            
         ?>
        <tr>
          <td><?=$key['categoryID']?></td>
          <td><?=$key['categoryName']?></td>  
          <td><?=$key['categoryDescription']?></td>       
           
          <td>
            <?php 
              if(count($_SESSION['permission'])!=0){              
              for ($i=0; $i < count($_SESSION['permission']); $i++) {                
                if(!empty(array_search("updateCategory", $_SESSION['permission'][$i]))){                 
                ?>
                  <a href="category_edit.php?id=<?=$key['categoryID']?>" type="button" class="btn btn-success">Sửa</a>
                <?php break;}
              }}?>
            <?php 
              if(count($_SESSION['permission'])!=0){
              for ($i=0; $i < count($_SESSION['permission']); $i++) { 
               if(!empty(array_search("deleteCategory", $_SESSION['permission'][$i]))){ 
                ?>
                  <a href="category_del_action.php?id=<?=$key['categoryID']?>" type="button" class="btn btn-danger">Xóa</a>
            <?php break;}
            }
          } ?>
          </td>
        </tr>
      <?php } ?>
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
