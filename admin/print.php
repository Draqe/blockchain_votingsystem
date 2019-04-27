<?php 
error_reporting(0);
include "../session_user.php";


$president_list = "";
$vicepresident_list="";
$secretary_list = "";
$treasurer_list = "";
$auditor_list = "";
$pro_list = "";
$report = "";
$p=1;
$vp=1;
$s=1;
$t=1;
$a=1;
$pr=1;

$pwin = "";
$vpwin = "";
$swin = "";
$twin = "";
$awin = "";
$prwin = "";

$year = $thisyear;
		 if ($sign != "admin"){
			echo "<script>
				alert('This page is for admin only!');
				window.location.assign('../$org.php');
			</script>";	}
	else{
		
	
			
				$select = mysql_query("SELECT * FROM elec_con WHERE year_elec = '$year'");
			while ($row = mysql_fetch_array($select)){
				$year_elec = $row['year_elec'];
				$total_mem = $row['total_mem'];
				$mem_vote = $row['mem_vote'];
				$mem_not = $row['mem_not'];
				
				$report .= "<tr>
								<td align='center'>".$mem_vote."</td>
								<td align='center'>".$mem_not."</td>
						</tr>";
			}
				
			
				
				$select = mysql_query("SELECT * FROM tblcandidate WHERE c_organization = '$adminorg' AND candidate_status = '1' AND c_year = '$year' AND c_position = 'President'")or die (mysql_error());
				$count = (mysql_num_rows($select));
				while($row = mysql_fetch_array($select)){
					$c_number = $row['c_number'];
					$c_fname = $row['c_fname'];
					$c_lname = $row['c_lname'];
					$c_position = $row['c_position'];
					$c_college_branch = $row['c_college_branch'];
					$c_campus = $row['c_campus'];
					$c_year = $row['c_year'];
				
		
					$votes = mysql_query("SELECT * FROM tblvote WHERE vote_p = '$c_number' AND v_organization = '$adminorg' AND v_year = '$year'")or die (mysql_error())or die (mysql_error());
					$count=mysql_num_rows($votes);
					$associativeArray[$c_number] = $count;
								
									$president_list .= "<tr>
															<td align='center'>".$c_number."</td>
															<td align='center'>".$c_fname." ".$c_lname."</td>
															<td align='center'>".$c_campus."</td>
															<td align='center'>".$c_college_branch."</td>
															<td align='center'>".$count."</td>
														</tr>";			
					$p++;
				}
				
				

///////////////////////////////////////
	
							$select = mysql_query("SELECT * FROM tblcandidate WHERE c_organization = '$adminorg' AND candidate_status = '1' AND c_year = '$year' AND c_position = 'Vice President'")or die (mysql_error());
			$count = (mysql_num_rows($select));
			while($row = mysql_fetch_array($select)){
								$c_number = $row['c_number'];
								$c_fname = $row['c_fname'];
								$c_lname = $row['c_lname'];
								$c_position = $row['c_position'];
								$c_college_branch = $row['c_college_branch'];
								$c_campus = $row['c_campus'];
								$c_year = $row['c_year'];
			
			   
				$votes = mysql_query("SELECT * FROM tblvote WHERE vote_vp = '$c_number' AND v_organization = '$adminorg' AND v_year = '$year'")or die (mysql_error());
				$count=mysql_num_rows($votes);
				$associativeArray[$c_number] = $count;
						
								$vicepresident_list .= "<tr>
															<td align='center'>".$c_number."</td>
															<td align='center'>".$c_fname." ".$c_lname."</td>
															<td align='center'>".$c_campus."</td>
															<td align='center'>".$c_college_branch."</td>
															<td align='center'>".$count."</td>
														</tr>";
	$vp++;
}

///////////////////////////////////////
				
					$select = mysql_query("SELECT * FROM tblcandidate WHERE c_organization = '$adminorg' AND candidate_status = '1' AND c_year = '$year' AND c_position = 'Secretary'")or die (mysql_error());
					$count = (mysql_num_rows($select));
					while($row = mysql_fetch_array($select)){
										$c_number = $row['c_number'];
										$c_fname = $row['c_fname'];
										$c_lname = $row['c_lname'];
										$c_position = $row['c_position'];
										$c_college_branch = $row['c_college_branch'];
										$c_campus = $row['c_campus'];
										$c_year = $row['c_year'];
					
					   
						$votes = mysql_query("SELECT * FROM tblvote WHERE vote_s = '$c_number' AND v_organization = '$adminorg' AND v_year = '$year'")or die (mysql_error());

						$count=mysql_num_rows($votes);
						$associativeArray[$c_number] = $count;
								
										$secretary_list .= "<tr>
																<td align='center'>".$c_number."</td>
																<td align='center'>".$c_fname." ".$c_lname."</td>
																<td align='center'>".$c_campus."</td>
																<td align='center'>".$c_college_branch."</td>
																<td align='center'>".$count."</td>
															</tr>";
	
		$s++;
	}

///////////////////////////////////////

					$select = mysql_query("SELECT * FROM tblcandidate WHERE c_organization = '$adminorg' AND candidate_status = '1' AND c_year = '$year' AND c_position = 'Treasurer'")or die (mysql_error());
					$count = (mysql_num_rows($select));
					$associativeArray = array();
					while($row = mysql_fetch_array($select)){
														$c_number = $row['c_number'];
														$c_fname = $row['c_fname'];
														$c_lname = $row['c_lname'];
														$c_position = $row['c_position'];
														$c_college_branch = $row['c_college_branch'];
														$c_campus = $row['c_campus'];
														$c_year = $row['c_year'];
					
					   
						$votes = mysql_query("SELECT * FROM tblvote WHERE vote_t = '$c_number' AND v_organization = '$adminorg' AND v_year = '$year'")or die (mysql_error());
						$count=mysql_num_rows($votes);
						$associativeArray[$c_number] = $count;
					
										$treasurer_list .= "<tr>
																<td align='center'>".$c_number."</td>
																<td align='center'>".$c_fname." ".$c_lname."</td>
																<td align='center'>".$c_campus."</td>
																<td align='center'>".$c_college_branch."</td>
																<td align='center'>".$count."</td>
															</tr>";
		$t++;
	}

///////////////////////////////////////
					
										$select = mysql_query("SELECT * FROM tblcandidate WHERE c_organization = '$adminorg' AND candidate_status = '1' AND c_year = '$year' AND c_position = 'Auditor'")or die (mysql_error());
										$count = (mysql_num_rows($select));
										while($row = mysql_fetch_array($select)){
																							$c_number = $row['c_number'];
																							$c_fname = $row['c_fname'];
																							$c_lname = $row['c_lname'];
																							$c_position = $row['c_position'];
																							$c_college_branch = $row['c_college_branch'];
																							$c_campus = $row['c_campus'];
																							$c_year = $row['c_year'];
										
										   
											$votes = mysql_query("SELECT * FROM tblvote WHERE vote_a = '$c_number' AND v_organization = '$adminorg' AND v_year = '$year'")or die (mysql_error());
											$count=mysql_num_rows($votes);
											$associativeArray[$c_number] = $count;
													
															$auditor_list .= "<tr>
																				<td align='center'>".$c_number."</td>
																				<td align='center'>".$c_fname." ".$c_lname."</td>
																				<td align='center'>".$c_campus."</td>
																				<td align='center'>".$c_college_branch."</td>
																				<td align='center'>".$count."</td>
																			</tr>";
						$a++;
					}

///////////////////////////////////////
		
						$select = mysql_query("SELECT * FROM tblcandidate WHERE c_organization = '$adminorg' AND candidate_status = '1' AND c_year = '$year' AND c_position = 'PRO'")or die (mysql_error());
						$count=(mysql_num_rows($select));
						while($row = mysql_fetch_array($select)){
							$c_number = $row['c_number'];
											$c_fname = $row['c_fname'];
											$c_lname = $row['c_lname'];
											$c_position = $row['c_position'];
											$c_college_branch = $row['c_college_branch'];
											$c_campus = $row['c_campus'];
											$c_year = $row['c_year'];
						
						   
							$votes = mysql_query("SELECT * FROM tblvote WHERE vote_pr = '$c_number' AND v_organization = '$adminorg' AND v_year = '$year'")or die (mysql_error());
							$count=mysql_num_rows($votes);
							$associativeArray[$c_number] = $count;
										
											$pro_list .= "<tr>
															<td align='center'>".$c_number."</td>
															<td align='center'>".$c_fname." ".$c_lname."</td>
															<td align='center'>".$c_campus."</td>
															<td align='center'>".$c_college_branch."</td>
															<td align='center'>".$count."</td>
														</tr>";
					$pr++;
				}
				
			 
		}
	
 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<style type="text/css" media="print">
@media print
{
#non-printable { display: none; }
#printable {
display: block;
width: 100%;
height: 50%;
border: none;
}
#printable h3{
	text-align:center;
}
#printable h4{
	margin-left:90px;
}
#printable table{
	font-size:13px;
	
}

}
</style>
<style type="text/css">
#mainWrapper {
	width:900px;	
}

#mainWrapper table {
	margin-left:60px;
}
</style>
<script>
function printform(){
window.print();
}

</script>

<body>
<div id="mainWrapper">
<input onclick="printform()" value="Print" id="non-printable" type="submit"/>
<div id="printable">
<div>
<?php 
	if ($adminorg == "FA"){
		$o= "Faculty Association";
	}
	else{
		$o= "Non-Academic Employee Association";
	}
?>
<div style="margin-left:150px">
<table>
<tr>
	<td><img src="CvSU1.gif"width="470" height="95" alt="CvSU Logo" /></td>
</tr>
<tr>     
<td align="center"><h4 style="margin-left:-3%">Result of <?php echo $year." ".$o;?> Election</h4></td>
</tr>
</table>
</div>

<blockquote><hr /></blockquote>
<table width="85%" border="1" cellspacing="0" cellpadding="6">
	<tr>
    	<td width="25%" align="center" style="font-weight:bold">Number of Employees Who Voted</td>
        <td width="25%" align="center" style="font-weight:bold">Number of Employees Who Did Not Vote</td>
    </tr>
    <?php echo $report;?>
</table>
<h4>President</h4>
<table width="85%" border="1" cellspacing="0" cellpadding="6">
<tr>
	<td width="25%" align="center" style="font-weight:bold">Employee Number</td>
    <td width="25%" align="center" style="font-weight:bold">Name</td>
    <td align="center" style="font-weight:bold">Campus</td>
    <td align="center" style="font-weight:bold">Branch/College</td>
    <td align="center" style="font-weight:bold">No. of Votes</td>
</tr>
<?php echo $president_list?>
</table>

<h4>Vice President</h4>
<table width="85%" border="1" cellspacing="0" cellpadding="6">
<tr>
	<td width="25%" align="center" style="font-weight:bold">Employee Number</td>
    <td width="25%" align="center" style="font-weight:bold">Name</td>
    <td align="center" style="font-weight:bold">Campus</td>
    <td align="center" style="font-weight:bold">Branch/College</td>
    <td align="center" style="font-weight:bold">No. of Votes</td>
</tr>
<?php echo $vicepresident_list?>
</table>

<h4>Secretary</h4>
<table width="85%" border="1" cellspacing="0" cellpadding="6">
<tr>
	<td width="25%" align="center" style="font-weight:bold">Employee Number</td>
    <td width="25%" align="center" style="font-weight:bold">Name</td>
    <td align="center" style="font-weight:bold">Campus</td>
    <td align="center" style="font-weight:bold">Branch/College</td>
    <td align="center" style="font-weight:bold">No. of Votes</td>
</tr>
<?php echo $secretary_list?>
</table>

<h4>Treasurer</h4>
<table width="85%" border="1" cellspacing="0" cellpadding="6">
<tr>
	<td width="25%" align="center" style="font-weight:bold">Employee Number</td>
    <td width="25%" align="center" style="font-weight:bold">Name</td>
    <td align="center" style="font-weight:bold">Campus</td>
    <td align="center" style="font-weight:bold">Branch/College</td>
    <td align="center" style="font-weight:bold">No. of Votes</td>
</tr>
<?php echo $treasurer_list?>
</table>

<h4>Auditor</h4>
<table width="85%" border="1" cellspacing="0" cellpadding="6">
<tr>
	<td width="25%" align="center" style="font-weight:bold">Employee Number</td>
    <td width="25%" align="center" style="font-weight:bold">Name</td>
    <td align="center" style="font-weight:bold">Campus</td>
    <td align="center" style="font-weight:bold">Branch/College</td>
    <td align="center" style="font-weight:bold">No. of Votes</td>
</tr>
<?php echo $auditor_list?>
</table>

<h4>P.R.O.</h4>
<table width="85%" border="1" cellspacing="0" cellpadding="6">
<tr>
	<td width="25%" align="center" style="font-weight:bold">Employee Number</td>
    <td width="25%" align="center" style="font-weight:bold">Name</td>
    <td align="center" style="font-weight:bold">Campus</td>
    <td align="center" style="font-weight:bold">Branch/College</td>
    <td align="center" style="font-weight:bold">No. of Votes</td>
</tr>
<?php echo $pro_list?>
</table>
<br /><br /><br />
<div style="margin-left:-20px">
<table>
<tr>
	<td>
    	<table>
        	<tr>
            	<td align="center">__________________________</td>
            </tr>
            <tr>
            	<td align="center">Committee Chairman</td>
            </tr>
        </table>
    </td>
    <td>
    	<table>
        	<tr>
            	<td align="center">__________________________</td>
            </tr>
            <tr>
            	<td align="center">Committee Member</td>
            </tr>
        </table>
    </td>
     <td>
    	<table>
        	<tr>
            	<td align="center">__________________________</td>
            </tr>
            <tr>
            	<td align="center">Committee Member</td>
            </tr>
        </table>
    </td>
</tr>
</table>
</div>
</div>
</div>
</body>
</html>
