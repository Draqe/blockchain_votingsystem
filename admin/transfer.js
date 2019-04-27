function transferxem(address,private_key,public_key,status){
	
	//BLOCKCHAIN CODE


	// Load nem-browser library
	var nem = require("nem-sdk").default;

	// Create an NIS endpoint object
	var endpoint = nem.model.objects.create("endpoint")(nem.model.nodes.defaultTestnet, nem.model.nodes.defaultPort);

	// Get an empty un-prepared transfer transaction object
	var transferTransaction = nem.model.objects.get("transferTransaction");

	// Get an empty common object to hold pass and key
	var common = nem.model.objects.get("common");

	// Set default amount in view. It is text input so we can handle dot and comma as decimal mark easily (need cleaning but provided by the library)

	if(status=='activate'){
		var amount = "150";
		var adminprivate_key = "8c9c3b848bc51671fa83fa68b79b8ff03790fe5aa026b72f67d83709ef9c7ee8";
		var recipient = address;
	}
	else{
		var amount = "149";
		var adminprivate_key = private_key;
		var recipient = "TADYFN6LK6HZS7WA3WZRY7RRLFSZQ7RFLXGSFGZ6";
	}
	var message = "";


	console.log(adminprivate_key);
	console.log(amount);
	console.log(recipient);

	/**
	 * Function to update our fee in the view
	 */

	// Check for amount errors
	if(undefined === amount || !nem.utils.helpers.isTextAmountValid(amount)) return alert('Invalid amount !');

	// Set the cleaned amount into transfer transaction object
	transferTransaction.amount = nem.utils.helpers.cleanTextAmount(amount);

	// Set the message into transfer transaction object
	transferTransaction.message = message;

	// Prepare the updated transfer transaction object
	var transactionEntity = nem.model.transactions.prepare("transferTransaction")(common, transferTransaction, nem.model.network.data.testnet.id);

	// Format fee returned in prepared object
	var feeString = nem.utils.format.nemValue(transactionEntity.fee)[0] + "." + nem.utils.format.nemValue(transactionEntity.fee)[1];

	/**
	 * Build transaction from form data and send
	 */

	// Check form for errors
	if(!adminprivate_key || !recipient) return alert('Missing parameter !');
	if(undefined === amount || !nem.utils.helpers.isTextAmountValid(amount)) return alert('Invalid amount !');
	if (!nem.model.address.isValid(nem.model.address.clean(recipient))) return alert('Invalid recipent address !');

	// Set the private key in common object
	common.privateKey = adminprivate_key;

	// Check private key for errors
	if (common.privateKey.length !== 64 && common.privateKey.length !== 66) return alert('Invalid private key, length must be 64 or 66 characters !');
	if (!nem.utils.helpers.isHexadecimal(common.privateKey)) return alert('Private key must be hexadecimal only !');

	// Set the cleaned amount into transfer transaction object
	transferTransaction.amount = nem.utils.helpers.cleanTextAmount(amount);

	// Recipient address must be clean (no hypens: "-")
	transferTransaction.recipient = nem.model.address.clean(recipient);

	// Set message
	transferTransaction.message = message;

	// Prepare the updated transfer transaction object
	var transactionEntity = nem.model.transactions.prepare("transferTransaction")(common, transferTransaction, nem.model.network.data.testnet.id);

	// Serialize transfer transaction and announce
	nem.com.requests.chain.time(endpoint).then(function (timeStamp) {
		const ts = Math.floor(timeStamp.receiveTimeStamp / 1000);
		transactionEntity.timeStamp = ts;
		const due = 60;
		transactionEntity.deadline = ts + due * 60;
	   
		nem.model.transactions.send(common, transactionEntity, endpoint).then(function(res){
			// If code >= 2, it's an error
			if (res.code >= 2) {
				alert(res.message);
			} else {
				window.location.href = "accountlist.php";
				if(status=='activate'){
					alert("Account Activated!");

				}
				else{
					alert("Account Deactivated!");
				}

			}
		}, function(err) {
			alert(err);
		});
	   
	}, function (err) {
		console.error(err);
	});

}






				
			
