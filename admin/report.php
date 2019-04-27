<?php
include "../session_user.php";
$yearResult = "";

$selectyear = mysql_query("SELECT * FROM elec_con WHERE organization = '$adminorg' AND year_elec = '$thisyear'")or die (mysql_error());
$count = (mysql_num_rows($selectyear));
	if ($count == 0){
		$yearResult .= "<option value='".$thisyear."'>".$thisyear."</option>";	
		$select = mysql_query("SELECT * FROM elec_con WHERE organization = '$adminorg' ORDER BY year_elec DESC")or die (mysql_error());
			while ($row=mysql_fetch_array($select)){
				$year_elec = $row['year_elec'];
				$start_term = $row['start_term'];
				$end_term = $row['end_term'];
				$yearResult .= "<option value='".$year_elec."'>".$year_elec."</option>";
			}
	}
	else{
		$select = mysql_query("SELECT * FROM elec_con WHERE organization = '$adminorg' ORDER BY year_elec DESC")or die (mysql_error());
			while ($row=mysql_fetch_array($select)){
				$year_elec = $row['year_elec'];
				$start_term = $row['start_term'];
				$end_term = $row['end_term'];
				$yearResult .= "<option value='".$year_elec."'>".$year_elec."</option>";
			}
	}

$select = mysql_query("SELECT * FROM election WHERE organization = '$adminorg'")or die (mysql_error());
while ($row=mysql_fetch_array($select)){
	$organization_status = $row['org_status'];
}
if($organization_status == 1){
$all = mysql_query("SELECT * FROM tblmember where organization = '$adminorg'")or die (mysql_error());
$cntall=mysql_num_rows($all);


$select = mysql_query("SELECT * FROM tblmember where organization = '$adminorg' AND member_status = 0")or die (mysql_error());
$count =mysql_num_rows($select);

$voted = ($count/$cntall)*100;
$roundv = round($voted,2);
	if ($count == 0){
		$report = "<td valign='bottom'><table>
				<tr><td align='center'>".$roundv."%</td></tr>
				<tr><td bgcolor='#000' width='100px'></td></tr>
				<tr><td align='center'>Voted</td></tr>
				</table></td>";  

	}
	else{
		$report = "<td valign='bottom'><table>
				<tr><td align='center'>".$roundv."%</td></tr>
				<tr><td bgcolor ='#333' width = '100px' height ='".($roundv*4)."px' ></td></tr>
				<tr><td></td></tr>
				<tr><td bgcolor='#000'></td></tr>
				<tr><td align='center'>Voted</td></tr>
				</table></td>";  
	}

$select = mysql_query("SELECT * FROM tblmember where organization = '$adminorg' AND member_status = 1")or die (mysql_error());
$count =mysql_num_rows($select);
$notvote = ($count/$cntall)*100;
$roundn = round($notvote,2);
	if ($count == 0){
		$report .= "<td valign='bottom'><table>
				<tr><td align='center'>".$roundn."%</td></tr>
				<tr><td bgcolor='#000' width ='100px'></td></tr>
				<tr><td align='center'>Not Voted</td></tr>
				</table></td>";  

		}
	else{
		$report .= "<td valign='bottom'><table>
				<tr><td align='center'>".$roundn."%</td></tr>
				<tr><td style='box-shadow:2px 2px 2px #999' bgcolor ='#ff0000' width = '100px' height ='".($roundn*4)."px' ></td></tr>
				<tr><td></td></tr>
				<tr><td bgcolor='#000'></td></tr>
				<tr><td align='center'>Not Voted</td></tr>
				</table></td>";  
	}
}
else{
	$select = mysql_query("SELECT * FROM elec_con WHERE organization = '$adminorg' AND year_elec = '$thisyear'")or die (mysql_error());
	$count = mysql_num_rows($select);
	if ($count == 0){
		$report ="<td class='text-danger'><strong>No data found!</strong></td>";
	}
	else{
	while ($row=mysql_fetch_array($select)){
		$total_mem = $row['total_mem'];
		$mem_not = $row['mem_not'];
		$mem_vote = $row['mem_vote'];
	}
	$voted = ($mem_vote/$total_mem)*100;
	$roundv = round($voted,2);
	$notvote = ($mem_not/$total_mem)*100;
	$roundn = round($notvote,2);
	
	if ($mem_vote == 0){
		$report = "<td valign='bottom'><table>
				<tr><td align='center'>".$roundv."%</td></tr>
				<tr><td bgcolor='#000' width ='100px'></td></tr>
				<tr><td align='center'>Voted</td></tr>
				</table></td>";  

		}
	else{
	$report = "<td valign='bottom'><table>
				<tr><td align='center'>".$roundv."%</td></tr>
				<tr><td bgcolor ='#333' width = '100px' height ='".($roundv*4)."px' ></td></tr>
				<tr><td></td></tr>
				<tr><td bgcolor='#000'></td></tr>
				<tr><td align='center'>Voted</td></tr>
				</table></td>";  
	}
	if ($mem_not == 0){
		$report .= "<td valign='bottom'><table>
				<tr><td align='center'>".$roundn."%</td></tr>
				<tr><td bgcolor='#000' width ='100px'></td></tr>
				<tr><td align='center'>Not Voted</td></tr>
				</table></td>";  

		}
	else{
	$report .= "<td valign='bottom'><table>
				<tr><td align='center'>".$roundn."%</td></tr>
				<tr><td style='box-shadow:2px 2px 2px #999' bgcolor ='#ff0000' width = '100px' height ='".($roundn*4)."px' ></td></tr>
				<tr><td></td></tr>
				<tr><td bgcolor='#000'></td></tr>
				<tr><td align='center'>Not Voted</td></tr>
				</table></td>";  
	}
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<link rel="stylesheet" href="../css/bootstrap.css" tyep="text/css" media="screen"/>
<link rel="stylesheet" href="../css/style.css" tyep="text/css" media="screen"/>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">
<link rel="icon" href="../favicon.ico" type="image/x-icon">
<title>CvSU-OVS-Faculty Association</title>

</head>
<script src="../js/jquery-2.0.0.min.js" type="application/javascript"></script>
<script src="../js/bootstrap.js" type="application/javascript"></script>

<body background="../texture.png">

<div id="mainWrapper" align="center">
	 <?php
		include "../headerlog.php";
		include "../headermenu.php";
	?>
<!-------main body ------>    
    <div id="mainbody" class="form-control">
	<!------ menu tag ----->    	
        <div id="menutag" class="container">
            <h3 class="text-success"><strong><?php if ($adminorg == "FA"){echo "Faculty Assoc.";} else{ echo "N. A. E. A"; } ?></strong></h3>
			<ul class="nav nav-pills nav-stacked col-sm-15" style="text-align:left; margin-right:-5%; margin-left:10%">
            	<li><a class="text-success" href="../FA.php" id="menu">Home</a></li>
				<li><a href="member.php" class="text-success" id="menu">Member</a></li>
								<li><a href="officerlist.php" class="text-success" id="menu">Officer</a></li>
								<li><a href="accountlist.php" class="text-success" id="menu">Account List</a></li>
								<li class="text-success" style="text-shadow:1px 1px 2px #999; margin-left:4%"><h4><strong>Election</strong></h4></li>
								<li><a href="candidatelist.php" class="text-success" id="menu">Candidates</a></li>
								<li class="active"><a href="report.php" class="text-success" id="menu">Report</a></li>
            	 <?php
						if ($org_status_election == 0){
							echo '<li><a href="result.php" class="text-success" id="menu">Result</a></li>';
							}
							else{
								echo '<li class="text-success" id="disableLink">Result</li>';
							}   
					?>

				<li>&nbsp;</li>
				<li>&nbsp;</li>
			</ul>
        </div>
	<!----- end of menu tag ------>
    
    <!------ main content tag ----->    	
     	<div id="maincontent">
		<div class="well">	
	         <h1>Status of Election</h1>
<span style="margin-top:-20px">for <strong><?php if ($adminorg=="FA"){echo "FACULTY ASSOCIATION";} else{echo "NON-ACADEMIC EMPLOYEE ASSOCIATION";} ?></strong> Election <font class="text-danger"><?php echo $thisyear;?></font></span>
    
			<blockqoute><hr></blockqoute>
			
            <div class="form-control" style="height:auto">
            	<table>
					<?php 
                        echo $report;
                    ?>
				</table>
            </div>
            
		</div>

		</div>
        
	<!------ end of main content tag ----->    	  
    
    </div>
    
    <!------end of main body----->    	
	
    <!------footer----->
    <?php include "../footer.php"?>
    <!------end of footer----->    	    	
</div>
</body>
</html>
