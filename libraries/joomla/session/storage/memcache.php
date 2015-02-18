<?php
/**
 * @package     Joomla.Platform
 * @subpackage  Session
 *
<<<<<<< HEAD
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
=======
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
>>>>>>> FETCH_HEAD
 * @license     GNU General Public License version 2 or later; see LICENSE
 */

defined('JPATH_PLATFORM') or die;

/**
 * Memcache session storage handler for PHP
 *
 * @since  11.1
 */
class JSessionStorageMemcache extends JSessionStorage
{
	/**
	 * @var array Container for memcache server conf arrays
	 */
	private $_servers = array();

	/**
	 * Constructor
	 *
	 * @param   array  $options  Optional parameters.
	 *
	 * @since   11.1
	 * @throws  RuntimeException
	 */
	public function __construct($options = array())
	{
		if (!self::isSupported())
		{
			throw new RuntimeException('Memcache Extension is not available', 404);
		}

		$config = JFactory::getConfig();
<<<<<<< HEAD
=======

		$this->_compress	= $config->get('memcache_compress', false)?MEMCACHE_COMPRESSED:false;
		$this->_persistent	= $config->get('memcache_persist', true);
>>>>>>> FETCH_HEAD

		// This will be an array of loveliness
		// @todo: multiple servers
		$this->_servers = array(
			array(
<<<<<<< HEAD
				'host' => $config->get('session_memcache_server_host', 'localhost'),
				'port' => $config->get('session_memcache_server_port', 11211)
			)
		);
=======
				'host' => $config->get('memcache_server_host', 'localhost'),
				'port' => $config->get('memcache_server_port', 11211)
			)
		);
	}
>>>>>>> FETCH_HEAD

		parent::__construct($options);
	}

	/**
	 * Register the functions of this class with PHP's session handler
	 *
	 * @return  void
	 *
	 * @since   12.2
	 */
	public function register()
	{
		if (!empty($this->_servers) && isset($this->_servers[0]))
		{
			$serverConf = current($this->_servers);
			ini_set('session.save_path', "{$serverConf['host']}:{$serverConf['port']}");
			ini_set('session.save_handler', 'memcache');
		}
	}

	/**
	 * Test to see if the SessionHandler is available.
	 *
	 * @return boolean  True on success, false otherwise.
	 *
	 * @since   12.1
	 */
	static public function isSupported()
	{
		return (extension_loaded('memcache') && class_exists('Memcache'));
	}
}
