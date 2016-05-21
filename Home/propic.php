<?php
include('session.php');
//session_start();
if(isset($_POST['submit']))
            {
                if (empty($_FILES['image']['name'])) {
                    header('refresh: 0; url=index.php');
                    echo "<script language='javascript' type='text/javascript'>";
                    echo "alert('Please select an image file);";
                    echo "</script>";
            }
                else
                {
                    $image= addslashes($_FILES['image']['tmp_name']);
                    $name= addslashes($_FILES['image']['name']);
                    $image= file_get_contents($image);
                    $image= base64_encode($image);
                    saveimage($name,$image);
                }
            }
displayimage();
function saveimage($name,$image)
{
$mysql_host = 'localhost';
$mysql_user = 'root';
$mysql_pass = '';
$mysql_db = 'mailingservice';
$conn = mysqli_connect($mysql_host, $mysql_user, $mysql_pass, $mysql_db);
if(!$conn)
{
	die("Connection failed: ".mysqli_connect_error());
}
$user_check=$_SESSION['userentered'];
 $qry="UPDATE userdetails SET Profilepic = '$image' WHERE Username='$user_check'";
 $result=mysqli_query($conn,$qry);
                if($result)
                {
                    //echo "<br/>Image uploaded.";
                }
                else
                {
                    //echo "<br/>Image not uploaded.";
                }
}
function displayimage()
{
$mysql_host = 'localhost';
$mysql_user = 'root';
$mysql_pass = '';
$mysql_db = 'mailingservice';
	$conn = mysqli_connect($mysql_host, $mysql_user, $mysql_pass, $mysql_db);
	$user_check=$_SESSION['userentered'];
	$qry="SELECT * FROM userdetails where Username='$user_check'";
	 $result=mysqli_query($conn,$qry);
	 $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
	 $count = mysqli_num_rows($result);
	 if($count == 1)
	 {
	 	 $_SESSION['profilephoto'] = $row['Profilepic'];
	 	 header('refresh: 0; url= ../Home/index.php');
	 }
               /* while($row = mysqli_fetch_array($result))
                {
                    echo '<img height="300" width="300" src="data:image;base64,'.$row[2].' "> ';
                } */
                mysqli_close($conn); 
}
?>