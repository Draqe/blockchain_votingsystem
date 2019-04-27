<?php

session_start();
if (!isset($_SESSION["username"])){
	header ("location:index.php");
	exit();
}
$managerID = $_SESSION["id"];
$username = $_SESSION["username"];
$password = $_SESSION["password"];

	$sign = substr($username,0,5);
	
	$posofslash = strrpos($_SERVER['PHP_SELF'],'/');
			$currentpage = substr ($_SERVER['PHP_SELF'], $posofslash);


include "mysqlconnect.php";

$FA = "FA";

//$thisyear = 2018;
$thisyear = date("Y", strtotime('-9hours'));


				
			
$candt=mysql_query("SELECT * FROM tblcandidate WHERE c_year = '$thisyear' AND candidate_status = 0");
$countcandt = (mysql_num_rows($candt));

if($sign == "admin"){
	
	$sql=mysql_query("SELECT * FROM tbladmin WHERE username ='$username' AND password ='$password' LIMIT 1");
	$existCount=mysql_num_rows($sql);
	
	if($existCount==1){
		while($row=mysql_fetch_array($sql)){
			$logfname=strtoupper(substr($username,5,100));
			$loglname=strtoupper(substr($username,0,1)).substr($username,1,4);
			$adminorg = $row['organization'];
			
			$select = mysql_query ("SELECT * FROM election WHERE organization = '$adminorg'");
				while ($row=mysql_fetch_array($select)){
					$e_organization = $row['organization'];
					$org_status_election = $row['org_status'];
					// $settime = $row['setTime'];
					
				}
				
			if ($adminorg == "FA"){
				if (strtolower($currentpage) == strtolower("/FA.php")){
					$menu = '<h3 class="text-success"><strong>Faculty Assoc.</strong></h3>
				        	<ul class="nav nav-pills nav-stacked col-sm-15" style="text-align:left; margin-right:-5%; margin-left:10%">
								<li class="active"><a href="FA.php" id="menu">Home</a></li>
								<li><a href="admin/member.php" class="text-success" id="menu">Member</a></li>
								<li><a href="admin/officerlist.php" class="text-success" id="menu">Officer</a></li>
								<li><a href="admin/accountlist.php" class="text-success" id="menu">Account List</a></li>
								<li class="text-success" style="text-shadow:1px 1px 2px #999; margin-left:4%"><h4><strong>Election</strong></h4></li>
								<li><a href="admin/candidatelist.php" class="text-success" id="menu">Candidates</a></li>
								<li><a href="admin/report.php" class="text-success" id="menu">Report</a></li>';
								if ($org_status_election == 0){
									$menu .= '<li><a href="admin/result.php" class="text-success" id="menu">Result</a></li>';
								}
								else{
									$menu .='
											<li class="text-success" id="disableLink">Result</li>';
								}   
						$menu .='<li>&nbsp;</li>
								<li>&nbsp;</li>
							 </ul>';
			
				}

			}
			
		
		
		}
	}
	else{
		echo "<script>
				alert('You are not login. Please use your account.');
				window.close();
				window.location:('logout.php');
				</script>
				";
	}
}

else{
	
	
	$sql=mysql_query("SELECT * FROM tblmember WHERE e_number ='$username' AND password ='$password' LIMIT 1");
	$existCount=mysql_num_rows($sql);

	if($existCount==1){
		while($row=mysql_fetch_array($sql)){
			$loge_number=$row["e_number"];
			$logfname=$row["fname"];
			$loglname=$row["lname"];
			$org = $row["organization"];
			$logmember_status = $row["member_status"];
			$logaccount_status = $row["account_status"];
			$user_election = mysql_query ("SELECT * FROM election WHERE organization = '$org'");
			while ($row=mysql_fetch_array($user_election)){
				$e_organization = $row['organization'];
				$org_status = $row['org_status'];
				// $settime = $row['setTime'];
				
			}
			if ($currentpage == "/FA.php" || $currentpage == "/fa.php"){
				if ($org != "FA"){
				$menu = '<h3 class="text-success"><strong>Faculty Assoc.</strong></h3>
				        	<ul class="nav nav-pills nav-stacked col-sm-15" style="text-align:left; margin-right:-5%; margin-left:10%">
								<li class="active"><a href="FA.php" id="menu">Home</a></li>
								<li><a href="faofficerlist.php" class="text-success" id="menu">Officer</a></li>
								<li>&nbsp;</li>
								<li>&nbsp;</li>
							 </ul>';	
				}
				else{
					$menu = '<h3 class="text-success"><strong>Faculty Assoc.</strong></h3>
				        	<ul class="nav nav-pills nav-stacked col-sm-15" style="text-align:left; margin-right:-5%; margin-left:10%">
								<li class="active"><a href="FA.php" id="menu">Home</a></li>
								<li><a href="faofficerlist.php" class="text-success" id="menu">Officer</a></li>
								<li class="text-success" style="text-shadow:1px 1px 2px #999; margin-left:4%"><h4><strong>Election</strong></h4></li>
								<li><a href="candidatelist.php" class="text-success" id="menu">Candidates</a></li>';
								if ($org_status == 0){
									$menu .= '<li class="text-success" id="disableLink" id="menu">Report</li>
											<li><a href="result.php" class="text-success" id="menu">Result</a></li>';
								}
								else{
									$menu .='<li><a href="report.php" class="text-success" id="menu">Report</a></li>
											<li class="text-success" id="disableLink">Result</li>';
								}   
						$menu .='<li>&nbsp;</li>
								<li>&nbsp;</li>
							 </ul>';
				}
			}
		}
	}
	else{
	echo "<script>
				alert('You are not login. Please use your account.');
				window.close();
				window.location.assign('logout.php');
				</script>
				";

	}
}
?>
