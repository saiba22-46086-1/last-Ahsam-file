<?php
session_start();

if (!isset($_SESSION['email']) || $_SESSION['type'] !== 'patient') {
    header('Location: ../view/login.html'); // Redirect to login if not logged in
    exit;  
}
    ?>
    
    <html>
    <head></head>

    <body>
        <h1>PATIENT DASHBOARD</h1>
        <a href = "userProfileView.php">view profile</a>  
          <a href = "complaintForm.php">complaint</a>  
          <a href = "contact.html">Contact_Us</a>  

    </body>
    
</html>