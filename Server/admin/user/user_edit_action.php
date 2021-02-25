 <?php 
 	session_start();

  if(!isset($_SESSION['islogin']) && $_SESSION['islogin'] != true){
      header("Location: ../login.php");
  }  
	require_once('../connection.php');
	$id = $_POST['id'];
	$name = $_POST['name'];
	$email = $_POST['email'];
	$status = $_POST['phone'];

	
	$query = "update tb_staff set staffName = '".$name."', staffEmail = '".$email."',staffPhone ='".$status."' where staffID =".$id;
	$status = $conn->query($query);
	if($status == true){
		setcookie('msg', 'Cập nhật thành công!', time()+5);
		header('Location: user.php');
	}else{
		setcookie('msg', 'Cập nhật không thành công!', time()+5);
		header('Location: user_edit.php?id='.$id);
	}
		
 ?>