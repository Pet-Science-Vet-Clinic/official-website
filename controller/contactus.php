<?php 
	
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	require 'libraries/PHPMailer/src/Exception.php';
	require 'libraries/PHPMailer/src/PHPMailer.php';
	require 'libraries/PHPMailer/src/SMTP.php';
	
	$mail = new PHPMailer(true);
	$mail_response;

	$default_email = 'info@petsciencevet.com';
	$fasfg = 'infopassword';
	$contact_fname = isset($_POST['contact_fname']) ? $_POST['contact_fname'] : null;
	$contact_lname = isset($_POST['contact_lname']) ? $_POST['contact_lname'] : null;
	$contact_email = isset($_POST['contact_email']) ? $_POST['contact_email'] : null;
	$contact_phone = isset($_POST['contact_phone']) ? $_POST['contact_phone'] : null;
	$contact_message = isset($_POST['contact_message']) ? $_POST['contact_message'] : null;
	$str_phone = (string)$contact_phone;

	$name = $contact_fname . " " . $contact_lname;
	$subject = "Contact Us - from: " . $contact_email;
	$alt_message = "Name: " . $name . "\nEmail: " . $contact_email . "\nPhone: " . $str_phone . "\n\nMessage: \n" . $contact_message;
	$html_message = "<h4>Name: <h4/>" . $name . "</br>";
	$html_message .= "<h4>Email: <h4/>" . $contact_email . "</br>";
	$html_message .= "<h4>Phone: <h4>" . $str_phone . "</br>";
	$html_message .= "<h4>Message:<h4/>" . $contact_message;
	// PHP Mailer SMTP
	try {
		$mail->isSMTP();                                  // Set mailer to use SMTP
		$mail->Host = 'smtp.hostinger.ph';  // Specify main and backup SMTP servers
		$mail->SMTPAuth = true;                               // Enable SMTP authentication
		$mail->Username = $default_email;               // SMTP username
		$mail->Password = $fasfg;                           // SMTP password
		$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;   // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
		$mail->Port = 587;                                    // TCP port to connect to

		$mail->setFrom($default_email, $name);
		$mail->addAddress($default_email);                  // Add a recipient
		$mail->addReplyTo($contact_email);
		$mail->addCC('ljbelenzo@gmail.com');

		$mail->isHTML(true);                                  // Set email format to HTML

		$mail->Subject = $subject;
		$mail->Body    = $html_message;
		$mail->AltBody = $alt_message;

		$mail->send();
		$mail_response = 'Successfully sent!';
		
	}catch (Exception $e) {
		$mail_response = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
	}

	$data = array(
		'fname' => $contact_fname, 
		'lname' => $contact_lname,
		'email' => $contact_email,
		'phone' => $str_phone,
		'message' => $html_message,
		'alt_message' => $alt_message,
		'mail_response' => $mail_response
	);

	echo json_encode($data);
?>

