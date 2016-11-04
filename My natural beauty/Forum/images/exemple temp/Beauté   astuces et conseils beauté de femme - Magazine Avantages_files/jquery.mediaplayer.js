(function(jQuery)
{
	var MediaPlayerInternals = {};
	
	function MediaPlayer(element, options)
	{
		this.play = function()
		{
			return self.runCommand("play");
		}
		
		this.pause = function()
		{
			return self.runCommand("pause");
		}
		
		this.stop = function()
		{
			return self.runCommand("stop");
		}
		
		this.restart = function()
		{
			return self.runCommand("restart");
		}

		this.runCommand = function(command)
		{
			if (player)
			{
				var commandFunction;
				if (typeof(specificCommands[type][command]) == "function")
				{
					commandFunction = specificCommands[type][command];
				}
				else if (player[command])
				{
					commandFunction = player[command];
				}
				
				if (commandFunction)
				{
					return commandFunction.apply(player, Array.prototype.slice.call(arguments, 1));
				}
			}
		}
		
		this.playOnScroll = function(status)
		{
			if (typeof(status) == "undefined")
			{
				status = true;
			}
			
			playOnScroll(!!status);
		}
		
		var self = this;
		var element = jQuery(element);
		var containerId = element.attr("id") + "_object";
		var container = jQuery('<div id="' + containerId + '">').appendTo(element);
		var elementOptions = {};
		jQuery.each(element[0].attributes, function(index, attribute)
		{
			if (attribute.name.indexOf("data-") === 0)
			{
				var elementName = attribute.name.substring(5);
				if (elementName.indexOf("specific-") === 0)
				{
					if (!elementOptions["specific"])
					{
						elementOptions["specific"] = {};
					}
					elementType = elementName.substring(9, elementName.indexOf("-", 9));
					if (!elementOptions["specific"][elementType])
					{
						elementOptions["specific"][elementType] = {};
					}
					elementName = elementName.substring(9 + elementType.length + 1);
					elementOptions["specific"][elementType][elementName] = attribute.value;
				}
				else
				{
					elementOptions[elementName] = attribute.value;
				}
			}
		});
		var type;
		var player;
		var elementWidth = parseInt(options.width || element.width() || 640);
		var elementHeight = parseInt(options.height || element.height() || Math.floor(elementWidth * 9 / 16));
		
		var internalParameters = {};
		var internalFunctions = {
			buildJWPlayer: function(options)
			{
				function buildPlayer()
				{
					var playerOptions = {
						file: options.file,
						autostart: !!options.autoPlay,
						width: elementWidth,
						height: elementHeight,
						plugins: {},
						ga: {}
					};
					
					if (options.fileHD)
					{
						playerOptions["hd.file"] = options.fileHD;
						playerOptions.plugins["hd-1"] = true;
					}
					
					if (options.image)
					{
						playerOptions.image = options.image;
					}
					
					if (options.title)
					{
						playerOptions.ga = {
					        idstring: options.title,
					        trackingobject: "pageTracker"
					    }
					}
	
					if (!options.disableAdvertising)
					{
						if (options.parameters.specific && options.parameters.specific.JWPlayer && options.parameters.specific.JWPlayer.liverail)
						{
							liverailOptions = {
								'LR_PUBLISHER_ID': options.parameters.specific.JWPlayer.liverail.LR_PUBLISHER_ID,
								'LR_TAGS': '',
								'LR_ADMAP': 'in::0;in::100%',
								'LR_LAYOUT_SKIN_MESSAGE': 'Publicité, fin dans {COUNTDOWN} secondes',
								'LR_SKIP_MESSAGE': 'X',
								'LR_SKIP_COUNTDOWN': 'Passer dans {COUNTDOWN} s',
								'LR_VERTICALS': options.parameters.specific.JWPlayer.liverail.LR_VERTICALS,
								'LR_AUTOPLAY': '0',
								'LR_CONTENT' : options.parameters.specific.JWPlayer.liverail.LR_CONTENT,
								'LR_CATEGORIES' : options.parameters.specific.JWPlayer.liverail.LR_CATEGORIES
							}
							
							if (options.title)
							{
								liverailOptions.LR_TITLE = options.title;
							}
							if (options.parameters.specific.JWPlayer.liverail.LR_VIDEO_ID)
							{	
								liverailOptions.LR_VIDEO_ID = options.parameters.specific.JWPlayer.liverail.LR_VIDEO_ID;
							}
							
							playerOptions.plugins["http://cdn-static.liverail.com/js/LiveRail.AdManager.JWPlayer-6.4.0.plugin.js"] = liverailOptions;
						}
					}
					if (options.parameters.specific.JWPlayer && options.parameters.specific.JWPlayer.liverail)
					{
						delete options.parameters.specific.JWPlayer.liverail;
					}
					
					var parameters = mergeParameters("JWPlayer", playerOptions, elementOptions, options.parameters);

					if (document.getElementById(containerId))
					{
						player = jwplayer(containerId).setup(parameters);
						player.onPlay(function() { element.trigger("play"); });
						player.onPause(function() { element.trigger("pause"); });
						player.onComplete(function() { element.trigger("ended"); });
					}
				}
				
				if (!MediaPlayerInternals["JWPlayerLoaded"])
				{
					var scriptElement = jQuery("script#jwpapi");
					if (!scriptElement.length)
					{
						var API = document.createElement('script'); API.async = true;
						API.id = "jwpapi";
						sourcePath = "/media/jwplayer/jwplayer.js";
						if (typeof(makeAbsoluteURL) == "function")
						{
							sourcePath = makeAbsoluteURL(sourcePath);
						}
						API.src = sourcePath;
					    var script = document.getElementsByTagName('script')[0]; script.parentNode.insertBefore(API, script);
					    
					    scriptElement = jQuery(API);
					    scriptElement.load(function()
					    {
					    	MediaPlayerInternals["JWPlayerLoaded"] = true;
					    	jwplayer.key = "NJ6Nx5FDMxrFFJpOEtlSQd4kRF3t0LS6/ohA++SRJQs=";
					    });
					}
				    
				    scriptElement.load(buildPlayer);
				}
				else
				{
					buildPlayer();
				}
			},
			buildDailymotion: function(options)
			{
				function buildPlayer()
				{
					var id;
					if (options.id)
					{
						id = options.id
					}
					else if (options.file)
					{
						id = options.file.replace(/^https?:\/\/[^\/]*dailymotion.com\/video\/([^_]+)(?:_.*)?$/, "$1");
					}
	
					var playerOptions = {
						video: id,
						height: elementHeight,
						width: elementWidth,
						params: {}
					};
					
					if (options.autoPlay)
					{
						playerOptions.params.autoplay = true;
					}
					
					var parameters = mergeParameters("Dailymotion", playerOptions, elementOptions, options.parameters);
					
					if (document.getElementById(containerId))
					{
						player = DM.player(containerId, parameters);
						player.addEventListener("play", function() { element.trigger("play"); });
						player.addEventListener("pause", function() { element.trigger("pause"); });
						player.addEventListener("ended", function() { element.trigger("ended"); });
					}
				}
				
				if (!MediaPlayerInternals["DailymotionLoaded"])
				{
					var scriptElement = jQuery("script#dmapi");
					if (!scriptElement.length)
					{
						var API = document.createElement('script'); API.async = true;
						API.id = "dmapi";
						API.src = document.location.protocol + '//api.dmcdn.net/all.js';
					    var script = document.getElementsByTagName('script')[0]; script.parentNode.insertBefore(API, script);
					    
					    scriptElement = jQuery(API);
					    scriptElement.load(function()
			    		{
			    			MediaPlayerInternals["DailymotionLoaded"] = true;
			    		});
					}
				    
					scriptElement.load(buildPlayer);
				}
				else
				{
					buildPlayer();
				}
			}
		}
		
		var specificCommands = {
			"Dailymotion": {
				restart: function()
				{
					player.seek(-1);
					return player.play();
				},
				stop: function()
				{
					return player.pause();
				}
			},
			"JWPlayer": {
				restart: function()
				{
					return player.seek(0);
				}
			}
		}
		
		if (typeof(options) == "object")
		{
			if (options.type)
			{
				type = options.type;
			}
			else if (options.file)
			{
				var types = [
					{
						type: "Dailymotion",
						patterns: [
							"^https?://[^/]*dailymotion.com/"
						]					           
					},
					{
						type: "JWPlayer",
						patterns: [
							"^https?://[^/]*youtube.com/",
							"^http://youtu.be/"
						]
					}
				]
				
				var defaultType = "JWPlayer";
				
				for (var typeIndex = 0; !type && (typeIndex < types.length); ++typeIndex)
				{
					for (var patternIndex = 0; !type && (patternIndex < types[typeIndex].patterns.length); ++patternIndex)
					{
						if ((new RegExp(types[typeIndex].patterns[patternIndex])).test(options.file))
						{
							type = types[typeIndex].type;
						}
					}
				}
			}
			
			if (!type)
			{
				type = defaultType;
			}
			
			runFunction("build" + type, options);
			
			if (options.autoPlayOnScroll)
			{
				playOnScroll(true);
			}
		}
		
		function runFunction(functionName)
		{
			if (internalFunctions[functionName])
			{
				return internalFunctions[functionName].apply(null, Array.prototype.slice.call(arguments, 1));
			}
		}
		
		function playOnScroll(status)
		{
			if (status)
			{
				if (isScrolledIntoView())
				{
					self.play();
					internalParameters["autoScrollPlay"] = true;
				}
				else
				{
					jQuery(document).on("scroll.mediaPlayer." + containerId, function()
					{
						if (!internalParameters["autoScrollPlay"])
						{
							if (isScrolledIntoView())
							{
								self.play();
								internalParameters["autoScrollPlay"] = true;
							}
						}
					});
				}
			}
			else
			{
				jQuery(document).off("scroll.mediaPlayer." + containerId);
			}
		}
		
		function mergeParameters()
		{
			if (typeof(arguments[0]) == "string")
			{
				var type = arguments[0].toLowerCase();
				Array.prototype.shift.call(arguments);
			}
			
			var parameters = {};
			
			for (var i in arguments)
			{
				var options = arguments[i];
				if (typeof(options) == "object")
				{
					if (options.specific)
					{
						for (var specificType in options.specific)
						{
							if (specificType.toLowerCase() == type)
							{
								jQuery.extend(true, options, options.specific[specificType]);
							}
						}
						
						delete options.specific;
					}
					
					jQuery.extend(true, parameters, options);
				}
			}
			
			return parameters;
		}

		function isScrolledIntoView()
		{
			var windowTop = jQuery(window).scrollTop();
			var windowBottom = windowTop + jQuery(window).height();
			
			var elementTop = element.offset().top;
			var elementBottom = elementTop + element.height();
			
			return ((elementBottom <= windowBottom) && (elementTop >= windowTop));
		}
	}
	
	jQuery.fn.extend({
		mediaPlayer: function(options)
		{
			var functionArguments = arguments;
			return (!arguments.length ? this.data("mediaPlayer") : this.each(function()
			{
				var element = jQuery(this);
				var mediaPlayer = element.data("mediaPlayer");
				
				if (typeof(options) === "object")
				{
					if (!mediaPlayer)
					{
						mediaPlayer = new MediaPlayer(this, options);
						element.data("mediaPlayer", mediaPlayer);
					}
				}
				else if (typeof(options) == "string")
				{
					mediaPlayer.runCommand.apply(mediaPlayer, functionArguments);
				}
			}));
		}
	});
})(jQuery);