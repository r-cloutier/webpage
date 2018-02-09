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
	    <p style="font-size:20px">&nbsp;&nbsp;&nbsp;<b>Spectrograph parameters:</b></p><br>&nbsp;&nbsp;&nbsp;
	    
	    <!-- only add blank spectrograph fields if not resolved the star yet-->
	    <?php if (! isset($_GET['stellar'])) : ?>

	    	<FONT COLOR="990000">(optional: select a spectrograph template)&nbsp;&nbsp;&nbsp;</FONT>
            	<select name="spectrograph">
                    <option value="nospec">--</option>
                    <option value="SpectrographFiles/harpsinfile.txt">HARPS</option>
                    <option value="SpectrographFiles/nirpsinfile.txt">NIRPS</option>
                    <option value="SpectrographFiles/spirouinfile.txt">SPIRou</option>
            	</select>&nbsp;&nbsp;&nbsp;
	        <input type="submit" name="submit_spec" value="Resolve spectrograph" />
	    	<br>
	    	<?php
		    if(isset($_GET['submit_spec'])) {
		    	$spectrograph_input_file = $_GET['spectrograph'];
		    	//echo "You have selected " .$spectrograph_input_file;
			$file = fopen($spectrograph_input_file, 'r');
			$data = fgetcsv($file, filesize($spectrograph_input_file));
			$specname = $data[0];
			$Rin = $data[1];
                        $aperturein = $data[2];
                        $throughputin = $data[3];
                        $floorin = $data[4];
                        $wlcenin = $data[5];
                        $targetsnrin = $data[6];
                        $maxtelluricin = $data[7];
                        $mintexpin = $data[8];
                        $maxtexpin = $data[9];
                        $overheadin = $data[10];

                        // get spectral bands
			for ($i=11; $i<=sizeof($data)-1; $i++) {
			    if ($data[$i] == "U") {
				$Ubandin = "Yes";
			    } elseif ($data[$i] == "B") {
				$Bbandin = "Yes";
                            } elseif ($data[$i] == "V") {
                                $Vbandin = "Yes";
                            } elseif ($data[$i] == "R") {
                                $Rbandin = "Yes";
                            } elseif ($data[$i] == "I") {
                                $Ibandin = "Yes";
                            } elseif ($data[$i] == "Y") {
                                $Ybandin = "Yes";
                            } elseif ($data[$i] == "J") {
                                $Jbandin = "Yes";
                            } elseif ($data[$i] == "H") {
                                $Hbandin = "Yes";
                            } elseif ($data[$i] == "K") {
                                $Kbandin = "Yes";
			    }
			}
			fclose($file);
		    }
	    	?>
			<br>&emsp;&emsp;<input type="checkbox" value="Uband" <?php if ($Ubandin == "Yes") : ?> checked<?php endif; ?> name="Uband">&nbsp;&nbsp;U band
                        <br>&emsp;&emsp;<input type="checkbox" value="Bband" <?php if ($Bbandin == "Yes") : ?> checked<?php endif; ?> name="Bband">&nbsp;&nbsp;B band
                        <br>&emsp;&emsp;<input type="checkbox" value="Vband" <?php if ($Vbandin == "Yes") : ?> checked<?php endif; ?> name="Vband">&nbsp;&nbsp;V band
                        <br>&emsp;&emsp;<input type="checkbox" value="Rband" <?php if ($Rbandin == "Yes") : ?> checked<?php endif; ?> name="Rband">&nbsp;&nbsp;R band
                        <br>&emsp;&emsp;<input type="checkbox" value="Iband" <?php if ($Ibandin == "Yes") : ?> checked<?php endif; ?> name="Iband">&nbsp;&nbsp;I band
                        <br>&emsp;&emsp;<input type="checkbox" value="Yband" <?php if ($Ybandin == "Yes") : ?> checked<?php endif; ?> name="Yband">&nbsp;&nbsp;Y band
                        <br>&emsp;&emsp;<input type="checkbox" value="Jband" <?php if ($Jbandin == "Yes") : ?> checked<?php endif; ?> name="Jband">&nbsp;&nbsp;J band
                        <br>&emsp;&emsp;<input type="checkbox" value="Hband" <?php if ($Hbandin == "Yes") : ?> checked<?php endif; ?> name="Hband">&nbsp;&nbsp;H band
                        <br>&emsp;&emsp;<input type="checkbox" value="Kband" <?php if ($Kbandin == "Yes") : ?> checked<?php endif; ?> name="Kband">&nbsp;&nbsp;K band

		<br><br>
		<table>
		    <tr>
			<td style="padding: 0px 0px 10px 30px;">Spectral resolution (R = &lambda;/&delta;&lambda;) :&nbsp;&nbsp;<input type="text" name="R" value="<?php echo isset($_GET['R']) ? $Rin : $R ?>"  size="10" maxlength="50"/></td>
			<td style="padding: 0px 0px 10px 30px;">Target S/N per resolution element :&nbsp;&nbsp;<input type="text" name="targetsnr" value="<?php echo isset($_GET['targetsnr']) ? $targetsnrin : $targetsnr ?>"  size="10" maxlength="50"/></td>
		    </tr>
		    <tr>
			<td style="padding: 0px 0px 10px 30px;">Telescope aperture (meters) :&nbsp;&nbsp;<input type=i"text" name="aperture" value="<?php echo isset($_GET['aperture']) ? $aperturein : $aperture ?>"  size="10" maxlength="50"/></td>
			<td style="padding: 0px 0px 10px 30px;">Telluric absorption upper limit (0-1) : <input type="text" name="maxtelluric" value="<?php echo isset($_GET['maxtelluric']) ? $maxtelluricin : $maxtelluric ?>"  size="10" maxlength="50"/></td>
		    </tr>
		    <tr>
               		<td style="padding: 0px 0px 10px 30px;">Throughput (0-1) :&nbsp;&nbsp;<input type="text" name="throughput" value="<?php echo isset($_GET['throughput']) ? $throughputin : $throughput ?>"  size="10" maxlength="50"/></td>
			<td style="padding: 0px 0px 10px 30px;">Minimum exposure time (min) : <input type="text" name="mintexp" value="<?php echo isset($_GET['mintexp']) ? $mintexpin : $mintexp ?>"  size="10" maxlength="50"/></td>
		    </tr>
		    <tr>
			<td style="padding: 0px 0px 10px 30px;">RV noise floor (m/s) :&nbsp;&nbsp;<input type="text" name="floor" value="<?php echo isset($_GET['floor']) ? $floorin : $floor ?>"  size="10" maxlength="50"/></td>
			<td style="padding: 0px 0px 10px 30px;">Maximum exposure time (min) : <input type="text" name="maxtexp" value="<?php echo isset($_GET['maxtexp']) ? $maxtexpin : $maxtexp ?>"  size="10" maxlength="50"/></td>
		    </tr>
		    <tr>
                	<td style="padding: 0px 0px 10px 30px;">Central wavelength for S/N calculation (nm) :&nbsp;&nbsp;<input type="text" name="wlcen" value="<?php echo isset($_GET['wlcen']) ? $wlcenin : $wlcen ?>"  size="10" maxlength="50"/></td>
                	<td style="padding: 0px 0px 10px 30px;">Overhead (min) :&nbsp;&nbsp;<input type="text" name="overhead" value="<?php echo isset($_GET['overhead']) ? $overheadin : $overhead ?>"  size="10" maxlength="50"/></td>
		    </tr>
		</table>
        	<br>&emsp;<input type=submit value="Resolve remaining fields" name="stellar"/>
	        <?php endif; ?>


            <!-- add all sections if star is resolved-->
	    <?php if (isset($_GET['stellar'])) : ?>

                <FONT COLOR="990000">(optional: select a spectrograph template)&nbsp;&nbsp;&nbsp;</FONT>
                <select name="spectrograph">
                    <option value="nospec">--</option>
                    <option value="SpectrographFiles/harpsinfile.txt">HARPS</option>
                    <option value="SpectrographFiles/nirpsinfile.txt">NIRPS</option>
                    <option value="SpectrographFiles/spirouinfile.txt">SPIRou</option>
                </select>&nbsp;&nbsp;&nbsp;
                <input type="submit" name="submit_spec" value="Resolve spectrograph" />
                <br>
                <?php
                    if(isset($_GET['submit_spec'])) {
                        $spectrograph_input_file = $_GET['spectrograph'];
                        $file = fopen($spectrograph_input_file, 'r');
                        $data = fgetcsv($file, filesize($spectrograph_input_file));
			$specname = $data[0];
                        $Rin = $data[1];
                        $aperturein = $data[2];
                        $throughputin = $data[3];
                        $floorin = $data[4];
                        $wlcenin = $data[5];
                        $targetsnrin = $data[6];
                        $maxtelluricin = $data[7];
                        $mintexpin = $data[8];
                        $maxtexpin = $data[9];
                        $overheadin = $data[10];

                        // get spectral bands
                        for ($i=11; $i<=sizeof($data)-1; $i++) {
                            if ($data[$i] == "U") {
                                $Ubandin = "Yes";
                            } elseif ($data[$i] == "B") {
                                $Bbandin = "Yes";
                            } elseif ($data[$i] == "V") {
                                $Vbandin = "Yes";
                            } elseif ($data[$i] == "R") {
                                $Rbandin = "Yes";
                            } elseif ($data[$i] == "I") {
                                $Ibandin = "Yes";
                            } elseif ($data[$i] == "Y") {
                                $Ybandin = "Yes";
                            } elseif ($data[$i] == "J") {
                                $Jbandin = "Yes";
                            } elseif ($data[$i] == "H") {
                                $Hbandin = "Yes";
                            } elseif ($data[$i] == "K") {
                                $Kbandin = "Yes";
                            }
                        }
                        fclose($file);
                    }
                ?>
                        <br>&emsp;&emsp;<input type="checkbox" value="Uband" <?php if (isset($_GET['Uband'])) : ?> checked<?php endif; ?> name="Uband">&nbsp;&nbsp;U band
                        <br>&emsp;&emsp;<input type="checkbox" value="Bband" <?php if (isset($_GET['Bband'])) : ?> checked<?php endif; ?> name="Bband">&nbsp;&nbsp;B band
                        <br>&emsp;&emsp;<input type="checkbox" value="Vband" <?php if (isset($_GET['Vband'])) : ?> checked<?php endif; ?> name="Vband">&nbsp;&nbsp;V band
                        <br>&emsp;&emsp;<input type="checkbox" value="Rband" <?php if (isset($_GET['Rband'])) : ?> checked<?php endif; ?> name="Rband">&nbsp;&nbsp;R band
                        <br>&emsp;&emsp;<input type="checkbox" value="Iband" <?php if (isset($_GET['Iband'])) : ?> checked<?php endif; ?> name="Iband">&nbsp;&nbsp;I band
                        <br>&emsp;&emsp;<input type="checkbox" value="Yband" <?php if (isset($_GET['Yband'])) : ?> checked<?php endif; ?> name="Yband">&nbsp;&nbsp;Y band
                        <br>&emsp;&emsp;<input type="checkbox" value="Jband" <?php if (isset($_GET['Jband'])) : ?> checked<?php endif; ?> name="Jband">&nbsp;&nbsp;J band
                        <br>&emsp;&emsp;<input type="checkbox" value="Hband" <?php if (isset($_GET['Hband'])) : ?> checked<?php endif; ?> name="Hband">&nbsp;&nbsp;H band
                        <br>&emsp;&emsp;<input type="checkbox" value="Kband" <?php if (isset($_GET['Kband'])): ?> checked<?php endif; ?> name="Kband">&nbsp;&nbsp;K band

                <br><br>
                <table>
                    <tr>
                        <td style="padding: 0px 0px 10px 30px;">Spectral resolution (R = &lambda;/&delta;&lambda;) :&nbsp;&nbsp;<input type="text" name="R" value=<?php echo $_GET['R'] ?>  size="10" maxlength="50"/></td>
                        <td style="padding: 0px 0px 10px 30px;">Target S/N per resolution element :&nbsp;&nbsp;<input type="text" name="targetsnr" value="<?php echo $_GET['targetsnr'] ?>"  size="10" maxlength="50"/></td>
                    </tr>
                    <tr>
                        <td style="padding: 0px 0px 10px 30px;">Telescope aperture (meters) :&nbsp;&nbsp;<input type=i"text" name="aperture" value="<?php echo $_GET['aperture'] ?>"  size="10" maxlength="50"/></td>
                        <td style="padding: 0px 0px 10px 30px;">Telluric absorption upper limit (0-1) : <input type="text" name="maxtelluric" value="<?php echo $_GET['maxtelluric'] ?>"  size="10" maxlength="50"/></td>
                    </tr>
                    <tr>
                        <td style="padding: 0px 0px 10px 30px;">Throughput (0-1) :&nbsp;&nbsp;<input type="text" name="throughput" value="<?php echo $_GET['throughput'] ?>"  size="10" maxlength="50"/></td>
                        <td style="padding: 0px 0px 10px 30px;">Minimum exposure time (min) : <input type="text" name="mintexp" value="<?php echo $_GET['mintexp'] ?>"  size="10" maxlength="50"/></td>
                    </tr>
                    <tr>
                        <td style="padding: 0px 0px 10px 30px;">RV noise floor (m/s) :&nbsp;&nbsp;<input type="text" name="floor" value="<?php echo $_GET['floor'] ?>"  size="10" maxlength="50"/></td>
                        <td style="padding: 0px 0px 10px 30px;">Maximum exposure time (min) : <input type="text" name="maxtexp" value="<?php echo $_GET['maxtexp'] ?>"  size="10" maxlength="50"/></td>
                    </tr>
                    <tr>
                        <td style="padding: 0px 0px 10px 30px;">Central wavelength for S/N calculation (nm) :&nbsp;&nbsp;<input type="text" name="wlcen" value="<?php echo $_GET['wlcen'] ?>"  size="10" maxlength="50"/></td>
                        <td style="padding: 0px 0px 10px 30px;">Overhead (min) :&nbsp;&nbsp;<input type="text" name="overhead" value="<?php echo$_GET['overhead'] ?>"  size="10" maxlength="50"/></td>
                    </tr>
                </table>
                <br>&emsp;<input type=submit value="Resolve remaining fields" name="stellar"/>

		<br><br>
                <p style="font-size:20px">&nbsp;&nbsp;&nbsp;<b>Planet parameters:</b></p><br>&nbsp;&nbsp;&nbsp;
                <table>
                    <tr>
                        <td style="padding: 0px 0px 10px 30px;">Orbital period (days) :&nbsp;&nbsp;<input type="text" name="P" value="<?php echo isset($_GET['P']) ? $_GET['P'] : $P ?>"  size="10" maxlength="50"/></td>
                    </tr>
                    <tr>
                        <td style="padding: 0px 0px 10px 30px;">Planetary radius (R<sub>&#x02295;</sub>) :&nbsp;&nbsp;<input type="text" name="rp" value="<?php echo isset($_GET['rp']) ? $_GET['rp'] : $rp ?>"  size="10" maxlength="50"/></td>
                    </tr>
                    <tr>
                        <td style="padding: 0px 0px 10px 30px;">Planetary mass (M<sub>&#x02295;</sub>) :&nbsp;&nbsp;<input type="text" name="mp" value="<?php echo isset($_GET['mp']) ? $_GET['mp'] : $rp ?>"  size="10" maxlength="50"/>&ensp;(leave blank to estimate the planetary mass from its radius)</td>
                    </tr>
                </table>

		<!--add stellar parameters-->
		<br>
                <p style="font-size:20px">&nbsp;&nbsp;&nbsp;<b>Stellar parameters:</b></p><br>&nbsp;&nbsp;&nbsp;
		<table>
		     <?php if (isset($_GET['Uband'])) : ?>
			<tr>
			    <td style="padding: 0px 0px 10px 30px;">U :&nbsp;&nbsp;<input type="text" name="Umag" value="<?php echo isset($_GET['Umag']) ? $_GET['Umag'] : $Umag ?>"  size="10" maxlength="50"/></td>
			</tr>
		    <?php endif; ?>
              	    <?php if (isset($_GET['Bband'])) : ?>
                        <tr>
                            <td style="padding: 0px 0px 10px 30px;">B :&nbsp;&nbsp;<input type="text" name="Bmag" value="<?php echo isset($_GET['Bmag']) ? $_GET['Bmag'] : $Bmag ?>"  size="10" maxlength="50"/></td>
                        </tr>
                    <?php endif; ?>
                    <?php if (isset($_GET['Vband'])) : ?>
                       	<tr>
                            <td style="padding: 0px 0px 10px 30px;">V :&nbsp;&nbsp;<input type="text" name="Vmag" value="<?php echo isset($_GET['Vmag']) ? $_GET['Vmag'] : $Vmag ?>"  size="10" maxlength="50"/></td>
                        </tr>                    
		    <?php endif; ?>
                    <?php if (isset($_GET['Rband'])) : ?>
                        <tr>
                            <td style="padding: 0px 0px 10px 30px;">R :&nbsp;&nbsp;<input type="text" name="Rmag" value="<?php echo isset($_GET['Rmag']) ? $_GET['Rmag'] : $Rmag ?>"  size="10" maxlength="50"/></td>
                        </tr>
                    <?php endif; ?>
                    <?php if (isset($_GET['Iband'])) : ?>
                        <tr>
                            <td style="padding: 0px 0px 10px 30px;">I :&nbsp;&nbsp;<input type="text" name="Imag" value="<?php echo isset($_GET['Imag']) ? $_GET['Imag'] : $Imag ?>"  size="10" maxlength="50"/></td>
                        </tr>
                    <?php endif; ?>
                    <?php if (isset($_GET['Yband'])) : ?>
                        <tr>
                            <td style="padding: 0px 0px 10px 30px;">Y :&nbsp;&nbsp;<input type="text" name="Ymag" value="<?php echo isset($_GET['Ymag']) ? $_GET['Ymag'] : $Ymag ?>"  size="10" maxlength="50"/></td>
                        </tr>                    
                    <?php endif; ?>
                    <?php if (isset($_GET['Jband'])) : ?>
                        <tr>
                            <td style="padding: 0px 0px 10px 30px;">J :&nbsp;&nbsp;<input type="text" name="Jmag" value="<?php echo isset($_GET['Jmag']) ? $_GET['Jmag'] : $Jmag ?>"  size="10" maxlength="50"/></td>
                        </tr>                    
                    <?php endif; ?>
                    <?php if (isset($_GET['Hband'])) : ?>
                        <tr>
                            <td style="padding: 0px 0px 10px 30px;">H :&nbsp;&nbsp;<input type="text" name="Hmag" value="<?php echo isset($_GET['Hmag']) ? $_GET['Hmag'] : $Hmag ?>"  size="10" maxlength="50"/></td>
                        </tr>                    
                    <?php endif; ?>
                    <?php if (isset($_GET['Kband'])) : ?>
                        <tr>
                            <td style="padding: 0px 0px 10px 30px;">K :&nbsp;&nbsp;<input type="text" name="Kmag" value="<?php echo isset($_GET['Kmag']) ? $_GET['Kmag'] : $Kmag ?>"  size="10" maxlength="50"/></td>
                        </tr>                    
                    <?php endif; ?>
		</table>
		<table>

		<?php if (!isset($_GET['Uband']) &&
			  !isset($_GET['Bband']) &&
                          !isset($_GET['Vband']) &&
                          !isset($_GET['Rband']) &&
                          !isset($_GET['Iband']) &&
                          !isset($_GET['Yband']) &&
                          !isset($_GET['Jband']) &&
                          !isset($_GET['Hband']) &&
                          !isset($_GET['Kband'])) {
		    echo "No spectral bands selected!";
		    }
		?>

		    <tr>
                        <td style="padding: 0px 0px 10px 30px;">Stellar mass (M<sub>&#x02299;</sub>) :&nbsp;&nbsp;<input type="text" name="Ms" value="<?php echo isset($_GET['Ms']) ? $_GET['Ms'] : $Ms ?>"  size="10" maxlength="50"/></td>
                        <td style="padding: 0px 0px 10px 30px;">Stellar radius (R<sub>&#x02299;</sub>) : <input type="text" name="Rs" value="<?php echo isset($_GET['Rs']) ? $_GET['Rs'] : $Rs ?>"  size="10" maxlength="50"/></td>
                    </tr>
                    <tr>
                        <td style="padding: 0px 0px 10px 30px;">Effective temperature (K) :&nbsp;&nbsp;<input type="text" name="Teff" value="<?php echo isset($_GET['Teff']) ? $_GET['Teff'] : $Teff ?>"  size="10" maxlength="50"/></td>
                        <td style="padding: 0px 0px 10px 30px;">Metallicity ([Fe/H]) : <input type="text" name="Z" value="<?php echo isset($_GET['Z']) ? $_GET['Z'] : $Z ?>"  size="10" maxlength="50"/></td>
                    </tr>
                    <tr>
                        <td style="padding: 0px 0px 10px 30px;">Projected rotation velocity (km/s) :&nbsp;&nbsp;<input type="text" name="vsini" value="<?php echo isset($_GET['vsini']) ? $_GET['vsini'] : $vsini ?>"  size="10" maxlength="50"/></td>
                        <td style="padding: 0px 0px 10px 30px;">Rotation period (days) :&nbsp;&nbsp;<input type="text" name="Prot" value="<?php echo isset($_GET['Prot']) ? $_GET['Prot'] : $Prot ?>"  size="10" maxlength="50"/></td>
                    </tr>
                </table>

                <br>
                <p style="font-size:20px">&nbsp;&nbsp;&nbsp;<b>RV noise sources:</b></p><br>&nbsp;&nbsp;&nbsp;
                <table>
                    <tr>
                        <td style="padding: 0px 0px 10px 30px;">Photon-noise limited RV precision (m/s) :&nbsp;&nbsp;<input type="text" name="sigRVphot" value="<?php echo isset($_GET['sigRVphot']) ? $_GET['sigRVphot'] : $sigRVphot ?>"  size="10" maxlength="50"/>&ensp;(leave blank to compute from a <a style="color:red" href="ftp://phoenix.astro.physik.uni-goettingen.de/HiResFITS">PHOENIX</a> model stellar spectrum)</td>
                    </tr>
                    <tr>
                        <td style="padding: 0px 0px 10px 30px;">RV activity rms (m/s) :&nbsp;&nbsp;<input type="text" name="sigRVact" value="<?php echo isset($_GET['sigRVact']) ? $_GET['sigRVact'] : $sigRVact ?>"  size="10" maxlength="50"/>&ensp;(leave blank to sample from an appropriate empirical distribution)</td>
                    </tr>
                    <tr>
                        <td style="padding: 0px 0px 10px 30px;">RV rms from additional planets (m/s) :&nbsp;&nbsp;<input type="text" name="sigRVplanets" value="<?php echo isset($_GET['sigRVplanets']) ? $_GET['sigRVplanets'] : $sigRVplanets ?>"  size="10" maxlength="50"/>&ensp;(leave blank to sample from an appropriate empirical distribution)</td>
                    </tr>
                    <tr>
                        <td style="padding: 0px 0px 10px 30px;">Effective RV rms (m/s) :&nbsp;&nbsp;<input type="text" name="sigRVeff" value="<?php echo isset($_GET['sigRVeff']) ? $_GET['sigRVeff'] : $sigRVplanets ?>"  size="10" maxlength="50"/>&ensp;(leave blank to compute from the above RV noise sources)</td>
                    </tr>
                </table>

		<br>
                <p style="font-size:20px">&nbsp;&nbsp;&nbsp;<b>Simulation parameters:</b></p><br>&nbsp;&nbsp;&nbsp;
                <table>
                    <tr>
                        <td style="padding: 0px 0px 10px 30px;">Desired K detection signficance (K/&sigma;<sub>K</sub>) :&nbsp;&nbsp;<input type="text" name="Kdetsig" value="<?php echo isset($_GET['Kdetsig']) ? $_GET['Kdetsig'] : 3 ?>"  size="10" maxlength="50"/></td>
                    </tr>
                    <tr>
                        <td style="padding: 0px 0px 10px 30px;">Number of trials :&nbsp;&nbsp;<input type="text" name="Ntrials" value="<?php echo isset($_GET['Ntrials']) ? $_GET['Ntrials'] : 100 ?>"  size="10" maxlength="50"/></td>
                    </tr>
                </table>
                <br>&emsp;<input type=submit value="Submit" name="submit"/>
	    <?php endif; ?>

	    </form>
            <!-- ========= END CALCULATOR FORM=========-->


            <!-- ========= BEGIN CALCULATOR FUNCTION=========-->
	    <?php
		if (isset($_GET['submit'])) {

		    // get bands    
		    $bands = array();
		    if (isset($_GET['Uband'])) {array_push($bands, "U");}
		    if (isset($_GET['Bband'])) {array_push($bands, "B");}
                    if (isset($_GET['Vband'])) {array_push($bands, "V");}
                    if (isset($_GET['Rband'])) {array_push($bands, "R");}
                    if (isset($_GET['Iband'])) {array_push($bands, "I");}
                    if (isset($_GET['Yband'])) {array_push($bands, "Y");}
                    if (isset($_GET['Jband'])) {array_push($bands, "J");}
                    if (isset($_GET['Hband'])) {array_push($bands, "H");}
                    if (isset($_GET['Kband'])) {array_push($bands, "K");}

		    // get mags
                    $mags = array();
                    if (isset($_GET['Umag'])) {array_push($mags, $_GET['Umag']);}
                    if (isset($_GET['Bmag'])) {array_push($mags, $_GET['Bmag']);}
                    if (isset($_GET['Vmag'])) {array_push($mags, $_GET['Umag']);}
                    if (isset($_GET['Rmag'])) {array_push($mags, $_GET['Rmag']);}
                    if (isset($_GET['Imag'])) {array_push($mags, $_GET['Imag']);}
                    if (isset($_GET['Ymag'])) {array_push($mags, $_GET['Ymag']);}
                    if (isset($_GET['Jmag'])) {array_push($mags, $_GET['Jmag']);}
                    if (isset($_GET['Hmag'])) {array_push($mags, $_GET['Hmag']);}
                    if (isset($_GET['Kmag'])) {array_push($mags, $_GET['Kmag']);}

		    // get spectrograph
		    $R = $_GET['R'];
                    $aperture = $_GET['aperture'];
                    $throughput = $_GET['throughput'];
                    $floor = $_GET['floor'];
                    $wlcen = $_GET['wlcen'];
                    $targetsnr = $_GET['targetsnr'];
                    $maxtelluric = $_GET['maxtelluric'];
                    $mintexp = $_GET['mintexp'];
                    $maxtexp = $_GET['maxtexp'];
                    $overhead = $_GET['overhead'];

		    // get RV noise
                    $sigRVphot = $_GET['sigRVphot'];
                    $sigRVact = $_GET['sigRVact'];
                    $sigRVplanets = $_GET['sigRVplanets'];
                    $sigRVeff = $_GET['sigRVeff'];

		    // get planet
                    $P = $_GET['P'];
                    $rp = $_GET['rp'];
                    $mp = $_GET['mp'];

		    // get star
                    $Ms = $_GET['Ms'];
                    $Rs = $_GET['Rs'];
                    $Teff = $_GET['Teff'];
                    $Z = $_GET['Z'];
                    $vsini = $_GET['vsini'];
                    $Prot = $_GET['Prot'];

		    // get simulation 
		    $Kdetsig = $_GET['Kdetsig'];
		    $Ntrials = $_GET['Ntrials'];

		    // set blank values
		    //if (! is_numeric($mp)) {$mp}
		
		    // call calculator
		    $command = "python nRV_calculator $bands $R $aperture $throughput $floor $wlcen $targetsnr $maxtelluric $mintexp $maxtexp $overhead $sigRVphot $sigRVact $sigRVplanets $sigRVeff $P $rp $mp $mags $Ms $Rs $Teff $Z $vsini $Prot $Kdetsig $ $Ntrials";
		    //exec($command);

		}
	    ?>

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
