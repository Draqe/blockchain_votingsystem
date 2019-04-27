<?php
if ($_SERVER['PHP_SELF']=="/voting_system/headerlog.php"){
	header("Location:index.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" href="/blockchain_votingsystem/font-awesome-4.0.3/css/font-awesome.min.css"tyep="text/css" media="screen"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<div id="headerlog" align="right" style="">
<?php
if ($sign == "admin"){
	?>
	<script type="application/javascript" src="../js/inputtype.js"></script>
	<?php
	$color = "#fff";
	 
}
else{
	?>
	<script type="application/javascript" src="js/inputtype.js"></script>
	<?php
	 
	if ($logaccount_status == 1){ 
									$color = "#fff";
								} 
							

}

?>
<form class="login" action = "<?php echo $logout;?>.php" method = "POST">
<table width="auto"  cellpadding="0" id="tablelog">
  <tr>
    <td style="font-size:13px">Welcome</td>
    <td>&nbsp;<?php echo $logfname; ?></td>
    <td>&nbsp;<?php echo $loglname; ?></td>
    <td>&nbsp;&nbsp;&nbsp;</td>
    <td><div class="dropdown">
    			<a href="" class="dropdown-toggle" data-toggle = "dropdown"><i  class="fa fa-gear fa-2x" style="color:<?php echo $color; ?>"></i> </a>
                    <ul class="dropdown-menu nav nav-pills nav-stacked" role="menu" aria-labelledby="dLabel">
                    	
                        <li data-toggle="modal" data-target="#modal-changepass"><a href="" class="text-success">Change Password</a></li>
                        <li style="border-top:1px solid #999"><a href="/blockchain_votingsystem/logout.php" onclick="return confirm('You want to logout?');" class="text-success">Log Out</a></li>
                    </ul>
				</div>
    </td>
  </tr>
</table>
</form>
</div>
<div class="banner">
    <img src="/blockchain_votingsystem/votingsystem_banner.jpg" width="75%" style=""/> 
    </div>
   
        
</body>

<!---------------------------------------------Validate section ------------------------------------------>

<!----- MODAL changpassword ------>

<div class="modal fade" id="modal-validate" style="margin-top:5%">
  <div class="modal-dialog">
    <div class="modal-content" style="margin:10% auto; width:60%;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3 class="modal-title text-success" id="myModalLabel">Validate Account</h3>
      </div>
      <div class="modal-body" style="text-align:left">
      		
            <span style="width:60%; font-weight:bold; text-align:center" id = "validate-notice"></span>
            
      		<form id = "frm-validate" class = "validate" action = "asdasd.php" method = "POST">
               
                <label>Username:</label>
				<div class="form-group">
                <input name="employee_number" class="form-control" type="text" id="employee_number" placeholder="Employee Number" onKeyUp="numeric('employee_number')" onKeyDown="numeric('employee_number')" required/>
                </div>
                
                
                <label>Password:</label>
                <input name="regpassword" class="form-control" type="password" id="regpassword" placeholder="Password" onKeyUp="alphanumeric('regpassword')" onKeyDown="alphanumeric('regpassword')" required/>
                
                
      </div>
      <div class="modal-footer" >
        <button type="submit" class="btn btn-success" type="submit" name="submit">Submit</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </form>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!----------modal function-------->

<script>
				function verify_validate(validate)
				{
				
					$("#validate-notice").html("<p class = 'text-warning' style = 'text-align:center; margin-left:-8%;'>Loading...</p>");

					$.ajax({
						url: "/blockchain_votingsystem/ajaxValidate.php",
						type: "POST",
						data: $(validate).serializeArray(),
						success: function(status){
							
							if (status == 1)
							{
								alert('Your account is successfully validated.');
								window.location.assign('candidatelist.php');
							}
							else if (status == 2)
							{
								$("#validate-notice").html("<p class = 'text-danger' style = 'text-align:center; margin-left:-8%;'>Incorrect Username or Password!</p>");
							}
							else if (status == 3)
							{
								$("#validate-notice").html("<p class = 'text-danger' style = 'text-align:center; margin-left:-12%;'>Account is validated already!</p>");
							}							

						}
					
					
					
					}).fail(function(){
						
						$("#validate-notice").html("<p class = 'text-danger'>Error.</p>");
					
					});
				
				}
		
				$(document).ready(function(){
					
					
					$("#modal-validate").on("show.bs.modal", function(e){
					
						$("#validate-notice").html("<p>&nbsp;</p>");
						$("#frm-validate")[0].reset();
					
					
					});
					
					
					
					$("#frm-validate").submit(function(e){
						
						e.preventDefault();
						verify_validate(this); 
					});
				
				});
				
			
			</script>


<!---------------------------------------------Change password section ------------------------------------------>

<!----- MODAL changpassword ------>

<div class="modal fade" id="modal-changepass" style="margin-top:4%">
  <div class="modal-dialog">
    <div class="modal-content" style="margin:10% auto; width:60%">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3 class="modal-title text-success" id="myModalLabel">Change Password</h3>
      </div>
      <div class="modal-body" style="text-align:left">
      		
            <span style="width:60%; font-weight:bold; text-align:center" id = "changepass-notice"></span>
            
      		<form id = "frm-changepass" class = "changepass" action = "asdasd.php" method = "POST">
               
                <label>Password:</label>
				<div class="form-group">
                <input name="password" class="form-control" type="password" id="currentpassword" placeholder="Current Password" onKeyUp="alphanumeric('currentpassword')" onKeyDown="alphanumeric('currentpassword')" required/>
                </div>
                
                
                <label>New Password:</label>
                <div class="form-group">
                <input name="newpassword" class="form-control" type="password" id="newpassword" placeholder="New Password" onKeyUp="alphanumeric('newpassword')" onKeyDown="alphanumeric('newpassword')" required/>
                </div>
                
                
                <label>Confirm Password:</label>
               
                <input name="confirmpassword" class="form-control" type="password" id="confirmpassword" placeholder="Confirm Password" onKeyUp="alphanumeric('confirmpassword')" onKeyDown="alphanumeric('confirmpassword')" required/>
                
                
      </div>
      <div class="modal-footer" >
        <button type="submit" class="btn btn-success" type="submit" name="submit">Save</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </form>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!----------modal function-------->

<script>
				function verify_changepass(changepass)
				{
				
					$("#changepass-notice").html("<p class = 'text-warning' style = 'text-align:center; margin-left:-8%;'>Loading...</p>");

					$.ajax({
						url: "/blockchain_votingsystem/ajaxChangepass.php",
						type: "POST",
						data: $(changepass).serializeArray(),
						success: function(info){
							
							if (info == 1)
							{
								$("#changepass-notice").html("<p class = 'text-primary' style = 'text-align:center; margin-left:-8%;'>Password successfully changed.</p>");
								$("#frm-changepass")[0].reset();
							}
							else if (info == 2)
							{
								$("#changepass-notice").html("<p class = 'text-danger' style = 'text-align:center; margin-left:-7%;'>Old Password is incorrect!</p>");
							}
							else if (info == 3)
							{
								$("#changepass-notice").html("<p class = 'text-danger' style = 'text-align:center; margin-left:-8%;'>Passwords didn't match!</p>");
								
							}
							else if (info == 4)
							{
								$("#changepass-notice").html("<p class = 'text-danger' style = 'text-align:center; margin-left:-11%;'>Password must be atleast 6 characters!</p>");
							}
							
						
						}
					
					
					
					}).fail(function(){
						
						$("#changepass-notice").html("<p class = 'text-danger'>Error.</p>");
					
					});
				
				}
		
				$(document).ready(function(){
					
					
					$("#modal-changepass").on("show.bs.modal", function(e){
					
						$("#changepass-notice").html("<p>&nbsp;</p>");
						$("#frm-changepass")[0].reset();
					
					
					});
					
					
					
					$("#frm-changepass").submit(function(e){
						
						e.preventDefault();
						verify_changepass(this); 
					});
				
				});
				
			
			</script>


</html>