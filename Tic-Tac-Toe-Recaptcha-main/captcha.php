<?php   //output of this page will be displayed in bottom of captcha
session_start();

if (1 > $_GET["q"] || $_GET["q"] > 9) {	//check if the q is between 1 to 9 (security check)
	echo "Wrong answer.";
	$_SESSION['result'] = 0;
}elseif ($_GET["q"] == $_SESSION["correct"]) {	//check if q is the right answer. this will be changed as soon as we make database and sample games
	echo "<p>Awesome!</p>";
	$_SESSION['result'] = 1;
}else {	// if q was not the right answer.
	echo "Wrong answer.";
	$_SESSION['result'] = 0;
}
?>