<?php 
	  session_start();

    // if(!isset($_SESSION['islogin']) && $_SESSION['islogin'] != true){
    //   header("Location: ../login.php");
    // }  
	require_once('../connection.php');
	date_default_timezone_set('Asia/Ho_Chi_Minh');
	
	$target_dir = "../img/";
	$thumbnail = "";

	$target_file = $target_dir.basename($_FILES['thumbnail']['name']);
	if(move_uploaded_file($_FILES["thumbnail"]["tmp_name"], $target_file)){
		$thumbnail =basename($_FILES["thumbnail"]["name"]);
	}
	
	$productname = $_POST['productname'];
	$description = $_POST['description'];
	$price = $_POST['price'];
	$cateid = $_POST['category'];
	$supplier = $_POST['supplier'];
	$manufactory = $_POST['manufactory'];

	$created_at = date('Y-m-d H:i:s');
	echo $target_file."<br>";
	echo $thumbnail;

	
	$query = "INSERT INTO `tb_products`(`counts`, `productDescription`, `retailPrice`, `categoryID`, `supplierID`, `manufactoryID`, `productName`) values ( 0, '".$description."',".$price.",".$cateid.",".$supplier.", ".$manufactory.", '".$productname."')";
	$result = $conn->query($query) or die($conn->error);

	$query = "Select Max(productID) as max from tb_products";
	$max = $conn->query($query)->fetch_assoc() or die($conn->error);

	$query = "INSERT INTO `tb_imageaddress`(`imageAddress`, `imageDescription`, `productID`) VALUES ('client/image/".$thumbnail."','".$description."',".$max['max'].")";
	$result = $conn->query($query) or die($conn->error);
	if($result == true){
		setcookie('msg','Thêm mới thành công',time()+3);
		header('Location: product.php');
	}else {
		setcookie('msg','Thêm mới không thành công',time()+3);
		header('Location: product_add.php');
	}
 ?>