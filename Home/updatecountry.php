<?php
include('session.php');
$mysql_host = 'localhost';
$mysql_user = 'root';
$mysql_pass = '';
$mysql_db = 'mailingservice';
$conn = mysqli_connect($mysql_host, $mysql_user, $mysql_pass, $mysql_db);
$user_check=$_SESSION['userentered'];
$countryentered=$_POST["country"];
$sql = "UPDATE userdetails SET Country = '$countryentered' WHERE Username='$user_check'";
	if (mysqli_query($conn, $sql)) 
    {
        header('refresh: 0; url= ../Home/index.php');
    	echo "<script language='javascript' type='text/javascript'>";
    	echo "alert('Country successfully updated');";
    	echo "</script>";
    }
	else {
        header('refresh: 0; url= ../Home/index.php');
        echo "<script language='javascript' type='text/javascript'>";
        echo "alert('Please try again');";
        echo "</script>";
        }
?>