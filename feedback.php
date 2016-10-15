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
<?php $thisPage="Feedback"; ?>
<html lang="en">
<!--<![endif]-->

<!-- Head BEGIN -->
<?php
require_once "head.php"
?>
<!-- Head END -->
<style>
  table {
    width:100%;
  }
  table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
  }
  th, td {
    padding: 5px;
    text-align: left;
  }
  table#t01 tr:nth-child(even) {
    background-color: #eee;
  }
  table#t01 tr:nth-child(odd) {
    background-color:#fff;
  }
  table#t01 th {
    background-color: black;
    color: white;
  }
  td, th { border: 1px solid #CCC; }

   .form-all {

     padding-top: 0px;
     width: 690px;
     color: Black !important;
     font-family: "Lucida Grande", "Lucida Sans Unicode", "Lucida Sans", Verdana, sans-serif;
     font-size: 14px;
   }

</style>
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
            <h1>Feedback</h1>
            <div class="content-page">
              <div class="row">

                <div class="col-md-9 col-sm-9">
                  <h4>Your opinion is important to us...</h4>
                  <p>Thank you for taking the time to answer these questions. The following questions are about to know how well known and successful is Smart Basket.</p>
                  
                  <!-- BEGIN FORM-->
                  <div class="form-all">
                  <form action="#" role="form">

                    <div class="form-group">
                      <label class="form-label form-label-top form-label-auto" id="label_6" for="input_6"> 1. Have you ever heard about Smart Basket? </label>
                      <br />
                      <input type="radio" id="input_6_0" name="Yes" value="Yes">
                      <label id="label_input_6_0" for="input_6_0"> Yes </label>
                      <input type="radio" id="input_6_1" name="No" value="No">
                      <label id="label_input_6_1" for="input_6_1"> No </label>
                     </div>

                    <div class="form-group">
                      <label id="label_7" for="input_7"> 2. How did you learn about Smart Basket? </label>
                      <br />
                      <select id="input_7" name="Learn">
                        <option value="">  </option>
                        <option value="Friend or Relative"> Friend or Relative </option>
                        <option value="Web search engine"> Web search engine </option>
                        <option value="Banner Ad"> Banner Ad </option>
                        <option value="Magazine"> Magazine </option>
                        <option value="E-mail"> E-mail </option>
                        <option value="Pop-up ad"> Pop-up ad </option>
                        <option value="Other"> Other </option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label id="label_8" for="input_8"> 3. How old are you? </label>
                      <br />
                      <input type="radio" id="input_8_0" name="Age" value="Under 18">
                      <label id="label_input_8_0" for="input_8_0"> Under 18 </label>
                      <input type="radio" id="input_8_1" name="Age" value="18 - 25">
                      <label id="label_input_8_1" for="input_8_1"> 18 - 25 </label>
                      <input type="radio" id="input_8_2" name="Age" value="25 - 45">
                      <label id="label_input_8_2" for="input_8_2"> 25 - 45 </label>
                      <input type="radio" id="input_8_3" name="Age" value="45 or more">
                      <label id="label_input_8_3" for="input_8_3"> 45 or more </label>
                    </div>
                    <div class="form-group">
                      <label id="label_9" for="input_9"> 4. How often do you visit our website? </label>
                      <br />
                      <select id="input_9" name="Visit">
                        <option value="">  </option>
                        <option value="Daily"> Daily </option>
                        <option value="Once a week"> Once a week </option>
                        <option value="Once a month"> Once a month </option>
                        <option value="Once a year"> Once a year </option>
                        <option value="Never"> Never </option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label  id="label_10" for="input_10"> 5. Overall, how satisfied are you with our website? </label>
                      <br />
                      <select id="input_10" name="Overall">
                        <option value="">  </option>
                        <option value="Daily"> Daily </option>
                        <option value="Once a week"> Once a week </option>
                        <option value="Once a month"> Once a month </option>
                        <option value="Once a year"> Once a year </option>
                        <option value="Never"> Never </option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label id="label_11" for="input_11"> 6. How likely would you be to recommend Smart Basket to your friends or colleagues? </label>
                      <br />
                      <select id="input_11" name="Recomment">
                        <option value="">  </option>
                        <option value="Very unlikely"> Very unlikely </option>
                        <option value="Neutral"> Neutral </option>
                        <option value="Very likely"> Very likely </option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label id="label_12" for="input_12"> 7. What particular aspect(s) of our website do you like? </label>
                      <br />
                      <textarea id="input_12" name="What" cols="40" rows="6"></textarea>
                    </div>
                    <div class="form-group">
                      <label id="label_13" for="input_13"> 8. What particular aspect(s) of our website do you dislike? </label>
                      <br />
                      <textarea id="input_13" name="Aspects" cols="40" rows="6"></textarea>
                    </div>
                    <div class="form-group">
                      <label id="label_14" for="input_14"> 9. How easy it to navigate our website? </label>
                      <br />
                      <select id="input_14" name="Ease">
                        <option value="">  </option>
                        <option value="Very easy"> Very easy </option>
                        <option value="Somewhat easy"> Somewhat easy </option>
                        <option value="Easy"> Easy </option>
                        <option value="Somewhat difficult"> Somewhat difficult </option>
                        <option value="Very difficult"> Very difficult </option>
                      </select>

                    </div>
                    <div class="form-group">
                      <label id="label_15" for="input_15"> 10. Please rank Smart Basket: </label>
                      <br />
                      <div id="cid_15">
                        <table summary="" cellpadding="4" cellspacing="0">
                          <tbody><tr>
                            <th style="border:none">
                              &nbsp;
                            </th>
                            <th>
                              1 - Not Good
                            </th>
                            <th>
                              2
                            </th>
                            <th>
                              3 - Average
                            </th>
                            <th>
                              4
                            </th>
                            <th>
                              5 - Best
                            </th>
                          </tr>
                          <tr>
                            <th align="left">
                              Usability
                            </th>
                            <td align="center">
                              <input id="input_15_0_0" type="radio" name="q31_23Please[0]" value="1 - Not Important">
                            </td>
                            <td align="center">
                              <input id="input_15_0_1" type="radio" name="q31_23Please[0]" value="2">
                            </td>
                            <td align="center">
                              <input id="input_15_0_2" type="radio" name="q31_23Please[0]" value="3 - Maybe">
                            </td>
                            <td align="center" >
                              <input id="input_15_0_3" type="radio" name="q31_23Please[0]" value="4">
                            </td>
                            <td align="center" >
                              <input id="input_15_0_4" type="radio" name="q31_23Please[0]" value="5 - Very Important">
                            </td>
                          </tr>
                          <tr>
                            <th align="left" >
                              Performance
                            </th>
                            <td align="center">
                              <input id="input_15_1_0" type="radio" name="q31_23Please[1]" value="1 - Not Important">
                            </td>
                            <td align="center">
                              <input id="input_15_1_1" type="radio" name="q31_23Please[1]" value="2">
                            </td>
                            <td align="center" >
                              <input id="input_15_1_2" type="radio" name="q31_23Please[1]" value="3 - Maybe">
                            </td>
                            <td align="center">
                              <input id="input_15_1_3" type="radio" name="q31_23Please[1]" value="4">
                            </td>
                            <td align="center" >
                              <input id="input_15_1_4" type="radio" name="q31_23Please[1]" value="5 - Very Important">
                            </td>
                          </tr>
                          <tr>
                            <th align="left" >
                              Mobile Browsing
                            </th>
                            <td align="center">
                              <input id="input_15_2_0" type="radio" name="q31_23Please[2]" value="1 - Not Important">
                            </td>
                            <td align="center" >
                              <input id="input_15_2_1" type="radio" name="q31_23Please[2]" value="2">
                            </td>
                            <td align="center" >
                              <input id="input_15_2_2" type="radio" name="q31_23Please[2]" value="3 - Maybe">
                            </td>
                            <td align="center" >
                              <input id="input_15_2_3" type="radio" name="q31_23Please[2]" value="4">
                            </td>
                            <td align="center" >
                              <input id="input_15_2_4" type="radio" name="q31_23Please[2]" value="5 - Very Important">
                            </td>
                          </tr>
                          <tr>
                            <th align="left" >
                              Design
                            </th>
                            <td align="center" >
                              <input id="input_15_3_0" type="radio" name="q31_23Please[3]" value="1 - Not Important">
                            </td>
                            <td align="center" >
                              <input id="input_15_3_1" type="radio" name="q31_23Please[3]" value="2">
                            </td>
                            <td align="center">
                              <input id="input_15_3_2" type="radio" name="q31_23Please[3]" value="3 - Maybe">
                            </td>
                            <td align="center" >
                              <input id="input_15_3_3" type="radio" name="q31_23Please[3]" value="4">
                            </td>
                            <td align="center" >
                              <input id="input_15_3_4" type="radio" name="q31_23Please[3]" value="5 - Very Important">
                            </td>
                          </tr>
                          <tr>
                            <th align="left" >
                              Overall
                            </th>
                            <td align="center">
                              <input id="input_15_4_0" type="radio" name="q31_23Please[4]" value="1 - Not Important">
                            </td>
                            <td align="center" >
                              <input id="input_15_4_1" type="radio" name="q31_23Please[4]" value="2">
                            </td>
                            <td align="center" >
                              <input id="input_15_4_2" type="radio" name="q31_23Please[4]" value="3 - Maybe">
                            </td>
                            <td align="center" >
                              <input id="input_15_4_3"  type="radio" name="q31_23Please[4]" value="4">
                            </td>
                            <td align="center" >
                              <input id="input_15_4_4"  type="radio" name="q31_23Please[4]" value="5 - Very Important">
                            </td>
                          </tr>
                          </tbody></table>
                    </div>

                    </div>

                    <button type="submit" class="btn btn-primary"><i class="icon-ok"></i> Send</button>
                    <button type="button" class="btn btn-default">Cancel</button>
                  </form>
                  </div>
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
                    <a href="mailto:support@example.com">shrikant.tambe@utah.edu</a>
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