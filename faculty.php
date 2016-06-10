<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<!link rel="stylesheet" href="css/valid.css">
	<link rel="stylesheet" href="css/faculty.css">
    <title>Faculty page</title>
</head>
<body>
<div id="sections">
<a href="login.html"><button id="buttons">Logout</button></a>
</div>
<div id="container">
<?php
session_start();

if(isset($_SESSION["sess_username"]))
{
$netid=$_SESSION["sess_username"];

$mysqli = new mysqli("localhost","root","","student_registration");
    if ($mysqli->connect_error){
        die('Could not connect to database!');
    }
$sql="Select * from `course_section`where `faculty_id`='". $netid  ."';";
$result=mysqli_query($mysqli,$sql);
$length = mysqli_num_rows($result);

$sql1="Select * from `user_details` where `net_id`='". $netid  ."';";
$result1=mysqli_query($mysqli,$sql1);
$length1 = mysqli_num_rows($result1);

if($length1 !=0)
{
$row1 = mysqli_fetch_array($result1);
echo "Welcome ".$row1["first_name"]." ".$row1["last_name"]." !!"."<br>";

echo "<br>";

}
if($length !=0)
{

echo "<table border='1'>
<tr>
<th>Course ID</th>
<th>Section ID</th>
<th>Year/Sem</th>
<th>Timing</th>
<th>Max Seatings</th>
<th>Available Seatings</th>
<th>Syllabus</th>
</tr>";

while($row = mysqli_fetch_array($result)) 
{
  echo "<tr>";
  echo "<td>" . $row['course_id'] . "</td>";
  echo "<td>" . $row['section_id'] . "</td>";
  echo "<td>" . $row['year_sem'] . "</td>";
  echo "<td>" . $row['timing'] . "</td>";
  echo "<td>" . $row['max_seatings'] . "</td>";
  echo "<td>" . $row['available_seats'] . "</td>";
  echo "<td>".'<a href="uploadFile.html">upload syllabus here</a>'."</td>";
  echo "</tr>";
  
}
echo "</table>";
}
}
else
{
echo (" No Classes");
}
mysqli_close($mysqli);


?>


</div>
</body>
</html>