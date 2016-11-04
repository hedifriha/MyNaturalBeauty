/**
 * Click sur les liens vers les sites marchands pour avoir des stats
 * dans Google Analytics
 */
jQuery(document).on("click", ".merchLink", function(){
	
	// Google tracker doit être initialisé
	if(googleTrackerAccount && _gat && typeof(_gaq) !== "undefined"){
		
		
		var linkElement = jQuery(this);
		
		// Récupération des data
		var productMd5 = linkElement.data("productmd5");
		var productTitle = linkElement.data("producttitle");
		var productCategory = linkElement.data("category");
		var productShop = linkElement.data("shop");
		var productBrand = linkElement.data("brand");
		var linkLocation = linkElement.data("linklocation");
		
		// Test des valeurs
		if(productMd5 !== '' && productTitle !== '' && productCategory !== '' && productShop !== '' && productBrand !== ''){
			
			var transactionId = productMd5 + new Date().getTime();
			
			var pageTracker = _gat._getTracker(googleTrackerAccount);
			pageTracker._trackPageview();
			pageTracker._addTrans(
				transactionId, // transaction ID - required
				productShop, // affiliation or store name
				"0", // total - required
				"0", // tax
				"0", // shipping
				"Paris", // city
				"Ile De France", // state or province
				"FRANCE" // country
			);
				
			// add item might be called for every item in the shopping cart
			// where your ecommerce engine loops through each item in the cart and
			// prints out _addItem for each 
			pageTracker._addItem(
				transactionId, // transaction ID - necessary to associate item with transaction
				productMd5, // SKU/code - required
				productTitle + ' - ' + productBrand, // product name
				productCategory, // category or variation
				"0", // unit price - required
				"1" // quantity - required
			);
				
			pageTracker._trackTrans(); //submits transaction to the Analytics servers
		}
		
		var contextualisationMode = "automatic";
		if(jQuery(this).data("linktype") === "contextualisation"){
			var contextualisationMode = linkElement.data("contextmode");
		}

		// Position du lien du produit
		if(typeof(linkLocation) !== "undefined"){
			_gaq.push(['_trackEvent', 'Click sur produit shopreflex', linkLocation, contextualisationMode]);
			 console.log('Click sur produit shopreflex', linkLocation, contextualisationMode);
		}
		
		
	} else {
		// console.log('Contrôles 1 PAS OK !', jQuery(this));
	}
});

/**
 * Tracking liens xiti
 */
jQuery(document).on("click", ".xtTrackLink", function(){
	if(xtsd && xtsite && xtn2){
		var xtor = jQuery(this).data("xtor");
		xtor = xtor.replace("xtor=", "");
		if(xtor !== ""){
			// Envoi vers Xiti
			xt_imgpub = new Image();
			xtdmedpub = new Date();
			xt_imgpub.src = xtsd + '.xiti.com/hit.xitif?s=' + xtsite + '&s2=' + xtn2 + '&xto=' + xtor + '&hl=' + xtdmedpub.getHours() + 'x' + xtdmedpub.getMinutes() + 'x' + xtdmedpub.getSeconds();
		}
	}
});

