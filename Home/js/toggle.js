var active = "myacc";


function show(showns, hiddens1, hiddens2, hiddens3) {
  var shown = document.getElementById(showns);
  shown.style.display='block';
  shown.style.webkitAnimationName = 'fadeInRightBig';
  shown.style.webkitAnimationDuration  = '1s';
  var hidden1 = document.getElementById(hiddens1);
  var hidden2 = document.getElementById(hiddens2);
  var hidden3 = document.getElementById(hiddens3);
  document.getElementById('toinbox').style.display='none';
  document.getElementById('totrash').style.display='none';
  document.getElementById('tosent').style.display='none';
  document.getElementById('tocompose').style.display='none';
  document.getElementById('toschedule').style.display='none';
  document.getElementById('tospam').style.display='none';
  hidden1.style.display='none';
  hidden2.style.display='none';
  hidden3.style.display='none';
  
  reset();
  switch(showns){

    case 'toaccount' : { setActive("myacc");}
    break;


    case 'tosettings' : { setActive("mysettings");}
    break;
    
    case 'tocontact': { setActive("mycontact");}
    break;

    case 'tostarred': { setActive("mystarred");}
    break;

    default: alert("Oops!!! Something Went Wrong");

  }

  return false;
}



// function when mouse enters the option

function myOverFunction(onid){

  var onid = document.getElementById(onid);
  onid.style.background = '#50597b';
  onid.style.borderBottom = '5px solid #11a8ab';

  
}


//function when mouse exits the function

function myOutFunction (onids) {
  var onid = document.getElementById(onids);

  if (onids.localeCompare(active) != 0) {
  onid.style.background = '#394264';
  onid.style.borderBottom = 'none';
}

}

// resets all previous modifications
function reset () {
   document.getElementById("myacc").style.background = '#394264';
     document.getElementById("myacc").style.borderBottom = 'none';
     document.getElementById("mysettings").style.background = '#394264';
     document.getElementById("mysettings").style.borderBottom = 'none';
     document.getElementById("mycontact").style.background = '#394264';
     document.getElementById("mycontact").style.borderBottom = 'none';
     document.getElementById("mystarred").style.background = '#394264';
     document.getElementById("mystarred").style.borderBottom = 'none';
}

// function to set active state 

function setActive (active_id) {
                 document.getElementById(active_id).style.background = '#50597b';
                 document.getElementById(active_id).style.borderBottom = '5px solid #11a8ab';
                 active = active_id ;
}

function inboxmails () {
  var show = document.getElementById('toinbox');
  show.style.display = 'block';
  show.style.webkitAnimationName = 'bounceIn';
  show.style.webkitAnimationDuration  = '0.8s';
  document.getElementById('toaccount').style.display = 'none' ;
}

//trash emails
function trashmails () {
  var show = document.getElementById('totrash');
  show.style.display = 'block';
  show.style.webkitAnimationName = 'bounceIn';
  show.style.webkitAnimationDuration  = '0.8s';
  document.getElementById('toaccount').style.display = 'none' ;
}


//sent emails
function sentmails () {
  var show = document.getElementById('tosent');
  show.style.display = 'block';
  show.style.webkitAnimationName = 'bounceIn';
  show.style.webkitAnimationDuration  = '0.8s';
  document.getElementById('toaccount').style.display = 'none' ;
}

function spammails (){
  var show = document.getElementById('tospam');
  show.style.display = 'block';
  show.style.webkitAnimationName = 'bounceIn';
  show.style.webkitAnimationDuration  = '0.8s';
  document.getElementById('tosettings').style.display = 'none' ;
}
