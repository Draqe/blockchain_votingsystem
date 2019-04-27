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
		include "headerlogFA.php";
		include "headermenu.php";
	?>
<!-------main body ------>    
    <div id="mainbody" class="form-control">
	<!------ menu tag ----->    	
        <div id="menutag" class="container">
            <?php
				echo $menu;
            ?>
        </div>
	<!----- end of menu tag ------>
    
    <!------ main content tag ----->    	
     	<div id="maincontent">
		<div class="well">	
	                <h1>Faculty Association</h1>
			<blockqoute><hr></blockqoute>
            
            	<?php
				$select = mysql_query("Select * from tblmember");
				$count = mysql_num_rows($select);
				// echo $count;
					if ($sign == "admin"){
						if ($adminorg == "FA"){
					 		$orgbase = "/blockchain_votingsystem/FA.php";
						}
					
					}
					else{
						if ($org == "FA"){
					 		$orgbase = "/blockchain_votingsystem/FA.php";
						}
				
					}
				 	
					if ($sign == "admin"){
						if ($org_status_election == 1){
							if ($orgbase == $_SERVER['PHP_SELF']){
								echo '<div class="form-group">';
									echo '<div class="form-control" style="height:auto" align="right">';
										echo 'The Voting is now <font class="text-danger"><strong>'.'OPEN'.'</strong></font>.';
									echo '</div>';
								echo '</div>';
							}
							else{
							}
						}
						else{
						}
					}
					else{
						if ($org_status == 1){
							if ($orgbase == $_SERVER['PHP_SELF']){
								echo '<div class="form-group">';
									echo '<div class="form-control" style="height:auto" align="right">';
										echo 'The Voting is now <font class="text-danger"><strong>'.'OPEN'.'</strong></font>.';
									echo '</div>';
								echo '</div>';
							}
							else{
							}
						}
						else{
						}
					}
					
					
					
				?>
            
            <div class="form-control" style="height:auto">
                	<p>The <strong><abbr title="Cavite State University" class="initialism">C<small>v</small>SU</abbr> FACULTY ASSOCIATIONS</strong>, a legitimate public sector labor organization with <abbr title="Department of Labor and Employment-Civil Service Commission" class="initialism">DOLE-CSC</abbr> Registration Certificate No. 1779 dated 06 September 2010 with the office address at Cavite State University, Indang, Cavite, represented by its President, <strong>JOCELYN L. REYES</strong>, hereinafter reffered to as the <strong>ASSOCIATION</strong>.</p>
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
