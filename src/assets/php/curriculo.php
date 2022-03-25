	<?php
//adiciona a classe
require_once('class.phpmailer.php');
//Incrementa as variaveis com a variavel $_POST
$nome = $_POST['Nome'];
$sobrenome = $_POST['Sobrenome'];
$email = $_POST['E-mail'];
$telefone = $_POST['Telefone'];
$mensagem = $_POST['Mensagem'];
$arquivo = $_FILES["arquivo"];
$name_file = $_FILES ['arquivo']['name'];
$doc = strpos($name_file, '.doc');
//Aqui uso uma funcao que procura na variavel a string '.pdf', se ele encontrar ele me retorna a posição, senão não retorna nada, e a varivael fica vazia
//Repare que somo o valor da variavel $doc + essa nova busca.
$doc = $doc + strpos($name_file, '.pdf');
//inicializo uma varivel como verdadeira, usaremos abaixo.
$validaForm = true;
//Essa funcao empty verifica se a variavel é vazia, se for retorna true, então se(if) a variavel for vazia executa o bloco abaixo mudando a variavel $validaForm para false
if (empty($doc)) {
    $validaForm = false;
}
$assunto_da_mensagem_original = "$nome $sobrenome - $email - Trabalhe Conosco";
$corpoMSG = "
<html>
<head>
 <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>
 <title></title>
</head>
<body style='font: normal 18px Lato; font-weight: 300;'>
  <table border='0' cellpadding='3' cellspacing='3' style='font: normal 18px Lato; font-weight: 300;'>
    <tr>
      <td colspan='2'><strong>Nome:</strong> $nome</td>
    </tr>    
    <tr>
      <td colspan='2'><strong>E-mail:</strong> $email</td>
    </tr>
    <tr>
      <td colspan='2'><strong>Telefone:</strong> $telefone</td>
    </tr>    
    <tr>
      <td colspan='2'><strong>Mensagem:</strong> $mensagem</td>
    </tr>
  </table>
</body>
</html>";
//Se validaFalse for true, ou seja executa o bloco
if ($validaForm) {
      // instanciando a classe
      $mail   = new PHPMailer();
      // email do remetente
      $mail->SetFrom("$email");
      // email do destinatario
      $address = "contato@angelomarques.info";
      $mail->AddAddress($address, "contato@angelomarques.info");
      // assunto da mensagem
      $mail->Subject = $assunto_da_mensagem_original;
      $email_enviado = $email;
      $assunto_da_mensagem_original = $assunto_da_mensagem_original;
      $telefone = $telefone;
      // corpo da mensagem
      $mail->MsgHTML($corpoMSG);
      $mail->CharSet="UTF-8";
      // anexar arquivo
      $mail->AddAttachment($arquivo['tmp_name'], $arquivo['name']  );
      if(!$mail->Send()) {
				
			} 
	  		 echo "<script>alert('erro no script');window.location='{$_POST['http://saude-consumidores.com.br']}';</script>";
		 		die();
			
	}	
			else {
	    	echo "<script>alert('Sua mensagem foi enviada com sucesso!');window.location='{$_POST['http://saude-consumidores.com.br']}';</script>";
				die();
			}
?>

 