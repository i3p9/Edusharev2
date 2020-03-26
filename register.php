<?php
require_once "config.php";
require "header.php";

 
$username = $password = $confirm_password = $usermail = "";
$username_err = $password_err = $confirm_password_err = $usermail_err = "";
 
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username ";
    } else{
        $sql = "SELECT id FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "s", $param_username);           
            $param_username = trim($_POST["username"]);
                        if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This username already exists, please try something else";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
         
        mysqli_stmt_close($stmt);
    }

    if(empty(trim($_POST["usermail"]))){
        $usermail_err = "Please enter your email.";
    } else{
        $sql = "SELECT id FROM users WHERE usermail = ?";
        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "s", $param_username);           
            $param_username = trim($_POST["usermail"]);
                        if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $usermail_err = "This email has already been used, try to log in";
                } else{
                    $usermail = trim($_POST["usermail"]);
                }
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
         
        mysqli_stmt_close($stmt);
    }
    
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 3){
        $password_err = "Password must have atleast 3 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
    
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err) && empty($usermail_err)){
        
        $sql = "INSERT INTO users (username, password, usermail) VALUES (?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "sss", $param_username, $param_password, $param_usermail);            
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            $param_usermail = $usermail;

            if(mysqli_stmt_execute($stmt)){
                header("location: login.php");
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
         
        mysqli_stmt_close($stmt);
    }
    
    mysqli_close($link);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
</head>
<body>
	<div id="home" class="hero-area">
	<!-- Backgound Image -->
		<div class="bg-image bg-parallax overlay" style="background-image:url(./img/home-background.jpg)"></div>
		<!-- /Backgound Image -->
			<div class="home-wrapper">
				<div class="container">
					<div class="row">
						<div class="col-md-8">
							<div class="wrapper">
        <h2>Sign Up</h2>
        <p>Create an account</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Username</label>
                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>" required>
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($usermail_err)) ? 'has-error' : ''; ?>">
                <label>Email ID:</label>
                <input type="email" name="usermail" class="form-control" value="<?php echo $usermail; ?>" required>
                <span class="help-block"><?php echo $usermail_err; ?></span>
            </div>    
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Password</label>
                <input type="password" name="password" class="form-control" value="<?php echo $password; ?>" required>
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>" required>
                <span class="help-block"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" required>
                <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit" style="background: orange; border:none; color: black; font-weight: bold;">
                <input type="reset" class="btn btn-default" value="Reset">
            </div>
            <p>Already have an account? <a href="login.php">Login here</a>.</p>
        </form>
    </div>  
						</div>
					</div>
				</div>
			</div>
		</div>
    

</body>
<footer style="color: white">
  <div class="foot">
      <?php require "footer.php"; ?>
  </div>
</footer>
<style>
  .wrapper h2{
  	color: orange;
  	font-weight: bold;
  }
  .wrapper{
  	color: white;
  	margin-left: 20%;
  	margin-right: 20%;
  	margin-bottom: 8%;
  	margin-top: 15%;
  }
</style>

</html>