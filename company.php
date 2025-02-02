<?php
session_start();
$username = isset($_SESSION['user']) ? $_SESSION['user'] : null;

if (!$username) {
    // If the user is not logged in, redirect to the login page
    header("Location: sign-in.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rent a Car KOHA</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,800" rel="stylesheet" />
    <link href="css/all.css" rel="stylesheet" />
    <link href="slick/slick.css" rel="stylesheet" />
    <link href="slick/slick-theme.css" rel="stylesheet" />
    <link href="css/bootstrap.css" rel="stylesheet" />
    <link href="css/Style.css" rel="stylesheet" />
</head>
<body>
    <div class="container-fluid">
        <!-- Header Section -->
        <div class="tm-site-header">
            <div class="row">
                <div class="col-12 tm-site-header-col">
                    <div class="tm-site-header-left">
                        <i class="far fa-2x fa-eye tm-site-icon"></i>
                        <h1 class="tm-site-name">Rent a Car KOHA</h1>
                        <!-- Welcome Message & Logout Button -->
                        <?php if ($username): ?>
                            <span class="navbar-text mr-3">Welcome, <strong><?php echo htmlspecialchars($username); ?></strong>!</span>
                            <a href="log-out.php" class="btn btn-danger">Logout</a>
                        <?php endif; ?>
                    </div>
                    <div class="tm-site-header-right tm-menu-container-outer">
                        <nav class="navbar navbar-expand-lg">
                            <button class="navbar-toggler toggler-example" type="button" data-toggle="collapse" data-target="#navbarSupportedContent1"
                            aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="dark-blue-text"><i class="fas fa-bars fa-1x"></i></span>
                            </button>
                            <div class="collapse navbar-collapse tm-nav" id="navbarSupportedContent1">
                                <ul class="navbar-nav mr-auto">
                                    <li class="nav-item">
                                        <a class="nav-link tm-nav-link" href="index.php">Home</a>
                                    </li>
                                    <li class="nav-item active">
                                        <a class="nav-link tm-nav-link" href="company.php">Company</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link tm-nav-link" href="services.php">Services</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link tm-nav-link" href="contact.php">Contact</a>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Hero Image Section -->
        <div class="row">
            <div class="col-12">
                <div><img src="img2/Our-Company.webp" width="100%" height="100%" alt="Our Company"></div>        
            </div>
        </div>

        <main>
            <!-- About Company Section -->
            <section class="tm-welcome">
                <div class="row">
                    <div class="col-12">
                        <h2 class="tm-section-header tm-header-floating">About Our Company</h2>         
                    </div>
                </div>
                
                <div class="row tm-welcome-row">
                    <div class="tm-about">
                        <div class="col-12 tm-media tm-media-v-center">
                            <i class="fas fa-5x fa-air-freshener tm-about-icon"></i>
                            <div>
                                <p>We have a large market in Kosovo and we are very passionate about our work, especially in the following cities: <strong>Prishtina, Prizren, Gjakova, and Theranda.</strong></p> 
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Company Details Section -->
                <div class="row tm-welcome-row-2">
                    <div class="col-md-6">
                        <div class="tm-about-1">
                            <img src="img2/ourComp1.jpg" alt="Image" class="img-fluid mb-5">
                            <p class="tm-article-text">We offer all types of cars according to your preferences. We have been in this business for 12 years and have never had a problem with any client. Our clients are very satisfied with our cars.</p>
                        </div>    
                    </div>
                    <div class="col-md-6">
                        <div class="tm-about-1">
                            <img src="img2/ourComp2.jpg" height="270px" alt="Image" class="">
                            <p class="tm-article-text">Warranty and Safety: All our cars come with full warranty and are regularly inspected to guarantee your safety during your travels. Personalized Service: Our professional team is always available to assist with any questions or concerns you may have.</p>
                        </div>    
                    </div>
                </div>
            </section>
            
            <!-- Featured Person Section -->
            <section class="tm-featured">
                <div class="row">
                    <div class="col-12">
                        <h2 class="tm-section-header tm-section-header-small mb-3">Person Behind the Project</h2>        
                    </div>
                </div>
                
                <div class="grid tm-carousel">
                    <figure class="effect-zoe">
                        <img src="personi/Idriz.png" alt="Featured Item">
                        <figcaption>
                            <h2>Idriz Beqiraj</h2>
                            <p class="icon-links">
                                <a href="https://www.facebook.com/profile.php?id=100072724429813"><i class="fab fa-facebook"></i></a>
                                <a href="https://www.instagram.com/idrizbeqiraj/"><i class="fab fa-instagram"></i></a>
                                <a href="https://web.snapchat.com/?ref=homepage_auto_redirect"><i class="fab fa-snapchat\"></i></a>
                            </p>
                        </figcaption>
                    </figure>
                </div>
            </section>
            
            <!-- Footer Section -->
            <footer>
                <strong>Idriz Beqiraj</strong>
            </footer>
        </main>
    </div>
    
    <!-- JS Scripts -->
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="slick/slick.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/all.js"></script>
</body>
</html>
