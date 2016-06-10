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
			
				if (isset($_POST['delete_cart'])) 
				{
						
							
							if(isset($_POST['radio_button']))
							{
									$selected_course=$_POST['radio_button'];
									$delete_query= "delete from cart where course_id='".$selected_course."'";
									$result = $conn->query($delete_query);
									echo($conn->error);
									if($conn->error)
									{
											echo "course already deleted";
									}
								
									else
									{
										echo '<div > <h1>View Cart</h1></div>';
										echo '<div><h3>Course deleted from the cart</h3></div>';
										echo '<a href="view_cart.php"><button id="buttons">View Cart</button></a>';			
									}
							
							}
							
						
						
						

				}
					
				else
				{
					
					$selected_course_id=$_POST['radio_button'];
					$avail_seats_sql="select * from course_section,course where course.course_id=course_section.course_id and course_section.course_id='".$selected_course_id."'";
					
					
					$result_seats = $conn->query($avail_seats_sql);	
					
					
					if($result_seats -> num_rows >0)
					{
						while($row2 = $result_seats->fetch_assoc()) 
						{
							$available_seats=$row2['available_seats'];
							$year_sem=$row2['year_sem'];
							$section_id=$row2['section_id'];
							
						}	
							
							if($available_seats > 0)
							{
								
								$enroll_sql="Insert into courses_enrolled values('$netid','$section_id','$selected_course_id','$year_sem')";	
								$insert_seats = $conn1->query($enroll_sql);	
								if($conn1->error)
								{
									echo '<div > <h1>Course Enroll</h1></div>';
									echo "<h2>Already enrolled !!<h2>";
									
								}
								
								else
								{
									$update_seat_sql="update course_section set available_seats=available_seats - 1 where course_section.course_id='".$selected_course_id."'";
									$update_seat=$conn1->query($update_seat_sql);	
									
									
									$delete_query= "delete from cart where course_id='".$selected_course_id."'";
									$deleted_course=$conn1->query($delete_query);	
								
								
									echo '<div > <h1>Course Enroll</h1></div>';
								echo '<div ><h3>Successfully enrolled in class !!</h3></div>';
								echo '<a href="view_cart.php"><button id="buttons">View Cart</button></a>';	
								echo '<a href="view_course_enrolled.php"><button id="buttons">View Courses enrolled</button></a>';										
								
								
								
								
								}
								
								
								
								
								
								
								
								
								
							}
					   
							else
							{
								echo '<div > <h1>View Cart</h1></div>';
								echo "No seats available ,sorry class is full";
							}
							
						    
							
						
						
						
						
						
					}
					else
					{
						echo '<div > <h1>View Cart</h1></div>';
						echo "sorry class is filled";
					}
					
					
					
				}
		}
		
	
		
	}
	
	
	else
	{
		echo "login to continue";
	}
		
		
		

?>

</div>
</body>
</html>