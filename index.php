<?php 
session_start();
include('server.php'); // Make sure you include your database connection

// // Prevent page from being cached
// header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
// header("Cache-Control: post-check=0, pre-check=0", false);
// header("Pragma: no-cache");

//If user is not logged in, redirect to guest page
if(!isset($_SESSION['username'])){
    header("Location: login.php");
    exit(); // It's a good practice to exit after a header redirect
}

// Fetch the logged-in user details
$username = $_SESSION['username'];

// Query to get the user's first name
$sql = "SELECT first_name, last_name FROM users WHERE username = '$username'"; // Select only the firstName column
$result = $conn->query($sql);

// Check if the user exists
if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();  // Corrected: added parentheses
    $firstName = $user["first_name"];  // Get the first name
    $lastNameFirstLetter = substr($user["last_name"], 0, 1);  // Get the first letter of the last name
    
    // Concatenate first name with first letter of the last name
    $name = $firstName . " " . $lastNameFirstLetter . ".";
} else {
    $name = "User not found";  // In case no user is found
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Page</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
</head>
<body>
    <h2>Welcome, <span id="username"><?php echo htmlspecialchars($name); ?></span></h2>
    <a href="logout.php" onclick="return confirmLogout();" class="btn btn-dark m-5">
        Logout
    </a>
</body>

<script>
    function confirmLogout() {
        return confirm("Are you sure you want to logout?");
    }
</script>

</html>
