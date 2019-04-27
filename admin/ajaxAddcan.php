<?php
include "../session_user.php";

if (isset ($_POST['cnumber'])){

$c_number = $_POST['cnumber'];
$c_fname = $_POST['cfname'];
$c_lname = $_POST['clname'];
$c_position = $_POST['cposition'];
$c_college_branch = $_POST['ccollege_branch'];
$c_campus = $_POST['ccampus'];


$select = mysql_query ("SELECT * FROM tblcandidate WHERE c_number = '$c_number' AND c_fname = '$c_fname' AND c_lname = '$c_lname' AND c_organization = '$adminorg' AND c_college_branch = '$c_college_branch' AND c_campus = '$c_campus' AND c_year = '$thisyear' AND candidate_status = 0") or die (mysql_error());
$count_select = mysql_num_rows($select);
				if ($count_select ==0){	
					
					$create = mysql_query("INSERT INTO tblcandidate (c_number, c_fname, c_lname, c_position, c_organization, c_college_branch, c_campus, c_year, candidate_status, c_image) 
								VALUES ('$c_number', '$c_fname', '$c_lname', '$c_position', '$adminorg', '$c_college_branch', '$c_campus', '$thisyear', 0, 'none')")
								or die (mysql_error());
					
					echo 1;
				}
				else {
					echo 2;
				}
}
else{
	echo "<script>
			alert('This page is unavailable!');
			window.location.assign('../".$adminorg.".php');
		</script>";
}

?>