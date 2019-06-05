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

    public function getPost(){
        $this->db->select('imgpath,title,description,id,DATE(timestamp) as date');
        $this->db->from('post');
        $query = $this->db->get();
        return $query;
    }

    public function recentPost(){
        $this->db->select('id','title','imgpath','description');
        $this->db->order_by('timestamp', 'DESC');
        $query = $this->db->get('post',3);
        return $query;
    }

    public function topPost(){
        $this->db->select('id','title','imgpath','description');
        $this->db->order_by('views', 'DESC');
        $query = $this->db->get('post',3);
        return $query;
    }
}
