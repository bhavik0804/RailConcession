<?php

$conn = mysqli_connect("localhost:3306","root","","studentconcession");
if(!$conn){  
	echo "<script type='text/javascript'>alert('Database failed');</script>";
  	die('Could not connect: '.mysqli_connect_error());  
}
session_start();
$regid = $_SESSION['regid'];

$sql_stud_det = "SELECT * FROM details WHERE p_regid = '$regid' order by p_id desc limit 1";
$sql_stud_det_res = mysqli_query($conn,$sql_stud_det);
$sql_stud_det_res = mysqli_fetch_assoc($sql_stud_det_res);
/* echo '<pre>';
print_r($sql_stud_det_res);
echo '</pre>'; */
if (isset($_POST['register']))
{
$mob=$_POST['mob'];
$dob=$_POST['dob'];
$address=$_POST['address'];
$city=$_POST['city'];
$state=$_POST['state'];
$semester=$_POST['sem'];
$year=$_POST['year'];
$program=$_POST['program'];
$branch=$_POST['branch'];

if($_POST['action_name'] == 'insert'){
    $sql = "INSERT INTO `details`(`p_mob`, `p_dob`, `p_address`, `p_city`, `p_state`, `p_sem`, `p_year`, `p_program`, `p_branch`,`p_regid`) VALUES ('$mob','$dob','$address','$city','$state','$semester','$year','$program','$branch',$regid)";
	if(mysqli_query($conn, $sql))
    {  
        $message = "Details successfully inserted";
        header("Location:dashboard.html");
    }
    else
    {  
        $message = "Could not insert record"; 
    }
}elseif($_POST['action_name'] == 'update'){
    $sql = "UPDATE details SET p_mob='$mob', p_dob='$dob', p_address='$address', p_city='$city', p_state='$state', p_sem='$semester', p_year='$year', p_program='$program', p_branch='$branch' WHERE p_regid='$regid'";
	if(mysqli_query($conn, $sql))
    {  
        $message = "details successfully updated";
        header("Location:dashboard.html");
    }
    else
    {  
        $message = "Could not update record"; 
    }
}

	echo "<script type='text/javascript'>alert('$message');</script>";
}
    //echo "<script> location.href='dashboard.html'; </script>";
    //exit;
?>
<!DOCTYPE html>
<html lang="en-us">
    <head>
        <meta charset="UTF-8">
        <title>Registration Form</title>
        <link rel="stylesheet" href="css/details.css">
        <script type="text/javascript" lang="javascript" src="js/details.js"></script>
    </head>
       
    <body>
        <h1>Student Details</h1>
        <form action="" method="post">
            <div class="row">
                <div class="col-10">
                    <label for="mob">Mobile Number</label>
                </div>
                <div class="col-90">
                    <input type="tel" pattern="[0-9]+" maxlength="10" id="mob" name="mob" placeholder="Enter your mobile number">
                </div>
            </div>
            <div class="row">
                <div class="col-10">
                    <label for="dob">Date of Birth</label>
                </div>
                <div class="col-90">
                    <input type="date" id="dob" name="dob" placeholder="Enter your Date of Birth">
                </div>
            </div>
            <div class="row">
                <div class="col-10">
                    <label for="address">Address:</label>
                </div>
                <div class="col-90">
                    <textarea name="address" id="address" cols="30" rows="10" placeholder="example Street ABC"></textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-10">
                    <label for="city">City:</label>
                </div>
                <div class="col-90">
                    <input type="text" id="city" name="city" maxlength="10" placeholder="Enter City">
                </div>
            </div>
            <div class="row">
                <div class="col-10">
                    <label for="state">State:</label>
                </div>
                <div class="col-90">
                    <input type="text" id="state" name="state" placeholder="Enter State">
                </div>
            </div>
            <div class="row">
                <div class="col-10">
                    <label for="sem">Semester</label>
                </div>
                <div class="col-90">
                    <input type="number" id="sem" name="sem" placeholder="Enter Semester Number">
                </div>
            </div>
            <div class="row">
                <div class="col-10">
                    <label for="year">Year</label>
                </div>
                <div class="col-90">
                    <select id="year" name="year" placeholder="Year of degree">
                                <option disabled selected>Select year</option>
                                <option>First Year</option>
                                <option>Second Year</option>
                                <option>Third Year</option>
                                <option>Fourth Year</option>
                    </select>
                </div>
            </div>
            
            <div class="row">
                <div class="col-10">
                    <label for="program" required>Program</label>
                </div>
                <div class="col-90">
                    <input type="radio" id="btech" name="program" value="B.Tech"/>B.Tech
                    <input type="radio" id="mtech" name="program" value="M.Tech"/>M.Tech
                    <input type="radio" id="mca" name="program" value="MCA"/>MCA
                    <input type="radio" id="phd" name="program" value="PHD"/>PHD
                </div>
            </div>
            
            <div class="row">
                <div class="col-10">
                    <label for="specialization">Branch:</label>
                </div>
                <div class="col-90">
                    <input type="radio" class="specialization" id="cs" name="branch" value="Computer Science">Computer Science<br/>
                    <input type="radio" class="specialization" id="it" name="branch" value="Information Technology">Information Technology<br/>
                    <input type="radio" class="specialization" id="extc" name="branch" value="Electronics and Telecommunications">Electronics and Telecommunications<br/>
                    <input type="radio" class="specialization" id="ec" name="branch" value="Electronics">Electronics<br/>
                    <input type="radio" class="specialization" id="el" name="branch" value="Electrical Engineering">Electrical Engineering<br/>
                    <input type="radio" class="specialization" id="mech" name="branch" value="Mechanical Engineering">Mechanical Engineering<br/>
                    <input type="radio" class="specialization" id="prod" name="branch" value="Production Engineering">Production Engineering<br/>
                    <input type="radio" class="specialization" id="textile" name="branch" value="Textile Engineering">Textile Engineering<br/>
                    <input type="radio" class="specialization" id="civil" name="branch" value="Civil Engineering">Civil Engineering<br/>
                </div>
                
            </div><br>
            <?php 
                if(!empty($sql_stud_det_res)){
                    echo ' <input type="hidden" id="action_name" name="action_name" value="update">';
                }else{
                    echo ' <input type="hidden" id="action_name" name="action_name" value="insert">';
                }
            ?>
            <div class="row">
                <input type="submit" value="Register" id="register" name="register">
            </div>  
        </form>
    </body>
</html>