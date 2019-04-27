<?php
include "../session_user.php";
?>
<?php
//show the list of member
$member_list="";
$select=mysql_query("SELECT * FROM tblmember WHERE organization = '$adminorg'");
$memberCount = mysql_num_rows($select);
$i=1;
if ($memberCount > 0){
	while ($row = mysql_fetch_array($select)){
		$e_number = $row["e_number"];
		$fname = $row["fname"];
		$lname = $row["lname"];
		$organization = $row["organization"];
		$college_branch = $row["college_branch"];
		$campus = $row["campus"];
		
		$member_list .= "<tr>";
		$member_list .= "<td width='18%'>".$e_number."</td>";
		$member_list .= "<td width='14%'>".$fname."</td>";
		$member_list .= "<td width='13%'>".$lname."</td>";
		$member_list .= "<td width='10%'>".$campus."</td>";
		$member_list .= "<td width='15%'>".$college_branch."</td>";
		$member_list .="<td width='10%'>
							<table><tr>
								<td width='40%'>
									<form action = 'member.php' method = 'post'>
										<input type='hidden' name='delete_member' value=$e_number>
										
										<button title='DELETE' class='btn btn-danger' onclick='return confirm(\"Are you sure you want to delete this information?\");' type ='submit'><i class='fa fa-trash-o fa-sm'></i></button>
									</form>
								</td>
								<td>|</td>
								<td width='40%'>						
									<a title='EDIT' href='editmember.php?employee_number=".$e_number."'><button type ='submit' class='btn btn-success'><i class='fa fa-pencil fa-sm'></i></button</a>
								</td>
							</tr></table></td>";
		$member_list .= "</tr>";
		$i++;
	}
}
else{
	$member_list="<tr width = '100%'>
					<td class='text-danger'><strong>No record of members.</strong></td>
				</tr>";		
}


//delete member
if(isset($_POST['delete_member']) && !empty($_POST['delete_member'])) {
  $delete_member = mysql_real_escape_string($_POST['delete_member']);
  mysql_query("DELETE FROM tblmember WHERE  e_number = '$delete_member'");
  
  echo "<script>
  			alert('Information is successfully deleted.');
			window.location.assign('member.php');
  		</script>";
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<link rel="stylesheet" href="../css/bootstrap.css" tyep="text/css" media="screen"/>
<link rel="stylesheet" href="../css/style.css" tyep="text/css" media="screen"/>
<link href="../font-awesome-4.0.3/css/font-awesome.min.css" rel="stylesheet">
<script src="/blockchain_votingsystem/js/jquery-2.0.0.min.js" type="application/javascript"></script>
<script src="/blockchain_votingsystem/js/bootstrap.js" type="application/javascript"></script>
<script src="../js/inputtype.js" type="application/javascript"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script>
function getData(str){
	$.ajax({
		type:'post',
		url:'ajaxMemberlist.php',
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
	        <h1>Member List</h1>
<span style="margin-top:-20px">of <strong><?php if ($adminorg=="FA"){echo "FACULTY ASSOCIATION";} else{echo "NON-ACADEMIC EMPLOYEE ASSOCIATION";} ?></strong></span>
			
            <blockqoute><hr></blockqoute>
           
            <div class="form-control" style="height:auto">
            <div align="right" style="margin-bottom:5px;">
            	<table width="100%"><tr>
                	<td width="50%">&nbsp;</td>

       
                    <td>&nbsp;</td>
                    <td width="">
                    	<input class="form-control" style="width:100%%;" type="text" onkeyup="getData(this.value)" placeholder="Search Members..." />
                    </td>
                </tr></table>
			</div>
                       <table class="table" style="width:100%"> 
                        <tr><td>
                        <table id="tablehead" class="memberlisthead" width="98%">
                            <tr>
                                <th width="19%" >Employee #</th>
                                <th width="16%" >First Name</th>
                                <th width="19%" >Last Name</th>                               
                                <th width="12%" >Campus</th>
                                <th width="19%" >College/Branch</th>
                                <th width=" " >Action</th>                               
                            </tr>
                        </table>
                      </td></tr>
                      
                      <tr><td>
						<div id="memberlist" style=" overflow:auto; height:700px; display:block">
                            <table id="memberlistcontent" class="table table-striped table-bordered table-responsive table-hover" style="width:100%;">
                                
                                <?php echo $member_list;?>
                                
                            </table>
						</div>
                        
                        <div id="memberlistOut" style="display:none">
                        	
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
            
      		<form id = "frm-addmem" class = "addmem" action = "asdasd.php" method = "POST">
              
                <label>Employee Number:</label>
				<div class="form-group">
                <input name="employee_number" class="form-control" type="text" id="enum" placeholder="Employee Number" onKeyUp="numeric('enum')" onKeyDown="numeric('enum')" required/>
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
        <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="document.getElementById('addmem-notice').innerHTML='';">Close</button>
        </form>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!----------modal function-------->

<script>
				function verify_addmem(addmem)
				{
				
					$("#addmem-notice").html("<p class = 'text-warning' style = 'width:100%; margin-left:-4%;text-align:center;'>Loading...</p>");

					$.ajax({
						url: "ajaxAddmember.php",
						type: "POST",
						data: $(addmem).serializeArray(),
						success: function(info){
							
							if (info == 1)
							{
								$("#addmem-notice").html("<p class = 'text-primary' style = 'width:100%; margin-left:-4%; text-align:center;'>Information is Successfully Added.</p>");
								$("#frm-addmem")[0].reset();
							}
							else if (info == 2)
							{
								$("#addmem-notice").html("<p class = 'text-danger' style = 'width:100%; margin-left:-4%; text-align:center;'>Employee number is already exist!</p>");
							}
							else if (info == 3)
							{
								$("#addmem-notice").html("<p class = 'text-danger' style = 'width:100%; margin-left:-4%; text-align:center;'>Employee name is already exist!</p>");
								
							}
							 
						}
					
					
					
					}).fail(function(){
						
						$("#addmem-notice").html("<p class = 'text-danger'>Error.</p>");
					
					});
				
				}
		
				$(document).ready(function(){
					
					
					$("#modal-addmem").on("show.bs.modal", function(e){
					
						$("#addmem-notice").html("<p>&nbsp;</p>");
						$("#frm-addmem")[0].reset();
					
					
					});
					
					
					$("#frm-addmem").submit(function(e){
						
						e.preventDefault();
						verify_addmem(this); 
					});
				
				});
				
			
</script>



</body>
</html>
