<?php defined('_JEXEC') or die; ?>

<? print_r($params); ?>

<div class="thermometer">
	<h2><?= $params->get('title1') ?></h2>
</div>

<div class="thermometer">
	<h2><?= $params->get('title2') ?></h2>
	<div class="thermo">
	</div>
	<div class="labels">
	</div>
	<div class="ball"></div>
</div>