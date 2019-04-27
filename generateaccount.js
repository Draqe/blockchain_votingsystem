
function verify_user(form){

	$("#reg-notice").html("<p class = 'text-warning'>Loading...</p>");
		
	//BLOCKCHAIN CODE

	var nem = require("nem-sdk").default;
	var rBytes = nem.crypto.nacl.randomBytes(32);
	var rHex = nem.utils.convert.ua2hex(rBytes);
	var keyPair = nem.crypto.keyPair.create(rHex);
	var address = nem.model.address.toAddress(keyPair.publicKey.toString(),  nem.model.network.data.testnet.id);
	var public = keyPair.publicKey.toString();
		
	console.log(rHex);
	console.log(public);
	console.log(address);
	$('#private_key').val(rHex);
	$('#public_key').val(public);
	$('#address').val(address);

	$.ajax({
		url: "ajaxReg.php",
		type: "POST",
		data: $(form).serializeArray(),
		success: function(info){
			
			if (info == 1)
			{
				$("#reg-notice").html("<p class = 'text-primary'>Registration Successful! Please wait for Account Validation. </p>");
				$("#frm-reg")[0].reset();
			}
	
			else if (info == 2)
			{
				$("#reg-notice").html("<p class = 'text-danger'>Employee already have an account!</p>");
				
			}
			else if (info == 3)
			{
				$("#reg-notice").html("<p class = 'text-danger'>Password must be atleast 6 characters!</p>");
			}
			
		
		}
	
	
	
	}).fail(function(){
		
		$("#reg-notice").html("<p class = 'text-danger'>Error.</p>");
	
	});

}

$(document).ready(function(){
	
	
	$("#modal-reg").on("show.bs.modal", function(e){
	
		$("#reg-notice").html("<p>&nbsp;</p>");
		$("#frm-reg")[0].reset();
	


	});
	
	
	
	$("#frm-reg").submit(function(e){
		
		e.preventDefault();
		verify_user(this); 
		

	});



    

});
				
			
