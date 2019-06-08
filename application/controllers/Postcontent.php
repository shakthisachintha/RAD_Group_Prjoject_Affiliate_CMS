<?php

class Postcontent extends CI_Controller
{
    public function create()
    {
        $title_sin = $this->input->post('title_sin');
        $title_eng = $this->input->post('title_eng');
        $desc = $this->input->post('desc');
        $keywords = $this->input->post('keywords');
        $publish = $this->input->post('publish');
        $lang = $this->input->post('lang');
        $author = $this->input->post('author'); //this should be the name of the logged in admin
        $content_eng = $this->input->post('post_content_eng');
        $content_sin = $this->input->post('post_content_sin');

        $config['upload_path'] = './post_images/';
        $config['allowed_types'] = 'gif|jpg|png|svg';
        $config['max_size']     = '3500';
        $config['max_width'] = '0';
        $config['max_height'] = '0';
        $config['file_name'] = 'post_header_img';

        $this->load->library('upload', $config);
        $this->upload->do_upload('post_image');
        $error = $this->upload->display_errors('<p>', '</p>');
        $file_name = $this->upload->data('file_name');
        $image_path = '/post_images/' . $file_name;

        $config['image_library'] = 'gd2';
        $config['source_image'] = '/post_images/' . $file_name;
        $config['create_thumb'] = FALSE;
        $config['maintain_ratio'] = FALSE;
        $config['width']         = 1920;
        $config['height']       = 1005;
        $this->load->library('image_lib', $config);
        $this->image_lib->resize(); //Image Cropped

        $this->load->model('postcontentmodel', 'post', TRUE);
        $post_id = $this->post->savePost($title_eng, $title_sin, $desc, $content_eng, $content_sin, $keywords, $image_path, $publish, $author, $lang);
        echo "Post Title : " . $title_eng . "/" . $title_sin . "<br> Created Success. <br>ID : " . $post_id;
        echo $error;
        echo "<br><a href='/admin/newpost'>Back</a>";
    }

    public function view($lang, $id, $option = "")
    {

        $this->load->model('postcontentmodel', 'post', TRUE);
        $post = $this->post->getPostContent($lang, $id);

        $recent_post = $this->post->recentPost();
        $top_post = $this->post->topPost();

        $data = array(
            'row' => $post,
            'lang' => $lang,
            'id' => $id
        );

        if ($option == 'fiverform') {
            $this->load->view('post/header', $data);
            $this->load->view('post/fiver_form');
            $this->load->view('template/footer');
           return;
        } elseif ($option == 'ebatesref') {
            $this->load->view('post/header', $data);
            $this->load->view('post/ebates_form');
            $this->load->view('template/footer');
           return;
        }
            $maindata = array(
                'row' => $post,
                'recentpost' => $recent_post,
                'top_post' => $top_post
            );
    
            $this->load->view('post/header', $data);
            $this->load->view('post/body', $maindata);
            $this->load->view('template/footer');
        }

        
    }

