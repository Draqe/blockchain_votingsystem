<?php
include "../session_user.php";

$tie = "";
$yearResult = "";
$select = mysql_query("SELECT * FROM tblcandidate WHERE c_organization = '$adminorg' AND candidate_status = 0")or die (mysql_error());
while ($row = mysql_fetch_array($select)) {
	$c_year = $row['c_year'];
}
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

$appointbutton = "";
$select = mysql_query("SELECT * FROM elec_con WHERE organization = '$adminorg' AND start_term = '$thisyear'")or die (mysql_error());
$count=mysql_num_rows($select);
while($row = mysql_fetch_array($select)){
				$start_term = $row['start_term'];
				$total_mem = $row['total_mem'];
				$mem_vote = $row['mem_vote'];
				$min = (round(($total_mem/2),0)+1);
	}				
		if ($count == 0){
	
		}
		else {	
			if ($mem_vote == 0 || $mem_vote < $min){
				$appointbutton .= "<br /><br /><button class='btn btn-danger btn-lg' type='button' data-toggle='modal' data-target='#modal-resetelec'>RESET ELECTION</button>";
			}
			else{
				$select = mysql_query("SELECT * FROM tblofficer WHERE start_term = '$thisyear'")or die (mysql_error());
				$count = mysql_num_rows($select);
				if ($count == 0){
					$appointbutton .= "<button class='btn btn-success btn-lg' data-toggle='modal' data-target='#appoint'>Appoint Winners</button>";
				}
				else{
					$appointbutton .="<span class='text-success'><h2><strong>Appointed.</strong></h2></span>";
				}
			}
		}




$president_list = "";
$vicepresident_list="";
$secretary_list = "";
$treasurer_list = "";
$auditor_list = "";
$pro_list = "";

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

$select = mysql_query("SELECT * FROM tblcandidate WHERE c_organization = '$adminorg' AND candidate_status = '1' AND c_year = '$thisyear' AND c_position = 'President'")or die (mysql_error());
$count = (mysql_num_rows($select));
$associativeArray = array();
while($row = mysql_fetch_array($select)){
	$c_number = $row['c_number'];
	$c_fname = $row['c_fname'];
	$c_lname = $row['c_lname'];
	$c_position = $row['c_position'];
	$c_year = $row['c_year'];

   
	$votes = mysql_query("SELECT * FROM tblvote WHERE vote_p = '$c_number' AND v_organization = '$adminorg' AND v_year = '$c_year'")or die (mysql_error());
	$count=mysql_num_rows($votes);
	$associativeArray[$c_number] = $count;
				if ($count != 0){
					$president_list .= "<table id='resultlist'><tr>
										<td width='150px' style='color:#000'>".$c_fname." ".$c_lname."</td>
										<td height='50px' width='1px' bgcolor='#000'></td>
										<td bgcolor ='#3".($p*4)."3' height = '50px' width ='".$count."px' ></td>
										<td style='text-align:left; color:#000'>".$count."</td>
										</tr></table>"; 
				}
				
				else{
					$president_list .= "<table id='resultlist'><tr>
										<td width='150px' style='color:#000'>".$c_fname." ".$c_lname."</td>
										<td height='50px' width='1px' bgcolor='#000'></td>
										<td style='color:#ff0000; text-align:left'>No Vote</td>
										</tr></table>"; 
				}
	$p++;
}

if ($count == 0){
	$pwin .= "<label>President:</label><p class='text-danger'>No candidate in this position.</p><input type='hidden' value='x' name='president'>";
}
else{
$max = (max($associativeArray));
$countTie = count(array_keys($associativeArray, $max, true));

	if ($countTie <= 1){
		foreach($associativeArray as $c_number => $count){
			if ($count == $max){
				$sql = mysql_query("SELECT * FROM tblmember WHERE e_number = '$c_number'")or die (mysql_error());
				while ($row=mysql_fetch_array($sql)){
					$fname = $row['fname'];
					$lname = $row['lname'];
				}
				$pwin .= "<label>President:</label><input class='form-control' type='text' value='".$fname." ".$lname."' name='president' readonly='readonly'>";	
				$pwin .= "<input type='hidden' value='".$c_number."' name='president' readonly='readonly'>";
				$pwin .= "<br>";
			}
		}
	}
	else{
	
		$pwin .= "<label class='text-danger'>President:</label><p>These candidates are tie. Choose one.</p><select class ='form-control' name = 'president' required>
				<option value =''></option>";
		foreach($associativeArray as $c_number => $count){
			if ($count == $max){
				$sql = mysql_query("SELECT * FROM tblmember WHERE e_number = '$c_number'")or die (mysql_error());
				while ($row=mysql_fetch_array($sql)){
					$fname = $row['fname'];
					$lname = $row['lname'];
				}
				$pwin .= "<option value='".$c_number."'>".$fname." ".$lname."</option>";
			}
		}
		$pwin .= "</select><br>";
	
	}
   

}


/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

$select = mysql_query("SELECT * FROM tblcandidate WHERE c_organization = '$adminorg' AND candidate_status = '1' AND c_year = '$thisyear' AND c_position = 'Vice President'")or die (mysql_error());
$count = (mysql_num_rows($select));
$associativeArray = array();
while($row = mysql_fetch_array($select)){
	$c_number = $row['c_number'];
	$c_fname = $row['c_fname'];
	$c_lname = $row['c_lname'];
	$c_position = $row['c_position'];
	$c_year = $row['c_year'];

   
	$votes = mysql_query("SELECT * FROM tblvote WHERE vote_vp = '$c_number' AND v_organization = '$adminorg' AND v_year = '$c_year'")or die (mysql_error());
	$count=mysql_num_rows($votes);
	$associativeArray[$c_number] = $count;
				if ($count != 0){
					$vicepresident_list .= "<table id='resultlist'><tr>
										<td width='150px' style='color:#000'>".$c_fname." ".$c_lname."</td>
										<td height='50px' width='1px' bgcolor='#000'></td>
										<td bgcolor ='#3".($vp*4)."3' height = '50px' width ='".$count."px' ></td>
										<td style='text-align:left; color:#000'>".$count."</td>
										</tr></table>"; 
				}
				
				else{
					$vicepresident_list .= "<table id='resultlist'><tr>
										<td width='150px' style='color:#000'>".$c_fname." ".$c_lname."</td>
										<td height='50px' width='1px' bgcolor='#000'></td>
										<td style='color:#ff0000; text-align:left'>No Vote</td>
										</tr></table>"; 
				}
	$vp++;
}

if ($count == 0){
	$vpwin .= "<label>Vice President:</label><p class='text-danger'>No candidate in this position.</p><input type='hidden' value='x' name='vicepresident'>";
}
else{
$max = (max($associativeArray));
$countTie = count(array_keys($associativeArray, $max, true));

	if ($countTie <= 1){
		foreach($associativeArray as $c_number => $count){
			if ($count == $max){
				$sql = mysql_query("SELECT * FROM tblmember WHERE e_number = '$c_number'")or die (mysql_error());
				while ($row=mysql_fetch_array($sql)){
					$fname = $row['fname'];
					$lname = $row['lname'];
					
				}
				$vpwin .=  "<label>Vice President:</label><input class='form-control' type='text' value='".$fname." ".$lname."' name='vicepresident' readonly='readonly'>";	
				$vpwin .= "<input type='hidden' value='".$c_number."' name='vicepresident' readonly='readonly'>";
				$vpwin .= "<br>";
			}
		}
	}
	else{
	
		$vpwin .= "<label class='text-danger'>Vice President:</label><p>These candidates are tie. Choose one.</p><select class ='form-control' name = 'vicepresident' required>
				<option value =''></option>";
		foreach($associativeArray as $c_number => $count){
			if ($count == $max){
				$sql = mysql_query("SELECT * FROM tblmember WHERE e_number = '$c_number'")or die (mysql_error());
				while ($row=mysql_fetch_array($sql)){
					$fname = $row['fname'];
					$lname = $row['lname'];
				}
				$vpwin .= "<option value='".$c_number."'>".$fname." ".$lname."</option>";
			}
		}
		$vpwin .= "</select><br>";
	
	}
   

}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

$select = mysql_query("SELECT * FROM tblcandidate WHERE c_organization = '$adminorg' AND candidate_status = '1' AND c_year = '$thisyear' AND c_position = 'Secretary'")or die (mysql_error());
$count = (mysql_num_rows($select));
$associativeArray = array();
while($row = mysql_fetch_array($select)){
	$c_number = $row['c_number'];
	$c_fname = $row['c_fname'];
	$c_lname = $row['c_lname'];
	$c_position = $row['c_position'];
	$c_year = $row['c_year'];

   
	$votes = mysql_query("SELECT * FROM tblvote WHERE vote_s = '$c_number' AND v_organization = '$adminorg' AND v_year = '$c_year'")or die (mysql_error());
	$count=mysql_num_rows($votes);
	$associativeArray[$c_number] = $count;
				if ($count != 0){
					$secretary_list .= "<table id='resultlist'><tr>
										<td width='150px' style='color:#000'>".$c_fname." ".$c_lname."</td>
										<td height='50px' width='1px' bgcolor='#000'></td>
										<td bgcolor ='#3".($s*4)."3' height = '50px' width ='".$count."px' ></td>
										<td style='text-align:left; color:#000'>".$count."</td>
										</tr></table>"; 
				}
				
				else{
					$secretary_list .= "<table id='resultlist'><tr>
										<td width='150px' style='color:#000'>".$c_fname." ".$c_lname."</td>
										<td height='50px' width='1px' bgcolor='#000'></td>
										<td style='color:#ff0000; text-align:left'>No Vote</td>
										</tr></table>"; 
				}
	$s++;
}

if ($count == 0){
	$swin .= "<label>Secretary:</label><p class='text-danger'>No candidate in this position.</p><input type='hidden' value='x' name='secretary'>";
}
else{
$max = (max($associativeArray));
$countTie = count(array_keys($associativeArray, $max, true));

	if ($countTie <= 1){
		foreach($associativeArray as $c_number => $count){
			if ($count == $max){
				$sql = mysql_query("SELECT * FROM tblmember WHERE e_number = '$c_number'")or die (mysql_error());
				while ($row=mysql_fetch_array($sql)){
					$fname = $row['fname'];
					$lname = $row['lname'];
				}
				$swin .= "<label>Secretary:</label><input class='form-control' type='text' value='".$fname." ".$lname."' name='secretary' readonly='readonly'>";	
				$swin .= "<input type='hidden' value='".$c_number."' name='secretary' readonly='readonly'>";
				$swin .= "<br>";
			}
		}
	}
	else{
	
		$swin .= "<label class='text-danger'>Secretary:</label><p>These candidates are tie. Choose one.</p><select class ='form-control' name = 'secretary' required>
				<option value =''></option>";
		foreach($associativeArray as $c_number => $count){
			if ($count == $max){
				$sql = mysql_query("SELECT * FROM tblmember WHERE e_number = '$c_number'")or die (mysql_error());
				while ($row=mysql_fetch_array($sql)){
					$fname = $row['fname'];
					$lname = $row['lname'];
				}
				$swin .= "<option value='".$c_number."'>".$fname." ".$lname."</option>";
			}
		}
		$swin .= "</select><br>";
	
	}
   

}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

$select = mysql_query("SELECT * FROM tblcandidate WHERE c_organization = '$adminorg' AND candidate_status = '1' AND c_year = '$thisyear' AND c_position = 'Treasurer'")or die (mysql_error());
$count = (mysql_num_rows($select));
$associativeArray = array();
while($row = mysql_fetch_array($select)){
	$c_number = $row['c_number'];
	$c_fname = $row['c_fname'];
	$c_lname = $row['c_lname'];
	$c_position = $row['c_position'];
	$c_year = $row['c_year'];

   
	$votes = mysql_query("SELECT * FROM tblvote WHERE vote_t = '$c_number' AND v_organization = '$adminorg' AND v_year = '$c_year'")or die (mysql_error());
	$count=mysql_num_rows($votes);
	$associativeArray[$c_number] = $count;
				if ($count != 0){
					$treasurer_list .= "<table id='resultlist'><tr>
										<td width='150px' style='color:#000'>".$c_fname." ".$c_lname."</td>
										<td height='50px' width='1px' bgcolor='#000'></td>
										<td bgcolor ='#3".($t*4)."3' height = '50px' width ='".$count."px' ></td>
										<td style='text-align:left; color:#000'>".$count."</td>
										</tr></table>"; 
				}
				
				else{
					$treasurer_list .= "<table id='resultlist'><tr>
										<td width='150px' style='color:#000'>".$c_fname." ".$c_lname."</td>
										<td height='50px' width='1px' bgcolor='#000'></td>
										<td style='color:#ff0000; text-align:left'>No Vote</td>
										</tr></table>"; 
				}
	$t++;
}

if ($count == 0){
	$twin .= "<label>Treasurer:</label><p class='text-danger'>No candidate in this position.</p><input type='hidden' value='x' name='treasurer'>";
}
else{
$max = (max($associativeArray));
$countTie = count(array_keys($associativeArray, $max, true));

	if ($countTie <= 1){
		foreach($associativeArray as $c_number => $count){
			if ($count == $max){
				$sql = mysql_query("SELECT * FROM tblmember WHERE e_number = '$c_number'")or die (mysql_error());
				while ($row=mysql_fetch_array($sql)){
					$fname = $row['fname'];
					$lname = $row['lname'];
				}
				$twin .="<label>Treasurer:</label><input class='form-control' type='text' value='".$fname." ".$lname."' name='treasurer' readonly='readonly'>";	
				$twin .= "<input type='hidden' value='".$c_number."' name='treasurer' readonly='readonly'>";
				$twin .= "<br>";
			}
		}
	}
	else{
	
		$twin .= "<label class='text-danger'>Treasurer:</label><p>These candidates are tie. Choose one.</p><select class ='form-control name = 'treasurer' required>
				<option value =''></option>";
		foreach($associativeArray as $c_number => $count){
			if ($count == $max){
				$sql = mysql_query("SELECT * FROM tblmember WHERE e_number = '$c_number'")or die (mysql_error());
				while ($row=mysql_fetch_array($sql)){
					$fname = $row['fname'];
					$lname = $row['lname'];
				}
				$twin .= "<option value='".$c_number."'>".$fname." ".$lname."</option>";
			}
		}
		$twin .= "</select><br>";
	
	}
   

}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

$select = mysql_query("SELECT * FROM tblcandidate WHERE c_organization = '$adminorg' AND candidate_status = '1' AND c_year = '$thisyear' AND c_position = 'Auditor'")or die (mysql_error());
$count = (mysql_num_rows($select));
$associativeArray = array();
while($row = mysql_fetch_array($select)){
	$c_number = $row['c_number'];
	$c_fname = $row['c_fname'];
	$c_lname = $row['c_lname'];
	$c_position = $row['c_position'];
	$c_year = $row['c_year'];

   
	$votes = mysql_query("SELECT * FROM tblvote WHERE vote_a = '$c_number' AND v_organization = '$adminorg' AND v_year = '$c_year'")or die (mysql_error());
	$count=mysql_num_rows($votes);
	$associativeArray[$c_number] = $count;
				if ($count != 0){
					$auditor_list .= "<table id='resultlist'><tr>
										<td width='150px' style='color:#000'>".$c_fname." ".$c_lname."</td>
										<td height='50px' width='1px' bgcolor='#000'></td>
										<td bgcolor ='#3".($a*4)."3' height = '50px' width ='".$count."px' ></td>
										<td style='text-align:left; color:#000'>".$count."</td>
										</tr></table>"; 
				}
				
				else{
					$auditor_list .= "<table id='resultlist'><tr>
										<td width='150px' style='color:#000'>".$c_fname." ".$c_lname."</td>
										<td height='50px' width='1px' bgcolor='#000'></td>
										<td style='color:#ff0000; text-align:left'>No Vote</td>
										</tr></table>"; 
				}
	$a++;
}

if ($count == 0){
	$awin .= "<label>Auditor:</label><p class='text-danger'>No candidate in this position.</p><input type='hidden' value='x' name='auditor'>";
}
else{
$max = (max($associativeArray));
$countTie = count(array_keys($associativeArray, $max, true));

	if ($countTie <= 1){
		foreach($associativeArray as $c_number => $count){
			if ($count == $max){
				$sql = mysql_query("SELECT * FROM tblmember WHERE e_number = '$c_number'")or die (mysql_error());
				while ($row=mysql_fetch_array($sql)){
					$fname = $row['fname'];
					$lname = $row['lname'];
				}
				$awin .= "<label>Auditor:</label><input class='form-control' type='text' value='".$fname." ".$lname."' name='auditor' readonly='readonly'>";	
				$awin .= "<input type='hidden' value='".$c_number."' name='auditor' readonly='readonly'>";
				$awin .= "<br>";
			}
		}
	}
	else{
	
		$awin .= "<label class='text-danger'>Auditor:</label><p>These candidates are tie. Choose one.</p><select class ='form-control' name = 'auditor' required>
				<option value =''></option>";
		foreach($associativeArray as $c_number => $count){
			if ($count == $max){
				$sql = mysql_query("SELECT * FROM tblmember WHERE e_number = '$c_number'")or die (mysql_error());
				while ($row=mysql_fetch_array($sql)){
					$fname = $row['fname'];
					$lname = $row['lname'];
				}
				$awin .= "<option value='".$c_number."'>".$fname." ".$lname."</option>";
			}
		}
		$awin .= "</select><br>";
	
	}
   

}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

$select = mysql_query("SELECT * FROM tblcandidate WHERE c_organization = '$adminorg' AND candidate_status = '1' AND c_year = '$thisyear' AND c_position = 'PRO'")or die (mysql_error());
$count=(mysql_num_rows($select));
$associativeArray = array();
while($row = mysql_fetch_array($select)){
	$c_number = $row['c_number'];
	$c_fname = $row['c_fname'];
	$c_lname = $row['c_lname'];
	$c_position = $row['c_position'];
	$c_year = $row['c_year'];

   
	$votes = mysql_query("SELECT * FROM tblvote WHERE vote_pr = '$c_number' AND v_organization = '$adminorg' AND v_year = '$c_year'")or die (mysql_error());
	$count=mysql_num_rows($votes);
	$associativeArray[$c_number] = $count;
				if ($count != 0){
					$pro_list .= "<table id='resultlist'><tr>
										<td width='150px' style='color:#000'>".$c_fname." ".$c_lname."</td>
										<td height='50px' width='1px' bgcolor='#000'></td>
										<td bgcolor ='#3".($pr*4)."3' height = '50px' width ='".$count."px' ></td>
										<td style='text-align:left; color:#000'>".$count."</td>
										</tr></table>"; 
				}
				
				else{
					$pro_list .= "<table id='resultlist'><tr>
										<td width='150px' style='color:#000'>".$c_fname." ".$c_lname."</td>
										<td height='50px' width='1px' bgcolor='#000'></td>
										<td style='color:#ff0000; text-align:left'>No Vote</td>
										</tr></table>"; 
				}
	$pr++;
}

if ($count == 0){
	$prwin .= "<label>PRO:</label><p class='text-danger'>No candidate in this position.</p>
			<input type='hidden' value='x' name='pro'>";
}
else{
$max = (max($associativeArray));
$countTie = count(array_keys($associativeArray, $max, true));

	if ($countTie <= 1){
		foreach($associativeArray as $c_number => $count){
			if ($count == $max){
				$sql = mysql_query("SELECT * FROM tblmember WHERE e_number = '$c_number'")or die (mysql_error());
				while ($row=mysql_fetch_array($sql)){
					$fname = $row['fname'];
					$lname = $row['lname'];
				}
				$prwin .= "<label>PRO:</label><input class='form-control' type='text' value='".$fname." ".$lname."' name='pro' readonly='readonly'>";	
				$prwin .= "<input type='hidden' value='".$c_number."' name='pro' readonly='readonly'>";
				$prwin .= "<br>";
			}
		}
	}
	else{
	
		$prwin .= "<label class='text-danger'>PRO:</label><p>These candidates are tie. Choose one.</p><select class ='form-control' name = 'pro' required>
				<option value =''></option>";
		foreach($associativeArray as $c_number => $count){
			if ($count == $max){
				$sql = mysql_query("SELECT * FROM tblmember WHERE e_number = '$c_number'")or die (mysql_error());
				while ($row=mysql_fetch_array($sql)){
					$fname = $row['fname'];
					$lname = $row['lname'];
				}
				$prwin .= "<option value='".$c_number."'>".$fname." ".$lname."</option>";
			}
		}
		$prwin .= "</select><br>";
	
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
<script src='../js/inputtype.js' type="application/javascript"></script>
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
								<li><a href="report.php" class="text-success" id="menu">Report</a></li>
            	 <?php
						if ($org_status_election == 0){
							echo '<li class="active"><a href="result.php" class="text-success" id="menu">Result</a></li>';
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
				 <table width="100%"><tr>
						<td><h1>Result</h1>
<span style="margin-top:-20px">for <strong><?php if ($adminorg=="FA"){echo "FACULTY ASSOCIATION";} else{echo "NON-ACADEMIC EMPLOYEE ASSOCIATION";} ?></strong> <font class="text-danger"><?php echo $thisyear;?></font> Election</span></td>
						
                        <td align="right">
                        	<table>
                            	<tr><td>
									<?php 
                                        echo $appointbutton;
                                    ?>
								</td></tr>
                                <tr><td>&nbsp;</td></tr>
                                <tr><td align="right">
									<a href="print.php" target="_blank"><button class="btn btn-primary btn-lg">Print</button></a>
								</td></tr>
							</table>
						</td>
					</tr></table>
      
                <blockqoute><hr></blockqoute>
                
                <?php
$select = mysql_query("SELECT * FROM tblcandidate WHERE c_organization = '$adminorg' AND candidate_status = '1' AND c_year = '$thisyear'");
$count = (mysql_num_rows($select));
if ($count == 0){
	echo "<div class='form-control' style='height:auto'>
			<span class='text-danger' style='text-align:center'><strong>The election has not yet started!</strong></span>
		</div>";
}
else {
	$select = mysql_query("SELECT * FROM elec_con WHERE year_elec = '$c_year' AND organization = '$adminorg'");
	while ($row=mysql_fetch_array($select)){
		$total_mem = $row['total_mem'];
		$mem_vote = $row['mem_vote'];
		$min = (round(($total_mem/2),0)+1);
	}
		
		if ($mem_vote <  $min){
			echo "<div class='form-control' style='height:auto'>
					<span class='text-danger' style='text-align:center'><strong>Low number of participants in ".$c_year." election!</strong></span>
				</div>";
		}
		else{
			echo "<div class='form-group'>
					<div class='form-control' style='height:auto' align='left'>
					<h2>President</h2>
					<table width='100%' align='left'><tr><td>&nbsp;</td></tr></table>";
						
						 if ($president_list == ""){
							 echo "<table id='resultlist'><tr><td class='text-danger'><strong>There is no candidate for President.</strong></td></tr></table>";
						 }
						 else{
							 echo $president_list;
						 }
					 
			echo "<table><tr><td>&nbsp;</td></tr></table>
				</div></div>";
				
				

				
			echo "<div class='form-group'>
					<div class='form-control' style='height:auto' align='left'>
					<h2>Vice President</h2>
					<table width='100%'><tr><td>&nbsp;</td></tr></table>";
						
						 if ($vicepresident_list == ""){
							 echo "<table id='resultlist'><tr><td class='text-danger'><strong>There is no candidate for Vice President.</strong></td></tr></table>";
						 }
						 else{
							 echo $vicepresident_list;
						 }
					 
			echo "<table><tr><td>&nbsp;</td></tr></table>
				</div></div>";
			
			
			echo "<div class='form-group'>
					<div class='form-control' style='height:auto' align='left'>
					<h2>Treasurer</h2>
					<table width='100%'><tr><td>&nbsp;</td></tr></table>";
						
						 if ($treasurer_list == ""){
							 echo "<table id='resultlist'><tr><td class='text-danger'><strong>There is no candidate for Treasurer.</strong></td></tr></table>";
						 }
						 else{
							 echo $treasurer_list;
						 }
					 
			echo "<table><tr><td>&nbsp;</td></tr></table>
				</div></div>";
			
			
			echo "<div class='form-group'>
					<div class='form-control' style='height:auto' align='left'>
					<h2>Secretary</h2>
					<table width='100%'><tr><td>&nbsp;</td></tr></table>";
						
						 if ($secretary_list == ""){
							 echo "<table id='resultlist'><tr><td class='text-danger'><strong>There is no candidate for Secretary.</strong></td></tr></table>";
						 }
						 else{
							 echo $secretary_list;
						 }
					 
			echo "<table><tr><td>&nbsp;</td></tr></table>
				</div></div>";
			
				
			echo "<div class='form-group'>
					<div class='form-control' style='height:auto' align='left'>
					<h2>Auditor</h2>
					<table width='100%'><tr><td>&nbsp;</td></tr></table>";
						
						 if ($auditor_list == ""){
							 echo "<table id='resultlist'><tr><td class='text-danger'><strong>There is no candidate for Auditor.</strong></td></tr></table>";
						 }
						 else{
							 echo $auditor_list;
						 }
					 
			echo "<table><tr><td>&nbsp;</td></tr></table>
				</div></div>";	
			
			echo "<div class='form-group'>
					<div class='form-control' style='height:auto' align='left'>
					<h2>P.R.O.</h2>
					<table width='100%'><tr><td>&nbsp;</td></tr></table>";
						
						 if ($pro_list == ""){
							 echo "<table id='resultlist'><tr><td class='text-danger'><strong>There is no candidate for P.R.O.</strong></td></tr></table>";
						 }
						 else{
							 echo $pro_list;
						 }
					 
			echo "<table><tr><td>&nbsp;</td></tr></table>
				</div></div>";
				
		}
}
?>
               
              
            </div>

		</div>
        
	<!------ end of main content tag ----->    	  
    
    </div>
    
    <!------end of main body----->    	
	
    <!------footer----->
    <?php include "../footer.php"?>
    <!------end of footer----->    	    	
</div>




<!----------------------------------------------------------modal add officer ---------------------------------->
<div class="modal fade" id="appoint" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content" style="margin:10% auto; width:60%">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
         <h3 class="modal-title text-success" id="myModalLabel"><strong>List of Winners</strong></h3>
        <font>for <?php if ($adminorg == "FA"){ echo "Faculty Association"; } else{ echo "Non-Academic Employee Association"; }?> <font class="text-danger"><?php echo $thisyear?></font> Election</font>
      </div>
      <form action="addofficer.php" method="post">
      <div class="modal-body">
		<?php 
		echo $pwin;
		echo $vpwin;
		echo $swin;
		echo $twin;
		echo $awin;
		echo $prwin;
		?>
      </div>
      <div class="modal-footer">
		<input class="btn btn-success" type = "submit" name = "submit" value = "Save Result">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
      </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->



<!--------------------------------- end of modal --------------------------------------->

<!----- MODAL reset election ------>

<div class="modal fade" id="modal-resetelec" style="margin-top:5%">
  <div class="modal-dialog">
    <div class="modal-content" style="margin:10% auto; width:60%;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3 class="modal-title text-success" id="myModalLabel">Reset Election</h3>
      </div>
      <div class="modal-body" style="text-align:left">
      		
            <span style="width:60%; font-weight:bold; text-align:center" id = "resetelec-notice"></span>
            
      		<form id = "frm-resetelec" class = "resetelec" action = "asdasd.php" method = "POST">
            
                <label>Username:</label>
				<div class="form-group">
                <input name="username" class="form-control" type="text" id="re_e_number" placeholder="Employee Number" onKeyUp="alphanumeric('re_e_number')" onKeyDown="alphanumeric('re_e_number')" required/>
                </div>
                
                
                <label>Password:</label>
                <input name="password" class="form-control" type="password" id="re_pass" placeholder="Password" onKeyUp="alphanumeric('re_pass')" onKeyDown="alphanumeric('re_pass')" required/>
                
                
      </div>
      <div class="modal-footer" >
        <button type="submit" class="btn btn-success" type="submit" name="submit">Reset</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </form>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!---------------------end of modal deactivate election ----------------->

<!---------------------------- deactivate election ----------------------------------------->
<script>

				function verify_resetelec(resetelec)
				{
					
			
					$("#resetelec-notice").html("<p class = 'text-warning' style = 'width:100%; margin-left:-4%;text-align:center;'>Loading...</p>");

					$.ajax({
						url: "ajaxReset.php",
						type: "POST",
						data: $(resetelec).serializeArray(),
						success: function(info){
							
							if (info == 2)
							{
								$("#resetelec-notice").html("<p class = 'text-danger' style = 'width:100%; margin-left:-6%; text-align:center;'>Incorrect Username or Password!</p>");
								
							}
							else if (info == 1){
								alert('Election is successfully reset.');
								window.location.assign('../<?php echo $adminorg?>.php');
							}
						}
					
					
					
					}).fail(function(){
						
						$("#resetelec-notice").html("<p class = 'text-danger'>Error.</p>");
					
					});
				
				}
		
			$(document).ready(function(){
					
					
					$("#modal-resetelec").on("show.bs.modal", function(e){
					
						$("#resetelec-notice").html("<p>&nbsp;</p>");
						$("#frm-resetelec")[0].reset();
					
					
					});
					
					
					
					$("#frm-resetelec").submit(function(e){
						
						e.preventDefault();
						verify_resetelec(this); 
					});
				
				
				});


				
			
</script>

</body>
</html>


