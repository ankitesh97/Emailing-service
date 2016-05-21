<?php
include('session.php');
$idofmail = $_GET['id'];
$_SESSION['mailid'] = $idofmail;
$mysql_host = 'localhost';
$mysql_user = 'root';
$mysql_pass = '';
$mysql_db = 'mailingservice';
$conn = mysqli_connect($mysql_host, $mysql_user, $mysql_pass, $mysql_db);
$user_check=$_SESSION['userentered'];
$qu1 = "UPDATE mails SET readcount = 1 WHERE Id='$idofmail'";
$r1 = mysqli_query($conn,$qu1);
$query = "SELECT * FROM mails where Id='$idofmail'";
$result=mysqli_query($conn,$query);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
$senderpic = $row['Sender'];

?>
<!DOCTYPE HTML>
 <head>
<title> <?php echo $row['Subject'];?></title>

<link href="css/inbox.css" rel="stylesheet" type="text/css" media="all"/>
 <script src="ckeditor/ckeditor.js"></script>
 <script type="text/javascript" src="js/displayeditor.js"></script>
 <link href="css/sendbar.css" rel="stylesheet" type="text/css" media="all"/>
</head>
<body style="background:#394264;">

  <div class="top_menu_list">
  	<div class="list">
    <ul class="hor_menu">
      <li class="menu_bar"><input  type="button" onclick="window.location.href='http://localhost:80/Home/index.php'" class="menu_buttons" id="back_to_home"/></li>
      <li class="menu_bar"><input  type="button" onClick="document.location.href='starred.php'" class="menu_buttons" id="star_mail"/></li>
      <li class="menu_bar"><input  type="button" onClick="document.location.href='markspam.php'" class="menu_buttons" id="report_spam"/></li>
      <li class="menu_bar"><input  type="button" onClick="document.location.href='deletemails.php'" class="menu_buttons" id="delete_mail"/></li>
    </ul>
    </div>
  </div>

  <hr>

  <div class="message">
  	<h2><?php echo $row['Subject'];?></h1>
  		<hr>
  	<div class="message_sender">
      
<?php 
$mysql_host = 'localhost';
$mysql_user = 'root';
$mysql_pass = '';
$mysql_db = 'mailingservice';
$conn = mysqli_connect($mysql_host, $mysql_user, $mysql_pass, $mysql_db);
$qu2 = "SELECT * FROM userdetails WHERE Username='$senderpic'";
$re2 = mysqli_query($conn,$qu2);
$row2 = mysqli_fetch_array($re2,MYSQLI_ASSOC);
if ( !empty( $row2['Profilepic'] ) )
{
      echo '<img style="width:40;height:40px" src="data:image;base64,'.$row2['Profilepic'].'"><br><b style="font-size:1.2em;">From: '.$row['Sender'].'</p>';
}
else
{
      echo '<img style="width:40;height:40px" src="images/profile.png"><br><b style="font-size:1.2em;">From: '.$row['Sender'].'</p>';
}
?> 
  	</div>

  	<div class="message_body">
  		<p>
         <?php echo $row['Body']; ?>
        </p>
  	</div>
  	<!-- if any attachments then only display this div-->
  	<hr>
    <?php
    if ($row['Attachment'] <> NULL)
    {
      echo '<div class="message_attachment">';
       echo '<p>';
        echo 'Sender has send you an attachment along with this mail, you can download it from <a id="down_attach" href="download.php?id='.$idofmail.'">here</a>';
        echo '</p>';
    echo'</div>';
   echo '<hr>';
    }
    ?>
  	
        
       <p id="hideme">Click me to <a id="reply_msg" onclick="displayeditor()" >reply</a></p>
        <div id="replyid" class="reply">
      <form action="replies.php" method="post" id="mailform" autocomplete="on" enctype="multipart/form-data">
            <textarea name="editor1" id="editor1" rows="10" cols="80">
            </textarea>
            <script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace('editor1', {
                    /*
                     * Ensure that htmlwriter plugin, which is required for this sample, is loaded.
                     */
                    //                extraPlugins: 'htmlwriter',
                    toolbarLocation: 'top',
                    height: 200,
                    width: '100%',
                    });
            </script>
                <div id="tobottom" class="bottom">
      <ul>
          <li>
            <input id="send_mail" type="submit" name ="send_reply"  value="Send" form="mailform">
          </li>
          <li class="up"><input value="2000000"  name="file_upload" id="file_upload" type="file" form="mailform"></li>

      <a onclick="document.getElementById('file_upload').click(); return false;" id="attach"><li class="attch_file"><img src="images/attach.png"></li></a> 


    </ul>
    </div>
      </form>
    </div>
 
  </div>



</body>
</html>