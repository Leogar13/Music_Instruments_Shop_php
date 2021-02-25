<?php  
  // session_start();
  header("Access-Control-Allow-Origin: http://localhost:8080");
  header("Content-Type: application/json; charset=UTF-8");
  header("Access-Control-Allow-Credentials: true");
  header("Access-Control-Allow-Methods: GET");
  header('Access-Control-Allow-Headers: X-Requested-With');
  header("Access-Control-Max-Age: 3600");
  header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
  // if(!isset($_SESSION['islogin']) && $_SESSION['islogin'] != true){
  //     header("Location: ../login.php");
  // }  
  
  require_once('../connection.php');

  $query = "SELECT a.*, b.imageAddress FROM tb_products a LEFT JOIN (SELECT * from tb_imageaddress) b ON a.productID = b.productID where a.categoryID = 3 limit 9";
  $result = $conn->query($query) or die($conn->error);


  $author = array();
  while ($row = $result->fetch_assoc()) {
    # code...
    $author[]= $row;
  }   

  $result->close();
  
  echo json_encode($author);
  ?>
