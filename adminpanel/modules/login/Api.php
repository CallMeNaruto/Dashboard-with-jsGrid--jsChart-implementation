<?php

$urlParams = explode('/', $_SERVER['REQUEST_URI']);
$functionName = end($urlParams);

// remove any query parameters from the function name
$functionName = strtok($functionName, '?');

if (isset($functionName) && $functionName != '') {
    $obj = new Api();
    $obj->$functionName();
}

class Api {
    public $mysqli_user;

    public function __construct()
    {
        include('../../../config/config.php'); 
        $this->mysqli_user=$conn;
    }

    public function __destruct()
    {
        mysqli_close($this->mysqli_user);
    }
    
    public function login() {
        
        $data=array();
        $email=mysqli_real_escape_string($this->mysqli_user,$_POST['email']);
        $password=mysqli_real_escape_string($this->mysqli_user,$_POST['password']);
        $user=mysqli_query($this->mysqli_user,"SELECT * FROM `admin` where email='$email' and `password`='$password'");
        if(mysqli_num_rows($user)>0){
            $userdetails=mysqli_fetch_array($user);
            session_start();
            $_SESSION['type']='admin';
            $data['response']=true;
            $data['message']="Login Successfully";
            $data['data']=$userdetails;

        } else {
            $data['response']=false;
            $data['message']="Login Failed";
        }
        echo json_encode($data);
    }   

    public function logout() {
        session_start();
        unset($_SESSION);
        session_destroy();
        header("Location: ../../../index.php");
        exit();
    }
}