<?php namespace controllers\admin;

use \helpers\session,
	\helpers\url,
	\core\view;

class Admin extends \core\controller {

	public function __construct(){

		if(!Session::get('loggedin')){
			Url::redirect('login');
		}

	}

	public function index(){
		
		$data['title'] = 'Admin';

		View::rendertemplate('adminheader',$data);
		View::rendertemplate('admin',$data);
		View::rendertemplate('footer',$data);

	}

}