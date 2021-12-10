<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VIT CAnteen | vitcanteen.com</title>
    <link rel="stylesheet" href="style1.css">
    <link href="https://fonts.googleapis.com/css?family=Baloo+Bhai|Bree+Serif&display=swap" rel="stylesheet">
    
    <style>
        .card {
            height: 341px;
            width: 200px;
            border: 2px solid black;
            border-radius: 40px;
            display: inline-block;

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
        }

        .content {
            margin-left: 15px;
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
    </style>
</head>

<body>
    <nav id="navbar">
        <div id="logo">
            <img src="./images/vitlogo2.png" alt="Railway-Portal">
        </div>
        <ul>
            <li class="item"><a href="profile.php">Profile</a></li>
            <li class="item"><a href="logout.php">Logout</a></li>
        </ul>
    </nav><br><br><br>

    
    <h1 style="text-align:center;"><?php echo "Welcome to Canteen "?></h1><br><br>

    <?php
            include('db.php'); 
            $res=mysqli_query($con,"select * from foodscategory");
            ?>
	        while($row=mysqli_fetch_assoc($res)){
                <div class="card" id="1">
                    <img class="card-img-top" src="<?= $row['image']; ?>" alt="<?= $row['name']; ?>" id="imgs">
                        <center>
                        <div class="content">
                        <?php echo $row['name']?>
                        <?php echo number_format($row['price'], 2)?>
                        <button class="btn1">Add</button><br>
                        </div>
                        </center>
                        </div>

            }?>
                    
                
                <?php 
	            $i++;
	            ?>

            <table>
                <tr>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total Price</th>
                    <th>Operation</th>
                </tr><br>

                <h1 style="text-align:center;"><?php echo "Order Summary :"?></h1><br><br>
                <tr>
                    <td>Name</td>
                    <td>Price</td>
                    <td>Quantity</td>
                    <td>Total Price</td>
                    <td> <button class="btn1">Delete</button></td>
                </tr>
            </table><br><br>
    
    
</body>

</html>





















<?php
        $con=mysqli_connect("localhost","root","","vitcanteen");       
        if(isset($_POST['submit'])){
            $userid=$_POST['userid'];
            $username=$_POST['username'];
            $password=$_POST['password'];
            $age=$_POST['age'];
	        //mysqli_query($con,"insert into user(id,name,password,age) values('$userid',$username','$password','$age')");
            $sql="INSERT INTO `user` (`id`, `name`, `password`, `age`) VALUES ('$userid',$username','$password','$age')";
	        $rs = mysqli_query($con, $sql);
            if($rs)
            {
                echo "Contact Records Inserted";
            }
            header('location:customer.php');
	        die();
        }
?>

    <div class="mainbox" id="box1">
        <form method="POST">
            <h1 style="text-align: center;">Customer Info to Add</h1><br>
            <label>User Id: </label><br>
            <input type="text" name="userid" placeholder="Enter  User-id"><br><br>
            <label>Name: </label><br>
            <input type="text" name="username" placeholder="Enter  name"><br><br>
            <label>Password: </label><br>
            <input type="password" name="password" placeholder="Enter  password"><br><br>
            <label>Age: </label><br>
            <input type="text" name="age" placeholder="Enter age"><br><br>
            <input type="submit" name="submit" value="Add record" class="btn">
        </form>
    </div>
    </div>