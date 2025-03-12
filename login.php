<?php
session_start();
$conn = new mysqli("localhost", "root", "", "prediction_db");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $result = $conn->query("SELECT * FROM users WHERE email='$email' AND password='$password'");
    $user = $result->fetch_assoc();

    if ($user) {
        $_SESSION["email"] = $email;
        $_SESSION["expiry"] = $user["expiry_date"];

        if (strtotime($user["expiry_date"]) > time()) {
            header("Location: prediction.html");
        } else {
            echo "Access expired! Contact Admin.";
        }
    } else {
        echo "Invalid Credentials!";
    }
}
?>
