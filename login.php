<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page </title>
    <link rel="stylesheet" type="text/css" href="login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Abel&display=swap" rel="stylesheet">

</head>
<body>
   
    <div class="bar">
        <div class="nav">
        
             <div>   <a class="home"  href=""> Mailinator</a></div>
             <div><a href="front.html">Generate mail </a></div>
             <div><a href="base.html">Dashboard </a></div>
             <div><a href="">Contact</a></div>
             <div><a  class="link" href="login.html"> Sign up/Log In</a>  </div>   
        </div></div>

<div class = "form" id="signupform">
<form name="myForm" action="signup.php" method='post'>
    <div class="formContainer">
    <h1>Sign Up Form</h1>
    <hr>
    <div>
    <label for="Name"><b>Name</b></label>
    <input type="text" placeholder="Enter Name" name="Name"  required>
    </div>
    <div>
    <label for="phoneno"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email"  required>
    </div>
    <div>
    <label for="password"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" required>
    </div>
    <div>
    <label for="repeatPassword"><b>Repeat Password</b></label>
    <input type="password" placeholder="Repeat Password" name="repeatPassword"
    required>
    </div>
    <div>
    <label>
    <input type="checkbox" checked="checked" name="remember" > Remember me
    </label>
    </div>
    <p>By creating an account you agree to our <a href="#"
    style="color:dodgerblue">Terms & Privacy</a><p>
    <div>
        <button type="submit" class="signup" onclick="phonenumber(document.myForm.tel)" >Sign Up</button>
    <button type="button" class="login">Login</button>
   
    </div>
    </div>
    </form>
</div>
<div id="loginform" class = "form" style="height:550px;">
    <form name="myForm" action='l.php' method='post'>
        <div class="formContainer">
        <h1>Login </h1>
        <hr>
        <div>
        <label for="phoneno"><b>Email</b></label>
        <input type="text" placeholder="Enter Email" name="username"  required>
        </div>
        <div>
        <label for="password"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="password" required>
        </div>
       
        <div>
        <label>
        <input type="checkbox" checked="checked" name="remember" > Remember me
        </label>
      
            <button type="submit" class="login">Login</button>
            <button type="button" id="sbtn" class="signup"  >Sign Up</button>
       
       
        </div>
        </div>
        </form>
    </div>

<footer>
<div>
           <h4>ABOUT</h4>
           <p>
               Hi this is a college project done by Ankush. This website helps user to generate temperary mails for personal use . This helps to stop website spamming unnecessary mails and protect from shady websites.
           </p>
       </div>
      
       <div>
        <h4>Quick links</h4>
        <ul>
            <li><a href="front.html">Generate mail</a></li>
            <li><a href="base.html">Dashboard</a></li>
            <li><a href="login.html">Profile</a></li>
            <li><a href="front.html">About</a></li>
        </ul>
       </div>
       </footer>
       <script src="login.js"></script>

</body>
</html>