Home<?php
include('session.php');
$idofmail = $_SESSION['mailid'];
$mysql_host = 'localhost';
$mysql_user = 'root';
$mysql_pass = '';
$mysql_db = 'mailingservice';
$conn = mysqli_connect($mysql_host, $mysql_user, $mysql_pass, $mysql_db);
$user_check=$_SESSION['userentered'];
$query = "UPDATE mails SET delfromsent = 1 where Id='$idofmail'";
if(mysqli_query($conn,$query))
{
	header('refresh: 0; url= ../Home/index.php');
    echo "<script language='javascript' type='text/javascript'>";
    echo "alert('Mail successfully deleted');";
    echo "</script>";
}
?>