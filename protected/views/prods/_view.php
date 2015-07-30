<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pic')); ?>:</b>
	<?php echo CHtml::encode($data->pic); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_cats')); ?>:</b>
	<?php echo CHtml::encode($data->id_cats); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('next')); ?>:</b>
	<?php echo CHtml::encode($data->next); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('text')); ?>:</b>
	<?php echo CHtml::encode($data->text); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('img')); ?>:</b>
	<?php echo CHtml::encode($data->img); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('id_tabs')); ?>:</b>
	<?php echo CHtml::encode($data->id_tabs); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('good')); ?>:</b>
	<?php echo CHtml::encode($data->good); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('good_num')); ?>:</b>
	<?php echo CHtml::encode($data->good_num); ?>
	<br />

	*/ ?>

</div>