<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
	<head>
		<title>Click CAPTCHA Demo</title>
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
        <?php include('clickCaptcha.php'); ?>
		<script type="text/javascript">


			 var start = 0;

		     function onCaptchaSuccess()
		     {
		     	window.open("IconCaptcha-Plugin-jQuery-PHP-master/examples/regular-form.php")
		     }

		     function onCaptchaFailed()
		     {



		     	document.getElementById("textBox").innerHTML = "Wrong Captcha";
		     }

		     function onNewCaptcha()
		     {
		     	// Requests a new base64 CAPTCHA image from the server
	            var elapsed = new Date().getTime() - start;
	            document.getElementById("textBox").innerHTML = "Image generated in " + elapsed / 1000.0 + " sec";
		     }

		</script>   
		<style>
		.center{
				display: flex;
				justify-content: center;
				align-items: center;
				height: 250px;
				}
		body{
			background: url(https://propertyspark.com/wp-content/uploads/2018/06/35_YmFjazA0.jpg);
		}
		.container{
			background:black;
			height:550px;
			width:500px;
			margin-left:500px;
			margin-top:100px;
			border-radius:20px;
		}

		#textBox{
			color:white;
			margin-left:200px;
			margin-top:-10px;
		}
		p{
			font-weight:800;
			font-size:24px;
			color:white;
			padding-top:100px;
			padding-left:100px;
		}
		</style>    
	</head>
	<body onload="initCaptcha()"> <!-- initializes the CAPTCHA on load -->
	<div class="container">
	<p> ENTER CAPTCHA: </p>
<div class="center">
	
	<div id="captcha"></div> </div>  <!-- The click-CAPTCHA module is placed in here -->
	<br>
	<centre>
	<div id="textBox"></div> </centre>
			</div>
	</body>
</html>