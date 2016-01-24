    <?php

//	Yii::app()->clientScript->registerCoreScript('jquery.ui'); 
	Yii::app()->clientScript->registerScriptFile("https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"); 
	Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/jquery.countdown.js'); 
	$css=Yii::app()->request->baseUrl."/css/countdown.css";
	$cs = Yii::app()->getClientScript();
	$cs->registerCssFile($css);
	$this->pageTitle=Yii::app()->name . ' - отсчет';

	?>
<div class="canvas_center">
				<h2>До начала работы сайта</h2> 
				<div id="countdown_wrap">
					<div id="countdown">
						<div id="defaultCountdown"></div>
						<div class="clear"></div>
					</div>
				</div>
</div>
		<script type="text/javascript">
		/* <![CDATA[  */ 
		jQuery(document).ready(function($){
			
			//Countdown	
			$(function () {
				var austDay = new Date();
				// the numbers are the date you're counting down to: year, month-1, day
				austDay = new Date(new Date(2016, 10-1, 29));
				// change the number in the timezone to adjust the end time
				$('#defaultCountdown').countdown({until: austDay, timezone: -8});
				$('#year').text(austDay.getFullYear());
			});

		});			
		/* ]]> */
		</script>
