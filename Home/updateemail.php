<?php
include('session.php');
$mysql_host = 'localhost';
$mysql_user = 'root';
$mysql_pass = '';
$mysql_db = 'mailingservice';
$conn = mysqli_connect($mysql_host, $mysql_user, $mysql_pass, $mysql_db);
$user_check=$_SESSION['userentered'];
$emailentered=$_POST["email"];
$sql = "UPDATE userdetails SET Emailaddress = '$emailentered' WHERE Username='$user_check'";
	if (mysqli_query($conn, $sql)) 
    {
        header('refresh: 0; url= ../Home/index.php');
    	echo "<script language='javascript' type='text/javascript'>";
    	echo "alert('Email Address successfully updated');";
    	echo "</script>";
    }
	else {
        header('refresh: 0; url= ../Home/index.php');
        echo "<script language='javascript' type='text/javascript'>";
        echo "alert('Please enter a valid Email Address');";
        echo "</script>";
        }
?>