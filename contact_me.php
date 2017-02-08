
<?php
// Check for empty fields
if(empty($_POST['name'])  		||
   empty($_POST['email']) 		||
   empty($_POST['phone']) 		||
   empty($_POST['message'])	||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
	echo "No arguments Provided!";
	return false;
   }
	
$name = $_POST['name'];
$email_address = $_POST['email'];
$phone = $_POST['phone'];
$message = $_POST['message'];
	

$to = 'ac2031@hotmail.com';
$email_subject = "Website Contact Form:  $name";
$email_body = "T'a reçu un message du contact form du site 24H Web. \n\n"."Details:\n\nName: $name\n\nEmail: $email_address\n\nPhone: $phone\n\nMessage:\n$message";
$headers = "From: teh.ninja@live.com.pt\n";
mail($to,$email_subject,$email_body,$headers);
return true;			
?>