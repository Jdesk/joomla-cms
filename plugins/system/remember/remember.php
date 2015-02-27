<?php
/**
<<<<<<< HEAD
 * @package     Joomla.Plugin
 * @subpackage  System.remember
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
=======
 * @copyright	Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
>>>>>>> FETCH_HEAD
 */

defined('_JEXEC') or die;

/**
 * Joomla! System Remember Me Plugin
 *
 * @since  1.5
 */

class PlgSystemRemember extends JPlugin
{
	/**
	 * Application object.
	 *
	 * @var    JApplicationCms
	 * @since  3.2
	 */
	protected $app;

	/**
	 * Remember me method to run onAfterInitialise
	 * Only purpose is to initialise the login authentication process if a cookie is present
	 *
	 * @return  void
	 *
	 * @since   1.5
	 * @throws  InvalidArgumentException
	 */
	public function onAfterInitialise()
	{
		// Get the application if not done by JPlugin. This may happen during upgrades from Joomla 2.5.
		if (!$this->app)
		{
			$this->app = JFactory::getApplication();
		}

		// No remember me for admin.
		if ($this->app->isAdmin())
		{
			return;
		}

		// Check for a cookie if user is not logged in
		if (JFactory::getUser()->get('guest'))
		{
			$cookieName = JUserHelper::getShortHashedUserAgent();

			// Check for the cookie
			if ($this->app->input->cookie->get($cookieName))
			{
<<<<<<< HEAD
				$this->app->login(array('username' => ''), array('silent' => true));
			}
		}
	}
=======
				jimport('joomla.utilities.simplecrypt');
				$credentials = array();
				$goodCookie = true;
				$filter = JFilterInput::getInstance();
>>>>>>> FETCH_HEAD

	/**
	 * Imports the authentication plugin on user logout to make sure that the cookie is destroyed.
	 *
	 * @param   array  $user     Holds the user data.
	 * @param   array  $options  Array holding options (remember, autoregister, group).
	 *
	 * @return  boolean
	 */
	public function onUserLogout($user, $options)
	{
		// No remember me for admin
		if ($this->app->isAdmin())
		{
			return true;
		}

<<<<<<< HEAD
		$cookieName = JUserHelper::getShortHashedUserAgent();

		// Check for the cookie
		if ($this->app->input->cookie->get($cookieName))
		{
			// Make sure authentication group is loaded to process onUserAfterLogout event
			JPluginHelper::importPlugin('authentication');
=======
				$key = new JCryptKey('simple', $privateKey, $privateKey);
				$crypt = new JCrypt(new JCryptCipherSimple, $key);
			
				try
				{
					$str = $crypt->decrypt($str);
					if (!is_string($str))
					{
						throw new Exception('Decoded cookie is not a string.');
					}

					$cookieData = json_decode($str);
					if (null === $cookieData)
					{
						throw new Exception('JSON could not be docoded.');
					}
					if (!is_object($cookieData))
					{
						throw new Exception('Decoded JSON is not an object.');
					}

					// json_decoded cookie could be any object structure, so make sure the
					// credentials are well structured and only have user and password.
					if (isset($cookieData->username) && is_string($cookieData->username))
					{
						$credentials['username'] = $filter->clean($cookieData->username, 'username');
					}
					else
					{
						throw new Exception('Malformed username.');
					}
					if (isset($cookieData->password) && is_string($cookieData->password))
					{
						$credentials['password'] = $filter->clean($cookieData->password, 'string');
					}
					else
					{
						throw new Exception('Malformed password.');
					}

					$return = $app->login($credentials, array('silent' => true));
					if (!$return)
					{
						throw new Exception('Log-in failed.');
					}

				}
				catch (Exception $e)
				{
					$config = JFactory::getConfig();
					$cookie_domain = $config->get('cookie_domain', '');
					$cookie_path = $config->get('cookie_path', '/');
					// Clear the remember me cookie
					setcookie(
						JApplication::getHash('JLOGIN_REMEMBER'), false, time() - 86400,
						$cookie_path, $cookie_domain
					);
					JLog::add('A remember me cookie was unset for the following reason: ' . $e->getMessage(), JLog::WARNING, 'security');
				}
			}
>>>>>>> FETCH_HEAD
		}

		return true;
	}
}
