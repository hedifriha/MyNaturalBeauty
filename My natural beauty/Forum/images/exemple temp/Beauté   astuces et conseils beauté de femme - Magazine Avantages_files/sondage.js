function participatePoll(pollId)
{
	var choices = document.getElementById("poll" + pollId).getElementsByTagName("input");

	var choiceId = 0;
	for (var i = 0; !choiceId && (i < choices.length); ++i)
	{
		if (choices[i].checked)
		{
			choiceId = choices[i].value;
		}
	}

	if (choiceId)
	{
		var handler = new GC_Ajax(function()
		{
			if ((h.readyState == 4) && h.responseText.length)
			{
				eval("var results = " + h.responseText + ";");

				var total = 0;
				var valmax = 0;
				var tmp = 0;
				for (var i = 0; i < results.choix.length; ++i)
				{
					tmp = parseInt(results.choix[i].nombre);
					if(valmax < tmp ){
						valmax = tmp;
					}
					total += parseInt(results.choix[i].nombre);
				}

				for (var i = 0; i < results.choix.length; ++i)
				{
					if(valmax == results.choix[i].nombre){
						document.getElementById("poll" + pollId + "Choice" + results.choix[i].id + "Lib").style.fontWeight ="bold";
					}
					document.getElementById("poll" + pollId + "Choice" + results.choix[i].id + "Number").innerHTML = results.choix[i].nombre + ' (voix)';
					var Percent = Math.round(1000 * results.choix[i].nombre / total) / 10;
					Percent = Math.round(Percent);

					document.getElementById("poll" + pollId + "Choice" + results.choix[i].id + "Bar").style.width = (Percent + 15) + "px";
					if(Percent < 10) {
						document.getElementById("poll" + pollId + "Choice" + results.choix[i].id + "Percent").innerHTML = String(Percent).replace(/\./g, ',') + '%';
					}else{
						document.getElementById("poll" + pollId + "Choice" + results.choix[i].id + "Bar").innerHTML = Percent + "%";
					}
				}

				document.getElementById("poll" + pollId).parentNode.removeChild(document.getElementById("poll" + pollId));
				document.getElementById("poll" + pollId + "Results").style.display = '';

				if (typeof(refreshDynamicBlocks) == "function") {
					refreshDynamicBlocks();
				}
			}
		});
		var h = handler.init();

		handler.addData("pollId", pollId);
		handler.addData("choiceId", choiceId);
		handler.sendQuery("http://www.magazine-avantages.fr/direct/membre/participersondage");
	}
}