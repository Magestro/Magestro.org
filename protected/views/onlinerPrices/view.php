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

$criteria = new CDbCriteria;
$criteria->limit = 1;
$criteria->order = 'created DESC';
$criteria->condition = 'item_id=:item_id';
$criteria->params = array(':item_id'=>$model->id);

$price = OnlinerPrices::model()->findAll($criteria)[0];
?>

<h3>Просмотр #<?php echo $model->id; ?></h3>
<table class="table">
	<tr>
		<td>ID</td>
		<td><?=$model->id?></td>
	</tr>
	<tr>
		<td>Название</td>
		<td><?=$model->title?></td>
	</tr>
	<tr>
		<td>URL</td>
		<td><?=CHtml::link($model->link,$model->link, ['target' => '_blank']);?></td>
	</tr>
	<tr>
		<td>Последняя цена</td>
		<td><?= $price->value_from .' '.$price->currency?></td>
	</tr>
	<tr>
		<td>Разница</td>
		<td>//todo</td>
	</tr>
	<tr>
		<td>График</td>
		<td><?=CMHelper::getInstance()->drawOnlinerPricesChart($model);?></td>
	</tr>
</table>
