<?php 
include "../session_user.php";

if (isset($_POST['submit'])){
	$president = $_POST['president'];
	$vicepresident = $_POST['vicepresident'];
	$secretary = $_POST['secretary'];
	$treasurer = $_POST['treasurer'];
	$auditor = $_POST['auditor'];
	$pro = $_POST['pro'];
	if ($president&&$vicepresident&&$secretary&&$treasurer&&$auditor&&$pro){
		$update = mysql_query("UPDATE tblofficer SET o_status = 0, end_term = '$thisyear' WHERE o_status = 1 AND o_organization = '$adminorg'") or die (mysql_error());
		if ($president != 'x'){
			$select = mysql_query("SELECT * FROM tblmember WHERE e_number = '$president'") or die (mysql_error());
			while ($row=mysql_fetch_array($select)){
				$o_number = $row['e_number'];
				$o_fname = $row['fname'];
				$o_lname = $row['lname'];
				$o_position = "President";
				$o_organization = $row['organization'];
				$o_college_branch = $row['college_branch'];
				$o_campus = $row['campus'];
				$start_term = $thisyear;
				
				$insert = mysql_query("INSERT INTO tblofficer (o_number, o_fname, o_lname, o_position, o_organization, o_college_branch, o_campus, start_term, o_status) VALUES ('$o_number', '$o_fname', '$o_lname', '$o_position', '$o_organization', '$o_college_branch', '$o_campus', '$start_term', 1)")or die (mysql_error());
			}
		}
		else{
			$select = mysql_query("SELECT * FROM tblofficer WHERE end_term = '$thisyear' AND o_position = 'President' AND o_organization = '$adminorg'")or die (mysql_error());
			while ($row=mysql_fetch_array($select)){
				$o_number = $row['o_number'];
				$o_fname = $row['o_fname'];
				$o_lname = $row['o_lname'];
				$o_position = "President";
				$o_organization = $row['o_organization'];
				$o_college_branch = $row['o_college_branch'];
				$o_campus = $row['o_campus'];
				$start_term = $thisyear;
			$insert = mysql_query("INSERT INTO tblofficer (o_number, o_fname, o_lname, o_position, o_organization, o_college_branch, o_campus, start_term, o_status) VALUES ('$o_number', '$o_fname', '$o_lname', '$o_position', '$o_organization', '$o_college_branch', '$o_campus', '$start_term', 1)")or die (mysql_error());
			}
		}
		
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////		

		if ($vicepresident != 'x'){
			$select = mysql_query("SELECT * FROM tblmember WHERE e_number = '$vicepresident'")or die (mysql_error());
			while ($row=mysql_fetch_array($select)){
				$o_number = $row['e_number'];
				$o_fname = $row['fname'];
				$o_lname = $row['lname'];
				$o_position = "Vice President";
				$o_organization = $row['organization'];
				$o_college_branch = $row['college_branch'];
				$o_campus = $row['campus'];
				$start_term = $thisyear;
				
				$insert = mysql_query("INSERT INTO tblofficer (o_number, o_fname, o_lname, o_position, o_organization, o_college_branch, o_campus, start_term, o_status) VALUES ('$o_number', '$o_fname', '$o_lname', '$o_position', '$o_organization', '$o_college_branch', '$o_campus', '$start_term', 1)")or die (mysql_error());
			}
		}
		else{
				$select = mysql_query("SELECT * FROM tblofficer WHERE end_term = '$thisyear' AND o_position = 'Vice President' AND o_organization = '$adminorg'")or die (mysql_error());
			while ($row=mysql_fetch_array($select)){
				$o_number = $row['o_number'];
				$o_fname = $row['o_fname'];
				$o_lname = $row['o_lname'];
				$o_position = "Vice President";
				$o_organization = $row['o_organization'];
				$o_college_branch = $row['o_college_branch'];
				$o_campus = $row['o_campus'];
				$start_term = $thisyear;
			$insert = mysql_query("INSERT INTO tblofficer (o_number, o_fname, o_lname, o_position, o_organization, o_college_branch, o_campus, start_term, o_status) VALUES ('$o_number', '$o_fname', '$o_lname', '$o_position', '$o_organization', '$o_college_branch', '$o_campus', '$start_term', 1)")or die (mysql_error());
			}
		}
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////		

		if ($secretary != 'x'){
			$select = mysql_query("SELECT * FROM tblmember WHERE e_number = '$secretary'")or die (mysql_error());
			while ($row=mysql_fetch_array($select)){
				$o_number = $row['e_number'];
				$o_fname = $row['fname'];
				$o_lname = $row['lname'];
				$o_position = "Secretary";
				$o_organization = $row['organization'];
				$o_college_branch = $row['college_branch'];
				$o_campus = $row['campus'];
				$start_term = $thisyear;
				
				$insert = mysql_query("INSERT INTO tblofficer (o_number, o_fname, o_lname, o_position, o_organization, o_college_branch, o_campus, start_term, o_status) VALUES ('$o_number', '$o_fname', '$o_lname', '$o_position', '$o_organization', '$o_college_branch', '$o_campus', '$start_term', 1)")or die (mysql_error());
			}
		}
		else{
				$select = mysql_query("SELECT * FROM tblofficer WHERE end_term = '$thisyear' AND o_position = 'Secretary' AND o_organization = '$adminorg'")or die (mysql_error());
			while ($row=mysql_fetch_array($select)){
				$o_number = $row['o_number'];
				$o_fname = $row['o_fname'];
				$o_lname = $row['o_lname'];
				$o_position = "Secretary";
				$o_organization = $row['o_organization'];
				$o_college_branch = $row['o_college_branch'];
				$o_campus = $row['o_campus'];
				$start_term = $thisyear;
			$insert = mysql_query("INSERT INTO tblofficer (o_number, o_fname, o_lname, o_position, o_organization, o_college_branch, o_campus, start_term, o_status) VALUES ('$o_number', '$o_fname', '$o_lname', '$o_position', '$o_organization', '$o_college_branch', '$o_campus', '$start_term', 1)")or die (mysql_error());
			}
		}
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////		

		if ($treasurer != 'x'){
			$select = mysql_query("SELECT * FROM tblmember WHERE e_number = '$treasurer'")or die (mysql_error());
			while ($row=mysql_fetch_array($select)){
				$o_number = $row['e_number'];
				$o_fname = $row['fname'];
				$o_lname = $row['lname'];
				$o_position = "Treasurer";
				$o_organization = $row['organization'];
				$o_college_branch = $row['college_branch'];
				$o_campus = $row['campus'];
				$start_term = $thisyear;
				
				$insert = mysql_query("INSERT INTO tblofficer (o_number, o_fname, o_lname, o_position, o_organization, o_college_branch, o_campus, start_term, o_status) VALUES ('$o_number', '$o_fname', '$o_lname', '$o_position', '$o_organization', '$o_college_branch', '$o_campus', '$start_term', 1)")or die (mysql_error());
			}
		}
		else{
				$select = mysql_query("SELECT * FROM tblofficer WHERE end_term = '$thisyear' AND o_position = 'Treasurer' AND o_organization = '$adminorg'")or die (mysql_error());
			while ($row=mysql_fetch_array($select)){
				$o_number = $row['o_number'];
				$o_fname = $row['o_fname'];
				$o_lname = $row['o_lname'];
				$o_position = "Treasurer";
				$o_organization = $row['o_organization'];
				$o_college_branch = $row['o_college_branch'];
				$o_campus = $row['o_campus'];
				$start_term = $thisyear;
			$insert = mysql_query("INSERT INTO tblofficer (o_number, o_fname, o_lname, o_position, o_organization, o_college_branch, o_campus, start_term, o_status) VALUES ('$o_number', '$o_fname', '$o_lname', '$o_position', '$o_organization', '$o_college_branch', '$o_campus', '$start_term', 1)")or die (mysql_error());
			}
		}
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////		

		if ($auditor != 'x'){
			$select = mysql_query("SELECT * FROM tblmember WHERE e_number = '$auditor'")or die (mysql_error());
			while ($row=mysql_fetch_array($select)){
				$o_number = $row['e_number'];
				$o_fname = $row['fname'];
				$o_lname = $row['lname'];
				$o_position = "Auditor";
				$o_organization = $row['organization'];
				$o_college_branch = $row['college_branch'];
				$o_campus = $row['campus'];
				$start_term = $thisyear;
				
				$insert = mysql_query("INSERT INTO tblofficer (o_number, o_fname, o_lname, o_position, o_organization, o_college_branch, o_campus, start_term, o_status) VALUES ('$o_number', '$o_fname', '$o_lname', '$o_position', '$o_organization', '$o_college_branch', '$o_campus', '$start_term', 1)")or die (mysql_error());
			}
		}
		else{
				$select = mysql_query("SELECT * FROM tblofficer WHERE end_term = '$thisyear' AND o_position = 'Auditor'AND o_organization = '$adminorg'")or die (mysql_error());
			while ($row=mysql_fetch_array($select)){
				$o_number = $row['o_number'];
				$o_fname = $row['o_fname'];
				$o_lname = $row['o_lname'];
				$o_position = "Auditor";
				$o_organization = $row['o_organization'];
				$o_college_branch = $row['o_college_branch'];
				$o_campus = $row['o_campus'];
				$start_term = $thisyear;
			$insert = mysql_query("INSERT INTO tblofficer (o_number, o_fname, o_lname, o_position, o_organization, o_college_branch, o_campus, start_term, o_status) VALUES ('$o_number', '$o_fname', '$o_lname', '$o_position', '$o_organization', '$o_college_branch', '$o_campus', '$start_term', 1)")or die (mysql_error());
			}
		}
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////		

		if ($pro != 'x'){
			$select = mysql_query("SELECT * FROM tblmember WHERE e_number = '$pro'")or die (mysql_error());
			while ($row=mysql_fetch_array($select)){
				$o_number = $row['e_number'];
				$o_fname = $row['fname'];
				$o_lname = $row['lname'];
				$o_position = "PRO";
				$o_organization = $row['organization'];
				$o_college_branch = $row['college_branch'];
				$o_campus = $row['campus'];
				$start_term = $thisyear;
				
				$insert = mysql_query("INSERT INTO tblofficer (o_number, o_fname, o_lname, o_position, o_organization, o_college_branch, o_campus, start_term, o_status) VALUES ('$o_number', '$o_fname', '$o_lname', '$o_position', '$o_organization', '$o_college_branch', '$o_campus', '$start_term', 1)")or die (mysql_error());
			}
		}
		else{
				$select = mysql_query("SELECT * FROM tblofficer WHERE end_term = '$thisyear' AND o_position = 'PRO'AND o_organization = '$adminorg'")or die (mysql_error());
			while ($row=mysql_fetch_array($select)){
				$o_number = $row['o_number'];
				$o_fname = $row['o_fname'];
				$o_lname = $row['o_lname'];
				$o_position = "PRO";
				$o_organization = $row['o_organization'];
				$o_college_branch = $row['o_college_branch'];
				$o_campus = $row['o_campus'];
				$start_term = $thisyear;
			$insert = mysql_query("INSERT INTO tblofficer (o_number, o_fname, o_lname, o_position, o_organization, o_college_branch, o_campus, start_term, o_status) VALUES ('$o_number', '$o_fname', '$o_lname', '$o_position', '$o_organization', '$o_college_branch', '$o_campus', '$start_term', 1)")or die (mysql_error());
			}
		}
		
		echo "<script>alert('Successfully Appointed the Officers!'); window.location.assign('officerlist.php');</script>";
	}
	else{
		echo "<script>alert('Please choose officer.'); window.location.assign('result.php');</script>";
	}
}
else{
	echo "<script>
			alert('This is an invalid process!');
			window.location.assign('../$adminorg.php');
		</script>";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

</body>
</html>