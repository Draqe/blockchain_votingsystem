<?php
include "../session_user.php";
if ($sign != 'admin'){
	echo "<script>
			alert('This page is unavailable!');
			window.location.assign('/blockchain_votingsystem/".$org.".php');
		</script>";
}
else{
	if ($org_status_election == 0){
		echo "<script>
			alert('This page is not available this time!');
			window.location.assign('/blockchain_votingsystem/".$adminorg.".php');
		</script>";
	}
	else{
		
	}
}
		$list ="";
				$select = mysql_query("SELECT * FROM tblmember WHERE organization = '$adminorg'")or die(mysql_error());
				while ($row = mysql_fetch_array($select)){
				$bgc++;
					$e_number = $row["e_number"];
					$fname = $row["fname"];
					$lname = $row["lname"];
					$organization = $row["organization"];
					$college_branch = $row["college_branch"];
					$campus = $row["campus"];
					$member_status = $row["member_status"];
					$account_status = $row["account_status"];
					$password = $row["password"];
					if($campus=="Satellite")
					$sat=1;
					else
					$sat=0;
					
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
					if($bgc%2==0)
					$bg='#F3FEFE';
					else
					$bg='#ffffff';
					$list .= '
							<tr style="background:'.$bg.'">
								<td width="10%" align="center">'.$e_number.'</td>
								<td width="10%" align="center">'.$fname.'</td>
								<td width="10%" align="center">'.$lname.'</td>
								<td width="10%" align="center">'.$college_branch.'</td>
								<td width="10%" align="center">'.$campus.'</td>
								<td width="10%" align="center">'.$member_status.'</td>
								<td width="10%" align="center">'.$account_status.'</td>
								<td width="10%" align="center">'.$password.'</td>';
								
								if ($member_status == 0){
								$yes=$yes+1;
								if($sat==1)
								$satcount++;
									$list .= '<td width="10%" align="center">
											<form action = "checklist.php" method = "post">
														<input type="hidden" name="reset_member" value="'.$e_number.'">		
														<button title="RESET" onclick="return confirm(\'Are you sure you want to reset this member status?\');" type ="submit">Reset</button>
											</form>
									</td>
								</tr>';
								}
								else{
									$list .= '<td width="10%" align="center"><button disabled>Reset</button></td>';
								}
					$list .= '</tr>';
				}
			
		?>
		<?php
		if(isset($_POST['reset_member']) && !empty($_POST['reset_member'])) {
		  $reset_member = mysql_real_escape_string($_POST['reset_member']);
		  $update =mysql_query("UPDATE tblmember SET member_status = 1, password='NONE' WHERE  e_number = '$reset_member'") or die (mysql_error());
		  $delvote = mysql_query("DELETE FROM tblvote WHERE m_number = '$reset_member' AND v_year = '$thisyear'") or die (mysql_error());
		  
		  echo "<script>
					alert('Member status is successfully reset.');
					window.location.assign('checklist.php');
				</script>";
		}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
<link rel="icon" href="favicon.ico" type="image/x-icon">
<title>CvSU Online Voting System</title>
<link rel="stylesheet" href="default.css" tyep="text/css" media="screen"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
</head>

<body>
<script>
function getData(str){
	$.ajax({
		type:'post',
		url:'ajaxSearchchecklist.php',
		data:{"sending":str},
		success: function(data){
			document.getElementById("memberlistOut").innerHTML = data;
		}
	});
	$('#memberlist').attr("style","display:none");

}


</script>
<input class="form-control" style="width:10%" type="text" onkeyup="getData(this.value)" placeholder="Search Members..." /> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Voted: <?php echo $yes;?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Satellite: <?php echo $satcount;?>
<hr />
<table width="100%" class="sample3">
					<tr>
						<th width="10%">Employee Number</th>
						<th width="10%">First Name</th>
						<th width="10%">Last Name</th>
						<th width="10%">Campus</th>
						<th width="10%">College/Branch</th>
						<th width="10%">Member Status</th>
						<th width="10%">Account Status</th>
						<th width="10%">Password</th>
						<th width="10%">Action</th>
					</tr>
				


<?php echo $list;?>
</table>
<br><br><br>
<table width="50%" class="sample3">
					<tr>
						<th width="70%">Branch/College</th>
						<th width="30%">Voted</th>

					</tr>
<?php
$res=mysql_query("SELECT DISTINCT college_branch FROM tblmember ORDER BY campus, college_branch");
while($rows=mysql_fetch_array($res))
{
$a=0;
$result=mysql_query("SELECT * FROM tblmember WHERE college_branch = '".$rows['college_branch']."'");
while($row=mysql_fetch_array($result))
{

$result2=mysql_query("SELECT * FROM tblvote WHERE m_number='".$row['e_number']."' LIMIT 1");
if(mysql_num_rows($result2)!=0)
$a++;
}
?>
<tr>
<td><?php echo $rows['college_branch'];?></td>
<td><?php echo $a;?></td>
</tr>
<?php
}
?>
</table>
<div id="memberlistOut">
</div>
</body>
</html>