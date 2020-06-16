<?php
           session_start();

           if(!isset($_SESSION["blogid"])){
                echo "<script>window.location.href='./login.php'</script>"      ; 
             }   
           
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>welcome on board radian</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="    https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../styles/main.css">
</head>

<body>
    <header>
    <nav class="navbar navbar-light amber lighten-4 mb-4">
<h2 id="brand">Raldblog</h2>
    </nav>
    </header>
<div class="container">
<div class="row">
<div class="col-md-6 m-auto">
    <?php 
    $con = new mysqli("localhost","root","","blog");
    $edit_id = mysqli_real_escape_string($con,$_GET["edit_id"]);
    $sql = "SELECT * FROM blog WHERE id='$edit_id'";
    $q = $con->query($sql);
    if($q){
        $row = $q->fetch_object();
        $ext = pathinfo($row->photo,PATHINFO_EXTENSION);
        $media ="";
        if(in_array($ext,['gif','png','jpeg','jpg'])){
           $media = '<img src="../blogphoto/'.$row->photo.'" class="img-thumbnail"></img>';
        }elseif(in_array($ext,['mp4','mpg','mpeg',"m4v"])){
            $media = '<video src="../blogphoto/'.$row->photo.'" class="img-thumbnail"></video>';
        }else{
            $media = '<img src="" alt="unrecognised media type">';
        }
        echo '
        <form class="form-group" method="post" action="../classes/controller.php" enctype="multipart/form-data">
        <label>story title</label>
        <input type="text" name="title" class="form-control" value="'.$row->title.'" required><br>
        <input type="hidden" name="edit_id" value="'.$edit_id.'" required>
        <input type="file" name="photo"><select name="cat" class="bg-dark text-white" required>
         <option>select category</option>
       <option value="App_development">App_development</option>
       <option value="Graphic_design">Graphic_design</option>
       <option value="Database_tips">Database_tips</option>
       <option value="Tech_gist">Tech_gist</option>
       <option value="Business">Business</option>
       </select><br><br>
       '.$media.'
       <label>story in details</label>
        <input type="text" name="textz" value="'.$row->textz.'" class="form-control" style="height:100px;" required><br>
        <input type="submit" class="btn btn-primary offset-10" name="editpost" value="update">
        </form>
        ';
    }else{
           echo $con->error;
    }
    
    ?>
</div>
</div>
      </div>
    <br><br><br><br>
    <footer>
        <center>
            <p>&copy; Raldblog</p>
            <p>made with <i class="fa fa-heart text-danger"></i> by hycient</p>
        </center>
    </footer>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(() => {
        
          $.ajax({
                    url:"../classes/controller.php",
                    method:"post",
                    data:{"":""},
                    success: data=>{ 
                    }
                })

               
        });
    </script>
</body>

</html>