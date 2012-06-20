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
 
class BerthtoolModelLocation  extends JModel { 
        
        function getLocation($id){
            $db = $this->getDBO();
            $table = $db->nameQuote('#__berthtool_locations');
            $key = $db->nameQuote('id');
            $query = 'SELECT * FROM '.$table
                    .' WHERE '.$key.' = '.$id;
            $db->setQuery($query);
            $location = $db->loadObject();
            if($location === null){
                JError::raiseError(500, 'Location '.$id.' not found');
            }else{
                return $location;
            }
        }
        
        function getNewLocation(){
            $newLocation =& $this->getTable('location');
            $newLocation->id = 0;
            return $newLocation;
        }
        
        function store(){
            $table =& $this->getTable();
            $location = JRequest::get('post');
            //jimport('joomla.utilities.date');
            //$createDate = JRequest::getVar('created', '', 'post');
            //$date = new JDate($createDate);
            //$location['created'] = $date->toMySQL();
            $table->reset();
            $table->reorder();
            $table->set( 'ordering', $table->getNextOrder() );
            if( !$table->bind($location) ){
                $this->setError($this->_db->getErrorMsg() );
                return false;
            }
            if( !$table->check() ){
                $this->setError($this->_db->getErrorMsg() );
                return false;
            }
            if( !$table->store() ){
                $this->setError($this->_db->getErrorMsg() );
                return false;
            }
            return true;
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