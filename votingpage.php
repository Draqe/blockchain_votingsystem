<?php
include "session_user.php";
if ($sign == "admin"){
	echo "<script>
			alert('This page is for voters only.');
			window.location.assign('$adminorg.php');
		</script>";
}



	if ($logmember_status == '0'){
		header ("Location:$org.php");
	}
	else{
		$president_list = "";
	$vicepresident_list="";
	$secretary_list = "";
	$treasurer_list = "";
	$auditor_list = "";
	$pro_list = "";
	$select=mysql_query("SELECT * FROM tblcandidate WHERE c_organization = '$org' AND candidate_status = 0");
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
			$c_year = $row['c_year'];
			

			if ($c_position == "President"){					
			$president_list .= "<td><label><input  onclick='pres(this.value)' type='radio' name='president' value='".$c_fname." ".$c_lname. "' id='RadioGroup1_$p' />&nbsp;".$c_fname." ".$c_lname. "</label>&nbsp;&nbsp;&nbsp;&nbsp;</td>"; 
			$p++;
			}
			
			if ($c_position == "Vice President"){					
			$vicepresident_list .= "<td><label><input onclick='vicepres(this.value)' type='radio' name='vicepresident' value='".$c_fname." ".$c_lname. "' id='RadioGroup1_$vp' />&nbsp;".$c_fname." ".$c_lname. "</label>&nbsp;&nbsp;&nbsp;&nbsp;</td>";
			$vp++;
			}
			
			if ($c_position == "Secretary"){					
			$secretary_list .= "<td><label><input onclick='sec(this.value)' type='radio' name='secretary' value='".$c_fname." ".$c_lname. "' id='RadioGroup1_$s' />&nbsp;".$c_fname." ".$c_lname. "</label>&nbsp;&nbsp;&nbsp;&nbsp;</td>";
			$s++;
			}
			
			if ($c_position == "Treasurer"){					
			$treasurer_list .= "<td><label><input onclick='tre(this.value)' type='radio' name='treasurer' value='".$c_fname." ".$c_lname. "' id='RadioGroup1_$t' />&nbsp;".$c_fname." ".$c_lname. "</label>&nbsp;&nbsp;&nbsp;&nbsp;</td>";
			$t++;
			}
			
			if ($c_position == "Auditor"){					
			$auditor_list .= "<td><label><input onclick='aud(this.value)' type='radio' name='auditor' value='".$c_fname." ".$c_lname. "' id='RadioGroup1_$a' />&nbsp;".$c_fname." ".$c_lname. "</label>&nbsp;&nbsp;&nbsp;&nbsp;</td>";
			$a++;
			}
			
			if ($c_position == "PRO"){					
			$pro_list .= "<td><label><input onclick='proa(this.value)' type='radio' name='pro' value='".$c_fname." ".$c_lname. "' id='RadioGroup1_$pr' />&nbsp;".$c_fname." ".$c_lname. "</label>&nbsp;&nbsp;&nbsp;&nbsp;</td>";
			$pr++;
			}
			
		}
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
<script>
function pres(element) {
	
  if (element == ""){
	  document.getElementById("prestovote").value = "No vote";
  }
  else{
	  document.getElementById("prestovote").value = element;
  }
}
function vicepres(element) {
   if (element == ""){
	  document.getElementById("viceprestovote").value = "No vote";
  }
  else{
	  document.getElementById("viceprestovote").value = element;
  }
}
function sec(element) {
   if (element == ""){
	  document.getElementById("sectovote").value = "No vote";
  }
  else{
	  document.getElementById("sectovote").value = element;
  }
}
function tre(element) {
   if (element == ""){
	  document.getElementById("tretovote").value = "No vote";
  }
  else{
	  document.getElementById("tretovote").value = element;
  }
}
function aud(element) {
   if (element == ""){
	  document.getElementById("audtovote").value = "No vote";
  }
  else{
	  document.getElementById("audtovote").value = element;
  }
   
}
function proa(element) {
   if (element == ""){
	  document.getElementById("protovote").value = "No vote";
  }
  else{
	  document.getElementById("protovote").value = element;
  }
}

</script>

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
           <h3 class="text-success"><strong><?php if ($org == "FA"){echo "Faculty Assoc.";} ?></strong></h3>
			<ul class="nav nav-pills nav-stacked col-sm-15" style="text-align:left; margin-right:-5%; margin-left:10%">
            	<li><a class="text-success" href="FA.php" id="menu">Home</a></li>
				<li><a href="faofficerlist.php" class="text-success" id="menu">Officer</a></li>
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
			<h1>Voting Page</h1>
<span style="margin-top:-20px">for <strong><?php if ($org=="FA"){echo "FACULTY ASSOCIATION";} ?></strong> <font class="text-danger"><?php echo $thisyear;?></font> Election </span>
			
            <blockqoute><hr></blockqoute>
            
            <div class="form-control" style="height:auto; text-align:left">
            	
                    <form id="form1" name="form1" method="post" action="votingpage.php">
                      <div class="well" style="margin-top:1%;">
                      <label><h4><strong>President</strong></h4></label>
                      <blockqoute><hr></blockqoute>
                      
                      <table width="auto" border="0">  
                        <tr>
                            <?php
                                 
                                 if ($president_list == ""){
									 
                                     echo "<td class='text-danger'><strong>No candidate for the position of President.</strong></td>";
                                 }
                                 else{
									 echo "<td><label><input onclick='pres(this.value)' type='radio' name='president' value='' id='RadioGroup1_$p' />&nbsp;No Vote</label>&nbsp;&nbsp;&nbsp;&nbsp;</td>";
                                     echo $president_list;
                                 }
                            ?>
                        </tr>
                      </table>
                      </div>
                      
                      
                      <div class="well">
                      <label><h4><strong>Vice President</strong></h4></label>
                      <blockqoute><hr></blockqoute>

                      <table width="auto" border="0">  
                        <tr>
                            <?php
                                 
                                 if ($vicepresident_list == ""){
                                     echo "<td class='text-danger'><strong>No candidate for the position of Vice President.</strong></td>";
                                 }
                                 else{
									 echo "<td><label><input onclick='vicepres(this.value)' type='radio' name='vicepresident' value='' id='RadioGroup1_$vp' />&nbsp;No Vote</label>&nbsp;&nbsp;&nbsp;&nbsp;</td>";
                                     echo $vicepresident_list;
                                 }
                            ?>
                        </tr>
                      </table>
                      </div>
                      
                      
                      <div class="well">
                      <label><h4><strong>Secretary</strong></h4></label>
                      <blockqoute><hr></blockqoute>
                      <table width="auto" border="0" cellpadding="10">  
                        <tr>
                            <?php
                                 
                                 if ($secretary_list == ""){
                                     echo "<td class='text-danger'><strong>No candidate for the position of Secretary.</strong></td>";
                                 }
                                 else{
									 echo "<td><label><input onclick='sec(this.value)' type='radio' name='secretary' value='' id='RadioGroup1_$s' />&nbsp;No Vote</label>&nbsp;&nbsp;&nbsp;&nbsp;</td>";
                                     echo $secretary_list;
                                 }
                            ?>
                        </tr>
                      </table>
                      </div>
                      
                      <div class="well">
                      <label><h4><strong>Treasurer</strong></h4></label>
                      <blockqoute><hr></blockqoute>
                      <table width="auto" border="0" cellpadding="10">  
                        <tr>
                            <?php
                                 
                                 if ($treasurer_list == ""){
                                     echo "<td class='text-danger'><strong>No candidate for the position of Treasurer.</strong></td>";
                                 }
                                 else{
									 echo "<td><label><input onclick='tre(this.value)' type='radio' name='treasurer' value='' id='RadioGroup1_$t' />&nbsp;No Vote</label>&nbsp;&nbsp;&nbsp;&nbsp;</td>";
                                     echo $treasurer_list;
                                 }
                            ?>
                        </tr>
                      </table>
                      </div>
                      
                      <div class="well">
                      <label><h4><strong>Auditor</strong></h4></label>
                      <blockqoute><hr></blockqoute>
                      <table width="auto" border="0" cellpadding="10">  
                        <tr>
                            <?php
                                 
                                 if ($auditor_list == ""){
                                     echo "<td class='text-danger'><strong>No candidate for the position of Auditor.</strong></td>";
                                 }
                                 else{
									 echo "<td><label><input onclick='aud(this.value)' type='radio' name='auditor' value='' id='RadioGroup1_$a' />&nbsp;No Vote</label>&nbsp;&nbsp;&nbsp;&nbsp;</td>";
                                     echo $auditor_list;
                                 }
                            ?>
                        </tr>
                      </table>
                      </div>
                      
                      <div class="well">
                      <label><h4><strong>P.R.O.</strong></h4></label>
                      <blockqoute><hr></blockqoute>
                      
                      <table width="auto" border="0" cellpadding="10">  
                        <tr>
                            <?php
                                 
                                 if ($pro_list == ""){
                                     echo "<td class='text-danger'><strong>No candidate for the position of P.R.O.</strong></td>";
                                 }
                                 else{
									 echo "<td><label><input onclick='proa(this.value)' type='radio' name='pro' value='' id='RadioGroup1_$pr' />&nbsp;No Vote</label>&nbsp;&nbsp;&nbsp;&nbsp;</td>";
                                     echo $pro_list;
                                 }
                            ?>
                        </tr>
                      </table>
                      </div>
                      
                      <div align="right" style="margin-bottom:1%;">
                      <button class="btn btn-success btn-lg" data-toggle='modal' data-target='#vote' type = "submit" name = "submit" id = "submit" >Submit Vote</button>
                      </div>
                    </form>
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
<!----------------------------------------------------------modal add officer ---------------------------------->
<div class="modal fade" id="vote" style="margin-top:-2%">
  <div class="modal-dialog">
    <div class="modal-content" style="margin:10% auto; width:60%">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3 class="modal-title text-success" id="myModalLabel"><strong>List of Your Votes</strong></h3>
        <font>for <?php if ($org == "FA"){ echo "Faculty Association"; } else{ echo "Non-Academic Employee Association"; }?> <font class="text-danger"><?php echo $thisyear?></font> Election</font>
      </div>
		

      
      <div class="modal-body">
      <span style=" font-weight:bold; text-align:center" id = "vote-notice"></span>
      	<form id = "frm-vote" class = "vote" action = "asdasd.php" method = "POST">
        <label>President:</label>
        <div class="form-group">
		<div id="prestovotename"></div>
        <span id="presfname"></span>
		<input class="form-control" type="text" id="prestovote" name="prestovote" value="No vote" readonly/>
        </div>
        
        <label>Vice President:</label>
        <div class="form-group">
        <input class="form-control" type="text" id="viceprestovote" name="viceprestovote" value="No vote" readonly/>
        </div>
        
        <label>Secretary:</label>
        <div class="form-group">
		<div id="prestovotename"></div>
		<input class="form-control" type="text" id="sectovote" name="sectovote" value="No vote" readonly/>
        </div>
        
        <label>Treasurer:</label>
        <div class="form-group">
        <input class="form-control" type="text" id="tretovote" name="tretovote" value="No vote" readonly/>
        </div>
        
        <label>Auditor:</label>
        <div class="form-group">
		<div id="prestovotename"></div>
		<input class="form-control" type="text" id="audtovote" name="audtovote" value="No vote" readonly/>
        </div>
        
        <label>P.R.O:</label>
        <div class="form-group">
        <input class="form-control" type="text" id="protovote" name="protovote" value="No vote" readonly/>
        </div>
        
        
        
      </div>
      <div class="modal-footer">
		<input class="btn btn-success" type = "submit" name = "submit" value = "Submit Vote">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Change Vote</button>
      </div>
      </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->



<!--------------------------------- end of modal --------------------------------------->

<!----------modal function-------->

<script>
				function verify_vote(vote)
				{
				
					$("#vote-notice").html("<p class = 'text-warning' style = 'width:100%; margin-left:-4%;text-align:center;'>Loading...</p>");

					$.ajax({
						url: "ajaxSubmitvote.php",
						type: "POST",
						data: $(vote).serializeArray(),
						success: function(info){
							
							if (info == 1)
							{
								alert('Congratulations. Your vote was successfully submitted.');
								window.location.assign('candidatelist.php');
								
							}
							else if (info == 2)
							{
								$("#addmem-notice").html("<p class = 'text-danger' style = 'width:100%; margin-left:-4%; text-align:center;'>Failed!</p>");
							}
							else if (info == 3)
							{
								$("#addmem-notice").html("<p class = 'text-danger' style = 'width:100%; margin-left:-4%; text-align:center;'>hdksjfjkdsh</p>");
								alert('You already cast a vote!');
								window.location.assign('candidatelist.php');
							}
						}
					
					
					
					}).fail(function(){
						
						$("#vote-notice").html("<p class = 'text-danger'>Error.</p>");
					
					});
				
				}
		
				$(document).ready(function(){
					
					
					
					
					
					$("#frm-vote").submit(function(e){
						
						e.preventDefault();
						verify_vote(this); 
					});
				
				});
				
			
</script>

</html>
