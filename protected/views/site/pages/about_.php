    <?php

	Yii::app()->clientScript->registerCoreScript('jquery.ui'); 
	Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/myjs.js'); 
	$this->pageTitle=Yii::app()->name . ' - о нас';

	?>

<div id="layer1">
</div>
<div id="layer2">
	<h2>Движение - это мы сами, наш мир, наши мысли, радости</h2>
	<h2> и огорчения. Движение - это все.</h2>
	<h2>Мы даем возможность двигаться без боли и усталости.</h2>
	<h2>Мы даем комфорт, безопасность и свободу</h2>
</div>
<div id="layer3">
	<a href="<?php echo $this->createUrl('/site/page', array('view'=>'head'))?>"><div class="icon head_icon"></div></a>
	<div id="head_" class="label_">Исследовательское и опытно-контструкторское подразделение</div>
	<a href="#"><div class="icon work_icon"></div></a>	
	<div id="work_" class="label_">Производственные объединения</div>
	<a href="#"><div class="icon globe_icon"></div></a>
	<div id="globe_" class="label_">Подразделение внешнеэкономической деятельности</div>
	<a href="#"><div class="icon truck_icon"></div></a>	
	<div id="truck_" class="label_">Логистическое подразделение</div>
	<a href="#"><div class="icon hands_icon"></div></a>
	<div id="hands_" class="label_">Отдел оптовых продаж</div>	
	<div class="dugi topleft"></div>	
	<div class="dugi topright"></div>	
	<div class="dugi bottomleft"></div>	
	<div class="dugi bottomright"></div>	
</div>