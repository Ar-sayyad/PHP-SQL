<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Questionnaires extends CI_Controller {

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
            $data['title'] = "Questionnaires";
            $data['icon'] = "zmdi-help";
            $this->load->view('pulse/questionnaires',$data);
	}      
        
        public function category()
	{    
            $data['title'] = "Categories";
            $data['icon'] = "zmdi-menu";
            $this->load->view('pulse/categories',$data);
	}   
        
         public function DataUpload()
	{ 
            $data['title'] = "Questionnaires Excel Upload";
            $data['icon'] = "zmdi-cloud-upload";
            $this->load->view('pulse/questionnaires_excel_upload',$data);
	}   
                
}
