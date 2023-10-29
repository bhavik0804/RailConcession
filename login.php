<?php
$login = false;
//$message = false;
$message = "";
if($_SERVER["REQUEST_METHOD"] == "POST"){
	$conn = mysqli_connect("localhost:3306","root","","studentconcession");
	if(!$conn){  
		echo "<script type='text/javascript'>alert('Database failed');</script>";
		die('Could not connect: '.mysqli_connect_error());  
	}
	$regid=$_POST['regid'];
	$password=$_POST['password'];

	$sql="SELECT * FROM students WHERE p_regid='$regid' AND p_password='$password'"; 
	$result = mysqli_query ($conn, $sql);
	$num = mysqli_num_rows($result);
	if ($num == 1){
		$login = true;
		session_start();
		$_SESSION['loggedin'] = true;
		$_SESSION['regid'] = $regid;
		$message = "Logged in successfully";
		echo "<script type='text/javascript'>alert('$message');</script>";
		header("location: dashboard.html");

	}
	else{
		$message = "Invalid username or password";
		echo "<script type='text/javascript'>alert('$message');</script>";
		
	}
}
	//echo "<script type='text/javascript'>alert('$message');</script>";
?>

<!DOCTYPE html>
<html>
<head>
<title> Login Page</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/signin.css">
<link rel="stylesheet" href="css/index.css">

</head>
<script type="text/javascript">
	function validate()	{
		var pw=document.getElementById("pw");
		
   		if(pw.value.length< 8)
		{
			alert("Password consists of atleast 8 characters");
			pw.focus();
			return false;
		}
		return true;
	}
</script>
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
<li><a href="https://theemcoe.org/"; target="_blank">Theem Site</a></li>
<li><a href="contact.php">Contact</a></li>
</ul>
</div>
</header>
 <div class="loginBox">
  <h2>Log In </h2>
  <form id="login" action="" onsubmit="return validate()" method="post" name="login">
    <input type="text" name="regid" id="regid" placeholder="Enter Registration ID" required>
    <input type="password" name="password" id="password" placeholder="Enter Password">
    <input type="submit" style="color:black;" name="sign_in" id="sign_in" value="Sign In" >
    <a href="register.php">Don't have an account? Sign Up</a>
  </form>
</div>
<footer style="background-color: black; height: 50px; padding-top: 20px;">
    <p style="color: aliceblue; text-align: center;">Copyright &copy; 2023 THEEM Student Railway Concession, All Rights Reserved.</p>
</footer>
</body>
</html> 