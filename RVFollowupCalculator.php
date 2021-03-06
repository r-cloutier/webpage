<!doctype html>
<!--
	Template:	 Unika - Responsive One Page HTML5 Template
	Author:		 imransdesign.com
	URL:		 http://imransdesign.com/
    Designed By: https://www.behance.net/poljakova
	Version:	1.0	
-->
<html lang="en-US">

<style>
table {
    border-spacing: 50px;
    width: 80%;
}

td, th {
    text-align: left;
}
</style>

	<head>

		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>RV Follow-up Calculator</title>-->
		<!--<meta name="description" content="Ryan Cloutier Webpage">
		<meta name="keywords" content="Ryan, Cloutier, Astronomy, Astrophysics, Toronto, Montr&eacute;al" />
		<meta name="author" content="imransdesign.com">-->

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
        
        <!-- Google Fonts  -->
		<link href='http://fonts.googleapis.com/css?family=Roboto:400,700,500' rel='stylesheet' type='text/css'> <!-- Body font -->
		<link href='http://fonts.googleapis.com/css?family=Lato:300,400' rel='stylesheet' type='text/css'> <!-- Navbar font -->

		<!-- Libs and Plugins CSS -->
		<link rel="stylesheet" href="inc/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="inc/animations/css/animate.min.css">
		<link rel="stylesheet" href="inc/font-awesome/css/font-awesome.min.css"> <!-- Font Icons -->
		<link rel="stylesheet" href="inc/owl-carousel/css/owl.carousel.css">
		<link rel="stylesheet" href="inc/owl-carousel/css/owl.theme.css">

		<!-- Theme CSS -->
        <link rel="stylesheet" href="css/reset.css">
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="css/mobile.css">

		<!-- Skin CSS -->
		<link rel="stylesheet" href="css/skin/red-dwarfs.css">

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

	</head>

    <body data-spy="scroll" data-target="#main-navbar">
        <div class="page-loader"></div>  <!-- Display loading image while page loads -->
    	<div class="body">
        
            <!--========== BEGIN HEADER ==========-->
            <header id="header" class="header-main">

                <!-- Begin Navbar -->
                <nav id="main-navbar" class="navbar navbar-default navbar-fixed-top" role="navigation"> <!-- Classes: navbar-default, navbar-inverse, navbar-fixed-top, navbar-fixed-bottom, navbar-transparent. Note: If you use non-transparent navbar, set "height: 98px;" to #header -->

                  <div class="container">

                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
             		<a class="navbar-brand" href="index.html"><font style="color:#fff">Ryan Cloutier</font></a>
		        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                      </button>
                      <!--<a class="navbar-brand page-scroll" href="index.html">Ryan Cloutier</a>-->
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav navbar-right">
                            <li><a class="page-scroll" href="index.html">Home</a></li>
                            <li><a class="page-scroll" href="index.html#about-section">About</a></li>
                            <li><a class="page-scroll" href="index.html#research-section">Research</a></li>
                            <li><a class="page-scroll" href="index.html#cv-section">CV</a></li>
                            <li><a class="page-scroll" href="index.html#contact-section">Contact</a></li>
                            <li><a href="RVFollowupCalculator.php">RVFC</a></li>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                  </div><!-- /.container -->
                </nav>
                <!-- End Navbar -->

            </header>
            <!-- ========= END HEADER =========-->

	    
            <!-- ========== BEGIN CALCULATOR FORM======== -->
	    <br><br><br><br><br>
            <form action="http://astro.utoronto.ca/~cloutier/RVFollowupCalculator.php" method="get" >
	    &nbsp;&nbsp;&nbsp;<input type="submit" name="submit_calculate_sigRV_phot" value="Option 1: calculator-derived RV precision" />
	    <br/><br/>
	    &nbsp;&nbsp;&nbsp;<input type="submit" name="submit_set_sigRV_phot" value="Option 2: user-specified RV precision" />
	    <br/><br/>
            &nbsp;&nbsp;&nbsp;<input type="submit" name="submit_upload_fields" value="Option 3: upload input file" />

            <!-- Calculate sigRV using the calculator -->
            <?php if (isset($_GET['submit_calculate_sigRV_phot']) && ! isset($_GET['submit_spec'])) : ?>
                 <?php include 'option1.php'; ?>
            <?php endif; ?>

            <?php if (isset($_GET['submit_spec']) && ! isset($_GET['stellar'])) : ?>
                <?php include 'option1_withspectrograph.php'; ?>
            <?php endif; ?>

            <?php if (isset($_GET['stellar'])) : ?>
                <?php include 'option1_stellar.php'; ?>
            <?php endif; ?>


            <!-- Ask user to specify sigRV instead of calculating it -->
            <?php if (isset($_GET['submit_set_sigRV_phot'])) : ?>
                 <?php include 'option2.php'; ?>
            <?php endif; ?>


	    <!-- Upload file for a particular calcuation -->
	    <?php if (isset($_GET['submit_upload_fields']) || isset($_GET['submit_upload'])) : ?>
                 <?php include 'option3.php'; ?>
            <?php endif; ?>


	    <!-- Run the RVFC -->
	    <?php if (isset($_GET['runrvfc'])) : ?>
		<?php include 'runRVFC.php'; ?>
	    <?php endif; ?>
	    </form>
	    <!-- ========= END CALCULATOR FUNCTION=========-->


            <!-- Begin footer -->
                <div class="footer">
                    <div class="container text-center wow fadeIn" data-wow-delay="0.4s">
                        <!--<p class="copyright">Copyright &copy; 2015 - Designed By <a href="https://www.behance.net/poljakova" class="theme-author">Veronika Poljakova</a> &amp; Developed by <a href="http://www.imransdesign.com/" class="theme-author">Imransdesign</a></p>-->
                    </div>
		</div>
            </footer>
            <!-- End footer -->

            <!--<a href="#" class="scrolltotop"><i class="fa fa-arrow-up"></i></a> Scroll to top button -->
                                              
        
        
        
        <!-- Plugins JS -->
		<script src="inc/jquery/jquery-1.11.1.min.js"></script>
		<script src="inc/bootstrap/js/bootstrap.min.js"></script>
		<script src="inc/owl-carousel/js/owl.carousel.min.js"></script>
		<script src="inc/stellar/js/jquery.stellar.min.js"></script>
		<script src="inc/animations/js/wow.min.js"></script>
        <script src="inc/waypoints.min.js"></script>
		<script src="inc/isotope.pkgd.min.js"></script>
		<script src="inc/classie.js"></script>
		<script src="inc/jquery.easing.min.js"></script>
		<script src="inc/jquery.counterup.min.js"></script>
		<script src="inc/smoothscroll.js"></script>

		<!-- Theme JS -->
		<script src="js/theme.js"></script>

    </body> 
        
            
</html>
