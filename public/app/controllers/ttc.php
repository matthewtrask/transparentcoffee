<?php

namespace controllers;

use helpers\url;
use helpers\form;
use helpers\phpmailer\mail;
use core\view;

class ttc extends \core\controller{

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
	}

	public function roasters() {
		$data['title'] = 'Roasters';
	}

	public function contact() {
		$data['title'] = 'Contact';
	}
}