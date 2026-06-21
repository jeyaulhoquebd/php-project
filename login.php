<?php
include 'db.php';
session_start();

if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        
        // হ্যাশ করা পাসওয়ার্ডের সাথে ইনপুট ম্যাচ করা
        if (password_verify($password, $row['password'])) {
            $_SESSION['username'] = $row['username'];
            header("Location: dashboard.php");
            exit();
        } else {
            echo "<script>alert('ভুল পাসওয়ার্ড!');</script>";
        }
    } else {
        echo "<script>alert('এই নামে কোনো ইউজার পাওয়া যায়নি!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8">
    <title>লগইন</title>
</head>
<body>
    <h2>লগইন ফর্ম</h2>
    <form action="login.php" method="POST">
        <input type="text" name="username" placeholder="ইউজারনেম" required><br><br>
        <input type="password" name="password" placeholder="পাসওয়ার্ড" required><br><br>
        <button type="submit" name="login">লগইন</button>
    </form>
    <p>নতুন অ্যাকাউন্ট? <a href="register.php">এখানে রেজিস্টার করুন</a></p>
</body>
</html>