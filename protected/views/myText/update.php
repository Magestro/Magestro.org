<?php
/* @var $this MyTextController */
/* @var $model MyText */

$this->breadcrumbs=array(
	'My Texts'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List MyText', 'url'=>array('index')),
	array('label'=>'Create MyText', 'url'=>array('create')),
	array('label'=>'View MyText', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage MyText', 'url'=>array('admin')),
);
?>

<h1>Update MyText <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>