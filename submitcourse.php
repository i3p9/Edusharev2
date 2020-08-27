<?php 
include "header2.php";
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: signupandlogin.php");
    exit;
}
?>
<!Doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Submit a course</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; margin: 50px; }
        textarea{
            resize: none;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <h2>Hello, Teacher!</h2>
        <h3>Submit your courses here</h3>
        <form action="includes/submit.php" method="post">
        <div class="form-group">
            
            <div class="form-group">
                <label>Course Name (initial) </label>
                <input type="text" name="name" class="form-control"  maxlength="8" required>
            </div>

            <div class="form-group">
                <label>Enter full course name with little description</label>
                <textarea type="text" class="form-control" rows="3" name="description" maxlength="100" required></textarea>
            </div>

            <div class="form-group">
                <label>Enter a long course description</label>
                <textarea type="text" class="form-control" rows="5" name="longdes" required></textarea>
            </div>
            
            <div class="form-group">
                <label for="coursetype">Course Type</label>
                <select type="text" name="coursetype" class="form-control" required>
                <option value="novalue"></option>
                <option value="CSE">CSE</option>
                <option value="EEE">EEE</option>
                <option value="OTH">OTHER</option>
                </select>
            </div>
            
            <div class="form-group">
                <label>Enter your preferred time for live class: </label>
                <input type="time" name="timeforclass" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Course Starts Date: </label>
                <input type="Date" name="startDate" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Course End Date: </label>
                <input type="Date" name="endDate" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="prefferreddays">Schedule</label>
                <select type="text" name="courseschedule" class="form-control" required>
                    <option value="novalue"></option>
                    <option value="S/T">Sunday, Tuesday</option>
                    <option value="M/W">Monday, Wednesday</option>
                    <option value="T/Thu">Tuesday, Thursday</option>
                    <option value="W/F">Wednesday, Friday</option>
                    <option value="Thu/Sat">Thursday, Saturday</option>
                    <option value="F/S">Friday, Sunday</option>
                    <option value="Sat/M">Saturday, Monday</option>
                </select>
            </div>

            <div class="form-group">
                <label>Proof of eligibility for taking course: (Official Documnts preferred) </label>
                <input type="text" name="filelink" class="form-control">
            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-primary" name="submit">
            </div>
        </div>
    </form>
</div>
</body>
<footer>
    <?php include "footer.php"; ?>
</footer>
</html>