<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hospitals extends CI_Controller {

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
    
	public function index()
	{  
            $data['title'] = "Hospitals";
            $data['icon'] = "zmdi-hospital-alt";
            $this->load->view('pulse/hospital_master',$data);                   
	}      
        
        public function Access()
	{  
            $data['title'] = "Hospital Users";
            $data['icon'] = "zmdi-account-box";
            $this->load->view('pulse/hospital_users',$data);
                  
	}   
        public function DataUpload()
	{           
            $data['title'] = "Hospital Excel Upload";
            $data['icon'] = "zmdi-cloud-upload";
            $this->load->view('pulse/hospital_excel_upload',$data);                               
	}    
      
        
}
