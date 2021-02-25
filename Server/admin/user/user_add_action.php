
  <?php 
  	session_start();

	  if(!isset($_SESSION['islogin']) && $_SESSION['islogin'] != true){
	      header("Location: ../login.php");
	  }  
	require_once('../connection.php');

	// $id = $_POST['id'];
	$name = $_POST['name'];
	$email = $_POST['email'];
	$pass = $_POST['password'];
	$status = $_POST['status'];

	
	$query ="Insert into users(name, userName, password, address, createdBy) values ('".$name."','" .$email. "','" .md5($pass). "','" .$status. "',".$_SESSION['loginor']['id'].");";
	
	$status = $conn->query($query);

	if($status == true){
		setcookie('msg', 'Cập nhật thành công!', time()+5);
		header('Location: user.php');
	}else{
		setcookie('msg', 'Cập nhật không thành công!', time()+5);
		header('Location: user_add.php?id='.$id);
	}
		
 ?>