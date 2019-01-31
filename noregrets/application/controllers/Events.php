<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Events extends CI_Controller {
     function __construct() {
        parent::__construct();
                 $this->load->library('session');
		$this->load->database();
		$this->load->library('Email');
		$this->load->helper('file');
    }
	public function index()
	{
                $data['passes_info'] = $this->db->get('passes')->result_array();
		$this->load->view('event/index',$data);
	}
        
           public function popup($account_type = '', $page_name = '',$param2 = '')
	{
		$page_name               =	$page_name;
		$page_data['param2']		=	$param2;		
		//echo "hello";
		$this->load->view($account_type.'/'.$page_name,$page_data);		
	}
        public function getPackageName($package_id){
            return $package_name = $this->db->get_where('packages',array('package_id' => $package_id))->row()->package_name;
        }
        public function submit(){
            $this->load->view('event/submit');
        }
         public function success(){
            $this->load->view('event/success');
        }
         public function fail(){
            $this->load->view('event/fail');
        }
       
}
