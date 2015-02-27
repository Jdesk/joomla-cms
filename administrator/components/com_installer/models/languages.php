<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_installer
<<<<<<< HEAD
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

=======
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access
defined('_JEXEC') or die;

// Import library dependencies
jimport('joomla.application.component.modellist');
>>>>>>> FETCH_HEAD
jimport('joomla.updater.update');

/**
 * Languages Installer Model
 *
<<<<<<< HEAD
 * @since  2.5.7
 */
class InstallerModelLanguages extends JModelList
{
	/**
	 * @var     integer  Extension ID of the en-GB language pack.
	 * @since   3.4
	 */
	private $enGbExtensionId = 0;

	/**
	 * @var     integer  Upate Site ID of the en-GB language pack.
	 * @since   3.4
	 */
	private $updateSiteId = 0;
=======
 * @package     Joomla.Administrator
 * @subpackage  com_installer
 * @since       2.5.7
 */
class InstallerModelLanguages extends JModelList
{
>>>>>>> FETCH_HEAD

	/**
	 * Constructor override, defines a white list of column filters.
	 *
	 * @param   array  $config  An optional associative array of configuration settings.
	 *
<<<<<<< HEAD
	 * @since   2.5.7
=======
	 * @see     JModelList
>>>>>>> FETCH_HEAD
	 */
	public function __construct($config = array())
	{
		if (empty($config['filter_fields']))
		{
			$config['filter_fields'] = array(
				'update_id', 'update_id',
				'name', 'name',
			);
		}

		parent::__construct($config);
<<<<<<< HEAD

		// Get the extension_id of the en-GB package.
		$db        = $this->getDbo();
		$extQuery  = $db->getQuery(true);
		$extType   = 'language';
		$extElem   = 'en-GB';

		$extQuery->select($db->quoteName('extension_id'))
			->from($db->quoteName('#__extensions'))
			->where($db->quoteName('type') . ' = ' . $db->quote($extType))
			->where($db->quoteName('element') . ' = ' . $db->quote($extElem))
			->where($db->quoteName('client_id') . ' = 0');

		$db->setQuery($extQuery);

		$extId = (int) $db->loadResult();

		// Get the update_site_id for the en-GB package if extension_id found before.
		if ($extId)
		{
			$this->enGbExtensionId = $extId;

			$siteQuery = $db->getQuery(true);

			$siteQuery->select($db->quoteName('update_site_id'))
				->from($db->quoteName('#__update_sites_extensions'))
				->where($db->quoteName('extension_id') . ' = ' . $extId);

			$db->setQuery($siteQuery);

			$siteId = (int) $db->loadResult();

			if ($siteId)
			{
				$this->updateSiteId = $siteId;
			}
		}
=======
>>>>>>> FETCH_HEAD
	}

	/**
	 * Method to get the available languages database query.
	 *
<<<<<<< HEAD
	 * @return  JDatabaseQuery  The database query
	 *
	 * @since   2.5.7
	 */
	protected function _getListQuery()
	{
		$db    = $this->getDbo();
		$query = $db->getQuery(true);

		// Select the required fields from the updates table.
		$query->select($db->quoteName(array('update_id', 'name', 'version', 'detailsurl', 'type')))
			->from($db->quoteName('#__updates'));

		/*
		 * This where clause will limit to language updates only.
		 * If no update site exists, set the where clause so
		 * no available languages will be found later with the
		 * query returned by this function here.
		 */
		if ($this->updateSiteId)
		{
			$query->where($db->quoteName('update_site_id') . ' = ' . $this->updateSiteId);
		}
		else
		{
			$query->where($db->quoteName('update_site_id') . ' = -1');
		}

		// This where clause will avoid to list languages already installed.
		$query->where($db->quoteName('extension_id') . ' = 0');

		// Filter by search in title
		$search = $this->getState('filter.search');

		if (!empty($search))
		{
			$search = $db->quote('%' . str_replace(' ', '%', $db->escape(trim($search), true) . '%'));
=======
	 * @return	JDatabaseQuery	The database query
	 */
	protected function _getListQuery()
	{
		$db     = JFactory::getDBO();
		$query  = $db->getQuery(true);

		// Select the required fields from the updates table
		$query->select('update_id, name, version, detailsurl, type');

		$query->from('#__updates');

		// This Where clause will avoid to list languages already installed.
		$query->where('extension_id = 0');

		// Filter by search in title
		$search = $this->getState('filter.search');
		if (!empty($search))
		{
			$search = $db->Quote('%' . $db->escape($search, true) . '%');
>>>>>>> FETCH_HEAD
			$query->where('(name LIKE ' . $search . ')');
		}

		// Add the list ordering clause.
<<<<<<< HEAD
		$listOrder = $this->state->get('list.ordering');
		$orderDirn = $this->state->get('list.direction');
=======
		$listOrder	= $this->state->get('list.ordering');
		$orderDirn	= $this->state->get('list.direction');
>>>>>>> FETCH_HEAD
		$query->order($db->escape($listOrder) . ' ' . $db->escape($orderDirn));

		return $query;
	}

	/**
	 * Method to get a store id based on model configuration state.
	 *
	 * @param   string  $id  A prefix for the store id.
	 *
	 * @return  string  A store id.
<<<<<<< HEAD
	 *
	 * @since   2.5.7
=======
>>>>>>> FETCH_HEAD
	 */
	protected function getStoreId($id = '')
	{
		// Compile the store id.
		$id	.= ':' . $this->getState('filter.search');

		return parent::getStoreId($id);
	}

	/**
	 * Method to auto-populate the model state.
	 *
	 * Note. Calling getState in this method will result in recursion.
	 *
<<<<<<< HEAD
	 * @param   string  $ordering   list order
	 * @param   string  $direction  direction in the list
	 *
	 * @return  void
	 *
	 * @since   2.5.7
	 */
	protected function populateState($ordering = 'name', $direction = 'asc')
	{
=======
	 * @param   null  $ordering   list order
	 * @param   null  $direction  direction in the list
	 *
	 * @return  void
	 */
	protected function populateState($ordering = 'name', $direction = 'asc')
	{
		// Initialise variables.
>>>>>>> FETCH_HEAD
		$app = JFactory::getApplication();

		$value = $app->getUserStateFromRequest($this->context . '.filter.search', 'filter_search');
		$this->setState('filter.search', $value);

		$this->setState('extension_message', $app->getUserState('com_installer.extension_message'));

		parent::populateState($ordering, $direction);
	}

	/**
<<<<<<< HEAD
	 * Enable languages update server
	 *
	 * @return  boolean
	 *
	 * @since   3.4
	 */
	protected function enableUpdateSite()
	{
		// If no update site, return false.
		if (!$this->updateSiteId)
		{
			return false;
		}

		// Try to enable the update site, return false if some RuntimeException
		$db = $this->getDbo();
		$query = $db->getQuery(true)
			->update('#__update_sites')
			->set('enabled = 1')
			->where('update_site_id = ' . $this->updateSiteId);

		$db->setQuery($query);

		try
		{
			$db->execute();
		}
		catch (RuntimeException $e)
		{
			$this->setError($e->getMessage());

			return false;
		}

		return true;
	}

	/**
=======
>>>>>>> FETCH_HEAD
	 * Method to find available languages in the Accredited Languages Update Site.
	 *
	 * @param   int  $cache_timeout  time before refreshing the cached updates
	 *
	 * @return  bool
<<<<<<< HEAD
	 *
	 * @since   2.5.7
	 */
	public function findLanguages($cache_timeout = 0)
	{
		if (!$this->enableUpdateSite())
		{
			return false;
		}

		if (!$this->enGbExtensionId)
		{
			return false;
		}

		$updater = JUpdater::getInstance();

		/*
		 * The following function call uses the extension_id of the en-GB package.
		 * In #__update_sites_extensions you should have this extension_id linked
		 * to the Accredited Translations Repo.
		 */
		$updater->findUpdates(array($this->enGbExtensionId), $cache_timeout);
=======
	 */
	public function findLanguages($cache_timeout = 0)
	{
		$updater = JUpdater::getInstance();

		/*
		 * The following function uses extension_id 600, that is the english language extension id.
		 * In #__update_sites_extensions you should have 600 linked to the Accredited Translations Repo
		 */
		$updater->findUpdates(array(600), $cache_timeout);
>>>>>>> FETCH_HEAD

		return true;
	}

	/**
	 * Install languages in the system.
	 *
	 * @param   array  $lids  array of language ids selected in the list
	 *
	 * @return  bool
<<<<<<< HEAD
	 *
	 * @since   2.5.7
	 */
	public function install($lids)
	{
		$app = JFactory::getApplication();
=======
	 */
	public function install($lids)
	{
		$app			= JFactory::getApplication();
		$installer		= JInstaller::getInstance();
>>>>>>> FETCH_HEAD

		// Loop through every selected language
		foreach ($lids as $id)
		{
<<<<<<< HEAD
			$installer = new JInstaller;

			// Loads the update database object that represents the language.
			$language = JTable::getInstance('update');
			$language->load($id);

			// Get the url to the XML manifest file of the selected language.
			$remote_manifest = $this->_getLanguageManifest($id);

			if (!$remote_manifest)
			{
				// Could not find the url, the information in the update server may be corrupt.
				$message  = JText::sprintf('COM_INSTALLER_MSG_LANGUAGES_CANT_FIND_REMOTE_MANIFEST', $language->name);
				$message .= ' ' . JText::_('COM_INSTALLER_MSG_LANGUAGES_TRY_LATER');
=======
			// Loads the update database object that represents the language
			$language = JTable::getInstance('update');
			$language->load($id);

			// Get the url to the XML manifest file of the selected language
			$remote_manifest 	= $this->_getLanguageManifest($id);
			if (!$remote_manifest)
			{
				// Could not find the url, the information in the update server may be corrupt
				$message 	= JText::sprintf('COM_INSTALLER_MSG_LANGUAGES_CANT_FIND_REMOTE_MANIFEST', $language->name);
				$message 	.= ' ' . JText::_('COM_INSTALLER_MSG_LANGUAGES_TRY_LATER');
>>>>>>> FETCH_HEAD
				$app->enqueueMessage($message);
				continue;
			}

<<<<<<< HEAD
			// Based on the language XML manifest get the url of the package to download.
			$package_url = $this->_getPackageUrl($remote_manifest);

			if (!$package_url)
			{
				// Could not find the url , maybe the url is wrong in the update server, or there is not internet access
				$message  = JText::sprintf('COM_INSTALLER_MSG_LANGUAGES_CANT_FIND_REMOTE_PACKAGE', $language->name);
				$message .= ' ' . JText::_('COM_INSTALLER_MSG_LANGUAGES_TRY_LATER');
=======
			// Based on the language XML manifest get the url of the package to download
			$package_url 		= $this->_getPackageUrl($remote_manifest);
			if (!$package_url)
			{
				// Could not find the url , maybe the url is wrong in the update server, or there is not internet access
				$message 	= JText::sprintf('COM_INSTALLER_MSG_LANGUAGES_CANT_FIND_REMOTE_PACKAGE', $language->name);
				$message 	.= ' ' . JText::_('COM_INSTALLER_MSG_LANGUAGES_TRY_LATER');
>>>>>>> FETCH_HEAD
				$app->enqueueMessage($message);
				continue;
			}

<<<<<<< HEAD
			// Download the package to the tmp folder.
			$package = $this->_downloadPackage($package_url);
=======
			// Download the package to the tmp folder
			$package 			= $this->_downloadPackage($package_url);
>>>>>>> FETCH_HEAD

			// Install the package
			if (!$installer->install($package['dir']))
			{
<<<<<<< HEAD
				// There was an error installing the package.
				$message  = JText::sprintf('COM_INSTALLER_INSTALL_ERROR', $language->name);
				$message .= ' ' . JText::_('COM_INSTALLER_MSG_LANGUAGES_TRY_LATER');
=======
				// There was an error installing the package
				$message 	= JText::sprintf('COM_INSTALLER_INSTALL_ERROR', $language->name);
				$message 	.= ' ' . JText::_('COM_INSTALLER_MSG_LANGUAGES_TRY_LATER');
>>>>>>> FETCH_HEAD
				$app->enqueueMessage($message);
				continue;
			}

<<<<<<< HEAD
			// Package installed successfully.
			$app->enqueueMessage(JText::sprintf('COM_INSTALLER_INSTALL_SUCCESS', $language->name));

			// Cleanup the install files in tmp folder.
=======
			// Package installed successfully
			$app->enqueueMessage(JText::sprintf('COM_INSTALLER_INSTALL_SUCCESS', $language->name));

			// Cleanup the install files in tmp folder
>>>>>>> FETCH_HEAD
			if (!is_file($package['packagefile']))
			{
				$config = JFactory::getConfig();
				$package['packagefile'] = $config->get('tmp_path') . '/' . $package['packagefile'];
			}
<<<<<<< HEAD

			JInstallerHelper::cleanupInstall($package['packagefile'], $package['extractdir']);

			// Delete the installed language from the list.
			$language->delete($id);
		}
=======
			JInstallerHelper::cleanupInstall($package['packagefile'], $package['extractdir']);

			// Delete the installed language from the list
			$language->delete($id);
		}

>>>>>>> FETCH_HEAD
	}

	/**
	 * Gets the manifest file of a selected language from a the language list in a update server.
	 *
	 * @param   int  $uid  the id of the language in the #__updates table
	 *
<<<<<<< HEAD
	 * @return  string
	 *
	 * @since   2.5.7
=======
	 * @return string
>>>>>>> FETCH_HEAD
	 */
	protected function _getLanguageManifest($uid)
	{
		$instance = JTable::getInstance('update');
		$instance->load($uid);
<<<<<<< HEAD

		return $instance->detailsurl;
=======
		$detailurl = trim($instance->detailsurl);
		return $detailurl;
>>>>>>> FETCH_HEAD
	}

	/**
	 * Finds the url of the package to download.
	 *
	 * @param   string  $remote_manifest  url to the manifest XML file of the remote package
	 *
<<<<<<< HEAD
	 * @return  string|bool
	 *
	 * @since   2.5.7
=======
	 * @return string|bool
>>>>>>> FETCH_HEAD
	 */
	protected function _getPackageUrl( $remote_manifest )
	{
		$update = new JUpdate;
		$update->loadFromXML($remote_manifest);
		$package_url = trim($update->get('downloadurl', false)->_data);

		return $package_url;
	}

	/**
<<<<<<< HEAD
	 * Download a language package from a URL and unpack it in the tmp folder.
	 *
	 * @param   string  $url  hola
	 *
	 * @return  array|bool  Package details or false on failure
	 *
	 * @since   2.5.7
	 */
	protected function _downloadPackage($url)
	{
		// Download the package from the given URL.
=======
	 * Download a language package from an URL and unpack it in the tmp folder.
	 *
	 * @param   string  $url  url of the package
	 *
	 * @return array|bool Package details or false on failure
	 */
	protected function _downloadPackage($url)
	{

		// Download the package from the given URL
>>>>>>> FETCH_HEAD
		$p_file = JInstallerHelper::downloadPackage($url);

		// Was the package downloaded?
		if (!$p_file)
		{
			JError::raiseWarning('', JText::_('COM_INSTALLER_MSG_INSTALL_INVALID_URL'));
<<<<<<< HEAD

			return false;
		}

		$config   = JFactory::getConfig();
		$tmp_dest = $config->get('tmp_path');

		// Unpack the downloaded package file.
=======
			return false;
		}

		$config		= JFactory::getConfig();
		$tmp_dest	= $config->get('tmp_path');

		// Unpack the downloaded package file
>>>>>>> FETCH_HEAD
		$package = JInstallerHelper::unpack($tmp_dest . '/' . $p_file);

		return $package;
	}
}
