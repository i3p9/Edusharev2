<?php
session_start();
include "adminheader.php";
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home!</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link rel="stylesheet" href="style.css">
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>
<body>
    <div class="page-header">
        <h1>Hi <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>, Welcome to your management system</h1>
    </div>
    <p>
    <div class="profile">
    <a href="seeallusers.php" class="btn btn-info">See a list of all users</a>
    <a href="changestatus.php" class="btn btn-info">Change User status</a>
    <a href="approveclass.php" class="btn btn-info">Approve Classes</a>
    <a href="approveprivate.php" class="btn btn-info">Approve Private Tutors</a>
    <a href="logout.php" class="btn btn-danger">Log Out</a>
    </div>
    </p>
</body>
</html>