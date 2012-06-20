function initialize() {
    var longitude = {locLong};
    var latitude = {locLat};
  var locationCoordinates = new google.maps.LatLng(latitude, longitude);
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
      title:{locName}
  });
}

function loadScript() {
  var script = document.createElement("script");
  script.type = "text/javascript";
  script.src = "http://maps.googleapis.com/maps/api/js?key=AIzaSyCK8_4zXw8x_5AAy4nIIzrb6j_MMgbzIGg&sensor=false&callback=initialize";
  document.body.appendChild(script);
}

window.onload = loadScript;