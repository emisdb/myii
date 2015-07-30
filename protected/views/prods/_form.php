<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'prods-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>80)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pic'); ?>
		<?php echo $form->textField($model,'pic'); ?>
		<?php echo $form->error($model,'pic'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_cats'); ?>
		<?php echo $form->textField($model,'id_cats'); ?>
		<?php echo $form->error($model,'id_cats'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'next'); ?>
		<?php echo $form->textField($model,'next'); ?>
		<?php echo $form->error($model,'next'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'text'); ?>
		<?php echo $form->textArea($model,'text',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'text'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'img'); ?>
		<?php echo $form->textField($model,'img',array('size'=>60,'maxlength'=>64)); ?>
		<?php echo $form->error($model,'img'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_tabs'); ?>
		<?php echo $form->textField($model,'id_tabs'); ?>
		<?php echo $form->error($model,'id_tabs'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'good'); ?>
		<?php echo $form->textField($model,'good',array('size'=>60,'maxlength'=>64)); ?>
		<?php echo $form->error($model,'good'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'good_num'); ?>
		<?php echo $form->textField($model,'good_num'); ?>
		<?php echo $form->error($model,'good_num'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->