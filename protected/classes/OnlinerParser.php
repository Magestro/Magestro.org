<?php

class OnlinerParser
{
    //todo const&static to config
    const product_page_price_class = "b-offers-desc__info-price-value b-offers-desc__info-price-value_primary";
    const product_page_name_class = "catalog-masthead__title";

    private static $currencyStrings = [
        'BYN' => [
            'р',
            'Р',
            'р.',
            'Р.',
        ]
    ];


    private static $instance = null;

    private $date_call;

    /**
     * @var OnlinerItems
     */
    private $urls;

    private $result;


    public static function getInstance(){
        if (null === self::$instance)
        {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function __construct()
    {
        $this->urls = OnlinerItems::model()->findAll();
        $this->date_call = new \DateTime();
    }

    public function __destruct()
    {
        echo '<pre>';
        print_r($this->result);
        echo '</pre>';
    }

    public function parse(){
        $this->parsePrices();
    }

    private function parsePrices(){
        foreach ($this->urls as $url){
            $this->result[]= $this->parseProductPage($url);
            usleep(200);
        }
    }


    /**
     * @param OnlinerItems $item
     * @return mixed
     */
    private function parseProductPage(&$item){
        $price = OnlinerPrices::model()->findAllByAttributes([
            'item_id' => $item->id,
            'created' => $this->date_call->format('Y-m-d')
        ])[0];
        if($price != null){
            $return['reparse'] = true;
        } else {
            $return['reparse'] = false;
            $price = new OnlinerPrices;
        }

        $return['url'] = $item->link;
        $dom = $this->getDomByURL($item->link);

        $xpath = new DOMXPath($dom);


        $price->created = $this->date_call->format('Y-m-d');
        $price->item_id = $item->id;

        $results = $xpath->query("//*[@class='" . self::product_page_price_class . "']");

        if ($results->length > 0) {
            $price_str = $results->item(0)->nodeValue;
            if(!$this->parsePrice($price_str, $price))
                $return['fail'] .= ' `parse price` ';

        } else {
            $return['fail'] .= 'price ';
        }

        $results = $xpath->query("//*[@class='" . self::product_page_name_class . "']");
        if ($results->length > 0) {
            $review = $results->item(0)->nodeValue;
            $item->title = trim($review);
            $item->save();
        } else {
            $return['fail'] .= 'title ';
        }

        $return['saved'] = $price->save();
        if(!$return['saved'])
            $return['save_error'] = $price->getErrors();
        $return['price'] = $price->attributes;

        return $return;
    }

    //mb todo without link
    private function parsePrice($price_str, &$price_obj){
        if(!$price_str) return false;

        $arPrice = explode(" ", $price_str);
        $price_obj->value = $price_str;

        //  100500 CUR
        if(count($arPrice) == 1){
            $arPrice = explode("\xA0", $arPrice[0]);
            $price_obj->value_from = str_replace(',', '.', mb_substr($arPrice[0], 0 , -1));
            $price_obj->value_to = str_replace(',', '.', mb_substr($arPrice[0], 0 , -1));
            $price_obj->currency = $this->getCurrencyCodeByString($arPrice[1]);
        }
        //  100 - 500 CUR
        elseif(count($arPrice) == 3){
            $price_obj->value_from = str_replace(',', '.', $arPrice[0]);
            $arPrice = explode("\xA0", $arPrice[2]);
            $price_obj->value_to = str_replace(',', '.', mb_substr($arPrice[0], 0 , -1));
            $price_obj->currency = $this->getCurrencyCodeByString($arPrice[1]);
        } else {
            return false;
        }

        return true;
    }

    private function getDomByURL($url){
        $html = file_get_contents($url);

        $dom = new DOMDocument();
        @$dom->loadHTML('<?xml encoding="UTF-8">' . $html);
        $dom->encoding = 'UTF-8';

        return $dom;
    }


    private function getCurrencyCodeByString($str){
        foreach(self::$currencyStrings as $code => $values){
            if(in_array($str, $values)) return $code;
        }

        return false;
    }
}