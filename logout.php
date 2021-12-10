<?php
session_start();
unset($_SESSION['IS_LOGIN']);
unset($_SESSION['cart_item']);
header('location:login.php');
die();
?>