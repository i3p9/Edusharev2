<?php
$course = $_GET["course"];
include "header2.php";
if(isset($_POST['postinclass'])){ 
    if (empty($_FILES['mfile']['name'])) {
    	$fileDestination="";
    } else {

    	$file=$_FILES['mfile'];
        $fileName=$_FILES['mfile']['name'];
        $fileTmpName=$_FILES['mfile']['tmp_name'];
        $fileSize=$_FILES['mfile']['size'];
        $fileError=$_FILES['mfile']['error'];
        $fileExt=explode('.', $fileName);
        $fileActualExt=strtolower(end($fileExt));
        $fileName=preg_replace("/\s+/", "_", $fileName);
        $fileName=pathinfo($fileName, PATHINFO_FILENAME);
        $allowed=array('jpg','jpeg','png','pdf','zip','rar');

        if(in_array($fileActualExt, $allowed)) {
            if($fileError===0) {
                $fileNameNew=$fileName."_".date("mjYHis").".".$fileActualExt;
                $fileDestination='uploads/'.$course.'/'.$fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);
            } else {
            	header("Location:classroommain.php?filerror=");
                exit();
            }
        }
    }
    $input = $_POST['despost']; 
    if(empty($input)) {
    	$input="";
    }
    if(empty($input) and empty($_FILES['mfile']['name'])) {
    	header("Location:classroommain.php?post=empty");
        exit();
    } else {

        $sql="INSERT INTO courseobjects (name, username, des, filelink)VALUES (?,?,?,?);";
        $stmt=mysqli_stmt_init($link);
        if(!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location:classroommain.php?error=sqlerror");
            exit();
        } else {
    	    $username="Shifat";
            mysqli_stmt_bind_param($stmt, "ssss", $course, $username, $input, $fileDestination);
            mysqli_stmt_execute($stmt);
            header("Location:classroommain.php?post=success");
            exit();
        } 
        mysqli_stmt_close($stmt);
        mysqli_close($link);
    }
}

                   
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title><?php echo $course; ?> Classroom</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>

    	<div class="coverImg">
    		<img src="img/cover.jpeg" alt="Cover">
    		<div class="bottom-left"><?php echo $course; ?> Classroom</div>
    		<div class="bottom-right">
    			<img src="img/teacher.jpg" alt="Teacher">
    		</div>	
    	</div>

    	<div style="margin-bottom: 20px; margin-left: 50px; margin-top:20px">
            <a href="coursefiles?course=<?php echo $course; ?>" class="btn btn-primary">Files</a>
            <a href="courseworks.php?course=<?php echo $course; ?>" class="btn btn-primary">Class Works</a>
            <a href="coursetool.php?course=<?php echo $course; ?>"" class="btn btn-primary">Tools</a>
            <a href="blackboard.php?course=<?php echo $course; ?>" class="btn btn-primary">Live Class</a>
            <a href="appointmentv2.php" class="btn btn-primary">Make appointment with a teacher</a>
    	</div> 
    
    <form name="posttoclass_form" action="" method="POST" enctype="multipart/form-data">
    	<div class="content">
    		<label>Discussions</label>
    		<input type="file"  name="mfile" />
    		<textarea style="resize: none" name="despost" placeholder="Share simething with your class..."></textarea>
    		<div class="content-post">
    			<input type="submit"  id="btn" name="postinclass" value="Post"/>
    		</div>
    	</div>
    </form>

    	<table>
    		<?php
                $sql="SELECT * FROM courseobjects WHERE name = '$course' ORDER BY id DESC;";
                $result=mysqli_query($link, $sql);
                $queryResult=mysqli_num_rows($result);
                if($queryResult>0) {
                    while($rows=$result->fetch_assoc()) {
            ?>
            <tr>  
                <div class="postlist">      
                    <p><?php echo $rows['username'] ?>, says: </p>
                    <hr>
                    <p><?php echo $rows['des'] ?></p>
                    <p>
                    	<?php if($rows['filelink']!=="") {
                    		$file=$rows['filelink'];
                    		$fName="uploads/".$course."/";
                    		$filename=str_replace($fName, "", $rows['filelink']);
                    		echo "<a href=".$file." target='_blank'>".$filename."</a>";
                    	} ?>
                    	
                    </p>
                </div>
            </tr>
            <?php
                }
            }

            ?>
        </table>

	</body>
	<footer>
		<?php include "footer.php"; ?>
	</footer>
	<style type="text/css">
		.coverImg{
			position: relative;
            text-align: center;
            color: white;
		}
		.coverImg img{
			width: 100%;
            height:300px;
            object-fit: cover;
        } 
        .bottom-left {
        	position: absolute;
        	font-size: 32px;
        	bottom: 8px;
        	left: 16px;
        }
        .bottom-right img{
        	width: 200px;
        	height: 200px;
        }


        .bottom-right {
        	position: absolute;
        	bottom: -50px;
        	right: 50px;
        }
        .content{
        	margin-top: 5%;
        	margin-left: 4%;
        	margin-right: 20%;
        	margin-bottom: 5%;
        }
        textarea{
        	width: 80%;
        	height: 75px
        }
        .content-post{
        	float: right;
        	margin-right: 20%;
        	margin-top: 5px;
        }
        footer{
        	margin-top: 30px;
        }
        table{
            margin: 5%;
        }
        td{
            padding:5px; 
        }
        .postlist{
    	    border: solid;
    	    padding:15px;
    	    margin-left: 4%;
    	    margin-top: 5%;
    	    margin-right: 20%;
        }
	</style>
</html>