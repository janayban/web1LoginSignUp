<?php
header('Content-Type: application/json');

include('server.php');

// Read input
$data = json_decode(file_get_contents("php://input"), true);
$barber_id = $conn->real_escape_string($data["barber"]);
$date = $conn->real_escape_string($data["date"]);
$time = $conn->real_escape_string($data["time"]);

// Query
$sql = "SELECT id FROM appointments 
        WHERE barber_id = '$barber_id' AND date = '$date' AND time = '$time' LIMIT 1";
$result = $conn->query($sql);

// Return result
if ($result && $result->num_rows > 0) {
  echo json_encode(["available" => false]);
} else {
  echo json_encode(["available" => true]);
}

$conn->close();
?>
