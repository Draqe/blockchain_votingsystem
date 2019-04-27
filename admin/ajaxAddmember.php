<?php
include "../session_user.php";
if ($sign == "admin"){	
	if (isset ($_POST['employee_number'])){
	$employee_number = $_POST['employee_number'];
	$fname_member = $_POST['fname'];
	$lname_member = $_POST['lname'];
	$campus = $_POST['campus'];
	$college_branch = $_POST['college_branch'];
		
	
	$select = mysql_query ("SELECT * FROM tblmember WHERE e_number = '$employee_number'")or die (mysql_error());
	$count = mysql_num_rows($select);
	$sel = mysql_query ("SELECT * FROM tblmember WHERE fname = '$fname_member' AND lname = '$lname_member'")or die (mysql_error());
	$count1 = mysql_num_rows($sel);
	
		if ($count !=0){
		echo "2"; 
		}
		else{
			if ($count1 !=0){
				echo "3"; 
			}
			else{
				 
				 
					$create = mysql_query("INSERT INTO tblmember (e_number, fname, lname, password, organization, college_branch, campus, member_status, account_status, passElec, log_status) 
								VALUES ('$employee_number', '$fname_member', '$lname_member', 'NONE', '$adminorg', '$college_branch', '$campus', 1, 'NONE', 0, 'active' )")
								or die (mysql_error());
		
					echo "1"; 
				 
			}
		}
	}
	else{
		
		echo "<script>
				alert('This is an invalid process!');
				window.location.assign('../".$adminorg.".php');
			</script>";
		
	}
}
else{
		
		echo "<script>
				alert('This page is unavailable!');
				window.location.assign('../".$org.".php');
			</script>";
}

?>