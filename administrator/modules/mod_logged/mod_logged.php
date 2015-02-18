<?php
/**
<<<<<<< HEAD
 * @package     Joomla.Administrator
 * @subpackage  mod_logged
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
=======
 * @package		Joomla.Administrator
 * @copyright		Copyright (C) 2005 - 2014 Open Source Matters. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
>>>>>>> FETCH_HEAD
 */

defined('_JEXEC') or die;

// Include dependencies.
<<<<<<< HEAD
require_once __DIR__ . '/helper.php';

$users = ModLoggedHelper::getList($params);
=======
require_once dirname(__FILE__).'/helper.php';
>>>>>>> FETCH_HEAD

require JModuleHelper::getLayoutPath('mod_logged', $params->get('layout', 'default'));
