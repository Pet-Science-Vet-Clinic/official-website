<?php 
	
	$contact_fname = isset($_POST['contact_fname']) ? $_POST['contact_fname'] : null;
	$contact_lname = isset($_POST['contact_lname']) ? $_POST['contact_lname'] : null;
	$contact_email = isset($_POST['contact_email']) ? $_POST['contact_email'] : null;
	$contact_phone = isset($_POST['contact_phone']) ? $_POST['contact_phone'] : null;
	$contact_message = isset($_POST['contact_message']) ? $_POST['contact_message'] : null;
	
	$data = array(
		'fname' => $contact_fname, 
		'lname' => $contact_lname,
		'email' => $contact_email,
		'phone' => $contact_phone,
		'message' => $contact_message
	);

	$name = $contact_fname . " " . $contact_lname;
	$email = $contact_email;
	$subject = "Contact Us - " . $contact_email;
	$message = "Name: " . $name . "\nEmail: " . $email . "\nPhone: " . $contact_phone . "\n\nMessage: \n" . $contact_message;
	$to = "info@petsciencevet.com";
	$headers = 'From: '.$email."\r\n" .
			'Reply-To: '.$email."\r\n" .
			'X-Mailer: PHP/' . phpversion();

	mail($to, $subject, $message, $headers, "From: " . $name);

	echo json_encode($data);
?>

