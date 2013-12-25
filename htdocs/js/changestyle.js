function largeFont(){
	if (document.getElementsByTagName("link")[2].getAttribute("href") == "./css/smallFont.css"){
		document.getElementsByTagName("link")[2].setAttribute("href","./css/largeFont.css");
		document.getElementById("largerFontButton").innerHTML = "Regular Font";
	}
	else{
		document.getElementsByTagName("link")[2].setAttribute("href","./css/smallFont.css");
		document.getElementById("largerFontButton").innerHTML = "Larger Font";
	}
}
function highContrast(){
	if (document.getElementsByTagName("link")[3].getAttribute("href") == "./css/regularContrast.css"){
		document.getElementsByTagName("link")[3].setAttribute("href","./css/highContrast.css");
		document.getElementById("highContrastButton").innerHTML = "Lower Contrast";
	}
	else{
		document.getElementsByTagName("link")[3].setAttribute("href","./css/regularContrast.css");
		document.getElementById("highContrastButton").innerHTML = "Higher Contrast";
	}
}
