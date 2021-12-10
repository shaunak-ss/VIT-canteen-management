<?php
include('db.php');
if(!isset($_SESSION['IS_LOGIN1'])){
    header('location:login.php');
    die();
}
$id=mysqli_real_escape_string($con,$_GET['id']);
mysqli_query($con,"delete from foodscategory where id='$id'");
header('location:foodmenu.php');
die();
?>