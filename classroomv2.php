<?php
require "header2.php";
$course = $_GET["course"];
if(isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] === true){
  $username=$_SESSION['username'];
  $sql = "SELECT * FROM students WHERE name=? AND username=?";
  $stmt=mysqli_stmt_init($link);
  if(!mysqli_stmt_prepare($stmt, $sql)) {
    header("location: classroomv2.php?course=$course&error=sqlerror");
    exit();
  } else {
    mysqli_stmt_bind_param($stmt, "ss", $course, $username);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);
    $resultCheck=mysqli_stmt_num_rows($stmt);
    if($resultCheck>0) {
      header("location: classroommain.php?course=$course");
      exit();
    }
  }
}


$sql = "SELECT * FROM course";
$result = $link->query($sql);

if ($result->num_rows > 0) {
    while($row = mysqli_fetch_array($result)) {
        if($_GET["course"]  === $row["name"]){
          $teacher = $row["teacher"];
          $coursetype = $row["coursetype"];
          $appointment = $row["appointment"];
          $des = $row["longdes"]; 
          $cTime=$row['timings'];
          $schedule=$row['schedule'];
          $sdate=$row['startdate'];
          $edate=$row['enddate'];  
        }
    }
}
$days=explode("/", $schedule, 2);
    if($days[0]=="S") { $schedule2= "Sunday and Tuesday"; }
      else if($days[0]=="S") {$schedule2= "Sunday and Tuesday";}
      else if($days[0]=="M") {$schedule2= "Monday and Wednesday";}
      else if($days[0]=="T") {$schedule2= "Tuesday and Thursday";}
      else if($days[0]=="W") {$schedule2= "Wednesday and Friday";}
      else if($days[0]=="Thu") {$schedule2= "Thursday and Saturday";}
      else if($days[0]=="F") {$schedule2= "Friday and Sunday";}
      else if($days[0]=="Sat") {$schedule2= "Saturday and Monday";}
if($teacher==$_SESSION['username']) {
  header("location: classroommain.php?course=$course");
  exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title><?php echo $course; ?> Classroom</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  
</head>
<body>

<h2 style="margin: 50px;"><?php echo $course; ?>Classroom</h2>

<div class="bs-docs-example">
    <div id="myTabContent" class="tab-content">
        <div class="tab-pane fade in active" id="cse">
          <div align="center" id="wrapper">
            <h1 style="font-size:160%;">
              About <?php echo $course; ?> 
            </h1>
            <p align="justify" style="font-size:120%;">
              <?php echo $des; ?>
            </p>
            <h1 align="left" style="font-size:120%;">
              Instructor: <?php echo $teacher; ?>
            </h1>
            <h1 align="left" style="font-size:160%;">
              What you will learn?
            </h1>
            <p> Class Will Take Place every <?php echo $schedule2; ?> at <?php echo $cTime; ?> </p>
    <p>Course will continue from <?php echo $sdate; ?> up until <?php echo $edate; ?></p>
            <form action="<?php echo "joinclass.php?course=$course"; ?>" method=POST>
              <button id="joinclass" type="submit" name="joinclass">Enroll Now</button>
            </form>
          </div>
        </div>
        <div class="tab-pane fade" id="eee">
        <div class="embed-responsive embed-responsive-16by9">
  <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/zpOULjyy-n8?rel=0" allowfullscreen></iframe>
</div>
        </div>

  
        </div>
    </div>
    <div class="tab-pane fade" id="chat">
    </div>
</div>

</body>
<footer>
  <?php include "footer.php"; ?>
</footer>

<style>
  .videoContainer {
    position: absolute;
    width: 70%;
    height: 80%;
    top: 0;
    left: 0;
    bottom: 0;
    right: 0;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}
#wrapper{
    margin-right: 150px;
    margin-left: 80px;
}

iframe {
  width: 80%;
  height: 70%; 
}
#joinclass{
  padding: 5px 50px 5px 50px;
  border-radius: 30px;
  background-color: orange;
  border-color: black;
  font-weight: bold;
  margin:5%;
}
</style>
</html>