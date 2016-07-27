<?php
/* @var $this MyTextController */
/* @var $model MyText */

$this->breadcrumbs=array(
	'My Texts'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List MyText', 'url'=>array('index')),
	array('label'=>'Manage MyText', 'url'=>array('admin')),
);
?>

<h1>Create MyText</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>