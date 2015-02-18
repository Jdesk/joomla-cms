<?php
/**
<<<<<<< HEAD
 * @package     Joomla.Administrator
 * @subpackage  com_cpanel
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
=======
 * @package		Joomla.Administrator
 * @subpackage	com_cpanel
 * @copyright		Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
>>>>>>> FETCH_HEAD
 */

defined('_JEXEC') or die;

// No access check.

$controller	= JControllerLegacy::getInstance('Cpanel');
$controller->execute(JFactory::getApplication()->input->get('task'));
$controller->redirect();
