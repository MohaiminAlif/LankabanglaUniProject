<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lbsp";

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process the form data and insert it into the database

// Assuming you already have a database connection ($conn)

// Define your form data or variables here

echo $_POST["type"];

if($_POST["type"] === "relationshipmanager_t"){
    
    $id =  date("Y-m-d H:i:s");
    $name = $_POST["name"];
    $join_date = date("d-m-Y");
    $email = $_POST["email"];
    $photo = $_POST["photo"];
    $signature = $_POST["signature"];
    $address = $_POST["address"];
    $head_id = $_POST["head_id"];
    $pass = $_POST["pass"];
    $mobile = $_POST["mobile"];

    // SQL query to insert data into the `client_t` table
    $sql = "INSERT INTO relationshipmanager_t (
    manager_id, name, join_date, email, address, mobile, photo, signature, head_id, pass
    ) VALUES (
    '$id', '$name', '$join_date', '$email', '$address', '$mobile', '$photo', '$signature', '$head_id', '$pass'
    )";

}


if($_POST["type"] === "headofsettlement_t"){


    
  
    $id =  date("Y-m-d H:i:s");
    $name = $_POST["name"];
    $join_date = date("d-m-Y");
    $email = $_POST["email"];
    $photo = $_POST["photo"];
    $signature = $_POST["signature"];
    $address = $_POST["address"];
    $mobile = $_POST["mobile"];
    
    $pass = $_POST["pass"];
  
    // SQL query to insert data into the `client_t` table
    $sql = "INSERT INTO headofsettlement_t (
    head_id, name, join_date, email, address, mobile, photo, signature, pass
  ) VALUES (
    '$id', '$name', '$join_date', '$email', '$address', '$mobile', '$photo', '$signature', '$pass'
  )";
  
  }
  



if ($conn->query($sql) === TRUE) {
    // Redirect to a success page or display a success message
    header("Location: dashboard.php");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();
?>