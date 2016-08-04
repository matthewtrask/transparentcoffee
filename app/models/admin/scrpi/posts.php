<?php

namespace models\admin\scrpi;

use core\model;

class Posts extends model
{
    public function getPosts()
    {
        return $this->_db->select("
			SELECT 
				".PREFIX."scrpi_posts.postID, 
				".PREFIX."scrpi_posts.postTitle, 
				".PREFIX."scrpi_posts.postDate, 
				".PREFIX."scrpi_post_cats.catTitle 
			FROM 
				".PREFIX."scrpi_posts, 
				".PREFIX."scrpi_post_cats 
			WHERE
				".PREFIX."scrpi_posts.catID = ".PREFIX."scrpi_post_cats.catID
			ORDER BY 
				postID DESC ");
    }

    public function getPostCount()
    {
        return $this->_db->select("SELECT count(postID) FROM ".PREFIX."scrpi_posts");
    }

    public function getPost($id)
    {
        return $this->_db->select("SELECT * FROM ".PREFIX."scrpi_posts WHERE postID = :id",array(':id' => $id));
    }

    public function insert_post($data)
    {
        $this->_db->insert(PREFIX."scrpi_posts",$data);
    }

    public function update_post($data,$where)
    {
        $this->_db->update(PREFIX."scrpi_posts",$data, $where);
    }

    public function delete_post($where)
    {
        $this->_db->delete(PREFIX."scrpi_posts",$where);
    }
}