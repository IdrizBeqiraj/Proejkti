<?php
session_start();
$username = isset($_SESSION['user']) ? $_SESSION['user'] : null;

if (!$username) {
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
    
    <title>Rent a car KOHA</title>
    
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,800" rel="stylesheet"/> 
    <link href="css/all.css" rel="stylesheet"/> 
    <link href="css/bootstrap.css" rel="stylesheet"/> 
	<link href="css/Style.css" rel="stylesheet"/>

    


</head>
<body>
    
    <div class="container-fluid">
    <div class="tm-site-header">
            <div class="row">
                <div class="col-12 tm-site-header-col">
                    <div class="tm-site-header-left">
                        <i class="far fa-2x fa-eye tm-site-icon"></i>
                        <h1 class="tm-site-name">RENT A CAR KOHA</h1>
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
                                    <li class="nav-item">
                                        <a class="nav-link tm-nav-link" href="company.php">Company</a>
                                    </li>
                                    <li class="nav-item active">
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
        
        <div class="row">
            <div class="col-12">
                <div class=""><img src="img2/Service.webp" height="100%" width="100%"></div>        
            </div>
        </div>
        
    
        <main>
            
            <section class="tm-welcome">
                <div class="row">
                    <div class="col-12">
                        <h2 class="tm-section-header tm-header-floating">Services</h2>         
                    </div>
                </div>
                
                <div class="row tm-welcome-row tm-services">
                    <div class="col-md-3 col-sm-6">
                        <figure class="tm-services-img">
                            <img src="Services img/e para.webp" height="300px" width="100%" alt="" class="img-fluid2">        
                            <figcaption class="tm-service-description" >Makinat</figcaption>
                        </figure>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <figure class="tm-services-img">
                            <img src="Services img/Onilne-Platform22.jpg" alt="" height="300px" width="100%" class="img-fluid2">        
                            <figcaption class="tm-service-description">Onilne Platroma</figcaption>
                        </figure>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <figure class="tm-services-img">
                            <img src="Services img/social.jpeg" height="300px" width="100%" alt="" class="img-fluid2">    
                            <figcaption class="tm-service-description">Social Platforms</figcaption>
                        </figure>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <figure class="tm-services-img">
                            <img src="Services img/Debit.jpg" alt="" height="300px" width="100%" class="img-fluid2">    
                            <figcaption class="tm-service-description">Pagesa me Kartel</figcaption>
                        </figure>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-12">
                        <h2 class="tm-section-header tm-section-header-small mb-5">Detajet</h2>        
                    </div>
                </div>
                <div class="row tm-approach-row">
                    <div class="col-md-6">
                        <div class="tm-approach-box">
                            <div class="tm-media tm-media-2 tm-media-v-center tm-solid-border">
                                <i class="fab fa-4x fa-acquisitions-incorporated tm-service-icon"></i>
                                <div>
                                    <p><a rel="nofollow" target="_parent" ></a>Makinat tona mund te shiten onile dhe ne menyr live  dhe mund te zgjidhni cilin do makine qe ju preferoni</p>
                                </div>
                            </div>        
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="tm-approach-box">
                            <div class="tm-media tm-media-2 tm-media-v-center tm-solid-border">
                                <i class="fas fa-4x fa-certificate tm-service-icon"></i>
                                <div>
                                    <p>Platforma onile ju mundeson qe mund te keni nje makine me qera pa ardhur te lokacioni jone qe ju mundeson tjau siell makinen te loakcioni juaj dhe pagesa duhet bere online </p>
                                </div>
                            </div>        
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="tm-approach-box">
                            <div class="tm-media tm-media-2 tm-media-v-center tm-solid-border">
                                <i class="fas fa-4x fa-chart-pie tm-service-icon"></i>
                                <div>
                                    <p>Ne kemi disa platorma te kontakiti tona ne platroma sociale siq jan E-mail, Whatsapp, Instagram dhe Telefoni mobil </p>
                                </div>
                            </div>         
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="tm-approach-box">
                            <div class="tm-media tm-media-2 tm-media-v-center tm-solid-border">
                                <i class="fas fa-4x fa-anchor tm-service-icon"></i>
                                <div>
                                    <p>Pagesa me kartel mund te beni online dhe live dhe ju mundeson ta beni edhe pagesen me keste cila ju pelqen me shume </p>
                                </div>
                            </div>    
                        </div>
                    </div>
                </div>
            </section>
            
            
            <section class="tm-featured">
                <div class="row">
                    <div class="col-12">
                        <h2 class="tm-section-header tm-section-header-small mb-3">Sponzoret</h2>        
                    </div>
                </div>
                
                <div class="tm-partners mx-auto">
                    <div>
                        <img src="Services img/golden-Eagle-logo.jpeg" width="170px" height="170px" alt="" class="img-fluid2">
                        <img src="Services img/redbull-logo.jpg" width="170px" alt="" class="img-fluid2">
                        <img src="Services img/go+-logo.jpeg" width="170px" height="150px" alt="" class="img-fluid">
                        <img src="Services img/B52-logo.png" width="170px" height="170px" alt="Partner Image" class="img-fluid">
                        <img src="Services img/shkolla-digjitale.png" width="170px" height="170px" alt="" class="img-fluid">    
                    </div>
                    
                    <p class="tm-partner-text">Ne kemi marrveshje  te mira me keto kompani dhe jemi duke munsuar te Suportojme(Mbeshtetje) dhe ato jane<br><br>
                         <strong><center>Golden Eagle,    Redbull, Go+,     B52 Energy Drink,      Shkolla Digjitale</center></strong></p>
                    
                </div>
            </section>
            
            <footer>
                <strong>Idriz Beqiraj  </strong>
            </footer>
            
        </main>
    </div>
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/all.js"></script>
</body>
</html>