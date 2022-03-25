<?php
	//Mensagem
	$mensagem = "<html><head><meta http-equiv='Content-Type' content='text/html;' /></head><body><table>";
	foreach ($_POST as $key=>$value)
		if ($value !== '' && $key !== 'email') {
			$mensagem .=
				"<tr>
					<td style='background-color: #ccc; width: 150px; text-align: right;'>$key</td>
					<td style='background-color: beige; width: 500px;'>$value</td>
				</tr>";
		}
	$mensagem .= "</table></body></html>";


	$destinatario =   $_POST['email'];
	$contato = $_POST['E-mail'];

	$assunto = "Formulario recebido!";
	if(isset($_POST['Assunto']))
		$assunto = "[SITE] ".$_POST['Assunto'];

	$cabecalho = $_POST['E-mail'];
	if(isset($_POST['E-mail']))
		$cabecalho = $_POST['E-mail'];

	$Nome = 'Contato do Site';
	if(isset($_POST['Nome']))
		$Nome = $_POST['Nome'];

	require 'PHPMailerAutoload.php';

	$mail = new PHPMailer;
	$mail->setLanguage('br');
	$mail->isSMTP();

	//Enable SMTP debugging
	// 0 = off (for production use)
	// 1 = client messages
	// 2 = client and server messages
	//$mail->SMTPDebug = 2;

	//Ask for HTML-friendly debug output
	//$mail->Debugoutput = 'html';

	//Set the hostname of the mail server
	$mail->Host = 'mail.saude-consumidores.com.br';

	//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
	$mail->Port = 25;
	//Set the encryption system to use - ssl (deprecated) or tls
	//$mail->SMTPSecure = 'ssl';
	$mail->SMTPAuth = false;
	$mail->Username = "contato@saude-consumidores.com.br";
	$mail->Password = "cntt13579";

	//Content Type
	$mail->ContentType = 'text/html';

	//Set an alternative reply-to address
	$mail->addReplyTo($contato, $Nome);
	$mail->setFrom($cabecalho, $Nome);
	$mail->addAddress($destinatario, $Nome);
	$mail->Subject = $assunto;
	
	//Read an HTML message body from an external file, convert referenced images to embedded,
	//convert HTML into a basic plain-text alternative body
	//$mail->msgHTML(file_get_contents('contents.html'), dirname(userfile));

	$mail->msgHTML($mensagem);


	//Replace the plain text body with one created manually
	//$mail->AltBody = 'This is a plain-text message body';

	//Attach an image file
	//$mail->addAttachment('images/phpmailer_mini.png');

	//send the message, check for errors
	if (!$mail->send()) {
	   echo "<script>alert('erro no script');window.location='{$_POST['site']}';</script>";
		}
		} else {
	    echo "<script>alert('Sua mensagem foi enviada com sucesso!');window.location='{$_POST['site']}';</script>";
		}

?>