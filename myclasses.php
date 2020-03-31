<?php
include "header2.php"; 
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: signupandlogin.php");
    exit;
}
$username=$_SESSION['username'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>My Courses</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
	<h2>Joined Classes</h2>
	<div id="myTabContent" class="tab-content">
    <div class="tab-pane fade in active" id="cse">
        <table id="myTable">
            <thead>
                <tr>
                    <th>Course Name</th>
                    <th>Description</th>
                    <th>Teacher</th>
                    <th>Live Lecture Time</th>
                </tr>
            </thead>
        <tbody>
<?php
    if ($link->connect_error) {
        die("Connection failed: " . $link->connect_error);
    }
    $sql = "SELECT name FROM students WHERE username='$username'";
    $result=mysqli_query($link, $sql);
    $queryResult=mysqli_num_rows($result);
    if($queryResult>0) {
        while($rows=$result->fetch_assoc()) {
        	$course=$rows['name'];
        	$sql2 = "SELECT name, description, teacher, coursetype, appointment FROM course WHERE name='$course'";
        	$result2 = $link->query($sql2);
        	if ($result2->num_rows > 0) {
        		while($row = mysqli_fetch_array($result2)) {
                    $name = $row['name'];
                    echo "<tr>";
                    echo "<td>" . '<a href="classroomv2.php?course='.$name.'">'.$name.'</a>' . "</td>";
                    echo "<td>" . $row['description'] . "</td>";
                    echo "<td>" . $row['teacher'] . "</td>";
                    echo "<td>" . $row['appointment'] . "</td>";
                    echo "</tr>"; 
                }
            }
        }
        echo "</table>";
    } else { echo "0 results"; }
    $link->close();
?>
            </tbody>
        </table>
        </body>
<footer>
    <?php require "footer.php"; ?>
</footer>

<style>
    body{
        background: white;
    }
    h2{
        margin: 50px;
    }
    table{
        margin: 50px;
    }
    td,th{
        padding:3%; 
    }
    a{
        text-decoration: none;
    }
    #search{
        margin-left: 50px;
        border-color: orange;
    }
</style>
    
    
        