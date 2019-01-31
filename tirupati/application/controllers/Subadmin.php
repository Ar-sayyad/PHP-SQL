<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subadmin extends CI_Controller {
	public function __construct()  
	{
		parent::__construct();
                $this->load->model('tadmin_model');
                 $this->load->model('admin');
                $this->load->library('session');
                date_default_timezone_set("Asia/Kolkata");
                $this->load->library('form_validation');
                $this->load->helper(array('form','url','file'));		
	 
	}
	public function index()
	{
            if ($this->session->userdata('subadmin_login') == 1) {
                 $this->session->set_userdata('last_page', current_url());                  
                 $data['page_title'] = 'Dashboard'; 

                $vendor= $this->db->get('tbl_vendor')->result_array();
                 foreach($vendor as $v)
                {
                    $count=$this->admin->get_today_cnt($v['vendor_id']);
                    $int = (int)$count;
                    $maaindata="{ name:'".$v['vendor_name']."', y:".$int .", drilldown:"."'".$v['vendor_name']."' },";
                    $finaalMain=$finaalMain."\n".$maaindata;
                }     
                $data['maainseries']= $finaalMain;     
                 $this->load->view('subadmin/index',$data);
			
            }else{

                    $data['page_title'] = 'Login';
                    $this->load->view('subadmin/login',$data);
		}


	}       
        
        
        /*************VEHICLE OWNERS*********/
        
                public function vehicleOwners($task='',$vehicle_owner_id='')
                {
                    if ($this->session->userdata('subadmin_login') != 1) {
                        $this->session->set_userdata('last_page', current_url());
                        redirect(base_url());
                       }
                                        
                    if ($task == "delete") {
                        $where =array('vehicle_owner_id'=>$vehicle_owner_id);
                        $this->admin->delete_record('vehicle_owner',$where);
                        $this->session->set_flashdata('msg_ok', ('<i class="ti-check-box"></i> Record Removed Successfully.'));
                        redirect(base_url() .'Subadmin/vehicleOwners');
                    }
                    if ($task == "update") {
                       
                        $this->form_validation->set_rules('owner_name', 'Owner Name', 'required');
                        $this->form_validation->set_rules('owner_contact','Contact No','required');

                             if ($this->form_validation->run())
                            {
                                 $data=array( 	  
                                            'owner_full_name'=>ucwords(strtolower($this->input->post('owner_name'))),
                                            'contact_no'=>$this->input->post('owner_contact'),
                                            'Alternat_no'=>$this->input->post('alternat_contact'),
                                            'owner_address'=>$this->input->post('owner_address'),
                                            'Email_id'=>strtolower($this->input->post('owner_email')),
                                            'company_name'=>$this->input->post('company_name'),
                                            'business_site'=> strtolower($this->input->post('business_site')),
                                            'is_active'=>1
                                            );
                                             $where =array('vehicle_owner_id'=>$vehicle_owner_id);
                                            $details=$this->admin->records_update('vehicle_owner',$data,$where);
                                            $this->session->set_flashdata('msg_ok','<i class="ti-check-box"></i> Vehicle Owner Data Updated Successfully.');
                                            redirect(base_url().'Subadmin/vehicleOwners');		
                            }
                        else {
                            $this->session->set_flashdata('err_msg',validation_errors());
                            redirect(base_url().'Subadmin/vehicleOwners');
                        }
                    }
                    
                        $data['page_title']='Vehicle Owner';
                        $this->db->order_by("vehicle_owner_id","desc");
                        $data['vehicle_owner_info']=$this->admin->record_list('vehicle_owner');
                        $this->load->view('subadmin/vehicle-owners',$data);
                }
                
                 public function addVehicleOwner(){
                    $this->form_validation->set_rules('owner_name', 'Owner Name', 'required');
                    $this->form_validation->set_rules('owner_contact','Contact No','required|is_unique[vehicle_owner.contact_no]');
                
			 if ($this->form_validation->run())
			{
                             $data=array( 	  
	        			'owner_full_name'=>ucwords(strtolower($this->input->post('owner_name'))),
	        			'contact_no'=>$this->input->post('owner_contact'),
	        			'Alternat_no'=>$this->input->post('alternat_contact'),
	        			'owner_address'=>$this->input->post('owner_address'),
	        			'Email_id'=>strtolower($this->input->post('owner_email')),
                                        'company_name'=>$this->input->post('company_name'),
                                        'business_site'=> strtolower($this->input->post('business_site')),
	        			'is_active'=>1
	        			);
					$details=$this->admin->record_insert('vehicle_owner',$data);
					$this->session->set_flashdata('msg_ok','<i class="ti-check-box"></i> Vehicle Owner Added Successfully.');
					redirect(base_url().'Subadmin/vehicleOwners');		
			}
                    else {
                        $this->session->set_flashdata('err_msg',validation_errors());
                        redirect(base_url().'Subadmin/vehicleOwners');
                    }
        }
                                
        public function vehicles($task='',$vehicle_id='')
	{
            if ($this->session->userdata('subadmin_login') != 1) {
                        $this->session->set_userdata('last_page', current_url());
                        redirect(base_url());
                       }
                       
                if ($task == "addVehicle") 
               {
                   $this->form_validation->set_rules('vehicle_no', 'Vehicle No', 'required|is_unique[tbl_vehicle.vehicle_no]');
			 
			 if ($this->form_validation->run())
			{
                             $data=array( 	  
	        			'vehicle_no'=>strtoupper($this->input->post('vehicle_no')),
	        			'vehicle_owner_id'=>$this->input->post('vehicle_owner_id'),
	        			'description'=>$this->input->post('description'),
	        			'fuel_limit'=>$this->input->post('fuel_limit'),
	        			'is_active'=>1
	        			);					

					$details=$this->admin->record_insert('tbl_vehicle',$data);
					$this->session->set_flashdata('msg_ok','<i class="ti-check-box"></i> Vehicle Added Successfully.');
					redirect(base_url().'Subadmin/vehicles');	
			}
                    else {
                        $this->session->set_flashdata('err_msg',validation_errors());
                        redirect(base_url().'Subadmin/vehicles');
                    }                    
                 }
                 if($task == "editVehicle"){
                     $this->form_validation->set_rules('vehicle_no', 'Vehicle No', 'required');
			 if ($this->form_validation->run())
                            {
				
				$where =array('vehicle_id'=>$vehicle_id);
				
					$data=array( 	        			
	        			'vehicle_no'=>strtoupper($this->input->post('vehicle_no')),
	        			'vehicle_owner_id'=>$this->input->post('vehicle_owner_id'),
                                        'description'=>$this->input->post('description'),
                                        'fuel_limit'=>$this->input->post('fuel_limit'),	        			
	        			'is_active'=>1
	        			);

					$details=$this->admin->records_update('tbl_vehicle',$data,$where);
					$this->session->set_flashdata('msg_ok','<i class="ti-check-box"></i> Vehicle Updated Successfully.');
					redirect(base_url().'Subadmin/vehicles');		
                         }else{
                             $this->session->set_flashdata('err_msg',validation_errors());
                             redirect(base_url().'Subadmin/vehicles');
                         }
			
                 }
                 if ($task == "delete") {
                        $where =array('vehicle_id'=>$vehicle_id);
                        $this->admin->delete_record('tbl_vehicle',$where);
                        $this->session->set_flashdata('msg_ok', ('<i class="ti-check-box"></i> Record Removed Successfully.'));
                        redirect(base_url() .'Subadmin/vehicles');
                    }
                 
                $this->db->order_by("vehicle_id","desc");
                $data['vehicle_info']=$this->admin->record_list('tbl_vehicle');
		$data['page_title']='Vehicles';
		$this->load->view('subadmin/vehicles',$data);
	}
        
        
        
        public function drivers($task='',$driver_id='')
        {
            if ($this->session->userdata('subadmin_login') != 1) {
                        $this->session->set_userdata('last_page', current_url());
                        redirect(base_url());
                       }
                       
            if($task == 'addDriver')
                {
                    $this->form_validation->set_rules('drivername', 'Driver Name', 'required');
                    $this->form_validation->set_rules('driver_contact','Contact No','required|numeric|is_unique[tbl_driver.driver_contact]');
			 if ($this->form_validation->run())
			{
			$data=array('driver_name'=>ucwords(strtolower($this->input->post('drivername'))),
                                    'driver_contact'=>$this->input->post('driver_contact'),
                                    'alternat_contact'=>$this->input->post('alternat_contact'),
                                    'driver_address'=>$this->input->post('address'),
                                    'license'=>$this->input->post('license'),
                                    'is_active'=>1);				
                                        $details=$this->admin->record_insert('tbl_driver',$data);
					$this->session->set_flashdata('msg_ok','<i class="ti-check-box"></i> Driver Added Successfully.');
					redirect(base_url().'Subadmin/drivers');	
                        } else {
                            $this->session->set_flashdata('err_msg',validation_errors());
                             redirect(base_url().'Subadmin/drivers');
                        }
                }
                
                if($task == 'editDriver')
                {
                    $this->form_validation->set_rules('drivername', 'Driver Name', 'required');
                    $this->form_validation->set_rules('driver_contact','Contact No','required');
			 if ($this->form_validation->run())
			{
				$data=array(
					'driver_name'=>ucwords(strtolower($this->input->post('drivername'))),
	        			'driver_contact'=>$this->input->post('driver_contact'),
	        			'alternat_contact'=>$this->input->post('alternat_contact'),
	        			'driver_address'=>$this->input->post('address'),
	        			'license'=>$this->input->post('license'),	        			
	        			'is_active'=>1);
                                        $where =array('driver_id'=>$driver_id);
					$details=$this->admin->records_update('tbl_driver',$data,$where);
					$this->session->set_flashdata('msg_ok','<i class="ti-check-box"></i> Driver Updated Successfully.');
					redirect(base_url().'Subadmin/drivers');		
			 }else {
                            $this->session->set_flashdata('err_msg',validation_errors());
                             redirect(base_url().'Subadmin/drivers');
                        }
                }
                if ($task == "delete") {
                        $where =array('driver_id'=>$driver_id);
                        $this->admin->delete_record('tbl_driver',$where);
                        $this->session->set_flashdata('msg_ok', ('<i class="ti-check-box"></i> Record Removed Successfully.'));
                        redirect(base_url() .'Subadmin/drivers');
                    }
            
            $this->db->order_by("driver_id","desc");
            $data['driver_info']=$this->admin->record_list('tbl_driver');
            $data['page_title']='Drivers';
            $this->load->view('subadmin/drivers',$data);            
        }
        
        
        public function vendors($task='',$vendor_id='')
        {
            if ($this->session->userdata('subadmin_login') != 1) {
                        $this->session->set_userdata('last_page', current_url());
                        redirect(base_url());
                       }
                       
            if($task == 'addVendor'){
                         $this->form_validation->set_rules('vendor_name', 'Vendor Name', 'required');
			 $this->form_validation->set_rules('vendor_contact','Vendor Contact','required|is_unique[tbl_vendor.vendor_contact]');
			 $this->form_validation->set_rules('vendor_email', 'Vendor Email', 'required|valid_email');
                         $this->form_validation->set_rules('todays_rate', 'Vendor Fuel Rate', 'required');
			 $this->form_validation->set_rules('vendor_pass', 'Vendor Password', 'required');
			 $this->form_validation->set_rules('vendor_cpass', 'Vendor Confirm Password', 'required|matches[vendor_pass]');
			 $email=$this->input->post('vendor_email');
			 $password=$this->input->post('vendor_pass');
			
			 if ($this->form_validation->run())
			{
                             $ndate = date('Y-m-d');
                            $data=array( 	  
	        			'vendor_name'=>ucwords(strtolower($this->input->post('vendor_name'))),
	        			'vendor_address'=>$this->input->post('vendor_address'),
	        			'vendor_contact'=>$this->input->post('vendor_contact'),
	        			'vendor_alternate_contact'=>$this->input->post('vendor_alternate_contact'),
	        			'password'=>strrev(sha1(md5($this->input->post('vendor_pass')))),
	        			'vendor_email'=>strtolower($this->input->post('vendor_email')),
	        			'GST_NO'=>$this->input->post('GST_NO'),
                                        'todays_rate'=>round($this->input->post('todays_rate'),2),
                                        'rate_date'=>$ndate,    
	        			'is_active'=>1
	        			);
					$details=$this->admin->record_insert('tbl_vendor',$data);
					$findemail = $this->admin->Sendmail($email,$password);

					$this->session->set_flashdata('msg_ok','<i class="ti-check-box"></i> Vendor Added Successfully.');
					redirect(base_url().'Subadmin/vendors');		
			}else {
                            $this->session->set_flashdata('err_msg',validation_errors());
                             redirect(base_url().'Subadmin/vendors');
                        }
           }
             if($task == 'editVendor'){
                         $this->form_validation->set_rules('vendor_name', 'Vendor Name', 'required');
			 $this->form_validation->set_rules('vendor_contact','Vendor Contact','required');
			 if ($this->form_validation->run())
			{
                             $data=array(
					'vendor_name'=>ucwords(strtolower($this->input->post('vendor_name'))),
	        			'vendor_address'=>$this->input->post('vendor_address'),
	        			'vendor_contact'=>$this->input->post('vendor_contact'),
	        			'vendor_alternate_contact'=>$this->input->post('vendor_alternate_contact'),
	        			'vendor_email'=>strtolower($this->input->post('vendor_email')),
	        			'GST_NO'=>$this->input->post('GST_NO'));
                                
                                        $where =array('vendor_id'=>$vendor_id);
					$vendors=$this->admin->records_update('tbl_vendor',$data,$where);
					$this->session->set_flashdata('msg_ok','<i class="ti-check-box"></i> Vendor Updated Successfully.');
					redirect(base_url().'Subadmin/vendors');		
			}else {
                            $this->session->set_flashdata('err_msg',validation_errors());
                             redirect(base_url().'Subadmin/vendors');
                        }                 
             }
             if($task == 'editVendorRate'){
                         $this->form_validation->set_rules('vendor_name', 'Vendor Name', 'required');
			 $this->form_validation->set_rules('todays_rate','Fuel rate','required');
			 if ($this->form_validation->run())
			{
                              $ndate = date('Y-m-d');
                             $data=array(
                                 'todays_rate'=>round($this->input->post('todays_rate'),2),
                                 'rate_date'=>$ndate    
                                 );
                                
                                        $where =array('vendor_id'=>$vendor_id);
					$vendors=$this->admin->records_update('tbl_vendor',$data,$where);
					$this->session->set_flashdata('msg_ok','<i class="ti-check-box"></i> Vendor Rate Updated Successfully.');
					redirect(base_url().'Subadmin/vendors');		
			}else {
                            $this->session->set_flashdata('err_msg',validation_errors());
                             redirect(base_url().'Subadmin/vendors');
                        }                 
             }
             
             if($task == 'delete'){
                        $where =array('vendor_id'=>$vendor_id);
                        $this->admin->delete_record('tbl_vendor',$where);
                        $this->session->set_flashdata('msg_ok', ('<i class="ti-check-box"></i> Record Removed Successfully.'));
                        redirect(base_url() .'Subadmin/vendors');
             }
             
            $this->db->order_by("vendor_id","desc");
            $data['vendor_info']=$this->admin->record_list('tbl_vendor');
            $data['page_title']='Fuel Pumps';
            $this->load->view('subadmin/vendors',$data);
        }
        
        
	public function supervisors($task='',$supervisor_id='')
        {
            if ($this->session->userdata('subadmin_login') != 1) {
                        $this->session->set_userdata('last_page', current_url());
                        redirect(base_url());
                       }
                       
            if($task == 'addSupervisor'){
                        $this->form_validation->set_rules('supervisor_name', 'Supervisor Name', 'required');
			$this->form_validation->set_rules('supervisor_email', 'Supervisor Email', 'required|valid_email');
			$this->form_validation->set_rules('pass', 'Password', 'required');
			$this->form_validation->set_rules('cpass', 'Confirm Password', 'required|matches[pass]');
			$this->form_validation->set_rules('supervisor_contact', 'Supervisor Contact', 'required|numeric|is_unique[tbl_supervisor.supervisor_contact]'); 
			
			 if ($this->form_validation->run())
			{
                                $data=array( 	  
	        			'supervisor_name'=>ucwords(strtolower($this->input->post('supervisor_name'))),
	        			'supervisor_contact'=>$this->input->post('supervisor_contact'),
	        			'supervisor_alternet_contact'=>$this->input->post('supervisor_alternet_contact'),
	        			'supervisor_email'=>strtolower($this->input->post('supervisor_email')),
	        			'supervisor_address'=>$this->input->post('supervisor_address'),
	        			'password'=>strrev(sha1(md5($this->input->post('pass')))),
	        			'is_active'=>1
	        			);
					
                                        $email=$this->input->post('supervisor_email');
                                        $password=$this->input->post('pass');			
					$details=$this->admin->record_insert('tbl_supervisor',$data);
					 $findemail = $this->admin->Sendmail($email,$password); 
					$this->session->set_flashdata('msg_ok','<i class="ti-check-box"></i> Supervisor Added Successfully.');
					redirect(base_url().'Subadmin/supervisors');		
			}else {
                            $this->session->set_flashdata('err_msg',validation_errors());
                             redirect(base_url().'Subadmin/supervisors');
                        } 
             }
             
             if($task == 'editSupervisor'){
                 $this->form_validation->set_rules('supervisor_name', 'Supervisor Name', 'required');
			$this->form_validation->set_rules('supervisor_email', 'Supervisor Email', 'required|valid_email');
			$this->form_validation->set_rules('supervisor_contact', 'Supervisor Contact', 'required|numeric');
			 if ($this->form_validation->run())
			{
				$data=array(
					'supervisor_name'=>ucwords(strtolower($this->input->post('supervisor_name'))),
	        			'supervisor_contact'=>$this->input->post('supervisor_contact'),
	        			'supervisor_alternet_contact'=>$this->input->post('supervisor_alternet_contact'),
	        			'supervisor_email'=>strtolower($this->input->post('supervisor_email')),
	        			'supervisor_address'=>$this->input->post('supervisor_address'));
                                
                                        $where =array('supervisor_id'=>$supervisor_id);
					$vendors=$this->admin->records_update('tbl_supervisor',$data,$where);
					$this->session->set_flashdata('msg_ok','<i class="ti-check-box"></i> Supervisor Updated Successfully.');
					redirect(base_url().'Subadmin/supervisors');		
			}else {
                            $this->session->set_flashdata('err_msg',validation_errors());
                             redirect(base_url().'Subadmin/supervisors');
                        } 
             }
             
            if($task == 'delete'){
                        $where =array('supervisor_id'=>$supervisor_id);
                        $this->admin->delete_record('tbl_supervisor',$where);
                        $this->session->set_flashdata('msg_ok', ('<i class="ti-check-box"></i> Record Removed Successfully.'));
                        redirect(base_url() .'Subadmin/supervisors');
             }
             
            $this->db->order_by("supervisor_id","desc");
            $data['supervisor_info']=$this->admin->record_list('tbl_supervisor');
            $data['page_title']='Supervisors';
            $this->load->view('subadmin/supervisors',$data);
        }
        
        
        public function subadmin($task='',$subadmin_id='')
        {
            if ($this->session->userdata('subadmin_login') != 1) {
                        $this->session->set_userdata('last_page', current_url());
                        redirect(base_url());
                       }
                       
            if($task == 'addSubadmin'){
                        $this->form_validation->set_rules('subadmin_name', 'Subadmin Name', 'required');
			$this->form_validation->set_rules('subadmin_email','Subadmin Email ID','required|valid_email|is_unique[tbl_subadmin.subadmin_email]');
			$this->form_validation->set_rules('subadmin_contact', 'Contact No', 'required|numeric');
                        $this->form_validation->set_rules('password', 'Password', 'required');
                        $this->form_validation->set_rules('cpass', 'Confirm Password', 'required|matches[password]');
			
			 if ($this->form_validation->run())
			{
                                $data=array( 	  
	        			'subadmin_name'=>ucwords(strtolower($this->input->post('subadmin_name'))),
	        			'subadmin_email'=>strtolower($this->input->post('subadmin_email')),
	        			'address'=>$this->input->post('address'),
	        			'subadmin_contact'=>$this->input->post('subadmin_contact'),
	        			'subadmin_alt_contact'=>$this->input->post('subadmin_alt_contact'),
	        			'password'=>strrev(sha1(md5($this->input->post('password')))),
	        			'is_active'=>1
	        			);
					//echo"<pre>";print_r($data);die;
                                         $email=strtolower($this->input->post('subadmin_email'));
                                         $password=$this->input->post('password');
					$details=$this->admin->record_insert('tbl_subadmin',$data);
					$findemail = $this->admin->Sendmail($email,$password);

					$this->session->set_flashdata('msg_ok','<i class="ti-check-box"></i> Subadmin Added Successfully.');
					redirect(base_url().'Subadmin/subadmin');		
			}else {
                            $this->session->set_flashdata('err_msg',validation_errors());
                             redirect(base_url().'Subadmin/subadmin');
                        }
            }
            
             if($task == 'editSubadmin'){
                        $this->form_validation->set_rules('subadmin_name', 'Subadmin Name', 'required');
			 $this->form_validation->set_rules('subadmin_email','Subadmin Email ID','required|valid_email');
                         $this->form_validation->set_rules('subadmin_contact', 'Contact No', 'required|numeric');
			 if ($this->form_validation->run())
			{
                            $data=array(
					'subadmin_name'=>ucwords(strtolower($this->input->post('subadmin_name'))),
	        			'subadmin_email'=>strtolower($this->input->post('subadmin_email')),
	        			'address'=>$this->input->post('address'),
	        			'subadmin_contact'=>$this->input->post('subadmin_contact'),
	        			'subadmin_alt_contact'=>$this->input->post('subadmin_alt_contact'),
	        			'is_active'=>1);
                            
                                        $where =array('subadmin_id'=>$subadmin_id);
					$subadmin=$this->admin->records_update('tbl_subadmin',$data,$where);
					$this->session->set_flashdata('msg_ok','<i class="ti-check-box"></i> Subadmin Updated Successfully.');
					redirect(base_url().'Subadmin/subadmin');		
			}else {
                            $this->session->set_flashdata('err_msg',validation_errors());
                             redirect(base_url().'Subadmin/subadmin');
                        }
             }
            
             if($task == 'delete'){
                        $where =array('subadmin_id'=>$subadmin_id);
                        $this->admin->delete_record('tbl_subadmin',$where);
                        $this->session->set_flashdata('msg_ok', ('<i class="ti-check-box"></i> Record Removed Successfully.'));
                        redirect(base_url() .'Subadmin/subadmin');
             }
            $this->db->order_by("subadmin_id","desc");
            $data['subadmin_info']=$this->admin->record_list('tbl_subadmin');
            $data['page_title']='Subadmin';
            $this->load->view('subadmin/subadmin',$data);
        }
        
        
        public function assignedDrivers($task = '',$assign_id = '',$is_active = '')
        {
            if ($this->session->userdata('subadmin_login') != 1) {
                        $this->session->set_userdata('last_page', current_url());
                        redirect(base_url(). 'Subadmin');
                       }
                       
            if($task == 'assignDriverToVehicle'){
                $this->form_validation->set_rules('vehicle_id', 'Vehicle No', 'required');
		$this->form_validation->set_rules('driver_id', 'Driver Name', 'required');
			
		 if ($this->form_validation->run())
			{
                            $data=array( 	  
	        			'vehicle_id'=>$this->input->post('vehicle_id'),
	        			'driver_id'=>$this->input->post('driver_id'),
	        			'is_active'=>1);
				
					$details=$this->admin->record_insert('tbl_assign',$data);
					$this->session->set_flashdata('msg_ok','<i class="ti-check-box"></i> Driver Assigned to Vehicle Successfully.');
					redirect(base_url().'Subadmin/assignedDrivers');		
			}else {
                            $this->session->set_flashdata('err_msg',validation_errors());
                             redirect(base_url().'Subadmin/assignedDrivers');
                        }
            }
            if($task == 'delete'){
                        $where =array('assign_id'=>$assign_id);
                        $this->admin->delete_record('tbl_assign',$where);
                        $this->session->set_flashdata('msg_ok', ('<i class="ti-check-box"></i> Record Release Successfully.'));
                        redirect(base_url() .'Subadmin/assignedDrivers');
             }
             
             if($task == 'block'){
             		$data=array('is_active'=>$is_active);	        			
                        $where =array('assign_id'=>$assign_id);
                        $subadmin=$this->admin->records_update('tbl_assign',$data,$where);
                        //$this->admin->delete_record('tbl_assign',$where);
                        $this->session->set_flashdata('msg_ok', ('<i class="ti-check-box"></i> Vehicle Status Updated Successfully.'));
                        redirect(base_url() .'Subadmin/assignedDrivers');
             }
             if($task == 'reassign'){
             		$data=array('block'=>$is_active);	        			
                        $where =array('assign_id'=>$assign_id);
                        $subadmin=$this->admin->records_update('tbl_assign',$data,$where);
                        $this->session->set_flashdata('msg_ok', ('<i class="ti-check-box"></i> Vehicle Status Updated Successfully.'));
                        redirect(base_url() .'Subadmin/assignedDrivers');
             }
                
                
		$this->db->select('tbl_assign.*,tbl_vehicle.vehicle_no,tbl_driver.driver_name,tbl_driver.driver_contact');
		$this->db->join('tbl_vehicle','tbl_vehicle.vehicle_id = tbl_assign.vehicle_id');
		$this->db->join('tbl_driver','tbl_driver.driver_id = tbl_assign.driver_id');
		$this->db->order_by('assign_id','desc');
            $data['assignedDrivers_info']=$this->admin->record_list('tbl_assign');
            $data['page_title']='Assigned Driver to Vehicle';
            $this->load->view('subadmin/assignedDrivertoVehicle',$data);
        }
        
        
        
        public function vehiclestoFuel($task = '',$fuel_mgt_id = '')
        {
            if ($this->session->userdata('subadmin_login') != 1) {
                        $this->session->set_userdata('last_page', current_url());
                        redirect(base_url());
                       }
              if($task == 'delete'){
                        $where =array('fuel_mgt_id'=>$fuel_mgt_id);
                        $this->admin->delete_record('fuel_mgt',$where);
                        $this->session->set_flashdata('msg_ok', ('<i class="ti-check-box"></i> Record Deleted Successfully.'));
                        redirect(base_url() .'Subadmin/vehiclestoFuel');
             }         
             
                $this->db->select('fuel_mgt.*,tbl_vendor.vendor_name,tbl_vendor.vendor_contact,tbl_supervisor.supervisor_name,tbl_supervisor.supervisor_contact,tbl_vehicle.vehicle_no,tbl_driver.driver_name,tbl_driver.driver_contact');
		 $this->db->join('tbl_vendor','tbl_vendor.vendor_id=fuel_mgt.vendor_id');
		 $this->db->join('tbl_supervisor','tbl_supervisor.supervisor_id=fuel_mgt.supervisor_id');		 
		 $this->db->join('tbl_vehicle','tbl_vehicle.vehicle_id=fuel_mgt.vehicle_id');
		 $this->db->join('tbl_driver','tbl_driver.driver_id=fuel_mgt.driver_id');
		 //$this->db->join('otp','otp.fuel_mgt_id=fuel_mgt.fuel_mgt_id');
            $this->db->order_by("fuel_mgt_id","desc");
             $this->db->where("status",0);
            $data['fuel_mgt_info']=$this->admin->record_list('fuel_mgt');
            $data['page_title']='Assigned Vehicles to Fuel';
            $this->load->view('subadmin/assignedVehiclestoFuel',$data);
        }
        
        
        
        public function fuelReceipts()
        {
            if ($this->session->userdata('subadmin_login') != 1) {
                        $this->session->set_userdata('last_page', current_url());
                        redirect(base_url());
                       }
                       
                $this->db->select('fuel_receipt.*,tbl_vendor.vendor_name,tbl_vendor.vendor_contact,tbl_supervisor.supervisor_name,tbl_supervisor.supervisor_contact,fuel_mgt.*,tbl_vehicle.vehicle_no,tbl_driver.driver_name,tbl_driver.driver_contact');
		$this->db->join('tbl_vendor','tbl_vendor.vendor_id=fuel_receipt.vendor_id');
		$this->db->join('tbl_supervisor','tbl_supervisor.supervisor_id=fuel_receipt.supervisor_id');
		$this->db->join('fuel_mgt','fuel_mgt.fuel_mgt_id=fuel_receipt.fuel_mgt_id');
		$this->db->join('tbl_vehicle','tbl_vehicle.vehicle_id=fuel_mgt.vehicle_id');
		$this->db->join('tbl_driver','tbl_driver.driver_id=fuel_mgt.driver_id');
            $this->db->order_by("fuel_receipt_id","desc");
            $data['fuel_Receipt_info']=$this->admin->record_list('fuel_receipt');
            $data['page_title']='Fuel Receipts';
            $this->load->view('subadmin/fuelReceipts',$data);
        }
        
        public function fuelReceiptByDate($task='',$startdate='',$enddate='')
        {
            if ($this->session->userdata('subadmin_login') != 1) {
                        $this->session->set_userdata('last_page', current_url());
                        redirect(base_url());
                       }
                                              
                $this->db->select('fuel_receipt.*,tbl_vendor.vendor_name,tbl_vendor.vendor_contact,tbl_supervisor.supervisor_name,tbl_supervisor.supervisor_contact,fuel_mgt.*,tbl_vehicle.vehicle_no,tbl_driver.driver_name,tbl_driver.driver_contact');
		$this->db->join('tbl_vendor','tbl_vendor.vendor_id=fuel_receipt.vendor_id');
		$this->db->join('tbl_supervisor','tbl_supervisor.supervisor_id=fuel_receipt.supervisor_id');
		$this->db->join('fuel_mgt','fuel_mgt.fuel_mgt_id=fuel_receipt.fuel_mgt_id');
		$this->db->join('tbl_vehicle','tbl_vehicle.vehicle_id=fuel_mgt.vehicle_id');
		$this->db->join('tbl_driver','tbl_driver.driver_id=fuel_mgt.driver_id');
            $this->db->order_by("fuel_receipt_id","desc");
            $data['fuel_Receipt_info']=$this->admin->record_list('fuel_receipt');
            $data['page_title']='Fuel Receipts By Date';
            $this->load->view('subadmin/fuelReceiptsByDate',$data);
        }
        public function filterfuelReceiptByDate()
        {
            if ($this->session->userdata('subadmin_login') != 1) {
                        $this->session->set_userdata('last_page', current_url());
                        redirect(base_url());
                       }
                $this->form_validation->set_rules('fromdate','Start Date','required');
		$this->form_validation->set_rules('todate', 'From Date', 'required');
                if ($this->form_validation->run())
               {
                    $fromdate  = $this->input->post('fromdate');
                    $todate = $this->input->post('todate');
                    
                       $this->db->select('fuel_receipt.*,tbl_vendor.vendor_name,tbl_vendor.vendor_contact,tbl_supervisor.supervisor_name,tbl_supervisor.supervisor_contact,fuel_mgt.*,tbl_vehicle.vehicle_no,tbl_driver.driver_name,tbl_driver.driver_contact');
		$this->db->join('tbl_vendor','tbl_vendor.vendor_id=fuel_receipt.vendor_id');
		$this->db->join('tbl_supervisor','tbl_supervisor.supervisor_id=fuel_receipt.supervisor_id');
		$this->db->join('fuel_mgt','fuel_mgt.fuel_mgt_id=fuel_receipt.fuel_mgt_id');
		$this->db->join('tbl_vehicle','tbl_vehicle.vehicle_id=fuel_mgt.vehicle_id');
		$this->db->join('tbl_driver','tbl_driver.driver_id=fuel_mgt.driver_id');
                $this->db->where('fuel_receipt.createdAt >=', $fromdate);
                $this->db->where('fuel_receipt.createdAt <=', $todate);        
            $this->db->order_by("fuel_receipt_id","desc");
            $data['fuel_Receipt_info']=$this->admin->record_list('fuel_receipt');
            $data['page_title']='Fuel Receipts By Date';
            $this->load->view('subadmin/filterfuelReceiptsByDate',$data);
                    
               }
               else
                {
                     $this->session->set_flashdata('err_msg',validation_errors());
                     redirect(base_url().'Subadmin/fuelReceiptByDate');
                }      
            
        }
        
        public function profile($task = '',$subadmin_id = '')
        {
            if ($this->session->userdata('subadmin_login') != 1) {
                        $this->session->set_userdata('last_page', current_url());
                        redirect(base_url());
                       }
                       
            if($task == 'updateImage'){
                if($_FILES['subadmin']['name']!= ""){
                      $img_name='subadmin';
                      $img_path='subadmin';
                      $old_img=$this->input->post('old_admin_profile');
                      $profile=$this->admin->upload_image($img_name,$img_path,$old_img);  
                }
                        if($profile)
                        {
                            $data=array('profile_pic'=>$profile);                            
                                $where =array('subadmin_id'=>$subadmin_id);
                                $subadmin=$this->admin->records_update('tbl_subadmin',$data,$where);
                                $this->session->set_userdata('log_image', $profile);
                                $this->session->set_flashdata('msg_ok','<i class="ti-check-box"></i> Profile Image Updated Successfully.');
                                redirect(base_url().'Subadmin/profile');

                        }
                        else
                        {
                                    $this->session->set_flashdata('err_msg',$this->upload->display_errors());
                                    redirect(base_url() .'Subadmin/profile');

                        }
            }
            
            if($task == 'updateAdminProfile'){
                        $this->form_validation->set_rules('subadmin_name', 'Admin Name', 'required');
			$this->form_validation->set_rules('subadmin_email','Admin Email ID','required|valid_email');
			$this->form_validation->set_rules('subadmin_contact', 'Contact No', 'required|numeric');
                         if ($this->form_validation->run())
			{
                            $data=array(
					'subadmin_name'=>ucwords(strtolower($this->input->post('subadmin_name'))),
	        			'subadmin_email'=>strtolower($this->input->post('subadmin_email')),
	        			'subadmin_contact'=>$this->input->post('subadmin_contact'),
	        			'subadmin_alt_contact'=>$this->input->post('subadmin_alt_contact'),
	        			'DOB'=>$this->input->post('DOB'),
                                        'gender'=>$this->input->post('gender'),
                                        'city'=>$this->input->post('city'),
                                        'address'=>$this->input->post('address'),
                                        'pincode'=>$this->input->post('pincode'),
                                        'website'=>$this->input->post('website'),
                                        'skype_id'=>$this->input->post('skype_id'),
	        			'is_active'=>1);
                            
                                        $where =array('subadmin_id'=>$subadmin_id);
					$subadmin=$this->admin->records_update('tbl_subadmin',$data,$where);
					$this->session->set_flashdata('msg_ok','<i class="ti-check-box"></i> Admin Profile Updated Successfully.');
					redirect(base_url().'Subadmin/profile');		
			}else {
                            $this->session->set_flashdata('err_msg',validation_errors());
                             redirect(base_url().'Subadmin/profile');
                        }
            }
            
            if($task =='updateAdminPassword'){
                
                $this->form_validation->set_rules('old_password', 'Old Password', 'required');
                $this->form_validation->set_rules('password', 'Password', 'required');
                $this->form_validation->set_rules('confirm', 'Password Confirmation', 'required|matches[password]');

		if ($this->form_validation->run() == FALSE)
                {
                       $this->session->set_flashdata('err_msg', validation_errors());
                        redirect(base_url() . 'Subadmin/profile');
                }
                else
                {
                    $table = "tbl_subadmin";
                    $where =array('subadmin_id'=>$subadmin_id);
                    $query = $this->tadmin_model->checkOldPassword($this->input->post('old_password'),$table,$where);

                            if($query)
                                    {
                                      $data=array('password'=> strrev(sha1(md5($this->input->post('password')))));
                                            $where =array('subadmin_id'=>$subadmin_id);
                                            $subadmin=$this->admin->records_update('tbl_subadmin',$data,$where);
                                            $this->session->sess_destroy();
                                            $this->session->set_flashdata('msg_ok', ('Password Updated Successfully'));
                                            redirect(base_url() . 'Subadmin/profile');
                                    }
                                    else
                                    {
                                         $this->session->set_flashdata('err_msg', 'Please Enter the correct password');
                                            redirect(base_url() . 'Subadmin/profile');
                                    }

				 
		}
                
            }
           $subadmin_id = $this->session->userdata('log_admin_id');
           
            $where =array('subadmin_id'=> $subadmin_id );
            $data['subadmin_info']=$this->admin->record_list('tbl_subadmin',$where);
            $data['page_title']='Profile Setting';
            $this->load->view('subadmin/myprofile',$data);
        }
        
        
        public function login()
        {
            if ($this->session->userdata('subadmin_login') == 1) {
                 $this->session->set_userdata('last_page', current_url());                 
                 redirect(base_url());
			
            }else{
                    $data['page_title'] = 'Login';
                    $this->load->view('subadmin/login',$data);
		}
        }
        
        
        public function logout()
	{
		$this->session->sess_destroy();	
		redirect(base_url());
	}
        
        
        /******POPUP MODEL******/
        
        public function popup($account_type = '', $page_name = '', $param2 = '')
	{
                //$account_type               =	$this->session->userdata('login_type');
		$page_data['param2']		=	$param2;		
		//echo "hello";
		$this->load->view($account_type.'/'.$page_name,$page_data);		
	}
        
        /*********END POPUP MODEL*********/        
        
        
        //Validating login from ajax request
        function validateLogin() {
             $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('password', 'Password', 'required');
            if ($this->form_validation->run() == FALSE)
                     {
                            echo validation_errors();
                    }
                    else
                     {
                            $email= $this->input->post('email');
                            $password = $this->input->post('password');

                            $credential = array('email' => $email, 'password' => $password);
                            echo $this->tadmin_model->validate_login_info($email,$password);
                    }
                
                            
        }

}
