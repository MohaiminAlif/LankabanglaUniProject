<?php
// Database connection parameters
$servername = "localhost"; // Replace with your database server name
$username = "root"; // Replace with your database username
$password = ""; // Replace with your database password
$dbname = "lbsp1"; // Replace with your database name

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $client_code = $_POST["client_code"];
    $name = $_POST["name"];
    $father_name = $_POST["father_name"];
    $gender = $_POST["gender"];
    $dob = $_POST["dob"];
    $mobile = $_POST["mobile"];
    $tel = $_POST["tel"];
    $nationality = $_POST["nationality"];
    $present_address = $_POST["present_address"];
    $permanent_address = $_POST["permanent_address"];
    $email = $_POST["email"];
    $occupation = $_POST["occupation"];
    $tin = $_POST["tin"];
    $photo = $_POST["photo"];
    $signature = $_POST["signature"];

    // Insert form data into the database
    $sql = "INSERT INTO corporateacholder_t (client_code, name, father_name, gender, dob, mobile, tel, nationality, present_address, permanent_address, email, occupation, tin, photo, signature)
            VALUES ('$client_code', '$name', '$father_name', '$gender', '$dob', '$mobile', '$tel', '$nationality', '$present_address', '$permanent_address', '$email', '$occupation', '$tin', '$photo', '$signature')";

    if ($conn->query($sql) === TRUE) {
        header("Location: dashboard.html");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Form submission failed.";
}

// Close the database connection
$conn->close();
?>
