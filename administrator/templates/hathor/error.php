<?php
/**
<<<<<<< HEAD
 * @package     Joomla.Administrator
 * @subpackage  Template.hathor
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
=======
 * @package		Joomla.Administrator
 * @subpackage	Templates.hathor
 * @copyright	Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * @since		1.6
>>>>>>> FETCH_HEAD
 */

defined('_JEXEC') or die;

$app = JFactory::getApplication();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>" >
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<<<<<<< HEAD
	<title><?php echo $this->title; ?> <?php echo htmlspecialchars($this->error->getMessage(), ENT_QUOTES, 'UTF-8'); ?></title>
	<link rel="stylesheet" href="<?php echo $this->baseurl; ?>/templates/<?php echo  $this->template; ?>/css/error.css" type="text/css" />
	<?php if ($app->get('debug_lang', '0') == '1' || $app->get('debug', '0') == '1') : ?>
		<!-- Load additional CSS styles for debug mode-->
		<link rel="stylesheet" href="<?php echo JUri::root(); ?>/media/cms/css/debug.css" type="text/css" />
	<?php endif; ?>
=======
	<title><?php echo $this->error->getCode(); ?> - <?php echo htmlspecialchars($this->error->getMessage(), ENT_QUOTES, 'UTF-8'); ?></title>
	<link rel="stylesheet" href="templates/<?php echo  $this->template ?>/css/error.css" type="text/css" />

>>>>>>> FETCH_HEAD
	<!-- Load additional CSS styles for rtl sites -->
	<?php if ($this->direction == 'rtl') : ?>
		<link href="<?php echo $this->baseurl; ?>/templates/<?php echo  $this->template; ?>/css/template_rtl.css" rel="stylesheet" type="text/css" />
	<?php endif; ?>

</head>
<body class="errors">
	<div>
<<<<<<< HEAD
		<h1>
			<?php echo $this->error->getCode(); ?> - <?php echo JText::_('JERROR_AN_ERROR_HAS_OCCURRED'); ?>
		</h1>
	</div>
	<div>
		<p><?php echo htmlspecialchars($this->error->getMessage(), ENT_QUOTES, 'UTF-8'); ?></p>
		<p><a href="index.php"><?php echo JText::_('JGLOBAL_TPL_CPANEL_LINK_TEXT'); ?></a></p>
		<?php if ($this->debug) : ?>
			<?php echo $this->renderBacktrace(); ?>
		<?php endif; ?>
=======
		<h1><?php echo $this->error->getCode() ?> - <?php echo JText::_('JERROR_AN_ERROR_HAS_OCCURRED') ?></h1>
	</div>
	<div>
		<p><?php echo htmlspecialchars($this->error->getMessage(), ENT_QUOTES, 'UTF-8'); ?></p>
		<p><a href="index.php"><?php echo JText::_('JGLOBAL_TPL_CPANEL_LINK_TEXT') ?></a></p>
		<?php if ($this->debug) :
			echo $this->renderBacktrace();
		endif; ?>
>>>>>>> FETCH_HEAD
	</div>
	<div class="clr"></div>
	<noscript>
			<?php echo JText::_('JGLOBAL_WARNJAVASCRIPT'); ?>
	</noscript>
</body>
</html>
