<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	
	<link rel="stylesheet" href="css/student.css">
    <title>Cart page</title>
</head>
<body>
<div id="sections">
<a href="login.html"><button id="buttons">Logout</button></a>
</div>
<div id="container">
<?php

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
						
							echo "inside delete ";
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
										echo '<div> <h3>"Course deleted from the cart"</h3></div>';
										echo '<a href="view_cart.php"><button id="buttons">View Cart</a>';			
									}
							
							}
							
						
						
						

				}
					
				else
				{
					echo "inside enroll";
					$selected_course_id=$_POST['radio_button'];
					$avail_seats_sql="select available_seats from course_section,course where course.course_id=course_section.course_id and course_section.course_id='".$selected_course_id."'";
					
					
					$result_seats = $conn->query($avail_seats_sql);	
					
					if($result_seats -> num_rows >0)
					{
						while($row2 = $result_seats->fetch_assoc()) 
						{
							$available_seats=$row2['available_seats'];
							$net_id="sxg145431";
							echo $available_seats;
							if($available_seats > 0)
							{
								
								$enroll_sql="Insert into courses_enrolled values('sxg145431','1','$selected_course_id','Fall 2016')";	
								$insert_seats = $conn1->query($enroll_sql);	
								echo "you are enrolled";
								
								$update_seat_sql="update course_section set available_seats=available_seats - 1 where course_section.course_id='".$selected_course_id."'";
								$update_seat=$conn1->query($update_seat_sql);	
								echo $update_seat_sql;
								
								$delete_query= "delete from cart where course_id='".$selected_course_id."'";
								$deleted_course=$conn1->query($delete_query);	
								echo $delete_query;
								
							}
					   
							else
							{
								echo "No seats available ,sorry class is full";
							}
							
						    
							
						}
						
						
						
						
					}
					else
					{
						echo "sorry class is filled";
					}
					
					
					
				}
		}

?>
</div>
</body>
</html>