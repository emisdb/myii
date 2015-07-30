    <?php

	Yii::app()->clientScript->registerCoreScript('jquery.ui'); 
//	Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/myjs.js'); 
	$this->pageTitle=Yii::app()->name . ' - голова';

	?>

<div id="head">
<h1>исследовательское и опытно-конструкторское подразделение:</h1>
<span id="close"><a href="<?php echo $this->createUrl('/site/page', array('view'=>'about'))?>"><назад</a></span>
<ul>
<li>разработка новых ассортиментных позиций, доработка и усовершенствование существующих изделий</li>

<li>проведение, в содействии с крупнейшими отропедическими институми и медицинскими учреждениями, эксплуатационных и клинических испытаний</li>
<li>
осуществление контроля качества производимых изделий в соответствии со стандартами и принципами Всемирной организации здравоохранения (ВОЗ)
</li>
</ul>
<div id="head_pics">
    <?php
	
		echo "<img src='".Yii::app()->request->baseUrl.SIMG_PATH."img_head.png' >\n";
		echo "<img src='".Yii::app()->request->baseUrl.SIMG_PATH."img_head.png' >\n";
		echo "<img src='".Yii::app()->request->baseUrl.SIMG_PATH."img_head.png' >\n";
	?>
</div>
</div>
