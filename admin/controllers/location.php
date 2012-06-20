<?php
/**
* @version		$Id: default_controller.php 96 2011-08-11 06:59:32Z michel $
* @package		Berthtool
* @subpackage 	Controllers
* @copyright	Copyright (C) 2012, Daniel Eliasson Stilero Webdesign. All rights reserved.
* @license #http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
*/

// no direct access
defined('_JEXEC') or die('Restricted access');

jimport('joomla.application.component.controller');

/**
 * BerthtoolLocation Controller
 *
 * @package    Berthtool
 * @subpackage Controllers
 */
class BerthtoolControllerLocation extends BerthtoolController
{
	/**
	 * Constructor
	 */
	protected $_viewname = 'location'; 
	 
	public function __construct($config = array ()) 
	{
		parent :: __construct($config);
		JRequest :: setVar('view', $this->_viewname);

	}		
	public function publish() 
	{
		// Check for request forgeries
		JRequest :: checkToken() or jexit('Invalid Token');

		$cid = JRequest :: getVar('cid', array (), 'post', 'array');
		JArrayHelper :: toInteger($cid);

		if (count($cid) < 1) {
			JError :: raiseError(500, JText :: _('Select an item to publish'));
		}

		$model = $this->getModel('location');
		if (!$model->publish($cid, 1)) {
			echo "<script> alert('" . $model->getError(true) . "'); window.history.go(-1); </script>\n";
		}

		$this->setRedirect('index.php?option=com_berthtool&view=location');
	}

	public function unpublish() 
	{
		// Check for request forgeries
		JRequest :: checkToken() or jexit('Invalid Token');

		$cid = JRequest :: getVar('cid', array (), 'post', 'array');
		JArrayHelper :: toInteger($cid);

		if (count($cid) < 1) {
			JError :: raiseError(500, JText :: _('Select an item to unpublish'));
		}

		$model = $this->getModel('location');
		if (!$model->publish($cid, 0)) {
			echo "<script> alert('" . $model->getError(true) . "'); window.history.go(-1); </script>\n";
		}

		$this->setRedirect('index.php?option=com_berthtool&view='.$this->_viewname);
	}
	public function orderup() 
	{
		// Check for request forgeries
		JRequest :: checkToken() or jexit('Invalid Token');

		$model = $this->getModel('location');
		$model->move(-1);

		$this->setRedirect('index.php?option=com_berthtool&view='.$this->_viewname);
	}

	public function orderdown() 
	{
		// Check for request forgeries
		JRequest :: checkToken() or jexit('Invalid Token');

		$model = $this->getModel('location');
		$model->move(1);

		$this->setRedirect('index.php?option=com_berthtool&view='.$this->_viewname);
	}

	public function saveorder() 
	{
		// Check for request forgeries
		JRequest :: checkToken() or jexit('Invalid Token');

		$cid = JRequest :: getVar('cid', array (), 'post', 'array');
		$order = JRequest :: getVar('order', array (), 'post', 'array');
		JArrayHelper :: toInteger($cid);
		JArrayHelper :: toInteger($order);

		$model = $this->getModel('location');
		$model->saveorder($cid, $order);

		$msg = JText :: _('New ordering saved');
		$this->setRedirect('index.php?option=com_berthtool&view='.$this->_viewname, $msg);
	}	
}// class
?>