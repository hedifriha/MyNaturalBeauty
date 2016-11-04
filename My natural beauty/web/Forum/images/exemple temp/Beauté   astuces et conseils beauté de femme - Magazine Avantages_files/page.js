jQuery(document).ready(function()
{
	jQuery(".advertisingSmartAdServer").each(function()
	{
		if (!jQuery(this).height()) {
			jQuery(this).css("padding", 0);
		}
	});

	jQuery('.position_right .advertisingSmartAdServer img').css('width',280);

	adjustColumnsHeight();
});

function adjustColumnsHeight()
{
	if (jQuery(".homepage").length)
	{
		var columns = [
   			jQuery("#centerColumn"),
			jQuery("#rightColumn")
		];
	}
	else
	{
		var columns = [
   			jQuery("#centerColumn"),
			jQuery("#rightColumn")
		];
	}

	var maxHeight = 0;
	for (var i = 0; i < columns.length; ++i)
	{
		columns[i].css("min-height", '');
		if (columns[i].height() > maxHeight) {
			maxHeight = columns[i].height();
		}
	}
	for (var i = 0; i < columns.length; ++i) {
		columns[i].css("min-height", maxHeight);
	}
}

function connectWithFacebook()
{
	document.location.href = "http://www.magazine-avantages.fr/direct/membre/facebookconnect?redirectURL=" + encodeURIComponent(document.location.href);
}
jQuery(document).ready(function()
{
	if (jQuery.cookie("switchDomain"))
	{
		jQuery("#bandeCouleurHome .position_header").after('<div id="switchDomain"><a href="/direct/page/switchdomain">Retour au site mobile</a></div>');
	}

	if (!jQuery("#fb-root").length) {
		jQuery("body").append('<div id="fb-root" style="display:none"></div>');
	}
	window.fbAsyncInit = function()
	{
		FB.init({
			appId: '716982618326804',
			status: true,
			cookie: true,
			xfbml: true,
			oauth: true
		});
		_ga.trackFacebook();
		jQuery(".facebookConnect")
			.show()
			.live("click", function()
			{
				FB.getLoginStatus(function(response)
				{
					if (response.authResponse) {
						connectWithFacebook();
					}
					else
					{
						FB.login(
							function(reponse)
							{
								if (response.authResponse) {
									connectWithFacebook();
								}
								else
								{
									FB.getLoginStatus(function(response)
									{
										if (response.authResponse) {
											connectWithFacebook();
										}
									});
								}
							},
							{scope: "email,user_location,user_birthday,publish_stream"}
						);
					}
				});
			});
	};
	(function(d){
	 var js, id = 'facebook-jssdk'; if (d.getElementById(id)) {return;}
	 js = d.createElement('script'); js.id = id; js.async = true;
	 js.src = "//connect.facebook.net/fr_FR/all.js";
	 d.getElementsByTagName('head')[0].appendChild(js);
	 }(document));
	 
	 window.twttr = (function (d,s,id) {
      var t, js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return; js=d.createElement(s); js.id=id;
      js.src="//platform.twitter.com/widgets.js"; fjs.parentNode.insertBefore(js, fjs);
      return window.twttr || (t = { _e: [], ready: function(f){ t._e.push(f) } });
    }(document, "script", "twitter-wjs"));

	twttr.ready(function(twttr) {
		_ga.trackTwitter();
    });
	
	(function() {
		var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
		po.src = 'https://apis.google.com/js/plusone.js?onload=onLoadCallback';
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
	})();
	
	(function (w, d, load) {
		var script,
		first = d.getElementsByTagName('SCRIPT')[0],  
		n = load.length,
		i = 0,
		go = function () {
			for (i = 0; i < n; i = i + 1) {
				script = d.createElement('SCRIPT');
				script.type = 'text/javascript';
				script.async = true;
				script.src = load[i];
				first.parentNode.insertBefore(script, first);
			}
		}
		if (w.attachEvent) {
			w.attachEvent('onload', go);
		} else {
			w.addEventListener('load', go, false);
		}
		}(window, document,['//assets.pinterest.com/js/pinit.js']));   
	
});
/**
*
*  Base64 encode / decode
*  http://www.webtoolkit.info/
*
**/
var Base64 = {

	// private property
	_keyStr : "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=",

	// public method for encoding
	encode : function (input) {
	    var output = "";
	    var chr1, chr2, chr3, enc1, enc2, enc3, enc4;
	    var i = 0;

	    input = Base64._utf8_encode(input);

	    while (i < input.length) {

	        chr1 = input.charCodeAt(i++);
	        chr2 = input.charCodeAt(i++);
	        chr3 = input.charCodeAt(i++);

	        enc1 = chr1 >> 2;
	        enc2 = ((chr1 & 3) << 4) | (chr2 >> 4);
	        enc3 = ((chr2 & 15) << 2) | (chr3 >> 6);
	        enc4 = chr3 & 63;

	        if (isNaN(chr2)) {
	            enc3 = enc4 = 64;
	        } else if (isNaN(chr3)) {
	            enc4 = 64;
	        }

	        output = output +
	        this._keyStr.charAt(enc1) + this._keyStr.charAt(enc2) +
	        this._keyStr.charAt(enc3) + this._keyStr.charAt(enc4);

	    }

	    return output;
	},

	// public method for decoding
	decode : function (input) {
	    var output = "";
	    var chr1, chr2, chr3;
	    var enc1, enc2, enc3, enc4;
	    var i = 0;

	    input = input.replace(/[^A-Za-z0-9\+\/\=]/g, "");

	    while (i < input.length) {

	        enc1 = this._keyStr.indexOf(input.charAt(i++));
	        enc2 = this._keyStr.indexOf(input.charAt(i++));
	        enc3 = this._keyStr.indexOf(input.charAt(i++));
	        enc4 = this._keyStr.indexOf(input.charAt(i++));

	        chr1 = (enc1 << 2) | (enc2 >> 4);
	        chr2 = ((enc2 & 15) << 4) | (enc3 >> 2);
	        chr3 = ((enc3 & 3) << 6) | enc4;

	        output = output + String.fromCharCode(chr1);

	        if (enc3 != 64) {
	            output = output + String.fromCharCode(chr2);
	        }
	        if (enc4 != 64) {
	            output = output + String.fromCharCode(chr3);
	        }

	    }

	    output = Base64._utf8_decode(output);

	    return output;

	},

	// private method for UTF-8 encoding
	_utf8_encode : function (string) {
	    string = string.replace(/\r\n/g,"\n");
	    var utftext = "";

	    for (var n = 0; n < string.length; n++) {

	        var c = string.charCodeAt(n);

	        if (c < 128) {
	            utftext += String.fromCharCode(c);
	        }
	        else if((c > 127) && (c < 2048)) {
	            utftext += String.fromCharCode((c >> 6) | 192);
	            utftext += String.fromCharCode((c & 63) | 128);
	        }
	        else {
	            utftext += String.fromCharCode((c >> 12) | 224);
	            utftext += String.fromCharCode(((c >> 6) & 63) | 128);
	            utftext += String.fromCharCode((c & 63) | 128);
	        }

	    }

	    return utftext;
	},

	// private method for UTF-8 decoding
	_utf8_decode : function (utftext) {
	    var string = "";
	    var i = 0;
	    var c = c1 = c2 = 0;

	    while ( i < utftext.length ) {

	        c = utftext.charCodeAt(i);

	        if (c < 128) {
	            string += String.fromCharCode(c);
	            i++;
	        }
	        else if((c > 191) && (c < 224)) {
	            c2 = utftext.charCodeAt(i+1);
	            string += String.fromCharCode(((c & 31) << 6) | (c2 & 63));
	            i += 2;
	        }
	        else {
	            c2 = utftext.charCodeAt(i+1);
	            c3 = utftext.charCodeAt(i+2);
	            string += String.fromCharCode(((c & 15) << 12) | ((c2 & 63) << 6) | (c3 & 63));
	            i += 3;
	        }

	    }

	    return string;
	}
}


/* Transformation liens javascript en liens classiques */
jQuery(window).load(function (){
	jQuery("span.javascriptLink").each
	(
		function ()
		{
			var element = jQuery(this);
			var link = jQuery(element.get(0).outerHTML.replace(/(<\/?)span/g, "$1a"));

			var URL = jQuery(this).attr("data-link");
			link.attr("href", URL ? jQuery("<div>").html(Base64.decode(URL)).text() : "javascript:;").removeAttr("data-link");

			element.replaceWith(link);
		}
	);
});
