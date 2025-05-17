<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

include("theme-header.php");
include("connect.php"); // فقط این یکی کافیه

// اعتبارسنجی داده‌های ورودی
$name = htmlspecialchars(trim($_POST["name"]));
$family = htmlspecialchars(trim($_POST["family"]));
$username = htmlspecialchars(trim($_POST["username"]));
$password = trim($_POST["password"]);
$repassword = trim($_POST["repassword"]);

// بررسی تطابق رمزها
if ($password !== $repassword) {
    echo '<div class="container mt-4">
            <div class="alert alert-danger">
                <i class="fas fa-exclamation-triangle me-2"></i> رمز عبور و تکرار آن مطابقت ندارند
                <a href="register.php" class="btn btn-sm btn-outline-primary mt-2">بازگشت به فرم ثبت نام</a>
            </div>
          </div>';
    exit();
}

// بررسی اتصال
if (!$conn) {
    die("اتصال به پایگاه داده ناموفق بود: " . mysqli_connect_error());
}
mysqli_query($conn, "SET CHARACTER set utf8");

// بررسی وجود نام کاربری تکراری
$check_query = "SELECT * FROM `user` WHERE `username` = ?";
$stmt = mysqli_prepare($conn, $check_query);
mysqli_stmt_bind_param($stmt, "s", $username);
mysqli_stmt_execute($stmt);
mysqli_stmt_store_result($stmt);

if (mysqli_stmt_num_rows($stmt) > 0) {
    echo '<div class="container mt-4">
            <div class="alert alert-danger">
                <i class="fas fa-exclamation-triangle me-2"></i> نام کاربری قبلاً ثبت شده است
                <a href="register.php" class="btn btn-sm btn-outline-primary mt-2">بازگشت به فرم ثبت نام</a>
            </div>
          </div>';
    mysqli_close($conn);
    include("theme-footer.html");
    exit();
}

// درج کاربر جدید
$insert_query = "INSERT INTO `user` (`name`, `family`, `username`, `password`, `type`) VALUES (?, ?, ?, ?, 0)";
$stmt = mysqli_prepare($conn, $insert_query);
mysqli_stmt_bind_param($stmt, "ssss", $name, $family, $username, $password);
$result = mysqli_stmt_execute($stmt);

if ($result) {
    echo '<div class="container mt-4">
            <div class="alert alert-success text-center">
                <i class="fas fa-check-circle me-2"></i> ثبت نام با موفقیت انجام شد
                <meta http-equiv="refresh" content="2; url=login.php">
                <p class="mt-2">در حال انتقال به صفحه ورود...</p>
            </div>
          </div>';
} else {
    echo '<div class="container mt-4">
            <div class="alert alert-danger">
                <i class="fas fa-exclamation-triangle me-2"></i> خطا در ثبت نام
                <p class="mt-2">' . mysqli_error($conn) . '</p>
                <a href="register.php" class="btn btn-sm btn-outline-primary mt-2">بازگشت به فرم ثبت نام</a>
            </div>
          </div>';
}

mysqli_close($conn);
include("theme-footer.html");
?>
