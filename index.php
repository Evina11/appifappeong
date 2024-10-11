<?php
session_start();

// Initialiser les publications si la session est vide
if (!isset($_SESSION['publications'])) {
    $_SESSION['publications'] = [];
}

// Gérer la demande de suppression
if (isset($_GET['delete'])) {
    $indexToDelete = (int)$_GET['delete'];
    if (isset($_SESSION['publications'][$indexToDelete])) {
        // Supprimer la publication
        unset($_SESSION['publications'][$indexToDelete]);
        // Réindexer le tableau
        $_SESSION['publications'] = array_values($_SESSION['publications']);
        $successMessage = 'Publication supprimée avec succès.';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>ECLAIRE + PRODUCTION SARL</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Source+Sans+Pro:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: HeroBiz
  * Template URL: https://bootstrapmade.com/herobiz-bootstrap-business-template/
  * Updated: Aug 07 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
  <style>
        /* Style du lien */
        .btn-getstarted {
            text-decoration: none;
            color: white;
            background-color: #007bff;
            padding: 10px 20px;
            border-radius: 4px;
            display: inline-block;
            position: relative; /* Nécessaire pour positionner le popup */
            cursor: pointer;
        }

        .btn-getstarted:hover {
            background-color: #0056b3;
        }

        /* Popup caché par défaut */
        .popup {
            visibility: hidden;
            opacity: 0;
            background-color: #434771;
            color: white;
            text-align: center;
            border-radius: 8px;
            padding: 10px;
            position: absolute;
            top: 120%;
            left: 50%;
            transform: translateX(-50%);
            transition: opacity 0.3s ease, visibility 0.3s ease;
            width: 200px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        /* Affichage du popup au survol du lien */
        .btn-getstarted:hover .popup {
            visibility: visible;
            opacity: 1;
        }
    </style>
</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid position-relative d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center me-auto me-xl-0">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1 class="sitename"><b>APPIFAPE</b></h1>
        <span>.</span>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="#hero" class="active">Accueil<br></a></li>
          <li><a href="#about">A propos de nous</a></li>
          <!-- <li><a href="#portfolio">Portfolio</a></li> -->
          <!-- <li><a href="#team">equipe</a></li> -->
          <!-- <li><a href="blog.html">Blog</a></li> -->
          </li>
          <!-- <li><a href="#contact">Contact</a></li> -->
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      <a class="btn-getstarted" href="connexion.php">
        Admin
        <div class="popup">
            Cliquez ici pour accéder à la page d'administration.
        </div>
    </a>

    </div>
  </header>

  <main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section">

      <div class="container d-flex flex-column justify-content-center align-items-center text-center position-relative" data-aos="zoom-out">
        <img src="assets/img/logoAppiFape.png" style="border-radius: 150%;" class="img-fluid animated" alt="">
        <h1>Bienvenu dans <span>APPIFAPE</span></h1>
        <p>Association de protection et de promotion des intérêts des familles en périls.</p>
        <div class="d-flex">
          <a href="#about" class="btn-get-started scrollto">Visiter notre site</a>
          <a href="https://youtu.be/jYpbTRBj77M?t=20" class="glightbox btn-watch-video d-flex align-items-center"><i class="bi bi-play-circle"></i><span>presentation de l'ONG</span></a>
        </div>
      </div>


    </section><!-- /Featured Services Section -->

    <!-- About Section -->
    <section id="about" class="about section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>A propo de nous</h2>
        <p>L'OSC APPIFAPE est une Organisation dénommée Association de protection et de promotion des intérêts des familles en périls regi du statut consultatif spécial du Conseil Economique et sociale des Nations Unies(ECOSOC) et a pour objectifs:
          l'assistance mutuelle
          le développement socio-économiques et la défense et la préservation des droits fondamentaux de la personne humaines</p>
      </div><!-- End Section Title -->


    </section><!-- /About Section -->

    <!-- Clients Section -->
    <section id="clients" class="clients section">

      <div class="container" data-aos="fade-up">

      </div>

    </section><!-- /Clients Section -->

    <!-- debut de l'affichage du contenu creer par l'admin -->
    <div class="container">

    <!-- Affichage des messages après publication ou suppression -->
    <?php if (isset($successMessage)): ?>
        <div style="color: green;"><?php echo $successMessage; ?></div>
    <?php endif; ?>

    <!-- Affichage des publications -->
    <?php if (!empty($_SESSION['publications'])): ?>
        <?php foreach ($_SESSION['publications'] as $index => $publication): ?>
            <div class="publication">
                <h3><?php echo $publication['title']; ?></h3>
                <p><?php echo $publication['content']; ?></p>
                <img src="<?php echo $publication['image']; ?>" alt="<?php echo $publication['title']; ?>">
                <video controls>
                    <source src="<?php echo $publication['video']; ?>" type="video/mp4">
                    Votre navigateur ne prend pas en charge la vidéo.
                </video>
                <a href="?delete=<?php echo $index; ?>" class="delete-button">Supprimer</a>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>infos recentes</p>
    <?php endif; ?>
</div>

     <!-- fin du contenu creer par l'admin -->

    <!-- Call To Action Section -->
    <section id="call-to-action" class="call-to-action section">

      <div class="container" data-aos="zoom-out">

        <div class="row g-5">

          <div class="col-lg-8 col-md-6 content d-flex flex-column justify-content-center order-last order-md-first">
            <h3>Rémise des dons  <em>aux réfugiés</em> au Cameroun</h3>
            <p>Afin de répondre à des besoins humanitaires urgents, Les réfugiés se retrouvent souvent dans des situations précaires, sans accès à des ressources de base telles que la nourriture, l'eau, le logement, et les soins médicaux. En fournissant des dons, l'ONG a decidé de contribuer et à améliorer leur qualité de vie, soutenir leur dignité humaine, et favoriser leur intégration dans la société d'accueil. Cette action a également permis de sensibiliser le public sur les défis auxquels font face les réfugiés et à mobiliser un soutien plus large pour leurs droits et leur bien-être.</p>

          </div>

          <div class="col-lg-4 col-md-6 order-first order-md-last d-flex align-items-center">
            <div class="img">
              <img src="assets/img/img5.jpg" alt="" class="img-fluid" style="width: 400% ; height:400px;">
            </div>
          </div>

        </div>

      </div>

    </section><!-- /Call To Action Section -->

    <!-- Onfocus Section -->
    <section id="onfocus" class="onfocus section dark-background">

      <div class="container-fluid p-0" data-aos="fade-up">

        <div class="row g-0">
          <div class="col-lg-6 video-play position-relative">
            <a href="https://www.youtube.com/shorts/Pyc5DYuj00w" class="glightbox pulsating-play-btn"></a> 
          </div>
          <div class="col-lg-6">
            <div class="content d-flex flex-column justify-content-center h-100">
              <h3>Rencontre de prise de contact</h3>
              <p class="fst-italic">
                Rencontre de prise de contact avec la Présidente du collectif Nationale des réfugiés urbain du Cameroun  aujourd'hui au Siège de la société civile APPIFAPE régie du statut consultatif spécial des Nations Unies.
              </p>
              <a href="#" class="read-more align-self-start"><span>Plus d'infos</span><i class="bi bi-arrow-right"></i></a>
            </div>
          </div>
        </div>

      </div>

    </section><!-- /Onfocus Section -->

    <!-- Features Section -->
    <section id="features" class="features section">

      <div class="container" data-aos="fade-up">

        <ul class="nav nav-tabs row gy-4 d-flex">

          <li class="nav-item col-6 col-md-4 col-lg-2">
            <<a href="https://www.youtube.com/shorts/Pyc5DYuj00w"  class="nav-link active show" data-bs-toggle="tab" data-bs-target="#features-tab-1">
              <i class="bi bi-binoculars" style="color: #0dcaf0;"></i>
              <h4>Renforcement des capacités locales</h4>
            </a>
          </li><!-- End Tab 1 Nav -->

          <li class="nav-item col-6 col-md-4 col-lg-2">
            <a class="nav-link" data-bs-toggle="tab" data-bs-target="#features-tab-2">
              <i class="bi bi-box-seam" style="color: #6610f2;"></i>
              <h4> Programmes de santé reproductive</h4>
            </a>
          </li><!-- End Tab 2 Nav -->

          <li class="nav-item col-6 col-md-4 col-lg-2">
            <a class="nav-link" data-bs-toggle="tab" data-bs-target="#features-tab-3">
              <i class="bi bi-brightness-high" style="color: #20c997;"></i>
              <h4>Soutien psychologique</h4>
            </a>
          </li><!-- End Tab 3 Nav -->

          <li class="nav-item col-6 col-md-4 col-lg-2">
            <a class="nav-link" data-bs-toggle="tab" data-bs-target="#features-tab-4">
              <i class="bi bi-command" style="color: #df1529;"></i>
              <h4> Éducation et formation</h4>
            </a>
          </li><!-- End Tab 4 Nav -->

        </ul>

        <div class="tab-content">

          <div class="tab-pane fade active show" id="features-tab-1">
            <div class="row gy-4">
              <div class="col-lg-8 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="100">
                <h3>Renforcement des capacités locales</h3>
                <p class="fst-italic">
                 <p> <b>Action :</b> Former des leaders communautaires et des organisations locales.</p>
                  <p><b>Développement :</b> En renforçant les capacités des acteurs locaux, CARE contribue à la durabilité des interventions humanitaires. Ces leaders peuvent ensuite mobiliser leur communauté, gérer des projets et représenter leurs besoins auprès des autorités.</p>
                </p>
                <ul>
                  <li><i class="bi bi-check-circle-fill"></i>Action</li>
                  <li><i class="bi bi-check-circle-fill"></i>Developement</li>
                </ul>
              </div>
              <div class="col-lg-4 order-1 order-lg-2 text-center" data-aos="fade-up" data-aos-delay="200">
                <img src="assets/img/features-1.svg" alt="" class="img-fluid">
              </div>
            </div>
          </div><!-- End Tab Content 1 -->

          <div class="tab-pane fade" id="features-tab-2">
            <div class="row gy-4">
              <div class="col-lg-8 order-2 order-lg-1">
                <h3> Programmes de santé reproductive</h3>
                <p>
                  <p><b>Action :</b> Offrir des services de santé reproductive et des campagnes de sensibilisation.</p>
                </p>
                <p class="fst-italic">
                  <p><b>Développement :</b> La santé reproductive est souvent négligée dans les situations de crise. En fournissant des services et des informations, CARE aide à réduire les taux de mortalité maternelle et à améliorer la santé des femmes et des enfants, tout en autonomisant les femmes dans leurs choix de santé.</p>
                </p>
                <ul>
                  <li><i class="bi bi-check-circle-fill"></i> Action</li>
                  <li><i class="bi bi-check-circle-fill"></i> Developement</li>
                </ul>
              </div>
              <div class="col-lg-4 order-1 order-lg-2 text-center">
                <img src="assets/img/features-2.svg" alt="" class="img-fluid">
              </div>
            </div>
          </div><!-- End Tab Content 2 -->

          <div class="tab-pane fade" id="features-tab-3">
            <div class="row gy-4">
              <div class="col-lg-8 order-2 order-lg-1">
                <h3>Soutien psychologique</h3>
                <p>
                  <p><b>Action :</b> Proposer des services de soutien psychologique aux personnes traumatisées par des conflits ou des catastrophes.</p>
                  <p><b>Développement :</b> Les crises peuvent avoir des effets dévastateurs sur la santé mentale. En offrant un soutien psychologique, CARE aide les individus à surmonter leurs traumatismes, favorisant ainsi leur réintégration dans la société et leur bien-être général.</p>
                </p>
                <ul>
                  <li><i class="bi bi-check-circle-fill"></i>Action</li>
                  <li><i class="bi bi-check-circle-fill"></i>Developement.</li>
              </div>
              <div class="col-lg-4 order-1 order-lg-2 text-center">
                <img src="assets/img/features-3.svg" alt="" class="img-fluid">
              </div>
            </div>
          </div><!-- End Tab Content 3 -->

          <div class="tab-pane fade" id="features-tab-4">
            <div class="row gy-4">
              <div class="col-lg-8 order-2 order-lg-1">
                <h3> Éducation et formation</h3>
                <p>
                  <p><b>Action :</b> Mettre en place des programmes éducatifs et des formations professionnelles.</p>
                  <p><b>Développement :</b> L'éducation est un levier crucial pour le développement. En offrant des formations, CARE aide les individus à acquérir des compétences qui leur permettent de trouver un emploi et de subvenir à leurs besoins, tout en renforçant le tissu social des communautés.</p>
                <ul>
                  <li><i class="bi bi-check-circle-fill"></i> Action </li>
                  <li><i class="bi bi-check-circle-fill"></i> Developement </li> 
                </ul>
              </div>
              <div class="col-lg-4 order-1 order-lg-2 text-center">
                <img src="assets/img/features-4.svg" alt="" class="img-fluid">
              </div>
            </div>
          </div><!-- End Tab Content 4 -->
        </div>

      </div>

    </section><!-- /Features Section -->

    <section id="onfocus" class="onfocus section dark-background">

      <div class="container-fluid p-0" data-aos="fade-up">

        <div class="row g-0">
          <div class="col-lg-6 video-play1 position-relative">
            <a href="https://youtu.be/jYpbTRBj77M" ></a>
          </div>
          <div class="col-lg-6">
            <div class="content d-flex flex-column justify-content-center h-100">
              <h3> ODD6 eau et assainissement</h3>
              <p class="fst-italic">
                ODD6 eau et assainissement qui est un très gros problème en milieu urbain sur tous pour les réfugiés, problématique a prendre en compte pour un environnement propre une eau propre une hygiène propre ( action de recensement des enfants réfugiés urbain)
              </p>
              <a href="https://youtu.be/jYpbTRBj77M" class="read-more align-self-start"><span>Plus d'infos</span><i class="bi bi-arrow-right"></i></a>
            </div>
          </div>
        </div>

      </div>
    </section><!-- /Onfocus Section -->
   
<div>
  <p>

  </p>
</div>


  </section><!-- /Features Section -->

  <section id="onfocus" class="onfocus section dark-background">

    <div class="container-fluid p-0" data-aos="fade-up">

      <div class="row g-0">
        <div class="col-lg-6 video-play2 position-relative">
          <a href="https://www.youtube.com/watch?v=Y7f98aduVJ8" class="glightbox "></a>
        </div>
        <div class="col-lg-6">
          <div class="content d-flex flex-column justify-content-center h-100">
            <h3>Remise des dons</h3>
            <p class="fst-italic">
              Remise des dons au réfugiés le 09/10/2020
            </p>
            <a href="https://youtu.be/jYpbTRBj77M" class="read-more align-self-start"><span>Plus d'infos</span><i class="bi bi-arrow-right"></i></a>
          </div>
        </div>
      </div>

    </div>

    

  </section><!-- /Onfocus Section -->

    <!-- Faq Section -->
    <section id="faq" class="faq section">

      <div class="container-fluid">

        <div class="row gy-4">

          <div class="col-lg-7 d-flex flex-column justify-content-center order-2 order-lg-1">

            <div class="content px-xl-5" data-aos="fade-up" data-aos-delay="100">
              <h3><span>Foire aux</span><strong>Questions</strong></h3>
            </div>

            <div class="faq-container px-xl-5" data-aos="fade-up" data-aos-delay="200">

              <div class="faq-item faq-active">
                <i class="faq-icon bi bi-question-circle"></i>
                <h3>Comment déterminons-nous les besoins des communautés que nous servons ?</h3>
                <div class="faq-content">
                  <p>Nous menons des évaluations de besoins participatives, qui incluent des enquêtes, des entretiens et des groupes de discussion avec les membres de la communauté. Cela nous permet de recueillir des informations qualitatives et quantitatives sur leurs défis, priorités et ressources disponibles. En impliquant directement les bénéficiaires, nous nous assurons que nos interventions sont adaptées et pertinentes.</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

              <div class="faq-item">
                <i class="faq-icon bi bi-question-circle"></i>
                <h3>Comment mesurons-nous l'impact de nos programmes ?</h3>
                <div class="faq-content">
                  <p>Nous utilisons des indicateurs clairs et mesurables pour évaluer l'efficacité de nos programmes. Cela inclut des méthodes qualitatives et quantitatives, comme des enquêtes avant et après l'intervention, des études de cas, et des évaluations de suivi. En analysant ces données, nous pouvons ajuster nos stratégies pour maximiser l'impact et assurer la responsabilité envers nos donateurs et bénéficiaires.</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

              <div class="faq-item">
                <i class="faq-icon bi bi-question-circle"></i>
                <h3>Comment assurons-nous la durabilité de nos projets ?</h3>
                <div class="faq-content">
                  <p>Nous intégrons des stratégies de durabilité dès la phase de conception de nos projets. Cela inclut le renforcement des capacités locales, la formation de leaders communautaires et l'implication des bénéficiaires dans la gestion des projets. De plus, nous collaborons avec des partenaires locaux et des gouvernements pour assurer un soutien continu après la fin de notre intervention, afin que les communautés puissent maintenir les bénéfices à long terme.</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

            </div>

          </div>

          <div class="col-lg-5 order-1 order-lg-2">
            <img src="assets/img/faq.jpg" class="img-fluid" alt="" data-aos="zoom-in" data-aos-delay="100">
          </div>
        </div>

      </div>

    </section><!-- /Faq Section -->

        </div>

      </div>

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Contactez-nous</h2>
        <p>Nous sommes disponible toute les 24 heures pour recevoir vos requettes</p>
      </div><!-- End Section Title -->

      

      <div class="mb-5">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3099.6494149818773!2d11.575612734247796!3d3.8486434493469392!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x108bc5c0c2844c7b%3A0x18ead2eab32e5dde!2sONG-APPIFAPE!5e1!3m2!1sfr!2sus!4v1728556829418!5m2!1sfr!2sus" 
        width="100%" 
        height="450" 
        style="border:0;" 
        allowfullscreen="" 
        loading="lazy" 
        referrerpolicy="no-referrer-when-downgrade">
</iframe>
      </div><!-- End Google Maps -->

      <div class="container" data-aos="fade">

        <div class="row gy-5 gx-lg-5">

          <div class="col-lg-4">

            <div class="info">
              <h3>Entrer en contact</h3>
              <p> </p>

              <div class="info-item d-flex">
                <i class="bi bi-geo-alt flex-shrink-0"></i>
                <div>
                  <h4>Localisation:</h4>
                  <p>Yaounde, Cameroun </p>
                </div>
              </div><!-- End Info Item -->

              <div class="info-item d-flex">
                <i class="bi bi-envelope flex-shrink-0"></i>
                <div>
                  <h4>Email:</h4>
                  <p>appifape@gmail.com</p>
                </div>
              </div><!-- End Info Item -->

              <div class="info-item d-flex">
                <i class="bi bi-phone flex-shrink-0"></i>
                <div>
                  <h4>Call:</h4>
                  <p>+237 6</p>
                </div>
              </div><!-- End Info Item -->

            </div>

          </div>

          <!-- <div class="col-lg-8">
            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required="">
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required="">
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required="">
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="message" placeholder="Message" required=""></textarea>
              </div>
              <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Message envoye!</div>
              </div>
              <div class="text-center"><button type="submit">valider</button></div>
            </form>
          </div>End Contact Form -->

        </div>

      </div>

    </section><!-- /Contact Section -->

  </main>

  <footer id="footer" class="footer dark-background">

    <div class="footer-top">
      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-4 col-md-6 footer-about">
            <a href="index.html" class="logo d-flex align-items-center">
              <span class="sitename">APPIFAPE</span>
            </a>
            <div class="footer-contact pt-3">
              <p>Cameroun, Yaounde</p>
              <p class="mt-3"><strong>Phone:</strong> <span>+237 6</span></p>
              <p><strong>Email:</strong> <span>appifape@gmail.com</span></p>
            </div>
          </div>

          <div class="col-lg-2 col-md-3 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><a href="#">Home</a></li>
              <li><a href="#">About us</a></li>
              <li><a href="#">Services</a></li>
              <li><a href="#">Terms of service</a></li>
              <li><a href="#">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-2 col-md-3 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><a href="#">Web Design</a></li>
              <li><a href="#">Web Development</a></li>
              <li><a href="#">Product Management</a></li>
              <li><a href="#">Marketing</a></li>
              <li><a href="#">Graphic Design</a></li>
            </ul>
          </div>

          <div class="col-lg-2 col-md-3 footer-links">
            <h4>Hic solutasetp</h4>
            <ul>
              <li><a href="#">Molestiae accusamus iure</a></li>
              <li><a href="#">Excepturi dignissimos</a></li>
              <li><a href="#">Suscipit distinctio</a></li>
              <li><a href="#">Dilecta</a></li>
              <li><a href="#">Sit quas consectetur</a></li>
            </ul>
          </div>
          </div>

        </div>
      </div>
    </div>

    <div class="copyright text-center">
      <div class="container d-flex flex-column flex-lg-row justify-content-center justify-content-lg-between align-items-center">

        <div class="d-flex flex-column align-items-center align-items-lg-start">
          <div>
            © Copyright <strong><span>APPIFAPE</span></strong>. tout droit reserve
          <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/herobiz-bootstrap-business-template/ -->
            Designed by <a href="https://www.facebook.com/share/r6KLaVt9pJ79byLG/?mibextid=WC7FNe">APPIFAPE</a>
          </div>
        </div>

        <div class="social-links order-first order-lg-last mb-3 mb-lg-0">
          <a href=""><i class="bi bi-twitter-x"></i></a>
          <a href="https://www.facebook.com/share/r6KLaVt9pJ79byLG/?mibextid=WC7FNe"><i class="bi bi-facebook"></i></a>
          <a href=""><i class="bi bi-instagram"></i></a>
          <a href="appifape@outlook.fr"><i class="bi bi-linkedin"></i></a>
        </div>

      </div>
    </div>

  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>