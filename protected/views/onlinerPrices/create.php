<?php
/* @var $this MyTextController */
/* @var $model MyText */

$this->breadcrumbs = array(
	'Onliner Prices' => ['index'],
	'Create',
);

$current_title = ($model->isNewRecord ? 'Добавить' : 'Изменить') . ' ссылку' . ($model->isNewRecord ? '' : ' #'.$model->id);

$this->pageTitle = $current_title;
$this->menu = array(
	array('label' => 'Список', 'url' => array('index')),
	array('label' => $current_title, 'url' => array('create'), 'active' => true),
);
?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>