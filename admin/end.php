<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<?php
require '../session_user.php';
if ($sign == "admin") {
if(isset($_GET['org'])){
	$base = $_GET['org'];
			$select_not = mysql_query("SELECT * FROM tblmember WHERE member_status = 1 AND organization = '$base'");
			$mem_not = mysql_num_rows($select_not);
			$select_vote = mysql_query("SELECT * FROM tblmember WHERE member_status = 0 AND organization = '$base'");
			$mem_vote = mysql_num_rows($select_vote);
			$select_total = mysql_query("SELECT * FROM tblmember WHERE organization = '$base'");
			$mem_total = mysql_num_rows($select_total);
			$sql = "UPDATE election SET org_status = 0, setTime = 0, setDate = 0 WHERE organization = '$base'";
			$result = mysql_query($sql);
			$thisyear = date("Y", strtotime('-9hours'));

			$update = "UPDATE tblcandidate SET candidate_status = 1 WHERE c_year = '$thisyear'";
			$updatecnd = mysql_query($update);
			$update_elec_con = mysql_query("UPDATE elec_con SET start_term = '$thisyear', total_mem = '$mem_total', mem_vote = '$mem_vote', mem_not = '$mem_not' WHERE year_elec = '$thisyear'") or die(mysql_error());
		
			header ("Location:result.php");

}
else{
	header ($_SERVER['HTTP_REFERER']);
}
}
else{
	echo "<script>
			alert('This page is not available!');
			window.location.assign('../".$org.".php');
		</script>";
}
		?>
    
<body>

</body>
</html>