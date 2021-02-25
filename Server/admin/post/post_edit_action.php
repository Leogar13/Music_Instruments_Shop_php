<?php 
	  session_start();

    if(!isset($_SESSION['islogin']) && $_SESSION['islogin'] != true){
      header("Location: ../login.php");
    }  
	require_once('../../connection.php');
	date_default_timezone_set('Asia/Ho_Chi_Minh');
	
	$target_dir = "../../img/";
	$thumbnail = '';

	$target_file = $target_dir.basename($_FILES['thumbnail']['name']);
	if(move_uploaded_file(($_FILES["thumbnail"]["tmp_name"]), $target_file)){
		$thumbnail = ", thumbnail = '".basename($_FILES["thumbnail"]["name"])."'";
	}
	$id = $_POST['id'];

	$tittle = $_POST['tittle'];
	$description = $_POST['description'];
	$content = $_POST['contents'];

	$status = 0;
	if(isset($_POST['status'])) $status = $_POST['status'];
	
	$cateid = $_POST['category'];
	$autid = $_SESSION['loginor']['id'];

	$created_at = date('Y-m-d H:i:s');

	$query = "update posts set tittle ='".$tittle."', description='".$description."', contents ='".$content."'".$thumbnail.", author_id= ".$autid.", category_id=".$cateid.", status= ".$status." where id=".$id;
	
	$result = $conn->query($query) or die($conn->error);

	// echo "$thumbnail";
	// die();

	if($result == true){
		setcookie('msg','Sửa thành công',time()+3);
		header('Location: posts.php');
	}else {
		setcookie('msg','Sửa không thành công',time()+3);
		header('Location: post_edit.php');
	}
 ?>