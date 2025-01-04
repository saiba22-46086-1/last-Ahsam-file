
<?php
session_start();

if (!isset($_SESSION['email']) || $_SESSION['type'] !== 'doctor') {
    header('Location: ../view/login.html'); // Redirect to login if not logged in
    exit;  
}
    ?>


<html>
    <head></head>

    <body>
        <h1>DOCTOR DASHBOARD</h1>
         <a href = "doctorProfileView.php">Doctor Profile </a> 
        <a href = "doctorComplaintForm.php">Doctor complaint box  </a>
        <a href = "contact.html">Contact_Us</a>  
    </body>
    
</html>