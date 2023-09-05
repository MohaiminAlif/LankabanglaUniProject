<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Connect to the MySQL database (replace with your own database credentials)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "lbsp";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
// Retrieve form data
$passport_num = $_POST["passport_num"];
$issue_place = $_POST["issue_place"];
$issue_date = $_POST["issue_date"];
$expiry_date = $_POST["expiry_date"];


// Insert data into the database
$sql = "INSERT INTO passport ( passport_num, issue_place, issue_date, expiry_date)
        VALUES (?, ?, ?, ?)";
 

$stmt = $conn->prepare($sql);
$stmt->bind_param("ssss", $passport_num, $issue_place, $issue_date, $expiry_date);



    if ($stmt->execute()) {
        // Data inserted successfully
        header("location: nomineeForm.html");
    } else {
        // Error occurred during insertion
        echo "Error: " . $stmt->error;
    }
if ($stmt->execute()) {
    // Data inserted successfully
    header("location: nomineeForm.html") ;
} else {
    // Error occurred during insertion
    echo "Error: " . $stmt->error;
}



$stmt->close();
$conn->close();
}
?>
