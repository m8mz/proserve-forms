<?php

// EDIT THE 2 LINES BELOW AS REQUIRED

$email_to = "###################";

$email_subject = "Order Form";




function died($error) {

// your error code can go here

echo "We are very sorry, but there were error(s) found with the form you submitted. ";

echo "These errors appear below.<br /><br />";

echo $error."<br /><br />";

echo "Please go back and fix these errors.<br /><br />";

die();

}


// validation expected data exists

//if(!isset($_POST['field50520560-first']) ||

//!isset($_POST['field50520560-last']) ||

//!isset($_POST['field50520567'])) {

//died('We are sorry, but there appears to be a problem with the form you submitted.');       

//}



$first_name = $_POST['field50520560-first']; // required
$first_name = htmlspecialchars($first_name);
$last_name = $_POST['field50520560-last']; // required
$last_name = htmlspecialchars($last_name);
$company = $_POST['field50520562']; // required
$company = htmlspecialchars($company);
$phone = $_POST['field50520566']; // required
$phone = htmlspecialchars($phone);
$email = $_POST['field50520567']; // required
$email = htmlspecialchars($email);
$fax = $_POST['field50520568']; // required
$fax = htmlspecialchars($fax);
$billing_address = $_POST['field50520571-address' . '<br>' . 'field50520571-address2']; // required
$billing_address = htmlspecialchars($billing_address);
$city = $_POST['field50520571-city']; // required
$city = htmlspecialchars($city);
$state = $_POST['field50520571-state']; // required
$state = htmlspecialchars($state);
$zip = $_POST['field50520571-zip']; // required
$zip = htmlspecialchars($zip);
$shipping_address = $_POST['field50520572']; // required
$shipping_address = htmlspecialchars($shipping_address);
$creditcard = $_POST['field50520605']; // required
$creditcard = htmlspecialchars($creditcard);
$cvv = $_POST['field50520606']; // required
$cvv = htmlspecialchars($cvv);
$expiration_date = $_POST['field50520607Format']; // required
$expiration_date = htmlspecialchars($expiration_date);
$quantity_1 = $_POST['quantity-1']; // required
$quantity_1 = htmlspecialchars($quantity_1);
$quantity_2 = $_POST['quantity-2']; // required
$quantity_2 = htmlspecialchars($quantity_2);
$quantity_3 = $_POST['quantity-3']; // required
$quantity_3 = htmlspecialchars($quantity_3);
$quantity_4 = $_POST['quantity-4']; // required
$quantity_4 = htmlspecialchars($quantity_4);
$quantity_5 = $_POST['quantity-5']; // required
$quantity_5 = htmlspecialchars($quantity_5);
$model_1 = $_POST['model-1']; // required
$model_1 = htmlspecialchars($model_1);
$model_2 = $_POST['model-2']; // required
$model_2 = htmlspecialchars($model_2);
$model_3 = $_POST['model-3']; // required
$model_3 = htmlspecialchars($model_3);
$model_4 = $_POST['model-4']; // required
$model_4 = htmlspecialchars($model_4);
$model_5 = $_POST['model-5']; // required
$model_5 = htmlspecialchars($model_5);
$length_1 = $_POST['length-1']; // required
$length_1 = htmlspecialchars($length_1);
$length_2 = $_POST['length-2']; // required
$length_2 = htmlspecialchars($length_2);
$length_3 = $_POST['length-3']; // required
$length_3 = htmlspecialchars($length_3);
$length_4 = $_POST['length-4']; // required
$length_4 = htmlspecialchars($length_4);
$length_5 = $_POST['length-5']; // required
$length_5 = htmlspecialchars($length_5);
$height_1 = $_POST['height-1']; // required
$height_1 = htmlspecialchars($height_1);
$height_2 = $_POST['height-2']; // required
$height_2 = htmlspecialchars($height_2);
$height_3 = $_POST['height-3']; // required
$height_3 = htmlspecialchars($height_3);
$height_4 = $_POST['height-4']; // required
$height_4 = htmlspecialchars($height_4);
$height_5 = $_POST['height-5']; // required
$height_5 = htmlspecialchars($height_5);
$depth_1 = $_POST['depth-1']; // required
$depth_1 = htmlspecialchars($depth_1);
$depth_2 = $_POST['depth-2']; // required
$depth_2 = htmlspecialchars($depth_2);
$depth_3 = $_POST['depth-3']; // required
$depth_3 = htmlspecialchars($depth_3);
$depth_4 = $_POST['depth-4']; // required
$depth_4 = htmlspecialchars($depth_4);
$depth_5 = $_POST['depth-5']; // required
$depth_5 = htmlspecialchars($depth_5);
$color_1 = $_POST['color-1']; // required
$color_1 = htmlspecialchars($color_1);
$color_2 = $_POST['color-2']; // required
$color_2 = htmlspecialchars($color_2);
$color_3 = $_POST['color-3']; // required
$color_3 = htmlspecialchars($color_3);
$color_4 = $_POST['color-4']; // required
$color_4 = htmlspecialchars($color_4);
$color_5 = $_POST['color-5']; // required
$color_5 = htmlspecialchars($color_5);

//$error_message = "";

//$email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';

//if(!preg_match($email_exp,$email)) {

//$error_message .= 'The Email Address you entered does not appear to be valid.<br />';

//}

//$string_exp = "/^[A-Za-z .'-]+$/";

//if(!preg_match($string_exp,$first_name)) {

//$error_message .= 'The First Name you entered does not appear to be valid.<br />';

//}

//if(!preg_match($string_exp,$last_name)) {

//$error_message .= 'The Last Name you entered does not appear to be valid.<br />';

//}

//if(strlen($error_message) > 0) {

//died($error_message);

//}

$email_message = "<h3>Order Details</h3>" . "<br />";


$email_message .= "First Name: "."$first_name"."<br />"."<br />";

$email_message .= "Last Name: "."$last_name"."<br />"."<br />";

$email_message .= "Company: "."$company"."<br />"."<br />";

$email_message .= "Phone: "."$phone"."<br />"."<br />";

$email_message .= "Email: "."$email"."<br />"."<br />";

$email_message .= "Fax: "."$fax"."<br />"."<br />";

$email_message .= "Billing Address: "."$billing_address"."<br />"."<br />";

$email_message .= "City: "."$city"."<br />"."<br />";

$email_message .= "State: "."$state"."<br />"."<br />";

$email_message .= "Zip Code: "."$zip"."<br />"."<br />";

$email_message .= "Shipping Address (if applicable): "."$shipping_address"."<br />"."<br />";

$email_message .= "CC #: "."$creditcard"."<br />"."<br />";

$email_message .= "CVV: "."$cvv"."<br />"."<br />";

$email_message .= "Expiration: "."$expiration_date"."<br />"."<br />";

$email_message .= "Order #1"."<br />"."<br />";

$email_message .= "Quantity: " ."$quantity_1"."<br />"."<br />";

$email_message .= "Model: " . "$model_1"."<br />"."<br />";

$email_message .= "Length: "."$length_1"."<br />"."<br />";

$email_message .= "Height: "."$height_1"."<br />"."<br />";

$email_message .= "Depth: "."$depth_1"."<br />"."<br />";

$email_message .= "Color: "."$color_1"."<br />"."<br />";

$email_message .= "Order #2"."<br />"."<br />";

$email_message .= "Quantity: "."$quantity_2"."<br />"."<br />";

$email_message .= "Model: "."$model_2"."<br />"."<br />";

$email_message .= "Length: "."$length_2"."<br />"."<br />";

$email_message .= "Height: "."$height_2"."<br />"."<br />";

$email_message .= "Depth: "."$depth_2"."<br />"."<br />";

$email_message .= "Color: "."$color_2"."<br />"."<br />";

$email_message .= "Order #3"."<br />"."<br />";

$email_message .= "Quantity: "."$quantity_3"."<br />"."<br />";

$email_message .= "Model: "."$model_3"."<br />"."<br />";

$email_message .= "Length: "."$length_3"."<br />"."<br />";

$email_message .= "Height: "."$height_3"."<br />"."<br />";

$email_message .= "Depth: "."$depth_3"."<br />"."<br />";

$email_message .= "Color: "."$color_3"."<br />"."<br />";

$email_message .= "Order #4"."<br />"."<br />";

$email_message .= "Quantity: "."$quantity_4"."<br />"."<br />";

$email_message .= "Model: "."$model_4"."<br />"."<br />";

$email_message .= "Length: "."$length_4"."<br />"."<br />";

$email_message .= "Height: "."$height_4"."<br />"."<br />";

$email_message .= "Depth: "."$depth_4"."<br />"."<br />";

$email_message .= "Color: "."$color_4"."<br />"."<br />";

$email_message .= "Order #5"."<br />"."<br />";

$email_message .= "Quantity: "."$quantity_5"."<br />"."<br />";

$email_message .= "Model: "."$model_5"."<br />"."<br />";

$email_message .= "Length: "."$length_5"."<br />"."<br />";

$email_message .= "Height: "."$height_5"."<br />"."<br />";

$email_message .= "Depth: "."$depth_5"."<br />"."<br />";

$email_message .= "Color: "."$color_5"."<br />"."<br />"; 

// create email headers

$headers = 'From: ############' . "\r\n".

'Reply-To: ##################' . "\r\n".

"MIME-Version: 1.0" . "\r\n".

"Content-type: text/html; charset=utf-8" . "\r\n".

"Return-Path: <##############>" . "\r\n";

mail($email_to, $email_subject, $email_message, $headers, "-f#################");
?>
 <br><br><br><br>
    <div class="rich-text-element-content absolute-fill element-content dir-ltr" style="background: none; text-align: left; color: rgb(49, 151, 156); line-height: 1.2; letter-spacing: 0px; font-size: 20px; font-family: Lato;"><div class="rich-text-positioning-wrapper vertical-alignment-top"><div class="rich-text-content common-rich-content-style has-content" spellcheck="false"><div style="text-align: center;"><span style="font-size:30px;">Thank you! Form was successful.<br></span></div><div style="text-align: center;"><span style="font-size:30px;">Please click <span class="theme-text-color-4-2"><u><a href="http://monarchcovers.com/order-form.html" data-attached-link="{&quot;type&quot;:&quot;Pages&quot;,&quot;url&quot;:&quot;id1488496312163&quot;,&quot;title&quot;:&quot;Order Form&quot;}" class="wz-link internal-link">here</a></u></span> to go back to the site.</span></div></div><div class="rich-text-content-overlay stretched-to-fill fully-transparent state-hidden"></div></div></div>
 
<?php
 
?>
