<?php

 

?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome!</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link rel="stylesheet" href="style.css">
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>
<body>
    <div class="page-header">
        <h1>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. You have successfully logged in to EduShare. <br />You can submit courses to teach or check your appointments...</h1>
    </div>
    <p>
    <div class="profile">
    <a href="submitcourse.php" class="btn btn-primary">Submit courses</a>
    <a href="checkapt.php" class="btn btn-primary">Check your appointments</a>
    <a href="profilet.php" class="btn btn-primary">Your account</a>
    <a href="submitcourse.php" class="btn btn-primary">Create a Classroom</a>
    <a href="editprofilet.php" class="btn btn-primary">Edit profile</a>
    </div>
    </p>
<p>
        <a href="reset-password.php" class="btn btn-warning">Reset Your Password</a>
        <a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a>
    </p>
</body>
</html>