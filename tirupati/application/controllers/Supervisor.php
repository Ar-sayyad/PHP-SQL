<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supervisor extends CI_Controller {
	public function __construct()  
	{
		parent::__construct();	
		
	 
	}
	public function index()
	{
		$this->data['page_title']='Dashborad';
		$this->load->view('Supervisor/header',$this->data);
		$this->load->view('Supervisor/index');
	}
	public function profile()
	{
		/** Edit Profile start**/
		if(isset($_POST['btn_update']))
		{
			$whereuser =array( 	  
				'supervisor_email'=>$this->session->userdata('supervisor_email')
	    			);
			$data=array( 	  
					'supervisor_name'=>ucfirst($this->input->post('supervisor_name')),
		    			'supervisor_alternet_contact'=>$this->input->post('supervisor_alternet_contact'),
		    			'supervisor_address'=>$this->input->post('supervisor_address')
		    			);
			$details=$this->admin->records_update('tbl_supervisor',$data,$whereuser);
			$this->session->set_flashdata('message_success',' Profile Successfully Updated.');
			redirect(base_url().'Supervisor/profile');	
		}
		/**End Edit Profile**/

		/*****Start Change Password******/
		if(isset($_POST['change_password']))
		{			
			$where=array( 
	            			'supervisor_email'=>$this->session->userdata('supervisor_email'),
	            			'password'=>strrev(sha1(md5($this->input->post('old_password'))))
			        		  );
			$verify=$this->admin->record_count('tbl_supervisor',$where);
			$this->form_validation->set_rules('old_password', 'Old Password', 'required');

			$this->form_validation->set_rules('new_password', 'Password', 'required|min_length[4]');
			$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[new_password]');

			if ($this->form_validation->run())
			{
				if($verify)
				{
					$where= array(
					'supervisor_email'=>$this->session->userdata('supervisor_email')
					);
								
					$data=array( 	            			
		            			'password'=>strrev(sha1(md5($this->input->post('new_password'))))
				        		  );
					$details=$this->admin->records_update('tbl_supervisor',$data,$where);
					
					if($details)
					{
						$this->session->set_flashdata('message_success','Profile Successfully Updated');
							
						redirect(base_url().'Supervisor/logout');
					}
				} 
				else
				{
					$this->session->set_flashdata('message_failed','Old Password Incorrect');
					redirect(base_url().'Supervisor/profile');
				}			
			}
		}

		/*****End Change Password******/

		$this->data['profile']=$this->admin->record_list('tbl_supervisor');
		$this->data['page_title']='Profile';
		$this->load->view('Supervisor/header',$this->data);
		$this->load->view('Supervisor/profile',$this->data);
	}

/***********Vehicle Owner**********/
public function VehicleOwner()
	{
	
		if(isset($_POST['add_owner']))
		{
			$this->form_validation->set_rules('owner_name', 'Owner Name', 'required');
			
			 $this->form_validation->set_rules('owner_contact','Contact No','required');
			 if ($this->form_validation->run())
			{
			
			$data=array( 	  
	        			'owner_full_name'=>ucwords($this->input->post('owner_name')),
	        			'contact_no'=>$this->input->post('owner_contact'),
	        			'Alternat_no'=>$this->input->post('alternat_contact'),
	        			'owner_address'=>$this->input->post('owner_address'),
	        			'Email_id'=>$this->input->post('owner_email'),
	        			'supervisor_id'=>$this->session->userdata('supervisor_id'),
	        			'is_active'=>1
	        			);
					//echo"<pre>";print_r($data);die;

					$details=$this->admin->record_insert('vehicle_owner',$data);
					$this->session->set_flashdata('message_success','Owner Successfully Added.');
					redirect(base_url().'Supervisor/VehicleOwner');		
				}
			}
		
			if(isset($_POST['update_owner']))
		{
			$this->form_validation->set_rules('owner_name', 'Owner Name', 'required');
			
			 $this->form_validation->set_rules('owner_contact','Contact No','required');
			 if ($this->form_validation->run())
			{
				
				$where =array( 	  
						'vehicle_owner_id'=>$this->input->post('vehicle_owner_id'),
	    			);	
				
					$data=array(
						'owner_full_name'=>ucwords($this->input->post('owner_name')),
	        			'contact_no'=>$this->input->post('owner_contact'),
	        			'Alternat_no'=>$this->input->post('alternat_contact'),
	        			'owner_address'=>$this->input->post('owner_address'),
	        			'Email_id'=>$this->input->post('owner_email'),
	        			'is_active'=>1
						);

					$details=$this->admin->records_update('vehicle_owner',$data,$where);
					$this->session->set_flashdata('message_success','Owner Successfully update.');
					redirect(base_url().'Supervisor/VehicleOwner');			
				}
			}
            
		$this->db->order_by("vehicle_owner_id","desc");
		$this->data['vehicle_owner']=$this->admin->record_list('vehicle_owner');
		$this->data['page_title']='Vehicle Owner';
		$this->load->view('Supervisor/header',$this->data);
		$this->load->view('Supervisor/vehicleowner',$this->data);
	}


	public function deleteOwner()
	{	
			$where=array(
				'vehicle_owner_id'=>$this->uri->segment(3)
			);
		
		$owner=$this->admin->record_list('vehicle_owner',$where);

		if(!$owner)
		{
		 	$this->session->set_flashdata('message_failed','Owner not Found...');
        	redirect(base_url().'Supervisor/VehicleOwner');
		}
		 

        $delete_id=$this->admin->records_delete('vehicle_owner',$where);        
       
        if($delete_id){
        	$this->session->set_flashdata('message_success','Owner Deleted Successfully...');
        	redirect(base_url().'Supervisor/VehicleOwner');
    	}  
	}




/***********End Vehicle Owner**********/ 

/*******Start Vehicle ********/
public function addVehicle()
	{
		
		if(isset($_POST['add_vehicle']))
		{
			$this->form_validation->set_rules('vehicle_no', 'Vehicle No', 'required|is_unique[tbl_vehicle.vehicle_no]');
			 if ($this->form_validation->run())
			{


			$data=array( 	  
	        			'vehicle_no'=>strtoupper($this->input->post('vehicle_no')),
        			 	'vehicle_owner_id'=>$this->input->post('vehicle_owner_id'),
        		 		'description'=>$this->input->post('description'),
        		 		'fuel_limit'=>$this->input->post('fuel_limit'),
        		 		'supervisor_id'=>$this->session->userdata('supervisor_id'),
	        			'is_active'=>1
	        			);
					//echo"<pre>";print_r($data);die;

					$details=$this->admin->record_insert('tbl_vehicle',$data);
					$this->session->set_flashdata('message_success','Vehicle Successfully Added.');
					redirect(base_url().'Supervisor/addVehicle');		
				}
			}
			
			if(isset($_POST['update_vehicle']))
			{
				$this->form_validation->set_rules('vehicle_no', 'Vehicle No', 'required');
			 if ($this->form_validation->run())
			{
				
				$where =array( 	  
						'vehicle_id'=>$this->input->post('vehicle_id'),
	    			);	
				
					$data=array( 	  
	        			
	        			'vehicle_no'=>strtoupper($this->input->post('vehicle_no')),
	        			'vehicle_owner_id'=>$this->input->post('vehicle_owner_id'),
	        		 	'description'=>$this->input->post('description'),
	        		 	'fuel_limit'=>$this->input->post('fuel_limit'),
	        			'is_active'=>1
	        			);

					$details=$this->admin->records_update('tbl_vehicle',$data,$where);
					$this->session->set_flashdata('message_success','Vehicle Successfully update.');
					redirect(base_url().'Supervisor/addVehicle');		
				}
			}

			
			$wherecond=array(
							'is_active'=>1,
                            'supervisor_id'=>$this->session->userdata('supervisor_id')
							);

			$this->data['owner']=$this->admin->record_list('vehicle_owner',$wherecond);
			
			$this->db->select('tbl_vehicle.*,vehicle_owner.owner_full_name');
			$this->db->join('vehicle_owner','vehicle_owner.vehicle_owner_id = tbl_vehicle.vehicle_owner_id');
			
           
			$this->db->order_by('vehicle_id','desc');
			$this->data['vehicle']=$this->admin->record_list('tbl_vehicle');
		 $this->data['page_title']='Vehicle';
		$this->load->view('Supervisor/header',$this->data);
		$this->load->view('Supervisor/addvehicle',$this->data);
	}

	
	public function deleteVehicle()
	{	
			$where=array(
				'vehicle_id'=>$this->uri->segment(3)
			);
		
		$vehicle=$this->admin->record_list('tbl_vehicle',$where);

		if(!$vehicle)
		{
		 	$this->session->set_flashdata('message_failed','Vehicle not Found...');
        	redirect(base_url().'Supervisor/addVehicle');
		}
		 

        $delete_id=$this->admin->records_delete('tbl_vehicle',$where);        
       
        if($delete_id){
        	$this->session->set_flashdata('message_success','Vehicle Deleted Successfully...');
        	redirect(base_url().'Supervisor/addVehicle');
    	}  
	}



/************End Vehicle *****************/ 


/************Start Driver **********/
public function driver()
	{
		
		if(isset($_POST['add_driver']))
		{
			$this->form_validation->set_rules('drivername', 'Driver Name', 'required');
			
			 $this->form_validation->set_rules('driver_contact','Contact No','required');
			 if ($this->form_validation->run())
			{
				
			$data=array( 	  
	        			'driver_name'=>ucwords($this->input->post('drivername')),
	        			'driver_contact'=>$this->input->post('driver_contact'),
	        			'alternat_contact'=>$this->input->post('alternat_contact'),
	        			'driver_address'=>$this->input->post('address'),
	        			'license'=>$this->input->post('license'),
	        			'supervisor_id'=>$this->session->userdata('supervisor_id'),
	        			'is_active'=>1
	        			);
					//echo"<pre>";print_r($data);die;

					$details=$this->admin->record_insert('tbl_driver',$data);
					$this->session->set_flashdata('message_success','Driver Successfully Added.');
					redirect(base_url().'Supervisor/driver');		
				}
			}
		
			if(isset($_POST['update_driver']))
		{
			$this->form_validation->set_rules('drivername', 'Driver Name', 'required');
			 
			 $this->form_validation->set_rules('driver_contact','Contact No','required');
			 if ($this->form_validation->run())
			{
				
				$where =array( 	  
						'driver_id'=>$this->input->post('driver_id'),
	    			);	
				
					$data=array(
                        'driver_name'=>ucwords($this->input->post('drivername')),
	        			'driver_contact'=>$this->input->post('driver_contact'),
	        			'alternat_contact'=>$this->input->post('alternat_contact'),
	        			'driver_address'=>$this->input->post('address'),
	        			'license'=>$this->input->post('license'),
	        			'is_active'=>1
						);

					$details=$this->admin->records_update('tbl_driver',$data,$where);
					$this->session->set_flashdata('message_success','Driver Successfully update.');
					redirect(base_url().'Supervisor/driver');		
				}
			}
        $this->db->order_by('driver_id','desc');    
		$this->data['driver']=$this->admin->record_list('tbl_driver');
		$this->data['page_title']='Driver';
		$this->load->view('Supervisor/header',$this->data);
		$this->load->view('Supervisor/driver',$this->data);
	}

	
	public function deleteDriver()
	{	
			$where=array(
				'driver_id'=>$this->uri->segment(3)
			);
		
		$driver=$this->admin->record_list('tbl_driver',$where);

		if(!$driver)
		{
		 	$this->session->set_flashdata('message_failed','Driver not Found...');
        	redirect(base_url().'Supervisor/driver');
		}
		 

        $delete_id=$this->admin->records_delete('tbl_driver',$where);        
       
        if($delete_id){
        	$this->session->set_flashdata('message_success','Driver Deleted Successfully...');
        	redirect(base_url().'Supervisor/driver');
    	}  
	}
	/************* ENd Driver************/

	/**************Start Assign Driver to vehicle*****************/

	public function assgin()
	{
		
		if(isset($_POST['add_assign']))
		{
			$this->form_validation->set_rules('vehicle_id', 'Vehicle No', 'required');
			$this->form_validation->set_rules('driver_id', 'Driver Name', 'required');

			$wheredriver=array(
								'driver_id'=>$this->input->post('driver_id')
								);
			$wherevehicle=array(
								'vehicle_id'=>$this->input->post('vehicle_id')
								);
			
			 if ($this->form_validation->run())
			{
			$data=array( 	  
	        			'vehicle_id'=>$this->input->post('vehicle_id'),
	        			'driver_id'=>$this->input->post('driver_id'),
	        			'supervisor_id'=>$this->session->userdata('supervisor_id'),
	        			'is_active'=>1
	        			
	        			);
					

					$details=$this->admin->record_insert('tbl_assign',$data);
					$data1=array(
								'assign_status'=> 1	
								);
					
					$detailsdriver=$this->admin->records_update('tbl_driver',$data1,$wheredriver);
					$detailsvehicle=$this->admin->records_update('tbl_vehicle',$data1,$wherevehicle);
					$this->session->set_flashdata('message_success','Assign Entry Successfully Added.');
					redirect(base_url().'Supervisor/assgin');		
				}
			}
	
			if(isset($_POST['update_assign']))
		{
			$this->form_validation->set_rules('vehicle_id', 'Vehicle No', 'required');
			$this->form_validation->set_rules('driver_id', 'Driver Name', 'required');
			 if ($this->form_validation->run())
			{
				$wheredriver=array(
						'driver_id'=>$this->input->post('driver_id')
								);
				$wherevehicle=array(
						'vehicle_id'=>$this->input->post('vehicle_id')
								);
				$where =array( 	  
						'assign_id'=>$this->input->post('assign_id'),
	    			);	
				
					$data=array(
						'vehicle_id'=>$this->input->post('vehicle_id'),
	        			'driver_id'=>$this->input->post('driver_id'),
	        			'is_active'=>1
	        			);

					$details=$this->admin->records_update('tbl_assign',$data,$where);
					$data1=array(
						'assign_status'=> 1	
							);
					
				$detailsdriver=$this->admin->records_update('tbl_driver',$data1,$wheredriver);
				$detailsvehicle=$this->admin->records_update('tbl_vehicle',$data1,$wherevehicle);
					$this->session->set_flashdata('message_success','Assign Entry Successfully update.');
					redirect(base_url().'Supervisor/assgin');		
				}
			}
            $where1 =array(    
                        'tbl_assign.supervisor_id'=>$this->session->userdata('supervisor_id')
                    );

		
			$where=array(
							'is_active'=> 1,
							'assign_status'=> 0,
                            'supervisor_id'=>$this->session->userdata('supervisor_id')
						);
		$this->data['vehicle']=$this->admin->record_list('tbl_vehicle',$where);
		$this->data['driver']=$this->admin->record_list('tbl_driver',$where);
		$this->db->select('tbl_assign.*,tbl_vehicle.vehicle_no,tbl_driver.driver_name,tbl_driver.driver_contact');
		$this->db->join('tbl_vehicle','tbl_vehicle.vehicle_id = 
			tbl_assign.vehicle_id');
		$this->db->join('tbl_driver','tbl_driver.driver_id = tbl_assign.driver_id');
		$this->db->order_by('assign_id','desc');
		$this->data['assign']=$this->admin->record_list('tbl_assign',$where1);
		$this->data['page_title']='Assign Driver To Vehicle';
		$this->load->view('Supervisor/header',$this->data);
		$this->load->view('Supervisor/assign',$this->data);
	}

	/***Delete assign Entry***/
	public function deleteAssignEntry()
	{	
			$where=array(
				'assign_id'=>$this->uri->segment(3)
			);
			$wherevehicle=array(
								'vehicle_id'=>$this->uri->segment(4)
								);
			$wheredriver=array(
								'driver_id'=>$this->uri->segment(5)
								);
			$data1=array(
						'assign_status'=> 0
							);
					
				$detailsdriver=$this->admin->records_update('tbl_driver',$data1,$wheredriver);
				$detailsvehicle=$this->admin->records_update('tbl_vehicle',$data1,$wherevehicle);
		
		$assign=$this->admin->record_list('tbl_assign',$where);

		if(!$assign)
		{
		 	$this->session->set_flashdata('message_failed','Assign Entry not Found...');
        	redirect(base_url().'Supervisor/assgin');
		}
		 

        $delete_id=$this->admin->records_delete('tbl_assign',$where);        
       
        if($delete_id){
        	$this->session->set_flashdata('message_success','Assign Entry Release Successfully...');
        	redirect(base_url().'Supervisor/assgin');
    	}  
	}
	


	/************** End Assign Driver to vehicle*****************/


/***************Vendor Start ******************/ 

public function Vendors()
{
		
		if(isset($_POST['add_vendor']))
		{
			$this->form_validation->set_rules('vendor_name', 'Vendor Name', 'required');
			$this->form_validation->set_rules('vendor_contact','Vendor Contact','required|is_unique[tbl_vendor.vendor_contact]');
			 $this->form_validation->set_rules('vendor_email', 'Vendor Email', 'required');
			 $this->form_validation->set_rules('vendor_pass', 'Vendor Password', 'required');
			
			
			 if ($this->form_validation->run())
			{
			
			$data=array( 	  
	        			'vendor_name'=>ucwords($this->input->post('vendor_name')),
	        			'vendor_address'=>$this->input->post('vendor_address'),
	        			'vendor_contact'=>$this->input->post('vendor_contact'),
	        			'vendor_alternate_contact'=>$this->input->post('vendor_alternate_contact'),
	        			'vendor_email'=>$this->input->post('vendor_email'), 
	        			'password'=>strrev(sha1(md5($this->input->post('vendor_pass')))),
	        			'GST_NO'=>$this->input->post('GST_NO'),
	        			'supervisor_id'=>$this->session->userdata('supervisor_id'),
	        			'is_active'=>1
	        			);
					

					$details=$this->admin->record_insert('tbl_vendor',$data);
					$this->session->set_flashdata('message_success','Vendor Successfully Added.');
					redirect(base_url().'Supervisor/Vendors');		
				}
			}
		
			if(isset($_POST['update_vendor']))
		{
			$this->form_validation->set_rules('vendor_name', 'Vendor Name', 'required');
			 $this->form_validation->set_rules('vendor_contact','Vendor Contact','required');
			 if ($this->form_validation->run())
			{
				
				$where =array( 	  
						'vendor_id'=>$this->input->post('vendor_id'),
	    			);	
				
					$data=array(
						'vendor_name'=>ucwords($this->input->post('vendor_name')),
	        			'vendor_address'=>$this->input->post('vendor_address'),
	        			'vendor_contact'=>$this->input->post('vendor_contact'),
	        			'vendor_alternate_contact'=>$this->input->post('vendor_alternate_contact'),
	        			'vendor_email'=>$this->input->post('vendor_email'),
	        			'GST_NO'=>$this->input->post('GST_NO'),
						);

					$vendors=$this->admin->records_update('tbl_vendor',$data,$where);
					$this->session->set_flashdata('message_success','Vendor Successfully update.');
					redirect(base_url().'Supervisor/Vendors');		
				}
			}
         $this->db->order_by('vendor_id','desc');   
		$this->data['vendors']=$this->admin->record_list('tbl_vendor');
		$this->data['page_title']='Vendor';
		$this->load->view('Supervisor/header',$this->data);
		$this->load->view('Supervisor/vendors',$this->data);
	}

	/***Delete Driver***/
	public function deleteVendor()
	{	
			$where=array(
				'vendor_id'=>$this->uri->segment(3)
			);
		
		$vendor=$this->admin->record_list('tbl_vendor',$where);

		if(!$vendor)
		{
		 	$this->session->set_flashdata('message_failed','Vendor not Found...');
        	redirect(base_url().'Supervisor/Vendors');
		}
		 

        $delete_id=$this->admin->records_delete('tbl_vendor',$where);        
       
        if($delete_id){
        	$this->session->set_flashdata('message_success','Vendor Deleted Successfully...');
        	redirect(base_url().'Supervisor/Vendors');
    	}  
	}
	/*** ENd Delete Vendor***/





/*************** End Vendor*********************/




	
	
        
/*********APP API'S********/
        
        /******SUPERVISOR LOGIN********/
        
        function superviserLogin() {
             $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('password', 'Password', 'required');
            if ($this->form_validation->run() == FALSE)
                     {
                            $data['msg'] = 'All Fields Required.!';
                            $data['success'] = 0;
                    }
                    else
                     {
                            $email= $this->input->post('email');
                            $password =$this->input->post('password');

                            $credential = array('email' => $email, 'password' => $password);
                            $data = $this->validate_login_info($email,$password);
                    }
                 echo json_encode($data);
                            
        }
        
        function validate_login_info($email,$password){
		$password = strrev(sha1(md5($password)));
		$user = $this->db->get_where('tbl_supervisor', array('supervisor_email' => $email,'password' => $password));		
		//echo $sql = $this->db->last_query();
                if($user->num_rows() > 0) {
                        $row = $user->row();
                        $data['supervisor_id'] =  $row->supervisor_id;
                        $data['email'] = $row->supervisor_email;
                        $data['name'] =  $row->supervisor_name;
                        $data["success"]=1;
                        $data['msg'] = 'Login Successful.!';
                }else{
			$data["success"]=0;
                        $data['msg'] = 'Login Failed..!';
		}
                return $data;
		
	}
        /*******SUPERVISOR LOGIN END*******/
        
        /******VENDOR LOGIN********/
        
        function vendorLogin() {
             $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('password', 'Password', 'required');
            if ($this->form_validation->run() == FALSE)
                     {
                            $data['msg'] = 'All Fields Required.!';
                            $data['success'] = 0;
                    }
                    else
                     {
                            $email= $this->input->post('email');
                            $password =$this->input->post('password');

                            $credential = array('email' => $email, 'password' => $password);
                            $data = $this->validate_vendor_login_info($email,$password);
                    }
                 echo json_encode($data);
                            
        }
        
        function validate_vendor_login_info($email,$password){
		$password = strrev(sha1(md5($password)));
		$vendor = $this->db->get_where('tbl_vendor', array('vendor_email' => $email,'password' => $password));		
		//echo $sql = $this->db->last_query();
                if($vendor->num_rows() > 0) {
                        $row = $vendor->row();
                        $data['vendor_id'] =  $row->vendor_id;
                        $data['email'] = $row->vendor_email;
                        $data['vendor_name'] = $row->vendor_name;
                        $data['vendor_contact'] = $row->vendor_contact;
                        $data['supervisor_id'] = $row->supervisor_id;
                        $data["success"]=1;
                        $data['msg'] = 'Login Successful.!';
                }else{
			$data["success"]=0;
                        $data['msg'] = 'Login Failed..!';
		}
                return $data;
		
	}
        /*******VENDOR LOGIN END*******/
        
        
        /*******ADD DRIVER********/
        
        public function addDriver(){
            $this->form_validation->set_rules('driver_name', 'Driver Name', 'required');
            $this->form_validation->set_rules('driver_contact','Contact No','required|numeric|is_unique[tbl_driver.driver_contact]');
            $this->form_validation->set_rules('supervisor_id','Super Visor','required');
             if ($this->form_validation->run() == FALSE)
                     {
                            $data['msg']= validation_errors();
                            $data['success'] = 0;
                     }
                    else
                     {
                            $dat=array( 	  
	        			'driver_name'=> strtoupper($this->input->post('driver_name')),
	        			'driver_contact'=>$this->input->post('driver_contact'),
                                        'alternat_contact'=>$this->input->post('alternate_contact'),
                                        'license'=> strtoupper($this->input->post('license')),
                                        'driver_address'=>$this->input->post('driver_address'),
                                        'alternate_contact'=>$this->input->post('alternate_contact'),
	        			'supervisor_id'=>$this->input->post('supervisor_id'),
	        			);
                            
			$insert=$this->db->insert('tbl_driver',$dat);
                        if($insert==1){
                            $data['msg']= 'Driver Added Successfully..!';
                            $data['success'] = 1;
                        }else{
                            $data['msg']= 'Something Went Wrong..!';
                            $data['success'] = 0;
                        }
                    }  
                    echo json_encode($data);
            
        }
        /*******ADD DRIVER END*******/
        
        /**********ADD VEHICLE OWNER*****/
        
        public function addVehicleOwner(){
            $this->form_validation->set_rules('owner_name', 'Owner Name', 'required');
            $this->form_validation->set_rules('owner_contact','Contact No','required|numeric|is_unique[vehicle_owner.contact_no]');
            $this->form_validation->set_rules('owner_email','Email','required|valid_email');
            $this->form_validation->set_rules('supervisor_id','Supervisor','required');
             if ($this->form_validation->run() == FALSE)
                     {
                            $data['msg']= validation_errors();
                            $data['success'] = 0;
                     }
                    else
                     {
                            $dat=array( 	  
	        			'owner_full_name'=> strtoupper($this->input->post('owner_name')),
	        			'contact_no'=>$this->input->post('owner_contact'),
                                        'Email_id'=>$this->input->post('owner_email'),
                                        'Alternat_no'=>$this->input->post('alternate_no'),
                                        'owner_address'=>$this->input->post('address'),
	        			'supervisor_id'=>$this->input->post('supervisor_id')
	        			);
                            
			$insert=$this->db->insert('vehicle_owner',$dat);
                        if($insert==1){
                            $data['msg']= 'Vehicle Owner Registered Successfully..!';
                            $data['success'] = 1;
                        }else{
                            $data['msg']= 'Something Went Wrong..!';
                            $data['success'] = 0;
                        }
                    }  
                    echo json_encode($data);            
        }
        
        
        /********ADD VEHICLE OWNER END*******/
        
        /******ADD VEHICLE******/
        
         public function regVehicle(){
            $this->form_validation->set_rules('vehicle_no', 'Vehicle Number', 'required|is_unique[tbl_vehicle.vehicle_no]');
            $this->form_validation->set_rules('vehicle_owner_id','Vehicle Owner','required');
            $this->form_validation->set_rules('supervisor_id','Supervisor','required');
             if ($this->form_validation->run() == FALSE)
                     {
                            $data['msg']= validation_errors();
                            $data['success'] = 0;
                     }
                    else
                     {
                            $dat=array( 	  
	        			'vehicle_no'=> strtoupper($this->input->post('vehicle_no')),
	        			'vehicle_owner_id'=>$this->input->post('vehicle_owner_id'),
	        			'supervisor_id'=>$this->input->post('supervisor_id')
	        			);
                            
			$insert=$this->db->insert('tbl_vehicle',$dat);
                        if($insert==1){
                            $data['msg']= 'Vehicle Added Successfully..!';
                            $data['success'] = 1;
                        }else{
                            $data['msg']= 'Something Went Wrong..!';
                            $data['success'] = 0;
                        }
                    }  
                    echo json_encode($data);            
        }
        
        /*******ADD VEHICLE END******/
        
        /*******ADD VENDOR*****/
            public function regVendor(){
            $this->form_validation->set_rules('vendor_name', 'Vendor Name', 'required');
            $this->form_validation->set_rules('vendor_contact','Contact','required|numeric|is_unique[tbl_vendor.vendor_contact]');
            $this->form_validation->set_rules('vendor_email','Email','required|valid_email');
            $this->form_validation->set_rules('password','Password','required');
            $this->form_validation->set_rules('supervisor_id','Supervisor','required');
          
             if ($this->form_validation->run() == FALSE)
                     {
                            $data['msg']= validation_errors();
                            $data['success'] = 0;
                     }
                    else
                     {
                            $dat=array( 	  
	        			'vendor_name' => strtoupper($this->input->post('vendor_name')),
	        			'vendor_contact' =>$this->input->post('vendor_contact'),
                                        'vendor_email' =>$this->input->post('vendor_email'),
                                        'password' =>  strrev(sha1(md5($this->input->post('password')))),
	        			'supervisor_id' =>$this->input->post('supervisor_id')
	        			);
                            
			$insert=$this->db->insert('tbl_vendor',$dat);
                        if($insert==1){
                            $data['msg']= 'Vendor Registered Successfully..!';
                            $data['success'] = 1;
                        }else{
                            $data['msg']= 'Something Went Wrong..!';
                            $data['success'] = 0;
                        }
                    }  
                    echo json_encode($data);            
        }
        
        /******ADD VENDOR END*****/
        
        /*******ADD DRIVER TO VEHICLE*****/
        
            public function assignDriverToVehicle(){
            $this->form_validation->set_rules('vehicle_id', 'Vehicle ID', 'required');
            $this->form_validation->set_rules('driver_id','driver_id','required');
            $this->form_validation->set_rules('supervisor_id','Supervisor','required');
             if ($this->form_validation->run() == FALSE)
                     {
                            $data['msg']= 'All Fields Required..!';
                            $data['success'] = 0;
                     }
                    else
                     {
                            $dat=array( 	  
	        			'vehicle_id'=>$this->input->post('vehicle_id'),
	        			'driver_id'=>$this->input->post('driver_id'),
	        			'supervisor_id'=>$this->input->post('supervisor_id')
	        			);
                            
			$insert=$this->db->insert('tbl_assign',$dat);
                        if($insert==1){
                            $data['msg']= 'Driver Assigned Successfully..!';
                            $data['success'] = 1;
                        }else{
                            $data['msg']= 'Something Went Wrong..!';
                            $data['success'] = 0;
                        }
                    }  
                    echo json_encode($data);            
        }
        
        /******ADD DRIVER TO VEHICLE END*****/
        
         /*******ADD VEHICLE TO VENDOR FOR FUEL*****/
        
            public function assignVehicleToFuel(){
            $this->form_validation->set_rules('vendor_id', 'Vendor ID', 'required');
            $this->form_validation->set_rules('vehicle_id', 'Vehicle ID', 'required');
            $this->form_validation->set_rules('driver_id','driver_id','required');
            $this->form_validation->set_rules('assign_id','assign_id','required');
            $this->form_validation->set_rules('cost','cost','required');
            $this->form_validation->set_rules('date','date','required');
            $this->form_validation->set_rules('supervisor_id','Supervisor','required');
             if ($this->form_validation->run() == FALSE)
                     {
                            $data['msg']= 'All Fields Required..!';
                            $data['success'] = 0;
                     }
                    else
                     {
                            $dat=array( 	  
	        			'vendor_id' =>$this->input->post('vendor_id'),
                                        'vehicle_id' =>$this->input->post('vehicle_id'),
	        			'driver_id' =>$this->input->post('driver_id'),
                                        'assign_id' =>$this->input->post('assign_id'),
                                        'cost' =>$this->input->post('cost'),
                                        'date' =>$this->input->post('date'),
	        			'supervisor_id' =>$this->input->post('supervisor_id')
	        			);
                            
			$insert=$this->db->insert('fuel_mgt',$dat);
                        if($insert==1){
                            $data['msg']= 'Vehicle Assigned to Vendor for Fuel Successfully..!';
                            $data['success'] = 1;
                        }else{
                            $data['msg']= 'Something Went Wrong..!';
                            $data['success'] = 0;
                        }
                    }  
                    echo json_encode($data);            
        }
        
        /******ADD VEHICLE TO VENDOR FOR FUEL END*****/
        
        /******GET SUPERVISOR DATA*******/
        
        public function getSupervisor($id){
             $data = array();
            $this->db->where('supervisor_id',$id);
            $supervisor = $this->db->get('tbl_supervisor')->result_array();
             foreach ($supervisor as $sup){                 
              $sup_entry = array('supervisor_id' => $sup['supervisor_id'], 'name' => $sup['supervisor_name'], 'contact' => $sup['supervisor_contact'],'alternate_contact' => $sup['supervisor_alternet_contact'], 'email' => $sup['supervisor_email'],'address' => $sup['supervisor_address'],'profile_img' => $sup['profile_pic']);
              array_push($data, $sup_entry);
              }
                  
                    
            echo json_encode($data);
        }
        
        /******SET SUPERVISOR DATA*******/
        
        public function setSupervisorData($id){   
            $this->form_validation->set_rules('supervisor_name', 'Supervisor name', 'required');
             if ($this->form_validation->run() == FALSE)
                     {
                            $data['msg']= validation_errors();
                            $data['success'] = 0;
                     }
                    else
                     {
                        $img=$this->input->post('profile_img');
			$extension="jpg";
			$fileName = uniqid().'.'.$extension;
			$path='/home/techrnl/public_html/tirupati/assets/uploads/supervisors/'.$fileName;
                        
                            $data=array( 	  
                                        'supervisor_name' => strtoupper($this->input->post('supervisor_name')),
                                        'supervisor_alternet_contact' =>$this->input->post('alternate_contact'),
                                        'supervisor_name' =>$this->input->post('supervisor_name'),
                                        'profile_pic'=>$fileName,
	        			'supervisor_id' =>$this->input->post('supervisor_id')
	        			);                       

                        $result = file_put_contents($path, base64_decode($img)); 
                        
                               $this->db->where('supervisor_id',$id);
                               $insert= $this->db->update('tbl_supervisor',$data);
                        if($insert==1){
                            $data['msg']= 'Supervisor Data Updated Successfully..!';
                            $data['success'] = 1;
                        }else{
                            $data['msg']= 'Something Went Wrong..!';
                            $data['success'] = 0;
                        }
                    }  
                    echo json_encode($data);    
        }
        
         /******SET SUPERVISOR DATA END*******/
        
         /******GET ALL VENDOR DATA*******/
        
        public function getVendor(){
            $data = array();
            //$this->db->where('supervisor_id',$id);
            $vendor = $this->db->get('tbl_vendor')->result_array();
            foreach ($vendor as $sup){                 
              $ven_entry = array('vendor_id' => $sup['vendor_id'], 'name' => $sup['vendor_name'], 'contact' => $sup['vendor_contact'],'alternate_contact' => $sup['vendor_alternate_contact'], 'email' => $sup['vendor_email'],'address' => $sup['vendor_address'],'GSTIN' => $sup['GST_NO']);
               array_push($data, $ven_entry);
              }                
                  
            echo json_encode($data);
        }
        
         /******GET ALL VENDOR DATA END*******/
        
        /******GET SINGLE VENDOR DATA*******/
        
        public function getVendorProfile($id){
            $data = array();
            $this->db->where('vendor_id',$id);
            $vendor = $this->db->get('tbl_vendor')->result_array();
            foreach ($vendor as $sup){                 
              $ven_entry = array('vendor_id' => $sup['vendor_id'], 'name' => $sup['vendor_name'], 'contact' => $sup['vendor_contact'],'alternate_contact' => $sup['vendor_alternate_contact'], 'email' => $sup['vendor_email'],'address' => $sup['vendor_address'],'GSTIN' => $sup['GST_NO']);
               array_push($data, $ven_entry);
              }                
                  
            echo json_encode($data);
        }
        
         /******GET SINGLE VENDOR DATA END*******/
        
        /******SET VENDOR DATA*******/
        
        public function setVendorData($id){   
            $this->form_validation->set_rules('vendor_name', 'vendor name', 'required');
             if ($this->form_validation->run() == FALSE)
                     {
                            $data['msg']= validation_errors();
                            $data['success'] = 0;
                     }
                    else
                     {
                        $img=$this->input->post('profile_img');
			$extension="jpg";
			$fileName = uniqid().'.'.$extension;
			$path='/home/techrnl/public_html/tirupati/assets/uploads/vendors/'.$fileName;
                        
                            $data=array( 	  
                                        'vendor_name' => strtoupper($this->input->post('vendor_name')),
                                        'vendor_address' =>$this->input->post('vendor_address'),
                                        'vendor_alternate_contact' =>$this->input->post('alternate_contact'),
                                        'GST_NO' =>$this->input->post('gstin_no'),
                                        'profile_pic'=>$fileName
	        			);                       

                        $result = file_put_contents($path, base64_decode($img)); 
                        
                               $this->db->where('vendor_id',$id);
                               $insert= $this->db->update('tbl_vendor',$data);
                        if($insert==1){
                            $data['msg']= 'Vendor Data Updated Successfully..!';
                            $data['success'] = 1;
                        }else{
                            $data['msg']= 'Something Went Wrong..!';
                            $data['success'] = 0;
                        }
                    }  
                    echo json_encode($data);    
        }
        
         /******SET VENDOR DATA END*******/
        
         /******GET SUPERVISORWISE NOT ASSIGNED DRIVER DATA*******/
        
        public function getDriverForAssign($id){
            $data = array();
            $this->db->where('supervisor_id',$id);
            $driver = $this->db->get('tbl_driver')->result_array();
            foreach ($driver as $sup){ 
                 $drive = $this->db->get_where('tbl_assign',array('driver_id' =>$sup['driver_id']))->result_array();
                 if($drive){
                     
                 }
                 else{
                $driver_entry = array('driver_id' => $sup['driver_id'], 'name' => strtoupper($sup['driver_name']), 'contact' => $sup['driver_contact'],'alternate_contact' => $sup['alternat_contact'], 'address' => $sup['driver_address'],'licence_no' => strtoupper($sup['license']));
                array_push($data, $driver_entry);
                 }
              }
            echo json_encode($data);
        }
        /******GET SUPERVISORWISE NOT ASSIGNED DRIVER DATA END*******/
        
        /******GET SUPERVISORWISE ALL DRIVER DATA*******/
        
        public function getDriver($id){
            $data = array();
            $this->db->where('supervisor_id',$id);
            $driver = $this->db->get('tbl_driver')->result_array();
            foreach ($driver as $sup){                 
              $driver_entry = array('driver_id' => $sup['driver_id'], 'name' => strtoupper($sup['driver_name']), 'contact' => $sup['driver_contact'],'alternate_contact' => $sup['alternat_contact'], 'address' => $sup['driver_address'],'licence_no' => strtoupper($sup['license']));
               array_push($data, $driver_entry);
              }
            echo json_encode($data);
        }
        /******GET SUPERVISORWISE ALL DRIVER DATA END*******/
        
        
        /******GET SUPERVISORWISE NOT ASSIGNED VEHICLE DATA*******/
        
        public function getVehicleForAssign($id){
            $data = array();
            $this->db->where('supervisor_id',$id);
            $vehicle = $this->db->get('tbl_vehicle')->result_array();
             foreach ($vehicle as $veh){
                  $vehi = $this->db->get_where('tbl_assign',array('vehicle_id' =>$veh['vehicle_id']))->result_array();
                 if($vehi){
                     
                 }else{
                    $veh_entry = array('vehicle_id' => $veh['vehicle_id'], 'vehicle_no' => strtoupper($veh['vehicle_no']));                  
                    array_push($data, $veh_entry);
                 }
            }            
            echo json_encode($data);
        }
        /******GET SUPERVISORWISE NOT ASSIGNED VEHICLE DATA END*******/
        
        
        /******GET SUPERVISORWISE NOT ASSIGNED VEHICLE TO FUEL DATA*******/
        
        public function getVehicleForFuel($id){
            $data = array();
            $this->db->where('supervisor_id',$id);
            $vehicle = $this->db->get('tbl_vehicle')->result_array();
             foreach ($vehicle as $veh){
                  $vehi = $this->db->get_where('fuel_mgt',array('vehicle_id' =>$veh['vehicle_id'],'status' => 0))->result_array();
                 if($vehi){                     
                 }else{                  
                    $veh_entry = array('vehicle_id' => $veh['vehicle_id'], 'vehicle_no' => strtoupper($veh['vehicle_no']));                  
                    array_push($data, $veh_entry);
                 }
            }            
            echo json_encode($data);
        }
        /******GET SUPERVISORWISE NOT ASSIGNED VEHICLE TO FUEL DATA END*******/
        
        /******GET SUPERVISORWISE VEHICLE DATA*******/
        
        public function getVehicle($id){
            $data = array();
             $this->db->where('supervisor_id',$id);
            $vehicle = $this->db->get('tbl_vehicle')->result_array();            
            foreach ($vehicle as $veh){
                  $owner =  $this->db->get_where('vehicle_owner',array('vehicle_owner_id' => $veh['vehicle_owner_id']))->result_array();
                   foreach ($owner as $own){
                   }
                    $veh_entry = array('vehicle_id' => $veh['vehicle_id'], 'vehicle_no' => strtoupper($veh['vehicle_no']), 'vehicle_owner_id' => $veh['vehicle_owner_id'],'owner_name' => strtoupper($own['owner_full_name']), 'contact_no' => $own['contact_no']);                  
                    array_push($data, $veh_entry);
            }
            echo json_encode($data);
        }
         /******GET SUPERVISORWISE VEHICLE DATA END*******/
        
         /******GET SUPERVISORWISE VEHICLE-OWNER DATA*******/
        
        public function getVehicleOwner($id){
            $data = array();
             $this->db->where('supervisor_id',$id);
            $owner = $this->db->get('vehicle_owner')->result_array();
            foreach ($owner as $own){                       
                       $owner_entry = array('vehicle_owner_id' => $own['vehicle_owner_id'], 'name' => strtoupper($own['owner_full_name']), 'address' => $own['owner_address'],'email' => $own['Email_id'], 'contact' => $own['contact_no'],'alternate_no' => $own['Alternat_no']);                  
                   
                        array_push($data, $owner_entry);
                    }
                   
            echo json_encode($data);
        }
         /******GET SUPERVISORWISE VEHICLE-OWNER DATA END*******/
        
         /******GET SUPERVISORWISE ASSIGNED VEHICLE-DRIVER DATA*******/
        
         public function getAssignVehicleDriver($id){
              $data = array();
             $this->db->where('supervisor_id',$id);
            $assign = $this->db->get('tbl_assign')->result_array();
            foreach($assign as $row){                
                $vehicle =  $this->db->get_where('tbl_vehicle',array('vehicle_id' => $row['vehicle_id']))->result_array();
                   foreach ($vehicle as $veh){                       
                       //$veh_entry = array('assign_id' => $row['assign_id'],'vehicle_id' => $row['vehicle_id'], 'vehicle_no' => $veh['vehicle_no'], 'driver_id' => $row['driver_id']);
                  }
                  
                   $driver =  $this->db->get_where('tbl_driver',array('driver_id' => $row['driver_id']))->result_array();
                   foreach ($driver as $drv){  
                       $veh_entry = array('assign_id' => $row['assign_id'],'vehicle_id' => $row['vehicle_id'], 'vehicle_no' => $veh['vehicle_no'], 'driver_id' => $row['driver_id'],'driver_name' => $drv['driver_name'],'driver_contact' => $drv['driver_contact']);
                  }                  
                   array_push($data, $veh_entry);
            }
            echo json_encode($data);
        }
         /******GET SUPERVISORWISE ASSIGNED VEHICLE-DRIVER DATA END*******/
        
        /******DELETE SUPERVISORISE ASSIGNED VEHICLE-DRIVER DATA*******/
        
         public function deleteAssignVehicleDriver($id){
             $this->db->where('assign_id',$id);
             $details=$this->db->delete('tbl_assign');
             if($details){
             $data['msg'] = 'Data Deleted Successfully..!';
             $data['success'] = 1;
            }else{
                $data['msg'] = 'Something went wrong..!';
                $data['success'] = 0;
            }
            echo json_encode($data);
        }
         /******DELETE SUPERVISORWISE ASSIGNED VEHICLE-DRIVER DATA END*******/
        
        /******GET SUPERVISORWISE ASSIGNED VEHICLE-TO FUEL DATA*******/
        
         public function getAssignVehicleTofuel($id){
              $data = array();
              $this->db->where('status',0);
             $this->db->where('supervisor_id',$id);
            $fuel = $this->db->get('fuel_mgt')->result_array();
            foreach($fuel as $row){                
                $vehicle =  $this->db->get_where('tbl_vehicle',array('vehicle_id' => $row['vehicle_id']))->result_array();
                   foreach ($vehicle as $veh){                       
                       //$veh_entry = array('assign_id' => $row['assign_id'],'vehicle_id' => $row['vehicle_id'], 'vehicle_no' => $veh['vehicle_no'], 'driver_id' => $row['driver_id']);
                  }
                  $vendor =  $this->db->get_where('tbl_vendor',array('vendor_id' => $row['vendor_id']))->result_array();
                   foreach ($vendor as $ven){                       
                       //$veh_entry = array('assign_id' => $row['assign_id'],'vehicle_id' => $row['vehicle_id'], 'vehicle_no' => $veh['vehicle_no'], 'driver_id' => $row['driver_id']);
                  }                  
                   $driver =  $this->db->get_where('tbl_driver',array('driver_id' => $row['driver_id']))->result_array();
                   foreach ($driver as $drv){  
                       $veh_entry = array('fuel_mgt_id' => $row['fuel_mgt_id'],'vendor_id' => $row['vendor_id'],'vendor_name' => $ven['vendor_name'],'vendor_contact' => $ven['vendor_contact'],'vehicle_id' => $row['vehicle_id'], 'vehicle_no' => $veh['vehicle_no'], 'driver_id' => $row['driver_id'],'driver_name' => $drv['driver_name'],'driver_contact' => $drv['driver_contact'],'cost' => $row['cost'],'date' =>$row['date'],'supervisor_id' => $row['supervisor_id']);
                  }                  
                   array_push($data, $veh_entry);
            }
            echo json_encode($data);
        }
         /******GET SUPERVISORWISE ASSIGNED VEHICLE-TO FUEL DATA END*******/
        
        /******UPLOAD FUEL RECEIPT DATA*******/
        
         public function uploadFuelReceipt(){
            $this->form_validation->set_rules('vendor_id', 'Vendor ID', 'required');
            $this->form_validation->set_rules('fuel_mgt_id', 'Fuel Mgt ID', 'required');;
            $this->form_validation->set_rules('date','date','required');
            $this->form_validation->set_rules('supervisor_id','Supervisor','required');
             if ($this->form_validation->run() == FALSE)
                     {
                            $data['msg']= 'All Fields Required..!';
                            $data['success'] = 0;
                     }
                    else
                     {
                        $img=$this->input->post('receipt');
			$extension="jpg";
			$fileName = uniqid().'.'.$extension;
			$path='/home/techrnl/public_html/tirupati/assets/uploads/receipts/'.$fileName;
                        
                            $dat=array( 	  
	        			'vendor_id' =>$this->input->post('vendor_id'),
                                        'fuel_mgt_id' =>$this->input->post('fuel_mgt_id'),
                                        'receipt_path'=>$fileName,
                                        'date' =>$this->input->post('date'),
	        			'supervisor_id' =>$this->input->post('supervisor_id')
	        			);                       

                        $result = file_put_contents($path, base64_decode($img)); 
                        
			$insert=$this->db->insert('fuel_receipt',$dat);
                                $data['status'] = 1;
                                $this->db->where('fuel_mgt_id',$this->input->post('fuel_mgt_id'));
                                $this->db->update('fuel_mgt',$data);
                        if($insert==1){
                            $data['msg']= 'Receipt Uploaded Successfully..!';
                            $data['success'] = 1;
                        }else{
                            $data['msg']= 'Something Went Wrong..!';
                            $data['success'] = 0;
                        }
                    }  
                    echo json_encode($data);            
        
        }
         /******UPLOAD FUEL RECEIPT DATA END*******/
        
         /******GET SUPERVISORISE ASSIGNED VEHICLE-TO FUEL DATA*******/
        
         public function getfuelReceipts($id){
              $data = array();
              //$this->db->where('status',0);
             $this->db->where('supervisor_id',$id);
            $fuel = $this->db->get('fuel_receipt')->result_array();
            foreach($fuel as $row){                
                
                  $vendor =  $this->db->get_where('tbl_vendor',array('vendor_id' => $row['vendor_id']))->result_array();
                   foreach ($vendor as $ven){                       
                       
                  }                  
                  $fuel_mgt =  $this->db->get_where('fuel_mgt',array('fuel_mgt_id' => $row['fuel_mgt_id']))->result_array();
                   foreach ($fuel_mgt as $fuel){                       
                      $vehicle =  $this->db->get_where('tbl_vehicle',array('vehicle_id' => $fuel['vehicle_id']))->result_array();
                         foreach ($vehicle as $veh){                       
                            
                        }
                         $driver =  $this->db->get_where('tbl_driver',array('driver_id' => $fuel['driver_id']))->result_array();
                         foreach ($driver as $drv){  
                             $veh_entry = array('fuel_receipt_id' => $row['fuel_receipt_id'],'vendor_id' => $row['vendor_id'],'vendor_name' => $ven['vendor_name'],'vendor_contact' => $ven['vendor_contact'],'vehicle_id' => $veh['vehicle_id'], 'vehicle_no' => $veh['vehicle_no'], 'driver_id' => $drv['driver_id'],'driver_name' => $drv['driver_name'],'driver_contact' => $drv['driver_contact'],'cost' =>$fuel['cost'],'date' =>$row['date'],'receipt' => $row['receipt_path']);
                        }  
                  }
                   array_push($data, $veh_entry);
            }
            echo json_encode($data);
        }
        
         /******GET SUPERVISORISE ASSIGNED VEHICLE-TO FUEL DATA END*******/
        
        /******GET VENDORWISE ASSIGNED VEHICLE-TO FUEL DATA*******/
        
         public function getVendorfuelReceipts($id){
              $data = array();
              //$this->db->where('status',0);
             $this->db->where('vendor_id',$id);
            $fuel = $this->db->get('fuel_receipt')->result_array();
            foreach($fuel as $row){           
                
                  $fuel_mgt =  $this->db->get_where('fuel_mgt',array('fuel_mgt_id' => $row['fuel_mgt_id']))->result_array();
                   foreach ($fuel_mgt as $fuel){                       
                      $vehicle =  $this->db->get_where('tbl_vehicle',array('vehicle_id' => $fuel['vehicle_id']))->result_array();
                         foreach ($vehicle as $veh){                       
                            
                        }
                        $supervisor =  $this->db->get_where('tbl_supervisor',array('supervisor_id' => $fuel['supervisor_id']))->result_array();
                         foreach ($supervisor as $sup){                       
                            
                        }
                         $driver =  $this->db->get_where('tbl_driver',array('driver_id' => $fuel['driver_id']))->result_array();
                         foreach ($driver as $drv){  
                             $veh_entry = array('fuel_receipt_id' => $row['fuel_receipt_id'],'vehicle_id' => $veh['vehicle_id'], 'vehicle_no' => strtoupper($veh['vehicle_no']), 'driver_id' => $drv['driver_id'],'driver_name' => strtoupper($drv['driver_name']),'driver_contact' => $drv['driver_contact'],'supervisor_id' => $fuel['supervisor_id'],'supervisor_name' => $sup['supervisor_name'],'supervisor_contact' => $sup['supervisor_contact'],'cost' =>$fuel['cost'],'date' =>$row['date'],'receipt' => $row['receipt_path']);
                        }  
                  }
                   array_push($data, $veh_entry);
            }
            echo json_encode($data);
        }
        
         /******GET VENDORWISE ASSIGNED VEHICLE-TO FUEL DATA END*******/
        
/*******APP API'S END************/        

public function fule_Receipt()
	{
		$where=array(
						'fuel_receipt.supervisor_id'=>$this->session->userdata('supervisor_id')
			);
		$this->db->select('fuel_receipt.*,tbl_vendor.vendor_name,tbl_vendor.vendor_contact,tbl_supervisor.supervisor_name,tbl_supervisor.supervisor_contact,fuel_mgt.*,tbl_vehicle.vehicle_no,tbl_driver.driver_name,tbl_driver.driver_contact');
		$this->db->join('tbl_vendor','tbl_vendor.vendor_id=fuel_receipt.vendor_id');
		$this->db->join('tbl_supervisor','tbl_supervisor.supervisor_id=fuel_receipt.supervisor_id');
		$this->db->join('fuel_mgt','fuel_mgt.fuel_mgt_id=fuel_receipt.fuel_mgt_id');
		$this->db->join('tbl_vehicle','tbl_vehicle.vehicle_id=fuel_mgt.vehicle_id');
		$this->db->join('tbl_driver','tbl_driver.driver_id=fuel_mgt.driver_id');
		$this->data['fule_Receipt']=$this->admin->record_list('fuel_receipt',$where);
		$this->data['page_title']='Fuel Receipt';
		$this->load->view('Supervisor/header',$this->data);
		$this->load->view('Supervisor/fuel_receipt',$this->data);
	}
public function assign_fuel()
	{
		if(isset($_POST['assign_fuel']))
		{
			$this->form_validation->set_rules('assign_id', 'Vehicle No', 'required');
			$this->form_validation->set_rules('vendor_id', 'Driver Name', 'required');
			
			
			 if ($this->form_validation->run())
			{
				$wheredriver=array(
								'assign_id'=>$this->input->post('assign_id')
								);
				$details=$this->admin->record_list('tbl_assign',$wheredriver);
			 	  		$data['supervisor_id']=$this->session->userdata('supervisor_id');
	        			$data['assign_id']=$this->input->post('assign_id');
	        			$data['vendor_id']=$this->input->post('vendor_id');
	        			$data['vehicle_id']=$details[0]->vehicle_id;
	        			$data['driver_id']=$details[0]->driver_id;
	        			$data['cost']=$this->input->post('cost');
	        			$data['date']=$this->input->post('date');
				
	        			
					$fuel_ass=$this->admin->record_insert('fuel_mgt',$data);
					
					$this->session->set_flashdata('message_success','Assign Entry Successfully Added.');
					redirect(base_url().'Supervisor/assign_fuel');		
				}
			}



		$where=array(
						'fuel_mgt.supervisor_id'=>$this->session->userdata('supervisor_id')
			);
		 $this->db->select('fuel_mgt.*,tbl_vendor.vendor_name,tbl_vendor.vendor_contact,tbl_supervisor.supervisor_name,tbl_supervisor.supervisor_contact,tbl_vehicle.vehicle_no,tbl_driver.driver_name,tbl_driver.driver_contact');
		 $this->db->join('tbl_vendor','tbl_vendor.vendor_id=fuel_mgt.vendor_id');
		 $this->db->join('tbl_supervisor','tbl_supervisor.supervisor_id=fuel_mgt.supervisor_id');
		 
		 $this->db->join('tbl_vehicle','tbl_vehicle.vehicle_id=fuel_mgt.vehicle_id');
		 $this->db->join('tbl_driver','tbl_driver.driver_id=fuel_mgt.driver_id');
		$this->data['fuel_mgt']=$this->admin->record_list('fuel_mgt',$where);
		$this->db->select('tbl_assign.*,tbl_vehicle.vehicle_id,tbl_vehicle.vehicle_no,tbl_driver.driver_id,tbl_driver.driver_name');
		$this->db->join('tbl_vehicle','tbl_vehicle.vehicle_id=tbl_assign.vehicle_id');
		$this->db->join('tbl_driver','tbl_driver.driver_id=tbl_assign.driver_id');
		$this->data['assign']=$this->admin->record_list('tbl_assign');
		$this->data['vendor']=$this->admin->record_list('tbl_vendor');
		$this->data['page_title']='Assign Fuel';
		$this->load->view('Supervisor/header',$this->data);
		$this->load->view('Supervisor/assign_fuel',$this->data);
	}
        

	

public function Supervisor()
	{
		/******  Add Driver *******/
		if(isset($_POST['add_supervisor']))
		{
			$this->form_validation->set_rules('supervisor_name', 'Vendor Name', 'required');
			 
			
			 if ($this->form_validation->run())
			{
			
			$data=array( 	  
	        			'supervisor_name'=>$this->input->post('supervisor_name'),
	        			'supervisor_contact'=>$this->input->post('supervisor_contact'),
	        			'supervisor_alternet_contact'=>$this->input->post('supervisor_alternet_contact'),
	        			'supervisor_email'=>$this->input->post('supervisor_email'),
	        			'supervisor_address'=>$this->input->post('supervisor_address'),
	        			'pass'=>md5($this->input->post('pass')),
	        			'is_active'=>1
	        			);
					//echo"<pre>";print_r($data);die;

					$details=$this->admin->record_insert('tbl_supervisor',$data);
					$this->session->set_flashdata('message_success','Supervisor Successfully Added.');
					redirect(base_url().'Supervisor/Supervisor');		
				}
			}
		/****** End Add Driver ******/
		/****** Edit Driver *****/
			if(isset($_POST['update_supervisor']))
		{
			$this->form_validation->set_rules('supervisor_name', 'Vendor Name', 'required');
			 if ($this->form_validation->run())
			{
				
				$where =array( 	  
						'supervisor_id'=>$this->input->post('supervisor_id'),
	    			);	
				
					$data=array(
						'supervisor_name'=>$this->input->post('supervisor_name'),
	        			'supervisor_contact'=>$this->input->post('supervisor_contact'),
	        			'supervisor_alternet_contact'=>$this->input->post('supervisor_alternet_contact'),
	        			'supervisor_email'=>$this->input->post('supervisor_email'),
	        			'supervisor_address'=>$this->input->post('supervisor_address')
						);

					$vendors=$this->admin->records_update('tbl_supervisor',$data,$where);
					$this->session->set_flashdata('message_success','Supervisor Successfully update.');
					redirect(base_url().'Supervisor/Supervisor');		
				}
			}

			/****** End Edit Driver *****/
		$this->data['supervisor']=$this->admin->record_list('tbl_supervisor');
		$this->load->view('Supervisor/header');
		$this->load->view('Supervisor/supervisors',$this->data);
	}

	/***Delete Driver***/
	public function deleteSupervisor()
	{	
			$where=array(
				'supervisor_id'=>$this->uri->segment(3)
			);
		
		$vendor=$this->admin->record_list('tbl_supervisor',$where);

		if(!$vendor)
		{
		 	$this->session->set_flashdata('message_failed','Supervisor not Found...');
        	redirect(base_url().'Supervisor/Supervisor');
		}
		 

        $delete_id=$this->admin->records_delete('tbl_supervisor',$where);        
       
        if($delete_id){
        	$this->session->set_flashdata('message_success','Supervisor Deleted Successfully...');
        	redirect(base_url().'Supervisor/Supervisor');
    	}  
	}
	/*** ENd Delete Vendor***/

	

	


	



	public function logout()
	{
		$this->session->sess_destroy();	
		redirect(base_url().'login');
	}

}
