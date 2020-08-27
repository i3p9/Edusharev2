<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title> LogIn & Sign Up </title>
    <link rel="stylesheet" href="css/signuploginstyle.css">
</head>

<body>

    <div class="toggleChange">
        <div class="form-box">
            
            <div class="button-box">
                <div id="btn"></div>
                <button type="button" class="toggle-btn" onclick="login()"> Log In</button>
                <button type="button" class="toggle-btn" onclick="signup()"> Sign Up</button>        
            </div>

        <form id="login" class="input-group" style="top:220px" action="admin/login.php" method="POST">
            
            <input type="text" id="uInput" name="userinput" class="input-field" placeholder="User Name or Email" required >
            
            <input type="password" id="uPass" name="password" class="input-field" placeholder="Password" required >
            
            <button type="submit" name="login-submit" class="submit-btn" style="margin-top: 20px; margin-bottom: 20px">Log In</button>
        </form>


        <form id="signup" class="input-group" action="admin/register.php" method="POST">
            <input type="text" name="username" class="input-field" placeholder="Unique Username" required >

            <input type="email" name="usermail" class="input-field" placeholder="Email" required >

            <input type="password" class="input-field" name="password" placeholder="Password" minlength="6" required >

            <input type="password" name="repeat_password" class="input-field" placeholder="Repeat Password" required >

            <input type="password" name="adminverify" class="input-field" placeholder="Admin Sign up Code" required >

            <button type="submit" name="signup-submit" class="submit-btn" style="margin-top: 20px;">Sign Up</button>
        </form>
        </div>
    </div>
</body>
    <script>
        var x = document.getElementById("login");
        var y = document.getElementById("signup");
        var z = document.getElementById("btn");
        function signup(){
            x.style.left = "-400px"
            y.style.left = "50px"
            z.style.left = "110px"
        }
        function login(){
            x.style.left = "50px"
            y.style.left = "450px"
            z.style.left = "0px"
        }

    </script>
</body>
</html>
