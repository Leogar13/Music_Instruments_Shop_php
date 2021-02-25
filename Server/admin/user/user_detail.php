<?php  
  session_start();

  if(!isset($_SESSION['islogin']) && $_SESSION['islogin'] != true){
      header("Location: ../login.php");
  }  
  require_once('../connection.php');

  $id = $_GET['id'];

  $query = "select * from tb_staff where staffid=".$id;
  $result = $conn->query($query) or die($conn->error);

  
  $detail = $result->fetch_assoc();

  //get roles of user
  $query = "select b.groupName from tb_group b inner join (select * from tb_staffGroup where staffId=".$id.") a on b.groupID = a.groupID";
  $result = $conn->query($query) or die($conn->error);  

  $roles = array();

  while ($row = $result->fetch_assoc()) {
    # code..
    $roles[]=$row;
  }

  ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>BTL</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
</head>
<body>

    <div class="container">
      
  <table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">Detail</th>
      <th scope="col">Value</th>      
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">Name</th>
      <td><p><?=$detail['staffName']?></p> </td>
    </tr>
    <tr>
      <th scope="row">User Name</th>
      <td><p><?=$detail['staffEmail']?></p> </td>
    </tr>
    <tr>
      <th scope="row">Created By</th>
      <td><p><?php
            $query = "SELECT name 
            from users 
            where id =".$detail['createdBy'];
            $result = $conn->query($query)->fetch_assoc() or die($conn->error);
            print_r($result['name']);
            
            ?></p> </td>
    </tr>
    <tr>
      <th scope="row">Address</th>
      <td><p><?=$detail['address']?></p> </td>
    </tr>
    
  </tbody>
</table>
    <ul class="list-group">
  <li class="list-group-item"><strong><p align="center">List of Roles</p></strong></li>
  
  <?php 
      foreach ($roles as $key => $value) {
        ?>
          <li class="list-group-item"><p align="center"><?=$value['name']?></p></li>
        <?php 
      }
   ?>
  
</ul>
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