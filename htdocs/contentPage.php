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
			
			<h1>Insert audio here!</h1>
			
			</div>
		
		</div>
		
		<div id="BigBox2">
			<div class="exampleWrapper">
				<div class="myElement greenishSlides gsHorizontal">
					<div class="gsSlide left gsActive"><img class="Slider" src="<?php echo "./resources/images/"; echo "$ct"; echo "1.jpg";?>" /></div>
					<div class="gsSlide left gsActive"><img class="Slider" src="<?php echo "./resources/images/"; echo "$ct"; echo "2.jpg";?>" /></div>
					<div class="gsSlide left gsActive"><img class="Slider" src="<?php echo "./resources/images/"; echo "$ct"; echo "3.jpg";?>" /></div>
					<div class="gsSlide left gsActive"><img class="Slider" src="<?php echo "./resources/images/"; echo "$ct"; echo "4.jpg";?>" /></div>
					<div class="gsSlide left gsActive"><img class="Slider" src="<?php echo "./resources/images/"; echo "$ct"; echo "5.jpg";?>" /></div>
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
