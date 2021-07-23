<?php
    /**
     * IconCaptcha Plugin: v2.5.0
     * Copyright © 2017, Fabian Wennink (https://www.fabianwennink.nl)
     *
     * Licensed under the MIT license: http://www.opensource.org/licenses/mit-license.php
     */

    // Start a PHP session.
    session_start();

    // Include the IconCaptcha classes.
	require('../src/captcha-session.class.php');
    require('../src/captcha.class.php');

    IconCaptcha::setIconsFolderPath('../assets/icons/');

    IconCaptcha::setIconNoiseEnabled(true);

    if(!empty($_POST)) {
        if(IconCaptcha::validateSubmission($_POST)) {
            $captchaMessage = 'The form has been submitted!';
        } else {
            $captchaMessage = json_decode(IconCaptcha::getErrorMessage())->error;
        }
    }
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>IconCaptcha Plugin v2.5.0 - By Fabian Wennink</title>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=9" />
        <meta name="author" content="Fabian Wennink © <?= date('Y') ?>" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="../assets/favicon.ico" rel="shortcut icon" type="image/x-icon" />
        <link href="../assets/demo.css" rel="stylesheet" type="text/css">

        <!-- Include IconCaptcha stylesheet -->
        <link href="../assets/css/icon-captcha.min.css" rel="stylesheet" type="text/css">
    </head>
    <body>
    <div class="container" style="background-color:white;display:block;height:400px;width:400px">
                <!-- Just a basic HTML form, captcha should ALWAYS be placed WITHIN the <form> element -->
                <h2 style="margin-left:0px; margin-top:10px; color:black;">Form:</h2>

                <?php
                    if(isset($captchaMessage)) {
                        echo '<b>Captcha Message: </b>' . $captchaMessage;
                    }
                ?>

                <form action="thankyou.html" method="post" style="background-color:white;color:black;">
                
                    Email:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text">
                <br>
                    Password:&nbsp;<input type="password">
                
                
                    <!-- Element that we use to create the IconCaptcha with -->
                    <div class="captcha-holder" style="margin-left:50px; margin-top:20px;margin-bottom:20px;"></div>
                    
                    <!-- Submit button to test your IconCaptcha input -->
                    <input type="submit" class="btn" style="background-image: url(background.png), -webkit-linear-gradient(20deg,#6D1AF3,#51D0EF);" >
                </form>
            </div>

            
        </div>

        

        <!-- Include Google Font - Just for demo page -->
        <link href="//fonts.googleapis.com/css?family=Poppins:400,700" rel="stylesheet">

        <!-- Include jQuery Library -->
        <!--[if lt IE 9]>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.3/jquery.min.js"></script>
        <![endif]-->

        <!--[if (gte IE 9) | (!IE)]><!-->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <!--<![endif]-->

        <!-- Include IconCaptcha script -->
        <script src="../assets/js/icon-captcha.min.js" type="text/javascript"></script>

        <!-- Initialize the IconCaptcha -->
        <script async type="text/javascript">
            $(window).ready(function() {
                $('.captcha-holder').iconCaptcha({
                    theme: ['light', 'dark'], // Select the theme(s) of the Captcha(s). Available: light, dark
                    fontFamily: '', // Change the font family of the captcha. Leaving it blank will add the default font to the end of the <body> tag.
                    clickDelay: 500, // The delay during which the user can't select an image.
                    invalidResetDelay: 3000, // After how many milliseconds the captcha should reset after a wrong icon selection.
                    requestIconsDelay: 1500, // How long should the script wait before requesting the hashes and icons? (to prevent a high(er) CPU usage during a DDoS attack)
                    loadingAnimationDelay: 1500, // How long the fake loading animation should play.
                    hoverDetection: true, // Enable or disable the cursor hover detection.
                    showCredits: 'show', // Show, hide or disable the credits element. Valid values: 'show', 'hide', 'disabled' (please leave it enabled).
                    enableLoadingAnimation: true, // Enable of disable the fake loading animation. Doesn't actually do anything other than look nice.
                    validationPath: '../src/captcha-request.php', // The path to the Captcha validation file.
                    messages: { // You can put whatever message you want in the captcha.
                        header: "Select the image that does not belong in the row",
                        correct: {
                            top: "Great!",
                            bottom: "You do not appear to be a robot."
                        },
                        incorrect: {
                            top: "Oops!",
                            bottom: "You've selected the wrong image."
                        }
                    }
                })
                    .bind('init.iconCaptcha', function(e, id) { // You can bind to custom events, in case you want to execute some custom code.
                        console.log('Event: Captcha initialized', id);
                    }).bind('selected.iconCaptcha', function(e, id) {
                    console.log('Event: Icon selected', id);
                }).bind('refreshed.iconCaptcha', function(e, id) {
                    console.log('Event: Captcha refreshed', id);
                }).bind('success.iconCaptcha', function(e, id) {
                    console.log('Event: Correct input', id);
                }).bind('error.iconCaptcha', function(e, id) {
                    console.log('Event: Wrong input', id);
                });
            });
        </script>
    </body>
</html>