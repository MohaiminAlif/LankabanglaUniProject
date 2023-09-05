//<?php
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
$client_code = $_POST["client_code"];
$name = $_POST["name"];
$id_create_date = $_POST["id_create_date"];
$email = $_POST["email"];
$father_name = $_POST["father_name"];
$mother_name = $_POST["mother_name"];
$mobile = $_POST["mobile"];
$tel = $_POST["tel"];
$dob = $_POST["dob"];
$gender = $_POST["gender"];
$tin = $_POST["tin"];
$nationality = $_POST["nationality"];
$occupation = $_POST["occupation"];
$nid = $_POST["nid"];
$photo = $_POST["photo"];
$signature = $_POST["signature"];
$operation_type = $_POST["operation_type"];

$present_thana = $_POST["present_thana"];
$present_post = $_POST["present_post"];
$present_division = $_POST["present_division"];
$present_country = $_POST["present_country"];
$permanent_thana = $_POST["permanent_thana"];
$permanent_post = $_POST["permanent_post"];
$permanent_division = $_POST["permanent_division"];
$permanent_country = $_POST["permanent_country"];
$pass = $_POST["pass"];
// SQL query to insert data into the `client_t` table
$sql = "INSERT INTO client_t (
    client_code, name, id_create_date, email, father_name, mother_name, mobile, tel, dob, gender, 
    tin, nationality, occupation, nid, photo, signature, operation_type, 
    present_thana, present_post, present_division, present_country, permanent_thana, permanent_post, 
    permanent_division, permanent_country, pass
) VALUES (
    '$client_code', '$name', '$id_create_date', '$email', '$father_name', '$mother_name', '$mobile', 
    '$tel', '$dob', '$gender', '$tin', '$nationality', '$occupation', '$nid', '$photo', '$signature', 
    '$operation_type','$present_thana', '$present_post', 
    '$present_division', '$present_country', '$permanent_thana', '$permanent_post', '$permanent_division', 
    '$permanent_country', '$pass'
)";

if ($conn->query($sql) === TRUE) {
    // Redirect to a success page or display a success message
    header("Location: bank_details.html");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();
?>
