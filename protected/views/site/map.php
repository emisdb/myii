    <?php

	Yii::app()->clientScript->registerCoreScript('jquery.ui'); 
	Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/map.js'); 
	$this->pageTitle=Yii::app()->name . ' - о нас';

	?>

  <div id="map_canvas" style="width:100%; height:100%"></div>
