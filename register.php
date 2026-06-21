<?php
include 'db.php';

if (isset($_POST['register'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];

    // পাসওয়ার্ড হ্যাশ করা (Security এর জন্য)
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // ইউজারনেম বা ইমেইল আগে থেকেই আছে কিনা চেক করা
    $check_user = "SELECT * FROM users WHERE username='$username' OR email='$email'";
    $result = mysqli_query($conn, $check_user);

    if (mysqli_num_rows($result) > 0) {
        echo "<script>alert('ইউজারনেম বা ইমেইলটি ইতিপূর্বে ব্যবহার করা হয়েছে!');</script>";
    } else {
        // ডাটাবেজে ডাটা ইনসার্ট করা
        $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$hashed_password')";
        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('রেজিস্ট্রেশন সফল হয়েছে! লগইন করুন।'); window.location='login.php';</script>";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8">
    <title>রেজিস্ট্রেশন</title>
</head>
<body>
    <h2>রেজিস্ট্রেশন ফর্ম</h2>
    <form action="register.php" method="POST">
        <input type="text" name="username" placeholder="ইউজারনেম" required><br><br>
        <input type="email" name="email" placeholder="ইমেইল" required><br><br>
        <input type="password" name="password" placeholder="পাসওয়ার্ড" required><br><br>
        <button type="submit" name="register">রেজিস্টার</button>
    </form>
    <p>অ্যাকাউন্ট আছে? <a href="login.php">লগইন করুন</a></p>
</body>
</html>