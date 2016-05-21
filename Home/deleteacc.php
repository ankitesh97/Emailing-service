<?php
include('session.php');
$mysql_host = 'localhost';
$mysql_user = 'root';
$mysql_pass = '';
$mysql_db = 'mailingservice';
$conn = mysqli_connect($mysql_host, $mysql_user, $mysql_pass, $mysql_db);
$user_check=$_SESSION['userentered'];
if (isset($_POST['Yes']))
{	
		//echo $user_check;
		$query = "DELETE FROM userdetails WHERE Username= '$user_check'";
		$result=mysqli_query($conn,$query);
		header("Location: logout.php");
		//header("Location: ../LoginForm/index.php"); // Redirecting To Home Page
}
if (isset($_POST['No']))
{
	header('refresh: 0; url=index.php');
}
?>