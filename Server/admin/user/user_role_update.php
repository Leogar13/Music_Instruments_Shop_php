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

	//delete all role of this user
	$query = "delete from tb_staffGroup where staffId = ".$id;
	$result = $conn->query($query);
	//give new roles to the user

	for ($i=0; $i <count($getPost) ; $i++) { 
		$query = "Insert into tb_staffGroup(staffId,groupId) values (".$id.",".$getPost[$i].");";
		$result = $conn->query($query) or die($conn->error);

	}

	//get my role
	// $query = "SELECT roleId from userroles where userId = ".$_SESSION['loginor']['id'];
	$query = "SELECT groupID from tb_staffGroup where staffId = ".$_SESSION['loginor']['staffID'];
	$result = $conn->query($query);

	$roles = array();

	while ($row = $result->fetch_assoc()) {
		# code..
		$roles[]=$row['groupID'];
	}
	

	//check if this user is mine
	//check if my role is edited
	if (array_search($id, $roles)===0 || !empty(array_search($id, $roles))) {
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
		header('Location: user.php');
	}else{
		setcookie('msg', 'Cập nhật không thành công!', time()+5);
		header('Location: user_role.php?id='.$id);
	}
 ?>