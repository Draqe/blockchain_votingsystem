<?php
include "../session_user.php";
?>
<?php
//show the list of member


$member_list="";
$select=mysql_query("SELECT * FROM tblmember WHERE organization = '$adminorg'") or die (mysql_error());
$memberCount = mysql_num_rows($select);
$i=1;
if ($memberCount > 0){
	while ($row = mysql_fetch_array($select)){
		$e_number = $row["e_number"];
		$fname = $row["fname"];
		$lname = $row["lname"];
		$password = $row["password"];
		$organization =$row["organization"];
		$status = $row["account_status"];
		$address = $row["address"];
		$private_key = $row["private_key"];
		$public_key = $row["public_key"];
		// $address = $row["address"];

		if ($password == $e_number){
			$coutpassword = md5($row['password']);
			$reset = "<td  style='border-right:none; border-left:none; border-top:none' width='100px' align='center' valign='middle'>
						<input type ='submit' disabled='disabled' class='btn btn-danger' value = 'Reset'>
						</form></td>";

		}
		else{
			$coutpassword = md5($row['password']);
			$reset = "<td  style='border-right:none; border-left:none; border-top:none;' width='100px' align='center' valign='middle'>
						<form action = 'accountlist.php' method = 'post'>
						<input type='hidden' name='reset_account' value= $e_number>
						<input type ='submit' class='btn btn-success' value = 'Reset'>
						</form></td>";
		}

		if ($status==0){
			$activate = "<td  style='border-right:none; border-left:none; border-top:none;' width='100px' align='center' valign='middle'>
					<form action = 'accountlist.php' method = 'post'>
					<input type='hidden' name='activate_account' value= $e_number>
					<input type='hidden' name='address' value= $address>
					<input type='hidden' name='private_key' value= $private_key>
					<input type='hidden' name='public_key' value= $public_key>

					<input type ='submit' class='btn btn-success' value = 'Activate'>
					</form></td>";
		}
		else{
			$activate = "<td  style='border-right:none; border-left:none; border-top:none;' width='100px' align='center' valign='middle'>
					<form action = 'accountlist.php' method = 'post'>
					<input type='hidden' name='deactivate_account' value= $e_number>
					<input type='hidden' name='address' value= $address>
					<input type='hidden' name='private_key' value= $private_key>
					<input type='hidden' name='public_key' value= $public_key>

					<input type ='submit' class='btn btn-danger' value = 'Deactivate'>
					</form></td>";
		}	
		
		if ($password=="NONE"){
			$cont = "";
		}
		else{
			$cont = "...";
		}
		
		$member_list .= "<tr>";
		$member_list .= "<td width='22%'>".$e_number."</td>";
		$member_list .= "<td width='21.5%'>".$fname."</td>";
		$member_list .= "<td width='20%'>".$lname."</td>";
		$member_list .= "<td>".substr($coutpassword,0,10).$cont."</td>";
		
		$member_list .= $reset;
		$member_list .= $activate;

		$member_list .= "</tr>";
	}
}
else{
	$member_list="<td class='text-danger'><strong>No record of members.</strong></td>";	
}


?>

<script type="application/javascript" src="transfer.js"></script>
<script type="application/javascript" src="../js/inputtype.js"></script>
<script type="application/javascript" src="../dist/nem-sdk.js"></script>

<?php

if(isset($_POST['reset_account']) && !empty($_POST['reset_account'])) {
  $reset_account = mysql_real_escape_string($_POST['reset_account']);
  mysql_query("UPDATE tblmember SET password = '$reset_account' WHERE e_number = '$reset_account'")or die (mysql_error());
  header("Location: accountlist.php");
}

if(isset($_POST['activate_account']) && !empty($_POST['activate_account'])) {
  $activate_account = mysql_real_escape_string($_POST['activate_account']);
  $address = mysql_real_escape_string($_POST['address']);
  $private_key = mysql_real_escape_string($_POST['private_key']);
  $public_key = mysql_real_escape_string($_POST['public_key']);

  mysql_query("UPDATE tblmember SET account_status = 1 WHERE e_number = '$activate_account'")or die (mysql_error());
?>

<?php
  //BLOCKCHAIN
  echo "<script type='text/javascript'>transferxem('$address', '$private_key', '$public_key','activate');</script>";
  
  // header("Location: accountlist.php");


}

if(isset($_POST['deactivate_account']) && !empty($_POST['deactivate_account'])) {
  $deactivate_account = mysql_real_escape_string($_POST['deactivate_account']);
  $address = mysql_real_escape_string($_POST['address']);
  $private_key = mysql_real_escape_string($_POST['private_key']);
  $public_key = mysql_real_escape_string($_POST['public_key']);
  mysql_query("UPDATE tblmember SET account_status = 0 WHERE e_number = '$deactivate_account'")or die (mysql_error());

  //BLOCKCHAIN
  echo "<script type='text/javascript'>transferxem('$address', '$private_key', '$public_key','deactivate');</script>";

}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<link rel="stylesheet" href="../css/bootstrap.css" type="text/css" media="screen"/>
<link rel="stylesheet" href="../css/style.css" type="text/css" media="screen"/>
<script src="../js/jquery-2.0.0.min.js" type="application/javascript"></script>
<script src="../js/bootstrap.js" type="application/javascript"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>


<script>
function getDatas(str){
	$.ajax({
		type:'post',
		url:'ajaxAccountlist.php',
		data:{"sending":str},
		success: function(data){
			document.getElementById("memberlistOut").innerHTML = data;
			document.getElementById("memberlistOut").removeAttribute("style");
		}
	});
	$('#memberlist').attr("style","display:none");

}


</script>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">
<link rel="icon" href="../favicon.ico" type="image/x-icon">
<title>CvSU-OVS-Faculty Association</title>


</head>

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
								<li  class="active"><a href="accountlist.php" class="text-success" id="menu">Account List</a></li>
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
	        <h1>Account List</h1>
<span style="margin-top:-20px">of <strong><?php if ($adminorg=="FA"){echo "FACULTY ASSOCIATION";} else{echo "NON-ACADEMIC EMPLOYEE ASSOCIATION";} ?></strong></span>
			
            <blockqoute><hr></blockqoute>
            
            <div class="form-control" style="height:auto">


                       <table class="table" style="width:100%"> 
                        <tr><td>
                        <table id="tablehead" class="memberlisthead" width="98%">
                            <tr>
                                <th width="19%" >Employee #</th>
                                <th width="20%" >First Name</th>
                                <th width="18%" >Last Name</th>
                                <th width="17%" >Password</th>                               
                                <th width="">Action</th>                               
                            </tr>
                        </table>
                      </td></tr>
                      
                      <tr><td>
                      <div style=" overflow:auto; height:500px">
                        <table id="memberlistcontent" class="table table-striped table-bordered table-responsive table-hover" style="width:100%;">
                            
                            <?php echo $member_list;?>
                            
                        </table>
					</div>                        
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
