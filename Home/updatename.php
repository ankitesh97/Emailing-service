<?php
include('session.php');
$mysql_host = 'localhost';
$mysql_user = 'root';
$mysql_pass = '';
$mysql_db = 'mailingservice';
$conn = mysqli_connect($mysql_host, $mysql_user, $mysql_pass, $mysql_db);
$user_check=$_SESSION['userentered'];
$nameentered=$_POST["Name"];
$names = explode(" ", $nameentered);
$sql = "UPDATE userdetails SET Firstname = '$names[0]', Lastname = '$names[1]' WHERE Username='$user_check'";
	if (mysqli_query($conn, $sql)) 
    {
        header('refresh: 0; url= ../Home/index.php');
    	echo "<script language='javascript' type='text/javascript'>";
    	echo "alert('Name successfully updated');";
    	echo "</script>";
    }
	else {
        header('refresh: 0; url= ../Home/index.php');
        echo "<script language='javascript' type='text/javascript'>";
        echo "alert('Please enter a valid Phone Number');";
        echo "</script>";
        }
?>