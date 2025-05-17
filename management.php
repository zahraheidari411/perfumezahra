<?php
session_start();
if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
    header("Location: index.php");
    exit();
}


include("theme-header.php");
include("connect.php");
require_once("connect.php");

mysqli_query($conn, "SET CHARACTER SET utf8");
?>

<div class="container">
<h2>مدیریت محصولات</h2>
    <br>
    <br>

    
<div class="d-flex justify-content-between align-items-center mb-4">
    <br>
    <p class="description">
        در این بخش شما می‌توانید محصولات جدیدی به فروشگاه اضافه کنید. اطلاعات دقیق مانند نام محصول، قیمت، و توضیحات کامل را وارد نمایید تا مشتریان با دید بازتری خرید کنند.
        افزودن منظم و دقیق محصولات باعث افزایش اعتماد مشتریان و همچنین بهبود تجربه کاربری فروشگاه شما می‌شود.
      </p>
<br>
<br>
<br>
<br>

    <a style="color:white;" href="web_add.php" class="btn btn-primary">
        <i class="fas fa-plus me-4"></i> افزودن  
    </a>
</div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

<p class="description">در این قسمت می‌توانید محصولات موجود را مشاهده کرده و آن‌ها را ویرایش یا حذف کنید.</p>
<p class="description">
        در این بخش شما می‌توانید محصولات جدیدی به فروشگاه اضافه کنید. اطلاعات دقیق مانند نام محصول، قیمت، و توضیحات کامل را وارد نمایید تا مشتریان با دید بازتری خرید کنند.
        افزودن منظم و دقیق محصولات باعث افزایش اعتماد مشتریان و همچنین بهبود تجربه کاربری فروشگاه شما می‌شود.
      </p>

<div class="row">
    <?php
    $result = mysqli_query($dblink, "SELECT * FROM `perfume23`");

    while($row = mysqli_fetch_array($result)):
    ?>




    <div class="col-md-6 col-lg-4 mb-4">
        <div class="card h-100">
            <div class="card-body">
                <h5 class="card-title"><?php echo htmlspecialchars($row["name"]); ?></h5>
                <p class="card-text">
                    <?php echo htmlspecialchars($row["desciption"]); ?><br>
                    قیمت: <?php echo htmlspecialchars($row["price"]); ?>

                </p>
                <img src="<?php echo htmlspecialchars($row["image"]); ?>" alt="">
                <div class="d-flex justify-content-between">
                    <a href="web_delete_action.php?id=<?php echo $row["id"]; ?>" class="btn btn-sm btn-danger">
                        <i class="fas fa-trash"></i> حذف
                    </a>
                    <a href="web_edit.php?id=<?php echo $row["id"]; ?>" class="btn btn-sm btn-primary">
                        <i class="fas fa-edit"></i> ویرایش
                    </a>
                </div>
            </div>
        </div>
    </div>
    <?php endwhile; mysqli_close($dblink); ?>
</div>

<?php include("theme-footer.html"); ?>
