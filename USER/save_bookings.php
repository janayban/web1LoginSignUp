<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
header('Content-Type: application/json');

// Include your database connection file
include('server.php');

// Get POST data (expecting JSON)
$data = json_decode(file_get_contents("php://input"), true);

// Check if data is valid
if (!$data) {
    echo json_encode([
        "success" => false,
        "error" => "Invalid or empty input data",
        "raw_input" => file_get_contents("php://input")
    ]);
    exit;
}

// Sanitize and assign POST data
$haircut = $data['haircut'] ?? '';
$price = $data['price'] ?? 0;
$barber = $data['barber'] ?? '';
$date = $data['date'] ?? '';
$time = $data['time'] ?? '';
$discount = $data['discount'] ?? 0;

// Check if the necessary fields are not empty
if (empty($haircut) || empty($barber) || empty($date) || empty($time)) {
    echo json_encode([
        "success" => false,
        "error" => "Missing required fields"
    ]);
    exit;
}

// Prepare the SQL query (preventing SQL injection using prepared statements)
$stmt = $conn->prepare("INSERT INTO bookings (haircut, price, barber, date, time, discount) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sdsssd", $haircut, $price, $barber, $date, $time, $discount);

// Execute the query and check for success
if ($stmt->execute()) {
    echo json_encode([
        "success" => true,
        "message" => "Booking successfully saved"
    ]);
} else {
    echo json_encode([
        "success" => false,
        "error" => "Failed to save booking: " . $stmt->error
    ]);
}

// Close the prepared statement and database connection
$stmt->close();
$conn->close();
?>
