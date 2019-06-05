<?php
class Postcontentmodel extends CI_Model
{

    public function savePost($title, $desc, $content, $keywords, $img_path)
    {
        $this->db->set('description', $desc);
        $this->db->set('title', $title);
        $this->db->set('keywords', $keywords);
        $this->db->set('post_content', $content);
        $this->db->set('imgpath', $img_path);
        $this->db->set('views', 0);
        $this->db->insert('post');

        $last_id =  $this->db->insert_id();

        return $last_id;
    }
}
