<?php
/* @var $this MyTextController */
/* @var $model MyText */

$this->breadcrumbs=array(
	'My Texts'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List MyText', 'url'=>array('index')),
	array('label'=>'Create MyText', 'url'=>array('create')),
	array('label'=>'Update MyText', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete MyText', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage MyText', 'url'=>array('admin')),
);
?>

<h1>View MyText #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'text',
	),
)); ?>
