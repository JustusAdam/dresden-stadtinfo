<?php
	$ct = $_GET["dest"];
    include ("$ct.php");
	$posfk = "13.741575, 51.051883";
	$posso = "13.735169, 51.054508";
	$postu = "13.726667, 51.028056";
	$posbw = "13.810047, 51.053373";
	$posgg = "13.763056, 51.0375";
	$poszw = "13.733889, 51.053056";
?>
<!DOCTYPE html>

<html>
<head>
	<title><?php echo "$heading"?></title>
	<link rel="stylesheet" href="./css/generic.css" type="text/css">
	<link rel="stylesheet" href="./css/contentPage.css" type="text/css">
	<link rel="stylesheet" href="./css/smallFont.css" type="text/css">
	<link rel="stylesheet" href="./css/regularContrast.css" type="text/css">
	
	<script type="text/javascript" src="http://www.openlayers.org/api/OpenLayers.js"></script>
	<script type="text/javascript" src="http://www.openstreetmap.org/openlayers/OpenStreetMap.js"></script>
	<script type="text/javascript" src="js/tom.js"></script> 
		
	<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
	<script type="text/javascript" src="./js/jquery.slides.js"></script>
	
	<script type="text/javascript" src="./js/changestyle.js"></script>
		
	<script type="text/javascript">
		(function($) {
			$(function() {
				$(".myElement").slides({
					vertical:false,
					resizable:false,
					active:0,
					transitionSpeed: 400, //Animations-Zeit in Millisekunden
					stayOpen: true,
					keyEvents:true,
					classes:{
						active:"gSAactive",
						vertical:"gSVertical",
						horizontal:"gSHorizontal",
						slide:"gSSlide",
						deactivating:"gSDeactivating",
						positionActive:"gSPositionActive"
					},
					
					limits : {
						max: 400 //Breite der einzelnen Bilder
					},
				});
			});
		})(jQuery); 							
	</script>
	
	<script type="text/javascript"> 

	//<![CDATA[

	var map;
	var layer_mapnik;

	function drawmap() {
		// Popup und Popuptext
		var popuptext="<font color=\"black\"><b><?php echo "$heading";?></b></font>";
		
		
		
		var popuptext_fk = "<a href=\"contentPage.php?dest=fk\"><b>Frauenkirche</b></a><br><i>Neumarkt, 01067 Dresden</i>";
		var popuptext_so = "<a href=\"contentPage.php?dest=so\"><b>Semperoper</b></a><br><i>Theaterplatz 2, 01067 Dresden</i>";
		var popuptext_zw = "<a href=\"contentPage.php?dest=zw\"><b>Zwinger</b></a><br><i>Sophienstra&szlig;e, 01067 Dresden </i>";
		var popuptext_tu = "<a href=\"contentPage.php?dest=tu\"><b>TU Dresden</b></a><br><i>Mommsenstra&szlig;e 9, 01069 Dresden</i>";
		var popuptext_gg = "<a href=\"contentPage.php?dest=gg\"><b>Gro&szlig;er Garten</b></a><br><i>01219 Dresden</i>";
		var popuptext_bw = "<a href=\"contentPage.php?dest=bw\"><b>Blaues Wunder</b></a><br><i>Loschwitzer Br&uuml;cke, 01326 Dresden</i>";
		
		

		OpenLayers.Lang.setCode('de');
		
		// Position und Zoomstufe der Karte ==> Sollte Position des Markers (s.u.) entsprechen (findet man in Wikipedia rechts oben) 
		var lon = <?php echo "$xpos";?>;
		var lat = <?php echo "$ypos";?>;
		var zoom = 13;

		map = new OpenLayers.Map('map', {
			projection: new OpenLayers.Projection("EPSG:900913"),
			displayProjection: new OpenLayers.Projection("EPSG:4326"),
			controls : [
				new OpenLayers.Control.LayerSwitcher(),
				new OpenLayers.Control.Navigation(), //Mouse navigation is activated
				new OpenLayers.Control.PanZoomBar(), //Zoom bar = top-left corner
				new OpenLayers.Control.ScaleLine(), //Scale line = bottom-left corner
				new OpenLayers.Control.MousePosition({ //shows EPSG coordinates = bottom-right corner
					prefix: '<a target="_blank" ' + 'href="http://spatialreference.org/ref/epsg/4326/">' + 'EPSG:4326</a>-Koordianten: '
				}), 
				new OpenLayers.Control.KeyboardDefaults(), //Keyboard can be used 
				new OpenLayers.Control.NavToolbar(), //extra Navigation Toolbar = left
			],
			maxExtent:
				maxExtent : new OpenLayers.Bounds(-20037508.34, -20037508.34, 20037508.34, 20037508.34),
			numZoomLevels: 18,
			maxResolution: 156543,
			units: 'meters'
		});

		layer_mapnik = new OpenLayers.Layer.OSM.Mapnik("Mapnik");
				map.addLayer(layer_mapnik);

				var layerMarkers = new OpenLayers.Layer.Markers("Standort");
				map.addLayer(layerMarkers);

				var layerPOI = new OpenLayers.Layer.Markers("Weitere POIs");
				map.addLayer(layerPOI);

				jumpTo(lon, lat, zoom);
		
		var size = new OpenLayers.Size(21, 25);
		var sizeHaupt = new OpenLayers.Size(21, 25);
		var sizePOI = new OpenLayers.Size(21, 25);
		var offset = new OpenLayers.Pixel(-(size.w / 2), -size.h);
		var icon = new OpenLayers.Icon('http://www.openstreetmap.org/openlayers/img/marker-green.png', size, offset);
		var iconHaupt = new OpenLayers.Icon('http://www.openstreetmap.org/openlayers/img/marker.png', sizeHaupt, offset);
		var iconPOI = new OpenLayers.Icon('http://www.openstreetmap.org/openlayers/img/marker-blue.png', sizePOI, offset);
				
			var c1 = iconPOI.clone();
			var c2 = iconPOI.clone();
			var c3 = iconPOI.clone();
			var c4 = iconPOI.clone();
			var c5 = iconPOI.clone();
	 
		// Position des Markers
		addMarker(layer_markers, <?php echo "$xpos, $ypos";?>, popuptext, iconHaupt);
		<?php 
			if(!($ct=='so')) echo 'addOnlyMarker(layerPOI,' . $posso . ', popuptext_so, iconPOI);';
			if(!($ct=='zw')) echo 'addOnlyMarker(layerPOI,' . $poszw . ', popuptext_zw, c1);';
			if(!($ct=='tu')) echo 'addOnlyMarker(layerPOI,' . $postu . ', popuptext_tu, c2);';
			if(!($ct=='gg')) echo 'addOnlyMarker(layerPOI,' . $posgg . ', popuptext_gg, c3);';
			if(!($ct=='bw')) echo 'addOnlyMarker(layerPOI,' . $posbw . ', popuptext_bw, c4);';
			if(!($ct=='fk')) echo 'addOnlyMarker(layerPOI,' . $posfk . ', popuptext_fk, c5);';
		?>		

	}

	//]]>
		</script>
		<script type="text/javascript">
			function showelement(id){
				box = document.getElementById(id);
				box.style.display = "block";
			}
			function hideelement(id){
				box = document.getElementById(id);
				box.style.display = "none";
			}
		</script>
		<noscript>Die Karte kann nicht angezeigt werden, da JavaScript nicht installiert oder oder ausgeschaltet ist.</noscript>

</head>
<body onload="drawmap();">
	<header id="header">
		<div class="HeaderContent HeaderStuff">
			
			<div class="HeaderStuff" id="StartButton" onclick="document.location.href='index.html'">
				Start
			</div>
			
			<div id="Title"> 
				<?php 
				echo "$heading";
				?>
			</div>
			
			<div id="UpButtonContainer">
				<div class="HeaderStuff" id="Help" onmouseover="showelement('HelpBox');" onmouseout="hideelement('HelpBox');">
					Help
				</div>
			</div>
			<div id="HelpBoxContainer">
				<div class="HeaderStuff" id="HelpBox" onmouseout="hideelement('HelpBox')" onmouseover="showelement('HelpBox');">
					<div class="HelpBoxContent" onclick="largeFont();" id="largerFontButton">Larger Font</div>
					<div class="HelpBoxContent HeaderStuff" onclick="highContrast();" id="highContrastButton">Higher Contrast</div>
					<div class="HelpBoxContent HeaderStuff">Fancy stuff</div>
				</div>
			</div>
		</div>
	</header>
	<div id="Global">
		
		<div class="BigBox1">
		
			<div id="map"></div>
			<div id="map-c">&copy; <a class="c" href="http://www.openstreetmap.org/copyright">OpenStreetMap &amp; Mitwirkende</a>
			</div>
		
		
		</div>
		
		<div id="SmallBoxContainer">
		
			<div id="SmallBox1">
				<?php
					echo "$text";
					?>
			</div>
			
			
			<div class="SmallBox2">
			
			<?php echo "$media1"?>
			
			</div>
		
		</div>
		
		<div id="BigBox2">
			<div class="exampleWrapper">
				<div class="myElement greenishSlides gsHorizontal">
					<?php 
						for($i=1;$i <= 5;$i++){
							echo '<div class="gsSlide left gsActive"><img class="Slider" src="resources/images/' . $ct . $i . '.jpg" /></div>';
						}
					?>
				</div>
			</div>
		</div>
		
	</div>
	<footer>
		<div class="HeaderContent" id="FooterText">
			&copy;2013 Justus Adam, Jens Wettlaufer, Adrian Lieber, Peter Klausing :: 
			<span onclick="document.location.href='impressum.html'" class="link">Impressum</span>
		</div>
	</footer>
</body>
</html>
