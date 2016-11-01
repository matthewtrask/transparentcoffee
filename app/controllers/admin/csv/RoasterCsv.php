<?php
/**
 * Created by PhpStorm.
 * User: trask
 * Date: 10/30/16
 * Time: 10:55 AM
 */

namespace controllers\admin\csv;

use \models\admin\Csv;

class RoasterCsv extends AbstractWriter implements CsvInterface
{
    private $growers;

    public function __construct()
    {
        $this->growers = new Csv();
    }

    public function getData()
    {
        $roaster = json_decode(json_encode($this->growers->getGrowers(), true));
    }
}