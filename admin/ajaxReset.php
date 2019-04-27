<?php 
require "../session_user.php";
if (isset($_POST['username'])){
	$adminusername = $_POST['username'];
	$adminpassword = $_POST['password'];
		if ($adminusername == $username && $adminpassword == $password){
			
			$updatec = mysql_query("UPDATE tblcandidate SET candidate_status = 0 WHERE c_year = '$thisyear' AND c_organization = '$adminorg'") or die (mysql_error());
			$select = mysql_query("SELECT * FROM tblvote WHERE v_year = '$thisyear' AND v_organization = '$adminorg'")or die (mysql_error());
			$count = mysql_num_rows($select);
				if($count == 0){
				}
				else{
					$delv = mysql_query("DELETE FROM tblvote WHERE v_year = '$thisyear' AND v_organization = '$adminorg'")or die (mysql_error());
				}
			$dele = mysql_query("DELETE FROM elec_con WHERE year_elec = '$thisyear' AND organization = '$adminorg'")or die (mysql_error());
			$updatee = mysql_query("UPDATE elec_con SET end_term = 0 WHERE end_term = '$thisyear' AND organization = '$adminorg'")or die (mysql_error());
			echo 1;
		}
		else{
			echo 2;
		}
		
		
}
else{
	if ($sign == "admin"){
		echo"<script>
			alert('This page is unavailable');
			window.location.assign('/blockchain_votingsystem/$adminorg.php');
		</script>";	
	}
	else{
		echo"<script>
			alert('This page is unavailable');
			window.location.assign('/blockchain_votingsystem/$org.php');
		</script>";
	}
	
}
?>
