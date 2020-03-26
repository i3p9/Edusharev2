<?php

session_start();
 
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

$course = $_GET["course"]
?>

<!DOCTYPE html>
<html lang="en">
<head>

</head>
<body>
    <div class="page-header">
        <h1>Hi, <b><?php echo $course; ?></b>. You have successfully logged in to EduShare. <br />You can submit courses to teach or check your appointments...</h1>
    </div>

</body>
</html>