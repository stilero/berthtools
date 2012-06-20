<?php
/**
* @version		$Id:controller.php  1 2012-02-29Z Stilero Webdesign $
* @package		Berthtool
* @subpackage 	Controllers
* @copyright	Copyright (C) 2012, Daniel Eliasson Stilero Webdesign. All rights reserved.
* @license #http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
*/

// no direct access
defined('_JEXEC') or die('Restricted access');

jimport('joomla.application.component.controller');

/**
 * Variant Controller
 *
 * @package    
 * @subpackage Controllers
 */
class BerthtoolController extends JController
{
	public function __construct($config = array ()) {
		parent :: __construct($config);
	}

	public function display() {
                $view = JRequest::getVar( 'view', 'location');
                $layout = JRequest::getVar( 'layout', 'default');
                $view =& $this->getView($view, 'html');
                $model =& $this->getModel('location');
                $view->setModel($model, true);
                $view->setLayout($layout);
                $view->display();
	}
	

}// class
  	

  
?>