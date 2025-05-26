<?php
$para = "info@hefest.com.br";

$nome     = isset($_POST['nome']) ? strip_tags($_POST['nome']) : '';
$email    = isset($_POST['email']) ? filter_var($_POST['email'], FILTER_SANITIZE_EMAIL) : '';
$empresa  = isset($_POST['empresa']) ? strip_tags($_POST['empresa']) : '';
$telefone = isset($_POST['telefone']) ? strip_tags($_POST['telefone']) : '';
$mensagem = isset($_POST['mensagem']) ? strip_tags($_POST['mensagem']) : '';

if (!$nome || !$email || !$mensagem) {
    echo "<script>alert('Preencha todos os campos obrigatórios.'); window.history.back();</script>";
    exit;
}

$assunto = "Mensagem enviada pelo site Hefest";
$corpo  = "Nome: $nome\n";
$corpo .= "E-mail: $email\n";
$corpo .= "Empresa: $empresa\n";
$corpo .= "Telefone: $telefone\n\n";
$corpo .= "Mensagem:\n$mensagem";

$cabecalhos  = "From: Site Hefest <no-reply@hefest.com.br>\r\n";
$cabecalhos .= "Reply-To: $email\r\n";
$cabecalhos .= "Content-Type: text/plain; charset=UTF-8\r\n";

if (mail($para, $assunto, $corpo, $cabecalhos)) {
    echo "<script>alert('Mensagem enviada com sucesso!'); window.location.href='index.html';</script>";
} else {
    echo "<script>alert('Erro ao enviar. Tente novamente.'); window.history.back();</script>";
}
?>