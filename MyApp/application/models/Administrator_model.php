<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Administrator_model extends CI_Model {

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
	
	/*****user model functions********/
	
	 function save_user_info()
    {
				$data['company_id']        = $this->session->userdata('login_company_id');
                $data['ref_user_id']        = $this->session->userdata('login_user_id');
				$data['added_by_name']   = $this->session->userdata('login_type');		
                $data['fname'] 		= ucfirst($this->input->post('firstname'));
                $data['lname']    = ucfirst($this->input->post('lastname'));
                $data['email']    = $this->input->post('email');
				$data['contact']    = $this->input->post('contact');
				$data['user_type']    = $this->input->post('user_type');
				$data['password']    = strrev(sha1(md5($this->input->post('password'))));
                $data['address']    = $this->input->post('Address');
				
                $this->db->insert('user',$data);
				
				$foldername = $data['fname']."".$data['lname'];
				$foldername = str_replace(' ', '', $foldername);
				$compnay_name = $this->session->userdata('company_name');
				$compnay_name = str_replace(' ', '', $compnay_name);
                $pathname = 'F:/SeleniumAutomation_V1/Companies/'.$compnay_name.'/'.$foldername;								
                mkdir($pathname,0777);
    }
    
    function select_user_info()
    {
        $company_id= $this->session->userdata('login_company_id');
		$login_user_id= $this->session->userdata('login_user_id');
        return $this->db->get_where('user', array('company_id' => $company_id,'user_id !=' => $login_user_id))->result_array();
    }
    
    function update_user_info($user_id)
    {
        $data['company_id']        = $this->session->userdata('login_company_id');
        $data['ref_user_id']        = $this->session->userdata('login_user_id');
		$data['added_by_name']   = $this->session->userdata('login_type');		
        $data['fname'] 		= ucfirst($this->input->post('firstname'));
        $data['lname']    = ucfirst($this->input->post('lastname'));
        $data['user_type']    = $this->input->post('user_type');		
        $data['address']    = $this->input->post('address');
        
        $this->db->where('user_id',$user_id);
        $this->db->update('user',$data);
		
				$foldername = $data['fname']."".$data['lname'];
				$foldername = str_replace(' ', '', $foldername);
				$compnay_name = $this->session->userdata('company_name');
				$compnay_name = str_replace(' ', '', $compnay_name);
                $pathname = 'F:/SeleniumAutomation_V1/Companies/'.$compnay_name.'/'.$foldername;								
                mkdir($pathname,0777);
      
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
		
		$company_id = $this->session->userdata('login_company_id');		
		return $this->db->get_where('company_environ_url' , array('application_id' => $app_id,'environment_id' => $env_id, 'company_id' =>$company_id ))->row()->env_url;
	}
	
	function get_testcases_application($app_id){
		$company_id = $this->session->userdata('login_company_id');
        return $this->db->get_where('testcases', array('application_id' => $app_id,'company_id' => $company_id))->result_array();
	}
	
        /***changes***/
        function get_test_case_name($test_id){
            return $this->db->get_where('testcases' , array('testcase_id' => $test_id ))->row()->testcase_name;
        }
        function get_company_name($company_id){
             return $this->db->get_where('company' , array('company_id' => $company_id ))->row()->company_name;
        }
	function get_testcases_count(){
		$company_id = $this->session->userdata('login_company_id');
		 return $this->db->get_where('testcases', array('company_id' => $company_id))->result_array();
	}
	
	
	function get_check_environment($environment_id) {
		
				$company_id  = $this->session->userdata('login_company_id');
	
			 		$this->db->where('company_id',$company_id);
					$this->db->where('environment_id',$environment_id);
					$this->db->order_by("application_id");
					
					$env_info = $this->db->get('company_environ_url')->result_array();
					$new_value =""; 
					foreach ($env_info as $rows) {					
						$new_value= $new_value .'_____'.$rows['env_url'];
					 }
				echo $data_send =$new_value;
						
    }
	
	function get_check_testcase($application_id){
		
		$company_id  = $this->session->userdata('login_company_id');
	
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
	
	function get_check_testcase_data($application_id){
		
		$company_id  = $this->session->userdata('login_company_id');
	
			 		$this->db->where('company_id',$company_id);
					$this->db->where('application_id',$application_id);
					//$this->db->where('status',1);
					$this->db->where('is_Availbale',1);
					$test_info = $this->db->get('testcases')->result_array();
					$new_value ='
<select class="form-control" required="" name="selectTestCase" id="selectTestCase"  onchange="show_TestCase_data(this.value)">
<option value="">---Select TestCase---</option>'; 
					foreach ($test_info as $rows) {	
						$new_value .='<option value="'.$rows["testcase_id"].'"> '.$rows["testcase_name"].'  </option>';
					}
				$new_value .=  '</select>'; 
			     
			echo $new_value;
		
	}
	
	function get_show_execution($runname){
		$company_id  = $this->session->userdata('login_company_id');
		$this->db->where('company_id',$company_id);
		$this->db->where('runname',$runname);
		//$this->db->where('status',1);
		//$this->db->where('is_Availbale',1);
		$exe_info = $this->db->get_where('testcase_result')->result_array();
		/*$data='<table id="table-example" class="table table-hover">
				<thead>
				<tr>
				<th>Sr.No.</th>
				<th>Run Name</th>
				<th>Test Name</th>
				<th>Execution Time</th> 
				<th>View</th> 
				</tr>
				</thead>
				<tbody>';*/
			 $sr=1; foreach ($exe_info as $rows) {
				 echo $rows['runname'];
				/*$data.='<tr><td>"'.$sr.'"</td><td>"'.$row["runname"].'"</td>
				<td>"'.$row["testcase_name"].'"</td>
				<td>"'.$row["execution_time"].'"</td></tr>';
				 $sr++; }
				$data.='</tbody></table>';*/
	}
				//echo $data;

	}
	
	function get_compnay_mail_setting(){
		$company_id  = $this->session->userdata('login_company_id');
		 return $this->db->get_where('email_setting', array('company_id' => $company_id))->result_array();
		
	}
	
	function get_env_url($environment_id){
		return $this->db->get_where('environment', array('environment_id' => $environment_id))->row()->environment_name;
	}
	
	
	/*****END GET VALUES FROM METHOD FUNCTION*****/
	
	
	
	/********ENVIRONMENT MODEL FUNCTION******/
	
	function save_environment_info(){
				$data['company_id']        = $this->session->userdata('login_company_id');
                $data['user_id']        = $this->session->userdata('login_user_id');
				$data['added_by_name']   = $this->session->userdata('login_type');
                $data['environment_name'] 		= ucfirst($this->input->post('environment'));
		
		 $this->db->insert('environment',$data);
		 $environment_id = $this->db->insert_id();
		 
		 /***ADD Company URL Also***/
					$company_id  = $this->session->userdata('login_company_id');	
			 		$this->db->where('company_id',$company_id);
					$dat['company_id']  = $this->session->userdata('login_company_id');
					$dat['user_id']  = $this->session->userdata('login_user_id');
					
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
                $data['company_id']        = $this->session->userdata('login_company_id');
                $data['user_id']        = $this->session->userdata('login_user_id');
				$data['added_by_name']   = $this->session->userdata('login_type');		
                $data['environment_name'] 		= ucfirst($this->input->post('environment'));
       
                $this->db->where('environment_id',$environment_id);
                 $this->db->update('environment',$data);
      
        }
	function delete_environment_info($environment_id)
        {
				$this->db->where('environment_id',$environment_id);
                $this->db->delete('environment');
				$this->db->where('environment_id',$environment_id);
				$this->db->delete('company_environ_url');
        }
	function select_environment_info()
    {
        $company_id = $this->session->userdata('login_company_id');
        return $this->db->get_where('environment', array('company_id' => $company_id))->result_array();
    }
	function select_com_environment_info(){
		 $company_id = $this->session->userdata('login_company_id');
        return $this->db->get_where('company_environ_url', array('company_id' => $company_id))->result_array();
	}
	
	/********END ENVIRONMENT MODEL FUNCTION******/
	
	
	/******BROWSER MODEL FUNCTION******/
	
	function save_browser_info(){
		$data['company_id']        = $this->session->userdata('login_company_id');
        $data['user_id']        = $this->session->userdata('login_user_id');
		$data['added_by_name']   = $this->session->userdata('login_type');		
        $data['browser_name'] 		= ucfirst($this->input->post('browser'));
		
		 $this->db->insert('browser',$data);
	}
	 function update_browser_info($browser_id)
        {
            $data['company_id']        = $this->session->userdata('login_company_id');
            $data['user_id']        = $this->session->userdata('login_user_id');
            $data['added_by_name']   = $this->session->userdata('login_type');		
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
        $company_id = $this->session->userdata('login_company_id');
      return $this->db->get_where('browser', array('company_id' => $company_id))->result_array();
     
    }
	
	/*******END BROWSER MODEL FUNCTION******/
	
	
	/*******APPLICATION MODEL FUNCTION******/
	
		function save_application_info(){
		$data['company_id']        = $this->session->userdata('login_company_id');
		$data['user_id']        = $this->session->userdata('login_user_id');
		$data['added_by_name']   = $this->session->userdata('login_type');	
		$data['application_name'] = ucfirst($this->input->post('application'));		
		$this->db->insert('application',$data);
                
                /**changes**/
                $application_id = $this->db->insert_id();
                if($application_id){
                    $compnayname = $this->session->userdata('company_name');
					$compnayname = str_replace(' ', '', $compnayname);
                    $foldername = $data['application_name'];
					$foldername = str_replace(' ', '', $foldername);
                    $pathname = 'F:/TestIT/wamp/www/TestApps/SeleniumAutomation_V1/TestData/'.$compnayname.'/'.$foldername;                   
                    mkdir($pathname);
                }
                  /**changes**/
	}
	 function update_application_info($application_id)
    {
        $data['company_id']        = $this->session->userdata('login_company_id');
        $data['user_id']        = $this->session->userdata('login_user_id');
        $data['added_by_name']   = $this->session->userdata('login_type');	
		$data['application_name'] 		= ucfirst($this->input->post('application'));
        $this->db->where('application_id',$application_id);
        $this->db->update('application',$data);
        /**changes**/
					$compnayname = $this->session->userdata('company_name');
					$compnayname = str_replace(' ', '', $compnayname);
                    $foldername = $data['application_name'];
					$foldername = str_replace(' ', '', $foldername);
                    $pathname = 'F:/TestIT/wamp/www/TestApps/SeleniumAutomation_V1/TestData/'.$compnayname.'/'.$foldername;                   
                    mkdir($pathname);
               
                  /**changes**/
      
    }
	function delete_application_info($application_id)
    {
        $this->db->where('application_id',$application_id);
        $this->db->delete('application');
    }
	function select_application_info()
    {
        $company_id = $this->session->userdata('login_company_id');
        return $this->db->get_where('application', array('company_id' => $company_id))->result_array();
        
    }
	
	/*******END APPLICATION MODEL FUNCTION******/
	
	
	
	/******* TEST CASES MODEL FUNCTION******/
	
	function save_testcase_info(){
		$data['company_id']        = $this->session->userdata('login_company_id');
        $data['user_id']        = $this->session->userdata('login_user_id');
		$data['user_type']     =    $this->input->post('user_type');
		$data['testcase_name'] 		= ucfirst($this->input->post('testcase_name'));
		$data['application_id'] 	= $this->input->post('application_id');
		$data['status_type'] 		= $this->input->post('status_type');
		$data['class_name'] 		= $this->input->post('class_name');
		$data['description'] 		= $this->input->post('description');
		$data['is_Availbale'] 		= $this->input->post('is_Availbale');
		
		$this->db->insert('testcases',$data);
                /**changes**/
                $test_id = $this->db->insert_id();
                $appname = $this->get_test_application($this->input->post('application_id'));
				$appname = str_replace(' ', '', $appname);
                if($test_id){
                   $compnayname = $this->session->userdata('company_name');
				   $compnayname = str_replace(' ', '', $compnayname);
                    $foldername = $data['testcase_name'];
					$foldername = str_replace(' ', '', $foldername);
                    $pathname = 'F:/TestIT/wamp/www/TestApps/SeleniumAutomation_V1/TestData/'.$compnayname.'/'.$appname.'/'.$foldername;                   
                    mkdir($pathname);
                }
                  /**changes**/
                
	}
	 function update_testcase_info($testcase_id)
        {
                $data['company_id']             = $this->session->userdata('login_company_id');
                $data['user_id']        = $this->session->userdata('login_user_id');
				$data['user_type']              =   $this->input->post('user_type');
				$data['testcase_name']          = ucfirst($this->input->post('testcase_name'));
				$data['application_id'] 	= $this->input->post('application_id');
				$data['status_type'] 		= $this->input->post('status_type');
				$data['class_name'] 		= $this->input->post('class_name');
				$data['description'] 		= $this->input->post('description');
				$data['is_Availbale'] 		= $this->input->post('is_Availbale');
		       
            $this->db->where('testcase_id',$testcase_id);
            $this->db->update('testcases',$data);
      
        }
	function delete_testcase_info($testcase_id)
    {
        $this->db->where('testcase_id',$testcase_id);
        $this->db->delete('testcases');
    }
	function select_testcase_info()
    {
        $company_id = $this->session->userdata('login_company_id');
        return $this->db->get_where('testcases', array('company_id' => $company_id))->result_array();
        
    }
	
	/*******END TEST CASES MODEL FUNCTION******/
	
	
	/*******Company URL MODEL FUNCTION******/
	
	function save_companyurl_info(){
		
		$data['company_id']        = $this->session->userdata('login_company_id');
        $data['user_id']        = $this->session->userdata('login_user_id');
		$data['application_id'] 		= $this->input->post('application_id');
		$this->db->insert('company_environment',$data);
		
		$dat['company_env_id'] = $this->db->insert_id();
		$dat['company_id']        = $this->session->userdata('login_company_id');
        $dat['user_id']        = $this->session->userdata('login_user_id');
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
        $company_id = $this->session->userdata('login_company_id');
		$this->db->group_by('application_id');
        return $this->db->get_where('company_environ_url', array('company_id' => $company_id))->result_array();
	}
	
	/*******END Company URL MODEL FUNCTION******/
	
	
	
    
    
	public function checkOldPassword($oldPassword)
{
	$oldPassword= strrev(sha1(md5($oldPassword)));
	
	$user_id = $this->session->userdata('login_user_id');   
   	
	$password = $this->db->get_where('user' , array('user_id' => $user_id ))->row()->password;

	if($oldPassword == $password)
        {
            return true;
        }
        else
        {
            return false;
        }
    
}

	function update_my_password_info($user_id)
    {
       	$data['password']   = strrev(sha1(md5($this->input->post('password'))));
		        
        $this->db->where('user_id',$user_id);
        $this->db->update('user',$data);
      
    }
    
   
	
	/*****END Company MODEL FUNCTION******/
	
	
	/*******EXECUTION MODEL FUNCTION******/
	public function startExecution_process(){
		
		$maildata= $this->get_compnay_mail_setting();
		 
			foreach($maildata as $rows){
				$host_name= $rows['host_name'];
				$email= $rows['email'];
				$username= $rows['username'];
				$port= $rows['port'];
				$protocol= $rows['secuirity_protocol'];
				
			}

		$execution_name=$this->input->post('execution_name');
		$environment_id=$this->input->post('environment_id');
		$browser_id=$this->input->post('browser_id');
		$failure_attempt=$this->input->post('failure_attempt');
		$no_of_category=$this->input->post('no_of_category');
		
		$env_name=$this->get_env_url($environment_id);
		
		/****code from exe*****/
								
						$body = "Dear ".$this->session->userdata('name').",\n\n";
						$body .= "Execution Name:".$execution_name."\n\nEnvironment Name:".$env_name."\n\n";
						
						$content =  "ExecutionName:".$execution_name."\nEnvironmentName:".$env_name."\n";
						$content .=  "EnvironmentUrl:".$env_name."\n";

						$content .=  "BrowserName:".$browser_id."\nFailureAttempt:".$failure_attempt."\n";
						$body .=  "Browser Name:".$browser_id."\n\n";
						$count_selected="";
						$SelectedTestCases="";
						$SelectedTestCasesemail="";
						for($u=1;$u<=$no_of_category;$u++){
							
							$value=$this->input->post('category_check'.$u);
							$name=$this->input->post('category_check_name'.$u);
							$app_url =$this->input->post('app_url'.$u);
							$value_app = $name;
							$value_url = $app_url;
							$content .=$value_app ."=".$value_url."\n";
							
							$no_of_subcategory= $this->input->post('sub_category'.$value);
                                                       
   
								$count_selected += count($no_of_subcategory);
								for($i=0;$i<=count($no_of_subcategory);$i++)
								{
								 //$no_of_subcategory[$i];
								$value_Expload= explode("___", $no_of_subcategory[$i]);
								$test_name= $value_Expload[2];
								$class_name= $value_Expload[1];
								$SelectedTestCases =$SelectedTestCases.$test_name."~".$class_name.",";
								if($test_name !=''){
								$SelectedTestCasesemail .="" .$test_name."\n";
								}
								}  
								$value_app  += "";

							}

							$SelectedTestCasesemail .='';
							$content .="SelectedTestCases:".$SelectedTestCases."\n";


							$body .=  "Selected Test Cases \n".$SelectedTestCasesemail."\n\n";
							$body .=  "No of Selected Test Cases:".$count_selected."\n\n";


							 $addedDateTime=date("d-m-Y H:i:s");

							$content .="TRIGGEREDBY:".$email."\n";
							$content .="TRIGGEREDWHEN:".$addedDateTime."\n";
							$content .="COMPANY:".$this->get_company_name($this->session->userdata('login_company_id'))."\n";
							$content .="EMAIL:".$email."\n";
							$body .=  "Triggered By:".$this->session->userdata('name')."\n\n";
							$body .=  "Triggered At:".$addedDateTime."\n\n\n\n";
							$body .=  "Thanks \n\n";
							$body .=  "Team Auto IT";

							$email_id= $email;
							$name = "Auto IT ";
							$subj = "Execution Triggered on ".$env_name."";

						if($host_name){

							if($this->smtpmailer($email_id, $username, $name, $subj, $body, $host_name,$port,$protocol)){
								$data_recordData['email'] =$email_id;
								$data_recordData['status'] ='1';
								$data_recordData['company_id'] =$this->session->userdata('login_company_id');
								$data_recordData['user_id']=$this->session->userdata('login_user_id');
								$data_recordData['execution_time'] =date("Y-m-d H:i:s");
								$data_recordData['runname'] =$this->input->post('execution_name');
								
								$this->db->insert('email_log',$data_recordData);
								
							}else{
								$data_recordData['email'] =$email_id;
								$data_recordData['status'] ='0';
								$data_recordData['company_id'] =$this->session->userdata('login_company_id');
								$data_recordData['user_id']=$this->session->userdata('login_user_id');
								$data_recordData['execution_time'] =date("Y-m-d H:i:s");
								$data_recordData['runname'] =$this->input->post('execution_name');
								
								$this->db->insert('email_log',$data_recordData);
							}


						}

							//$variableilename = base_url()."partnerIT/configuration.txt";
                                                        
                                                        $data = $content;
                                                        if ( ! write_file('F:\SeleniumAutomation_V1\configuration.txt', $data, 'w+'))
                                                        {
                                                                echo 'Unable to write TXT the file';
                                                        }
                                                        else
                                                        {
                                                               // echo 'File written!';
                                                        }
                                                        
                                                            $content_new_xml = "";
							$content_new_xml .="<?xml version='1.0' encoding='UTF-8'?>\n
							<suite name='".$execution_name."' verbose='1'>\n
							<test name='".$execution_name."'>
							<classes>\n
							";
													
							for($u=1;$u<=$no_of_category;$u++){
								
							$value=$this->input->post('category_check'.$u);
							$no_of_subcategory= $this->input->post('sub_category'.$value);

							for($g=0;$g< count($no_of_subcategory);$g++)
							{
								
							 $no_of_subcategory[$g];
							$no_of_subcategory[$g];
							$value_Expload= explode("___", $no_of_subcategory[$g]);
							$test_name= $value_Expload[2];
							$class_name= $value_Expload[1];
							$content_new_xml .="<class name='".$class_name."'>\n
							<methods>\n
							<include name='".$test_name."'/>\n
							</methods>\n
							</class>\n
							";
							}   
							}

							$content_new_xml .= "</classes>\n
							</test>\n
							</suite>";
                                                            
                                                        $TestNGPath = $content_new_xml;
                                                        if ( ! write_file('F:\SeleniumAutomation_V1\TestNGExecutor.xml', $TestNGPath, 'w+'))
                                                        {
                                                                echo 'Unable to write XML the file';
                                                        }
                                                        else
                                                        {
                                                               // echo 'File written!';
                                                        }
                                                        
						 $filename = 'F:\SeleniumAutomation_V1\TriggerExecution.bat';
                  exec($filename);
                                                      						
						//$this->execInBackground('start cmd.exe @cmd /c C:\xampp\htdocs\2017\TestApps\partnerIT\SeleniumAutomation_V1\TriggerExecution.bat');
				
	}
	
	
	function execInBackground($cmd) { 
	
	exec ('c:\WINDOWS\system32\cmd.exe /c C:\xampp\htdocs\2017\TestApps\partnerIT\SeleniumAutomation_V1\TriggerExecution.bat');
		
						}
	
	/*******REPORT MODEL FUNCTION******/
	function select_testreport_info()
    {
        $company_id = $this->session->userdata('login_company_id');
		return $this->db->get_where('testcase_result', array('company_id' => $company_id))->result_array();
       
    }
	function select_email_log_info()
    {
        $company_id = $this->session->userdata('login_company_id');
		
		return $this->db->get_where('email_log', array('company_id' => $company_id))->result_array();
       
    }
	
	function select_execut_info()
    {
                $company_id = $this->session->userdata('login_company_id');
		$this->db->group_by('runname');
		$this->db->order_by('execution_time','desc');
		return $this->db->get_where('email_log', array('company_id' => $company_id))->result_array();
       
    }
	
	
	
	/********PROFILE MODEL FUNCTION******/
	
	function update_company_mail_info($company_id){
				$data['host_name']    = $this->input->post('host_name');
				$data['port']    = $this->input->post('port');
				$data['username']    = $this->input->post('username');
                $data['password']    = strrev(sha1(md5($this->input->post('password'))));
				$data['code']    = strrev($this->input->post('password'));
				$data['secuirity_protocol']    = $this->input->post('secuirity_protocol');
                $this->db->where('company_id',$company_id);
                $this->db->update('email_setting',$data);
	}
	function select_myprofile_mail_info()
    {
                $company_id = $this->session->userdata('login_company_id');
		return $this->db->get_where('email_setting', array('company_id' => $company_id))->result_array();
       
    }
	function select_myprofile_info()
    {
        $user_id = $this->session->userdata('login_user_id');
		return $this->db->get_where('user', array('user_id' => $user_id))->result_array();
       
    }
	function update_my_info($user_id)
    {		
        $data['fname'] 		= ucfirst($this->input->post('fname'));
        $data['lname']    = ucfirst($this->input->post('lname'));
         $data['contact']    = $this->input->post('contact');
        $data['address']    = $this->input->post('address');
        
        $this->db->where('user_id',$user_id);
        $this->db->update('user',$data);
      
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