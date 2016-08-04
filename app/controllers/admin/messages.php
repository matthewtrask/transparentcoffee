<?php

namespace controllers\admin;

use core\View;
use Models\ttc;
use helpers\Session;


class messages extends \core\controller
{
    /**
     * @var \models\ttc;
     */
    private $adminModel;

    public function __construct()
    {
        parent::__construct();
        $this->adminModel = new \models\ttc();
    }

    public function index()
    {
        $data['title'] = 'Notes';

        $data['user'] = Session::get('username');

        View::renderadmintemplate('header', $data);
        View::render('admin/notes', $data);
        View::renderadmintemplate('footer');
    }

    public function postNote()
    {
        $editedBy = $_POST['edited_by'];
        $pagesAffected = $_POST['pages_Affected'];
        $notes = $_POST['notes'];

        $note = [
            'edited_by' => $editedBy,
            'pages_affected' => $pagesAffected,
            'notes' => $notes
        ];

        $this->adminModel->insertNote($note);
    }
}
