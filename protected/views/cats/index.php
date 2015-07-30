<div  id="content" name="content">
<?php

$this->breadcrumbs=array(
	'Cats',
);

$this->menu=array(
	array('label'=>'Create Cats', 'url'=>array('create')),
	array('label'=>'Manage Cats', 'url'=>array('admin')),
);
?>

<?php
	$this->widget('ext.HLWidget',array('model'=>$model,
								'columns'=>array(array('','name','text',"*"),array('pic0','name','img','!')),
								'id'=>'id',
								'togo'=>'prods/group',
								'next'=>'next',
								'par'=>'par',
								'level'=>3));
?>

</div>
<!--?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?-->
