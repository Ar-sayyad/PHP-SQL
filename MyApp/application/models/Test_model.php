<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Test_model extends CI_Model {

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
        }elseif($company->num_rows() > 0) {
                        $row = $company->row();
                        $this->session->set_userdata('company_login', '1');
                        $this->session->set_userdata('login_user_id', $row->company_id);
						$this->session->set_userdata('login_company_id', $row->company_id);
						$this->session->set_userdata('login_email_id', $row->email);
                        $this->session->set_userdata('name', $row->company_name);
						$this->session->set_userdata('company_name', $row->company_name);
                        $this->session->set_userdata('login_type', 'company');
                        echo '1';
		}elseif($admin->num_rows() > 0) {
                        $row = $admin->row();
                        $this->session->set_userdata('admin_login', '1');
                        $this->session->set_userdata('login_user_id', $row->user_id);
						$this->session->set_userdata('login_email_id', $row->email);
						$this->session->set_userdata('login_company_id', $row->company_id);
                        $this->session->set_userdata('name', $row->fname." ".$row->lname);
						$company_name = $this->get_company_name($row->company_id);
						$this->session->set_userdata('company_name', $company_name);
                        $this->session->set_userdata('login_type', 'administrator');
                        echo '1';
        
        }elseif($tester->num_rows() > 0) {
                        $row = $tester->row();
                        $this->session->set_userdata('tester_login', '1');
                        $this->session->set_userdata('login_user_id', $row->user_id);
						$this->session->set_userdata('login_email_id', $row->email);
						$this->session->set_userdata('login_company_id', $row->company_id);
                        $this->session->set_userdata('name', $row->fname." ".$row->lname);
						$company_name = $this->get_company_name($row->company_id);
						$this->session->set_userdata('company_name', $company_name);
                        $this->session->set_userdata('login_type', 'tester');
                        echo '1';
        }else{
			echo 0;
		}
		
	}
	
	
	/****forgot password start****/
	function getBody($email,$forgot_user_id,$name,$type){
		$act=md5($email);
        $key=strrev(sha1($act))."esd15876wq12WEAS1asO4";
		$config=strrev($key);
		$passkey = md5($forgot_user_id);
		return $body="<body>
			<div class='row'>
					<div class='col-sm-4'></div>
							<div class='col-sm-4 center' style='border: 2px solid #EC971F;padding-bottom:10px;background-color: rgb(254, 250, 249);'>
									<div id='nediv' style='float: left;
										align-content: center;
										width: 90%;
										margin-left: 20%;

										font-family: cursive;
										margin-top: 1%;'>
										<h2>Reset Password of Auto IT</h2></div>
											<hr style='width:70%;
												border: 0;
												height: 1px;
												background-image: linear-gradient(to right, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0));'>

										<div id='mbody' style='width: 70%;
										margin-left: 20%;
										text-align: justify;
										font-family: cursive;
											line-height: 20px;
											margin-bottom:3%;'>
										   
										  <center style='text-align: left;margin-left: 5%;'>
										  <b>Hello $name,</b><br>
										  We received a request to reset the password associated with this e-mail address.<br/>
										  If you made this request, please follow the instructions below.<br/>
											Your Email is : $email <br/>
											  </center>
										  </div>
										  <hr style='width:70%;
												border: 0;
												height: 1px;
												margin-bottom:3%;
												background-image: linear-gradient(to right, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0));'>

										<div  id='aclink' style='font-family: cursive;
											line-height: 20px;
											font-size:14px;
											margin-bottom:3%;
											margin-left: 20%;'>
											 Click on the link below to reset your password using our secure server:<br/>
											To Reset Password, <a href='".base_url()."index.php/TestApp/reset_password?key=$key&act=$act&k=1&pass_key=$passkey&config=$config&id=$forgot_user_id&type=$type&email=$email'>Click here!<a/><br>
										</div>
										 <hr style='width:50%;
												border: 0;
												height: 1px;
												background-image: linear-gradient(to right, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0));'>

										 <div style='font-family: cursive;
											line-height: 22px;
												margin-left: 30%;'>

										  <h5>Team Auto IT</h5>


										</div>

							</div>
					<div class='col-sm-4'></div>
			</div>
	</body>";
	}
	
	public function ForgotPassword($email)
	{
        $superadmin = $this->db->get_where('admin', array('email' => $email));
		$company = $this->db->get_where('company', array('email' => $email));
		$user = $this->db->get_where('user', array('email' => $email));
		
		$maildata= $this->get_admin_mail_setting();
		 
			foreach($maildata as $rowss){				
				$username= $rowss['setting_email'];
				$pass = strrev($rowss['code']);		
			}
			
		//$username="teamautoit+application@gmail.com";
		//$pass="P@ssword1!";
		$name="Auto IT";
		$sub="Forgot Password Activation";
		$host_name="ssl://smtp.googlemail.com";
		$port="465";
		$protocol="smtp";
		
		if($superadmin->num_rows() > 0) {
                        $row = $superadmin->row();                      
                        $forgot_user_id = $row->admin_id;
						$forgot_email_id = $row->email;
                        $forgot_name = $row->fname." ".$row->lname;
                        $forgot_type = 'admin';
                        $body=$this->getBody($forgot_email_id,$forgot_user_id,$forgot_name,$forgot_type);
						$this->forgot_mail($forgot_email_id,$username,$pass,$name,$sub,$body,$host_name,$port,$protocol);
						$data['pass_status']    = 1;
						$this->db->where('admin_id',$forgot_user_id);
						$this->db->update('admin',$data);      
						return 1;
						
        }elseif($company->num_rows() > 0) {
                        $row = $company->row();
						$forgot_user_id = $row->company_id;
						$forgot_email_id = $row->email;
						$forgot_name = $row->company_name;
						$forgot_type = 'company';
						$body=$this->getBody($forgot_email_id,$forgot_user_id,$forgot_name,$forgot_type);
						$this->forgot_mail($forgot_email_id,$username,$pass,$name,$sub,$body,$host_name,$port,$protocol);
						$data['pass_status']    = 1;
						$this->db->where('company_id',$forgot_user_id);
						$this->db->update('company',$data);
						return 1;
					                      
		}elseif($user->num_rows() > 0) {
                        $row = $user->row();
						$forgot_user_id = $row->user_id;
						$forgot_email_id = $row->email;
                        $forgot_name = $row->fname." ".$row->lname;
                        $forgot_type = 'user';
                        $body=$this->getBody($forgot_email_id,$forgot_user_id,$forgot_name,$forgot_type);
						$this->forgot_mail($forgot_email_id,$username,$pass,$name,$sub,$body,$host_name,$port,$protocol);
						$data['pass_status']    = 1;
						$this->db->where('user_id',$forgot_user_id);
						$this->db->update('user',$data);
						return 1;
						
                
        }else{
			return 0;
		}
		
	
        //return $this->db->get_where('company', array('email' => $email))->result_array();
	}
	function forgot_mail($email,$username,$pass,$name,$sub,$body,$host_name="ssl://smtp.googlemail.com",$port="465",$protocol="smtp") {
	
        $config = array();
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'ssl://smtp.googlemail.com';
        $config['smtp_port'] = '465';
		//$config['smtp_user'] = "teamautoit@gmail.com";
		//$config['smtp_pass'] = "P@ssword1!";
		$config['smtp_user'] = $username;
		$config['smtp_pass'] = $pass;
		$config['mailtype'] = 'html';
        $config['charset'] = 'utf-8';
        $config['newline'] = "\r\n";
        $config['wordwrap'] = TRUE;

        $this->load->library('email');

        $this->email->initialize($config);
        $this->email->from($username, $name);
        $this->email->to($email);
        $this->email->subject($sub);
		$this->email->message($body);

        $this->email->send();	
	
    }
	
	function reset_password_info($table,$id,$email,$password){
		
		$data['pass_status']    = 0;
		$data['password']    =  strrev(sha1(md5($password)));
		$this->db->where('email',$email);
		$this->db->where($table.'_id',$id);
		$this->db->update($table,$data);
		$this->session->set_userdata('pass_status',0);	
		
	}
	
	/****forgot password function end****/
	
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
				
				$foldername = $data['fname']."".$data['lname'];
				$foldername = str_replace(' ', '', $foldername);
				$compnay_name = $this->session->userdata('company_name');
				$compnay_name = str_replace(' ', '', $compnay_name);
                $pathname = 'F:/SeleniumAutomation_V1/Companies/'.$compnay_name.'/'.$foldername;								
                mkdir($pathname,0777);				
								
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
    
    function get_test_case_count(){
			$company_id = $this->session->userdata('login_company_id');
            $this->db->group_by('application_id'); 
			return $this->db->get_where('testcases', array('company_id' => $company_id))->result_array();
        
    }
	
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
        function get_browser_name($id){
            return $this->db->get_where('browser' , array('browser_id' => $id ))->row()->browser_name;
        }
                function get_test_application_count($id){
				$company_id = $this->session->userdata('login_company_id');
                                $this->db->from('testcases');
                                $this->db->where('company_id', $company_id);
				$this->db->where('application_id', $id);
				return $this->db->count_all_results();
            //return $this->db->count_all_results('application' , array('application_id' => $id ,'company_id' => $company_id))->row()->application_name;
        }
        function get_last_excutor_name(){
				$company_id = $this->session->userdata('login_company_id');
				//$email= $this->get_company_email($company_id);
				$this->db->where('company_id', $company_id);
				$this->db->limit(1);
				$this->db->order_by('email_log_id', 'DESC');             
				$res= $this->db->get('email_log');   
				return ($res->num_rows() > 0) ? $res->row()->runname : false;             
        }
        function get_last_excutor_email(){
				$company_id = $this->session->userdata('login_company_id');
				//$email= $this->get_company_email($company_id);
				$this->db->where('company_id', $company_id);
				$this->db->limit(1);
				$this->db->order_by('email_log_id', 'DESC');             
				$res = $this->db->get('email_log');  
				return ($res->num_rows() > 0) ? $res->row()->email : false;             
        }
        function get_last_excutor_time(){
				$company_id = $this->session->userdata('login_company_id');
				//$email= $this->get_company_email($company_id);
				$this->db->where('company_id', $company_id);
				$this->db->limit(1);
				$this->db->order_by('email_log_id', 'DESC');             
				$res =  $this->db->get('email_log'); 
				return ($res->num_rows() > 0) ? $res->row()->execution_time : false;           
        }
		function get_last_runner_id(){
				$company_id = $this->session->userdata('login_company_id');
				//$email= $this->get_company_email($company_id);
				$this->db->where('company_id', $company_id);
				$this->db->limit(1);
				$this->db->order_by('email_log_id', 'DESC');             
				$res =  $this->db->get('email_log'); 
				return ($res->num_rows() > 0) ? $res->row()->email_log_id : false;           
        }
		
        function get_test_excuted($runner_id){
				$company_id = $this->session->userdata('login_company_id');
				//$email= $this->get_company_email($company_id);          
                $this->db->from('tce_testcases_results');
                $this->db->where('runner_id', $runner_id); 
				//$this->db->where('RUNNAME', $runname); 	
				return $this->db->count_all_results();
        }
         function get_test_passed($runner_id){
				$company_id = $this->session->userdata('login_company_id');
				//$email= $this->get_company_email($company_id);          
                $this->db->from('tce_testcases_results');
                $this->db->where('runner_id', $runner_id); 
				//$this->db->where('RUNNAME', $runname);
                $this->db->where('RESULT', 'Passed'); 
				return $this->db->count_all_results();
        }
         function get_test_failed($runner_id){
				$company_id = $this->session->userdata('login_company_id');
				//$email= $this->get_company_email($company_id);          
                $this->db->from('tce_testcases_results');
                $this->db->where('runner_id', $runner_id);
				//$this->db->where('RUNNAME', $runname);				 
                $this->db->where('RESULT', 'Failed'); 
				return $this->db->count_all_results();
        }
        function get_company_email($company_id){
            return $this->db->get_where('company' , array('company_id' => $company_id ))->row()->email;
        }
                
	function get_url_name_application($app_id,$env_id){
		
		$company_id = $this->session->userdata('login_company_id');		
		return $this->db->get_where('company_environ_url' , array('application_id' => $app_id,'environment_id' => $env_id, 'company_id' =>$company_id ))->row()->env_url;
	}
	
	function get_testcases_application($app_id){
		$company_id = $this->session->userdata('login_user_id');
        return $this->db->get_where('testcases', array('application_id' => $app_id,'company_id' => $company_id))->result_array();
	}
        function get_test_application_name($test_id){
		//$company_id = $this->session->userdata('login_user_id');
         $application_id = $this->db->get_where('testcases', array('testcase_id' => $test_id))->row()->application_id;        
       return $this->get_test_application($application_id);
	}	
	 function get_test_application_id($test_id){
		//$company_id = $this->session->userdata('login_user_id');
         return $this->db->get_where('testcases', array('testcase_id' => $test_id))->row()->application_id;        
       
	 }
        /***changes***/
        function get_test_case_name($test_id){
            return $this->db->get_where('testcases' , array('testcase_id' => $test_id ))->row()->testcase_name;
        }
		 function get_test_class_name($test_id){
            return $this->db->get_where('testcases' , array('testcase_id' => $test_id ))->row()->class_name;
        }
	function get_testcases_count(){
		$company_id = $this->session->userdata('login_user_id');
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
		$this->db->order_by('ID','DESC');
		$this->db->where('RUNNAME',$runname);
		//$this->db->where('status',1);
		//$this->db->where('is_Availbale',1);
		$exe_info = $this->db->get_where('tce_testcases_results')->result_array();
		$data='<div class="table-responsive">
                    <table id="table-example" class="table table-hover">
				<thead>
				<tr>
				<th>Sr.No.</th>
				<th>Run Name</th>
				<th>Test Name</th>
				<th>Result</th>
				<th>Elapse Time</th>
				<th>Execution Time</th> 
				</tr>
				</thead>
				<tbody>';
			 $sr=1; foreach ($exe_info as $rows) {
				 //echo $rows['RUNNAME'];
				$data.='<tr><td>'.$sr.'</td>
				<td>'.$rows["RUNNAME"].'</td>
				<td>'.$rows["TESTCASENAME"].'</td>';
				if($rows["RESULT"]=='Passed'){
					$data.='<td style="color:green"><b>'.$rows["RESULT"].'</b></td>';
				}else{
					$data.='<td style="color:red"><b>'.$rows["RESULT"].'</b></td>';
				}
				$data.= '<td>'.$rows["ELAPSETIME"].'</td>
				<td>'.$rows["EXECUTIONDATE"].'</td>                
				</tr>';
				 $sr++; 
                                 
                         }
				$data.='</tbody></table></div>';
	
				echo $data;

	}
	
	function get_compnay_mail_setting(){
		$company_id  = $this->session->userdata('login_company_id');
		 return $this->db->get_where('email_setting', array('company_id' => $company_id))->result_array();
		
	}
	function get_admin_mail_setting(){
		//$company_id  = $this->session->userdata('login_company_id');
		 return $this->db->get_where('admin', array('admin_id' => 1))->result_array();
		
	}
	
	function get_env_url($environment_id){
		return $this->db->get_where('environment', array('environment_id' => $environment_id))->row()->environment_name;
	}
	function get_company_url($environment_id,$application_id){
		return $this->db->get_where('company_environ_url', array('environment_id' => $environment_id,'application_id' => $application_id))->row()->env_url;
	}
	
	/****Get functionality to super admin dashboard data*****/
	 function get_company_count(){        
            $this->db->group_by('company_id'); 
         return $this->db->get_where('company')->result_array();
        
    }
	function get_company_name($company_id){
		
		return $this->db->get_where('company' , array('company_id' => $company_id ))->row()->company_name;
	}
	function get_company_test_count($company_id){
                $this->db->from('testcases');
                $this->db->where('company_id', $company_id);             
            return $this->db->count_all_results();
            //return $this->db->count_all_results('application' , array('application_id' => $id ,'company_id' => $company_id))->row()->application_name;
        }
	
	/****GET Functionality to superadmin dashboard data*****/
	
	/*****END GET VALUES FROM METHOD FUNCTION*****/
	
	
	
	/********ENVIRONMENT MODEL FUNCTION******/
	
	function save_environment_info(){
		$data['company_id']        = $this->session->userdata('login_user_id');
		$data['added_by_name']   = $this->session->userdata('login_type');		
                $data['environment_name'] = ucfirst($this->input->post('environment'));
		
		 $this->db->insert('environment',$data);
		 $environment_id = $this->db->insert_id();
		 
		 /***ADD Company URL Also***/
					$company_id  = $this->session->userdata('login_company_id');	
			 		$this->db->where('company_id',$company_id);
					$dat['company_id']  = $this->session->userdata('login_company_id');
					
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
		
		$this->db->where('environment_id',$environment_id);
		$this->db->delete('company_environ_url');
    }
	function select_environment_info()
    {
        $company_id = $this->session->userdata('login_user_id');
        return $this->db->get_where('environment', array('company_id' => $company_id))->result_array();
    }
	function select_com_environment_info(){
		 $company_id = $this->session->userdata('login_user_id');
        return $this->db->get_where('company_environ_url', array('company_id' => $company_id))->result_array();
	}
	
	/********END ENVIRONMENT MODEL FUNCTION******/
	
	
	/******BROWSER MODEL FUNCTION******/
	
	function save_browser_info(){
		$data['company_id']        = $this->session->userdata('login_user_id');		
        $data['browser_name'] 		= ucfirst($this->input->post('browser'));
		
		 $this->db->insert('browser',$data);
	}
	 function update_browser_info($browser_id)
    {
        $data['company_id']        = $this->session->userdata('login_user_id');		
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
				$data['company_id']        = $this->session->userdata('login_user_id');
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
        $company_id = $this->session->userdata('login_user_id');
        return $this->db->get_where('application', array('company_id' => $company_id))->result_array();
        
    }
	
	/*******END APPLICATION MODEL FUNCTION******/
	
	
	
	/******* TEST CASES MODEL FUNCTION******/
	
	function save_testcase_info(){
		$data['company_id']        = $this->session->userdata('login_user_id');
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
			$data['company_id']             = $this->session->userdata('login_user_id');
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
        $company_id = $this->session->userdata('login_user_id');
        return $this->db->get_where('testcases', array('company_id' => $company_id))->result_array();
        
    }
	
	/*******END TEST CASES MODEL FUNCTION******/
	
	
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
	
	function delete_companyurl_info($env_id)
    {           
                $company_id        = $this->session->userdata('login_company_id');
              
                $this->db->delete('company_environ_url',array('company_id' => $company_id,'environment_id'=> $env_id));
		
    }
	
	function select_companyurl_info()
    {
        $company_id = $this->session->userdata('login_user_id');
		$this->db->group_by('application_id');
        return $this->db->get_where('company_environ_url', array('company_id' => $company_id))->result_array();
        
    }
	
	/*******END Company URL MODEL FUNCTION******/
	
	
	/*******Company MODEL FUNCTION******/
	
	 function save_company_info()
    {
		//$data['company_id']        = $this->session->userdata('login_user_id');			
                $data['company_name'] 		= ucfirst($this->input->post('company_name'));
                $data['email']    = $this->input->post('email');
				$data['contact']    = $this->input->post('contact');		
				$data['password']    = strrev(sha1(md5($this->input->post('password'))));
                $data['address']    = $this->input->post('address');
        
                $this->db->insert('company',$data);	
		
				$company_id = $this->db->insert_id();		
				$dat['host_name']    = "smtp.gmail.com";
				$dat['port']    = "465";
				$dat['email']    = $data['email'];
				$dat['username']    = $data['email'];
                $dat['password']    = $data['password'];
				$dat['code']    = strrev($this->input->post('password'));
				$dat['secuirity_protocol']    = "SMTP";
                $dat['company_id'] = $company_id;
                $this->db->insert('email_setting',$dat);
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
        $data['company_name'] 		= ucfirst($this->input->post('company_name'));
		$data['address']    = $this->input->post('address');
		$data['email']    = $this->input->post('email');
		$data['contact']    = $this->input->post('contact');
        $data['address']    = $this->input->post('address');
		$data['domain']    = $this->input->post('domain');
		$data['contact_landline']    = $this->input->post('contact_landline');
		        
        $this->db->where('company_id',$company_id);
        $this->db->update('company',$data);
      
    }
	public function checkOldPassword($oldPassword)
{
	$oldPassword= strrev(sha1(md5($oldPassword)));
	
	$company_id = $this->session->userdata('login_user_id');   
   	
	$password = $this->db->get_where('company' , array('company_id' => $company_id ))->row()->password;

	if($oldPassword == $password)
        {
            return true;
        }
        else
        {
            return false;
        }
    
}

	function update_my_password_info($company_id)
    {
       	$data['password']   = strrev(sha1(md5($this->input->post('password'))));
		        
        $this->db->where('company_id',$company_id);
        $this->db->update('company',$data);
      
    }
    
    function delete_company_info($company_id)
    {
        $this->db->where('company_id',$company_id);
        $this->db->delete('company');
    }
	
	
	/*****END Company MODEL FUNCTION******/
	
	
	/*******LOGICAL GROUP MODEL FUNCTION******/
	
	public function saveLogical_group_user(){
		
		$data['logical_group_name'] = ucwords($this->input->post('group_name'));	
		$data['environment_id'] = $this->input->post('environment_id');			
                $testcase_id               = $this->input->post('testcase_id');       
		$data['testcase_id']    = json_encode($testcase_id);
		$data['user_id'] = $this->session->userdata('login_user_id');
		$data['created_by_name'] = $this->session->userdata('name');
		$data['created_by'] = $this->session->userdata('login_type');
		$data['created_email'] = $this->session->userdata('login_email_id');
		$data['company_id'] = $this->session->userdata('login_company_id');
		 echo $this->db->insert('logical_group',$data);
		//print_r($data);
		
	}
	public function saveLogical_group(){
		
		$data['logical_group_name'] = ucwords($this->input->post('group_name'));	
		$data['environment_id'] = $this->input->post('environment_id');			
                $testcase_id               = $this->input->post('testcase_id');       
		$data['testcase_id']    = json_encode($testcase_id);
		//$data['user_id'] = $this->session->userdata('login_user_id');
		$data['created_by_name'] = $this->session->userdata('name');
		$data['created_by'] = $this->session->userdata('login_type');
		$data['created_email'] = $this->session->userdata('login_email_id');
		$data['company_id'] = $this->session->userdata('login_company_id');
		 echo $this->db->insert('logical_group',$data);
		//print_r($data);
		
	}
	public function saveClone_group(){
		
		$data['logical_group_name'] = ucwords($this->input->post('group_name'));	
		$data['environment_id'] = $this->input->post('environment_id');			
                 $testcase_id               = $this->input->post('testcase_id');       
		$data['testcase_id']    = ($testcase_id);
		//$data['user_id'] = $this->session->userdata('login_user_id');
		$data['created_by_name'] = $this->session->userdata('name');
		$data['created_by'] = $this->session->userdata('login_type');
		$data['created_email'] = $this->session->userdata('login_email_id');
		$data['company_id'] = $this->session->userdata('login_company_id');
		 echo $this->db->insert('logical_group',$data);
		//print_r($data);
		
	}
	public function select_logical_group_info(){
		
		$company_id= $this->session->userdata('login_company_id');		
		  return $this->db->get_where('logical_group', array('company_id' => $company_id))->result_array();
	}
	
	function clone_logical_group_info($logical_group_id)
    {
       	//$data['password']   = strrev(sha1(md5($this->input->post('password'))));
		        
        $this->db->where('logical_group_id',$logical_group_id);
        $this->db->update('logical_group',$data);
      
    }
    
    function delete_logical_group_info($logical_group_id)
    {
        $this->db->where('logical_group_id',$logical_group_id);
        $this->db->delete('logical_group');
    }
	
	
	/*******LOGICAL GROUP MODEL FUNCTION******/
	
	/*******EXECUTION MODEL FUNCTION******/
	 public function startGroupExecution_process($type){
				 $companyname = $this->session->userdata('company_name');
				 $companyname = str_replace(' ', '', $companyname);
				 $user_name = $this->session->userdata('name');
				 $user_name = str_replace(' ', '', $user_name);
				 $execution_name=$this->input->post('execution_name');				
				 $execution_name = str_replace(' ', '', $execution_name);
                 $pathname = 'F:/SeleniumAutomation_V1/Companies/'.$companyname.'/'.$user_name.'/'.$execution_name;                   
                 mkdir($pathname,0777);
						//$environment_id=$this->input->post('environment_id');
		$browser_id=$this->input->post('browser_id');
        $browser_name= $this->get_browser_name($browser_id);
		$failure_attempt=1;
		
		$maildata= $this->get_compnay_mail_setting();
		 
			foreach($maildata as $rows){
				$host_name= $rows['host_name'];
				$email= $rows['email'];
				$username= $rows['username'];
				$pass = strrev($rows['code']);
				$port= $rows['port'];
				$protocol= $rows['secuirity_protocol'];
				
			}
			
		$logical_group_id=$this->input->post('logical_group_id');
		$groups_entries            = array();
		$number_of_groups     = sizeof($logical_group_id);	
		
						
		/****actual code****/
						$body ="<div style='background-color: rgba(192, 255, 194, 0.45);
									border: 2px solid rgba(255, 0, 0, 0.28);
									border-radius: 12px;
									color: #181046;
									padding: 50px;
									padding-top: 30px;
									font-family: Tahoma;'>";		
						$body .= "<h3>Dear ".$this->session->userdata('name').",</h3>";
						$body .= "<h4>Execution Name:".$execution_name."</h4>";
						
						$content =  "ExecutionName:".$execution_name."\nIsLogicalGroup:true\n";
						//$content .=  "IsLogicalGroup:false\n";

						$content .=  "BrowserName:".$browser_name."\nFailureAttempt:".$failure_attempt."\n";
						$body .=  "<h4>Browser Name:".$browser_name."</h4>";
						  $content_new_xml = "";
						  
							$content_new_xml .="<?xml version='1.0' encoding='UTF-8'?>\n
							<!DOCTYPE suite SYSTEM 'http://testng.org/testng-1.0.dtd'>\n
							<suite name='".$execution_name."' verbose='1' parallel='tests' thread-count='2'>\n
							<parameter name='CallerFilePath' value='Companies\\$companyname\\$user_name\\$execution_name\'/>\n
							<test name='".$execution_name."'>
							<classes>\n
							";
							
						 $cnt =0;
						 $SelectedTestCases="";
						$SelectedTestCasesemail=" ";
							 for ($i = 0; $i < $number_of_groups; $i++)
							{
								 $logical_group_id[$i];
								 $logical_group_info = $this->db->get_where('logical_group',array('logical_group_id'=> $logical_group_id[$i]))->result_array();
								  foreach ($logical_group_info as $row) {
									 
									 $environment_id=$row['environment_id'];
									  $env_name=$this->get_env_url($environment_id);
									  
									 $test_entries    = json_decode($row['testcase_id']);
										$sr=1; foreach ($test_entries as $test_id)
											{
											//$app_name = $this->get_test_application_name($test_id);
											
											//$app_id = $this->get_test_application_id($test_id);
											
											//$company_url = $this->get_company_url($environment_id,$app_id);
											$testcase = $this->get_test_case_name($test_id);
											
											$SelectedTestCasesemail .=" - " .$testcase." : ".$env_name."<br>"; 
											 $class_name= $this->get_test_class_name($test_id);
											 
											 $content .=$testcase.":".$env_name."\n";
											 
											$content_new_xml .="<class name='".$class_name."'>\n
											</class>\n";
											
											$sr++; 
											$cnt++;
									 }
									
									
								 }	
								 
							}
		
							$content_new_xml .= "</classes>\n
							</test>\n
							</suite>";					
						

							$SelectedTestCasesemail .=' ';
							//$content .="SelectedTestCases:".$SelectedTestCases."\n";


							$body .=  "<h4>Selected Test Cases : </h4><h4> ".$SelectedTestCasesemail."</h4>";
							$body .=  "<h4>No. of Selected Test Cases : ".$cnt."</h4>";


							 $addedDateTime=date("d-m-Y H:i:s");

							$content .="TRIGGEREDBY:".$this->session->userdata('name')."\n";
							$content .="TRIGGEREDWHEN:".$addedDateTime."\n";
							$content .="COMPANY:".$this->session->userdata('company_name')."\n";
							$content .="EMAIL:".$this->session->userdata('login_email_id')."\n";
							$body .=  "<h4>Triggered By : ".$this->session->userdata('name')."</h4>";
							$body .=  "<h4>Triggered At : ".$addedDateTime."</h4>";
							$body .=  "<h5>Thanks </h5>";
							$body .=  "<h6>Team Auto IT</h6></div>";

							$email_id= $this->session->userdata('login_email_id');
							$name = "Auto IT ";
							$subj = "Execution Triggered on Logical Group";

						if($host_name){

							if($this->smtpmailer($email_id, $username,$pass, $name, $subj, $body, $host_name,$port,$protocol)){
								$data_recordData['email'] =$this->session->userdata('login_email_id');                                                                
								$data_recordData['runname'] =$this->input->post('execution_name');
								$data_recordData['company_id'] =$this->session->userdata('login_company_id');
								$data_recordData['browser_id']=$browser_id;
								//$data_recordData['environment_id']=$environment_id;
								$data_recordData['user_id']=$this->session->userdata('login_user_id');
								$data_recordData['execution_time'] =date("Y-m-d H:i:s");
								$data_recordData['status'] ='1';								
								$this->db->insert('email_log',$data_recordData);
								$runner_id = $this->db->insert_id();
								
							}else{
								$data_recordData['email'] =$this->session->userdata('login_email_id');                                                                
								$data_recordData['runname'] =$this->input->post('execution_name');
								$data_recordData['company_id'] =$this->session->userdata('login_company_id');
								$data_recordData['browser_id']=$browser_id;
								//$data_recordData['environment_id']=$environment_id;
								$data_recordData['user_id']=$this->session->userdata('login_user_id');
								$data_recordData['execution_time'] =date("Y-m-d H:i:s");
								$data_recordData['status'] ='0';								
								$this->db->insert('email_log',$data_recordData);
								$runner_id = $this->db->insert_id();

							}


						}		
								$content.="runner_id:".$runner_id;
									 $data = $content;
										if ( ! write_file($pathname.'\configuration.txt', $data, 'w+'))
										{
												echo 'Unable to write TXT the file';
										}
										else
										{
											   // echo 'File written!';
										}
                                                        
                           							

															//echo "<br>";
                                                            
                                                        $TestNGPath = $content_new_xml;
                                                        if ( ! write_file($pathname.'\TestNGExecutor.xml', $TestNGPath, 'w+'))
                                                        {
                                                                echo 'Unable to write XML the file';
                                                        }
                                                        else
                                                        {
                                                               // echo $content_new_xml;
                                                        }
													
                             $batfile="set projectLocation=F:\SeleniumAutomation_V1\ncd %projectLocation%\nF:\njava -cp %projectLocation%\\source\\3rdParty\\*;%projectLocation%\\class\\ org.testng.TestNG Companies\\$companyname\\$user_name\\$execution_name\TestNGExecutor.xml";                          
										
										if ( ! write_file($pathname.'\TriggerExecution.bat', $batfile, 'w+'))
                                                        {
                                                                echo 'Unable to write Batch the file';
                                                        }
                                                        else
                                                        {
                                                                //echo  $batfile;
                                                        }
						 $filename = $pathname.'\TriggerExecution.bat';
				
				  pclose(popen("start /B ". $filename, "r")); 
				  
		/****end actual code***/
		 
	 }
	
	 public function startExecution_process($type){
		 
					$companyname = $this->session->userdata('company_name');
					$companyname = str_replace(' ', '', $companyname);
					$user_name = $this->session->userdata('name');
					$user_name = str_replace(' ', '', $user_name);
					$execution_name=$this->input->post('execution_name');					
					$execution_name = str_replace(' ', '', $execution_name);
                    $pathname = 'F:/SeleniumAutomation_V1/Companies/'.$companyname.'/'.$user_name.'/'.$execution_name;                   
                    mkdir($pathname,0777);
		
		$maildata= $this->get_compnay_mail_setting();
		 
			foreach($maildata as $rows){
				$host_name= $rows['host_name'];
				$email= $rows['email'];
				$username= $rows['username'];
				$pass = strrev($rows['code']);
				$port= $rows['port'];
				$protocol= $rows['secuirity_protocol'];
				
			}
			
		$environment_id=$this->input->post('environment_id');
		$browser_id=$this->input->post('browser_id');
        $browser_name= $this->get_browser_name($browser_id);
		$failure_attempt=$this->input->post('failure_attempt');
		$no_of_category=$this->input->post('no_of_category');
		
		$env_name=$this->get_env_url($environment_id);
		
		/****code from exe*****/
						$body ="<div style='background-color: rgba(192, 255, 194, 0.45);
									border: 2px solid rgba(255, 0, 0, 0.28);
									border-radius: 12px;
									color: #181046;
									padding: 50px;
									padding-top: 30px;
									font-family: Tahoma;'>";		
						$body .= "<h3>Dear ".$this->session->userdata('name').",</h3>";
						$body .= "<h4>Execution Name:".$execution_name."</h4><h4>Environment Name:".$env_name."</h4>";
						
						$content =  "ExecutionName:".$execution_name."\nIsLogicalGroup:false\nEnvironmentName:".$env_name."\n";
						//$content .=  "IsLogicalGroup:false\n";

						$content .=  "BrowserName:".$browser_name."\nFailureAttempt:".$failure_attempt."\n";
						$body .=  "<h4>Browser Name:".$browser_name."</h4>";
						$count_selected="";
						$SelectedTestCases="";
						$SelectedTestCasesemail=" ";
						for($u=1;$u<=$no_of_category;$u++){
							
							$value=$this->input->post('category_check'.$u);
							$name=$this->input->post('category_check_name'.$u);
							$app_url =$this->input->post('app_url'.$u);
							$value_app = $name;
							$value_url = $app_url;
							if(!empty($value_app) && !empty($value_url)){
							$content .=$value_app ."=".$value_url."\n";
							}
							else{
								
							}
							$no_of_subcategory= $this->input->post('sub_category'.$value);
                                                       
   
								$count_selected += count($no_of_subcategory);
								for($i=0;$i<=count($no_of_subcategory);$i++)
								{
								 //$no_of_subcategory[$i] = isset($no_of_subcategory[$i]) ? $no_of_subcategory[$i] : '';
								 if(!empty($no_of_subcategory[$i])){
										$value_Expload= explode("___", $no_of_subcategory[$i]);
										
										$test_name= isset($value_Expload[2]) ? $value_Expload[2] : '';
										//$test_name= $value_Expload[2];
										$class_name= isset($value_Expload[1]) ? $value_Expload[1] : '';
										if(!empty($test_name) && !empty($class_name)){
										$SelectedTestCases =$SelectedTestCases.$test_name."~".$class_name.",";
										}else{ }
											if($test_name !=''){
													$SelectedTestCasesemail .=" - " .$test_name."<br>";
													
											}
								 }else { }
								//print_r($value_Expload);
								
								}  
								$value_app  += "";

							}

							$SelectedTestCasesemail .=' ';
							//$content .="SelectedTestCases:".$SelectedTestCases."\n";


							$body .=  "<h4>Selected Test Cases : </h4><h4> ".$SelectedTestCasesemail."</h4>";
							$body .=  "<h4>No. of Selected Test Cases : ".$count_selected."</h4>";


							 $addedDateTime=date("d-m-Y H:i:s");

							$content .="TRIGGEREDBY:".$this->session->userdata('name')."\n";
							$content .="TRIGGEREDWHEN:".$addedDateTime."\n";
							$content .="COMPANY:".$this->session->userdata('company_name')."\n";
							$content .="EMAIL:".$this->session->userdata('login_email_id')."\n";
							$body .=  "<h4>Triggered By : ".$this->session->userdata('name')."</h4>";
							$body .=  "<h4>Triggered At : ".$addedDateTime."</h4>";
							$body .=  "<h5>Thanks </h5>";
							$body .=  "<h6>Team Auto IT</h6></div>";

							$email_id= $this->session->userdata('login_email_id');
							$name = "Auto IT ";
							$subj = "Execution Triggered on ".$env_name."";

						if($host_name){

							if($this->smtpmailer($email_id, $username,$pass, $name, $subj, $body, $host_name,$port,$protocol)){
								$data_recordData['email'] =$this->session->userdata('login_email_id');                                                                
								$data_recordData['runname'] =$this->input->post('execution_name');
								$data_recordData['company_id'] =$this->session->userdata('login_company_id');
								$data_recordData['browser_id']=$browser_id;
								$data_recordData['environment_id']=$environment_id;
								$data_recordData['user_id']=$this->session->userdata('login_user_id');
								$data_recordData['execution_time'] =date("Y-m-d H:i:s");
								$data_recordData['status'] ='1';								
								$this->db->insert('email_log',$data_recordData);
								$runner_id = $this->db->insert_id();
								
							}else{
								$data_recordData['email'] =$this->session->userdata('login_email_id');                                                                
								$data_recordData['runname'] =$this->input->post('execution_name');
								$data_recordData['company_id'] =$this->session->userdata('login_company_id');
								$data_recordData['browser_id']=$browser_id;
								$data_recordData['environment_id']=$environment_id;
								$data_recordData['user_id']=$this->session->userdata('login_user_id');
								$data_recordData['execution_time'] =date("Y-m-d H:i:s");
								$data_recordData['status'] ='0';								
								$this->db->insert('email_log',$data_recordData);
								$runner_id = $this->db->insert_id();

							}


						}		
								$content.="runner_id:".$runner_id;
									$data = $content;
										if ( ! write_file($pathname.'\configuration.txt', $data, 'w+'))
										{
												echo 'Unable to write TXT the file';
										}
										else
										{
											   // echo 'File written!';
										}
                                                        
                             $content_new_xml = "";
							$content_new_xml .="<?xml version='1.0' encoding='UTF-8'?>\n
							<suite name='".$execution_name."' verbose='1' parallel='tests' thread-count='2'>\n
							<parameter name='CallerFilePath' value='Companies\\$companyname\\$user_name\\$execution_name\'/>\n
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
							</class>\n
							";
							}   
							}

							$content_new_xml .= "</classes>\n
							</test>\n
							</suite>";
                                                            
                                                        $TestNGPath = $content_new_xml;
                                                        if ( ! write_file($pathname.'\TestNGExecutor.xml', $TestNGPath, 'w+'))
                                                        {
                                                                echo 'Unable to write XML the file';
                                                        }
                                                        else
                                                        {
                                                               // echo $content_new_xml;
                                                        }
													
                             $batfile="set projectLocation=F:\SeleniumAutomation_V1\ncd %projectLocation%\nF:\njava -cp %projectLocation%\\source\\3rdParty\\*;%projectLocation%\\class\\ org.testng.TestNG Companies\\$companyname\\$user_name\\$execution_name\TestNGExecutor.xml";                          
										
										if ( ! write_file($pathname.'\TriggerExecution.bat', $batfile, 'w+'))
                                                        {
                                                                echo 'Unable to write Batch the file';
                                                        }
                                                        else
                                                        {
                                                                //echo  $batfile;
                                                        }
						 $filename = $pathname.'\TriggerExecution.bat';
				
				  pclose(popen("start /B ". $filename, "r")); 
				  
                                                      						
						
				
	}
	
	
	
	function execInBackground($cmd) { 
	
		exec ('c:\WINDOWS\system32\cmd.exe /c C:\xampp\htdocs\2017\TestApps\partnerIT\SeleniumAutomation_V1\TriggerExecution.bat');
		
	}
	/*******EXECUTION MODEL FUNCTION******/
	
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
                $company_id = $this->session->userdata('login_user_id');
		return $this->db->get_where('email_setting', array('company_id' => $company_id))->result_array();
       
    }
	function select_myprofile_info()
    {
        $company_id = $this->session->userdata('login_user_id');
		return $this->db->get_where('company', array('company_id' => $company_id))->result_array();
       
    }
	
	
	
	/******MAILING FUNCTION******/
	
	function smtpmailer($email_id,$username,$pass,$name,$sub,$body,$host_name="ssl://smtp.googlemail.com",$port="465",$protocol="smtp") {
	
        $config = array();
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'ssl://smtp.googlemail.com';
        $config['smtp_port'] = '465';
		//$config['smtp_user'] = "teamautoit@gmail.com";
		//$config['smtp_pass'] = "P@ssword1!";
		$config['smtp_user'] = $username;
		$config['smtp_pass'] = $pass;
		$config['mailtype'] = 'html';
        $config['charset'] = 'utf-8';
        $config['newline'] = "\r\n";
        $config['wordwrap'] = TRUE;

        $this->load->library('email');

        $this->email->initialize($config);
        $this->email->from($username, $name);
        $this->email->to($email_id);
        $this->email->subject($sub);
		$this->email->message($body);

        $this->email->send();	
	
    }
	
	
	
	
}