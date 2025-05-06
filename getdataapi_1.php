<?php
$conn = mysqli_connect("65.0.16.20", "jahaann", "Jahaann#321", 'status');
$result = $conn->query("SELECT id,status as status FROM unit_2");
while ($rows = $result->fetch_assoc()) {
    if ($rows['status'] == 'up') {
$api_url_1 = "http://13.234.241.103:1880/latestunit2";

// Read JSON file
$json_data_1 = file_get_contents($api_url_1);

// Decode JSON data into PHP array
$response_data_1 = json_decode($json_data_1);

// Check if JSON decoding was successful
if ($response_data_1 === null) {
    die("Failed to decode JSON data.");
}

// Encode the PHP array back to JSON and print it
$json_response_1 = json_encode($response_data_1, JSON_PRETTY_PRINT);
header('Content-Type: application/json');
echo $json_response_1;
} else {
    echo "NAN";
}
}
?>