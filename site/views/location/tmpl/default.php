<?php
// no direct access
defined('_JEXEC') or die('Restricted access');
?>
<?php
//include JQuery library
$document = JFactory::getDocument();
//$document->addScript('http://maps.googleapis.com/maps/api/js?key=AIzaSyCK8_4zXw8x_5AAy4nIIzrb6j_MMgbzIGg&sensor=false');
$javaScript = 
'
function initialize() {
  var locationCoordinates = new google.maps.LatLng('.$this->location->longitude.', '.$this->location->latitude.');
  var myOptions = {
    zoom: 16,
    center: locationCoordinates,
    disableDefaultUI: true,
    mapTypeId: google.maps.MapTypeId.SATELLITE 
  }
  var map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
  
  var marker = new google.maps.Marker({
      position: locationCoordinates,
      map: map,
      title:"'.$this->location->name.'"
  });
}

function loadScript() {
  var script = document.createElement("script");
  script.type = "text/javascript";
  script.src = "http://maps.googleapis.com/maps/api/js?key=AIzaSyCK8_4zXw8x_5AAy4nIIzrb6j_MMgbzIGg&sensor=false&callback=initialize";
  document.body.appendChild(script);
}

window.onload = loadScript;';
$document->addScriptDeclaration($javaScript);
?>
<h3 class="componentheading">Locations</h3>
<?php if($this->location){ ?>
<p class="contentheading"><?php echo $this->location->name; ?></p>
<p>Longitude: <?php echo $this->location->longitude; ?></p>
<p>Latitude: <?php echo $this->location->latitude; ?></p>
<div id="map_canvas" style="width: 700px; height: 300px;margin:20px;">test</div>
<?php }else{ ?>
<?php echo "Location not found"?>
<?php } ?>