<?php
include "mysqlconnect.php";
if ($_SERVER['PHP_SELF'] == "/blockchain_votingsystem/FA.php"){
	$organization = "FA";
	$orgdeactivate = "fa/deactivate.php?organization=FA";
}


$select=mysql_query("SELECT * FROM election WHERE organization = '$organization'");
while ($row = mysql_fetch_array($select)){
	$setTime = $row['setTime'];
	$setDate = $row['setDate'];
	$org_status = $row['org_status'];
	
	
	if ($org_status == 1){
		$timer = "<script type='text/javascript'>

					function timer(){
	
						var value = document.getElementById('setTimer').value;
						var voteEnd = new Date(value);
						var now = new Date();
						var timeDiff = voteEnd.getTime() - now.getTime();
						if (timeDiff <=0){
							clearTimeout (timer);
				        	alert('Election ends now!');
							window.location.assign('result.php');

		
						}
						if (timeDiff > 0){
							var seconds = Math.floor(timeDiff/1000);
							var minutes = Math.floor(seconds/60);
							var hours = Math.floor(minutes/60);
							var days = Math.floor(hours/24);
	
							hours %= 24;
							minutes %= 60;
							seconds %= 60;
	
							document.getElementById('hoursBox').innerHTML = hours;
							document.getElementById('minsBox').innerHTML = minutes;
							document.getElementById('secsBox').innerHTML = seconds;
	
		
	
							var timer = setTimeout ('timer()',1000);
						}
					}

				</script>";
	}
	
	else{
	}
	

}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<link rel="stylesheet" href="style.css" tyep="text/css" media="screen"/>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php echo $timer; ?>
</body>
<input type="datetime" hidden="" id="setTimer" value ="<?php echo $setDate," " ,$setTime;?>" />
<input type="hidden" id="organization" value = "<?php echo $orgdeactivate; ?>" />

<div id="thisTimer" align="right">
<br />
<table cellspacing="0">
<tr>

<td id="hoursBox" class="time" style="color:#F00"></td>
<td class="time">hr/s : </td>
<td id="minsBox" class="time" style="color:#F00"></td>
<td class="time">mins : </td>
<td id="secsBox" class="time" style="color:#F00"></td>
<td valign="bottom" class="time">secs&nbsp;left before the voting process will end.</td>
</tr>
</table>
</div>
<script type="text/javascript">timer();</script>
</html>