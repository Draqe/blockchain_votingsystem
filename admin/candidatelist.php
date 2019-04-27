<?php
include "../session_user.php";
?>
<?php
//show the list of candidate for president
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
	
$select = mysql_query("SELECT * FROM elec_con WHERE organization = '$adminorg' AND year_elec = '$thisyear' AND start_term = '$thisyear'");
$count = (mysql_num_rows($select));

if ($count != 0){
		$voteButton = "<font class='text-success' id='signal'>Election is finished.</font>";
}
else {
	if ($org_status_election == "0"){
		$select = mysql_query("SELECT * FROM tblcandidate WHERE c_year = '$thisyear' AND candidate_status = 0 AND c_organization = '$adminorg'");
		$count = mysql_num_rows($select);
		if ($count != 0 ){
			$voteButton = "<button class='btn btn-success btn-lg' data-toggle='modal' data-target='#modal-activate'>ACTIVATE ELECTION</button>";
		}
		else{
			$voteButton = "<button class='btn btn-success btn-lg' disabled>ACTIVATE ELECTION</button>";

		}
	}
	else{
		 
			$voteButton = "<button class='btn btn-danger btn-lg' data-toggle='modal' data-target='#modal-deactivate''>DEACTIVATE ELECTION</button>";
		 
	
	}
}

	



$president_list = "";
$vicepresident_list="";
$secretary_list = "";
$treasurer_list = "";
$auditor_list = "";
$pro_list = "";
$select=mysql_query("SELECT * FROM tblcandidate WHERE c_organization = '$adminorg' AND c_year = '$thisyear'")or die (mysql_error());
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
		$candidate_status = $row["candidate_status"];
		
		
		if ($c_image == 'none'){ 
			$c_image = 'noimage'; 
		} 
		else{ 
		 $c_image = $c_image;
		}

		if ($c_position == "President"){
			if ($org_status_election == 0){
				if ($candidate_status != 1){					
					$president_list .= "<tr><td width = '22%'>".$p."<br /><a style='margin-left:5px' href='candidatephoto/".$c_image.".jpg' data-lightbox='".$c_image."'><img src='candidatephoto/".$c_image.".jpg' width='100px' height='100px'></a></td>
							<td width = '28%'>".$c_fname." ".$c_lname."</td>
							<td width = '13%'>".$c_campus."</td>
							<td width = '10'>".$c_college_branch."</td>
							<td width='15%'>
									<form action = 'candidatelist.php' method = 'post'>
									<input type='hidden' name='delete_candidate' value=$c_number>
									<input type='hidden' name='delete_year' value=$c_year>
									<button title='DELETE' class='btn btn-danger' onclick='return confirm(\"Are you sure you want to delete this candidate?\");' type ='submit'><i class='fa fa-trash-o fa-sm'></i></button>
									</form>
							</td></tr>"; 
				}
				else{
					$president_list .= "<tr><td width = '22%'>".$p."<br /><a style='margin-left:5px' href='candidatephoto/".$c_image.".jpg' data-lightbox='".$c_image."'><img src='candidatephoto/".$c_image.".jpg' width='100px' height='100px'></a></td>
							<td width = '38%'>".$c_fname." ".$c_lname."</td>
							<td width = '15%'>".$c_campus."</td>
							<td width = '13'>".$c_college_branch."</td></tr>"; 
				}
			}
			else{
				$president_list .= "<tr><td width = '22%'>".$p."<br /><a style='margin-left:5px' href='candidatephoto/".$c_image.".jpg' data-lightbox='".$c_image."'><img src='candidatephoto/".$c_image.".jpg' width='100px' height='100px'></a></td>
							<td width = '38%'>".$c_fname." ".$c_lname."</td>
							<td width = '15%'>".$c_campus."</td>
							<td width = '13'>".$c_college_branch."</td></tr>"; 
			}
		$p++;
		}
		
		if ($c_position == "Vice President"){
			if ($org_status_election == 0){
				if ($candidate_status != 1){										
					$vicepresident_list .= "<tr><td width = '22%'>".$vp."<br /><a style='margin-left:5px' href='candidatephoto/".$c_image.".jpg' data-lightbox='".$c_image."'><img src='candidatephoto/".$c_image.".jpg' width='100px' height='100px'></a></td>
							<td width = '28%'>".$c_fname." ".$c_lname."</td>
							<td width = '13%'>".$c_campus."</td>
							<td width = '10'>".$c_college_branch."</td>
							<td width='15%'>
									<form action = 'candidatelist.php' method = 'post'>
									<input type='hidden' name='delete_candidate' value=$c_number>
									<input type='hidden' name='delete_year' value=$c_year>
									<button title='DELETE' class='btn btn-danger' onclick='return confirm(\"Are you sure you want to delete this candidate?\");' type ='submit'><i class='fa fa-trash-o fa-sm'></i></button>
									</form>
							</td></tr>"; 
					}
				else{
					$vicepresident_list .= "<tr><td width = '22%'>".$vp."<br /><a style='margin-left:5px' href='candidatephoto/".$c_image.".jpg' data-lightbox='".$c_image."'><img src='candidatephoto/".$c_image.".jpg' width='100px' height='100px'></a></td>
							<td width = '38%'>".$c_fname." ".$c_lname."</td>
							<td width = '15%'>".$c_campus."</td>
							<td width = '13'>".$c_college_branch."</td></tr>"; 
				}
			}
			else{
				$vicepresident_list .= "<tr><td width = '22%'>".$vp."<br /><a style='margin-left:5px' href='candidatephoto/".$c_image.".jpg' data-lightbox='".$c_image."'><img src='candidatephoto/".$c_image.".jpg' width='100px' height='100px'></a></td>
							<td width = '38%'>".$c_fname." ".$c_lname."</td>
							<td width = '15%'>".$c_campus."</td>
							<td width = '13'>".$c_college_branch."</td></tr>"; 
			}
		$vp++;
		}
		
		if ($c_position == "Secretary"){
			if ($org_status_election == 0){	
				if ($candidate_status != 1){						
						$secretary_list .= "<tr><td width = '22%'>".$s."<br /><a style='margin-left:5px' href='candidatephoto/".$c_image.".jpg' data-lightbox='".$c_image."'><img src='candidatephoto/".$c_image.".jpg' width='100px' height='100px'></a></td>
							<td width = '28%'>".$c_fname." ".$c_lname."</td>
							<td width = '13%'>".$c_campus."</td>
							<td width = '10'>".$c_college_branch."</td>
							<td width='15%'>
									<form action = 'candidatelist.php' method = 'post'>
									<input type='hidden' name='delete_candidate' value=$c_number>
									<input type='hidden' name='delete_year' value=$c_year>
									<button title='DELETE' class='btn btn-danger' onclick='return confirm(\"Are you sure you want to delete this candidate?\");' type ='submit'><i class='fa fa-trash-o fa-sm'></i></button>
									</form>
							</td></tr>"; 
				}
				else{
					$secretary_list .= "<tr><td width = '22%'>".$s."<br /><a style='margin-left:5px' href='candidatephoto/".$c_image.".jpg' data-lightbox='".$c_image."'><img src='candidatephoto/".$c_image.".jpg' width='100px' height='100px'></a></td>
							<td width = '38%'>".$c_fname." ".$c_lname."</td>
							<td width = '15%'>".$c_campus."</td>
							<td width = '13'>".$c_college_branch."</td></tr>"; 
				}
			}
			else{
				$secretary_list .= "<tr><td width = '22%'>".$s."<br /><a style='margin-left:5px' href='candidatephoto/".$c_image.".jpg' data-lightbox='".$c_image."'><img src='candidatephoto/".$c_image.".jpg' width='100px' height='100px'></a></td>
							<td width = '38%'>".$c_fname." ".$c_lname."</td>
							<td width = '15%'>".$c_campus."</td>
							<td width = '13'>".$c_college_branch."</td></tr>"; 
			}
		$s++;
		}
		
		if ($c_position == "Treasurer"){	
			if ($org_status_election == 0){					
				if ($candidate_status != 1){
					$treasurer_list .= "<tr><td width = '22%'>".$t."<br /><a style='margin-left:5px' href='candidatephoto/".$c_image.".jpg' data-lightbox='".$c_image."'><img src='candidatephoto/".$c_image.".jpg' width='100px' height='100px'></a></td>
							<td width = '28%'>".$c_fname." ".$c_lname."</td>
							<td width = '13%'>".$c_campus."</td>
							<td width = '10'>".$c_college_branch."</td>
							<td width='15%'>
									<form action = 'candidatelist.php' method = 'post'>
									<input type='hidden' name='delete_candidate' value=$c_number>
									<input type='hidden' name='delete_year' value=$c_year>
									<button title='DELETE' class='btn btn-danger' onclick='return confirm(\"Are you sure you want to delete this candidate?\");' type ='submit'><i class='fa fa-trash-o fa-sm'></i></button>
									</form>
							</td></tr>"; 
				}
				else{
					$treasurer_list .= "<tr><td width = '22%'>".$t."<br /><a style='margin-left:5px' href='candidatephoto/".$c_image.".jpg' data-lightbox='".$c_image."'><img src='candidatephoto/".$c_image.".jpg' width='100px' height='100px'></a></td>
							<td width = '38%'>".$c_fname." ".$c_lname."</td>
							<td width = '15%'>".$c_campus."</td>
							<td width = '13'>".$c_college_branch."</td></tr>"; 
				}
			}
			else{
				$treasurer_list .= "<tr><td width = '22%'>".$t."<br /><a style='margin-left:5px' href='candidatephoto/".$c_image.".jpg' data-lightbox='".$c_image."'><img src='candidatephoto/".$c_image.".jpg' width='100px' height='100px'></a></td>
							<td width = '38%'>".$c_fname." ".$c_lname."</td>
							<td width = '15%'>".$c_campus."</td>
							<td width = '13'>".$c_college_branch."</td></tr>"; 
			}
		$t++;
		}
		
		if ($c_position == "Auditor"){	
			if ($org_status_election == 0){				
				if ($candidate_status != 1){
					$auditor_list .= "<tr><td width = '22%'>".$a."<br /><a style='margin-left:5px' href='candidatephoto/".$c_image.".jpg' data-lightbox='".$c_image."'><img src='candidatephoto/".$c_image.".jpg' width='100px' height='100px'></a></td>
							<td width = '28%'>".$c_fname." ".$c_lname."</td>
							<td width = '13%'>".$c_campus."</td>
							<td width = '10'>".$c_college_branch."</td>
							<td width='15%'>
									<form action = 'candidatelist.php' method = 'post'>
									<input type='hidden' name='delete_candidate' value=$c_number>
									<input type='hidden' name='delete_year' value=$c_year>
									<button title='DELETE' class='btn btn-danger' onclick='return confirm(\"Are you sure you want to delete this candidate?\");' type ='submit'><i class='fa fa-trash-o fa-sm'></i></button>
									</form>
							</td></tr>"; 
				}
				else{
					$auditor_list .= "<tr><td width = '22%'>".$a."<br /><a style='margin-left:5px' href='candidatephoto/".$c_image.".jpg' data-lightbox='".$c_image."'><img src='candidatephoto/".$c_image.".jpg' width='100px' height='100px'></a></td>
							<td width = '38%'>".$c_fname." ".$c_lname."</td>
							<td width = '15%'>".$c_campus."</td>
							<td width = '13'>".$c_college_branch."</td></tr>"; 
				}			
			}
			else{
				$auditor_list .= "<tr><td width = '22%'>".$a."<br /><a style='margin-left:5px' href='candidatephoto/".$c_image.".jpg' data-lightbox='".$c_image."'><img src='candidatephoto/".$c_image.".jpg' width='100px' height='100px'></a></td>
							<td width = '38%'>".$c_fname." ".$c_lname."</td>
							<td width = '15%'>".$c_campus."</td>
							<td width = '13'>".$c_college_branch."</td></tr>"; 
			}
		$a++;
		}
		
		if ($c_position == "PRO"){	
			if ($org_status_election == 0){					
				if ($candidate_status != 1){
					$pro_list .= "<tr><td width = '22%'>".$pr."<br /><a style='margin-left:5px' href='candidatephoto/".$c_image.".jpg' data-lightbox='".$c_image."'><img src='candidatephoto/".$c_image.".jpg' width='100px' height='100px'></a></td>
							<td width = '28%'>".$c_fname." ".$c_lname."</td>
							<td width = '13%'>".$c_campus."</td>
							<td width = '10'>".$c_college_branch."</td>
							<td width='15%'>
									<form action = 'candidatelist.php' method = 'post'>
									<input type='hidden' name='delete_candidate' value=$c_number>
									<input type='hidden' name='delete_year' value=$c_year>
									<button title='DELETE' class='btn btn-danger' onclick='return confirm(\"Are you sure you want to delete this candidate?\");' type ='submit'><i class='fa fa-trash-o fa-sm'></i></button>
									</form>
							</td></tr>"; 
				}
				else{
					$pro_list .= "<tr><td width = '22%'>".$pr."<br /><a style='margin-left:5px' href='candidatephoto/".$c_image.".jpg' data-lightbox='".$c_image."'><img src='candidatephoto/".$c_image.".jpg' width='100px' height='100px'></a></td>
							<td width = '38%'>".$c_fname." ".$c_lname."</td>
							<td width = '15%'>".$c_campus."</td>
							<td width = '13'>".$c_college_branch."</td></tr>"; 
				}
			}
			else{
				$pro_list .= "<tr><td width = '22%'>".$pr."<br /><a style='margin-left:5px' href='candidatephoto/".$c_image.".jpg' data-lightbox='".$c_image."'><img src='candidatephoto/".$c_image.".jpg' width='100px' height='100px'></a></td>
							<td width = '38%'>".$c_fname." ".$c_lname."</td>
							<td width = '15%'>".$c_campus."</td>
							<td width = '13'>".$c_college_branch."</td></tr>"; 
			}
		$pr++;
		}
		
	}
}


?>

<?php
//delete member
if(isset($_POST['delete_candidate']) && !empty($_POST['delete_candidate'])) {
  $delete_candidate = mysql_real_escape_string($_POST['delete_candidate']);
  $delete_year = mysql_real_escape_string($_POST['delete_year']);
  mysql_query("DELETE FROM tblcandidate WHERE  c_number= '$delete_candidate' AND candidate_status = 0")or die (mysql_error());
  if (file_exists($delete_candidate.$delete_year)){
	  unlink($delete_candidate.$delete_year);
  }
  header("Location:candidatelist.php");
}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<link rel="stylesheet" href="../css/bootstrap.css" tyep="text/css" media="screen"/>
<link rel="stylesheet" href="../css/style.css" tyep="text/css" media="screen"/>
<link href="../lightbox/css/lightbox.css" rel="stylesheet" />
<script src="../js/jquery-2.0.0.min.js" type="application/javascript"></script>
<script src="../js/bootstrap.js" type="application/javascript"></script>
<script src="../lightbox/js/jquery-1.10.2.min.js"></script>
<script src="../lightbox/js/lightbox-2.6.min.js"></script>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">
<link rel="icon" href="../favicon.ico" type="image/x-icon">
<title>CvSU-OVS-Faculty Association</title>

</head>
<!-- BLOCKCHAIN -->
<script type="application/javascript" src="election.js"></script>

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
								<li class="active"><a href="candidatelist.php" class="text-success" id="menu">Candidates</a></li>
								<li><a href="report.php" class="text-success" id="menu">Report</a></li>
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
	                <table width="100%"><tr>
						<td><h1>Candidate List</h1>
<span style="margin-top:-20px">for <strong><?php if ($adminorg=="FA"){echo "FACULTY ASSOCIATION";} else{echo "NON-ACADEMIC EMPLOYEE ASSOCIATION";} ?></strong> <font class="text-danger"><?php echo $thisyear;?></font> Election</span></td>
						
                        <td align="right">
                        	<table><tr>
                            	<td>
									<?php 
                                        echo $voteButton;
                                    ?>
                            	</td>
                                </tr>
                                
                                <tr><td>&nbsp;</td></tr>
                                
                                <tr>
                                <td align="right">
                            		<button <?php 	if ($org_status_election == 1){ 
														echo "disabled";
													} 
													else{ 
														$select =mysql_query("SELECT * FROM elec_con WHERE start_term = '$thisyear'");
														$count=mysql_num_rows($select);
														if ($count == 1){
															echo "disabled";
														}
														else{
														}
													} ?> data-toggle="modal" title="ADD CANDIDATE" data-target="#modal-addcan" class="btn btn-success"><i class="fa fa-plus fa-lg"></i>&nbsp;<i class="fa fa-user fa-lg"></i>&nbsp;Add Candidate</button>
                            	</td>
							</tr></table>
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
										 if ($org_status_election == 0){
											 if ($candidate_status == 0){
												 echo "<th width='15%'>#</th>
                                                <th width='20%'>Name</th>
                                                <th width='9%'>Campus</th>
                                                <th width='10%'>College/Branch</th>
												<th width='10%'>Action</th>";
											 }
											 else{
												  echo "<th width='15%'>#</th>
                                                <th width='20%'>Name</th>
                                                <th width='9%'>Campus</th>
                                                <th width='10%'>College/Branch</th>";
											 }	
										 }
                                         else{
											 echo "<th width='15%'>#</th>
                                                <th width='20%'>Name</th>
                                                <th width='9%'>Campus</th>
                                                <th width='10%'>College/Branch</th>";
										 }
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
                                         if ($org_status_election == 0){
											 if ($candidate_status == 0){
												 echo "<th width='15%'>#</th>
                                                <th width='20%'>Name</th>
                                                <th width='9%'>Campus</th>
                                                <th width='10%'>College/Branch</th>
												<th width='10%'>Action</th>";
											 }
											 else{
												  echo "<th width='15%'>#</th>
                                                <th width='20%'>Name</th>
                                                <th width='9%'>Campus</th>
                                                <th width='10%'>College/Branch</th>";
											 }	
										 }
                                         else{
											 echo "<th width='15%'>#</th>
                                                <th width='20%'>Name</th>
                                                <th width='9%'>Campus</th>
                                                <th width='10%'>College/Branch</th>";
										 }
                                                
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
                                         if ($org_status_election == 0){
											 if ($candidate_status == 0){
												 echo "<th width='15%'>#</th>
                                                <th width='20%'>Name</th>
                                                <th width='9%'>Campus</th>
                                                <th width='10%'>College/Branch</th>
												<th width='10%'>Action</th>";
											 }
											 else{
												  echo "<th width='15%'>#</th>
                                                <th width='20%'>Name</th>
                                                <th width='9%'>Campus</th>
                                                <th width='10%'>College/Branch</th>";
											 }	
										 }
                                         else{
											 echo "<th width='15%'>#</th>
                                                <th width='20%'>Name</th>
                                                <th width='9%'>Campus</th>
                                                <th width='10%'>College/Branch</th>";
										 }
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
                                         if ($org_status_election == 0){
											 if ($candidate_status == 0){
												 echo "<th width='15%'>#</th>
                                                <th width='20%'>Name</th>
                                                <th width='9%'>Campus</th>
                                                <th width='10%'>College/Branch</th>
												<th width='10%'>Action</th>";
											 }
											 else{
												  echo "<th width='15%'>#</th>
                                                <th width='20%'>Name</th>
                                                <th width='9%'>Campus</th>
                                                <th width='10%'>College/Branch</th>";
											 }	
										 }
                                         else{
											 echo "<th width='15%'>#</th>
                                                <th width='20%'>Name</th>
                                                <th width='9%'>Campus</th>
                                                <th width='10%'>College/Branch</th>";
										 }
                                                
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
                                         if ($org_status_election == 0){
											 if ($candidate_status == 0){
												 echo "<th width='15%'>#</th>
                                                <th width='20%'>Name</th>
                                                <th width='9%'>Campus</th>
                                                <th width='10%'>College/Branch</th>
												<th width='10%'>Action</th>";
											 }
											 else{
												  echo "<th width='15%'>#</th>
                                                <th width='20%'>Name</th>
                                                <th width='9%'>Campus</th>
                                                <th width='10%'>College/Branch</th>";
											 }	
										 }
                                         else{
											 echo "<th width='15%'>#</th>
                                                <th width='20%'>Name</th>
                                                <th width='9%'>Campus</th>
                                                <th width='10%'>College/Branch</th>";
										 }
                                                
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
                                         if ($org_status_election == 0){
											 if ($candidate_status == 0){
												 echo "<th width='15%'>#</th>
                                                <th width='20%'>Name</th>
                                                <th width='9%'>Campus</th>
                                                <th width='10%'>College/Branch</th>
												<th width='10%'>Action</th>";
											 }
											 else{
												  echo "<th width='15%'>#</th>
                                                <th width='20%'>Name</th>
                                                <th width='9%'>Campus</th>
                                                <th width='10%'>College/Branch</th>";
											 }	
										 }
                                         else{
											 echo "<th width='15%'>#</th>
                                                <th width='20%'>Name</th>
                                                <th width='9%'>Campus</th>
                                                <th width='10%'>College/Branch</th>";
										 }
                                                
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
    <?php include "../footer.php"?>
    <!------end of footer----->    	    	
</div>

<!----- MODAL Activate election ------>

<div class="modal fade" id="modal-activate" style="margin-top:5%">
  <div class="modal-dialog">
    <div class="modal-content" style="margin:10% auto; width:60%;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3 class="modal-title text-success" id="myModalLabel">Activate Election</h3>
      </div>
      <div class="modal-body" style="text-align:left">
      		
            <span style="width:60%; font-weight:bold; text-align:center" id = "activate-notice"></span>
            
      		<form id = "frm-activate" class = "activate" action = "asdasd.php" method = "POST">

                <label>Username:</label>
				<div class="form-group">
                <input name="username" class="form-control" type="text" id="e_number" placeholder="Employee Number" onKeyUp="alphanumeric('e_number')" onKeyDown="alphanumeric('e_number')" required/>
                </div>
                
                
                <label>Password:</label>
                <input name="password" class="form-control" type="password" id="pass" placeholder="Password" onKeyUp="alphanumeric('pass')" onKeyDown="alphanumeric('pass')" required/>
                
                
      </div>
      <div class="modal-footer" >
        <button type="submit" class="btn btn-success" type="submit" name="submit">Activate</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </form>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!----------modal function-------->


<!----- MODAL Deactivate election ------>

<div class="modal fade" id="modal-deactivate" style="margin-top:5%">
  <div class="modal-dialog">
    <div class="modal-content" style="margin:10% auto; width:60%;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3 class="modal-title text-success" id="myModalLabel">Deactivate Election</h3>
      </div>
      <div class="modal-body" style="text-align:left">
      		
            <span style="width:60%; font-weight:bold; text-align:center" id = "deactivate-notice"></span>
            
      		<form id = "frm-deactivate" class = "deactivate" action = "asdasd.php" method = "POST">
            
                <label>Username:</label>
				<div class="form-group">
                <input name="username" class="form-control" type="text" id="de_e_number" placeholder="Employee Number" onKeyUp="alphanumeric('de_e_number')" onKeyDown="alphanumeric('de_e_number')" required/>
                </div>
                
                
                <label>Password:</label>
                <input name="password" class="form-control" type="password" id="de_pass" placeholder="Password" onKeyUp="alphanumeric('de_pass')" onKeyDown="alphanumeric('de_pass')" required/>
                
                
      </div>
      <div class="modal-footer" >
        <button type="submit" class="btn btn-success" type="submit" name="submit">Deactivate</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </form>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!---------------------end of modal deactivate election ----------------->


<!----- MODAL REGISTER ------>
<div class="modal fade" id="modal-addcan" style="margin-top:2%">
  <div class="modal-dialog">
    <div class="modal-content" style="margin:10% auto; width:65%">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3 class="modal-title text-success" id="myModalLabel"><strong>Add Candidate</strong></h3>
        <font>for <?php if ($adminorg == "FA"){ echo "Faculty Association"; } else{ echo "Non-Academic Employee Association"; }?> <font class="text-danger"><?php echo $thisyear ?></font> Election</font>
      </div>
      <div class="modal-body">
      		
            <span style=" font-weight:bold; text-align:center" id = "addcan-notice">&nbsp;</span>
            
      		<form id = "frm-addcan" class = "addcan" action = "asdasd.php" method = "POST">
              
                <label>Employee Number:</label>
				<div class="form-group">
                <input style="width:70%" name="employee_number" class="form-control" type="text" id="enum" placeholder="Employee Number" onKeyUp="numeric('enum')" onKeyDown="numeric('enum')" required/>
                <button style="margin-top:-10%; margin-left:75%" type="submit" class="btn btn-success" type="submit" name="submit">Generate</button>
                </div>
	        </form>
			<form id = "frm-can" class = "can" action = "asdasd.php" method = "POST">	
			<span id="canOut">
            
            </span>
      </div>
      <div class="modal-footer" >
        <button type="submit" class="btn btn-success" type="submit" name="submit">Submit</button>
       	<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button
		></form>
        </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->



</body>
</html>
