<?php
/**
 * PHPMailer simple file upload and send example
 */
$msg = '';
if (array_key_exists('userfile', $_FILES)) {
    // First handle the upload
    // Don't trust provided filename - same goes for MIME types
    // See http://php.net/manual/en/features.file-upload.php#114004 for more thorough upload validation
    $uploadfile = tempnam(sys_get_temp_dir(), sha1($_FILES['userfile']['name']));
    if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
        // Upload handled successfully
        // Now create a message
        // This should be somewhere in your include_path
	

        //Cabeçalho
        $cabecalho = $_POST['E-mail'];
        if(isset($_POST['E-mail']))
            $cabecalho = $_POST['E-mail'];

        //Nome
        $Nome = 'Contato do Site';
        if(isset($_POST['Nome']))
            $Nome = $_POST['Nome'];

        require '../PHPMailerAutoload.php';
        $mail = new PHPMailer;
        $mail->addAddress($contato, $Nome);
	    $mail->setFrom($cabecalho, $Nome);
        $mail->Subject = 'Currículo site', $Nome;
        $mail->Body = 'My message body';
        // Attach the uploaded file
        $mail->addAttachment($uploadfile, 'My uploaded file');
        if (!$mail->send()) {
            $msg .= "Mailer Error: " . $mail->ErrorInfo;
        } else {
            $msg .= "Message sent!";
        }
    } else {
        $msg .= 'Failed to move file to ' . $uploadfile;
    }
}
?>
