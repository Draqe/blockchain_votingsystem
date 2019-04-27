<?php
include "../session_user.php";

if (!isset($_GET['employee_number'])){
	header("Location:../$adminorg.php");
}
//script error report
error_reporting(E_ALL);
ini_set('display_errors','1');

//update the data to database
$error="&nbsp;";
if (isset($_POST['employee_number'])){
	$e_number = mysql_real_escape_string($_POST['employee_number']);
	$fname = strtoupper(mysql_real_escape_string($_POST['fname']));
	$lname = strtoupper(mysql_real_escape_string($_POST['lname']));
	$college_branch = mysql_real_escape_string($_POST['college_branch']);
	$campus = mysql_real_escape_string($_POST['campus']);
	$targetmember = mysql_real_escape_string($_POST['targetmember']);
	$targetfname = mysql_real_escape_string($_POST['targetfname']);
	$targetlname = mysql_real_escape_string($_POST['targetlname']);
	
	
	$select = mysql_query("SELECT * FROM tblmember WHERE e_number = '$e_number'")or die (mysql_error());
	$count = (mysql_num_rows($select));
		if ($count == 0 || $targetmember == $e_number){
			$select = mysql_query("SELECT * FROM tblmember WHERE fname = '$fname' AND lname = '$lname'")or die (mysql_error());
			$count = (mysql_num_rows($select));
				if ($count == 0 || ($targetfname == $fname && $targetlname == $lname)){
					 
					$update = mysql_query("UPDATE tblmember set e_number = '$e_number', fname = '$fname', lname = '$lname', college_branch = '$college_branch', campus = '$campus' WHERE e_number = '$targetmember'");
					echo "<script>
							alert ('Information is successfuly updated.');
							window.location.assign('member.php');
					</script>";
					 
				}
				else{
					$error .="<span class='text-danger'><strong>Employee name already exist!</strong></span>";
				}
		}
		else {
			$error .="<span class='text-danger'><strong>Employee number already exist!</strong></span>";
		}
}
?>
<?php
//pass the data from the database
if (isset($_GET['employee_number'])){
	$targetmember=$_GET['employee_number'];
	$select = mysql_query("SELECT * FROM tblmember where e_number = '$targetmember' AND organization = '$adminorg' LIMIT 1")or die (mysql_error());
	$memberCount=mysql_num_rows($select);
	if ($select>0){
		while ($rows=mysql_fetch_array($select)){
			$e_number=$rows['e_number'];
			$fname=$rows['fname'];
			$lname=$rows['lname'];
			$organization=$rows['organization'];
			$college_branch=$rows['college_branch'];
			$campus=$rows['campus'];
		}
	}
	else{
		echo "<script>
				alert('No information found');
				window.location.assign('member.php');
			</script>";
		
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<link rel="stylesheet" href="../css/bootstrap.css" tyep="text/css" media="screen"/>
<link rel="stylesheet" href="../css/style.css" tyep="text/css" media="screen"/>
<script src="../js/jquery-2.0.0.min.js" type="application/javascript"></script>
<script src="../js/bootstrap.js" type="application/javascript"></script>
<script src='../js/inputtype.js' type="application/javascript" ></script>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
<link rel="icon" href="favicon.ico" type="image/x-icon">
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
				<li class="active"><a href="member.php" class="text-success" id="menu">Member</a></li>
								<li><a href="officerlist.php" class="text-success" id="menu">Officer</a></li>
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
	                <h1>Edit Member</h1>
      				<span align="center" style="margin-top:-20px">of <font style="font-weight:bold"><?php if ($adminorg=="FA"){echo "FACULTY ASSOCIATION";} else{echo"NON-ACADEMIC EMPLOYEE ASSOCIATION";} ?></font></span>
					<blockqoute><hr></blockqoute>
                    
                   
                    <div class="form-control" style="height:auto; width:50%; text-align:left">
                    	 <div align="center" class="form-group">
	                    		<?php echo $error; ?>
                   		 </div>
                        <form class="form-group" action = "editmember.php?employee_number=<?php echo $targetmember?>" method = "POST" >
               
                            <label>Employee Number:</label>
                            <div class="form-group">
                            <input name="employee_number" class="form-control" type="text" id="enum" placeholder="Employee Number" onKeyUp="numeric('enum')" onKeyDown="numeric('enum')" value="<?php echo $e_number?>" required/>
                            </div>
                            
                            <label>First Name:</label>
                            <div class="form-group">
                            <input name="fname" class="form-control" style="text-transform: uppercase" type="text" id="fname" placeholder="First Name" onKeyUp="alpha('fname')" onKeyDown="alpha('fname')" value="<?php echo $fname?>" required/>
                            </div>
                            
                            <label>Last Name:</label>
                            <div class="form-group">
                            <input name="lname" class="form-control" style="text-transform: uppercase" type="text" id="lname" placeholder="Last Name" onKeyUp="alpha('lname')" onKeyDown="alpha('lname')" value="<?php echo $lname?>" required/>
                            </div>
                            
                            <label>Campus:</label>
                             <div class="form-group">
                            <select id="slct1" onchange="populate(this.id,'slct2')" name="campus" class="form-control" required>
                                <option value="<?php echo $campus;?>"><?php echo $campus;?></option>
								    <option value="MAIN">MAIN</option>
                   					<option value="SATELLITE">SATELLITE</option>	
                            </select>
                            </div>
                            
                            
                            <label>College/Branch:</label>
                             <div class="form-group">
                            <select id="slct2" name="college_branch" class="form-control" required>
                                <?php if ($campus == "Main"){
												echo "<option value=".$college_branch.">".$college_branch."</option>
														<option value='CAFENR'>CAFENR</option>
														<option value='CAS'>CAS</option>
														<option value='CCJ'>CCJ</option>
														<option value='CED'>CEIT</option>
														<option value='CEMDS'>CEMDS</option>
														<option value='CON'>CON</option>
														<option value='CSPEAR'>CSPEAR</option>
														<option value='CVMBS'>CVMBS</option>
														<option value='OLC'>OLC</option>
												";
											}
											else{
												echo "<option value=".$college_branch.">".$college_branch."</option>
														<option value='Trece'>Trece</option>
														<option value='Naic'>Naic</option>
														<option value='Rosario'>Rosario</option>
														<option value='Bacoor'>Bacoor</option>
														<option value='Imus'>Imus</option>";
											}
									?>
                                    <option value="<?php echo $college_branch;?>"><?php echo $college_branch;?></option>
                            </select>
                            </div>
            
                			<div align="right">
                            <input name="targetmember" type="hidden" size="12" value="<?php echo $targetmember;?>" />
                        	<input name="targetfname" type="hidden" size="12" value="<?php echo $fname;?>" />
                            <input name="targetlname" type="hidden" size="12" value="<?php echo $lname;?>" />
                            <button type="submit" class="btn btn-success btn-lg" type="submit" name="submit">Submit</button>
                            <a href="member.php"><button type="button" class="btn btn-danger btn-lg">Close</button></a>
                            </div>
                    	</form>
                        
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

<!----- MODAL REGISTER ------>

<div class="modal fade" id="modal-addmem" style="margin-top:2%">
  <div class="modal-dialog">
    <div class="modal-content" style="margin:10% auto; width:60%">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3 class="modal-title text-success" id="myModalLabel"><strong>Add Member</strong></h3>
        <font>of <?php if ($adminorg == "FA"){ echo "Faculty Association"; } else{ echo "Non-Academic Employee Association"; }?></font>
      </div>
      <div class="modal-body">
      		
            <span style=" font-weight:bold; text-align:center" id = "addmem-notice"></span>
            
      		<form id = "frm-addmem" class = "form" action = "asdasd.php" method = "POST">
              
                <label>Employee Number:</label>
				<div class="form-group">
                <input name="employee_number" class="form-control" type="text" id="employee_number" placeholder="Employee Number" onKeyUp="numeric('employee_number')" onKeyDown="numeric('employee_number')" required/>
                </div>
                
                <label>Name:</label>
                <div class="form-group">
                <input name="fname" class="form-control" type="text" id="fname" placeholder="First Name" onKeyUp="alpha('fname')" onKeyDown="alpha('fname')" required/>
                </div>
                
                <div class="form-group">
                <input name="lname" class="form-control" type="text" id="lname" placeholder="Last Name" onKeyUp="alpha('lname')" onKeyDown="alpha('lname')" required/>
                </div>
                
                <label>Campus:</label>
                 <div class="form-group">
                <select id="slct1" onchange="populate(this.id,'slct2')" name="campus" class="form-control" required>
                    <option></option>
                    <option value="Main">Main</option>
                    <option value="Satellite">Satellite</option>
                </select>
                </div>
                
                
                <label>College/Branch:</label>
                <select id="slct2" name="college_branch" class="form-control" required>
                    <option></option>
                </select>

      </div>
      <div class="modal-footer" >
        <button type="submit" class="btn btn-success" type="submit" name="submit">Submit</button>
        <button type="button" class"btn btn-danger" data-dismiss="modal">Close</button>
        </form>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!----------modal function-------->



</body>
</html>
