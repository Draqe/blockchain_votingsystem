<?php
include "../session_user.php";
$memberlist ="";
$select=mysql_query("SELECT * FROM tblmember WHERE organization = '$adminorg'")or die (mysql_error());
$memberCount = mysql_num_rows($select);
$i=1;
echo '<div style="height:700px; overflow:auto;">
		<table id="memberlistcontent" class="table table-striped table-bordered table-responsive table-hover" style="width:100%;">
';
if ($memberCount > 0){
	while ($row = mysql_fetch_array($select)){
		$e_number = $row["e_number"];
		$fname = $row["fname"];
		$lname = $row["lname"];
		$organization = $row["organization"];
		$college_branch = $row["college_branch"];
		$campus = $row["campus"];
		
		$memberlist .= "<tr>";
		$memberlist .= "<td width='18%'>".$e_number."</td>";
		$memberlist .= "<td width='14%'>".$fname."</td>";
		$memberlist .= "<td width='13%'>".$lname."</td>";
		$memberlist .= "<td width='10%'>".$campus."</td>";
		$memberlist .= "<td width='15%'>".$college_branch."</td>";
		$memberlist .="<td width='12%'>
							<table><tr>
								<td>
									<form action = 'member.php' method = 'post'>
										<input type='hidden' name='delete_member' value=$e_number>
										
										<button title='DELETE' class='btn btn-danger' onclick='return confirm(\"Are you sure you want to delete this information?\");' type ='submit'><i class='fa fa-trash-o fa-sm'></i></button>
									</form>
								</td>
								<td>|</td>
								<td>						
									<a title='EDIT' href='editmember.php?employee_number=".$e_number."'><button type ='submit' class='btn btn-success'><i class='fa fa-pencil fa-sm'></i></button</a>
								</td>
							</tr></table></td>";
		$memberlist .= "</tr>";
	}
}
else{
	$memberlist .="<tr width = '100%'>
					<td class='text-danger'><strong>No record of members.</strong></td>
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
		echo "<tr>
				<td width='18%'>".$e_number."</td>
				<td width='14%'>".$fname."</td>
				<td width='13%'>".$lname."</td>
				<td width='10%'>".$campus."</td>
				<td width='15%'>".$college_branch."</td>
				<td width='12%'>
							<table><tr>
								<td>
									<form action = 'member.php' method = 'post'>
										<input type='hidden' name='delete_member' value=$e_number>
										
										<button title='DELETE' class='btn btn-danger' onclick='return confirm(\"Are you sure you want to delete this information?\");' type ='submit'><i class='fa fa-trash-o fa-sm'></i></button>
									</form>
								</td>
								<td>|</td>
								<td>						
									<a title='EDIT' href='editmember.php?employee_number=".$e_number."'><button type ='submit' class='btn btn-success'><i class='fa fa-pencil fa-sm'></i></button</a>
								</td>
							</tr></table></td>
				</tr>";
			}
		}
		else{
			echo "<tr width = '100%'>
					<td class='text-danger'><strong>Information not found.</strong></td>
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