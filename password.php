<?php
session_start(); 
$edule = new mysqli("localhost", "root", "", "educ");

if (isset($_POST['changez'])) {
	$valide = (boolean) true;
	$pass = $_POST['pass'];
    $repass = $_POST['repass'];
	if (!isset($pass)) {
		$err_pass = "Veuillez remplir ce champs!";
		$valide = false;
	}
    if (!isset($repass)) {
        $err_repass = "Veuillez remplir ce champs!";
        $valide = false;
    }
    if ($repass != $pass) {
        $valide = false;
    }

	if ($valide) {
        $id = $_SESSION['id'];
        $password = "!light".$pass."team!".$pass.'teamlight';
	    $req = "UPDATE `student` SET `password` = '".$password."' WHERE id = '".$id."'";
        $query = mysqli_query($edule, $req);
        session_destroy();
        header("Location: login.php");
        exit();	
	}
}
 ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Mot de passe oublié - stevan-Educ</title>
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

                        <!-- Header Sing In & Up Start -->
                        <div class="header-sign-in-up d-none d-lg-block">
                            <ul>
                                <li><a class="sign-in" href="login.php">Connexion</a></li>
                                <li><a class="sign-up" href="register.php">Inscription</a></li>
                            </ul>
                        </div>
                        <!-- Header Sing In & Up End -->

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

            <!-- Mobile Sing In & Up Start -->
            <div class="mobile-sign-in-up">
                <ul>
                    <li><a class="sign-in" href="login.php">Connexion</a></li>
                    <li><a class="sign-up" href="register.php">Inscription</a></li>
                </ul>
            </div>
            <!-- Mobile Sing In & Up End -->

            <!-- Mobile Menu Start -->
            <div class="mobile-menu-items">
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
                        <li class="active">Connexion</li>
                    </ul>
                    <h2 class="title"><span>Formulaire </span>de connexion</h2>
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

        <!-- Register & Login Start -->
        <div class="section section-padding">
            <div class="container">

                <!-- Register & Login Wrapper Start -->
                <div class="register-login-wrapper">
                    <div class="row align-items-center">
                        <div class="col-lg-6">

                            <!-- Register & Login Images Start -->
                            <div class="register-login-images">
                                <div class="shape-1">
                                    <img src="assets/images/shape/shape-26.png" alt="Shape">
                                </div>


                                <div class="images">
                                    <img src="assets/images/register-login.png" alt="Register Login">
                                </div>
                            </div>
                            <!-- Register & Login Images End -->

                        </div>
                        <div class="col-lg-6">

                            <!-- Register & Login Form Start -->
                            <div class="register-login-form">
                                <h3 class="title">Changez <span> le mot de passe</span></h3>

                                <div class="form-wrapper">
                                    <form action="" method="post">
                                        <!-- Single Form Start -->
                                        <div class="single-form">
                                        	<?php 
                                        		if (isset($err_pass)) {
                                        			echo $err_pass."<br>";
                                        		}
                                        	 ?>
                                            <input type="password" name="pass" placeholder="Entrez le mot de passe">
                                        </div>
                                        <!-- Single Form End -->
                                        <!-- Single Form Start -->
                                        <div class="single-form">
                                            <?php 
                                                if (isset($err_repass)) {
                                                    echo $err_repass."<br>";
                                                }
                                             ?>
                                            <input type="password" name="repass" placeholder="Confirmez le mot de passe">
                                        </div>
                                        <!-- Single Form End -->
                                        <!-- Single Form Start -->
                                        <div class="single-form">
                                            <button name="changez" class="btn btn-primary btn-hover-dark w-100">Changez</button>
                                        </div>
                                        <!-- Single Form End -->
                                    </form>
                                </div>
                            </div>
                            <!-- Register & Login Form End -->

                        </div>
                    </div>
                </div>
                <!-- Register & Login Wrapper End -->

            </div>
        </div>
        <!-- Register & Login End -->

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