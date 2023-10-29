<?php

$conn = mysqli_connect("localhost:3306","root","","studentconcession");
if(!$conn){  
	echo "<script type='text/javascript'>alert('Database failed');</script>";
  	die('Could not connect: '.mysqli_connect_error());  
}
session_start();
$regid = $_SESSION['regid'];
if (isset($_POST['submit']))
{
/*$tkno=$_POST['tkno'];
$prevclass=$_POST['class1'];
$prevstartstation = $_POST['startstation1'];
$prevendstation=$_POST['endstation1'];
$stdate=$_POST['stdate'];
$enddate=$_POST['enddate'];*/
$tkno=rand(10000,99999);
$currstartstation = $_POST['startstation2'];
$currendstation=$_POST['endstation2'];
$period=$_POST['period'];
$currclass=$_POST['class2'];
$stdate= date("Y-m-d");
if($_POST['period'] == 'Monthly'){
    $enddate= date("Y-m-d", strtotime("+1 month", strtotime($stdate)));
}if($_POST['period'] == 'Quarterly'){
    $enddate=date("Y-m-d", strtotime("+1 month", strtotime($stdate)));
}


/* $sql = "INSERT INTO `passdetails`(`p_tk`, `p_class`, `prev_startstation`, `prev_endstation`, `p_startdate`, `end_date`, `curr_startstation`, `curr_endstation`, `p_period`, `curr_class`, `p_regid`) VALUES ('$tkno','$prevclass','$prevstartstation','$prevendstation','$stdate','$enddate','$currstartstation','$currendstation','$period','$currclass','$regid')"; */

$sql = "INSERT INTO `passdetails`(`p_tk`, `p_startdate`, `end_date`, `curr_startstation`, `curr_endstation`, `p_period`, `curr_class`, `p_regid`) VALUES ('$tkno','$stdate','$enddate','$currstartstation','$currendstation','$period','$currclass','$regid')";

	if(mysqli_query($conn, $sql))
{  
	$message = "Pass details have been saved successfully";
    header("Location:dashboard.html");
}
else
{  
	$message = "Could not insert record"; 
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
        <h1>Pass Details</h1>
        <!--<h3 style="color: white">Previous Pass Details</h3>-->
        <form action="" method="post">
            <!--<div class="row">
                <div class="col-10">
                    <label for="tkno">Ticket Number</label>
                </div>
                <div class="col-90">
                    <input type="text" id="tkno" name="tkno" id="tkno" placeholder="Enter previous ticket number">
                </div>
            </div>
            <div class="row">
                <div class="col-10">
                    <label for="class1">Class</label>
                </div>
                <div class="col-90">
                            <select id="class1" name="class1"  required>
                                <option disabled selected>Select class *</option>
                                <option>First</option>
                                <option>Second</option>
                            </select>
                        </div>
            </div>
            <div class="row">
                <div class="col-10">
                    <label for="startstation1">Starting Station</label>
                </div>
                <div class="col-90">
                <input type="text" id="startstation1" name="startstation1" placeholder="Enter starting station">
                </div>
            </div>
            <div class="row">
                <div class="col-10">
                    <label for="endstation1">Ending Station</label>
                </div>
                <div class="col-90">
                <input type="text" id="endstation1" name="endstation1" placeholder="Enter ending station">
                </div>
            </div>
            <div class="row">
                <div class="col-10">
                    <label for="stdate">Start Date</label>
                </div>
                <div class="col-90">
                    <input type="date" id="stdate" name="stdate" maxlength="10" placeholder="Enter start date">
                </div>
            </div>
            <div class="row">
                <div class="col-10">
                    <label for="enddate">End Date</label>
                </div>
                <div class="col-90">
                    <input type="date" id="enddate" name="enddate" maxlength="10" placeholder="Enter End date">
                </div>
            </div>-->
            <h3 style="color: white">New Pass Details</h3>
            <div class="row">
                <div class="col-10">
                    <label for="startstation2">Start Station</label>
                </div>
                <div class="col-90">
                    <input type="text" id="startstation2" name="startstation2" placeholder="Enter Start Station">
                </div>
            </div>
            <div class="row">
                <div class="col-10">
                    <label for="endstation2">End Station</label>
                </div>
                <div class="col-90">
                    <input type="text" id="endstation2" name="endstation2" placeholder="Enter End Station">
                </div>
            </div>
            <div class="row">
                <div class="col-10">
                    <label for="period">Period</label>
                </div>
                <div class="col-90">
                            <select id="period" name="period" required>
                                <option disabled selected>Select duration *</option>
                                <option value='Monthly'>Monthly</option>
                                <option value='Quarterly'>Quarterly</option>
                            </select>
                        </div>
            </div>
            
            <div class="row">
                <div class="col-10">
                    <label for="class2">Class</label>
                </div>
                <div class="col-90">
                            <select id="class2" name="class2" required>
                                <option disabled selected>Select class *</option>
                                <option value='First'>First</option>
                                <option value='Second'>Second</option>
                            </select>
                        </div>
            </div>
            
            
                
            </div><br>
            
            <div class="row">
                <input type="submit" value="Register" id="submit" name="submit">
            </div>  
        </form>
    </body>
</html>