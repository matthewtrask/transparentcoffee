<?php
namespace Models;

use core\model;

require $_SERVER['DOCUMENT_ROOT'] . '/app/library/TTCoffee.php';

class ttc extends \core\model
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
            $current = new \TTCoffee($ttcoffee->coffee_id, $ttcoffee->roaster_name, $ttcoffee->roaster_logo, $ttcoffee->farm_name, $ttcoffee->farm_country, $ttcoffee->farm_region, $ttcoffee->coffee_name,
                $ttcoffee->description, $ttcoffee->retail_price, $ttcoffee->currency, $ttcoffee->bag_size, $ttcoffee->gppp, $ttcoffee->egs, $ttcoffee->url);
            $ttcoffees[] = $current;
        }
        return $ttcoffees;
    }
    public function getLogos() {
        $result = $this->_db->select('SELECT * FROM '.PREFIX.'roaster');
        return $result;

    }
    public function insertContact($contact) {
        $this->_db->insert(PREFIX."contact", $contact);
    }
    public function insertPendingCoffee($pendingCoffee){
        $this->_db->insert(PREFIX."coffee_pending", $pendingCoffee);
    }

    public function insertPendingRoaster($pendingRoaster){
        return $this->_db->insert(PREFIX."roaster_pending", $pendingRoaster, true);
    }

    public function insertPendingGrower($pendingGrower){
        $this->_db->insert(PREFIX.'grower_pending', $pendingGrower);
    }
    public function getPendingRoasterId($roasterName) {
        $result = (array) $this->_db->select("SELECT roaster_id FROM ".PREFIX."roaster_pending WHERE roaster_name = '" . $roasterName . "'")[0];
        return $result['roaster_id'];
    }
    public function getRoasterName($officialRoasterId) {
        $result = (array) $this->_db->select("SELECT roaster_name FROM ".PREFIX."roaster WHERE roaster_id = '" . $officialRoasterId . "'")[0];
        return $result['roaster_name'];
    }
    public function approveCoffee($pendingCoffeeId){

        $pendingCoffee = (array) $this->_db->select('SELECT * FROM '.PREFIX.'coffee_pending WHERE coffee_id = '.$pendingCoffeeId)[0];
        unset($pendingCoffee['coffee_id']);
        $pendingRoasterId = $pendingCoffee['roaster_id'];
        $pendingGrowerId  = $pendingCoffee['grower_id'];

        //stop roaster from getting deleted before all its coffees have been approved
        $roasterCount = (array) $this->_db->select('SELECT * FROM '.PREFIX.'coffee_pending WHERE roaster_id = '.$pendingRoasterId);

        $pendingGrower = (array) $this->_db->select('SELECT * FROM '.PREFIX.'grower_pending WHERE grower_id = '.$pendingGrowerId)[0];
        unset($pendingGrower['grower_id']);
        $this->_db->insert(PREFIX.'grower', $pendingGrower);
        $officialGrowerId = $this->_db->lastInsertId();
        $growerData = array('grower_id' => $pendingGrowerId);
        $this->_db->delete(PREFIX."grower_pending", $growerData);

        $pendingRoaster = (array) $this->_db->select('SELECT * FROM '.PREFIX.'roaster_pending WHERE roaster_id = '.$pendingRoasterId)[0];
        unset($pendingRoaster['roaster_id']);
        $this->_db->insert(PREFIX."roaster", $pendingRoaster, true);
        $officialRoasterId = $this->_db->lastInsertId();
        if ($officialRoasterId == 0) {
            $officialRoaster = (array) $this->_db->select("SELECT * FROM ".PREFIX."roaster WHERE roaster_name = '".$pendingRoaster['roaster_name'] . "'")[0];
            $officialRoasterId = $officialRoaster['roaster_id'];
        }
        if (count($roasterCount) == 1) {
            $roasterData = array('roaster_id' => $pendingRoasterId);
            $this->_db->delete(PREFIX . "roaster_pending", $roasterData);
        }

        $pendingCoffee['grower_id']  = $officialGrowerId;
        $pendingCoffee['roaster_id'] = $officialRoasterId;
        $this->_db->insert(PREFIX."coffee", $pendingCoffee);
        $coffeeData = array('coffee_id' => $pendingCoffeeId);
        $this->_db->delete(PREFIX."coffee_pending", $coffeeData);
    }

    public function rejectCoffee($pendingCoffeeId){

        $pendingCoffee = (array) $this->_db->select('SELECT * FROM '.PREFIX.'coffee_pending WHERE coffee_id = '.$pendingCoffeeId)[0];
        unset($pendingCoffee['coffee_id']);
        $pendingRoasterId = $pendingCoffee['roaster_id'];
        $pendingGrowerId  = $pendingCoffee['grower_id'];

        //stop roaster from getting deleted before all its coffees have been approved
        $roasterCount = (array) $this->_db->select('SELECT * FROM '.PREFIX.'coffee_pending WHERE roaster_id = '.$pendingRoasterId);

        $pendingGrower = (array) $this->_db->select('SELECT * FROM '.PREFIX.'grower_pending WHERE grower_id = '.$pendingGrowerId)[0];
        unset($pendingGrower['grower_id']);
        $this->_db->insert(PREFIX.'grower', $pendingGrower);
        $officialGrowerId = $this->_db->lastInsertId();
        $pendingGrower['grower_id'] = $officialGrowerId;
        $this->_db->insert(PREFIX.'grower_archive', $pendingGrower);
        $growerData = array('grower_id' => $pendingGrowerId);
        $this->_db->delete(PREFIX."grower_pending", $growerData);

        $pendingRoaster = (array) $this->_db->select('SELECT * FROM '.PREFIX.'roaster_pending WHERE roaster_id = '.$pendingRoasterId)[0];
        unset($pendingRoaster['roaster_id']);
        $this->_db->insert(PREFIX."roaster", $pendingRoaster, true);
        $officialRoasterId = $this->_db->lastInsertId();
        if ($officialRoasterId == 0) {
            $officialRoaster = (array) $this->_db->select("SELECT * FROM ".PREFIX."roaster WHERE roaster_name = '".$pendingRoaster['roaster_name'] . "'")[0];
            $officialRoasterId = $officialRoaster['roaster_id'];
            $pendingRoaster['roaster_id'] = $officialRoasterId;
            $this->_db->insert(PREFIX.'roaster_archive', $pendingRoaster);

            $pendingCoffee['grower_id']  = $officialGrowerId;
            $pendingCoffee['roaster_id'] = $officialRoasterId;
            $this->_db->insert(PREFIX."coffee", $pendingCoffee);
            $officialCoffeeId = $this->_db->lastInsertId();
            $pendingCoffee['coffee_id'] = $officialCoffeeId;

            $growerData = array('grower_id' => $officialGrowerId);
            $this->_db->delete(PREFIX."grower", $growerData);
        }
        else {
            $pendingRoaster['roaster_id'] = $officialRoasterId;
            $this->_db->insert(PREFIX . 'roaster_archive', $pendingRoaster);

            $pendingCoffee['grower_id']  = $officialGrowerId;
            $pendingCoffee['roaster_id'] = $officialRoasterId;
            $this->_db->insert(PREFIX."coffee", $pendingCoffee);
            $officialCoffeeId = $this->_db->lastInsertId();
            $pendingCoffee['coffee_id'] = $officialCoffeeId;

            $growerData = array('grower_id' => $officialGrowerId);
            $this->_db->delete(PREFIX."grower", $growerData);

            $roasterData = array('roaster_id' => $officialRoasterId);
            $this->_db->delete(PREFIX . "roaster", $roasterData);
        }
        if (count($roasterCount) == 1) {
            $roasterData = array('roaster_id' => $pendingRoasterId);
            $this->_db->delete(PREFIX . "roaster_pending", $roasterData);
        }

        $this->_db->insert(PREFIX.'coffee_archive', $pendingCoffee);
        $coffeeData = array('coffee_id' => $officialCoffeeId);
        $this->_db->delete(PREFIX."coffee", $coffeeData);
        $coffeeData = array('coffee_id' => $pendingCoffeeId);
        $this->_db->delete(PREFIX."coffee_pending", $coffeeData);
    }

    public function archiveCoffee($activeCoffeeId){

        $activeCoffee = (array) $this->_db->select('SELECT * FROM '.PREFIX.'coffee WHERE coffee_id = '.$activeCoffeeId)[0];
        $activeRoasterId = $activeCoffee['roaster_id'];
        $activeGrowerId  = $activeCoffee['grower_id'];

        //stop roaster from leaving active before all its coffees have been approved
        $activeRoasterCount = (array) $this->_db->select('SELECT * FROM '.PREFIX.'coffee WHERE roaster_id = '.$activeRoasterId);

        //stop roaster from being inserted to active if it's already there
        $archiveRoasterCount = (array) $this->_db->select('SELECT * FROM '.PREFIX.'coffee_archive WHERE roaster_id = '.$activeRoasterId);


        $activeGrower = (array) $this->_db->select('SELECT * FROM '.PREFIX.'grower WHERE grower_id = '.$activeGrowerId)[0];
        $this->_db->insert(PREFIX.'grower_archive', $activeGrower);
        $growerData = array('grower_id' => $activeGrowerId);
        $this->_db->delete(PREFIX."grower", $growerData);

        $activeRoaster = (array) $this->_db->select('SELECT * FROM '.PREFIX.'roaster WHERE roaster_id = '.$activeRoasterId)[0];
        if ((count($archiveRoasterCount) == 0)||(!isset($archiveRoasterCount))) {
            $this->_db->insert(PREFIX . "roaster_archive", $activeRoaster);
        }
        if (count($activeRoasterCount) == 1) {
            $roasterData = array('roaster_id' => $activeRoasterId);
            $this->_db->delete(PREFIX . "roaster", $roasterData);
        }

        $this->_db->insert(PREFIX."coffee_archive", $activeCoffee);
        $coffeeData = array('coffee_id' => $activeCoffeeId);
        $this->_db->delete(PREFIX."coffee", $coffeeData);
    }

    public function activeCoffee($archiveCoffeeId){

        $archiveCoffee = (array) $this->_db->select('SELECT * FROM '.PREFIX.'coffee_archive WHERE coffee_id = '.$archiveCoffeeId)[0];
        $archiveRoasterId = $archiveCoffee['roaster_id'];
        $archiveGrowerId  = $archiveCoffee['grower_id'];

        //stop roaster from leaving archive before all its coffees have been approved
        $archiveRoasterCount = (array) $this->_db->select('SELECT * FROM '.PREFIX.'coffee_archive WHERE roaster_id = '.$archiveRoasterId);

        //stop roaster from being inserted to active if it's already there
        $activeRoasterCount = (array) $this->_db->select('SELECT * FROM '.PREFIX.'coffee WHERE roaster_id = '.$archiveRoasterId);

        $archiveGrower = (array) $this->_db->select('SELECT * FROM '.PREFIX.'grower_archive WHERE grower_id = '.$archiveGrowerId)[0];
        $this->_db->insert(PREFIX.'grower', $archiveGrower);
        $growerData = array('grower_id' => $archiveGrowerId);
        $this->_db->delete(PREFIX."grower_archive", $growerData);

        $archiveRoaster = (array) $this->_db->select('SELECT * FROM '.PREFIX.'roaster_archive WHERE roaster_id = '.$archiveRoasterId)[0];
        if ((count($activeRoasterCount) == 0)||(!isset($activeRoasterCount))) {
            $this->_db->insert(PREFIX . "roaster", $archiveRoaster);
        }
        if (count($archiveRoasterCount) == 1) {
            $roasterData = array('roaster_id' => $archiveRoasterId);
            $this->_db->delete(PREFIX . "roaster_archive", $roasterData);
        }

        $this->_db->insert(PREFIX."coffee", $archiveCoffee);
        $coffeeData = array('coffee_id' => $archiveCoffeeId);
        $this->_db->delete(PREFIX."coffee_archive", $coffeeData);
    }


    /**
     * @param $coffeeId the id of coffee to be updated
     * @param $contact array of new contact info (minus contact id)
     * @param $roaster array of new roaster info (minus roaster and contact id), will be NULL if an existing roaster was chosen
     * @param $coffee array of new coffee info (minus coffee and grower id, might have a new roaster id)
     * @param $grower array of new grower info (minus grower id)
     */
    public function pendingUpdate($coffeeId, $contact, $roaster, $coffee, $grower) {
        $coffeeWhere = array(
            'coffee_id' => $coffeeId
        );
        $this->_db->update(PREFIX."coffee_pending", $coffee, $coffeeWhere);

        $result = (array) $this->_db->select('SELECT grower_id, roaster_id FROM '.PREFIX.'coffee_pending WHERE coffee_id = '.$coffeeId)[0];
        $growerId = $result['grower_id'];
        $roasterId = $result['roaster_id'];
        $result = (array) $this->_db->select('SELECT contact_id FROM '.PREFIX.'roaster_pending WHERE roaster_id = '.$roasterId)[0];
        var_dump($result);
        $contactId = $result['contact_id'];

        $contactWhere = array(
            'contact_id' => $contactId
        );
        $this->_db->update(PREFIX."contact", $contact, $contactWhere);

        $growerWhere = array(
            'grower_id' => $growerId
        );
        $this->_db->update(PREFIX."grower_pending", $grower, $growerWhere);

        if (isset($roaster)) {
            $roasterWhere = array(
                'roaster_id' => $roasterId
            );
            $this->_db->update(PREFIX."roaster_pending", $roaster, $roasterWhere);
        }
    }

    /**
     * @param $coffeeId the id of coffee to be updated
     * @param $contact array of new contact info (minus contact id)
     * @param $roaster array of new roaster info (minus roaster and contact id), will be NULL if an existing roaster was chosen
     * @param $coffee array of new coffee info (minus coffee and grower id, might have a new roaster id)
     * @param $grower array of new grower info (minus grower id)
     */
    public function archiveUpdate($coffeeId, $contact, $roaster, $coffee, $grower) {
        $result = (array) $this->_db->select('SELECT grower_id, roaster_id FROM '.PREFIX.'coffee_archive WHERE coffee_id = '.$coffeeId)[0];
        $growerId = $result['grower_id'];
        $roasterId = $result['roaster_id'];
        $result = (array) $this->_db->select('SELECT contact_id FROM '.PREFIX.'roaster_archive WHERE roaster_id = '.$roasterId)[0];
        $contactId = $result['contact_id'];

        $contactWhere = array(
            'contact_id' => $contactId
        );
        $this->_db->update(PREFIX."contact", $contact, $contactWhere);

        $growerWhere = array(
            'grower_id' => $growerId
        );
        $this->_db->update(PREFIX."grower_archive", $grower, $growerWhere);

        $coffeeWhere = array(
            'coffee_id' => $coffeeId
        );
        $this->_db->update(PREFIX."coffee_archive", $coffee, $coffeeWhere);

        if (isset($roaster)) {
            $roasterWhere = array(
                'roaster_id' => $roasterId
            );
            $this->_db->update(PREFIX."roaster_archive", $roaster, $roasterWhere);
            $this->_db->update(PREFIX."roaster", $roaster, $roasterWhere);
        }
    }

    /**
     * @param $coffeeId the id of coffee to be updated
     * @param $contact array of new contact info (minus contact id)
     * @param $roaster array of new roaster info (minus roaster and contact id), will be NULL if an existing roaster was chosen
     * @param $coffee array of new coffee info (minus coffee and grower id, might have a new roaster id)
     * @param $grower array of new grower info (minus grower id)
     */
    public function activeUpdate($coffeeId, $contact, $roaster, $coffee, $grower) {
        $result = (array) $this->_db->select('SELECT grower_id, roaster_id FROM '.PREFIX.'coffee WHERE coffee_id = '.$coffeeId)[0];
        $growerId = $result['grower_id'];
        $roasterId = $result['roaster_id'];
        $result = (array) $this->_db->select('SELECT contact_id FROM '.PREFIX.'roaster WHERE roaster_id = '.$roasterId)[0];
        $contactId = $result['contact_id'];

        $contactWhere = array(
            'contact_id' => $contactId
        );
        $this->_db->update(PREFIX."contact", $contact, $contactWhere);

        $growerWhere = array(
            'grower_id' => $growerId
        );
        $this->_db->update(PREFIX."grower", $grower, $growerWhere);

        $coffeeWhere = array(
            'coffee_id' => $coffeeId
        );
        $this->_db->update(PREFIX."coffee", $coffee, $coffeeWhere);

        if (isset($roaster)) {
            $roasterWhere = array(
                'roaster_id' => $roasterId
            );
            $this->_db->update(PREFIX."roaster", $roaster, $roasterWhere);
            $this->_db->update(PREFIX."roaster_archive", $roaster, $roasterWhere);
        }
    }

     public function getLastId() {
         return $this->_db->lastInsertId();
     }
}
