<?php
// Check for empty fields
if(empty($_POST['name'])  		||
   empty($_POST['email']) 		||
   empty($_POST['message'])	||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
	echo "No arguments Provided!";
	return false;
   }
	
$name = $_POST['name'];
$email_address = $_POST['email'];
$message = $_POST['message'];
	
// Create the email and send the message
$to = 'ac2031@hotmail.com';
$email_subject = "Website Contact Form:  $name";
$email_body = "Yo Michael, t'a reçu un message du contact form dans l'intranet\n\n"."Details:\n\nName: $name\n\nEmail: $email_address\n\nMessage:\n$message";
$headers = "From: teh.ninja@live.com.pt\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
$headers .= "Reply-To: $email_address";
mail($to,$email_subject,$email_body,$headers);
return true;			
?>