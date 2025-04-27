<?php
include('server.php'); // connect to database

session_start(); // Always start the session first

$loginSuccess = false;
$errorMessage = "";

$username = '';
$password = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get and trim the submitted form data
    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');

    // Validate if fields are filled
    if (empty($username) || empty($password)) {
        $errorMessage = "Please fill in all fields.";
    } else {
        // Query to find user by username
        $sql = "SELECT * FROM users WHERE username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $user = $result->fetch_assoc();

            // Verify the password against the hashed password
            if (password_verify($password, $user['password'])) {
                // Password is correct
                $loginSuccess = true;
                $_SESSION['username'] = $username; // Store username in session

                header("Location: index.php"); // Redirect to homepage or dashboard
                exit();
            } else {
                $errorMessage = "Incorrect Password.";
                $password = '';
            }
        } else {
            $errorMessage = "User not found.";
            $username = '';
            $password = '';
        }
    }
}
?>
