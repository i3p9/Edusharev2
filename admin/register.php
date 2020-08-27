<?php
if(isset($_POST['signup-submit'])) {
    require "config.php";
    $username=$_POST['username'];
    $usermail=$_POST['usermail'];
    $password=$_POST['password'];
    $repeat_pass=$_POST['repeat_password'];
    $adminverify=$_POST['adminverify'];

    if(isset($adminverify)) {
        if(!($adminverify=="EduShareAdmin2020")) {
            header("Location:../adminlogin.php?error=wrongcode");
            exit();
        }
    }

    if(empty($username) || empty($usermail) || empty($password) || empty($repeat_pass)) {
        header("Location:../adminlogin.php?error=emptyfields&username=".$username."&usermail=".$usermail);
        exit();
    } else if(!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        header("Location:../adminlogin.php?error=invalidusername&usermail=".$usermail);
        exit();
    } else if($password !== $repeat_pass) {
        header("Location:../adminlogin.php?error=passwordmismatch&&username=".$username."&usermail=".$usermail);
        exit();
    } else {
        $sql="SELECT adminid FROM admins WHERE username=?";
        $stmt=mysqli_stmt_init($link);
        if(!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location:../adminlogin.php?error=sqlerror");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck=mysqli_stmt_num_rows($stmt);
            if($resultCheck>0) {
                header("Location:../adminlogin.php?error=invalidusername&usermail=".$usermail);
                exit();
            } else {
                $sql="SELECT adminid FROM admins WHERE usermail=?";
                $stmt=mysqli_stmt_init($link);
                if(!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location:../adminlogin.php?error=sqlerror");
                    exit();
                } else {
                    mysqli_stmt_bind_param($stmt, "s", $usermail);
                    mysqli_stmt_execute($stmt);
                    mysqli_stmt_store_result($stmt);
                    $resultCheck=mysqli_stmt_num_rows($stmt);
                    if($resultCheck>0) {
                        header("Location:../adminlogin.php?error=invalidusername&usermail=".$usermail);
                        exit();
                    } else {
                        $sql = "INSERT INTO admins (username, password, usermail) VALUES (?, ?, ?)";
                        $stmt=mysqli_stmt_init($link);
                        if(!mysqli_stmt_prepare($stmt, $sql)) {
                            header("Location:../adminlogin.php?error=sqlerror");
                            exit();
                        } else {
                            $hashedpwd=password_hash($password, PASSWORD_DEFAULT);
                            mysqli_stmt_bind_param($stmt, "sss", $username, $hashedpwd, $usermail);
                            mysqli_stmt_execute($stmt);
                            header("Location:../adminlogin.php?signup=success");
                            exit();
                        }
                    }
                }

            }
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($link);
} else {
    header("Location:../adminlogin.php");
    exit();
}
?>