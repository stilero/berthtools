<?php
// no direct access
defined('_JEXEC') or die('Restricted access');
//
//  JToolBarHelper::title( JText::_( 'Location' ), 'generic.png' );
//  JToolBarHelper::publishList();
//  JToolBarHelper::unpublishList();
//  JToolBarHelper::deleteList();
//  JToolBarHelper::editListX();
//  JToolBarHelper::addNewX();
//  JToolBarHelper::preferences('com_berthtool', '550');  
?>
<?php

$longitude = $this->location->longitude ? $this->location->longitude : $this->params->get('longitude');
$latitude = $this->location->latitude ? $this->location->latitude : $this->params->get('latitude');
$marker = $this->location->longitude ? true : false;
if($marker){
    $jsMarker = 
        'marker = new google.maps.Marker({
            position: locationCoordinates,
            map: map,
            title:"'.$this->location->name.'"
        });'.
        "google.maps.event.addListener(map, 'click', function(event) {
            placeMarker(event.latLng);
        });";
}else{
    $jsMarker = 
        "google.maps.event.addListener(map, 'click', function(event) {
            placeMarker(event.latLng);
        });";
}
$jsInitialize = 
    '
    var map;
    var marker;
    function initialize() {
        var locationCoordinates = new google.maps.LatLng('.$latitude.', '.$longitude.');
        var myOptions = {
            zoom: 16,
            center: locationCoordinates,
            disableDefaultUI: true,
            mapTypeId: google.maps.MapTypeId.SATELLITE 
        }
        map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
        
        '.$jsMarker."
      }
      
    function placeMarker(location) {
        if(marker){
            marker.setMap(null);
        }
        marker = new google.maps.Marker({
            position: location,
            map: map
        });
        $('longitude').setProperty('value', location.lng());
        $('latitude').setProperty('value', location.lat());
    }";

$jsLoader = 
    'function loadScript() {
      var script = document.createElement("script");
      script.type = "text/javascript";
      script.src = "http://maps.googleapis.com/maps/api/js?key=AIzaSyCK8_4zXw8x_5AAy4nIIzrb6j_MMgbzIGg&sensor=false&callback=initialize";
      document.body.appendChild(script);
    }
    
    
    //window.onload = loadScript;
    window.addEvent(\'domready\', loadScript);
';
$javaScript = $jsInitialize.$jsLoader;
$document = JFactory::getDocument();
$document->addScriptDeclaration($javaScript);
?>
<form action="index.php" method="post" name="adminForm" id="adminForm">
    <div class="col100">
        <fieldset class="adminform">
            <legend><?php echo JText::_('Details'); ?></legend>
            <table class="admintable">
                <tr>
                    <td width="100" align="right" class="key">
                        <label for="name"><?php echo JText::_('Location Name'); ?>:</label>
                    </td>
                    <td>
                        <input class="inputbox" type="text" name="name" id="name" size="25"
                               value="<?php echo $this->location->name; ?>" />
                    </td>
                </tr>
                <tr>
                    <td width="100" align="right" class="key">
                        <label for="catid"><?php echo JText::_('Location Group'); ?>:</label>
                    </td>
                    <td>
                        <?php echo JHTML::_('list.category', 
                                'catid',
                                'com_berthtool',
                                $this->location->catid); ?>
                    </td>
                </tr>
                <tr>
                    <td width="100" align="right" class="key">
                        <label for="longitude"><?php echo JText::_('Longitude'); ?>:</label>
                    </td>
                    <td>
                        <input class="inputbox" type="text" name="longitude" id="longitude" size="50"
                               value="<?php echo $this->location->longitude; ?>"
                    </td>
                </tr>
                <tr>
                    <td width="100" align="right" class="key">
                        <label for="latitude"><?php echo JText::_('Latitude'); ?>:</label>
                    </td>
                    <td>
                        <input class="inputbox" type="text" name="latitude" id="latitude" size="50"
                               value="<?php echo $this->location->latitude; ?>"
                    </td>
                </tr>                
                <tr>
                    <td width="100" align="right" class="key">
                        <label for="locationgroup"><?php echo JText::_('Location Group'); ?>:</label>
                    </td>
                    <td>
                        <input class="inputbox" type="text" name="locationgroup" id="locationgroup" size="10"
                               value="<?php echo $this->location->loc_group_id; ?>"
                    </td>
                </tr>
                 <tr>
                    <td width="100" align="right" class="key">
                        <label for="description"><?php echo JText::_('Description'); ?>:</label>
                    </td>
                    <td>
                        <input class="text_area" type="text" name="description" id="description" size="50"
                               maxlength="250"
                               value="<?php echo $this->location->description; ?>"
                    </td>
                </tr>
                 <tr>
                    <td width="100" align="right" class="key">
                        <label for="published"><?php echo JText::_('Active?'); ?>:</label>
                    </td>
                    <td>
                        <?php echo JHTML::_( 'select.booleanlist', 'published', 'class="inputbox"', $this->location->published ); ?>
                    </td>
                </tr>
                 <tr>
                    <td width="100" align="right" class="key">
                        <label for="map"><?php echo JText::_('Map'); ?>:</label>
                    </td>
                    <td>
                </tr>
            </table>
        </fieldset>
    </div>
    <div class="clr"></div>
    
    <input type="hidden" name="option" value="<?php echo JRequest::getVar('option') ?>" />
    <input type="hidden" name="id" value="<?php echo $this->location->id ?>" />
    <input type="hidden" name="task" value="" />
    <?php //echo JHTML::_( 'form.token' ); ?>
</form>  	
<div id="map_canvas" style="width: 800px; height: 400px;margin:20px;">test</div>                    </td>
