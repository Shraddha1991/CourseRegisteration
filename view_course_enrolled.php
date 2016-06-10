<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	
	<link rel="stylesheet" href="css/student.css">
    <div id="header"> 
	Course Registration 
	<a href="student_homepage.php" style="position:absolute;right:150px;">Home</a> 
	 <a href="login.html" style="position:absolute;right:50px;">Logout</a> 
	
	 </div>;
</head>
<body>

<div id="container">

<?php
session_start();
if(isset($_SESSION["sess_username"]))
	{
		$netid=$_SESSION["sess_username"];
		$servername = "localhost";
		$username = "root";
		$password = "";
		$conn = new mysqli($servername, $username, $password, "student_registration");
		$conn1 = new mysqli($servername, $username, $password, "student_registration");
		if ($conn->connect_error) 
		{
				die("Connection failed: " . $conn->connect_error);
		} 
	
		
		else
		{
		
			$sql= "select * from course ,courses_enrolled where course.course_id=courses_enrolled.course_id and courses_enrolled.net_id='".$netid."'";
			$result = $conn->query($sql);
			echo $conn->error;
		
	
		
		
		if ($result->num_rows > 0) 
			{
				
				echo '<div > <h1>Courses Enrolled</h1></div>';
				echo "<table border='3' style='width:600px;'>";
				echo "<tr>";
				echo "<th><b>course id<b><br></th>";	
				echo "<th><b>course name<b><br></th>";								
				echo '</tr>';
				
				
				while($row = $result->fetch_assoc()) 
				{
				
					echo '<br>';
					echo "<tr >";
					echo "<td  >" . $row["course_id"]. "</td>";	
					echo "<td  >" . $row["course_name"]. "</td>";
					
					echo '</tr>';
					
				}
				echo "</table>";
					echo '<table style="width: 320px">';
					echo '<br>';
					echo '<br>';
					echo '<tr>';
				
				
				echo '</tr>';
				echo '</table>';	
			
				
			}
			
			else
			{
						echo '<div> <h1>No Courses added to the cart</h1></div>';
						echo '<table>';
	
						echo '<tr>';
						echo '<td><a href="search_course.php"><button id="buttons">Search course</button></a><td>';	
						echo '</tr>';
						echo '</table>';
			}
		
	}
	
		
		
	}
	
	
	else
	{
		
		echo "please login to continue";
		
	}
	
	
	
	
	
	

?>

</div>
</body>
</html>