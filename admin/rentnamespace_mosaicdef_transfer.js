function namespace_mosaic_transfer(address,private_key,public_key,supply){

	// RENT NAMESPACE
	console.log(address);
	console.log(private_key);
	console.log(public_key);
	console.log(supply);
	// Load nem-browser library
	var nem = require("nem-sdk").default;

	// Create an NIS endpoint object
	var endpoint = nem.model.objects.create("endpoint")(nem.model.nodes.defaultTestnet, nem.model.nodes.defaultPort);

	// Get an empty un-prepared transfer transaction object
	var tx = nem.model.objects.get("namespaceProvisionTransaction");

	// Get an empty common object to hold pass and key
	var common = nem.model.objects.get("common");

	/**
	 * Function to update our fee in the view
	 */
	var random =Math.floor((Math.random() * 10000) + 1);
	var namespacename = "fa".concat(random,"name");
	console.log(namespacename);
	// New namespace
	tx.namespaceName = namespacename;

	// Prepare the updated transfer transaction object
	var transactionEntity = nem.model.transactions.prepare("namespaceProvisionTransaction")(common, tx, nem.model.network.data.testnet.id);

	// Update parent name
	transactionEntity.parent = null;
	console.log(transactionEntity);

	// Format fee returned in prepared object
	var rentalFeeString = nem.utils.format.nemValue(transactionEntity.rentalFee)[0] + "." + nem.utils.format.nemValue(transactionEntity.rentalFee)[1];

	console.log(rentalFeeString);

	// Format fee returned in prepared object
	var transactFeeString = nem.utils.format.nemValue(transactionEntity.fee)[0] + "." + nem.utils.format.nemValue(transactionEntity.fee)[1];

	console.log(transactFeeString);

	/**
	 * Build transaction from form data and send
	 */
	// function rent() {
	// Check form for errors
	if(!private_key) return alert('Missing parameter !');

	// Set the private key in common object
	common.privateKey = private_key;

	// Check private key for errors
	if (common.privateKey.length !== 64 && common.privateKey.length !== 66) return alert('Invalid private key, length must be 64 or 66 characters !');
	if (!nem.utils.helpers.isHexadecimal(common.privateKey)) return alert('Private key must be hexadecimal only !');

	// New namespace
	tx.namespaceName = namespacename;

	var transactionEntity = nem.model.transactions.prepare("namespaceProvisionTransaction")(common, tx, nem.model.network.data.testnet.id);

    // Update parent
	transactionEntity.parent = null;

	nem.com.requests.chain.time(endpoint).then(function (timeStamp) {
	    const ts = Math.floor(timeStamp.receiveTimeStamp / 1000);
	    transactionEntity.timeStamp = ts;
	    const due = 60;
	    transactionEntity.deadline = ts + due * 60;

	    // Serialize transfer transaction and announce
	    nem.model.transactions.send(common, transactionEntity, endpoint).then(function(res){
			// If code >= 2, it's an error
			if (res.code >= 2) {
				alert(res.message);
			} else {
				alert("Rented Namespace!");
			}
		}, function(err) {
			alert(err);
		});
	   
	}, function (err) {
		console.error(err);
	});
	setTimeout(function(){ alert("mosaic ready"); }, 120000);

	// MOSAIC DEFINITION
	// Include the library
	var nem2 = require("nem-sdk").default;

	// Create an NIS endpoint object
	var endpoint2 = nem2.model.objects.create("endpoint")(nem2.model.nodes.defaultTestnet, nem2.model.nodes.defaultPort);

	// Create a common object holding key 
	var common2 = nem2.model.objects.create("common")("");

	if(!private_key) return alert('Missing parameter !');

	// Set the private key in common object
	common2.privateKey = private_key;

	// Check private key for errors
	if (common2.privateKey.length !== 64 && common2.privateKey.length !== 66) return alert('Invalid private key, length must be 64 or 66 characters !');
	if (!nem2.utils.helpers.isHexadecimal(common2.privateKey)) return alert('Private key must be hexadecimal only !');
	
	// Get a MosaicDefinitionCreationTransaction object
	var tx2 = nem2.model.objects.get("mosaicDefinitionTransaction");
	var mrandom =Math.floor((Math.random() * 10000) + 1);
	var mosaicname = "fa".concat(mrandom,"vote");
	// Define the mosaic
	tx2.mosaicName = mosaicname;
	tx2.namespaceParent = {
		"fqn": namespacename
	};
	console.log(tx2.mosaicName);
	tx2.mosaicDescription = "vote";

	// Set properties (see https://nemproject.github.io/#mosaicProperties)
	tx2.properties.initialSupply = supply;
	tx2.properties.divisibility = "6";
	tx2.properties.transferable = "true";
	tx2.properties.supplyMutable = "true";

	// Prepare the transaction object
	var transactionEntity2 = nem2.model.transactions.prepare("mosaicDefinitionTransaction")(common2, tx2, nem2.model.network.data.testnet.id);

	// Serialize transfer transaction and announce
	nem2.com.requests.chain.time(endpoint2).then(function (timeStamp) {
	    const ts = Math.floor(timeStamp.receiveTimeStamp / 1000);
	    transactionEntity2.timeStamp = ts;
	    const due = 60;
	    transactionEntity2.deadline = ts + due * 60;
	   
	    nem2.model.transactions.send(common2, transactionEntity2, endpoint2).then(function(res){
			// If code >= 2, it's an error
			if (res.code >= 2) {
				alert(res.message);
			} else {
				alert("Created Mosaic!");
			}
		}, function(err) {
			alert(err);
		});
	   
	}, function (err) {
		console.error(err);
	});



	window.location.href = "insert_mosaic_namespace.php?namespace=" + namespacename + "&mosaicname=" + mosaicname;

}