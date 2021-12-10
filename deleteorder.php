<?php
include('db.php');
if(!isset($_SESSION['IS_LOGIN1'])){
    header('location:login.php');
    die();
}
$orderid=mysqli_real_escape_string($con,$_GET['orderid']);
mysqli_query($con,"delete from customorders where orderid='$orderid'");
header('location:orders.php');
die();
?>