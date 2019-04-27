<?php
include "../session_user.php";
?>
<?php
//show the list of member
$start_term = "";
$yearResult = "";
		$select = mysql_query("SELECT * FROM elec_con WHERE organization = '$adminorg' ORDER BY year_elec DESC")or die (mysql_error());
			while ($row=mysql_fetch_array($select)){
				$year_elec = $row['year_elec'];
				$start_term = $row['start_term'];
				$end_term = $row['end_term'];
				$yearResult .= "<option value='".$year_elec."'>".$year_elec."</option>";
			}

$officer_list="";
$select=mysql_query("SELECT * FROM tblofficer WHERE o_organization = '$adminorg' AND o_status = 1 ")or die (mysql_error());
$count = mysql_num_rows($select);
if ($count != 0){
	while ($row = mysql_fetch_array($select)){
		$o_position =$row['o_position'];
		$o_number =$row['o_number'];
		$o_fname =$row['o_fname'];
		$o_lname =$row['o_lname'];
		$o_campus =$row['o_campus'];
		$o_college_branch =$row['o_college_branch'];
		$start_term = $row['start_term'];

		$officer_list .= "<tr>
								<td width='10%'>".$o_position."</td>
								<td width='15%'>".$o_number."</td>
								<td width='20%'>".$o_fname." ".$o_lname."</td>
								<td width='10%'>".$o_campus."</td>
								<td width='10%'>".$o_college_branch."</td>
							</tr>";
	}
}
else{
	$start_term = "N/A";
	$officer_list="<tr>
					<th style='text-align:center' class='text-danger'>There is no officer in the list!</th>
				</tr>";		
}

//delete member
if(isset($_POST['delete_member']) && !empty($_POST['delete_member'])) {
  $delete_member = mysql_real_escape_string($_POST['delete_member']);
  mysql_query("DELETE FROM tblmember WHERE  e_number = '$delete_member'")or die (mysql_error());
  header("Location: memberlist.php");
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
								<li class="active"><a href="officerlist.php" class="text-success" id="menu">Officer</a></li>
								<li><a href="accountlist.php" class="text-success" id="menu">Account List</a></li>
								<li class="text-success" style="text-shadow:1px 1px 2px #999; margin-left:4%"><h4><strong>Election</strong></h4></li>
								<li><a href="candidatelist.php" class="text-success" id="menu">Candidates</a></li>
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
	        <h1>Officer List</h1>
<span style="margin-top:-20px">for <strong><?php if ($adminorg=="FA"){echo "FACULTY ASSOCIATION";} else{echo "NON-ACADEMIC EMPLOYEE ASSOCIATION";} ?></strong> <font class="text-danger"><?php echo $thisyear;?> - N/A</font></span>
			<blockqoute><hr></blockqoute>
                 
            <div class="form-control" style="height:auto">
                       <table class="table" style="width:100%"> 
                        <tr><td>
                        <table id="tablehead">
                            <tr>
                                <th width="10%" >Position</th>
                                <th width="15%" >Employee Number</th>
                                <th width="20%" >Name</th>
                                <th width="10%" >Campus</th>
                                <th width="10%" >College</th>
                               
                            </tr>
                        </table>
                      </td></tr>
                      
                      <tr><td>
                        <table class="table table-striped table-bordered table-responsive table-hover" style="width:100%">
                            
                            <?php echo $officer_list;?>
                            
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
</body>
</html>
