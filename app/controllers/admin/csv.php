<?php
namespace controllers\admin;

use controllers\admin\csv\CoffeeCsv;
use core\Controller;
use core\View;

class csv extends Controller
{
    /**
     * @var CoffeeCsv
     */
    private $coffeeCsv;

    public function __construct(CoffeeCsv $coffeeCsv)
    {
        parent::__construct();
        $this->coffeeCsv = new CoffeeCsv();
    }

    public function index()
    {
        $data['title'] = 'CSV Creation';

        View::renderadmintemplate('header', $data);
        View::render('admin/csv', $data);
        View::renderadmintemplate('footer', $data);
    }

    public function getCoffees()
    {
        return $this->coffeeCsv->getCoffees();
    }

}
