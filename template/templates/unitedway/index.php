<!DOCTYPE html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7 ]> <html class="no-js ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]> <html class="no-js ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]> <html class="no-js ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html class="no-js" lang="<?= $this->language; ?>" dir="<?= $this->direction; ?>"> <!--<![endif]-->
<?php
// get current menu name
$menu = JSite::getMenu();
if ($menu && $menu->getActive())
    $menu = $menu->getActive()->alias;
else
	$menu = "";

if ($_SERVER['SERVER_PORT'] === 8888 ||
		$_SERVER['SERVER_ADDR'] === '127.0.0.1' ||
		stripos($_SERVER['SERVER_NAME'], 'ccistaging') !== false ||
		stripos($_SERVER['SERVER_NAME'], 'dev') === 0) {

	$testing = true;
	error_reporting(E_ALL);
	ini_set('display_errors', '1');
} else {
	$testing = false;
}

JHTML::_('behavior.mootools');
$analytics = null; // FIXME Update to client ID
$typekit = 'ubu2hmw';
?>

<head>
	<meta charset="utf-8" />
	<?= ($testing)? '':  '<meta http-equiv="X-UA-Compatible" contents="IE=edge,chrome=1">' ?>

 	<jdoc:include type="head" />

	<meta name="viewport" content="width=940px, initial-scale=1.0">
	<link rel="shortcut icon" href="/templates/<?= $this->template ?>/resources/favicon.ico">
	<link rel="apple-touch-icon" href="/templates/<?= $this->template ?>/resources/apple-touch-icon.png">

	<!-- load css -->
	<?php if ($testing): ?>
		<!--[if (gt IE 8) | (IEMobile)]><!-->
			<link rel="stylesheet" href="/templates/<?= $this->template ?>/css/template.css">
		<!--<![endif]-->
		<!--[if (lt IE 9) & (!IEMobile)]>
			<link rel="stylesheet" href="/templates/<?= $this->template ?>/css/template-ie.css">
		<![endif]-->
	<?php else: ?>
		<!--[if (gt IE 8) | (IEMobile)]><!-->
			<link rel="stylesheet" href="/templates/<?= $this->template ?>/css/template.min.css">
		<!--<![endif]-->
		<!--[if (lt IE 9) & (!IEMobile)]>
			<link rel="stylesheet" href="/templates/<?= $this->template ?>/css/template-ie.min.css">
		<![endif]-->
	<?php endif; ?>

	<script src="/templates/<?= $this->template ?>/js/libs/modernizr-1.7.min.js"></script>
	<?php if ($typekit): ?>
		<!-- load typekit -->
		<script type="text/javascript" src="http://use.typekit.com/<?= $typekit ?>.js"></script>
		<script type="text/javascript">try{Typekit.load();}catch(e){}</script>
	<?php endif; ?>
</head>

<body class="<?= $menu ?>">

	<div id="wrapper">
		
		<div id="header"><div class="container">
			<jdoc:include type="modules" name="header" style="rounded" />
			<div class="clear"></div>
		</div></div>
		
		<div class="container">
			<div id="masthead">
				<jdoc:include type="modules" name="masthead" style="rounded" />
			</div>

			<div id="prebody">
				<jdoc:include type="modules" name="prebody" style="rounded" />
			</div>

			<div id="main">
				<div id="content">
					<?php if ($this->countModules('precontent')): ?>
						<jdoc:include type="modules" name="precontent" style="rounded" />
					<?php endif; ?>

					<jdoc:include type="message" />
					<article>
						<jdoc:include type="component" />
					</article>

					<?php if ($this->countModules('postcontent')): ?>
						<jdoc:include type="modules" name="postcontent" style="rounded" />
					<?php endif; ?>
				</div>
				
				<?php if ($this->countModules('postbody')): ?>
				<div id="postbody">
					<jdoc:include type="modules" name="postbody" style="rounded" />
				</div>
				<?php endif; ?>

				<?php if ($this->countModules('sidebar')): ?>
					<div id="sidebar">
						<jdoc:include type="modules" name="sidebar" style="rounded" />
					</div>
				<?php endif; ?>
				
				<div class="clear"></div>

				<div id="bottom">
					<jdoc:include type="modules" name="bottom" style="rounded" />
				</div>
			</div>	<!-- end of main -->
			<div class="clear"></div>
		</div> <!-- end of container -->

		<div id="footer"><div class="container">
			<jdoc:include type="modules" name="footer" style="xhtml" />
			<div class="left">
				<div>&copy; <?php echo date('Y') ?> United Way Sarnia-Lambton. All Rights Reserved.<br/>
							Site by <a href="http://ccistudios.com" target="_blank">CCI Studios</a>
				</div>
			</div>
		</div></div>



		<div id="debug">
			<jdoc:include type="modules" name="debug" />
		</div>
	</div>

	<div class="hidden">
		<jdoc:include type="modules" name="hidden" style="raw" />
	</div>

	<!-- load scripts -->
	<?php if ($testing): ?>
		<script src="/templates/<?= $this->template ?>/js/numbering.js"></script>
		<script src="/templates/<?= $this->template ?>/js/columns.js"></script>
		<script src="/templates/<?= $this->template ?>/js/dropmenu.js"></script>
		<script src="/templates/<?= $this->template ?>/js/html5.js"></script>
		<script src="/templates/<?= $this->template ?>/js/lettering.js"></script>
		<script src="/templates/<?= $this->template ?>/js/rollover.js"></script>
	<?php else: ?>
		<?php if ($analytics): ?>
			<script>
				var _gaq=[["_setAccount","<?php echo $analytics?>"],["_trackPageview"]];
				(function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];g.async=1;
					g.src=("https:"==location.protocol?"//ssl":"//www")+".google-analytics.com/ga.js";
					s.parentNode.insertBefore(g,s)}(document,"script"));
		  	</script>
		<?php endif; ?>
		<script src="/templates/<?= $this->template ?>/js/scripts-ck.js"></script>
	<?php endif; ?>
</body>
</html>
