<?php

namespace controllers;

use helpers\url;
use helpers\form;
use helpers\phpmailer\mail;
use core\view;
use core\controller;

class ttc extends Controller {

	public function index() {
		$data['title'] = 'Home';

        View::rendertemplate('header', $data);
        View::rendertemplate('home');
		View::rendertemplate('footer');
	}

	public function about() {
		$data['title'] = 'About';

	}

	public function transparency() {
		$data['title'] = 'Transparency';
	}

	public function seg() {
		$data['title'] = 'SEG';

	}

	public function ttcoffees() {
		$data['title'] = 'Transparent Coffees';
	}

	public function register() {
		$data['title'] = 'Register';
	}

	public function insight() {
		$data['title'] = 'Insights';
	}

	public function scrpi() {
		$data['title'] = 'SCRPI';

        View::rendertemplate('header', $data);
        View::rendertemplate('scrpi');
        View::rendertemplate('footer');
	}

	public function roasters() {
		$data['title'] = 'Roasters';

        $model = new \Models\ttc();
        $data['roasters'] = $model->getRoasters();
        View::rendertemplate('header', $data);
        View::rendertemplate('roasters', $data);
        View::rendertemplate('footer');
	}

	public function contact() {


		$data['title'] = 'Contact';

		$mail = new \helpers\phpmailer\phpmailer;


		View::rendertemplate('header', $data);
		View::rendertemplate('contact', $data);
		View::rendertemplate('footer');



	}
}
