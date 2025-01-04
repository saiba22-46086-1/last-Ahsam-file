<?php 
session_start();
if (!isset($_SESSION['email'])) {
    header('Location: ../view/login.html'); // Redirect to login if not logged in
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Email and Password</title>
    <link rel="stylesheet" href="../asset/profileStyle.css">
</head>
<body>
    <div class="container">
        <h1>Update Email and Password</h1>
        <form method="POST" action="../controller/processUpdateEmailPassword.php"> <!-- Separate action file -->
           
            <label for="new_password">New Password:</label>
            <input type="password" id="new_password" name="new_password" placeholder="Enter new password" required>

            <button type="submit">Update</button>
        </form>
    </div>
</body>
</html>
