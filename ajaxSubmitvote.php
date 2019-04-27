<?php
include "session_user.php";

if ($sign == "admin"){
	echo "<script>
			alert('This page is not available!');
			window.location.assign('".$adminorg.".php');
		</script>";
}
else{
	if (isset($_POST['prestovote'])){
		$prestovote = $_POST['prestovote'];
		$viceprestovote = $_POST['viceprestovote'];
		$sectovote = $_POST['sectovote'];
		$tretovote = $_POST['tretovote'];
		$audtovote = $_POST['audtovote'];
		$protovote = $_POST['protovote'];
		
		
		if (strtolower($prestovote) == strtolower("No vote")){
			$vote_p = 0;
			
		}
		else{
			$arraypres = explode(' ',$prestovote);
			$presfname=$arraypres[0];
			$preslname=$arraypres[1];
			$pres = mysql_query("SELECT * FROM tblcandidate WHERE c_fname = '$presfname' AND c_lname = '$preslname' AND c_year = '$thisyear' AND candidate_status = 0 AND c_position = 'President'") or die(mysql_error());
			while ($row = mysql_fetch_array($pres)){
				$vote_p = $row['c_number'];
				$c_year = $row['c_year'];
				
				
			}
			
		}
		
		if (strtolower($viceprestovote) == strtolower("No vote")){
			$vote_vp = 0;
		}
		else{
			$arrayvicepres = explode(' ',$viceprestovote);
			$vicepresfname=$arrayvicepres[0];
			$vicepreslname=$arrayvicepres[1];
			$vicepres = mysql_query("SELECT * FROM tblcandidate WHERE c_fname = '$vicepresfname' AND c_lname = '$vicepreslname' AND c_year = '$thisyear' AND candidate_status = 0 AND c_position = 'Vice President'") or die(mysql_error());
			while ($row = mysql_fetch_array($vicepres)){
				$vote_vp = $row['c_number'];
				$c_year = $row['c_year'];
				
				
			}
			
		}
		
		if (strtolower($sectovote) == strtolower("No vote")){
			$vote_s = 0;
		}
		else{
			$arraysec = explode(' ',$sectovote);
			$secfname=$arraysec[0];
			$seclname=$arraysec[1];
			$sec = mysql_query("SELECT * FROM tblcandidate WHERE c_fname = '$secfname' AND c_lname = '$seclname' AND c_year = '$thisyear' AND candidate_status = 0 AND c_position = 'Secretary'") or die(mysql_error());
			while ($row = mysql_fetch_array($sec)){
				$vote_s = $row['c_number'];
				$c_year = $row['c_year'];
				
				
			}
			
		}
		
		if (strtolower($tretovote) == strtolower("No vote")){
			$vote_t = 0;
		}
		else{
			$arraytre = explode(' ',$tretovote);
			$trefname=$arraytre[0];
			$trelname=$arraytre[1];
			$tre = mysql_query("SELECT * FROM tblcandidate WHERE c_fname = '$trefname' AND c_lname = '$trelname' AND c_year = '$thisyear' AND candidate_status = 0 AND c_position = 'Treasurer'") or die(mysql_error());
			while ($row = mysql_fetch_array($tre)){
				$vote_t = $row['c_number'];
				$c_year = $row['c_year'];
				
				
			}
			
		}
		
		if (strtolower($audtovote) == strtolower("No vote")){
			$vote_a = 0;
		}
		else{
			$arrayaud = explode(' ',$audtovote);
			$audfname=$arrayaud[0];
			$audlname=$arrayaud[1];
			$aud = mysql_query("SELECT * FROM tblcandidate WHERE c_fname = '$audfname' AND c_lname = '$audlname' AND c_year = '$thisyear' AND candidate_status = 0 AND c_position = 'Auditor'") or die(mysql_error());
			while ($row = mysql_fetch_array($aud)){
				$vote_a = $row['c_number'];
				$c_year = $row['c_year'];
				
				
			}
			
		}
		
		if (strtolower($protovote) == strtolower("No vote")){
			$vote_pr = 0;
		}
		else{
			$arraypro = explode(' ',$protovote);
			$profname=$arraypro[0];
			$prolname=$arraypro[1];
			$pro = mysql_query("SELECT * FROM tblcandidate WHERE c_fname = '$profname' AND c_lname = '$prolname' AND c_year = '$thisyear' AND candidate_status = 0 AND c_position = 'PRO'") or die(mysql_error());
			while ($row = mysql_fetch_array($pro)){
				$vote_pr = $row['c_number'];
				$c_year = $row['c_year'];
			
						
			}
				
		}
		
		
		$result=mysql_query("SELECT * FROM tblvote WHERE m_number='$loge_number' AND v_year='$thisyear'");
		if(mysql_num_rows($result)==0)
		{
				$update_memberstatus = mysql_query ("UPDATE tblmember SET member_status = '0', passElec = 1 WHERE e_number = '$loge_number'  ") or die(mysql_error());	
				
				$presvote = mysql_query ("INSERT INTO tblvote (m_number , vote_p, v_organization, v_year)
								VALUES ('$loge_number', '$vote_p', '$org', '$thisyear' )")
								or die (mysql_error());
								
				$vicepresvote = mysql_query ("UPDATE tblvote SET vote_vp = '$vote_vp' WHERE m_number = '$loge_number' AND v_year = '$thisyear'")
									or die (mysql_error());
									
				$secvote = mysql_query ("UPDATE tblvote SET vote_s = '$vote_s' WHERE m_number = '$loge_number' AND v_year = '$thisyear'")
									or die (mysql_error());
									
				$trevote = mysql_query ("UPDATE tblvote SET vote_t = '$vote_t' WHERE m_number = '$loge_number' AND v_year = '$thisyear'")
									or die (mysql_error());
									
				$audvote = mysql_query ("UPDATE tblvote SET vote_a = '$vote_a' WHERE m_number = '$loge_number' AND v_year = '$thisyear'")
									or die (mysql_error());
									
				$provote = mysql_query ("UPDATE tblvote SET vote_pr = '$vote_pr' WHERE m_number = '$loge_number' AND v_year = '$thisyear'")
									or die (mysql_error());		
		
				echo 1;
		}
		else
		{
		
		echo 3;
		
		}
				
	}
	else{
		echo "<script>
			alert('This page is not available!');
			window.location.assign('".$org.".php');
		</script>";
	}
}
?>
		