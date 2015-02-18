<?php
/**
 * @package     Joomla.Platform
 * @subpackage  String
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
use Joomla\String\String;
=======
//
// PHP mbstring and iconv local configuration
//
// Check if mbstring extension is loaded and attempt to load it if not present except for windows
if (extension_loaded('mbstring') || ((!strtoupper(substr(PHP_OS, 0, 3)) === 'WIN' && dl('mbstring.so'))))
{
	// Make sure to suppress the output in case ini_set is disabled
	@ini_set('mbstring.internal_encoding', 'UTF-8');
	@ini_set('mbstring.http_input', 'UTF-8');
	@ini_set('mbstring.http_output', 'UTF-8');
}

// Same for iconv
if (function_exists('iconv') || ((!strtoupper(substr(PHP_OS, 0, 3)) === 'WIN' && dl('iconv.so'))))
{
	// These are settings that can be set inside code
	if (version_compare(PHP_VERSION, '5.6', '>='))
	{
		@ini_set('default_charset', 'UTF-8');
	}
	else
	{
		iconv_set_encoding("internal_encoding", "UTF-8");
		iconv_set_encoding("input_encoding", "UTF-8");
		iconv_set_encoding("output_encoding", "UTF-8");
	}
}

/**
 * Include the utf8 package
 */
jimport('phputf8.utf8');
jimport('phputf8.strcasecmp');
>>>>>>> FETCH_HEAD

/**
 * String handling class for utf-8 data
 * Wraps the phputf8 library
 * All functions assume the validity of utf-8 strings.
 *
 * @since       11.1
 * @deprecated  4.0  Use {@link \Joomla\String\String} instead unless otherwise noted.
 */
abstract class JString extends String
{
	/**
	 * Split a string in camel case format
	 *
	 * "FooBarABCDef"            becomes  array("Foo", "Bar", "ABC", "Def");
	 * "JFooBar"                 becomes  array("J", "Foo", "Bar");
	 * "J001FooBar002"           becomes  array("J001", "Foo", "Bar002");
	 * "abcDef"                  becomes  array("abc", "Def");
	 * "abc_defGhi_Jkl"          becomes  array("abc_def", "Ghi_Jkl");
	 * "ThisIsA_NASAAstronaut"   becomes  array("This", "Is", "A_NASA", "Astronaut")),
	 * "JohnFitzgerald_Kennedy"  becomes  array("John", "Fitzgerald_Kennedy")),
	 *
	 * @param   string  $string  The source string.
	 *
	 * @return  array   The splitted string.
	 *
	 * @deprecated  12.3 (Platform) & 4.0 (CMS) - Use JStringNormalise::fromCamelCase()
	 * @since   11.3
	 */
	public static function splitCamelCase($string)
	{
		JLog::add('JString::splitCamelCase has been deprecated. Use JStringNormalise::fromCamelCase.', JLog::WARNING, 'deprecated');

		return JStringNormalise::fromCamelCase($string, true);
	}

	/**
	 * Does a UTF-8 safe version of PHP parse_url function
	 *
	 * @param   string  $url  URL to parse
	 *
	 * @return  mixed  Associative array or false if badly formed URL.
	 *
	 * @see     http://us3.php.net/manual/en/function.parse-url.php
	 * @since   11.1
	 * @deprecated  4.0 (CMS) - Use {@link \Joomla\Uri\UriHelper::parse_url()} instead.
	 */
	public static function parse_url($url)
	{
<<<<<<< HEAD
		JLog::add('JString::parse_url has been deprecated. Use \\Joomla\\Uri\\UriHelper::parse_url.', JLog::WARNING, 'deprecated');

		return \Joomla\Uri\UriHelper::parse_url($url);
=======
		$result = false;

		// Build arrays of values we need to decode before parsing
		$entities = array('%21', '%2A', '%27', '%28', '%29', '%3B', '%3A', '%40', '%26', '%3D', '%24', '%2C', '%2F', '%3F', '%25', '%23', '%5B', '%5D');
		$replacements = array('!', '*', "'", "(", ")", ";", ":", "@", "&", "=", "$", ",", "/", "?", "%", "#", "[", "]");

		// Create encoded URL with special URL characters decoded so it can be parsed
		// All other characters will be encoded
		$encodedURL = str_replace($entities, $replacements, urlencode($url));

		// Parse the encoded URL
		$encodedParts = parse_url($encodedURL);

		// Now, decode each value of the resulting array
		if ($encodedParts)
		{
			foreach ($encodedParts as $key => $value)
			{
				$result[$key] = urldecode($value);
			}
		}

		return $result;
>>>>>>> FETCH_HEAD
	}
}
