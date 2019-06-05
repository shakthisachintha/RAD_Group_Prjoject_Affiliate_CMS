<?php

class Postcontent extends CI_Controller
{
    public function create()
    {
        $title = $this->input->post('title');
        $desc = $this->input->post('desc');
        $keywords = $this->input->post('keywords');
        $content = $this->input->post('post_content');

        $config['upload_path'] = './post_images/';
        $config['allowed_types'] = 'gif|jpg|png|svg';
        $config['max_size']     = '3500';
        $config['max_width'] = '0';
        $config['max_height'] = '0';
        $config['file_name'] = 'post_header_img';

        $this->load->library('upload', $config);
        $this->upload->do_upload('post_image');
        $error=$this->upload->display_errors('<p>', '</p>');
        $file_name= $this->upload->data('file_name');
        $image_path='./post_images/'.$file_name;

        $config['image_library'] = 'gd2';
        $config['source_image'] = './post_images/'.$file_name;
        $config['create_thumb'] = FALSE;
        $config['maintain_ratio'] = FALSE;
        $config['width']         = 1920;
        $config['height']       = 1005;
        $this->load->library('image_lib', $config);
        $this->image_lib->resize();

        $this->load->model('postcontentmodel','post', TRUE);
        $post_id = $this->post->savePost($title, $desc, $content, $keywords, $image_path);
        echo "Post Title : ".$title." Created Success. <br>ID : ".$post_id;
        echo $error;
        echo "<br><a href='/admin/newpost'>Back</a>";
    }
}
