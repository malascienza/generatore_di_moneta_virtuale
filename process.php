
<?php
require_once 'class.php';

//recupera i dati del form
$sender_email = $_POST['sender-email'];
$recipient_email = $_POST['recipient-email'];
$email=$_POST['sender-email'];

//verifica l'indirizzo email del mittente
$user = new User($email);
if(!$user->isEmailValid($sender_email)) {
    die("Indirizzo email mittente non valido.");
}

//verifica l'indirizzo email del destinatario
if(!$user->isEmailValid($recipient_email)) {
    die("Indirizzo email mittente non valido.");
}

//verifica il saldo del mittente
if(!$user->hasEnoughCoins($sender_email)) {
    die("Saldo insufficiente.");
}

//crea una nuova transazione nella blockchain
$blockchain = new Blockchain();
$transaction_id = $blockchain->createTransaction($sender_email, $recipient_email);

//invia l'email al destinatario
$email = new Email();
$email->send($recipient_email, "Hai ricevuto una moneta virtuale!", "Clicca su questo link per accedere alla tua moneta virtuale: https://answer.analyticsweb.it/generatoremonete/coin.php?transaction_id=$transaction_id");

//reindirizza l'utente alla pagina principale
header("Location: index.php?azione=moneta");
exit();

