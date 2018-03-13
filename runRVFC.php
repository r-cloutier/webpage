<p style="font-size:30px">&nbsp;&nbsp;&nbsp;<b>RVFC Results:</b></p>&nbsp;&nbsp;&nbsp;

<?php 
	function RV_K($P, $Ms, $mp) {
		$G = 6.67408e-11;
		$pi = 3.141592653589;
		$MSun2kg = 1.98855e30;
		$MEarth2kg = 5.972e24;
		$days2sec = 86400.;
		$K = pow(2*$pi*$G/($Ms*$Ms*$MSun2kg*$MSun2kg*$P*$days2sec),1./3) * $MEarth2kg*$mp;
		return $K;
	}
?>

<table>
	<tr>
		<td style="padding: 5px 10px; font-size:20px" width="22%"><b>Planet parameters:</b></td>
		<td></td>
                <td style="padding: 5px 10px; font-size:20px" width="22%"><b>Stellar parameters:</b></td>
		<td></td>
                <td style="padding: 5px 10px; font-size:20px" width="22%"><b>RV noise sources:</b></td>
                <td></td>
	</tr>
        <tr>
                <td style="padding: 5px 10px;" width="22%">Orbital period</td>
		<td style="padding: 5px 10px;" width="11%"><?php echo $_GET['P']; ?> days</td>
                <td style="padding: 5px 10px;" width="22%">Stellar mass</td>
                <td style="padding: 5px 10px;" width="11%"><?php echo $_GET['Ms']; ?> M<sub>&#x02299;</sub></td>
                <td style="padding: 5px 10px;" width="22%">Exposure time</td>
                <td style="padding: 5px 10px;" width="11%"><?php echo $_GET['texp']; ?> min</td>
        </tr>
        <tr>
                <td style="padding: 5px 10px;" width="22%">Planetary radius</td>
                <td style="padding: 5px 10px;" width="11%"><?php echo $_GET['rp']; ?> R<sub>&#x02295;</sub></td>
        	<td style="padding: 5px 10px;" width="22%">Stellar radius</td>
		<?php if (floatval($_GET['Rs']) > 0) : ?>
                	<td style="padding: 5px 10px;" width="11%"><?php echo $_GET['Rs']; ?> R<sub>&#x02299;</sub></td>
		<?php else: ?>
                        <td style="padding: 5px 10px;" width="11%">-</td>
		<?php endif; ?>
                <td style="padding: 5px 10px;" width="22%">Photon-noise limited RV precision</td>
                <td style="padding: 5px 10px;" width="11%"><?php echo $_GET['sigRVphot']; ?> m/s</td>
        </tr>
        <tr>
                <td style="padding: 5px 10px;" width="22%">Planetary mass</td>
                <td style="padding: 5px 10px;" width="11%"><?php echo $_GET['mp']; ?> M<sub>&#x02295;</sub></td>
                <td style="padding: 5px 10px;" width="22%">Effective temperature</td>
                <?php if (floatval($_GET['Teff']) > 0) : ?>
                        <td style="padding: 5px 10px;" width="11%"><?php echo $_GET['Teff']; ?> K</td>
		<?php else: ?>
			<td style="padding: 5px 10px;" width="11%">-</td>
                <?php endif; ?>
                <td style="padding: 5px 10px;" width="22%">RV activity rms</td>
                <td style="padding: 5px 10px;" width="11%"><?php echo $_GET['sigRVact']; ?> m/s</td>
        </tr>
        <tr>
                <td style="padding: 5px 10px;" width="22%">RV semi-amplitude</td>
                <td style="padding: 5px 10px;" width="11%"><?php echo number_format(RV_K($_GET['P'],$_GET['Ms'],$_GET['mp']),2,'.',''); ?> m/s</td>
		<td style="padding: 5px 10px;" width="22%">Metallicity</td>
                <?php if ($_GET['Z'] != "") : ?>
                        <td style="padding: 5px 10px;" width="11%"><?php echo $_GET['Z']; ?> [Fe/H]</td>
                <?php else: ?>
			<td style="padding: 5px 10px;" width="11%">-</td>
                <?php endif; ?>
                <td style="padding: 5px 10px;" width="22%">RV rms from additional planets</td>
                <td style="padding: 5px 10px;" width="11%"><?php echo $_GET['sigRVplanets']; ?> m/s</td>
        </tr>
        <tr>    
                <td></td>
                <td></td>
                <td style="padding: 5px 10px;" width="22%">Projected rotation velocity</td>
                <?php if (floatval($_GET['vsini']) > 0) : ?>
                        <td style="padding: 5px 10px;" width="11%"><?php echo $_GET['vsini']; ?> km/s</td>
                <?php else: ?>
                        <td style="padding: 5px 10px;" width="11%">-</td>
                <?php endif; ?>
                <td style="padding: 5px 10px;" width="22%">Effective RV rms</td>
                <td style="padding: 5px 10px;" width="11%"><?php echo $_GET['sigRVeff']; ?> m/s</td>
        </tr>
        <tr>
                <td></td>
                <td></td>
                <td style="padding: 5px 10px;" width="22%">Rotation period</td>
                <?php if (floatval($_GET['Prot']) > 0) : ?>
                        <td style="padding: 5px 10px;" width="11%"><?php echo $_GET['Prot']; ?> days</td>
                <?php else: ?>
                        <td style="padding: 5px 10px;" width="11%">-</td>
                <?php endif; ?>
                <td></td>
                <td></td>
        </tr>
</table>

<table>
        <tr>
                <td style="padding: 5px 10px; font-size:20px" width="24%"><b>Simulation parameters:</b></td>
		<td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
	</tr>
	<tr>
		<td style="padding: 5px 10px;" width="24%">Desired K detection significance</td>
                <td style="padding: 5px 10px;" width="11%"><?php echo $_GET['Kdetsig']; ?></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
        </tr>
        <tr>
                <td style="padding: 5px 10px;" width="24%">Number of GP trials</td>
                <td style="padding: 5px 10px;" width="11%"><?php echo $_GET['Ntrials']; ?></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
	</tr>
</table>

