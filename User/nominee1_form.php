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

    // Retrieve form data
    
    $nominee_id = $_POST['nominee_id'];
    $name = $_POST['name'];
    $relationship = $_POST['relationship'];
    
    $percentage = $_POST['percentage'];
    $dob = $_POST['dob'];
    $residnecy = $_POST['residnecy'];
    $nationality = $_POST['nationality'];
    $nid = $_POST['nid'];
    $guardian_name = $_POST['guardian_name'];
    $address = $_POST['address'];
    $age_status = $_POST['age_status'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $rela = $_POST['rela'];

    // Perform data validation here if needed

    // Insert data into the 'nominee_t' table
    $query = "INSERT INTO nominee_t (nominee_id,name, percentage, dob, residnecy, relationship, nationality, nid, age_status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($query);
    $stmt->bind_param("sssssssss",$nominee_id, $name, $percentage, $dob, $residnecy, $relationship, $nationality, $nid, $age_status);

    if ($stmt->execute()) {
        // Insertion was successful for the common data
        echo "Common data inserted successfully for Nominee!";
        header("location: poaForm.php");
    } else {
        // Insertion failed for the common data
        echo "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();

    // Insert data into the 'adult' or 'minor' table based on age_status
    if ($age_status == 'adult') {

        // Insert data into the 'adult' table
        $adult_query = "INSERT INTO adult (nominee_id, mobile, email) VALUES (?, ?, ?)";
        echo "here";
        $stmt_adult = $conn->prepare($adult_query);
        $stmt_adult->bind_param("sss", $nominee_id, $mobile, $email);

        if ($stmt_adult->execute()) {
            // Insertion was successful for the 'adult' table
            header("location: poaForm.php");
        } else {
            // Insertion failed for the 'adult' table
            echo "Error: " . $stmt_adult->error;
        }

        // Close the 'adult' statement
        $stmt_adult->close();
    } elseif ($age_status == 'minor') {
        // Insert data into the 'minor' table
        $minor_query = "INSERT INTO minor (nominee_id, guardian_name, address,rela) VALUES (?,?, ?, ?)";
        echo "there";
        $stmt_minor = $conn->prepare($minor_query);
        $stmt_minor->bind_param("ssss", $nominee_id, $guardian_name, $address, $rela);

        if ($stmt_minor->execute()) {
            // Insertion was successful for the 'minor' table
           header("location: poaForm.html");
        } else {
            // Insertion failed for the 'minor' table
            echo "Error: " . $stmt_minor->error;
        }

        // Close the 'minor' statement
        $stmt_minor->close();
    }

    // Close the database connection
    $conn->close();
}
?>
