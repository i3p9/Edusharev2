<?php
require "header.php";
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
  header("location: index.php");
  exit;
}
 
require_once "config.php";
 
$username = $password = "";
$username_err = $password_err = "";
 
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    if(empty($username_err) && empty($password_err)){
        $sql = "SELECT id, username, usermail, password FROM users WHERE username = ? OR usermail = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_username);
            $param_username = $username;
            
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    mysqli_stmt_bind_result($stmt, $id, $username, $usermail, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            session_start();
                            
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;
                            $_SESSION["usermail"] = $usermail;                            
                            
                            header("location: welcomes.php");
                        } else{
                            $password_err = "The password you entered was not valid.";
                        }
                    }
                } else{
                    $username_err = "No account found with that username.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
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
    <title>Sign In</title>
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
                                <h2>Login</h2>
                                <p>Enter your username and password to login</p>
                                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                                    <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                                        <label>Username or Email</label>
                                        <input type="text" name="username" class="form-control" value="<?php echo $username; ?>" required>
                                        <span class="help-block"><?php echo $username_err; ?></span>
                                    </div>    
                                    <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                                        <label>Password</label>
                                        <input type="password" name="password" class="form-control" required>
                                        <span class="help-block"><?php echo $password_err; ?></span>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-primary" value="Login" style="color: black; background:orange; border:none; padding-left: 20px; padding-right: 20px; font-weight: bold; padding-top: 5px; padding-bottom: 5px">
                                    </div>
                                    <p>Don't have an account? <a href="register.php">Sign up now</a>.</p>
                                    <p>Forgot Password? <a href="forgetpass.php">Click here</a>.</p>
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