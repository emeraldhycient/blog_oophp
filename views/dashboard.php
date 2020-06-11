<?php
           session_start();

           if(!isset($_SESSION["blogid"])){
           header("location : login.php");
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
        <nav>
        <div class="container">
                <h4 id="brand" class="p-2">Raldblog</h4>
            </div>
        </nav>
    </header>
    <div class="container">
        <div class="row">
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

        });
    </script>
</body>

</html>