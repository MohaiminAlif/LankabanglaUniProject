<?php

session_start();
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
    $ac_branch = $_POST["ac_branch"];
    $bo_id = $_POST["bo_id"];
   
    $bo_status = "inactive";
    $operation_type = "individual"; // Set to "individual" as it's disabled in the form
    $passport_num = $_POST["passport_num"];
    $issue_place = $_POST["issue_place"];
    $issue_date = $_POST["issue_date"];
    $expiry_date = $_POST["expiry_date"];
    $introducer_id = $_POST["introducer_code"];
    $introducer_name = $_POST["introducer_name"];
    $client_code = $_SESSION['client_code'];
    // Insert data into passport_t table

    $sql_boa= "INSERT INTO boac_t (bo_id, ac_branch, operation_type,bo_status)
        VALUES (?, ?, ?, ?)";

    $stmt_boa = $conn->prepare($sql_boa);
    $stmt_boa->bind_param("ssss", $bo_id, $ac_branch, $operation_type, $bo_status);

    $sql_passport = "INSERT INTO passport_t (passport_num, issue_place, issue_date, expiry_date)
                    VALUES (?, ?, ?, ?)";
    
    $stmt_passport = $conn->prepare($sql_passport);
    $stmt_passport->bind_param("ssss", $passport_num, $issue_place, $issue_date, $expiry_date);

    // Insert data into introducer_t table
    $sql_introducer = "INSERT INTO introducer_t (introducer_id)
                      VALUES (?)";


    
    $stmt_introducer = $conn->prepare($sql_introducer);
    $stmt_introducer->bind_param("s", $introducer_id);

    $sql_ = "INSERT INTO client_t (introducer_id)
    VALUES (?)";

    $sql_client = "UPDATE client_t SET bo_id = '$bo_id' WHERE client_code = $client_code";    
    $conn->query($sql_client);



    // Begin a transaction
    $conn->begin_transaction();

    // Insert data into passport_t table
    if($stmt_boa->execute()){
    if ($stmt_passport->execute()) {
        // Insert data into introducer_t table
        if ($stmt_introducer->execute()) {
            // Data inserted successfully into both tables
            $conn->commit();
            header("location: nomineeForm.php");
        } else {
            // Error occurred during insertion into introducer_t table
            echo "Error: " . $stmt_introducer->error;
            $conn->rollback(); // Rollback the transaction
        }
    } else {
        // Error occurred during insertion into passport_t table
        echo "Error: " . $stmt_passport->error;
        $conn->rollback(); // Rollback the transaction
    }}else {
        // Error occurred during insertion into passport_t table
        echo "Error: " . $stmt_boa->error;
        $conn->rollback(); // Rollback the transaction
    }
    // Close the prepared statements
    $stmt_passport->close();
    $stmt_introducer->close();

    // Close the database connection
    $conn->close();
}
?>
