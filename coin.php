<!DOCTYPE html>
<html>
<head>
	<title>Generatore di monete virtuali</title>
</head>
<body>
	<h1>Generatore di monete virtuali</h1>
	<?php 
		if(isset($_GET['transaction_id'])) {
			$transaction_id = $_GET['transaction_id'];
			echo "<p>Congratulazioni! Hai ricevuto una moneta virtuale con ID transazione: $transaction_id</p>";
		} else {
			echo "<p>Errore: transazione non trovata.</p>";
		}
	?>
</body>
</html>
