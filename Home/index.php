<?php
include('session.php');
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
    if ( !empty( $row['Profilepic'] ) )
    {
       $_SESSION['profilephoto'] = $row['Profilepic'];
    }
    else
    {
      $_SESSION['profilephoto']=NULL;
    }

   }
?>
 <!DOCTYPE HTML>
<head>
<title>Home</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<link href="css/settings.css" rel="stylesheet" type="text/css" media="all"/>
<link href="css/starred.css" rel="stylesheet" type="text/css" media="all"/>
<link href="css/contactus.css" rel="stylesheet" type="text/css" media="all"/>
<link href="css/compose.css" rel="stylesheet" type="text/css" media="all"/>
<link href="css/schedule.css" rel="stylesheet" type="text/css" media="all"/>
<link href="css/spam.css" rel="stylesheet" type="text/css" media="all"/>
<link href="css/ViewProfile.css" rel="stylesheet" type="text/css" media="all"/>
<link href="css/changepassword.css" rel="stylesheet" type="text/css" media="all"/>
<link href="css/inboxemails.css" rel="stylesheet" type="text/css" media="all"/>
<link href="css/animation.css" rel="stylesheet" type="text/css" media="all"/>
<link href="css/nav.css" rel="stylesheet" type="text/css" media="all"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/popup.js"></script>
<script type="text/javascript" src="js/wysiwyg.js"></script>
<script type="text/javascript" src="js/login.js"></script>
<script type="text/javascript" src="js/collapse.js"></script>
<script type="text/javascript" src="js/toggle.js"></script>
<script type="text/javascript" src="js/idforinbox.js"></script>
<script src="ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="js/idforsent.js"></script>
<script type="text/javascript" src="js/idforspam.js"></script>
<script type="text/javascript" src="js/idforstarred.js"></script>
<script type="text/javascript" src="js/idfortrash.js"></script>

 <!----Calender -------->
  <link rel="stylesheet" href="css/clndr.css" type="text/css" />
  <script src="js/underscore-min.js"></script>
  <script src= "js/moment-2.2.1.js"></script>
  <script src="js/clndr.js"></script>
  <script src="js/site.js"></script>
  <!----End Calender -------->

</head>
<body onLoad="return show('toaccount','tosettings','tocontact', 'tostarred');">

     <div class="wrap">
        <div class="header">
            <div class="header_top">
            <div class="menu">
              <a class="toggleMenu" href="#"><img src="images/nav.png" alt="" /></a>
              <ul class="nav">
                <li class="change_view">
                  <a id="mysettings" class="to_settings" onclick="return show('tosettings','toaccount', 'tocontact', 'tostarred');"  onmouseover="myOverFunction('mysettings')"  onmouseout="myOutFunction('mysettings')"><i><img src="images/settings.png" alt="" /></i>Settings</a>
                </li>
                <li>
                  <a id="myacc" class="to_account" onclick="return show('toaccount','tosettings', 'tocontact', 'tostarred');" onmouseover="myOverFunction('myacc')" onmouseout="myOutFunction('myacc')"><i><img src="images/user.png" alt="" /></i>Account</a>
                </li>
                <li>
                  <a id="mycontact" class="to_contact" onclick="return show( 'tocontact', 'toaccount', 'tosettings', 'tostarred');" onmouseover="myOverFunction('mycontact')" onmouseout="myOutFunction('mycontact')" ><i><img src="images/contact_us.png" alt="" /></i>Contact Us </a>
                </li>
                <li>
                  <a id="mystarred" class="to_starred" onclick=" return show('tostarred', 'tocontact', 'tosettings', 'toaccount');" onmouseover="myOverFunction('mystarred')" onmouseout="myOutFunction('mystarred')"><i><img src="images/starred.png" alt="" /></i>Starred</a>
                </li>

                <li>
                  <a id="myschedule" class="to_schedule" onclick="composepop('toschedule')" onmouseover="myOverFunction('myschedule')" onmouseout="myOutFunction('myschedule')"><i><img src="images/schedule.png" alt="" /></i>Schedule</a>
                </li>

              <div class="clear"></div>
                </ul>
              <script type="text/javascript" src="js/responsive-nav.js"></script>
                </div>
            <div class="profile_details">
                   <div id="loginContainer">
                          <a id="loginButton" class=""><span>Me</span></a>
                            <div id="loginBox">
                              <form id="loginForm">
                                <fieldset id="body">
                                    <div class="user-info">
                            <h4>Hello, <?php echo $login_session; ?></h4>
                            <ul>
                              <li class="logout"><a href="logout.php"> Logout</a></li>
                              <div class="clear"></div>
                            </ul>
                          </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                     <div class="profile_img">
                       <?php
                if(isset($_SESSION['profilephoto']))
                {
                  //echo <img width = "150" height="150" src="' . $_SESSION['imgpath'] . '" alt="" /> </a>
                  //echo '<img src="' . $_SESSION['imgpath'] . '" style="width:40;height:40px">';
                  echo '<img  style="width:40;height:40px" src="data:image;base64,'.$_SESSION['profilephoto'].' "> ';
                }
                else
                {
                  //<a href=""><img width = "150" height="150" src="images/profile.png" alt="" /> </a>
                  echo '<img src="images/profile.png" style="width:40;height:40px">';
                }
                ?>
                     </div>
                     <div class="clear"></div>
              </div>
              <div class="clear"></div>
           </div>
      </div>
  </div>

    <div class="main" id="main_id">
      <div class="wrap" id="toaccount">
      <div id="account" class="animate_window">
         <div class="column_left">
           <div class="inbox">
             <h3>INBOX</h3>
                <a onclick="inboxmails()">
                   <div class="inbox_icon"></div>
                </a>
           </div>
           <div class="compose">
                   <h3>Compose</h3>
                   <a onclick="composepop('tocompose')">
                     <div class="compose_icon"></div>
                   </a>

              </div>
        </div>

            <div class="column_middle">
              <div class="column_middle_grid1">
             <div class="profile_picture">
              <form method="post" action="propic.php" enctype="multipart/form-data">
                <?php
                if(isset($_SESSION['profilephoto']))
                {
                  //echo <img width = "150" height="150" src="' . $_SESSION['imgpath'] . '" alt="" /> </a>
                  //echo '<img src="' . $_SESSION['imgpath'] . '" style="border-radius: 50%">';
                  echo '<img  style="border-radius: 60%; margin-top:40px;" src="data:image;base64,'.$_SESSION['profilephoto'].' "> ';
                }
                else
                {
                  //<a href=""><img width = "150" height="150" src="images/profile.png" alt="" /> </a>
                  echo '<img src="images/profile.png" style="width:150;height:150px">';
                }
                ?>
                <div class="profile_picture_name">
                  <h2>Welcome, <?php echo $login_session; ?>!</h2>
                  <a onclick="document.getElementById('upload').click(); return false;" ><img id="attachpic" src="images/attach.png"></a>
                  <input style="visibility:hidden;" id="upload" type="file" name="image" accept="image/*">
                  <input id="UploadProfile" type="submit" value="Upload" name="submit"/>
                </form>
                </div>

              </div>

           </div>


             <div class="sent">
             <h3>SENT</h3>
                <a onclick="sentmails()">
                   <div class="sent_icon"></div>
                </a>
           </div>

          </div>

            <div class="column_right">
         <div class="column_right_grid sign-in">
          <div class="trash">
            <h3>TRASH</h3>
                        <a onclick= "trashmails()">
                   <div class="trash_icon"></div>
                </a>
           </div>


           <div class="column_right_grid calender">
                      <div class="cal1"> </div>
           </div>
             </div>
      <div class="clear"></div>
   </div>
  </div>
</div>

</div>
</div>

<!--...................................SETTINGS............................-->

    <div class="classtosettings " id="tosettings">
       <div class="classsettings " id="settings">

         <h3>SETTINGS</h3>
      <div class="settings_list">
         <ul>
          <li>
            <a onclick="popup('myModal')" class="ViewProfile"><span>View Profile</span><div class="clear"></div></a>
          </li>

          <li>
            <a onclick="popup('ChangePassModal')" class="ChangePass"><span>Change Password</span><div class="clear"></div></a>
          </li>

          <li>
            <a onclick="spammails()" class="SetSpamMode"><span>View Spams</span><div class="clear"></div></a>
          </li>

          <li>
            <a onclick="popup('DeleteAccModal')" class="DeleteAcc"><span>Delete Account</span><div class="clear"></div></a>
          </li>
         </ul>

      </div>

        </div>

    </div>


<!--.....................................CONTACT US.....................................-->

    <div class="classtocontact" id="tocontact">
       <div class="classcontact" id="contact">

     <div class="description">
        <h2>About Us</h2>
        <p>
          This website provides a free email service. Photos and details of the developers of this website are displayed on the left, to know about contact details of the developers you can hover over the image. We are the students of the Computer department of VJTI, currently in Second Year. This website was developed only for academic purposes, all the copyrights belong to us. For more details you can contact either one of us, if any problem occurs then you can mail us at needsupport@name.com, please feel free to contact us.
        </p>
     </div>

         <div class="Image_list">
          <ul>
            <li>
              <ul class="effect">
               <li>
                  <h2>Shreyas Satardekar</h2>
                  <p>+919619613401</p>
                  <p>shreyas.satardekar@name.com</p>
               </li>
               <li>
                <div class="img_container"><img class="top" width="300px" height="250px" src="images/shreyas1.jpg"></div>
               </li>
              </ul>
                </li>

                <li>
              <ul class="effect">
               <li>
                  <h2>Anmol Kumar</h2>
                  <p>+919892207024</p>
                  <p>anmol.kumar@name.com</p>
               </li>
               <li>
                <div class="img_container"><img class="top" width="300px" height="250px" src="images/anmol1.jpg"></div>
               </li>
              </ul>
                </li>

                <li>
              <ul class="effect">
               <li>
                  <h2>Ankitesh Gupta</h2>
                  <p>+919821791638</p>
                  <p>ankitesh.gupta@name.com</p>
               </li>
               <li>
                <div class="img_container"><img class="top" width="300px" height="250px" src="images/anki1.jpg"></div>
               </li>
              </ul>
                </li>

          </ul>
         </div>



       </div>

    </div>



<!--..................................SETTINGS-> VIEW PROFILE.................................-->

   <div id="myModal" class="modal">
    <div id="MyProfile" class="details">
        <a onclick="closed('myModal')" title="Close" class="close">X</a>
      <ul>
        <li id="first"><a><div class="clears"><label>Name</label></div><p><?php echo $row['Firstname']; ?></p><span onclick="collapse('edit_name')" class="Edit">Edit<span></a></li>
         
         <div id="edit_name" class="edit_details">
          <div class="place">
          <form action="updatename.php" method="post">
            <input required="required" class="txtbox" name="Name" type="text">
            <input class="mydetailsbutton" type="Submit" Value="Update"></button>
          </form>
          </div>
         </div>
        
        <li><a><div class="clears"><label>Username</label></div><p><?php echo $login_session; ?></p></a></li>
        
        <li><a><div class="clears"><label>Recovery Email</label></div><p><?php echo $row['Emailaddress']; ?></p><span onclick="collapse1('edit_email')" class="Edit">Edit<span></a></li> 
        
        <div id="edit_email" class="edit_details">
          <div class="place">
          <form action="updateemail.php" method="post">
            <input required="required" class="txtbox" name="email" type="text">
            <input class="mydetailsbutton" type="Submit" Value="Update"></button>
          </form>
          </div>
         </div>

       <li><a><div class="clears"><label>Phone</label></div><p><?php echo $row['PhoneNo']; ?></p><span onclick="collapse2('edit_phone')" class="Edit">Edit<span></a></li> 
         
          <div id="edit_phone" class="edit_details">
          <div class="place">
          <form action="updatephone.php" method="post">
            <input required="required" class="txtbox" name="phone" type="text">
            <input class="mydetailsbutton" type="Submit" Value="Update"></button>
          </form>
          </div>
         </div>

        <li><a><div class="clears"><label>Gender</label></div><p><?php echo $row['Gender']; ?></p><span onclick="collapse3('edit_gender')" class="Edit">Edit<span></a></li>
          
         <div id="edit_gender" class="edit_details">
          <div class="place">
          <form action="updategender.php" method="post">
            <input required="required" class="txtbox" name="gender" type="text">
            <input class="mydetailsbutton" type="Submit" Value="Update"></button>
          </form>
          </div>
         </div>
        
        <li><a><div class="clears"><label>DOB</label></div><p><?php echo $row['DOB']; ?></p><span onclick="collapse4('edit_dob')" class="Edit">Edit<span></a></li>
         
         <div id="edit_dob" class="edit_details">
          <div class="place">
          <form action="updatedate.php" method="post">
            <input required="required" class="txtbox" name="dob" type="date">
            <input class="mydetailsbutton" type="Submit" Value="Update"></button>
          </form>
          </div>
         </div>
       
        <li><a><div class="clears"><label>Country</label></div><p><?php echo $row['Country']; ?></p><span onclick="collapse5('edit_country')" class="Edit">Edit<span></a></li>
         
         <div id="edit_country" class="edit_details">
          <div class="place">
          <form action="updatecountry.php" method="post">
            <input required="required" class="txtbox" name="country" type="text">
            <input class="mydetailsbutton" type="Submit" Value="Update"></button>
          </form>
          </div>
         </div>
        
        <li id="last"><a><div class="clears"><label>Account Created</label></div><p><?php echo $row['datetime']; ?></p></a></li>
      </ul>
    </div>
   </div>

<!--.....................................SETTINGS-> CHANGE PASSWORD.........................-->

   <div id="ChangePassModal" class="modal1">
    <div id="MyChangepass" class="Changepass">
        <a onclick="closed('ChangePassModal')" title="Close" class="close">X</a>
        <form action="passwordchange.php" method="post" autocomplete = "on">
          <p>
             <label for="currpass" class="cpass"> Current Password </label>
             <input id="currpass" name="currpass" required="required" type="password"/>
          </p>

          <p>
             <label for="newpass" class="npass"> New password </label>
             <input id="newpass" name="newpass" required="required" type="password"/>
          </p>

          <p>
             <label for="conpass" class="copass"> Confirm Password </label>
             <input id="conpass" name="conpass" required="required" type="password"/>
          </p>

          <p class="Change_button">
             <input class="savebutton" type="submit" value="Save Changes"/>
          </p>

        </form>
    </div>
   </div>

<!--.........................SETTINGS->DELETE ACCOUNT..................................-->

    <div id="DeleteAccModal" class="modal2">
        <div id="MyDeleteAcc" class="DeleteAcc">
            <form action="deleteacc.php" method="post">
            <a onclick="closed('DeleteAccModal')" title="Close" class="close">X</a>
            <h2>Are you sure that you want to delete this account??</h2>
            <p>Note: You wont be able to recover your account by any means!</p><br>
            <input class="askbutton" id="nobutton" name ="No" type="submit" value="NO"/>
            <input class="askbutton" id="yesbutton" name="Yes" type="submit" value="YES"/>
            </form>
        </div>
    </div>


<!--..................................STARRED MAILS..............................-->

     <div class="classtostar " id="tostarred">
       <div class="classstar " id="star">

         <h3>STARRED EMAILS</h3>
      <div class="star_list">
         <ul class="starlistclass">
          <?php
          $sql = "SELECT Id, Sender, Subject, currtime, readcount FROM mails WHERE Receiver = '$login_session' AND Starred=1 ORDER BY Id DESC";
          $result = $conn->query($sql);
          if ($result->num_rows > 0)
          {
            while($row = $result->fetch_assoc())
            {
              $onlytime = substr($row['currtime'], 11);
              $onlydate = substr($row['currtime'], 0, 10);
              if ($row['readcount'] == 1)
              {
              echo '<li style="background:#394264;" id ="'.$row['Id'].'">';
              }
              else
              {
              echo '<li style="background:#50597b;" id ="'.$row['Id'].'">';
              }
              echo "<a>";
              echo '<div class="left"><p>'.$row['Sender'].'</p></div>';
              echo '<div class="middle"><p>'.$row['Subject'].'</p></div>';
              if((time()-(60*60*24)) < strtotime($row['currtime']))
              {
                echo '<div class="right"><p>'.$onlytime.'</div>';
              }
              else
              {
              echo '<div class="right"><p>'.$onlydate.'</div>';
              }
              echo "</a>";
              echo "</li>";
              }
            }
          else
          {
              echo "<script language='javascript' type='text/javascript'>";
              echo "alert('You don't have any mails that are starred);";
              echo "window.location.href = 'index.php'";
              echo "</script>";
          }
            ?>
         </ul>
      </div>
        </div>
    </div>



    <!--............................................inbox emails................................-->

     <div class="classtoinbox " id="toinbox">
       <div class="classinbox " id="inbox">

         <h3>INBOX EMAILS</h3>
      <div class="inbox_list">
         <ul class="inboxlistclass">
          <?php
          $sql = "SELECT Id, Sender, Subject, currtime, readcount FROM mails WHERE Receiver = '$login_session' AND trash=0 AND (spamscore < 60) ORDER BY Id DESC";
          $result = $conn->query($sql);
          if ($result->num_rows > 0)
          {
            while($row = $result->fetch_assoc())
            {
              $onlytime = substr($row['currtime'], 11);
              $onlydate = substr($row['currtime'], 0, 10);
              if ($row['readcount'] == 1)
              {
              echo '<li style="background:#394264;" id ="'.$row['Id'].'">';
              }
              else
              {
              echo '<li style="background:#50597b;" id ="'.$row['Id'].'">';
              }
              echo "<a>";
              echo '<div class="left"><p>'.$row['Sender'].'</p></div>';
              echo '<div class="middle"><p>'.$row['Subject'].'</p></div>';
              if((time()-(60*60*24)) < strtotime($row['currtime']))
              {
                echo '<div class="right"><p>'.$onlytime.'</div>';
              }
              else
              {
              echo '<div class="right"><p>'.$onlydate.'</div>';
              }
              echo "</a>";
              echo "</li>";
              }
            }
          else
          {
              echo "<script language='javascript' type='text/javascript'>";
              echo "alert('You don't have any mails);";
              echo "window.location.href = 'index.php'";
              echo "</script>";
          }
            ?>
         </ul>
      </div>
        </div>
    </div>


        <!--....................................Trash mails.................................-->

       <div class="classtotrash " id="totrash">
       <div class="classtrash " id="trash">
         
         <h3>TRASH EMAILS</h3>
      <div class="trash_list">
         <ul class="trashlistclass">
          <?php
          //$sql = "SELECT Id, mailid, Sender, Subject, rectime FROM trash WHERE Receiver = '$login_session' ORDER BY mailid DESC";
          $sql = "SELECT * from mails WHERE Receiver = '$login_session' AND trash=1 ORDER BY Id DESC";
          $result = $conn->query($sql);
          if ($result->num_rows > 0)
          {
            while($row = $result->fetch_assoc())
            {
              $onlytime = substr($row['deletedtime'], 11);
              $onlydate = substr($row['deletedtime'], 0, 10);
              echo '<li id ="'.$row['Id'].'">';
              echo "<a>";
              echo '<div class="left"><p>'.$row['Sender'].'</p></div>';
              echo '<div class="middle"><p>'.$row['Subject'].'</p></div>';
              if((time()-(60*60*24)) < strtotime($row['deletedtime']))
              {
                echo '<div class="right"><p>'.$onlytime.'</div>';
              }
              else
              {
              echo '<div class="right"><p>'.$onlydate.'</div>';
              }
              echo "</a>";
              echo "</li>"; 
            }
          }
          else
          {
              echo "<script language='javascript' type='text/javascript'>";
              echo "alert('You don't have any trash');";
              echo "window.location.href = 'index.php'";
              echo "</script>";
          }
            ?>
         </ul>

      </div>

        </div>

    </div>


    <!--...........................sent mails ...........................-->

     <div class="classtosent " id="tosent">
       <div class="classsent " id="sent">
         
         <h3>SENT EMAILS</h3>
      <div class="sent_list">
         <ul class="sentlistclass">
          <?php
          $sql = "SELECT Id, Receiver, Subject, currtime, readcount FROM mails WHERE Sender = '$login_session' AND delfromsent=0 ORDER BY Id DESC";
          $result = $conn->query($sql);
          if ($result->num_rows > 0)
          {
            while($row = $result->fetch_assoc())
            {
              $onlytime = substr($row['currtime'], 11);
              $onlydate = substr($row['currtime'], 0, 10);
              if ($row['readcount'] == 1)
              {
              echo '<li style="background:#394264;" id ="'.$row['Id'].'">';
              }
              else
              {
              echo '<li style="background:#394264;" id ="'.$row['Id'].'">';
              }
              echo "<a>";
              echo '<div class="left"><p>'.$row['Receiver'].'</p></div>';
              echo '<div class="middle"><p>'.$row['Subject'].'</p></div>';
              if((time()-(60*60*24)) < strtotime($row['currtime']))
              {
                echo '<div class="right"><p>'.$onlytime.'</div>';
              }
              else
              {
              echo '<div class="right"><p>'.$onlydate.'</div>';
              }
              echo "</a>";
              echo "</li>";
              
            }
          }
          else
          {
              echo "<script language='javascript' type='text/javascript'>";
              echo "alert('You don't have any sent mails);";
              echo "window.location.href = 'index.php'";
              echo "</script>";
          }
          ?>
         </ul>

      </div>

        </div>

    </div>

   <!--..........................compose mail.............................-->




    <div id="tocompose" class="composemail">
      <div id="tomailheader" class="mailheader">
         <div class="heading"><h2>New Message</h2></div>
         <a onclick="minimize('tomailheader','tomid','tobottom')"><div class="minimize"><p style="visibility:hidden;">.</p></div></a>
         <a onclick="composeclosed('tocompose')"><div class="cross">.</div></a>
      </div>

      <div id="tomid" class="mid">
        <form action="composemail.php" autocomplete="on" method="post" id="mailform" enctype="multipart/form-data">
            <input id="Recipients" name="Recipients" required="required" type="text" placeholder="Recipients"/>
            <input id="Subject" name="Subject" type="text" placeholder=" Subject "/> 
        </form>
           <textarea  id="Body"  name="Body" form="mailform"></textarea>
           <script>
            CKEDITOR.replace('Body', {

              height: 200,
              width: '100%',
            }
              );
           </script>
      </div>

      <div id="tobottom" class="bottom">
        <ul>
          <li>
            <input id="send_mail" type="button" name ="send" onClick="javascript:submit_form();" form="mailform" value="Send">
          </li>

         
          <li class="up"><input value="2000000"  name="file_upload" id="file_upload" required="required" type="file" form="mailform"></li>

      <a onclick="document.getElementById('file_upload').click(); return false;" id="attach"><li class="attch_file"><img src="images/attach.png"></li></a> 


        </ul>
      </div>
      
    </div>

<!--............SETTINGS->VIEW SPAMS...................................................-->

   <div class="classtospam " id="tospam">
       <div class="classspam " id="spam">

         <h3>SPAM EMAILS</h3>
      <div class="spam_list">
         <ul class="spamlistclass">
          <?php
          $mysql_host = 'localhost';
          $mysql_user = 'root';
          $mysql_pass = '';
          $mysql_db = 'mailingservice';
  $conn = mysqli_connect($mysql_host, $mysql_user, $mysql_pass, $mysql_db);
  $user_check=$_SESSION['userentered'];
          $sql =  "SELECT Id, Sender, Subject, currtime, readcount FROM mails WHERE Receiver = '$login_session' AND Sender IN
          (SELECT Spammers from spam) UNION
          SELECT Id, Sender, Subject, currtime, readcount FROM mails WHERE Receiver = '$login_session' AND (spamscore > 60)
          ORDER BY Id DESC
          ";
          $result = $conn->query($sql);
          if ($result->num_rows > 0)
          {
            while($row = $result->fetch_assoc())
            {
              $onlytime = substr($row['currtime'], 11);
              $onlydate = substr($row['currtime'], 0, 10);
              if ($row['readcount'] == 1)
              {
              echo '<li style="background:#394264;" id ="'.$row['Id'].'">';
              }
              else
              {
              echo '<li style="background:#50597b;" id ="'.$row['Id'].'">';
              }
              echo "<a>";
              echo '<div class="left"><p>'.$row['Sender'].'</p></div>';
              echo '<div class="middle"><p>'.$row['Subject'].'</p></div>';
              if((time()-(60*60*24)) < strtotime($row['currtime']))
              {
                echo '<div class="right"><p>'.$onlytime.'</div>';
              }
              else
              {
              echo '<div class="right"><p>'.$onlydate.'</div>';
              }
              echo "</a>";
              echo "</li>";
              }
            }
          else
          {
              echo "<script language='javascript' type='text/javascript'>";
              echo "alert('You don't have any mails);";
              echo "window.location.href = 'index.php'";
              echo "</script>";
          }
            ?>
         </ul>
      </div>
        </div>
    </div>


<!--................................SCHEDULE MAIL ...............................-->


<div id="toschedule" class="scheduleemail">
      <div id="tomailheaderSc" class="mailheader">
         <div class="heading"><h2>New Message</h2></div>
         <a onclick="minimize1('tomailheaderSc','tomidSc','tobottomSc')"><div class="minimize"><p style="visibility:hidden;">.</p></div></a>
         <a onclick="scheduleclosed('toschedule')"><div class="cross">.</div></a>
      </div>

      <div id="tomidSc" class="mid">
        <form action="scheduleemail.php" autocomplete="on" method="post" id="schedulemailform" enctype="multipart/form-data">
            <input id="RecipientsSc" name="Recipients" required="required" type="text" placeholder="Recipients"/>
            <input id="SubjectSc" name="Subject" type="text" placeholder=" Subject "/> 
            <div id="delay">
              <input id="TimeSc" name="Time" type="number" required="required" placeholder=" Delay "/> 
              <select name="select_catalog" id="option_list" name="cars">
                 <option value="SECOND">SECOND</option>
                 <option value="MINUTE">MINUTE</option>
                 <option value="HOUR">HOUR</option>
                 <option value="DAY">DAY</option>
              </select>
           </div>
        </form>
           <textarea  id="BodySc"  name="Bodys" form="schedulemailform"></textarea>
           <script>
            CKEDITOR.replace('BodySc', {

              height: 200,
              width: '100%',
            }
              );
           </script>
      </div>

      <div id="tobottomSc" class="bottom">
        <ul>
          <li>
            <input id="send_mailSc" type="Submit" name ="send"  form="schedulemailform" value="Send">
          </li>

          <li class="up"><input value="2000000"  name="file_upload" id="file_uploadSc" type="file" form="schedulemailform"></li>

      <a onclick="document.getElementById('file_uploadSc').click(); return false;" id="attachSc"><li class="attch_file"><img src="images/attach.png"></li></a> 


        </ul>
      </div>
      
    </div>


</body>
</html>