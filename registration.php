<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/valid.css">
    <title>Verification</title>
	<div id="header"> 
	Course Registration 
	
	 <a href="student_homepage.php" style="position:absolute;right:150px;">Home</a> 
	 <a href="login.html" style="position:absolute;right:50px;">Logout</a> 
	 
	 </div>;
</head>
<body>
<div id="section">
<?php
//session_start();
$username=$_POST["username"];
$fname=$_POST["firstname"];
$lname=$_POST["lastname"];
$email=$_POST["email"];
$deptid=intval($_POST["department"]);
$password=$_POST["pswd"];

//$_SESSION["sess_username"]=$username;
//$_SESSION["sess_fname"]=$fname;
//$_SESSION["sess_lname"]=$lname;
//$_SESSION["sess_email"]=$email;
//$_SESSION["sess_password"]=$password;
//$_SESSION["sess_dept"]=$deptid;


//session_write_close();

//setcookie("username","$username",time()+3600);

$mysqli = new mysqli("localhost","root","","student_registration");
    if ($mysqli->connect_error){
        die('Could not connect to database!');
    }
$sql="INSERT INTO `user_details` (`net_id`, `first_name`, `last_name`,`email`,`password`, `dept_id`, `user_level`) VALUES
('$username', '$fname', '$lname', '$email','$password','$deptid', '2')";

if(!mysqli_query($mysqli,$sql)){die('error');}

//echo "You are successfully registered!<br>";
//echo "</br>";
//echo "</br>";
//echo "click the link below to login!<br>";
mysqli_close($mysqli);
?>

<h2>You are successfully registered!</h4>
</br>
<h3>click the link below to login!</h3>
<a href="login.html">Back to Login</a>
</div>
</body>
</html>