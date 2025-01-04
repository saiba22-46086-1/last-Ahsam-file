<?php
function getConnection() {
    $conn = mysqli_connect("localhost", "root", "", "web_project");
    if (!$conn) {
        die("Database connection failed: " . mysqli_connect_error());
    }
    return $conn;
}

function fetchAppointments() {
    $conn = getConnection();
    $sql = "SELECT * FROM appointment_request";
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);
    return $result;
}

function addAppointment($data) {
    $conn = getConnection();
    $sql = "INSERT INTO appointment_request (name, email, doctor_id, doctor_name, appointment_time, appointment_date, problem, token)
            VALUES ('{$data['name']}', '{$data['email']}', '{$data['doctor_id']}', '{$data['doctor_name']}', '{$data['appointment_time']}', '{$data['appointment_date']}', '{$data['problem']}', '{$data['token']}')";
    mysqli_query($conn, $sql);
    mysqli_close($conn);
}

function updateAppointment($id, $data) {
    $conn = getConnection();
    $sql = "UPDATE appointment_request 
            SET name='{$data['name']}', email='{$data['email']}', doctor_id='{$data['doctor_id']}', doctor_name='{$data['doctor_name']}', 
                appointment_time='{$data['appointment_time']}', appointment_date='{$data['appointment_date']}', problem='{$data['problem']}', token='{$data['token']}'
            WHERE appointment_id='{$id}'";
    mysqli_query($conn, $sql);
    mysqli_close($conn);
}

function deleteAppointment($id) {
    $conn = getConnection();
    $sql = "DELETE FROM appointment_request WHERE appointment_id='{$id}'";
    mysqli_query($conn, $sql);
    mysqli_close($conn);
}
?>