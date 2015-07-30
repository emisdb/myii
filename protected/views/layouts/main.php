<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="ru" />
	<meta name="Author" content="Бюро разработки EMIS.DB" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/index.css" />
    <?php

	Yii::app()->clientScript->registerCoreScript('jquery.ui'); 
	Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/myjs.js'); 
	?>
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<!--div class="container" id="page"-->
<div id="page" class="container">
	<div id="header">
		<!--div id="logo"-->
		<ul>
			<li class="inactive movable"><a href=""><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/head/e_.jpg" alt=""/></a></li>
			<li class="inactive movable"><a href=""><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/head/m_.jpg" alt=""/></a></li>
			<li class="inactive movable"><a href=""><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/head/i_.jpg" alt=""/></a></li>
			<li class="inactive movable"><a href=""><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/head/s_.jpg" alt=""/></a></li>
			<li class="inactive"><a href=""><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/head/dot.jpg" alt=""/></a></li>
			<li class="inactive movable"><a href=""><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/head/d_.jpg" alt=""/></a></li>
			<li class="inactive movable"><a href=""><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/head/b_.jpg" alt=""/></a></li>
		</ul>
<div class="head">
бюро разработки информационных систем управления предприятием
</div>
		
		
		<!--/div-->
	</div><!-- header -->
	<div class="clear"></div>
<div class="top">
	<div id="mainmenu">
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'главная', 'url'=>array('/site/index')),
				array('label'=>'продукты', 'url'=>array('/bsp')),
				array('label'=>'каталог', 'url'=>array('/site/page', 'view'=>'prods')),
				array('label'=>'о нас', 'url'=>array('/site/page', 'view'=>'about')),
				array('label'=>'войти', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'выйти ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'пользователи', 'url'=>array('user/admin'), 'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'проекты', 'url'=>array('project/admin'), 'visible'=>!Yii::app()->user->isGuest),
			),
		)); 
                
                
                ?>
	</div><!-- mainmenu -->
	
</div>


	<!--div class="clear"></div-->

	<?php echo $content; ?>

	<!--div class="clear"></div-->


	<div id="footer">
<div class="canvas">

<br/>Copyright &copy; <?php echo date('Y'); ?> by EMIS.DB.
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>

</div>
</div>

</div><!-- page -->

</body>
</html>
