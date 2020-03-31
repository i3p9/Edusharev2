<?php
if(isset($_POST['login-submit'])) {
    require "config.php";
    $userinput=$_POST['userinput'];
    $password=$_POST['password'];

    if(empty($userinput) || empty($password)) {
        header("Location:../signupandlogin.php?error=emptyfields&userinput=".$userinput);
        exit();
    } else {
        $sql="SELECT * FROM users WHERE username = ? OR usermail = ?";
        $stmt=mysqli_stmt_init($link);
        if(!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location:../signupandlogin.php?error=sqlerror");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "ss", $userinput, $userinput);
            mysqli_stmt_execute($stmt);
            $result=mysqli_stmt_get_result($stmt);
            if($rows=mysqli_fetch_assoc($result)) {
                $pwdCheck=password_verify($password, $rows['password']);
                if($pwdCheck==false) {
                    header("Location:../signupandlogin.php?error=wrongpassword&userinput=".$userinput);
                    exit();
                } else if($pwdCheck==true) {
                    session_start();
                    $_SESSION["loggedin"] = true;
                    $_SESSION["id"] = $rows['id'];
                    $_SESSION["username"] = $rows['username'];
                    $_SESSION["usermail"] = $rows['usermail'];
                    header("Location:../welcomes.php");
                    exit();
                } else {
                    header("Location:../signupandlogin.php?error=wrongpassword&userinput=".$userinput);
                    exit();
                }
            } else {
                header("Location:../signupandlogin.php?error=nouser");
                exit();
            }
        }
    }
} else {
    header("Location:../signupandlogin.php.php");
    exit();
}