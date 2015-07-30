<?php
/* @var $this IssueController */
/* @var $model Issue */

$this->breadcrumbs=array(
	'Issues'=>array('index'),
	$model->name,
);

$this->menu=array(
//        array('label'=>'List Issues', 'url'=>array('index', 'pid'=>$model->project->id)),
//        array('label'=>'Create Issue', 'url'=>array('create','pid'=>$model->project_id)),
       array('label'=>'To Project', 'url'=>array('project/view','id'=>$model->project_id)),
       array('label'=>'Create Next Issue', 'url'=>array('create','pid'=>$model->project_id,'iid'=>$model->issue_id), 'visible'=>$model->issue_id>0),
       array('label'=>'Create Next Issue', 'url'=>array('create','pid'=>$model->project_id), 'visible'=>is_null($model->issue_id)),
      array('label'=>'Create Subissue', 'url'=>array('create','pid'=>$model->project_id,'iid'=>$model->id)),
	array('label'=>'Update Issue', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Issue', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
//        array('label'=>'Manage Issues', 'url'=>array('admin', 'pid'=>$model->project->id)),
    );
?>

<h1>View Issue #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
        'cssFile'=>Yii::app()->request->baseUrl.'/css/detail_view.css',
	'attributes'=>array(
		'name',
		'description',
               array(
                'name'=>'project_id',
                'value'=>CHtml::encode($model->project_id.". ".$model->project->name)
                ),
               array(
                'name'=>'issue_id',
                'value'=>CHtml::encode($model->issue_id.". ".$model->issue->name)
                ),
                array(
                'name'=>'type_id',
                'value'=>CHtml::encode($model->getTypeText())
                ),
                array(
                'name'=>'status_id',
                'value'=>CHtml::encode($model->getStatusText())
                ),		
                array(
               'name'=>'owner_id',
               'value'=>isset($model->owner)?CHtml::encode($model->owner->name):"unknown"
               ),
               array(
               'name'=>'requester_id',
                'value'=>isset($model->requester)?CHtml::encode($model->requester->name):"unknown" ),
                 'create_time',
		'create_user_id',
		'update_time',
		'update_user_id',
	),
)); ?>
