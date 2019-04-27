<?php
include "session_user.php";
$i=1;
$yearResult = "";

$selectyear = mysql_query("SELECT * FROM elec_con WHERE organization = '$org' AND year_elec = '$thisyear'");
$count = (mysql_num_rows($selectyear));
	if ($count == 0){
		$yearResult .= "<option value='".$thisyear."'>".$thisyear."</option>";	
		$select = mysql_query("SELECT * FROM elec_con WHERE organization = '$org' ORDER BY year_elec DESC")or die (mysql_error());
			while ($row=mysql_fetch_array($select)){
				$year_elec = $row['year_elec'];
				$start_term = $row['start_term'];
				$end_term = $row['end_term'];
				$yearResult .= "<option value='".$year_elec."'>".$year_elec."</option>";
			}
	}
	else{
		$select = mysql_query("SELECT * FROM elec_con WHERE organization = '$org' ORDER BY year_elec DESC");
			while ($row=mysql_fetch_array($select)){
				$year_elec = $row['year_elec'];
				$start_term = $row['start_term'];
				$end_term = $row['end_term'];
				$yearResult .= "<option value='".$year_elec."'>".$year_elec."</option>";
			}
	}

$result="";
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

$select = mysql_query("SELECT * FROM tblcandidate WHERE c_organization = '$org' AND candidate_status = '1' AND c_year = '$thisyear'");
$count = (mysql_num_rows($select));
while($row=mysql_fetch_array($select)){
	$c_number = $row['c_number'];
	$c_fname = $row['c_fname'];
	$c_lname = $row['c_lname'];
	$c_position = $row['c_position'];
	$c_year = $row['c_year'];
	//$c_array[$i] = $c_number;
	//echo $c_array[$i];
	//echo "<br>";
	
		if ($c_position == "President"){
			$votes = mysql_query("SELECT * FROM tblvote WHERE vote_p = '$c_number' AND v_organization = '$org' AND v_year = '$c_year'");
			$count=mysql_num_rows($votes);
			if ($count != 0){
				$president_list .= "<table id='resultlist'><tr>
									<td width='150px' style='color:#000'>".$c_fname." ".$c_lname."</td>
									<td height='50px' width='1px' bgcolor='#000'></td>
									<td bgcolor ='#3".($p*4)."3' height = '50px' width ='".$count."px' ></td>
									<td style='text-align:left; color:#000'>".$count."</td>
									</tr></table>"; 
								$p++;
			}
			
			else{
				$president_list .= "<table id='resultlist'><tr>
									<td width='150px' style='color:#000'>".$c_fname." ".$c_lname."</td>
									<td height='50px' width='1px' bgcolor='#000'></td>
									<td style='color:#ff0000; text-align:left'>No Vote</td>
									</tr></table>"; 
								$p++;
			}
	
		}
		else if($c_position == "Vice President"){
			$votes = mysql_query("SELECT * FROM tblvote WHERE vote_vp = '$c_number' AND v_organization = '$org' AND v_year = '$c_year'");
			$count=mysql_num_rows($votes);
			if ($count != 0){
				$vicepresident_list .= "<table id='resultlist'><tr>
									<td width='150px' style='color:#000'>".$c_fname." ".$c_lname."</td>
									<td height='50px' width='1px' bgcolor='#000'></td>
									<td bgcolor ='#3".($vp*4)."3' height = '50px' width ='".$count."px' ></td>
									<td style='text-align:left; color:#000'>".$count."</td>
									</tr></table>"; 
								$vp++;
			}
			
			else{
				$vicepresident_list .= "<table id='resultlist'><tr>
									<td width='150px'>".$c_fname." ".$c_lname."</td>
									<td height='50px' bgcolor='#FFFFFF'></td>
									<td style='color:#ff0000'>No Vote</td>
									</tr></table>"; 
								$vp++;
			}
		}
		else if($c_position == "Secretary"){
			$votes = mysql_query("SELECT * FROM tblvote WHERE vote_s = '$c_number' AND v_organization = '$org' AND v_year = '$c_year'");
			$count=mysql_num_rows($votes);
			if ($count != 0){
				$secretary_list .= "<table id='resultlist'><tr>
									<td width='150px' style='color:#000'>".$c_fname." ".$c_lname."</td>
									<td height='50px' width='1px' bgcolor='#000'></td>
									<td bgcolor ='#3".($s*4)."3' height = '50px' width ='".$count."px' ></td>
									<td style='text-align:left; color:#000'>".$count."</td>
									</tr></table>"; 
								$s++;
			}
			
			else{
				$secretary_list .= "<table id='resultlist'><tr>
									<td width='150px'>".$c_fname." ".$c_lname."</td>
									<td height='50px' bgcolor='#FFFFFF'></td>
									<td style='color:#ff0000'>No Vote</td>
									</tr></table>"; 
								$s++;
			}
		}
		
		else if($c_position == "Treasurer"){
			$votes = mysql_query("SELECT * FROM tblvote WHERE vote_t = '$c_number' AND v_organization = '$org' AND v_year = '$c_year'");
			$count=mysql_num_rows($votes);
			if ($count != 0){
				$treasurer_list .= "<table id='resultlist'><tr>
									<td width='150px' style='color:#000'>".$c_fname." ".$c_lname."</td>
									<td height='50px' width='1px' bgcolor='#000'></td>
									<td bgcolor ='#3".($t*4)."3' height = '50px' width ='".$count."px' ></td>
									<td style='text-align:left; color:#000'>".$count."</td>
									</tr></table>"; 
								$t++;
			}
			
			else{
				$treasurer_list .= "<table id='resultlist'><tr>
									<td width='150px'>".$c_fname." ".$c_lname."</td>
									<td height='50px' bgcolor='#FFFFFF'></td>
									<td style='color:#ff0000'>No Vote</td>
									</tr></table>"; 
								$t++;
			}
		}
		
		else if($c_position == "Auditor"){
			$votes = mysql_query("SELECT * FROM tblvote WHERE vote_a = '$c_number' AND v_organization = '$org' AND v_year = '$c_year'");
			$count=mysql_num_rows($votes);
			if ($count != 0){
				$auditor_list .= "<table id='resultlist'><tr>
									<td width='150px' style='color:#000'>".$c_fname." ".$c_lname."</td>
									<td height='50px' width='1px' bgcolor='#000'></td>
									<td bgcolor ='#3".($a*4)."3' height = '50px' width ='".$count."px' ></td>
									<td style='text-align:left; color:#000'>".$count."</td>
									</tr></table>";   
								$a++;
			}
			
			else{
				$auditor_list .= "<table id='resultlist'><tr>
									<td width='150px'>".$c_fname." ".$c_lname."</td>
									<td height='50px' bgcolor='#FFFFFF'></td>
									<td style='color:#ff0000'>No Vote</td>
									</tr></table>"; 
								$a++;
			}
		}
		
		else if($c_position == "PRO"){
			$votes = mysql_query("SELECT * FROM tblvote WHERE vote_pr = '$c_number' AND v_organization = '$org' AND v_year = '$c_year'");
			$count=mysql_num_rows($votes);
			if ($count != 0){
				$pro_list .= "<table id='resultlist'><tr>
									<td width='150px' style='color:#000'>".$c_fname." ".$c_lname."</td>
									<td height='50px' width='1px' bgcolor='#000'></td>
									<td bgcolor ='#3".($pr*4)."3' height = '50px' width ='".$count."px' ></td>
									<td style='text-align:left; color:#000'>".$count."</td>
									</tr></table>";   
								$pr++;
			}
			
			else{
				$pro_list .= "<table id='resultlist'><tr>
									<td width='150px'>".$c_fname." ".$c_lname."</td>
									<td height='50px' bgcolor='#FFFFFF'></td>
									<td style='color:#ff0000'>No Vote</td>
									</tr></table>"; 
								$pr++;
			}
		}
		else{
			$result=0;
		}
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<link rel="stylesheet" href="css/bootstrap.css" tyep="text/css" media="screen"/>
<link rel="stylesheet" href="css/style.css" tyep="text/css" media="screen"/>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
<link rel="icon" href="favicon.ico" type="image/x-icon">
<title>CvSU-OVS-Faculty Association</title>

</head>
<script src="js/jquery-2.0.0.min.js" type="application/javascript"></script>
<script src="js/bootstrap.js" type="application/javascript"></script>

<body background="texture.png">

<div id="mainWrapper" align="center">
	 <?php
		include "headerlog.php";
		include "headermenu.php";
	?>
<!-------main body ------>    
    <div id="mainbody" class="form-control">
	<!------ menu tag ----->    	
        <div id="menutag" class="container">
            <h3 class="text-success"><strong><?php if ($org == "FA"){echo "Faculty Assoc.";} else{ echo "N. A. E. A"; } ?></strong></h3>
			<ul class="nav nav-pills nav-stacked col-sm-15" style="text-align:left; margin-right:-5%; margin-left:10%">
            	<li><a class="text-success" href="FA.php" id="menu">Home</a></li>
				<li><a href="faofficerlist.php" class="text-success" id="menu">Officer</a></li>
                <li class="text-success" style="text-shadow:1px 1px 2px #999; margin-left:4%"><h4><strong>Election</strong></h4></li>
				<li><a href="candidatelist.php" class="text-success" id="menu">Candidates</a></li>
            	 <?php
						if ($org_status == 0){
							echo '<li class="text-success" id="disableLink" id="menu">Report</li>
								<li  class="active"><a href="result.php" class="text-success" id="menu">Result</a></li>';
							}
							else{
								echo '<li><a href="report.php" class="text-success" id="menu">Report</a></li>
										<li class="text-success" id="menu">Result</li>';
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
				<h1>Result</h1>
      <span align="center" style="margin-top:-20px">for <font style="font-weight:bold"><?php if ($org=="FA"){echo "FACULTY ASSOCIATION";} else{echo"NON-ACADEMIC EMPLOYEE ASSOCIATION";} ?></font> Election <font style="color:#F00"><?php echo $thisyear;?></font></span>
      
                <blockqoute><hr></blockqoute>
                
                <?php
$select = mysql_query("SELECT * FROM tblcandidate WHERE c_organization = '$org' AND candidate_status = '1' AND c_year = '$thisyear'");
$count = (mysql_num_rows($select));
if ($count == 0){
	echo "<div class='form-control' style='height:auto'>
			<span class='text-danger' style='text-align:center'><strong>The election has not yet started!</strong></span>
		</div>";
}
else {
	$select = mysql_query("SELECT * FROM elec_con WHERE year_elec = '$c_year' AND organization = '$org'");
	while ($row=mysql_fetch_array($select)){
		$total_mem = $row['total_mem'];
		$mem_vote = $row['mem_vote'];
		$min = (round(($total_mem/2),0)+1);
	}
		
		if ($mem_vote < $min){
			echo "<div class='form-control' style='height:auto'>
					<span class='text-danger' style='text-align:center'><strong>Low number of participants in ".$c_year." election!</strong></span>
				</div>";
		}
		else{
			echo "<div class='form-control' style='height:auto' align='left'>
					<h2>President</h2>
					<table width='100%'><tr><td>&nbsp;</td></tr></table>";
						
						 if ($president_list == ""){
							 echo "<table id='resultlist'><tr><td class='text-danger'><strong>There is no candidate for President.</strong></td></tr></table>";
						 }
						 else{
							 echo $president_list;
						 }
					 
			echo "<table><tr><td>&nbsp;</td></tr></table>
				</div>";
				
				
				
			echo "<div class='form-control' style='height:auto' align='left'>
					<h2>Vice President</h2>
					<table width='100%'><tr><td>&nbsp;</td></tr></table>";
						
						 if ($vicepresident_list == ""){
							 echo "<table id='resultlist'><tr><td class='text-danger'><strong>There is no candidate for Vice President.</strong></td></tr></table>";
						 }
						 else{
							 echo $vicepresident_list;
						 }
					 
			echo "<table><tr><td>&nbsp;</td></tr></table>
				</div>";
			
			
			echo "<div class='form-control' style='height:auto' align='left'>
					<h2>Treasurer</h2>
					<table width='100%'><tr><td>&nbsp;</td></tr></table>";
						
						 if ($treasurer_list == ""){
							 echo "<table id='resultlist'><tr><td class='text-danger'><strong>There is no candidate for Treasurer.</strong></td></tr></table>";
						 }
						 else{
							 echo $treasurer_list;
						 }
					 
			echo "<table><tr><td>&nbsp;</td></tr></table>
				</div>";
			
			
			echo "<div class='form-control' style='height:auto' align='left'>
					<h2>Secretary</h2>
					<table width='100%'><tr><td>&nbsp;</td></tr></table>";
						
						 if ($secretary_list == ""){
							 echo "<table id='resultlist'><tr><td class='text-danger'><strong>There is no candidate for Secretary.</strong></td></tr></table>";
						 }
						 else{
							 echo $secretary_list;
						 }
					 
			echo "<table><tr><td>&nbsp;</td></tr></table>
				</div>";
			
				
			echo "<div class='form-control' style='height:auto' align='left'>
					<h2>Auditor</h2>
					<table width='100%'><tr><td>&nbsp;</td></tr></table>";
						
						 if ($auditor_list == ""){
							 echo "<table id='resultlist'><tr><td class='text-danger'><strong>There is no candidate for Auditor.</strong></td></tr></table>";
						 }
						 else{
							 echo $auditor_list;
						 }
					 
			echo "<table><tr><td>&nbsp;</td></tr></table>
				</div>";	
			
			echo "<div class='form-control' style='height:auto' align='left'>
					<h2>P.R.O.</h2>
					<table width='100%'><tr><td>&nbsp;</td></tr></table>";
						
						 if ($pro_list == ""){
							 echo "<table id='resultlist'><tr><td class='text-danger'><strong>There is no candidate for P.R.o.</strong></td></tr></table>";
						 }
						 else{
							 echo $pro_list;
						 }
					 
			echo "<table><tr><td>&nbsp;</td></tr></table>
				</div>";
				
		}
}
?>
               
              
            </div>

		</div>
        
	<!------ end of main content tag ----->    	  
    
    </div>
    
    <!------end of main body----->    	
	
    <!------footer----->
    <?php include "footer.php"?>
    <!------end of footer----->    	    	
</div>
</body>
</html>


