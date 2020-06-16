<?php
include_once "api.php";

$api = new api();

 if(isset($_POST["delete_id"])){
     echo $api->deletebyid($_POST["delete_id"]);
 }

if(isset($_POST["editpost"])){
    echo $api->editpost($_POST["title"],$_FILES["photo"],$_POST["textz"],$_POST["cat"],$_POST["edit_id"]);
}

if(isset($_POST["submitpost"])){
  echo   $api->newpost($_POST["title"],$_FILES["photo"],$_POST["textz"],$_POST["cat"]);
}

if(isset($_POST["allMediaDashboard"])){
    $rows = $api->allPostDashboard();
    if($rows["message"] == "success"){
        while($row = $rows["data"]->fetch_object()){
            $style ='style="height:300px;width:100%"';
        $temp = '
              <div class="card mb-3">
              <div class="cardbody">
              '.$api->mediatag ($row->photo,'../blogphoto/',$style).'
                            </div>
              <div class="card-footer">
              <p>'.$row->title.'</p>
              <small>'.$row->date.'</small>
              </div>
              </div>
        ';
        echo $temp;
        }
    }else{
        echo json_encode($rows["message"]);
    }
}

if(isset($_POST["allPostDashboard"])){
        $rows = $api->allPostDashboard();
        if($rows["message"] == "success"){
            while($row = $rows["data"]->fetch_object()){
                $style ='style="height:300px;width:100%"';
            $temp = '
            <div class="card mb-3">
                 <div class="card-header">
                  <h6>'.$row->title.'<small></small></h6>
                  <span>'.$row->date.'</span>
                  <span class="text-danger">category: '.$row->cat.'</span>
                  </div>
                  <div class="cardbody">
                  '.$api->mediatag ($row->photo,'../blogphoto/',$style).'
                                    <p class="p-2">'.$row->textz.'</p>
                  </div>
                  <div class="card-footer">
                  <form action="../classes/controller.php" method="post" class="offset-3">
                  <input type="hidden" value="'.$row->id.'" name="delete_id">
                  <button type="submit" class="btn btn-danger"><i class="fa fa-trash pr-1"></i>delete</button>
                  </form>
                  <button class="btn btn-primary offset-6" style="margin-top:-67px;"><a href="./edit.php?edit_id='.$row->id.'" class="text-white"><i class="fa fa-edit pr-1"></i>edit</a></button>
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
            $style ='style="width:120px;10p%;float:right;"';
            $data = '
            <hr>
             <div class="mb-2">
             '.$api->mediatag ($row->photo,'../blogphoto/',$style).'
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
        $style = 'style="width:100%;height:300px"';
        $data = '
        <hr>
         <div>
         <div class="card">
         <div class="card-header">
                         <h6>'.$row->title.'</h6>
                         <p><small>authour:</small><small class="p-2">'.$row->date.'</small><small>Category: '.$row->cat.'</small></p>
                         </div>
                         <div class="card-body">
                         '.$api->mediatag ($row->photo,'./blogphoto/',$style).'
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
    $style = 'style="width:100%;height:300px"';
        $temp = '
        <div>
        <div class="card">
        <div class="card-header">
                        <h6>'.$rows->title.'</h6>
                        <p><small>authour:</small><small class="p-2">'.$rows->date.'</small><small>Category: '.$rows->cat.'</small></p>
                        </div>
                        <div class="card-body">
                        '.$api->mediatag ($rows->photo,'./blogphoto/',$style).'
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
    $style = 'style="width:100%;height:300px;"';
    $data = '
    <div class="card">
    <div class="card-header">
    <h4 class="m-auto p-2">'.$datas->title.'</h4>
    </div>
    <div class="card-body">
          <div class="img">
          '.$api->mediatag ($datas->photo,'./blogphoto/',$style).'
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