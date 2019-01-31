<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	
	public function __construct() {
        parent::__construct();
        $this->load->database();
		$this->load->model('admin_model');
        $this->load->library('session');
		$this->load->library('form_validation');
        $this->load->helper('file');
        $this->load->library('upload');
		date_default_timezone_set("Asia/Kolkata");
         /* cache control */
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
    }

	public function index()
	{
		if ($this->session->userdata('superadmin_login') == 1) {
            $this->session->set_userdata('last_page', current_url());
			
			$data['page_title'] = 'Dashboard';
			$this->load->view('superadmin/home',$data);
			
        }elseif ($this->session->userdata('company_login') == 1) {
            $this->session->set_userdata('last_page', current_url());
			
			$data['page_title'] = 'Dashboard';
			$this->load->view('company/home',$data);
			
        }elseif ($this->session->userdata('admin_login') == 1) {
            $this->session->set_userdata('last_page', current_url());
			
			$data['page_title'] = 'Dashboard';
			$this->load->view('administrator/home',$data);
			
		}elseif ($this->session->userdata('tester_login') == 1) {
            $this->session->set_userdata('last_page', current_url());
			
			$data['page_title'] = 'Dashboard';
			$this->load->view('tester/home',$data);
			
		}else{

			$this->load->view('showLogin');
		}
	}
	
	public function admin(){
		
		$this->load->view('superadmin/showLogin');
	}
	
	/***login START***/
	public function login()
	{
		if ($this->session->userdata('superadmin_login') == 1) {
            $this->session->set_userdata('last_page', current_url());
			
			$data['page_title'] = 'Dashboard';
			$this->load->view('superadmin/home',$data);
			
        }elseif ($this->session->userdata('company_login') == 1) {
            $this->session->set_userdata('last_page', current_url());
			
			$data['page_title'] = 'Dashboard';
			$this->load->view('company/home',$data);
			
        }elseif ($this->session->userdata('admin_login') == 1) {
            $this->session->set_userdata('last_page', current_url());
			
			$data['page_title'] = 'Dashboard';
			$this->load->view('administrator/home',$data);
			
		}elseif ($this->session->userdata('tester_login') == 1) {
            $this->session->set_userdata('last_page', current_url());
			
			$data['page_title'] = 'Dashboard';
			$this->load->view('tester/home',$data);
			
		}else{
		$this->load->view('showLogin');
		}
	}
	
    //Validating login from ajax request
    function validate_login() {
		
			$email= $this->input->post('loginEmail');
			$password = $this->input->post('loginPassword');
			
			$credential = array('email' => $email, 'password' => $password);
			$this->test_model->validate_login_info($email,$password);
        
		

	}
	
	 function logout() {
        $this->session->sess_destroy();
        $this->session->set_flashdata('logout_notification', 'logged_out');
        redirect(base_url(), 'refresh');
    }
	/***login END***/
	
	
	/***Registration START***/
	public function register()
	{
		//$this->load->view('superadmin/showRegister');
	}
	/***Registration END***/
		
		/***Registration START***/
	public function forgotPassword()
	{
		$this->load->view('showForgotPassword');
	}
	/***Registration END***/	
	
	/*****company info START***/
	
	function createCompany(){
			$this->form_validation->set_rules('company_name', 'Company Name', 'required|is_unique[company.company_name]');
			$this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->set_rules('confirm', 'Password Confirmation', 'required|matches[password]');
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[company.email]|is_unique[user.email]');
			
			if ($this->form_validation->run() == FALSE)
                         {
                               $this->session->set_flashdata('err_msg', validation_errors());
                               redirect(base_url() . 'index.php/Admin/company');
                         }
                        else
                        {
                            $this->admin_model->save_company_info();
                            $this->session->set_flashdata('msg', ('Company Added Successfully'));
                            redirect(base_url() . 'index.php/Admin/company');
                        }
            
                 }
		
		public function actComStatus($company_id,$status){
			//$user_id= Session::get('admin_id');
			if($status==0){
				$stat=1;
			}elseif($status==1){
				$stat=0;
			}
			$dat['status']    = $stat;		        
			$this->db->where('company_id',$company_id);
			$this->db->update('company',$dat);
			redirect(base_url() . 'index.php/Admin/company');
		
         
		}
		
	public function company($task = "", $company_id = "") {
        if ($this->session->userdata('superadmin_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(), 'refresh');
        }
        		
        if ($task == "update") {
            $this->admin_model->update_company_info($company_id);
            $this->session->set_flashdata('msg', ('Company Detail Updated Successfully'));
            redirect(base_url() . 'index.php/Admin/company');
        }
		
        if ($task == "delete") {
            $this->admin_model->delete_company_info($company_id);
            $this->session->set_flashdata('msg', ('Company Deleted Successfully'));
            redirect(base_url() . 'index.php/Admin/company');
        }
		$data['company_info'] = $this->admin_model->select_company_info();		
		$data['page_title'] = 'Company';
                $this->load->view('superadmin/showCompany',$data);
	}
	
	/*****company info END***/	
	
	/****profile START***/
	
	function updateProfile($admin_id){
		
	$this->form_validation->set_rules('fname', 'First Name', 'required');
        $this->form_validation->set_rules('lname', 'Last Name', 'required');
	
			if ($this->form_validation->run() == FALSE)
                         {
                                $this->session->set_flashdata('err_msg', validation_errors());
                               redirect(base_url() . 'index.php/Admin/profile');
                        }
                        else
                        {
				 $this->admin_model->update_superadmin_info($admin_id);
				$this->session->set_flashdata('msg', ('Profile Info Updated Successfully'));
				redirect(base_url() . 'index.php/Admin/profile');
			}
            
        }
		
		function updatePassword($admin_id){		
			$this->form_validation->set_rules('old_password', 'Old Password', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->set_rules('confirm', 'Password Confirmation', 'required|matches[password]');
	
			if ($this->form_validation->run() == FALSE)
                    {
                            $this->session->set_flashdata('err_msg', validation_errors());
                               redirect(base_url() . 'index.php/Admin/profile');
                    }
                     else
                    {
					$query = $this->admin_model->checkOldPassword($this->input->post('old_password'));

						if($query)
							{
								
								$this->admin_model->update_my_password_info($admin_id);
                                                                $this->session->sess_destroy();
								$this->session->set_flashdata('msg', ('Password Updated Successfully'));
								redirect(base_url() . 'index.php/Admin/profile');
							}
							else
							{
								$this->session->set_flashdata('err_msg','Please Enter the Correct Password');
								redirect(base_url() . 'index.php/Admin/profile');
							}
						
				 
				}
            
        }
		
		public function updatepath($admin_id = "") {
            $this->admin_model->update_folderlocation_info($admin_id);
            $this->session->set_flashdata('msg', ('Folder Location Updated Successfully'));
            redirect(base_url() . 'index.php/Admin/profile');
        }
		
	public function profile($task = "", $admin_id = "") {
        if ($this->session->userdata('superadmin_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(), 'refresh');
        }
        		
        if ($task == "update") {
            $this->admin_model->update_superadmin_info($admin_id);
            $this->session->set_flashdata('msg', ('Profile info Edited Successfully'));
            redirect(base_url() . 'index.php/Admin/profile');
        }
		if ($task == "updatemail") {
            $this->admin_model->update_superadmin_mail_info($admin_id);
            $this->session->set_flashdata('msg', ('Mail Details Updated Successfully'));
            redirect(base_url() . 'index.php/Admin/profile');
        }		

		$data['myprofile_info'] = $this->admin_model->select_myprofile_info();
		$data['myprofile_mail_info'] = $this->admin_model->select_myprofile_mail_info();
		$data['page_title'] = 'User Profile';                
		$this->load->view('superadmin/showProfile',$data);
	}
	/***profile END***/
	
	
}
