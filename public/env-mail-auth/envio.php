<?php
echo "<pre>";

$destino = $_POST['email'];

if(empty($destino)){
	echo "Necessário preencher o e-mail de destino!";
	exit();
} else {

require 'phpmailer/PHPMailerAutoload.php';

$mail = new PHPMailer;

$mail->SMTPDebug = 3;                               // Enable verbose debug output


$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host       = 'smtp.flximoveis.com.br';  // Specify main and backup SMTP servers
$mail->SMTPAuth   = true;                               // Enable SMTP authentication
$mail->Username   = 'flximoveis@flximoveis.com.br';
$mail->Password   = 'g2v3e8y3';
$mail->SMTPSecure = 'startls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port       = '587';                                    // TCP port to connect to

$mail->From       = 'flximoveis@flximoveis.com.br';
$mail->FromName   = 'Testando PHPMailer';
$mail->addAddress($destino);
//$mail->addReplyTo('email@email.com.br', 'EmailTeste');
// $mail->addCC('cc@example.com');
// $mail->addBCC('bcc@example.com');

$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Testando o envio do PHPmailer';
$mail->Body    = 'Se você recebeu esta mensagem, o envio via phpmailer esta funcional!';
$mail->AltBody = 'Se você recebeu esta mensagem, o envio via phpmailer esta funcional!';

if(!$mail->send()) {
    echo 'A mensagem não pode ser enviada! =( </br>';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Mensagem enviada com sucesso!';
}

}
