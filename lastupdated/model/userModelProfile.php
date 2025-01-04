<?php

function getConnection() {
    $conn = mysqli_connect('localhost', 'root', '', 'web_project');
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    return $conn;
}

// Function to fetch user data by email
function fetchUserDataByEmail($email) {
    $conn = getConnection();

    // Escape the input to prevent SQL injection
    $email = mysqli_real_escape_string($conn, $email);

    // SQL query to fetch user data by email
    $sql = "SELECT * FROM user_info WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        return mysqli_fetch_assoc($result); // Return user data as an associative array
    }

    return null;
}

// Function to fetch doctor data by email
function fetchDocDataByEmail($email) {
    $conn = getConnection();

    // Escape the input to prevent SQL injection
    $email = mysqli_real_escape_string($conn, $email);

    // SQL query to fetch doctor data by email
    $sql = "SELECT * FROM doctor_info WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        return mysqli_fetch_assoc($result); // Return doctor data as an associative array
    }

    return null;
}

// Function to update only the password for users
function updateUserPassword($currentEmail, $newPassword) {
    $conn = getConnection();

    // Escape inputs to prevent SQL injection
    $currentEmail = mysqli_real_escape_string($conn, $currentEmail);
    $newPassword = mysqli_real_escape_string($conn, $newPassword);

    // SQL query to update the password
    $sql = "UPDATE user_info 
            SET password = '$newPassword' 
            WHERE email = '$currentEmail'";

    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);

    return $result; // Return true if update was successful
}

// Function to update only the password for doctors
function updateDocPassword($currentEmail, $newPassword) {
    $conn = getConnection();

    // Escape inputs to prevent SQL injection
    $currentEmail = mysqli_real_escape_string($conn, $currentEmail);
    $newPassword = mysqli_real_escape_string($conn, $newPassword);

    // SQL query to update the password
    $sql = "UPDATE doctor_info 
            SET password = '$newPassword' 
            WHERE email = '$currentEmail'";

    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);

    return $result; // Return true if update was successful
}
?>
