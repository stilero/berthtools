<?php

/**
 * @version     $Id$
 * @copyright   Copyright 2011 Stilero AB. All rights re-served.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
//No direct access
defined('_JEXEC) or die;');
?>
<h3 class="componentheading">Locations</h3>
<?php if( $this->locations ){ 
 foreach ( $this->locations as $location) { ?>
<p class="contentheading"><?php echo $location->name; ?></p>
<p><?php echo $location->longitude;?></p>
<p><?php echo $location->latitude;?></p>
<hr />
    <?php } ?>

<?php }else{
    print "no locations found";
}?>
