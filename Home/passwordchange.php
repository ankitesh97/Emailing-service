<?php
include('session.php');
$mysql_host = 'localhost';
$mysql_user = 'root';
$mysql_pass = '';
$mysql_db = 'mailingservice';
$conn = mysqli_connect($mysql_host, $mysql_user, $mysql_pass, $mysql_db);
$user_check=$_SESSION['userentered'];
$oldpassword=$_POST["currpass"];
$newpassword=$_POST["newpass"];
$confirmpass=$_POST["conpass"];
$passmd5 = md5($oldpassword);
$newpassmd5 =  md5($newpassword);
$query1 = "SELECT * FROM userdetails where Username='$user_check' and Password='$passmd5'";
$result = mysqli_query($conn,$query1);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
$count = mysqli_num_rows($result);
$a = strcmp($newpassword,$confirmpass);
if($a == 0 && $count == 1)
{
	$query = "UPDATE userdetails SET Password = '$newpassmd5' WHERE Username='$user_check'";
	$result1=mysqli_query($conn,$query);
	if($result)
                {
                    header('refresh: 0; url=index.php');
     				echo "<script language='javascript' type='text/javascript'>";
     				echo "alert('Password successfully changed');";
     				echo "</script>";
                }
}
else
{
	 header('refresh: 0; url=index.php');
     echo "<script language='javascript' type='text/javascript'>";
     echo "alert('Please check the password that you have entered');";
     echo "</script>";
}
?>