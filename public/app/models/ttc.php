<?php
namespace Models;

use Core\Model;

class ttc extends Model
{
    public function __construct(){
        parent::__construct();
    }

    public function getRoasters() {
        return $this->_db->select('SELECT * FROM '.PREFIX.'roasters');
    }
}