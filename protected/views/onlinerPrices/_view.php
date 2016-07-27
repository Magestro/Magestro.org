<?php
/* @var $this OnlinerPricesController */
/* @var $model OnlinerItems */

$criteria = new CDbCriteria;
$criteria->limit = 1;
$criteria->order = 'created DESC';
$criteria->condition = 'item_id=:item_id';
$criteria->params = array(':item_id'=>$model->id);

$price = OnlinerPrices::model()->findAll($criteria)[0];

$this->pageTitle = 'Просмотр #' . $model->id;
?>

<table class="table">
	<tr>
		<td>ID</td>
		<td>
			<?=$model->id?>
			<span class="pull-right">
				<?=CHtml::link('Изменить', ['create', 'id' => $model->id], ['class' => 'btn btn-primary'])?>
				<?=CHtml::link('Удалить', ['delete', 'id' => $model->id], ['class' => 'btn btn-danger'])?>
			</span>
		</td>
	</tr>
	<tr>
		<td>Название</td>
		<td><?=$model->title?></td>
	</tr>
	<tr>
		<td>URL</td>
		<td><?=CHtml::link($model->link, $model->link, ['target' => '_blank']);?></td>
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