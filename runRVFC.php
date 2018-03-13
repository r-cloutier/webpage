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
		<td style="padding: 0px 0px 10px 10px; font-size:20px"><b>Planet parameters:</b></td>
		<td></td>
                <td style="padding: 0px 0px 10px 10px; font-size:20px"><b>Stellar parameters:</b></td>
		<td></td>
	</tr>
        <tr>
                <td style="padding: 0px 0px 10px 10px;">Orbital period =</td>
		<td style="padding: 0px 0px 10px 10px;"><?php echo $_GET['P']; ?> days</td>
                <td style="padding: 0px 0px 10px 10px;">Stellar mass =</td>
                <td style="padding: 0px 0px 10px 10px;"><?php echo $_GET['Ms']; ?> M<sub>&#x02299;</sub></td>
        </tr>
        <tr>
                <td style="padding: 0px 0px 10px 10px;">Planetary radius =</td>
                <td style="padding: 0px 0px 10px 10px;"><?php echo $_GET['rp']; ?> R<sub>&#x02295;</sub></td>
		<?php if (isset($_GET['Rs']) && floatval($_GET['Rs']) > 0) : ?>
			<td style="padding: 0px 0px 10px 10px;">Stellar radius =</td>
                	<td style="padding: 0px 0px 10px 10px;"><?php echo $_GET['Rs']; ?> R<sub>&#x02299;</sub></td>
		<?php endif; ?>
        </tr>
        <tr>
                <td style="padding: 0px 0px 10px 10px;">Planetary mass =</td>
                <td style="padding: 0px 0px 10px 10px;"><?php echo $_GET['mp']; ?> M<sub>&#x02295;</sub></td>
                <?php if (isset($_GET['Teff']) && floatval($_GET['Teff']) > 0) : ?>
                        <td style="padding: 0px 0px 10px 10px;">Effective temperature =</td>
                        <td style="padding: 0px 0px 10px 10px;"><?php echo $_GET['Teff']; ?> K</td>
                <?php endif; ?>
        </tr>
        <tr>
                <td style="padding: 0px 0px 10px 10px;">RV semi-amplitude =</td>
                <td style="padding: 0px 0px 10px 10px;"><?php echo number_format(RV_K($_GET['P'], $_GET['Ms'], $_GET['mp']),2,'.',''); ?> m/s</td>
                <?php if (isset($_GET['Z'])) : ?>
                        <td style="padding: 0px 0px 10px 10px;">Metallicity =</td>
                        <td style="padding: 0px 0px 10px 10px;"><?php echo $_GET['Z']; ?> [Fe/H]</td>
                <?php endif; ?>
        </tr>
	<?php if (floatval($_GET['vsini'])>0 || floatval($_GET['Prot'])>0) : ?>
		<tr>
		<td></td>
		<td></td>
		<?php if (isset($_GET['vsini']) && floatval($_GET['Prot'])<=0) : ?> 
			<td style="padding: 0px 0px 10px 10px;">Projected rotation velocity =</td>
                        <td style="padding: 0px 0px 10px 10px;"><?php echo $_GET['vsini']; ?> km/s</td>
		<?php elseif (floatval($_GET['vsini'])<=0 && isset($_GET['Prot'])) : ?>
                        <td style="padding: 0px 0px 10px 10px;">Rotation period =</td>
                        <td style="padding: 0px 0px 10px 10px;"><?php echo $_GET['Prot']; ?> days</td>
		<?php else: ?>
                        <td style="padding: 0px 0px 10px 10px;">Projected rotation velocity =</td>
                        <td style="padding: 0px 0px 10px 10px;"><?php echo $_GET['vsini']; ?> km/s</td>
			<tr>
				<td></td>
				<td></td>
                        	<td style="padding: 0px 0px 10px 10px;">Rotation period =</td>
                        	<td style="padding: 0px 0px 10px 10px;"><?php echo $_GET['Prot']; ?> days</td>
			</tr>
		<?php endif; ?>
		</tr>
	<?php endif; ?>
</table>
