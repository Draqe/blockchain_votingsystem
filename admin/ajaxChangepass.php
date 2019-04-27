<?php
include "session_user.php";

	$oldpassword = $_POST["password"];
	$newpassword = $_POST["newpassword"];
	$confirmpassword = $_POST["confirmpassword"];
	 
		if ($oldpassword == $password ){
			if ($newpassword == $confirmpassword){
				if (strlen($newpassword)>=6 && strlen($confirmpassword)>=6){
					if ($sign == "admin"){
						$update = mysql_query("UPDATE tbladmin SET password = '$newpassword' WHERE username = '$username'");
						$_SESSION['password'] = $newpassword;
						echo 1;
					}
					else{
						$update = mysql_query("UPDATE tblmember SET password = '$newpassword' WHERE e_number = '$username'");
						$_SESSION['password'] = $newpassword;
						echo 1;
					}
				}
				else{
					echo 4;
 				}
				
			}
			else{
				echo 3;
 			}
		}
		else{
			echo 2;
		 
		}
 
?>
