<?php

if(isset($_POST['email'])) {



// EDIT THE 2 LINES BELOW AS REQUIRED

$email_to = "tempe-proserv@endurance.com";

$email_subject = "Proserve Basic Form";





function died($error) {

// your error code can go here

echo "We are very sorry, but there were error(s) found with the form you submitted. ";

echo "These errors appear below.<br /><br />";

echo $error."<br /><br />";

echo "Please go back and fix these errors.<br /><br />";

die();

}



// validation expected data exists

if(!isset($_POST['first_name']) ||

!isset($_POST['last_name']) ||

!isset($_POST['email'])) {

died('We are sorry, but there appears to be a problem with the form you submitted.');       

}if(isset($_POST['g-recaptcha-response'])){
	$captcha=$_POST['g-recaptcha-response'];
}
if(!$captcha){
	echo '<h2>Check the captcha!</h2>';
	exit;
}
$secretKey = "#############################################";
        $ip = $_SERVER['REMOTE_ADDR'];
        $response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secretKey."&response=".$captcha."&remoteip=".$ip);
        $responseKeys = json_decode($response,true);
        if(intval($responseKeys["success"]) !== 1) {
          echo '<h2>Captcha Incorrect</h2>';
        } else {
          echo '<h2>Thanks for not being a bot!</h2>';
        }



$first_name = $_POST['first_name']; // required

$last_name = $_POST['last_name']; // required

$email_from = $_POST['email']; // required


$error_message = "";

$email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';

if(!preg_match($email_exp,$email_from)) {

$error_message .= 'The Email Address you entered does not appear to be valid.<br />';

}

$string_exp = "/^[A-Za-z .'-]+$/";

if(!preg_match($string_exp,$first_name)) {

$error_message .= 'The First Name you entered does not appear to be valid.<br />';

}

if(!preg_match($string_exp,$last_name)) {

$error_message .= 'The Last Name you entered does not appear to be valid.<br />';

}

if(strlen($error_message) > 0) {

died($error_message);

}

$email_message = "<h3>Proserve Form Details Below.</h3>" . '<br />';


function clean_string($string) {

$bad = array("content-type","bcc:","to:","cc:","href");

return str_replace($bad,"",$string);

}



$email_message .= "First Name: ".clean_string($first_name)."<br />"."<br />";

$email_message .= "Last Name: ".clean_string($last_name)."<br />"."<br />";

$email_message .= "Email: ".clean_string($email_from)."<br />"."<br />";


// create email headers

$headers = 'From: tempeproserve@tempe-proserve.com' . "\r\n".

'Reply-To: tempeproserve@tempe-proserve.com' . "\r\n".

"MIME-Version: 1.0" . "\r\n".

"Content-type: text/html; charset=utf-8" . "\r\n".

"Return-Path: <tempeproserve@tempe-proserve.com>" . "\r\n";

mail($email_to, $email_subject, $email_message, $headers, "-ftempeproserve@tempe-proserve.com");  

?>
 
<head>
        <meta http-equiv="refresh" content="4;url=https://marcus.tempe-proserve.com/" />
    </head>
    <body>
    	<h2>Thank you for testing my form! Please wait while I redirect you to the Home page.</h2>
        <p>Redirecting in 4 seconds...</p>
    </body> 
 
 
<?php
 
}
 
?>
