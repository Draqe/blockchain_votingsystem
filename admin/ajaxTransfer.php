<?php
include "mysqlconnect.php";

$e_number = mysql_real_escape_string($_POST['activate_account']);
$private_key = mysql_real_escape_string($_POST['private_key']);
$public_key = strtoupper(mysql_real_escape_string($_POST['public_key']));
$address = strtoupper(mysql_real_escape_string($_POST['address']));
$adminprivate_key = mysql_real_escape_string($_POST['adminprivate_key']);


$select = mysql_query ("SELECT * FROM tblmember WHERE e_number = '$username'") or die(mysql_error());
$count_select = mysql_num_rows($select);
		if ($count_select ==0){
				if (strlen($password)>=6){

					$create = mysql_query("INSERT INTO tblmember (e_number, fname, lname, password, organization, college_branch, campus, member_status, account_status, log_status, passElec, private_key, public_key, address) 
								VALUES ('$username', '$fname', '$lname', '$password', '$organization', '$college_branch', '$campus', 1, 0, 'active', 0, '$private_key', '$public_key', '$address')")
					or die (mysql_error());					
					echo 1;
				}
				else{
					echo 3;
				}
			}
		else{
			echo 2;
		}

?>



