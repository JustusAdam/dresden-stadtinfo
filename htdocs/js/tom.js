/*** Karten-Funktionen ***/
/*** Quelle: http://wiki.openstreetmap.org/wiki/Die_JavaScript_Dateien ***/

//Setzt den Zoom-Mittelpunkt auf die Koordinaten von lon und lat
function jumpTo(lon, lat, zoom) {
    var x = Lon2Merc(lon);
    var y = Lat2Merc(lat);
    map.setCenter(new OpenLayers.LonLat(x, y), zoom);
    return false;
}
 
//Berechnet die Longitude-Koordinate, die die OSM benötigt
function Lon2Merc(lon) {
    return 20037508.34 * lon / 180;
}

//Berechnet die Latitude-Koordinate, die die OSM benötigt 
function Lat2Merc(lat) {
    var PI = 3.14159265358979323846;
    lat = Math.log(Math.tan( (90 + lat) * PI / 360)) / (PI / 180);
    return 20037508.34 * lat / 180;
}
 
/**
  *	Fügt einen SVG-Marker namens 'icon' hinzu aus dem Layer 'layer' 
  * und den Koordinaten 'lon' und 'lat'. Das Popup wird sofort angezeigt.
  * Das Popup enthält den Text 'popupContentHTML'.
  *
  **/
function addMarker(layer, lon, lat, popupContentHTML, icon) 
{
 
    var ll = new OpenLayers.LonLat(Lon2Merc(lon), Lat2Merc(lat));
    var feature = new OpenLayers.Feature(layer, ll); 
    feature.closeBox = true;
    feature.popupClass = OpenLayers.Class(OpenLayers.Popup.FramedCloud, {minSize: new OpenLayers.Size(200, 50) } );
    feature.data.popupContentHTML = popupContentHTML;
    feature.data.overflow = "hidden";
 
    var marker = new OpenLayers.Marker(ll, icon);
    
    
    marker.feature = feature;
 
    var markerClick = function(evt) 
    {
        if (this.popup == null) 
        {
            this.popup = this.createPopup(this.closeBox);
            map.addPopup(this.popup);
            this.popup.show();
        } 
        else 
        {
            this.popup.toggle();
        }
        OpenLayers.Event.stop(evt);
    };
    marker.events.register("mousedown", feature, markerClick);
 
    layer.addMarker(marker);
    
    
    map.addPopup(feature.createPopup(feature.closeBox));  // :D
   
}

// Im Gegensatz zu addMarker wird das Popup nicht sofort nach dem Aufruf angezeigt.
function addOnlyMarker(layer, lon, lat, popupContentHTML, icon) 
{
 
    var ll = new OpenLayers.LonLat(Lon2Merc(lon), Lat2Merc(lat));
    var feature = new OpenLayers.Feature(layer, ll); 
    feature.closeBox = true;
    feature.popupClass = OpenLayers.Class(OpenLayers.Popup.FramedCloud, {minSize: new OpenLayers.Size(200, 50) } );
    feature.data.popupContentHTML = popupContentHTML;
    feature.data.overflow = "hidden";
 
    var marker = new OpenLayers.Marker(ll, icon);
    
    
    marker.feature = feature;
 
    var markerClick = function(evt) 
    {
        if (this.popup == null) 
        {
            this.popup = this.createPopup(this.closeBox);
            map.addPopup(this.popup);
            this.popup.show();
        } 
        else 
        {
            this.popup.toggle();
        }
        OpenLayers.Event.stop(evt);
    };
    marker.events.register("mousedown", feature, markerClick);
 
    layer.addMarker(marker);
    
    //Unterschied zu addMarker(): map.addPopup(feature.createPopup(feature.closeBox));  
   
}

// Berechnet die Kanten-Rundungen
function getCycleTileURL(bounds) {
   var res = this.map.getResolution();
   var x = Math.round((bounds.left - this.maxExtent.left) / (res * this.tileSize.w));
   var y = Math.round((this.maxExtent.top - bounds.top) / (res * this.tileSize.h));
   var z = this.map.getZoom();
   var limit = Math.pow(2, z);
 
   if (y < 0 || y >= limit)
   {
     return null;
   }
   else
   {
     x = ((x % limit) + limit) % limit;
 
     return this.url + z + "/" + x + "/" + y + "." + this.type;
   }
}
