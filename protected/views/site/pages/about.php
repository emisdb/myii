    <?php

	Yii::app()->clientScript->registerCoreScript('jquery.ui'); 
	Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/jquery.flip.min.js',CClientScript::POS_HEAD); 
	Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/myjs.js',CClientScript::POS_HEAD); 
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
	<div style="position:relative;">
		<div style="position:static;margin-left: 600px;">
			<div id="card"> 
				<div class="front" style= "height: 100%; width: 100%; backface-visibility: hidden; transform-style: preserve-3d; position: absolute; z-index: 1; transition: all 0.5s ease-out; transform: rotateX(0deg);"> 
					<?php echo CHtml::image(Yii::app()->request->baseUrl."/images/my_pic.jpg", "me", array("style"=>"margin:10px;"))?>
				</div> 
				<div class="back" style="transform: rotateX(180deg); height: 100%; width: 100%; backface-visibility: hidden; transform-style: preserve-3d; position: absolute; z-index: 0; transition: all 0.5s ease-out;">
					<?php echo CHtml::image(Yii::app()->request->baseUrl."/images/my_pic_equip.jpg", "me", array("style"=>"margin:10px;"))?>
				</div> 
			</div>
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
     	</div>
</div><!---->  
<script type="text/javascript">
$("#card").flip({
  axis: 'y',
  trigger: 'hover'
});
</script>
