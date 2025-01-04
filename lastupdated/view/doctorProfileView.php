<?php 
session_start();
require_once '../model/userModelProfile.php';

$email = isset($_SESSION['email']) ? $_SESSION['email'] : null;
if ($email) {
    $userData = fetchDocDataByEmail($email); 
    $fullName = ($userData['first_name'] ?? '') . ' ' . ($userData['last_name'] ?? '');
} else {
    header('Location: ../view/login.html'); 
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="../asset/profileStyle.css">
</head>
<body>
    <div class="container">
        <h1>User Profile</h1>
        <form method="POST" action="../controller/processUpdateDoctor.php"> 
           
            

            <label for="full_name">Full Name:</label>
            <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($userData['name']); ?>" readonly>

            <label for="phone">Phone:</label>
            <input type="text" id="phone" name="phone" value="<?php echo htmlspecialchars($userData['phone'] ?? ''); ?>" readonly>

            
         
            <label for="email">Email:</label>
            <input type="email" id="email" name="new_email" value="<?php echo htmlspecialchars($userData['email'] ?? ''); ?>" required>

            <label for="address">Speciality:</label>
            <input type="text" id="Speciality" name="Speciality" value="<?php echo htmlspecialchars($userData['speciality'] ?? ''); ?>" readonly>

           
           

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" value="<?php echo htmlspecialchars($userData['password'] ?? ''); ?>" readonly>

            
        </form>

        <a href="updateDocEmailPass.php" class="update-link">Edit profile</a> 
    </div>
</body>
</html>