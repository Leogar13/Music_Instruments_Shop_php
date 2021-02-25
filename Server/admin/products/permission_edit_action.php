 <?php 
 	session_start();

  if(!isset($_SESSION['islogin']) && $_SESSION['islogin'] != true){
      header("Location: ../login.php");
  }  
	require_once('../connection.php');
	$id = $_POST['id'];
	$name = $_POST['name'];

	
	$query = "update permissions set name = '".$name."' where id =".$id;
	$status = $conn->query($query);
	if($status == true){
		setcookie('msg', 'Cập nhật thành công!', time()+5);
		header('Location: permission.php');
	}else{
		setcookie('msg', 'Cập nhật không thành công!', time()+5);
		header('Location: permission_edit.php?id='.$id);
	}
		
 ?>