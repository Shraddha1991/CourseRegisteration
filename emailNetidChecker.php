<?php
$q = $_GET['q'];
$str4 = $_GET['str4'];

$con = new mysqli("localhost","root","","student_registration");

if (!$con) {
  die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"student_registration");


if($str4=='N')
{
$sql="SELECT `net_id` FROM `user_details` WHERE `net_id`='".$q."'";
$result = mysqli_query($con,$sql);

if($result->num_rows == 0)
{echo "value already present select another";}
}
else if($str4=='E')
{
$sql="SELECT `email` FROM `user_details` WHERE `email`='".$q."'";
$result = mysqli_query($con,$sql);
if($result->num_rows == 0)
{echo "value already present select another";}
}




mysqli_close($con);
?>
