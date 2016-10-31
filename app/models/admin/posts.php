<?php namespace models\admin;

class Posts extends \core\model {

	public function getPosts(){
		return $this->_db->select("
			SELECT 
				".PREFIX."posts.postID, 
				".PREFIX."posts.postTitle, 
				".PREFIX."posts.postDate, 
				".PREFIX."post_cats.catTitle 
			FROM 
				".PREFIX."posts, 
				".PREFIX."post_cats 
			WHERE
				".PREFIX."posts.catID = ".PREFIX."post_cats.catID
			ORDER BY 
				postID DESC ");
	}

	public function getPostCount()
	{
		return $this->_db->select("SELECT postID FROM ".PREFIX."posts");
	}

	public function getPost($id){
		return $this->_db->select("SELECT * FROM ".PREFIX."posts WHERE postID = :id",array(':id' => $id));
	}

	public function insertPost($data){
		$this->_db->insert(PREFIX."posts",$data);
	}

	public function updatePost($data,$where){
		$this->_db->update(PREFIX."posts",$data, $where);
	}

	public function deletePost($where){
		$this->_db->delete(PREFIX."posts",$where);
	}

}
