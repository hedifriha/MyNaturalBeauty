document.domain=document.location.hostname.replace(/.*?\.(.*?\..*)$/, '$1');







sas_tmstp=Math.round(Math.random()*10000000000);sas_masterflag=1;

function SmartAdServer(sas_pageid,sas_formatid,sas_target) {
	if (sas_masterflag==1) {sas_masterflag=0;sas_master='M';} 
	else {sas_master='S';}
	
	if(newsletter = document.location.href.match(/(?:\?|&)xtor=([^&]+)/)){
		sas_target += ";newsletter=" + newsletter[1];
	}
	
	document.write('<SCR'+'IPT firstCall="true" SRC="http://ww50.smartadserver.com/call/pubj/' + sas_pageid + '/' + sas_formatid + '/'+sas_master + '/' + sas_tmstp + '/' + escape(sas_target) + '?" ></SCR'+'IPT>');
}


function refreshGoogleAnalytics () {
	if(document.getElementById('google_tracker_call')) {
		var script=document.getElementById('google_tracker_call').innerHTML
		eval(script);
		if ((typeof(_gat) != "undefined") && (typeof(_gaq) != "undefined"))
		{
			var pageView;
			for (i = _gaq.length; i-- && !pageView;)
			{
				if (_gaq[i][0] == "_trackPageview") {
					pageView = _gaq[i][1];
				}
			}
			_gat._getTrackerByName()._trackPageview(pageView);
		}
	}
}

function refreshXITI() {
	if(document.getElementById('XITI_statistique_script')) {
		var scriptNode=document.getElementById('XITI_statistique_script');
	
		var image=document.createElement('img');
		image.setAttribute('src', scriptNode.getAttribute('pixelsrc')+'?nocache='+Math.random());
		
		document.getElementsByTagName('body')[0].appendChild(image);
	}
	
	if(document.getElementById('XITI_statistique_image')) {
		var imageNode=document.getElementById('XITI_statistique_image');
		imageNode.setAttribute('src', imageNode.getAttribute('src')+'?refresh='+Math.random());

	}
}




window.dynamicBlockQuery='';

var refreshTimeLimit = null;
jQuery(document).ready(function() { refreshTimeLimit = (new Date()).getTime() + 3000; });
function refreshDynamicBlocks(options)
{
	if ((refreshTimeLimit !== null) && (refreshTimeLimit < (new Date()).getTime()))
	{
		if (typeof(options) != "object") {
			options = {};
		}
		
		if (!options.disableAnalytics) {
			refreshGoogleAnalytics();
		}
		if (!options.disableXiti) {
			refreshXITI();
		}
		if (!options.disableAds) {
			refreshDynamicAds(options);
		}
		refreshTimeLimit = (new Date()).getTime() + 3000;
	}
}

function refreshDynamicAds(options)
{
	if (typeof(options) != "object") {
		options = {};
	}
	var jsonString='';
	var jsonObject = [];
	var index=0;
	var selector = "div.dynamicContent";
	if (options.containerSelector) {
		selector = options.containerSelector + " " + selector;
	}
	jQuery(selector).each(function() {
		var id = this.getAttribute("id");
		if (!id)
		{
			while (document.getElementById("dyB_" + index)) {
				++index;
			}
			id = 'dyB_'+index;
			this.setAttribute('id', id);
		}
		var type = this.getAttribute('type');
		jsonString+=type+':'+this.getAttribute('data')+':'+id+'@';
		jsonObject.push({
			"type": type,
			"id": id
		});
		index++;
	});
	jsonString=jsonString.substring(0, jsonString.length-1);
			
	window.dynamicBlockQuery=jsonObject;
	
	
	var iframe=document.getElementById('dynamicContentManager');
	
	if(!iframe || !jsonString) {
		return false;
	}

	try
	{
		if (iframe.src == iframe.src.replace(/^(.*)\?q=.*$/, "$1") + "?q=" + jsonString) {
			iframe.contentWindow.location.reload();
		}
		else {
			iframe.src = iframe.src.replace(/^(.*)\?q=.*$/, "$1") + '?q=' + jsonString;
		}
	}
	catch (Exception)
	{
		iframe.src = iframe.src.replace(/^(.*)\?q=.*$/, "$1") + '?q=' + jsonString;
	}
}
		
		
		
function handleDynamicContent(iframe) {
	try {
		if(!window.dynamicBlockQuery) {
			return;
		}
		/*if (!iframe.contentWindow.dynamicBlocks) {
			return ;
		}*/
		
		var blockList = window.dynamicBlockQuery;
			
		for(var i=0; i<blockList.length; i++) {
			if(iframe.contentWindow) {
				if(iframe.contentWindow.document.getElementById(blockList[i].id)) {
					var buffer=iframe.contentWindow.document.getElementById(blockList[i].id).innerHTML;
				
					buffer=buffer.replace(/SmartAdServer\(.*?\)/i, '');
					saveComponents = {
						createElement: document.createElement,
						write: document.write
					}
					document.createElement = document.write = function() {};
					
					buffer=buffer.replace(/<SC.*?firstCall=.*?<\/.*?PT>/gi, '');
					buffer=buffer.replace(/@@FLAG@@/gi, '');
					document.getElementById(blockList[i].id).innerHTML=buffer;
					document.createElement = saveComponents.createElement;
					document.write = saveComponents.write;
				}
			}
			else {
				var buffer=iframe.contentDocument.getElementById(blockList[i].id).innerHTML;
				
				buffer=buffer.replace(/SmartAdServer\(.*?\)/i, '');
				
				buffer=buffer.replace(/<SC.*?firstCall=.*?<\/.*?PT>/gi, '');
				buffer=buffer.replace(/@@FLAG@@/gi, '');
				
				document.getElementById(blockList[i].id).innerHTML=buffer;
			}
			
			if(typeof(resizeDocument) == "function") {
				resizeDocument();
			}
			
		}
	}
	catch(Exception) {
		return false;
	}
}




//========================
function GC_include(url, callback) {

	if (document.getElementsByTagName) {
		var script = document.createElement("script");
		script.type = "text/javascript";
		script.src = url;
		var container = document.body;
		if (container) {
			container.appendChild(script);
		}

		var img=document.createElement('img');
		img.src=url;
		img.onerror=function() {
			if (typeof(callback) == "function") {
				callback();
			}
		};
	} 
}

function replaceDelayedAds()
{
	jQuery(".smartAdServerDelayed, .delayedAdvertising").each(function()
	{
		var delayedContainer = jQuery(this);
		if (delayedContainer.hasClass("smartAdServerDelayed"))
		{
			var container = jQuery(".smartPubNo" + delayedContainer.attr("rel"));
		}
		else
		{
			var container = jQuery(".advertising-" + delayedContainer.attr("rel"));
		}
		if (container.length)
		{
			jQuery("script", delayedContainer).remove();
			delayedContainer.detach();
			delayedContainer.appendTo(container);
			delayedContainer.show();
			delayedContainer.removeClass("smartAdServerDelayed delayedAdvertising");
		}
	});
	jQuery(".replaceDelayedAds").remove();
}
jQuery(document).ready(replaceDelayedAds);

//==============JDLX REFRESH PUB====================
/*jQuery(function() {
	GC_include('/?module=dynamic&controller=refreshpub');
});*/



/*
var dynamicContentInjectionFrequency=240000;

jQuery(function() {

	if(document.location.toString()!='http://'+document.location.hostname.toString() && document.location.toString()!='http://'+document.location.hostname.toString()+'/') {
		setInterval(function() {
			refreshDynamicBlocks();
		}, dynamicContentInjectionFrequency);
	}
	else {

	}
});
*/




