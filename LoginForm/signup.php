<?php
if(isset($_SESSION['userentered'])){
header("location: ../Finalwelcomepage/index.php");
}
?>

<!DOCTYPE html>
 <html lang="en" class="no-js"> 
    <head>
        <meta charset="UTF-8" />
        <title>Login and Registration </title>
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes">
        <!--<meta name="keywords" content="html5, css3, form, switch, animation, :target, pseudo-class" />-->
        
        <link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Open+Sans'>
        <link rel="stylesheet" href="css/style.css">
        
    </head>
    <!--<body>
      
        <div class="container">
            <section>               
                <div id="container_demo" >!-->
                    <!-- hidden anchor to stop jump -->
                    <!--<a class="hiddenanchor" id="toregister"></a>-->
                    <!--<a class="hiddenanchor" id="tologin"></a>-->
                    <!--<div id="wrapper">
                        <div id="login" class="animate form">
                            <form  action= "login.php" method="post"> 
                                <h1>Log in</h1> 
                                <p> 
                                    <label for="username" class="uname" data-icon="u" > Your username </label>
                                    <input id="username" name="username" required="required" type="text" placeholder="username"/>
                                </p>
                                <p> 
                                    <label for="password" class="youpasswd" data-icon="p"> Your password </label>
                                    <input id="password" name="password" required="required" type="password" placeholder=" password " /> 
                                </p>
                                <p class="login button"> 
                                    <input type="submit" value="Login" name="Login"/> 
                                </p>
                                <p class="change_link">
                                    Not a member yet ?
                                    <a href="#toregister" class="to_register">Join us</a>
                                </p>
                            </form>
                        </div>

                        <div id="register" class="animate form">
                            <form  action="newregistration.php" method="post"> 
                                <h1> Sign up </h1> 
                                <p> 
                                    <label for="usernamesignup" class="uname" data-icon="u">Your username</label>
                                    <input id="usernamesignup" name="usernamesignup" required="required" type="text" placeholder="username94" />
                                </p>
                                <p> 
                                    <label for="emailsignup" class="youmail" data-icon="e" > Your email</label>
                                    <input id="emailsignup" name="emailsignup" required="required" type="email" placeholder="xyz@mail.com"/> 
                                </p>
                                <p> 
                                    <label for="passwordsignup" class="youpasswd" data-icon="p">Your password </label>
                                    <input id="passwordsignup" name="passwordsignup" required="required" type="password" placeholder="eg. password"/>
                                </p>
                                <p> 
                                    <label for="passwordsignup_confirm" class="youpasswd" data-icon="p">Please confirm your password </label>
                                    <input id="passwordsignup_confirm" name="passwordsignup_confirm" required="required" type="password" placeholder="eg. password"/>
                                </p>
                                <p class="signin button"> 
                                    <input type="submit" value="Sign up"/> 
                                </p>
                                <p class="change_link">  
                                    Already a member ?
                                    <a href="#tologin" class="to_register"> Go and log in </a>
                                </p>
                            </form>
                        </div>
                        
                    </div>
                </div>  
            </section>
        </div>
    </body>
</html>

<!DOCTYPE html>
   
    
     
    

    
    
    
  </head>
-->
  <body>

    <div class="cont">
  <div class="demo2">
    <div class="login">
      <div class="login__check"></div>
      <form  action= "newregistration.php" method="post" id="form1">
      <div class="login__form2">
        <div class="login__row">

          <svg class="login__icon name svg-icon" viewBox="0 0 20 20">
            <path d="M0,20 0,5 20,5 20,20z M20,5 L10,12.5 L0,5" />
          </svg>
          <!--<input id="username" name="username" type="text" class="login__input name" placeholder="Username" required="required"/>-->
          <!--<input id="usernamesignup" name="usernamesignup" type="text" required="required" class="login__input name" placeholder="username94"/>-->
          <input id="emailsignup" name="emailsignup" type="email" required="required" class="login__input name" placeholder="Your email id"/> 
        </div>
        
        <div class="login__row">

          <svg class="login__icon name svg-icon" viewBox="0 0 20 20">
            <path d="M0,20 a10,8 0 0,1 20,0z M10,0 a4,4 0 0,1 0,8 a4,4 0 0,1 0,-8" />
          </svg>
          <!--<input id="username" name="username" type="text" class="login__input name" placeholder="Username" required="required"/>-->
          <input id="usernamesignup" name="usernamesignup" type="text" required="required" class="login__input name" placeholder="Choose a username"/>
        </div>
        <div class="login__row">
          <svg class="login__icon pass svg-icon" viewBox="0 0 20 20">
            <path d="M0,20 20,20 20,8 0,8z M10,13 10,16z M4,8 a6,8 0 0,1 12,0" />
          </svg>
          <!--<input id="password" name="password" type="password" class="login__input pass" placeholder="Password" required="required"/>-->
          <input id="passwordsignup" name="passwordsignup" type="password" required="required" class="login__input pass" placeholder="Create a password"/>
        </div>
        <div class="login__row">
          <svg class="login__icon pass svg-icon" viewBox="0 0 20 20">
            <path d="M0,20 20,20 20,8 0,8z M10,13 10,16z M4,8 a6,8 0 0,1 12,0" />
          </svg>
          <!--<input id="password" name="password" type="password" class="login__input pass" placeholder="Password" required="required"/>-->
          <!--<input id="passwordsignup" name="passwordsignup" type="password" required="required" class="login__input pass" placeholder="eg. password"/>-->
          <input id="passwordsignup_confirm" name="passwordsignup_confirm" type="password" required="required" class="login__input pass" placeholder="Confirm your password"/>
        </div>
        
        </form>
        <button type="submit" class="login__submit" form="form1" value="Sign up">Sign up</button>
        <!--<input type="submit" value="Sign in" name="Login" class="login__submit"/>-->
        <p class="login__signup">Already have an account? &nbsp;<a href="index.php">Log in</a></p>
      </div>
    
    </div>
    
  </div>
</div>
    </body>
</html>
