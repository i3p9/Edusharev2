<?php
session_start();
include "config.php";
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
	<h2>Current requests</h2>
    <table id="myTable">
        <thead>
            <tr>
                <th>Teacher</th>
                <th>Class Type</th>
                <th>Class ID</th>
                <th>Class Name</th>
                <th>Class Description</th>
            </tr>
            </thead>
        <tbody>
<?php
    if ($link->connect_error) {
        die("Connection failed: " . $link->connect_error);
    }
    $sql = "SELECT teachername, ctype, courseid, coursename, coursedes FROM coursereq";
    $result = $link->query($sql);
    if ($result->num_rows > 0) {
        while($row = mysqli_fetch_array($result)) {
            $name = $row['teachername'];
            $cid=$row['courseid'];
            echo "<tr>";
            echo "<td>" . '<a href="approve.php?teacher='.$name.'&cid='.$cid.'">'.$name.'</a>' . "</td>";
            echo "<td>" . $row['ctype'] . "</td>";
            echo "<td>" . $row['courseid'] . "</td>";
            echo "<td>" . $row['coursename'] . "</td>";
            echo "<td>" . $row['coursedes'] . "</td>";
            echo "</tr>"; 
        }
        echo "</table>";
    }
    $link->close();
?>
            </tbody>
        </table>
    </div>               
</div>
</body>
<style type="text/css">
	table{
        margin: 50px;
    }
    td,th{
        padding:3%;
        width: 100px;
    }
    a{
        text-decoration: none;
    }
    h2{
    	margin: 50px;
    }
</style>
</html>