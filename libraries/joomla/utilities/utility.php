<?php
/**
 * @package     Joomla.Platform
 * @subpackage  Utilities
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
 * JUtility is a utility functions class
 *
 * @since  11.1
 */
class JUtility
{
	/**
	 * Method to extract key/value pairs out of a string with XML style attributes
	 *
	 * @param   string  $string  String containing XML style attributes
	 *
	 * @return  array  Key/Value pairs for the attributes
	 *
	 * @since   11.1
	 */
	public static function parseAttributes($string)
	{
		$attr = array();
		$retarray = array();

		// Let's grab all the key/value pairs using a regular expression
		preg_match_all('/([\w:-]+)[\s]?=[\s]?"([^"]*)"/i', $string, $attr);

		if (is_array($attr))
		{
			$numPairs = count($attr[1]);

			for ($i = 0; $i < $numPairs; $i++)
			{
				$retarray[$attr[1][$i]] = $attr[2][$i];
			}
		}

		return $retarray;
	}
}
