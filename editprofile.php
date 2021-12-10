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

    <?php
include('db.php');

$id=$_SESSION['id'];
if(!isset($_SESSION['IS_LOGIN'])){
    header('location:login.php');
    die();
}


if(isset($_POST['submit'])){
    $userid=mysqli_real_escape_string($con,$_POST['userid']);
	$username=mysqli_real_escape_string($con,$_POST['username']);
	$password=mysqli_real_escape_string($con,$_POST['password']);
    $age=mysqli_real_escape_string($con,$_POST['age']);
	mysqli_query($con,"update user set id='$userid',name='$username', password='$password',age='$age' where id='$userid'");
	
    header('location:user.php');
	die();
}
$res=mysqli_query($con,"select * from user where id='$id'");

$row=mysqli_fetch_assoc($res);
$userid=$row['id'];
$username=$row['name'];
$password=$row['password'];
$age=$row['age'];


?>
    <h1 style="text-align:center;"><?php echo "Welcome to Edit Profile Page"?></h1><br><br>

    <div class="body">
    <form method="post">
	        <table>
                <tr>
		        <td><label>Id:</label></td>
		        <td><input type="textbox" name="userid" value="<?php echo $userid?>"/></td>
	            </tr>
	            <tr>
	            <td><label>Name:</label></td>
	            <td><input type="textbox" name="username" value="<?php echo $username?>"/></td>
	            </tr>
	            <tr>
		        <td><label>Password:</label></td>
		        <td><input type="textbox" name="password" value="<?php echo $password?>"/></td>
	            </tr>
	            <tr>
		        <td><label>Age:</label></td>
		        <td><input type="textbox" name="age" value="<?php echo $age?>"/></td>
	            </tr>
	            <tr>
		        <td></td>
		        <td><input type="submit" name="submit" value="Update" class="btn1"/></td>
	            </tr>
	        </table>
    </form>
    </div>
    
    
</body>

</html>