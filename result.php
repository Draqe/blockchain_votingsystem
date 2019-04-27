<?php
include "session_user.php";
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
      <span align="center" style="margin-top:-20px">for <font style="font-weight:bold">FACULTY ASSOCIATION</font> Election <font style="color:#F00"><?php echo $thisyear;?></font></span>
      
                <blockqoute><hr></blockqoute>
                
<div class='form-control' style='height:auto'>
			<span class='text-danger' style='text-align:center'><strong>The official result of the election will be posted soon in the <a href="faofficerlist.php">officer list</a>. Thank you.</strong></span>
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


