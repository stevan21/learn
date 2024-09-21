<?php 
$edule = new mysqli("localhost", "root", "", "educ");
session_start();
if (!isset($_SESSION['id'])) {
    header('Location: login.php');
    exit();
}

if (!isset($_GET['formation'])) {
    header("Location: index.php");  
    exit();  
}

$formation = $_GET['formation'];

$id = $_SESSION['id'];
$req = "SELECT * FROM paiement WHERE id_student = '$id' AND statut = 'payer'";
$qer = mysqli_query($edule, $req);
$check_paiement = mysqli_fetch_assoc($qer);
if ($check_paiement != 0) {
    $verification = "ok";
    $check_formation = "SELECT * FROM cours WHERE id_cours = '".$formation."'";
    $req_formation = mysqli_query($edule, $check_formation);
    $infos = mysqli_fetch_assoc($req_formation);
}
else{
    header('Location: index.php');
    exit();
}
/*Recuperation des informations des lessons des modules*/
$req_lesson = "SELECT * FROM detailslesson WHERE id_formation = '".$formation."'";
$lesson = mysqli_query($edule, $req_lesson);

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Formation - stevan-Educ</title>
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
    <!-- <link rel="stylesheet" href="assets/css/style.css"> -->


    <!--====== Use the minified version files listed below for better performance and remove the files listed above ======-->
    <link rel="stylesheet" href="assets/css/vendor/plugins.min.css">
    <link rel="stylesheet" href="assets/css/style.min.css">

</head>

<body>

    <div class="main-wrapper">

        <!-- Login Header Start -->
        <div class="section login-header">
            <!-- Login Header Wrapper Start -->
            <div class="login-header-wrapper navbar navbar-expand">

                <!-- Header Logo Start -->
                <div class="login-header-logo logo-2">
                    <a href="index.php">stevan-Educ</a>
                </div>
                <!-- Header Logo End -->

                <!-- Header Search Start -->
                <div class="login-header-search search-2 dropdown">
                    <button class="search-toggle" data-bs-toggle="dropdown"><i class="flaticon-loupe"></i></button>

                    <div class="search-input dropdown-menu">
                        <form action="#">
                            <input type="text" placeholder="Search here">
                        </form>
                    </div>

                </div>
                <!-- Header Search End -->

                <!-- Header Action Start -->
                <div class="login-header-action action-2 ml-auto">
                    <!-- <div class="dropdown">
                        <button class="action notification" data-bs-toggle="dropdown">
                            <i class="flaticon-notification"></i>
                            <span class="active"></span>
                        </button>
                        <div class="dropdown-menu dropdown-notification">
                            <ul class="notification-items-list">
                                <li class="notification-item">
                                    <span class="notify-icon bg-success text-white"><i class="icofont-ui-user"></i></span>
                                    <div class="dropdown-body">
                                        <a href="#">
                                            <p><strong>Martin</strong> has added a <strong>customer</strong> Successfully
                                            </p>
                                        </a>
                                    </div>
                                    <span class="notify-time">3:20 am</span>
                                </li>
                                <li class="notification-item">
                                    <span class="notify-icon bg-success text-white"><i class="icofont-shopping-cart"></i></span>
                                    <div class="dropdown-body">
                                        <a href="#">
                                            <p><strong>Jennifer</strong> purchased Light Dashboard 2.0.</p>
                                        </a>
                                    </div>
                                    <span class="notify-time">3:20 am</span>
                                </li>
                                <li class="notification-item">
                                    <span class="notify-icon bg-danger text-white"><i class="icofont-book-mark"></i></span>
                                    <div class="dropdown-body">
                                        <a href="#">
                                            <p><strong>Robin</strong> marked a <strong>ticket</strong> as unsolved.
                                            </p>
                                        </a>
                                    </div>
                                    <span class="notify-time">3:20 am</span>
                                </li>
                                <li class="notification-item">
                                    <span class="notify-icon bg-success text-white"><i class="icofont-heart-alt"></i></span>
                                    <div class="dropdown-body">
                                        <a href="#">
                                            <p><strong>David</strong> purchased Light Dashboard 1.0.</p>
                                        </a>
                                    </div>
                                    <span class="notify-time">3:20 am</span>
                                </li>
                                <li class="notification-item">
                                    <span class="notify-icon bg-success text-white"><i class="icofont-image"></i></span>
                                    <div class="dropdown-body">
                                        <a href="#">
                                            <p><strong> James.</strong> has added a<strong>customer</strong> Successfully
                                            </p>
                                        </a>
                                    </div>
                                    <span class="notify-time">3:20 am</span>
                                </li>
                            </ul>
                            <a class="all-notification" href="#">See all notifications <i class="icofont-simple-right"></i></a>
                        </div>
                    </div> -->

                    <a class="action author" href="#">
                        <img src="assets/images/author/author-07.jpg" alt="Author">
                    </a>

                    <div class="dropdown">
                        <button class="action more" data-bs-toggle="dropdown">
                            <span></span>
                            <span></span>
                            <span></span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="" href="#"><i class="icofont-user"></i> Mon profil</a></li>
                            <li><a class="" href="#"><i class="icofont-inbox"></i> Inbox</a></li>
                            <li><a class="" href="logout.php"><i class="icofont-logout"></i> Deconnexion</a></li>
                        </ul>
                    </div>
                </div>
                <!-- Header Action End -->

            </div>
            <!-- Login Header Wrapper End -->
        </div>
        <!-- Login Header End -->

        <!-- Courses Enroll Start -->
        <div class="section">

            <!-- Courses Enroll Wrapper Start -->
            <div class="courses-enroll-wrapper">

                <!-- Courses Video Player Start -->
                <div class="courses-video-player">

                    <!-- Courses Video Container Start -->
                    <div class="vidcontainer">
                        <video id="myvid"></video>

                        <div class="video-play-bar">
                            <div class="topControl">
                                <div class="progress">
                                    <span class="bufferBar"></span>
                                    <span class="timeBar"></span>
                                </div>
                                <div class="time">
                                    <span class="current"></span> /
                                    <span class="duration"></span>
                                </div>
                            </div>

                            <div class="controllers">
                                <div class="controllers-left">
                                    <button class="prevvid disabled" title="Previous video"><i class="icofont-ui-previous"></i></button>
                                    <button class="btnPlay" title="Play/Pause video"></button>
                                    <button class="nextvid" title="Next video"><i class="icofont-ui-next"></i></button>
                                    <button class="sound sound2" title="Mute/Unmute sound"></button>
                                    <div class="volume" title="Set volume">
                                        <span class="volumeBar"></span>
                                    </div>
                                </div>

                                <div class="controllers-right">
                                    <button class="btnspeed" title="Video speed"><i class="fa fa-gear"></i></button>
                                    <ul class="speedcnt">
                                        <li class="spdx50">1.5</li>
                                        <li class="spdx25">1.25</li>
                                        <li class="spdx1 selected">Normal</li>
                                        <li class="spdx050">0.5</li>
                                    </ul>
                                    <button class="btnFS" title="full screen"></button>
                                </div>
                            </div>
                        </div>

                        <div class="bigplay" title="play the video">
                            <img src="assets/images/play.svg">
                        </div>

                        <div class="loading">
                            <div class="spinner-border spinner">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </div>

                    </div>
                    <!-- Courses Video Container End -->

                    <!-- Courses Enroll Content Start -->
                    <div class="courses-enroll-content">

                        <!-- Courses Enroll Title Start -->
                        <div class="courses-enroll-title">
                            <h2 class="title"><?php echo $infos['nom_cours']; ?></h2>
                        </div>
                        <!-- Courses Enroll Title End -->

                        <!-- Courses Enroll Tab Start -->
                        <!-- <div class="courses-enroll-tab">
                            <div class="enroll-tab-menu">
                                <ul class="nav">
                                    <li><button class="active" data-bs-toggle="tab" data-bs-target="#tab1">Overview</button></li>
                                    <li><button data-bs-toggle="tab" data-bs-target="#tab2">Description</button></li>
                                    <li><button data-bs-toggle="tab" data-bs-target="#tab3">Certificates</button></li>
                                    <li><button data-bs-toggle="tab" data-bs-target="#tab4">Instructor</button></li>
                                </ul>
                            </div>
                            <div class="enroll-share">
                                <a href="#"><i class="icofont-share-alt"></i> Share</a>
                            </div>
                        </div> -->
                        <!-- Courses Enroll Tab End -->

                       

                    </div>
                    <!-- Courses Enroll Content End -->
                </div>
                <!-- Courses Video Player End -->

                <!-- Courses Video Playlist Start -->
                <div class="courses-video-playlist">
                    <div class="playlist-title">
                        <h3 class="title">Contenu de la formation</h3>
                        <span>20 heures</span>
                    </div>

                    <!-- Video Playlist Start  -->
                    <div class="video-playlist">
                        <div class="accordion" id="videoPlaylist">
                            <?php 
                                foreach ($lesson as $key) {
                            ?>
                            <!-- Accordion Items Start  -->
                            <div class="accordion-item">
                                <button class="collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $key['idlesson']; ?>">
                                    <p>Lesson-<?php echo $key['numero']; ?>: <?php echo $key['titre']; ?></p>
                                    <span class="total-duration"><?php echo $key['duree']; ?> minutes</span>
                                </button>

                                <div id="collapse<?php echo $key['idlesson']; ?>" class="accordion-collapse collapse" data-bs-parent="#videoPlaylist">
                                    <nav class="vids">
                                        <a class="link active" href="assets/update/<?php echo $key['video']; ?>">
                                            <p><?php echo $key['numero']; ?>. <?php echo $key['titre']; ?></p>
                                            <span class="total-duration"><?php echo $key['duree']; ?> minutes</span>
                                        </a>
                                    </nav>
                                </div>
                            </div>
                            <!-- Accordion Items End  -->
                            <?php } ?>
                                
                             
                            

                            <!-- Accordion Items Start  -->
                           <!--  <div class="accordion-item">
                                <button class="collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo">
                                    <p>Lesson-02: Manipulation de Microsoft Office Excel</p>
                                    <span class="total-duration">21 minutes</span>
                                </button>

                                <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#videoPlaylist">
                                    <nav class="vids">
                                        <a class="link" href="assets/update/theme_2.mp4">
                                            <p>02. Manipulation de Microsoft Office Excel</p>
                                            <span class="total-duration">21 minutes</span>
                                        </a>
                                    </nav>
                                </div>
                            </div> -->
                            <!-- Accordion Items End  -->

                            <!-- Accordion Items Start  -->
                            <!-- <div class="accordion-item">
                                <button class="collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree">
                                    <p>Lesson-03: Premier pas de calcul sous Excel</p>
                                    <span class="total-duration">08 minutes</span>
                                </button>

                                <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#videoPlaylist">
                                    <nav class="vids">
                                        <a class="link" href="assets/update/theme_3.mp4">
                                            <p>03. Premier pas de calcul sous Excel</p>
                                            <span class="total-duration">08 minutes</span>
                                        </a>
                                    </nav>
                                </div>
                            </div> -->
                            <!-- Accordion Items End  -->

                            <!-- Accordion Items Start  -->
                            <!-- <div class="accordion-item">
                                <button class="collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour">
                                    <p>Lesson-04: Deuxième pas de calcul sous Excel</p>
                                    <span class="total-duration">14 minutes</span>
                                </button>

                                <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#videoPlaylist">
                                    <nav class="vids">
                                        <a class="link" href="assets/update/theme_4.mp4">
                                            <p>04. Deuxième pas de calcul sous Excel</p>
                                            <span class="total-duration">08 minutes</span>
                                        </a>
                                    </nav>
                                </div>
                            </div> -->
                            <!-- Accordion Items End  -->

                            <!-- Accordion Items Start  -->
                            <!-- <div class="accordion-item">
                                <button class="collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive">
                                    <p>Lesson-05: Liste déroulante avec Excel</p>
                                    <span class="total-duration">05 minutes</span>
                                </button>

                                <div id="collapseFive" class="accordion-collapse collapse" data-bs-parent="#videoPlaylist">
                                    <nav class="vids">
                                        <a class="link" href="assets/update/theme_5.mp4">
                                            <p>05. Liste déroulante avec Excel</p>
                                            <span class="total-duration">05 minutes</span>
                                        </a>

                                       
                                    </nav>
                                </div>
                            </div> -->
                            <!-- Accordion Items End  -->

                            <!-- Accordion Items Start  -->
                            <!-- <div class="accordion-item">
                                <button class="collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix">
                                    <p>Lesson-06: Tri et filtre</p>
                                    <span class="total-duration">15 minutes</span>
                                </button>

                                <div id="collapseSix" class="accordion-collapse collapse" data-bs-parent="#videoPlaylist">
                                    <nav class="vids">
                                        <a class="link" href="assets/update/theme_6.mp4">
                                            <p>0. Tri et filtre</p>
                                            <span class="total-duration">15 minutes</span>
                                        </a>

                                    </nav>
                                </div>
                            </div> -->
                            <!-- Accordion Items End  -->

                            <!-- Accordion Items Start  -->
                            <!-- <div class="accordion-item">
                                <button class="collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSaven">
                                    <p>Lesson-07: Figer les volets</p>
                                    <span class="total-duration">04 minutes</span>
                                </button>

                                <div id="collapseSaven" class="accordion-collapse collapse" data-bs-parent="#videoPlaylist">
                                    <nav class="vids">
                                        <a class="link" href="assets/update/theme_7.mp4">
                                            <p>07. Figer les volets</p>
                                            <span class="total-duration">08 minutes</span>
                                        </a>
                                    </nav>
                                </div>
                            </div> -->
                            <!-- Accordion Items End  -->

                            <!-- Début mis en ligne des cours  -->
                            <!-- <div class="accordion-item">
                                <button class="collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEight">
                                    <p>Lesson-08: Grouper et dissocier</p>
                                    <span class="total-duration">07 minutes</span>
                                </button>

                                <div id="collapseEight" class="accordion-collapse collapse" data-bs-parent="#videoPlaylist">
                                    <nav class="vids">
                                        <a class="link" href="assets/update/theme_8.mp4">
                                            <p>08. Grouper et dissocier</p>
                                            <span class="total-duration">08 minutes</span>
                                        </a>

                                        
                                    </nav>
                                </div>
                            </div> -->
                            <!-- Fin mise en ligne du cours  -->
                            <!-- Début mis en ligne des cours  -->
                            <!-- <div class="accordion-item">
                                <button class="collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEight">
                                    <p>Lesson-09: Graphiques</p>
                                    <span class="total-duration">07 minutes</span>
                                </button>

                                <div id="collapseEight" class="accordion-collapse collapse" data-bs-parent="#videoPlaylist">
                                    <nav class="vids">
                                        <a class="link" href="assets/update/theme_9.mp4">
                                            <p>09. </p>Graphiques
                                            <span class="total-duration">07 minutes</span>
                                        </a>

                                        
                                    </nav>
                                </div>
                            </div> -->
                            <!-- Fin mise en ligne du cours  -->

                            <!-- Accordion Items Start  -->
                            <!-- <div class="accordion-item">
                                <button class="collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseNine">
                                    <p>Lesson-09: Copywriting For Beginners: How To Write Web Copy That Sells Without Being Cheesy</p>
                                    <span class="total-duration">01 hour 48 minutes</span>
                                </button>

                                <div id="collapseNine" class="accordion-collapse collapse" data-bs-parent="#videoPlaylist">
                                    <nav class="vids">
                                        <a class="link" href="https://player.vimeo.com/external/215175080.hd.mp4?s=5b17787857fd95646e67ad0f666ea69388cb703c&amp;profile_id=119">
                                            <p>65. The Complete Medicine Masterclass</p>
                                            <span class="total-duration">08 minutes</span>
                                        </a>

                                        <a class="link" href="https://player.vimeo.com/external/207590826.hd.mp4?s=6a918d074abf8f3add7858018855524d384f6934&amp;profile_id=119">
                                            <p>66. Standard dummy text ever since the</p>
                                            <span class="total-duration">08 minutes</span>
                                        </a>

                                        <a class="link" href="https://player.vimeo.com/external/207590786.hd.mp4?s=bcd80c5d2f6bf1bbad3b1a670ef93861e72f9683&amp;profile_id=119">
                                            <p>67. Printer took a galley of type and scrambled</p>
                                            <span class="total-duration">08 minutes</span>
                                        </a>

                                        <a class="link" href="https://player.vimeo.com/external/207590615.hd.mp4?s=c4bce1872859889c86b688c26c60ed2b5734de28&amp;profile_id=119">
                                            <p>68. It to make a type specimen book & break</p>
                                            <span class="total-duration">08 minutes</span>
                                        </a>

                                        <a class="link" href="http://download.wavetlan.com/SVV/Media/HTTP/H264/Other_Media/H264_test5_voice_mp4_480x360.mp4">
                                            <p>69. Survived not only five centuries also the leap</p>
                                            <span class="total-duration">08 minutes</span>
                                        </a>

                                        <a class="link" href="http://download.wavetlan.com/SVV/Media/HTTP/H264/Other_Media/H264_test7_voiceclip_mp4_480x360.mp4">
                                            <p>70. Into typesettingremaining essentially</p>
                                            <span class="total-duration">08 minutes</span>
                                        </a>

                                        <a class="link" href="http://download.wavetlan.com/SVV/Media/HTTP/H264/Other_Media/H264_test8_voiceclip_mp4_480x320.mp4">
                                            <p>71. Unchanged. It was popularised in the 1960s</p>
                                            <span class="total-duration">08 minutes</span>
                                        </a>

                                        <a class="link" href="http://download.wavetlan.com/SVV/Media/HTTP/MP4/ConvertedFiles/Media-Convert/Unsupported/dw11222.mp4">
                                            <p>72. The release of Letraset sheets containing</p>
                                            <span class="total-duration">08 minutes</span>
                                        </a>
                                    </nav>
                                </div>
                            </div> -->
                            <!-- Accordion Items End  -->

                            <!-- Accordion Items Start  -->
                            <!-- <div class="accordion-item">
                                <button class="collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTen">
                                    <p>Lesson-10: How to Write a Personal Statement - The Complete Medicine Masterclass</p>
                                    <span class="total-duration">01 hour 48 minutes</span>
                                </button>

                                <div id="collapseTen" class="accordion-collapse collapse" data-bs-parent="#videoPlaylist">
                                    <nav class="vids">
                                        <a class="link" href="https://player.vimeo.com/external/215175080.hd.mp4?s=5b17787857fd95646e67ad0f666ea69388cb703c&amp;profile_id=119">
                                            <p>73. The Complete Medicine Masterclass</p>
                                            <span class="total-duration">08 minutes</span>
                                        </a>

                                        <a class="link" href="https://player.vimeo.com/external/207590826.hd.mp4?s=6a918d074abf8f3add7858018855524d384f6934&amp;profile_id=119">
                                            <p>74. Standard dummy text ever since the</p>
                                            <span class="total-duration">08 minutes</span>
                                        </a>

                                        <a class="link" href="https://player.vimeo.com/external/207590786.hd.mp4?s=bcd80c5d2f6bf1bbad3b1a670ef93861e72f9683&amp;profile_id=119">
                                            <p>75. Printer took a galley of type and scrambled</p>
                                            <span class="total-duration">08 minutes</span>
                                        </a>

                                        <a class="link" href="https://player.vimeo.com/external/207590615.hd.mp4?s=c4bce1872859889c86b688c26c60ed2b5734de28&amp;profile_id=119">
                                            <p>76. It to make a type specimen book & break</p>
                                            <span class="total-duration">08 minutes</span>
                                        </a>

                                        <a class="link" href="http://download.wavetlan.com/SVV/Media/HTTP/H264/Other_Media/H264_test5_voice_mp4_480x360.mp4">
                                            <p>77. Survived not only five centuries also the leap</p>
                                            <span class="total-duration">08 minutes</span>
                                        </a>

                                        <a class="link" href="http://download.wavetlan.com/SVV/Media/HTTP/H264/Other_Media/H264_test7_voiceclip_mp4_480x360.mp4">
                                            <p>78. Into typesettingremaining essentially</p>
                                            <span class="total-duration">08 minutes</span>
                                        </a>

                                        <a class="link" href="http://download.wavetlan.com/SVV/Media/HTTP/H264/Other_Media/H264_test8_voiceclip_mp4_480x320.mp4">
                                            <p>79. Unchanged. It was popularised in the 1960s</p>
                                            <span class="total-duration">08 minutes</span>
                                        </a>

                                        <a class="link" href="http://download.wavetlan.com/SVV/Media/HTTP/MP4/ConvertedFiles/Media-Convert/Unsupported/dw11222.mp4">
                                            <p>80. The release of Letraset sheets containing</p>
                                            <span class="total-duration">08 minutes</span>
                                        </a>
                                    </nav>
                                </div>
                            </div> -->
                            <!-- Accordion Items End  -->

                        </div>
                    </div>
                    <!-- Video Playlist End  -->

                </div>
                <!-- Courses Video Playlist End -->

            </div>
            <!-- Courses Enroll Wrapper End -->

        </div>
        <!-- Courses Enroll End -->

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