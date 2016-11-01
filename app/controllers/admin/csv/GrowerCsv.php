<?php
/**
 * Created by PhpStorm.
 * User: trask
 * Date: 10/30/16
 * Time: 10:52 AM
 */

namespace controllers\admin\csv;

use \models\admin\Csv;

class GrowerCsv extends AbstractWriter implements CsvInterface
{
    /**
     * @var Csv
     */
    private $growers;

    public function __construct()
    {
        $this->growers = new Csv();
    }

    public function getData()
    {

    }
}