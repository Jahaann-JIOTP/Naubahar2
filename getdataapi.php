<?php
$conn = mysqli_connect('65.0.16.20', 'jahaann', 'Jahaann#321', 'status');
$result = $conn->query("SELECT id,status as status FROM unit_1");
while ($rows = $result->fetch_assoc()) {
    if ($rows['status'] == 'up') {
        $api_url = "http://13.234.241.103:1880/latestnaubahar1";

        // Read JSON file
        $json_data = file_get_contents($api_url);

        // Decode JSON data into PHP array
        $response_data = json_decode($json_data);

        // Check if JSON decoding was successful
        if ($response_data === null) {
            die("Failed to decode JSON data.");
        }

        // Encode the PHP array back to JSON and print it
        $json_response = json_encode($response_data, JSON_PRETTY_PRINT);
        header('Content-Type: application/json');
        echo $json_response;
    } else {
        echo "NAN";
    }
}
