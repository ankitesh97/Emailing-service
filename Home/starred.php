<?php
include('session.php');
$idofmail = $_SESSION['mailid'];
$mysql_host = 'localhost';
$mysql_user = 'root';
$mysql_pass = '';
$mysql_db = 'mailingservice';
$conn = mysqli_connect($mysql_host, $mysql_user, $mysql_pass, $mysql_db);
$user_check=$_SESSION['userentered'];
$qu1 = "UPDATE mails SET starred = 1 WHERE Id='$idofmail'";
$r1 = mysqli_query($conn,$qu1);
header('refresh: 0; url=index.php');
echo "<script language='javascript' type='text/javascript'>";
echo "alert('Successfully starred this message');";
echo "</script>";
?>
