<?php
include('db.php');
if(!isset($_SESSION['IS_LOGIN'])){
    header('location:login.php');
    die();
}
$id=$_SESSION['id'];

$res=mysqli_query($con,"select * from customorders where customid='$id'");


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
    table {
            width: 600px;
            margin-left: 25%;
            margin-bottom: 5%;
            
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
    <nav id="navbar">
        <div id="logo">
            <img src="./images/vitlogo2.png" alt="vitlogo">
        </div>
        <ul>
            <li class="item"><a href="user.php">Home</a></li>
            <li class="item"><a href="logout.php">Logout</a></li>
        </ul>
    </nav><br><br><br>

    <div class="body">
            <h1 style="margin-left: 25%;margin-bottom:3%;">Order History:</h1>
            
            <table>
                <tr>
                    <th>S.No</th>
                    <th>Order Id</th>
                    <th>Customer Id</th>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    
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
                   
                </tr>
                <?php 
	            $i++;
	            } ?>
        
            </table>
    </div>
</body>

</html>