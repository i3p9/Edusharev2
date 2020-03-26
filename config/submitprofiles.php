<?php
session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
if(isset($_POST["submit"]))
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "testsite";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
 
$uname = $_SESSION["username"];
$fullname = $_POST["fullname"];
$bio = $_POST["bio"];
$phone = $_POST["phone"];
$address = $_POST["address"];
$institution = $_POST["institution"];

$sql = ("INSERT INTO info_student (uname,fullname,institution,address,phone,major,bio) VALUES ('$uname','$fullname','$institution','$address',$phone,'$major','$bio') ON DUPLICATE KEY UPDATE fullname=VALUES(fullname),institution=VALUES(institution), address=VALUES(address), phone=VALUES(phone), major=VALUES(major), bio=VALUES(bio)"); 
if ($conn->query($sql) === TRUE) {
    echo "Profile updated!";
    $conn->close();
    header("location: ../profileupdated.php");
} else {
    $conn->query($sqlupdate);
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}
?>