
<!DOCTYPE html>
<html>
<head>
<div id="header"> 
		Course Registration 
			<a href="AdminHomePage.php" style="position:absolute;right:150px;">Home</a> 
			<a href="login.html" style="position:absolute;right:50px;">Logout</a> 
	</div>
<link rel="stylesheet" href="css/faculty.css">


<script  src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js">  
</script>
<script>

$(document).ready(function(){
    $(document).on("click",".button",function(){
        var clickBtnValue = $(this).val();
			
			//var courseid=$("select[name='courseid'] option:selected").text();
		var courseid=$("#course_id").val().trim();
		var section_id=$("#section_id").val().trim();
		var year_sem=$("#year_sem").val().trim();
	
		if(courseid.length<1 || section_id.length<1 || year_sem.length<1)
		{
			
			document.getElementById("result").innerHTML="Course ID, Section ID and Semester are mandatory. Please enter!!";
			
		}
		else{
					
					var faculty_id=$("#faculty_id").val();
						
					var seatings=$("#seatings").val();
					
					var syllabus=$("#syllabus").val();
					var timing=$("#timing").val();
					
					
				   data =  {'action': clickBtnValue,'course_id':courseid,'faculty_id':faculty_id,'seatings':seatings,'section_id':section_id,'syllabus':syllabus,'timing':timing,'year_sem':year_sem};
				   
				   
						   switch(clickBtnValue)
						   {
							  case 'Search':
								search(data);
								break;
							  case 'Update':
								update(data);
								break;
							  case 'Delete':
								Delete(data);
								break;
							  case 'Reset':
								reset(data);
								break;
							  case 'Insert':
								insert(data); 
								break;
						   }
			}				
							
									return false; 
		
    }); 
	

});
function reset()
{
			$("#course_id").val("");
			$("#faculty_id").val("");
			$("#seatings").val("");
			$("#section_id").val("");
			$("#syllabus").val("");
			$("#timing").val("");
			$("#year_sem").val("");
}
function insert(data)
{
	 $.ajax(
				{
					url: "CourseSectionModification.php",
					datatype:"json",
					type:"POST",
					data:data,
					success: function(result){
						
						document.getElementById("result").innerHTML="Inserted Successfully";
				    },
					error: function(error)
					{
					alert(error);
					}
					
				});
}
function Delete(data)
{
	 $.ajax(
				{
					url: "CourseSectionModification.php",
					datatype:"json",
					type:"POST",
					data:data,
					success: function(result){
						
						document.getElementById("result").innerHTML="Deleted Successfully";
				    },
					error: function(error)
					{
					alert(error);
					}
					
				});
}
function update(data)
{
	 $.ajax(
				{
					url: "CourseSectionModification.php",
					datatype:"json",
					type:"POST",
					data:data,
					success: function(result){
						
						document.getElementById("result").innerHTML="Updated Successfully";
				    },
					error: function(error)
					{
					alert(error);
					}
					
				});
}
function search(data)
{
	 $.ajax(
				{
					url: "CourseSectionModification.php",
					datatype:"json",
					type:"POST",
					data:data,
					success: function(result){
					
						var evalData = JSON.parse(result);
						evalData.forEach(function(element){
							$('#course_id').val(element.course_id);
							$('#faculty_id').val(element.faculty_id);
							$('#seatings').val(element.max_seatings);
							$('#section_id').val(element.section_id);
							$('#syllabus').val(element.syllabus);
							$('#timing').val(element.timing);
							$('#year_sem').val(element.year_sem);
					});
						//alert("action performed successfully"+result);
				    },
					error: function(error)
					{
					alert(error);
					}
					
				});
	
}

</script>
</head>
<body>
	<br>
	<br>
<div id="containerForCourseSectionModification">
<h1><font color="blue">Course Section Modifications Page</font></h1>
<form name="CourseModification" >
<!--<table>
<tr>
<td>
Course ID </td><td><input name="course_id" style="width: 440px;" style="width: 300px;" type="text" id="course_id"></input></td>
<td><input type="submit" class="button" name="search" value="Search"></td>
</tr>
</table>-->
<!--<div id="insertForm">
Course Name<input name="coursename" type="text" id="coursename"></input>
Description<input name="description" type="text" id="description"></input>
Department ID<input name="deptid" type="text" id="deptid"></input>
Prerequisites<input name="prerequisites" type="text" id="prerequisites"></input>
Level<input name="level" type="text" id="level">
<input type="button" class="button" name="insert" value="Insert">
</div>
-->
<?php
/*	$servername = "localhost";
	$username = "root";
	$password = "";
	$conn = new mysqli($servername, $username, $password, "student_registration");
	$sql="select course_id from course_section";
	$result=$conn->query($sql);

	if ($conn->connect_error) 
	{
		die("Connection failed: " . $conn->connect_error);
	} 
	
	else
	{
		echo "<table>";
			echo"<tr>"	;	
			echo"<td>"	;		
					
		echo "Course ID <font color='red'>*</font>:";
		echo"</td>"	;	
		echo"<td>"	;			
		echo '<select style="width: 340px;" name="courseid" id="courseid">';
		if ($result->num_rows > 0) 
			{
					while($row = $result->fetch_assoc()) 
					{
						echo "<option value='".$row["course_id"]."'>".$row["course_id"]."</option>";

					}
				
			}				
		
		else
			{
				echo "no courses";
			}				
				
		
			  
			echo '</select>   </br> </br>';
	}
	*/
		?>
	<!--	</td>
		</tr>-->
		<table>
				<tr>
					<td>
						Course ID<font color="red">*</font> </td><td><input name="course_id" style="width: 320px;" style="width: 300px;" type="text" id="course_id" required></input></td>
					
				</tr> 
				
				<tr>
					<td>Section ID<font color="red">*</font></td><td><input name="section_id" id="section_id" style="width: 320px;" style="width: 300px;" type="text" value="" required></input><div id="sectiondiv"></div></td>
				</tr>
				
				<tr>
					<td>Semester<font color="red">*</font></td><td><input name="year_sem" id="year_sem" type="text"  style="width: 320px;" required value=" " ></input></td>
				</tr>
				
				<tr>
					<td>Faculty ID</td><td><input name="faculty_id" id="faculty_id" style="width: 320px;" type="text" value=""</input>
				</tr>
				<tr>
					<td>Timing</td><td><input name="timing" id="timing" type="text"  style="width: 320px;" value=" "></td>
				</tr>
				<tr>
					<td>Seatings</td><td><input name="seatings" id="seatings" type="text" style="width: 320px;" value=" "></input></td>
				</tr>
				</table>
				<br>
				<table>
				<tr>
					<td ><input type="button" style="width: 100px;" class="button" name="insert" id="Insert" value="Insert"></td>
					<td><input type="button" style="width: 100px;" class="button" name="update" id="Update" value="Update"></td>
					<td><input type="button" style="width: 100px;" class="button" name="delete" id="Delete" value="Delete"></td>
					<td><input type="button" style="width: 100px;" class="button" name="reset" id="Reset" value="Reset"></td>
					<td><input type="submit" style="width: 100px;" class="button" name="search" id="Search" value="Search"></td>
				</tr> 
		</table>
<div id="result"> </div>
<!--<input type="button" class="button" name="update" value="Update">
<input type="button" class="button" name="delete" value="Delete">-->
</div>

</form>

</body>
</html>