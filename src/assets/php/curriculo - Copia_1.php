<?php
$nome = $_POST['nome'];
$sobrenome = $_POST['Sobrenome'];
$telefone = $_POST['Telefone'];
$email = $_POST['E-mail'];
$mens = $_POST['Mensagem'];

$arquivo = $_FILES["userfile"];
// Para quem vai ser enviado o email
$para = "contato@saude-consumidores.com.br";
$boundary = "XYZ-".date("dmYis")."-ZYX";
$fp = fopen($arquivo["tmp_name"], "rb"); // abre o arquivo enviado
$anexo = fread($fp, filesize($arquivo["tmp_name"])); // calcula o tamanho
$anexo = base64_encode($anexo); // codifica o anexo em base 64
fclose($fp); // fecha o arquivo
// cabeçalho do email
$headers  = "MIME-Version: 1.0\n";
$headers .= "Content-Type: multipart/mixed; ";
$headers .= "$boundary\n";
// email
$mensagem  = "--$boundary\n";
$mensagem .= "Content-Type: text/html; charset='utf-8'\n";
$mensagem .= "<strong>Nome: </strong> $nome $sobrenome \r\n";
$mensagem .= "<strong>E-mail: </strong> $email \r\n";
$mensagem .= "<strong>Mensagem: </strong> $mens \r\n";
$mensagem .= "--$boundary \n";
// anexo
$mensagem .= "Content-Type: ".$arquivo["type"]."; name="".$arquivo['name']."" \n";
$mensagem .= "Content-Transfer-Encoding: base64 \n";
$mensagem .= "Content-Disposition: attachment; filename="".$arquivo['name']."" \r\n";
$mensagem .= "$anexo \n";
$mensagem .= "--$boundary \n";
// enviar o email
mail($para, $assunto, $mensagem, $headers);

if (!$mail->send()) {
	   echo "<script>alert('erro no script');window.location='http://saude-consumidores.com.br';</script>";
	} else {
	    echo "<script>alert('Sua mensagem foi enviada com sucesso!');window.location='http://saude-consumidores.com.br';</script>";
	}

?>