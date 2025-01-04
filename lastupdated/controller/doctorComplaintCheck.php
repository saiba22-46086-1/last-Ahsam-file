<?php

session_start();

if (!isset($_SESSION['email'])) {
    echo "Error: Session email not found.";
    exit;
}

$session_email = $_SESSION['email'];

$host = "localhost";
$username = "root";
$password = "";
$database = "web_project";

$conn = mysqli_connect($host, $username, $password, $database);

if (!$conn) {
    echo "Connection failed: " . mysqli_connect_error();
    exit;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $complaint = $_POST['complaint'];

    if (empty($name) ||  empty($email) || empty($phone) || empty($complaint)) {
        echo "Please fill out all required fields.";
        exit;
    }

    $query = "SELECT name, phone FROM doctor_info WHERE email = '$email'";
    $result = mysqli_query($conn, $query);

   // f etches the first result row

    if (mysqli_num_rows($result) > 0) {                 
        $doctor_info = mysqli_fetch_assoc($result);

      
        $insertQuery = "INSERT INTO dcomplaints (email, name, phone, complaint) 
                        VALUES ('$email', '{$doctor_info['name']}', '{$doctor_info['phone']}', '$complaint')";

        if (mysqli_query($conn, $insertQuery)) {
            echo "Complaint submitted successfully.";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        echo "User not found.";
    }
}

mysqli_close($conn);


?>
