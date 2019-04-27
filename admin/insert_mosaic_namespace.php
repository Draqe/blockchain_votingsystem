<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>



<?php
	include "../session_user.php";

	if (isset($_GET["mosaicname"]) && isset($_GET["namespace"])) {
		
		$mosaicname=$_GET["mosaicname"];
		$namespace=$_GET["namespace"];
		$mn = mysql_query("UPDATE election SET mosaic ='$mosaicname', namespace = '$namespace' WHERE organization = '$adminorg'")or die (mysql_error());
		
		$fa = mysql_query("SELECT * FROM tbladmin WHERE organization = '$adminorg'")or die (mysql_error());
		while ($row=mysql_fetch_array($fa)){
			$private_key = $row['private_key'];
			$public_key = $row['public_key'];
			$address = $row['address'];
		}
?>
<?php

		echo "<script type='text/javascript'>window.location.href = ('candidatelist.php');</script>";

	}
?>
</body>
</html>