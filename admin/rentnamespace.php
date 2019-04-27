
<?php
include "../session_user.php";
?>
<!DOCTYPE html>
<html>
<head>

</head>
<body>
					


<?php

	//BLOCKCHAIN
	$fa = mysql_query("SELECT * FROM tbladmin WHERE organization = '$adminorg'")or die (mysql_error());
	while ($row=mysql_fetch_array($fa)){
		$private_key = $row['private_key'];
		$public_key = $row['public_key'];
		$address = $row['address'];
	}

	$mosaic = mysql_query("SELECT * FROM tblmember WHERE organization = '$adminorg'");
	$count = mysql_num_rows($mosaic);
?>
	<script type="application/javascript" src="../js/inputtype.js"></script>
	<script type="application/javascript" src="../dist/nem-sdk.js"></script>
	<script type="application/javascript" src="rentnamespace_mosaicdef_transfer.js"></script>
<?php
	echo "<script type='text/javascript'>namespace_mosaic_transfer('$address', '$private_key', '$public_key','$count');</script>";
 ?>
</body>
</html>			