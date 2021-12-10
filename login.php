<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VIT CAnteen | vitcanteen.com</title>
    <link rel="stylesheet" href="style1.css">
    <link href="https://fonts.googleapis.com/css?family=Baloo+Bhai|Bree+Serif&display=swap" rel="stylesheet">
    <style>
        .mainbox {
            width: 308px;
            height: 360px;
            border: 2px solid rgb(42, 81, 165);
            display: inline-block;
            margin: 20px;
            padding: 10px;
            margin-top: 30px;
            padding-top: 30px;
            justify-content: center;
            border-radius: 12px;
            margin-left: 345px;

        }

        .mainbox label {
            font-size: 1.5rem;
        }

        .mainbox input {
            height: 43px;
            width: 292px;
            border-radius: 13px;
            border: 2px solid rgb(42, 81, 165);
            padding-left: 10px;
        }
    </style>
</head>

<body>
    <nav id="navbar">
        <div id="logo">
            <img src="./images/vitlogo2.png" alt="vitlogo">
        </div>
        <ul>
            <li class="item"><a href="index1.html">Home</a></li>
            
            <li class="item"><a href="contact.html">Contact Us</a></li>
        </ul>
    </nav><br><br><br>

    <?php
    include('db.php');
    if(isset($_POST['submit'])){
    $_SESSION['id']=$_POST['userid'];
	$userid=mysqli_real_escape_string($con,$_POST['userid']);
	$password=mysqli_real_escape_string($con,$_POST['password']);
	$res=mysqli_query($con,"select * from user where id='$userid' and password='$password'");
   
   

	if(mysqli_num_rows($res)>0){
		$_SESSION['IS_LOGIN']='yes';
		header('location:user.php');
		die();
	}else{
        echo '<script>alert("Please enter valid login details")</script>';
      
	}

    
    }

    if(isset($_POST['submit1'])){
        
        $adminid=mysqli_real_escape_string($con,$_POST['adminid']);
        $password1=mysqli_real_escape_string($con,$_POST['password1']);
        
        
        $res1=mysqli_query($con,"select * from admin where id='$adminid' and password='$password1'");
    
        if(mysqli_num_rows($res1)>0){
            $_SESSION['IS_LOGIN1']='yes';
            header('location:admin.php');
            die();
        }else{
            echo '<script>alert("Please enter valid login details")</script>';
        }
    }

    ?>

    <div class="mainbox" id="box1">
        <form method="POST" >
            <h1 style="text-align: center;">User login</h1><br>
            <label>User Id: </label><br>
            <input type="text" name="userid" id="User-id" placeholder="Enter your User-id"><br><br>

            <label>Password: </label><br>
            <input type="password" name="password" id="password" placeholder="Enter your password"><br><br>
            <input type="submit" name="submit" value="Login" class="btn">
        </form>
    </div>

    <div class="mainbox" id="box2">
        <form method="POST">
            <h1 style="text-align: center;">Admin Login</h1><br>
            <label>Admin-id: </label><br>
            <input type="text" name="adminid"  placeholder="Enter your Admin id"><br><br>

            <label>Password: </label><br>
            <input type="password" name="password1"  placeholder="Enter your password"><br><br>
            <input type="submit" name="submit1" value="Login" class="btn">
        </form>
    </div>
    <!-- <section id="login">
        <h1 class="h-primary center">Login</h1>
        <div id="login-box">           
            <form method="POST">
                <h2>User Login</h2><br>
                <div class="form-group">
                    <label>User-id: </label>
                    <input type="text" name="userid" id="User-id" placeholder="Enter your User-id">
                </div>
                <div class="form-group">
                    <label>Password: </label>
                    <input type="password" name="password" id="password" placeholder="Enter your password">
                </div>
                <input type="submit" name="submit" value="Login" class="btn">
                
            </form>
        </div>

        <div id="login-box1">
            <form method="POST">
                <h2>Admin Login</h2><br>
                <div class="form-group">
                    <label for="name">Admin-id: </label>
                    <input type="text" name="adminid" id="Admin-id" placeholder="Enter your User-id">
                </div>
                <div class="form-group">
                    <label for="password">Password: </label>
                    <input type="password" name="password1" id="password1" placeholder="Enter your password">
                </div>
                <input type="submit" name="submit1" value="Login" class="btn">

            </form>
        </div>
    </section> -->
</body>

</html>