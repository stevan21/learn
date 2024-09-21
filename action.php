<?php 
if (isset($_POST['nom'])) {
	$name = $_POST['nom'];
	$email = $_POST['mail'];
	$message = $_POST['message'];
	$objet = $_POST['objet'];

	ini_set('display_errors', 1);
	error_reporting( E_ALL);
	$from = $email;
	$to = "stevanmultiservices@gmail.com";
	$objet = $objet;
	$message = $message;
	$headers = "From: ".$email;
	mail($to, $objet, $message, $headers);
	$check = 'true';
  if ($check == 'true') {
    echo "Message envoyé avec succès.";
  }
}else{
  echo "Message non envoyé. Veuillez recommencer!";;
  exit();
}

 ?>