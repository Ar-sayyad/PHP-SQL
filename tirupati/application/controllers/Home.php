<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct()  
	{
		parent::__construct();	
		
		if(!$this->session->userdata('admin_email') && !$this->session->userdata('mobile_no') && !$this->session->userdata('admin_id'))
		{
		 	redirect(base_url().'login');
		 }	
		//echo $this->session->userdata('admin_email');die();		 
	}

	
	public function index()
	{
		$this->data['page_title']='Dashborad';
		$this->load->view('Admin/header',$this->data);
		$this->load->view('Admin/index');
	}
	public function profile()
	{
		/** Edit Profile start**/
		if(isset($_POST['btn_update']))
		{

			if($_FILES['admin_profile']['name']!= ""){
		    			$img_name='admin_profile';
		    			$img_path='profile';
		    			$old_img=$this->input->post('old_admin_profile');
			    		$profile=$this->admin->upload_image($img_name,$img_path,$old_img);
		            }
		            else
		            {
		            	$profile=$this->input->post('old_admin_profile');
		            }

		


			$whereuser =array( 	  
						'admin_email'=>$this->session->userdata('admin_email')
	    			);
			$data=array( 	  
						'admin_name'=>ucfirst($this->input->post('admin_name')),
		    			'admin_address'=>$this->input->post('admin_address'),
		    			'admin_alternatemobile'=>$this->input->post('admin_alternatemobile'),
		    			'profile_pic'=>$profile
		    			);
			$details=$this->admin->records_update('tbl_admin',$data,$whereuser);
			$this->session->set_userdata('admin_id', $details[0]->admin_id);
            $this->session->set_userdata('admin_email', $details[0]->admin_email);
            $this->session->set_userdata('admin_name', $details[0]->admin_name);
             $this->session->set_userdata('admin_profile', $details[0]->profile_pic);
			$this->session->set_flashdata('message_success',' Profile Successfully Updated.');
			redirect(base_url().'home/profile');	
		}
		/**End Edit Profile**/

		/*****Start Change Password******/
		if(isset($_POST['change_password']))
		{			
			$where=array( 
	            			'admin_email'=>$this->session->userdata('admin_email'),
	            			'password'=>strrev(sha1(md5($this->input->post('old_password'))))
			        		  );
			$verify=$this->admin->record_count('tbl_admin',$where);
			$this->form_validation->set_rules('old_password', 'Old Password', 'required');

			$this->form_validation->set_rules('new_password', 'Password', 'required|min_length[4]');
			$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[new_password]');

			if ($this->form_validation->run())
			{
				if($verify)
				{
					$where= array(
								'admin_email'=>$this->session->userdata('admin_email')
								);
								
					$data=array( 	            			
		            			'password'=>strrev(sha1(md5($this->input->post('new_password'))))
				        		  );
					$details=$this->admin->records_update('tbl_admin',$data,$where);
					
					if($details)
					{
						$this->session->set_flashdata('message_success','Profile Successfully Updated');
							
						redirect(base_url().'home/logout');
					}
				} 
				else
				{
					$this->session->set_flashdata('message_failed','Old Password Incorrect');
					redirect(base_url().'home/profile');
				}			
			}
		}

		/*****End Change Password******/

		$this->data['profile']=$this->admin->record_list('tbl_admin');
		$this->data['page_title']='Profile';
		$this->load->view('Admin/header',$this->data);
		$this->load->view('Admin/profile',$this->data);
	}
/*************Vehicle Owner**************/
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
	        			//'license'=>$license,
	        			//'id_proof'=>$id_proof,
	        			'is_active'=>1
	        			);
					//echo"<pre>";print_r($data);die;

					$details=$this->admin->record_insert('vehicle_owner',$data);
					$this->session->set_flashdata('message_success','Vehicle Owner Successfully Added.');
					redirect(base_url().'Home/VehicleOwner');		
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
	        			//'license'=>$license,
	        			//'id_proof'=>$id_proof,
	        			'is_active'=>1
						);

					$details=$this->admin->records_update('vehicle_owner',$data,$where);
					$this->session->set_flashdata('message_success','Owner Successfully update.');
					redirect(base_url().'Home/VehicleOwner');			
				}
			}

			/****** End Edit Driver *****/
		$this->db->order_by("vehicle_owner_id","desc");
		$this->data['vehicle_owner']=$this->admin->record_list('vehicle_owner');
		$this->data['page_title']='Vehicle Owner';
		$this->load->view('Admin/header',$this->data);
		$this->load->view('Admin/vehicleowner',$this->data);
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
        	redirect(base_url().'Home/VehicleOwner');
		}
		 

        $delete_id=$this->admin->records_delete('vehicle_owner',$where);        
       
        if($delete_id){
        	$this->session->set_flashdata('message_success','Owner Deleted Successfully...');
        	redirect(base_url().'Home/VehicleOwner');
    	}  
	}
/************* End Vehicle Owner**************/

/*********Start Vehicle**********/

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
	        			'is_active'=>1
	        			);
					

					$details=$this->admin->record_insert('tbl_vehicle',$data);
					$this->session->set_flashdata('message_success','Vehicle Successfully Added.');
					redirect(base_url().'home/addVehicle');		
				
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
					redirect(base_url().'home/addVehicle');		
				}
			}

			$wherecond=array(
							'is_active'=>1
							);

			$this->data['owner']=$this->admin->record_list('vehicle_owner',$wherecond);
			
			$this->db->select('tbl_vehicle.*,vehicle_owner.owner_full_name');
			$this->db->join('vehicle_owner','vehicle_owner.vehicle_owner_id = tbl_vehicle.vehicle_owner_id');
			

			$this->db->order_by('vehicle_id','desc');
		$this->data['vehicle']=$this->admin->record_list('tbl_vehicle');
		 //echo "<pre>";print_r($this->data['vehicle']);die;
		 $this->data['page_title']='Vehicle';
		$this->load->view('Admin/header',$this->data);
		$this->load->view('Admin/addvehicle',$this->data);
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
        	redirect(base_url().'home/addVehicle');
		}
		 

        $delete_id=$this->admin->records_delete('tbl_vehicle',$where);        
       
        if($delete_id){
        	$this->session->set_flashdata('message_success','Vehicle Deleted Successfully...');
        	redirect(base_url().'home/addVehicle');
    	}  
	}
/************* ENd  vehicle*************/

/***********Start Driver***************/
   public function driver()
	{
	
		if(isset($_POST['add_driver']))
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
	        			'is_active'=>1
	        			);
					

					$details=$this->admin->record_insert('tbl_driver',$data);
					$this->session->set_flashdata('message_success','Driver Successfully Added.');
					redirect(base_url().'home/driver');		
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
					redirect(base_url().'home/driver');		
				}
			}

		$this->db->order_by('driver_id','desc');
		$this->data['driver']=$this->admin->record_list('tbl_driver');
		$this->data['page_title']='Driver';
		$this->load->view('Admin/header',$this->data);
		$this->load->view('Admin/driver',$this->data);
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
        	redirect(base_url().'home/driver');
		}
		 

        $delete_id=$this->admin->records_delete('tbl_driver',$where);        
       
        if($delete_id){
        	$this->session->set_flashdata('message_success','Driver Deleted Successfully...');
        	redirect(base_url().'home/driver');
    	}  
	}
	/*********** ENd  Driver*************/

	/*****************Start Assign driver to vehicle***************/

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
	        			'is_active'=>1,
	        			);
				

					$details=$this->admin->record_insert('tbl_assign',$data);
					$data1=array(
								'assign_status'=> 1	
								);
					
					$detailsdriver=$this->admin->records_update('tbl_driver',$data1,$wheredriver);
					$detailsvehicle=$this->admin->records_update('tbl_vehicle',$data1,$wherevehicle);
					$this->session->set_flashdata('message_success','Assign Entry Successfully Added.');
					redirect(base_url().'home/assgin');		
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
					redirect(base_url().'home/assgin');		
				}
			}

			
			
			$where=array(
							'is_active'=> 1,
							'assign_status'=> 0
							
						);
			
		$this->data['vehicle']=$this->admin->record_list('tbl_vehicle',$where);
		
		$this->data['driver']=$this->admin->record_list('tbl_driver',$where);
		$this->db->select('tbl_assign.*,tbl_vehicle.vehicle_no,tbl_driver.driver_name,tbl_driver.driver_contact');
		$this->db->join('tbl_vehicle','tbl_vehicle.vehicle_id = 
			tbl_assign.vehicle_id');
		$this->db->join('tbl_driver','tbl_driver.driver_id = tbl_assign.driver_id');
		$this->db->order_by('assign_id','desc');
		$this->data['assign']=$this->admin->record_list('tbl_assign');
		$this->data['page_title']='Assign Driver To Vehicle';
		$this->load->view('Admin/header',$this->data);
		$this->load->view('Admin/assign',$this->data);
	}

	
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
        	redirect(base_url().'home/assgin');
		}
		 

        $delete_id=$this->admin->records_delete('tbl_assign',$where);        
       
        if($delete_id){
        	$this->session->set_flashdata('message_success','Assign Entry Release Successfully...');
        	redirect(base_url().'home/assgin');
    	}  
	}
	
/*****************End assign driver to vehicle****************************/
/***********Start Vendor *************/

public function Vendors()
	{
		
		if(isset($_POST['add_vendor']))
		{
			$this->form_validation->set_rules('vendor_name', 'Vendor Name', 'required');
			$this->form_validation->set_rules('vendor_contact','Vendor Contact','required|is_unique[tbl_vendor.vendor_contact]');
			 $this->form_validation->set_rules('vendor_email', 'Vendor Email', 'required');
			 $this->form_validation->set_rules('vendor_pass', 'Vendor Password', 'required');
			 $this->form_validation->set_rules('vendor_cpass', 'Vendor Confirm Password', 'required|matches[vendor_pass]');
			 $email=$this->input->post('vendor_email');
			 $password=$this->input->post('vendor_pass');
			
			 if ($this->form_validation->run())
			{
			
			$data=array( 	  
	        			'vendor_name'=>ucwords($this->input->post('vendor_name')),
	        			'vendor_address'=>$this->input->post('vendor_address'),
	        			'vendor_contact'=>$this->input->post('vendor_contact'),
	        			'vendor_alternate_contact'=>$this->input->post('vendor_alternate_contact'),
	        			'password'=>strrev(sha1(md5($this->input->post('vendor_pass')))),
	        			'vendor_email'=>$this->input->post('vendor_email'),
	        			'GST_NO'=>$this->input->post('GST_NO'),
	        			'is_active'=>1
	        			);
					

					$details=$this->admin->record_insert('tbl_vendor',$data);
					$findemail = $this->admin->Sendmail($email,$password);

					$this->session->set_flashdata('message_success','Vendor Successfully Added.');
					redirect(base_url().'Home/Vendors');		
				}
			}
		
			if(isset($_POST['update_vendor']))
		{
			$this->form_validation->set_rules('vendor_name', 'Vendor Name', 'required');
			 $this->form_validation->set_rules('vendor_contact','Vendor Contact','required');
			 if ($this->form_validation->run())
			{
				
				$where =array('vendor_id'=>$this->input->post('vendor_id'));	
				
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
					redirect(base_url().'Home/Vendors');		
				}
			}

		$this->db->order_by('vendor_id','desc');	
		$this->data['vendors']=$this->admin->record_list('tbl_vendor');
		$this->data['page_title']='Vendor';
		$this->load->view('Admin/header',$this->data);
		$this->load->view('Admin/vendors',$this->data);
	}

	
	public function deleteVendor()
	{	
			$where=array(
				'vendor_id'=>$this->uri->segment(3)
			);
		
		$vendor=$this->admin->record_list('tbl_vendor',$where);

		if(!$vendor)
		{
		 	$this->session->set_flashdata('message_failed','Vendor not Found...');
        	redirect(base_url().'Home/Vendors');
		}
		 

        $delete_id=$this->admin->records_delete('tbl_vendor',$where);        
       
        if($delete_id){
        	$this->session->set_flashdata('message_success','Vendor Deleted Successfully...');
        	redirect(base_url().'Home/Vendors');
    	}  
	}
/***********End Vendor ****************/
/***********Start Supervisor************/
public function Supervisor()
	{
		
		if(isset($_POST['add_supervisor']))
		{
			$this->form_validation->set_rules('supervisor_name', 'Supervisor Name', 'required');
			$this->form_validation->set_rules('supervisor_email', 'Supervisor Email', 'required');
			$this->form_validation->set_rules('pass', 'Password', 'required');
			$this->form_validation->set_rules('cpass', 'Confirm Password', 'required|matches[pass]');
			$this->form_validation->set_rules('supervisor_contact', 'Supervisor Contact', 'required'); 
			
			 if ($this->form_validation->run())
			{
                                $email=$this->input->post('supervisor_email');
				$password=$this->input->post('pass');
			
			$data=array( 	  
	        			'supervisor_name'=>ucwords($this->input->post('supervisor_name')),
	        			'supervisor_contact'=>$this->input->post('supervisor_contact'),
	        			'supervisor_alternet_contact'=>$this->input->post('supervisor_alternet_contact'),
	        			'supervisor_email'=>$this->input->post('supervisor_email'),
	        			'supervisor_address'=>$this->input->post('supervisor_address'),
	        			'password'=>strrev(sha1(md5($this->input->post('pass')))),
	        			'is_active'=>1
	        			);
					

					$details=$this->admin->record_insert('tbl_supervisor',$data);
					 $findemail = $this->admin->Sendmail($email,$password); 
					$this->session->set_flashdata('message_success','Supervisor Successfully Added.');
					redirect(base_url().'Home/Supervisor');		
				}
			}
		
			if(isset($_POST['update_supervisor']))
		{
			$this->form_validation->set_rules('supervisor_name', 'Supervisor Name', 'required');
			$this->form_validation->set_rules('supervisor_email', 'Supervisor Email', 'required');
			$this->form_validation->set_rules('supervisor_contact', 'Supervisor Contact', 'required');
			 if ($this->form_validation->run())
			{
				
				$where =array( 	  
						'supervisor_id'=>$this->input->post('supervisor_id')
	    			);	
				
					$data=array(
						'supervisor_name'=>ucwords($this->input->post('supervisor_name')),
	        			'supervisor_contact'=>$this->input->post('supervisor_contact'),
	        			'supervisor_alternet_contact'=>$this->input->post('supervisor_alternet_contact'),
	        			'supervisor_email'=>$this->input->post('supervisor_email'),
	        			'supervisor_address'=>$this->input->post('supervisor_address')
						);

					$vendors=$this->admin->records_update('tbl_supervisor',$data,$where);
					$this->session->set_flashdata('message_success','Supervisor Successfully update.');
					redirect(base_url().'Home/Supervisor');		
				}
			}

		$this->db->order_by('supervisor_id','desc');	
		$this->data['supervisor']=$this->admin->record_list('tbl_supervisor');
		$this->data['page_title']='Supervisor';
		$this->load->view('Admin/header',$this->data);
		$this->load->view('Admin/supervisors',$this->data);
	}

	
	public function deleteSupervisor()
	{	
			$where=array(
				'supervisor_id'=>$this->uri->segment(3)
			);
		
		$vendor=$this->admin->record_list('tbl_supervisor',$where);

		if(!$vendor)
		{
		 	$this->session->set_flashdata('message_failed','Supervisor not Found...');
        	redirect(base_url().'Home/Supervisor');
		}
		 

        $delete_id=$this->admin->records_delete('tbl_supervisor',$where);        
       
        if($delete_id){
        	$this->session->set_flashdata('message_success','Supervisor Deleted Successfully...');
        	redirect(base_url().'Home/Supervisor');
    	}  
	}

	public function publishSupervisor(){
         
            $where=array(
				'supervisor_id'=>$this->uri->segment(3)
			);
            $data=array(
            		'is_active'=>'1'
            		);
            $this->admin->records_update('tbl_supervisor',$data,$where);
					$this->session->set_flashdata('message_success','Supervisor Publish Successfully.');
					redirect(base_url().'Home/Supervisor');	
        
         
        }
        public function inactiveSupervisor(){
         
            $where=array(
				'supervisor_id'=>$this->uri->segment(3)
			);
            $data=array(
            		'is_active'=>'0');
            $this->admin->records_update('tbl_supervisor',$data,$where);
					$this->session->set_flashdata('message_success','Supervisor Inactive Successfully.');
					redirect(base_url().'Home/Supervisor');	
        
         
        }

/***********End Supervisor************/











/********* Start Subadmin**********/

	public function SubAdmin()
	{
		/******  Add Subadmin *******/
		if(isset($_POST['add_subadmin']))
		{
			$this->form_validation->set_rules('subadmin_name', 'Subadmin Name', 'required');
			 $this->form_validation->set_rules('subadmin_email','Subadmin Email ID','required|is_unique[tbl_subadmin.subadmin_email]');
			 $email=$this->input->post('subadmin_email');
			 $password=$this->input->post('password');
			
			 if ($this->form_validation->run())
			{
			
			$data=array( 	  
	        			'subadmin_name'=>ucwords($this->input->post('subadmin_name')),
	        			'subadmin_email'=>$this->input->post('subadmin_email'),
	        			'address'=>$this->input->post('address'),
	        			'subadmin_contact'=>$this->input->post('subadmin_contact'),
	        			'subadmin_alt_contact'=>$this->input->post('subadmin_alt_contact'),
	        			'password'=>strrev(sha1(md5($this->input->post('password')))),
	        			'is_active'=>1
	        			);
					//echo"<pre>";print_r($data);die;

					$details=$this->admin->record_insert('tbl_subadmin',$data);
					$findemail = $this->admin->Sendmail($email,$password);

					$this->session->set_flashdata('message_success','Subadmin Successfully Added.');
					redirect(base_url().'Home/SubAdmin');		
				}
			}
		/****** End Add Driver ******/
		/****** Edit Driver *****/
			if(isset($_POST['update_subadmin']))
		{
			$this->form_validation->set_rules('subadmin_name', 'Subadmin Name', 'required');
			 $this->form_validation->set_rules('subadmin_email','Subadmin Email ID','required|is_unique[tbl_subadmin.subadmin_email]');
			 if ($this->form_validation->run())
			{
				
				$where =array( 	  
						'subadmin_id'=>$this->input->post('subadmin_id'),
	    			);	
				
					$data=array(
						'subadmin_name'=>ucwords($this->input->post('subadmin_name')),
	        			'subadmin_email'=>$this->input->post('subadmin_email'),
	        			'address'=>$this->input->post('address'),
	        			'subadmin_contact'=>$this->input->post('subadmin_contact'),
	        			'subadmin_alt_contact'=>$this->input->post('subadmin_alt_contact'),
	        			'is_active'=>1
						);

					$subadmin=$this->admin->records_update('tbl_subadmin',$data,$where);
					$this->session->set_flashdata('message_success','Subadmin Successfully update.');
					redirect(base_url().'Home/SubAdmin');		
				}
			}

			/****** End Edit Driver *****/
		$this->data['subadmin']=$this->admin->record_list('tbl_subadmin');
		$this->data['page_title']='Subadmin';
		$this->load->view('Admin/header',$this->data);
		$this->load->view('Admin/subadmin',$this->data);
	}

	public function deleteSubAdmin()
	{	
			$where=array(
				'subadmin_id'=>$this->uri->segment(3)
			);
		
		$subadmin=$this->admin->record_list('tbl_subadmin',$where);

		if(!$subadmin)
		{
		 	$this->session->set_flashdata('message_failed','Subadmin not Found...');
        	redirect(base_url().'Home/SubAdmin');
		}
		 

        $delete_id=$this->admin->records_delete('tbl_subadmin',$where);        
       
        if($delete_id){
        	$this->session->set_flashdata('message_success','Subadmin Deleted Successfully...');
        	redirect(base_url().'Home/SubAdmin');
    	}  
	}




	/**************End Subadmin ************/
public function fule_Receipt()
	{
		$this->db->select('fuel_receipt.*,tbl_vendor.vendor_name,tbl_vendor.vendor_contact,tbl_supervisor.supervisor_name,tbl_supervisor.supervisor_contact,fuel_mgt.*,tbl_vehicle.vehicle_no,tbl_driver.driver_name,tbl_driver.driver_contact');
		$this->db->join('tbl_vendor','tbl_vendor.vendor_id=fuel_receipt.vendor_id');
		$this->db->join('tbl_supervisor','tbl_supervisor.supervisor_id=fuel_receipt.supervisor_id');
		$this->db->join('fuel_mgt','fuel_mgt.fuel_mgt_id=fuel_receipt.fuel_mgt_id');
		$this->db->join('tbl_vehicle','tbl_vehicle.vehicle_id=fuel_mgt.vehicle_id');
		$this->db->join('tbl_driver','tbl_driver.driver_id=fuel_mgt.driver_id');
		$this->data['fule_Receipt']=$this->admin->record_list('fuel_receipt');
		$this->data['page_title']='Fuel Receipt';
		$this->load->view('Admin/header',$this->data);
		$this->load->view('Admin/fuel_receipt',$this->data);
	}
public function assign_fuel()
	{
		 $this->db->select('fuel_mgt.*,tbl_vendor.vendor_name,tbl_vendor.vendor_contact,tbl_supervisor.supervisor_name,tbl_supervisor.supervisor_contact,tbl_vehicle.vehicle_no,tbl_driver.driver_name,tbl_driver.driver_contact');
		 $this->db->join('tbl_vendor','tbl_vendor.vendor_id=fuel_mgt.vendor_id');
		 $this->db->join('tbl_supervisor','tbl_supervisor.supervisor_id=fuel_mgt.supervisor_id');
		 
		 $this->db->join('tbl_vehicle','tbl_vehicle.vehicle_id=fuel_mgt.vehicle_id');
		 $this->db->join('tbl_driver','tbl_driver.driver_id=fuel_mgt.driver_id');
		$this->data['fuel_mgt']=$this->admin->record_list('fuel_mgt');
		$this->data['page_title']='Assign Fuel';
		$this->load->view('Admin/header',$this->data);
		$this->load->view('Admin/assign_fuel',$this->data);
	}



	/*** ENd Delete Vendor***/

	
	/*** ENd Delete Driver***/

	


	



	public function logout()
	{
		$this->session->sess_destroy();	
		redirect(base_url().'login');
	}

}
