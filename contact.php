<?php
    include('db.php');

    if (isset($_POST['submit']) && !empty($_POST['g-recaptcha-response'])) {
        //$id=uniqid();
        $view = mysqli_real_escape_string($con, $_POST['view']);
        $name = mysqli_real_escape_string($con, $_POST['name']);
        $email = mysqli_real_escape_string($con, $_POST['emal']);
        $message = mysqli_real_escape_string($con, $_POST['message']);
        //mysqli_query($con, "INSERT INTO `feedback1` (`id`, `view`, `name`, `email`, `message`) VALUES ('$id', '$view',' $name', '$email', '$message');");
        mysqli_query($con, "INSERT INTO `feedback` (`view`, `name`, `email`, `message`) VALUES ('$view',' $name', '$email', '$message');");
        echo '<script>alert("Thank You..! Your Feedback is Valuable to Us")</script>';
        
    }
    else if(isset($_POST['submit']) && empty($_POST['g-recaptcha-response'])){
        echo '<script>alert("Select the all mandatory fields!")</script>';
    }


?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style1.css">
    <link href="https://fonts.googleapis.com/css?family=Baloo+Bhai|Bree+Serif&display=swap" rel="stylesheet">
    <script src='https://www.google.com/recaptcha/api.js' async defer ></script>
    <title>Contact Us</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', Sans-Serif;

        }

        .contact {
            position: relative;
            min-height: 100vh;
            padding: 50px 100px;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;

            background: url()
        }

        .contact .content {
            max-width: 800px;
            text-align: center;
        }

        .contact .content h2 {
            font-size: 36px;
            font-weight: 500;

        }

        .contact .content p {
            font-weight: 300;
        }

        .container {
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 30px;
        }

        .container .contactInfo {
            width: 50%;
            display: flex;
            flex-direction: column;

        }

        .container .contactInfo .box {
            position: relative;
            padding: 20px 0;
            display: flex;
        }

        .text {
            border-radius: 10px;
            padding: 30px;
            background-color: orange;
            width: 400px;
            margin: 100px;
            display: flex;
            flex-direction: column;
        }

        .contactForm {
            border-radius: 20px;
            background-color: #00ccff;
            padding: 50px;
            width: 40%;
            padding: 40px;

        }

        .contactForm h2 {
            font-size: 30px;

        }

        .contactForm .inputBox {
            position: relative;
            width: 100%;
            margin-top: 10px;
        }

        .contactForm .inputBox input {
            width: 100%;
            padding: 5px 0;
            font-size: 16px;
            margin: 10px 0;

        }

        textarea {
            width: 100%;
        }

        .contactForm .inputBox input[type="submit"] {
            width: 100px;
            background: #000033;
            color: #fff;
            border: none;
            cursor: pointer;
            padding: 10px;
            font-size: 18px;
        }
    </style>
</head>

<body>
    <nav id="navbar">
        <div id="logo">
            <img src="images/vitlogo2.png" alt="Railway-Portal">
        </div>
        <ul>
            <li class="item"><a href="index1.html">Home</a></li>

        </ul>
    </nav>
    <section class="contact">
        <div class="content">
            <h2>Contact Us</h2>
            <p>This is a responsive "Contact Us" page
                where <br> the customers can ask queries and
                contact us directly!</p><br>
        </div>
        <div class="container">
            <div class="contactInfo">
                <div class="box">

                    <div class="text">
                        <h2>Contact Info:</h2><br>
                        <h3>Phone No.</h3>
                        <p>9876543210</p><br>

                        <h3>Email</h3>
                        <p>pratyaksh.jain2019@vitstudent.ac.in</p><br>

                    </div>
                </div>
            </div>
            <div class="contactForm">
                <form method="post">
                    <h2>Feedback</h2><br>
                    <h3 style="margin-bottom:2%;">How satisfied were you with our Service?</h3>
                    <ul style=" list-style-type: none;">
                        <li><input type="radio" name="view" value="excellent" id="excellent" required>
                            <label for="excellent">excellent</label>
                            <div class="check w3"></div>
                        </li>
                        <li><input type="radio" name="view" value="good" id="good">
                            <label for="good"> good</label>
                            <div class="check w3ls"></div>
                        </li>
                        <li><input type="radio" name="view" value="neutral" id="neutral">
                            <label for="neutral">neutral</label>
                            <div class="check wthree"></div>
                        </li>
                        <li><input type="radio" name="view" value="poor" id="poor">
                            <label for="poor">poor</label>
                            <div class="check w3_agileits"></div>
                        </li>
                    </ul>
                    <div class="inputBox"><span>Full Name:</span>
                        <input type="text" name="name" required="required">

                    </div><br>
                    <div class="inputBox"><span>Email:</span>
                        <input type="text" name="emal" required="required">

                    </div><br>
                    <div class="inputBox">

                        <textarea required="required" name="message" placeholder="Write query..."></textarea>

                    </div><br>
                    <div class="g-recaptcha" data-sitekey="6Ld8iIEdAAAAAL4g0RxNlo0DkP8yZlxMlKp9hqVX"></div>
                    <div class="inputBox">
                        <input type="submit" name="submit" value="Send">

                    </div>
                </form>
            </div>
        </div>
        </div>
    </section>

    
</body>

</html>