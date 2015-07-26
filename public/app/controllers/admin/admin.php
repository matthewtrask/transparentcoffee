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

		$ttcPending = $this->_adminModel->getTTCoffees();
		$ttcArchive = $this->_adminModel->getArchiveTTCoffees();
		$ttcActive = $this->_adminModel->getActiveTTCoffees();
		$data['ttcPending'] = $ttcPending;
		$data['ttcActive'] = $ttcActive;
		$data['ttcArchive'] = $ttcArchive;
		
		View::renderadmintemplate('header', $data);
		View::render('admin/pending', $data);
		View::renderadmintemplate('footer', $data);
	
	}



    public function pendingAjax()
    {
    	print_r($_POST);


        foreach ($_POST as $approvedCoffeeId) {
            $this->_ttcModel->approveCoffee($approvedCoffeeId);
        }


        header('Location: /admin/pending');
    }



    public function gppProof()
    {
		if(isset($_GET['id']))
        {
            // if id is set then get the file with the id from database

            $id    = $_GET['id'];

            $result   = $this->_adminModel->getPendingFileInfo($id);
            $fileSize = $result->file_size;
            $fileType = $result->file_type;
            $fileName = $result->file_name;
			$fileUrl = $_SERVER['DOCUMENT_ROOT'] . '/app/uploads/' . $fileName;

			header("Content-Description: File Transfer");
			header("Content-Type: $fileType");
			header("Content-Disposition: attachment; filename=\"".explode('-',$fileName)[1]."\";");
			header("Content-Transfer-Encoding: binary");
			header('Expires: 0');
			header('Cache-Control: must-revalidate');
			header('Pragma: public');
			header("Content-Length: $fileSize");
			ob_clean();
			flush();
            readfile(urldecode($fileUrl));
			exit;
        }
    }



}
