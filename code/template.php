<?php
/**
 * @copyright	Copyright (C) 2005 - 2012 Joomlashack / Meritage Assets
 * @author		Joomlashack
 * @package		Wright
 *
 * Do not edit this file directly. You can copy it and create a new file called
 * 'custom.php' in the same folder, and it will override this file. That way
 * if you update the template ever, your changes will not be lost.
 */
// no direct access
defined('_JEXEC') or die('Restricted access');

// get the bootstrap row mode ( row / row-fluid )
$gridMode = $this->params->get('bs_rowmode','row-fluid');
$containerClass = 'container';
if ($gridMode == 'row-fluid') {
    $containerClass = 'container-fluid';
}

$bodyclass = "";
if ($this->countModules('toolbar')) {
	$bodyclass = "toolbarpadding";
}

?>
<doctype>
<html>
<head>
	
<w:head />
</head>
<body<?php if ($bodyclass != "") :?> class="<?php echo $bodyclass?>"<?php endif; ?>>
    <?php if ($this->countModules('toolbar')) : ?>
    <!-- menu -->
	<w:nav type="<?php echo $gridMode; ?>" name="toolbar" chrome="wrightmenu" wrapclass="navbar-fixed-top navbar-inverse" class="toolbar container" />
    <?php endif; ?>
    <div class="<?php echo $containerClass ?>">
        <!-- header -->
        <header id="header">
        	<div class="<?php echo $gridMode; ?> clearfix">
        		<w:logo name="top" />
        		<div class="clear"></div>
        	</div>
        </header>
        <?php if ($this->countModules('menu')) : ?>
        <!-- menu -->
   		<w:nav type="<?php echo $gridMode; ?>" name="menu" chrome="wrightmenu" />
        <?php endif; ?>
        <!-- featured -->
        <?php if ($this->countModules('featured')) : ?>
        <div id="featured">
            <w:module type="<?php echo $gridMode; ?>" name="featured" chrome="wrightflexgrid" />
        </div>
        <?php endif; ?>
        <!-- grid-top -->
        <?php if ($this->countModules('grid-top')) : ?>
        <div id="grid-top">
            <w:module type="<?php echo $gridMode; ?>" name="grid-top" chrome="wrightflexgrid" />
        </div>
        <?php endif; ?>
        <?php if ($this->countModules('grid-top2')) : ?>
        <!-- grid-top2 -->
        <div id="grid-top2">
            <w:module type="<?php echo $gridMode; ?>" name="grid-top2" chrome="wrightflexgrid" />
        </div>
        <?php endif; ?>
        <div id="main-content" class="row-fluid">
            <!-- sidebar1 -->
            <aside id="sidebar1">
            	<w:module name="sidebar1" chrome="xhtml" />
            </aside>
            <!-- main -->
            <section id="main">
                <?php if ($this->countModules('above-content')) : ?>
                <!-- above-content -->
                <div id="above-content">
                    <w:module type="<?php echo $gridMode; ?>" name="above-content" chrome="wrightflexgrid" />
                </div>
                <?php endif; ?>
            	<?php if ($this->countModules('breadcrumbs')) : ?>
                <!-- breadcrumbs -->
            	<div id="breadcrumbs">
            			<w:module type="single" name="breadcrumbs" chrome="none" />
            	</div>
            	<?php endif; ?>
            	<!-- component -->
            	<w:content />
                <?php if ($this->countModules('below-content')) : ?>
                <!-- below-content -->
                <div id="below-content">
                    <w:module type="<?php echo $gridMode; ?>" name="below-content" chrome="wrightflexgrid" />
                </div>
                <?php endif; ?>
            </section>
            <!-- sidebar2 -->
            <aside id="sidebar2">
            	<w:module name="sidebar2" chrome="xhtml" />
            </aside>
        </div>
        <?php if ($this->countModules('grid-bottom')) : ?>
        <!-- grid-bottom -->
        <div id="grid-bottom" >
    			<w:module type="<?php echo $gridMode; ?>" name="grid-bottom" chrome="wrightflexgrid" />
        </div>
        <?php endif; ?>
        <?php if ($this->countModules('grid-bottom2')) : ?>
        <!-- grid-bottom2 -->
        <div id="grid-bottom2" >
    			<w:module type="<?php echo $gridMode; ?>" name="grid-bottom2" chrome="wrightflexgrid" />
        </div>
        <?php endif; ?>
        <?php if ($this->countModules('bottom-menu')) : ?>
        <!-- bottom-menu -->
		<w:nav type="<?php echo $gridMode; ?>" name="bottom-menu" chrome="wrightmenu" />
        <?php endif; ?>
        
    </div>
    
        <!-- footer -->
    <footer id="footer" >
    	<?php if ($this->countModules('footer')) : ?>
    		
		<w:module type="<?php echo $gridMode; ?>" name="footer" chrome="wrightflexgrid" />
		 <?php endif; ?>
		<w:footer />
    </footer>
	
</body>
</html>
