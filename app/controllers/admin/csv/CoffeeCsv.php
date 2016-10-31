<?php
/**
 * Created by PhpStorm.
 * User: trask
 * Date: 10/30/16
 * Time: 10:55 AM
 */

namespace controllers\admin\csv;

use Models\admin\Csv;

class CoffeeCsv extends AbstractWriter
{
    const FILENAME = 'Coffees';
    /**
     * @var csv
     */
    private $coffees;

    private $filename = CoffeeCsv::FILENAME;

    public function __construct()
    {
        $this->coffees = new Csv();
    }

    public function hello()
    {
        return 'hello';
    }

    public function getCoffees()
    {
        $coffees = (array) $this->coffees->getAllCoffees();

        $headers = [
            'Roaster Name',
            'Coffee Name',
            'Retail Price',
            'Currency',
            'Bag Size',
            'GPPP',
            'EGS',
            'Farm Name',
            'Region',
            'First Name',
            'Last Name',
            'Email'
        ];

        return $this->write($this->filename, $headers, $coffees);
    }
}