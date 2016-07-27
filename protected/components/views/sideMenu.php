<ul class="nav navbar-nav">
    <?foreach($items as $item):
        $params = [];
        $params['class']= ($item['no-ajax'] ? '' : 'ajax-nav');?>
        <?if(0 < count($item['items'])):?>
            <li class="dropdown">
                <?=CHtml::link($item['label'] . ' <b class="caret"></b>', $item['url'], array('class' => 'dropdown-toggle', 'data-toggle' => 'dropdown')); ?>
                <ul class="dropdown-menu  col-sm-12">
                    <?foreach($item['items'] as $subItem):
                        $params['class']= $subItem['no-ajax'] ? '' : 'ajax-nav';?>
                        <li><?=CHtml::link($subItem['label'], $subItem['url'], $params); ?></li>
                    <?endforeach;?>
                </ul>
            </li>
        <?elseif($item['external']):
            $params['target'] = '_blank';
            $params['class'] = '';?>
            <li><?=CHtml::link($item['label'], $item['url'], $params); ?></li>
        <?else:?>
            <li><?=CHtml::link($item['label'], $item['url'], $params); ?></li>
        <?endif;?>
    <?endforeach;?>
</ul>
