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
       
    public function index(){
        $sql = " SELECT * FROM blog
        ORDER BY RAND()
        LIMIT 5";
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

   public function login($email,$password){
      $sql = "SELECT * FROM users WHERE email='$email'";
      $q = $this->con->query($sql);
      if($q){
        if($q->num_rows > 0){
            while($row = $q->fetch_object()){
                if(password_verify($password,$row->pass)){
                      if($row->role === "admin"){
                          $_SESSION["blogid"] = $row->unqid;
                          $_SESSION["username"]  = $row->username;                       
                                echo "<script>window.location.href='../views/dashboard.php'</script>";
                        }else{
                      }$_SESSION["id"] = $row->unqid;
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

   public function logout(){
       session_destroy();
       return "<script>window.location.href='./index.php'</script>";
    }

public function filter($hackvar){
    $hackvar = trim($hackvar);
    $hackvar = stripslashes($hackvar);
    $hackvar =htmlspecialchars($hackvar);
           return $hackvar; 
}


   

}



?>