<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tester extends CI_Controller {
	
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
	
	
	/******UPLOAD TEST CASE START***/
	
	public function testUpload()
	{
		if ($this->session->userdata('tester_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(), 'refresh');
        }
		$data['application_info'] = $this->administrator_model->select_application_info();
		$data['environment_info'] = $this->administrator_model->select_environment_info();
		$data['browser_info'] = $this->administrator_model->select_browser_info();
		$data['page_title'] = 'Upload Test Cases';
		$data['errors'] = '';
		$data['success'] = '';
		$this->load->view('tester/showUploadTestCases',$data);
	}
	
	/****END UPLOAD TEST CASE DATA****/
	
	/****testExecute START***/
          
        
	public function startExecution(){
		
		$this->administrator_model->startExecution_process();
                 // $filename = 'F:\SeleniumAutomation_V1\TriggerExecution.bat';
                  //exec($filename);                                                      

                redirect(base_url() . 'index.php/tester/testReports');
	}
	
	public function testExecute()
	{
		if ($this->session->userdata('tester_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(), 'refresh');
        }
		$data['application_info'] = $this->administrator_model->select_application_info();
		$data['environment_info'] = $this->administrator_model->select_environment_info();
		$data['browser_info'] = $this->administrator_model->select_browser_info();
		$data['page_title'] = 'Configure Execution';
                $this->load->view('tester/showExecution',$data);
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
	/***testExecute END***/
	
	public function LogicalGroup($task = "", $logical_group_id = "") {
        if ($this->session->userdata('login_user_id') == '') {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(), 'refresh');
        }
        		
        if ($task == "clone") {
            $this->test_model->clone_logical_group_info($logical_group_id);
            $this->session->set_flashdata('msg', ('Logical Group Cloned Successfully'));
            redirect(base_url() . 'index.php/Tester/LogicalGroup');
        }
		
        if ($task == "delete") {
            $this->test_model->delete_logical_group_info($logical_group_id);
            $this->session->set_flashdata('msg', ('Logical Group Deleted Successfully'));
            redirect(base_url() . 'index.php/Tester/LogicalGroup');
        }
		
		$data['logical_group_info'] = $this->test_model->select_logical_group_info();
                $data['environment_info'] = $this->administrator_model->select_environment_info();
                $data['browser_info'] = $this->administrator_model->select_browser_info();
		$data['page_title'] = 'Logical Group';
		$this->load->view('tester/showLogicalGroup',$data);
	}
	
	/*******Logical Group end**************/
	
	/****testReports START***/
	public function testReports()
	{
		if ($this->session->userdata('tester_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(), 'refresh');
        }
		//$data['testreport_info'] = $this->test_model->select_testreport_info();
		$data['execute_info'] = $this->administrator_model->select_execut_info();
		$data['email_log_info'] = $this->administrator_model->select_email_log_info();
		$data['page_title'] = 'Execution Reports';
		$data['msg'] = '';
		$this->load->view('tester/showReports',$data);
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
                                redirect(base_url() . 'index.php/Tester/profile');
                        }
                        else
                        {
                                $this->administrator_model->update_my_info($user_id);
				$this->session->set_flashdata('msg', ('Profile Info Updated Successfully'));
				redirect(base_url() . 'index.php/Tester/profile');
                        }
            
        }
		
		function updatePassword($user_id){		
			$this->form_validation->set_rules('old_password', 'Old Password', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->set_rules('confirm', 'Password Confirmation', 'required|matches[password]');
	
			if ($this->form_validation->run() == FALSE)
                        {
					 $this->session->set_flashdata('err_msg', validation_errors());
                                         redirect(base_url() . 'index.php/Tester/profile');
                         }
                        else
                        {
					$query = $this->administrator_model->checkOldPassword($this->input->post('old_password'));

						if($query)
							{
								$this->session->sess_destroy();
								$this->administrator_model->update_my_password_info($user_id);
								$this->session->set_flashdata('message', ('Password Updated Successfully'));
								redirect(base_url() . 'index.php/Tester/profile');
							}
							else
							{
                                                              $this->session->set_flashdata('err_msg', 'Please Enter the correct password');
                                                                redirect(base_url() . 'index.php/Tester/profile');
							}
						
				 
				}
            
        }
		
	public function profile($task = "", $user_id = "") {
        if ($this->session->userdata('tester_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(), 'refresh');
        }
        		
        if ($task == "update") {
            $this->administrator_model->update_my_info($user_id);
            $this->session->set_flashdata('msg', ('Profile info Edited Successfully'));
            redirect(base_url() . 'index.php/Tester/profile');
        }
		if ($task == "updatemail") {
            $this->administrator_model->update_my_mail_info($user_id);
            $this->session->set_flashdata('msg', ('Company mail Edited Successfully'));
            redirect(base_url() . 'index.php/Tester/profile');
        }

		$data['myprofile_info'] = $this->administrator_model->select_myprofile_info();
		$data['page_title'] = 'User Profile';              
		$this->load->view('tester/showProfile',$data);
	}
	/***profile END***/
	
	
}
