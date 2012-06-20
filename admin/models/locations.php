  <?php
 defined('_JEXEC') or die('Restricted access');
/**
* @version		$Id:location.php  1 2012-02-29 15:20:36Z Stilero Webdesign $
* @package		Berthtool
* @subpackage 	Models
* @copyright	Copyright (C) 2012, Daniel Eliasson Stilero Webdesign. All rights reserved.
* @license #http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
*/

jimport('joomla.application.component.model');
 
class BerthtoolModelLocations  extends JModel { 

	var $_locations;
        
        function getLocations(){
            $db =& JFactory::getDBO();
            $table = $db->nameQuote('#__berthtool_locations');
            $query = 'SELECT * FROM '.$table;
            $db->setQuery($query);
            $this->_locations = $db->loadObjectList();
            return $this->_locations;
        }
        
        function delete($cids){
            $db = $this->getDBO();
            $table = $db->nameQuote('#__berthtool_locations');
            $id = $db->nameQuote('id');
            $commaSeparatedCids = implode(',', $cids);
            $sql = 'DELETE FROM '.$table
                    .' WHERE '.$id
                    .' IN ('.$commaSeparatedCids.')';
            $db->setQuery($sql);
            if( !$db->query() ){
                $errorMessage = $db->getErrorMsg();
                JError::raiseError(500, 'Error deleting: '.$errorMessage);
            }
        }
}
?>