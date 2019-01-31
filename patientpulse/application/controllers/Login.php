<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();        	
        $this->load->library('session');
	$this->load->library('form_validation');
        $this->load->model('pulse_model');
        $this->load->helper('file');
        $this->load->helper(array('form', 'url'));
         /* cache control */
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
    }
        
       public function index()
	{
           if ($this->session->userdata('admin_login') != 1) {      
                 $data['title'] = "Login";
                $this->load->view('pulse/login',$data);
             }
            else{
                 redirect(base_url().'Home'); 
		}   
            
        }
     
       
       
        
}
