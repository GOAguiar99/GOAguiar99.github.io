<?php
if (
    empty($_POST['name']) ||
    empty($_POST['email']) ||
    empty($_POST['phone']) ||
    empty($_POST['message']) ||
    !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)
) {
    echo "No arguments Provided!";
    return false;
}

$name = strip_tags(trim($_POST['name']));
$email_address = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
$phone = strip_tags(trim($_POST['phone']));
$message = strip_tags(trim($_POST['message']));

// Email config
$to = 'contato@itechbridge.com.br';
$subject = "Website Contact Form: $name";
$body = "Você recebeu uma nova mensagem do formulário de contato.\n\n".
        "Nome: $name\n".
        "Email: $email_address\n".
        "Telefone: $phone\n".
        "Mensagem:\n$message";

$headers = "From: gabriel@itechbridge.com.br\r\n";
$headers .= "Reply-To: $email_address\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

mail($to, $subject, $body, $headers);
return true;
?>
