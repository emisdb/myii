    <?php

	Yii::app()->clientScript->registerScriptFile("https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"); 
	Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/jquery.easing.1.3.js'); 
	Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/accord.js'); 
	$css=Yii::app()->request->baseUrl."/css/accord.css";
	$cs = Yii::app()->getClientScript();
	$cs->registerCssFile($css);
	$this->pageTitle=Yii::app()->name . ' - отсчет';

	?>

<div class="canvas_center"><!-- -->
	<!-- Start HTML: Accordion Demo #1 -->
	<ul id="accordion1">
		<li class="slide1">
			<div class="slide_handle"><div>Web программирование</div></div>
			<div class="slide_content">
				<div class="slide_caption">
					<div class="slide_caption_toggle" title="Toggle caption">жжж
						</div>
					<strong>Sumatran Tiger</strong> · A great shot by <a href="http://www.flickr.com/photos/30775272@N05/2884963755/" rel="cc:attributionURL">Brimac The 2nd</a>.
				</div>
					<ol>
						<li>Создание простых интернет сайтов на основе популярных CMS (Joomla, Wordpress)</li>
						<li>Создание сложных интернет-приложений на основе Yii Framework (пример: <a href="http://bb.elvispiter.ru">Система заказа щитов рекламного агентства Elvis</a>)</li>
						<li>Системы взаимодействия офисных компьютерных систем и интернет ресурсов предприятия</li>
					</ol>
			</div>
		</li>
		<li class="slide2">
			<div class="slide_handle"><div>Управление предприятием</div></div>
			<div class="slide_content">
				<a class="image" href="http://www.flickr.com/photos/petergorges/3787848361/"><img alt="Flower" width="240" height="240" src="images/katalog_no_logo.png" /></a>
				<div class="slide_caption">
					<div class="slide_caption_toggle" title="Toggle caption"><div></div></div>
					<strong>Macro Flower</strong> · Awesome nature captured by <a href="http://www.flickr.com/photos/petergorges/3787848361/" rel="cc:attributionURL">Maschinenraum</a>.
				</div>
			</div>
		</li>
		<li class="slide3">
			<div class="slide_handle"><div>Управление оборудованием</div></div>
			<div class="slide_content">
				<a class="image" href="http://www.flickr.com/photos/uajith_set1/2632346909/"><img alt="Butterfly" width="680" height="240" src="images/butterfly.jpg" /></a>
				<div class="slide_caption">
					<div class="slide_caption_toggle" title="Toggle caption"><div></div></div>
					<strong>Gorgeous Butterfly</strong> · Wow! Simply an amazing shot by <a href="http://www.flickr.com/photos/uajith_set1/2632346909/" rel="cc:attributionURL">Ajith</a>.
				</div>
			</div>
		</li>
		<li class="slide4">
			<div class="slide_handle"><div>1С: Предприятие</div></div>
			<div class="slide_content">
				<object style="float:left;" width="427" height="240">
				<param name="allowfullscreen" value="true" />
				<param name="allowscriptaccess" value="always" />
				<param name="movie" value="http://vimeo.com/moogaloop.swf?clip_id=1517843&amp;server=vimeo.com&amp;show_title=0&amp;show_byline=0&amp;show_portrait=0&amp;color=b80c46&amp;fullscreen=1" />
				<embed src="http://vimeo.com/moogaloop.swf?clip_id=1517843&amp;server=vimeo.com&amp;show_title=0&amp;show_byline=0&amp;show_portrait=0&amp;color=b80c46&amp;fullscreen=1" type="application/x-shockwave-flash" allowfullscreen="true" allowscriptaccess="always" width="427" height="240">
				</embed></object>
				<div style="float:left; padding:0 20px; width:213px;">
					<h2>Whoa!</h2>
					<p>
						Embedding video is possible too?
						Sure. Your slides can contain any HTML you want.
						Nice, huh?
					</p>
				</div>
			</div>
		</li>
	</ul>
	<!-- End HTML: Accordion Demo #1 -->	
	</div><!---->

