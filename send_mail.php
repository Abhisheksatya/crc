<?php
//send_mail.php


$myfile = fopen("subject.txt", "r") or die("Unable to open file!");
$sub=fread($myfile,filesize("subject.txt"));
fclose($myfile);
$myfile = fopen("message.txt", "r") or die("Unable to open file!");
$mes=fread($myfile,filesize("message.txt"));
fclose($myfile);
if(isset($_POST['email_data']))
{
	require 'class/class.phpmailer.php';
	$output = '';
	foreach($_POST['email_data'] as $row)
	{
	    $mail = new PHPMailer;
		$mail->IsSMTP();								//Sets Mailer to send message using SMTP
		$mail->Host = 'in-v3.mailjet.com';		//Sets the SMTP hosts of your Email hosting, this for Godaddy
		$mail->Port = '25';								//Sets the default SMTP server port
		$mail->SMTPAuth = true;							//Sets SMTP authentication. Utilizes the Username and Password variables
		$mail->Username = '0a1d883d3da8a8f9ce174fe8e1115ba8';					//Sets SMTP username
		$mail->Password = '748764595a8edf7caf3df90f0d0cd8d6';					//Sets SMTP password
		$mail->SMTPSecure = 'tls';							//Sets connection prefix. Options are "", "ssl" or "tls"
		$mail->From = 'a9990017847@gmail.com';			//Sets the From email address for the message
		$mail->FromName = 'ankur sharma';					//Sets the From name of the message
		$mail->AddAddress($row["email"], $row["name"]);	//Adds a "To" address
		$mail->WordWrap = 50;							//Sets word wrapping on the body of the message to a given number of characters
		$mail->IsHTML(true);							//Sets message type to HTML
		$mail->Subject = $sub; //Sets the Subject of the message
		//An HTML or plain text message body
		$mail->Body = $mes;

		$mail->AltBody = '';

		$result = $mail->Send();						//Send an Email. Return true on success or false on error

		if($result["code"] == '400')
		{
			$output .= html_entity_decode($result['full_error']);
		}

	}
	if($output == '')
	{
		echo 'ok';
	}
	else
	{
		echo $output;
	}
}

?>