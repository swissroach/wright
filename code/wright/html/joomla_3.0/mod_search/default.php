<?php
// Wright v.3 Override: Joomla 3.1.1
/**
 * @package     Joomla.Site
 * @subpackage  mod_search
 *
 * @copyright   Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

/* Wright v.3: Custom Image for style */
	if ($button && $imagebutton) {
		$app = JFactory::getApplication();
		$template = $app->getTemplate(true);
		$user = JFactory::getUser();
		$style = JRequest::getVar('templateTheme',$user->getParam('theme',$template->params->get('style','generic')));
		if (file_exists(JPATH_SITE . '/templates/' . $template->template . '/images/' . $style . '/searchButton.gif')) {
			$img = JURI::base() . '/templates/' . $template->template . '/images/' . $style . '/searchButton.gif';
		}
	}
/* End Wright v.3: Custom Image for style */

?>
<div class="search<?php echo $moduleclass_sfx ?>">
    <form action="<?php echo JRoute::_('index.php');?>" method="post" class="form-inline">
    		<?php
				$output = '<label for="mod-search-searchword" class="element-invisible">' . $label . '</label> <input name="searchword" id="mod-search-searchword" maxlength="' . $maxlength . '"  class="inputbox search-query" type="text" size="' . $width . '" value="' . $text . '"  onblur="if (this.value==\'\') this.value=\'' . $text . '\';" onfocus="if (this.value==\'' . $text . '\') this.value=\'\';" />';

				if ($button) :
					if ($imagebutton) :
						$button = ' <input type="image" value="' . $button_text . '" class="button" src="' . $img . '" onclick="this.form.searchword.focus();"/>';
					else :
						$button = ' <button class="button btn btn-primary" onclick="this.form.searchword.focus();">' . $button_text . '</button>';
					endif;
				endif;

				switch ($button_pos) :
					case 'top' :
						$button = $button . '<br />';
						$output = $button . $output;
						break;

					case 'bottom' :
						$button = '<br />' . $button;
						$output = $output . $button;
						break;

					case 'right' :
						$output = $output . $button;
						break;

					case 'left' :
					default :
						$output = $button . $output;
						break;
				endswitch;

				echo $output;
			?>
    	<input type="hidden" name="task" value="search" />
    	<input type="hidden" name="option" value="com_search" />
    	<input type="hidden" name="Itemid" value="<?php echo $mitemid; ?>" />
    </form>
</div>
