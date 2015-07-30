<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru" lang="ru">
<head>
	<meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/mybootstrap.css" />
  
  	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
            <!-- Bootstrap -->
                <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
       <div class="navbar navbar-default navbar-static-top" >
             <div class="navbar-header">
               <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#main_menu">
                    <span class="sr-only">navigation</span>
                    <span class="icon-bar"></span>
                   <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button> 
           <div class="container-fluid" style="padding-top:15px;">
               <?php echo CHtml::link(CHtml::encode(Yii::app()->name),array('/site/index')); ?>
          </div>
           </div>
            <div class="collapse navbar-collapse" id="main_menu">
                <ul class="nav navbar-nav">
                    <li class="dropdown">
                             <?php echo CHtml::link('домой<b class="caret"></b>','#',array('class'=>'dropdown-toggle','data-toggle'=>'dropdown')); ?>
                        <ul class="dropdown-menu">
                         <li><?php echo CHtml::link('главная',array('/site/index')); ?></li>
                         <li><?php echo CHtml::link('продукты',array('/site/page','view'=>'prods')); ?></li>
                         <li><?php echo CHtml::link('о нас',array('/site/page','view'=>'about')); ?></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <?php echo CHtml::link('продукты<b class="caret"></b>','#',array('class'=>'dropdown-toggle','data-toggle'=>'dropdown')); ?>
                        <ul class="dropdown-menu">
                        <li><?php echo CHtml::link('bootstrap module',array('/bsp')); ?></li>
                        <li><?php echo CHtml::link('Paysys',array('/bsp','id'=>'slider')); ?></li>
                     <li class="divider"></li>
                    <li><?php echo CHtml::link('yii-bootstrap',array('/bsp/default/bs')); ?></li>
                                
                        </ul>
                    </li>
                      <li class="dropdown">
                          <a class="dropdown-toggle" data-toggle="dropdown">проекты <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                         <li><a href="http://localhost/playground/">playground</a></li>
                         <li><a href="http://localhost/tffin/">финансы</a></li>
                         <li><a href="http://localhost/sash/">сашкин проект</a></li>
                         <li><a href="http://localhost/dmart/">2D mart</a></li>
                         <li><a href="http://localhost/paysys/">paysys</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>          


<div id="page">
	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer" >
		Copyright &copy; <?php echo date('Y'); ?> by EMIS.DB
		All Rights Reserved.
	<p>	<?php echo Yii::powered()." ver.".Yii::getVersion(); ?> &nbsp; </p>
	</div><!-- footer -->

</div><!-- page -->
   <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
 <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>-->
   <?php 
        Yii::app()->getClientScript()->registerCoreScript('jquery',CClientScript::POS_END); 
 	Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/css/bootstrap/js/bootstrap.min.js',CClientScript::POS_END); 
    ?>
</body>
</html>
