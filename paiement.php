<?php 
session_start();
if (!isset($_SESSION['id'])) {
  header('Location: login.php');
}
$edule = new mysqli("localhost", "root", "", "educ");
if (!isset($_GET['formation'])) {
	header('Location: courses.php');
}else{
	$id_cours = $_GET['formation'];
	/*Récupérer les informations à propos du cours*/
	$requete = "SELECT * FROM cours WHERE id_cours = '".$id_cours."'";
	$query = mysqli_query($edule, $requete);
	$details = mysqli_fetch_assoc($query);
  $popo = $details['prix'];
  $popo = intval($popo);
	$rate = (int) $details['vote'];
  $rate = $rate * 20;
  $rate = strval($rate); 
 	$rate = $rate."%";

  function idTransaction($longueur = 10) {
    $caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $longueurMax = strlen($caracteres);
    $chaineAleatoire = '';
    for ($i = 0; $i < $longueur; $i++) {
      $chaineAleatoire .= $caracteres[rand(0, $longueurMax - 1)];
    }
    return $chaineAleatoire;
  }
  $now = date("D d-m-Y");
  /*Récupérer les informations à propos de l'élève*/
  $id = $_SESSION['id'];
  $classe = "SELECT * FROM student WHERE id = '".$id."'";
  $class_req = mysqli_query($edule, $classe);
  $etudiant = mysqli_fetch_assoc($class_req);
  $token_t = idTransaction();
  $_SESSION['paiement'] = $token_t;
  $a = $_SESSION['paiement'];
  $id_formation = $details['id_cours'];
  $id_student = $id;
  $requete_paiement = "INSERT INTO paiement (token_t, id_formation, id_student, statut, dates) VALUES ('".$_SESSION['paiement']."', '$id_formation', '$id_student', 'en cours', '$now')";
  $execution_paiement = mysqli_query($edule, $requete_paiement);
}



 ?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Confirmation du paiement</title>

	<link href="assets/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
	<div class="container">
		<div class="text-center">
			<br><br>
			<h3>Confirmation de paiement</h3> <br>
  			<img width="330" height="200" src="assets/images/courses/<?php echo $details['img_cours']; ?>" class="rounded" alt="..."> <br> <br>
  			<table class="table">
  				<tbody>
    				<tr>
      					<th scope="row"> <?php echo $_SESSION['paiement']; ?> </th>
    				</tr>
    				<tr>
      					<th scope="row"><?php echo $details['nom_cours']; ?></th>
    				</tr>
    				<tr>
        				<th scope="row"><?php echo $details['nom_auteur']; ?></th>
				    </tr>
    				<tr>
      					<th scope="row"> <?php echo $details['prix']; ?> </th>
    				</tr>
  				</tbody>
			</table>
			<a class="btn btn-primary" href="index.php" role="button">Retour</a> &nbsp; &nbsp; <button class="kkiapay-button btn btn-primary">Payer</button>
		</div>
	</div>
	<script amount="<?php echo $popo; ?>" 
        callback="https://www.stevanmultiservices.com/stevan-educ/payer.php?a=<?php echo $a; ?>&b=<?php echo $id_student; ?>"
        data=""
        url="<url-vers-votre-logo>"
        position="right" 
        theme="#1D81DF"
        key="be56d681cac88a76343e21724c2fbe48f25b1e2c"
        src="https://cdn.kkiapay.me/k.js"></script>
	<script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>