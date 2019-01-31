<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin_model extends CI_Model {

    function __construct() {
        parent::__construct();
		$this->load->database();
		$this->load->library('email');
		$this->load->helper('file');
    }

    function clear_cache() {
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
    }
	
	
	/****login validate info*****/
	 function validate_login($email = '', $password = '') {

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
			die;
        }
		$query = $this->db->get_where('user', array('email' => $email, 'password' => $pass,'user_type' => 3));
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $this->session->set_userdata('tester_login', '1');
            $this->session->set_userdata('login_user_id', $row->user_id);
            $this->session->set_userdata('name', $row->fname." ".$row->lname);
            $this->session->set_userdata('login_type', 'tester');
            echo '1';
			die;
        }
        
        
        $query = $this->db->get_where('company', $credential);
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $this->session->set_userdata('company_login', '1');
            $this->session->set_userdata('login_user_id', $row->company_id);
            $this->session->set_userdata('name', $row->company_name);
            $this->session->set_userdata('login_type', 'company');
            echo '1';
			die;
        }
        
        $query = $this->db->get_where('admin', $credential);
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $this->session->set_userdata('superadmin_login', '1');
            $this->session->set_userdata('login_user_id', $row->admin_id);
            $this->session->set_userdata('name', $row->fname." ".$row->lname);
            $this->session->set_userdata('login_type', 'superadmin');
            echo '1';
			die;
        }
        
       

        echo '0';
    }
	
	function validate_login_info($email,$password,$type='1'){
		
		 // Checking login credential for admin
		$password = strrev(sha1(md5($password)));
                $superadmin = $this->db->get_where('admin', array('email' => $email,'password' => $password));
		$company = $this->db->get_where('company', array('email' => $email,'password' => $password));
		$tester = $this->db->get_where('user', array('email' => $email,'password' => $password,'user_type' => 3));
		$admin = $this->db->get_where('user', array('email' => $email,'password' => $password,'user_type' => 1));
		
		if($superadmin->num_rows() > 0) {
            $row = $superadmin->row();
            $this->session->set_userdata('superadmin_login', '1');
            $this->session->set_userdata('login_user_id', $row->admin_id);
			$this->session->set_userdata('login_email_id', $row->email);
			$this->session->set_userdata('login_company_id', $row->admin_id);
            $this->session->set_userdata('name', $row->fname." ".$row->lname);
            $this->session->set_userdata('login_type', 'superadmin');
            echo '1';
        }elseif($admin->num_rows() > 0) {
            $row = $admin->row();
            $this->session->set_userdata('admin_login', '1');
            $this->session->set_userdata('login_user_id', $row->user_id);
			$this->session->set_userdata('login_email_id', $row->email);
			$this->session->set_userdata('login_company_id', $row->company_id);
            $this->session->set_userdata('name', $row->fname." ".$row->lname);
            $this->session->set_userdata('login_type', 'administrator');
            echo '1';
        }elseif($company->num_rows() > 0) {
            $row = $company->row();
           $this->session->set_userdata('company_login', '1');
            $this->session->set_userdata('login_user_id', $row->company_id);
			$this->session->set_userdata('login_company_id', $row->company_id);
			$this->session->set_userdata('login_email_id', $row->email);
            $this->session->set_userdata('name', $row->company_name);
            $this->session->set_userdata('login_type', 'company');
            echo '1';
        }elseif($tester->num_rows() > 0) {
            $row = $tester->row();
            $this->session->set_userdata('tester_login', '1');
            $this->session->set_userdata('login_user_id', $row->user_id);
			$this->session->set_userdata('login_email_id', $row->email);
			$this->session->set_userdata('login_company_id', $row->company_id);
            $this->session->set_userdata('name', $row->fname." ".$row->lname);
            $this->session->set_userdata('login_type', 'tester');
            echo '1';
        }else{
			echo 0;
		}
		
	}
	/****Get functionality to super admin dashboard data*****/
	 function get_company_count(){        
            $this->db->group_by('company_id'); 
         return $this->db->get_where('company')->result_array();
        
    }
	function get_company_name($id){
		
		return $this->db->get_where('application' , array('company_id' => $company_id ))->row()->company_name;
	}
	function get_company_test_count($company_id){
                $this->db->from('testcases');
                $this->db->where('company_id', $company_id);             
            return $this->db->count_all_results();
            //return $this->db->count_all_results('application' , array('application_id' => $id ,'company_id' => $company_id))->row()->application_name;
        }
	
	/****GET Functionality to superadmin dashboard data*****/
	
	/*****user model functions********/
	
	 function save_user_info()
    {
		$data['company_id']        = $this->session->userdata('login_user_id');
		$data['added_by_name']   = $this->session->userdata('login_type');
		
        $data['fname'] 		= ucfirst($this->input->post('firstname'));
        $data['lname']    = ucfirst($this->input->post('lastname'));
        $data['email']    = $this->input->post('email');
		$data['contact']    = $this->input->post('contact');
		$data['user_type']    = $this->input->post('user_type');
		$data['password']    = strrev(sha1(md5($this->input->post('password'))));
        $data['address']    = $this->input->post('Address');
        
        $this->db->insert('user',$data);
    }
    
    function select_user_info()
    {
        $company_id = $this->session->userdata('login_user_id');
		//$added_by_name = $this->session->userdata('login_type');
        return $this->db->get_where('user', array('company_id' => $company_id))->result_array();
    }
    
    function update_user_info($user_id)
    {
        $data['company_id']        = $this->session->userdata('login_user_id');
		$data['added_by_name']   = $this->session->userdata('login_type');
		
        $data['fname'] 		= ucfirst($this->input->post('firstname'));
        $data['lname']    = ucfirst($this->input->post('lastname'));
        $data['user_type']    = $this->input->post('user_type');		
        $data['address']    = $this->input->post('address');
        
        $this->db->where('user_id',$user_id);
        $this->db->update('user',$data);
      
    }
    
    function delete_user_info($user_id)
    {
        $this->db->where('user_id',$user_id);
        $this->db->delete('user');
    }
	
	/*****END user model functions********/
	
	/*****GET VALUES FROM METHOD FUNCTION******/
	
	function get_user_role($id){
		if($id==1){
			echo "Administrator";
		}elseif($id==2){
			echo "Company";
		}elseif($id==3){
			echo "Tester";
		}elseif($id==4){
			echo "SuperUser";
		}		
	}
	
	function get_test_status($id){
		if($id==1){
			echo "Public";
		}elseif($id==0){
			echo "Private";
		}	
	}
	
	function get_test_application($id){
		
		return $this->db->get_where('application' , array('application_id' => $id ))->row()->application_name;
	}
	
	function get_url_name_application($app_id,$env_id){
		
		$company_id = $this->session->userdata('login_user_id');		
		return $this->db->get_where('company_environ_url' , array('application_id' => $app_id,'environment_id' => $env_id, 'company_id' =>$company_id ))->row()->env_url;
	}
	
	function get_testcases_application($app_id){
		$company_id = $this->session->userdata('login_user_id');
		//$added_by_name = $this->session->userdata('login_type');
        return $this->db->get_where('testcases', array('application_id' => $app_id,'company_id' => $company_id))->result_array();
	}
	
	function get_testcases_count(){
		$company_id = $this->session->userdata('login_user_id');
		 return $this->db->get_where('testcases', array('company_id' => $company_id))->result_array();
	}
	
	
	function get_check_environment($environment_id) {
		
				$company_id  = $this->session->userdata('login_user_id');
	
			 		$this->db->where('company_id',$company_id);
					$this->db->where('environment_id',$environment_id);
					$this->db->order_by("environment_id");
					
					$env_info = $this->db->get('company_environ_url')->result_array();
					$new_value =""; 
					foreach ($env_info as $rows) {					
						$new_value= $new_value .'_____'.$rows['env_url'];
					 }
				echo $data_send =$new_value;
						
    }
	
	function get_check_testcase($application_id){
		
		$company_id  = $this->session->userdata('login_user_id');
	
			 		$this->db->where('company_id',$company_id);
					$this->db->where('application_id',$application_id);
					//$this->db->where('status',1);
					//$this->db->where('is_Availbale',1);
					$test_info = $this->db->get('testcases')->result_array();
					$new_value ='
<select class="form-control" name="selectTestCase" id="selectTestCase"  onchange="show_TestCase_data(this.value)">
<option value="">---Select TestCase---</option>'; 
					foreach ($test_info as $rows) {	
						$new_value .='<option value="'.$rows["testcase_id"].'"> '.$rows["testcase_name"].'  </option>';
					}
				$new_value .=  '</select>'; 
			     
			echo $new_value;
		
	}
	
	
	function get_compnay_mail_setting(){
		$company_id  = $this->session->userdata('login_user_id');
		 return $this->db->get_where('email_setting', array('company_id' => $company_id))->result_array();
		
	}
	
	function get_env_url($environment_id){
		return $this->db->get_where('environment', array('environment_id' => $environment_id))->row()->environment_name;
	}
	
	
	/*****END GET VALUES FROM METHOD FUNCTION*****/
	
	
	
	/********ENVIRONMENT MODEL FUNCTION******/
	
	function save_environment_info(){
		$data['company_id']        = $this->session->userdata('login_user_id');
		$data['added_by_name']   = $this->session->userdata('login_type');
		
        $data['environment_name'] 		= ucfirst($this->input->post('environment'));
		
		 $this->db->insert('environment',$data);
		 $environment_id = $this->db->insert_id();
		 
		 /***ADD Company URL Also***/
					$company_id  = $this->session->userdata('login_user_id');	
			 		$this->db->where('company_id',$company_id);
					$dat['company_id']  = $this->session->userdata('login_user_id');
					
					$env_info = $this->db->get('company_environment')->result_array();
					
						foreach ($env_info as $rows) {					
							$dat['application_id']= $rows['application_id'];
							$dat['company_env_id']= $rows['company_env_id'];						
							$dat['environment_id'] = $environment_id;
							$dat['environment_type'] = $data['environment_name'];
							$dat['env_url'] = '';
											
							$this->db->insert('company_environ_url',$dat);						
							
					 }				
	}
	 function update_environment_info($environment_id)
    {
        $data['company_id']        = $this->session->userdata('login_user_id');
		$data['added_by_name']   = $this->session->userdata('login_type');
		
        $data['environment_name'] 		= ucfirst($this->input->post('environment'));
       
	   $this->db->where('environment_id',$environment_id);
        $this->db->update('environment',$data);
      
    }
	function delete_environment_info($environment_id)
    {
        $this->db->where('environment_id',$environment_id);
        $this->db->delete('environment');
    }
	function select_environment_info()
    {
        $company_id = $this->session->userdata('login_user_id');
		//$added_by_name = $this->session->userdata('login_type');
        return $this->db->get_where('environment', array('company_id' => $company_id))->result_array();
    }
	function select_com_environment_info(){
		 $company_id = $this->session->userdata('login_user_id');
		//$added_by_name = $this->session->userdata('login_type');
        return $this->db->get_where('company_environ_url', array('company_id' => $company_id))->result_array();
	}
	
	/********END ENVIRONMENT MODEL FUNCTION******/
	
	
	/******BROWSER MODEL FUNCTION******/
	
	function save_browser_info(){
		$data['company_id']        = $this->session->userdata('login_user_id');
		//$data['added_by_name']   = $this->session->userdata('login_type');
		
        $data['browser_name'] 		= ucfirst($this->input->post('browser'));
		
		 $this->db->insert('browser',$data);
	}
	 function update_browser_info($browser_id)
    {
        $data['company_id']        = $this->session->userdata('login_user_id');
		//$data['added_by_name']   = $this->session->userdata('login_type');
		
        $data['browser_name'] 		= ucfirst($this->input->post('browser'));
       
	   $this->db->where('browser_id',$browser_id);
        $this->db->update('browser',$data);
      
    }
	function delete_browser_info($browser_id)
    {
        $this->db->where('browser_id',$browser_id);
        $this->db->delete('browser');
    }
	function select_browser_info()
    {
        $company_id = $this->session->userdata('login_user_id');
      return $this->db->get_where('browser', array('company_id' => $company_id))->result_array();
     
    }
	
	/*******END BROWSER MODEL FUNCTION******/
	
	
	/*******APPLICATION MODEL FUNCTION******/
	
		function save_application_info(){
		$data['company_id']        = $this->session->userdata('login_user_id');
		
        $data['application_name'] 		= ucfirst($this->input->post('application'));
		
		 $this->db->insert('application',$data);
	}
	 function update_application_info($application_id)
    {
        $data['company_id']        = $this->session->userdata('login_user_id');
		
        $data['application_name'] 		= ucfirst($this->input->post('application'));
       
	   $this->db->where('application_id',$application_id);
        $this->db->update('application',$data);
      
    }
	function delete_application_info($application_id)
    {
        $this->db->where('application_id',$application_id);
        $this->db->delete('application');
    }
	function select_application_info()
    {
        $company_id = $this->session->userdata('login_user_id');
		//$added_by_name = $this->session->userdata('login_type');
        return $this->db->get_where('application', array('company_id' => $company_id))->result_array();
        //return $this->db->get_where('application')->result_array();
    }
	
	/*******END APPLICATION MODEL FUNCTION******/
	
	
	
	
	
	
	/*******Company URL MODEL FUNCTION******/
	
	function save_companyurl_info(){
		
		$data['company_id']        = $this->session->userdata('login_user_id');
		$data['application_id'] 		= $this->input->post('application_id');
		$this->db->insert('company_environment',$data);
		
		$dat['company_env_id'] = $this->db->insert_id();
		$dat['company_id']        = $this->session->userdata('login_user_id');
		$dat['application_id'] 		= $this->input->post('application_id');
				
		 $url_entries            = array();
        $environment_id               = $this->input->post('environment_id');
		$environment_type               = $this->input->post('environment_type');
        $env_url                    = $this->input->post('env_url');
        $number_of_entries          = sizeof($environment_id);
        
        for ($i = 0; $i < $number_of_entries; $i++)
        {
            if ($environment_id[$i] != "")
            {
				 $dat['environment_id'] = $environment_id[$i];
				 $dat['environment_type'] = $environment_type[$i];
				 $dat['env_url'] = $env_url[$i];
				 				
				$this->db->insert('company_environ_url',$dat);
            }
        }
     
		
	}
	
	function update_companyurl_info($company_env_id){
		
		
		//$dat['company_id']        = $this->session->userdata('login_user_id');
		//$dat['application_id'] 		= $this->input->post('application_id');
				
		 $url_entries            = array();
        $environment_id               = $this->input->post('environment_id');
		$environment_type               = $this->input->post('environment_type');
        $env_url                    = $this->input->post('env_url');
        $number_of_entries          = sizeof($environment_id);
        
        for ($i = 0; $i < $number_of_entries; $i++)
        {
            if ($environment_id[$i] != "")
            {
				 //$dat['environment_id'] = $environment_id[$i];
				 $dat['env_url'] = $env_url[$i];
				 
				$this->db->where('environment_id',$environment_id[$i]);
				$this->db->where('company_env_id',$company_env_id);
				$this->db->update('company_environ_url',$dat); 				
				
            }
        }
	}
	
	function delete_companyurl_info($company_env_id)
    {
        $this->db->where('company_env_id',$company_env_id);
        $this->db->delete('company_environ_url');
		
		 $this->db->where('company_env_id',$company_env_id);
        $this->db->delete('company_environment');
    }
	
	function select_companyurl_info()
    {
        $company_id = $this->session->userdata('login_user_id');
		//$added_by_name = $this->session->userdata('login_type');
		$this->db->group_by('application_id');
        return $this->db->get_where('company_environ_url', array('company_id' => $company_id))->result_array();
        //return $this->db->get_where('testcases')->result_array();
    }
	
	/*******END Company URL MODEL FUNCTION******/
	
	
	/*******Company MODEL FUNCTION******/
	
	 function save_company_info()
    {
		//$data['company_id']        = $this->session->userdata('login_user_id');			
                $data['company_name'] 		= ucwords($this->input->post('company_name'));
                $data['email']    = $this->input->post('email');
				$data['contact']    = $this->input->post('contact');		
				$data['password']    = strrev(sha1(md5($this->input->post('password'))));
                $data['address']    = $this->input->post('address');
        
                $this->db->insert('company',$data);	
		
				$company_id = $this->db->insert_id();
				
				$dat['host_name']   = "ssl://smtp.googlemail.com";
				$dat['port']    = "465";
				$dat['email']    = $data['email'];
				$dat['username']    = $data['email'];
				$dat['password']    = $data['password'];
				$dat['code']    = strrev($this->input->post('password'));
				$dat['secuirity_protocol']    = "smtp";
                $dat['company_id'] = $company_id;
                $this->db->insert('email_setting',$dat);
                
                $company_name = $data['company_name'];
				$foldername = str_replace(' ', '', $company_name);
				$main_path = $this->session->userdata('folder_path');
				$testdata_path = $this->session->userdata('testdata_path');
                $pathname = $testdata_path.'/SeleniumAutomation_V1/TestData/'.$foldername;
				$pathname1 = $main_path.'/'.$foldername;
				$pathname2 = $main_path.'/'.$foldername.'/'.$foldername;
				
                mkdir($pathname,0777);
				mkdir($pathname1,0777);
				mkdir($pathname2,0777);
				
    }
    
    function select_company_info()
    {
        //$company_id = $this->session->userdata('login_user_id');
		//$added_by_name = $this->session->userdata('login_type');
       // return $this->db->get_where('company', array('company_id' => $company_id))->result_array();
        return $this->db->get_where('company')->result_array();
    }
    
    function update_company_info($company_id)
    {
        $data['company_name'] 		= ucwords($this->input->post('company_name'));
		$data['address']    = $this->input->post('address');
		$data['email']    = $this->input->post('email');
		$data['contact']    = $this->input->post('contact');
        $data['address']    = $this->input->post('address');
		$data['domain']    = $this->input->post('domain');
		$data['contact_landline']    = $this->input->post('contact_landline');
		        
        $this->db->where('company_id',$company_id);
        $this->db->update('company',$data);
		
				 $company_name = $data['company_name'];
				$foldername = str_replace(' ', '', $company_name);
				$main_path = $this->session->userdata('folder_path');
				$testdata_path = $this->session->userdata('testdata_path');
                $pathname = $testdata_path.'/SeleniumAutomation_V1/TestData/'.$foldername;
				$pathname1 = $main_path.'/'.$foldername;
				$pathname2 = $main_path.'/'.$foldername.'/'.$foldername;
              
                mkdir($pathname,0777);
				mkdir($pathname1,0777);
				mkdir($pathname2,0777);
      
    }
	public function checkOldPassword($oldPassword)
{
	$oldPassword= strrev(sha1(md5($oldPassword)));
	
	$admin_id = $this->session->userdata('login_user_id');   
   	
	$password = $this->db->get_where('admin' , array('admin_id' => $admin_id ))->row()->password;

	if($oldPassword == $password)
        {
            return true;
        }
        else
        {
            return false;
        }
    
}

	function update_my_password_info()
    {
        $admin_id = $this->session->userdata('login_user_id');
       	$data['password']   = strrev(sha1(md5($this->input->post('password'))));
		        
        $this->db->where('admin_id',$admin_id);
        $this->db->update('admin',$data);
      
    }
    
    function delete_company_info($company_id)
    {
        $this->db->where('company_id',$company_id);
        $this->db->delete('company');
		
		$this->db->where('company_id',$company_id);
        $this->db->delete('email_setting');
    }
	
	
	/*****END Company MODEL FUNCTION******/
	
	
	
	
	
	/*******REPORT MODEL FUNCTION******/
	function select_testreport_info()
    {
        $company_id = $this->session->userdata('login_user_id');
		return $this->db->get_where('testcase_result', array('company_id' => $company_id))->result_array();
       
    }
	function select_email_log_info()
    {
        $company_id = $this->session->userdata('login_user_id');
		
		return $this->db->get_where('email_log', array('company_id' => $company_id))->result_array();
       
    }
	
	function select_execut_info()
    {
        $company_id = $this->session->userdata('login_user_id');
		$this->db->group_by('runname');
		$this->db->order_by('email_log_id','desc');
		return $this->db->get_where('email_log', array('company_id' => $company_id))->result_array();
       
    }
	
	
	
	/********PROFILE MODEL FUNCTION******/
	
	function update_superadmin_mail_info($admin_id){
		$data['host_name']    = $this->input->post('host_name');
		$data['port']    = $this->input->post('port');
		$data['setting_email']    = $this->input->post('email');
        $data['setting_password']    = strrev(sha1(md5($this->input->post('password'))));
		$data['code']    = strrev($this->input->post('password'));
		$data['secuirity_protocol']    = $this->input->post('secuirity_protocol');
        $this->db->where('admin_id',$admin_id);
        $this->db->update('admin',$data);
	}
	function select_myprofile_mail_info()
    {
                $admin_id = $this->session->userdata('login_user_id');
		return $this->db->get_where('admin', array('admin_id' => $admin_id))->result_array();
       
    }
	function select_myprofile_info()
    {
        $admin_id = $this->session->userdata('login_user_id');
		return $this->db->get_where('admin', array('admin_id' => $admin_id))->result_array();
       
    }
    
    function update_superadmin_info($admin_id)
	{
		$data['fname'] 		= ucfirst($this->input->post('fname'));
		$data['lname'] 		= ucfirst($this->input->post('lname'));
		$data['address']    = $this->input->post('address');
		$data['email']    = $this->input->post('email');
		$data['contact']    = $this->input->post('contact');
        $data['address']    = $this->input->post('address');
        $this->db->where('admin_id',$admin_id);
        $this->db->update('admin',$data);
      
    }
	
	function update_folderlocation_info($admin_id)
    {
       	$data['path']    = $this->input->post('path');
		$data['testdata_path']    = $this->input->post('testdata_path');		
        $this->db->where('admin_id',$admin_id);
        $this->db->update('admin',$data);
		
		$this->session->set_userdata('folder_path', $this->input->post('path'));
		$this->session->set_userdata('testdata_path',$this->input->post('testdata_path'));
      
    }
	
	
	
	/******MAILING FUNCTION******/
	
	function smtpmailer($to,$from="partnerit@gmail.com",$from_name,$sub,$msg,$host="localhost",$port="25",$protocol="smtp") {
	/*
	echo $to."<br>";
	echo $from."<br>";
	echo $from_name."<br>";
	echo $sub."<br>";
	echo $msg."<br>";
	echo $host."<br>";
	echo $port."<br>";
	echo $protocol."<br>";*/
        $config = array();
        $config['useragent'] = "CodeIgniter";
        $config['mailpath'] = "/usr/bin/sendmail"; // or "/usr/sbin/sendmail"
        $config['protocol'] = $protocol;
        $config['smtp_host'] = $host;
        $config['smtp_port'] = $port;
        $config['mailtype'] = 'html';
        $config['charset'] = 'utf-8';
        $config['newline'] = "\r\n";
        $config['wordwrap'] = TRUE;

        $this->load->library('email');

        $this->email->initialize($config);

        $this->email->from($from, $from_name);
        $this->email->from($from, $from_name);
        $this->email->to($to);
        $this->email->subject($sub);
		$this->email->message($msg);

        $this->email->send();	

        
    }
	
	
}