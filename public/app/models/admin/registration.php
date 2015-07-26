<?php

namespace models\admin;

class Registration extends \core\model {

	public function getTTCoffees() {
        return $this->_db->select('SELECT * FROM '.PREFIX.'coffee_pending  AS c
                            INNER JOIN '.PREFIX.'roaster_pending AS r  ON c.roaster_id = r.roaster_id
                            INNER JOIN '.PREFIX.'grower_pending  AS g  ON c.grower_id  = g.grower_id
                            INNER JOIN '.PREFIX.'contact AS ct ON r.contact_id = ct.contact_id');
    }

    public function getPendingFileInfo($pendingCoffeeId) {
        return $this->_db->select('SELECT file_name, file_type, file_size, gppp_confirmation
                                   FROM '.PREFIX.'coffee_pending
                                   WHERE coffee_id = ' . $pendingCoffeeId)[0];
    }

    public function getActiveTTCoffees(){
        return $this->_db->select('SELECT * FROM '.PREFIX.'coffee  AS c
                            INNER JOIN '.PREFIX.'roaster AS r  ON c.roaster_id = r.roaster_id
                            INNER JOIN '.PREFIX.'grower  AS g  ON c.grower_id  = g.grower_id
                            INNER JOIN '.PREFIX.'contact AS ct ON r.contact_id = ct.contact_id');
    }

    public function getArchiveTTCoffees() {
        return $this->_db->select('SELECT * FROM '.PREFIX.'coffee_archive  AS c
                            INNER JOIN '.PREFIX.'roaster_archive AS r  ON c.roaster_id = r.roaster_id
                            INNER JOIN '.PREFIX.'grower_archive  AS g  ON c.grower_id  = g.grower_id
                            INNER JOIN '.PREFIX.'contact AS ct ON r.contact_id = ct.contact_id');
    }
}