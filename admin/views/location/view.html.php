<?php
/**
* @version		$Id:location.php 1 2012-02-29 15:20:36Z Stilero Webdesign $
* @package		Berthtool
* @subpackage 	Tables
* @copyright	Copyright (C) 2012, Daniel Eliasson Stilero Webdesign. All rights reserved.
* @license #http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
*/

// no direct access
defined('_JEXEC') or die('Restricted access');

jimport('joomla.application.component.view');

 
class BerthtoolViewLocation  extends JView {
    function edit($id){
        $titleText = JText::_('Berthtool Location').': [<small>Edit</small>]';
        JToolBarHelper::title($titleText);
        JToolBarHelper::save();
        JToolBarHelper::cancel();
//        $params	= JFactory::getApplication()->getPageParameters('com_berthtool');
//        $this->assignRef('params', $params);
        $model =& $this->getModel();
        $location = $model->getLocation($id);
        $this->assignRef('location', $location);
        parent::display();
    }
    
    function add(){
        $titleText = JText::_('Berthtool Location').': [<small>Add</small>]';
        JToolBarHelper::title($titleText);
        JToolBarHelper::save();
        JToolBarHelper::cancel();
        $model =& $this->getModel();
        $location = $model->getNewLocation();
        $this->assignRef('location', $location);
        parent::display();

    }
}
?>