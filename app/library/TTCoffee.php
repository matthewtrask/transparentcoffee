<?php

class TTCoffee {
    public $roaster_name;
    public $roaster_logo;
    public $farm_name;
    public $farm_country;
    public $farm_region;
    public $coffee_name;
    public $description;
    public $retail_price;
    public $currency;
    public $bag_size;
    public $gppp; //green price per pound
    public $egs; //effective grower share
    public $url;

    function __construct($roaster_name, $roaster_logo, $farm_name, $farm_country, $farm_region, $coffee_name,
                       $description, $retail_price, $currency, $bag_size, $gppp, $egs, $url) {
        $this->roaster_name = $roaster_name;
        $this->roaster_logo = $roaster_logo;
        $this->farm_name    = $farm_name;
        $this->farm_country = $farm_country;
        $this->farm_region  = $farm_region;
        $this->coffee_name  = $coffee_name;
        $this->description  = $description;
        $this->retail_price = $retail_price;
        $this->currency     = $currency;
        $this->bag_size     = $bag_size;
        $this->gppp         = $gppp;
        $this->egs          = $egs;
        $this->url          = $url;
    }


}