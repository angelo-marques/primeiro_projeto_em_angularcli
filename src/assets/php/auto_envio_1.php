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

	//Destinatario -----------------------------------------------------------------------------------------------------
	$destinatario =   $_POST['email'];
	$contato = $_POST['E-mail'];
    // -----------------------------------------------------------------------------------------------------------------

	//Assunto
	$assunto = "[SITE] Formulario recebido!";
	if(isset($_POST['Assunto']))
		$assunto = "[SITE] ".$_POST['Assunto'];

	//Cabeçalho
	$cabecalho = $_POST['E-mail'];
	if(isset($_POST['E-mail']))
		$cabecalho = $_POST['E-mail'];

	//Nome
	$Nome = 'Contato do Site';
	if(isset($_POST['Nome']))
		$Nome = $_POST['Nome'];


	//SMTP needs accurate times, and the PHP time zone MUST be set
	//This should be done in your php.ini, but this is how to do it if you don't have access to that
	date_default_timezone_set('Etc/UTC');

	require 'PHPMailerAutoload.php';

	//Create a new PHPMailer instance
	$mail = new PHPMailer;
	$mail->setLanguage('br');
	//Tell PHPMailer to use SMTP
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

	//Whether to use SMTP authentication
	$mail->SMTPAuth = false;

	//Username to use for SMTP authentication - use full email address for gmail
	$mail->Username = "contato@saude-consumidores.com.br";

	//Password to use for SMTP authentication
	$mail->Password = "cntt13579";

	//Content Type
	$mail->ContentType = 'text/html';

	//Set an alternative reply-to address
	$mail->addReplyTo($contato, $Nome);
	$mail->setFrom($cabecalho, $Nome);

	$mail->CharSet = 'utf-8';
	//Set who the message is to be sent to
	$mail->addAddress($destinatario, $Nome); //destino sempre

	//Set the subject line
	$mail->Subject = $assunto;

	$uploadfile = tempnam(sys_get_temp_dir(), sha1($_FILES['userfile']['name'][$ct]));
	//Read an HTML message body from an external file, convert referenced images to embedded,
	//convert HTML into a basic plain-text alternative body
	//$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));

	$mail->msgHTML($mensagem);

	//Replace the plain text body with one created manually
	//$mail->AltBody = 'This is a plain-text message body';

	//Attach an image file
	//$mail->addAttachment('images/phpmailer_mini.png');

	//send the message, check for errors
	if (!$mail->send()) {
	   echo "<script>alert('erro no script');window.location='{$_POST['site']}';</script>";
	} else {
	    echo "<script>alert('Sua mensagem foi enviada com sucesso!');window.location='{$_POST['site']}';</script>";
	}
?>
