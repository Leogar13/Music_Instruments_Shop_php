<?php 
	session_start();

	if(!isset($_SESSION['islogin']) && $_SESSION['islogin'] != true){
	    header("Location: ../login.php");
	}  
	require_once('../connection.php');
	$id = $_GET['id'];
	$total = $_GET['total'];

	$getPost = array();
	for ($i=0; $i <$total ; $i++) {
		$name = "box_".$i;
		if (isset($_POST[$name])) {
			# code...
			$getPost[]=$_POST[$name];
		}
		
	}



	//delete all permission
	$query = "delete from tb_permissionsstaffGroup where groupId = ".$id;
	$result = $conn->query($query);
	//give permission new

	for ($i=0; $i <count($getPost) ; $i++) { 
		
		$query = "Insert into tb_permissionsstaffGroup(groupId,permissionId) values (".$id.",".$getPost[$i].");";
		$result = $conn->query($query) or die($conn->error);

	}
	// check if has this role
	if ($_SESSION['loginor']['id'] == $id) {
		unset($_SESSION['permission']);
		$query = "SELECT Distinct *
				from 
				(SELECT a.permissionID, a.permissionDetail FROM tb_permissions a
				INNER JOIN tb_permissionsstaffgroup b
				ON b.permissionId = a.permissionID
				INNER JOIN tb_staffgroup c
				on b.groupId = c.groupID
				WHERE c.staffID = ".$id." ) tab
				group by tab.permissionDetail";
		$resultPermission = $conn->query($query);

		$permissions = array();

		while ($row = $resultPermission->fetch_assoc()) {
			# code..
			$permissions[]=$row;
		}
		$_SESSION['permission']=$permissions;
	}
	

	if($result == true){
		setcookie('msg', 'Cập nhật thành công!', time()+5);
		header('Location: role.php');
	}else{
		setcookie('msg', 'Cập nhật không thành công!', time()+5);
		header('Location: role_permission.php?id='.$id);
	}
 ?>