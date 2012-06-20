<?php
/**
* @version		$Id: default_viewfrontend.php 96 2011-08-11 06:59:32Z michel $
* @package		Berthtool
* @subpackage 	Views
* @copyright	Copyright (C) 2012, Daniel Eliasson Stilero Webdesign. All rights reserved.
* @license #http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
*/

// no direct access
defined('_JEXEC') or die('Restricted access');

jimport('joomla.application.component.view');

 
class BerthtoolViewLocation  extends JView 
{
	public function display($tpl = null)
	{
            $document =& JFactory::getDocument();
            $document->setMimeEncoding('application/json');
            $model =& $this->getModel();
            
            if( $this->getLayout() == 'list' ){
                $locations = $model->getLocations();
                $jsonString = json_encode($locations);
                echo $jsonString;
            }else{
                $cid = JRequest::getVar('cid', null, 'DEFAULT', 'array');
                $id = $cid ? $cid[0] : JRequest::getInt('id', 0);
                $location = $model->getLocation($id);
                $jsonString = json_encode($locations);
                echo $jsonString;
            }
//		$app = &JFactory::getApplication('site');
//		$document	= &JFactory::getDocument();
//		$uri 		= &JFactory::getURI();
//		$user 		= &JFactory::getUser();
//		$pagination	= &$this->get('pagination');
//		$params		= $app ->getParams();				
//		$menus	= &JSite::getMenu();
//		
//		$menu	= $menus->getActive();
//		if (is_object( $menu )) {
//			$menu_params = $menus->getParams($menu->id) ;
//			if (!$menu_params->get( 'page_title')) {
//				$params->set('page_title', 'Location');
//			}
//		}		
//
//
//		$item = $this->get( 'Item' );
//		$this->assignRef( 'item', $item );
//
//		$this->assignRef('params', $params);
//		$this->assignRef('pagination', $pagination);
		//$document = JFactory::getDocument();
                //$document->addScript('https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js');
		//parent::display($tpl);
	}
}
?>