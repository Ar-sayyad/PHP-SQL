<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vendor extends CI_Controller {
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
            if ($this->session->userdata('vendor_login') == 1) {
                 $this->session->set_userdata('last_page', current_url());                  
                 $data['page_title'] = 'Dashboard'; 
                 // $vendor= $this->db->get('tbl_vendor')->result_array();
//                 foreach($vendor as $v)
//                {
//                    $count=$this->admin->get_today_cnt($v['vendor_id']);
//                    $int = (int)$count;
//                    $maaindata="{ name:'".$v['vendor_name']."', y:".$int .", drilldown:"."'".$v['vendor_name']."' },";
//                    $finaalMain=$finaalMain."\n".$maaindata;
//                }     
//                $data['maainseries']= $finaalMain;     
                 $this->load->view('vendors/index',$data);
			
            }else{

                    $data['page_title'] = 'Login';
                    $this->load->view('vendors/login',$data);
		}


	}       
        
        
        /*************VEHICLE OWNERS*********/
        
                public function fuelFillers($task='',$filler_boy_id='')
                {
                    if ($this->session->userdata('vendor_login') != 1) {
                        $this->session->set_userdata('last_page', current_url());
                        redirect(base_url());
                       }
                                  
                      if ($task == "addFiller") {
                        $this->form_validation->set_rules('fillerboy_name', 'Filler Name', 'required');
                        $this->form_validation->set_rules('filler_contact','Contact No','required|is_unique[filler_boy.filler_contact]');
                        $this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->set_rules('confirm', 'Confirm Password', 'required|matches[password]');
			 
                
			 if ($this->form_validation->run())
			{
                             $vendor_id = $this->session->userdata('log_admin_id');
                             $data=array( 	  
	        			'fillerboy_name'=>ucwords(strtolower($this->input->post('fillerboy_name'))),
	        			'filler_contact'=>$this->input->post('filler_contact'),
	        			'password'=>strrev(sha1(md5($this->input->post('password')))),
                                        'vendor_id'=>$vendor_id,
	        			'active_status'=>1
	        			);
					$details=$this->admin->record_insert('filler_boy',$data);
					$this->session->set_flashdata('msg_ok','<i class="ti-check-box"></i> Fuel Filler Added Successfully.');
					redirect(base_url() .'Vendor/fuelFillers');		
			}
                    else {
                        $this->session->set_flashdata('err_msg',validation_errors());
                        redirect(base_url() .'Vendor/fuelFillers');
                    }
        }
                    if ($task == "delete") {
                        $where =array('filler_boy_id'=>$filler_boy_id);
                        $this->admin->delete_record('filler_boy',$where);
                        $this->session->set_flashdata('msg_ok', ('<i class="ti-check-box"></i> Record Removed Successfully.'));
                        redirect(base_url() .'Vendor/fuelFillers');
                    }
                    if ($task == "update") {
                       
                        $this->form_validation->set_rules('fillerboy_name', 'Filler Name', 'required');
                        $this->form_validation->set_rules('filler_contact','Contact No','required');

                             if ($this->form_validation->run())
                            {
                                 
                                 $data=array( 	  
                                            'fillerboy_name'=>ucwords(strtolower($this->input->post('fillerboy_name'))),
                                            'filler_contact'=>$this->input->post('filler_contact'),
                                            'address'=>$this->input->post('address'),
                                            'active_status'=>1
                                            );
                                             $where =array('filler_boy_id'=>$filler_boy_id);
                                            $details=$this->admin->records_update('filler_boy',$data,$where);
                                            $this->session->set_flashdata('msg_ok','<i class="ti-check-box"></i> Fuel Fillers Data Updated Successfully.');
                                            redirect(base_url() .'Vendor/fuelFillers');		
                            }
                        else {
                            $this->session->set_flashdata('err_msg',validation_errors());
                            redirect(base_url() .'Vendor/fuelFillers');
                        }
                    }
                    
                        $data['page_title']='Fuel Fillers';
                        $this->db->order_by("filler_boy_id","desc");
                        $data['filler_boy_info']=$this->admin->record_list('filler_boy');
                        $this->load->view('vendors/fuel_fillers',$data);
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
					redirect(base_url() .'Vendor/vehicleOwners');		
			}
                    else {
                        $this->session->set_flashdata('err_msg',validation_errors());
                        redirect(base_url() .'Vendor/vehicleOwners');
                    }
        }
                                
        public function vehicles($task='',$vehicle_id='')
	{
            if ($this->session->userdata('vendor_login') != 1) {
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
					redirect(base_url() .'Vendor/vehicles');	
			}
                    else {
                        $this->session->set_flashdata('err_msg',validation_errors());
                        redirect(base_url() .'Vendor/vehicles');
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
					redirect(base_url() .'Vendor/vehicles');		
                         }else{
                             $this->session->set_flashdata('err_msg',validation_errors());
                             redirect(base_url() .'Vendor/vehicles');
                         }
			
                 }
                 if ($task == "delete") {
                        $where =array('vehicle_id'=>$vehicle_id);
                        $this->admin->delete_record('tbl_vehicle',$where);
                        $this->session->set_flashdata('msg_ok', ('<i class="ti-check-box"></i> Record Removed Successfully.'));
                        redirect(base_url() .'Vendor/vehicles');
                    }
                 
                $this->db->order_by("vehicle_id","desc");
                $data['vehicle_info']=$this->admin->record_list('tbl_vehicle');
		$data['page_title']='Vehicles';
		$this->load->view('vendors/vehicles',$data);
	}
        
        
        
        public function drivers($task='',$driver_id='')
        {
            if ($this->session->userdata('vendor_login') != 1) {
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
					redirect(base_url() .'Vendor/drivers');	
                        } else {
                            $this->session->set_flashdata('err_msg',validation_errors());
                             redirect(base_url() .'Vendor/drivers');
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
					redirect(base_url() .'Vendor/drivers');		
			 }else {
                            $this->session->set_flashdata('err_msg',validation_errors());
                             redirect(base_url() .'Vendor/drivers');
                        }
                }
                if ($task == "delete") {
                        $where =array('driver_id'=>$driver_id);
                        $this->admin->delete_record('tbl_driver',$where);
                        $this->session->set_flashdata('msg_ok', ('<i class="ti-check-box"></i> Record Removed Successfully.'));
                        redirect(base_url() .'Vendor/drivers');
                    }
            
            $this->db->order_by("driver_id","desc");
            $data['driver_info']=$this->admin->record_list('tbl_driver');
            $data['page_title']='Drivers';
            $this->load->view('vendors/drivers',$data);            
        }
        
        
        public function vendors($task='',$vendor_id='')
        {
            if ($this->session->userdata('vendor_login') != 1) {
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
					redirect(base_url() .'Vendor/vendors');		
			}else {
                            $this->session->set_flashdata('err_msg',validation_errors());
                             redirect(base_url() .'Vendor/vendors');
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
					redirect(base_url() .'Vendor/vendors');		
			}else {
                            $this->session->set_flashdata('err_msg',validation_errors());
                             redirect(base_url() .'Vendor/vendors');
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
					redirect(base_url() .'Vendor');		
			}else {
                            $this->session->set_flashdata('err_msg',validation_errors());
                             redirect(base_url() .'Vendor');
                        }                 
             }
             
             if($task == 'delete'){
                        $where =array('vendor_id'=>$vendor_id);
                        $this->admin->delete_record('tbl_vendor',$where);
                        $this->session->set_flashdata('msg_ok', ('<i class="ti-check-box"></i> Record Removed Successfully.'));
                        redirect(base_url() .'Vendor/vendors');
             }
             
            $this->db->order_by("vendor_id","desc");
            $data['vendor_info']=$this->admin->record_list('tbl_vendor');
            $data['page_title']='Fuel Pumps';
            $this->load->view('vendors/vendors',$data);
        }
        
        
	public function supervisors($task='',$supervisor_id='')
        {
            if ($this->session->userdata('vendor_login') != 1) {
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
					redirect(base_url() .'Vendor/supervisors');		
			}else {
                            $this->session->set_flashdata('err_msg',validation_errors());
                             redirect(base_url() .'Vendor/supervisors');
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
					redirect(base_url() .'Vendor/supervisors');		
			}else {
                            $this->session->set_flashdata('err_msg',validation_errors());
                             redirect(base_url() .'Vendor/supervisors');
                        } 
             }
             
            if($task == 'delete'){
                        $where =array('supervisor_id'=>$supervisor_id);
                        $this->admin->delete_record('tbl_supervisor',$where);
                        $this->session->set_flashdata('msg_ok', ('<i class="ti-check-box"></i> Record Removed Successfully.'));
                        redirect(base_url() .'Vendor/supervisors');
             }
             
            $this->db->order_by("supervisor_id","desc");
            $data['supervisor_info']=$this->admin->record_list('tbl_supervisor');
            $data['page_title']='Supervisors';
            $this->load->view('vendors/supervisors',$data);
        }
        
       
        public function assignedDrivers($task = '',$assign_id = '',$is_active = '')
        {
            if ($this->session->userdata('vendor_login') != 1) {
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
					redirect(base_url() .'Vendor/assignedDrivers');		
			}else {
                            $this->session->set_flashdata('err_msg',validation_errors());
                             redirect(base_url() .'Vendor/assignedDrivers');
                        }
            }
            if($task == 'delete'){
                        $where =array('assign_id'=>$assign_id);
                        $this->admin->delete_record('tbl_assign',$where);
                        $this->session->set_flashdata('msg_ok', ('<i class="ti-check-box"></i> Record Release Successfully.'));
                        redirect(base_url() .'Vendor/assignedDrivers');
             }
             
             if($task == 'block'){
             		$data=array('is_active'=>$is_active);	        			
                        $where =array('assign_id'=>$assign_id);
                        $vendors=$this->admin->records_update('tbl_assign',$data,$where);
                        //$this->admin->delete_record('tbl_assign',$where);
                        $this->session->set_flashdata('msg_ok', ('<i class="ti-check-box"></i> Vehicle Status Updated Successfully.'));
                        redirect(base_url() .'Vendor/assignedDrivers');
             }
             if($task == 'reassign'){
             		$data=array('block'=>$is_active);	        			
                        $where =array('assign_id'=>$assign_id);
                        $vendors=$this->admin->records_update('tbl_assign',$data,$where);
                        $this->session->set_flashdata('msg_ok', ('<i class="ti-check-box"></i> Vehicle Status Updated Successfully.'));
                        redirect(base_url() .'Vendor/assignedDrivers');
             }
                
                
		$this->db->select('tbl_assign.*,tbl_vehicle.vehicle_no,tbl_driver.driver_name,tbl_driver.driver_contact');
		$this->db->join('tbl_vehicle','tbl_vehicle.vehicle_id = tbl_assign.vehicle_id');
		$this->db->join('tbl_driver','tbl_driver.driver_id = tbl_assign.driver_id');
		$this->db->order_by('assign_id','desc');
            $data['assignedDrivers_info']=$this->admin->record_list('tbl_assign');
            $data['page_title']='Assigned Driver to Vehicle';
            $this->load->view('vendors/assignedDrivertoVehicle',$data);
        }
        
        
        
        public function vehiclestoFuel($task = '',$fuel_mgt_id = '')
        {
            if ($this->session->userdata('vendor_login') != 1) {
                        $this->session->set_userdata('last_page', current_url());
                        redirect(base_url());
                       }
              if($task == 'delete'){
                        $where =array('fuel_mgt_id'=>$fuel_mgt_id);
                        $this->admin->delete_record('fuel_mgt',$where);
                        $this->session->set_flashdata('msg_ok', ('<i class="ti-check-box"></i> Record Deleted Successfully.'));
                        redirect(base_url() .'Vendor/vehiclestoFuel');
             }         
             
                $this->db->select('fuel_mgt.*,tbl_vendor.vendor_name,tbl_vendor.vendor_contact,tbl_supervisor.supervisor_name,tbl_supervisor.supervisor_contact,tbl_vehicle.vehicle_no,tbl_driver.driver_name,tbl_driver.driver_contact');
		 $this->db->join('tbl_vendor','tbl_vendor.vendor_id=fuel_mgt.vendor_id');
		 $this->db->join('tbl_supervisor','tbl_supervisor.supervisor_id=fuel_mgt.supervisor_id');		 
		 $this->db->join('tbl_vehicle','tbl_vehicle.vehicle_id=fuel_mgt.vehicle_id');
		 $this->db->join('tbl_driver','tbl_driver.driver_id=fuel_mgt.driver_id');
		 //$this->db->join('otp','otp.fuel_mgt_id=fuel_mgt.fuel_mgt_id');
                 $vendor_id = $this->session->userdata('log_admin_id');
                 $this->db->where('fuel_mgt.vendor_id',$vendor_id);
            $this->db->order_by("fuel_mgt_id","desc");
             $this->db->where("status",0);
            $data['fuel_mgt_info']=$this->admin->record_list('fuel_mgt');
            $data['page_title']='Assigned Vehicles to Fuel';
            $this->load->view('vendors/assignedVehiclestoFuel',$data);
        }
        
        
        
        public function fuelReceipts()
        {
            if ($this->session->userdata('vendor_login') != 1) {
                        $this->session->set_userdata('last_page', current_url());
                        redirect(base_url());
                       }
                       
                $this->db->select('fuel_receipt.*,tbl_vendor.vendor_name,tbl_vendor.vendor_contact,tbl_supervisor.supervisor_name,tbl_supervisor.supervisor_contact,fuel_mgt.*,tbl_vehicle.vehicle_no,tbl_driver.driver_name,tbl_driver.driver_contact');
		$this->db->join('tbl_vendor','tbl_vendor.vendor_id=fuel_receipt.vendor_id');
		$this->db->join('tbl_supervisor','tbl_supervisor.supervisor_id=fuel_receipt.supervisor_id');
		$this->db->join('fuel_mgt','fuel_mgt.fuel_mgt_id=fuel_receipt.fuel_mgt_id');
		$this->db->join('tbl_vehicle','tbl_vehicle.vehicle_id=fuel_mgt.vehicle_id');
		$this->db->join('tbl_driver','tbl_driver.driver_id=fuel_mgt.driver_id');
                $vendor_id = $this->session->userdata('log_admin_id');
                 $this->db->where('fuel_receipt.vendor_id',$vendor_id);
            $this->db->order_by("fuel_receipt_id","desc");
            $data['fuel_Receipt_info']=$this->admin->record_list('fuel_receipt');
            $data['page_title']='Fuel Receipts';
            $this->load->view('vendors/fuelReceipts',$data);
        }
        
        public function fuelReceiptByDate($task='',$startdate='',$enddate='')
        {
            if ($this->session->userdata('vendor_login') != 1) {
                        $this->session->set_userdata('last_page', current_url());
                        redirect(base_url());
                       }
                                              
                $this->db->select('fuel_receipt.*,tbl_vendor.vendor_name,tbl_vendor.vendor_contact,tbl_supervisor.supervisor_name,tbl_supervisor.supervisor_contact,fuel_mgt.*,tbl_vehicle.vehicle_no,tbl_driver.driver_name,tbl_driver.driver_contact');
		$this->db->join('tbl_vendor','tbl_vendor.vendor_id=fuel_receipt.vendor_id');
		$this->db->join('tbl_supervisor','tbl_supervisor.supervisor_id=fuel_receipt.supervisor_id');
		$this->db->join('fuel_mgt','fuel_mgt.fuel_mgt_id=fuel_receipt.fuel_mgt_id');
		$this->db->join('tbl_vehicle','tbl_vehicle.vehicle_id=fuel_mgt.vehicle_id');
		$this->db->join('tbl_driver','tbl_driver.driver_id=fuel_mgt.driver_id');
                $vendor_id = $this->session->userdata('log_admin_id');
                 $this->db->where('fuel_receipt.vendor_id',$vendor_id);
            $this->db->order_by("fuel_receipt_id","desc");
            $data['fuel_Receipt_info']=$this->admin->record_list('fuel_receipt');
            $data['page_title']='Fuel Receipts By Date';
            $this->load->view('vendors/fuelReceiptsByDate',$data);
        }
        public function filterfuelReceiptByDate()
        {
            if ($this->session->userdata('vendor_login') != 1) {
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
                $vendor_id = $this->session->userdata('log_admin_id');
                 $this->db->where('fuel_receipt.vendor_id',$vendor_id);
            $this->db->order_by("fuel_receipt_id","desc");
            $data['fuel_Receipt_info']=$this->admin->record_list('fuel_receipt');
            $data['page_title']='Fuel Receipts By Date';
            $this->load->view('vendors/filterfuelReceiptsByDate',$data);
                    
               }
               else
                {
                     $this->session->set_flashdata('err_msg',validation_errors());
                     redirect(base_url() .'Vendor/fuelReceiptByDate');
                }      
            
        }
        
        public function profile($task = '',$vendor_id = '')
        {
            if ($this->session->userdata('vendor_login') != 1) {
                        $this->session->set_userdata('last_page', current_url());
                        redirect(base_url());
                       }
                       
            if($task == 'updateImage'){
                if($_FILES['vendors']['name']!= ""){
                      $img_name='vendors';
                      $img_path='vendors';
                      $old_img=$this->input->post('old_admin_profile');
                      $profile=$this->admin->upload_image($img_name,$img_path,$old_img);  
                }
                        if($profile)
                        {
                            $data=array('profile_pic'=>$profile);                            
                                $where =array('vendor_id'=>$vendor_id);
                                $vendors=$this->admin->records_update('tbl_vendor',$data,$where);
                                $this->session->set_userdata('log_image', $profile);
                                $this->session->set_flashdata('msg_ok','<i class="ti-check-box"></i> Profile Image Updated Successfully.');
                                redirect(base_url() .'Vendor/profile');

                        }
                        else
                        {
                                    $this->session->set_flashdata('err_msg',$this->upload->display_errors());
                                    redirect(base_url() .'Vendor/profile');

                        }
            }
            
            if($task == 'updateAdminProfile'){
                        $this->form_validation->set_rules('vendor_name', 'Admin Name', 'required');
			$this->form_validation->set_rules('vendor_email','Admin Email ID','required|valid_email');
			$this->form_validation->set_rules('vendor_contact', 'Contact No', 'required|numeric');
                         if ($this->form_validation->run())
			{
                            $data=array(
					'vendor_name'=>ucwords(strtolower($this->input->post('vendor_name'))),
	        			'vendor_email'=>strtolower($this->input->post('vendor_email')),
	        			'vendor_contact'=>$this->input->post('vendor_contact'),
	        			'vendor_alternate_contact'=>$this->input->post('vendor_alternate_contact'),
	        			'city'=>$this->input->post('city'),
                                        'vendor_address'=>$this->input->post('vendor_address'),
                                        'pincode'=>$this->input->post('pincode'),
	        			'is_active'=>1);
                            
                                        $where =array('vendor_id'=>$vendor_id);
					$vendors=$this->admin->records_update('tbl_vendor',$data,$where);
					$this->session->set_flashdata('msg_ok','<i class="ti-check-box"></i> Vwndor Profile Updated Successfully.');
					redirect(base_url() .'Vendor/profile');		
			}else {
                            $this->session->set_flashdata('err_msg',validation_errors());
                             redirect(base_url() .'Vendor/profile');
                        }
            }
            
            if($task =='updateAdminPassword'){
                
                $this->form_validation->set_rules('old_password', 'Old Password', 'required');
                $this->form_validation->set_rules('password', 'Password', 'required');
                $this->form_validation->set_rules('confirm', 'Password Confirmation', 'required|matches[password]');

		if ($this->form_validation->run() == FALSE)
                {
                       $this->session->set_flashdata('err_msg', validation_errors());
                       redirect(base_url() .'Vendor/profile');
                }
                else
                {
                    $table = "tbl_vendor";
                    $where =array('vendor_id'=>$vendor_id);
                    $query = $this->tadmin_model->checkOldPassword($this->input->post('old_password'),$table,$where);

                            if($query)
                                    {
                                      $data=array('password'=> strrev(sha1(md5($this->input->post('password')))));
                                            $where =array('vendor_id'=>$vendor_id);
                                            $vendors=$this->admin->records_update('tbl_vendor',$data,$where);
                                            $this->session->sess_destroy();
                                            $this->session->set_flashdata('msg_ok', ('Password Updated Successfully'));
                                           redirect(base_url() .'Vendor/profile');
                                    }
                                    else
                                    {
                                         $this->session->set_flashdata('err_msg', 'Please Enter the correct password');
                                           redirect(base_url() .'Vendor/profile');
                                    }

				 
		}
                
            }
            $vendor_id = $this->session->userdata('log_admin_id');
                 $this->db->where('vendor_id',$vendor_id);
            $data['vendor_info']=$this->admin->record_list('tbl_vendor');
            $data['page_title']='Profile Setting';
            $this->load->view('vendors/myprofile',$data);
        }
        
        
        public function login()
        {
            if ($this->session->userdata('vendor_login') == 1) {
                 $this->session->set_userdata('last_page', current_url());                 
                 redirect(base_url());
			
            }else{
                    $data['page_title'] = 'Login';
                    $this->load->view('vendors/login',$data);
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
