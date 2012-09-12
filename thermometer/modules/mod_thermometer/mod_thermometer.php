<?php
defined('_JEXEC') or die;
JFactory::getDocument()->addStyleSheet('/modules/mod_thermometer/mod_thermometer.css');
?>

<? for ($tm = 1; $tm <= 2; $tm ++): ?>
	<div class="mod_thermometer">
		<h2><?= $params->get("name$tm") ?></h2>
		<p>Current $<?= number_format($params->get("current$tm"), 0, '.', ','); ?></p>
		<div class="thermo">
			<div class="asdf">
				<ul>
					<li>Goal $<?= number_format($params->get("goal$tm"), 0, '.', ',') ?></li>
					<? for($i = 7; $i >= 1; $i--): ?>
						<li>$<?= number_format($i * $params->get("goal$tm")/8.0, 0, '.', ',') ?></li>
					<? endfor; ?>
					<li>0</li>
				</ul>
				<div class="mercury" style="height: <?= $params->get("current$tm")/$params->get("goal$tm")*100 ?>%;"></div>
			</div>
			<div class="ball"></div>
		</div>
	</div>
<? endfor; ?>