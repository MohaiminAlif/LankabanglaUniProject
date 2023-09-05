<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Connect to the MySQL database (replace with your own database credentials)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "lbsp1";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get data from the form
    $client_code = $_POST["client_code"];
    $name = $_POST["name"];
    $father_name = $_POST["father_name"];
    $mother_name = $_POST["mother_name"];
    $dob = $_POST["dob"];
    $gender = $_POST["gender"];
    $nationality = $_POST["nationality"];
    $present_address = $_POST["present_address"];
    $mobile = $_POST["mobile"];
    $tel = $_POST["tel"];
    $email = $_POST["email"];
    $occupation = $_POST["occupation"];
    $tin = $_POST["tin"];

    // Insert data into the database
    $sql = "INSERT INTO jointacholder_t (client_code, name, father_name, mother_name, dob, gender, nationality, present_address, mobile, tel, email, occupation, tin)
            VALUES ('$client_code', '$name', '$father_name', '$mother_name', '$dob', '$gender', '$nationality', '$present_address', '$mobile', '$tel', '$email', '$occupation', '$tin')";

    if ($conn->query($sql) === TRUE) {
        header("Location: dashboard.html");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>
