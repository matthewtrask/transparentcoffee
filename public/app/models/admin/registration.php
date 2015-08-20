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
        return $this->_db->select('SELECT file_name, file_type, file_size
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

    public function getAllRoasters() {
        return $this->_db->select('SELECT roaster_id, roaster_name FROM '.PREFIX.'roaster
                            UNION SELECT roaster_id, roaster_name FROM '.PREFIX.'roaster_archive');
    }

    public function getPendingRoasterCount($roasterId) {
        return (array) $this->_db->select('SELECT * FROM '.PREFIX.'coffee_pending WHERE roaster_id = ' . $roasterId);
    }

    public function getActiveRoasterCount($roasterId) {
        return (array) $this->_db->select('SELECT * FROM '.PREFIX.'coffee WHERE roaster_id = ' . $roasterId);
    }

    public function getArchiveRoasterCount($roasterId) {
        return (array) $this->_db->select('SELECT * FROM '.PREFIX.'coffee_archive WHERE roaster_id = ' . $roasterId);
    }

    public function removePendingRoaster($roasterId) {
        $where = array (
          'roaster_id' => $roasterId
        );
        $stmt = $this->_db->prepare('SET FOREIGN_KEY_CHECKS = 0;');
        $stmt->execute();
        $this->_db->delete(PREFIX.'roaster_pending', $where);
        $stmt = $this->_db->prepare('SET FOREIGN_KEY_CHECKS = 1;');
        $stmt->execute();
    }
    public function removeActiveRoaster($roasterId) {
        $where = array (
            'roaster_id' => $roasterId
        );
        $stmt = $this->_db->prepare('SET FOREIGN_KEY_CHECKS = 0;');
        $stmt->execute();
        $this->_db->delete(PREFIX.'roaster_active', $where);
        $stmt = $this->_db->prepare('SET FOREIGN_KEY_CHECKS = 1;');
        $stmt->execute();
    }
    public function removeArchiveRoaster($roasterId) {
        $where = array (
            'roaster_id' => $roasterId
        );
        $stmt = $this->_db->prepare('SET FOREIGN_KEY_CHECKS = 0;');
        $stmt->execute();
        $this->_db->delete(PREFIX.'roaster_archive', $where);
        $stmt = $this->_db->prepare('SET FOREIGN_KEY_CHECKS = 1;');
        $stmt->execute();
    }

    public function copyPendingRoaster($roasterId, $table) {
        if ($table == 'pending') {
            $roaster = (array) $this->_db->select('SELECT * FROM '.PREFIX.'roaster WHERE roaster_id = ' . $roasterId)[0];
            unset($roaster['roaster_id']);
            return $this->_db->insert(PREFIX.'roaster_pending', $roaster, true);
        }
        else if ($table == 'active') {
            $roaster = (array) $this->_db->select('SELECT * FROM '.PREFIX.'roaster_archive WHERE roaster_id = ' . $roasterId)[0];
            $this->_db->insert(PREFIX.'roaster', $roaster, true);
            return $roasterId;
        }
        else if ($table == 'archive') {
            $roaster = (array) $this->_db->select('SELECT * FROM '.PREFIX.'roaster WHERE roaster_id = ' . $roasterId)[0];
            $this->_db->insert(PREFIX.'roaster_archive', $roaster, true);
            return $roasterId;
        }
    }

    public function getCoffeeCount(){
        return $this->_db->select('select count(*) AS "total_count" from '.PREFIX.'all_roasters;');
    }

    public function getApprovedCoffee(){
        return $this->_db->select('select count(coffee_name) AS "total_count" from '.PREFIX.'coffee;');
    }

    public function getPendingCoffee(){
        return $this->_db->select('select count(coffee_name) AS "total_count" from '.PREFIX.'coffee_pending;');
    }

    public function getArchiveCoffee(){
        return $this->_db->select('select count(coffee_name) AS "total_count" from '.PREFIX.'coffee_archive');
    }

}