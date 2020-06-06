<?php

include_once "api.php";

$api = new api();

if(isset($_POST["index"]))
{
    $datas = $api->index();
    while ($datas){
        echo "<p>'.$datas->title.'</p>";
    }
}

if(isset($_POST["single"])){
    
    $datas = $api->entrypost();
    $data = '
    <div >
    <div>
    <h4 class="m-auto p-2">'.$datas->title.'</h4>
    </div>
          <div class="img">
          <img src="./blogphoto/'.$datas->photo.'" class="img-thumbnail" style="width:100%;height:300px;">
          </div>
          <div>
          <p><strong>author</strong><small class="pl-3">'.$datas->date.'</small></p>
          <p>'.$datas->textz.'</p>
          </div>
    </div>
    ';
   echo $data;
}

if(isset($_GET["logout"])){
      $api->logout();
}

if(isset($_POST["login"])){
        $email = $_POST["email"];
        $pass = $_POST["pass"];
        $api->login($api->filter($email),$api->filter($pass));
}

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