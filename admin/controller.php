<?php
/**
 * @version		$Id:controller.php 1 2012-02-29Z Stilero Webdesign $
 * @author	   	Daniel Eliasson Stilero Webdesign
 * @package    Berthtool
 * @subpackage Controllers
 * @copyright  	Copyright (C) 2012, Daniel Eliasson Stilero Webdesign. All rights reserved.
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

jimport('joomla.application.component.controller');

/**
 * Berthtool Standard Controller
 *
 * @package Berthtool   
 * @subpackage Controllers
 */
class BerthtoolController extends JController
{

	function display() 
	{
            $view =& $this->getView('locations', 'html');
            $model =& $this->getModel('locations');
            $view->setModel($model, true);
            
            $view->display();
	}
        
        function edit(){
            // Check for request forgeries
            //JRequest :: checkToken() or jexit('Invalid Token');
            $cids = JRequest::getVar('cid', null, 'default', 'array');
            if($cids === null){
                JError::raiseError(500, 'cid parameter missing');
            }
            $locID = (int)$cids[0];
            $requestedView = JRequest::getVar('view', 'location');
            $view =& $this->getView($requestedView, 'html');
            $model =& $this->getModel('location');
            $view->setModel($model, true);
            $view->edit($locID);
        }
        
        function add(){
            // Check for request forgeries
            //JRequest :: checkToken() or jexit('Invalid Token');
            $requestedView = JRequest::getVar('view', 'location');
            $view = $this->getView($requestedView, 'html');
            $model =& $this->getModel('location');
            $view->setModel($model, true);
            $view->add();
        }

 	/**
	 *stores the item and returnss to previous page 
	 *
	 */

	function apply(){
            $this-> save();
	}

	/**
	 * stores the item
	 */
	function save() 
	{
            // Check for request forgeries
            //JRequest :: checkToken() or jexit('Invalid Token');
            $model =& $this->getModel('location');
            $model->store();
            $redirectTo = JRoute::_('index.php?option='.JRequest::getVar('option').'&task=display');
            $this->setRedirect($redirectTo, 'Location Saved');
	}
        
        function cancel(){
            $redirectTo = JRoute::_('index.php?option='.JRequest::getVar('option').'&task=display');
            $this->setRedirect($redirectTo, 'Cancelled');
        }

	/**
	 * remove an item
	 */		
	function remove(){
            // Check for request forgeries
            //JRequest :: checkToken() or jexit('Invalid Token');
            $cid = JRequest :: getVar('cid', null, 'default', 'array');
            if($cids === null){
                JError::raiseError(500, 'No Locations selected');
            }
            $model =& $this->getModel('locations');
            $model->delete($cids);
            $redirectTo = JRoute::_('index.php?option='.JRequest::getVar('option').'&task=display');
            $this->setRedirect($redirectTo, 'Deleted');
            
	}

}// class
  
?>