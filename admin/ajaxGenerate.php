<?php

include "../session_user.php";
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$error = "&nbsp;";
if(isset ($_POST['employee_number'])){	
	$c_number = $_POST['employee_number'];

	$select = mysql_query("SELECT * FROM tblmember WHERE e_number = '$c_number' AND organization = '$adminorg'") or die (mysql_error());
	$count = mysql_num_rows($select);
		if($count>0){
			while($rows=mysql_fetch_array($select)){
				$fname = $rows['fname'];
				$lname = $rows['lname'];
				$organization=$rows['organization'];
				$college_branch=$rows['college_branch'];
				$campus=$rows['campus'];
				
				echo '
					<label><strong>Position:</strong></label>
					<div class="form-group">
					<select class="form-control" name="cposition" type="text" required>
						<option  value=""></option>
						<option value="President">President</option>
						<option value="Vice President">Vice President</option>
						<option value="Secretary">Secretary</option>
						<option value="Treasurer">Treasurer</option>
						<option value="Auditor">Auditor</option>
						<option value="PRO">P.R.O.</option></select>
					</div>
					<label><strong>Name:</strong></label>
					<div class="form-group">
					<input name="cfname" type="text" class="form-control" value="'.$fname.'" readonly>
					</div>
					<div class="form-group">
					<input name="clname" type="text" class="form-control" value="'.$lname.'" readonly>
					</div>
					<label><strong>Campus:</strong></label>
					<div class="form-group">
					<input name="ccampus" type="text" class="form-control" value="'.$campus.'" readonly>
					</div>
					<label><strong>College/Branch:</strong></label>
					<input name="ccollege_branch" type="text" class="form-control" value="'.$college_branch.'" readonly>
					<input name="cnumber" type="hidden" class="form-control" value="'.$c_number.'" readonly>
				';
			}
		}
		else{
			echo 2;
		}
}
else{
	echo "<script>
			alert('This is page unavailable');
			window.location.assign('".$adminorg.".php');
		</script>";
}

?>