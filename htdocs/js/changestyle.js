function largeFont(){
	//Veränderung der CSS-Dateien durch Anwählen der <link>-Tags --> Reihenfolge im Dokument muss beachtet werden
	if (document.getElementsByTagName("link")[2].getAttribute("href") == "./css/smallFont.css"){
		document.getElementsByTagName("link")[2].setAttribute("href","./css/largeFont.css");
		document.getElementById("largerFontButton").innerHTML = "Kleine Schrift";
	}
	else{
		document.getElementsByTagName("link")[2].setAttribute("href","./css/smallFont.css");
		document.getElementById("largerFontButton").innerHTML = "Gro&szlig;e Schrift";
	}
}
function highContrast(){
	//Veränderung der CSS-Dateien durch Anwählen der <link>-Tags --> Reihenfolge im Dokument muss beachtet werden
	if (document.getElementsByTagName("link")[3].getAttribute("href") == "./css/regularContrast.css"){
		document.getElementsByTagName("link")[3].setAttribute("href","./css/highContrast.css");
		document.getElementById("highContrastButton").innerHTML = "Normaler Kontrast";
	}
	else{
		document.getElementsByTagName("link")[3].setAttribute("href","./css/regularContrast.css");
		document.getElementById("highContrastButton").innerHTML = "Hoher Kontrast";
	}
}
