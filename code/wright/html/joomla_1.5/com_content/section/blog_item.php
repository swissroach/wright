<?php // @version $Id: blog_item.php 21 2010-11-07 05:37:38Z jeremy $
defined('_JEXEC') or die('Restricted access');
?>

<?php if ($this->item->params->get('show_pdf_icon') || $this->item->params->get('show_print_icon') || $this->item->params->get('show_email_icon') || $this->user->authorize('com_content', 'edit', 'content', 'all') || $this->user->authorize('com_content', 'edit', 'content', 'own')) : ?>
	<ul class="actions">
		<?php if ($this->item->params->get('show_pdf_icon')) : ?>
		<li class="pdf-icon">
			<?php echo JHtml::_('icon.pdf', $this->item, $this->item->params, $this->access); ?>
		</li>
		<?php endif; ?>
		<?php if ($this->item->params->get('show_print_icon')) : ?>
		<li class="print-icon">
			<?php echo JHtml::_('icon.print_popup', $this->item, $this->item->params, $this->access); ?>
		</li>
		<?php endif; ?>
		<?php if ($this->item->params->get('show_email_icon')) : ?>
		<li class="email-icon">
			<?php echo JHtml::_('icon.email', $this->item, $this->item->params, $this->access); ?>
		</li>
		<?php endif; ?>
		<?php if ($this->user->authorize('com_content', 'edit', 'content', 'all') || $this->user->authorize('com_content', 'edit', 'content', 'own')) : ?>
		<li class="edit-icon">
			<?php echo JHTML::_('icon.edit', $this->item, $this->item->params, $this->access); ?>
		</li>
		<?php endif; ?>
	</ul>
<?php endif; ?>

<?php if ($this->item->params->get('show_title')) : ?>
	<h2>
		<?php if ($this->item->params->get('link_titles') && $this->item->readmore_link != '') : ?>
			<a href="<?php echo $this->item->readmore_link; ?>">
				<?php echo $this->escape($this->item->title); ?></a>
		<?php else :
			echo $this->escape($this->item->title);
		endif; ?>
	</h2>
<?php endif; ?>

<?php if (!$this->item->params->get('show_intro')) :
	echo $this->item->event->afterDisplayTitle;
endif; ?>

<?php echo $this->item->event->beforeDisplayContent; ?>

<?php $ShowArticleInfo = ((intval($this->item->modified) !=0 && $this->item->params->get('show_modify_date')) || ($this->item->params->get('show_author') && ($this->item->author != "")) || ($this->item->params->get('show_create_date')) || 
($this->item->params->get('show_section') && $this->item->sectionid) || ($this->item->params->get('show_category') && $this->item->catid)); ?>
<?php if ($ShowArticleInfo) : ?>
<div class="article-info-box">

	<?php if ($this->params->get('show_create_date') OR $this->params->get('show_modify_date')) : ?>
	<ul class="article-info">
		<?php if ($this->params->get('show_create_date')) : ?>
		<li class="create"> <?php echo JHTML::_('date', $this->item->created, JText::_('DATE_FORMAT_LC2')); ?> </li>
		<?php endif; ?>
		<?php if ($this->params->get('show_modify_date')) : ?>
		<li class="modified"> <?php echo JText::sprintf('LAST_UPDATED2', JHTML::_('date', $this->item->modified, JText::_('DATE_FORMAT_LC2'))); ?> </li>
		<?php endif; ?>
	</ul>
	<?php endif; ?>
	
	<?php $useRowTwo = (($this->params->get('show_author')) OR ($this->params->get('show_section')) OR $this->item->params->get('show_category')); ?>
	<?php if ($useRowTwo) : ?>
	<ul class="article-info">
		<?php if ($this->params->get('show_author') && !empty($this->item->author )) : ?>
		<li class="createdby">
			<?php JText::printf('Written by', ($this->item->created_by_alias ? $this->escape($this->item->created_by_alias) : $this->escape($this->item->author))); ?>
		</li>
		<?php endif; ?>
		<?php if ($this->item->params->get('show_section') && $this->item->sectionid) : ?>
		<li class="parent-category-name">
			<?php if ($this->item->params->get('link_section')) : ?>
			<?php echo '<a href="'.JRoute::_(ContentHelperRoute::getSectionRoute($this->item->sectionid)).'">'; ?>
			<?php endif; ?>
			<?php echo $this->escape($this->section->title); ?>
			<?php if ($this->item->params->get('link_section')) : ?>
			<?php echo '</a>'; ?>
			<?php endif; ?>
		</li>
		<?php endif; ?>
		<?php if ($this->item->params->get('show_category') && $this->item->catid) : ?>
		<li class="category-name">
			<?php if ($this->item->params->get('link_category')) : ?>
			<?php echo '<a href="'.JRoute::_(ContentHelperRoute::getCategoryRoute($this->item->catslug, $this->item->sectionid)).'">'; ?>
			<?php endif; ?>
			<?php echo $this->escape($this->item->category); ?>
			<?php if ($this->item->params->get('link_category')) : ?>
			<?php echo '</a>'; ?>
			<?php endif; ?>
		</li>
		<?php endif; ?>
	</ul>
	<?php endif; ?>
	
</div>
<?php endif; ?>

<?php if (isset ($this->item->toc)) :
	echo $this->item->toc;
endif; ?>

<?php echo JFilterOutput::ampReplace($this->item->text);  ?>

<?php if ($this->item->params->get('show_readmore') && $this->item->readmore) : ?>
<p class="readmore">
	<a href="<?php echo $this->item->readmore_link; ?>" class="readon<?php echo $this->escape($this->item->params->get('pageclass_sfx')); ?>">
		<?php if ($this->item->readmore_register) :
			echo JText::_('Register to read more...');
		elseif ($readmore = $this->item->params->get('readmore')) :
			echo $readmore;
		else :
			echo JText::sprintf('Read more', $this->escape($this->item->title));
		endif; ?></a>
</p>
<?php endif; ?>

<div class="item-separator"></div>
<?php echo $this->item->event->afterDisplayContent;