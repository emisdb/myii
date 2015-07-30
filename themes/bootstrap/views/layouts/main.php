<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/styles.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>

	<?php Yii::app()->bootstrap->register(); ?>
</head>

<body>

<?php $this->widget('bootstrap.widgets.TbNavbar',array(
    'items'=>array(
        array(
            'class'=>'bootstrap.widgets.TbMenu',
            'items'=>array(
                array('label'=>'главная', 'url'=>array('/site/index')),
                array('label'=>'yii-bootstrap', 'url'=>array('/bs/default/bs')),
                array('label'=>'bootstrap', 'url'=>array('/bs')),
             ),
        ),
    ),
)); ?>

<div id="page">


	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer" >
		Copyright &copy; <?php echo date('Y'); ?> by EMIS.DB
		All Rights Reserved.
	<p>	<?php echo Yii::powered()." ver.".Yii::getVersion(); ?> &nbsp; </p>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
