<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from www.themeon.net/nifty/v2.6/pages-register.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 10 Apr 2017 22:46:17 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<!-- /Added by HTTrack -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register page | Tenece</title>


    <!--STYLESHEET-->
    <!--=================================================-->

    <!--Open Sans Font [ OPTIONAL ]-->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>


    <!--Bootstrap Stylesheet [ REQUIRED ]-->
    <link href="css/bootstrap.min.css" rel="stylesheet">


    <!--Nifty Stylesheet [ REQUIRED ]-->
    <link href="css/nifty.min.css" rel="stylesheet">


    <!--Nifty Premium Icon [ DEMONSTRATION ]-->
    <link href="css/demo/nifty-demo-icons.min.css" rel="stylesheet">



    <!--Demo [ DEMONSTRATION ]-->
    <link href="css/demo/nifty-demo.min.css" rel="stylesheet">


    <!--Magic Checkbox [ OPTIONAL ]-->
    <link href="plugins/magic-check/css/magic-check.min.css" rel="stylesheet">






    <!--JAVASCRIPT-->
    <!--=================================================-->

    <!--Pace - Page Load Progress Par [OPTIONAL]-->
    <link href="plugins/pace/pace.min.css" rel="stylesheet">
    <script src="plugins/pace/pace.min.js"></script>


    <!--jQuery [ REQUIRED ]-->
    <script src="js/jquery.min.js"></script>


    <!--BootstrapJS [ RECOMMENDED ]-->
    <script src="js/bootstrap.min.js"></script>


    <!--NiftyJS [ RECOMMENDED ]-->
    <script src="js/nifty.min.js"></script>






    <!--=================================================-->

    <!--Background Image [ DEMONSTRATION ]-->
    <script src="js/demo/bg-images.js"></script>





    <!--=================================================

    REQUIRED
    You must include this in your project.


    RECOMMENDED
    This category must be included but you may modify which plugins or components which should be included in your project.


    OPTIONAL
    Optional plugins. You may choose whether to include it in your project or not.


    DEMONSTRATION
    This is to be removed, used for demonstration purposes only. This category must not be included in your project.


    SAMPLE
    Some script samples which explain how to initialize plugins or components. This category should not be included in your project.


    Detailed information and more samples can be found in the document.

    =================================================-->


</head>

<!--TIPS-->
<!--You may remove all ID or Class names which contain "demo-", they are only used for demonstration. -->

<body>
    <div id="container" class="cls-container">


        <!-- BACKGROUND IMAGE -->
        <!--===================================================-->
        <div id="bg-overlay"></div>


        <!-- REGISTRATION FORM -->
        <!--===================================================-->
        <div class="cls-content">
            <div class="cls-content-lg panel">
                <div class="panel-body">
                    <div class="mar-ver pad-btm">
                        <img src="http://tenece.com/ten/img/logo.png"><br><br>
                        <h3 class="h4 mar-no">Create a New Account</h3>
                        <p class="text-muted">Tenece Voucher proccessing! Let's set up your account.</p>
                        @if($errors->any())
                        <span style="color:red;">{{ $errors-first() }}</span>
                        @endif
                    </div>
                    <form action="/user/register" method="post">
                    {{ csrf_field() }}
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Full Name" name="full_name" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Employee Id" minlength="10" maxlength="10" name="employee_id" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="E-mail Address" name="email" required>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="Password" name="password" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <select name="sex" id="demo-nav-offcanvas" class="form-control" required>
                                        <option value="" selected disabled="disabled">-- Select Gender --</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <select id="demo-nav-offcanvas1" name="office_entity" class="form-control" required>
                                        <option value="" selected disabled="disabled">-- Select Office Entity --</option>
                                        @foreach($officeEntities as $officeEntity)
                                        <option value="{{ $officeEntity->id }}">
                                            {{ $officeEntity->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="checkbox pad-btm text-left">
                            <input id="demo-form-checkbox" class="magic-checkbox" type="checkbox">
                            <label for="demo-form-checkbox">I agree with the
                                <a href="#" class="btn-link">Terms and Conditions</a>
                            </label>
                        </div> -->
                        <button class="btn btn-primary btn-block" type="submit">Register</button>
                    </form>
                </div>
                <div class="pad-all">
                    Already have an account ?
                    <a href="/login" class="btn-link mar-rgt">Sign In</a>

                    <!-- <div class="media pad-top bord-top">
                        <div class="pull-right">
                            <a href="#" class="pad-rgt">
                                <i class="demo-psi-facebook icon-lg text-primary"></i>
                            </a>
                            <a href="#" class="pad-rgt">
                                <i class="demo-psi-twitter icon-lg text-info"></i>
                            </a>
                            <a href="#" class="pad-rgt">
                                <i class="demo-psi-google-plus icon-lg text-danger"></i>
                            </a>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
        <!--===================================================-->


        <!-- DEMO PURPOSE ONLY -->
        <!--===================================================-->
        <div class="demo-bg">
            <div id="demo-bg-list">
                <div class="demo-loading">
                    <i class="psi-repeat-2"></i>
                </div>
                <img class="demo-chg-bg bg-trans active" src="img/bg-img/thumbs/bg-trns.jpg" alt="Background Image">
                <img class="demo-chg-bg" src="img/bg-img/thumbs/bg-img-1.jpg" alt="Background Image">
                <img class="demo-chg-bg" src="img/bg-img/thumbs/bg-img-2.jpg" alt="Background Image">
                <img class="demo-chg-bg" src="img/bg-img/thumbs/bg-img-3.jpg" alt="Background Image">
                <img class="demo-chg-bg" src="img/bg-img/thumbs/bg-img-4.jpg" alt="Background Image">
                <img class="demo-chg-bg" src="img/bg-img/thumbs/bg-img-5.jpg" alt="Background Image">
                <img class="demo-chg-bg" src="img/bg-img/thumbs/bg-img-6.jpg" alt="Background Image">
                <img class="demo-chg-bg" src="img/bg-img/thumbs/bg-img-7.jpg" alt="Background Image">
            </div>
        </div>
        <!--===================================================-->



    </div>
    <!--===================================================-->
    <!-- END OF CONTAINER -->


</body>

<!-- Mirrored from www.themeon.net/nifty/v2.6/pages-register.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 10 Apr 2017 22:46:17 GMT -->

</html>