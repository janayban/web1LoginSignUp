<?php
include('server.php'); // Connect to database

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userId = intval($_POST['user_id']); // Get user ID from POST

    // Delete user from database
    $query = "DELETE FROM users WHERE user_id = $userId";
    if (mysqli_query($conn, $query)) {
        echo "success";
    } else {
        echo "error";
    }
} else {
    echo "invalid request";
}
?>
