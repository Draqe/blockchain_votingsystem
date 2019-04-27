function mosaic(address,private_key,public_key,supply){
	
	console.log(address);
	console.log(private_key);
	console.log(public_key);
	console.log(supply);

	// Include the library
	var nem = require("nem-sdk").default;

	// Create an NIS endpoint object
	var endpoint = nem.model.objects.create("endpoint")(nem.model.nodes.defaultTestnet, nem.model.nodes.defaultPort);

	// Create a common object holding key 
	var common = nem.model.objects.create("common")("");

	// function create() {
		if(!private_key) return alert('Missing parameter !');

		// Set the private key in common object
		common.privateKey = private_key;

		// Check private key for errors
		if (common.privateKey.length !== 64 && common.privateKey.length !== 66) return alert('Invalid private key, length must be 64 or 66 characters !');
    	if (!nem.utils.helpers.isHexadecimal(common.privateKey)) return alert('Private key must be hexadecimal only !');
		
		// Get a MosaicDefinitionCreationTransaction object
		var tx = nem.model.objects.get("mosaicDefinitionTransaction");
		var random =Math.floor((Math.random() * 10000) + 1);
		var mosaicname = "fa".concat(random,"vote");
		// Define the mosaic
		tx.mosaicName = mosaicname;
		tx.namespaceParent = {
			"fqn": $("#namespace").val()
		};
		tx.mosaicDescription = $("#mosaicdescription").val();

		// Set properties (see https://nemproject.github.io/#mosaicProperties)
		tx.properties.initialSupply = $("#initialsupply").val();
		tx.properties.divisibility = $("#divisibility").val();
		tx.properties.transferable = $("#transferable").is(":checked");
		tx.properties.supplyMutable = $("#supplymutable").is(":checked");

		// Prepare the transaction object
		var transactionEntity = nem.model.transactions.prepare("mosaicDefinitionTransaction")(common, tx, nem.model.network.data.testnet.id);

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
					alert(res.message);
				}
			}, function(err) {
				alert(err);
			});
		   
		}, function (err) {
			console.error(err);
		});
	// }

	alert('Election is now activated.');


	window.location.href = ('candidatelist.php');
}