<?php
/* @var $this SiteController */

$this->pageTitle = 'Текст';?>

<? foreach ($dataProvider->getData() as $item):
    $i++;
    if ($i % 2 == 1):?>
        <div class="row">
    <? endif; ?>

    <div class="col-md-6 col-xs-12">
        <?php echo CHtml::link($item->name,array('i/write/'.$item->id)); ?>
        <p><?= $item->text ?></p>
    </div>

    <? if ($i % 2 == 0):?>
        </div>
    <? endif; ?>
<? endforeach; ?>