<?php
include "../session_user.php";
$select_not = mysql_query("SELECT * FROM tblmember WHERE member_status = 1 AND organization = '$adminorg'");
			$mem_not = mysql_num_rows($select_not);
			$select_vote = mysql_query("SELECT * FROM tblmember WHERE member_status = 0 AND organization = '$adminorg'");
			$mem_vote = mysql_num_rows($select_vote);
			$select_total = mysql_query("SELECT * FROM tblmember WHERE organization = '$adminorg'");
			$mem_total = mysql_num_rows($select_total);
error_reporting(0) ;
if ($_POST['username']){

		$adminuserame = $_POST['username'];
		$adminpassword = $_POST['password'];

			if($adminuserame == $username && $adminpassword == $password){
			
			$sql = "UPDATE election SET org_status = 0, namespace='', mosaic='' WHERE organization = '$adminorg'";
			$result = mysql_query($sql);
			$thisyear = date("Y", strtotime('-9hours'));

			$update = "UPDATE tblcandidate SET candidate_status = 1 WHERE c_year = '$thisyear' AND c_organization = '$adminorg' AND candidate_status = 0";
			$updatecnd = mysql_query($update);
			$update_elec_con = mysql_query("UPDATE elec_con SET start_term = '$thisyear', total_mem = '$mem_total', mem_vote = '$mem_vote', mem_not = '$mem_not' WHERE year_elec = '$thisyear'") or die(mysql_error());
			$deactivate = mysql_query ("UPDATE tblmember SET member_status = 1, passElec = 0 WHERE organization ='$adminorg'")or die (mysql_error());
						
			echo 1;
						
				 
			}
			else{
				echo 2;
			}
}

else{
	echo "<script>
			alert('This page is not available!');
			window.location.assign('result.php');
		</script>";	
}
?>