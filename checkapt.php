<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Appointment Request</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>

<h2>Your appointment requests</h2>

<div class="bs-docs-example">
    
    <div id="myTabContent" class="tab-content">
        <div class="tab-pane fade in active" id="cse">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Username of the student </th>
                        <th>Course</th>
                        <th>Preferred time</th>
                        <th>Additional comment</th>
                    </tr>
                </thead>
                <tbody>
<?php
$conn = mysqli_connect("localhost", "root", "", "testsite");
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT requser, teauser, coursetitle, time, comment FROM appointment";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
while($row = mysqli_fetch_array($result)) {
    if($row["teauser"] === $_SESSION["username"]){
        echo "<tr>";
        echo "<td>" . $row['requser'] . "</td>";
        echo "<td>" . $row['coursetitle'] . "</td>";
        echo "<td>" . $row['time'] . "</td>"; 
        echo "<td>" . $row['comment'] . "</td>"; 
        echo "<tr>";
    }
}
echo "</table>";
} else { echo "0 results"; }
$conn->close();
?>
                </tbody>
            </table>
        </div>
        </body>
        </html>