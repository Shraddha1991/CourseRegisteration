
<?php

if(isset($_POST["netid"]))
{
    if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
        die();
    }
    $mysqli = new mysqli("localhost","root","","student_registration");
    if ($mysqli->connect_error){
        die('Could not connect to database!');
    }
    
    $netid = filter_var($_POST["netid"], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH);
    
    $statement = $mysqli->prepare("SELECT netid FROM user_details WHERE netid=?");
    $statement->bind_param('s', $netid);
    $statement->execute();
    $statement->bind_result($netid);
    if($statement->fetch()){
        die('not available');
    }else{
        die('available');
    }
	mysqli_close($mysqli);
}

?>
