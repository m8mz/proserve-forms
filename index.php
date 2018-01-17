<?php

require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';

$errors = [];
$missing = [];

if ($_POST["submit"]){
	session_start();
	include_once 'securimage/securimage.php';
	$securimage = new Securimage();
	date_default_timezone_set('Etc/UTC');

	$expected = ['name', 'email', 'phone', 'job', 'details']; // Optional values
	$required = ['name', 'email', 'phone', 'job', 'details'];

	foreach ($_POST as $key => $value) {
			$value = is_array($value) ? $value : trim($value);
			if (empty($value) && in_array($key, $required)) {
					$missing[] = $key;
					$$key = '';
			} elseif (in_array($key, $expected)) {
					$$key = $value;
			}
	}

	$name = (isset($_POST['name'])) ? $_POST['name'] : null;
	$email = (isset($_POST['email'])) ? $_POST['email'] : null;
	$phone = (isset($_POST['phone'])) ? $_POST['phone'] : null;
	$job = (isset($_POST['job'])) ? $_POST['job'] : null;
	$details = (isset($_POST['details'])) ? $_POST['details'] : null;

	 $securiCaptcha = $securimage->check($_POST['captcha_code']);
   if ($securiCaptcha == false) {
		 	$result = '<div class="alert alert-danger"><strong>The security code entered was incorrect.</div>';
   } else {
		 foreach ($_FILES['upload']['error'] as $key => $error) {
			 	if ($error == UPLOAD_ERR_OK) {
						$uploadedName = $_FILES['upload']['name'][$key];
						$filename = $name . "-" . date('d-m-Y-H-i-s') . '-'. mt_rand() . '-' . $uploadedName;
						$tmpName = $_FILES['upload']['tmp_name'][$key];
						$valid_types = ['application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'application/msword', 'application/pdf', 'image/jpeg', 'image/pjpeg', 'image/png', 'image/gif'];
						$file_mime_type = mime_content_type($tmpName);
						$correctMime = in_array($file_mime_type, $valid_types);
						$arrayName = explode('.',$uploadedName);
						$uploadedNameExt = strtolower(end($arrayName));
						$acceptExts = array("jpeg","jpg","png","pdf","docx","doc","gif");
						$correctExt = in_array($uploadedNameExt,$acceptExts);
						if ($correctMime && $correctExt) {
								 move_uploaded_file($tmpName, "uploaded/$filename");
								 $mail = new PHPMailer\PHPMailer\PHPMailer;
								 $mail->isSMTP();
								 $mail->SMTPDebug = 0; // set 2 for debug
								 $mail->Host = 'smtp.accountsupport.com';
								 $mail->Port = 587;
								 $mail->SMTPSecure = 'tls';
								 $mail->SMTPAuth = true;
								 $mail->Username = 'noreply@hcrepro.com';
								 $mail->Password = 'irUuZqQ1rMe2';
						 	   $mail->setFrom('noreply@hcrepro.com', 'HCREPRO');
								 $mail->addReplyTo('noreply@hcrepro.com', 'HCREPRO');
						 	   $mail->addAddress('techhelp3636@gmail.com', 'Admin');
						 	   $mail->Subject = 'Form Submission';
						 		 $bodyMessage = "Name: {$name}<br>";
						 		 $bodyMessage .= "Job: {$job}<br>";
						 		 $bodyMessage .= "Email: {$email}<br>";
						 		 $bodyMessage .= "Phone Number: {$phone}<br>";
						 		 $bodyMessage .= "Details: {$details}<br>";
								 $bodyMessage .= "Uploaded File: {$filename}";
						 	   $mail->msgHTML($bodyMessage);
						 	   if(!$mail->send()) {
						 	       $result='<div class="alert alert-danger"><strong>Sorry, there was an error with sending your message, please try again.</strong></div>';
						 	       echo 'Mailer Error: ' . $mail->ErrorInfo;
						 	   } else {
						 	       $result='<div class="alert alert-success"><strong>Thank you!</strong></div>';
						 	   }
						} else {
								// TODO error output
								if (!$correctMime) {
										$result = '<div class="alert alert-danger"><strong>Invalid Filetype</strong></div>';
								} elseif (!$correctExt) {
										$result = '<div class="alert alert-danger"><strong>Invalid Filetype</strong></div>';
								}
								
						}
				}
			}

	   
	 } // captcha if statement close
}
?>
<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">

</head>
<body>


	<div class="container">
	<div class="row">

	<div class="col-md-4">
	</div>
	<div class="col-md-4">
				<?php echo $result; ?>
				<?php if ($errors || $missing) : ?>
						<p class="alert alert-danger">Please fix the item(s) indicated.</p>
				<?php endif; ?>
	      <form method="POST" enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF']; ?>">

					<div class="form-group">
	         <label for="name">Name
					 <?php if ($missing && in_array('name', $missing)) : ?>
						 	<p class="alert alert-danger">Please enter your name</p>
					 <?php endif; ?>
					 </label>
	         <input type="text" name="name" class="form-control" id="name" placeholder=""
					  		<?php
									if ($errors || $missing || !$securiCaptcha || !$correctMime || !$correctExt) {
										echo 'value="' . htmlentities($name) . '"';
									}
								?> required>
	         </div>

	        <div class="form-group">
	          <label for="job">Job Name
						<?php if ($missing && in_array('job', $missing)) : ?>
	 						 	<p class="alert alert-danger">Please enter your occupation</p>
	 					<?php endif; ?>
					  </label>
	          <input type="text" name="job" class="form-control" id="job" placeholder=""
								<?php
									if ($errors || $missing || !$securiCaptcha || !$correctMime || !$correctExt) {
										echo 'value="' . htmlentities($job) . '"';
									}
								?> required>
	         </div>

	        <div class="form-group">
	          <label for="email">Email
						<?php if ($missing && in_array('email', $missing)) : ?>
	 						 	<p class="alert alert-danger">Please enter your email</p>
	 					<?php endif; ?>
					  </label>
	          <input type="email" name="email" class="form-control" id="email" placeholder=""
								<?php
									if ($errors || $missing || !$securiCaptcha || !$correctMime || !$correctExt) {
										echo 'value="' . htmlentities($email) . '"';
									}
								?> required>
	        </div>

	        <div class="form-group">
	          <label for="phone">Phone
						<?php if ($missing && in_array('phone', $missing)) : ?>
	 						 	<p class="alert alert-danger">Please enter your phone number</p>
	 					<?php endif; ?>
					  </label>
	          <input type="phone" name="phone" class="form-control" id="phone"
								<?php
									if ($errors || $missing || !$securiCaptcha || !$correctMime || !$correctExt) {
										echo 'value="' . htmlentities($phone) . '"';
									}
								?> >
	        </div>

	        <div class="form-group">
	          <label for="details">Job Details
						<?php if ($missing && in_array('job', $missing)) : ?>
	 						 	<p class="alert alert-danger">Please enter a job description</p>
	 					<?php endif; ?>
					  </label>
	          <textarea class="form-control" name="details" id="details" rows="3" required><?php
							if ($errors || $missing || !$securiCaptcha || !$correctMime || !$correctExt) {
								echo htmlentities($details);
							}
							?></textarea>
	        </div>

	        <div class="form-group">
	          <label for="file">Upload Document</label>
	          <input type="file" name="upload[]" class="form-control-file" id="file">
	        </div>

	              <img id="captcha" src="securimage/securimage_show.php" alt="CAPTCHA Image" /><br><br>

	              <input class="form-control" type="text" name="captcha_code" id="captcha_code" size="10" maxlength="6" />
	              <br>
	              <a href="#" title="Refresh CAPTCHA" id="refresh-btn" style="color:#B1BB1C" onclick="document.getElementById('captcha').src = 'securimage/securimage_show.php?' + Math.random(); return false"><i class="fa fa-refresh" aria-hidden="true"></i></a>

	         <div class="form-group" id="submit-btn">
	           <input type="submit" name="submit" class="btn-default" id="submit">
	        </div>
	         </form>
	</div>

	<div class="col-md-4">
	</div>

	</div>
	</div>


</body>
</html>
