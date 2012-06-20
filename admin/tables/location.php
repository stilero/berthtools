<?php
/**
* @version		$Id:location.php  1 2012-02-29 15:20:36Z Stilero Webdesign $
* @package		Berthtool
* @subpackage 	Tables
* @copyright	Copyright (C) 2012, Daniel Eliasson Stilero Webdesign. All rights reserved.
* @license #http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
*/

// no direct access
defined('_JEXEC') or die('Restricted access');

/**
* Jimtawl TableLocation class
*
* @package		Berthtool
* @subpackage	Tables
*/
class TableLocation extends JTable
{
	
   /** @var int id- Primary Key  **/
   public $id = null;
   
   /** @var int catid **/
   public $catid = 0;

   /** @var varchar name  **/
   public $name = null;

   /** @var text description  **/
   public $description = null;

   /** @var tinyint published  **/
   public $published = null;

   /** @var datetime created  **/
   public $created = null;

   /** @var int created_by  **/
   public $created_by = null;

   /** @var datetime modified  **/
   public $modified = null;

   /** @var int modified_by  **/
   public $modified_by = null;

   /** @var text params  **/
   public $params = null;

   /** @var int ordering  **/
   public $ordering = null;

   /** @var double longitude  **/
   public $longitude = null;

   /** @var double latitude  **/
   public $latitude = null;

   /** @var int loc_group_id  **/
   public $loc_group_id = null;




	/**
	 * Constructor
	 *
	 * @param object Database connector object
	 * @since 1.0
	 */
	public function __construct(& $db) 
	{
		parent::__construct('#__berthtool_locations', 'id', $db);
	}

	/**
	* Overloaded bind function
	*
	* @acces public
	* @param array $hash named array
	* @return null|string	null is operation was satisfactory, otherwise returns an error
	* @see JTable:bind
	* @since 1.5
	*/
	public function bind($array, $ignore = '')
	{
		if ( isset( $array['params'] ) && is_array( $array['params'] ) )
        {
            $array['params'] = json_encode( $array['params'] );

        }		
		return parent::bind($array, $ignore);		
	}

	/**
	 * Overloaded check method to ensure data integrity
	 *
	 * @access public
	 * @return boolean True on success
	 * @since 1.0
	 */
	public function check()
	{
		if ($this->id === 0) {
			//get next ordering

			
			$this->ordering = $this->getNextOrder( );

		}		
		if (!$this->created) {
			$date = JFactory::getDate();
			$this->created = $date->toFormat("%Y-%m-%d %H:%M:%S");
		}

		/** check for valid name */
		/**
		if (trim($this->name) == '') {
			$this->setError(JText::_('Your Location must contain a name.')); 
			return false;
		}
		**/		

		return true;
	}
}
