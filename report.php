<?php
include "session_user.php";
if ($org_status == 0){
	echo "<script>
			alert('Sorry this page is currently unavailable.');
			window.location.assign('".$org.".php');
		</script>";
}
if ($sign=="admin"){
}
else{
$all = mysql_query("SELECT * FROM tblmember where organization = '$org'");
$cntall=mysql_num_rows($all);

$select = mysql_query("SELECT * FROM tblmember where organization = '$org' AND member_status = 0");
$count =mysql_num_rows($select);

$voted = ($count/$cntall)*100;
$roundv = round($voted,2);
	if ($count == 0){
		$report = "<td valign='bottom'><table>
				<tr><td align='center'>".$roundv."%</td></tr>
				<tr><td bgcolor='#000' width='100px'></td></tr>
				<tr><td align='center'>Voted</td></tr>
				</tr></table></td>";  

	}
	else{
		$report = "<td valign='bottom'><table>
				<tr><td align='center'>".$roundv."%</td></tr>
				<tr><td bgcolor ='#003366' width = '100px' height ='".($roundv*4)."px' ></td></tr>
				<tr><td></td></tr>
				<tr><td bgcolor='#000'></td></tr>
				<tr><td align='center'>Voted</td></tr>
				</tr></table></td>";  
	}

$select = mysql_query("SELECT * FROM tblmember where organization = '$org' AND member_status = 1");
$count =mysql_num_rows($select);
$notvote = ($count/$cntall)*100;
$roundn = round($notvote,2);
	if ($count == 0){
		$report .= "<td valign='bottom'><table>
				<tr><td align='center'>".$roundn."%</td></tr>
				<tr><td bgcolor='#000' width ='100px'></td></tr>
				<tr><td align='center'>Not Vote</td></tr>
				</tr></table></td>";  

		}
	else{
		$report .= "<td valign='bottom'><table>
				<tr><td align='center'>".$roundn."%</td></tr>
				<tr><td style='box-shadow:2px 2px 2px #999' bgcolor ='#ff0000' width = '100px' height ='".($roundn*4)."px' ></td></tr>
				<tr><td></td></tr>
				<tr><td bgcolor='#000'></td></tr>
				<tr><td align='center'>Not Voted</td></tr>
				</tr></table></td>";  
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
				<li><a href="candidatelist.php" class="text-success" id="menu">Candidates</a></li>
            	 
            	 <?php 
					if ($org_status == 0){
						echo '<li class="text-success" id="disableLink" id="menu">Report</li>
								<li><a href="result.php" class="text-success" id="menu">Result</a></li>';
					}
					else{
						echo '<li  class="active"><a href="report.php" class="text-success" id="menu">Report</a></li>
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
	         <h1>Officer List</h1>
      <span align="center" style="margin-top:-20px">for <font style="font-weight:bold"><?php if ($org=="FA"){echo "FACULTY ASSOCIATION";} else{echo"NON-ACADEMIC EMPLOYEE ASSOCIATION";} ?></font> Election <font style="color:#F00"><?php echo $thisyear;?></font></span>
    
			<blockqoute><hr></blockqoute>
			
            <div class="form-control" style="height:auto">
            	<table>
					<?php 
                        echo $report;
                    ?>
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
