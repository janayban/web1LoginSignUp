<?php
include('server.php'); // or wherever your DB connection is

// ✅ Always define these
$registrationSuccess = false;
$errorMessage = "";

// ⬇️ Only proceed if form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize input
    $firstName = trim($_POST['firstName']);
    $lastName = trim($_POST['lastName']);
    $contact = trim($_POST['contact']);
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Check if username or contact already exists
    $checkSql = "SELECT * FROM users WHERE username = ? OR contact = ?";
    $checkStmt = $conn->prepare($checkSql);
    $checkStmt->bind_param("ss", $username, $contact);
    $checkStmt->execute();
    $result = $checkStmt->get_result();

    if ($result->num_rows > 0) {
        $existingUser = $result->fetch_assoc();
        if ($existingUser['username'] === $username) {
            $errorMessage = "Username already exists. Please choose another.";
        } elseif ($existingUser['contact'] === $contact) {
            $errorMessage = "Contact number is already in use.";
        }
    } else {
        // Insert new user
        $sql = "INSERT INTO users (first_name, last_name, contact, username, password) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssss", $firstName, $lastName, $contact, $username, $hashedPassword);

        if ($stmt->execute()) {
            $registrationSuccess = true;

            // ✅ Redirect to login
            header("Location: login.php?registered=true");
            exit(); // 🛑 Stop execution
        } else {
            $errorMessage = "Error: " . $stmt->error;
        }

        $stmt->close();
    }

    $checkStmt->close();
    $conn->close();
}
?>
