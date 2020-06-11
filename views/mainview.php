
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>story in details</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="    https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../styles/main.css">
</head>

<body>
    <header>
        <nav>
        <div class="container">
                <h4 id="brand" class="p-2">Raldblog</h4>
                <div style="float:right;margin-top:-50px;">
                  <h6 class="p-2"><a href="../views/login.php">Dashboard<i class="fa fa-users pl-2"></i></a></h6>
                </div>
            </div>
        </nav>
    </header>
    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
        <div class="col-md-8 con"></div>
        <div class="col-md-2"></div>
        </div>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <h6>comments</h6>
                <div class="conx"></div>
            </div>
            <div class="col-md-2"></div>
        </div>       
         <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <br><h6>more post</>
                <div class="conz"></div>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
    <footer>
        <br><br><br><br><br><br><br><br>
        <center>
            <p>&copy; Raldblog</p>
            <p>made with <i class="fa fa-heart text-danger"></i> by hycient</p>
        </center>
    </footer>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(() => {
            const queryString = window.location.search;

                const urlParams = new URLSearchParams(queryString)

                const id = urlParams.get('id')
                   
                $.ajax({
                    url:"../classes/controller.php",
                    method:"post",
                    data:{"postid":id},
                    success: data=>{                            
                       $(".con").html(data)
                    }
                })

                $.ajax({
                    url:"../classes/controller.php",
                    method:"post",
                    data:{"post_id_in_comment":id},
                    success: data=>{ 
                       $(".conx").html(data)
                    }
                })

                $.ajax({
                    url:"../classes/controller.php",
                    method:"post",
                    data:{"relatedpost":"relatedpost"},
                    success: data=>{ 
                       $(".conz").html(data)
                    }
                })

        });
    </script>
</body>

</html>