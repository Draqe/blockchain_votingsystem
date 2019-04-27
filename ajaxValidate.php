<?php
include "session_user.php";

if ($logaccount_status == 0){
	if (isset($_POST['employee_number'])){
		$e_number = $_POST['employee_number'];
		$e_password = $_POST['regpassword'];
			if($username== $e_number && $password == $e_password){
				$update = mysql_query("UPDATE tblmember SET account_status = 1 WHERE e_number = '$username'");
				echo 1;
				
			}
			else{
				echo 2;			
			}
	}
}
else{
	echo 3;
}
?>
