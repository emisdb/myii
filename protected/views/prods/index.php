<?php

$this->breadcrumbs=array(
	'Prods',
);

$this->menu=array(
	array('label'=>'Create Prods', 'url'=>array('create')),
	array('label'=>'Manage Prods', 'url'=>array('admin')),
);
?>

<?php
		$connection=Yii::app()->db;  
		$command=$connection->createCommand("SELECT * FROM `pics`");
		$dataReader=$command->query();
		$rows=$dataReader->readAll();
		foreach($rows as $row) 
			echo "<div class=\"tip\" id=\"sym".$row['id']."\">".$row['text']."</div>\n";

		$qry=array();

	$qry[]=array('q'=>"SELECT prods.id AS prodid, pics.id AS picid, pics.name AS picname, symbs.ord as picord FROM (((prods INNER JOIN symbs ON prods.id=symbs.id_prods) INNER JOIN pics ON pics.id=symbs.id_pics)INNER JOIN cats ON cats.id=prods.id_cats)",
	'o'=>"symbs.ord");
	$qry[]=array('q'=>"SELECT num,tab_cont.text AS tctext, id_prods FROM ((prods INNER JOIN tab_cont ON prods.id=tab_cont.id_prods) INNER JOIN cats ON cats.id=prods.id_cats)   ",
	'o'=>"tab_cont.num");



	$format2=array('x0'=>'num',
	'x1'=>'tctext',
	'x2'=>'>',
	'x3'=>'<',);


	$this->widget('ext.Good2TabWidget',array('model'=>$model,
					'with'=>array('idTabs1','pic0'),
					'id'=>'id',
					'togo'=>'prods/group',
					'next'=>'next',
					'par'=>'id_cats',
					'catname'=>$this->catname,
					'pars'=>$list,
					'qry'=>$qry,
					'picname'=>$this->picname,
					'level'=>3,					

					'cont'=>array(
						0=>array('type'=>'t','value'=>'<table class="tb1"><tr><td>'),
						1=>array('type'=>'v','value'=>'name'),
						2=>array('type'=>'t','value'=>'</td><td class="tb1_td2">'.(strlen($this->picname)>0 ? '<img alt="sym" src="'.Yii::app()->request->baseUrl.PIC_PATH.$this->picname.'" class="lable sym'.$this->picid.'">' : "" )."</td></tr></table>\n"),
						3=>array('type'=>'t','value'=>'<table class="tb2"><tr><td rowspan="2">'),
						4=>array('type'=>'v','value'=>'text'),
						5=>array('type'=>'t','value'=>'</td><td><a target="_blank"  href="'.Yii::app()->createUrl('prods/glob').'&amp;id='),
						6=>array('type'=>'v','value'=>'id'),
						7=>array('type'=>'t','value'=>"\">"),
						8=>array('type'=>'t','value'=>'нажать для увеличения<img src="'.Yii::app()->request->baseUrl.IMG_PATH),
						9=>array('type'=>'v','value'=>'img'),
						10=>array('type'=>'t','value'=>'"></a></td></tr>'),
						11=>array('type'=>'t','value'=>"\n<tr><td class=\"tb2_td3\">"),
/*						12=>array('type'=>'q','q'=>0,'filter'=>'prodid',
									'format'=>array(0=>array('type'=>'t','value'=>'<img alt="sym" src="'.Yii::app()->request->baseUrl.PIC_PATH),
													1=>array('type'=>'v','value'=>'picname'),
													2=>array('type'=>'t','value'=>'" class="lable sym'),
													3=>array('type'=>'v','value'=>'picid'),
													4=>array('type'=>'t','value'=>"\" >\n"),
													),
									),
*/
						12=>array('type'=>'t','value'=>"</td></tr></table>\n"),
//						16=>array('type'=>'v','value'=>'id'),
						 ),
					'cont2'=>array(
						0=>array('type'=>'t','value'=>'<div class="bottom_tab">'),
						1=>array('type'=>'q','q'=>0,'filter'=>'prodid',
									'format'=>array(0=>array('type'=>'t','value'=>'<img alt="sym" src="'.Yii::app()->request->baseUrl.PIC_PATH),
													1=>array('type'=>'v','value'=>'picname'),
													2=>array('type'=>'t','value'=>'" class="lable sym'),
													3=>array('type'=>'v','value'=>'picid'),
													4=>array('type'=>'t','value'=>"\" >\n"),
													),
									),

						2=>array('type'=>'t','value'=>"</div>\n"),
						3=>array('type'=>'x','where'=>array('type'=>'x',
						'where'=>array('type'=>'a','relation'=>'idTabs1','field'=>'tab'),
						'src'=>array('type'=>'q','q'=>1,'filter'=>'id_prods',
							'format'=>array(0=>array('type'=>'t','value'=>'>'),
									1=>array('type'=>'v','value'=>'tctext'),
									2=>array('type'=>'t','value'=>'<'),
									)),
						'how'=>'r',
						'what'=>array('format'=>array(0=>array('type'=>'t','value'=>'>'),
									1=>array('type'=>'v','value'=>'num'),
									2=>array('type'=>'t','value'=>'<'),
									),)
						),
						'src'=>array('type'=>'f','format'=>array(0=>array('type'=>'t','value'=>'>'),
									1=>array('type'=>'t','value'=>'<img src="'.Yii::app()->request->baseUrl.PIC_PATH,'condition'=>'i'),
									2=>array('type'=>'a','relation'=>'pic0','field'=>'name','condition'=>'x'),
									3=>array('type'=>'t','value'=>'" class="lable sym','condition'=>'i'),
									4=>array('type'=>'a','relation'=>'pic0','field'=>'id','condition'=>'i'),
									5=>array('type'=>'t','value'=>'">','condition'=>'i'),
									6=>array('type'=>'t','value'=>'<'),
									),),
						'how'=>'r',
						'what'=>array('format'=>array(0=>array('type'=>'t','value'=>'>pic<'),									),)
						),
				)
				));

													 ?>


<!--?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?-->
