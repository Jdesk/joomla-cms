<?php
/**
<<<<<<< HEAD
 * @package     Joomla.Administrator
 * @subpackage  mod_version
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
=======
 * @package		Joomla.Administrator
 * @subpackage	mod_version
 * @copyright	Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
>>>>>>> FETCH_HEAD
 */

defined('_JEXEC') or die;

require_once __DIR__ . '/helper.php';

$version = ModVersionHelper::getVersion($params);

require JModuleHelper::getLayoutPath('mod_version', $params->get('layout', 'default'));
