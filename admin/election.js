// <!---------------------------- add candidate ----------------------------------------->


function verify_can(can)
{

	$("#addcan-notice").html("<p class = 'text-warning' style = 'width:100%; margin-left:-4%;text-align:center;'>Loading...</p>");

	$.ajax({
		url: "ajaxAddcan.php",
		type: "POST",
		data: $(can).serializeArray(),
		success: function(info){
			
			if (info == 1)
			{
				$("#addcan-notice").html("<p class = 'text-primary' style = 'width:100%; margin-left:-5%; text-align:center;'><strong>Candidate is Successfully Added.</strong></p>");
					$("#frm-can")[0].reset();
				$("#frm-addcan")[0].reset();
				window.location.href = "candidatelist.php";
			}
			else if (info == 2)
			{
				$("#addcan-notice").html("<p class = 'text-danger' style = 'width:100%; margin-left:-4%; text-align:center;'><strong>Candidate already exist!</strong></p>");
			} 
		}
	
	
	
	}).fail(function(){
		
		$("#addcan-notice").html("<p class = 'text-danger'>Error.</p>");
	
	});
	

}

$(document).ready(function(){
	
	$("#modal-addcan").on("show.bs.modal", function(e){
	
		$("#addcan-notice").html("<p>&nbsp;</p>");
			$("#frm-can")[0].reset();
		
		
	});
	

	
	$("#frm-can").submit(function(e){
		
		e.preventDefault();
		verify_can(this); 
	});
	
	
	});

// <!---------------------------- generate employee info ----------------------------------------->


function verify_addcan(addcan)
{
	

	$("#addcan-notice").html("<p class = 'text-warning' style = 'width:100%; margin-left:-4%;text-align:center;'>Loading...</p>");

	$.ajax({
		url: "ajaxGenerate.php",
		type: "POST",
		data: $(addcan).serializeArray(),
		success: function(info){
			
			if (info == 2)
			{
				$("#addcan-notice").html("<p class = 'text-danger' style = 'width:100%; margin-left:-6%; text-align:center;'>Information not found.</p>");
				
			}
			else
			{
				document.getElementById("canOut").innerHTML = info;
				$("#addcan-notice").html("<p>&nbsp;</p>");
			}
		}
	
	
	
	}).fail(function(){
		
		$("#addcan-notice").html("<p class = 'text-danger'>Error.</p>");
	
	});

}

$(document).ready(function(){
	
	$("#modal-addcan").on("show.bs.modal", function(e){
	
		$("#addcan-notice").html("<p>&nbsp;</p>");
		$("#frm-addcan")[0].reset();
			
		
	});
	

	
		
	
	$("#frm-addcan").submit(function(e){
		
		e.preventDefault();
		verify_addcan(this); 

	});

});


// <!---------------------------- activate election ----------------------------------------->


function verify_activate(activate)
{
	

	$("#activate-notice").html("<p class = 'text-warning' style = 'width:100%; margin-left:-4%;text-align:center;'>Loading...</p>");

	$.ajax({
		url: "ajaxActivate.php",
		type: "POST",
		data: $(activate).serializeArray(),
		success: function(info){
			
			if (info == 2)
			{
				$("#activate-notice").html("<p class = 'text-danger' style = 'width:100%; margin-left:-6%; text-align:center;'>Incorrect Username or Password!</p>");
				
			}
			else if (info == 3)
			{
				$("#activate-notice").html("<p class = 'text-danger' style = 'width:100%; margin-left:-8%; text-align:center;'>Please check your time!</p>");
			}
			else if (info == 1){
				
				
				window.location.href = ('rentnamespace.php');
							


			}
		}
	
	
	
	}).fail(function(){
		
		$("#activate-notice").html("<p class = 'text-danger'>Error.</p>");
	
	});

}

$(document).ready(function(){
	
	
	$("#modal-activate").on("show.bs.modal", function(e){
	
		$("#activate-notice").html("<p>&nbsp;</p>");
		$("#frm-activate")[0].reset();
	
	
	});
	
	
	
	$("#frm-activate").submit(function(e){
		
		e.preventDefault();
		verify_activate(this); 
	});


});


// <!---------------------------- deactivate election ----------------------------------------->


function verify_deactivate(deactivate)
{
	

	$("#deactivate-notice").html("<p class = 'text-warning' style = 'width:100%; margin-left:-4%;text-align:center;'>Loading...</p>");

	$.ajax({
		url: "ajaxDeactivate.php",
		type: "POST",
		data: $(deactivate).serializeArray(),
		success: function(info){
			
			if (info == 2)
			{
				$("#deactivate-notice").html("<p class = 'text-danger' style = 'width:100%; margin-left:-6%; text-align:center;'>Incorrect Username or Password!</p>");
				
			}
			 
			else if (info == 1){
				alert('Election is finished.');
				window.location.href = ('candidatelist.php');
			}
		}
	
	
	
	}).fail(function(){
		
		$("#deactivate-notice").html("<p class = 'text-danger'>Error.</p>");
	
	});

}

$(document).ready(function(){
	
	
	$("#modal-deactivate").on("show.bs.modal", function(e){
	
		$("#deactivate-notice").html("<p>&nbsp;</p>");
		$("#frm-deactivate")[0].reset();
	
	
	});
	
	
	
	$("#frm-deactivate").submit(function(e){
		
		e.preventDefault();
		verify_deactivate(this); 
	});


});


	