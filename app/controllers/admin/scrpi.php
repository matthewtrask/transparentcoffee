<?php

namespace controllers\admin;


use core\controller;
use core\View;
use Exception;
use helpers\Session;
use helpers\Url;

class scrpi extends controller
{
    protected $_model;

    protected $ext = [
        'jpg',
        'png',
        'pdf',
        'txt',
        'doc',
        'docx'
    ];

    public function __construct()
    {
        parent::__construct();
        if(!Session::get('loggedin')){
            Url::redirect('admin/login');
        }

        $this->_model = new \models\admin\scrpi\posts();
    }

    public function index()
    {
        $data['title'] = 'Scrpi Posts';
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
        View::render('admin/scrpi', $data);
        View::renderadmintemplate('footer',$data);

    }

    public function add()
    {
        $data['title'] = 'Add Scrpi Post';

        if(isset($_POST['submit'])){
            $postTitle = $_POST['postTitle'];
            $postDesc = $_POST['postDesc'];
            $postCont = $_POST['postCont'];

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

            if(!$error){

                $slug = Url::generateSafeSlug($postTitle);

                $data = array(
                    'postTitle' => $postTitle,
                    'postSlug' => $slug,
                    'postDesc' => $postDesc,
                    'postCont' => $postCont,
                );

                $data['postImg'] = $_SESSION['image_name'];

                $this->_model->insert_post($data);
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
        $data['row'] = $this->_model->getpost($id);

        if(isset($_POST['submit'])){

            $error = [];

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

                $this->_model->update_post($data,$where);
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
        Url::redirect('admin/scrpi');
    }

    public function upload()
    {
        if(isset($_FILES['doc'])){
            $tempName = $_FILES['doc']['tmp_name'];


            if($_FILES['doc']['size'] > (1024000)) {
                throw new Exception('The file you tried to upload is too large.');
            }

            $info = new \SplFileInfo($_FILES['doc']);
            $extension = $info->getExtension();

            if(!in_array($extension, $this->ext)){
                throw new Exception('You can not upload that type of file');
            }

            move_uploaded_file($_FILES['doc']['tmp_name'], __DIR__ . '/downloads/'.$tempName);
        } 
    }
}