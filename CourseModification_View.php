
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
		
		var courseid=$("select[name='courseid'] option:selected").text();
		
		var coursename=$("#coursename").val();
		
		var description=$("#description").val();
		var deptid=$("#deptid").val();
		var prerequisites=$("#prerequisites").val();
		var level=$("#level").val();
		
       data =  {'action': clickBtnValue,'courseid':courseid,'coursename':coursename,'description':description,'deptid':deptid,'prerequisites':prerequisites,'level':level};
	   
	   
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
		case 'Insert':
            insert(data); 
			break;
	   }
		search(data)
		
				return false; 
    }); 
	

});
function insert(data)
{
	 $.ajax(
				{
					url: "CourseModification.php",
					datatype:"json",
					type:"POST",
					data:data,
					success: function(result){
							document.getElementById("result").innerHTML="Inserted Successfully";
						//alert("action performed successfully"+result);
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
					url: "CourseModification.php",
					datatype:"json",
					type:"POST",
					data:data,
					success: function(result){
							document.getElementById("result").innerHTML="Deleted Successfully";
					//	$(#result).html("Deleted successfully!!");
					//	alert("action performed successfully"+result);
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
					url: "CourseModification.php",
					datatype:"json",
					type:"POST",
					data:data,
					success: function(result){
						document.getElementById("result").innerHTML="Updated Successfully";
					//	$(#result).html("Updated successfully!!");
						//alert("action performed successfully");
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
					url: "CourseModification.php",
					datatype:"json",
					type:"POST",
					data:data,
					success: function(result){
						var evalData = JSON.parse(result);
						evalData.forEach(function(element){
							$('#coursename').val(element.course_name);
							$('#description').val(element.course_description);
							$('#deptid').val(element.dept_id);
							$('#prerequisites').val(element.prerequiste);
							$('#level').val(element.level);
							
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
<div id="containerForCourseModification">
<h1><font color="blue">Course Modifications Page</font></h1>
<form name="CourseModification" >

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
	$servername = "localhost";
	$username = "root";
	$password = "";
	$conn = new mysqli($servername, $username, $password, "student_registration");
	$sql="select course_id from course";
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
	
		?>
	</td>
	</tr>
	


		<!--<table>
				<tr>
					<td>
					Course ID <font color="red">*</font></td><td><input name="courseid" style="width: 320px;"  type="text" id="courseid"></input>
					</td>

				</tr>-->
				<tr>
				<td>Course Name</td> <td><input name="coursename" id="coursename" style="width: 320px;" type="text" value=""</input></td>
				</tr>
				<tr>
				<td>Description</td><td><textarea id="description" rows="10" cols="45"></textarea></td>
				</tr>
				<tr>
				<td>Department ID</td><td><input name="deptid" id="deptid" type="text" style="width: 320px;" value=" "></input></td>
				</tr>
				<tr>
				<td>Prerequisites</td><td><input name="prerequisites" id="prerequisites" style="width: 320px;" style="width: 300px;" type="text" value=" "></input></td>
				</tr>
				<tr>
				<td>Level</td><td><input name="level" id="level" type="text"  style="width: 320px;" value=" "></td>
				</tr>
				
				</table>
				<br>
				<table>
				<tr>
				
				<!--<td ><input type="button" class="button" style="width: 100px;" name="insert" value="Insert"></td>-->
				<td><input type="button" class="button" style="width: 100px;"name="update" value="Update"></td>
				<td><input type="button" class="button" style="width: 100px;"name="delete" value="Delete"></td>
				<td><input type="submit" class="button" style="width: 100px;" name="search" value="Search"></td>
				</tr> 
		</table>
<div id="result"> </div>
<!--<input type="button" class="button" name="update" value="Update">
<input type="button" class="button" name="delete" value="Delete">-->


</form>
</div>
</body>
</html>