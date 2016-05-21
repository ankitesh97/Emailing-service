 <div class="classtoinbox " id="toinbox">
       <div class="classinbox " id="inbox">

         <h3>INBOX EMAILS</h3>
      <div class="inbox_list">
         <ul class="inboxlistclass">
          <?php
          $sql = "SELECT Id, Sender, Subject, currtime, readcount FROM mails WHERE Receiver = '$login_session' AND trash=0 AND spam=1 ORDER BY Id DESC UNION
          SELECT Id, Sender, Subject, currtime, readcount FROM mails WHERE Receiver = '$login_session' AND Sender IN
          (SELECT Spammers from spam) UNION
          SELECT Id, Sender, Subject, currtime, readcount FROM mails WHERE Receiver = '$login_session' AND (Subject LIKE '%Offer%' OR Body LIKE '%Offer%')";
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