<?php
session_start();
if(session_destroy()) // Destroying All Sessions
{
header("Location: ../LoginForm/index.php"); // Redirecting To Home Page
}
?>