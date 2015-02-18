<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_finder
 *
<<<<<<< HEAD
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
=======
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
>>>>>>> FETCH_HEAD
 * @license     GNU General Public License version 2 or later; see LICENSE
 */

defined('_JEXEC') or die;

if (!JFactory::getUser()->authorise('core.manage', 'com_finder'))
{
	return JError::raiseWarning(404, JText::_('JERROR_ALERTNOAUTHOR'));
}

$controller	= JControllerLegacy::getInstance('Finder');
$controller->execute(JFactory::getApplication()->input->get('task'));
$controller->redirect();
