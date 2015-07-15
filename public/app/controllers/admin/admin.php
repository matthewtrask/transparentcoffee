<?php namespace controllers\admin;

use \helpers\session;
use \helpers\form;
use	\helpers\url;
use \core\model;
use	\core\view;

class Admin extends \core\controller
{

	private $_adminModel;

	public function __construct()
	{
		$this->_adminModel = new \models\admin\registration();

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
		
	print_r($_POST);
	View::renderadmintemplate('header', $data);
	View::render('admin/pending', $data);
	View::renderadmintemplate('footer', $data);

	
	}

}
