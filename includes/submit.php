<?php
session_start();
include "config.php";

if(isset($_POST["submit"])) {
    $username = $_SESSION["username"];
    $name = $_POST["name"];
    $description = $_POST["description"];
    $longdes = $_POST["longdes"];
    $timeforclass = $_POST["timeforclass"];
    $schedule=$_POST["courseschedule"];
    $filelink = $_POST["filelink"];
    $coursetype = $_POST["coursetype"];
    $sdate=$_POST["startDate"];
    $edate=$_POST["endDate"];
    $sdate= date("yy-m-d", strtotime($sdate));
    $edate= date("yy-m-d", strtotime($edate));
    

    $sql="SELECT id FROM course WHERE name=?";
    $stmt=mysqli_stmt_init($link);
    if(!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../submitcourse.php?error=sqlerror1");
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "s", $name);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        $resultCheck=mysqli_stmt_num_rows($stmt);
        if($resultCheck>0) {
            header("location: ../submitcourse.php?error=classadded");
            exit();
        } else {
            $sql="INSERT INTO coursereq (teachername, courseid, coursename, coursedes, ctype, ctime, cschedule, officiallink,startdate, enddate) VALUES (?,?,?,?,'$coursetype','$timeforclass','$schedule',?, '$sdate', '$edate')";
            $stmt=mysqli_stmt_init($link);
            if(!mysqli_stmt_prepare($stmt, $sql)) {
                header("location: ../submitcourse.php?error=sqlerror2");
                exit();
            } else {
                mysqli_stmt_bind_param($stmt, "sssss", $username, $name, $description, $longdes, $filelink);
                mysqli_stmt_execute($stmt);
                header("Location:../submitsuccess.php");
                exit();
            }
        }

    }

    
} else {
    header("location: ../submitcourse.php");
    exit();
}

?>