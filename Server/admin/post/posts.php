<?php 
    session_start();

    if(!isset($_SESSION['islogin']) && $_SESSION['islogin'] != true){
      header("Location: ../login.php");
    }   
  require_once('../../connection.php');
  if($_SESSION['isadmin'] == true){
    $query = "select * from posts";
  }else{
    $query = "select * from posts where author_id = ".$_SESSION['loginor']['id'];
  }

  
  $result = $conn->query($query) or die($conn->error);

  $post = array();
  while ($row = $result->fetch_assoc()) {
    # code...
    $post[]= $row;
  }   

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
    <h3 align="center">Zent - Education And Technology Group</h3>
    <h3 align="center">Category List</h3>
    <a href="post_add.php" type="button" class="btn btn-primary">Thêm mới</a>
    <?php if(isset($_COOKIE['msg'])){ ?>
    <div class="alert alert-success" role="alert">
      <strong>Success!</strong> <?=$_COOKIE['msg']?>
    </div>
<?php } ?>
    <hr>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Title</th>
          <th scope="col">Description</th>
          <th scope="col">Thumbnail</th>
        </tr>
      </thead>
      <tbody>
        <?php 
            foreach ($post as $key) {
              # code...
            
         ?>
        <tr>
          <th scope="row"><?=$key['id']?></th>
          <td><?=$key['tittle']?></td>
          <td><?=$key['description']?></td>
          <td><img src="<?php if(strpos($key['thumbnail'], "http") !== false) {echo $key['thumbnail'];}else{ echo "../../img/".$key['thumbnail'];}?>" width = 100px height= 70px></td>
          
          <td>
            <a href="post_detail.php?id=<?=$key['id']?>" type="button" class="btn btn-default">Xem</a>
            <a href="post_edit.php?id=<?=$key['id']?>" type="button" class="btn btn-success">Sửa</a>
            <a href="post_del_action.php?id=<?=$key['id']?>" type="button" class="btn btn-warning">Xóa</a>
          </td>
        </tr>
      <?php } ?>
      </tbody>
    </table>
    </div>
</body>
</html>

<script type="text/javascript">

window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove(); 
    });
}, 4000);
</script>
