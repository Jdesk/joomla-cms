<?php
/**
<<<<<<< HEAD
 * @package     Joomla.Administrator
 * @subpackage  mod_feed
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
 * Helper for mod_feed
 *
 * @since  1.5
 */
class ModFeedHelper
{
	/**
	 * Method to load a feed.
	 *
	 * @param   JRegisty  $params  The parameters object.
	 *
	 * @return  JFeedReader|string  Return a JFeedReader object or a string message if error.
	 *
	 * @since   1.5
	 */
	public static function getFeed($params)
	{
		// Module params
		$rssurl = $params->get('rssurl', '');

<<<<<<< HEAD
		// Get RSS parsed object
		try
		{
			jimport('joomla.feed.factory');
			$feed   = new JFeedFactory;
			$rssDoc = $feed->getFeed($rssurl);
=======
		$filter = JFilterInput::getInstance();

		// get RSS parsed object
		$cache_time = 0;
		if ($params->get('cache'))
		{
			/*
			 * The cache_time will get fed into JCache to initiate the feed_parser cache group and eventually
			 * JCacheStorage will multiply the value by 60 and use that for its lifetime. The only way to sync
			 * the feed_parser cache (which caches with an empty dataset anyway) with the module cache is to
			 * first divide the module's cache time by 60 then inject that forward, which once stored into the
			 * JCacheStorage object, will be the correct value in minutes.
			 */
			$cache_time  = $params->get('cache_time', 15) / 60;
>>>>>>> FETCH_HEAD
		}
		catch (Exception $e)
		{
			return JText::_('MOD_FEED_ERR_FEED_NOT_RETRIEVED');
		}

		if (empty($rssDoc))
		{
			return JText::_('MOD_FEED_ERR_FEED_NOT_RETRIEVED');
		}

		return $rssDoc;
	}
}
