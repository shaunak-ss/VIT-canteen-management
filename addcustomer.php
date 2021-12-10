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
            background-color: black;
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
        .body table{
            margin-left: 35%;
            border: 2px solid black;
            padding: 19px;
            display: inline-block;
            border-radius:10px;
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
    </style>
</head>

<body>
    <div class="main">
        <div class="menu">
            <div id="logo"><img src="./images/vitlogo2.png"></div>
            <a href="customer.php">Customers</a>
            <a href="foodmenu.php">Food Menu</a>
            <a href="orders.php">Orders</a>
            <a href="logoutadmin.php">Logout</a>
        </div>
        <div class="body">
            <h1>Form to Add the information to Database</h1>
        <form method="post">
	        <table>
                <tr>
		        <td><label>Id:</label></td>
		        <td><input type="textbox" name="userid" required/></td>
	            </tr>
	            <tr>
	            <td><label>Name:</label></td>
	            <td><input type="textbox" name="username" required/></td>
	            </tr>
	            <tr>
		        <td><label>Password:</label></td>
		        <td><input type="textbox" name="password" required/></td>
	            </tr>
	            <tr>
		        <td><label>Age:</label></td>
		        <td><input type="textbox" name="age" required/></td>
	            </tr>
	            <tr>
		        <td></td>
		        <td><input type="submit" name="submit" class="btn1"/></td>
	            </tr>
	        </table>
        </form>
        </div>
        
    </div>
  
    <?php
include('db.php');
if(!isset($_SESSION['IS_LOGIN1'])){
    header('location:login.php');
    die();
}
if(isset($_POST['submit'])){
	$userid=mysqli_real_escape_string($con,$_POST['userid']);
	$username=mysqli_real_escape_string($con,$_POST['username']);
    $password=mysqli_real_escape_string($con,$_POST['password']);
	$age=mysqli_real_escape_string($con,$_POST['age']);
	mysqli_query($con,"insert into user(id,name,password,age) values('$userid','$username','$password','$age')");
	header('location:customer.php');
	die();
}
?>


mysqli_query($con,"insert into order1(customerid,code,fname,quantity,price) values('$id','$code','$name','$quantity','$price')");
    
        
</body>

</html>