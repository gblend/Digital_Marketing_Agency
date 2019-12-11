<?php
require 'PHPMailerAutoload.php';
$mail = new PHPMailer;

//sumbission data
$ipaddress = $_SERVER['REMOTE_ADDR'];
$date = date('d/m/Y');
$time = date('H:i:s');

//form data
$name = $_POST['name'];	
$email = $_POST['email'];
$website = $_POST['website'];
$number = $_POST['number'];
$emailfrom = "service@mainstride.com";


//$mail->SMTPDebug = 3;                               // Enable verbose debug output

 $mail->isSMTP();                                      // Set mailer to use SMTP
 $mail->Host = 'server270.web-hosting.com';  // Specify main and backup SMTP servers
 $mail->SMTPAuth = true;                               // Enable SMTP authentication
 $mail->Username = 'service@mainstride.com';                 // SMTP username
 $mail->Password = 'Password123*';                           // SMTP password
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
 $mail->Port = 465;                                    // TCP port to connect to
$mail->setFrom($emailfrom);
$mail->addAddress('service@mainstride.com'/*, 'MainStride'*/);     // Add a recipient
// $mail->addAddress('ellen@example.com');               // Name is optional
$mail->addReplyTo($email);
$mail->addCC('gabrielilochi@gmail.com');
//$mail->addBCC('email@example.com');

$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'New email from mainstride.com';
$mail->Body    = "<p>You have recieved a new message from the request proposal form on your website.</p>
						  <p><strong>Name: </strong> {$name} </p>
						  <p><strong>Email Address: </strong> {$email} </p>
						  <p><strong>Website: </strong> {$website} </p>
						  <p><strong>Phone Number: </strong> {$number} </p>
						  <p>This message was sent from the IP Address: {$ipaddress} on {$date} at {$time}</p>";
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
if(!$mail->send()) {
    echo '<div style="background-color: #F2DEDE; height: 40px; padding-top: 10px; border-radius: 4px;" id="error-alert"><strong style="color: #A94442"> Sorry your message could not be sent.</strong></div>';
} else {
    echo '<div style="width: 100% !important; background-color: #D0E9C6;  height: 40px; padding-top: 10px; border-radius: 4px;"><strong style="color:#3C763D" id="success_alert">Thanks for your message. We\'ll be in touch.</strong></div>';
}