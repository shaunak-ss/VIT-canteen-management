<?php
include('db.php');
if(!isset($_SESSION['IS_LOGIN'])){
    header('location:login.php');
    die();
}
if (!empty($_SESSION['cart_item'])){
    
$id=$_SESSION['id'];
$tt=null;
$orderid=null;
foreach ($_SESSION['cart_item'] as $item) {
    $item_price = $item['quantity'] * $item['price'];
    $code=$item['code']; 
    $name=$item['name'];
    $quantity=$item['quantity'];
    $price=number_format($item_price, 2);
    $tt += $item["price"]*$item["quantity"];
    $orderid=uniqid();
    
    //mysqli_query($con,"insert into order1(customerid,code,fname,quantity,price) values('$id','$code','$name','$quantity','$price')");
    mysqli_query($con,"insert into customorders(orderid,customid,pcode,pname,pquan,pprice) values('$orderid','$id','$code','$name','$quantity','$price')");

    $res1=mysqli_query($con,"select * from customorders where orderid='$orderid'");

    if(mysqli_num_rows($res1)>0){
		$msg="Order is placed Successfully.";
	}
    else{
        $msg="Order is not placed.Try again.";
	}

}
}else{
    echo '<script>alert("cart is empty")</script>';
    header('location:user.php');
    die();
} 
$_SESSION['tp']=$tt;
$_SESSION['orderid']=$orderid;

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
       
       *{
            font-family: 'Baloo Bhai'
        }
        .body table{
            margin-left: 14%;
            border: 2px solid black;
            padding: 19px;
            display: inline-block;
            border-radius:10px;
            margin-left: 38%;
        }

        .body h1{
            text-align: center;
            margin-top: 40px;
            font-size: 2rem;
            margin-left: 476px;
            margin-bottom: 5%;
        }
        table label{
            float:left;
            font-size:1.2rem;
            margin: 14px;

        }
        table input{
            width: 250px;
            height: 26px;
            
        }
        
        .btn1{
            background-color: black;
            /* opacity: 0.8; */
            color: white;
            text-decoration: none;
            width: 250px;
            height: 53px;
            margin-bottom: 10%;
            margin-top: 10%;
            margin-left: 29%;
            border-radius: 10px;
            font-size: 2rem
        }
        .greet{
            height: 300px;
            width: 600px;
            background-color: skyblue;
            margin-left: 36%;
            border-radius: 25px;
        }
        p{
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

    <div class="greet">
        <br>
        <p>Order Details :</p>
        <p><?php echo "Order id:"." ".$orderid?></p>
        <p><?php echo "Total Amount:"." ".$tt?></p>
        <!-- <button class="btn1"><a href="payment.php?ordeid=<?php $orderid?>">Checkout</a></button> -->
        <form method="POST" action="payment.php?orderid=<?$orderid?>">
                <button class="btn1" id="bt2" type="submit" name="button1" >Checkout</button>
                <!-- <input class="btn1" id="bt2" type="submit" name="button1" value="Confirm Order"><br> -->
        </form>
    </div>
</body>

</html>