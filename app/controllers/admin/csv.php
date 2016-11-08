<?php
namespace controllers\admin;

use controllers\admin\csv\CoffeeCsv;
use controllers\admin\csv\GrowerCsv;
use controllers\admin\csv\RoasterCsv;
use core\Controller;
use core\View;

class csv extends Controller
{
    /**
     * @var CoffeeCsv
     */
    private $coffeeCsv;

    /**
     * @var RoasterCsv
     */
    private $roasterCsv;

    /**
     * @var GrowerCsv
     */
    private $growerCsv;

    public function __construct(
        CoffeeCsv $coffeeCsv,
        RoasterCsv $roasterCsv,
        GrowerCsv $growerCsv
    ) {
        parent::__construct();
        $this->coffeeCsv = new CoffeeCsv();
        $this->roasterCsv = new RoasterCsv();
        $this->growerCsv = new GrowerCsv();
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
        return $this->coffeeCsv->getData();
    }

    public function getRoasters()
    {
        return $this->roasterCsv->getData();
    }

    public function getGrowers()
    {
        return $this->growerCsv->getData();
    }
}
