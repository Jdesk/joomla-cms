<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_finder
 *
<<<<<<< HEAD
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
=======
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
>>>>>>> FETCH_HEAD
 * @license     GNU General Public License version 2 or later; see LICENSE
 */

defined('_JEXEC') or die;

/**
 * Index controller class for Finder.
 *
 * @since  2.5
 */
class FinderControllerIndex extends JControllerAdmin
{
	/**
	 * Method to get a model object, loading it if required.
	 *
	 * @param   string  $name    The model name. Optional.
	 * @param   string  $prefix  The class prefix. Optional.
	 * @param   array   $config  Configuration array for model. Optional.
	 *
	 * @return  object  The model.
	 *
	 * @since   2.5
	 */
	public function getModel($name = 'Index', $prefix = 'FinderModel', $config = array('ignore_request' => true))
	{
		$model = parent::getModel($name, $prefix, $config);

		return $model;
	}

	/**
	 * Method to purge all indexed links from the database.
	 *
	 * @return  boolean  True on success.
	 *
	 * @since   2.5
	 */
	public function purge()
	{
		JSession::checkToken() or jexit(JText::_('JINVALID_TOKEN'));

		// Remove the script time limit.
		@set_time_limit(0);

		$model = $this->getModel('Index', 'FinderModel');

		// Attempt to purge the index.
		$return = $model->purge();

		if (!$return)
		{
			$message = JText::_('COM_FINDER_INDEX_PURGE_FAILED', $model->getError());
			$this->setRedirect('index.php?option=com_finder&view=index', $message);

			return false;
		}
		else
		{
			$message = JText::_('COM_FINDER_INDEX_PURGE_SUCCESS');
			$this->setRedirect('index.php?option=com_finder&view=index', $message);

			return true;
		}
	}
}
