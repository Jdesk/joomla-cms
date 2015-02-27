<?php
/**
<<<<<<< HEAD
 * @package     Joomla.Site
 * @subpackage  com_content
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
 * HTML View class for the Content component
 *
 * @since  1.5
 */
class ContentViewCategory extends JViewCategoryfeed
{
<<<<<<< HEAD
	/**
	 * @var    string  The name of the view to link individual items to
	 * @since  3.2
	 */
	protected $viewName = 'article';

	/**
	 * Method to reconcile non standard names from components to usage in this class.
	 * Typically overriden in the component feed view class.
	 *
	 * @param   object  $item  The item for a feed, an element of the $items array.
	 *
	 * @return  void
	 *
	 * @since   3.2
	 */
	protected function reconcileNames($item)
	{
		// Get description, author and date
		$app               = JFactory::getApplication();
		$params            = $app->getParams();
		$item->description = $params->get('feed_summary', 0) ? $item->introtext . $item->fulltext : $item->introtext;
=======
	function display($tpl = null)
	{
		$app		= JFactory::getApplication();
		$doc		= JFactory::getDocument();
		$params 	= $app->getParams();
		$feedEmail	= $app->getCfg('feed_email', 'author');
		$siteEmail	= $app->getCfg('mailfrom');

		// Get some data from the model
		JRequest::setVar('limit', $app->getCfg('feed_limit'));
		$category	= $this->get('Category');
		$rows		= $this->get('Items');

		$doc->link = JRoute::_(ContentHelperRoute::getCategoryRoute($category->id));
>>>>>>> FETCH_HEAD

		// Add readmore link to description if introtext is shown, show_readmore is true and fulltext exists
		if (!$item->params->get('feed_summary', 0) && $item->params->get('feed_show_readmore', 0) && $item->fulltext)
		{
			// Compute the article slug
<<<<<<< HEAD
			$item->slug = $item->alias ? ($item->id . ':' . $item->alias) : $item->id;
=======
			$row->slug = $row->alias ? ($row->id . ':' . $row->alias) : $row->id;

			// Url link to article
			$link = JRoute::_(ContentHelperRoute::getArticleRoute($row->slug, $row->catid, $row->language));
>>>>>>> FETCH_HEAD

			// URL link to article
			$link = JRoute::_(ContentHelperRoute::getArticleRoute($item->slug, $item->catid, $item->language));

<<<<<<< HEAD
			$item->description .= '<p class="feed-readmore"><a target="_blank" href ="' . $link . '">' . JText::_('COM_CONTENT_FEED_READMORE') . '</a></p>';
=======
			// Get description, author and date
			$description = ($params->get('feed_summary', 0) ? $row->introtext.$row->fulltext : $row->introtext);
			$author = $row->created_by_alias ? $row->created_by_alias : $row->author;
			@$date = ($row->publish_up ? date('r', strtotime($row->publish_up)) : '');

			// Load individual item creator class
			$item 				= new JFeedItem();
			$item->title		= $title;
			$item->link			= $link;
			$item->date			= $date;
			$item->category		= $row->category_title;
			$item->author		= $author;
			if ($feedEmail == 'site')
			{
 				$item->authorEmail = $siteEmail;
			}
			elseif($feedEmail === 'author')
			{
				$item->authorEmail = $row->author_email;
			}

			// Add readmore link to description if introtext is shown, show_readmore is true and fulltext exists
			if (!$params->get('feed_summary', 0) && $params->get('feed_show_readmore', 0) && $row->fulltext)
			{
				$description .= '<p class="feed-readmore"><a target="_blank" href ="' . $item->link . '">'.JText::_('COM_CONTENT_FEED_READMORE').'</a></p>';
			}

			// Load item description and add div
			$item->description	= '<div class="feed-description">'.$description.'</div>';

			// Loads item info into rss array
			$doc->addItem($item);
>>>>>>> FETCH_HEAD
		}

		$item->author = $item->created_by_alias ? $item->created_by_alias : $item->author;
	}
}
