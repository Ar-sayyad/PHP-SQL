<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Analytics extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();        	
        $this->load->library('session');
	$this->load->library('form_validation');
        $this->load->model('pulse_model');
        $this->pulse_model->is_logged_in();
        $this->load->helper('file');
        $this->load->helper(array('form', 'url'));        
         /* cache control */
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
    }
    
	public function Demographics()
	{       
            $data['title'] = "Demographics";
            $data['icon'] = "zmdi-accounts-alt";
            $this->load->view('pulse/demographics',$data);
	}
        
        public function NpsScore()
        {
            $data['title'] = "NPS Score";
            $data['icon'] = "zmdi-format-list-numbered";
            $this->load->view('pulse/analytics_npsScore',$data);
        }
        
        public function DataCuts()
        {
            $data['title'] = "Data Cuts";
            $data['icon'] = "zmdi-keyboard";
            $this->load->view('pulse/data_cuts',$data);
        }
        
    
      
        
}
