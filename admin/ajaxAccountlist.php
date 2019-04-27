<?php
include "../session_user.php";
?>
<?php
//show the list of member


$memberlist="";
$select=mysql_query("SELECT * FROM tblmember WHERE organization = '$adminorg'") or die (mysql_error());
$memberCount = mysql_num_rows($select);
$i=1;
echo '<div style=" overflow:auto; height:500px">
      	<table id="memberlistcontent" class="table table-striped table-bordered table-responsive table-hover" style="width:100%;">';
if ($memberCount > 0){
	while ($row = mysql_fetch_array($select)){
		$e_number = $row["e_number"];
		$fname = $row["fname"];
		$lname = $row["lname"];
		$password = $row["password"];
		$organization =$row["organization"];
		$status = $row["account_status"];
		if ($password=="NONE" || $password == $e_number){
			$coutpassword = $row['password'];
			$reset = "<td  style='border-right:none; border-left:none; border-top:none' width='100px' align='center' valign='middle'>
						<input type ='submit' disabled='disabled' class='btn btn-danger' value = 'Reset'>
						</form></td>";

		}
		else{
			$coutpassword = md5($row['password']);
			$reset = "<td  style='border-right:none; border-left:none; border-top:none;' width='100px' align='center' valign='middle'>
						<form action = 'accountlist.php' method = 'post'>
						<input type='hidden' name='reset_account' value= $e_number>
						<input type ='submit' class='btn btn-success' value = 'Reset'>
						</form></td>";
		}

		if ($status==0){
			$activate = "<td  style='border-right:none; border-left:none; border-top:none;' width='100px' align='center' valign='middle'>
					<form action = 'accountlist.php' method = 'post'>
					<input type='hidden' name='activate_account' value= $e_number>
					<input type ='submit' class='btn btn-success' value = 'Activate'>
					</form></td>";
		}
		else{
			$activate = "<td  style='border-right:none; border-left:none; border-top:none;' width='100px' align='center' valign='middle'>
					<form action = 'accountlist.php' method = 'post'>
					<input type='hidden' name='deactivate_account' value= $e_number>
					<input type ='submit' class='btn btn-danger' value = 'Deactivate'>
					</form></td>";
		}	
		
		if ($password=="NONE"){
			$cont = "";
		}
		else{
			$cont = "...";
		}
		
		$memberlist .= "<tr>";
		$memberlist .= "<td width='22%'>".$e_number."</td>";
		$memberlist .= "<td width='21.5%'>".$fname."</td>";
		$memberlist .= "<td width='20%'>".$lname."</td>";
		$memberlist .= "<td>".substr($coutpassword,0,10).$cont."</td>";
		
		$memberlist .= $reset;
		$memberlist .= $activate;

		$memberlist .= "</tr>";
	}
}
else{
	$memberlist="<td style='border-right:none; border-left:none; border-top:none' width='130px' align='center' valign='middle'>There is no account in the list</td>";	
}




if (isset($_POST['sending'])){
	$data=mysql_real_escape_string($_POST['sending']);
	if(!empty($data)){
		$query = mysql_query("SELECT * FROM tblmember WHERE (e_number LIKE '%$data%' AND organization = '$adminorg') OR (fname LIKE '%$data%' AND organization = '$adminorg') OR (lname LIKE '%$data%' AND organization = '$adminorg') OR (password LIKE '%$data%' AND organization = '$adminorg')")or die (mysql_error());
		if(mysql_num_rows($query)!=0){
			while ($row=mysql_fetch_assoc($query)){
				$e_number = $row["e_number"];
				$fname = $row["fname"];
				$lname = $row["lname"];
				$password = $row["password"];
				$organization =$row["organization"];
				$status = $row["account_status"];
				if ($password=="NONE" || $password == $e_number){
					$coutpassword = $row['password'];
					$reset = "<td  style='border-right:none; border-left:none; border-top:none' width='100px' align='center' valign='middle'>
								<input type ='submit' disabled='disabled' class='btn btn-danger' value = 'Reset'>
								</form></td>";

				}
				else{
					$coutpassword = md5($row['password']);
					$reset = "<td  style='border-right:none; border-left:none; border-top:none;' width='100px' align='center' valign='middle'>
								<form action = 'accountlist.php' method = 'post'>
								<input type='hidden' name='reset_account' value= $e_number>
								<input type ='submit' class='btn btn-success' value = 'Reset'>
								</form></td>";
				}

				if ($status==0){
					$activate = "<td  style='border-right:none; border-left:none; border-top:none;' width='100px' align='center' valign='middle'>
							<form action = 'accountlist.php' method = 'post'>
							<input type='hidden' name='activate_account' value= $e_number>
							<input type ='submit' class='btn btn-success' value = 'Activate'>
							</form></td>";
				}
				else{
					$activate = "<td  style='border-right:none; border-left:none; border-top:none;' width='100px' align='center' valign='middle'>
							<form action = 'accountlist.php' method = 'post'>
							<input type='hidden' name='deactivate_account' value= $e_number>
							<input type ='submit' class='btn btn-danger' value = 'Deactivate'>
							</form></td>";
				}	
				
				if ($password=="NONE"){
					$cont = "";
				}
				else{
					$cont = "...";
				}
				
				echo "<tr>";
				echo "<td width='22%'>".$e_number."</td>";
				echo "<td width='21.5%'>".$fname."</td>";
				echo "<td width='20%'>".$lname."</td>";
				echo "<td>".substr($coutpassword,0,10).$cont."</td>";
				
				echo $reset;
				echo $activate;

				echo "</tr>";
			}
		}
		else{
			echo "<td style='border-right:none; border-left:none; border-top:none' width='130px' align='center' valign='middle'>There is no account in the list</td>";	
		}

	}
	else{
		echo $memberlist;
	}
}
else{
	echo $memberlist;
}

echo '</table>
	</div>';

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<link rel="stylesheet" href="../css/bootstrap.css" tyep="text/css" media="screen"/>
<link rel="stylesheet" href="../css/style.css" tyep="text/css" media="screen"/>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
<link rel="icon" href="favicon.ico" type="image/x-icon">
<title>CvSU-OVS-Faculty Association</title>

</head>
<body>
</body></html>