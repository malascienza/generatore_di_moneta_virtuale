<?php

class Blockchain {
  private $transactions = array();

  //Crea una nuova transazione nella blockchain e restituisce l'ID della transazione
  public function createTransaction($sender_email, $recipient_email) {
    $transaction_id = uniqid(); //genera un ID univoco per la transazione
    $transaction = array(
      'sender' => $sender_email,
      'recipient' => $recipient_email,
      'timestamp' => time(),
      'transaction_id' => $transaction_id
    );
    $this->transactions[] = $transaction; //aggiungi la transazione alla blockchain
    return $transaction_id;
  }

  //Restituisce l'elenco di tutte le transazioni nella blockchain
  public function getTransactions() {
    return $this->transactions;
  }
}


class Email {
  //Invia un'email al destinatario con il link per accedere alla moneta virtuale
  public function send($recipient_email, $subject, $message) {
    $headers = "From: example@example.com\r\n";
    $headers .= "Reply-To: example@example.com\r\n";
    $headers .= "Content-type: text/html\r\n";
    mail($recipient_email, $subject, $message, $headers);
  }
}


class User {
  private $email;
  private $coins = 10;

  //Costruttore della classe User
  public function __construct($email) {
    $this->email = $email;
  }

  public function isEmailValid()
{
    // Verifica se l'indirizzo email è valido
    if (filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
        return true;
    } else {
        return false;
    }
}


  //Restituisce l'indirizzo email dell'utente
  public function getEmail() {
    return $this->email;
  }

  //Aggiunge una moneta virtuale al saldo dell'utente
  public function addCoin() {
    $this->coins++;
  }

  //Restituisce il saldo di monete virtuali dell'utente
  public function getCoins() {
    return $this->coins;
  }

  //Verifica se l'utente ha abbastanza monete virtuali per inviare una moneta
  public function hasEnoughCoins() {
    return $this->coins >= 1;
  }
}
