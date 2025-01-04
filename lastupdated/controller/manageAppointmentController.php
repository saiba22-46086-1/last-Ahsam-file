<?php
require_once('../model/appointmentModel.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';

    if ($action === 'add') {
        $data = [
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'doctor_id' => $_POST['doctor_id'],
            'doctor_name' => $_POST['doctor_name'],
            'appointment_time' => $_POST['appointment_time'],
            'appointment_date' => $_POST['appointment_date'],
            'problem' => $_POST['problem'],
            'token' => $_POST['token']
        ];
        addAppointment($data);



        
    } elseif ($action === 'delete') {
        $id = $_POST['appointment_id'];
        deleteAppointment($id);
    } elseif ($action === 'edit') {
        $id = $_POST['appointment_id'];
        $data = [
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'doctor_id' => $_POST['doctor_id'],
            'doctor_name' => $_POST['doctor_name'],
            'appointment_time' => $_POST['appointment_time'],
            'appointment_date' => $_POST['appointment_date'],
            'problem' => $_POST['problem'],
            'token' => $_POST['token']
        ];
        updateAppointment($id, $data);
    }

    header('Location: ../view/manageAppointment.php');
    exit;
}
