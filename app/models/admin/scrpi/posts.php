<?php

namespace models\admin\scrpi;

use core\model;

class Posts extends model
{
    public function getPosts()
    {
        return $this->_db->select("
			SELECT 
				".PREFIX."scrpi_posts.id, 
				".PREFIX."scrpi_posts.title,
				".PREFIX."scrpi_posts.desc, 
				".PREFIX."scrpi_posts.post, 
				".PREFIX."scrpi_posts.image 
			FROM 
				".PREFIX."scrpi_posts, 
			WHERE
				".PREFIX."scrpi_posts.active = 1");
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