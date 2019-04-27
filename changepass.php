<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<link rel="stylesheet" href="css/bootstrap.css" tyep="text/css" media="screen"/>
<link rel="stylesheet" href="css/style.css" tyep="text/css" media="screen"/>
<link rel="stylesheet" href="font-awesome-4.0.3/css/font-awesome.min.css"tyep="text/css" media="screen"/>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
<link rel="icon" href="favicon.ico" type="image/x-icon">
<title>Untitled Document</title>
</head>
<script src="js/jquery-2.0.0.min.js" type="application/javascript"></script>
<script src="js/bootstrap.js" type="application/javascript"></script>

<body>
<li data-toggle="modal" data-target="#modal-changepass"><a href="" class="text-success">Change Password</a></li>
<!----- MODAL REGISTER ------>

<div class="modal fade" id="modal-changepass" style="margin-top:-3%">
  <div class="modal-dialog">
    <div class="modal-content" style="margin:10% auto; width:60%">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3 class="modal-title text-success" id="myModalLabel">Change Password</h3>
      </div>
      <div class="modal-body" style="text-align:left">
      		
            <span style="width:60%; font-weight:bold; text-align:center" id = "changepass-notice"></span>
            
      		<form id = "frm-changepass" class = "form" action = "asdasd.php" method = "POST">
               
                <label>Password:</label>
				<div class="form-group">
                <input name="password" class="form-control" type="password" id="password" placeholder="Current Password" onKeyUp="numeric('employee_number')" onKeyDown="numeric('password')" required/>
                </div>
                
                
                <label>New Password:</label>
                <div class="form-group">
                <input name="newpassword" class="form-control" type="password" id="newpassword" placeholder="New Password" onKeyUp="alphanumeric('regpassword')" onKeyDown="alphanumeric('newpassword')" required/>
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
				function verify_user(form)
				{
				
					$("#changepass-notice").html("<p class = 'text-warning'>Loading...</p>");

					$.ajax({
						url: "ajaxChangepass.php",
						type: "POST",
						data: $(form).serializeArray(),
						success: function(info){
							
							if (info == 1)
							{
								$("#changepass-notice").html("<p class = 'text-primary'>Password successfully changed.</p>");
								$("#frm-changepass")[0].reset();
							}
							else if (info == 2)
							{
								$("#changepass-notice").html("<p class = 'text-danger'>Old Password is incorrect!</p>");
							}
							else if (info == 3)
							{
								$("#changepass-notice").html("<p class = 'text-danger'>Passwords didn't match!</p>");
								
							}
							else if (info == 4)
							{
								$("#changepass-notice").html("<p class = 'text-danger'>Password must have atleast of 6 characters!</p>");
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
						verify_user(this); 
					});
				
				});
				
			
			</script>


</body>
</html>