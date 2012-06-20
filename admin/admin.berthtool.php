<?php
/**
 * @version 1.0
 * @package    joomla
 * @subpackage Berthtool
 * @author	   	Daniel Eliasson Stilero Webdesign
 *  @copyright  	Copyright (C) 2012, Daniel Eliasson Stilero Webdesign. All rights reserved.
 *  @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */

//--No direct access
defined('_JEXEC') or die('Resrtricted Access');
// Require the base controller
require_once( JPATH_COMPONENT.DS.'controller.php' );

// Create the controller
$controller   = new BerthtoolController();

// Perform the Request task
$controller->execute( JRequest::getVar( 'task', 'display' ) );

// Redirect if set by the controller
$controller->redirect();