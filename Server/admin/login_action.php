<?php 
	session_start();
	require_once('connection.php');
	date_default_timezone_set('Asia/Ho_Chi_Minh');

// 	header("Access-Control-Allow-Origin: *");
// header("Content-Type: application/json; charset=UTF-8");
// header("Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,DELETE");
// header("Access-Control-Max-Age: 3600");
// header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
// 	//get data
// 	$data = json_decode(file_get_contents('php://input'),true);
// 	// $a = $_POST['email'];
// 	// echo $a;
// 	// $a["data1"] = $data->email;
// 	// $a["data2"] = $data->pass;

// 	// $result = json_encode($a);

// 	var_dump($data);
// 	// echo $data["operacion"];
// 	// $email = $_POST['email'];
// 	// $password = $_POST['password'];
// 	// echo $email;
// 	// echo "<pre>";
// 	// echo $password;
// 	die();

	$email = $_POST['emailline'];
	$password = $_POST['password'];
	
	$query= "Select staffID, staffName, staffEmail from tb_staff where staffEmail = '".$email."' and staffPassword ='".md5($password)."'";
	
	$resultUser = $conn->query($query)->fetch_assoc();
	print_r($resultUser);
	if($resultUser !== NULL) {
	//get permission
	$query = "SELECT Distinct *
				from 
				(SELECT a.permissionID, a.permissionDetail FROM tb_permissions a
				INNER JOIN tb_permissionsstaffgroup b
				ON b.permissionId = a.permissionID
				INNER JOIN tb_staffgroup c
				on b.groupId = c.groupID
				WHERE c.staffID = ".$resultUser['staffID']." ) tab
				group by tab.permissionDetail";
	$resultPermission = $conn->query($query);
	
	$permissions = array();

	while ($row = $resultPermission->fetch_assoc()) {
		# code..
		$permissions[]=$row;
	}
	
	
		$_SESSION['islogin'] = true;
		$_SESSION['loginor'] = $resultUser;

		$_SESSION['permission'] = $permissions;
		header("Location: index.php"); 
	}else{
		setcookie('msg',"Your UserName or password is incorrected",time()+3);
		echo "string";
		header("Location: login.php");

	}

 ?>