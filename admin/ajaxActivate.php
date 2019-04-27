

<?php
include "../session_user.php";

$select_not = mysql_query("SELECT * FROM tblmember WHERE member_status = 1 AND organization = '$adminorg'")or die (mysql_error());
$mem_not = mysql_num_rows($select_not);
$select_vote = mysql_query("SELECT * FROM tblmember WHERE member_status = 0 AND organization = '$adminorg'")or die (mysql_error());
$mem_vote = mysql_num_rows($select_vote);
$select_total = mysql_query("SELECT * FROM tblmember WHERE organization = '$adminorg'")or die (mysql_error());
$mem_total = mysql_num_rows($select_total);
$thistime = date("H:i", strtotime('-9hours'));


	$error="&nbsp;";
	if (isset($_POST['username'])){

		$adminusername = $_POST['username'];
		$adminpassword = $_POST['password'];
 
			if($username== $adminusername && $password == $adminpassword){
					 
					$update_elec_con = mysql_query ("UPDATE elec_con SET end_term = '$thisyear' WHERE end_term = 0 AND organization = '$adminorg'")or die (mysql_error());
					$insert = mysql_query("INSERT INTO elec_con (start_term, end_term, year_elec, total_mem, mem_vote, mem_not, organization) 
						VALUES (0, 0, '$thisyear', 0, 0, 0, '$adminorg')")
						or die (mysql_error());

				
					$update = mysql_query ("UPDATE election SET org_status = '1'  WHERE organization = '$adminorg'")or die (mysql_error());
		

					echo 1;
			
				
			}
			else{
				echo 2;
			}
		
	}

?>