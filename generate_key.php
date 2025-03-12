<?php
$conn = new mysqli("localhost", "root", "", "prediction_db");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $duration = $_POST["duration"];

    $key = md5(uniqid());
    $expiry_date = date("Y-m-d H:i:s", strtotime("+$duration days"));
    $conn->query("INSERT INTO keys (email, key_code, expiry_date) VALUES ('$email', '$key', '$expiry_date')");

    echo "Your Key: " . $key;
}
?>
