<?php

class CMHelper
{
    private static $instance = null;

    public static function getInstance()
    {
        if (null === self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function drawOnlinerPricesChart(OnlinerItems $model)
    {
        $currency = 'BYN';

        $criteria = new CDbCriteria;
        $criteria->order = 'created DESC';
        $criteria->condition = 'item_id=:item_id and currency=:currency';
        $criteria->params = array(':item_id' => $model->id, ':currency' => $currency);
        $prices = OnlinerPrices::model()->findAll($criteria);
        $chart_array = [];
        foreach ($prices as $item) {
            $date = new DateTime($item->created);
            $chart_array[] = '[new Date(' .
                $date->format('Y') . ',' . ($date->format('n') - 1) . ',' . $date->format('d') .
                '), ' . $item->value_from . ']';
        }
        $chart_array = '[' . implode(',', $chart_array) . ']';

        $template = file_get_contents(__DIR__ . '/chart_template.html');

        $template = str_replace(
            [
                '{add_name}',
                '{currency}',
                '{chart_array}',
                '{title}'
            ],
            [
                $this->getCodeFromOnlinerUrl($model->link),
                $currency,
                $chart_array,
                $model->title
            ],
            $template
        );

        return $template;
    }

    public function getCodeFromOnlinerUrl($url){
        return preg_replace("/^(.*)\/(.*)$/", "$2", $url);
    }
}