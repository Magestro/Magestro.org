<?php

class CSideMenu extends CWidget
{
    public $params = array();
    public $items = array();
    public $action;

    public function run()
    {
        $this->render(
            'sideMenu',
            array(
                'params' => $this->params, 
                'action' => $this->action, 
                'items' => $this->items
            )
        );
    }

}