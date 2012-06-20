<?php

/**
 * @version     $Id$
 * @copyright   Copyright 2011 Stilero AB. All rights re-served.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
//No direct access
defined('_JEXEC) or die;');
jimport('joomla.application.component.view');
class BerthtoolViewLocations extends JView{
    function display($tpl = null){
        JToolBarHelper::title(JText::_('Berthtool Locations'), 'generic.png');
        JToolBarHelper::deleteList();
        JToolBarHelper::editListX();
        JToolBarHelper::addNewX();
        JToolBarHelper::preferences( 'com_berthtool', 200);
//        $params	= JFactory::getApplication()->getPageParameters('com_berthtool');
//        $this->assignRef('params', $params);
        $model =& $this->getModel('locations');
        $locations =& $model->getLocations();
        $this->assignRef('locations', $locations);
        parent::display($tpl);
    }
}