<!doctype html>
<!--[if IE 7 ]>    <html lang="en-gb" class="isie ie7 oldie no-js"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en-gb" class="isie ie8 oldie no-js"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en-gb" class="isie ie9 no-js"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html lang="en-gb" class="no-js">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!--[if lt IE 9]> 
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <title>siteswebzone.com</title>
    <meta name="description" content="">
    <meta name="author" content="WebThemez">
    <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
    <!--[if lte IE 8]>
        <script type="text/javascript" src="http://explorercanvas.googlecode.com/svn/trunk/excanvas.js"></script>
      <![endif]-->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="css/isotope.css" media="screen" />
    <link rel="stylesheet" href="js/fancybox/jquery.fancybox.css" type="text/css" media="screen" />
    <link href="css/animate.css" rel="stylesheet" media="screen">
    <!-- Owl Carousel Assets -->
    <link href="js/owl-carousel/owl.carousel.css" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css" />
    <!-- Font Awesome -->
    <link href="font/css/font-awesome.min.css" rel="stylesheet">
    <link href="css/styleLogin.css" rel="stylesheet" type="text/css">
    <script src="js/jsLogin.js" async></script>






</head>

<body>
    <header class="header">
        <div class="container">
            <nav class="navbar navbar-inverse" role="navigation">
                <div class="navbar-header">
                    <button type="button" id="nav-toggle" class="navbar-toggle" data-toggle="collapse"
                        data-target="#main-nav"> <span class="sr-only">Toggle navigation</span> <span
                            class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span>
                    </button>
                    <a href="#" class="navbar-brand scroll-top logo  animated bounceInLeft"><b><i><img
                                    src="images/logo.png" /></i></b></a>
                </div>
                <!--/.navbar-header-->
                <div id="main-nav" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav" id="mainNav">
                        <li class="active" id="firstLink"><a href="#home" class="scroll-link">Acceuill</a></li>
                        <li><a href="#Features" class="scroll-link">Caracteristiques</a></li>
                        <li><a href="#aboutUs" class="scroll-link">Description</a></li>
                        <li><a href="#team" class="scroll-link">Gestion</a></li>
                        <li><a href="#contactUs" class="scroll-link">Contactez-nous</a></li>
                        <!-- <li><a href="#home" id="open" class="scroll-link mainlogin">Se Connecter</a></li> -->
                        <li><a href="./back/pages/login.php" class="scroll-link">Se Connecter</a></li>
                    </ul>
                </div>
                <!--/.navbar-collapse-->
            </nav>
            <!--/.navbar-->
        </div>
        <!--/.container-->
    </header>
    <!--/.header-->
    <div id="#top"></div>
    <section id="home">
        <div class="banner-container">
            <div id="carousel" class="carousel slide carousel-fade" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carousel" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel" data-slide-to="1"></li>
                    <li data-target="#carousel" data-slide-to="2"></li>
                </ol>
                <!-- Carousel items -->
                <div class="carousel-inner">
                    <div class="active item"><img src="images/banner-bg.jpg" alt="banner" /></div>
                    <div class="item"><img src="images/banner-bg2.jpg" alt="banner" /></div>
                    <div class="item"><img src="images/banner-bg3.jpg" alt="banner" /></div>
                </div>
                <!-- Carousel nav -->
                <a class="carousel-control left" href="#carousel" data-slide="prev">&lsaquo;</a>
                <a class="carousel-control right" href="#carousel" data-slide="next">&rsaquo;</a>
            </div>

        </div>

        <div class="container hero-text2">
            <div class="col-md-9">
                <h2>Pourquoi ISSAM?</h1>
                    <p></p>
            </div>

        </div>
    </section>
    <section id="Features" class="page-section colord">
        <div class="container">
            <div class="row">
                <!-- item -->
                <div class="col-md-4 text-center">
                    <div class="box-item">
                        <i class="circle"><img src="images/5.png" alt="" /></i>
                        <h3>Cours</h3>
                        <p> Découvrez nos programmes académiques variés offrant une formation de qualité dispensée par
                            des professeurs experts dans leur domaine.</p>
                    </div>
                </div>
                <!-- end: -->

                <!-- item -->
                <div class="col-md-4 text-center">
                    <div class="box-item">
                        <i class="circle"> <img src="images/1.png" alt="" /></i>
                        <h3>Connaissance</h3>
                        <p>Explorez nos centres de recherche de pointe et participez à des projets innovants qui
                            façonnent l'avenir de divers domaines académiques.</p>
                    </div>
                </div>
                <!-- end: -->

                <!-- item -->
                <div class="col-md-4 text-center">
                    <div class="box-item">
                        <i class="circle"> <img src="images/2.png" alt="" /></i>
                        <h3>Événements</h3>
                        <p>Restez informé des événements académiques à venir, des conférences inspirantes avec nos
                            leaders d'opinion.</p>
                    </div>
                </div>
                <!-- end: -->

                <!-- item -->

            </div>
        </div>
        <!--/.container-->

    </section>

    <!-- debut login -->
    <div class="con" id="con">
        <form class="popup">
            <div class="close-btn" id="close">&times;</div>
            <div class="form">
                <h2>Login</h2>
                <div class="form-element">
                    <label for="text">Login</label>
                    <input type="text" id="Login" placeholder="Entrer votre Login">
                </div>

                <div class="form-element">
                    <label for="password">Password</label>
                    <input type="password" id="password" placeholder="Entrer votre mot de passe">
                </div>

                <div class="form-element">
                    <button>Sing in</button>
                </div>
            </div>
        </form>
    </div>


    <!-- <script>
      const mainlogin = document.querySelector(".mainlogin")
      const popup = document.querySelector(".popup")
      mainlogin.addEventListener('click',()=>(
      popup.classList.toggle('mobile-menu')
            ))

  </script> -->
    <!-- fin login -->

    <section id="aboutUs">
        <div class="container">
            <div class="heading text-center">
                <!-- Heading -->
                <h2>Description</h2>

            </div>
            <div class="row feature design">
                <div class="area1 columns left">

                    <p>Découvrez une institution académique de renommée mondiale,
                        offrant une expérience éducative exceptionnelle à travers une gamme diversifiée de programmes
                        d'études de haute qualité. </p>
                    <p>Notre université se distingue par son corps professoral dévoué, ses installations de recherche de
                        pointe et son engagement envers l'excellence académique. </p>

                </div>
                <div class="area2 columns feature-media right"> <img src="images/about-img.jpg" alt="" width="100%">
                </div>
            </div>
            <div class="row dataTxt">
                <div class="col-md-6 col-sm-6">
                    <h3>NOTRE ÉDUCATION</h3>
                    <p>Notre éducation vise à offrir un environnement d'apprentissage enrichissant et stimulant,
                        où chaque élève est encouragé à explorer ses passions, développer ses compétences et
                        atteindre son plein potentiel. Nous mettons l'accent sur l'excellence académique,
                        le développement personnel et la diversité culturelle, afin de préparer nos étudiants à
                        devenir des citoyens du monde responsables et engagés</p>

                    <br>
                </div>

                <div class="col-md-6 col-sm-6">

                    <h3>COURS</h3>
                    <p>Nos cours sont conçus pour offrir une formation complète et de qualité dans
                        divers domaines d'études. Nos enseignants expérimentés et passionnés
                        guident les élèves dans leur apprentissage, en favorisant l'interaction,
                        la créativité et la collaboration. Que ce soit en sciences, en arts,
                        en langues ou en mathématiques, nos cours sont adaptés pour répondre aux
                        besoins individuels de chaque apprenant et les préparer à relever les défis
                        du monde moderne. </p>

                    <!-- Accordion starts -->
                </div>

                <!-- <div class="col-md-4 col-sm-6">
                  
                  <h3>Latest News</h3>
                  <p>Lorem ipsum dolor consectetursit amet, consectetur adipiscing elit consectetur euismod </p>
                                <ul  class="list3">
                    <li>Lorem ipsum dolor consectetursit</li>
                    <li>Has molestie percipit an Falli</li>
                    <li>Falli volumus efficiantur sed id</li>
                    <li>Lorem ipsum dolor consectetu</li> 
                  </ul>
                                
                  Accordion start
                  </div>
                
              </div> -->
            </div>
    </section>

    <section id="team" class="page-section">
        <div class="container">
            <div class="heading text-center">
                <!-- Heading -->
                <h2>Gestion</h2>
                <p>At variations of passages of Lorem Ipsum available, but the majority have suffered alteration..</p>
            </div>
            <!-- Team Member's Details -->
            <div class="team-content">
                <div class="row">
                    <div class="col-md-1 col-sm-6 col-xs-12">

                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <!-- Team Member -->
                        <div class="team-member pDark">
                            <!-- Image Hover Block -->
                            <div class="member-img">
                                <!-- Image  -->
                                <img class="img-responsive" src="images/photo-1.jpg" alt="">
                            </div>
                            <!-- Member Details -->
                            <div class="team-title">
                                <h4>Jean Pierre Amougou Belinga</h4>
                                <!-- Designation -->
                                <span class="pos">DEAN</span>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">

                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <!-- Team Member -->
                        <div class="team-member pDark">
                            <!-- Image Hover Block -->
                            <div class="member-img">
                                <!-- Image  -->
                                <img class="img-responsive" src="images/photo-2.jpg" alt="">
                            </div>
                            <!-- Member Details -->
                            <h4>Ele Piere</h4>
                            <!-- Designation -->
                            <span class="pos">Directeur</span>

                        </div>
                    </div>
                    <!--<div class="col-md-3 col-sm-6 col-xs-12">
                        Team Member 
                    <div class="team-member pDark">
                    <div class="member-img">
                        <img class="img-responsive" src="images/photo-3.jpg" alt="">
                    </div>
                    <h4>Ranith Kays</h4>
                    <span class="pos">HOD</span>

                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="team-member pDark">
                    <div class="member-img">

                        <img class="img-responsive" src="images/photo-4.jpg" alt="">
                    </div>
                    <h4>Joan Ray</h4>
                    <span class="pos">Finance</span>

                </div>-->
                </div>
            </div>
        </div>
        </div>
        <!--/.container-->
    </section>
    <section id="contactUs" class="contact-parlex">
        <div class="parlex-back">
            <div class="container">
                <div class="row">
                    <div class="heading text-center">
                        <!-- Heading -->
                        <h2>Contactez-nous</h2>
                        <p>N'hesiter pas a nous contacter pour des commentaire ou sucjession</p>
                    </div>
                </div>

                <?php require_once("back/pages/db-connect2.php");
                ?>
                <div class="row mrgn30">
                    <form method="post" action="insertComment" id="contactfrm" role="form">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="name">Nom</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="Enter name"
                                    title="Please enter your name (at least 2 characters)">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" id="email"
                                    placeholder="Enter email" title="Please enter a valid email address">
                            </div>
                            <div class="form-group">
                                <label for="comments">Commentaires</label>
                                <textarea name="comment" class="form-control" id="comments" cols="3" rows="5"
                                    placeholder="Enter your message…"
                                    title="Please enter your message (at least 10 characters)"></textarea>
                                <button name="submit" type="submit" class="btn btn-lg btn-primary"
                                    id="submit">Envoyer</button>
                            </div>
                            <div class="result"></div>
                        </div>
                    </form>
                </div>
            </div>
            <!--/.container-->
        </div>
    </section>
    <footer>
        <div class="container">
            <div class="row">
                <center>
                    <div class="col-md-12">
                        <div class="col">
                            <h4>Contactez-nous</h4>
                            <ul>
                                <li> Minkan, entrée Borne 10 ODZA</li>
                                <li>Phone: +237 6 70 22 86 92 / 672 55 69 69 </li>
                                <li>Email: <a href="mailto:info@example.com" title="Email Us">info@example.com</a></li>

                            </ul>
                        </div>
                    </div>
                </center>


            </div>

        </div>

    </footer>
    <!--/.page-section-->
    <section class="copyright">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center"> 2024&nbsp;&copy;&nbsp;MVENGINEERING </div>
            </div>
            <!-- / .row -->
        </div>
    </section>
    <a href="#top" class="topHome"><i class="fa fa-chevron-up fa-2x"></i></a>

    <!--[if lte IE 8]><script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script><![endif]-->
    <script src="js/modernizr-latest.js"></script>
    <script src="js/jquery-1.8.2.min.js" type="text/javascript"></script>
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
    <script src="js/jquery.isotope.min.js" type="text/javascript"></script>
    <script src="js/fancybox/jquery.fancybox.pack.js" type="text/javascript"></script>
    <script src="js/jquery.nav.js" type="text/javascript"></script>
    <script src="js/jquery.fittext.js"></script>
    <script src="js/waypoints.js"></script>
    <script src="js/custom.js" type="text/javascript"></script>
    <script src="js/owl-carousel/owl.carousel.js"></script>
</body>

</html>