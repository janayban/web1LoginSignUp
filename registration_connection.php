<?php
include 'server.php'; // Includes DB connection

$registrationSuccess = false;
$errorMessage = "";

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize inputs
    $firstName = trim($_POST['firstName']);
    $lastName = trim($_POST['lastName']);
    $contact = trim($_POST['contact']);
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Hash password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // 🧠 Check for existing username or contact
    $checkSql = "SELECT * FROM users WHERE username = ? OR contact = ?";
    $checkStmt = $conn->prepare($checkSql);
    $checkStmt->bind_param("ss", $username, $contact);
    $checkStmt->execute();
    $result = $checkStmt->get_result();

    if ($result->num_rows > 0) {
        // At least one record already exists
        $existingUser = $result->fetch_assoc();
        if ($existingUser['username'] === $username) {
            $errorMessage = "Username already exists. Please choose another.";
        } elseif ($existingUser['contact'] === $contact) {
            $errorMessage = "Contact number is already in use.";
        }
        $checkStmt->close();
        $conn->close();
        return;
    }
    $checkStmt->close();

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
