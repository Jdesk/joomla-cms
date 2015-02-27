<?php
/**
<<<<<<< HEAD
 * @package     Joomla.Site
 * @subpackage  com_media
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
=======
 * @package		Joomla.Site
 * @subpackage	com_media
 * @copyright	Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
>>>>>>> FETCH_HEAD
 */

defined('_JEXEC') or die;

// Load the com_media language files, default to the admin file and fall back to site if one isn't found
$lang = JFactory::getLanguage();
<<<<<<< HEAD
$lang->load('com_media', JPATH_ADMINISTRATOR, null, false, true)
||	$lang->load('com_media', JPATH_SITE, null, false, true);
=======

	$lang->load('com_media', JPATH_ADMINISTRATOR, null, false, true)
||	$lang->load('com_media', JPATH_SITE, null, false, true);

// Load the admin HTML view
require_once JPATH_COMPONENT_ADMINISTRATOR.'/helpers/media.php';

// Require the base controller
require_once JPATH_COMPONENT.'/controller.php';

// Make sure the user is authorized to view this page
$user	= JFactory::getUser();
$app	= JFactory::getApplication();
$cmd	= JRequest::getCmd('task', null);

if (strpos($cmd, '.') != false) {
	// We have a defined controller/task pair -- lets split them out
	list($controllerName, $task) = explode('.', $cmd);

	// Define the controller name and path
	$controllerName	= strtolower($controllerName);
	$controllerPath	= JPATH_COMPONENT_ADMINISTRATOR.'/controllers/'.$controllerName.'.php';

	// If the controller file path exists, include it ... else lets die with a 500 error
	if (file_exists($controllerPath)) {
		require_once $controllerPath;
	}
	else {
		JError::raiseError(500, JText::_('JERROR_INVALID_CONTROLLER'));
	}
}
else {
	// Base controller, just set the task :)
	$controllerName = null;
	$task = $cmd;
}

// Set the name for the controller and instantiate it
$controllerClass = 'MediaController'.ucfirst($controllerName);

if (class_exists($controllerClass)) {
	$controller = new $controllerClass();
}
else {
	JError::raiseError(500, JText::_('JERROR_INVALID_CONTROLLER_CLASS'));
}

// Set the model and view paths to the administrator folders
$controller->addViewPath(JPATH_COMPONENT_ADMINISTRATOR.'/views');
$controller->addModelPath(JPATH_COMPONENT_ADMINISTRATOR.'/models');

// Perform the Request task
$controller->execute($task);
>>>>>>> FETCH_HEAD

// Hand processing over to the admin base file
require_once JPATH_COMPONENT_ADMINISTRATOR . '/media.php';
