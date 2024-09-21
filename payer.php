<?php 
$edule = new mysqli("localhost", "root", "", "educ");
session_start();
if (!isset($_GET['a'])) {
    header('Location: index.php');
}
$a = $_GET['a'];
$b = $_GET['b'];
$search = "UPDATE `paiement` SET `statut` = 'payer' WHERE `paiement`.`token_t` = '".$a."' AND id_student = '".$b."'";
mysqli_query($edule, $search);
/*Recuperer les infos du student*/
$check_student = "SELECT * FROM student WHERE id = '$b'";
$check_query = mysqli_query($edule, $check_student);
$details_etudiant = mysqli_fetch_assoc($check_query);

$confir = "SELECT * FROM paiement WHERE token_t = '$a'";
$req_conf = mysqli_query($edule, $confir);
$info = mysqli_fetch_assoc($req_conf);
$livre = $info['id_formation'];

$requete = "SELECT * FROM cours WHERE id_cours = '".$livre."'";
$query = mysqli_query($edule, $requete);
$details = mysqli_fetch_assoc($query);

/*SEssssssssssssssssssssSSSSSSSSSSSSION*/
$_SESSION['id'] = $details_etudiant['id'];
$_SESSION['nom'] = $details_etudiant['nom'];

 ?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/payer.css">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Facture paiement</title>
</head>
<body>
	<div class="container mt-5 mb-5">
    <div class="row d-flex justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="text-left logo p-2 px-5"> <img src="https://i.imgur.com/2zDU056.png" width="50"> </div>
                <div class="invoice p-5">
                    <h5>Votre commande confirmée !</h5> <span class="font-weight-bold d-block mt-4">Salut, <?php echo $details_etudiant['nom']; ?></span> <span>L'achat de la formation a été fait avec succès, vous pouvez commencer à profiter des cours dès maintenant! <a href="courses.php">Allez sur la formation</a></span>
                    <div class="payment border-top mt-3 mb-3 border-bottom table-responsive">
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="py-2"> <span class="d-block text-muted">Date</span> <span><?php echo $info['dates']; ?></span> </div>
                                    </td>
                                    <td>
                                        <div class="py-2"> <span class="d-block text-muted">Commande No</span> <span><?php echo $token_t; ?></span> </div>
                                    </td>
                                    <td>
                                        <div class="py-2"> <span class="d-block text-muted">Paiement</span> <span><img src="https://img.icons8.com/color/48/000000/mastercard.png" width="20" /></span> </div>
                                    </td>
                                   
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="product border-bottom table-responsive">
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <td width="60%"> <span class="font-weight-bold"></span>
                                        <div class="product-qty"> <span class="d-block">Quantity:1</span> </div>
                                    </td>
                                    <td width="20%">
                                        <div class="text-right"> <span class="font-weight-bold"><?php echo $details['nom_cours']; ?></span> </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="row d-flex justify-content-end">
                        <div class="col-md-5">
                            <table class="table table-borderless">
                                <tbody class="totals">
                                    <tr>
                                        <td>
                                            <div class="text-left"> <span class="text-muted">Subtotal</span> </div>
                                        </td>
                                        <td>
                                            <div class="text-right"> <span><?php echo $details['prix']; ?></span> </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="text-left"> <span class="text-muted">Taxe</span> </div>
                                        </td>
                                        <td>
                                            <div class="text-right"> <span>0 F CFA</span> </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="text-left"> <span class="text-muted">TVA</span> </div>
                                        </td>
                                        <td>
                                            <div class="text-right"> <span>0 F CFA</span> </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="text-left"> <span class="text-muted">Remise</span> </div>
                                        </td>
                                        <td>
                                            <div class="text-right"> <span class="text-success">0 F CFA</span> </div>
                                        </td>
                                    </tr>
                                    <tr class="border-top border-bottom">
                                        <td>
                                            <div class="text-left"> <span class="font-weight-bold">Total</span> </div>
                                        </td>
                                        <td>
                                            <div class="text-right"> <span class="font-weight-bold"><?php echo $details['prix']; ?></span> </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <p class="font-weight-bold mb-0">Merci d'avoir acheté chez nous!</p> <span>stevan-Educ</span>
                </div>
                <div class="d-flex justify-content-between footer p-3"> <span>Besoin d'aide? visitez notre <a href="help.php"> centre d'aide</a></span> <span><?php echo date("D d-m-Y"); ?></span> </div>
            </div>
        </div>
    </div>
</div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</body>
</html>