function getData() {
	return this.data;
}

function createAjaxObject() {
	var ro;
	if(window.XMLHttpRequest) {
		ro = new XMLHttpRequest() ;
	}
	else {
		ro = new ActiveXObject("Microsoft.XMLHTTP");
	}

	this.handler=ro;
	return this.handler;
}


function sendAjaxQuery(action, data)
{
	if(!data){
		data='';
	}
	this.handler.open('POST', action, true);

	this.handler.setRequestHeader('Content-Type','application/x-www-form-urlencoded; charset=utf-8');
	this.handler.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
	//this.handler.setRequestHeader("Cache-Control", "no-cache"); 
	//this.handler.setRequestHeader("Connection", "close");

	data=encodeURI(data);
	data=data.replace(/\+/gi, '%2B');

	this.handler.send(this.data+data+'&ajaxCall=true');

	
	this.handler.onreadystatechange = this.doOnAnswer;
}

function addData(varName, value) {
	value=encodeURIComponent(value);
	value=value.replace(/\+/gi, '%2B');
	if(this.data){
		this.data+='&'+varName+'='+value;
	}else{
		this.data='&'+varName+'='+value;
	}
}

function GC_Ajax(doOnAnswer) {

	var data='';
	this.init=createAjaxObject;
	this.sendQuery=sendAjaxQuery;
	this.doOnAnswer=doOnAnswer;
	this.addData=addData;
	this.getData=getData;
}







function ajaxQuery(action, data, callback) {
	if(!data) {
		data='';
	}
	var handler=new GC_Ajax(function(){
		if(h.readyState==4) {
			if(callback) {
				callback(h.responseText);
			}
		}
	});
	var h=handler.init();
	handler.sendQuery(action, data);
}




function ajaxSetContent(id, action, data, callback) {
	if(!data) {
		data='';
	}
	if(!document.getElementById(id)){
		return;
	}
	var handler=new GC_Ajax(function() {
		if(h.readyState==4) {
			document.getElementById(id).innerHTML=h.responseText;
			if(callback){
				callback();
			}
		}
	});
	var h=handler.init();
	handler.sendQuery(action, data);
}



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



