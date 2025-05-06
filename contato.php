<?php
// Substitua pelo seu e-mail real
$para = "info@hefest.com.br";

// Coleta os dados
$nome = strip_tags($_POST['nome']);
$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
$mensagem = strip_tags($_POST['mensagem']);

// Assunto e corpo
$assunto = "Mensagem enviada pelo site Hefest";
$corpo = "Nome: $nome\n";
$corpo .= "E-mail: $email\n\n";
$corpo .= "Mensagem:\n$mensagem";

// Cabeçalhos
$cabecalhos = "From: $nome <$email>" . "\r\n" .
              "Reply-To: $email" . "\r\n";

// Envia
if (mail($para, $assunto, $corpo, $cabecalhos)) {
    echo "<script>alert('Mensagem enviada com sucesso!'); window.location.href='index.html';</script>";
} else {
    echo "<script>alert('Erro ao enviar. Tente novamente.'); window.history.back();</script>";
}
?>