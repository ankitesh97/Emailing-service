<?php
include('session.php');
$repid = $_SESSION['mailid'];
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
$query = "SELECT * FROM mails where Id='$repid'";
$result=mysqli_query($conn,$query);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
$receiver=$row['Sender'];
$sub = $row['Subject'];
$sender=$user_check;
$sub = "Reply to: $sub";
$bodyofmail = $_POST["editor1"];
$attachment=0;
    if ($_FILES['file_upload']['size'] > 0)
    {
        $attachment=1;
        $fileName = $_FILES['file_upload']['name'];
        $tmpName  = $_FILES['file_upload']['tmp_name'];
        $fileSize = $_FILES['file_upload']['size'];
        $fileType = $_FILES['file_upload']['type'];
        $fp      = fopen($tmpName, 'r');
        $content = fread($fp, filesize($tmpName));
        $content = addslashes($content);
        fclose($fp);
        if(!get_magic_quotes_gpc())
        {
            $fileName = addslashes($fileName);
        }
        $sql = "INSERT INTO mails"."(Sender, Receiver, Subject, Body, Attachname, Attachment)"."VALUES"."('$sender', '$receiver', '$sub', '$bodyofmail', '$fileName', '$content')";
    if (mysqli_query($conn, $sql)) 
    {
        header('refresh: 0; url= ../Home/index.php');
        echo "<script language='javascript' type='text/javascript'>";
        echo "alert('Replied successfully');";
        echo "</script>";
    }
    }
    else
    {
    $sql1 = "INSERT INTO mails"."(Sender, Receiver, Subject, Body)"."VALUES"."('$sender', '$receiver', '$sub', '$bodyofmail')";
    if (mysqli_query($conn, $sql1)) 
    {
        header('refresh: 0; url= ../Home/index.php');
        echo "<script language='javascript' type='text/javascript'>";
        echo "alert('Mail successfully sent');";
        echo "</script>";
    }
    }
?>