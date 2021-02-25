
<?php 
  session_start();

    if(!isset($_SESSION['islogin']) && $_SESSION['islogin'] != true){
      header("Location: ../login.php");
    }  
  // require_once('../../connection.php');
  // $query = "select * from categories";
  // $result = $conn->query($query) or die($conn->error);

  // $category = array();
  // while ($row = $result->fetch_assoc()) {
  //   # code...
  //   $category[]= $row;
  // }   

  // $id = $_GET['id'];
  // $query = "select * from posts where id =".$id;
  // $result = $conn->query($query) or die($conn->error);

  // $post = $result->fetch_assoc();
     require_once('../connection.php');
    $query = "select * from tb_categories";
    $result = $conn->query($query) or die($conn->error);

    $category = array();
    while ($row = $result->fetch_assoc()) {
        # code...
      $category[]= $row;
    }

    $query = "select * from tb_supplier";
    $result = $conn->query($query) or die($conn->error);

    $supplier = array();
    while ($row = $result->fetch_assoc()) {
        # code...
      $supplier[]= $row;
    }

    $query = "select * from tb_manufactory";
    $result = $conn->query($query) or die($conn->error);

    $manufactory = array();
    while ($row = $result->fetch_assoc()) {
        # code...
      $manufactory[]= $row;
    }       

    $id = $_GET['id'];
  $query = "SELECT a.*, b.imageAddress FROM tb_products a LEFT JOIN (SELECT * from tb_imageaddress) b ON a.productID = b.productID where a.productID =".$id;
  $result = $conn->query($query) or die($conn->error);

  $post = $result->fetch_assoc();
 ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>add</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
    <h3 align="center">Add New Post</h3>
    <hr>
    <?php if(isset($_COOKIE['msg'])) {?>
        <div class="alert alert-warning">
          <strong>Thông báo</strong> <?=$_COOKIE['msg']?>
        </div>
      <?php } ?>
        <form action="product_edit_action.php" method="POST" role="form" enctype="multipart/form-data">
            <input type="hidden" class="form-control" id="" placeholder="" name="id" value="<?=$post['productID']?>">
            <div class="form-group">
                <label for="">Product Name</label>
                <input type="text" class="form-control" id="" placeholder="" name="tittle" value="<?=$post['productName']?>">
            </div>
            <div class="form-group">
                <label for="">Retail Price</label>
                <input type="text" class="form-control" id="" placeholder="" name="description" value="<?=$post['retailPrice']?>">
            </div>
            <div class="form-group">
                <label for="">Description</label>
                <!-- <input type="textarea" class="form-control" id="" placeholder="" name="description"> -->
                <textarea class="form-control" name="contents" rows="10" >
                    <?=$post['productDescription']?>
                </textarea>
            </div>
            <div class="form-group">
                <label for="">Category</label>

                <select name="category" class="form-control">
                    <?php foreach ($category as $key) {
                        # code...
                     ?>
                        <option <?=($post['categoryID']==$key['categoryID'])?'selected':''?> value="<?=$key['categoryID'];?>"><?=$key['categoryName'];?></option>
                  <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label for="">Supplier</label>

                <select name="supplier" class="form-control">
                    <?php foreach ($supplier as $key) {
                        # code...
                     ?>
                        <option <?=($post['supplierID']==$key['supplierID'])?'selected':''?> value="<?=$key['supplierID'];?>"><?=$key['supplierName'];?></option>
                  <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label for="">Manufactory</label>

                <select name="manufactory" class="form-control">
                    <?php foreach ($manufactory as $key) {
                        # code...
                     ?>
                        <option <?=($post['manufactoryID']==$key['manufactoryID'])?'selected':''?> value="<?=$key['manufactoryID'];?>"><?=$key['manufactoryName'];?></option>
                  <?php } ?>
                </select>
            </div>
            <img src="<?php if(strpos($post['imageAddress'], "http") !== false) {echo $post['imageAddress'];}else{ echo "../../".$post['imageAddress'];}?>" width = 100px height= 70px>
            <div class="form-group">
                <label for="">Thumbnail</label>
                <input type="file" class="form-control" id="" placeholder="" name="thumbnail">
            </div>
            
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</body>
</html>

<script type="text/javascript">

$(document).ready(function () {
 
window.setTimeout(function() {
    $(".alert").fadeTo(1000, 0).slideUp(1000, function(){
        $(this).remove(); 
    });
}, 5000);
 
});
</script>