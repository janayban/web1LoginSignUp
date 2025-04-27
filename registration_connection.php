<?php
session_start();
include('server.php');

$registrationSuccess = false;
$errorMessage = "";

// Set fallback values to repopulate the form
$firstName = trim($_POST['firstName'] ?? '');
$lastName = trim($_POST['lastName'] ?? '');
$contact = trim($_POST['contact'] ?? '');
$username = trim($_POST['username'] ?? '');
$password = trim($_POST['password'] ?? '');
$confirmPassword = trim($_POST['confirmPassword'] ?? '');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Basic required field validation
    if (empty($firstName) || empty($lastName) || empty($contact) || empty($username) || empty($password) || empty($confirmPassword)) {
        $errorMessage = "All fields are required.";
    } elseif ($password !== $confirmPassword) {
        $errorMessage = "Passwords do not match.";
    } else {
        // Check if username or contact already exists
        $checkSql = "SELECT contact, username FROM users WHERE contact = ? OR username = ?";
        $checkStmt = $conn->prepare($checkSql);
        $checkStmt->bind_param("ss", $contact, $username);
        $checkStmt->execute();
        $result = $checkStmt->get_result();

        if ($result->num_rows > 0) {
            $contactExists = false;
            $usernameExists = false;
        
            while ($existingUser = $result->fetch_assoc()) {
                if ($existingUser['contact'] == $contact) {
                    $contactExists = true;
                }
                if ($existingUser['username'] == $username) {
                    $usernameExists = true;
                }
            }
        
            if ($contactExists && $usernameExists) {
                $errorMessage = "Contact number and username are already in use.";
                $contact = '';
                $username = '';
            } 
            elseif ($contactExists) {
                $errorMessage = "Contact number is already in use.";
                $contact = '';
            } 
            elseif ($usernameExists) {
                $errorMessage = "Username already exists. Please choose another.";
                $username = '';
            }
        
        } 
        else {
            // Insert user
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $insertSql = "INSERT INTO users (first_name, last_name, contact, username, password) VALUES (?, ?, ?, ?, ?)";
            $insertStmt = $conn->prepare($insertSql);
            $insertStmt->bind_param("sssss", $firstName, $lastName, $contact, $username, $hashedPassword);

            if ($insertStmt->execute()) {
                $registrationSuccess = true; // Set this to display the success message
            } else {
                $errorMessage = "Registration failed. Please try again.";
            }

            $insertStmt->close();
        }

        $checkStmt->close();
    }

    $conn->close();
}
?>
