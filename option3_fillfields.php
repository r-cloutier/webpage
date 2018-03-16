<p style="font-size:30px">&nbsp;&nbsp;&nbsp;<b>Option 3: upload input file</b></p>&nbsp;&nbsp;&nbsp;

<?php
	if (isset($_GET['input_file'])) {

		//$theFile = "'".basename( $_FILES['input_file']['tmp_name']) ."'";
		$theFile = $_FILES['input_file']['tmp_name'];
		//echo $theFile;
		echo 'here';
		//$fileHandle = fopen($theFile, 'r') or die ("Unable to open the file");		
                
		/*$input_fname = $_FILES['input_file']['name'];
                $file = fopen($input_file, 'r');
 	        $data = fgetcsv($file, filesize($input_file));
        	$Umag = $data[0];
		if (!isset($Umag)) { echo 'hii';}
               	$Bmag = $data[1];
                $Vmag = $data[2];
                $Rmag = $data[3];
                $Imag = $data[4];
                $Ymag = $data[5];
                $Jmag = $data[6];
                $Hmag = $data[7];
                $Kmag = $data[8];
                $P = $data[9];
                $rp = $data[10];
                $mp = $data[11];
                $K = $data[12];
                $Ms = $data[13];
                $Rs = $data[14];
                $Teff = $data[15];
                $Z = $data[16];
                $vsini = $data[17];
                $Prot = $data[18];
                $R = $data[19];
                $aperture = $data[20];
                $throughput = $data[21];
                $floor = $data[22];
                $wlcen = $data[23];
                $SNR = $data[24];
                $maxtelluric = $data[25];
                $overhead = $data[26];
                $texp = $data[27];
                $sigRVphot = $data[28];
                $sigRVact = $data[29];
                $sigRVplanets = $data[30];
                $sigRVeff = $data[31];
                $sigK = $data[32];
                $nRV = $data[33];
                $nRVGP = $data[34];
                $Ntrials = $data[35];
                $tobs = $data[36];
                $tobsGP = $data[37];
		}*/
	}
?>
