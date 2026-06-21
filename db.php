<?php
$host = "localhost";
$user = "root"; // আপনার ডাটাবেজ ইউজারনেম
$pass = "";     // আপনার ডাটাবেজ পাসওয়ার্ড
$dbname = "user_system";

$conn = mysqli_connect($host, $user, $pass, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>