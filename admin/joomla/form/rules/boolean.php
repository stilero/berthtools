<?php
/**
 * @version		$Id: boolean.php 96 2011-08-11 06:59:32Z michel $
 * @package		Joomla.Framework
 * @subpackage	Form
 * @copyright	Copyright (C) 2005 - 2009 Open Source Matters, Inc. All rights reserved.
 * @copyright	Copyright (C) 2008 - 2009 JXtended, LLC. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('JPATH_BASE') or die;

jimport('joomla.form.formrule');

/**
 * Form Rule class for the Joomla Framework.
 *
 * @package		Joomla.Framework
 * @subpackage	Form
 * @since		1.6
 */
class JFormRuleBoolean extends JFormRule
{
	/**
	 * The regular expression.
	 *
	 * @var		string
	 * @since	1.6
	 */
	protected $_regex = '^0|1|true|false$';

	/**
	 * The regular expression modifiers.
	 *
	 * @var		string
	 * @since	1.6
	 */
	protected $_modifiers = 'i';
}