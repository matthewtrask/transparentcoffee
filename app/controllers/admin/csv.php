<?php
namespace controllers\admin;

use core\Controller;
use \helpers\session;
use \helpers\form;
use	\helpers\url;
use \core\model;
use	\core\view;
use Keboola\Csv\CsvFile;

class Csv extends Controller
{
    private $model;

    public function __construct()
    {
        parent::__construct();
        $this->model = new \models\admin\Csv();
    }

    public function index()
    {
        $data['title'] = 'CSV Creation';

        View::renderadmintemplate('header', $data);
        View::render('admin/csv', $data);
        View::renderadmintemplate('footer', $data);
    }

    public function completeCoffeeCsv()
    {
        $coffees = (array) $this->model->getAllCoffees();

        $rows = array(
            array(
                'Roaster Name',
                'Coffee Name',
                'Retail Price',
                'Currency',
                'Bag Size',
                'GPPP',
                'RTO',
                'Farm Name',
                'Farm Region',
                'First Name',
                'Last Name',
                'Email'
            ),
            array(
                'line without enclosure', 'second column',
            ),
        );

        $csv = new Csv(__DIR__ . '/csv/coffees.csv');
    }
}
