<?php
	session_start();

	$name = trim($_POST['name']);
	$email = trim($_POST['email']);
	$message = htmlspecialchars(strip_tags(trim($_POST['message'])), ENT_QUOTES);
	$captcha_code = $_POST['captcha'];
	$sess_captcha = $_SESSION['randStrn'];

	$data = array();
	$data['email'] = $email;
	$data['name'] = $name;

	if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$data['email_status'] = 'true';
	}else{
		$data['email_status'] = 'false';
	}

	if($sess_captcha != $captcha_code) {
		$data['captcha_status'] = 'false';
	}else{
		$data['captcha_status'] = 'true';
	}
	$data['captcha_sess'] = $sess_captcha;
	$data['captcha_input'] = $captcha_code;

	if($data['email_status'] == 'true' && $data['captcha_status'] == 'true') {
		require_once 'PHPMailer/PHPMailerAutoload.php';

		$mail = new PHPMailer;
		$mail->isSMTP();
		$mail->Host = "smtp.mail.ru";
		$mail->SMTPAuth = true;
		$mail->SMTPSecure = "ssl";
		$mail->Username = "senja999";
		$mail->Password = "";
		$mail->Port = 465;
		$mail->Charset = 'UTF-8';

		$mail->From = 'senja999@mail.ru';
		$mail->FromName = 'Яркевич Сергей';
		$mail->AddAddress($email);

		$mail->Subject = 'Сообщение с сайта портфолио';
		$mail->Body    = $message;

		if($mail->send()) {
			// echo "true";
			$data['send_status'] = 'true';
		}else{
			$data['send_status'] = 'false';
		    // echo 'Message could not be sent.';
		    // echo 'Mailer Error: ' . $mail->ErrorInfo;
		}
	}
		
	echo json_encode($data);
	exit;
?>