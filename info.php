
<?php
session_start();
$username=$_POST["netid"];
#$fname=$_POST["fname"];
#$lname=$_POST["lname"];
#$email=$_POST["email"];
$password=$_POST["password"];
$_SESSION["sess_username"]=$username;
#$_SESSION["sess_fname"]=$fname;
#$_SESSION["sess_lname"]=$lname;
#$_SESSION["sess_email"]=$email;
$_SESSION["sess_password"]=$password;

#setcookie("username","$username",time()+3600);





$mysqli = new mysqli("localhost","root","","student_registration");
    if ($mysqli->connect_error){
        die('Could not connect to database!');
    }
$sql="Select * from `user_details`where `net_id`='$username';";
$result=mysqli_query($mysqli,$sql);

if($result->num_rows==0)
{
header('Location:login.html');
exit();
}

else{
$userData = mysqli_fetch_array($result,MYSQL_ASSOC);

mysqli_close($mysqli);

if($password!=$userData['password'])
{
header('Location:login.html');
exit();
}
else
{
if($userData['user_level']==0) //admin page
{
header('Location:AdminHomePage.php');
}
else
{
 if($userData['user_level']==1) //faculty page
{
header('Location:faculty.php');
}
else
{
header('Location:student_homepage.php');
}
}
}
}
#if(!mysqli_query($mysqli,$sql)){die('error');}
#echo "Please click the link below to go to welcome page!<br>";
session_write_close();

?>

