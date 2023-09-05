
<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lbsp";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT * FROM client_t";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Process the retrieved data
    while ($row = $result->fetch_assoc()) {
        echo "Name: " . $row["name"]. " - Email: " . $row["email"]. "<br>";
    }
} else {
    echo "No results found";
}






?>

