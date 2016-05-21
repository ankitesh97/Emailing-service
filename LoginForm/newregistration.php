<?php
session_start();
$mysql_host = 'localhost';
$mysql_user = 'root';
$mysql_pass = '';
$mysql_db = 'mailingservice';
//create new connection , this takes servername,username, userpassword, mysql db name
$conn = mysqli_connect($mysql_host, $mysql_user, $mysql_pass, $mysql_db); //check connection , if failed, kill the page
if(!$conn)
{
	die("Connection failed: ".mysqli_connect_error());
}
function send_to_mainpage() {
  header('Location: ../Home/index.php');
}
$uentered=$_POST["usernamesignup"];
$pentered=$_POST["passwordsignup"];
$pentered_confirm=$_POST["passwordsignup_confirm"];
$emailentered=$_POST["emailsignup"];
if(!strcmp($pentered,$pentered_confirm))
{
    $_SESSION['userentered'] = $uentered;
    $passmd5 = md5($pentered);
	$sql = "INSERT INTO userdetails"."(Username, Password, Emailaddress)"."VALUES"."('$uentered', '$passmd5', '$emailentered')";
	if (mysqli_query($conn, $sql)) 
    {
        send_to_mainpage();
        echo "<script language='javascript' type='text/javascript'>";
        echo "alert('New account successfully created');";
        echo "</script>";
    }
	else {
        header('refresh: 0; url= ../LoginForm/index.php');
        echo "<script language='javascript' type='text/javascript'>";
        echo "alert('Please enter a valid username or password');";
        echo "</script>";
        }
}
else
{
    header('refresh: 0; url= ../LoginForm/index.php');
    echo "<script language='javascript' type='text/javascript'>";
    echo "alert('Please enter a valid username or password');";
    echo "</script>";
}
?>﻿