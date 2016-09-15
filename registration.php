<!DOCTYPE html>
<html lang="en">
<head>
    <title>INK Mania</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />
    <meta name="description" content="Your description">
    <meta name="keywords" content="Your keywords">
    <meta name="author" content="COODI - Webservices">
    <meta name = "format-detection" content = "telephone=no" />
    <!--CSS-->
    <link rel="stylesheet" href="css/bootstrap.css" >
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="fonts/font-awesome.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/contact-form.css">
    <link rel="stylesheet" href="css/custom.css">
    <!--JS-->
    <script src="js/jquery.js"></script>
    <script src="js/jquery-migrate-1.2.1.min.js"></script>
    <script src="js/superfish.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/jquery.mobilemenu.js"></script>
    <script src="js/jquery.ui.totop.js"></script>
    <script src="js/jquery.equalheights.js"></script>
    <script src="js/sForm.js"></script>
    <script src="js/custom.js"></script>

    <!--animate-->
    <!--[if (gt IE 9)|!(IE)]><!-->
    <script src="js/wow/wow.js"></script>
    <script src="js/device.min.js"></script>
    <script>
        $(document).ready(function () {
            if ($('html').hasClass('desktop')) {
                new WOW().init();
            }
        });
    </script>
    <!--[if lt IE 9]>
    <div style='text-align:center; position:absolute; width: 100%; z-index:999'><a href="http://windows.microsoft.com/en-US/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode"><img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today." /></a></div>
    <![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <link rel="stylesheet" href="css/ie.css">
    <![endif]-->
</head>
<body>
<!--header-->
<header>
    <div class="container">
        <h1 class="navbar-brand navbar-brand_"><a href="index.html"><img src="img/inkmanialogo.png" alt="logo"></a></h1>
        <nav class="navbar navbar-default navbar-static-top tm_navbar clearfix" role="navigation">
            <ul class="nav sf-menu clearfix">
                <li><a href="index.html">Home</a><em></em></li>
                <li><a href="tickets.html">Tickets</a><em></em></li>
                <li><a href="#">Program</a><em></em></li>
                <li><a href="artist.html">Artists</a><em></em></li>
                <li><a href="registration.php">Registration</a><em></em></li>
                <li><a href="index.html#anker_practicalinfo">Practical info</a><em></em></li>
                <li><a href="pictures.html">Pictures</a><em></em></li>
                <li><a href="sponsors.html">Sponsors</a><em></em></li>
            </ul>
        </nav>
    </div>
</header>
<div class="global indent">
    <div class="container">
        <h3 class="text-center">Artist Registration</h3>
    </div>
    <div class="formBox">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <?php

                    if($_POST)
                    {
                        if(($_POST['middelnaam'] == '') && ($_POST['shop_name'] != '') && ($_POST['last_name'] != '') && ($_POST['first_name'] != '') && ($_POST['email'] != '')&&
                            ($_POST['phone'] != '')&& ($_POST['street_nr'] != '')&& ($_POST['zip'] != '')&& ($_POST['city'] != '')&& ($_POST['country'] != '')
                            && ($_POST['vat'] != '')&& ($_POST['message'] != ''))
                        {
                            $to      = 'info@inkmania.be';
                            $subject = 'Bericht via website';
                            $message = '
                                        Artist-Exhibitor-Sponsor naam: '.$_POST['shop_name'].'<br>
                                        Achternaam: '.$_POST['last_name'].'<br>
                                        Voornaam: '.$_POST['first_name'].'<br>
                                        Email: '.$_POST['email'].'<br><br>
                                        Telefoon: '.$_POST['phone'].'<br><br>
                                        Straat + nr: '.$_POST['street_nr'].'<br>
                                        Postcode: '.$_POST['zip'].'<br><br>
                                        Stad: '.$_POST['city'].'<br><br>
                                        Land: '.$_POST['country'].'<br>
                                        BTW nummer: '.$_POST['vat'].'<br><br>
                                        Bericht / Vragen: '.htmlspecialchars($_POST['message']).'<br>';

                            $headers = 'From:'. $_POST['last_name'] .' '. $_POST['first_name'].' <'.$_POST['email'].'>'."\r\n" .
                                        'Reply-To:'.$_POST['email'] . "\r\n" .
                                        'Content-Type: text/html; charset=ISO-8859-1\r\n' . "\r\n" .
                                        'X-Mailer: PHP/' . phpversion();

                            mail($to, $subject, $message, $headers);

                            $succes_messages = 'Uw bericht werd succesvol verzonden.';
                        }
                        else
                        {
                            $error_messages = 'Uw bericht werd niet verzonden omdat niet alle velden zijn ingevuld.';
                        }
                    }

                    ?>
                        <form action="registration.php" id="contact-form" method="post" accept-charset="utf-8" _lpchecked="1">

                        <div class="contact-form-loader"></div>
                            <div class="row">

                                <?php

                                if($succes_messages != '')
                                {
                                    echo '<div class="alert alert-success" role="alert">'.$succes_messages.'</div>';
                                }
                                if($error_messages != '')
                                {
                                    echo '<div class="alert alert-danger" role="alert">'.$error_messages.'</div>';
                                }

                                ?>

                                <h4>Make your choice</h4>
                                <div class="radio">
                                    <label><input class="radio_artists" type="radio" name="optradio" value="1" checked="checked">Artists</label>
                                </div>
                                <div class="radio">
                                    <label><input class="radio_exhibitor" type="radio" name="optradio" value="2">Exhibitor</label>
                                </div>
                                <div class="radio">
                                    <label><input class="radio_sponsors" type="radio" name="optradio" value="2">Sponsor</label>
                                </div>

                                <h4>Personal information</h4>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <label class="name form-div-3">
                                            <input type="text" name="shop_name" placeholder="Artist-Exhibitor-Sponsor name*:" value=""   />
                                            <span class="empty-message">*This field is required.</span>
                                            <span class="error-message">*This is not a valid name.</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <label class="name form-div-1">
                                            <input type="text" name="last_name" placeholder="Last name*:" value=""   />
                                            <input type="hidden" class="form-control" name="middelnaam" id="middelnaam">
                                            <span class="empty-message">*This field is required.</span>
                                            <span class="error-message">*This is not a valid name.</span>
                                        </label>
                                        <label class="name form-div-1">
                                            <input type="text" name="first_name" placeholder="First name*:" value=""   />
                                            <span class="empty-message">*This field is required.</span>
                                            <span class="error-message">*This is not a valid name.</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <label class="email form-div-1">
                                            <input type="text" name="email" placeholder="Email*:" value=""  />
                                            <span class="empty-message">*This field is required.</span>
                                            <span class="error-message">*This is not a valid email.</span>
                                        </label>
                                        <label class="phone form-div-1">
                                            <input type="text" name="phone" placeholder="Phone*:" value=""  />
                                            <span class="empty-message">*This field is required.</span>
                                            <span class="error-message">*This is not a valid phone.</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <label class="email form-div-1">
                                            <input type="text" name="street_nr" placeholder="Street + number *:" value=""  />
                                            <span class="empty-message">*This field is required.</span>
                                            <span class="error-message">*This is not a valid email.</span>
                                        </label>
                                        <label class="email form-div-1">
                                            <input type="text" name="zip" placeholder="Zipcode *:" value=""  />
                                            <span class="empty-message">*This field is required.</span>
                                            <span class="error-message">*This is not a valid email.</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <label class="email form-div-1">
                                            <input type="text" name="city" placeholder="City *:" value=""  />
                                            <span class="empty-message">*This field is required.</span>
                                            <span class="error-message">*This is not a valid email.</span>
                                        </label>
                                        <label class="email form-div-1">
                                            <input type="text" name="country" placeholder="Country *:" value=""  />
                                            <span class="empty-message">*This field is required.</span>
                                            <span class="error-message">*This is not a valid email.</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <label class="name form-div-1">
                                            <input type="text" name="vat" placeholder="VAT number:" value=""  />
                                            <span class="empty-message">*This field is required.</span>
                                            <span class="error-message">*This is not a valid name.</span>
                                        </label>
                                    </div>
                                </div>

                                <!-- <label class="recaptcha"><span class="empty-message">*This field is required.</span></label> -->
                                <h4>For more questions, please fill in downstairs</h4>

                                <label class="message form-div-4">
                                    <textarea name="message" placeholder="Questions:" data-constraints='@Required @Length(min=20,max=999999)'></textarea>
                                    <span class="empty-message">*This field is required.</span>
                                    <span class="error-message">*The message is too short.</span>
                                </label>

                                <div>
                                    <input type="submit" value="Submit" class="btn-default btn2">
                                    <p>* required fields</p>
                                </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!--footer-->
<div class="container">
    <footer>
        <div class="col-lg-5 col-md-5 col-sm-5">
            <ul class="follow_icon">
                <li><a href="#"><img src="img/follow_icon1.png" alt=""></a></li>
                <li><a href="#"><img src="img/follow_icon2.png" alt=""></a></li>
                <li><a href="#"><img src="img/follow_icon3.png" alt=""></a></li>
                <li><a href="#"><img src="img/follow_icon4.png" alt=""></a></li>
            </ul>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-2 center">
            <figure><img src="img/foo_logo.png" alt=""></figure>
        </div>
        <div class="col-lg-5 col-md-5 col-sm-5">
            <p><span><a href="http://www.coodi.be/" target="_blank">COODI - Webservices</a></span> &copy; <em id="copyright-year"></em></p>
        </div>
    </footer>
</div>
<script src="js/bootstrap.min.js"></script>
<script src="js/tm-scripts.js"></script>
</body>
</html>