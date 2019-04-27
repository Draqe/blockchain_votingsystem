<?php
include "mysqlconnect.php";
session_start();
if (isset($_SESSION["username"])){
echo $asa;
	header ("location:FA.php");
	exit();
}
////////
$error = "&nbsp;";
if (isset ($_POST["username"]) && isset ($_POST["password"])){
	
	$username = $_POST["username"];
	$password = $_POST["password"];
	
	
	$sign = substr($username,0,5);

  

  	if($sign == "admin"){
		$adminlogin = mysql_query("SELECT * FROM tbladmin WHERE username = '$username' AND password = '$password' LIMIT 1");
		$existadminCount = mysql_num_rows($adminlogin);
		if($existadminCount==1){
			while($adminrow=mysql_fetch_array($adminlogin)){
				$id=$adminrow["id"];
				$organization = $adminrow["organization"];
			}
			$_SESSION["id"]=$id;
			$_SESSION["username"]=$username;
			$_SESSION["password"]=$password;
			header("Location:$organization.php");
			exit();
		}
		else{
			$error .= "Incorrect Username or Password!";
		}	
	}
	else{
		

			$login = mysql_query("SELECT * FROM tblmember WHERE e_number = '$username' AND password = '$password' LIMIT 1");
			$existCount = mysql_num_rows($login);
			while ($row = mysql_fetch_array($login)){
			$account_status = $row['account_status'];
			$id=$row["id"];
						$org=$row["organization"];
			}
			if($existCount==1){
				if ($account_status != 0){
					$_SESSION["id"]=$id;
					$_SESSION["username"]=$username;
					$_SESSION["password"]=$password;
					
					if($org == "FA"){
						header("Location:FA.php");
						exit();
					}

				}
				else{
					$error .= "You're account is not activated!";
				}
			}
			else{
				$error .= "Incorrect Username or Password!";
			}
		
	}
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" href="css/bootstrap.css" tyep="text/css" media="screen"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
<link rel="icon" href="favicon.ico" type="image/x-icon">
<title>CvSU Online Voting System</title>
</head>
<script src="js/jquery-2.0.0.min.js" type="application/javascript"></script>
<script src="js/bootstrap.js" type="application/javascript"></script>
<script type="application/javascript" src="js/inputtype.js"></script>
<script type="application/javascript" src="dist/nem-sdk.js"></script>
<script type="application/javascript" src="generateaccount.js"></script>
<body background="texture.png">

<div class="mainWrapper" align="center" style="margin-top:2%;">

	<div class="banner">
    <img src="votingsystem_banner.jpg" width="75%" style="box-shadow:0px 2px 5px #666; border-top-left-radius:2mm; border-top-right-radius:2mm"/> 
    </div>
    
    <div class="form-control" style="width:75%; margin-top:-5px; height:auto; background:url(texture1.png); padding-top:2%; border:#333 1px solid">
    	
        <div class="well" style="width:40%; box-shadow:0px 3px 2px #666">
        	 <span class="text-danger" style="width:60%; font-weight:bold; text-align:center"><?php echo $error?></span>
			<form class="" role="form" action="index.php" method="post" style=" padding:5%;">
				<div class="form-group">
                <input name="username" class="form-control input-lg" type="text" id="username" placeholder="Employee Number" onKeyUp="alphanumeric('username')" onKeyDown="alphanumeric('username')" required/>      
                </div>
                <div class="form-group">
                <input name="password" class="form-control input-lg" type="password" id="password" placeholder="Password" onKeyUp="alphanumeric('password')" onKeyDown="alphanumeric('password')" required/>
                </div>
                <input type="submit" value="Sign In" name="submit" class="btn btn-success btn-lg" style="width:100%"/>
    		</form>
            <p><a href="#" data-toggle="modal" data-target="#modal-reg" class="text-success" style="font-size:16px;">Create Account</a></p>
        </div>
        
    </div>
    
</div>

<!----- MODAL REGISTER ------>

<div class="modal fade" id="modal-reg" style="margin-top:-3%">
  <div class="modal-dialog">
    <div class="modal-content" style="margin:10% auto; width:60%">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3 class="modal-title text-success" id="myModalLabel">Register</h3>
      </div>
      <div class="modal-body">
      		
            <span style="width:60%; font-weight:bold; text-align:center" id = "reg-notice"></span>
            
      		<form id = "frm-reg" class = "form" action = "asdasd.php" method = "POST">
               
                <label>Username:</label>
				<div class="form-group">
                <input name="employee_number" class="form-control" type="text" id="employee_number" placeholder="Employee Number" onKeyUp="numeric('employee_number')" onKeyDown="numeric('employee_number')" required/>
                </div>
                
                
                <label>Password:</label>
                <div class="form-group">
                <input name="regpassword" class="form-control" type="password" id="regpassword" placeholder="Password" onKeyUp="alphanumeric('regpassword')" onKeyDown="alphanumeric('regpassword')" required/>
                </div>
                
                
                <label>Name:</label>
                <div class="form-group">
                <input name="fname" class="form-control" style="text-transform: uppercase" type="text" id="fname" placeholder="First Name" onKeyUp="alpha('fname')" onKeyDown="alpha('fname')" required/>
                </div>
                
                <div class="form-group">
                <input name="lname" class="form-control" style="text-transform: uppercase" type="text" id="lname" placeholder="Last Name" onKeyUp="alpha('lname')" onKeyDown="alpha('lname')" required/>
                </div>
                
                 
                <label>Organization:</label>
                <div class="form-group">
                <select name="organization" class="form-control" required>
                    <!-- <option></option> -->
                    <option value="FA">FA</option>
                    <!-- <option value="NAEA">NAEA</option> -->
                </select>
                </div>
                
                
                <label>Campus:</label>
                 <div class="form-group">
                <select id="slct1" onchange="populate(this.id,'slct2')" name="campus" class="form-control" required>
                    <option></option>
                    <option value="MAIN">MAIN</option>
                    <option value="SATELLITE">SATELLITE</option>
                </select>
                </div>
                
                
                <label>College/Branch:</label>
                <div class="form-group">
                <select id="slct2" name="college_branch" class="form-control" required>
                    <option></option>
                </select>
                </div>

                <div class="form-group">
                <input name="private_key" class="form-control"  type="hidden" id="private_key" placeholder="PRIVATE KEY">
                </div>

                <div class="form-group">
                <input name="public_key" class="form-control" type="hidden" id="public_key" placeholder="PUBLIC KEY">
                </div>

                <div class="form-group">
                <input name="address" class="form-control" type="hidden" id="address" placeholder="ADDRESS">
                </div>

      </div>
      <div class="modal-footer" >
        <button type="submit" class="btn btn-success" type="submit" name="submit">Submit</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </form>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->




</body>
</html>