
<?php
session_start();

if (!isset($_SESSION['email']) || $_SESSION['type'] !== 'admin') {
    header('Location: ../view/login.html'); // Redirect to login if not logged in
    exit;  
}
    ?>




<html>
    <head></head>

    <body>
        <h1>ADMIN DASHBOARD</h1>
        <a href = "manageAppointment.php">Manage Appointment</a>
    </body>

</html>
