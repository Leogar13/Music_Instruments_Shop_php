 <?php 
 
    session_start();

    if(!isset($_SESSION['islogin']) && $_SESSION['islogin'] != true){
      header("Location: ../login.php");
    }  
 
	require_once('../../connection.php');
	$id = $_GET['id'];
	$query = "delete from posts where id =".$id;
	$status = $conn->query($query);
	if($status == true){
		setcookie('msg', 'Xóa thành công!', time()+5);
		
	}else{
		setcookie('msg', 'Xóa không thành công!', time()+5);
	}
	header('Location: posts.php');	
		
 ?>