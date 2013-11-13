<!DOCTYPE html>
<?php include ("fk.php");?>
<html>
<head>
	<title>&Uuml;bersichtskarte</title>
	<link rel="stylesheet" href="./css/generic.css" type="text/css">
	<link rel="stylesheet" href="./css/map.css" type="text/css" >
	
	
	<script type="text/javascript" src="http://www.openlayers.org/api/OpenLayers.js"></script>
	<script type="text/javascript" src="http://www.openstreetmap.org/openlayers/OpenStreetMap.js"></script>
	<script type="text/javascript" src="js/tom.js"></script>
	
	<script type="text/javascript"> 

	//<![CDATA[

	var map;
	var layer_mapnik;
	var layer_tah;
	var layer_markers;

	function drawmap() {
		// Popup und Popuptext mit evtl. Grafik ==> müssen wir noch sorgfältig bearbeiten!!!
		var popuptext="<font color=\"black\"><b><?php echo "$heading";?></b></font>";

		OpenLayers.Lang.setCode('de');
		
		// Position und Zoomstufe der Karte ==> Sollte Position des Markers (s.u.) entsprechen (findet man in Wikipedia rechts oben) 
		var lon = <?php echo "$xpos";?>;
		var lat = <?php echo "$ypos";?>;
		var zoom = 15;  //15 ist gut!

		map = new OpenLayers.Map('map', {
			projection: new OpenLayers.Projection("EPSG:900913"),
			displayProjection: new OpenLayers.Projection("EPSG:4326"),
			controls: [
				new OpenLayers.Control.Navigation(),
				new OpenLayers.Control.LayerSwitcher(),
				new OpenLayers.Control.PanZoomBar()],
			maxExtent:
				new OpenLayers.Bounds(-20037508.34,-20037508.34,
										20037508.34, 20037508.34),
			numZoomLevels: 18,
			maxResolution: 156543,
			units: 'meters'
		});

		layer_mapnik = new OpenLayers.Layer.OSM.Mapnik("Mapnik");
		layer_markers = new OpenLayers.Layer.Markers("Address", { projection: new OpenLayers.Projection("EPSG:4326"), 
													  visibility: true, displayInLayerSwitcher: false });

		map.addLayers([layer_mapnik, layer_markers]);
		jumpTo(lon, lat, zoom);
	 
		// Position des Markers ==> Sollte Position der Karte entsprechen
		addMarker(layer_markers, <?php echo "$xpos, $ypos";?>, popuptext);

	}

	//]]>
		</script>
		<noscript>Die Karte kann nicht angezeigt werden, da JavaScript nicht installiert oder oder ausgeschaltet ist.</noscript>

</head>
<body onload="drawmap();">
	
	<header>
		<div class="HeaderContent">
			<div id="StartButton" onclick="document.location.href='index.html'">
				Start
			</div>
			
			<div id="Title"> 
				&Uuml;bersichtskarte
			</div>
			
			<div id="UpButtonContainer">
				
			</div>
		</div>
	</header>
	
	
	<div id="Global">
		
		<div class="BigBox1">
		
			<div id="map"></div>
			<div id="map-c">&copy; <a class="c" href="http://www.openstreetmap.org/copyright">OpenStreetMap &amp; Mitwirkende</a>
			</div>
		
		
		</div>
	</div>
	<footer>
		<div class="HeaderContent" id="FooterText">
			&copy;2013 Justus Adam, Jens Wettlaufer, Adrian Lieber, Peter Klausing
		</div>
	</footer>
	
	
</body>