<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>raldblog login</title>
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
            <div class="col-lg-6 col-md-6 col-sm-12 m-auto">
            <?php

session_start();

if(isset($_SESSION["blogid"])){
    echo "<script>window.location.href='./dashboard.php';</script>";
}
?>
                <br>
                <form method="POST" action="../Classes/controller.php" class="form-group">
                    <label>email</label>
                    <input type="text" name="email" class="form-control" id="email"><br>
                    <label>password</label>
                    <input type="password" name="pass" class="form-control" id="pass"><br>
                    <input type="submit" name="login" class="btn btn-info">
                    <a href="./register.html" class="ml-5">register</a>
                </form>
            </div>
        </div>
    </div>
    <footer>
        <br><br><br><br>
        <br><br><br><br>
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