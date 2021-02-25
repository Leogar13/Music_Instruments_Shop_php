 <?php 
 session_start();

  if(!isset($_SESSION['islogin']) && $_SESSION['islogin'] != true){
      header("Location: ../login.php");
  }  

	require_once('../connection.php');
	$id = $_GET['id'];
	$query = "delete from userroles where roleId = ".$id;
	$status = $conn->query($query);
	$query = "delete from permissionroles where roleId = ".$id;
	$status = $conn->query($query);
	$query = "delete from roles where id = ".$id;
	$status = $conn->query($query);
	
	if($status == true){
		setcookie('msg', 'Xóa thành công!', time()+5);
		die();
		
	}else{
		setcookie('msg', 'Xóa không thành công!', time()+5);
		echo "string";
		die();
	}
	header('Location: role.php');	
		
 ?>