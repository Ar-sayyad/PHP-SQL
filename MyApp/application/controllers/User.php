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
		$this->load->view('superadmin/showRegister');
	}
	/***Registration END***/
		
		/***Registration START***/
	public function forgotPassword()
	{
		$this->load->view('superadmin/showForgotPassword');
	}
	/***Registration END***/
	
	
	/***USERS START***/
	public function users1()
	{
		if ($this->session->userdata('company_login') == 1) {
            $this->session->set_userdata('last_page', current_url());
			
			$data['page_title'] = 'Users';
			$this->load->view('superadmin/showUsers',$data);			
        }else{
			$this->load->view('showLogin');
		}
		
	}
	/*****user functionality start***/
	function createUser(){
			$this->form_validation->set_rules('firstname', 'Firstname', 'required');
			$this->form_validation->set_rules('lastname', 'Lastname', 'required');
			$this->form_validation->set_rules('contact', 'contact', 'required');
			$this->form_validation->set_rules('user_type', 'user_type', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->set_rules('confirm', 'Password Confirmation', 'required|matches[password]');
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[user.email]');
			
			if ($this->form_validation->run() == FALSE)
                {
                                            $data['user_info'] = $this->admin_model->select_user_info();
                                            $data['page_title'] = 'Users';
					    $data['errors'] = validation_errors();
					   $this->load->view('superadmin/showUsers',$data);
					   //echo validation_errors(); 
                }
                else
                {
				 $this->admin_model->save_user_info();
				$this->session->set_flashdata('message', ('User Added Successfully'));
				redirect(base_url() . 'index.php/admin/users');
				}
            
        }
	function users($task = "", $user_id = "") {
        if ($this->session->userdata('company_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(), 'refresh');
        }
        		
        if ($task == "update") {
            $this->admin_model->update_user_info($user_id);
            $this->session->set_flashdata('message', ('User Edited Successfully'));
            redirect(base_url() . 'index.php/admin/users');
        }

        if ($task == "delete") {
            $this->admin_model->delete_user_info($user_id);
            redirect(base_url() . 'index.php/admin/users');
        }

        $data['user_info'] = $this->admin_model->select_user_info();
        $data['errors'] = '';
		$data['page_title'] = 'Users';
		$this->load->view('superadmin/showUsers',$data);
    }
	

	/***USERS functionality END***/
	
	
	/****testConfig START***/
	
	public function testConfig()
	{
		$data['page_title'] = 'Configuration';
		$this->load->view('superadmin/showConfiguration',$data);
		
	}
	/***testConfig END***/
	
	
	
	/****testEnvironment START***/
	function createEnvironment(){
		$this->form_validation->set_rules('environment', 'Environment', 'required');
						
			if ($this->form_validation->run() == FALSE)
                {
					$data['environment_info'] = $this->admin_model->select_environment_info();
                                        $data['page_title'] = 'Manage Environment';
                                        $data['errors'] = validation_errors();
					   $this->load->view('superadmin/showEnvironment',$data);
					   //echo validation_errors(); 
                }
                else
                {
				 $this->admin_model->save_environment_info();
				$this->session->set_flashdata('message', ('Environment Added Successfully'));
				redirect(base_url() . 'index.php/admin/testEnvironment');
				}
            
        }
	public function testEnvironment($task = "", $environment_id = "") {
        if ($this->session->userdata('company_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(), 'refresh');
        }
        		
        if ($task == "update") {
            $this->admin_model->update_environment_info($environment_id);
            $this->session->set_flashdata('message', ('Environment Edited Successfully'));
            redirect(base_url() . 'index.php/admin/testEnvironment');
        }

        if ($task == "delete") {
            $this->admin_model->delete_environment_info($environment_id);
            redirect(base_url() . 'index.php/admin/testEnvironment');
        }

        $data['environment_info'] = $this->admin_model->select_environment_info();
		$data['page_title'] = 'Manage Environment';
                $data['errors'] = '';
		$this->load->view('superadmin/showEnvironment',$data);
		
	}
	/***testEnvironment END***/
	
	
	
	/****testBrowser START***/
	
	function createBrowser(){
		$this->form_validation->set_rules('browser', 'Browser', 'required');
						
			if ($this->form_validation->run() == FALSE)
                {
					$data['browser_info'] = $this->admin_model->select_browser_info();
                                        $data['page_title'] = 'Manage Browser';
                                        $data['errors'] = validation_errors();
					   $this->load->view('superadmin/showBrowser',$data);
					   //echo validation_errors(); 
                }
                else
                {
				 $this->admin_model->save_browser_info();
				$this->session->set_flashdata('message', ('Browser Added Successfully'));
				redirect(base_url() . 'index.php/admin/testBrowser');
				}
            
        }
	
	public function testBrowser($task = "", $browser_id = "") {
        if ($this->session->userdata('company_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(), 'refresh');
        }
        		
        if ($task == "update") {
            $this->admin_model->update_browser_info($browser_id);
            $this->session->set_flashdata('message', ('Browser Edited Successfully'));
            redirect(base_url() . 'index.php/admin/testBrowser');
        }

        if ($task == "delete") {
            $this->test_model->delete_browser_info($browser_id);
            redirect(base_url() . 'index.php/admin/testBrowser');
        }

                   $data['browser_info'] = $this->admin_model->select_browser_info();
		   $data['page_title'] = 'Manage Browser';
                   $data['errors'] = '';
		   $this->load->view('superadmin/showBrowser',$data);
	}
	/***testBrowser END***/
	
	
	
	/****testApplication START***/
	
	function createApplication(){
		
		$this->form_validation->set_rules('application', 'Application', 'required');
						
			if ($this->form_validation->run() == FALSE)
                {
					$data['application_info'] = $this->admin_model->select_application_info();
                                        $data['page_title'] = 'Manage Application';
                                        $data['errors'] = validation_errors();
					   $this->load->view('superadmin/showApplication',$data);
					   //echo validation_errors(); 
                }
                else
                {
				 $this->admin_model->save_application_info();
				$this->session->set_flashdata('message', ('Application Added Successfully'));
				redirect(base_url() . 'index.php/admin/testApplication');
				}
            
        }
	
	public function testApplication($task = "", $application_id = "") {
        if ($this->session->userdata('company_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(), 'refresh');
        }
        		
        if ($task == "update") {
            $this->admin_model->update_application_info($application_id);
            $this->session->set_flashdata('message', ('Application Edited Successfully'));
            redirect(base_url() . 'index.php/admin/testApplication');
        }

        if ($task == "delete") {
            $this->admin_model->delete_application_info($application_id);
            redirect(base_url() . 'index.php/admin/testApplication');
        }

		$data['application_info'] = $this->test_model->select_application_info();
		$data['page_title'] = 'Manage Application';
                $data['errors'] = '';
		$this->load->view('superadmin/showApplication',$data);
	}
	/***testApplication END***/
	
	
	
	/****testCases START***/
	
	function createTestCase(){
		
	$this->form_validation->set_rules('application_id', 'Application', 'required');
	$this->form_validation->set_rules('testcase_name', 'Test Case Name', 'required');
	$this->form_validation->set_rules('class_name', 'Class Name', 'required');
	$this->form_validation->set_rules('user_type', 'Role', 'required');
	$this->form_validation->set_rules('status_type', 'Status', 'required');
			if ($this->form_validation->run() == FALSE)
                {
					$data['testcase_info'] = $this->test_model->select_testcase_info();
                                        $data['page_title'] = 'Manage Test Cases';
                                        $data['errors'] = validation_errors();
					   $this->load->view('superadmin/showTestcases',$data);
					   //echo validation_errors(); 
                }
                else
                {
				 $this->test_model->save_testcase_info();
				$this->session->set_flashdata('message', ('Test Case Added Successfully'));
				redirect(base_url() . 'index.php/admin/testCases');
				}
            
        }
	public function testCases($task = "", $testcase_id = "") {
        if ($this->session->userdata('company_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(), 'refresh');
        }
        		
        if ($task == "update") {
            $this->test_model->update_testcase_info($testcase_id);
            $this->session->set_flashdata('message', ('Test Case Edited Successfully'));
            redirect(base_url() . 'index.php/admin/testCases');
        }

        if ($task == "delete") {
            $this->test_model->delete_testcase_info($testcase_id);
            redirect(base_url() . 'index.php/admin/testCases');
        }
		$data['testcase_info'] = $this->test_model->select_testcase_info();
		$data['page_title'] = 'Manage Test Cases';
                $data['errors'] = '';
		$this->load->view('superadmin/showTestcases',$data);
	}
	/***testCases END***/
	
	
	
	/****companyUrl START***/
	
	function createCompanyUrl(){
		
	$this->form_validation->set_rules('application_id', 'Application', 'required');
	//$this->form_validation->set_rules('environment_id[]', 'Environment', 'required');
	//$this->form_validation->set_rules('env_url[]', 'Environment URL', 'required');
	
			if ($this->form_validation->run() == FALSE)
                {
					$data['companyurl_info'] = $this->test_model->select_companyurl_info();	
					$data['application_info'] = $this->test_model->select_application_info();
					$data['environment_info'] = $this->test_model->select_environment_info();
                                        $data['page_title'] = 'Company URL';
                                        $data['errors'] = validation_errors();
					$this->load->view('superadmin/showCompanyurl',$data);
					   //echo validation_errors(); 
                }
                else
                {
                    $this->test_model->save_companyurl_info();
                   $this->session->set_flashdata('message', ('Company url Added Successfully'));
                   redirect(base_url() . 'index.php/admin/companyUrl');
                }
            
        }
		
	public function companyUrl($task = "", $company_env_id = "") {
        if ($this->session->userdata('company_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(), 'refresh');
        }
        		
        if ($task == "update") {
            $this->test_model->update_companyurl_info($company_env_id);
            $this->session->set_flashdata('message', ('Company url Edited Successfully'));
            redirect(base_url() . 'index.php/admin/companyUrl');
        }

        if ($task == "delete") {
            $this->test_model->delete_companyurl_info($company_env_id);
            redirect(base_url() . 'index.php/admin/companyUrl');
        }
		$data['companyurl_info'] = $this->test_model->select_companyurl_info();		
		$data['application_info'] = $this->test_model->select_application_info();		
		$data['environment_info'] = $this->test_model->select_environment_info();
		$data['com_environment_info'] = $this->test_model->select_com_environment_info();
		$data['page_title'] = 'Company URL';
                $data['errors'] = '';
		$this->load->view('superadmin/showCompanyurl',$data);
	}
	/***companyUrl END***/
	
	/*****company info START***/
	
	function createCompany(){
			$this->form_validation->set_rules('company_name', 'Company Name', 'required');
			$this->form_validation->set_rules('contact', 'contact', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->set_rules('confirm', 'Password Confirmation', 'required|matches[password]');
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[company.email]');
			
			if ($this->form_validation->run() == FALSE)
                {
					$data['company_info'] = $this->admin_model->select_company_info();
                                        $data['page_title'] = 'Company';
                                        $data['errors'] = validation_errors();
					$this->load->view('superadmin/showCompany',$data);
					   //echo validation_errors(); 
                }
                else
                {
                    $this->admin_model->save_company_info();
                    $this->session->set_flashdata('message', ('Company Added Successfully'));
                    redirect(base_url() . 'index.php/admin/company');
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
			redirect(base_url() . 'index.php/admin/company');
		
         
		}
		
	public function company($task = "", $company_id = "") {
        if ($this->session->userdata('superadmin_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(), 'refresh');
        }
        		
        if ($task == "update") {
            $this->admin_model->update_company_info($company_id);
            $this->session->set_flashdata('message', ('Company url Edited Successfully'));
            redirect(base_url() . 'index.php/admin/company');
        }
		
        if ($task == "delete") {
            $this->admin_model->delete_company_info($company_id);
            redirect(base_url() . 'index.php/admin/company');
        }
		$data['company_info'] = $this->admin_model->select_company_info();		
		$data['page_title'] = 'Company';
                $data['errors'] = '';
		$this->load->view('superadmin/showCompany',$data);
	}
	
	/*****company info END***/
	
	
	
	/****testExecute START***/
      
	
	
	public function testExecute()
	{
		$data['application_info'] = $this->test_model->select_application_info();
		$data['environment_info'] = $this->test_model->select_environment_info();
		$data['browser_info'] = $this->test_model->select_browser_info();
		$data['page_title'] = 'Configure Execution';
                $data['errors'] = '';
		$this->load->view('superadmin/showExecution',$data);
	}
	

	public function check_environment(){
		
		$environment_id=$this->input->post('environment');
                $data=$this->test_model->get_check_environment($environment_id);        
                 echo $data;
		
	}
	
	public function check_testcase(){
		$application_id=$this->input->post('application_id');
                $data=$this->test_model->get_check_testcase($application_id);        
                echo $data;
		
	}
	/***testExecute END***/
	
	
	
	/****testReports START***/
	public function testReports()
	{
		//$data['testreport_info'] = $this->test_model->select_testreport_info();
		$data['execute_info'] = $this->test_model->select_execut_info();
		$data['email_log_info'] = $this->test_model->select_email_log_info();
		$data['page_title'] = 'Execution Reports';
		$this->load->view('superadmin/showReports',$data);
	}
	
	public function show_execution(){
		$runname=$this->input->post('execution_id');
        $data=$this->test_model->get_show_execution($runname);        
        echo $data;
		
	}
	
	/***testReports END***/
	
	
	
	/****profile START***/
	
	function updateProfile($admin_id){
		
	$this->form_validation->set_rules('fname', 'First Name', 'required');
        $this->form_validation->set_rules('lname', 'Last Name', 'required');
	$this->form_validation->set_rules('contact', 'contact', 'required');
	
			if ($this->form_validation->run() == FALSE)
                {
					$data['myprofile_info'] = $this->admin_model->select_myprofile_info();
                                        $data['page_title'] = 'User Profile';
                                        $data['errors'] = validation_errors();
					$this->load->view('superadmin/showProfile',$data);
					   //echo validation_errors(); 
                }
                else
                {
				 $this->admin_model->update_superadmin_info($admin_id);
				$this->session->set_flashdata('message', ('Profile Info Updated Successfully'));
				redirect(base_url() . 'index.php/admin/profile');
				}
            
        }
		
		function updatePassword($admin_id){		
			$this->form_validation->set_rules('old_password', 'Old Password', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->set_rules('confirm', 'Password Confirmation', 'required|matches[password]');
	
			if ($this->form_validation->run() == FALSE)
                {
					$data['myprofile_info'] = $this->admin_model->select_myprofile_info();                                        
                                        $data['myprofile_mail_info'] = $this->admin_model->select_myprofile_mail_info();
                                         $data['page_title'] = 'User Profile';
                                         $data['errors'] = validation_errors();
					$this->load->view('superadmin/showProfile',$data);
					   //echo validation_errors(); 
                }
                else
                {
					$query = $this->admin_model->checkOldPassword($this->input->post('old_password'));

						if($query)
							{
								$this->session->sess_destroy();
								$this->admin_model->update_my_password_info($admin_id);
								$this->session->set_flashdata('message', ('Password Updated Successfully'));
								redirect(base_url() . 'index.php/admin/profile');
							}
							else
							{
								$this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Oops! Error.  Please try again later!!!</div>');
								//redirect(base_url() . 'index.php/Testapp/profile');
							}
						
				 
				}
            
        }
		
	public function profile($task = "", $admin_id = "") {
        if ($this->session->userdata('superadmin_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(), 'refresh');
        }
        		
        if ($task == "update") {
            $this->admin_model->update_superadmin_info($admin_id);
            $this->session->set_flashdata('message', ('Profile info Edited Successfully'));
            redirect(base_url() . 'index.php/admin/profile');
        }
		if ($task == "updatemail") {
            $this->admin_model->update_superadmin_mail_info($admin_id);
            $this->session->set_flashdata('message', ('Profile mail Edited Successfully'));
            redirect(base_url() . 'index.php/admin/profile');
        }

		$data['myprofile_info'] = $this->admin_model->select_myprofile_info();
		//$data['myprofile_mail_info'] = $this->admin_model->select_myprofile_mail_info();
		$data['page_title'] = 'User Profile';
                $data['errors'] = '';
		$this->load->view('superadmin/showProfile',$data);
	}
	/***profile END***/
	
	
}
