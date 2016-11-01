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
                                        FROM '.PREFIX.'coffee  AS c
                                        INNER JOIN '.PREFIX.'roaster AS r  ON c.roaster_id = r.roaster_id
                                        INNER JOIN '.PREFIX.'grower  AS g  ON c.grower_id  = g.grower_id
                                        INNER JOIN '.PREFIX.'contact AS ct ON r.contact_id = ct.contact_id');

        return (array) $stmt;
    }

    public function getRoasters()
    {
        $stmt = $this->_db->select('SELECT r.roaster_name,
                                    ct.first_name, 
                                    ct.last_name, 
                                    ct.email 
                                    FROM '.PREFIX.'roaster
                                    INNER JOIN '.PREFIX.'contact as ct ON r.contact_id = ct.contact_id');

        return $stmt;
    }

    public function getGrowers()
    {

    }
}