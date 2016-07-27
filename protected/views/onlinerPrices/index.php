<?php
/* @var $this OnlinerPricesController */
$this->pageTitle = 'График изменения цен с Onliner';

$this->breadcrumbs = array(
    'Onliner Prices',
);

$this->menu = array(
    array('label' => 'Список', 'url' => array('index'), 'active' => true),
    array('label' => 'Добавить ссылку', 'url' => array('create')),
);
?>
<? foreach ($dataProvider->getData() as $item):
    $criteria = new CDbCriteria;
    $criteria->limit = 1;
    $criteria->order = 'created DESC';
    $criteria->condition = 'item_id=:item_id';
    $criteria->params = array(':item_id'=>$item->id);

    $price = OnlinerPrices::model()->findAll($criteria)[0];?>
    <div class="row">
        <div class="col-xs-12">
            <table class="table">
                <tr><td colspan="2">
                        <h3 style="display: inline-block;">#<?php echo $item->id; ?></h3>
                        <?php echo CHtml::link($item->title, array('onlinerPrices/view', 'id' => $item->id)); ?>
                    </td></tr>
                <tr>
                    <td>URL</td>
                    <td><?php echo CHtml::link($item->link, $item->link, ['target' => '_blank']); ?></td>
                </tr>
                <tr>
                    <td>График</td>
                    <td><?=CMHelper::getInstance()->drawOnlinerPricesChart($item);?></td>
                </tr>
            </table>
        </div>
    </div>
<? endforeach; ?>