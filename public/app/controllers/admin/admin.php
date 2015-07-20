<?php namespace controllers\admin;

use \helpers\session;
use \helpers\form;
use	\helpers\url;
use \core\model;
use	\core\view;

class Admin extends \core\controller
{

	private $_adminModel;
    private $_ttcModel;

	public function __construct()
	{
		$this->_adminModel = new \models\admin\registration();
        $this->_ttcModel   = new \models\ttc();

		if (!Session::get('loggedin')) {
			Url::redirect('admin/login');
		}

	}

	public function index()
	{

		$data['title'] = 'Admin';

		//$pending = $this->_adminModel->getPending();

		View::renderadmintemplate('header', $data);
		View::render('admin/admin', $data);
		View::renderadmintemplate('footer', $data);

	}

	public function pending()
	{
		$data['title'] = 'Registration Approval';

		$ttcoffees = $this->_adminModel->getTTCoffees();
		$data['ttcoffees'] = $ttcoffees;
		
	View::renderadmintemplate('header', $data);
	View::render('admin/pending', $data);
	View::renderadmintemplate('footer', $data);
	
	}

    public function pendingAjax()
    {
        foreach ($_POST as $approvedCoffeeId) {
            $this->_ttcModel->approveCoffee($approvedCoffeeId);
        }
        header('Location: /admin/pending');
    }

    public function download()
    {
        header('Location: /thankyou');
//        if(isset($_POST['id']))
//        {
//            // if id is set then get the file with the id from database
//
//            $id    = $_POST['id'];
//
//            $result = $this->_adminModel->getPendingFileInfo($id);
//            var_dump($result);
//            $fileSize = $result['file_size'];
//            $fileType = $result['file_type'];
//            $fileName = $result['file_name'];
//
//            header("Content-length: $fileSize");
//            header("Content-type: $fileType");
//            header("Content-Disposition: attachment; filename=$fileName");
//            echo $result['gppp_confirmation'];
//        }
    }

}
