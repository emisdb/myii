<?php
/* @var $this IssueController */
/* @var $model Issue */

$this->breadcrumbs=array(
	'Issues'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Issue', 'url'=>array('index')),
	array('label'=>'Manage Issue', 'url'=>array('admin')),
);
?>

<h1>Create Issue for project:</h1>
<h2><?php echo $project->id.".".$project->name ?></h2>
<?php
if(!is_null($issue))
    echo "<h2>Subissue for ".$issue->id.".".$issue->name."</h2>";
?>
<?php $this->renderPartial('_form', array('model'=>$model)); ?>