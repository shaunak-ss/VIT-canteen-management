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
            height: 200%;
            

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
            margin-top: 4%;
            font-size: 4rem;
            margin-left: 14%;
        }
        table {
            width: 600px;
            margin-left: 32%;
            
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
    </style>
</head>

<body>

    <div class="main">
        <div class="menu">
        <div id="logo"><img src="./images/vitlogo2.png"></div>
            <a href="customer.php">Customers</a>
            <a href="foodmenu.php">Food Menu</a>
            <a href="orders.php">Orders</a>
            <a href="feedback.php">Feedbacks</a>
            <a href="logoutadmin.php">Logout</a>

        </div>
        <?php
               include('db.php');
               if(!isset($_SESSION['IS_LOGIN1'])){
                header('location:login.php');
                die();
            }
            
               $res=mysqli_query($con,"select * from customorders");
            ?>
        <div class="body">
            <h1>Order History:</h1>
            
            <table>
                <tr>
                    <th>S.No</th>
                    <th>Order Id</th>
                    <th>Customer Id</th>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Operation</th>
                </tr>
                <?php 
	            $i=1;
	            while($row=mysqli_fetch_assoc($res)){?>
                <tr>
                    <td>
                        <?php echo $i?>
                    </td>
                    <td>
                        <?php echo $row['orderid']?>
                    </td>
                    <td>
                        <?php echo $row['customid']?>
                    </td>
                    <td>
                        <?php echo $row['pname']?>
                    </td>
                    <td>
                        <?php echo $row['pquan']?>
                    </td>
                    <td>
                        <?php echo $row['pprice']?>
                    </td>
                    <td>                        
                        <button class="btn1"><a href="deleteorder.php?orderid=<?php echo $row['orderid']?>">Delete</a></button>
                    </td>
                </tr>
                <?php 
	            $i++;
	            } ?>
            </table>
        </div>
    </div>
</body>

</html>