<?php
$success=0;
$user=0;

if($_SERVER['REQUEST_METHOD']=='POST'){
    include 'connect.php';

    $employeeID=$_POST['employeeID'];
    $password=$_POST['password'];

    $sql="SELECT*from employee_t where employeeID='$employeeID'";
    $result=mysqli_query($con,$sql);
    if($result){
        $num=mysqli_num_rows($result);
        if($num>0){
            $user=1;
        }
        else{
            $sql="insert into employee_t (employeeID,password)
             values('$employeeID','$password')";
            $result=mysqli_query($con,$sql);
            if($result){
                $success=1;
            }
            else{
                die(mysqli_error($con));
            }
        }
    }
}

?>