<p style="font-size:30px">&nbsp;&nbsp;&nbsp;<b>Option 2: user-specified RV precision</b></p>&nbsp;&nbsp;&nbsp;

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
	<tr>
		<td style="padding: 0px 0px 10px 30px;">Stellar mass (M<sub>&#x02299;</sub>) :&nbsp;&nbsp;<input type="text" name="Ms" value="<?php echo isset($_GET['Ms']) ? $_GET['Ms'] : $Ms ?>"  size="10" maxlength="50"/></td>
	</tr>
	<tr>
		<td style="padding: 0px 0px 10px 30px;">Effective temperature (K) :&nbsp;&nbsp;<input type="text" name="Teff" value="<?php echo isset($_GET['Teff']) ? $_GET['Teff'] : $Teff ?>"  size="10" maxlength="50"/>&ensp;(only required if sampling either the RV activity rms or RV rms from additional planets)</td>
        </tr>
	<tr>
		<td style="padding: 0px 0px 10px 30px;">Rotation period (days) :&nbsp;&nbsp;<input type="text" name="Prot" value="<?php echo isset($_GET['Prot']) ? $_GET['Prot'] : $Prot ?>"  size="10" maxlength="50"/>&ensp;(only required if sampling the RV activity rms)</td>
        </tr>
</table>

<br>
<p style="font-size:20px">&nbsp;&nbsp;&nbsp;<b>RV noise sources:</b></p><br>&nbsp;&nbsp;&nbsp;
<table>
	<tr>
		<td style="padding: 0px 0px 10px 30px;">Exposure time (min) :&nbsp;&nbsp;<input type="text" name="texp" value="<?php echo isset($_GET['texp']) ? $_GET['texp'] : $texp ?>"  size="10" maxlength="50"/></td>
	</tr>
	<tr>
		<td style="padding: 0px 0px 10px 30px;">Photon-noise limited RV precision (m/s) :&nbsp;&nbsp;<input type="text" name="sigRVphot" value="<?php echo isset($_GET['sigRVphot']) ? $_GET['sigRVphot'] : $sigRVphot ?>"  size="10" maxlength="50"/></td>
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
