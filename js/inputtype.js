
	function populate(s1,s2){
		var s1 = document.getElementById(s1);
		var s2 = document.getElementById(s2);
		s2.innerHTML="";
		if (s1.value == "MAIN"){
			var optionArray = ["|","CAFENR|CAFENR","CAS|CAS","CCJ|CCJ","CED|CED","CEIT|CEIT","CEMDS|CEMDS","CON|CON","CSPEAR|CSPEAR","CVMBS|CVMBS","OLC|OLC","ADMIN|ADMIN"];
		}
		else if (s1.value == "SATELLITE"){
			var optionArray = ["|","BACOOR|BACOOR","CARMONA|CARMONA","CAVITE CITY|CAVITE CITY","GENERAL TRIAS|GENERAL TRIAS","IMUS|IMUS","MARAGONDON|MARAGONDON","NAIC|NAIC","ROSARIO|ROSARIO","SILANG|SILANG","TANZA|TANZA","TRECE|TRECE"];
		}
		else if (s1.value == ""){
			var optionArray = ["|"];
		}
		for (var option in optionArray){
			var pair = optionArray[option].split("|");
			var newOption = document.createElement("option");
			newOption.value = pair[0];
			newOption.innerHTML = pair[1];
			s2.options.add(newOption);
		}
		
	}


function numeric(employee_number){
	var textfield = document.getElementById(employee_number);
	var regex = /[^0-9]/;
	textfield.value = textfield.value.replace(regex,"");
}

function alphanumeric(username,password,regpassword,currentpassword,newpassword,confirmpassword){
	var textfield = document.getElementById(username,password,regpassword,currentpassword,newpassword,confirmpassword);
	var regex = /\W/gi;
	textfield.value = textfield.value.replace(regex,"");
}

function alpha(fname, lname){
	var textfield = document.getElementById(fname, lname);
	var regex = /[^a-z " "]/gi;
	textfield.value = textfield.value.replace(regex,"");
}

