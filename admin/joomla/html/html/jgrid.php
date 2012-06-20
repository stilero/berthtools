<?php
/**
 * @version		$Id: jgrid.php 96 2011-08-11 06:59:32Z michel $
 * @copyright	Copyright (C) 2005 - 2009 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

/**
 * Utility class for creating HTML Grids
 *
 * @package 	Joomla.Framework
 * @subpackage	HTML
 * @since		1.6
 */
abstract class JHtmlJGrid
{
	/**
	 * @param	int $value	The state value.
	 * @param	int $i
	 * @param	string		An optional prefix for the task.
	 * @param	boolean		An optional setting for access control on the action.
	 */
	public static function published($value = 0, $i, $taskPrefix = '', $canChange = true)
	{
		// Array of image, task, title, action
		$states	= array(
			1	=> array('tick.png',		$taskPrefix.'unpublish',	'JState_Published',		'JState_UnPublish_Item'),
			0	=> array('publish_x.png',	$taskPrefix.'publish',		'JState_UnPublished',	'JState_Publish_Item'),
			-1	=> array('disabled.png',	$taskPrefix.'unpublish',	'JState_Archived',		'JState_UnPublish_Item'),
			-2	=> array('trash.png',		$taskPrefix.'publish',		'JState_Trashed',		'JState_Publish_Item'),
		);
		$state	= JArrayHelper::getValue($states, (int) $value, $states[0]);
		$html	= JHtml::_('image.administrator', $state[0], 'images/', null, '/templates/bluestork/admin/images/', JText::_($state[2]));
		if ($canChange) {
			$html	= '<a href="javascript:void(0);" onclick="return listItemTask(\'cb'.$i.'\',\''.$state[1].'\')" title="'.JText::_($state[3]).'">'
					. $html.'</a>';
		}

		return $html;
	}

	/**
	 * Returns an array of standard published state filter options.
	 *
	 * @return	string			The HTML code for the select tag
	 * @since	1.6
	 */
	public static function publishedOptions()
	{
		// Build the active state filter options.
		$options	= array();
		$options[]	= JHtml::_('select.option', '1', 'JOption_Published');
		$options[]	= JHtml::_('select.option', '0', 'JOption_Unpublished');
		$options[]	= JHtml::_('select.option', '-2', 'JOption_Trash');
		$options[]	= JHtml::_('select.option', '*', 'JOption_All');

		return $options;
	}

	/**
	 * Displays a checked-out icon
	 *
	 * @param	string	The name of the editor.
	 * @param	string	The time that the object was checked out.
	 *
	 * @return	string	The required HTML.
	 */
	public static function checkedout($editorName, $time)
	{
		$text	= addslashes(htmlspecialchars($editorName));
		$date 	= JHTML::_('date',  $time, '%A, %d %B %Y');
		$time	= JHTML::_('date',  $time, '%H:%M');

		$hover = '<span class="editlinktip hasTip" title="'. JText::_('Checked Out') .'::'. $text .'<br />'. $date .'<br />'. $time .'">';
		$checked = $hover .'<img src="images/checked_out.png" alt="'.JText::_('Checked Out').'" /></span>';

		return $checked;
	}

}