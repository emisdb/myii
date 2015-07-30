<?php
$this->breadcrumbs=array(
	'Prods'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Prods', 'url'=>array('index')),
	array('label'=>'Create Prods', 'url'=>array('create')),
	array('label'=>'Update Prods', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Prods', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Prods', 'url'=>array('admin')),
);
?>

<h1>View Prods #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'pic',
		'id_cats',
		'next',
		'text',
		'img',
		'id_tabs',
		'good',
		'good_num',
	),
)); ?>
