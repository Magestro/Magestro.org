<ul class="nav nav-tabs">
    <?foreach($items as $item):?>
        <?if(0 < count($item['items'])):?>
            <li role="presentation"
                class="dropdown <?=($item['active'] ? 'active' : '');?>"
            >
                <?=CHtml::link($item['label'] . ' <b class="caret"></b>', $item['url'], array('class' => 'dropdown-toggle', 'data-toggle' => 'dropdown')); ?>
                <ul class="dropdown-menu  col-sm-12">
                    <?foreach($item['items'] as $subItem):?>
                        <li><?=CHtml::link($subItem['label'], $subItem['url']); ?></li>
                    <?endforeach;?>
                </ul>
            </li>
        <?else:?>
            <li role="presentation"
                class="<?=($item['active'] ? 'active' : '');?>"
            >
                <?=CHtml::link($item['label'], $item['url']); ?>
            </li>
        <?endif;?>
    <?endforeach;?>
</ul>
