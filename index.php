<?php
session_start();

$edule = new mysqli("localhost", "root", "", "educ");
 
 /*Recupération des cours dans la base de donnée*/
$requete = "SELECT * FROM cours ORDER BY 'id' DESC";
$execution_req = mysqli_query($edule, $requete);

 ?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>STEVAN-Educ - Accueil</title>
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
    <!-- <link rel="stylesheet" href="assets/css/style.min.css"> -->

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

                        

                        <!-- Header Top Medal Start -->
                        <div class="header-top-medal">
                            <div class="top-info">
                                <p><img class="flaticon-phone-call" width="25" height="25" src="assets/images/icone/appel.png"> <a href="tel:00237696248113">+237 696248113</a></p>
                                <p><img class="flaticon-email" width="25" height="25" src="assets/images/icone/mail.png"> <a href="mailto:stevanngwa@gmail.com">stevanomarion@gmail.com</a></p>
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
                        <a href="#">Tous les cours</a>
                        <ul class="sub-menu">
                            <li><a href="courses.php">Cours</a></li>
                            <li><a href="mes-cours.php">Mes cours</a></li>
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

        <!-- Slider Start -->
        <div class="section slider-section">

            <!-- Slider Shape Start -->
            <div class="slider-shape">
                <img class="shape-1 animation-round" src="assets/images/shape/shape-8.png" alt="Shape">
            </div>
            <!-- Slider Shape End -->

            <div class="container">

                <!-- Slider Content Start -->
                <div class="slider-content">
                    <h4 class="sub-title">Commencez votre cours préféré</h4>
                    <h2 class="main-title">Apprenez maintenant de n'importe où et construisez votre <span>brillante carrière.</span></h2>
                    <!-- <p>It has survived not only five centuries but also the leap into electronic typesetting.</p> -->
                    <a class="btn btn-primary btn-hover-dark" href="courses.php">Commencer un cours</a>
                </div>
                <!-- Slider Content End -->

            </div>

            <!-- Slider Courses Box Start -->
            <div class="slider-courses-box">

                <img class="shape-1 animation-left" src="assets/images/shape/shape-5.png" alt="Shape">

                <div class="box-content">
                    <div class="box-wrapper">
                    	<img width="14" height="14" class="flaticon-open-book" src="assets/images/icone/book.png">
                        <span class="count">1,575</span>
                        <p>cours</p>
                    </div>
                </div>

                <img class="shape-2" src="assets/images/shape/shape-6.png" alt="Shape">

            </div>
            <!-- Slider Courses Box End -->

            <!-- Slider Rating Box Start -->
            <div class="slider-rating-box">

                <div class="box-rating">
                    <div class="box-wrapper">
                        <span class="count">4.9 <img class="flaticon-star" width="14" height="14" src="assets/images/icone/etoile.png"> </span>
                        <p>Rating (86K)</p>
                    </div>
                </div>

                <img class="shape animation-up" src="assets/images/shape/shape-7.png" alt="Shape">

            </div>
            <!-- Slider Rating Box End -->

            <!-- Slider Images Start -->
            <div class="slider-images">
                <div class="images">
                    <img src="assets/images/slider/slider-1.png" alt="Slider">
                </div>
            </div>
            <!-- Slider Images End -->

            <!-- Slider Video Start -->
            <div class="slider-video">
                <img class="shape-1" src="assets/images/shape/shape-9.png" alt="Shape">

                <div class="video-play">
                    <img src="assets/images/shape/shape-10.png" alt="Shape">
                    <a href="https://www.youtube.com/watch?v=BRvyWfuxGuU" class="play video-popup"><i class="flaticon-play"></i></a>
                </div>
            </div>
            <!-- Slider Video End -->

        </div>
        <!-- Slider End -->

        <!-- All Courses Start -->
        <div class="section section-padding-02">
            <div class="container">

                <!-- All Courses Top Start -->
                <div class="courses-top">

                    <!-- Section Title Start -->
                    <div class="section-title shape-01">
                        <h2 class="main-title">Tous <span>Cours</span> de STEVAN-Educ</h2>
                    </div>
                    <!-- Section Title End -->

                    <!-- Courses Search Start -->
                    <div class="courses-search">
                        <form action="#">
                            <input type="text" placeholder="Rechercher un cours">
                            <button></button>
                        </form>
                    </div>
                    <!-- Courses Search End -->

                </div>
                <!-- All Courses Top End -->

                <!-- All Courses Tabs Menu Start -->
                <!-- <div class="courses-tabs-menu courses-active"> -->
                    <!-- <div class="swiper-container">
                        <ul class="swiper-wrapper nav">
                            <li class="swiper-slide"><button class="active" data-bs-toggle="tab" data-bs-target="#tabs1">UI/UX Design</button></li>
                            <li class="swiper-slide"><button data-bs-toggle="tab" data-bs-target="#tabs2">Development</button></li>
                            <li class="swiper-slide"><button data-bs-toggle="tab" data-bs-target="#tabs3">Data Science</button></li>
                            <li class="swiper-slide"><button data-bs-toggle="tab" data-bs-target="#tabs4">Business</button></li>
                            <li class="swiper-slide"><button data-bs-toggle="tab" data-bs-target="#tabs5">Financial</button></li>
                            <li class="swiper-slide"><button data-bs-toggle="tab" data-bs-target="#tabs6">Marketing</button></li>
                            <li class="swiper-slide"><button data-bs-toggle="tab" data-bs-target="#tabs7">Design</button></li>
                        </ul>
                    </div> -->

                    <!-- Add Pagination -->
                 <!--    <div class="swiper-button-next"><i class="icofont-rounded-right"></i></div>
                    <div class="swiper-button-prev"><i class="icofont-rounded-left"></i></div> -->
                <!-- </div> -->
                <!-- All Courses Tabs Menu End -->

                <!-- All Courses tab content Start -->
                <div class="tab-content courses-tab-content">
                    <div class="tab-pane fade show active" id="tabs1">

                        <!-- All Courses Wrapper Start -->
                        <div class="courses-wrapper">
                            <div class="row">
                                <?php 
                                    foreach ($execution_req as $key) {
                                        $nb = "SELECT COUNT(*) AS etudiant FROM paiement WHERE statut = 'payer' AND id_formation = '".$key['id_cours']."'";
                                        $qer_nb = mysqli_query($edule, $nb);
                                        $qer_nb_s = mysqli_fetch_assoc($qer_nb);

                                        $req2 = "UPDATE `cours` SET `nombre_etudiant` = '".$qer_nb_s['etudiant']."' WHERE id_cours = '".$key['id_cours']."'";
                                        mysqli_query($edule, $req2);
                                ?>
                                <div class="col-lg-4 col-md-6">
                                    <!-- Single Courses Start -->
                                    <div class="single-courses">
                                        <div class="courses-images">
                                            <a href="cours-details.php?id_cours=<?php echo $key['id_cours']; ?>"><img src="assets/images/courses/<?php echo $key['img_cours']; ?>" alt="Courses"></a>
                                        </div>
                                        <div class="courses-content">
                                            <div class="courses-author">
                                                <div class="author">
                                                    <div class="author-thumb">
                                                        <a href="#"><img src="assets/images/author/author-01.jpg" alt="Author"></a>
                                                    </div>
                                                    <div class="author-name">
                                                        <a class="name" href="#"><?php echo $key['nom_auteur']; ?></a>
                                                    </div>
                                                </div>
                                                <div class="tag">
                                                    <a href="#"><?php echo $key['categorie']; ?></a>
                                                </div>
                                            </div>

                                            <h4 class="title"><a href="cours-details.php?id_cours=<?php echo $key['id_cours']; ?>"><?php $key['nom_cours']; ?></a></h4>
                                            <div class="courses-meta">
                                                <span> <i class="icofont-clock-time"></i> <?php echo $key['duree']; ?></span>
                                                <span> <i class="icofont-read-book"></i> <?php echo $qer_nb_s['etudiant'].' étudiants'?> </span>
                                            </div>
                                            <div class="courses-price-review">
                                                <div class="courses-price">
                                                    <span class="sale-parice"><?php echo $key['prix']; ?></span>
                                                    <?php 
                                                        if ($key['ancien_prix'] != '0') {
                                                            echo '<span class="old-parice">'.$key['ancien_prix'].'</span>';
                                                        }
                                                     ?>
                                                    
                                                </div>
                                                <div class="courses-review">
                                                    <span class="rating-count"><?php echo $key['vote']; ?></span>
                                                    <span class="rating-star">
                                                            <span class="rating-bar" style="width: <?php echo $key['vote']; ?>;"></span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Single Courses End -->
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                        <!-- All Courses Wrapper End -->

                    </div>
                </div>
                <!-- All Courses tab content End -->

                <!-- All Courses BUtton Start -->
                <!-- <div class="courses-btn text-center">
                    <a href="courses.php" class="btn btn-secondary btn-hover-primary">Autres courses</a>
                </div> -->
                <!-- All Courses BUtton End -->

            </div>
        </div>
        <!-- All Courses End -->

        <!-- Call to Action Start -->
        <div class="section section-padding-02">
            <div class="container">

                <!-- Call to Action Wrapper Start -->
                <div class="call-to-action-wrapper">

                    <img class="cat-shape-01 animation-round" src="assets/images/shape/shape-12.png" alt="Shape">
                    <img class="cat-shape-02" src="assets/images/shape/shape-13.svg" alt="Shape">
                    <img class="cat-shape-03 animation-round" src="assets/images/shape/shape-12.png" alt="Shape">

                    <div class="row align-items-center">
                        <div class="col-md-6">

                            <!-- Section Title Start -->
                            <div class="section-title shape-02">
                                <h5 class="sub-title">Devenir Instructeur</h5>
                                <h2 class="main-title">Vous pouvez rejoindre stevan-Educ en tant que <span>instructeur?</span></h2>
                            </div>
                            <!-- Section Title End -->

                        </div>
                        <div class="col-md-6">
                            <div class="call-to-action-btn">
                                <a class="btn btn-primary btn-hover-dark" href="contact.php">Informations de dépôt</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Call to Action Wrapper End -->

            </div>
        </div>
        <!-- Call to Action End -->

        <!-- How It Work End -->
        <div class="section section-padding mt-n1">
            <div class="container">

                <!-- Section Title Start -->
                <div class="section-title shape-03 text-center">
                    <h5 class="sub-title">Plus de 1575 cours</h5>
                    <h2 class="main-title">Comment cela <span> fonctionnne?</span></h2>
                </div>
                <!-- Section Title End -->

                <!-- How it Work Wrapper Start -->
                <div class="how-it-work-wrapper">

                    <!-- Single Work Start -->
                    <div class="single-work">
                        <img class="shape-1" src="assets/images/shape/shape-15.png" alt="Shape">

                        <div class="work-icon">
                            <img width="32" height="32" src="assets/images/icone/search.svg">
                        </div>
                        <div class="work-content">
                            <h3 class="title">Trouvez votre cours</h3>
                            <p>Choisissez votre cours parmis notre catalogue</p>
                        </div>
                    </div>
                    <!-- Single Work End -->

                    <!-- Single Work Start -->
                    <div class="work-arrow">
                        <img class="arrow" src="assets/images/shape/shape-17.png" alt="Shape">
                    </div>
                    <!-- Single Work End -->

                    <!-- Single Work Start -->
                    <div class="single-work">
                        <img class="shape-2" src="assets/images/shape/shape-15.png" alt="Shape">

                        <div class="work-icon">
                            <img width="32" height="32" src="assets/images/icone/book-open.svg">
                        </div>
                        <div class="work-content">
                            <h3 class="title">Payez la formation</h3>
                            <p>Payez pour accéder au contenu de votre choix.</p>
                        </div>
                    </div>
                    <!-- Single Work End -->

                    <!-- Single Work Start -->
                    <div class="work-arrow">
                        <img class="arrow" src="assets/images/shape/shape-17.png" alt="Shape">
                    </div>
                    <!-- Single Work End -->

                    <!-- Single Work Start -->
                    <div class="single-work">
                        <img class="shape-3" src="assets/images/shape/shape-16.png" alt="Shape">

                        <div class="work-icon">
                            <img width="32" height="32" src="assets/images/icone/pocket.svg">
                        </div>
                        <div class="work-content">
                            <h3 class="title">Obtenir un certificat</h3>
                            <p>Après avoir suivie votre cours et terminé vos évaluations, demandez un certificat.</p>
                        </div>
                    </div>
                    <!-- Single Work End -->

                </div>

            </div>
        </div>
        <!-- How It Work End -->

        <!-- Download App Start -->
        <div class="section section-padding download-section">

            <div class="app-shape-1"></div>
            <div class="app-shape-2"></div>
            <div class="app-shape-3"></div>
            <div class="app-shape-4"></div>

            <div class="container">

                <!-- Download App Wrapper Start -->
                <div class="download-app-wrapper mt-n6">

                    <!-- Section Title Start -->
                    <div class="section-title section-title-white">
                        <h5 class="sub-title">Prêt à commencer?</h5>
                        <h2 class="main-title">Notre application mobile disponible bientôt pour commencer facilement vos cours.</h2>
                    </div>
                    <!-- Section Title End -->

                    <img class="shape-1 animation-right" src="assets/images/shape/shape-14.png" alt="Shape">

                    <!-- Download App Button End -->
                    <div class="download-app-btn">
                        <ul class="app-btn">
                            <li><a href="#"><img src="assets/images/google-play.png" alt="Google Play"></a></li>
                            <li><a href="#"><img src="assets/images/app-store.png" alt="App Store"></a></li>
                        </ul>
                    </div>
                    <!-- Download App Button End -->

                </div>
                <!-- Download App Wrapper End -->

            </div>
        </div>
        <!-- Download App End -->

        <!-- Testimonial End -->
        
        <!-- Testimonial End -->

        <!-- Brand Logo Start -->
        <div class="section section-padding-02">
            <div class="container">

                <!-- Brand Logo Wrapper Start -->
                <div class="brand-logo-wrapper">

                    <img class="shape-1" src="assets/images/shape/shape-19.png" alt="Shape">

                    <img class="shape-2 animation-round" src="assets/images/shape/shape-20.png" alt="Shape">

                    <!-- Section Title Start -->
                    <div class="section-title shape-03">
                        <h2 class="main-title">Les partenaires de <span> stevan-Educ</span></h2>
                    </div>
                    <!-- Section Title End -->

                    <!-- Brand Logo Start -->
                    <div class="brand-logo brand-active">
                        <div class="swiper-container">
                            <div class="swiper-wrapper">

                                <!-- Single Brand Start -->
                                <div class="single-brand swiper-slide">
                                    <img src="assets/images/brand/brand-01.png" alt="Brand">
                                </div>
                                <!-- Single Brand End -->

                                <!-- Single Brand Start -->
                                <div class="single-brand swiper-slide">
                                    <img src="assets/images/brand/brand-02.png" alt="Brand">
                                </div>
                                <!-- Single Brand End -->

                                <!-- Single Brand Start -->
                                <div class="single-brand swiper-slide">
                                    <img src="assets/images/brand/brand-03.png" alt="Brand">
                                </div>
                                <!-- Single Brand End -->

                                <!-- Single Brand Start -->
                                <div class="single-brand swiper-slide">
                                    <img src="assets/images/brand/brand-04.png" alt="Brand">
                                </div>
                                <!-- Single Brand End -->

                                <!-- Single Brand Start -->
                                <div class="single-brand swiper-slide">
                                    <img src="assets/images/brand/brand-05.png" alt="Brand">
                                </div>
                                <!-- Single Brand End -->

                                <!-- Single Brand Start -->
                                <div class="single-brand swiper-slide">
                                    <img src="assets/images/brand/brand-06.png" alt="Brand">
                                </div>
                                <!-- Single Brand End -->

                            </div>
                        </div>
                    </div>
                    <!-- Brand Logo End -->

                </div>
                <!-- Brand Logo Wrapper End -->

            </div>
        </div>
        <!-- Brand Logo End -->

        <!-- Blog Start -->
        <div class="section section-padding mt-n1">
            <div class="container">

                <!-- Section Title Start -->
                <div class="section-title shape-03 text-center">
                    <h5 class="sub-title">Dernières nouvelles</h5>
                    <h2 class="main-title">Trucs et <span> astuces </span> pédagogiques</h2>
                </div>
                <!-- Section Title End -->

                <!-- Blog Wrapper Start -->
                <div class="blog-wrapper">
                    <div class="row">
                        <div class="col-lg-4 col-md-6">

                            <!-- Single Blog Start -->
                            <div class="single-blog">
                                <div class="blog-image">
                                    <a href="blog-details-left-sidebar.html"><img src="assets/images/blog/blog-01.jpg" alt="Blog"></a>
                                </div>
                                <div class="blog-content">
                                    <div class="blog-author">
                                        <div class="author">
                                            <div class="author-thumb">
                                                <a href="#"><img src="assets/images/author/author-01.jpg" alt="Author"></a>
                                            </div>
                                            <div class="author-name">
                                                <a class="name" href="#">Jason Williams</a>
                                            </div>
                                        </div>
                                        <div class="tag">
                                            <a href="#">Science</a>
                                        </div>
                                    </div>

                                    <h4 class="title"><a href="blog-details-left-sidebar.html">Data Science and Machine Learning with Python - Hands On!</a></h4>

                                    <div class="blog-meta">
                                        <span> <i class="icofont-calendar"></i> 21 March, 2021</span>
                                        <span> <i class="icofont-heart"></i> 2,568+ </span>
                                    </div>

                                    <a href="blog-details-left-sidebar.html" class="btn btn-secondary btn-hover-primary">Lire plus</a>
                                </div>
                            </div>
                            <!-- Single Blog End -->

                        </div>
                        <div class="col-lg-4 col-md-6">

                            <!-- Single Blog Start -->
                            <div class="single-blog">
                                <div class="blog-image">
                                    <a href="blog-details-left-sidebar.html"><img src="assets/images/blog/blog-02.jpg" alt="Blog"></a>
                                </div>
                                <div class="blog-content">
                                    <div class="blog-author">
                                        <div class="author">
                                            <div class="author-thumb">
                                                <a href="#"><img src="assets/images/author/author-02.jpg" alt="Author"></a>
                                            </div>
                                            <div class="author-name">
                                                <a class="name" href="#">Pamela Foster</a>
                                            </div>
                                        </div>
                                        <div class="tag">
                                            <a href="#">UX Design</a>
                                        </div>
                                    </div>

                                    <h4 class="title"><a href="blog-details-left-sidebar.html">Create Amazing Color Schemes for Your UX Design Projects</a></h4>

                                    <div class="blog-meta">
                                        <span> <i class="icofont-calendar"></i> 21 March, 2021</span>
                                        <span> <i class="icofont-heart"></i> 2,568+ </span>
                                    </div>

                                    <a href="blog-details-left-sidebar.html" class="btn btn-secondary btn-hover-primary">Lire plus</a>
                                </div>
                            </div>
                            <!-- Single Blog End -->

                        </div>
                        <div class="col-lg-4 col-md-6">

                            <!-- Single Blog Start -->
                            <div class="single-blog">
                                <div class="blog-image">
                                    <a href="blog-details-left-sidebar.html"><img src="assets/images/blog/blog-03.jpg" alt="Blog"></a>
                                </div>
                                <div class="blog-content">
                                    <div class="blog-author">
                                        <div class="author">
                                            <div class="author-thumb">
                                                <a href="#"><img src="assets/images/author/author-03.jpg" alt="Author"></a>
                                            </div>
                                            <div class="author-name">
                                                <a class="name" href="#">Patricia Collins</a>
                                            </div>
                                        </div>
                                        <div class="tag">
                                            <a href="#">Business</a>
                                        </div>
                                    </div>

                                    <h4 class="title"><a href="blog-details-left-sidebar.html">Culture & Leadership: Strategies for a Successful Business</a></h4>

                                    <div class="blog-meta">
                                        <span> <i class="icofont-calendar"></i> 21 March, 2021</span>
                                        <span> <i class="icofont-heart"></i> 2,568+ </span>
                                    </div>

                                    <a href="blog-details-left-sidebar.html" class="btn btn-secondary btn-hover-primary">Lire plus</a>
                                </div>
                            </div>
                            <!-- Single Blog End -->

                        </div>
                    </div>
                </div>
                <!-- Blog Wrapper End -->

            </div>
        </div>
        <!-- Blog End -->

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