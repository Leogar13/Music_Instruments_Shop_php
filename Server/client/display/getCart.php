<?php  
  // session_start();
  header("Access-Control-Allow-Origin: http://localhost:8080");
// header("Access-Control-Allow-Origin: *");
  // header("Content-Type: application/json; charset=UTF-8");
  // header("Access-Control-Allow-Credentials: true");
  // header("Access-Control-Allow-Methods: POST");
  // header('Access-Control-Allow-Headers: X-Requested-With');
  // header("Access-Control-Max-Age: 3600");
  // header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
  // if(!isset($_SESSION['islogin']) && $_SESSION['islogin'] != true){
  //     header("Location: ../login.php");
  // }  
  
  // header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: POST");
// header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
  require_once('../connection.php');

  $data = json_decode(file_get_contents('php://input'), true);
  echo json_encode($data);
  // die();
  // $query = "select * from tb_products limit 9";
  // $result = $conn->query($query) or die($conn->error);


  // $author = array();
  // while ($row = $result->fetch_assoc()) {
  //   # code...
  //   $author[]= $row;
  // }   

  // $result->close();
  
  // echo json_encode($author);
  ?>
