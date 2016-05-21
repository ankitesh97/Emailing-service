


function popup(modal){
var modal = document.getElementById(modal);
modal.style.display = "block";

}


function closed(modal){
	var modal = document.getElementById(modal);
	modal.style.display = "none";
	document.getElementById('edit_name').style.display = 'none';
    document.getElementById('edit_email').style.display = 'none';
    document.getElementById('edit_phone').style.display = 'none';
    document.getElementById('edit_gender').style.display = 'none';
    document.getElementById('edit_dob').style.display = 'none';
    document.getElementById('edit_country').style.display = 'none';

}


function composepop(email) {

	var email = document.getElementById(email);
	email.style.display = "block";
	document.getElementById('tomid').style.display = "block";
    document.getElementById('tobottom').style.display = "block";

	
}

function composeclosed(email){
	var email = document.getElementById(email);
	email.style.display = "none";
    document.getElementById('Recipients').value=null;
    document.getElementById('Subject').value=null;
    window.frames['richTextField'].document.body.innerHTML=null;

}
var mini = 0;
var mini1 = 0;

function minimize(header,vanish1,vanish2){
	var vanish1 = document.getElementById(vanish1);
	var vanish2 = document.getElementById(vanish2);

	if(mini==0){
	vanish1.style.display = "none";
	vanish2.style.display = "none";
	mini=1;
}else{
	vanish1.style.display = "block";
	vanish2.style.display = "block";
	mini=0;

}

}

function minimize1(header,vanish1,vanish2){
	var vanish1 = document.getElementById(vanish1);
	var vanish2 = document.getElementById(vanish2);

	if(mini1==0){
	vanish1.style.display = "none";
	vanish2.style.display = "none";
	mini1=1;
}else{
	vanish1.style.display = "block";
	vanish2.style.display = "block";
	mini1=0;

}

}



function schedulepop(email) {

	var email = document.getElementById(email);
	email.style.display = "block";
	document.getElementById('tomidsSc').style.display = "block";
    document.getElementById('tobottomSc').style.display = "block";

	
}

function scheduleclosed(email){
	var email = document.getElementById(email);
	email.style.display = "none";
    document.getElementById('RecipientsSc').value=null;
    document.getElementById('SubjectSc').value=null;
    document.getElementById('TimeSc').value=null;
    document.getElementById('TimeSc').value=null;
    document.getElementById('option_list').value='Seconds';
    window.frames['richTextField'].document.body.innerHTML=null;

}

