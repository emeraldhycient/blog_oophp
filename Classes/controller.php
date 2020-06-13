<?php
include_once "api.php";

$api = new api();

if(isset($_POST["allPostDashboard"])){
        $rows = $api->allPostDashboard();
        if($rows["message"] == "success"){
            while($row = $rows["data"]->fetch_object()){
            $temp = '
                  <div class="card">
                  <div class="card-header">
                  <h6>'.$row->title.'<small></small></h6>
                  <span>'.$row->date.'</span>
                  <span class="text-danger">category: '.$row->cat.'</span>
                  </div>
                  <div class="cardbody">
                  <img src="../blogphoto/'.$row->photo.'" class="img-thumbnail w-100" style="height:300px;">
                  <p>'.$row->textz.'</p>
                  </div>
                  </div>
            ';
            echo $temp;
            }
        }else{
            echo json_encode($rows["message"]);
        }
}

// submit comments

if(isset($_POST["comment"])){
    $commentor = $_POST["commentor"];
     $comment = $_POST["comments"];
     $email = $_POST["email"];
     $postid = $_POST["postid"];
    $message = $api->submitcomment($commentor,$comment,$email,$postid);
    if($message["message"] == "comment uploaded successfully"){
        echo "<script>
        alert('comment submitted successfully');
        window.location.href='../views/mainview.php?id=".$postid."'
        </script>";
    }else{
        echo json_encode($message);
    }
}

// fetch all coment native to a single post
if(isset($_POST["post_id_in_comment"]))
{
    $id = $api->filter($_POST["post_id_in_comment"]);
    $rows = $api->allcomment($id);
    if($rows["message"] == "success"){
         while($row = mysqli_fetch_object($rows["data"])){
             $temp = '
             <div class="card mb-3">
             <div class="card-header"><p class="card-title">'.$row->commentor.'</p><p>'.$row->email.'</p></div>
             <div class="card-body"><p class="">'.$row->comment.'</p></div>
             </div>
             ';
             echo $temp;
         }
    }else{
        echo json_encode($rows);
    }
             
}

//fetching related post in singleview page
     if(isset($_POST["relatedpost"])){
        $rows =$api->relatedpost();
        while($row = mysqli_fetch_object($rows)){
            $data = '
            <hr>
             <div class="mb-2">
                   <img src="../blogphoto/'.$row->photo.'" class="img-thumbnail" style="width:120px;10p%;float:right;">
             <div class="">
             <h6>'.$row->title.'</h6>
                <p><small>'. substr($row->textz,0,150).'</small><a href="./mainview.php?id='.$row->id.'">..readmore</a></p>
               <p><strong class="text-danger">Author:</strong><small class="pl-5 text-info">'.$row->date.'</small></p>
             </div>
             </div>
            ';
            echo $data;
        }
     }

// fetchin post for index page
if(isset($_POST["mainpost"]))
{
    $rows =$api->mainpost();
    while($row = mysqli_fetch_object($rows)){
        $data = '
        <hr>
         <div>
         <div class="card">
         <div class="card-header">
                         <h6>'.$row->title.'</h6>
                         <p><small>authour:</small><small class="p-2">'.$row->date.'</small><small>Category: '.$row->cat.'</small></p>
                         </div>
                         <div class="card-body">
                        <img src="./blogphoto/'.$row->photo.'" class="img-thumbnail" style="width:100%;height:300px">
                        <p><small>'. substr($row->textz,0,200).'</small><a href="./views/mainview.php?id='.$row->id.'">..readmore</a></p>
                        </div></div><br>
                        </div>
        ';
        echo $data;
    }
}

// fetching post when readmore is clicked
if(isset($_POST["postid"])){
    $id = $api->filter($_POST["postid"]);
    $rows = $api->single($id);
        $temp = '
        <div>
        <div class="card">
        <div class="card-header">
                        <h6>'.$rows->title.'</h6>
                        <p><small>authour:</small><small class="p-2">'.$rows->date.'</small><small>Category: '.$rows->cat.'</small></p>
                        </div>
                        <div class="card-body">
                       <img src="../blogphoto/'.$rows->photo.'" class="img-thumbnail" style="width:100%;height:300px">
                       <p>'.$rows->textz.'</p>
                       </div></div><br>
                       <h6>leave a comment *</h6>
                       <form action="../classes/controller.php" method="post" class="form-group">
                       <input type="text" class="form-control" name="commentor" placeholder="name" required important><br>
                       <input type="text" class="form-control" name="email" placeholder="email"><br>
                       <textarea class="form-control" name="comments" placeholder="comment...." required important></textarea><br>
                       <input type="hidden" name="postid" value="'.$rows->id.'" >
                       <input type="submit" name="comment" class="btn btn-info">
                       </form>
                       </div>
        ';
        echo $temp;
}

// refreshing post in the index page
if(isset($_POST["single"])){
    
    $datas = $api->entrypost();
    $data = '
    <div class="card">
    <div class="card-header">
    <h4 class="m-auto p-2">'.$datas->title.'</h4>
    </div>
    <div class="card-body">
          <div class="img">
          <img src="./blogphoto/'.$datas->photo.'" class="img-thumbnail" style="width:100%;height:300px;">
          </div>
          <div>
          <p><strong>author</strong><small class="pl-3">'.$datas->date.'</small></p>
          <p>'.$datas->textz.'</p>
          </div>
          </div>
    </div>
    ';
   echo $data;
   
}

// logout
if(isset($_GET["logout"])){
     echo  $api->logout();
}
// login
if(isset($_POST["login"])){
        $email = $_POST["email"];
        $pass = $_POST["pass"];
        $api->login($api->filter($email),$api->filter($pass));
}
// registeration
if(isset($_POST["register"])){
    if(isset($_FILES["avatar"])){
    $fname = $api->filter($_POST["fname"]);
    $lname = $api->filter($_POST["lname"]);
    $username = $api->filter($_POST["uname"]);
    $email = $api->filter($_POST["email"]);
    $phone = $api->filter($_POST["phone"]);
    $profession = $api->filter($_POST["profession"]);
    $skill = $api->filter($_POST["skill"]);
    $pass = $api->filter($_POST["pass"]);
    $cpass = $api->filter($_POST["cpass"]);
    $avatar = $_FILES["avatar"]["name"];
    $path = "../medias/".basename($_FILES["avatar"]["name"]);
    $id = uniqid();
  if($pass == $cpass)
    {
       $pass = password_hash($pass,PASSWORD_BCRYPT);
        $move = move_uploaded_file($_FILES['avatar']['tmp_name'],$path);
if($move){
       echo  $api->register($id,$fname,$lname,$username,$email,$phone,$profession,$skill,$pass,$avatar);
}else{
    echo "image couldnt be submitted";
}
    }else{
             echo "passwords doesnt match";
    }
    
}
}



?>