<?php 
session_start();

 ?>
<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
  <title>Intégrer Feda Checkout à mon site</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <script src="https://cdn.fedapay.com/checkout.js?v=1.1.7"></script>
</head>
<body>
	<form action="toto.php" method="POST">
 <input type="hidden" name="field" value="test">
 <script
   src="https://cdn.fedapay.com/checkout.js?v=1.1.7"
   data-public-key="pk_sandbox_Qcb66iGTS4FnwwSyY8vd9Ufy"
   data-button-text="Payer 1000"
   data-button-class="button-class"
   data-transaction-amount="1000"
   data-transaction-description="Description de la transaction"
   data-currency-iso="XOF">
 </script>
</form>
</body>
</html>