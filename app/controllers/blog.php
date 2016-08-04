<?php namespace controllers;

use \core\view;
use	\helpers\paginator;

class Blog extends \core\controller {
	/**
	 * @var \models\blog\blog
	 */
	private $_model;

	public function __construct($_model){
		parent::__construct();
		$this->_model = new \models\blog\blog();
	}

	public function index(){

		$data['title'] = 'Insights';

		$pages = new Paginator('10','page');
		$pages->set_total(count($this->_model->getpoststotal()));
		$data['posts'] = $this->_model->getposts($pages->get_limit());
		$data['page_links'] = $pages->page_links();
		$data['cats'] = $this->_model->getcats();

		View::rendertemplate('header',$data);
		View::render('blog/index',$data);
		View::rendertemplate('footer',$data);
	}

	public function post($slug){
		
		$data['post'] = $this->_model->getpost($slug);
		$data['title'] = $data['post'][0]->postTitle;
		$data['cats'] = $this->_model->getcats();

		View::rendertemplate('header',$data);
		View::render('blog/post',$data);
		View::rendertemplate('footer',$data);

	}

	public function cat($slug){

		$pages = new Paginator('10','page');
		$pages->set_total(count($this->_model->getcatposttotal($slug)));
		$data['posts'] = $this->_model->getcatposts($slug, $pages->get_limit());
		$data['page_links'] = $pages->page_links();
		$data['cats'] = $this->_model->getcats();

		$data['title'] = $data['posts'][0]->catTitle;

		View::rendertemplate('header',$data);
		View::render('blog/cats',$data);
		View::rendertemplate('footer',$data);
	}
}
