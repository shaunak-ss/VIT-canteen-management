<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Baloo+Bhai|Bree+Serif&display=swap" rel="stylesheet">
    <title>VIT CAnteen | vitcanteen.com</title>
    <style>
        * {
            padding: 0px;
            margin: 0px;
            box-sizing: border-box;
            list-style: none;
            font-family: 'Baloo Bhai',cursive;
        }

        .main {
            width: 100%;
            height: 100vh;
            display: flex;
            text-align: center;
        }

        .menu {
            width: 20%;
            background-color:black;
            opacity: 0.9;
            

        }

        #logo {
            margin: 10px 34px;

        }

        #logo img {
            height: 59px;
            margin: 3px 6px;
        }

        .menu a {
            text-decoration: none;
            color: #fff;
            font-size: 18px;
            letter-spacing: 2px;
            display: list-item;
            padding: 20px;
            border-top: 1px solid black;
            border-bottom: 1px solid black;
        }

        .menu a:hover {
            background-color: white;
            color: black;
            letter-spacing: 4px;
            text-transform: uppercase;
            border-radius: 30px;

        }
        .body h1{
            text-align: center;
            margin-top: 100px;
            font-size: 4rem;
            margin-left: 230px;
        }
    </style>
</head>

<body>
<?php
include('db.php');
if(!isset($_SESSION['IS_LOGIN1'])){
    header('location:login.php');
    die();
}
?>
    <div class="main">
        <div class="menu">
        <div id="logo"><img src="./images/vitlogo2.png"></div>
            <a href="customer.php">Customers</a>
            <a href="foodmenu.php">Food Menu</a>
            <a href="orders.php">Orders</a>
            <a href="feedback.php">Feedbacks</a>
            <a href="logoutadmin.php">Logout</a>

        </div>
        <div class="body">
            <h1>Welcome To Admin Panel</h1>
            <h1><span>&#8592;</span> Select an Operation To Perform</h1>


        </div>
    </div>
</body>

</html>