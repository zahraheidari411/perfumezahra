<?php
include("thems-header.html");

$name=$_POST["name"];
$descraption=$_POST["descraption"];
$price=$_POST["price"];
$image=$_FILES["image"];

$source=$_FILES["image"]["tmp_name"];
$target="images/".$_FILES["image"]["name"];
move_uploaded_file($source,$target);


$link=mysqli_connect("localhost","root","","perfume");
mysqli_query($link,"SET ChARACTER SET utf8");
$result=mysqli_query($link,"UPDATE `perfume23` SET `id`=[value-1],`name`=[value-2],`desciption`=[value-3],`price`=[value-4],`image`=[value-5] WHERE 1");
mysqli_close($link);

if($result==true){
    echo("حذف شد");
}else{
    echo("حذف نشد");
}
?>
<?php 
include("thems-footer.html");
?>