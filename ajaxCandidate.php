<?php
include "session_user.php";
if ($sign == "admin"){
	echo "<script>
				alert('This page is not available!');
				window.location.assign('".$adminorg.".php');
			</script>";
}
else{
	if (isset($_POST['sending'])){
		$data=mysql_real_escape_string($_POST['sending']);
		$select = mysql_query("SELECT * FROM tblcandidate WHERE c_number = '$data' AND c_year = '$thisyear' AND candidate_status = 0") or die(mysql_error());
		$count = mysql_num_rows($select);
		if ($count == 0){
			echo "No information found";
		}
		else{
			while($row=mysql_fetch_array($select));
			$c_fname = $row['c_fname'];
			$c_lname = $row['c_lname'];
			echo $c_fname." ".$c_lname;
		}
	}
	else{
		echo "<script>
				alert('This page is not available!');
				window.location.assign('".$org.".php');
			</script>";
	}
}
?>