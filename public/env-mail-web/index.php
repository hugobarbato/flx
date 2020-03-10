<?php
ini_set(default_charset, "utf-8");
if (isset($_POST['BTEnvia'])){
 
        //Variaveis de POST, Alterar somente se necessário 
        //====================================================
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        
	//REMETENTE --> ESTE EMAIL TEM QUE SER VALIDO DO DOMINIO
        //====================================================
        $email_remetente = "flximoveis@flximoveis.com.br"; // deve ser um email do dominio
 
        //Configurações do email, ajustar conforme necessidade
        //====================================================
        $email_destinatario = "$email"; // qualquer email pode receber os dados
        $email_reply = "$email";
        $email_assunto = "Teste função Mail()";
 
        //Monta o Corpo da Mensagem
        //====================================================
		$email_conteudo = "Olá, $nome, se você recebeu esta mensagem, a função mail() sobre o seu domínio funciona sem apresentar dificuldades";
        //====================================================
 
 
        //Seta os Headers (Alerar somente caso necessario)
        //====================================================
        $email_headers = implode ( "\n",array ( "From: $email_remetente", "Reply-To: $email_reply", "Return-Path:  $email_remetente","MIME-Version: 1.0","X-Priority: 3","Content-Type: text/html; charset=UTF-8" ) );
 
        //Enviando o email
        //====================================================
        if (mail ($email_destinatario, $email_assunto, nl2br($email_conteudo), $email_headers)){
		echo "<script language=\"javascript\">alert(\"Mensagem enviada com sucesso!\")</script>";	
	}
        else
	{
		echo "<script language=\"javascript\">alert(\"Falha no envio! :/ \")</script>";   

        }
        //====================================================
}
?>
<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"><link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<br><br>
<center>
<div class="form-group">
<form class="form-horizontal" action="<? $PHP_SELF; ?>" method="POST">
<fieldset style="width: 300px; height: 00px">
	<legend> Testando fun&ccedil;&atilde;o mail() php</legend>
    <p>
       <label for="nome"> Seu nome:</label><br>
        <input type="text" class="form-control" size="30" name="nome" placeholder="Digite seu nome">
    </p>
 
    <p>
       <label for="email">Digite o e-mail para receber o teste:</label><br>
        <input type="email" class="form-control" size="30" name="email" placeholder="Digite seu e-mail" title="Este não é um e-mail válido">
    </p>
 
    <p>
        <button type="submit" class="btn btn-primary" name="BTEnvia">Enviar </button>
        <button type="reset" class="btn btn-danger" name="BTApaga">Apagar</button>
    </p>
</div>
