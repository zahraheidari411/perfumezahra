<?php
// اتصال به پایگاه داده
$dblink = mysqli_connect("localhost", "root", "", "perfume");

// بررسی اتصال
if (!$dblink) {
    die("خطا در اتصال به پایگاه داده: " . mysqli_connect_error());
}

// تنظیم کاراکتر ست برای پشتیبانی از فارسی
mysqli_set_charset($dblink, "utf8mb4");
?>
