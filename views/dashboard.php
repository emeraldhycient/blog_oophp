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
<button class="navbar-toggler first-button" type="button" data-toggle="collapse" data-target="#navbarSupportedContent20"
  aria-controls="navbarSupportedContent20" aria-expanded="false" aria-label="Toggle navigation">
  <div class="animated-icon1"><span></span><span></span><span></span></div>
</button>
<div class="collapse navbar-collapse" id="navbarSupportedContent20">
  <ul class="navbar-nav mr-auto">
    <li class="nav-item">
      <a class="nav-link" href="#">   <button class="btn btn-info m-2 newpost1" data-toggle="modal" data-target="#exampleModal"><b>+</b>post</button></a>
    </li>
    <li class="nav-item active">
      <a class="nav-link" href="#">        <h6 class="post"style="background-color:yellow;"><i class="fa fa-book"></i> posts</h6>
</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">        <h6 class="mediabtn1"><i class="fa fa-camera"></i> medias</h6>
</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">        <h6 class="commentbtn1"><i class="fa fa-comment"></i> comments</h6>
</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">        <h6 class=""><i class="fa fa-inbox"></i> mails</h6>
</a>
    </li>
  </ul>
</div>
</nav>
    </header>
    <div class="container-fluid">
        <div class="row">
        <div class="col-md-2 border sidecon">
        <button class="btn btn-info m-2 newpost2" data-toggle="modal" data-target="#exampleModal"><b>+</b>post</button>
        <h6 class="text-white p-2 post" style="background-color:yellow;"><i class="fa fa-book"></i> posts</h6>
        <h6 class="text-white p-2 mediabtn2"><i class="fa fa-camera"></i> medias</h6>
        <h6 class="text-white p-2 commentbtn2"><i class="fa fa-comment"></i> comments</h6>
        <h6 class="text-white p-2"><i class="fa fa-inbox"></i> mails</h6>
        </div>
        <div class="col-md-6 m-auto">
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New Post</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-group" id="newpost" action="../classes/controller.php" method="post" enctype="multipart/form-data">
        <input type="text" name="title" class="form-control" placeholder="enter title" required important><br>
        <input type="file" name="photo"><select name="cat" class="bg-dark text-white">
          <option>select category</option>
        <option value="App_development">App_development</option>
        <option value="Graphic_design">Graphic_design</option>
        <option value="Database_tips">Database_tips</option>
        <option value="Tech_gist">Tech_gist</option>
        <option value="Business">Business</option>
        </select><br><br>
        <textarea class="form-control" name="textz" placeholder="...in details" rows="7px" required important></textarea><br>
        <input type="submit" class="btn btn-primary offset-10" name="submitpost" id="submitbtn" value="post">
        </form>
      </div>
      
    </div>
  </div>
</div>
              <div class="allpost">
              
              </div>
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
                    data:{"allPostDashboard":"allPostDashboard"},
                    success: data=>{ 
                       $(".allpost").html(data)
                    }
                })
                $(".mediabtn1").click(()=>{
                  $.ajax({
                    url:"../classes/controller.php",
                    method:"post",
                    data:{"allMediaDashboard":"allMediaDashboard"},
                    success: data=>{ 
                       $(".allpost").html(data)
                    }
                })

                });
                $(".mediabtn2").click(()=>{
                  $.ajax({
                    url:"../classes/controller.php",
                    method:"post",
                    data:{"allMediaDashboard":"allMediaDashboard"},
                    success: data=>{ 
                       $(".allpost").html(data)
                    }
                })

                });
               
               
        });
    </script>
</body>

</html>