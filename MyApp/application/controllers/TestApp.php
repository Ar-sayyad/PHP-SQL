<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TestApp extends CI_Controller {
	
	public function __construct() {
        parent::__construct();
        $this->load->database();
		$this->load->model('test_model');
        $this->load->library('session');
		$this->load->library('form_validation');
        $this->load->helper('file');
         $this->load->helper(array('form', 'url'));
        $this->load->library('upload');
		date_default_timezone_set("Asia/Kolkata");
         /* cache control */
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
    }

	public function index()
	{
		$path = $this->db->get_where('admin')->row()->path;
		$testdata_path = $this->db->get_where('admin')->row()->testdata_path;
		$this->session->set_userdata('folder_path', $path);
		$this->session->set_userdata('testdata_path', $testdata_path);
		
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
		
		$this->load->view('company/showLogin');
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
		$this->load->view('showRegister');
	}
	/***Registration END***/
		
		/***Password START***/
		
	public function forgotPassword()
	{
		$data['errors'] = '';
		$data['success'] = '';
		$this->load->view('showForgotPassword',$data);
	}
	
	function validateForgotPassword(){
		
		$email = $this->input->post('email');      
        $findemail = $this->test_model->ForgotPassword($email);  
        if($findemail==1){
		$this->session->set_userdata('pass_status',1);
         $data['success'] = ''; 
		 $data['errors'] = "";	
		 $this->session->set_flashdata('msg', ('Password Activation Link Sent to Your Email.!'));
		 redirect(base_url() . 'index.php/TestApp/forgotPassword');
			    
        }else{
			 $data['success'] ='';
			$data['errors'] = 'Invalid Email...!';
			$this->load->view('showForgotPassword',$data);
		}
		
      
	}
	function reset_password(){
		$email = $this->input->get('email');
		$id = $this->input->get('id');
		//$k = $this->input->get('k');
			
		$table = $this->input->get('type');		
		$data['type']=$table;	
		$data['id'] = $id;
		$data['email'] = $email;
		$data['errors'] = '';
		$this->load->view('showResetPassword',$data);
		
	}
	function saveResetPassword(){
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('confirm', 'Password Confirmation', 'required|matches[password]');
		$email = $this->input->post('email');
		$id = $this->input->post('id');		
		$table = $this->input->post('type');
		if ($this->form_validation->run() == FALSE)
                {
					$data['type']=$table;	
					$data['id'] = $id;
					$data['email'] = $email;
					$data['errors'] =  validation_errors();
					$this->load->view('showResetPassword',$data);
                }
                else
                {
					$password = $this->input->post('password');
					$this->test_model->reset_password_info($table,$id,$email,$password);				
					
					$data['success'] = 'Password Updated Successfully.!';
					$this->load->view('showResetMsgPassword',$data);
							 
				}
			
	}
	/***Password END***/
	
	
	/***USERS START***/
	public function users1()
	{
		if ($this->session->userdata('company_login') == 1) {
            $this->session->set_userdata('last_page', current_url());
			
			$data['page_title'] = 'Users';
			$this->load->view('company/showUsers',$data);			
        }else{
			$this->load->view('showLogin');
		}
		
	}
	/*****user functionality start***/
	function createUser(){
		
		 if ($this->session->userdata('company_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(), 'refresh');
            }
			$this->form_validation->set_rules('firstname', 'Firstname', 'required');
			$this->form_validation->set_rules('lastname', 'Lastname', 'required');
			$this->form_validation->set_rules('user_type', 'user_type', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->set_rules('confirm', 'Password Confirmation', 'required|matches[password]');
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[user.email]|is_unique[company.email]');
			

			
			if ($this->form_validation->run() == FALSE)
                     {
                            $this->session->set_flashdata('err_msg', validation_errors());
                            redirect(base_url() . 'index.php/TestApp/users');
                    }
                    else
                     {
                            $this->test_model->save_user_info();
                            $this->session->set_flashdata('message', ('User Added Successfully'));
                            redirect(base_url() . 'index.php/TestApp/users');
                    }
            
        }
	function users($task = "", $user_id = "") {
		
        if ($this->session->userdata('company_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(), 'refresh');
        }
        		
        if ($task == "update") {
            $this->test_model->update_user_info($user_id);
            $this->session->set_flashdata('msg', ('User Updated Successfully'));
            redirect(base_url() . 'index.php/TestApp/users');
        }

        if ($task == "delete") {
            $this->test_model->delete_user_info($user_id);
            $this->session->set_flashdata('msg', ('User Deleted Successfully'));
            redirect(base_url() . 'index.php/TestApp/users');
        }

            $data['user_info'] = $this->test_model->select_user_info();
            $data['page_title'] = 'Users';
            $this->load->view('company/showUsers',$data);
    }
	

	/***USERS functionality END***/
	
	
	/****testConfig START***/
	
	public function testConfig()
	{
		 if ($this->session->userdata('company_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(), 'refresh');
        }
		$data['page_title'] = 'Configuration';
		$this->load->view('company/showConfiguration',$data);
		
	}
	/***testConfig END***/
	
	
	
	/****testEnvironment START***/
	function createEnvironment(){
		
	if ($this->session->userdata('company_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(), 'refresh');
        }
		$this->form_validation->set_rules('environment', 'Environment', 'required');
					
		if ($this->form_validation->run() == FALSE)
                {
                        $this->session->set_flashdata('err_msg', validation_errors());
                        redirect(base_url() . 'index.php/TestApp/testEnvironment');
                }
                else
                {
                       $company_id = $this->session->userdata('login_company_id');
                       $environment_name = ucfirst($this->input->post('environment'));
                       $this->db->where('company_id',$company_id);
                       $this->db->where('environment_name',$environment_name);
                       $query = $this->db->get('environment');
                       if ($query->num_rows() > 0){
                           
                          $this->session->set_flashdata('err_msg', 'Environment Name Already Exists.');
                          redirect(base_url() . 'index.php/TestApp/testEnvironment');                          
                       }
                       else{
                            $this->test_model->save_environment_info();
                           $this->session->set_flashdata('msg', ('Environment Added Successfully'));
                           redirect(base_url() . 'index.php/TestApp/testEnvironment');
                       }
                           
		}
            
        }
	public function testEnvironment($task = "", $environment_id = "") {
		
        if ($this->session->userdata('company_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(), 'refresh');
        }
        		
        if ($task == "update") {
                       $company_id = $this->session->userdata('login_company_id');
                       $environment_name = ucfirst($this->input->post('environment'));
                       $this->db->where('company_id',$company_id);
                       $this->db->where('environment_name',$environment_name);
                       $query = $this->db->get('environment');
                       if ($query->num_rows() > 0){
                           
                          $this->session->set_flashdata('err_msg', 'Environment Name Already Exists.');
                          redirect(base_url() . 'index.php/TestApp/testEnvironment');                          
                       }
                       else{
                            $this->test_model->update_environment_info($environment_id);
                            $this->session->set_flashdata('msg', ('Environment Updated Successfully'));
                            redirect(base_url() . 'index.php/TestApp/testEnvironment');
                       }
            
        }

        if ($task == "delete") {
                                $this->db->where('environment_id',$environment_id);
                                  $query = $this->db->get('email_log');
                                  
                               $this->db->where('environment_id',$environment_id);
                                  $query1 = $this->db->get('logical_group');								  
								  
                               if ($query->num_rows() > 0){                           

                                   $this->session->set_flashdata('err_msg', 'Selected Environment has Testcases Execution can`t deleted.');
                                    redirect(base_url() . 'index.php/TestApp/testEnvironment');
                                }
				elseif($query1->num_rows() > 0){
				$this->session->set_flashdata('err_msg', 'Selected Environment has Logical Group can`t deleted.');
                                    redirect(base_url() . 'index.php/TestApp/testEnvironment');
				}
                               else{
                                        $this->test_model->delete_environment_info($environment_id);
                                        $this->session->set_flashdata('msg', ('Environment Deleted Successfully'));
                                        redirect(base_url() . 'index.php/TestApp/testEnvironment');
                                 }                                 
           
        }
                $data['environment_info'] = $this->test_model->select_environment_info();
                $data['page_title'] = 'Manage Environment';
                $this->load->view('company/showEnvironment',$data);
		
	}
	/***testEnvironment END***/
	
	
	
	/****testBrowser START***/
	
	function createBrowser(){
		 if ($this->session->userdata('company_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(), 'refresh');
        }
		$this->form_validation->set_rules('browser', 'Browser', 'required');
						
			if ($this->form_validation->run() == FALSE)
                    {
                        $this->session->set_flashdata('err_msg', validation_errors());
                        redirect(base_url() . 'index.php/TestApp/testBrowser');
                        
                    }
                     else
                    {
                        $company_id = $this->session->userdata('login_company_id');
                        $browser = ucfirst($this->input->post('browser'));
                        $this->db->where('company_id',$company_id);
                        $this->db->where('browser_name',$browser);
                        $query = $this->db->get('browser');
                       if ($query->num_rows() > 0){
                           
                            $this->session->set_flashdata('err_msg', ('Browser Name Already Exists.'));
                            redirect(base_url() . 'index.php/TestApp/testBrowser');
                       }
                       else{
                            $this->test_model->save_browser_info();
                            $this->session->set_flashdata('msg', ('Browser Added Successfully'));
                            redirect(base_url() . 'index.php/TestApp/testBrowser');
                       }
                       
		}
            
        }
	
	public function testBrowser($task = "", $browser_id = "") {
        if ($this->session->userdata('company_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(), 'refresh');
        }
        		
        if ($task == "update") {
                        $company_id = $this->session->userdata('login_company_id');
                        $browser = ucfirst($this->input->post('browser'));
                        $this->db->where('company_id',$company_id);
                        $this->db->where('browser_name',$browser);
                        $query = $this->db->get('browser');
                       if ($query->num_rows() > 0){
                           
                            $this->session->set_flashdata('err_msg', ('Browser Name Already Exists.'));
                            redirect(base_url() . 'index.php/TestApp/testBrowser');
                       }
                       else{
                            $this->test_model->update_browser_info($browser_id);
                            $this->session->set_flashdata('msg', ('Browser Updated Successfully'));
                            redirect(base_url() . 'index.php/TestApp/testBrowser');
                       }
           
        }

        if ($task == "delete") {
                                 $this->db->where('browser_id',$browser_id);
                                  $query = $this->db->get('email_log');
                               if ($query->num_rows() > 0){                           

                                   $this->session->set_flashdata('err_msg', 'Selected Browser has Testcases Execution can`t deleted.');
                                    redirect(base_url() . 'index.php/TestApp/testBrowser');
                                }
                               else{
                                     $this->test_model->delete_browser_info($browser_id);
                                     $this->session->set_flashdata('msg', ('Browser Deleted Successfully'));
                                     redirect(base_url() . 'index.php/TestApp/testBrowser');
                                 }                               
           
        }

                $data['browser_info'] = $this->test_model->select_browser_info();
		$data['page_title'] = 'Manage Browser';
                $this->load->view('company/showBrowser',$data);
	}
	/***testBrowser END***/
	
	
	
	/****testApplication START***/
	
	function createApplication(){
		 if ($this->session->userdata('company_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(), 'refresh');
        }
		
			$this->form_validation->set_rules('application', 'Application', 'required');
						
			if ($this->form_validation->run() == FALSE)
                {
                        $this->session->set_flashdata('err_msg', 'Application Name is Required.');
                        redirect(base_url() . 'index.php/TestApp/testApplication');
                   
                }
                else
                {
			 $company_id = $this->session->userdata('login_company_id');
                        $application = ucfirst($this->input->post('application'));
                        $this->db->where('company_id',$company_id);
                        $this->db->where('application_name',$application);
                        $query = $this->db->get('application');
                       if ($query->num_rows() > 0){                           
                            
                           $this->session->set_flashdata('err_msg', 'Application Name Already Exists.');
                            redirect(base_url() . 'index.php/TestApp/testApplication');
                        }
                       else{
                            $this->test_model->save_application_info();
                            $this->session->set_flashdata('msg', ('Application Added Successfully'));
                            redirect(base_url() . 'index.php/TestApp/testApplication');
                         }			
                               
		}
            
        }
	
	public function testApplication($task = "", $application_id = "") {
        if ($this->session->userdata('company_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(), 'refresh');
        }
        		
        if ($task == "update") {
                        $company_id = $this->session->userdata('login_company_id');
                        $application = ucfirst($this->input->post('application'));
                        $this->db->where('company_id',$company_id);
                        $this->db->where('application_name',$application);
                        $query = $this->db->get('application');
                       if ($query->num_rows() > 0){                           
                            
                           $this->session->set_flashdata('err_msg', 'Application Name Already Exists.');
                            redirect(base_url() . 'index.php/TestApp/testApplication');
                        }
                       else{
                             $this->test_model->update_application_info($application_id);
                             $this->session->set_flashdata('msg', ('Application Updated Successfully'));
                             redirect(base_url() . 'index.php/TestApp/testApplication');
                         }
                         
           
        }

        if ($task == "delete") {
            
                                $this->db->where('application_id',$application_id);
                                $query = $this->db->get('testcases');
                               if ($query->num_rows() > 0){                           

                                   $this->session->set_flashdata('err_msg', 'Selected Application has Testcases can`t deleted.');
                                    redirect(base_url() . 'index.php/TestApp/testApplication');
                                }
                               else{
                                    $this->test_model->delete_application_info($application_id);
                                    $this->session->set_flashdata('msg', ('Application Deleted Successfully'));
                                    redirect(base_url() . 'index.php/TestApp/testApplication');
                                 }
            
        }

                $data['application_info'] = $this->test_model->select_application_info();
                $data['page_title'] = 'Manage Application';
                $this->load->view('company/showApplication',$data);
	}
	/***testApplication END***/
	
	
	
	/****testCases START***/
	
	function createTestCase(){
		 if ($this->session->userdata('company_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(), 'refresh');
        }
		
			$this->form_validation->set_rules('application_id', 'Application', 'required');
			$this->form_validation->set_rules('testcase_name', 'Test Case Name', 'required');
			$this->form_validation->set_rules('class_name', 'Class Name', 'required');
			if ($this->form_validation->run() == FALSE)
                        {
                            $this->session->set_flashdata('msg', validation_errors());
                            redirect(base_url() . 'index.php/TestApp/testCases');
                                      
                        }
                     else
                        {
				$company_id = $this->session->userdata('login_company_id');
                                $testcase_name = ucfirst($this->input->post('testcase_name'));
                                $this->db->where('company_id',$company_id);
                                $this->db->where('testcase_name',$testcase_name);
                                $query = $this->db->get('testcases');
                               if ($query->num_rows() > 0){                           

                                   $this->session->set_flashdata('err_msg', 'Test Case Name Already Exists.');
                                    redirect(base_url() . 'index.php/TestApp/testCases');
                                }
                               else{
                                    $this->test_model->save_testcase_info();
                                    $this->session->set_flashdata('msg', ('Test Case Added Successfully'));
                                    redirect(base_url() . 'index.php/TestApp/testCases');
                                 }
                                
			}
            
        }
	public function testCases($task = "", $testcase_id = "") {
        if ($this->session->userdata('company_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(), 'refresh');
        }
        		
        if ($task == "update") {
                                $company_id = $this->session->userdata('login_company_id');
                                $testcase_name = ucfirst($this->input->post('testcase_name'));
                                $this->db->where('company_id',$company_id);
                                $this->db->where('testcase_name',$testcase_name);
                                $query = $this->db->get('testcases');
                               if ($query->num_rows() > 0){                           

                                   $this->session->set_flashdata('err_msg', 'Test Case Name Already Exists.');
                                    redirect(base_url() . 'index.php/TestApp/testCases');
                                }
                               else{
                                        $this->test_model->update_testcase_info($testcase_id);
                                        $this->session->set_flashdata('msg', ('Test Case Updated Successfully'));
                                        redirect(base_url() . 'index.php/TestApp/testCases');
                                 }
                                 
           
        }

        if ($task == "delete") {
            
                                $testcase_name = $this->test_model->get_test_case_name($testcase_id);
                                $this->db->where('TESTCASENAME',$testcase_name);
                                $query = $this->db->get('tce_testcases_results');
                               if ($query->num_rows() > 0){                           

                                   $this->session->set_flashdata('err_msg', 'Test Case is executed can`t deleted.');
                                    redirect(base_url() . 'index.php/TestApp/testCases');
                                }
                               else{
                                   $this->test_model->delete_testcase_info($testcase_id);
                                    $this->session->set_flashdata('msg', ('Test Case Deleted Successfully'));
                                    redirect(base_url() . 'index.php/TestApp/testCases');
                                 }                                 
            
        }
            $data['testcase_info'] = $this->test_model->select_testcase_info();
            $data['page_title'] = 'Manage Test Cases';
            $this->load->view('company/showTestcases',$data);
	}
	/***testCases END***/
	
	
	
	/****companyUrl START***/
	
	function createCompanyUrl(){
		 if ($this->session->userdata('company_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(), 'refresh');
        }
		
            $this->form_validation->set_rules('application_id', 'Application', 'required');

            if ($this->form_validation->run() == FALSE)
            {
                    $this->session->set_flashdata('err_msg', validation_errors());
                    redirect(base_url() . 'index.php/TestApp/companyUrl');
                    
            }
            else
            {
                    $this->test_model->save_companyurl_info();
                   $this->session->set_flashdata('msg', ('Company url Added Successfully'));
                   redirect(base_url() . 'index.php/TestApp/companyUrl');
            }
            
        }
		
	public function companyUrl($task = "", $company_env_id = "") {
        if ($this->session->userdata('company_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(), 'refresh');
        }
        		
        if ($task == "update") {
            $this->test_model->update_companyurl_info($company_env_id);
            $this->session->set_flashdata('msg', ('Company url Edited Successfully'));
            redirect(base_url() . 'index.php/TestApp/companyUrl');
        }

        if ($task == "delete") {
           $this->test_model->delete_companyurl_info($company_env_id);           
            $this->session->set_flashdata('msg', ('Company url Deleted Successfully'));
            redirect(base_url() . 'index.php/TestApp/companyUrl');
        }
				$data['companyurl_info'] = $this->test_model->select_companyurl_info();		
				$data['application_info'] = $this->test_model->select_application_info();		
				$data['environment_info'] = $this->test_model->select_environment_info();
				$data['com_environment_info'] = $this->test_model->select_com_environment_info();
				$data['page_title'] = 'Company URL';                
				$this->load->view('company/showCompanyurl',$data);
	}
        function url(){
            $data['companyurl_info'] = $this->test_model->select_companyurl_info();		
				$data['application_info'] = $this->test_model->select_application_info();		
				$data['environment_info'] = $this->test_model->select_environment_info();
				$data['com_environment_info'] = $this->test_model->select_com_environment_info();
				$data['page_title'] = 'Company URL';                
				$this->load->view('company/showCompanyurl_2',$data);
        }
	/***companyUrl END***/
	
	/*****company info START***/
	
	function createCompany(){
		 if ($this->session->userdata('company_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(), 'refresh');
        }
			$this->form_validation->set_rules('company_name', 'Company Name', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->set_rules('confirm', 'Password Confirmation', 'required|matches[password]');
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[company.email]');
			
			if ($this->form_validation->run() == FALSE)
                {
					$data['company_info'] = $this->test_model->select_company_info();
					$data['page_title'] = 'Company';
					$data['errors'] = validation_errors();
					$this->load->view('company/showCompany',$data);
					   //echo validation_errors(); 
                }
                else
                {
                    $this->test_model->save_company_info();
                    $this->session->set_flashdata('message', ('Company Added Successfully'));
                    redirect(base_url() . 'index.php/Testapp/company');
                }
            
        }
		
		public function actComStatus($company_id,$status){
			 if ($this->session->userdata('company_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(), 'refresh');
        }
			//$user_id= Session::get('admin_id');
			if($status==0){
				$stat=1;
			}elseif($status==1){
				$stat=0;
			}
			$dat['status']    = $stat;		        
			$this->db->where('company_id',$company_id);
			$this->db->update('company',$dat);
			redirect(base_url() . 'index.php/Testapp/company');
		
         
		}
		
	public function company($task = "", $company_id = "") {
        if ($this->session->userdata('company_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(), 'refresh');
        }
        		
        if ($task == "update") {
            $this->test_model->update_company_info($company_id);
            $this->session->set_flashdata('message', ('Company url Edited Successfully'));
            redirect(base_url() . 'index.php/TestApp/company');
        }
		
        if ($task == "delete") {
            $this->test_model->delete_company_info($company_id);
            redirect(base_url() . 'index.php/TestApp/company');
        }
		$data['company_info'] = $this->test_model->select_company_info();		
		$data['page_title'] = 'Company';
        $data['errors'] = '';
		$this->load->view('company/showCompany',$data);
	}
	
	/*****company info END***/
	
	
	/******UPLOAD TEST CASE START***/
	
	public function testUpload()
	{
		 if ($this->session->userdata('company_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(), 'refresh');
        }
		$data['application_info'] = $this->test_model->select_application_info();
		$data['environment_info'] = $this->test_model->select_environment_info();
		$data['browser_info'] = $this->test_model->select_browser_info();
		$data['page_title'] = 'Upload Test Data';		
		$this->load->view('company/showUploadTestCases',$data);
	}
	
	/****END UPLOAD TEST CASE DATA****/
	
	/*******Logical Group Start**************/
	
	public function createLogicalGroup(){
			$this->form_validation->set_rules('group_name', 'Group Name', 'required|is_unique[logical_group.logical_group_name]');
			$this->form_validation->set_rules('environment_id', 'Environment Name', 'required');
			$this->form_validation->set_rules('testcase_id[]', 'Test Cases', 'required');
			
			if ($this->form_validation->run() == FALSE)
                {		
						echo validation_errors();
				}
				else{		
						echo $this->test_model->saveLogical_group();
				}
	}
	public function createCloneGroup(){
			$this->form_validation->set_rules('group_name', 'Group Name', 'required|is_unique[logical_group.logical_group_name]');
			$this->form_validation->set_rules('environment_id', 'Environment Name', 'required');
			$this->form_validation->set_rules('testcase_id[]', 'Test Cases', 'required');
			
			if ($this->form_validation->run() == FALSE)
                {		
						echo validation_errors();
				}
				else{		
                                        $this->session->set_flashdata('msg', (' Logical Group Created Successfully.'));
					echo $this->test_model->saveClone_group();
                                               
				}
	}
	
	public function LogicalGroup($task = "", $logical_group_id = "") {
        if ($this->session->userdata('company_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(), 'refresh');
        }
        		
        if ($task == "clone") {
            $this->test_model->clone_logical_group_info($logical_group_id);
            $this->session->set_flashdata('msg', ('Logical Group Clone Successfully'));
            redirect(base_url() . 'index.php/TestApp/LogicalGroup');
        }
		
        if ($task == "delete") {
            $this->test_model->delete_logical_group_info($logical_group_id);
             $this->session->set_flashdata('msg', ('Logical Group Deleted Successfully'));
            redirect(base_url() . 'index.php/TestApp/LogicalGroup');
        }
		
		$data['logical_group_info'] = $this->test_model->select_logical_group_info();
                $data['environment_info'] = $this->test_model->select_environment_info();
                $data['browser_info'] = $this->test_model->select_browser_info();
		$data['page_title'] = 'Logical Group';
		$this->load->view('company/showLogicalGroup',$data);
	}
	
	/*******Logical Group end**************/
	
	/****testExecute START***/         
       
        
	function startExecution($type){
		
				$this->form_validation->set_rules('execution_name', 'Execution Name', 'required|is_unique[email_log.runname]');
				if ($this->form_validation->run() == FALSE)
                {
					$this->session->set_flashdata('err_msg', 'Execution Name Already Exists..!');					
					redirect(base_url() . 'index.php/'.$type.'/testExecute');					
                }
                else
                {		
					$this->test_model->startExecution_process($type);
					$this->session->set_flashdata('msg', 'Execution is started Successfully');
					redirect(base_url() . 'index.php/'.$type.'/testReports');
				}			
	}
	
	function startGroupExecution($type){
		
				$this->form_validation->set_rules('execution_name', 'Execution Name', 'required|is_unique[email_log.runname]');
				if ($this->form_validation->run() == FALSE)
                {
					$this->session->set_flashdata('err_msg', 'Execution Name Already Exists..!');					
					redirect(base_url() . 'index.php/'.$type.'/testExecute');					
                }
                else
                {		
					$this->test_model->startGroupExecution_process($type);
					$this->session->set_flashdata('msg', 'Execution is started Successfully');
					redirect(base_url() . 'index.php/'.$type.'/testReports');
				}			
	}
		
	
	
	
	public function testExecute()
	{
		 if ($this->session->userdata('company_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(), 'refresh');
        }
		$data['application_info'] = $this->test_model->select_application_info();
		$data['environment_info'] = $this->test_model->select_environment_info();
		$data['browser_info'] = $this->test_model->select_browser_info();
		$data['page_title'] = 'Configure Execution';		
		$this->load->view('company/showExecution',$data);
	}
	

	public function check_environment(){
		 if ($this->session->userdata('company_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(), 'refresh');
        }
		
		$environment_id=$this->input->post('environment');
                $data=$this->test_model->get_check_environment($environment_id);        
                 echo $data;
		
	}
	
	public function check_testcase(){
		 if ($this->session->userdata('company_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(), 'refresh');
        }
		$application_id=$this->input->post('application_id');
                $data=$this->test_model->get_check_testcase($application_id);        
                echo $data;
		
	}
	public function check_testcase_data(){
		 if ($this->session->userdata('company_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(), 'refresh');
        }
				$application_id=$this->input->post('application_id');
                $data=$this->test_model->get_check_testcase_data($application_id);        
                echo $data;
		
	}
	
	/***testExecute END***/
	
	
	
	/****testReports START***/
	public function testReports()
	{
		 if ($this->session->userdata('company_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(), 'refresh');
        }
		//$data['testreport_info'] = $this->test_model->select_testreport_info();
		$data['execute_info'] = $this->test_model->select_execut_info();
		$data['email_log_info'] = $this->test_model->select_email_log_info();
		$data['page_title'] = 'Execution Reports';
		$this->load->view('company/showReports',$data);
	}
	
	public function show_execution(){
		 if ($this->session->userdata('company_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(), 'refresh');
        }
		$runname=$this->input->post('execution_id');
        $data=$this->test_model->get_show_execution($runname);        
        echo $data;
		
	}
	
	/***testReports END***/
	
	
	
	/****profile START***/
	
	function updateProfile($company_id){
		 if ($this->session->userdata('company_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(), 'refresh');
        }
		
		$this->form_validation->set_rules('company_name', 'Company Name', 'required');
	//$this->form_validation->set_rules('contact', 'contact', 'required');
	
            if ($this->form_validation->run() == FALSE)
            {
                    $this->session->set_flashdata('err_msg', validation_errors());
                    redirect(base_url() . 'index.php/TestApp/profile');

            }
         else
            {
                    $this->test_model->update_company_info($company_id);
                   $this->session->set_flashdata('msg', ('Profile Info Updated Successfully'));
                   redirect(base_url() . 'index.php/TestApp/profile');
            }
            
        }
		
	function updatePassword($company_id){
            if ($this->session->userdata('company_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(), 'refresh');
            }
		
                $this->form_validation->set_rules('old_password', 'Old Password', 'required');
                $this->form_validation->set_rules('password', 'Password', 'required');
                $this->form_validation->set_rules('confirm', 'Password Confirmation', 'required|matches[password]');

            if ($this->form_validation->run() == FALSE)
                {
                       $this->session->set_flashdata('err_msg', validation_errors());
                        redirect(base_url() . 'index.php/TestApp/profile');
                }
                else
                {
                    $query = $this->test_model->checkOldPassword($this->input->post('old_password'));

                            if($query)
                                    {
                                            $this->test_model->update_my_password_info($company_id);
                                            $this->session->sess_destroy();
                                            $this->session->set_flashdata('msg', ('Password Updated Successfully'));
                                            redirect(base_url() . 'index.php/TestApp/profile');
                                    }
                                    else
                                    {
                                         $this->session->set_flashdata('err_msg', 'Please Enter the correct password');
                                            redirect(base_url() . 'index.php/TestApp/profile');
                                    }

				 
		}
            
        }
		
	public function profile($task = "", $company_id = "") {
        if ($this->session->userdata('company_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(), 'refresh');
        }
        		
        if ($task == "update") {
            $this->test_model->update_company_info($company_id);
            $this->session->set_flashdata('msg', ('Profile info Updated Successfully'));
            redirect(base_url() . 'index.php/TestApp/profile');
        }
		if ($task == "updatemail") {
            $this->test_model->update_company_mail_info($company_id);
            $this->session->set_flashdata('msg', ('Mail Setting Updated Successfully'));
            redirect(base_url() . 'index.php/TestApp/profile');
        }

		$data['myprofile_info'] = $this->test_model->select_myprofile_info();
		$data['myprofile_mail_info'] = $this->test_model->select_myprofile_mail_info();
		$data['page_title'] = 'User Profile';
                $this->load->view('company/showProfile',$data);
	}
	/***profile END***/
	
	
}
