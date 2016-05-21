<?php
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
session_start();
if(empty($_SESSION))
{
  header("Location: ../LoginForm/index.php");
}
$user_check=$_SESSION['userentered'];
//$imagepath = $_SESSION['imgpath'];
$query = "SELECT * FROM userdetails where Username='$user_check'";
$result = mysqli_query($conn,$query);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
$login_session =$row['Username'];
if(!isset($login_session)){
mysql_close($conn); // Closing Connection
//header('Location: ../LoginRegistrationForm/index.php'); // Redirecting To Home Page
header('refresh: 0; url= ../LoginForm/index.php');
}
?>