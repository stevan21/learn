<?php 
session_start();
$edule = new mysqli("localhost", "root", "", "educ");

if (!isset($_GET['id_cours'])) {
	header('Location: courses.php');
}else{
	$id_cours = $_GET['id_cours'];
	/*Récupérer les informations à propos du cours*/
	$requete = "SELECT * FROM cours WHERE id_cours = '".$id_cours."'";
	$query = mysqli_query($edule, $requete);
	$details = mysqli_fetch_assoc($query);
	$rate = (int) $details['vote'];
    $rate = $rate * 20;
  	$rate = strval($rate); 
 	$rate = $rate."%";
    $id = $_SESSION['id'];
}
$cours_req = "SELECT * FROM detailscours WHERE id_cours = '".$_GET['id_cours']."'";
$cours_reqs = mysqli_query($edule, $cours_req);
$sup_cours = mysqli_fetch_assoc($cours_reqs);

$verif_paiement = "SELECT * FROM paiement WHERE id_student = '$id' AND id_formation = '$id_cours' AND statut = 'payer'";
$verif_req = mysqli_query($edule, $verif_paiement);
$verification = mysqli_fetch_assoc($verif_req);
if ($verification != 0) {
    $check = 'Bon';
}
else{
    $check = 'Non';
}    
 ?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Cours details - stevan-Educ</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.ico">

    <!-- CSS
	============================================ -->

    <!-- Icon Font CSS -->
    <!-- <link rel="stylesheet" href="assets/css/plugins/icofont.min.css">
    <link rel="stylesheet" href="assets/css/plugins/flaticon.css">
    <link rel="stylesheet" href="assets/css/plugins/font-awesome.min.css"> -->

    <!-- Plugins CSS -->
    <!-- <link rel="stylesheet" href="assets/css/plugins/animate.min.css">
    <link rel="stylesheet" href="assets/css/plugins/swiper-bundle.min.css">
    <link rel="stylesheet" href="assets/css/plugins/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/plugins/nice-select.css">
    <link rel="stylesheet" href="assets/css/plugins/apexcharts.css">
    <link rel="stylesheet" href="assets/css/plugins/jqvmap.min.css"> -->

    <!-- Main Style CSS -->
    <link rel="stylesheet" href="assets/css/style.css">


    <!--====== Use the minified version files listed below for better performance and remove the files listed above ======-->
    <link rel="stylesheet" href="assets/css/vendor/plugins.min.css">
<!--     <link rel="stylesheet" href="assets/css/style.min.css"> -->

</head>

<body>

    <div class="main-wrapper">

        <!-- Header Section Start -->
        <div class="header-section">

            <!-- Header Top Start -->
            <div class="header-top d-none d-lg-block">
                <div class="container">

                    <!-- Header Top Wrapper Start -->
                    <div class="header-top-wrapper">

                        <!-- Header Top Left Start -->
                        <div class="header-top-left">
                            <p>28% de réduction pour tous les cours pour <a href="#">les camerounois.</a></p>
                        </div>
                        <!-- Header Top Left End -->

                        <!-- Header Top Medal Start -->
                        <div class="header-top-medal">
                            <div class="top-info">
                                <p><img class="flaticon-phone-call" width="25" height="25" src="assets/images/icone/appel.png"> <a href="tel:0022965768448">+237 696248113</a></p>
                                <p><img class="flaticon-email" width="25" height="25" src="assets/images/icone/mail.png"> <a href="mailto:stevanmultiservices@gmail.com">stevanmultiservices@gmail.com</a></p>
                            </div>
                        </div>
                        <!-- Header Top Medal End -->

                        <!-- Header Top Right Start -->
                        <div class="header-top-right">
                            <ul class="social">
                                <li><a href="#"><img class="flaticon-facebook" width="25" height="25" src="assets/images/icone/facebook.png"></a></li>
                                <li><a href="#"><img class="flaticon-facebook" width="25" height="25" src="assets/images/icone/twitter.png"></a></li>
                                <li><a href="#"><img class="flaticon-facebook" width="25" height="25" src="assets/images/icone/youtube.png"></a></li>
                                <li><a href="#"><img class="flaticon-facebook" width="25" height="25" src="assets/images/icone/telegram.png"></a></li>
                            </ul>
                        </div>
                        <!-- Header Top Right End -->

                    </div>
                    <!-- Header Top Wrapper End -->

                </div>
            </div>
            <!-- Header Top End -->

            <!-- Header Main Start -->
            <div class="header-main">
                <div class="container">

                    <!-- Header Main Start -->
                    <div class="header-main-wrapper">

                        <!-- Header Logo Start -->
                        <div class="header-logo">
                            <a href="index.php"><img src="assets/images/logo.png" width="200" height="80" alt="Logo"></a>
                        </div>
                        <!-- Header Logo End -->

                        <!-- Header Menu Start -->
                        <div class="header-menu d-none d-lg-block">
                            <ul class="nav-menu">
                                <li><a href="index.php">Accueil</a></li>
                                <li>
                                    <a href="#">Tous les cours</a>
                                    <ul class="sub-menu">
                                        <li><a href="courses.php">Cours</a></li>
                                        <li><a href="mes-cours.php">Mes Cours</a></li>
                                    </ul>
                                </li>
                                <li><a href="about.php">A propos de nous</a></li>
                                <li><a href="contact.php">Contact</a></li>
                            </ul>

                        </div>
                        <!-- Header Menu End -->

                         <?php 
                            if (isset($_SESSION['nom'])) {
                        ?>
                        <!-- Header de la partie membre Start -->
                        <div class="header-sign-in-up d-none d-lg-block">
                            <ul>
                                <li><a class="sign-up" href="logout.php">Déconnexion</a></li>
                            </ul>
                        </div>
                        <!-- Header de la partie membre End -->
                        <?php }else{
                        ?>
                            <!-- Header Sing In & Up Start -->
                        <div class="header-sign-in-up d-none d-lg-block">
                            <ul>
                                <li><a class="sign-in" href="login.php">Connexion</a></li>
                                <li><a class="sign-up" href="register.php">Inscription</a></li>
                            </ul>
                        </div>
                        <!-- Header Sing In & Up End -->
                        <?php }  ?> 

                        <!-- Header Mobile Toggle Start -->
                        <div class="header-toggle d-lg-none">
                            <a class="menu-toggle" href="javascript:void(0)">
                                <span></span>
                                <span></span>
                                <span></span>
                            </a>
                        </div>
                        <!-- Header Mobile Toggle End -->

                    </div>
                    <!-- Header Main End -->

                </div>
            </div>
            <!-- Header Main End -->

        </div>
        <!-- Header Section End -->

        <!-- Mobile Menu Start -->
        <div class="mobile-menu">

            <!-- Menu Close Start -->
            <a class="menu-close" href="javascript:void(0)">
                <i class="icofont-close-line"></i>
            </a>
            <!-- Menu Close End -->

            <!-- Mobile Top Medal Start -->
            <div class="mobile-top">
                <p><img class="flaticon-phone-call" width="25" height="25" src="assets/images/icone/appel.png"> <a href="tel:0022965768448">+237 696248113</a></p>
                <p><img class="flaticon-email" width="25" height="25" src="assets/images/icone/mail.png"> <a href="mailto:stevanmultiservices@gmail.com">stevanmultiservices@gmail.com</a></p>
            </div>
            <!-- Mobile Top Medal End -->

            <?php 
                if (!isset($_SESSION['nom'])) {
            ?>
            <!-- Mobile Sing In & Up Start -->
            <div class="mobile-sign-in-up">
                <ul>
                    <li><a class="sign-in" href="login.php">Connexion</a></li>
                    <li><a class="sign-up" href="register.php">Inscription</a></li>
                </ul>
            </div>
            <!-- Mobile Sing In & Up End -->
            <?php }else{
            ?>
            <!-- Mobile membre Start -->
            <div class="mobile-sign-in-up">
                <ul>
                    <li><a class="sign-up" href="logout.php">Déconnexion</a></li>
                </ul>
            </div>
            <!-- Mobile membre End -->
            <?php } ?>

            <!-- Mobile Menu Start -->
            <div class="mobile-menu-items">
                <ul class="nav-menu">
                    <li><a href="index.php">Accueil</a></li>
                    <li>
                        <a href="#">Tous le cours</a>
                        <ul class="sub-menu">
                            <li><a href="courses.php">Cours</a></li>
                            <li><a href="mes-cous.php">Mes cours</a></li>
                        </ul>
                    </li>
                    <li><a href="about.php">A propos de nous</a></li>
                    <li><a href="contact.php">Contact</a></li>
                </ul>

            </div>
            <!-- Mobile Menu End -->

            <!-- Mobile Menu End -->
            <div class="mobile-social">
                <ul class="social">
                    <li><a href="#"><img class="flaticon-facebook" width="25" height="25" src="assets/images/icone/facebook.png"></a></li>
                    <li><a href="#"><img class="flaticon-facebook" width="25" height="25" src="assets/images/icone/twitter.png"></a></li>
                    <li><a href="#"><img class="flaticon-facebook" width="25" height="25" src="assets/images/icone/youtube.png"></a></li>
                    <li><a href="#"><img class="flaticon-facebook" width="25" height="25" src="assets/images/icone/telegram.png"></a></li>
                </ul>
            </div>
            <!-- Mobile Menu End -->

        </div>
        <!-- Mobile Menu End -->

        <!-- Overlay Start -->
        <div class="overlay"></div>
        <!-- Overlay End -->

        <!-- Page Banner Start -->
        <div class="section page-banner">

            <img class="shape-1 animation-round" src="assets/images/shape/shape-8.png" alt="Shape">

            <img class="shape-2" src="assets/images/shape/shape-23.png" alt="Shape">

            <div class="container">
                <!-- Page Banner Start -->
                <div class="page-banner-content">
                    <ul class="breadcrumb">
                        <li><a href="index.php">Accueil</a></li>
                        <li class="active">Détails du cours</li>
                    </ul>
                    <h2 class="title"><span> Détails</span> du cours</h2>
                </div>
                <!-- Page Banner End -->
            </div>

            <!-- Shape Icon Box Start -->
            <div class="shape-icon-box">

                <img class="icon-shape-1 animation-left" src="assets/images/shape/shape-5.png" alt="Shape">

                <div class="box-content">
                    <div class="box-wrapper">
                        <i class="flaticon-badge"></i>
                    </div>
                </div>

                <img class="icon-shape-2" src="assets/images/shape/shape-6.png" alt="Shape">

            </div>
            <!-- Shape Icon Box End -->

            <img class="shape-3" src="assets/images/shape/shape-24.png" alt="Shape">

            <img class="shape-author" src="assets/images/author/author-11.jpg" alt="Shape">

        </div>
        <!-- Page Banner End -->

        <!-- Courses Start -->
        <div class="section section-padding mt-n10">
            <div class="container">
                <div class="row gx-10">
                    <div class="col-lg-8">

                        <!-- Courses Details Start -->
                        <div class="courses-details">

                            <div class="courses-details-images">
                                <img src="assets/images/courses/<?php echo $details['img_cours']; ?>" alt="Courses Details">
                                <span class="tags"><?php echo $details['categorie']; ?></span>
                            </div>

                            <h2 class="title"><?php echo $details['nom_cours']; ?>.</h2>

                            <div class="courses-details-admin">
                                <div class="admin-author">
                                    <div class="author-thumb">
                                        <img src="assets/images/author/<?php echo $details['img_auteur']; ?>" alt="Author">
                                    </div>
                                    <div class="author-content">
                                        <a class="name" href="#"><?php echo $details['nom_auteur']; ?></a>
                                        <span class="Enroll"><?php echo $details['nombre_etudiant']; ?> Étudiants inscrits</span>
                                    </div>
                                </div>
                                <div class="admin-rating">
                                    <span class="rating-count"><?php $details['vote']; ?></span>
                                    <span class="rating-star">
											<span class="rating-bar" style="width: <?php echo $rate; ?>;"></span>
                                    </span>
                                    <span class="rating-text">(5,764 Votes)</span>
                                </div>
                            </div>

                            <!-- Courses Details Tab Start -->
                            <div class="courses-details-tab">

                                <!-- Details Tab Menu Start -->
                                <div class="details-tab-menu">
                                    <ul class="nav justify-content-center">
                                        <li><button class="active" data-bs-toggle="tab" data-bs-target="#description">Description</button></li>
                                        <li><button data-bs-toggle="tab" data-bs-target="#instructors">Instructeurs</button></li>
                                        <li><button data-bs-toggle="tab" data-bs-target="#reviews">Commentaires</button></li>
                                    </ul>
                                </div>
                                <!-- Details Tab Menu End -->

                                <!-- Details Tab Content Start -->
                                <div class="details-tab-content">
                                    <div class="tab-content">
                                        <div class="tab-pane fade show active" id="description">

                                            <!-- Tab Description Start -->
                                            <div class="tab-description">
                                                <div class="description-wrapper">
                                                    <h3 class="tab-title">Description:</h3>
                                                    <p><?php echo $sup_cours['description']; ?></p>
                                                </div>
                                                <div class="description-wrapper">
                                                    <h3 class="tab-title">Programme d'études:</h3>
                                                    <p><?php echo $sup_cours['programme']; ?>.</p>
                                                </div>
                                                <div class="description-wrapper">
                                                    <h3 class="tab-title">Certification:</h3>
                                                    <p><?php echo $sup_cours['certification']; ?>.</p>
                                                </div>
                                            </div>
                                            <!-- Tab Description End -->

                                        </div>
                                        <div class="tab-pane fade" id="instructors">

                                            <!-- Tab Instructors Start -->
                                            <div class="tab-instructors">
                                                <h3 class="tab-title">Instructeur du cours:</h3>

                                                <div class="row">
                                                    <div class="col-md-3 col-6">
                                                        <!-- Single Team Start -->
                                                        <div class="single-team">
                                                            <div class="team-thumb">
                                                                <img src="assets/images/author/author-01.jpg" alt="Author">
                                                            </div>
                                                            <div class="team-content">
                                                                <div class="rating">
                                                                    <span class="count">4.9</span>
                                                                    <i class="icofont-star"></i>
                                                                    <span class="text">(rating)</span>
                                                                </div>
                                                                <h4 class="name">Margarita James</h4>
                                                                <span class="designation">MSC, Instructor</span>
                                                            </div>
                                                        </div>
                                                        <!-- Single Team End -->
                                                    </div>
                                                    <div class="col-md-3 col-6">
                                                        <!-- Single Team Start -->
                                                        <div class="single-team">
                                                            <div class="team-thumb">
                                                                <img src="assets/images/author/author-02.jpg" alt="Author">
                                                            </div>
                                                            <div class="team-content">
                                                                <div class="rating">
                                                                    <span class="count">4.9</span>
                                                                    <i class="icofont-star"></i>
                                                                    <span class="text">(rating)</span>
                                                                </div>
                                                                <h4 class="name">Mitchell Colon</h4>
                                                                <span class="designation">BBA, Instructor</span>
                                                            </div>
                                                        </div>
                                                        <!-- Single Team End -->
                                                    </div>
                                                    <div class="col-md-3 col-6">
                                                        <!-- Single Team Start -->
                                                        <div class="single-team">
                                                            <div class="team-thumb">
                                                                <img src="assets/images/author/author-03.jpg" alt="Author">
                                                            </div>
                                                            <div class="team-content">
                                                                <div class="rating">
                                                                    <span class="count">4.9</span>
                                                                    <i class="icofont-star"></i>
                                                                    <span class="text">(rating)</span>
                                                                </div>
                                                                <h4 class="name">Sonya Gordon</h4>
                                                                <span class="designation">MBA, Instructor</span>
                                                            </div>
                                                        </div>
                                                        <!-- Single Team End -->
                                                    </div>
                                                    <div class="col-md-3 col-6">
                                                        <!-- Single Team Start -->
                                                        <div class="single-team">
                                                            <div class="team-thumb">
                                                                <img src="assets/images/author/author-04.jpg" alt="Author">
                                                            </div>
                                                            <div class="team-content">
                                                                <div class="rating">
                                                                    <span class="count">4.9</span>
                                                                    <i class="icofont-star"></i>
                                                                    <span class="text">(rating)</span>
                                                                </div>
                                                                <h4 class="name">Archie Neal</h4>
                                                                <span class="designation">BBS, Instructor</span>
                                                            </div>
                                                        </div>
                                                        <!-- Single Team End -->
                                                    </div>
                                                </div>

                                                <div class="row gx-10">
                                                    <div class="col-lg-6">
                                                        <div class="tab-rating-content">
                                                            <h3 class="tab-title">Rating:</h3>
                                                            <p>Lorem Ipsum is simply dummy text of printing and typesetting industry. Lorem Ipsum has been the i dustry's standard dummy text ever since the 1500 unknown printer took a galley of type.</p>
                                                            <p>Lorem Ipsum is simply dummy text of printing and typesetting industry text ever since</p>
                                                            <p>Lorem Ipsum is simply dummy text of printing and dustry's standard dummy text ever since the 1500 unknown printer took a galley of type.</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="tab-rating-box">
                                                            <span class="count">4.8 <i class="icofont-star"></i></span>
                                                            <p>Rating (86K+)</p>

                                                            <div class="rating-box-wrapper">
                                                                <div class="single-rating">
                                                                    <span class="rating-star">
																			<span class="rating-bar" style="width: 100%;"></span>
                                                                    </span>
                                                                    <div class="rating-progress-bar">
                                                                        <div class="rating-line" style="width: 75%;"></div>
                                                                    </div>
                                                                </div>

                                                                <div class="single-rating">
                                                                    <span class="rating-star">
																			<span class="rating-bar" style="width: 80%;"></span>
                                                                    </span>
                                                                    <div class="rating-progress-bar">
                                                                        <div class="rating-line" style="width: 90%;"></div>
                                                                    </div>
                                                                </div>

                                                                <div class="single-rating">
                                                                    <span class="rating-star">
																			<span class="rating-bar" style="width: 60%;"></span>
                                                                    </span>
                                                                    <div class="rating-progress-bar">
                                                                        <div class="rating-line" style="width: 500%;"></div>
                                                                    </div>
                                                                </div>

                                                                <div class="single-rating">
                                                                    <span class="rating-star">
																			<span class="rating-bar" style="width: 40%;"></span>
                                                                    </span>
                                                                    <div class="rating-progress-bar">
                                                                        <div class="rating-line" style="width: 80%;"></div>
                                                                    </div>
                                                                </div>

                                                                <div class="single-rating">
                                                                    <span class="rating-star">
																			<span class="rating-bar" style="width: 20%;"></span>
                                                                    </span>
                                                                    <div class="rating-progress-bar">
                                                                        <div class="rating-line" style="width: 40%;"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Tab Instructors End -->

                                        </div>
                                        <div class="tab-pane fade" id="reviews">

                                            <!-- Tab Reviews Start -->
                                            <div class="tab-reviews">
                                                <h3 class="tab-title">Commentaires des étudiants:</h3>

                                                <div class="reviews-wrapper reviews-active">
                                                    <div class="swiper-container">
                                                        <div class="swiper-wrapper">

                                                            <!-- Single Reviews Start -->
                                                            <div class="single-review swiper-slide">
                                                                <div class="review-author">
                                                                    <div class="author-thumb">
                                                                        <img src="assets/images/author/author-06.jpg" alt="Author">
                                                                        <i class="icofont-quote-left"></i>
                                                                    </div>
                                                                    <div class="author-content">
                                                                        <h4 class="name">Sara Alexander</h4>
                                                                        <span class="designation">Product Designer, USA</span>
                                                                        <span class="rating-star">
																				<span class="rating-bar" style="width: 100%;"></span>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                                <p>Lorem Ipsum has been the industry's standard dummy text since the 1500 when unknown printer took a galley of type and scrambled to make type specimen book has survived not five centuries but also the leap into electronic type and book.</p>
                                                            </div>
                                                            <!-- Single Reviews End -->

                                                            <!-- Single Reviews Start -->
                                                            <div class="single-review swiper-slide">
                                                                <div class="review-author">
                                                                    <div class="author-thumb">
                                                                        <img src="assets/images/author/author-07.jpg" alt="Author">
                                                                        <i class="icofont-quote-left"></i>
                                                                    </div>
                                                                    <div class="author-content">
                                                                        <h4 class="name">Karol Bachman</h4>
                                                                        <span class="designation">Product Designer, USA</span>
                                                                        <span class="rating-star">
																				<span class="rating-bar" style="width: 100%;"></span>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                                <p>Lorem Ipsum has been the industry's standard dummy text since the 1500 when unknown printer took a galley of type and scrambled to make type specimen book has survived not five centuries but also the leap into electronic type and book.</p>
                                                            </div>
                                                            <!-- Single Reviews End -->

                                                            <!-- Single Reviews Start -->
                                                            <div class="single-review swiper-slide">
                                                                <div class="review-author">
                                                                    <div class="author-thumb">
                                                                        <img src="assets/images/author/author-03.jpg" alt="Author">
                                                                        <i class="icofont-quote-left"></i>
                                                                    </div>
                                                                    <div class="author-content">
                                                                        <h4 class="name">Gertude Culbertson</h4>
                                                                        <span class="designation">Product Designer, USA</span>
                                                                        <span class="rating-star">
																				<span class="rating-bar" style="width: 100%;"></span>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                                <p>Lorem Ipsum has been the industry's standard dummy text since the 1500 when unknown printer took a galley of type and scrambled to make type specimen book has survived not five centuries but also the leap into electronic type and book.</p>
                                                            </div>
                                                            <!-- Single Reviews End -->

                                                        </div>
                                                        <!-- Add Pagination -->
                                                        <div class="swiper-pagination"></div>
                                                    </div>
                                                </div>

                                                <div class="reviews-btn">
                                                    <button type="button" class="btn btn-primary btn-hover-dark" data-bs-toggle="modal" data-bs-target="#reviewsModal">Ecrire un Commentaire</button>
                                                </div>

                                                <!-- Reviews Form Modal Start -->
                                                <div class="modal fade" id="reviewsModal">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Ajouter un commentaire</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>

                                                            <!-- Reviews Form Start -->
                                                            <div class="modal-body reviews-form">
                                                                <form action="#">
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <!-- Single Form Start -->
                                                                            <div class="single-form">
                                                                                <input type="text" placeholder="Entrez votre nom">
                                                                            </div>
                                                                            <!-- Single Form End -->
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <!-- Single Form Start -->
                                                                            <div class="single-form">
                                                                                <input type="text" placeholder="Entrez votre email">
                                                                            </div>
                                                                            <!-- Single Form End -->
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <!-- Single Form Start -->
                                                                            <div class="reviews-rating">
                                                                                <label>Vote</label>
                                                                                <ul id="rating" class="rating">
                                                                                    <li class="star" title='Poor' data-value='1'><i class="icofont-star"></i></li>
                                                                                    <li class="star" title='Poor' data-value='2'><i class="icofont-star"></i></li>
                                                                                    <li class="star" title='Poor' data-value='3'><i class="icofont-star"></i></li>
                                                                                    <li class="star" title='Poor' data-value='4'><i class="icofont-star"></i></li>
                                                                                    <li class="star" title='Poor' data-value='5'><i class="icofont-star"></i></li>
                                                                                </ul>
                                                                            </div>
                                                                            <!-- Single Form End -->
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <!-- Single Form Start -->
                                                                            <div class="single-form">
                                                                                <textarea placeholder="Ecrivez votre commentaire ici"></textarea>
                                                                            </div>
                                                                            <!-- Single Form End -->
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <!-- Single Form Start -->
                                                                            <div class="single-form">
                                                                                <button class="btn btn-primary btn-hover-dark">Envoyer votre commentaire</button>
                                                                            </div>
                                                                            <!-- Single Form End -->
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                            <!-- Reviews Form End -->
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Reviews Form Modal End -->

                                            </div>
                                            <!-- Tab Reviews End -->

                                        </div>
                                    </div>
                                </div>
                                <!-- Details Tab Content End -->

                            </div>
                            <!-- Courses Details Tab End -->

                        </div>
                        <!-- Courses Details End -->

                    </div>
                    <div class="col-lg-4">
                        <!-- Courses Details Sidebar Start -->
                        <div class="sidebar">

                            <!-- Sidebar Widget Information Start -->
                            <div class="sidebar-widget widget-information">
                                <div class="info-price">
                                    <span class="price"><?php echo $details['prix'] ?></span>
                                </div>
                                <div class="info-list">
                                    <ul>
                                        <li><i class="icofont-man-in-glasses"></i> <strong>Instructeur</strong> <span><?php echo $details['nom_auteur']; ?></span></li>
                                        <li><i class="icofont-clock-time"></i> <strong>Durée</strong> <span><?php echo $details['duree']; ?></span></li>
                                        <li><i class="icofont-ui-video-play"></i> <strong>Etudiants</strong> <span><?php echo $details['nombre_etudiant']; ?></span></li>
                                        <li><i class="icofont-bars"></i> <strong>Niveau</strong> <span>Secondary</span></li>
                                        <li><i class="icofont-book-alt"></i> <strong>Langue</strong> <span>Français</span></li>
                                        <li><i class="icofont-certificate-alt-1"></i> <strong>Certificat</strong> <span>Oui</span></li>
                                    </ul>
                                </div>
                                <div class="info-btn">
                                    <?php 
                                        if ($check == 'Non') {
                                    ?>
                                    <a href="payment.php?formation=<?php echo $details['id_cours']; ?>" class="btn btn-primary btn-hover-dark">Payer</a>
                                    <?php }else{
                                    ?>
                                    <a href="learn.php?formation=<?php echo $details['id_cours']; ?>" class="btn btn-primary btn-hover-dark">Suivre le cours</a> <br><br>
                                    <a href="quiz/index.php" class="btn btn-primary btn-hover-dark">Passer l'examen</a>
                                    <?php } ?>    
                                         
                                     
                                    
                                </div>
                            </div>
                            <!-- Sidebar Widget Information End -->

                        </div>
                        <!-- Courses Details Sidebar End -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Courses End -->

        <!-- Download App Start -->
        <div class="section section-padding download-section">

            <div class="app-shape-1"></div>
            <div class="app-shape-2"></div>
            <div class="app-shape-3"></div>
            <div class="app-shape-4"></div>

            <div class="container">

                <!-- Download App Wrapper Start -->
                <div class="download-app-wrapper mt-n6">

                   

                    <img class="shape-1 animation-right" src="assets/images/shape/shape-14.png" alt="Shape">

                   <!-- Section Title Start -->
                    <div class="section-title section-title-white">
                        <h5 class="sub-title">Prêt à commencer?</h5>
                        <h2 class="main-title">Notre application mobile disponible bientôt pour commencer facilement vos cours.</h2>
                    </div>
                    <!-- Section Title End -->

                </div>
                <!-- Download App Wrapper End -->

            </div>
        </div>
        <!-- Download App End -->

         <!-- Footer Start  -->
        <div class="section footer-section">

            <!-- Footer Widget Section Start -->
            <div class="footer-widget-section">

                <img class="shape-1 animation-down" src="assets/images/shape/shape-21.png" alt="Shape">

                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 order-md-1 order-lg-1">

                            <!-- Footer Widget Start -->
                            <div class="footer-widget">
                                <div class="widget-logo">
                                    <a href="#"><img src="assets/images/logo.png" alt="Logo"></a>
                                </div>

                                <div class="widget-address">
                                    <h4 class="footer-widget-title">Tankpè</h4>
                                    <p>Abomey-Calavi, cameroun.</p>
                                </div>

                                <ul class="widget-info">
                                    <li>
                                        <p> <img class="flaticon-email" width="25" height="25" src="assets/images/icone/mail.png"> <a href="stevanmutliservices@gmail.com">stevanmultiservices@gmail.com</a> </p>
                                    </li>
                                    <li>
                                        <p> <img class="flaticon-phone-call" width="25" height="25" src="assets/images/icone/appel.png"> <a href="tel:0022965768448">+237 696248113</a> </p>
                                    </li>
                                </ul>

                                <ul class="widget-social">
                                    <li><a href="#"><img class="flaticon-facebook" width="25" height="25" src="assets/images/icone/facebook.png"></a></li>
                                    <li><a href="#"><img class="flaticon-facebook" width="25" height="25" src="assets/images/icone/twitter.png"></a></li>
                                    <li><a href="#"><img class="flaticon-facebook" width="25" height="25" src="assets/images/icone/youtube.png"></a></li>
                                    <li><a href="#"><img class="flaticon-facebook" width="25" height="25" src="assets/images/icone/telegram.png"></a></li>
                                </ul>
                            </div>
                            <!-- Footer Widget End -->

                        </div>
                        <div class="col-lg-6 order-md-3 order-lg-2">

                            <!-- Footer Widget Link Start -->
                            <div class="footer-widget-link">

                                <!-- Footer Widget Start -->
                                <div class="footer-widget">
                                    <h4 class="footer-widget-title">Catégorie</h4>

                                    <ul class="widget-link">
                                        <li><a href="#">Comptabilité</a></li>
                                        <li><a href="#">Dévéloppement web</a></li>
                                        <li><a href="#">Graphic Design</a></li>
                                        <li><a href="#">UI/UX Design</a></li>
                                        <li><a href="#">Business Analytics</a></li>
                                        <li><a href="#">Marketing</a></li>
                                    </ul>

                                </div>
                                <!-- Footer Widget End -->

                                <!-- Footer Widget Start -->
                                <div class="footer-widget">
                                    <h4 class="footer-widget-title">Liens rapides</h4>

                                    <ul class="widget-link">
                                        <li><a href="#">Politique de confidentialité</a></li>
                                        <li><a href="#">Discussion</a></li>
                                        <li><a href="#">Termes et conditions</a></li>
                                        <li><a href="#">Service client</a></li>
                                        <li><a href="faq.php">FAQ</a></li>
                                    </ul>

                                </div>
                                <!-- Footer Widget End -->

                            </div>
                            <!-- Footer Widget Link End -->

                        </div>
                        <div class="col-lg-3 col-md-6 order-md-2 order-lg-3">

                            <!-- Footer Widget Start -->
                            <div class="footer-widget">
                                <h4 class="footer-widget-title">S'abonner</h4>

                                <div class="widget-subscribe">
                                    <p>Rejoignez-nous et soignez informer de nos offres et promotions.</p>

                                    <div class="widget-form">
                                        <form action="#">
                                            <input type="text" placeholder="Entrez votre email">
                                            <button class="btn btn-primary btn-hover-dark">Abonnez-vous</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- Footer Widget End -->

                        </div>
                    </div>
                </div>

                <img class="shape-2 animation-left" src="assets/images/shape/shape-22.png" alt="Shape">

            </div>
            <!-- Footer Widget Section End -->

            <!-- Footer Copyright Start -->
            <div class="footer-copyright">
                <div class="container">

                    <!-- Footer Copyright Start -->
                    <div class="copyright-wrapper">
                        <div class="copyright-link">
                            <a href="#">Conditions d'utilisation</a>
                            <a href="#">Politique de confidentialité</a>
                        </div>
                        <div class="copyright-text">
                            <p>&copy; 2021 <span> stevan-Educ </span> Made with <i class="icofont-heart-alt"></i> by <a href="#">Vulcain-Tech</a></p>
                        </div>
                    </div>
                    <!-- Footer Copyright End -->

                </div>
            </div>
            <!-- Footer Copyright End -->

        </div>
        <!-- Footer End -->

        <!--Back To Start-->
        <a href="#" class="back-to-top">
            <i class="icofont-simple-up"></i>
        </a>
        <!--Back To End-->

    </div>






    <!-- JS
    ============================================ -->

    <!-- Modernizer & jQuery JS -->
    <script src="assets/js/vendor/modernizr-3.11.2.min.js"></script>
    <script src="assets/js/vendor/jquery-3.5.1.min.js"></script>

    <!-- Bootstrap JS -->
    <!-- <script src="assets/js/plugins/popper.min.js"></script>
    <script src="assets/js/plugins/bootstrap.min.js"></script> -->

    <!-- Plugins JS -->
    <!-- <script src="assets/js/plugins/swiper-bundle.min.js"></script>
    <script src="assets/js/plugins/jquery.magnific-popup.min.js"></script>
    <script src="assets/js/plugins/video-playlist.js"></script>
    <script src="assets/js/plugins/jquery.nice-select.min.js"></script>
    <script src="assets/js/plugins/ajax-contact.js"></script> -->

    <!--====== Use the minified version files listed below for better performance and remove the files listed above ======-->
    <script src="assets/js/plugins.min.js"></script>


    <!-- Main JS -->
    <script src="assets/js/main.js"></script>

</body>

</html>