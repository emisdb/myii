<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/template.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/style.css" media="screen, projection" />
	<script type="text/javascript" language="javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-1.5.2.min.js"></script>
	<!--[if lte IE 7]>
        <link rel="stylesheet" type="text/css" href="css/ie.css" media="screen" />
    <![endif]-->
	<script type="text/javascript" language="javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.dropdownPlain.js"></script>
	<script type="text/javascript" language="javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/tooltip.js"></script>
	<script type="text/javascript" language="javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/my_func.js"></script>
	<script language="JavaScript" type="text/javascript">
	</script>
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<!--div class="container" id="page"-->
<div id="page" class="container">
   <div id="header">
   <ul class="dropdown">
   <li><a href="<?php echo CController::createUrl("cats/index")?>">Содержание</a>

<?php
	$model=new Cats('search');
	$this->widget('ext.HLWidget',array('model'=>$model,
								'columns'=>array(array('','name','text',"*"),array('pic0','name','img','!')),
								'next'=>'next',
								'id'=>'id',
								'par'=>'par',
								'togo'=>'prods/group',
								'class'=>'sub_menu',
								'level'=>3));
?> 

  </li>
  <li><?php 
	$this->widget('ext.ScrollTop',array(
        'label' => 'Наверх',
        'speed' => 'slow'
)); 
 ?></li>
  <li><a href="<?php echo Yii::app()->request->baseUrl; ?>">На главную</a></li>
   </ul>
<h1 id="toptitle"><?php echo $this->catname; ?></h1>
   </div> 
 
	<div class="clear"></div>
	<div id="container">

	<?php echo $content; ?>
	</div>

	<div class="clear"></div>

	<div id="footer">
<div class="canvas_center">
Copyright &copy; <?php echo date('Y'); ?> by EMIS.DB.All Rights Reserved.
		<?php echo Yii::powered(); ?>

<script id="top100Counter" type="text/javascript" src="http://counter.rambler.ru/top100.jcn?2122402"></script>
<noscript>
<img src="http://counter.rambler.ru/top100.cnt?2122402" alt="" width="1" height="1" border="0" />

</noscript>
<!-- end of Top100 code -->
<br>
<!-- begin of Top100 logo -->
<a href="http://top100.rambler.ru/home?id=2122402">
<img src="http://top100-images.rambler.ru/top100/banner-88x31-rambler-green2.gif" alt="Rambler's Top100"
width="88" height="31" border="0" /></a>
<!-- end of Top100 logo --><!--Rating@Mail.ru counter-->
<script language="javascript" type="text/javascript"><!--
d=document;var a='';a+=';r='+escape(d.referrer);js=10;//--></script>
<script language="javascript1.1" type="text/javascript"><!--
a+=';j='+navigator.javaEnabled();js=11;//--></script>
<script language="javascript1.2" type="text/javascript"><!--
s=screen;a+=';s='+s.width+'*'+s.height;
a+=';d='+(s.colorDepth?s.colorDepth:s.pixelDepth);js=12;//--></script>
<script language="javascript1.3" type="text/javascript"><!--
js=13;//--></script><script language="javascript" type="text/javascript"><!--
d.write('<a href="http://top.mail.ru/jump?from=1804964" target="_top">'+
'<img src="http://da.c8.bb.a1.top.mail.ru/counter?id=1804964;t=214;js='+js+
a+';rand='+Math.random()+'" alt="Рейтинг@Mail.ru" border="0" '+
'height="31" width="88"><\/a>');if(11<js)d.write('<'+'!-- ');//--></script>
<noscript><a target="_top" href="http://top.mail.ru/jump?from=1804964">
<img src="http://da.c8.bb.a1.top.mail.ru/counter?js=na;id=1804964;t=214" 
height="31" width="88" border="0" alt="Рейтинг@Mail.ru"></a></noscript>
<script language="javascript" type="text/javascript"><!--
if(11<js)d.write('--'+'>');//--></script>
<!--// Rating@Mail.ru counter--><a href='http://www.rosmed.ru/' alt='Rosmed.Ru - Медицинский портал' target=_blank> <img src='http://www.rosmed.ru/btn_rosmed.gif' alt='Rosmed.Ru - Медицинский портал' style='border:1px gray solid;'> </a><!--Openstat--><span id="openstat2085602"></span><script type="text/javascript">
var openstat = { counter: 2085602, image: 5005, next: openstat }; document.write(unescape("%3Cscript%20src = %22http" +
(("https:" == document.location.protocol) ? "s" : "") +
"://openstat.net/cnt.js%22%20defer=%22defer%22%3E%3C/script%3E"));
</script><!--/Openstat--><a href='http://www.rusmed.ru/' title='Участник медицинского портала Русмед'><img src='http://www.rusmed.ru/img/btn_rusmed_1.png' border=0 alt='Участник медицинского портала Русмед'></a>      


</div>
</div>

</div><!-- page -->

</body>
</html>
