<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Вход';
$this->breadcrumbs=array(
	'Login',
);
?>

<h1>Вход</h1>

<div class="form" role="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<div class="form-group">
		<?php echo $form->labelEx($model,'login'); ?>
		<?php echo $form->textField($model,'username', ['class' => 'form-control']); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'пароль'); ?>
		<?php echo $form->passwordField($model,'password', ['class' => 'form-control']); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>

	<div class="checkbox-inline">
		<?php echo $form->checkBox($model,'rememberMe'); ?>
		<?php echo $form->label($model,'rememberMe'); ?>
		<?php echo $form->error($model,'rememberMe'); ?>
	</div>

	<div class="form-group buttons">
		<?php echo CHtml::submitButton('Войти', ['class' => 'btn btn-primary pull-right']); ?>
	</div>
	<p class="hint">
		Hint: You may login with <kbd>demo</kbd> / <kbd>demo</kbd>.
	</p>

<?php $this->endWidget(); ?>
</div><!-- form -->
