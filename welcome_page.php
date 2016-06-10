<!DOCTYPE html>
<?php
session_start();
?>
<html>
<body>
<?php

if(isset($_SESSION["sess_username"]))
echo "Your username is ".$_SESSION["sess_username"]."<br>";
else
echo "YYYYYY";

if(isset($_SESSION["sess_email"]))
echo "Your email is ".$_SESSION["sess_email"];
else
echo " :("
?>

</body>
</html>