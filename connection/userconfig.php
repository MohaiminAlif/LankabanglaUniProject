<?php
 $servername = "localhost";
 $username = "root";
 $password = "";
 $dbname = "lbsp";

 
 $conn=mysqli_connect($servername,$username,$password,$dbname);
 
 if(!$conn){
     die(mysqli_error($conn));
 }
 

 
 
 if($_SERVER['REQUEST_METHOD']=='POST'){
     
     $user_type=$_POST['user_type'];
     $id=$_POST['id'];
     $pass=$_POST['pass'];
 
 
     // if($user_type =='admin_t' && $id == 'admin' && $pass == '1111'){
 
             
     //     header("Location: ../employee/dashboard.php");
 
     // }
 
     if($user_type=='client_t'){ $query ="SELECT * FROM client_t WHERE client_code = '$id' AND pass = '$pass'";}
     if($user_type=='relationshipmanager_t'){$query = "SELECT * FROM relationshipmanager_t WHERE manager_id = '$id' AND pass = '$pass'";}
     if($user_type=='headofsettlement_t'){$query = "SELECT * FROM headofsettlement_t WHERE head_id = '$id' AND pass = '$pass'";}
     else{$query ="SELECT * FROM admin_t WHERE admin_ id = '$id' AND pass = '$pass'";}
     
// $query = "SELECT * FROM client_t WHERE client_code = '$id' AND pass = '$pass'";

 
//  $result = $conn->query("SELECT * FROM client_t WHERE client_code = '$id' AND pass = '$pass'");


if ($result) {
    while ($row = $result->fetch_assoc()) {
        // Process the retrieved data here
    }
    $result->free_result(); // Free the result set when done
} else {
    // Handle query execution failure
    echo "Query failed: " . $conn->error;
}

 
    //  $result = $conn->query($query)->fetch_assoc();
 
 
 

 
         session_start();
         
         if($user_type =='client_t'){
       
            // $_SESSION = $res;
       
            $_SESSION['role'] = "client";
            // $_SESSION['name'] = $result.$row['name'];
            $_SESSION['name'] = $row['name'];
       
            
            header("Location: ../user/dashboard.php");
  
          }
  
          if($user_type =='headofsettlement_t'){
            $_SESSION = $res;
            $_SESSION['role'] = "headofsettlement";
            //$_SESSION['client_code'] = $res['client_code'];
            $_SESSION['name'] = $row['name'];
        
            
            header("Location: ../employee/hosDash.html");
  
        }

        if($user_type =='relationshipmanager_t'){

            $_SESSION = $res;
            // $_SESSION['client_code'] = $res['client_code'];
            // $_SESSION['name'] = $res['name'];
            // $_SESSION['role'] = "client";
            
            header("Location: ../employee/managerDash.php");
  
        }

        if($user_type =='admin_t'){

            $_SESSION = $res;
            $_SESSION['role'] = 'admin';        
            header("Location: ../employee/admindash.php");
  
        }        
     
     }
 
?>

