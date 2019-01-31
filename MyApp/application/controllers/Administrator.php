<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administrator extends CI_Controller {
	
	public function __construct() {
        parent::__construct();
        $this->load->database();
		$this->load->model('administrator_model');
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
		
		//$this->load->view('company/showLogin');
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
		//$this->load->view('company/showRegister');
	}
	/***Registration END***/
		
		/***Registration START***/
	public function forgotPassword()
	{
		//$this->load->view('company/showForgotPassword');
	}
	/***Registration END***/
	
	
	/***USERS START***/
	public function users1()
	{
		if ($this->session->userdata('admin_login') == 1) {
                    $this->session->set_userdata('last_page', current_url());
                    $data['page_title'] = 'Users';
                    $this->load->view('administrator/showUsers',$data);			
                }else{
                    $this->load->view('showLogin');
		}
		
	}
	/*****user functionality start***/
	function createUser(){
			$this->form_validation->set_rules('firstname', 'Firstname', 'required');
			$this->form_validation->set_rules('lastname', 'Lastname', 'required');
			$this->form_validation->set_rules('user_type', 'user_type', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->set_rules('confirm', 'Password Confirmation', 'required|matches[password]');
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[user.email]|is_unique[company.email]');
			
			if ($this->form_validation->run() == FALSE)
                        {
                                   $this->session->set_flashdata('err_msg', (validation_errors()));
                                    redirect(base_url() . 'index.php/Administrator/users');
                                    
                        }
                        else
                        {
                                    $this->administrator_model->save_user_info();
                                    $this->session->set_flashdata('msg', ('User Added Successfully'));
                                    redirect(base_url() . 'index.php/Administrator/users');
			}
            
        }
	function users($task = "", $user_id = "") {
        if ($this->session->userdata('admin_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(), 'refresh');
        }
        		
        if ($task == "update") {
            $this->administrator_model->update_user_info($user_id);
            $this->session->set_flashdata('msg', ('User Updated Successfully'));
            redirect(base_url() . 'index.php/Administrator/users');
        }

        if ($task == "delete") {
            $this->administrator_model->delete_user_info($user_id);
            $this->session->set_flashdata('msg', ('User Deleted Successfully'));
            redirect(base_url() . 'index.php/Administrator/users');
        }

                $data['user_info'] = $this->administrator_model->select_user_info();
                $data['page_title'] = 'Users';
		$this->load->view('administrator/showUsers',$data);
    }
	

	/***USERS functionality END***/
	
	
	/****testConfig START***/
	
	public function testConfig()
	{
		$data['page_title'] = 'Configuration';
		$this->load->view('administrator/showConfiguration',$data);
		
	}
	/***testConfig END***/
	
	
	
	/****testEnvironment START***/
	function createEnvironment(){
		$this->form_validation->set_rules('environment', 'Environment', 'required');
						
			if ($this->form_validation->run() == FALSE)
                {
			$this->session->set_flashdata('err_msg', 'Environment Name is Required.');
                        redirect(base_url() . 'index.php/Administrator/testEnvironment');
                             
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
                            redirect(base_url() . 'index.php/Administrator/testEnvironment');
                           
                       }
                       else{
                            $this->administrator_model->save_environment_info();
                           $this->session->set_flashdata('msg', ('Environment Added Successfully'));
                           redirect(base_url() . 'index.php/Administrator/testEnvironment');
                       }                      
                      
		}
            
        }
	public function testEnvironment($task = "", $environment_id = "") {
        if ($this->session->userdata('admin_login') != 1) {
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
                            redirect(base_url() . 'index.php/Administrator/testEnvironment');
                           
                       }
                       else{
                            $this->administrator_model->update_environment_info($environment_id);
                            $this->session->set_flashdata('msg', ('Environment Updated Successfully'));
                            redirect(base_url() . 'index.php/Administrator/testEnvironment');
                       } 
                       
            
        }

        if ($task == "delete") {
                                  $this->db->where('environment_id',$environment_id);
                                  $query = $this->db->get('email_log');
                                  
                                $this->db->where('environment_id',$environment_id);
                                  $query1 = $this->db->get('logical_group');
								  
                               if ($query->num_rows() > 0){                           

                                   $this->session->set_flashdata('err_msg', 'Selected Environment has Testcases Execution can`t deleted.');
                                    redirect(base_url() . 'index.php/Administrator/testEnvironment');
                                }
                                elseif($query1->num_rows() > 0){
                                    $this->session->set_flashdata('err_msg', 'Selected Environment has Logical Group can`t deleted.');
                                    redirect(base_url() . 'index.php/TestApp/testEnvironment');
				}
                               else{
                                        $this->administrator_model->delete_environment_info($environment_id);
                                        $this->session->set_flashdata('msg', ('Environment Deleted Successfully'));
                                        redirect(base_url() . 'index.php/Administrator/testEnvironment');
                                 } 
                                 
           
        }

                $data['environment_info'] = $this->administrator_model->select_environment_info();
		$data['page_title'] = 'Manage Environment';
                $this->load->view('administrator/showEnvironment',$data);
		
	}
	/***testEnvironment END***/
	
	
	
	/****testBrowser START***/
	
	function createBrowser(){
		$this->form_validation->set_rules('browser', 'Browser', 'required');
						
			if ($this->form_validation->run() == FALSE)
                        {
                                $this->session->set_flashdata('err_msg', 'Browser Name is Required.');
                                redirect(base_url() . 'index.php/Administrator/testBrowser');
                   
                        }
                        else
                        {
                                $company_id = $this->session->userdata('login_company_id');
                                $browser = ucfirst($this->input->post('browser'));
                                $this->db->where('company_id',$company_id);
                                $this->db->where('browser_name',$browser);
                                $query = $this->db->get('browser');
                               if ($query->num_rows() > 0){
                                   
                                   $this->session->set_flashdata('err_msg', 'Browser Name Already Exists.');
                                    redirect(base_url() . 'index.php/Administrator/testBrowser');
                                   
                               }
                               else{
                                        $this->administrator_model->save_browser_info();
                                        $this->session->set_flashdata('msg', ('Browser Added Successfully'));
                                        redirect(base_url() . 'index.php/Administrator/testBrowser');
                               }
                                
                        }
            
        }
	
	public function testBrowser($task = "", $browser_id = "") {
        if ($this->session->userdata('admin_login') != 1) {
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
                                   
                                   $this->session->set_flashdata('err_msg', 'Browser Name Already Exists.');
                                    redirect(base_url() . 'index.php/Administrator/testBrowser');
                                   
                               }
                               else{
                                        $this->administrator_model->update_browser_info($browser_id);
                                        $this->session->set_flashdata('msg', ('Browser Updated Successfully'));
                                        redirect(base_url() . 'index.php/Administrator/testBrowser');
                               }
          
        }

        if ($task == "delete") {
                                $this->db->where('browser_id',$browser_id);
                                  $query = $this->db->get('email_log');
                               if ($query->num_rows() > 0){                           

                                   $this->session->set_flashdata('err_msg', 'Selected Browser has Testcases Execution can`t deleted.');
                                    redirect(base_url() . 'index.php/Administrator/testBrowser');
                                }
                               else{
                                        $this->administrator_model->delete_browser_info($browser_id);            
                                        $this->session->set_flashdata('msg', ('Browser Deleted Successfully'));
                                        redirect(base_url() . 'index.php/Administrator/testBrowser');
                                 }    
                                 
            
        }

                   $data['browser_info'] = $this->administrator_model->select_browser_info();
		   $data['page_title'] = 'Manage Browser';
                   $this->load->view('administrator/showBrowser',$data);
	}
	/***testBrowser END***/
	
	
	
	/****testApplication START***/
	
	function createApplication(){
		
		$this->form_validation->set_rules('application', 'Application', 'required');
						
			if ($this->form_validation->run() == FALSE)
                    {
                            $this->session->set_flashdata('err_msg', 'Application Name is Required.');
                            redirect(base_url() . 'index.php/Administrator/testApplication');
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
                            redirect(base_url() . 'index.php/Administrator/testApplication');
                       }
                       else{
                            $this->administrator_model->save_application_info();
                            $this->session->set_flashdata('msg', ('Application Added Successfully'));
                            redirect(base_url() . 'index.php/Administrator/testApplication');
                         }
                         
                         
                    }
            
        }
	
	public function testApplication($task = "", $application_id = "") {
        if ($this->session->userdata('admin_login') != 1) {
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
                            redirect(base_url() . 'index.php/Administrator/testApplication');
                       }
                       else{
                                $this->administrator_model->update_application_info($application_id);
                                $this->session->set_flashdata('msg', ('Application Updated Successfully'));
                                redirect(base_url() . 'index.php/Administrator/testApplication');
                         }
            
        }

        if ($task == "delete") {
                                $this->db->where('application_id',$application_id);
                                $query = $this->db->get('testcases');
                               if ($query->num_rows() > 0){                           

                                   $this->session->set_flashdata('err_msg', 'Selected Application has Testcases can`t deleted.');
                                    redirect(base_url() . 'index.php/Administrator/testApplication');
                                }
                               else{
                                    $this->administrator_model->delete_application_info($application_id);
                                    $this->session->set_flashdata('msg', ('Application Deleted Successfully'));
                                    redirect(base_url() . 'index.php/Administrator/testApplication');
                                 }
            
        }

		$data['application_info'] = $this->administrator_model->select_application_info();
		$data['page_title'] = 'Manage Application';
                $this->load->view('administrator/showApplication',$data);
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
                        $this->session->set_flashdata('err_msg', validation_errors());
                        redirect(base_url() . 'index.php/Administrator/testCases');
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
                                    redirect(base_url() . 'index.php/Administrator/testCases');
                                }
                               else{
                                        $this->administrator_model->save_testcase_info();
                                        $this->session->set_flashdata('msg', ('Test Case Added Successfully'));
                                        redirect(base_url() . 'index.php/Administrator/testCases');
                                 }
                                 
                }
            
        }
	public function testCases($task = "", $testcase_id = "") {
        if ($this->session->userdata('admin_login') != 1) {
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
                                    redirect(base_url() . 'index.php/Administrator/testCases');
                                }
                               else{
                                        $this->administrator_model->update_testcase_info($testcase_id);
                                        $this->session->set_flashdata('msg', ('Test Case Updated Successfully'));
                                        redirect(base_url() . 'index.php/Administrator/testCases');
                                 }
            
        }

        if ($task == "delete") {
                                 $testcase_name = $this->test_model->get_test_case_name($testcase_id);
                                $this->db->where('TESTCASENAME',$testcase_name);
                                $query = $this->db->get('tce_testcases_results');
                               if ($query->num_rows() > 0){                           

                                   $this->session->set_flashdata('err_msg', 'Test Case is executed can`t deleted.');
                                    redirect(base_url() . 'index.php/Administrator/testCases');
                                }
                               else{
                                        $this->administrator_model->delete_testcase_info($testcase_id);
                                        $this->session->set_flashdata('msg', ('Test Case Deleted Successfully'));
                                        redirect(base_url() . 'index.php/Administrator/testCases');
                                 }                                 
            
        }
		$data['testcase_info'] = $this->administrator_model->select_testcase_info();
		$data['page_title'] = 'Manage Test Cases';
               	$this->load->view('administrator/showTestcases',$data);
	}
	/***testCases END***/
	
	
	
	/****companyUrl START***/
	
	function createCompanyUrl(){
		
	$this->form_validation->set_rules('application_id', 'Application', 'required');
	
            if ($this->form_validation->run() == FALSE)
                {
                        
                        $this->session->set_flashdata('err_msg', validation_errors());
                        redirect(base_url() . 'index.php/Administrator/companyUrl');
			
                }
                else
                {
                        $this->administrator_model->save_companyurl_info();
                        $this->session->set_flashdata('msg', ('Company url Added Successfully'));
                        redirect(base_url() . 'index.php/Administrator/companyUrl');
                }
            
        }
		
	public function companyUrl($task = "", $company_env_id = "") {
            if ($this->session->userdata('admin_login') != 1) {
                     $this->session->set_userdata('last_page', current_url());
                     redirect(base_url(), 'refresh');
                }
        		
        if ($task == "update") {
            $this->administrator_model->update_companyurl_info($company_env_id);
            $this->session->set_flashdata('msg', ('Company url Edited Successfully'));
            redirect(base_url() . 'index.php/Administrator/companyUrl');
        }

        if ($task == "delete") {
            $this->administrator_model->delete_companyurl_info($company_env_id);
            $this->session->set_flashdata('msg', ('Company url Deleted Successfully'));
            redirect(base_url() . 'index.php/Administrator/companyUrl');
        }
		$data['companyurl_info'] = $this->administrator_model->select_companyurl_info();		
		$data['application_info'] = $this->administrator_model->select_application_info();		
		$data['environment_info'] = $this->administrator_model->select_environment_info();
		$data['com_environment_info'] = $this->administrator_model->select_com_environment_info();
		$data['page_title'] = 'Company URL';
                $this->load->view('administrator/showCompanyurl',$data);
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
                                $data['company_info'] = $this->administrator_model->select_company_info();
                                $data['page_title'] = 'Company';
                                $data['errors'] = validation_errors();
                                $this->load->view('administrator/showCompany',$data);

                        }
                        else
                        {
                                $this->administrator_model->save_company_info();
                                $this->session->set_flashdata('message', ('Company Added Successfully'));
                                redirect(base_url() . 'index.php/Administrator/company');
                        }
            
        }
		
		
		/******UPLOAD TEST CASE START***/
	
	public function testUpload()
	{
		if ($this->session->userdata('admin_login') != 1) {
                     $this->session->set_userdata('last_page', current_url());
                     redirect(base_url(), 'refresh');
                }
		$data['application_info'] = $this->administrator_model->select_application_info();
		$data['environment_info'] = $this->administrator_model->select_environment_info();
		$data['browser_info'] = $this->administrator_model->select_browser_info();
		$data['page_title'] = 'Upload Test Data';
		$this->load->view('administrator/showUploadTestCases',$data);
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
						echo $this->test_model->saveLogical_group_user();
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
        if ($this->session->userdata('login_user_id') == '') {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(), 'refresh');
        }
        		
        if ($task == "clone") {
            $this->test_model->clone_logical_group_info($logical_group_id);
            $this->session->set_flashdata('message', ('Company url Edited Successfully'));
            redirect(base_url() . 'index.php/Administrator/LogicalGroup');
        }
		
        if ($task == "delete") {
            $this->test_model->delete_logical_group_info($logical_group_id);
            redirect(base_url() . 'index.php/Administrator/LogicalGroup');
        }
		
		$data['logical_group_info'] = $this->test_model->select_logical_group_info();
                $data['environment_info'] = $this->administrator_model->select_environment_info();
                $data['browser_info'] = $this->administrator_model->select_browser_info();
		$data['page_title'] = 'Logical Group';
		$this->load->view('administrator/showLogicalGroup',$data);
	}
	
	/*******Logical Group end**************/
	
	/****testExecute START***/
          
   
	
	
	public function testExecute()
	{
		if ($this->session->userdata('admin_login') != 1) {
                     $this->session->set_userdata('last_page', current_url());
                     redirect(base_url(), 'refresh');
                }
				
		$data['application_info'] = $this->administrator_model->select_application_info();
		$data['environment_info'] = $this->administrator_model->select_environment_info();
		$data['browser_info'] = $this->administrator_model->select_browser_info();
		$data['page_title'] = 'Configure Execution';		
		$this->load->view('administrator/showExecution',$data);
	}
	

	public function check_environment(){
		
		$environment_id=$this->input->post('environment');
                $data=$this->administrator_model->get_check_environment($environment_id);        
                 echo $data;
		
	}
	
	public function check_testcase(){
		$application_id=$this->input->post('application_id');
                $data=$this->administrator_model->get_check_testcase($application_id);        
                echo $data;
		
	}
	public function check_testcase_data(){
		$application_id=$this->input->post('application_id');
                $data=$this->administrator_model->get_check_testcase_data($application_id);        
                echo $data;
		
	}
	/***testExecute END***/
	
	
	
	/****testReports START***/
	public function testReports()
	{
		if ($this->session->userdata('admin_login') != 1) {
                     $this->session->set_userdata('last_page', current_url());
                     redirect(base_url(), 'refresh');
                }
		//$data['testreport_info'] = $this->test_model->select_testreport_info();
		$data['execute_info'] = $this->administrator_model->select_execut_info();
		$data['email_log_info'] = $this->administrator_model->select_email_log_info();
		$data['page_title'] = 'Execution Reports';
		$this->load->view('administrator/showReports',$data);
	}
	
	public function show_execution(){
		$runname=$this->input->post('execution_id');
        $data=$this->administrator_model->get_show_execution($runname);        
        echo $data;
		
	}
	
	/***testReports END***/
	
	
	
	/****profile START***/
	
	function updateProfile($user_id){
		
	$this->form_validation->set_rules('fname', 'First Name', 'required');
        $this->form_validation->set_rules('lname', 'Last Name', 'required');
	//$this->form_validation->set_rules('contact', 'contact', 'required');
	
			if ($this->form_validation->run() == FALSE)
                        {
                                $this->session->set_flashdata('err_msg', validation_errors());
                                redirect(base_url() . 'index.php/Administrator/profile');
                        }
                        else
                        {
				$this->administrator_model->update_my_info($user_id);
				$this->session->set_flashdata('msg', ('Profile Info Updated Successfully'));
				redirect(base_url() . 'index.php/Administrator/profile');
			}
            
        }
		
		function updatePassword($user_id){		
			$this->form_validation->set_rules('old_password', 'Old Password', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->set_rules('confirm', 'Password Confirmation', 'required|matches[password]');
	
			if ($this->form_validation->run() == FALSE)
                        {
                                $this->session->set_flashdata('err_msg', validation_errors());
                                redirect(base_url() . 'index.php/Administrator/profile');
                        }
                        else
                        {
                            $query = $this->administrator_model->checkOldPassword($this->input->post('old_password'));

                            if($query)
                                    {
                                            
                                            $this->administrator_model->update_my_password_info($user_id);
                                            $this->session->sess_destroy();
                                            $this->session->set_flashdata('msg', ('Password Updated Successfully'));
                                            redirect(base_url() . 'index.php/Administrator/profile');
                                            
                                    }
                                    else
                                    {
                                          $this->session->set_flashdata('err_msg', 'Please Enter the Correct Password');
                                            redirect(base_url() . 'index.php/Administrator/profile');
                                           
                                    }
						
				 
			}
            
        }
		
	public function profile($task = "", $user_id = "") {
        if ($this->session->userdata('admin_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(), 'refresh');
        }
        		
        if ($task == "update") {
            $this->administrator_model->update_my_info($user_id);
            $this->session->set_flashdata('msg', ('User info Edited Successfully'));
            redirect(base_url() . 'index.php/Administrator/profile');
        }
		if ($task == "updatemail") {
            $this->administrator_model->update_my_mail_info($user_id);
            $this->session->set_flashdata('msg', ('Company mail Edited Successfully'));
            redirect(base_url() . 'index.php/Administrator/profile');
        }

		$data['myprofile_info'] = $this->administrator_model->select_myprofile_info();
		$data['page_title'] = 'User Profile';               
		$this->load->view('administrator/showProfile',$data);
	}
	/***profile END***/
	
	
}
