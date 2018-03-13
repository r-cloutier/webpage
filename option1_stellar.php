<p style="font-size:30px">&nbsp;&nbsp;&nbsp;<b>Option 1: calculator-derived RV precision</b></p>&nbsp;&nbsp;&nbsp;

<p style="font-size:20px">&nbsp;&nbsp;&nbsp;<b>Spectrograph parameters:</b></p><br>&nbsp;&nbsp;&nbsp;

<FONT COLOR="990000">(optional: select a spectrograph template)&nbsp;&nbsp;&nbsp;</FONT>
<select name="spectrograph">
<option value="nospec">--</option>
<option value="SpectrographFiles/apfinfile.txt">APF</option>
<option value="SpectrographFiles/carmenesirinfile.txt">CARMENES-IR</option>
<option value="SpectrographFiles/carmenesvisinfile.txt">CARMENES-VIS</option>
<option value="SpectrographFiles/coralieinfile.txt">CORALIE</option>
<option value="SpectrographFiles/espressoinfile.txt">ESPRESSO</option>
<option value="SpectrographFiles/expresinfile.txt">EXPRES</option>
<option value="SpectrographFiles/gclefinfile.txt">G-CLEF</option>
<option value="SpectrographFiles/gianoinfile.txt">GIANO</option>
<option value="SpectrographFiles/harpsinfile.txt">HARPS</option>
<option value="SpectrographFiles/harpsninfile.txt">HARPS-N</option>
<option value="SpectrographFiles/hdsinfile.txt">HDS</option>
<option value="SpectrographFiles/hiresinfile.txt">HIRES</option>
<option value="SpectrographFiles/hpfinfile.txt">HPF</option>
<option value="SpectrographFiles/irdinfile.txt">IRD</option>
<option value="SpectrographFiles/ishellinfile.txt">iSHELL</option>
<option value="SpectrographFiles/maroonxinfile.txt">MAROON-X</option>
<option value="SpectrographFiles/minervainfile.txt">MINERVA</option>
<option value="SpectrographFiles/minervaredinfile.txt">MINERVA-Red</option>
<option value="SpectrographFiles/neidinfile.txt">NEID</option>
<option value="SpectrographFiles/nirpsinfile.txt">NIRPS</option>
<option value="SpectrographFiles/nresinfile.txt">NRES</option>
<option value="SpectrographFiles/parasinfile.txt">PARAS</option>
<option value="SpectrographFiles/pepsiinfile.txt">PEPSI</option>
<option value="SpectrographFiles/pfsinfile.txt">PFS</option>
<option value="SpectrographFiles/salthrsinfile.txt">SALT-HRS</option>
<option value="SpectrographFiles/sophieinfile.txt">SOPHIE</option>
<option value="SpectrographFiles/spirouinfile.txt">SPIRou</option>
<option value="SpectrographFiles/wisdominfile.txt">WISDOM</option>
</select>&nbsp;&nbsp;&nbsp;
<input type="submit" name="submit_spec" value="Resolve spectrograph" />

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
    		$maxtelluricin = $data[6];
    		$overheadin = $data[7];

		// get spectral bands
		for ($i=8; $i<=sizeof($data)-1; $i++) {
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
                <td style="padding: 0px 0px 10px 30px;">Telescope aperture (meters) :&nbsp;&nbsp;<input type=i"text" name="aperture" value=<?php echo $_GET['aperture'] ?>  size="10" maxlength="50"/></td>
        </tr>
        <tr>
                <td style="padding: 0px 0px 10px 30px;">Throughput (0-1) :&nbsp;&nbsp;<input type="text" name="throughput" value=<?php echo $_GET['throughput'] ?>  size="10" maxlength="50"/></td>
                <td style="padding: 0px 0px 10px 30px;">Central wavelength for S/N calculation (nm) :&nbsp;&nbsp;<input type="text" name="wlcen" value=<?php echo $_GET['wlcen'] ?>  size="10" maxlength="50"/></td>
        </tr>
        <tr>
                <td style="padding: 0px 0px 10px 30px;">Telluric absorption upper limit (0-1) : <input type="text" name="maxtelluric" value=<?php echo $_GET['maxtelluric'] ?>  size="10" maxlength="50"/></td>
                <td style="padding: 0px 0px 10px 30px;">RV noise floor (m/s) :&nbsp;&nbsp;<input type="text" name="floor" value=<?php echo $_GET['floor'] ?>  size="10" maxlength="50"/></td>
        </tr>
        <tr>
                <td style="padding: 0px 0px 10px 30px;">Overhead (min) :&nbsp;&nbsp;<input type="text" name="overhead" value=<?php echo $_GET['overhead'] ?>  size="10" maxlength="50"/></td>
        </tr>
</table>

<br>&emsp;<input type=submit value="Resolve remaining fields" name="stellar"/>

<br><br><br>
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
                        <td style="padding: 0px 0px 10px 30px;">Rotation period (days) :&nbsp;&nbsp;<input type="text" name="Prot" value="<?php echo isset($_GET['Prot']) ? $_GET['Prot'] : $Prot ?>"  size="10" maxlength="50"/>&ensp;(only required if sampling the RV activity rms)</td>
                    </tr>
</table>



<br>
<p style="font-size:20px">&nbsp;&nbsp;&nbsp;<b>RV noise sources:</b></p><br>&nbsp;&nbsp;&nbsp;
<table>
        <tr>
                <td style="padding: 0px 0px 10px 30px;">Exposure time (sec) :&nbsp;&nbsp;<input type="text" name="texp" value="<?php echo isset($_GET['texp']) ? $_GET['texp'] : $texp ?>"  size="10" maxlength="50"/></td>
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
                <td style="padding: 0px 0px 10px 30px;">Number of GP trials :&nbsp;&nbsp;<input type="text" name="Ntrials" value="<?php echo isset($_GET['Ntrials']) ? $_GET['Ntrials'] : 10 ?>"  size="10" maxlength="50"/>&ensp;(set to zero for the white noise calculation only)</td>
        </tr>
</table>

<br>&emsp;<input type=submit value="Run RVFC" name="runrvfc"/>
