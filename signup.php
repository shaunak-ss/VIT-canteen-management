<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VIT CAnteen | vitcanteen.com</title>
    <link rel="stylesheet" href="style1.css">
    <link href="https://fonts.googleapis.com/css?family=Baloo+Bhai|Bree+Serif&display=swap" rel="stylesheet">
    <style>

        .body table{
            margin-left: 14%;
            border: 2px solid black;
            padding: 19px;
            display: inline-block;
            border-radius:10px;
            margin-top: 2%;
            margin-left: 35%
        }

        .body h2{
            text-align: center;
            margin-top: 40px;
            font-size: 1.8rem;
            margin-left: -6%;
            margin-bottom: 1%;
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
            <img src="images/vitlogo2.png" alt="vitlogo">
        </div>
        <ul>
            <li class="item"><a href="index1.html">Home</a></li>
            
            <li class="item"><a href="contact.html">Contact Us</a></li>
        </ul>
    </nav>
        <div class="body">
            <h2>Fill This Form to Create an Account</h2>
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
		        <td><input type="password" name="password" required/></td>
	            </tr>
	            <tr>
		        <td><label>Age:</label></td>
		        <td><input type="textbox" name="age" required/></td>
	            </tr>
	            <tr>
		        <td></td>
		        <td><input type="submit" name="submit" value="Sign Up" class="btn1"/></td>
	            </tr>
	        </table>
        </form>
        </div>
        
    
  
    <?php
include('db.php');

if(isset($_POST['submit'])){
	$userid=mysqli_real_escape_string($con,$_POST['userid']);
	$username=mysqli_real_escape_string($con,$_POST['username']);
    $password=mysqli_real_escape_string($con,$_POST['password']);
	$age=mysqli_real_escape_string($con,$_POST['age']);
	mysqli_query($con,"insert into user(id,name,password,age) values('$userid','$username','$password','$age')");
   
	header('location:login.php');
    die();
    
	
}
?>


    
    
        
</body>

</html>