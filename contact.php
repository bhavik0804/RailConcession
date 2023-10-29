<?php 
session_start();
$conn = mysqli_connect("localhost:3306","root","","studentconcession");
if(!$conn){  
	echo "<script type='text/javascript'>alert('Database failed');</script>";
  	die('Could not connect: '.mysqli_connect_error());  
}

if (isset($_POST['send']))
{
  //echo '<script>alert("Inside main if")</script>';
$name=$_POST['name'];
//echo '<script>alert("First Name: " $fname)</script>';
$email=$_POST['email'];
$message=$_POST['message'];
$sql = "INSERT INTO `contactus`(`name`, `email`, `message`) VALUES ('$name','$email','$message')";
if(mysqli_query($conn, $sql))
{  
	$message = "Message has been sent successfully!";
}
echo "<script type='text/javascript'>alert('$message');</script>";
header("location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact Us</title>
    <link rel="stylesheet" href="css/pages.css"> 
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;900&display=swap" rel="stylesheet">
</head>
<body>
    <header>
    <div class="wrapper">
        <div class="logo">
        <img src="images/theme_cl.jpg" height="100px" alt="" > 
            </div>
    <ul class="nav-area">
    <li><a href="index.html">Home</a></li>
    <li><a href="about.html">About</a></li>
    <li><a href="login.php">Sign In</a></li>
    <li><a href="https://theemcoe.org/"; target="_blank">THEEM Site</a></li>
    <li><a href="contact.html">Contact Us</a></li>
    </ul>
    </div>
    </header>

    <section class="contact">
        <div class="layout">	 
            <div class="text-center">
              <h1 class="section-title">Contact Us</h1>
            </div>
            <div class="grid-8 form">
              <form action="" method="post" id="contact_form" name="contactForm">
                <div class="form-inline clearfix">
                  <div class="form-group grid-12 ">
                    <input type="text" placeholder="name" id="name" name="name" class="form-control">
                  </div>
                  <div class="form-group grid-12">
                    <input type="email" placeholder="email address" id="email" name="email" class="form-control">
                  </div>
                  <div class="form-group grid-12">
                    <textarea placeholder="message" id="message" rows="8" name="message" class="form-control"></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <div style="display:none;" class="success" id="mail_success">Your message has been sent successfully.
                  </div><!-- success message -->
                  <div style="display:none;" class="error" id="mail_fail"> Sorry, error occured this time sending your message.
                  </div><!-- error message -->
                </div>
                <div id="submit" class="form-group grid-12">
                  <input type="submit" value="send" class="btn  btn-lg costom-btn" name = "send" id="send">
                </div>
              </form>
            </div> <!-- /.col-xs-12 .col-sm-offset-2 .col-sm-8 -->
            <div class="grid-12">       
            </div><!-- /.col-xs-12 -->     
        </div>	
    </section>	

<footer style="background-color: black; height: 50px; padding-top: 20px;">
    <p style="color: aliceblue; text-align: center;">Copyright &copy; 2023 THEEM Student Railway Concession, All Rights Reserved.</p>
</footer>

</body>
</html>