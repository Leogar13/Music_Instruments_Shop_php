
  <?php 
  	session_start();

	  if(!isset($_SESSION['islogin']) && $_SESSION['islogin'] != true){
	      header("Location: ../login.php");
	  }  
	require_once('../connection.php');

	// $id = $_POST['id'];
	$name = $_POST['name'];

	
	$query ="Insert into tb_permissions(permissionDetail) values ('".$name."')";
	
	$status = $conn->query($query);

	if($status == true){
		setcookie('msg', 'Cập nhật thành công!', time()+5);
		header('Location: permission.php');
	}else{
		setcookie('msg', 'Cập nhật không thành công!', time()+5);
		header('Location: permission_add.php?id='.$id);
	}
		
 ?>