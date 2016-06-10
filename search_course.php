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
    <title>Search Course page</title>
</head>
<body>

<div id="container">


<?php


	$servername = "localhost";
	$username = "root";
	$password = "";
	$conn = new mysqli($servername, $username, $password, "student_registration");
	$sql="select dept_name from department";
	$result=$conn->query($sql);

	if ($conn->connect_error) 
	{
		die("Connection failed: " . $conn->connect_error);
	} 
	
	else
	{


	echo '<form action ="search_courses.php" method="post">';
	echo '<div > <h1>Search Course</h1></div>';
		echo '<table style="width:500px">';
		echo '<tr>';
		echo '<td>';
		echo "Department :";
	     echo '</td>';
		 echo '<td>';
		echo '<select name="department_name" id="department_name" style="width:320px">';
		if ($result->num_rows > 0) 
			{
					while($row = $result->fetch_assoc()) 
					{
						echo "<option value='".$row["dept_name"]."'>".$row["dept_name"]."</option>";				
						
					}
				
			}				
		
		else
			{
				echo "no departments";
			}				
				
		
			  
			echo '</select>   </br> </br>';
			echo '</td>';
			echo '</tr>';
			
			echo '<tr>';
			echo '<td>';
			echo "Class level :";
			echo '</td>';
			echo '<td>';
			echo '<select name="class_level" id="class_level" style="width:320px">';
				  echo '<option value="Graduate">Graduate</option>';
				  echo '<option value="Undergraduate">Undergraduate</option>';
			echo '</select> </br> </br>';
			echo '</td>';
			echo '</tr>';
			
			
			echo '<tr>';
			echo '<td>';
			echo "Course Name: ";
			
			echo '</td>';
			echo '<td>';		
			echo '<input type="text"  name="course_name" id="course_name" style="width:300px"><br><br> ';
			echo '</td>';
			echo '</tr>';		
			
			echo '</table>';
			
			echo '<input type="submit" id="buttons" name="send" value="Submit" >';
		
			echo'</form> ';
			
		
	}
	?>
	</div>
</body>
</html>