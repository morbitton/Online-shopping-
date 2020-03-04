<?php
//defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
    <head>

        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> 
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <title>Violet || Online Shop</title>

        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/header_footer.css'); ?>"/>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/form.css'); ?>"/>

        <!--Google Font--> 
        <link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
        <!--Local-->  
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.slim.min.js">
        <!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.jss">--> 
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <!--Css Styles--> 
        <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" type="text/css">
        <link rel="stylesheet" href="<?php echo base_url('assets/css/font-awesome.min.css'); ?>" type="text/css">
        <link rel="stylesheet" href="<?php echo base_url('assets/css/nice-select.css'); ?>" type="text/css">
        <link rel="stylesheet" href="<?php echo base_url('assets/css/owl.carousel.min.css'); ?>" type="text/css">
        <link rel="stylesheet" href="<?php echo base_url('assets/css/magnific-popup.css'); ?>" type="text /css">
        <link rel="stylesheet" href="<?php echo base_url('assets/css/slicknav.min.css'); ?>" type="text/css">
        <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>" type="text/css">

        <style>         
            #logout{width:100%;}
            @media only screen and (max-width: 600px) {
                .slicknav_nav{
                    color: black;
                }
            }
        </style>

    </head>
    <body>
        <!-- Page Preloder -->
        <div id="preloder">
            <div class="loader"></div>
        </div>

        <!-- Search model -->
        <div class="search-model">
            <div class="h-100 d-flex align-items-center justify-content-center">
                <div class="search-close-switch">+</div>
                <form class="search-model-form">
                    <input type="text" id="search-input" placeholder="Search here.....">
                </form>
            </div>
        </div>
        <!-- Search model end -->

        <!-- Header Section Begin -->
        <header class="header-section"> 
            <div class="container-fluid">
                <div class="inner-header">
                    <div class="logo">
                        <a href="#"><img src="<?php echo base_url(); ?>assets/img/logo.png" alt=""></a>
                    </div>
                    <div class="header-right" >
                        <img src="<?php echo base_url(); ?>assets/img/icons/search.png" alt="" class="search-trigger">
                    </div>
                    <img id="headerimg" style="margin-top:10px;" src= "<?php echo base_url(); ?>assets/img/slider-1.jpg"/>
                    <nav class="main-menu mobile-menu" style="background-color:whitesmoke;margin-right: 0px; float: right; color:black;">
                        <ul>
                            <li><a id="home"  href="<?php echo site_url(); ?>/Webs_controller/home" style="color:black;">Home</a></li>
                            <li><a id="cart"  href="<?php echo site_url(); ?>/Webs_controller/our_products"style="color:black;" >Cart &nbsp; & &nbsp; Store</a></li>
                            <li><a id="contact" href="<?php echo site_url(); ?>/Webs_controller/contact"style="color:black;" >Contact</a></li>
                            <li><a id="statistic" href="<?php echo site_url(); ?>/Webs_controller/google_pie_chart"style="color:black;">Statistical analysis </a></li>
                            <li id="bye"><?php
                                if ($user != NULL) {
                                    echo '<a id="logout" style="color:black;" href="' . site_url() . '/Login_controller/logout"> Logout</a>';
                                }
                                ?>
                            </li>
                            <li><span  style="color: black; font-size: 16px; display: inline-block; font-weight: 500; position: relative; line-height: 42px; width:100%;" id='logout'> <?php
                                    if ($user != NULL) {echo 'Hey, ' . $user['User_name'];}?></span>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </header>
        <br><br><br><br><br><br>

        <script>
<?php
if ($user == NULL) {
    $val = 0;
}
?>
            var user = "<?= $val ?>";
            user = parseInt(user);
            if (user === 0) {
                document.getElementById('home').style.display = 'none';
                document.getElementById('cart').style.display = 'none';
                document.getElementById('contact').style.display = 'none';
                document.getElementById('statistic').style.display = 'none';
                document.getElementById('bye').style.display = 'none';
            }
            else {
                document.getElementById('home').style.display = 'block';
                document.getElementById('cart').style.display = 'block';
                document.getElementById('contact').style.display = 'block';
                document.getElementById('statistic').style.display = 'block';
                document.getElementById('bye').style.display = 'block';
            }
        </script>


