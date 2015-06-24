<?php namespace controllers\admin;

use \helpers\password,
	\helpers\session,
	\helpers\url,
	\core\view;

class Auth extends \core\controller {

	public function login(){

		if(Session::get('loggedin')){
			Url::redirect('admin');
		}

		$model = new \models\admin\auth();

		$data['title'] = 'Login';

		if(isset($_POST['submit'])){

			$username = $_POST['username'];
			$password = $_POST['password'];

			if(Password::verify($password, $model->getHash($_POST['username'])) == 0){
				$error[] = 'Wrong username of password';
			} else {
				Session::set('loggedin',true);
				Url::redirect('admin');
			}

		}

		View::rendertemplate('header',$data);
		View::render('admin/login',$data,$error);
		View::rendertemplate('footer',$data);
	}

	public function logout(){

		Session::destroy();
		Url::redirect('login');

	}

}