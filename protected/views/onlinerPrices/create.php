<?php
/* @var $this MyTextController */
/* @var $model MyText */

$this->breadcrumbs=array(
	'Onliner Prices' => ['index'],
	'Create',
);

$this->menu = array(
	array('label' => 'Список', 'url' => array('index')),
	array('label' => 'Добавить ссылку', 'url' => array('create'), 'active' => true),
);
?>

<h3>Add item</h3>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>