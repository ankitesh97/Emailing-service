<?php
if(isset($_SESSION['userentered'])){
header("location: ../Finalwelcomepage/index.php");
}
?>

<!DOCTYPE html>
 <html lang="en" class="no-js"> 
    <head>
        <title>Login and Registration </title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes">
        <!--<meta name="keywords" content="html5, css3, form, switch, animation, :target, pseudo-class" />-->
        <link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Open+Sans'>
        <link rel="stylesheet" href="css/style.css">
        
    </head>

    <body>

      <div class="cont">
        <div class="demo">
          <div class="login">
            <div class="login__check"></div>
            <form  action="login.php" method="post" id="form1">

              <div class="login__form">

                <div class="login__row">
                  <svg class="login__icon name svg-icon" viewBox="0 0 20 20">
                    <path d="M0,20 a10,8 0 0,1 20,0z M10,0 a4,4 0 0,1 0,8 a4,4 0 0,1 0,-8" />
                  </svg>
                  <input id="username" name="username" type="text" class="login__input name" placeholder="Username" required="required"/>
                </div>

                <div class="login__row">
                  <svg class="login__icon pass svg-icon" viewBox="0 0 20 20">
                    <path d="M0,20 20,20 20,8 0,8z M10,13 10,16z M4,8 a6,8 0 0,1 12,0" />
                  </svg>
                  <input id="password" name="password" type="password" class="login__input pass" placeholder="Password" required="required"/>
                </div>

              
            </form>

              <button type="submit" class="login__submit" form="form1" value="Sign in">Sign in</button>
              <!--<input type="submit" value="Sign in" name="Login" class="login__submit"/>-->
              <p class="login__signup">Don't have an account? &nbsp;<a href="signup.php">Sign up</a></p>
              
          </div>
          
        </div>
          
      </div>

      <!--<script src='js/jquery.min.js'></script>

        <script src="js/index.js"></script>-->
    </body>

</html>
