<?php
include "session_user.php";
?>
<?php
//show the list of candidate for president

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

$select = mysql_query("SELECT * FROM elec_con WHERE organization = '$org' AND year_elec = '$thisyear' AND start_term = '$thisyear'");
$count = (mysql_num_rows($select));

if ($count != 0){
		$voteButton = "<font class='text-success' id='signal'>Election is finished.</font>";
}
else {
	if ($org_status == "0"){
			$voteButton = "<button class='btn btn-success btn-lg' disabled>VOTE NOW</button>";
	}
	else{		
		if ($logaccount_status == "0"){
			$voteButton = "<button class='btn btn-success btn-lg' data-toggle='modal' data-target='#modal-validate'>VOTE NOW</button>";
		}
		else {
			if ($logmember_status == "0"){
				$voteButton = "<font class='text-success' id='signal' >Voted already!</font>";
			}
			else{
				$voteButton = "<a href='votingpage.php'><button class='btn btn-success btn-lg'>VOTE NOW</button></a>";
			}
		}
	}
}


$president_list = "";
$vicepresident_list="";
$secretary_list = "";
$treasurer_list = "";
$auditor_list = "";
$pro_list = "";
$select=mysql_query("SELECT * FROM tblcandidate WHERE c_organization = '$org' AND c_year = '$thisyear'");
$count = mysql_num_rows($select);
$p=1;
$vp=1;
$s=1;
$t=1;
$a=1;
$pr=1;

if ($count > 0){
	while ($row = mysql_fetch_array($select)){
		$c_number = $row["c_number"];
		$c_fname = $row["c_fname"];
		$c_lname = $row["c_lname"];
		$c_position = $row["c_position"];
		$c_campus = $row["c_campus"];
		$c_college_branch = $row["c_college_branch"];
		$c_year = $row["c_year"];
		$c_image = $row["c_image"];
		
		if ($c_image == 'none'){ 
			$c_image = 'noimage'; 
		} 
		else{ 
		 $c_image = $c_image;
		}

		if ($c_position == "President"){					
		$president_list .= "<tr><td width = '22%'>".$p."<br /><a style='margin-left:5px' href='admin/candidatephoto/".$c_image.".jpg' data-lightbox='".$c_image."'><img src='admin/candidatephoto/".$c_image.".jpg' width='100px' height='100px'></a></td>
							<td width = '38%'>".$c_fname." ".$c_lname."</td>
							<td width = '15%'>".$c_campus."</td>
							<td width = '13'>".$c_college_branch."</td></tr>"; 
		$p++;
		}
		
		if ($c_position == "Vice President"){					
		$vicepresident_list .="<tr><td width = '22%'>".$vp."<br /><a style='margin-left:5px' href='admin/candidatephoto/".$c_image.".jpg' data-lightbox='".$c_image."'><img src='admin/candidatephoto/".$c_image.".jpg' width='100px' height='100px'></a></td>
							<td width = '38%'>".$c_fname." ".$c_lname."</td>
							<td width = '15%'>".$c_campus."</td>
							<td width = '13'>".$c_college_branch."</td></tr>";
		$vp++;
		}
		
		if ($c_position == "Secretary"){					
		$secretary_list .= "<tr><td width = '22%'>".$s."<br /><a style='margin-left:5px' href='admin/candidatephoto/".$c_image.".jpg' data-lightbox='".$c_image."'><img src='admin/candidatephoto/".$c_image.".jpg' width='100px' height='100px'></a></td>
							<td width = '38%'>".$c_fname." ".$c_lname."</td>
							<td width = '15%'>".$c_campus."</td>
							<td width = '13'>".$c_college_branch."</td></tr>";
		$s++;
		}
		
		if ($c_position == "Treasurer"){					
		$treasurer_list .= "<tr><td width = '22%'>".$t."<br /><a style='margin-left:5px' href='admin/candidatephoto/".$c_image.".jpg' data-lightbox='".$c_image."'><img src='admin/candidatephoto/".$c_image.".jpg' width='100px' height='100px'></a></td>
							<td width = '38%'>".$c_fname." ".$c_lname."</td>
							<td width = '15%'>".$c_campus."</td>
							<td width = '13'>".$c_college_branch."</td></tr>";
		$t++;
		}
		
		if ($c_position == "Auditor"){					
		$auditor_list .= "<tr><td width = '22%'>".$a."<br /><a style='margin-left:5px' href='admin/candidatephoto/".$c_image.".jpg' data-lightbox='".$c_image."'><img src='admin/candidatephoto/".$c_image.".jpg' width='100px' height='100px'></a></td>
							<td width = '38%'>".$c_fname." ".$c_lname."</td>
							<td width = '15%'>".$c_campus."</td>
							<td width = '13'>".$c_college_branch."</td></tr>";
		$a++;
		}
		
		if ($c_position == "PRO"){					
		$pro_list .= "<tr><td width = '22%'>".$pr."<br /><a style='margin-left:5px' href='admin/candidatephoto/".$c_image.".jpg' data-lightbox='".$c_image."'><img src='admin/candidatephoto/".$c_image.".jpg' width='100px' height='100px'></a></td>
							<td width = '38%'>".$c_fname." ".$c_lname."</td>
							<td width = '15%'>".$c_campus."</td>
							<td width = '13'>".$c_college_branch."</td></tr>";
		$pr++;
		}
		
	}
}


?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<link rel="stylesheet" href="css/bootstrap.css" tyep="text/css" media="screen"/>
<link rel="stylesheet" href="css/style.css" tyep="text/css" media="screen"/>
<link href="lightbox/css/lightbox.css" rel="stylesheet" />
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
<link rel="icon" href="favicon.ico" type="image/x-icon">
<title>CvSU-OVS-Faculty Association</title>

</head>
<script src="js/jquery-2.0.0.min.js" type="application/javascript"></script>
<script src="js/bootstrap.js" type="application/javascript"></script>
<script src="lightbox/js/jquery-1.10.2.min.js"></script>
<script src="lightbox/js/lightbox-2.6.min.js"></script>

<body background="texture.png">

<div id="mainWrapper" align="center">
	 <?php
		include "headerlog.php";
		include "headermenu.php";
		

		$officerpage = "faofficerlist.php";
		
	?>
<!-------main body ------>    
    <div id="mainbody" class="form-control">
	<!------ menu tag ----->    	
        <div id="menutag" class="container">
           <h3 class="text-success"><strong><?php if ($org == "FA"){echo "Faculty Assoc.";} else{ echo "N. A. E. A"; } ?></strong></h3>
			<ul class="nav nav-pills nav-stacked col-sm-15" style="text-align:left; margin-right:-5%; margin-left:10%">
            	<li><a class="text-success" href="FA.php" id="menu">Home</a></li>
				<li><a href="<?php echo $officerpage;?>" class="text-success" id="menu">Officer</a></li>
                <li class="text-success" style="text-shadow:1px 1px 2px #999; margin-left:4%"><h4><strong>Election</strong></h4></li>
				<li class="active"><a href="candidatelist.php" class="text-success" id="menu">Candidates</a></li>
            	 <?php 
					if ($org_status == 0){
						echo '<li class="text-success" id="disableLink" id="menu">Report</li>
							<li><a href="result.php" class="text-success" id="menu">Result</a></li>';
					}
					else{
						echo '<li><a href="report.php" class="text-success" id="menu">Report</a></li>
							<li class="text-success" id="disableLink">Result</li>';
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
						<td><h1>Candidate List</h1>
<span style="margin-top:-20px">for <strong><?php if ($org=="FA"){echo "FACULTY ASSOCIATION";} ?></strong> Election <font class="text-danger"><?php echo $thisyear;?></font></span></td>
						
                        <td align="right">
							<?php 
								echo $voteButton;
							?>
						</td>
					</tr></table>

			<blockqoute><hr></blockqoute>
            
            <div class="form-control" style="height:auto">
				<h2 style="text-align:left">President</h2>
                
                 <table class="table" style="width:100%"> 
					<tr><td>
                        <table id="tablehead">
                          <tr> 
                                <?php 
                                     if ($president_list != ""){
                                         echo "<th width='15%'>#</th>
                                                <th width='25%'>Name</th>
                                                <th width='12%'>Campus</th>
                                                <th width='13%'>College/Branch</th>";
                                                
                                     }
                                     else{
                                     }
                                ?>
                          </tr>
                  		</table>
					</td></tr>
                    
                    <tr><td>
                          <table class="table table-striped table-hover" id="tablecontent">
                                <?php
                                     
                                     if ($president_list == ""){
                                         echo "<tr><th style='text-align:center' class='text-danger'>There is no candidate for President!</th></tr>";
                                     }
                                     else{
                                         echo $president_list;
                                     }
                                ?>
                        </table>
					</td></tr>
				</table>
            </div>
            
            <blockqoute><hr></blockqoute>
            
            <div class="form-control" style="height:auto">
				<h2 style="text-align:left">Vice President</h2>
                
                 <table class="table" style="width:100%"> 
					<tr><td>
                        <table id="tablehead">
                          <tr> 
                                <?php 
                                     if ($vicepresident_list != ""){
                                         echo "<th width='15%'>#</th>
                                                <th width='25%'>Name</th>
                                                <th width='12%'>Campus</th>
                                                <th width='13%'>College/Branch</th>";
                                                
                                     }
                                     else{
                                     }
                                ?>
                          </tr>
                  		</table>
					</td></tr>
                    
                    <tr><td>
                          <table class="table table-striped table-hover" id="tablecontent">
                                <?php
                                     
                                     if ($vicepresident_list == ""){
                                         echo "<tr><th style='text-align:center' class='text-danger'>There is no candidate for Vice President!</th></tr>";
                                     }
                                     else{
                                         echo $vicepresident_list;
                                     }
                                ?>
                        </table>
					</td></tr>
				</table>
            </div>
            
            <blockqoute><hr></blockqoute>
            
            <div class="form-control" style="height:auto">
				<h2 style="text-align:left">Secretary</h2>
                
                 <table class="table" style="width:100%"> 
					<tr><td>
                        <table id="tablehead">
                          <tr> 
                                <?php 
                                     if ($secretary_list != ""){
                                         echo "<th width='15%'>#</th>
                                                <th width='25%'>Name</th>
                                                <th width='12%'>Campus</th>
                                                <th width='13%'>College/Branch</th>";
                                                
                                     }
                                     else{
                                     }
                                ?>
                          </tr>
                  		</table>
					</td></tr>
                    
                    <tr><td>
                          <table class="table table-striped table-hover" id="tablecontent">
                                <?php
                                     
                                     if ($secretary_list == ""){
                                         echo "<tr><th style='text-align:center' class='text-danger'>There is no candidate for Secretary!</th></tr>";
                                     }
                                     else{
                                         echo $secretary_list;
                                     }
                                ?>
                        </table>
					</td></tr>
				</table>
            </div>
            
            <blockqoute><hr></blockqoute>
            
            <div class="form-control" style="height:auto">
				<h2 style="text-align:left">Treasurer</h2>
                
                 <table class="table" style="width:100%"> 
					<tr><td>
                        <table id="tablehead">
                          <tr> 
                                <?php 
                                     if ($treasurer_list != ""){
                                         echo "<th width='15%'>#</th>
                                                <th width='25%'>Name</th>
                                                <th width='12%'>Campus</th>
                                                <th width='13%'>College/Branch</th>";
                                                
                                     }
                                     else{
                                     }
                                ?>
                          </tr>
                  		</table>
					</td></tr>
                    
                    <tr><td>
                          <table class="table table-striped table-hover" id="tablecontent">
                                <?php
                                     
                                     if ($treasurer_list == ""){
                                         echo "<tr><th style='text-align:center' class='text-danger'>There is no candidate for Treasurer!</th></tr>";
                                     }
                                     else{
                                         echo $treasurer_list;
                                     }
                                ?>
                        </table>
					</td></tr>
				</table>
            </div>
            
            <blockqoute><hr></blockqoute>
            
            <div class="form-control" style="height:auto">
				<h2 style="text-align:left">Auditor</h2>
                
                 <table class="table" style="width:100%"> 
					<tr><td>
                        <table id="tablehead">
                          <tr> 
                                <?php 
                                     if ($auditor_list != ""){
                                         echo "<th width='15%'>#</th>
                                                <th width='25%'>Name</th>
                                                <th width='12%'>Campus</th>
                                                <th width='13%'>College/Branch</th>";
                                                
                                     }
                                     else{
                                     }
                                ?>
                          </tr>
                  		</table>
					</td></tr>
                    
                    <tr><td>
                          <table class="table table-striped table-hover" id="tablecontent">
                                <?php
                                     
                                     if ($auditor_list == ""){
                                         echo "<tr><th style='text-align:center' class='text-danger'>There is no candidate for Auditor!</th></tr>";
                                     }
                                     else{
                                         echo $auditor_list;
                                     }
                                ?>
                        </table>
					</td></tr>
				</table>
            </div>
            
            <blockqoute><hr></blockqoute>
            
            <div class="form-control" style="height:auto">
				<h2 style="text-align:left">P.R.O.</h2>
                
                 <table class="table" style="width:100%"> 
					<tr><td>
                        <table id="tablehead">
                          <tr> 
                                <?php 
                                     if ($pro_list != ""){
                                         echo "<th width='15%'>#</th>
                                                <th width='25%'>Name</th>
                                                <th width='12%'>Campus</th>
                                                <th width='13%'>College/Branch</th>";
                                                
                                     }
                                     else{
                                     }
                                ?>
                          </tr>
                  		</table>
					</td></tr>
                    
                    <tr><td>
                          <table class="table table-striped table-hover" id="tablecontent">
                                <?php
                                     
                                     if ($pro_list == ""){
                                         echo "<tr><th style='text-align:center' class='text-danger'>There is no candidate for P.R.O!</th></tr>";
                                     }
                                     else{
                                         echo $pro_list;
                                     }
                                ?>
                        </table>
					</td></tr>
				</table>
            </div>            
                            	
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
