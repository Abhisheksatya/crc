<?php
//send_mail.php
$myfile = fopen("subject1.txt", "r") or die("Unable to open file!");
$subject=fread($myfile,filesize("subject1.txt"));
fclose($myfile);
$myfile = fopen("criteria.txt", "r") or die("Unable to open file!");
$criteria=fread($myfile,filesize("criteria.txt"));
fclose($myfile);
$myfile = fopen("jprofile.txt", "r") or die("Unable to open file!");
$jprofile=fread($myfile,filesize("jprofile.txt"));
fclose($myfile);
$myfile = fopen("cname.txt", "r") or die("Unable to open file!");
$cname=fread($myfile,filesize("cname.txt"));
fclose($myfile);
$myfile = fopen("package.txt", "r") or die("Unable to open file!");
$package=fread($myfile,filesize("package.txt"));
fclose($myfile);
$myfile = fopen("experience.txt", "r") or die("Unable to open file!");
$experience=fread($myfile,filesize("experience.txt"));
fclose($myfile);

$message= "Hey dear there is a placement drive for ".$cname." Company criteria is ".$criteria." and job profile is ".$jprofile.".Company Require ".$experience." The annual CTC is ".$package."<br />"."  Thanks & Regards \r\nTNP Hiet ";                             
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
		$mail->Subject = $subject; //Sets the Subject of the message
		//An HTML or plain text message body
		$mail->Body = $message;

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