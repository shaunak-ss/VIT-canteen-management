<?php
// include('db.php');
// if(!isset($_SESSION['IS_LOGIN'])){
//     header('location:login.php');
//     die();
// }
// $id=$_SESSION['id'];
// foreach ($_SESSION['cart_item'] as $item) {
//     $item_price = $item['quantity'] * $item['price'];
//     $code=$item['code']; 
//     $name=$item['name'];
//     $quantity=$item['quantity'];
//     $price=number_format($item_price, 2);
//     $orderid=uniqid();
   
//     //mysqli_query($con,"insert into order1(customerid,code,fname,quantity,price) values('$id','$code','$name','$quantity','$price')");
//     mysqli_query($con,"insert into customorders(orderid,customid,pcode,pname,pquan,pprice) values('$orderid','$id','$code','$name','$quantity','$price')");

//     $res1=mysqli_query($con,"select * from customorders where orderid='$orderid'");

//     if(mysqli_num_rows($res1)>0){
// 		$msg="Order is placed Successfully.";
// 	}
//     else{
//         $msg="Order is not placed.Try again.";
// 	}

// }
$msg="Order is placed Successfully.";

//unset($_SESSION['cart_item']);
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
            opacity: 0.8;
            color: white;
            text-decoration: none;
            width: 104px;
            height: 34px;
            margin-bottom: 10%;
            margin-top: 10%;
            margin-left: -34%;
            border-radius:10px;
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
            opacity: 0.7;
            font-size: 2rem;
            margin-left: 14%;
            
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
        <p>Order Status :</p>
        <p><?php echo "This"." ".$msg?></p>
        <p>To order again go to Home</p>
    </div>
</body>

</html>