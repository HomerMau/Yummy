<?php
require_once 'vendor/autoload.php'; // Certifique-se de incluir a biblioteca Twilio

use Twilio\Rest\Client;

// Sua conta Twilio SID e Token
$accountSid = 'YOUR_TWILIO_ACCOUNT_SID';
$authToken = 'YOUR_TWILIO_AUTH_TOKEN';

// Número de telefone Twilio (remetente)
$twilioNumber = 'YOUR_TWILIO_PHONE_NUMBER';

// Número de telefone de destino (whatsapp)
$whatsappNumber = 'whatsapp:+5511972930448';

// Crie o cliente Twilio
$client = new Client($accountSid, $authToken);

// Receba os dados do formulário
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$date = $_POST['date'];
$time = $_POST['time'];
$people = $_POST['people'];
$message = $_POST['message'];

// Construa a mensagem do WhatsApp
$whatsappMessage = "Nova reserva!\n\n";
$whatsappMessage .= "Nome: $name\n";
$whatsappMessage .= "Email: $email\n";
$whatsappMessage .= "Telefone: $phone\n";
$whatsappMessage .= "Data: $date\n";
$whatsappMessage .= "Horário: $time\n";
$whatsappMessage .= "Número de pessoas: $people\n";
$whatsappMessage .= "Mensagem: $message";

try {
    // Envie a mensagem via WhatsApp
    $client->messages->create($whatsappNumber, array('from' => $twilioNumber, 'body' => $whatsappMessage));

    // Exiba uma mensagem de sucesso
    echo 'Sua solicitação de reserva foi enviada. Nós entraremos em contato para confirmar. Obrigado!';
} catch (Exception $e) {
    // Exiba uma mensagem de erro se houver um problema
    echo 'Erro ao enviar a mensagem: ' . $e->getMessage();
}
?>
