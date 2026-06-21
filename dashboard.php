<?php
session_start();

// ইউজার লগইন করা না থাকলে লগইন পেজে পাঠিয়ে দেবে
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8">
    <title>ড্যাশবোর্ড</title>
</head>
<body>
    <h2>স্বাগতম, <?php echo $_SESSION['username']; ?>!</h2>
    <p>আপনি সফলভাবে লগইন করেছেন।</p>
    <br>
    <a href="logout.php">লগআউট করুন</a>
</body>
</html>