<!DOCTYPE html>
<!--
Template: Metronic Frontend Freebie - Responsive HTML Template Based On Twitter Bootstrap 3.3.4
Version: 1.0.0
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase Premium Metronic Admin Theme: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<?php $thisPage="Contact Us"; ?>
<html lang="en">
<!--<![endif]-->

<!-- Head BEGIN -->
<?php
require_once "head.php"
?>
<!-- Head END -->

<!-- Body BEGIN -->
<body class="corporate">
    <!-- BEGIN STYLE CUSTOMIZER -->
    <?php
    require_once "style.php"
    ?>
    <!-- END BEGIN STYLE CUSTOMIZER --> 
    
    <!-- BEGIN TOP BAR -->
    <?php
    require_once "topbar.php"

    ?>
    <!-- END TOP BAR -->

    <!-- BEGIN HEADER -->
    <div class="header">
      <div class="container">
        <a class="site-logo" href="index.php"><img src="assets/corporate/img/logos/logo-corp-red.png" alt="Metronic FrontEnd"></a>

        <a href="javascript:void(0);" class="mobi-toggler"><i class="fa fa-bars"></i></a>

        <!-- BEGIN NAVIGATION -->
        <?php
        require_once "navigation.php"


        ?>
        <!-- END NAVIGATION -->
      </div>
    </div>
    <!-- Header END -->

    <div class="main">
      <div class="container">
        <ul class="breadcrumb">
            <li><a href="index.php">Home</a></li>
            <li class="active">Contact Us</li>
        </ul>
        <div class="row margin-bottom-40">
          <!-- BEGIN CONTENT -->
          <div class="col-md-12">
            <h1>Contact Us</h1>
            <div class="content-page">
              <div class="row">

                <div class="col-md-9 col-sm-9">
                  <h2>Feel free to reach out to us...</h2>
                  <p>You're not going to hit a ridiculously long phone call when you call us. Your email isn't going to Inbox abyss, never to be seen or heard from again. At Smart Basket, we provide exceptional service we'd want to experience ourselves!</p>
                  
                  <!-- BEGIN FORM-->
                  <form action="#" role="form">
                    <div class="form-group">
                      <label for="contacts-name">Name</label>
                      <input type="text" class="form-control" id="contacts-name">
                    </div>
                    <div class="form-group">
                      <label for="contacts-profession">Profession</label>
                      <input type="text" class="form-control" id="profession-name">
                    </div>
                    <div class="form-group">
                      <label for="contacts-email">Email</label>
                      <input type="email" class="form-control" id="contacts-email">
                    </div>
                    <div class="form-group">
                      <label for="contacts-message">Message</label>
                      <textarea class="form-control" rows="5" id="contacts-message"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary"><i class="icon-ok"></i> Send</button>
                    <button type="button" class="btn btn-default">Cancel</button>
                  </form>
                  <!-- END FORM-->
                </div>

                <div class="col-md-3 col-sm-3 sidebar2">
                  <h2>Our Contacts</h2>
                  <address>
                    <strong>Smart Basket</strong><br>
                    1200 East, 730 South<br>
                    Salt Lake City, UT 84102<br>
                    <abbr title="Phone">P:</abbr> (385) 499-7759
                  </address>
                  <address>
                    <strong>Email</strong><br>
                    <a href="mailto:info@email.com">info@smartbasket.com</a><br>
                    <a href="mailto:support@example.com">info.smartbasket@gmail.com</a>
                  </address>
                  <ul class="social-icons margin-bottom-40">
                    <li><a href="javascript:;" data-original-title="facebook" class="facebook"></a></li>
                    <li><a href="javascript:;" data-original-title="github" class="github"></a></li>
                    <li><a href="javascript:;" data-original-title="Goole Plus" class="googleplus"></a></li>
                    <li><a href="javascript:;" data-original-title="linkedin" class="linkedin"></a></li>
                    <li><a href="javascript:;" data-original-title="rss" class="rss"></a></li>
                  </ul>

                  <h2 class="padding-top-30">Our Mission</h2>
                  <p>We at Smart Basket strive to provide</p>
                  <ul class="list-unstyled">
                    <li><i class="fa fa-check"></i> Mobile Support</li>
                    <li><i class="fa fa-check"></i> Multi-purpose Site </li>
                    <li><i class="fa fa-check"></i> Customizable UI</li>
                  </ul>        
                </div>
              </div>
            </div>
          </div>
          <!-- END CONTENT -->
        </div>
      </div>
    </div>


    <!-- BEGIN FOOTER -->
    <?php
    require_once "footer.php";
    ?>
    <!-- END FOOTER -->

    <!-- Load javascripts at bottom, this will reduce page load time -->
    <!-- BEGIN CORE PLUGINS (REQUIRED FOR ALL PAGES) -->
    <!--[if lt IE 9]>
    <script src="assets/plugins/respond.min.js"></script>
    <![endif]-->
    <script src="assets/plugins/jquery.min.js" type="text/javascript"></script>
    <script src="assets/plugins/jquery-migrate.min.js" type="text/javascript"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>      
    <script src="assets/corporate/scripts/back-to-top.js" type="text/javascript"></script>
    <!-- END CORE PLUGINS -->

    <!-- BEGIN PAGE LEVEL JAVASCRIPTS (REQUIRED ONLY FOR CURRENT PAGE) -->
    <script src="assets/plugins/fancybox/source/jquery.fancybox.pack.js" type="text/javascript"></script><!-- pop up -->
    <script src="assets/pages/scripts/contact-us.js" type="text/javascript"></script>

    <script src="assets/corporate/scripts/layout.js" type="text/javascript"></script>
    <script type="text/javascript">
        jQuery(document).ready(function() {
            Layout.init();
            Layout.initUniform();
            ContactUs.init();
            Layout.initTwitter();
        });
    </script>
    <!-- END PAGE LEVEL JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>