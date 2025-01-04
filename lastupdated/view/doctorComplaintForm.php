<?php
    session_start();
    require_once '../model/userModelDoctor.php';

    // Check if the user is logged in
    if (!isset($_SESSION['email'])) {
        header('Location: ../view/login.html'); 
        exit;
    }

  
    $email = $_SESSION['email'];
    $userData = fetchDataForDocComplaintBox($email);
    $name = $userData['name'] ?? '';

    $userEmail = $userData['email'] ?? '';
    $userPhone = $userData['phone'] ?? '';
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complaint Form</title>
    <link rel="stylesheet" href="../asset/complaint.css">
</head>

<body>
    <div class="complaint">
        <h1>Complaint Form</h1>
        <p>Please fill out the form below to submit your complaint</p>
        <form action="../controller/doctorComplaintCheck.php" method="POST">

            <label for="name"> Name:</label>
            <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($name); ?>" required>

        

            <label for="email">Email Address:</label>
            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($userEmail); ?>" required readonly>

            <label for="phone">Phone Number:</label>
            <input type="tel" id="phone" name="phone" value="<?php echo htmlspecialchars($userPhone); ?>" required>

            <label>Complaint Details</label>
            <textarea name="complaint" rows="4" placeholder="Describe your complaint here..." required></textarea>

            <button type="submit" class="submit-btn">Submit Complaint</button>
        </form>
    </div>
</body>

</html>