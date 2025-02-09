<?php
session_start(); 


if (!isset($_SESSION['user_id'])) {
    header('Location: sign-in.php'); 
    exit();
}

$username = $_SESSION['user_id'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>Rent a car KOHA</title>
    
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,800" rel="stylesheet" /> 
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
                            <a href="Log-out.php" class="btn btn-danger">Logout</a>
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
                <div class="#"> <img src="img2/contact.jpg" width="100%" height="100%"></div>        
            </div>
        </div>
        
        <main>
            <section class="tm-welcome">
                <div class="row">
                    <div class="col-12">
                        <h2 class="tm-section-header tm-header-floating">Contact Information</h2>         
                    </div>
                </div>
                
                <div class="row tm-welcome-row">
                    <div class="col-lg-6 mb-5 tm-contact-box">
                      <div class="tm-contact-form-wrap">
                        <form id="contact-form" action="login.php" method="post" class="tm-contact-form">
                            <div class="form-group">
                              <input type="text" id="contact_name" name="contact_name" class="form-control rounded-0 border-top-0 border-right-0 border-left-0" placeholder="Your Name" required="" />
                            </div>
                            <div class="form-group">
                              <input type="email" id="contact_email" name="contact_email" class="form-control rounded-0 border-top-0 border-right-0 border-left-0" placeholder="Your Email" required="" />
                            </div>
                            <div class="form-group">
                              <textarea rows="4" id="contact_message" name="contact_message" class="form-control rounded-0 border-top-0 border-right-0 border-left-0" placeholder="Message..." required=""></textarea>
                            </div>
                            <div class="form-group mb-0">
                              <button type="submit" class="btn rounded-0 d-block ml-auto tm-btn-primary">
                                Send It Now
                              </button>
                            </div>
                        </form>
                      </div>                    
                    </div>
                    <div class="col-lg-6 mb-5 tm-contact-box">
                      <div class="tm-double-border-1 tm-border-gray">
                        <div class="tm-double-border-2 tm-border-gray tm-box-pad">
                          <h3 style="text-align: center;">Contact Form</h3>
                          <br>
                          <br>
                            <p>Ju lutem kose keni ndonje pa qartesi na kontaktoni edhe ketu me emer email edhe mesazhin se qfar keni 
                              mesazhi mundet qe te ju vanoje 24-48H masksimumi
                            </p>
                        </div>                    
                      </div>                  
                    </div>
                </div>
                
                <div class="row pb-5">
                  <div class="mapouter">
                      <div class="gmap_canvas">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2425.8414889767896!2d21.15084678399872!3d42.65433716488328!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x13549fbd4946ba4f%3A0x1772298bf12c0f43!2sRent%20a%20Car%20Premtimi!5e1!3m2!1sen!2s!4v1737474253994!5m2!1sen!2s" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                      </div>
                  </div>
                </div>
                <div>
                  <h2 style="text-align: center;">Adresa</h2>
                    <p style="font-size: 30px;">Kjo eshte adresa e jone ku ju mund ta gjeni lokalin tone, Faleminderit!</p>
                </div>
            </section>
            
            <footer>
                <strong>Idriz Beqiraj </strong>
            </footer>
        </main>
    </div>
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/all.js"></script>
</body>
</html>
