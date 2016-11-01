<?php

namespace controllers\admin\csv;

use \models\admin\Csv;

class CoffeeCsv extends AbstractWriter implements CsvInterface
{
    const FILENAME = 'Coffees';

    private $filename = CoffeeCsv::FILENAME;

    private $coffees;

    public function __construct()
    {
        $this->coffees = new Csv();
    }

    public function getData()
    {
        $coffees = json_decode(json_encode($this->coffees->getAllCoffees()), true);

        $headers = [
            'Roaster Name',
            'Coffee Name',
            'Retail Price',
            'Currency',
            'Bag Size',
            'GPPP',
            'RTO',
            'Farm Name',
            'Region',
            'First Name',
            'Last Name',
            'Email'
        ];

        $file = $this->write($this->filename, $headers, $coffees);

        $this->downloader($file);
    }
}