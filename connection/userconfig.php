
<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lbsp";

$conn=mysqli_connect($servername,$username,$password,$dbname);

if(!$conn){
    die(mysqli_error($con));
}



if($_SERVER['REQUEST_METHOD']=='POST'){
    
    $user_type=$_POST['user_type'];
    $id=$_POST['id'];
    $pass=$_POST['pass'];


    if($user_type =='admin_t' && $id == 'admin' && $pass == '1111'){

            
        header("Location: ../employee/dashboard.php");

    }

    if($user_type=='client_t'){ $query ="SELECT * FROM client_t WHERE client_code = '$id' AND pass = '$pass'";}
    if($user_type=='relationshipmanager_t'){$query = "SELECT * FROM relationshipmanager_t WHERE manager_id = '$id' AND pass = '$pass'";}
    if($user_type=='headofsettlement_t'){$query = "SELECT * FROM headofsettlement_t WHERE head_id = '$id' AND pass = '$pass'";}
    
    
if($query != null){
    echo $query;
};

    $res = $conn->query($query)->fetch_assoc();



    if($res == null){
      $invalid=1;
      
    }else{

        session_start();
        
        if($user_type =='client_t'){

          $_SESSION = $res;
          $_SESSION['client_code'] = $res['client_code'];
          $_SESSION['role'] = "client";
          
          
          header("Location: ../user/dashboard.php");

        }

        if($user_type =='headofsettlement_t'){
            $_SESSION['client_code'] = $res['client_code'];
            $_SESSION['name'] = $res['name'];
            $_SESSION['role'] = "client";
            
            header("Location: ../employee/hosDash.html");
  
        }

        if($user_type =='relationshipmanager_t'){
            $_SESSION['client_code'] = $res['client_code'];
            $_SESSION['name'] = $res['name'];
            $_SESSION['role'] = "client";
            
            header("Location: ../employee/hosDash.html");
  
        }

        

       
    
    }


   }





?>

