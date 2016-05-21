<?php
include('session.php');
$idoftrash = $_SESSION['trashid'];
$idofmail = $_SESSION['mailid'];
$mysql_host = 'localhost';
$mysql_user = 'root';
$mysql_pass = '';
$mysql_db = 'mailingservice';
$conn = mysqli_connect($mysql_host, $mysql_user, $mysql_pass, $mysql_db);
$user_check=$_SESSION['userentered'];
$qevent = "DROP EVENT [IF EXIST] test_event_$idofmail";
$result=mysqli_query($conn,$qevent);
$query = "DELETE FROM trash where mailid='$idoftrash'";
$result=mysqli_query($conn,$query);
header('refresh: 0; url= ../Home/index.php');
        echo "<script language='javascript' type='text/javascript'>";
        echo "alert('Mail successfully deleted');";
        echo "</script>";
?>