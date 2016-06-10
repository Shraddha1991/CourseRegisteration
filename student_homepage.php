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

<div id="sections">
<!--<a href="login.html"><button id="buttons">Logout</button></a>-->
</div>
<br>
<br>
<br>
<div id="container">
<h1>Student Home Page</h1>
<?php
	echo '<br>';
	echo '<br>';
	echo '<center>';
	
	echo '<a href="search_course.php"><button id="buttons">Search course</button></a><br><br>';	
	
	echo '<a href="view_cart.php"><button id="buttons">View Cart</button></a><br><br>';	

echo '<a href="view_course_enrolled.php"><button id="buttons">View Courses enrolled</button></a>';	
	echo '</center>';

?>
</div>
</body>
</html>