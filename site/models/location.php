<?php
/**
* @version		$Id: default_modelfrontend.php 96 2011-08-11 06:59:32Z michel $
* @package		Berthtool
* @subpackage 	Models
* @copyright	Copyright (C) 2012, . All rights reserved.
* @license #
*/
 defined('_JEXEC') or die('Restricted access');
 jimport('joomla.application.component.model');
//global $alt_libdir;
//JLoader::import('joomla.application.component.modelitem', $alt_libdir);
//jimport('joomla.application.component.helper');

JTable::addIncludePath(JPATH_ROOT.'/administrator/components/com_berthtool/tables');
/**
 * BerthtoolModelLocation
 * @author $Author$
 */
 
 
class BerthtoolModelLocation  extends JModel { 

    function getLocation( $id ){
        $db =& JFactory::getDBO();
        $table = $db->nameQuote('#__berthtool_locations');
        $key = $db->nameQuote('id');
        $query = 'SELECT * FROM '.$table
                .' WHERE '.$key.' = '.$db->Quote($id);
        $db->setQuery($query);
        $location = $db->loadObject();
        return $location;
    }
    
    function getLocations(){
        $db =& JFactory::getDBO();
        $table = $db->nameQuote('#__berthtool_locations');
        $query = 'SELECT * FROM '.$table;
        $db->setQuery($query);
        $this->_locations = $db->loadObjectList();
        return $this->_locations;
    }
		
}
?>