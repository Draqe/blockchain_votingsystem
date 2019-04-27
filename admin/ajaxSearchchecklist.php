<?php
include "../session_user.php";
$memberlist ="";
$select=mysql_query("SELECT * FROM tblmember WHERE organization = '$adminorg'")or die (mysql_error());
$memberCount = mysql_num_rows($select);
$i=1;
echo '<table width="100%">';
if ($memberCount > 0){
	while ($row = mysql_fetch_array($select)){
			$e_number = $row["e_number"];
			$fname = $row["fname"];
			$lname = $row["lname"];
			$organization = $row["organization"];
			$college_branch = $row["college_branch"];
			$campus = $row["campus"];
			$member_status = $row["member_status"];
			$account_status = $row["account_status"];
			$password = $row["password"];
			
			if ($password == "NONE"){
				$password = $password;
			}
			else{
				if ($password == $e_number){
					$password = $password;
				}
				else{
					$password = md5($password);
					if (strlen($password)>10){
						$password = substr($password,0,10)."...";
					}
					else{
						$password = $password;
					}
				}
			}
			
		
		$memberlist .= '<tr>
						<td width="10%" align="center">'.$e_number.'</td>
						<td width="10%" align="center">'.$fname.'</td>
						<td width="10%" align="center">'.$lname.'</td>
						<td width="10%" align="center">'.$college_branch.'</td>
						<td width="10%" align="center">'.$campus.'</td>
						<td width="10%" align="center">'.$member_status.'</td>
						<td width="10%" align="center">'.$account_status.'</td>
						<td width="10%" align="center">'.$password.'</td>';
						
						if ($member_status == 0){
							$memberlist .= '<td width="10%" align="center">
									<form action = "checklist.php" method = "post">
												<input type="hidden" name="reset_member" value="'.$e_number.'">		
												<button title="RESET" onclick="return confirm(\'Are you sure you want to reset this member status?\');" type ="submit">Reset</button>
									</form>
							</td>';
						}
						else{
							$memberlist .= '<td width="10%" align="center"><button disabled>Reset</button></td>';
						}
		$memberlist .= '</tr>';
			}
		}
		else{
			$memberlist .= "<tr width = '100%'>
					<td><strong>No Record.</strong></td>
				</tr>";
		}
		
		
if (isset($_POST['sending'])){
	$data=mysql_real_escape_string($_POST['sending']);
	if(!empty($data)){
		$query = mysql_query("SELECT * FROM tblmember WHERE (e_number LIKE '%$data%' AND organization = '$adminorg') OR (fname LIKE '%$data%' AND organization = '$adminorg') OR (lname LIKE '%$data%' AND organization = '$adminorg') OR (college_branch LIKE '%$data%' AND organization = '$adminorg') OR (campus LIKE '%$data%' AND organization = '$adminorg')")or die (mysql_error());
		if(mysql_num_rows($query)!=0){
			while ($row=mysql_fetch_assoc($query)){
				$e_number = $row["e_number"];
			$fname = $row["fname"];
			$lname = $row["lname"];
			$organization = $row["organization"];
			$college_branch = $row["college_branch"];
			$campus = $row["campus"];
			$member_status = $row["member_status"];
			$account_status = $row["account_status"];
			$password = $row["password"];
			
			if ($password == "NONE"){
				$password = $password;
			}
			else{
				if ($password == $e_number){
					$password = $password;
				}
				else{
					$password = md5($password);
					if (strlen($password)>10){
						$password = substr($password,0,10)."...";
					}
					else{
						$password = $password;
					}
				}
			}
			
		echo '<tr>
						<td width="10%" align="center">'.$e_number.'</td>
						<td width="10%" align="center">'.$fname.'</td>
						<td width="10%" align="center">'.$lname.'</td>
						<td width="10%" align="center">'.$college_branch.'</td>
						<td width="10%" align="center">'.$campus.'</td>
						<td width="10%" align="center">'.$member_status.'</td>
						<td width="10%" align="center">'.$account_status.'</td>
						<td width="10%" align="center">'.$password.'</td>';
						
						if ($member_status == 0){
							echo '<td width="10%" align="center">
									<form action = "checklist.php" method = "post">
												<input type="hidden" name="reset_member" value="'.$e_number.'">		
												<button title="RESET" onclick="return confirm(\'Are you sure you want to reset this member status?\');" type ="submit">Reset</button>
									</form>
							</td>';
						}
						else{
							echo '<td width="10%" align="center"><button disabled>Reset</button></td>';
						}
		echo '</tr>';
			}
		}
		else{
			echo "<tr width = '100%'>
					<td><strong>Information not found.</strong></td>
				</tr>";
		}
	}
	else{
		echo $memberlist;
	}
}
else{
	echo $memberlist;
}

echo '</table>';

?>