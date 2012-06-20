<?php
/**
 * @version $Id: #component#.php 96 2011-08-11 06:59:32Z michel $ 1 2012-02-29Z Stilero Webdesign $
* @package	Berthtool
* @copyright	Copyright (C) 2012, Daniel Eliasson Stilero Webdesign. All rights reserved.
* @license #http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */

//--No direct access
defined('_JEXEC') or die('=;)');

// Require the base controller
require_once( JPATH_COMPONENT.DS.'controller.php' );

jimport('joomla.application.component.model');
require_once( JPATH_COMPONENT.DS.'models'.DS.'model.php' );
jimport('joomla.application.component.helper');
JHTML::addIncludePath(JPATH_COMPONENT_ADMINISTRATOR.DS.'helpers' );
//set the default view
$task = JRequest::getWord('task');

//Use the JForms, even in Joomla 1.5 
$jv = new JVersion();
$GLOBALS['alt_libdir'] = ($jv->RELEASE < 1.6) ? JPATH_COMPONENT_ADMINISTRATOR : null;


$config 	=& JComponentHelper::getParams( 'com_berthtool' );

$controller = JRequest::getWord('view', 'location');

$ControllerConfig = array();

// Require specific controller if requested
if ($controller) {   
   $path = JPATH_COMPONENT.DS.'controllers'.DS.$controller.'.php';
   $ControllerConfig = array('viewname'=>strtolower($controller),'mainmodel'=>strtolower($controller),'itemname'=>ucfirst(strtolower($controller)));  
   if (file_exists($path)) {
       require_once $path;
   } else {

	   $controller = '';	   
   }
}


// Create the controller
$classname    = 'BerthtoolController'.$controller;
$controller   = new $classname($ControllerConfig );

// Perform the Request task
$controller->execute( JRequest::getVar( 'task' ) );

// Redirect if set by the controller
$controller->redirect();