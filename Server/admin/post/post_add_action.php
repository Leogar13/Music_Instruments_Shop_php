<?php 
	  session_start();

    if(!isset($_SESSION['islogin']) && $_SESSION['islogin'] != true){
      header("Location: ../login.php");
    }  
	require_once('../../connection.php');
	date_default_timezone_set('Asia/Ho_Chi_Minh');
	
	$target_dir = "../../img/";
	$thumbnail = "";

	$target_file = $target_dir.basename($_FILES['thumbnail']['name']);
	if(move_uploaded_file($_FILES["thumbnail"]["tmp_name"], $target_file)){
		$thumbnail =basename($_FILES["thumbnail"]["name"]);
	}
	
	$tittle = $_POST['tittle'];
	$description = $_POST['description'];
	$content = $_POST['content'];

	$status = 0;
	if(isset($_POST['status'])) $status = $_POST['status'];
	
	$cateid = $_POST['category'];
	$autid = $_SESSION['loginor']['id'];

	$created_at = date('Y-m-d H:i:s');

	$query = "insert into posts (tittle, description, contents, thumbnail, author_id, category_id, status, created_at) values ('".$tittle."','".$description."','".$content."','".$thumbnail."',".$autid.", ".$cateid.", ".$status.", '".$created_at."')";
	$result = $conn->query($query) or die($conn->error);

	if($result == true){
		setcookie('msg','Thêm mới thành công',time()+3);
		header('Location: posts.php');
	}else {
		setcookie('msg','Thêm mới không thành công',time()+3);
		header('Location: post_add.php');
	}
 ?>