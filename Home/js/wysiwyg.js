var click1=0;
var click2=0;
var click3=0;

function iBold(){
	var x = document.getElementById('mybold');
	if(click1==0)
		{
			click1=1;
			x.style.borderStyle  = 'solid ';
		}
	else {
		click1=0;
		x.style.borderStyle = 'none';
	}

	richTextField.document.execCommand('bold',false,null); 
}

function iItalic(){
		var x = document.getElementById('myitalics');
	if(click2==0)
		{
			click2=1;
			x.style.borderStyle  = 'solid ';
		}
	else {
		click2=0;
		x.style.borderStyle = 'none';
	}
	richTextField.document.execCommand('italic',false,null); 
}



function iUnderline(){
		var x = document.getElementById('myunderline');
	if(click3==0)
		{
			click3=1;
			x.style.borderStyle  = 'solid ';
		}
	else {
		click3=0;
		x.style.borderStyle = 'none';
	}
	richTextField.document.execCommand('underline',false,null);
}

function iFontSize(){
	var size = prompt('Enter a size 1 - 7', '');
	richTextField.document.execCommand('FontSize',false,size);
}

function submit_form(){
	var theForm = document.getElementById("mailform");
	theForm.submit();
}