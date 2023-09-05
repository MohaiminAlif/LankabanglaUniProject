<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Create a database connection (update with your database credentials)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "lbsp";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


    header("location: dashboard.php");
    // Retrieve form data
    // $poa_id = date("Y-m-d H:i:s");
    // $name = $_POST['name'];
    // $mobile = $_POST['mobile'];
    // $tel = $_POST['telephone'];
    // $email = $_POST['email'];
    // $address = $_POST['address'];
    
    // $passport_num = '333333333s3';
   

    // // Perform data validation here if needed

    // // Insert data into the 'poa_t' table
    // $query = "INSERT INTO poa_t ( poa_id, name, mobile, tel, email, address, passport_num) 
    //           VALUES ( ?, ?, ?, ?, ?, ?, ?)";

    // $stmt = $conn->prepare($query);
    // $stmt->bind_param($poa_id, $name, $mobile, $tel, $email, $address, $passport_num);
 

    // if ($stmt->execute()) {
    //     // Insertion was successful
    //     echo "Data inserted successfully for Power of Attorney!";
    //     header("location: dashboard.php");
    // } else {
    //     // Insertion failed
    //     echo "Error: " . $stmt->error;
    // }

    // Close the statement
    $stmt->close();

    // Close the database connection
    $conn->close();
}
?>
