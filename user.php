<?php
include('db.php');
// add, remove, empty
if (!empty($_GET['action'])) {
    switch ($_GET['action']) {
        // add product to cart
        case 'add':
            if (!empty($_POST['quantity'])) {
                $pid = $_GET['pid'];
                $query = "SELECT * FROM foodscategory WHERE id=" . $pid;
                $result = mysqli_query($con, $query);
                while ($product = mysqli_fetch_array($result)) {
                    $itemArray = [
                        $product['code'] => [
                            'name' => $product['name'],
                            'code' => $product['code'],
                            'quantity' => $_POST['quantity'],
                            'price' => $product['price'],
                            
                        ]
                    ];
                    if (isset($_SESSION['cart_item']) &&!empty($_SESSION['cart_item'])) {
                        if (in_array($product['code'], array_keys($_SESSION['cart_item']))) {
                            foreach ($_SESSION['cart_item'] as $key => $value) {
                                if ($product['code'] == $key) {
                                    if (empty($_SESSION['cart_item'][$key]["quantity"])) {
                                        $_SESSION['cart_item'][$key]['quantity'] = 0;
                                    }
                                    $_SESSION['cart_item'][$key]['quantity'] += $_POST['quantity'];
                                }
                            }
                        } else {
                            $_SESSION['cart_item'] += $itemArray;
                        }
                    } else {
                        $_SESSION['cart_item'] = $itemArray;
                    }
                }
            }
            break;
            case 'remove':
                if (!empty($_SESSION['cart_item'])) {
                    foreach ($_SESSION['cart_item'] as $key => $value) {
                        if ($_GET['code'] == $key) {
                            unset($_SESSION['cart_item'][$key]);
                        }
                        if (empty($_SESSION['cart_item'])) {
                            unset($_SESSION['cart_item']);
                        }
                    }
                }
                break;
            case 'empty':
                unset($_SESSION['cart_item']);
                break;
        
    }
}

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
    table {
            width: 600px;
            margin-left: 30%;
        }

        table,td,th {
            padding: 20px;
            border: 1px solid lightgray;
            border-collapse: collapse;
            text-align: center;
        }

        td {
            font-size: 18px;
            
        }

        th {
            background-color: black;
            opacity: 0.8;
            color: white;
        }
        .btn1{
            background-color: black;
            opacity: 0.8;
            color: white;
            text-decoration: none;
            width: 104px;
            height: 34px;
            border-radius:10px;
            margin-bottom: 10px;
        }
        a{
            text-decoration: none;
            color: white;
        }
        .card {
            height: 341px;
            width: 200px;
            border: 2px solid black;
            border-radius: 40px;
            display: inline-block;
            margin-left: 7%;
            margin-top: 4%;

        }

        #imgs {
            height: 150px;
            width: 150px;
            margin-left: 25px;
            margin-top: 24px;
            border-radius: 33px;
        }

        .btn1 {
            background-color: black;
            opacity: 0.8;
            color: white;
            text-decoration: none;
            width: 104px;
            height: 34px;
            border-radius: 10px;
            margin-bottom: 10px;
            padding:2px;
        }

        .content {
            margin-left: 15px;
        }
        #bt1{
            margin-left: 60%;
            padding: 2px;
            margin-bottom: 3%
            
        }
        #bt2{
            margin-left: 60%;
        }
        </style>
</head>

<body>
    <nav id="navbar">
        <div id="logo">
            <img src="./images/vitlogo2.png" alt="vitlogo">
        </div>
        <ul>
            <li class="item"><a href="editprofile.php">Edit Profile</a></li>
            <li class="item"><a href="orderhistory.php">Order History</a></li>
            <li class="item"><a href="logout.php">Logout</a></li>
        </ul>
    </nav><br><br><br>

    <?php 
    $id=$_SESSION['id'];
    $res=mysqli_query($con,"select * from user where id='$id'");
    $row=mysqli_fetch_assoc($res);
    $username=$row['name'];
    ?>
    <br><h1 style="text-align:center;"><?php echo "Hi"." ".$username ?></h1><br><br>
    <h1 style="text-align:center;"><?php echo "Welcome to Canteen "?></h1><br><br>

    <?php
            if(!isset($_SESSION['IS_LOGIN'])){
                header('location:login.php');
                die();
            }
              
            $res=mysqli_query($con,"select * from foodscategory");
            
	            $i=1;
	            while($row=mysqli_fetch_assoc($res)){?>
                <form style="display:inline-block; margin:3%" action="user.php?action=add&pid=<?= $row['id']; ?>" method="POST">
                <div class="card" id="1">
                    <img class="card-img-top" src="<?= $row['image']; ?>" alt="<?= $row['name']; ?>" id="imgs">
                        
                        <div class="content">
                        <?php echo"Name: "; echo $row['name']; echo "</br>"; ?>
                        <?php echo"Price:"; echo number_format($row['price'], 2); echo "</br>"; ?>
                        <input type="text" name="quantity" value="1" size="2">
                        <button type="submit" name="addtocart" class="btn1">Add to cart</button><br>
                        
                        </div>
                        
                        </div>
                </form>        
                <?php  
	            $i++;
	            } ?>
            <br>
            <a class="btn1" id="bt1" href="user.php?action=empty">Remove All</a><br>
            <table>
                <tr>
                    <th>Name</th>
                    <th>Code</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Total Price</th>
                    <th>Operation</th>
                    
                </tr><br>
                <?php
                $total_quantity = 0;
                $total_price = 0;
            if (isset($_SESSION['cart_item']) && !empty($_SESSION['cart_item'])){
                foreach ($_SESSION['cart_item'] as $item) {
                    $item_price = $item['quantity'] * $item['price'];
                    ?>
                    <tr>
                        <td> <?= $item['name'] ?> </td>
                        <td><?= $item['code'] ?></td>
                        <td><?= $item['quantity'] ?></td>
                        <td>₹<?= number_format($item['price'], 2) ?></td>
                        <td>₹<?= number_format($item_price, 2) ?></td>
                        <td>
                            <a href="user.php?action=remove&code=<?= $item['code']; ?>" class="btn1">X</a>
                        </td>
                    </tr>

                    <?php
                    $total_quantity += $item["quantity"];
                    $total_price += ($item["price"]*$item["quantity"]);
                     
                }
            }    
            
            ?>
             
            </table><br><br>
            <span style="margin-left: 30%;font-size: 2rem;"><?php echo "Your Total Bill :"." ".$total_price ?></span>
            <br>
            <form method="POST" action="conorder.php?total_price=<?$total_price ?>">
                <button class="btn1" id="bt2" type="submit" name="button1" >Confirm Order</button>
                <!-- <input class="btn1" id="bt2" type="submit" name="button1" value="Confirm Order"><br> -->
            </form>
            
            <br><br>  
</body>

</html>



