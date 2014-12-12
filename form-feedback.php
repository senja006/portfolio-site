<?php  
	require "PHPMailer/class.phpmailer.php";
	require "PHPMailer/class.smtp.php";

	$name = $_POST['name'];
	$email = $_POST['email'];
	$message = $_POST['message'];
	$captcha = $_POST['captcha'];

	$mail = new PHPMailer;
	// $mail->SMTPDebug = 3;

	$mail->isSMTP();
	$mail->Host = "smtp.mail.ru";
	$mail->SMTPAuth = true;
	$mail->SMTPSecure = "ssl";
	$mail->Username = "senja999";
	$mail->Password = "";
	$mail->Port = 465;

	$mail->From = 'senja999@mail.ru';
	$mail->FromName = 'Яркевич Сергей';
	$mail->AddAddress($email);

	$mail->Subject = 'Статус обращения';
	$mail->Body    = 'Ваше обращение принято';

	if(!$mail->send()) {
	    echo 'Message could not be sent.';
	    echo 'Mailer Error: ' . $mail->ErrorInfo;
	} else {
	    echo 'Message has been sent';
	}
?>