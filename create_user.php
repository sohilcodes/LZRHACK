<?php
$conn = new mysqli("localhost", "root", "", "prediction_db");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];
    $duration = $_POST["duration"];

    $expiry_date = date("Y-m-d H:i:s", strtotime("+$duration days"));
    $conn->query("INSERT INTO users (email, password, expiry_date) VALUES ('$email', '$password', '$expiry_date')");

    echo "User Created Successfully!";
}
?>
