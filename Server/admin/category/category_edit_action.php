 <?php 
    session_start();

    if(!isset($_SESSION['islogin']) && $_SESSION['islogin'] != true){
      header("Location: ../login.php");
    }  
 
	require_once('../../connection.php');
	$id = $_POST['id'];
	$tittle = $_POST['tittle'];
	$description = $_POST['description'];
	$query = "update categories set tittle = '".$tittle."', description = '".$description."' where id = ".$id;
	$status = $conn->query($query);
	if($status == true){
		setcookie('msg', 'Cập nhật thành công!', time()+5);
		header('Location: categories.php');
	}else{
		setcookie('msg', 'Cập nhật không thành công!', time()+5);
		header('Location: category_edit.php?id='.$id);
	}
		
 ?>