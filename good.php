<?php
$edule = new mysqli("localhost", "root", "", "educ");
session_start();
if (!isset($_SESSION['id'])) {
    header('Location: login.php');
}

if (isset($_POST)) {
	$status = $_POST['transaction-status'];
	$transaction = $_POST['transaction'];
	if ($status == 'approved') {
		$req = "UPDATE `paiement` SET `statut` = 'payer' WHERE `paiement`.`token_t` = '".$transaction."'";
		mysqli_query($edule, $req);
		header("Location: index.php");
		exit();
	}
	else{
		header("Location: index.php");
		exit();
	}
}


 ?>