<?php
/* @var $this MyTextController */
/* @var $model MyText */

$this->breadcrumbs=array(
	'Onliner items'=>array('index'),
	$model->title,
);

$this->menu = array(
	array('label' => 'Список', 'url' => array('index')),
	array('label' => 'Добавить ссылку', 'url' => array('create')),
	array('label' => 'Просмотр #'.$model->id, 'url' => array(''), 'active' => true),
);

$this->renderPartial('_view', array('model'=>$model));
