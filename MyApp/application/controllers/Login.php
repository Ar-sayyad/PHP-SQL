<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');


class Login extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('test_model');
		//$this->load->model('admin_model');
        $this->load->database();
        $this->load->library('session');
        /* cache control */
        $this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        $this->output->set_header("Expires: Mon, 26 Jul 2010 05:00:00 GMT");
    }

    //Default function, redirects to logged in user area
    public function index() {

        if ($this->session->userdata('admin_login') == 1){
            redirect(base_url() . 'index.php/admin/', 'refresh');
	}else if ($this->session->userdata('company_login') == 1){
            redirect(base_url() . 'index.php/testapp/', 'refresh');
	}else if ($this->session->userdata('tester_login') == 1){
            redirect(base_url() . 'index.php/tester/', 'refresh');
	}else if ($this->session->userdata('superadmin_login') == 1){
            redirect(base_url() . 'index.php/superadmin/', 'refresh');
	}else{
        
        //$this->load->view('showLogin');
	}
    }
	
	function validate_login() {
		$email= $this->input->post('loginEmail');
			$password = $this->input->post('loginPassword');
			
			//$credential = array('email' => $email, 'password' => $password);
			$this->test_model->validate_login($email,$password);
        

	}
	
	function validate_login_info($email,$password,$type='1'){
		
		 // Checking login credential for admin
		 $this->db->where('email', $email);
		 $password = strrev(sha1(md5($password)));
		 $this->db->where('password', $password);
         $query = $this->db->get('company');
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $this->session->set_userdata('company_login', '1');
            $this->session->set_userdata('login_user_id', $row->company_id);
            $this->session->set_userdata('name', $row->company_name);
            $this->session->set_userdata('login_type', 'company');
            echo '1';
        }else{
			echo 0;
		}
		
	}
	
	/***login END***/

   

    //Validating login from ajax request
    function validate_login_get($email = '', $password = '') {
        $credential = array('email' => $email, 'password' => strrev(sha1(md5(($password)))));    
		
        $pass = strrev(sha1(md5(($password))));
        // Checking login credential for admin
        $query = $this->db->get_where('user', array('email' => $email, 'password' => $pass,'user_type' => 1));
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $this->session->set_userdata('admin_login', '1');
            $this->session->set_userdata('login_user_id', $row->user_id);
            $this->session->set_userdata('name', $row->fname." ".$row->lname);
            $this->session->set_userdata('login_type', 'administrator');
            echo '1';
        }
		$query = $this->db->get_where('user', array('email' => $email, 'password' => $pass,'user_type' => 3));
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $this->session->set_userdata('tester_login', '1');
            $this->session->set_userdata('login_user_id', $row->user_id);
            $this->session->set_userdata('name', $row->fname." ".$row->lname);
            $this->session->set_userdata('login_type', 'tester');
            echo '1';
        }
        
        
        $query = $this->db->get_where('company', $credential);
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $this->session->set_userdata('company_login', '1');
            $this->session->set_userdata('login_user_id', $row->company_id);
            $this->session->set_userdata('name', $row->company_name);
            $this->session->set_userdata('login_type', 'company');
            echo '1';
        }
        
        $query = $this->db->get_where('admin', $credential);
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $this->session->set_userdata('superadmin_login', '1');
            $this->session->set_userdata('login_user_id', $row->admin_id);
            $this->session->set_userdata('name', $row->fname." ".$row->lname);
            $this->session->set_userdata('login_type', 'superadmin');
            echo '1';
        }
        
       

        echo '0';
    }

    /*     * *DEFAULT NOR FOUND PAGE**** */

    function four_zero_four() {
        $this->load->view('four_zero_four');
    }

    /*     * *RESET AND SEND PASSWORD TO REQUESTED EMAIL*** */

    function reset_password() {
        $account_type = $this->input->post('account_type');
        if ($account_type == "") {
            redirect(base_url(), 'refresh');
        }
        $email = $this->input->post('email');
        $result = $this->email_model->password_reset_email($account_type, $email); //SEND EMAIL ACCOUNT OPENING EMAIL
        if ($result == true) {
            $this->session->set_flashdata('flash_message', get_phrase('password_sent'));
        } else if ($result == false) {
            $this->session->set_flashdata('flash_message', get_phrase('account_not_found'));
        }

        redirect(base_url(), 'refresh');
    }

    /*     * *****LOGOUT FUNCTION ****** */

    function logout() {
        $this->session->sess_destroy();
        $this->session->set_flashdata('logout_notification', 'logged_out');
        redirect(base_url(), 'refresh');
    }

}
