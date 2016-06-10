<?php 

$con = mysqli_connect("localhost","root","","student_registration");  
$courseid = mysqli_real_escape_string($con, $_POST['courseid']);

if (isset($_POST['action'])) {
    switch ($_POST['action']) {
        case 'Search':
            search($courseid,$con);
            break;
        case 'Update':
			$coursename = mysqli_real_escape_string($con, $_POST['coursename']);
			$description= mysqli_real_escape_string($con, $_POST['description']);
			$deptid= mysqli_real_escape_string($con, $_POST['deptid']);
			$prerequisites= mysqli_real_escape_string($con, $_POST['prerequisites']);
			$level= mysqli_real_escape_string($con, $_POST['level']);
            update($con,$courseid,$coursename,$description,$deptid, $prerequisites,$level);
            break;
		 case 'Delete':
            deleteCourse($con,$courseid);
            break;
		case 'Insert':
			$coursename = mysqli_real_escape_string($con, $_POST['coursename']);
			$description= mysqli_real_escape_string($con, $_POST['description']);
			$deptid= mysqli_real_escape_string($con, $_POST['deptid']);
			$prerequisites= mysqli_real_escape_string($con, $_POST['prerequisites']);
			$level= mysqli_real_escape_string($con, $_POST['level']);
         
            insert($con,$courseid,$coursename,$description,$deptid, $prerequisites,$level);
			break;
    }
}

if(mysqli_connect_errno()){
	echo "Failed";
}	

function search($courseid,$con)
{
   $sql = "SELECT * FROM course where course_id='$courseid'";
	$result = mysqli_query($con,$sql);
	if(mysqli_num_rows($result)>0){
		if($row = mysqli_fetch_assoc($result)){
				$main = array($row);
				echo json_encode($main);
		}
	}
	exit;
}

function update($con,$courseid,$coursename,$description,$deptid, $prerequisites,$level)
{
	$sql = "update course set course_name='$coursename',course_description='$description',dept_id='$deptid',prerequiste='$prerequisites',level='$level' where course_id='$courseid'";
	$result = mysqli_query($con,$sql);
	echo $sql;
	echo $coursename;
	//echo "update function called";
	exit;
}	

function deleteCourse($con,$courseid)
{
	$sql = "DELETE FROM course where course_id='$courseid'";
	$result = mysqli_query($con,$sql);
	echo $result;
	exit;
}	

function insert($con,$courseid,$coursename,$description,$deptid, $prerequisites,$level)
{
	
	$sql = "INSERT INTO `course`(`course_id`, `course_name`, `course_description`, `dept_id`, `prerequiste`, `level`) VALUES ('$courseid','$coursename','$description','$deptid','$prerequisites','$level')";
	echo $sql;
	$result = mysqli_query($con,$sql);
	echo $result;
	exit;
}	

mysqli_close($con);

?>