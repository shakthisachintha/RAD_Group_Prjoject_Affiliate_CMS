<?php
class Postcontentmodel extends CI_Model
{

    public function savePost($title_eng,$title_sin,$desc, $content_eng,$content_sin, $keywords, $img_path,$publish,$author)
    {
        $this->db->set('description', $desc);
        $this->db->set('title_eng', $title_eng);
        $this->db->set('title_sin', $title_sin);
        $this->db->set('keywords', $keywords);
        $this->db->set('content_sin', $content_sin);
        $this->db->set('content_eng', $content_eng);
        $this->db->set('imgpath', $img_path);
        $this->db->set('published', $publish);
        $this->db->set('author', $author);
        $this->db->set('views', 0);
        $this->db->insert('post');

        $last_id =  $this->db->insert_id();

        return $last_id;
    }

    public function addView($id){
        $this->db->set('views', 'views+1',FALSE);
        $this->db->where('id', $id);
        $this->db->update('post'); // gives UPDATE `mytable` SET `field` = 'field+1' WHERE `id` = 2
    }

    public function getPost(){
        $this->db->select('imgpath,lang,author,title_eng,title_sin,description,id,DATE(timestamp) as date');
        $this->db->from('post');
        $this->db->where('published','yes');
        $this->db->order_by('timestamp', 'DESC');
        $query = $this->db->get();
        return $query;
    }

    public function getPostContent($lang,$id){
        $this->db->select('imgpath,keywords,lang,author,title_'.$lang.' as title,content_'.$lang.' as content,description,id,DATE(timestamp) as date');
        $this->db->from('post');
        $this->db->where('id',$id);
        $query = $this->db->get();
        return $query->result()[0];
    }

    public function recentPost(){
        $this->db->select('id,lang,title_sin,imgpath,description');
        $this->db->where('published','yes');
        $this->db->order_by('timestamp', 'DESC');
        $query = $this->db->get('post',3);
        return $query;
    }

    public function topPost(){
        $this->db->select('id,lang,title_sin,imgpath,description');
        $this->db->where('published','yes');
        $this->db->order_by('views', 'DESC');
        $query = $this->db->get('post',3);
        return $query;
    }

    public function allPost(){
        $this->db->select('id,lang,title_eng as title,views,author,published');
        $this->db->order_by('timestamp', 'DESC');
        $query = $this->db->get('post');
        return $query;
    }

    public function publish($id){
        $this->db->set('published', 'yes');
        $this->db->where('id', $id);
        return $this->db->update('post');
    }

    public function unpublish($id){
        $this->db->set('published', 'no');
        $this->db->where('id', $id);
        return $this->db->update('post');
    }
}
