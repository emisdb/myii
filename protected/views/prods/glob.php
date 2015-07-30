	<?php $this->pageTitle=$model->name; ?>
 <?php if(is_null($model->good_num) or !($model->good_num>1)) 
		echo '<div class="norm"><img  alt="photo" src="'.Yii::app()->request->baseUrl.GOOD_PATH.$model->good.'"/></div>';
		else
		{
			echo '<div style="text-align:center; width:600px;">Нажмите для вращения</div>'; 
			echo '<div class="beonoGlobus"> ';
			echo '<img alt="photo" src="'.Yii::app()->request->baseUrl.GOOD_PATH.$model->good.'"/>';
			echo '<div class="beonoGlobus-controls">';
			echo '<div class="beonoGlobus-left"></div>';
			echo '<div class="beonoGlobus-right"></div></div></div>';
			echo '<script type="text/javascript">';
			echo '$(document).ready(function () {   $(".beonoGlobus").beonoGlobus({ ';
			echo 'framesCount: '.$model->good_num.',';
			echo 'fadeInTime: 1000, rotateLeftButton : "div.beonoGlobus-left",rotateRightButton : "div.beonoGlobus-right"';
			echo '    }); });</script> ';
		}
 ?>
 <script type="text/javascript"> 
  window.resizeTo(640, 540);
 </script> 