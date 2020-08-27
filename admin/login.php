<?php
if(isset($_POST['login-submit'])) {
    require "config.php";
    $userinput=$_POST['userinput'];
    $password=$_POST['password'];

    if(empty($userinput) || empty($password)) {
        header("Location:../adminlogin.php?error=emptyfields&userinput=".$userinput);
        exit();
    } else {
        $sql="SELECT * FROM admins WHERE username = ? OR usermail = ?";
        $stmt=mysqli_stmt_init($link);
        if(!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location:../adminlogin.php?error=sqlerror");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "ss", $userinput, $userinput);
            mysqli_stmt_execute($stmt);
            $result=mysqli_stmt_get_result($stmt);
            if($rows=mysqli_fetch_assoc($result)) {
                $pwdCheck=password_verify($password, $rows['password']);
                if($pwdCheck==false) {
                    header("Location:../adminlogin.php?error=wrongpassword&userinput=".$userinput);
                    exit();
                } else if($pwdCheck==true) {
                    session_start();
                    $_SESSION["loggedin"] = true;
                    $_SESSION["id"] = $rows['adminid'];
                    $_SESSION["username"] = $rows['username'];
                    $_SESSION["usermail"] = $rows['usermail'];
                    header("Location:adminhome.php");
                    exit();
                } else {
                    header("Location:../adminlogin.php?error=wrongpassword&userinput=".$userinput);
                    exit();
                }
            } else {
                header("Location:../adminlogin.php?error=nouser");
                exit();
            }
        }
    }
} else {
    header("Location:../adminlogin.php");
    exit();
}