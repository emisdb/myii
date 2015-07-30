<?php
$this->breadcrumbs=array(
	'Prods'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Prods', 'url'=>array('index')),
	array('label'=>'Create Prods', 'url'=>array('create')),
	array('label'=>'View Prods', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Prods', 'url'=>array('admin')),
);
?>

<h1>Update Prods <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>