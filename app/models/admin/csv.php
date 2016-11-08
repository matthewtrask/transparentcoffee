<?php

namespace models\admin;

class Csv extends \core\model
{
    public function __construct(){
        parent::__construct();
    }

    public function getAllCoffees()
    {
        $stmt = $this->_db->select('SELECT r.roaster_name, 
                                           c.coffee_name, 
                                           c.retail_price, 
                                           c.currency, 
                                           c.bag_size, 
                                           c.gppp, 
                                           c.egs, 
                                           g.farm_name, 
                                           g.farm_region, 
                                           ct.first_name, 
                                           ct.last_name,
                                           ct.email 
                                        FROM '.PREFIX.'coffee c
                                        INNER JOIN '.PREFIX.'roaster r  ON c.roaster_id = r.roaster_id
                                        INNER JOIN '.PREFIX.'grower g  ON c.grower_id  = g.grower_id
                                        INNER JOIN '.PREFIX.'contact ct ON r.contact_id = ct.contact_id');

        return (array) $stmt;
    }

    public function getAllRoasters()
    {
        $stmt = $this->_db->select('SELECT r.roaster_name,
                                    r.roaster_url,
                                    ct.first_name, 
                                    ct.last_name, 
                                    ct.email 
                                    FROM '.PREFIX.'roaster r
                                    INNER JOIN '.PREFIX.'contact as ct ON r.contact_id = ct.contact_id');

        return $stmt;
    }

    public function getGrowers()
    {
        $stmt = $this->_db->select('SELECT g.farm_name, 
                                    g.farm_country,
                                    g.farm_region,
                                    r.roaster_name
                                    FROM '.PREFIX.'grower g
                                    INNER JOIN '.PREFIX.'coffee c ON g.grower_id = c.grower_id
                                    INNER JOIN '.PREFIX.'roaster r on c.roaster_id = r.roaster_id');

        return $stmt;
    }
}