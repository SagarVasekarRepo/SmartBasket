<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="/assets/corporate/scripts/bootbox.min.js"></script>
<script>
    function validateForm() {
        var x = document.forms["signup"]["name"].value;
        var y = document.forms["signup"]["email"].value;
        var z = document.forms["signup"]["password"].value;
        var a = document.forms["signup"]["confirm_password"].value;
        if (z != a)
        {

            alert("Passwords do not match!")
            return (false)
        }
        if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(y))
        {

          return (true)
        }
        else
        {

            alert("You have entered an invalid email address!")
            return (false)
        }


    }
</script>


<!-- BEGIN TOP BAR -->
<div class="pre-header">
    <div class="container">
        <div class="row">
            <!-- BEGIN TOP BAR LEFT PART -->
            <div class="col-md-6 col-sm-6 additional-shop-info">
                <ul class="list-unstyled list-inline">
                    <li><i class="fa fa-phone"></i><span>+1 385 499 7759</span></li>
                    <li><i class="fa fa-envelope-o"></i><span>info@smartbasket.com</span></li>
                </ul>
            </div>
            <!-- END TOP BAR LEFT PART -->
            <!-- BEGIN TOP BAR MENU <li><a href="page-login.html">Log In</a></li>-->
            <div class="col-md-6 col-sm-6 additional-nav">
                <ul class="list-unstyled list-inline pull-right">

                    <li data-toggle="modal" data-target="#myModal"><a href="#">Log In</a></li>
                    <li data-toggle="modal" data-target="#myModal2"><a href="#">Registration</a></li>
                </ul>
            </div>
            <!-- END TOP BAR MENU -->
        </div>
    </div>
</div>

<!-- LOGIN FORM -->

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <div class="login-head">
                    <h1>Login</h1>
                </div>
            </div>
            <div class="login-page">
                <div class="login-main">

                    <div class="login-block">
                        <form>
                            <input type="text" name="email" placeholder="Email" required="">
                            <input type="password" name="password" class="lock" placeholder="Password" required="">
                            <div class="forgot-top-grids">
                                <div class="forgot-grid">
                                    <ul>
                                        <li>
                                            <input type="checkbox" id="brand1" value="">
                                            <label for="brand1"><span></span>Remember me</label>
                                        </li>
                                    </ul>
                                </div>
                                <div class="forgot">
                                    <a href="#">Forgot password?</a>
                                </div>
                                <div class="clearfix"> </div>
                            </div>
                            <input type="submit" name="Sign In" value="Login">
                            <h3>Not a member?<a href="#" class="close-heading" data-dismiss="modal" data-toggle="modal" data-target="#myModal2"> Sign up now</a></h3>
                            <h2>or login with</h2>
                            <div class="login-icons">
                                <ul>
                                    <li><a href="#" class="facebook"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#" class="google"><i class="fa fa-google-plus"></i></a></li>
                                </ul>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- END LOGIN FORM -->

<!-- BEGIN SIGN UP FORM -->

<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <div class="signup-head">
                    <h1>Sign Up</h1>
                </div>
            </div>
            <div class="signup-page-main">
                <div class="signup-main">

                    <div class="signup-block">
                        <form name="signup" action="registration_handler.php"  onsubmit="return validateForm()" method="POST">

                                <input type="text" name="name" placeholder="Name" required="" value="" />
                                <input type="text" name="email" placeholder="Email" required="" value="" />
                                <input id="password" name="password" type="password" placeholder="Password" required />
                                <input id="confirm_password" name="confirm_password" type="password" placeholder="Confirm Password" required />
                            <div class="forgot-top-grids">
                                <div class="forgot-grid-new">
                                    <ul>
                                        <li>
                                            <input type="checkbox" id="brand2" value="">
                                            <label for="brand2"><span></span>I agree to the terms</label>
                                        </li>
                                    </ul>

                                </div>

                                <div class="clearfix"> </div>
                            </div>
                            <input type="submit" name="Sign In" value="Sign up">

                        </form>

                        <div class="sign-down">
                            <br />
                            <h4>Already have an account? <a href="#m" class="close-heading" data-dismiss="modal" data-toggle="modal" data-target="#myModal"> <br />Login here.</a></h4>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- END SIGN UP FORM -->
<!-- END TOP BAR -->