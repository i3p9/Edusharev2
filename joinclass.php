<?php
require "header2.php";
$course = $_GET["course"];
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: signupandlogin.php");
    exit;
}
$username=$_SESSION['username'];



if(isset($_POST['voucherEnroll'])) {
	$voucher=$_POST['classvoucher'];
	if(!preg_match("/^[a-zA-Z0-9]*$/", $voucher)) {
        header("location: joinclass.php?course=$course&error=illegalvoucher");
        exit();
    }

	$sql="SELECT * FROM students WHERE name=?";
	$stmt=mysqli_stmt_init($link);
	if(!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: joinclass.php?course=$course&error=sqlerror");
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "s", $course);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        $resultCheck=mysqli_stmt_num_rows($stmt);
        if($resultCheck>20) {
        	header("location: joinclass.php?course=$course&error=classfull");
            exit();
        } else {
        	$sql="SELECT * FROM vouchers";
        	$result=mysqli_query($link, $sql);
            $queryResult=mysqli_num_rows($result);
            if($queryResult>0) {
                while($rows=$result->fetch_assoc()) {
                	if ($voucher==$rows['voucher']) {
                		$today = date("Y-m-d H:i:s");
                		if ($rows['vlimit'] > $today) {
                			$sql="INSERT INTO students (username, name) VALUES (?, ?)";
        	                $stmt=mysqli_stmt_init($link);
        	                if(!mysqli_stmt_prepare($stmt, $sql)) {
                                header("location: joinclass.php?course=$course&error=sqlerror");
                                exit();
                            } else {
            	                mysqli_stmt_bind_param($stmt, "ss", $username, $course);
            	                mysqli_stmt_execute($stmt);
            	                header("Location:classroommain.php?course=$course");
                                exit();
                            }
                        } else {
                        	header("location: joinclass.php?course=$course&error=vlimitover");
                            exit();
                        }
                	}
                }
                header("location: joinclass.php?course=$course&error=wrongvoucher");
                exit();
            } else {
            	header("location: joinclass.php?course=$course&error=novoucher");
                exit();
            }
        
        }
	
    }
}

if(isset($_POST['paymentEnroll'])) {
	header("location: joinclass.php?course=$course&notavailable");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title><?php echo $course; ?> Classroom</title>
  <meta charset="utf-8">
</head>
<body>
	<div class="forms">
		<h2>Join <?php echo $course; ?> class </h2>
		<form action="" method=POST class="formA">
			<label>Use Voucher for Free Enrollment</label>
			<input type="text" name="classvoucher" style="width: 20%; margin-bottom: 3px; border-color:orange" required>
			<input id="btn" type="submit" name="voucherEnroll" value="Confirm">
		</form>
		<form action="" method=POST class="formB">
			<label>Choose Payment Method</label>
			<select id="pmethod" name="pmethod" style="border-color: orange" required>
    		    <option value="">Click Here</option>
			    <option value="BKash">BKash</option>
	   	        <option value="Rocket">Rocket</option>
	   	        <option value="Visa">Visa</option>
	   	    </select>
			<input id="btn" type="submit" name="paymentEnroll" value="Confirm">
		</form>
		<form action="" method=POST class="formC">
			<input id="btn" type="submit" name="dismiss" value="Dismiss">
		</form>
	</div>
</body>
<footer>
	<?php include "footer.php";?>
</footer>
<style type="text/css">
	.forms{
		margin:50px;
	}
	form{
		margin:30px;
	}
	
	#pmethod{
		width: 15%;
		margin-bottom: 3px;
	}
	#btn{
		padding:3px 20px 3px 20px;
		color: black;

	}
	
</style>
</html>

