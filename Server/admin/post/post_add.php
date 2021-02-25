<?php 
      session_start();

    if(!isset($_SESSION['islogin']) && $_SESSION['islogin'] != true){
      header("Location: ../login.php");
    }  
  require_once('../../connection.php');
  $query = "select * from categories";
  $result = $conn->query($query) or die($conn->error);

  $category = array();
  while ($row = $result->fetch_assoc()) {
    # code...
    $category[]= $row;
  }   
 ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Zent - Education And Technology Group</title>

    <!-- include libraries(jQuery, bootstrap) -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<!-- include summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.js"></script>
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
    <h3 align="center">Add New Post</h3>
    <hr>
    <?php if(isset($_COOKIE['msg'])) {?>
        <div class="alert alert-warning">
          <strong>Thông báo</strong> <?=$_COOKIE['msg']?>
        </div>
      <?php } ?>
        <form action="post_add_action.php" method="POST" role="form" enctype="multipart/form-data">
            <div class="form-group">
                <label for="">Tittle</label>
                <input type="text" class="form-control" id="" placeholder="" name="tittle">
            </div>
            <div class="form-group">
                <label for="">Description</label>
                <input type="text" class="form-control" id="" placeholder="" name="description">
            </div>
            <div class="form-group">
                <label for="">Content</label>
                <!-- <input type="textarea" class="form-control" id="" placeholder="" name="description"> -->
                <textarea class="form-control" id="summernote" name="content" rows="10">
                    
                </textarea>
            </div>
            <div class="form-group">
                <label for="">Category</label>

                <select name="category" class="form-control">
                    <?php foreach ($category as $key) {
                        # code...
                     ?>
                        <option value="<?=$key['id'];?>"><?=$key['tittle'];?></option>
                  <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label for="">Thumbnail</label>
                <input type="file" class="form-control" id="" placeholder="" name="thumbnail">
            </div>
            <div class="form-group">
                <label for="">Hiển thị? </label>
                <input type="checkbox" class="form-control" id="" value="1" placeholder="" name="status">
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
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

$(document).ready(function() {
  $('#summernote').summernote();
});

</script>