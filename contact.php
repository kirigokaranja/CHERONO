<!DOCTYPE html>
<html lang="en-US" class="no-js">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Stephane | Home</title>
    <link rel="icon" type="image/ico" href="favicon.ico" />
    <link rel='stylesheet' id='makeup-bootstrap-css'  href='CSS/bootstrap.min.css' type='text/css' media='all' />
    <link rel='stylesheet' id='makeup-animations-css'  href='CSS/animation.css' type='text/css' media='all' />
    <link rel='stylesheet' id='makeup-main-css'  href='CSS/main.css' type='text/css' media='all' />
    <link rel="stylesheet" href="CSS/navbar.css" type="text/css">

</head>

<body class="home page-template page-template-page-templates page-template-full-width page-template-page-templatesfull-width-php page page-id-6 masthead-fixed full-width grid">
<nav class="homenavbar">
    <a href="index.php" style="float: left; padding-top: 0; margin-left: 140px;text-decoration: none"><img src="logo.png"></a>
    <a href="login.php"><button class="loginBtn">Login</button></a>
    <a href="contact.php" style="text-decoration:none">contact</a>
    <a href="#services" style="text-decoration:none">services</a>
    <a href="#works" style="text-decoration:none">works</a>
    <a href="#about_me" style="text-decoration:none">about me</a>
    <a class="active" href="index.php" style="text-decoration:none">Home</a>
</nav>
<section class="fw-main-row  ls ms section_padding_top_40 section_padding_bottom_75 columns_padding_15"  id="contact-form">

    <div class="container">
        <?php
        //get the url
        $url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

        //checking string position
        if(strpos($url,'message=error')){
            echo "<div class=\"alert alert-danger\" style='width: 35%;margin-left: 35%;margin-top: 5%'> An Error Occurred.</div>";
        }else if (strpos($url,'message=sent')) {
            echo "<div class=\"alert alert-success\" style='width: 35%;margin-left: 35%;margin-top: 5%'><strong>Success!</strong> Message sent Successfully.</div>";
        }

        ?>
        <div class="row">

            <div class="col-xs-12 to_animate text-center" data-animation="fadeInUp">
                <div class="with_padding big-padding cs main_color2 with_shadow  parallax" style="background-image:url('IMAGES/stil-243522-unsplash.jpg');">
                    <h2 class="text-center section_header ">
	<span class="  ">Send Me A Message</span>
                    </h2>


                    <hr class="dotted_divider big_dots divider_30 ">

                    <p class="small-text fontsize_18 bottommargin_0">Nairobi, Kenya</p><p>OleSangale Street,<br />1647-01000</p><p class="small-text fontsize_18 bottommargin_0">
                        Phone number</p><p class="fontsize_35">+ 254 756 789</p>


                    <div class="fw-divider-space " style="padding-top: 20px;"></div>
                    <div class="form-wrapper  columns_padding_15  columns_margin_bottom_20">
                        <form data-fw-form-id="fw_form" method="post" action="sendmessage.php" class="fw_form_fw_form" data-fw-ext-forms-type="contact-forms"><input type="hidden" name="fwf" value="fw_form" /><input type="hidden" id="_nonce_e9da186f593cd8426de6700a12c03a19" name="_nonce_e9da186f593cd8426de6700a12c03a19" value="314b72accb" /><input type="hidden" name="_wp_http_referer" value="/makeup/" /><input type="hidden" name="fw_ext_forms_form_type" value="contact-forms" /><input type="hidden" name="fw_ext_forms_form_id" value="91944fca62c421a3c58beecad30ab73c" /><div class="wrap-forms">
                                <div class="row"></div><div class="row"><div class="col-xs-12 col-sm-6 col-md-4 form-builder-item">
                                        <div class="form-group has-placeholder">
                                            <label for="id-1">Name			<sup>*</sup>		</label>
                                            <input class="form-control" type="text" name="name" placeholder="Name" value="" id="id-1" required="required">
                                        </div>
                                    </div><div class="col-xs-12 col-sm-6 col-md-4 form-builder-item">
                                        <div class="form-group has-placeholder">
                                            <label for="id-2">Email			<sup>*</sup>		</label>
                                            <input class="form-control" type="text" name="email" placeholder="Email" value="" id="id-2" required="required">
                                        </div>
                                    </div><div class="col-xs-12 col-sm-6 col-md-4 form-builder-item">
                                        <div class="form-group has-placeholder">
                                            <label for="id-3">Phone			<sup>*</sup>		</label>
                                            <input class="form-control" type="text" name="phone" placeholder="Phone" value="" id="id-3" required="required">
                                        </div>
                                    </div></div><div class="row"><div class="col-xs-12 form-builder-item">
                                        <div class="form-group has-placeholder">
                                            <label for="id-4">Message			<sup>*</sup>		</label>
                                            <textarea class="form-control" name="message" placeholder="Message" id="id-4" required="required" rows="8"></textarea>
                                        </div>
                                    </div></div><div class="row"></div></div><div class="wrap-forms ">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <button type="submit" class="theme_button margin_0">Send Message</button>
                                    </div>
                                </div>
                            </div></form></div>        </div>
            </div>


        </div>
    </div>
</section>

    <section class="ls page_copyright section_padding_top_30 section_padding_bottom_30 table_section table_section_md">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-push-4 text-center">
                    <img src="logo.png">
                </div>
                <div class="col-sm-6 col-md-4 col-md-pull-4 text-center">
                    <p class="small-text">
                        makeup artist                </p>
                </div>
                <div class="col-sm-6 col-md-4 text-center">
                    <p class="small-text">
                        &copy; 2018 Stephanie                </p>
                </div>
            </div>
        </div>
    </section>
    <script type='text/javascript' src='http://webdesign-finder.com/makeup/wp-content/themes/makeup/js/compressed.js?ver=1.0.2'></script>
    <script type='text/javascript' src='http://webdesign-finder.com/makeup/wp-content/themes/makeup/js/plugins.js?ver=1.0.2'></script>
    <script type='text/javascript' src='http://webdesign-finder.com/makeup/wp-content/themes/makeup/js/main.js?ver=1.0.2'></script>
    <script type='text/javascript' src='http://webdesign-finder.com/makeup/wp-includes/js/wp-embed.min.js?ver=4.8.6'></script>
</body>
</html>