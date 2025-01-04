<?php
session_start();
require_once '../model/userModelProfile.php'; // Include the model file for database operations

// Check if user is logged in
if (!isset($_SESSION['email'])) {
    header('Location: ../view/login.html'); // If not logged in, redirect to the login page
    exit;
}

$currentEmail = $_SESSION['email']; // Get the current logged-in user's email from the session
$newPassword = $_POST['new_password'] ?? ''; // Get the new password from the form (if submitted)

// Check if the new password is at least 8 characters long
if (strlen($newPassword) >= 8) {

    // Attempt to update the password by calling the update function
    $updateSuccess = updateUserPassword($currentEmail, $newPassword);

    // Check if the update was successful
    if ($updateSuccess) {
        echo "<p>Password updated successfully.</p>";
        echo "<a href='../view/userProfileView.php'>Back to Profile</a>"; // Provide a link to return to the profile
    } else {
        echo "<p>Error updating password. Please try again later.</p>"; // If the update failed
    }
} else {
    echo "<p>Password must be at least 8 characters long.</p>"; // If the password is too short
}
?>
