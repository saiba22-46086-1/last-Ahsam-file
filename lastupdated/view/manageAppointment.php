<?php
session_start();
require_once('../model/appointmentModel.php'); // Model file for database operations

// Fetch all appointments
$appointments = fetchAppointments();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Appointments</title>
    <link rel="stylesheet" href="styles.css"> 
</head>
<body>
    <div class="container">
        <h1>Manage Appointments</h1>

      
        <h2>Add Appointment</h2>
        <form method="post" action="../controller/manageAppointmentController.php">
           <!--
        <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="doctor_id">Doctor ID:</label>
            <input type="number" id="doctor_id" name="doctor_id" required>

            <label for="doctor_name">Doctor Name:</label>
            <input type="text" id="doctor_name" name="doctor_name" required>

            <label for="appointment_time">Time:</label>
            <input type="time" id="appointment_time" name="appointment_time" required>

            <label for="appointment_date">Date:</label>
            <input type="date" id="appointment_date" name="appointment_date" required>

            <label for="problem">Problem:</label>
            <input type="text" id="problem" name="problem" required>

            <label for="token">Token:</label>
            <input type="number" id="token" name="token" required>

            <input type="hidden" name="action" value="add">
            <button type="submit">Add Appointment</button>
            -->
        </form>

        <!-- Display Appointments -->
        <h2>Appointments</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Doctor</th>
                    <th>Time</th>
                    <th>Date</th>
                    <th>Problem</th>
                    <th>Token</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($appointments)) { ?>
                    <tr>
                        <td><?= $row['appointment_id'] ?></td>
                        <td><?= $row['name'] ?></td>
                        <td><?= $row['email'] ?></td>
                        <td><?= $row['doctor_name'] ?></td>
                        <td><?= $row['appointment_time'] ?></td>
                        <td><?= $row['appointment_date'] ?></td>
                        <td><?= $row['problem'] ?></td>
                        <td><?= $row['token'] ?></td>
                        <td>
                            
                           
                            <!-- Delete Button -->
                            <form method="post" action="../controller/manageAppointmentController.php" style="display: inline;">
                                <input type="hidden" name="appointment_id" value="<?= $row['appointment_id'] ?>">
                                <input type="hidden" name="action" value="delete">
                                <button type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>
