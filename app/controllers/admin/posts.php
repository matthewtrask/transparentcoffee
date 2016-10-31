<?php namespace controllers\admin;

use helpers\Paginator;
use \helpers\Url;
use	\helpers\Session;
use	\core\View;

class Posts extends \core\Controller
{
	private $_model;
	private $_catsmodel;

	function __construct(){
		parent::__construct();
		if(!Session::get('loggedin')){
			Url::redirect('admin/login');
		}
		
		$this->_model = new \models\admin\Posts();
		$this->_catsmodel = new \models\admin\Cats();
	}

	public function index(){



		$data['title'] = 'Posts';
		$data['posts'] = $this->_model->getPosts();
		$data['js'] = "
		<script language='Javascript' type='text/javascript'>
		function delpost(id,title){
			if(confirm('Are you sure you want to delete the post '+ title)){
				window.location.href = '".DIR."admin/posts/delete/' + id;
			}
		}
		</script>
		";

		View::renderadmintemplate('header',$data);
		View::render('admin/posts',$data);
		View::renderadmintemplate('footer',$data);
	}

	public function add(){
		$data['title'] = 'Add Post';
		$data['cats'] = $this->_catsmodel->getcats();

		if(isset($_POST['submit'])){
			$postTitle = $_POST['postTitle'];
			$postDesc = $_POST['postDesc'];
			$postCont = $_POST['postCont'];
			$catID = $_POST['catID'];

            $error = [];

			if($postTitle == ''){
				$error[] = 'Title is required';
			}

			if($postDesc == ''){
				$error[] = 'Description is required';
			}

			if($postCont == ''){
				$error[] = 'Content is required';
			}

			if($catID == ''){
				$error[] = 'Select a category';
			}

			if(!$error){

				$slug = Url::generateSafeSlug($postTitle);

				$data = array(
					'postTitle' => $postTitle,
					'postSlug' => $slug,
					'postDesc' => $postDesc,
					'postCont' => $postCont,
					'catID'    => $catID
				);

                if ($_FILES['image']['size'] > 0) {
                    $file = 'images/' . $_FILES['image']['name'];
                    move_uploaded_file($_FILES['image']['tmp_name'], DIR . '/app/templates/default/img/' . $file);
                    $data['postImg'] = $file;
                }


                $data['postImg'] = $_SESSION['image_name'];

				$this->_model->insertPost($data);
				unset($_SESSION['image_name']);
				Session::set('message','Post added');
				Url::redirect('admin/posts');

			}
		}

		View::renderadmintemplate('header',$data);
		View::render('admin/addpost',$data,$error);
		View::renderadmintemplate('footer',$data);

	}

	public function edit($id){
		$data['title'] = 'Edit Post';
		$data['row'] = $this->_model->getPost($id);
		$data['cats'] = $this->_catsmodel->getcats();

		if(isset($_POST['submit'])){

			$postTitle = $_POST['postTitle'];
			$postDesc = $_POST['postDesc'];
			$postCont = $_POST['postCont'];
			$catID = $_POST['catID'];

			if($postTitle == ''){
				$error[] = 'Title is required';
			}

			if($postDesc == ''){
				$error[] = 'Description is required';
			}

			if($postCont == ''){
				$error[] = 'Content is required';
			}

			if($catID == ''){
				$error[] = 'Select a category';
			}

			if(!$error){

				$slug = Url::generateSafeSlug($postTitle);

				$data = array(
					'postTitle' => $postTitle,
					'postSlug' => $slug,
					'postDesc' => $postDesc,
					'postCont' => $postCont,
					'catID'    => $catID
				);

				if ($_FILES['image']['size'] > 0) {
					$file = 'images/' . $_FILES['image']['name'];
					move_uploaded_file($_FILES['image']['tmp_name'], DIR . '/app/templates/default/img/' . $file);
					$data['postImg'] = $file;
				}


				$where = array('postID' => $id);

				$this->_model->updatePost($data,$where);
				unset($_SESSION['image_name']);

				Session::set('message','Post Updated');
				Url::redirect('admin/posts');

			}
		}

		View::renderadmintemplate('header',$data);
		View::render('admin/editpost',$data,$error);
		View::renderadmintemplate('footer',$data);
	}

	public function delete($id){
		$this->_model->deletePost(array('postID' => $id));
		Session::set('message','Post Deleted');
		Url::redirect('admin/posts');
	}


}
