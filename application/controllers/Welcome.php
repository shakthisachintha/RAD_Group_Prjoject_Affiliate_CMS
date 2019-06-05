<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index($page="home")
	{
		if ($page == "contact") {
			$this->load->view('template/header');
			$this->load->view('contactUs/contactus');
			$this->load->view('template/footer');
		} elseif ($page == "about") {
			$this->load->view('template/header');
			$this->load->view('about/about');
			$this->load->view('template/footer');
		} else {

			$this->load->model('Postcontentmodel','post',TRUE);
			$allpost=$this->post->getPost();
			$recent_post=$this->post->recentPost();
			$top_post=$this->post->topPost();
			$data=array(
				'allpost'=>$allpost,
				'recentpost'=>$recent_post,
				'top_post'=>$top_post);
			$this->load->view('template/header');
			$this->load->view('home/home',$data);
			$this->load->view('template/footer');
		}
	}
}
