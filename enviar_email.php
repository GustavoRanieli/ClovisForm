<?php
// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Define o endereço de e-mail do destinatário
    $destinatario = "contato@cvssegurancacontraincendio.com.br";

    // Obtém os dados do formulário
    $remetente = $_POST["email"];
    $telefone = $_POST["telefone"];
    $residencia = $_POST["imovel"];
    $servico = $_POST["service"];

    // Monta o assunto e o corpo do e-mail
    $assunto = "Nova solicitação de $remetente";
    $corpo_email = "E-mail: $remetente, Telefone: $telefone\n\n";
    $corpo_email .= "Foi solicitado um orçamento de $servico, para $residencia";

    // Define o cabeçalho do e-mail com o charset UTF-8
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/plain;charset=UTF-8" . "\r\n";
    $headers .= "From: $remetente" . "\r\n";

    // Envia o e-mail
    if (mail($destinatario, $assunto, $corpo_email, $headers)) {
        header("Location: index.html");
        exit;
    } else {
        echo "Erro ao enviar o e-mail.";
    }
} else {
    // Se o formulário não foi enviado, redireciona para a página do formulário
    header("Location: formulario.html");
}
?>