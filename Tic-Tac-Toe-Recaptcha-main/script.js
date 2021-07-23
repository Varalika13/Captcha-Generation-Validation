$(document).ready(function() {
	$("button").click(function() {	// on every button clicked
		if ($(this).html() == " ") {	// check if the button is unset by X or O player
			$(this).html("O")	//set the html of button to O
			ajaxo($(this).val());	// send value of button (position of pressed button) to Ajax handler
		};
	});
});

// start of ajax (client side)
function ajaxo(str) {
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {	// if everything went fine on serverside of ajax
			document.getElementById("answer").innerHTML = xmlhttp.responseText;	// return ajax resault
			$('button').prop('disabled', true);	// disable all buttons
			if (xmlhttp.responseText == "Wrong answer.") {	// if serverside ajax returns "wrong answer"
				$('#retry').show();	// the retry button will be visible
				$('#retry').prop('disabled', false);	//the retry button will be enabled and ready to press
			}else{
				$('#go').show();	// the retry button will be visible
				$('#continue').prop('disabled', false);	//the retry button will be enabled and ready to press
			};
		}
	}
	xmlhttp.open("GET", "captcha.php?q="+str, true);
	xmlhttp.send();
}
// end of ajax (client side)