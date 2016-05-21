<?php
include('session.php');
$idofmail = $_SESSION['mailid'];
$mysql_host = 'localhost';
$mysql_user = 'root';
$mysql_pass = '';
$mysql_db = 'mailingservice';
$conn = mysqli_connect($mysql_host, $mysql_user, $mysql_pass, $mysql_db);
$user_check=$_SESSION['userentered'];
$query = "SELECT * FROM mails where Id='$idofmail'";
$result=mysqli_query($conn,$query);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
$receiver = $user_check;
$sender=$row['Sender'];
$sub = $row['Subject'];
$bodyofmail = $row['Body'];
$attname = $row['Attachname'];
$receivedtime = $row['currtime'];
$attachment=0;
if ($attname != NULL)
{
	 	$attachment=1;
        $sql = "INSERT INTO trash"."(mailid, Sender, Receiver, Subject, Body, rectime)"."VALUES"."('$idofmail','$sender', '$receiver', '$sub', '$bodyofmail', $receivedtime')";
    if (mysqli_query($conn, $sql)) 
    {
    	$query = "DELETE FROM mails WHERE Id= '$idofmail'";
		$result=mysqli_query($conn,$query);
        header('refresh: 0; url= ../Home/index.php');
        echo "<script language='javascript' type='text/javascript'>";
        echo "alert('Mail successfully deleted');";
        echo "</script>";
    }
}
else
{
	$sql1 = "INSERT INTO trash"."(mailid, Sender, Receiver, Subject, Body, rectime)"."VALUES"."('$idofmail', '$sender', '$receiver', '$sub', '$bodyofmail', '$receivedtime')";
    if (mysqli_query($conn, $sql1)) 
    {
    	$query = "DELETE FROM mails WHERE Id= '$idofmail'";
		$result=mysqli_query($conn,$query);
        header('refresh: 0; url= ../Home/index.php');
        echo "<script language='javascript' type='text/javascript'>";
        echo "alert('Mail successfully deleted');";
        echo "</script>";
    }
}
$qevent = "CREATE EVENT test_event_$idofmail
ON SCHEDULE AT CURRENT_TIMESTAMP + INTERVAL 30 DAY
DO
   DELETE FROM trash WHERE mailid= '$idofmail'";
   $result=mysqli_query($conn,$qevent);
?>