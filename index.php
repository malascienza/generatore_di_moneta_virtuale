<?php if ($_GET['azione']=="moneta"){ ?>

    <h2>Hai Inviato Una Moneta</h2><br>

<?php } ?>

<form action="process.php" method="POST">
    <label for="sender-email">Indirizzo email mittente:</label><br>
    <input type="email" name="sender-email" id="sender-email" required><br><br>
    <label for="recipient-email">Indirizzo email destinatario:</label><br>
    <input type="email" name="recipient-email" id="recipient-email" required><br><br>
    <input type="submit" value="Invia">
</form>
