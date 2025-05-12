<?php
include("theme-header.php");

$id=$_GET["id"];
   
$dblink=mysqli_connect("localhost","root","","perfume");
mysqli_query($dblink,"SET ChARACTER SET utf8");
$result=mysqli_query($dblink,"DELETE FROM `perfume23` WHERE id=$id");
mysqli_close($dblink);

if($result==true){
    echo("حذف شد");
}else{
    echo("حذف نشد");
}
?>

<?php 
include("theme-footer.html");
?>