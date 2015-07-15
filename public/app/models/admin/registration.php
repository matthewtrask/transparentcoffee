<?php

namespace models\admin;

class Registration extends \core\model {

	public function getTTCoffees() {
        return $this->_db->select('SELECT * FROM '.PREFIX.'coffee  AS c
                            INNER JOIN '.PREFIX.'roaster AS r  ON c.roaster_id = r.roaster_id
                            INNER JOIN '.PREFIX.'grower  AS g  ON c.grower_id  = g.grower_id
                            INNER JOIN '.PREFIX.'contact AS ct ON r.contact_id = ct.contact_id where roaster_name like "Transcend Coffee"');
        $ttcoffees = array();
        foreach ($result as $ttcoffee) {
            $current = new \TTCoffees($ttcoffee->roaster_name, $ttcoffee->roaster_logo, $ttcoffee->farm_name, $ttcoffee->farm_country, $ttcoffee->farm_region, $ttcoffee->coffee_name,
                $ttcoffee->description, $ttcoffee->retail_price, $ttcoffee->currency, $ttcoffee->bag_size, $ttcoffee->gppp, $ttcoffee->egs, $ttcoffee->url);
            $ttcoffees[] = $current;
        }
        return $ttcoffees;
    }
}