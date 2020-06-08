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
                <h1 id="brand" class="p-2">Raldblog</h1>
            </div>
        </nav>
    </header>
    <div class="container">
    <div class="row">
    <div class="col-md-2"> </div>
    <div class="col-md-7">
    <div class="uppernews mb-5">
          </div>  
          <center><h4>Featured Post</h4></center>     
           <div class="mainnews">
           
          </div>
        </div>
        <div class="col-md-3 p-3">
            <h6>Categories</h6>
            <ul id="indexanchor">
            <li><a href="">App development</a></li>
            <li><a href="">Graphic design</a></li>
            <li><a href="">Database tips</a></li>
            <li><a href="">Tech gist</a></li>
            <li><a href="">Business</a></li>
            </ul><br>

            <h6>Pages</h6>
            <ul id="indexanchor">
            <li><a href="">Advertise With Us</a></li>
            <li><a href="">Contact Us</a></li>
            <li><a href="">Promote Music/Video On Raldblog</a></li>
            </ul>
        </div>
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