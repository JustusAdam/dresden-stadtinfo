
/*** Coordinates ***/
var fkLon = 13.741575; var fkLat = 51.051883; //Frauenkirche
var soLon = 13.735169; var soLat = 51.054508; //Semperoper
var zwLon = 13.733889; var zwLat = 51.053056; //Zwinger
var tuLon = 13.726667; var tuLat = 51.028056; //TU Dresden
var ggLon = 13.763056; var ggLat = 51.0375; // Großer Garten
var bwLon = 13.810047; var bwLat = 51.053373; //Blaues Wunder

/*** Functions ***/
function jumpTo(lon, lat, zoom) {
    var x = Lon2Merc(lon);
    var y = Lat2Merc(lat);
    map.setCenter(new OpenLayers.LonLat(x, y), zoom);
    return false;
}
 
function Lon2Merc(lon) {
    return 20037508.34 * lon / 180;
}
 
function Lat2Merc(lat) {
    var PI = 3.14159265358979323846;
    lat = Math.log(Math.tan( (90 + lat) * PI / 360)) / (PI / 180);
    return 20037508.34 * lat / 180;
}
 
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
    
    //Diffrence: map.addPopup(feature.createPopup(feature.closeBox));  
   
}
 
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
