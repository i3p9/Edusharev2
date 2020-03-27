<?php
require "header2.php";
$course = $_GET["course"];

$sql = "SELECT * FROM course";
$result = $link->query($sql);

if ($result->num_rows > 0) {
    while($row = mysqli_fetch_array($result)) {
        if($_GET["course"]  === $row["name"]){
          $teacher = $row["teacher"];
          $coursetype = $row["coursetype"];
          $appointment = $row["appointment"];
          $des = $row["longdes"];
          $pre = $row["prereq"];
          $link = $row["filelink"];    
        }
    }
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
    <ul id="myTab" class="nav nav-tabs">
        <li class="active"><a href="#cse" data-toggle="tab">Description</a>
        </li>
        <li><a href="#eee" data-toggle="tab">Live Class</a>
        </li>
        <li><a href="#other" data-toggle="tab">Files</a>
        </li>
    </ul>
    
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
              Prerequisites
            </h1>
            <p align="justify" style="font-size:120%;">
              <?php echo $pre; ?>    
            </p>
            <input type="submit" id="joinclass" name="joinclass" value="Enroll Now">
          </div>
        </div>
        <div class="tab-pane fade" id="eee">
        <div class="embed-responsive embed-responsive-16by9">
  <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/zpOULjyy-n8?rel=0" allowfullscreen></iframe>
</div>
        </div>

    
    <div class="tab-pane fade" id="other" align="center">
    <p>
        <a class="btn btn-primary" data-toggle="collapse" href="#lecture1" role="button" aria-expanded="false" aria-controls="lecture1"> Open Course File</a>
    </p>
        <div class="collapse" id="lecture1">
            <div class="card card-body">
            <object data="<?php echo $link; ?>" type="application/pdf" width="100%" height="800px"> </object>
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
  margin: 5%;
}
</style>
</html>