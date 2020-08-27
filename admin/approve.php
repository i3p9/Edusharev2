<?php
    $teacher = $_GET["teacher"];
    $courseid = $_GET["cid"];
    include "config.php";
    include "adminheader.php";
    $sql="SELECT * FROM coursereq WHERE teachername='$teacher' AND courseid='$courseid'";
    $result=mysqli_query($link, $sql);
    $resultCheck=mysqli_num_rows($result);
    if($resultCheck>0) {
        $rows=mysqli_fetch_assoc($result);
      	$coursename = $rows['coursename'];
        $coursedes=$rows['coursedes'];
        $cType=$rows['ctype'];
        $cTime=$rows['ctime'];
        $schedule=$rows['cschedule'];
        $officiallink=$rows['officiallink'];
        $sdate=$rows['startdate'];
        $edate=$rows['enddate'];
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
    

    if(isset($_POST['approve'])) {
    	$sql5="SELECT * FROM course WHERE name='$courseid' AND teacher='$teacher'";
    	$result5 = $link->query($sql5);
        if ($result5->num_rows > 0) {
        	header("Location:approveclass.php?msg=added");
    		exit();
        } else {

         	$sql3="INSERT INTO course (name, description, teacher, coursetype, longdes, timings, startdate, enddate, schedule) VALUES ('$courseid', '$coursename', '$teacher', '$cType', '$coursedes', '$cTime', '$sdate', '$edate', '$schedule')";
    	    mysqli_query($link,$sql3);
            if($sql3) {
        	    $sql4="DELETE FROM coursereq WHERE teachername='$teacher' AND courseid='$courseid'";
    	        mysqli_query($link,$sql4);
    	        if($sql4){
    		        header("Location:approveclass.php?msg=success");
    		        exit();
    	        } else {
    		        header("Location:approve.php?teacher=$teacher&cid=$courseid&error=sqlerror");
    		        exit();
    		    }
    	    }  else {
    		    header("Location:approve.php?teacher=$teacher&cid=$courseid&error=sqlerror");
    		    exit();
    	    }
        }
    }
    if(isset($_POST['reject'])) {
    	$sql2="DELETE FROM coursereq WHERE teachername='$teacher' AND courseid='$courseid'";
    	mysqli_query($link,$sql2);
    	if($sql2){
    		header("Location:approveclass.php?msg=success");
    		exit();
    	} else {
    		header("Location:approve.php?teacher=$teacher&cid=$courseid&error=sqlerror");
    		exit();
    	}

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
<div class="approve">
	<h2>Review and Approve</h2>
	<div>
		<p><?php echo $teacher; ?> wants to Teach: <?php echo $coursename; ?></p>
		<p><?php echo $cType; ?>, Class ID: <?php echo $courseid; ?></p>
		<p><?php echo $coursedes; ?></p>
		<p> Class Will Take Place every <?php echo $schedule2; ?> at <?php echo $cTime; ?> </p>
		<p>Course will continue from <?php echo $sdate; ?> up until <?php echo $edate; ?></p>
		<p>Teacher Info: <a href="<?php echo $officiallink; ?>" target="_blank">Click Here</a></p>
	</div>
</div>
<div class="buttons">
<form action="" method="POST">
	<input type="submit"  id="approve" name="approve" value="Approve">
	<input type="submit" id="reject" name="reject" value="Reject">
</form>
</div>
</body>
<style type="text/css">
	.approve{
		margin: 50px;
	    font-size: 20px;
	}
	.buttons{
		margin-left: 20%;
	}
	.buttons input{
		margin-right:10%;
		border-color: black;
		font-weight: bold;
	}
	#approve{
		background-color: green;
		padding: 8px 80px 8px 80px;
		background-color:green;
		border-radius: 30px;
	}
	#reject{
		padding: 8px 80px 8px 80px;
		background-color: red;
		border-radius: 30px;

	}
</style>
</html>
