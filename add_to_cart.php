<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	
	<link rel="stylesheet" href="css/student.css">
   <div id="header"> 
	 Course Registration 
	  <a href="student_homepage.php" style="position:absolute;right:150px;">Home</a> 
	 <a href="login.html" style="position:absolute;right:50px;">Logout</a> 
	
	 
	 
	 </div>
</head>
<body>

<div id="container">

<?php	
	session_start();
	if(isset($_SESSION["sess_username"]))
	{
		$netid=$_SESSION["sess_username"];
		if (isset($_POST['cart'])) 
	{
		
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
			
			if(isset($_POST['radio_button']))
		{
			
			$selected_course_name=$_POST['radio_button'];
			$sql= "select course_id from course where course_name='".$selected_course_name."'";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) 
			{
				while($row = $result->fetch_assoc()) 
				{
					$course_id=$row['course_id'];
				}
				
				$student_course="Insert into cart values('$course_id','$netid')";
				$result = $conn1->query($student_course);
				if($conn1->error)
				{
					echo '<div> <h1>View Cart</h1></div>';
					echo ' <h2>Course already in the cart</h2>';
				}
				
				else
				{
						echo '<div> <h1>View Cart</h1></div>';
						echo "<h2> Course added to the cart!!</h2>";
				}
				
					echo '<br>';
					echo '<br>';
					echo '<table  cellspacing="70">';					
					echo '<tr>';
					echo '<td>';
					echo '<a href="search_course.php"><button id="buttons">Continue Course Search</button></a>';
					echo '</td>';
					
					echo '<td>';
					echo '<a href="view_cart.php"><button id="buttons">View Cart</button></a>';
					echo '</td>';
		
				echo '</tr>';
				echo '</table>';					
					
				
				
			}
			
			else
			{
				echo '<div> <h1>View Cart</h1></div>';
				echo "<h2>No Such course found</h2>";
			}
			
		}
		
		else
		{
			echo '<div > <h1>Course Registration</h1></div>';
			echo "Select a course to add to cart!!";
			echo '<table  cellspacing="70">';					
					echo '<tr>';
					echo '<td>';
						echo '<a href="search_course.php"><button id="buttons">Search course</button></a>';
					echo '</td>';
				echo '</tr>';
				echo'</table>';
		}
		
			
			
			
		}
		
		
		
		
		
		
	}
		
	}
	
	else
	{
		echo "please login";
	}
	
	
?>

</div>
</body>
</html>