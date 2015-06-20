<?php
namespace Models;

use Core\Model;

require '/var/www/public/app/library/TTCoffee.php';

class ttc extends Model
{
    public function __construct(){
        parent::__construct();
    }

    public function getRoasters() {
        return $this->_db->select('SELECT * FROM '.PREFIX.'all_roasters');
    }

    //returns array of all coffees in TTCoffee object format
    public function getTTCoffees() {
        $result = $this->_db->select('SELECT * FROM '.PREFIX.'coffee  AS c
                                        INNER JOIN '.PREFIX.'roaster AS r  ON c.roaster_id = r.roaster_id
                                        INNER JOIN '.PREFIX.'grower  AS g  ON c.grower_id  = g.grower_id
                                        INNER JOIN '.PREFIX.'contact AS ct ON r.contact_id = ct.contact_id');
        $ttcoffees = array();
        foreach ($result as $ttcoffee) {
            $current = new \TTCoffee($ttcoffee->roaster_name, $ttcoffee->roaster_logo, $ttcoffee->farm_name, $ttcoffee->farm_country, $ttcoffee->farm_region, $ttcoffee->coffee_name,
                $description, $ttcoffee->retail_price, $ttcoffee->currency, $ttcoffee->bag_size, $ttcoffee->gppp, $ttcoffee->egs, $ttcoffee->url);
            $ttcoffees[] = $current;
        }
        return $ttcoffees;
    }
}