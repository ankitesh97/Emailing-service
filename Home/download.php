<?php
if(isset($_GET['id']))
{

$mysql_host = 'localhost';
$mysql_user = 'root';
$mysql_pass = '';
$mysql_db = 'mailingservice';
$conn = mysqli_connect($mysql_host, $mysql_user, $mysql_pass, $mysql_db);
$id    = $_GET['id'];
$query = "SELECT Attachname, Attachment " .
         "FROM mails WHERE Id = '$id'";

$result = mysqli_query($conn,$query);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
$name = $row['Attachname'];
$content = $row['Attachment'];
//header("Content-length: $size");
//header("Content-type: $type");
header("Content-Disposition: attachment; filename=$name");
echo $content;
exit;
}

?>