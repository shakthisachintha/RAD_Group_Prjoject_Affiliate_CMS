<?php
class Analytics extends CI_Controller
{

    public function pageViews(){
        $ip=$this->input->post('IP');
        $country=$this->input->post('Country');
        $city=$this->input->post('City');
        $province=$this->input->post('Province');
        $country_code=$this->input->post('CountryCode');

        $this->load->model('Analyticsmodel','analytic',TRUE);
        $this->analytic->logData($ip,$country,$city,$province,$country_code);
        
    }

}