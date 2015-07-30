    <?php

	Yii::app()->clientScript->registerScriptFile("https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"); 
	Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/jquery.easing.1.3.js'); 
	Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/jquery.gridAccordion.min.js'); 
	Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/prods.js'); 
	$css=Yii::app()->request->baseUrl."/css/grid-accordion.css";
	$cs = Yii::app()->getClientScript();
	$cs->registerCssFile($css);
	$css=Yii::app()->request->baseUrl."/css/grid-accordion-example.css";
	$cs->registerCssFile($css);
	$this->pageTitle=Yii::app()->name . ' - продукты';

	?>
<div class="canvas_center"><!-- -->      
		<ul class="accordion">
                <li>
                    <?php echo CHtml::image(Yii::app()->request->baseUrl.'/images/prods/paysys.png '); ?>
                    <div class="caption">Он-лайн программа учета заказов и их оплат.</div>
                </li>
                 <li>
                    <img src="http://bqworks.com/products/grid-accordion/images/3.jpg"/>
                    <div class="caption">You can also add <b>HTML</b> elements like <a href="http://codecanyon.net">links</a> or <input type="button" value="Buttons"/></div>
                </li>
                 <li>
                    <img src="http://bqworks.com/products/grid-accordion/images/5.jpg"/>
                    <div class="caption"><u>Title</u><br/><br/>This is a list of items:<ul><li>first item</li><li>second item</li><li>third item</li></ul></div>
                </li>
                 <li>
                    <img src="http://bqworks.com/products/grid-accordion/images/8.jpg"/>
                    <div class="caption">Captions can have any position and any size.</div>
                </li>
                <li>
                    <img src="http://bqworks.com/products/grid-accordion/images/9.jpg"/>
                     <div class="caption">You can also add <b>HTML</b> elements like <a href="http://codecanyon.net">links</a> or <input type="button" value="Buttons"/></div>
                </li>
                 <li>
                    <img src="http://bqworks.com/products/grid-accordion/images/11.jpg"/>
                </li>
                <li>
                    <img src="http://bqworks.com/products/grid-accordion/images/12.jpg"/>
                </li>
                 <li>
                    <img src="http://bqworks.com/products/grid-accordion/images/14.jpg"/>
                </li>
                <li>
                    <img src="http://bqworks.com/products/grid-accordion/images/15.jpg"/>
                    <div class="caption"><u>Title</u><br/><br/>This is a list of items:<ul><li>first item</li><li>second item</li><li>third item</li></ul></div>
                </li>
                  <li>
                    <img src="http://bqworks.com/products/grid-accordion/images/19.jpg"/>
                     <div class="caption">You can also add <b>HTML</b> elements like
                         <a href="http://codecanyon.net">links</a> or <input type="button" value="Buttons"/></div>
                </li>
                <li>
                    <img src="http://bqworks.com/products/grid-accordion/images/21.jpg"/>
                    <div class="caption"><u>Title</u><br/><br/>This is a list of items:<ul><li>first item</li><li>second item</li><li>third item</li></ul></div>
                </li>
                 <li>
                    <img src="http://bqworks.com/products/grid-accordion/images/23.jpg"/>
                    <div class="caption">You can also add <b>HTML</b> elements like <a href="http://codecanyon.net">links</a> or <input type="button" value="Buttons"/></div>
                </li>
  		</ul>
 	</div><!---->  