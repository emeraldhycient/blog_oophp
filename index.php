<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>raldblog</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="    https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./styles/main.css">
</head>
<body>
    <header>
        <nav>
            <div class="container">
                <h4 id="brand" class="p-2">Raldblog</h4>
                <div style="display:flex;align-items:center;margin-top:-50px;float:right;">
                <h6 class="p-2"><a href="./views/login.php">Dashboard<i class="fa fa-users pl-2"></i></a></h6>
                <?php
                session_start();
                if(isset($_SESSION["blogid"])){
                    echo '<h6 class="p-2"><a href="./classes/controller.php?logout=logout">logout<i class="fa fa-sign-out pl-2"></i></a></h6>';
                }else{
                  echo '<h6 class="p-2"><a href="./views/login.php">signin<i class="fa fa-sign-in pl-2"></i></a></h6>';
                }
                ?>
                </div>
            </div>
        </nav>
    </header>
    <div class="container">
    <div class="row">
    <div class="col-md-2"> </div>
    <div class="col-md-7">
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="5"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="6"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="7"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="9"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="10"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="11"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
    <img  src="./medias/images (5).jpg" class="d-block w-100 h-50 img-thumbnail" >
    <div class="carousel-caption d-none d-md-block">
    <h5>Lorem ipsum dolor sit amet, consectetur adipiscing eli</h5>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
  </div>
    </div>
    <div class="carousel-item">
    <img  src="./medias/image1.jpg" class="d-block w-100 h-50 img-thumbnail" >
    <div class="carousel-caption d-none d-md-block">
    <h5>Purus ut faucibus pulvinar elementum integer enim neque</h5>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
  </div>
    </div>
    <div class="carousel-item">
    <img  src="./medias/images (1).jpg" class="d-block w-100 h-50 img-thumbnail" >
    <div class="carousel-caption d-none d-md-block">
    <h5> Dignissim convallis aenean et tortor at risus viverra adipiscing</h5>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
  </div>
    </div>
    <div class="carousel-item">
    <img  src="./medias/images (2).jpg" class="d-block w-100  h-50 img-thumbnail" >
    <div class="carousel-caption d-none d-md-block">
    <h5>Sed vulputate mi sit amet mauris commodo quis imperdiet massa. Sed odio morbi quis commodo</h5>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
  </div>
    </div>
    <div class="carousel-item">
    <img  src="./medias/images (3).jpg" class="d-block w-100 h-30 img-thumbnail">
    <div class="carousel-caption d-none d-md-block">
    <h5>sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</h5>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
  </div>
    </div>
    <div class="carousel-item">
    <img  src="./medias/images (4).jpg" class="d-block w-100 h-50 img-thumbnail"  >
    <div class="carousel-caption d-none d-md-block">
    <h5>Lorem ipsum dolor sit amet, consectetur adipiscing elit</h5>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
  </div>
    </div>
    <div class="carousel-item">
      <img  src="./medias/images (5).jpg" class="d-block w-100 h-50 img-thumbnail" >
      <div class="carousel-caption d-none d-md-block">
    <h5>Purus ut faucibus pulvinar elementum integer enim neque</h5>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
  </div>
    </div>
    <div class="carousel-item">
      <img  src="./medias/images (6).jpg" class="d-block w-100 h-50 img-thumbnail" >
      <div class="carousel-caption d-none d-md-block">
    <h5>Dignissim convallis aenean et tortor at risus viverra adipiscing</h5>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
  </div>
    </div>
    <div class="carousel-item">
      <img  src="./medias/images (7).jpg" class="d-block w-100 h-50 img-thumbnail" >
      <div class="carousel-caption d-none d-md-block">
    <h5>ipsum dolor sit amet, consectetur adipiscing elit</h5>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
  </div>
    </div>
    <div class="carousel-item">
      <img  src="./medias/images.jpg" class="d-block w-100 h-50 img-thumbnail" >
      <div class="carousel-caption d-none d-md-block">
    <h5>do eiusmod tempor incididunt ut labore et dolore magna aliqu</h5>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
  </div>
    </div>
    <div class="carousel-item">
      <img  src="./medias/images2.jpg" class="d-block w-100 h-50 img-thumbnail" >
      <div class="carousel-caption d-none d-md-block">
    <h5>Lorem ipsum dolor sit amet, consectetur adipiscing eli</h5>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
  </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<p></p>
<h5 class="mt-5 mb-2 text-default"> New Arrival </h5>
    <div class="uppernews mb-5">
          </div>  
          <h5>Featured Post</h5>    
           <div class="mainnews">
           
          </div>
        </div>
        <div class="col-md-3 p-3">
          <div class="card">
           <h6 class="card-header">Categories</h6>
            <ul id="indexanchor" class="card-body">
            <li><a href="">App development</a></li>
            <li><a href="">Graphic design</a></li>
            <li><a href="">Database tips</a></li>
            <li><a href="">Tech gist</a></li>
            <li><a href="">Business</a></li>
            </ul>
            </div>
        </div>
    </div>
    </div>
<div class=" container bg-dark">
        <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-7">
        <ul id="indexanchor">
            <li><a href="" class="p-2">Advertise With Us</a></li>
            <li><a href="" class="p-2"">Contact Us</a></li>
            <li><a href="" class="p-2">Promote Music/Video On Raldblog</a></li>
            </ul>
        </div>
        <div class="col-md-3"></div>
        </div>
</div>
      
<footer>
        <br><br>
        <center>
            <p>&copy; Raldblog</p>
            <p>made with <i class="fa fa-heart text-danger"></i> by hycient</p>
        </center>
    </footer>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script>
       $(document).ready(()=>{

           $.ajax({
               url:"./Classes/controller.php",
               method:"post",
               data:{"single":"single"},
               success : data=>{
                    $(".uppernews").append(data) ; 
               }
           })
           
           $.ajax({
               url:"./Classes/controller.php",
               method:"post",
               data:{"mainpost":"mainpost"},
               success : output=>{
                   $(".mainnews").html(output)
               }
           })

       });
    </script>
</body>
</html>