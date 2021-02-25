<?php 
 
    session_start();

    if(!isset($_SESSION['islogin']) && $_SESSION['islogin'] != true){
      header("Location: ../login.php");
    }  

	require_once('../../connection.php');
	$tittle = $_POST['tittle'];
	$description = $_POST['description'];
	$query = "Insert into categories(tittle, description) values ('".$tittle."','" .$description. "');";
	$status = $conn->query($query);
	if($status == true){
		setcookie('msg', 'Thêm mới thành công!', time()+5);
		header('Location: categories.php');
	}else{
		setcookie('msg', 'Thêm mới không thành công!', time()+5);
		header('Location: category_add.php');
	}
		
 ?>