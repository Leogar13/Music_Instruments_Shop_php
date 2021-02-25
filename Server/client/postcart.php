<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: POST");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

require __DIR__.'\Database.php';
require __DIR__.'\middlewares\Auth.php';
require __DIR__.'\connection.php';

$allHeaders = getallheaders();
$db_connection = new Database();
$connect = $db_connection->dbConnection();
$auth = new Auth($connect,$allHeaders);

$returnData = [
    "success" => 0,
    "status" => 401,
    "message" => "Unauthorized",
    "data" => null
];

if($auth->isAuth()){
    $mydata = $auth->isAuth();
    $datamain = file_get_contents('php://input');
    $data = json_decode( $datamain, true)['data'];

   	//insert data to database
    //insert order
    $query = "INSERT INTO `tb_orders`(`createdAt`, `orderDescription`, `payBy`, `addressShipping`, `totalBill`, `customerID`) VALUES (Now(),'somthing else','master card','".$mydata['user']['customerAddress']."',0,".$mydata['user']['customerID'].")";
    
  	$result = $conn->query($query) or die($conn->error);

  	//customer name
	$query = "select customerName from tb_customers where customerID = ".$mydata['user']['customerID']; 
	$customerName = $conn->query($query)->fetch_assoc() or die($conn->error);
	//get order id
	$query = "select max(orderID) as max from tb_orders where customerID = ".$mydata['user']['customerID']; 
	$maxID = $conn->query($query)->fetch_assoc() or die($conn->error);

    foreach ($data as $key => $value) {
    	$query = "INSERT INTO `tb_ordersdetail`(`costs`, `counts`, `orderID`, `productID`) VALUES (".$value['retailPrice'].", 1, ".$maxID['max'].", ".$value['productID'].")";
  		$result = $conn->query($query) or die($conn->error);
    }
	    
    $returnData = [
	    "success" => 1,
	    "status" => 200,
	    "message" => "Send data success",
	    "bill" => [
	    	"billID" => $maxID,
	    	"customerName" => $customerName
	    ]
	];
}

echo json_encode($returnData);
?>
