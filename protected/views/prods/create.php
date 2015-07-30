<?php
$this->breadcrumbs=array(
	'Prods'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Prods', 'url'=>array('index')),
	array('label'=>'Manage Prods', 'url'=>array('admin')),
);
?>

<h1>Create Prods</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>