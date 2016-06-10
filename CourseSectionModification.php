<?php 

$con = mysqli_connect("localhost","root","","student_registration");  
$course_id = mysqli_real_escape_string($con, $_POST['course_id']);
$section_id= mysqli_real_escape_string($con, $_POST['section_id']);
$year_sem= mysqli_real_escape_string($con, $_POST['year_sem']);
if(mysqli_connect_errno()){
	echo "Failed";
}	
if (isset($_POST['action'])) {
    switch ($_POST['action']) {
        case 'Search':
            search($con,$course_id,$section_id,$year_sem);
            break;
        case 'Update':
			$course_id = mysqli_real_escape_string($con, $_POST['course_id']);
			$faculty_id= mysqli_real_escape_string($con, $_POST['faculty_id']);
			$seatings= mysqli_real_escape_string($con, $_POST['seatings']);
			$section_id= mysqli_real_escape_string($con, $_POST['section_id']);
			//$syllabus= mysqli_real_escape_string($con, $_POST['syllabus']);
			$timing= mysqli_real_escape_string($con, $_POST['timing']);
			$year_sem= mysqli_real_escape_string($con, $_POST['year_sem']);
          //  update($con,$course_id,$faculty_id,$seatings,$section_id, $syllabus,$timing,$year_sem);
		  update($con,$course_id,$faculty_id,$seatings,$section_id, $timing,$year_sem);
            break;
		 case 'Delete':
            deleteCourse($con,$course_id,$section_id,$year_sem);
            break;
		case 'Insert':
			$faculty_id= mysqli_real_escape_string($con, $_POST['faculty_id']);
			$seatings= mysqli_real_escape_string($con, $_POST['seatings']);
			$section_id= mysqli_real_escape_string($con, $_POST['section_id']);
			//$syllabus= mysqli_real_escape_string($con, $_POST['syllabus']);
			$timing= mysqli_real_escape_string($con, $_POST['timing']);
			$year_sem= mysqli_real_escape_string($con, $_POST['year_sem']);
         
           //insert($con,$course_id,$faculty_id,$seatings,$section_id, $syllabus,$timing,$year_sem);
			insert($con,$course_id,$faculty_id,$seatings,$section_id, $timing,$year_sem);
			break;
    }
}



function search($con,$course_id,$section_id,$year_sem)
{
	
   $sql = "SELECT course_id,faculty_id,max_seatings,section_id,timing,year_sem FROM course_section where course_id='$course_id' and section_id='$section_id' and year_sem='$year_sem'";
	//echo $sql;
	$result = mysqli_query($con,$sql);
	if(mysqli_num_rows($result)>0){
		
		if($row = mysqli_fetch_assoc($result)){
			//echo "inside if";
				$main = array($row);
				echo json_encode($main);
		}
	}
 
	exit;
}

function update($con,$course_id,$faculty_id,$seatings,$section_id, $timing,$year_sem)
{
	$sql = "update course_section set faculty_id='$faculty_id',max_seatings='$seatings',section_id='$section_id',timing='$timing',year_sem='$year_sem' where course_id='$course_id' and section_id='$section_id' and year_sem='$year_sem'";
	$result = mysqli_query($con,$sql);
	//echo $sql;
	
	//echo "update function called";
	exit;
}	

function deleteCourse($con,$course_id,$section_id,$year_sem)
{
	$sql = "DELETE FROM course_section where course_id='$course_id' and section_id='$section_id' and year_sem='$year_sem'";
	$result = mysqli_query($con,$sql);
	echo $result;
	exit;
}	

function insert($con,$course_id,$faculty_id,$seatings,$section_id,$timing,$year_sem)
{
	/*$course_id=$_POST['courseid'];
	$course_name=$_POST['coursename'];
	$coursedescription=$_POST['description'];
	$deptid=$_POST['deptid'];
	$prerequisites=$_POST['prerequisites'];
	$level=$_POST['level'];*/
	$sql = "INSERT INTO `course_section`(`course_id`, `faculty_id`, `max_seatings`, `section_id`,  `timing`,`year_sem`,`available_seats`) VALUES ('$course_id','$faculty_id','$seatings','$section_id','$timing','$year_sem','$seatings')";
	$result = mysqli_query($con,$sql);
	echo $sql;
	echo $result;
	exit;
}	

mysqli_close($con);

?> 