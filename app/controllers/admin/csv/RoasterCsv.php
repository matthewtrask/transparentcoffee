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
    const FILENAME = 'Roasters';

    private $filename = RoasterCsv::FILENAME;

    private $roaster;

    public function __construct()
    {
        $this->roaster = new Csv();
    }

    public function getData()
    {
        $roaster = json_decode(json_encode($this->roaster->getAllRoasters(), true));

        $header = [
            'Roaster',
            'Website',
            'First Name',
            'Last Name',
            'Email'
        ];

        $file = $this->write($this->filename, $header, $roaster);

        $this->downloader($file);
    }
}