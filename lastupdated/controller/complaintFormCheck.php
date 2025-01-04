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
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $complaint = $_POST['complaint'];

    if (empty($first_name) || empty($last_name) || empty($email) || empty($phone) || empty($complaint)) {
        echo "Please fill out all required fields.";
        exit;
    }

    // Fetch user information from `user_info` table
    $query = "SELECT first_name, last_name, phone FROM user_info WHERE email = '$email'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $user_info = mysqli_fetch_assoc($result);

        // Insert complaint into `pcomplaints` table
        $insertQuery = "INSERT INTO pcomplaints (email, first_name, last_name, phone, complaint) 
                        VALUES ('$email', '{$user_info['first_name']}', '{$user_info['last_name']}', '{$user_info['phone']}', '$complaint')";

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
