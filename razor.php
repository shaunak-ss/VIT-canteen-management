<?php
include('db.php');
// if(!isset($_SESSION['IS_LOGIN'])){
//     header('location:login.php');
//     die();
// }
$id = $_SESSION['id'];
$orderid = $_SESSION['orderid'];
$tp = $_SESSION['tp'];
$res = mysqli_query($con, "select * from user where id='$id'");
$row = mysqli_fetch_assoc($res);
$username = $row['name'];
unset($_SESSION['cart_item']);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VIT CAnteen | vitcanteen.com</title>
    <link rel="stylesheet" href="style1.css">
    <link href="https://fonts.googleapis.com/css?family=Baloo+Bhai|Bree+Serif&display=swap" rel="stylesheet">

    <style>
        * {
            font-family: 'Baloo Bhai'
        }

        .body table {
            margin-left: 14%;
            border: 2px solid black;
            padding: 19px;
            display: inline-block;
            border-radius: 10px;
            margin-left: 38%;
        }

        .body h1 {
            text-align: center;
            margin-top: 40px;
            font-size: 2rem;
            margin-left: 476px;
            margin-bottom: 5%;
        }

        table label {
            float: left;
            font-size: 1.2rem;
            margin: 14px;

        }

        table input {
            width: 250px;
            height: 26px;

        }

        .btn1 {
            background-color: black;
            /* opacity: 0.8; */
            color: white;
            text-decoration: none;
            width: 250px;
            height: 53px;
            margin-bottom: 10%;
            margin-top: 8%;
            margin-left: 83%;
            border-radius: 10px;
            font-size: 2rem;
        }
        

        .greet {
            height: 400px;
            width: 600px;
            background-color: skyblue;
            margin-left: 9%;
            border-radius: 25px;
            display: inline-block;
            border: 1px solid;
        }

        p {
            color: black;
            /* opacity: 0.7; */
            font-size: 2rem;
            margin-left: 14%;
            padding-top: 4%;

        }
    </style>

</head>

<body>
    <nav id="navbar">
        <div id="logo">
            <img src="./images/vitlogo2.png" alt="vitlogo">
        </div>
        <ul>
            <li class="item"><a href="user.php">Home</a></li>
            <li class="item"><a href="logout.php">Logout</a></li>
        </ul>
    </nav><br><br><br>
    <div class="greet" style="height: 500px;">
        <br>
        <p style="text-align: center;">Bill Details</p>
        <p>Date :<span style="margin-left:16% ;"><?php echo date("Y/m/d") ?></span></p>
        <p>Name:<span style="margin-left:15% ;"><?php echo $username ?></span></p>
        <p>Reg no:<span style="margin-left:12% ;"><?php echo $id ?></span></p>
        <p>Amount:<span style="margin-left:9% ;"><?php echo $tp ?></span></p>

    </div>
    <div class="greet" style="background-color: #ff81008f;">
        <br>
        <p>Your Order</p>
        <p>Order id:<span><?php echo $orderid ?></span></p>
        <p>Total Amount:<span><?php echo $tp ?></span></p>
        <!-- <button class="btn1"><a>Pay Now</a></button> -->

    </div>


    
        <button class="btn1" id="rzp-button1">Pay</button>
        <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
        <script>
            var options = {
                "key": "rzp_test_qt27UzI3bHCSsz", // Enter the Key ID generated from the Dashboard
                "amount": "111", // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
                "currency": "INR",
                "name": "VIT Canteen",
                "description": "Test Transaction",
                "image": "https://example.com/your_logo",


                "handler": function(response) {
                    console.log(response);
                }
            };
            var rzp1 = new Razorpay(options);
            document.getElementById('rzp-button1').onclick = function(e) {
                rzp1.open();
                e.preventDefault();
            }
        </script>



</body>

</html>