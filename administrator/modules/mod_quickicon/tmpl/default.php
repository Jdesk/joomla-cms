<?php
/**
<<<<<<< HEAD
 * @package     Joomla.Administrator
 * @subpackage  mod_quickicon
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
=======
 * @package		Joomla.Administrator
 * @subpackage	mod_quickicon
 * @copyright	Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
>>>>>>> FETCH_HEAD
 */

defined('_JEXEC') or die;

$html = JHtml::_('links.linksgroups', ModQuickIconHelper::groupButtons($buttons));
?>
<?php if (!empty($html)) : ?>
	<div class="sidebar-nav quick-icons">
		<?php echo $html;?>
	</div>
<?php endif;?>
