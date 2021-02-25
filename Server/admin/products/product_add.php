<?php 
    session_start();

    if(!isset($_SESSION['islogin']) && $_SESSION['islogin'] != true){
      header("Location: ../login.php");
    }  

    $checkpermission = 0;
    if (count($_SESSION['permission']) > 0) {
        for ($i=0; $i < count($_SESSION['permission']); $i++) { 
            if(empty(array_search("insertProduct", $_SESSION['permission'][$i] ))){   
                continue;
            }
            else{
                $checkpermission = 1;
            }

        }    
    }
    
    if ($checkpermission ==0) {
        header("Location: ../index.php");
    }

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


 ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>w</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
    <h3 align="center">Add New Product</h3>
    <hr>
    <?php if(isset($_COOKIE['msg'])) {?>
        <div class="alert alert-warning">
          <strong>Thông báo</strong> <?=$_COOKIE['msg']?>
        </div>
      <?php } ?>
          <form action="product_add_action.php" method="POST" role="form" enctype="multipart/form-data">
            <div class="form-group">
                <label for="">Product Name</label>
                <input type="text" class="form-control" id="" placeholder="" name="productname">
            </div>
            <div class="form-group">
                <label for="">Retail Price $</label>
                <input type="text" class="form-control" id="" placeholder="" name="price">
            </div>
            <div class="form-group">
                <label for="">Description</label>
                <!-- <input type="textarea" class="form-control" id="" placeholder="" name="description"> -->
                <textarea class="form-control" id="summernote" name="description" rows="10">
                    
                </textarea>
            </div>
            <div class="form-group">
                <label for="">Category</label>

                <select name="category" class="form-control">
                    <?php foreach ($category as $key) {
                        # code...
                     ?>
                        <option value="<?=$key['categoryID'];?>"><?=$key['categoryName'];?></option>
                  <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label for="">Category</label>

                <select name="supplier" class="form-control">
                    <?php foreach ($supplier as $key) {
                        # code...
                     ?>
                        <option value="<?=$key['supplierID'];?>"><?=$key['supplierName'];?></option>
                  <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label for="">Category</label>

                <select name="manufactory" class="form-control">
                    <?php foreach ($manufactory as $key) {
                        # code...
                     ?>
                        <option value="<?=$key['manufactoryID'];?>"><?=$key['manufactoryName'];?></option>
                  <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label for="">Thumbnail</label>
                <input type="file" class="form-control" id="" placeholder="" name="thumbnail">
            </div>
            
            <center><button type="submit" class="btn btn-primary">Create</button></center>
        </form>
    </div>
</body>
</html>