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
$uentered=$_POST["username"];
$pentered=$_POST["password"];
$passmd5 = md5($pentered);
//$_SESSION["passentered"] = $pentered;
$query = "SELECT * FROM userdetails where Username='$uentered' and Password='$passmd5'";
$result = mysqli_query($conn,$query);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
$count = mysqli_num_rows($result);
if($count == 1) {
  $_SESSION['userentered'] = $uentered;
    send_to_mainpage();
      }else {
         //echo "Your Login Name or Password is invalid";
         header('refresh: 0; url= ../LoginForm/index.php');
        echo "<script language='javascript' type='text/javascript'>";
        echo "alert('Your Login Name or Password is invalid');";
        echo "</script>";
         
      }
?>﻿