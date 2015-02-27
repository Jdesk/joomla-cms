<?php
/**
 * @package     Joomla.Platform
 * @subpackage  HTTP
 *
<<<<<<< HEAD
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
=======
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
>>>>>>> FETCH_HEAD
 * @license     GNU General Public License version 2 or later; see LICENSE
 */

defined('JPATH_PLATFORM') or die;

<<<<<<< HEAD
use Joomla\Registry\Registry;

/**
 * HTTP factory class.
 *
 * @since  12.1
=======
/**
 * HTTP factory class.
 *
 * @package     Joomla.Platform
 * @subpackage  HTTP
 * @since       12.1
>>>>>>> FETCH_HEAD
 */
class JHttpFactory
{
	/**
<<<<<<< HEAD
	 * method to receive Http instance.
	 *
	 * @param   Registry  $options   Client options object.
	 * @param   mixed     $adapters  Adapter (string) or queue of adapters (array) to use for communication.
=======
	 * method to recieve Http instance.
	 *
	 * @param   JRegistry  $options   Client options object.
	 * @param   mixed      $adapters  Adapter (string) or queue of adapters (array) to use for communication.
>>>>>>> FETCH_HEAD
	 *
	 * @return  JHttp      Joomla Http class
	 *
	 * @throws  RuntimeException
	 *
	 * @since   12.1
	 */
<<<<<<< HEAD
	public static function getHttp(Registry $options = null, $adapters = null)
	{
		if (empty($options))
		{
			$options = new Registry;
		}

		if (empty($adapters))
		{
			$config = JFactory::getConfig();

			if ($config->get('proxy_enable'))
			{
				$adapters = 'curl';
			}
=======
	public static function getHttp(JRegistry $options = null, $adapters = null)
	{
		if (empty($options))
		{
			$options = new JRegistry;
>>>>>>> FETCH_HEAD
		}

		if (!$driver = self::getAvailableDriver($options, $adapters))
		{
			throw new RuntimeException('No transport driver available.');
		}

		return new JHttp($options, $driver);
	}

	/**
	 * Finds an available http transport object for communication
	 *
<<<<<<< HEAD
	 * @param   Registry  $options  Option for creating http transport object
	 * @param   mixed     $default  Adapter (string) or queue of adapters (array) to use
=======
	 * @param   JRegistry  $options  Option for creating http transport object
	 * @param   mixed      $default  Adapter (string) or queue of adapters (array) to use
>>>>>>> FETCH_HEAD
	 *
	 * @return  JHttpTransport Interface sub-class
	 *
	 * @since   12.1
	 */
<<<<<<< HEAD
	public static function getAvailableDriver(Registry $options, $default = null)
=======
	public static function getAvailableDriver(JRegistry $options, $default = null)
>>>>>>> FETCH_HEAD
	{
		if (is_null($default))
		{
			$availableAdapters = self::getHttpTransports();
		}
		else
		{
			settype($default, 'array');
			$availableAdapters = $default;
		}
<<<<<<< HEAD

		// Check if there is at least one available http transport adapter
=======
		// Check if there is available http transport adapters
>>>>>>> FETCH_HEAD
		if (!count($availableAdapters))
		{
			return false;
		}

		foreach ($availableAdapters as $adapter)
		{
			$class = 'JHttpTransport' . ucfirst($adapter);

<<<<<<< HEAD
			if (class_exists($class) && $class::isSupported())
=======
			if (call_user_func(array($class, 'isSupported')))
>>>>>>> FETCH_HEAD
			{
				return new $class($options);
			}
		}

		return false;
	}

	/**
	 * Get the http transport handlers
	 *
	 * @return  array  An array of available transport handlers
	 *
	 * @since   12.1
	 */
	public static function getHttpTransports()
	{
		$names = array();
<<<<<<< HEAD
		$iterator = new DirectoryIterator(__DIR__ . '/transport');

		/* @type  $file  DirectoryIterator */
=======
		$iterator = new DirectoryIterator(dirname(__FILE__) . '/transport');

>>>>>>> FETCH_HEAD
		foreach ($iterator as $file)
		{
			$fileName = $file->getFilename();

			// Only load for php files.
<<<<<<< HEAD
			if ($file->isFile() && $file->getExtension() == 'php')
=======
			// Note: DirectoryIterator::getExtension only available PHP >= 5.3.6
			if ($file->isFile() && substr($fileName, strrpos($fileName, '.') + 1) == 'php')
>>>>>>> FETCH_HEAD
			{
				$names[] = substr($fileName, 0, strrpos($fileName, '.'));
			}
		}

<<<<<<< HEAD
		// Keep alphabetical order across all environments
		sort($names);

		// If curl is available set it to the first position
		if ($key = array_search('curl', $names))
		{
			unset($names[$key]);
			array_unshift($names, 'curl');
		}

=======
>>>>>>> FETCH_HEAD
		return $names;
	}
}
