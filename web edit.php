<?php
include("theme-header.php");

$id=$_GET["id"]
$dblink=mysqli_connect("localhost","root","","perfume");
mysqli_query($dblink,"SET CHARACTER SET utf8");
$result=mysqli_query($dblink,"SELECT * FROM `perfume23`  WHERE id=$id");
mysqli_close($dblink);

$row=mysqli_fetch_array($result);

?>

<form action="web-edit-action.php" method="post" class="row card" enctype="multipart/form-data">
<input class="form-control"  type="text" name="name" placeholder="نام" value=" <?php echo($row["name"]);?>">
<input class="form-control"  type="text" name="descraption" placeholder="توضیحات" value=" <?php echo($row["descraption"]);?>">
<input class="form-control"  type="text" name="price" placeholder="قیمت" value=" <?php echo($row["price"]);?>">
<input class="form-control"  type="file" name="image" placeholder="تصویر" value=" <?php echo($row[""]);?>">
<input class="form-control btn btn-success "   type="submit"  value="ویرایش">
</form>

<?php 
include("theme-footer.html");
?>