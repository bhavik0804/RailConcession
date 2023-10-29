<?php
//$page_title = "Profile page";
//include_once 'parseProfile.php';

$conn = mysqli_connect("localhost:3306","root","","studentconcession");
if(!$conn){  
	echo "<script type='text/javascript'>alert('Database failed');</script>";
  	die('Could not connect: '.mysqli_connect_error());  
}
//echo "<script type='text/javascript'>alert('Connection successful');</script>";
/*$regid = 0;
$fname = "";
$lname = "";
$email = "";
$gender = "";*/
    session_start();
    $regid = $_SESSION['regid'];
    //echo "<script type='text/javascript'>alert('$regid');</script>";
    $sql = "SELECT * FROM students WHERE p_regid = '$regid' ";
    $sql_result = mysqli_query($conn,$sql);
    //echo "<script type='text/javascript'>alert('query executed');</script>";
    /*$rows = mysqli_fetch_assoc($sql_result);
    $regid = $rows['p_regid'];
    $fname = $rows['p_fname'];
    $lname = $rows['p_lname'];
    $email = $rows['p_email'];
    $gender = $rows['p_gender'];*/

    $sql1 = "SELECT * FROM details WHERE p_regid = '$regid' ";
    $sql_result1 = mysqli_query($conn,$sql1);

    $sql_pass = "SELECT * FROM passdetails WHERE p_regid = '$regid' ";
    $sql_pass_result = mysqli_query($conn,$sql_pass);

    $user_pic = "images/".$regid;
    $default = "images/default.jpg";

    if(file_exists($user_pic)){
        $profile_picture = $user_pic;
    }
    else{
        $profile_picture = $default;
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
      
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600&display=swap');
      
        body{
            background: #1A1E25;
            color: white;
            font-family: 'Poppins', sans-serif;
        }
        h1{
            margin-top: 30px;
            margin-left: 50px;
            margin-bottom: 30px;
        }
        table, th, td {
            border: 1px solid white;
            border-collapse: collapse;
            text-align: left;
            justify-content: center;
            margin-left: 50px;
            /*margin-top: 40px;*/
            padding: 7px;
        }
        a{
            color: white;
            text-align-last: auto;
        }
        i{
            color: white;
        }
        img{
            margin-left: 50px;
        }
        .button{
            display: inline;
            align-items: center;
            justify-content: center;
            height: 45px;
            max-width: 200px;
            width: 100%;
            border: none;
            outline: none;
            color: #000;
            border-radius: 5px;
            margin: 25px 25px;
            background-color: #00fecb;
            transition: all 0.3s linear;
            cursor: pointer;
            font-size: 18px;
            font-weight: 400;
            margin-left: 50px;
        }
        #button:hover{
            background-color: #027256;
        }
    </style>
    </head>
    <body>
    <div class="container" id="content">
    <div>
        <h1>Profile</h1>
        <section class="col col-lg-7">
            <div class="row col-lg-3">
                <img src="<?php if(isset($profile_picture)) echo $profile_picture; ?>" class="img img-rounded" width="200">
            </div><br>
            <table class="table table-bordered table-condensed" style="border: 1px black;">
                <?php while($rows = mysqli_fetch_assoc($sql_result)){ ?>
                <tr><th style="width: 20%;">Registration ID:</th><td><?php echo $rows['p_regid']; ?></td></tr>
                <tr><th>Name:</th><td><?php echo $rows['p_fname']." ".$rows['p_lname']; ?></td></tr>
                <tr><th>Email:</th><td><?php echo $rows['p_email']; ?></td></tr>
                <tr><th>Gender:</th><td><?php echo $rows['p_gender']; ?></td></tr>
                <?php }?>
                <?php while($rows1 = mysqli_fetch_assoc($sql_result1)){ ?>
                <tr><th>Mobile Number:</th><td><?php echo $rows1['p_mob']; ?></td></tr>
                <tr><th>Date of Birth:</th><td><?php echo strftime("%b %d, %Y",strtotime($rows1['p_dob'])); ?></td></tr>
                <tr><th>Address:</th><td><?php echo $rows1['p_address']; ?></td></tr>
                <tr><th>City:</th><td><?php echo $rows1['p_city']; ?></td></tr>
                <tr><th>State:</th><td><?php echo $rows1['p_state']; ?></td></tr>
                <tr><th>Semester:</th><td><?php echo $rows1['p_sem']; ?></td></tr>
                <tr><th>Year:</th><td><?php echo $rows1['p_year']; ?></td></tr>
                <tr><th>Program:</th><td><?php echo $rows1['p_program']; ?></td></tr>
                <tr><th>Branch:</th><td><?php echo $rows1['p_branch']; ?></td></tr>
                <?php }?>
                <tr><th></th><td><a class="pull-right" href="studentdetails.php"><i class="fa-solid fa-pen-to-square"></i>
                        Edit Profile</a></td></tr>
                
            </table>
            <br><br>
            <table class="table table-bordered table-condensed" style="border: 1px black;">
                <?php while($rows2 = mysqli_fetch_assoc($sql_pass_result)){ ?>
                <tr><th>Ticket Number:</th><td><?php echo $rows2['p_tk']; ?></td></tr>
                <tr><th>From Date:</th><td><?php echo $rows2['p_startdate']; ?></td></tr>
                <tr><th>To Date:</th><td><?php echo $rows2['end_date']; ?></td></tr>
                <tr><th>From Station:</th><td><?php echo $rows2['curr_startstation']; ?></td></tr>
                <tr><th>To Station:</th><td><?php echo $rows2['curr_endstation']; ?></td></tr>
                <?php }?>
            </table>
            <br><br>
            <button class="button" id="button">Generate PDF</button>
        </section>
    </div>
</div>
<script>
            var button = document.getElementById("button");
            var makepdf = document.getElementById("content"); 
            button.addEventListener("click", function() {
                var mywindow = window.open("", "PRINT", "height=400,width=600");
                mywindow.document.write(makepdf.innerHTML); 
                mywindow.document.close();
                mywindow.focus();
                mywindow.print(); 
                mywindow.close(); 
                return true;
            }); 
        </script>
</body>
</html>