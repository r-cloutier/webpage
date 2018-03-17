<p style="font-size:30px">&nbsp;&nbsp;&nbsp;<b>Option 3: upload input file</b></p>&nbsp;&nbsp;&nbsp;

<form enctype="multipart/form-data" action="option3.php" method="POST">
        <input name="file" type="file" accept=".csv"/><br>
        <input name="submit" type="submit" value="Upload csv" />
</form>

<?php
if ($_FILES["file"]["error"] > 0)
  {
  echo "Error: " . $_FILES["file"]["error"] . "<br>";
  }
else
  {
  echo "Upload: " . $_FILES["file"]["name"] . "<br>";
  echo "Type: " . $_FILES["file"]["type"] . "<br>";
  echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
  echo "Stored in: " . $_FILES["file"]["tmp_name"];
  }
	//print_r($_FILES);
?>
