<?php
include('session.php');
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
$score = 0;
$receiver=$_POST["Recipients"];
$sender=$user_check;
$sub = $_POST["Subject"];
$bodyofmail = $_POST["Body"];
$squery = "SELECT * FROM spamwords";
$result = $conn->query($squery);
if ($result->num_rows > 0)
{
    while($row = $result->fetch_assoc())
    {
        if (strpos($bodyofmail, $row['word']) !== false)
        {
            $score = $score + $row['score'];
        }
    }
}

$query = "SELECT Username FROM userdetails";
$result = mysqli_query($conn,$query);
$match = 0;
$attachment=0;
if ($result->num_rows > 0)
          {
            while($row = $result->fetch_assoc())
            {
            	$a = strcmp($receiver,$row['Username']);
            	if ($a == 0)
            	{
            		$match = $match+1;
            	}
            	
            }
        }
        else
        {
        	  header('refresh: 0; url=../Home/index.php');
              echo "<script language='javascript' type='text/javascript'>";
              echo "alert('There is no user available to send the mail to.');";
              echo "</script>";
        }
 if ($match == 1)
 {
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
        $sql = "INSERT INTO mails"."(Sender, Receiver, Subject, Body, Attachname, Attachment, spamscore)"."VALUES"."('$sender', '$receiver', '$sub', '$bodyofmail', '$fileName', '$content', '$score')";
    if (mysqli_query($conn, $sql)) 
    {
        header('refresh: 0; url= ../Home/index.php');
        echo "<script language='javascript' type='text/javascript'>";
        echo "alert('Mail successfully sent');";
        echo "</script>";
    }
    }
    else
    {
         $sql = "INSERT INTO mails"."(Sender, Receiver, Subject, Body, spamscore)"."VALUES"."('$sender', '$receiver', '$sub', '$bodyofmail', '$score')";
    if (mysqli_query($conn, $sql)) 
    {
        header('refresh: 0; url= ../Home/index.php');
        echo "<script language='javascript' type='text/javascript'>";
        echo "alert('Mail successfully sent');";
        echo "</script>";
    }
    }
}
else
{
    header('refresh: 0; url= ../Home/index.php');
    echo "<script language='javascript' type='text/javascript'>";
    echo "alert('No such user exists');";
    echo "</script>";
    exit();
}
?>