<?php
session_start();
unset($_SESSION['IS_LOGIN1']);
header('location:login.php');
die();
?>