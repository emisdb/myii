    <?php

	Yii::app()->clientScript->registerCoreScript('jquery.ui'); 
	Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/myjs.js'); 
	$this->pageTitle=Yii::app()->name . ' - о нас';

	?>
<div class="canvas_center"><!-- -->      

<div id="layer1">
    Enterprise
</div>
<div id="layer2">
    Management
</div>
<div id="layer3">
    Information
</div>
<div id="layer4">
    Systems
</div> 
<div id="layer5">
    Development
</div> 
<div id="layer6">
    Bureau
</div> 
<ul class="contacts">
        <li>
            Контактное лицо: <b>Денис</b>
        </li>
       <li>
            Телефон рабочий: <b>+7(812)942-8310</b>
        </li>
        <li>
            Телефон мобильный: <b>+7(921)942-8310</b>
        </li>
       <li>
            Email: <a href="mailto:dentsi@yahoo.com">dentsi@yahoo.com</a>
</li>
       <li>
            Портфолио:
           <ul>
               <li>
                <?php 
 echo("<a href='".Yii::app()->request->baseUrl."/docs/Portfolio.doc'>Скачать в формате DOC на русском</a>");
                 ?>
            </li>

            <li>
                <?php 
 echo("<a href='".Yii::app()->request->baseUrl."/docs/Port_eng.doc'>English Portfolio in DOC format</a>");
                 ?>
            </li>
            </ul>
</li>
    </ul>
     	</div><!---->  