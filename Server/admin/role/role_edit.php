
<?php  
    session_start();

  if(!isset($_SESSION['islogin']) && $_SESSION['islogin'] != true){
      header("Location: ../login.php");
  }  

    $checkpermission = 0;
    if (count($_SESSION['permission']) > 0) {
        for ($i=0; $i < count($_SESSION['permission']); $i++) { 
            if(empty(array_search("updateRole", $_SESSION['permission'][$i] ))){   
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
  $id = $_GET['id'];

  $query = "select * from tb_group where groupid =".$id;
  $result = $conn->query($query) or die($conn->error);

  $author = $result->fetch_assoc();
  
  ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Zent - Education And Technology Group</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
    <h3 align="center">Update</h3>
    <hr>
    <?php if(isset($_COOKIE['msg'])) {?>
        <div class="alert alert-warning">
          <strong><?=$_COOKIE['msg']?></strong> 
        </div>
      <?php } ?>
        <form action="role_edit_action.php" method="POST" role="form" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?=$author['groupID']?>">
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" class="form-control" id="" placeholder="" name="name" value="<?=$author['groupName']?>">
            </div>            
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</body>
</html>