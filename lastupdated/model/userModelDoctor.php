<?php

function getConnection()
{
    $conn = mysqli_connect('127.0.0.1', 'root', '', 'web_project');
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    return $conn;
}

function login($email, $password)
{
    $conn = getConnection();
    $sql = "SELECT * FROM doctor_info WHERE email = '{$email}' AND password = '{$password}'";
    $result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);

    if ($count == 1) {
        $user = mysqli_fetch_assoc($result);
        $_SESSION['name'] = $user['first_name'] . ' ' . $user['last_name'];
        return true;
    } else {
        return false;
    }
}

function addUser1( $name, $email, $phone,  $pass, $gender)
{
    $conn = getConnection();
    $sql = "INSERT INTO doctor_info ( name, email, phone,  password,  gender) 
            VALUES ('{$name}', '{$email}', '{$phone}',  '{$pass}', '{$gender}'  )";
    return mysqli_query($conn, $sql);
}




function fetchDataForDocComplaintBox($email)
{
    $conn = getConnection();
    $sql = "SELECT  name, phone, email FROM doctor_info WHERE email = '{$email}'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        return $user;
    }

    return null; // Return null if no user found
}
?>