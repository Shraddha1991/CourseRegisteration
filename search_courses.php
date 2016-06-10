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
	$servername = "localhost";
	$username = "root";
	$password = "";
	$conn = new mysqli($servername, $username, $password, "student_registration");
	
	
	
	
	$department_name=isset($_POST['department_name']) ? $_POST['department_name']:'';
	$course_name=isset($_POST['course_name']) ? $_POST['course_name'] :'';
	$class_level=isset($_POST['class_level'])? $_POST['class_level'] :'';
	
	
	
	
	if($course_name==null)
	{
		$sql= "select * from course,department,course_section where course.dept_id=department.dept_id and course.course_id=course_section.course_id and dept_name='".$department_name."'and course.level='".$class_level."'";
	}
	
	else
	{
		$sql= "select * from course,department,course_section where course.dept_id=department.dept_id and course.course_id=course_section.course_id and dept_name='".$department_name."'and course_name='".$course_name."'and course.level='".$class_level."'";
		
	}
	
	
		
	// Check connection
	if ($conn->connect_error) 
	{
		die("Connection failed: " . $conn->connect_error);
	} 
	
	else
	{		 
		 	
			$result = $conn->query($sql);
			 echo($conn->error);
			if ($result->num_rows > 0) 
			{
				echo '<form action="add_to_cart.php" method="post">';
				echo '<div > <h1>Course Search Results</h1></div>';
				echo "<table border='1'>";
				
				echo "<tr>";
							
				echo "<th><b>course id<b></th>";
				echo "<th><b>course name<b></th>";
				echo "<th><b>Description</b></th>";
				echo "<th><b>prerequiste</b></th>";
				echo "<th><b>Available seats</b></th>";
			
				echo "<th>Action </th>";					
				#echo "<th><b>Section</b></th>";
				
				
				echo "</tr>";
							
				
				while($row = $result->fetch_assoc()) 
				{
					echo '<br>';
					echo "<tr>";				
					echo "<td>" . $row["course_id"]. "</td>";
					echo "<td>" . $row["course_name"]. "</td>";
					echo "<td>" . $row["course_description"]. "</td>";	
					echo "<td >" . $row["prerequiste"]. "</td>";
					echo "<td>" . $row["available_seats"]. "</td>";					
					echo "<td ><input type='radio' name='radio_button' value='".$row["course_name"]."'></td>";					
					#echo "<td >" . $row["section_id"]. "</td>";
					
					
					echo "</tr>";
				
				
				}
					echo "</table>";
					
					echo '<tr>';
					echo '<br>';
					echo '<br>';
					echo '<input type="submit" name="cart" id="buttons" value="Add to cart">';						
					echo '</tr>';
					echo '</table>';
				echo '</form>';
				
				
			}
			else
			{
				echo '<div > <h1>Search Courses</h1></div>';
				echo '<h2>No such course found </h2>';
				
			}
			 

		  
	}
?>
</div>;

</body>
</html>