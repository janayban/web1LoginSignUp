<?php
// Handle form submission
$registrationSuccess = false;
$errorMessage = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Database connection
    $host = "localhost";
    $dbname = "trimclick_db";
    $username = "root";
    $password = "";

    $conn = new mysqli($host, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Sanitize inputs
    $firstName = trim($_POST['firstName']);
    $lastName = trim($_POST['lastName']);
    $contact = trim($_POST['contact']);
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Hash password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);


    // Insert into database
    $sql = "INSERT INTO users (first_name, last_name, contact, username, password) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $firstName, $lastName, $contact, $username, $hashedPassword);

    if ($stmt->execute()) {
        $registrationSuccess = true;
    } else {
        $errorMessage = "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>