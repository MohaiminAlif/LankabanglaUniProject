<?php
// Database connection parameters
$servername = "localhost"; // Replace with your database server name
$username = "root"; // Replace with your database username
$password = ""; // Replace with your database password
$dbname = "lbsp"; // Replace with your database name

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST["name"];
    $branch = $_POST["branch"];
    $bank_ac_number  = $_POST["bank_ac_number"];
    $routing_num = $_POST["routing_num"];
    

    // Insert form data into the database
    $sql = "INSERT INTO bank_t (name, branch, bank_ac_number , routing_num)
            VALUES ('$name', '$branch', '$bank_ac_number ', '$routing_num')";

    if ($conn->query($sql) === TRUE) {
        header("Location: ../index.html");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>
