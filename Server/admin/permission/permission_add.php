<?php 
    session_start();

    if(!isset($_SESSION['islogin']) && $_SESSION['islogin'] != true){
      header("Location: ../login.php");
    }  

    $checkpermission = 0;
    if (count($_SESSION['permission']) > 0) {
        for ($i=0; $i < count($_SESSION['permission']); $i++) { 
            if(empty(array_search("insertPermission", $_SESSION['permission'][$i] ))){   
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
    <h3 align="center">Zent - Education And Technology Group</h3>
    <h3 align="center">Add New Category</h3>
    <hr>
    <?php if(isset($_COOKIE['msg'])) {?>
        <div class="alert alert-warning">
          <strong>Thông báo</strong> <?=$_COOKIE['msg']?>
        </div>
      <?php } ?>
        <form action="permission_add_action.php" method="POST" role="form" enctype="multipart/form-data">
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" class="form-control" id="" placeholder="" name="name" >
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
        <a class="btn btn-secondary" href="permission.php">Cancel</a>
    </div>
</body>
</html>