<?php
/* @var $this MyTextController */
/* @var $model MyText */
/* @var $form CActiveForm */
?>

<div class="form" role="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'onliner-items-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="form-group">
		<?php echo $form->labelEx($model, 'title'); ?>
		<?php echo $form->textField($model, 'title', ['class' => 'form-control']); ?>
		<?php echo $form->error($model, 'title'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model, 'link'); ?>
		<?php echo $form->textField($model,'link', ['class' => 'form-control']); ?>
		<?php echo $form->error($model, 'link'); ?>
	</div>

	<div class="form-group buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', ['class' => 'btm btn-primary']); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->