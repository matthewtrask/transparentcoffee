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
    const FILENAME = 'Growers';

    private $filename = GrowerCsv::FILENAME;
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
        $growers = $this->growers->getGrowers();

        $headers = [
            'Farm Name',
            'Country',
            'Region',
            'Roaster'
        ];

        $file = $this->write($this->filename, $headers, $growers);

        $this->downloader($file);
    }
}