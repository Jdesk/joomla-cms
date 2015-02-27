<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_installer
<<<<<<< HEAD
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License, see LICENSE.php
 */

=======
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License, see LICENSE.php
 */

// No direct access
>>>>>>> FETCH_HEAD
defined('_JEXEC') or die;

/**
 * Languages Installer Controller
 *
<<<<<<< HEAD
=======
 * @package     Joomla.Administrator
 * @subpackage  com_installer
>>>>>>> FETCH_HEAD
 * @since       2.5.7
 */
class InstallerControllerLanguages extends JControllerLegacy
{
<<<<<<< HEAD
=======

>>>>>>> FETCH_HEAD
	/**
	 * Finds new Languages.
	 *
	 * @return  void
<<<<<<< HEAD
	 *
	 * @since   2.5.7
	 */
	public function find()
	{
		// Purge the updates list
		$model = $this->getModel('update');
		$model->purge();

=======
	 */
	public function find()
	{
>>>>>>> FETCH_HEAD
		// Check for request forgeries
		JSession::checkToken() or jexit(JText::_('JINVALID_TOKEN'));

		// Get the caching duration
<<<<<<< HEAD
=======
		jimport('joomla.application.component.helper');
>>>>>>> FETCH_HEAD
		$component = JComponentHelper::getComponent('com_installer');
		$params = $component->params;
		$cache_timeout = $params->get('cachetimeout', 6, 'int');
		$cache_timeout = 3600 * $cache_timeout;

		// Find updates
		$model	= $this->getModel('languages');
<<<<<<< HEAD

		if (!$model->findLanguages($cache_timeout))
		{
			$this->setError($model->getError());
			$this->setMessage($this->getError(), 'error');
		}

		$this->setRedirect(JRoute::_('index.php?option=com_installer&view=languages', false));
	}

	/**
	 * Purge the updates list.
	 *
	 * @return  void
	 *
	 * @since   2.5.7
=======
		$model->findLanguages($cache_timeout);

		$this->setRedirect(JRoute::_('index.php?option=com_installer&view=languages', false));

	}

	/**
	 * Purgue the updates list.
	 *
	 * @return  void
>>>>>>> FETCH_HEAD
	 */
	public function purge()
	{
		// Check for request forgeries
		JSession::checkToken() or jexit(JText::_('JINVALID_TOKEN'));

		// Purge updates
		$model = $this->getModel('update');
		$model->purge();
		$model->enableSites();
		$this->setRedirect(JRoute::_('index.php?option=com_installer&view=languages', false), $model->_message);
	}

	/**
	 * Install languages.
	 *
<<<<<<< HEAD
	 * @return  void
	 *
	 * @since   2.5.7
=======
	 * @return void
>>>>>>> FETCH_HEAD
	 */
	public function install()
	{
		$model = $this->getModel('languages');

		// Get array of selected languages
<<<<<<< HEAD
		$lids = $this->input->get('cid', array(), 'array');
=======
		$lids	= JRequest::getVar('cid', array(), '', 'array');
>>>>>>> FETCH_HEAD
		JArrayHelper::toInteger($lids, array());

		if (!$lids)
		{
			// No languages have been selected
			$app = JFactory::getApplication();
			$app->enqueueMessage(JText::_('COM_INSTALLER_MSG_DISCOVER_NOEXTENSIONSELECTED'));
		}
		else
		{
			// Install selected languages
			$model->install($lids);
		}

		$this->setRedirect(JRoute::_('index.php?option=com_installer&view=languages', false));
	}
}
