<?php
session_start() ;

class Api {
      protected $con;

    public function __construct()
    {
        $this->connection();
    }
    private function connection(){
        $this->con = new mysqli("localhost","root","","blog");
    }

    // new post
    public function newpost($title,$photo,$textz,$cat){
        $title = $this->filter($title);
        $cat = $this->filter($cat);
        $path = "../blogphoto/".basename($photo["name"]);
         $photoname = $photo["name"];
         $userid = $_SESSION["blogid"];
         $textz = $this->filter($textz);
         $sql = "INSERT INTO blog(title,photo,textz,userid,cat) VALUES ('$title','$photoname','$textz','$userid','$cat')";
         $message =[];
         if(move_uploaded_file($photo["tmp_name"],$path)){
                   if($this->con->query($sql)){
                       $message = "submitted successfully";
                   }else{
                       $message = $this->con->error;
                   }
         }else{
              $message = "unable to save image";       
         }
         return $message;
    }

       // fetchin post for index page
    public function mainpost(){
        $sql = "SELECT * FROM blog ORDER BY id DESC";
        $q = $this->con->query($sql);
        if($q){
            if($q->num_rows > 0){
               return $q;
            }else{
            return array("data" => "no row found" );
            }
        }else{
            return array("error" => $this->con->error);
        }
    }

    // get all medias for dashboard user
    
    public function allMediaDashboard(){
        $id = $_SESSION["blogid"];
        $sql = "SELECT id,photo FROM blog WHERE userid='$id' ORDER BY id DESC";
        $q = $this->con->query($sql);
        $data = [];
        if($q){
              if($q->num_rows > 0){
                   $data["message"] = "success";
                   $data["data"] = $q;
              }else{
                  $data["message"] = "you dont have any post currently";
              }
        }else{
             $data["message"] = $this->con->error;
        }
        return $data;
    }
     
    // get all post for dashboard user
    public function allPostDashboard(){
        $id = $_SESSION["blogid"];
        $sql = "SELECT * FROM blog WHERE userid='$id' ORDER BY id DESC";
        $q = $this->con->query($sql);
        $data = [];
        if($q){
              if($q->num_rows > 0){
                   $data["message"] = "success";
                   $data["data"] = $q;
              }else{
                  $data["message"] = "you dont have any post currently";
              }
        }else{
             $data["message"] = $this->con->error;
        }
        return $data;
    }

    public function relatedpost(){
        $sql = "SELECT * FROM blog ORDER BY id DESC LIMIT 5";
        $q = $this->con->query($sql);
        if($q){
            if($q->num_rows > 0){
               return $q;
            }else{
            return array("data" => "no row found" );
            }
        }else{
            return array("error" => $this->con->error);
        }
    }

    // refreshing post in the index page
    public function entrypost(){
        $sql = " SELECT * FROM blog
        ORDER BY RAND()
        LIMIT 1";
        $q = $this->con->query($sql);
        if($q){
            if($q->num_rows > 0){
                $data = [];
               $data = $q->fetch_object();
               return $data;
            }else{
            return array("data" => "no row found" );
            }
        }else{
            return array("data" => $q->con->error);
        }

    }

// fetching post when readmore is clicked
    public function single($id)
    {
           $sql = "SELECT * FROM blog WHERE id='$id'";
           $q = $this->con->query($sql);
           if($q){
                 if($q->num_rows > 0){
                     $data= [];
                    $data = $q->fetch_object();
                    return $data;
                 }else{
                     return array("data" => "no such row found");
                 }
           }else{
               return array ("data" => $this->con->error);
           }
    }

    // fetch all coment native to a single post
    public function allcomment($id){
        $sql = "SELECT * FROM comment WHERE postid='$id'";
        $q = $this->con->query($sql);
        $data= [];
        if($q){
              if($q->num_rows > 0){
                 $data["data"] = $q;
                 $data["message"] = "success";
              }else{
                  $data["message"] = "no comments found";
              }
        }else{
              $data["message"] = $this->con->error;
        }
        return $data;
    }
    
    // submit comment
    public function submitcomment($commentor,$comment,$email,$postid){
        $email = $this->filter($email);
        $comment = $this->filter($comment);
        $commentor = $this->filter($commentor);
        $postid = $this->filter($postid);
        $sql = "INSERT INTO comment (email,comment,commentor,postid) VALUES ('$email','$comment','$commentor','$postid')";
        $q =$this->con->query($sql);
        $data = [];
        if($q){
            $data["message"] = "comment uploaded successfully";
        }else{
            $data["message"] = $this->con->error;
        }
        return $data;
    }
    //regsiteration
    public function register($id,$fname,$lname,$username,$email,$phone,$profession,$skill,$pass,$avatar){
        $sql = "INSERT INTO users(unqid,fname,lname,username,email,phone,profession,skills,pass,avatar) VALUES('$id','$fname', '$lname', '$username', '$email' ,
         '$phone', '$profession', '$skill','$pass','$avatar')";
         $q = $this->con->query($sql);
         $msg = [];
         if($q){
            $_SESSION["blogid"] = $id;
            $_SESSION["username"]  = $username; 
            echo "<script>window.location.href='../views/dashboard.php'</script>";
           }else{
            $msg =  $this->con->error;
            echo $msg;
        }
    }

    //login
   public function login($email,$password){
      $sql = "SELECT * FROM users WHERE email='$email'";
      $q = $this->con->query($sql);
      if($q){
        if($q->num_rows > 0){
            while($row = $q->fetch_object()){
                if(password_verify($password,$row->pass)){
                      $_SESSION["blogid"] = $row->unqid;
                      $_SESSION["username"]  = $row->username;                       
                      echo "<script>window.location.href='../views/dashboard.php'</script>";
                    }else{
                    echo "invalid password";
                }
            }
    }else{
               echo "no such email found";
    }
      }
      else{
          echo $q->error();
      }

   }
//logout
   public function logout(){
       session_destroy();
       return "<script>window.location.href='../index.php'</script>";
    }

    //generate media type
    public function mediatag ($media,$path,$style){
         $ext = pathinfo($media,PATHINFO_EXTENSION);
         if(in_array($ext,['gif','png','jpeg','jpg'])){
            return '<img src="'.$path.$media.'" class="img-thumbnail" '.$style.'></img>';
         }elseif(in_array($ext,['mp4','mpg','mpeg',"m4v"])){
              return '<video src="'.$path.$media.'" '.$style.' controls></video>';
         }else{
            return '<img src="" alt="unrecognised media type">';
         }
    }

    // filter  input
public function filter($hackvar){
    $hackvar = trim($hackvar);
    $hackvar = stripslashes($hackvar);
    $hackvar =htmlspecialchars($hackvar);
           return $hackvar; 
}


   

}



?>