<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tirupatiapi extends CI_Controller {
	public function __construct()  
	{
		parent::__construct();	
		 date_default_timezone_set("Asia/Kolkata");		 
	}

        
/*********APP API'S********/
        
        /******SUPERVISOR LOGIN********/
        
        public function superviserLogin() {
             $this->form_validation->set_rules('contact', 'Contact', 'required|numeric');
            $this->form_validation->set_rules('password', 'Password', 'required');
            if ($this->form_validation->run() == FALSE)
                     {
                            $data['msg'] = 'All Fields Required.!';
                            $data['success'] = 0;
                    }
                    else
                     {
                            $contact= $this->input->post('contact');
                            $password =$this->input->post('password');

                            $credential = array('supervisor_contact' => $contact, 'password' => $password);
                            $data = $this->validate_login_info($contact,$password);
                    }
                 echo json_encode($data);
                            
        }
        
        public function validate_login_info($contact,$password){
		$password = strrev(sha1(md5($password)));
		$user = $this->db->get_where('tbl_supervisor', array('supervisor_contact' => $contact,'password' => $password));		
		//echo $sql = $this->db->last_query();
                if($user->num_rows() > 0) {
                        $row = $user->row();
                        $data['supervisor_id'] = $row->supervisor_id;
                        $data['email'] = $row->supervisor_email;
                        $data['name'] =  $row->supervisor_name;
                        $data['contact'] =  $row->supervisor_contact;
                        $data['profile_img'] =  $row->profile_pic;
                        $data["success"]=1;
                        $data['msg'] = 'Login Successful.!';
                }else{
			$data["success"]=0;
                        $data['msg'] = 'Login Failed..!';
		}
                return $data;
		
	}
	
	
	
	
	
	public function validateSuperviser($supervisor_id){
		$user = $this->db->get_where('tbl_supervisor', array('supervisor_id' => $supervisor_id));		
		//echo $sql = $this->db->last_query();
                if($user->num_rows() > 0) {
                        $row = $user->row();
                        $data["success"]='1';
                        $data['msg'] = 'Validation Successful.!';
                }else{
			$data["success"]='0';
                        $data['msg'] = 'Validation Failed..!';
		}
                echo json_encode($data);
		
	}
        /*******SUPERVISOR LOGIN END*******/
        
        /******SUPERVISOR FORGOT PASSWORD********/
        
        public function forgotSupervisorPass(){
            $this->form_validation->set_rules('contact', 'Contact', 'required|numeric');
            if ($this->form_validation->run() == FALSE)
                     {
                            $data['msg'] = 'Valid Contact Required.!';
                            $data['success'] = 0;
                    }
                    else{
                         $contact= $this->input->post('contact');
                         $supervisor = $this->db->get_where('tbl_supervisor', array('supervisor_contact' => $contact));
                         if($supervisor->num_rows() > 0) {
                            $code = rand(0,999999);
                            $row = $supervisor->row(); 
                            $supervisor_id = $row->supervisor_id;
                            $mob = $row->supervisor_contact;
                            $msg = "Use this Password Activation Code $code . This verification is important for the reset your password.";
                            //$msg = "Use $code for resetting your password.";
                            $sms = $this->send_message($mob,$msg);
                             if($sms==1){
                                 $dat['key']    = $code;
                                 $this->db->where('supervisor_id',$supervisor_id);
                                 $this->db->update('tbl_supervisor',$dat);
                                 
                                 $data['msg'] = 'Activation Code sent to Your Mobile.';
                                 $data['supervisor_id'] = $supervisor_id;
                                 $data['OTP'] = $code;
                                 $data['success'] = 1;
                             }
                             else{
                                 $data['msg'] = 'OTP Not Send..!';
                                 $data['success'] = 0;
                             }
                         }
                         
                    }
                echo json_encode($data);
        }
        
        /******SUPERVISOR FORGOT PASSWORD END********/
        
        /********SET SUPERVISOR NEW PASSWORD ********/
        public function setSupervisorPass(){                   
            $this->form_validation->set_rules('supervisor_id', 'supervisor id', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');
            $this->form_validation->set_rules('otp', 'OTP', 'required');
            if ($this->form_validation->run() == FALSE)
                     {
                            $data['msg']= 'All Fields Required..!';
                            $data['success'] = 0;
                     }
                    else
                     {
                        $cur_otp = $this->input->post('otp');
                            $this->db->where('supervisor_id',$this->input->post('supervisor_id'));
                            $this->db->limit(1);
                        $ex_otp = $this->db->get('tbl_supervisor')->row()->key;
                       if($ex_otp == $cur_otp){                           
                           $dat['key']    = '';
                           $dat['password']    = strrev(sha1(md5($this->input->post('password'))));
                           
                           $this->db->where('supervisor_id',$this->input->post('supervisor_id'));
                           $this->db->update('tbl_supervisor',$dat);                           
                           $data['msg']= 'Password Reset Successfully..!';
                           $data['success'] = 1;
                       }
                       else{
                           $data['msg']= 'Something Went Wrong..!';
                           $data['success'] = 0;
                       }
                        
                    }
             echo json_encode($data);
        }
        
        /******SET SUPERVISOR NEW PASSWORD END ******/
        
        /******VENDOR LOGIN********/
        
        public function vendorLogin() {
             $this->form_validation->set_rules('contact', 'Contact', 'required|numeric');
            $this->form_validation->set_rules('password', 'Password', 'required');
            if ($this->form_validation->run() == FALSE)
                     {
                            $data['msg'] = 'All Fields Required.!';
                            $data['success'] = 0;
                    }
                    else
                     {
                            $contact= $this->input->post('contact');
                            $password =$this->input->post('password');

                            $credential = array('contact' => $contact, 'password' => $password);
                            $data = $this->validate_vendor_login_info($contact,$password);
                    }
                 echo json_encode($data);
                            
        }
        
        public function validate_vendor_login_info($contact,$password){
		$password = strrev(sha1(md5($password)));
		$vendor = $this->db->get_where('tbl_vendor', array('vendor_contact' => $contact,'password' => $password));		
		//echo $sql = $this->db->last_query();
                if($vendor->num_rows() > 0) {
                        $row = $vendor->row();
                        $data['vendor_id'] =  $row->vendor_id;
                        $data['email'] = $row->vendor_email;
                        $data['vendor_name'] = $row->vendor_name;
                        $data['vendor_contact'] = $row->vendor_contact;
                        $data['profile_img'] =  $row->profile_pic;
                        $data["success"]=1;
                        $data['msg'] = 'Login Successful.!';
                }else{
			$data["success"]=0;
                        $data['msg'] = 'Login Failed..!';
		}
                return $data;
		
	}
	
	public function validateVendor($vendor_id){
	
		$user = $this->db->get_where('tbl_vendor', array('vendor_id' => $vendor_id));		
		//echo $sql = $this->db->last_query();
                if($user->num_rows() > 0) {
                        $row = $user->row();
                        $data["success"]='1';
                        $data['msg'] = 'Validation Successful.!';
                }else{
			$data["success"]='0';
                        $data['msg'] = 'Validation Failed..!';
		}
                echo json_encode($data);
		
	}
	
        /*******VENDOR LOGIN END*******/
        
        /******VENDOR FORGOT PASSWORD********/
        
        public function forgotVendorPass(){
            $this->form_validation->set_rules('contact', 'Contact', 'required|numeric');
            if ($this->form_validation->run() == FALSE)
                     {
                            $data['msg'] = 'Valid Contact Required.!';
                            $data['success'] = 0;
                    }
                    else{
                         $contact= $this->input->post('contact');
                         $vendor = $this->db->get_where('tbl_vendor', array('vendor_contact' => $contact));
                         if($vendor->num_rows() > 0) {
                            $code = rand(0,999999);
                            $row = $vendor->row(); 
                            $vendor_id = $row->vendor_id;
                            $mob = $row->vendor_contact;
                            $msg = "Use this Password Activation Code $code . This verification is important for the reset your password.";
                            //$msg = "Use $code for resetting your password.";
                            $sms = $this->send_message($mob,$msg);
                             if($sms==1){
                                 $dat['key']    = $code;
                                 $this->db->where('vendor_id',$vendor_id);
                                 $this->db->update('tbl_vendor',$dat);
                                 
                                 $data['msg'] = 'Activation Code sent to Your Mobile.';
                                 $data['vendor_id'] = $vendor_id;
                                 $data['OTP'] = $code;
                                 $data['success'] = 1;
                             }
                             else{
                                 $data['msg'] = 'OTP Not Send..!';
                                 $data['success'] = 0;
                             }
                         }
                         
                    }
                echo json_encode($data);
        }
        
        /******VENDOR FORGOT PASSWORD END********/
        
        /********SET VENDOR NEW PASSWORD ********/
        public function setVendorPass(){                   
            $this->form_validation->set_rules('vendor_id', 'supervisor id', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');
            $this->form_validation->set_rules('otp', 'OTP', 'required');
            if ($this->form_validation->run() == FALSE)
                     {
                            $data['msg']= 'All Fields Required..!';
                            $data['success'] = 0;
                     }
                    else
                     {
                        $cur_otp = $this->input->post('otp');
                            $this->db->where('vendor_id',$this->input->post('vendor_id'));
                            $this->db->limit(1);
                        $ex_otp = $this->db->get('tbl_vendor')->row()->key;
                       if($ex_otp == $cur_otp){                           
                           $dat['key']    = '';
                           $dat['password']    = strrev(sha1(md5($this->input->post('password'))));
                           
                           $this->db->where('vendor_id',$this->input->post('vendor_id'));
                           $this->db->update('tbl_vendor',$dat);                           
                           $data['msg']= 'Password Reset Successfully..!';
                           $data['success'] = 1;
                       }
                       else{
                           $data['msg']= 'Something Went Wrong..!';
                           $data['success'] = 0;
                       }
                        
                    }
             echo json_encode($data);
        }
        
        /******SET VENDOR NEW PASSWORD END ******/
        
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
	        			'driver_name'=> ucwords(strtolower($this->input->post('driver_name'))),
	        			'driver_contact'=>$this->input->post('driver_contact'),
                                        'alternat_contact'=>$this->input->post('alternate_contact'),
                                        'license'=> strtoupper($this->input->post('license')),
                                        'driver_address'=>$this->input->post('driver_address'),
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
            //$this->form_validation->set_rules('supervisor_id','Supervisor','required');
             if ($this->form_validation->run() == FALSE)
                     {
                            $data['msg']= validation_errors();
                            $data['success'] = 0;
                     }
                    else
                     {
                            $dat=array( 	  
	        			'owner_full_name'=> ucwords(strtolower($this->input->post('owner_name'))),
	        			'contact_no'=>$this->input->post('owner_contact'),
                                        'Email_id'=>strtolower($this->input->post('owner_email')),
                                        'Alternat_no'=>$this->input->post('alternate_no'),
                                        'owner_address'=>$this->input->post('address')
	        			//'supervisor_id'=>$this->input->post('supervisor_id')
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
            $this->form_validation->set_rules('fuel_limit','Fuel limit','required');
             if ($this->form_validation->run() == FALSE)
                     {
                            $data['msg']= validation_errors();
                            $data['success'] = 0;
                     }
                    else
                     {
                            $dat=array( 	  
	        			'vehicle_no'=> ucwords(strtolower($this->input->post('vehicle_no'))),
	        			'vehicle_owner_id'=>$this->input->post('vehicle_owner_id'),
                                        'fuel_limit'=>$this->input->post('fuel_limit')
	        			//'supervisor_id'=>$this->input->post('supervisor_id')
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
            //$this->form_validation->set_rules('supervisor_id','Supervisor','required');
          
             if ($this->form_validation->run() == FALSE)
                     {
                            $data['msg']= validation_errors();
                            $data['success'] = 0;
                     }
                    else
                     {
                            $dat=array( 	  
	        			'vendor_name' => ucwords(strtolower($this->input->post('vendor_name'))),
	        			'vendor_contact' =>$this->input->post('vendor_contact'),
                                        'vendor_email' => strtolower($this->input->post('vendor_email')),
                                        'password' =>  strrev(sha1(md5($this->input->post('password'))))
	        			//'supervisor_id' =>$this->input->post('supervisor_id')
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
        
        /*******ASSIGN DRIVER TO VEHICLE*****/
        
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
	        			'supervisor_id'=>$this->input->post('supervisor_id'),
	        			'is_active'=>1
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
        
        /******ASSIGN DRIVER TO VEHICLE END*****/
          
            /*******ADD VEHICLE TO VENDOR FOR FUEL*****/
        
            public function assignVehicleToFuel(){
            $this->form_validation->set_rules('vendor_id', 'Vendor ID', 'required');
            $this->form_validation->set_rules('vehicle_id', 'Vehicle ID', 'required');
            $this->form_validation->set_rules('driver_id','driver_id','required');
            $this->form_validation->set_rules('assign_id','assign_id','required');
            $this->form_validation->set_rules('date','date','required');
            $this->form_validation->set_rules('supervisor_id','Supervisor','required');
             if ($this->form_validation->run() == FALSE)
                     {
                            $data['msg']= 'All Fields Required..!';
                            $data['success'] = 0;
                     }
                    else
                     {	
                     			$vendor_id = $this->input->post('vendor_id');
                     			$vehicle_id = $this->input->post('vehicle_id');
                     			$driver_id = $this->input->post('driver_id');
                      			$assigncost= $this->input->post('cost');
                      			//$data['selection'] = $selection;
                                        //$status = $this->input->post('status');
                                        //$data['status'] = $status;
                                        //$rate = $this->db->get_where('tbl_vendor',array('vendor_id' => $vendor_id))->row()->todays_rate;
                                       //  $data['rate'] = $rate;
                                        /*if($status == 0){
                                        	$fuel_limit = round(($selection / $rate),2);
                                        	//$data['rate'] = $rate;
                                        	$assigncost = $selection;
                                        	$set_status = 1;
                                        }elseif($status == 1){
                                        	$assigncost = round(($selection * $rate),2);
                                        	$fuel_limit = $selection;
                                        	$set_status = 2;
                                        }*/
                                        
                                        
                            $dat=array( 	  
	        			'vendor_id' =>$vendor_id,
                                        'vehicle_id' =>$vehicle_id,
	        			'driver_id' =>$driver_id,
                                        'assign_id' =>$this->input->post('assign_id'),                                       
                                        'cost' => $assigncost,
                                        'date' =>$this->input->post('date'),
                                        'onlyday' =>date('Y-m-d'),
	        			'supervisor_id' =>$this->input->post('supervisor_id')
	        			);
                            
                                    $insert=$this->db->insert('fuel_mgt',$dat);
                                    
                                    $date = date('Y-m-d');
                                    $d = array('fill_count' =>1,'block' =>1,'blockdate' =>$date);
                                    $this->db->where('assign_id',$this->input->post('assign_id'));
                                    $this->db->update('tbl_assign',$d);
                                    
                                    
                                    $cost = $assigncost;
                                    $vehicle_data = $this->db->get_where('tbl_vehicle',array('vehicle_id' => $vehicle_id))->result_array();
                                    foreach($vehicle_data as $veh){
                                        $vehicle_no = $veh['vehicle_no'];
                                        $vehicle_owner_id = $veh['vehicle_owner_id'];
                                        $vehOwner = $this->db->get_where('vehicle_owner',array('vehicle_owner_id' => $vehicle_owner_id))->result_array();
                                        foreach($vehOwner as $vo){
                                            $name = $vo['owner_full_name'];
                                            $mob = $vo['contact_no'];
                                        }
                                    }
                                   
                                    $driver_data = $this->db->get_where('tbl_driver',array('driver_id' => $driver_id))->result_array();
                                    foreach ($driver_data as $dr){
                                        $driver = $dr['driver_name'];
                                        $contact = $dr['driver_contact'];
                                    }
                                
                                    $msg ="Hello $name , Vehicle $vehicle_no is assigned to fuel with cost Rs $cost Driver $driver and Contact $contact";
                                // $msg = "Hello $owner_name, Vehicle $vehicle_no is assigned to fuel with cost Rs$cost. Driver $driver_name and Contact $driver_contact";
                               
                                //$msg ="Hello $owner_name , Vehicle $vehicle_no is Successfully filled Fuel with cost Rs <variable> Driver <variable> and Contact <variable>";
                                $sms = $this->send_message($mob,$msg);
                                
                                
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
        
        public function setSupervisorData(){   
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
			$path='/home/ho32dn42y3yu/public_html/tirupati/assets/uploads/supervisors/'.$fileName;
                        
                            $data=array( 	  
                                        'supervisor_name' => ucwords(strtolower($this->input->post('supervisor_name'))),
                                        'supervisor_alternet_contact' =>$this->input->post('alternate_contact'),
                                        'supervisor_address' =>$this->input->post('supervisor_address'),
                                        'profile_pic'=>$fileName
	        			);                       

                        $result = file_put_contents($path, base64_decode($img)); 
                        
                               $this->db->where('supervisor_id',$this->input->post('supervisor_id'));
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
              $ven_entry = array('vendor_id' => $sup['vendor_id'], 'name' => $sup['vendor_name'], 'contact' => $sup['vendor_contact'],'alternate_contact' => $sup['vendor_alternate_contact'], 'email' => $sup['vendor_email'],'address' => $sup['vendor_address'],'GSTIN' => $sup['GST_NO'],'profile_img' => $sup['profile_pic']);
               array_push($data, $ven_entry);
              }                
                  
            echo json_encode($data);
        }
        
         /******GET SINGLE VENDOR DATA END*******/
        
        /******SET VENDOR DATA*******/
        
        public function setVendorData(){   
            $this->form_validation->set_rules('vendor_name', 'vendor name', 'required');
            $this->form_validation->set_rules('vendor_id', 'vendor id', 'required');
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
			$path='/home/ho32dn42y3yu/public_html/tirupati/assets/uploads/vendors/'.$fileName;
                        
                            $data=array( 	  
                                        'vendor_name' => ucwords(strtolower($this->input->post('vendor_name'))),
                                        'vendor_address' =>$this->input->post('vendor_address'),
                                        'vendor_alternate_contact' =>$this->input->post('alternate_contact'),
                                        'GST_NO' =>$this->input->post('gstin_no'),
                                        'profile_pic'=>$fileName
	        			);                       

                        $result = file_put_contents($path, base64_decode($img)); 
                        
                               $this->db->where('vendor_id',$this->input->post('vendor_id'));
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
        
                
         /******GET ALL DRIVER DATA*******/
        
        public function getAllDrivers(){
            $data = array();
            $driver = $this->db->get('tbl_driver')->result_array();
            foreach ($driver as $sup){                 
              $driver_entry = array('driver_id' => $sup['driver_id'], 'name' => ucwords($sup['driver_name']), 'contact' => $sup['driver_contact'],'alternate_contact' => $sup['alternat_contact'], 'address' => $sup['driver_address'],'licence_no' => strtoupper($sup['license']));
               array_push($data, $driver_entry);
              }
            echo json_encode($data);
        }
        /******GET ALL DRIVER DATA END*******/
        
        /******GET SUPERVISORWISE ALL DRIVER DATA*******/
        
        public function getDriver($id){
            $data = array();
            $this->db->where('supervisor_id',$id);
            $driver = $this->db->get('tbl_driver')->result_array();
            foreach ($driver as $sup){                 
              $driver_entry = array('driver_id' => $sup['driver_id'], 'name' => ucwords($sup['driver_name']), 'contact' => $sup['driver_contact'],'alternate_contact' => $sup['alternat_contact'], 'address' => $sup['driver_address'],'licence_no' => strtoupper($sup['license']));
               array_push($data, $driver_entry);
              }
            echo json_encode($data);
        }
        /******GET SUPERVISORWISE ALL DRIVER DATA END*******/
        
         /******GET DRIVERS WHICH NOT ASSIGNED TO VEHICLE DATA*******/
        
        public function getDriverForAssign(){
            $data = array();
            //$this->db->where('supervisor_id',$id);
            $driver = $this->db->get('tbl_driver')->result_array();
            foreach ($driver as $sup){ 
                 $drive = $this->db->get_where('tbl_assign',array('driver_id' =>$sup['driver_id']))->result_array();
                 if($drive){
                     
                 }
                 else{
                $driver_entry = array('driver_id' => $sup['driver_id'], 'name' => ucwords($sup['driver_name']), 'contact' => $sup['driver_contact'],'alternate_contact' => $sup['alternat_contact'], 'address' => $sup['driver_address'],'licence_no' => strtoupper($sup['license']));
                array_push($data, $driver_entry);
                 }
              }
            echo json_encode($data);
        }
        /******GET DRIVERS  WHICH NOT ASSIGNED TO VEHICLE DATA END*******/
        
        /******GET VEHICLE WHICH NOT ASSIGNED DRIVER DATA*******/
        
        public function getVehicleForAssign(){
            $data = array();
            //$this->db->where('supervisor_id',$id);
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
        /******GET VEHICLE WHICH NOT ASSIGNED DRIVER DATA END*******/
        
        
        /******GET VEHICLE NOT ASSIGNED  TO FUEL DATA*******/
        
        public function getVehicleForFuel(){
            $data = array();
            //$this->db->where('supervisor_id',$id);
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
        /******GET VEHICLE NOT ASSIGNED  TO FUEL DATA END*******/
        
         /******GET ALL VEHICLE DATA*******/
        
        public function getAllVehicles(){
            $data = array();
            $vehicle = $this->db->get('tbl_vehicle')->result_array();            
            foreach ($vehicle as $veh){
                  $owner =  $this->db->get_where('vehicle_owner',array('vehicle_owner_id' => $veh['vehicle_owner_id']))->result_array();
                   foreach ($owner as $own){
                   }
                    $veh_entry = array('vehicle_id' => $veh['vehicle_id'], 'vehicle_no' => strtoupper($veh['vehicle_no']), 'vehicle_owner_id' => $veh['vehicle_owner_id'],'owner_name' => ucwords($own['owner_full_name']), 'contact_no' => $own['contact_no']);                  
                    array_push($data, $veh_entry);
            }
            echo json_encode($data);
        }
         /******GET ALL VEHICLE DATA END*******/
        
        /******GET SUPERVISORWISE VEHICLE DATA*******/
        
        public function getVehicle($id){
            $data = array();
             $this->db->where('supervisor_id',$id);
            $vehicle = $this->db->get('tbl_vehicle')->result_array();            
            foreach ($vehicle as $veh){
                  $owner =  $this->db->get_where('vehicle_owner',array('vehicle_owner_id' => $veh['vehicle_owner_id']))->result_array();
                   foreach ($owner as $own){
                   }
                    $veh_entry = array('vehicle_id' => $veh['vehicle_id'], 'vehicle_no' => strtoupper($veh['vehicle_no']), 'vehicle_owner_id' => $veh['vehicle_owner_id'],'owner_name' => ucwords($own['owner_full_name']), 'contact_no' => $own['contact_no']);                  
                    array_push($data, $veh_entry);
            }
            echo json_encode($data);
        }
         /******GET SUPERVISORWISE VEHICLE DATA END*******/
        
         /******GET ALL VEHICLE-OWNER DATA*******/
        
        public function getVehicleOwner(){
            $data = array();
            $owner = $this->db->get('vehicle_owner')->result_array();
            foreach ($owner as $own){                       
                       $owner_entry = array('vehicle_owner_id' => $own['vehicle_owner_id'], 'name' => ucwords($own['owner_full_name']), 'address' => $own['owner_address'],'email' => $own['Email_id'], 'contact' => $own['contact_no'],'alternate_no' => $own['Alternat_no']);                  
                   
                        array_push($data, $owner_entry);
                    }
                   
            echo json_encode($data);
        }
         /******GET ALL VEHICLE-OWNER DATA END*******/
        
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
        
         /******GET ASSIGNED VEHICLE-DRIVER DATA*******/
        
         public function getAllAssignVehicleDriver(){
             //'blockdate',date('Y-m-d')
             $assined = $this->db->get('tbl_assign')->result_array();
              foreach($assined as $as){
                  $ass_id = $as['assign_id'];
                  $date = $as['blockdate'];
                  $ndate = date('Y-m-d');
                  if($date==$ndate){                      
                  }else{
                      $dat =array('block' => 0,'fill_count' => 0);
                       $this->db->where('assign_id',$ass_id);
                       $insert= $this->db->update('tbl_assign',$dat);
                  }
                  
              }
              $data = array();
            $this->db->where('is_active',1);
            $this->db->where('block',0);
            $assign = $this->db->get('tbl_assign')->result_array();
            foreach($assign as $row){  
                    $vehicle =  $this->db->get_where('tbl_vehicle',array('vehicle_id' => $row['vehicle_id']))->result_array();
                       foreach ($vehicle as $veh){                       
                           //$veh_entry = array('assign_id' => $row['assign_id'],'vehicle_id' => $row['vehicle_id'], 'vehicle_no' => $veh['vehicle_no'], 'driver_id' => $row['driver_id']);
                      }

                       $driver =  $this->db->get_where('tbl_driver',array('driver_id' => $row['driver_id']))->result_array();
                       foreach ($driver as $drv){  
                           $veh_entry = array('assign_id' => $row['assign_id'],'vehicle_id' => $row['vehicle_id'], 'vehicle_no' => $veh['vehicle_no'],'fuel_limit' => $veh['fuel_limit'], 'driver_id' => $row['driver_id'],'driver_name' => $drv['driver_name'],'driver_contact' => $drv['driver_contact']);
                      }                  
                       array_push($data, $veh_entry);
                
            }
            echo json_encode($data);
        }
         /******GET all ASSIGNED VEHICLE-DRIVER DATA END*******/
         
          /******GET ASSIGNED VEHICLE-DRIVER DATA*******/
        
         public function getAllAssignData(){
             //'blockdate',date('Y-m-d')
             /*$assined = $this->db->get('tbl_assign')->result_array();
              foreach($assined as $as){
                  $ass_id = $as['assign_id'];
                  $date = $as['blockdate'];
                  $ndate = date('Y-m-d');
                  if($date==$ndate){                      
                  }else{
                      $dat =array('block' => 0,'fill_count' => 0);
                       $this->db->where('assign_id',$ass_id);
                       $insert= $this->db->update('tbl_assign',$dat);
                  }
                  
              }*/
              $data = array();
            $this->db->where('is_active',1);
            //$this->db->where('block',0);
            $assign = $this->db->get('tbl_assign')->result_array();
            foreach($assign as $row){  
                    $vehicle =  $this->db->get_where('tbl_vehicle',array('vehicle_id' => $row['vehicle_id']))->result_array();
                       foreach ($vehicle as $veh){                       
                           //$veh_entry = array('assign_id' => $row['assign_id'],'vehicle_id' => $row['vehicle_id'], 'vehicle_no' => $veh['vehicle_no'], 'driver_id' => $row['driver_id']);
                      }

                       $driver =  $this->db->get_where('tbl_driver',array('driver_id' => $row['driver_id']))->result_array();
                       foreach ($driver as $drv){  
                           $veh_entry = array('assign_id' => $row['assign_id'],'vehicle_id' => $row['vehicle_id'], 'vehicle_no' => $veh['vehicle_no'],'fuel_limit' => $veh['fuel_limit'], 'driver_id' => $row['driver_id'],'driver_name' => $drv['driver_name'],'driver_contact' => $drv['driver_contact']);
                      }                  
                       array_push($data, $veh_entry);
                
            }
            echo json_encode($data);
        }
         /******GET all ASSIGNED VEHICLE-DRIVER DATA END*******/
        
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
                       $veh_entry = array('fuel_mgt_id' => $row['fuel_mgt_id'],'vendor_id' => $row['vendor_id'],'vendor_name' => ucwords($ven['vendor_name']),'vendor_contact' => $ven['vendor_contact'],'vehicle_id' => $row['vehicle_id'], 'vehicle_no' => strtoupper($veh['vehicle_no']), 'driver_id' => $row['driver_id'],'driver_name' => ucwords($drv['driver_name']),'driver_contact' => $drv['driver_contact'],'cost' => $row['cost'],'fuel_limit' => $row['fuel_limit'],'date' =>$row['date'],'supervisor_id' => $row['supervisor_id']);
                  }                  
                   array_push($data, $veh_entry);
            
         }
            echo json_encode($data);
        }
         /******GET SUPERVISORWISE ASSIGNED VEHICLE-TO FUEL DATA END*******/
        
        /******GET VENDORWISE ASSIGNED VEHICLE-TO FUEL DATA*******/
        
         public function getVendorwiseAssignVehicleTofuel($id){
              $data = array();
              $this->db->where('status',0);
             $this->db->where('vendor_id',$id);
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
                       $veh_entry = array('fuel_mgt_id' => $row['fuel_mgt_id'],'vendor_id' => $row['vendor_id'],'vendor_name' => ucwords($ven['vendor_name']),'vendor_contact' => $ven['vendor_contact'],'vehicle_id' => $row['vehicle_id'], 'vehicle_no' => strtoupper($veh['vehicle_no']), 'driver_id' => $row['driver_id'],'driver_name' => ucwords($drv['driver_name']),'driver_contact' => $drv['driver_contact'],'cost' => $row['cost'],'fuel_limit' => $row['fuel_limit'],'date' =>$row['date'],'supervisor_id' => $row['supervisor_id']);
                  }                  
                   array_push($data, $veh_entry);
            }
            echo json_encode($data);
        }
         /******GET VENDORWISE ASSIGNED VEHICLE-TO FUEL DATA END*******/
        
        /*********SEND OTP TO DRIVER FOR FUEL APPROVAL*****/
         public function sendOTPtoDriver(){             
            $this->form_validation->set_rules('fuel_mgt_id', 'Fuel Mgt ID', 'required');            
            $this->form_validation->set_rules('driver_id', 'driver id', 'required');
            $this->form_validation->set_rules('driver_name', 'driver name', 'required');
            $this->form_validation->set_rules('driver_contact', 'driver contact', 'required');
            $this->form_validation->set_rules('vehicle_no', 'vehicle no', 'required');
            $this->form_validation->set_rules('cost', 'Cost', 'required');
            if ($this->form_validation->run() == FALSE)
                     {
                            $data['msg']= 'All Fields Required..!';
                            $data['success'] = 0;
                     }
                    else
                     {
                        //$code = rand(0,999999);
                        $dname= $this->input->post('driver_name');
                        $veh_no= $this->input->post('vehicle_no');
                        $cost= $this->input->post('cost');
                        $contact = $this->input->post('driver_contact');
                        $driver_id = $this->input->post('driver_id');
                        $fuel_mgt_id = $this->input->post('fuel_mgt_id');
                        //$msg = "Hello $dname , Use $code for Approval of Fuel Filling to Vehicle $veh_no and Cost Rs $cost";
                        //$sms = $this->sentOtp($msg);
                        $sms = $this->sendOTP($contact,$fuel_mgt_id); 
                                    if($sms ==1){
                                        $data['msg']= 'OTP Sent to Driver Mobile Number..!';
                                        $data['success'] = 1;
                                    }else{
                                        $data['msg']= 'Something Went Wrong..!';
                                        $data['success'] = 0;
                                    }
                                    
                                    //$sms = $this->send_message($contact,$msg);
                                                         
                        
                    }
                     echo json_encode($data);
         }
         
         /**********SEND OTP FUNCTION***************/
	public function sendOTP($mobile='',$fuel_mgt_id=''){
				$data= array();			
				$authKey = "186319AETWcdPo5a213238";
				$mobileNumber = $mobile;
				$senderId = "TRTRVL";
				$rndno=rand(0, 999999);
				$message = "Your verification code is for fuel filling is ".$rndno.".";
				$route = "route=4";
				$email = "messages.tirupatitravels@gmail.com";
				$postData = array(
				'authkey' => $authKey,
				'mobiles' => $mobileNumber,
				'message' => $message,
				'otp' => $rndno,
				'sender' => $senderId,
				'route' => $route,
				'email' => $email
				);
				//API URL
				$url="http://control.msg91.com/api/sendotp.php";

				$curl = curl_init();

				curl_setopt_array($curl, array(
				  CURLOPT_URL => $url,
				  CURLOPT_RETURNTRANSFER => true,
				  CURLOPT_ENCODING => "",
				  CURLOPT_MAXREDIRS => 10,
				  CURLOPT_TIMEOUT => 30,
				  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				  CURLOPT_CUSTOMREQUEST => "POST",
				  CURLOPT_POSTFIELDS => $postData,
				  CURLOPT_SSL_VERIFYHOST => 0,
				  CURLOPT_SSL_VERIFYPEER => 0,
				));

				$data['response'] = curl_exec($curl);
				$data['err'] = curl_error($curl);

				curl_close($curl);

				if ($err) {
				  return 0;
				  //$data['response']=0;
				} 
				else {				
				  $fdata['otp'] = $rndno;
                                  $fdata['otp_status'] = 1;
                                  $this->db->where('fuel_mgt_id',$fuel_mgt_id);
                              return $insert= $this->db->update('fuel_mgt',$fdata);
                              //$data['response']=1;
                               
				}
				
			//echo json_encode($data);	
		}
		
		public function validateOTP(){
			$data= array();
			$cur_otp = $this->input->post('otp'); 
			$mobileNumber = $this->input->post('driver_contact'); 
				$authKey = "186319AETWcdPo5a213238";
				$url = "https://control.msg91.com/api/verifyRequestOTP.php";	
				$postData = array(
				'authkey' => $authKey,
				'mobiles' => $mobileNumber,
				'otp' => $cur_otp
				);	
				$curl = curl_init();

				curl_setopt_array($curl, array(
				  CURLOPT_URL => $url,
				  CURLOPT_RETURNTRANSFER => true,
				  CURLOPT_ENCODING => "",
				  CURLOPT_MAXREDIRS => 10,
				  CURLOPT_TIMEOUT => 30,
				  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				  CURLOPT_CUSTOMREQUEST => "POST",
				  CURLOPT_POSTFIELDS => $postData,
				  CURLOPT_SSL_VERIFYHOST => 0,
				  CURLOPT_SSL_VERIFYPEER => 0,
				  CURLOPT_HTTPHEADER => array(
					"content-type: application/x-www-form-urlencoded"
				  ),
				));

				$response = curl_exec($curl);
				$err = curl_error($curl);

				curl_close($curl);

				if ($err) {
				   $data["msg"]= $err;
				   $data['success'] = 0;
				}else{
				    $data['msg']= $response;
                           	    $data['success'] = 1;
				}
				
				echo json_encode($data);			
		}
		
	
	
	/*****OTP FUNCTION END*******************/
	
	
         public function validateDriverOTP(){ //optional
            $this->form_validation->set_rules('fuel_mgt_id', 'Fuel Mgt ID', 'required');            
            $this->form_validation->set_rules('driver_id', 'driver id', 'required');
            $this->form_validation->set_rules('driver_contact', 'driver contact', 'required');
            $this->form_validation->set_rules('otp', 'OTP', 'required');
            if ($this->form_validation->run() == FALSE)
                     {
                            $data['msg']= 'All Fields Required..!';
                            $data['success'] = 0;
                     }
                    else
                     {
                            $cur_otp = $this->input->post('otp');                        
                            $this->db->where('fuel_mgt_id',$this->input->post('fuel_mgt_id'));                            
                           $ex_otp = $this->db->get('fuel_mgt')->row()->otp;
                         //$ex_otp = 123456;
                       if($ex_otp == $cur_otp){
                            $data['msg']= 'Verified...!';
                           $data['success'] = 1;
                       }
                       else{
                           $data['msg']= 'OTP Error..!';
                           $data['success'] = 0;
                       }
                        
                    }
             echo json_encode($data);
         }
         
         public function sentOtp_demo($msg){
			$curl = curl_init();

			curl_setopt_array($curl, array(
			  CURLOPT_URL => $msg,
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => "",
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 30,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => "POST",
			  CURLOPT_POSTFIELDS => "",
			  CURLOPT_SSL_VERIFYHOST => 0,
			  CURLOPT_SSL_VERIFYPEER => 0,
			));
			
			$response = curl_exec($curl);
			$err = curl_error($curl);
			
			curl_close($curl);
			
			if ($err) {
			  //echo 0;
			} else {
			 // echo 1;
			}
			
		}
		
             public function sms(){
            $code=123;
            $name = "Sayyad";
            $vehicle_no = "MH 12 EJ 9700";
            $cost = 1000;
            $driver = "Kiran";
            $contact = 9922031316;
            //$msg ="Hello $name , Vehicle $vehicle_no is assigned to fuel with cost Rs $cost Driver $driver and Contact $contact";
            //$msg ="Use this Password Activation Code $code . This verification is important for the reset your password.";
            //$msg = "Hello $name, Vehicle $vehicle_no is assigned to fuel with cost Rs$cost . Driver $driver and Contact $contact";
            //$msg ="Hello <variable> , Use <variable> for Approval of Fuel Filling to Vehicle <variable> and Cost Rs <variable>";
              //$msg ="Hello $name, Vehicle $vehicle_no is assigned to fuel with cost Rs<variable>. Driver <variable> and Contact <variable>";
             //$msg = "Use this Password Activation Code <variable> . This verification is important for the reset your password.";
            $msg ="Hello $name , Vehicle $vehicle_no is Successfully filled Fuel with cost Rs $cost Driver $driver and Contact $contact";
            $mob=9225732186;
            $data = $this->send_message($mob,$msg);   
            echo $data;
        }
        
          public function send_message($mob,$msg)
	{
               $web_url = "http://www.sms123.in/QuickSend.aspx?";
                $url = $web_url.http_build_query(array('username'=> "tirupati",'password' => "tirupati",
                    'mob' => $mob,'msg' => $msg,'sender' => "TRTRVL"));	
                
	 	// $url = $web_url.http_build_query(array('username'=> "tirupati",'password' => "tirupati",
                 //   'mob' => $mob,'msg' => $msg,'sender' => "TRTRVL"));	
	 	 //echo  $url;
                 //echo $shortUrl=file_get_contents($url);
		$ch = curl_init();
		if($ch)
		{					
			curl_setopt($ch, CURLOPT_URL, $url); 
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
			$result = curl_exec($ch );
		
			curl_close( $ch );
			return 1;
		}
		else
		{
			return 0;
		}
	}
        
        
        /*********SEND OTP TO DRIVER FOR FUEL APPROVAL*****/
        
        /******UPLOAD FUEL RECEIPT DATA*******/
        
         public function uploadFuelReceipt(){
            $this->form_validation->set_rules('vendor_id', 'Vendor ID', 'required');
            $this->form_validation->set_rules('fuel_mgt_id', 'Fuel Mgt ID', 'required');
            $this->form_validation->set_rules('filled_cost', 'Fuel Filled Cost', 'required');
            $this->form_validation->set_rules('date','date','required');
            $this->form_validation->set_rules('supervisor_id','Supervisor','required');
             if ($this->form_validation->run() == FALSE)
                     {
                            $data['msg']= 'All Fields Required..!';
                            $data['success'] = 0;
                     }
                    else
                     {
                        
                        
                           $vendor_id = $this->input->post('vendor_id');
                     $filled_cost= $this->input->post('filled_cost');
                    // $rate = $this->db->get_where('tbl_vendor',array('vendor_id' => $vendor_id))->row()->todays_rate;                     
                     //$actual_filled_limit = round(($filled_cost / $rate),2);
                     
                        $img=$this->input->post('receipt');
			$extension="jpg";
			$fileName = uniqid().'.'.$extension;
			$path='/home/ho32dn42y3yu/public_html/tirupati/assets/uploads/receipts/'.$fileName;
                        
                            $dat=array( 	  
	        			'vendor_id' =>$vendor_id,
                                        'fuel_mgt_id' =>$this->input->post('fuel_mgt_id'),
                                        'filled_cost' =>$filled_cost,
                                        'receipt_path'=>$fileName,
                                        'date' =>$this->input->post('date'),
                                        'receipt_date'=> date('Y-m-d'),
	        			'supervisor_id' =>$this->input->post('supervisor_id')
	        			);                       
                     

                        $result = file_put_contents($path, base64_decode($img)); 
                        
			$insert=$this->db->insert('fuel_receipt',$dat);
                                $data['status'] = 1;
                                $this->db->where('fuel_mgt_id',$this->input->post('fuel_mgt_id'));
                                $this->db->update('fuel_mgt',$data);
                                
                                $fuel_mgt_id =$this->input->post('fuel_mgt_id');
                                $fuel_data = $this->db->get_where('fuel_mgt',array('fuel_mgt_id' => $fuel_mgt_id))->result_array();
                                $cost = $filled_cost;
                                foreach($fuel_data as $fl){
                                    $vehicle_id = $fl['vehicle_id'];
                                    
                                    $vehicle_data = $this->db->get_where('tbl_vehicle',array('vehicle_id' => $vehicle_id))->result_array();
                                    foreach($vehicle_data as $veh){
                                        $vehicle = $veh['vehicle_no'];
                                        $vehicle_owner_id = $veh['vehicle_owner_id'];
                                        $vehOwner = $this->db->get_where('vehicle_owner',array('vehicle_owner_id' => $vehicle_owner_id))->result_array();
                                        foreach($vehOwner as $vo){
                                            
                                            $name = $vo['owner_full_name'];
                                            $mob = $vo['contact_no'];
                                        }
                                    }
                                    $driver_id = $fl['driver_id'];
                                    $driver_data = $this->db->get_where('tbl_driver',array('driver_id' => $driver_id))->result_array();
                                    foreach ($driver_data as $dr){
                                        $driver = $dr['driver_name'];
                                        $contact = $dr['driver_contact'];
                                    }
                                }
                                $msg ="Hello $name , Vehicle $vehicle is Successfully filled Fuel with cost Rs $cost Driver $driver and Contact $contact";
                               $sms = $this->send_message($mob,$msg);
                                
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
        
        public function getFuelData($fuel_mgt_id){
            
        }
        /******GET SUPERVISORISE FUEL RECEIPT DATA*******/
        
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
                             $veh_entry = array('fuel_receipt_id' => $row['fuel_receipt_id'],'vendor_id' => $row['vendor_id'],'vendor_name' => ucwords($ven['vendor_name']),'vendor_contact' => $ven['vendor_contact'],'vehicle_id' => $veh['vehicle_id'], 'vehicle_no' => strtoupper($veh['vehicle_no']), 'driver_id' => $drv['driver_id'],'driver_name' => ucwords($drv['driver_name']),'driver_contact' => $drv['driver_contact'],'cost' =>$fuel['cost'],'filled_cost' =>$row['filled_cost'],'fuel_limit' =>$fuel['fuel_limit'],'date' =>$row['date'],'receipt' => $row['receipt_path']);
                        }  
                  }
                   array_push($data, $veh_entry);
            }
            echo json_encode($data);
        }
        
         /******GET SUPERVISORISE  FUEL RECEIPT DATA END*******/
        
         /******GET SUPERVISORISE AND DATEWISE FUEL RECEIPT DATA*******/
        
         public function getfuelReceiptsBysuperviorsDate(){
             $id  = $this->input->post('supervisor_id');
             $fromdate  = $this->input->post('fromdate');
             $todate = $this->input->post('todate');
              $data = array();
              $this->db->where('date >=', $fromdate);
                $this->db->where('date <=', $todate); 
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
                             $veh_entry = array('fuel_receipt_id' => $row['fuel_receipt_id'],'vendor_id' => $row['vendor_id'],'vendor_name' => ucwords($ven['vendor_name']),'vendor_contact' => $ven['vendor_contact'],'vehicle_id' => $veh['vehicle_id'], 'vehicle_no' => strtoupper($veh['vehicle_no']), 'driver_id' => $drv['driver_id'],'driver_name' => ucwords($drv['driver_name']),'driver_contact' => $drv['driver_contact'],'cost' =>$fuel['cost'],'filled_cost' =>$row['filled_cost'],'fuel_limit' =>$fuel['fuel_limit'],'date' =>$row['date'],'receipt' => $row['receipt_path']);
                        }  
                  }
                   array_push($data, $veh_entry);
            }
            echo json_encode($data);
        }
        
         /******GET SUPERVISORISE AND DATEWISE FUEL RECEIPT DATA END*******/
        
        /******GET VENDORWISE DATEWISE FUEL RECEIPT DATA*******/
        
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
                             $veh_entry = array('fuel_receipt_id' => $row['fuel_receipt_id'],'vehicle_id' => $veh['vehicle_id'], 'vehicle_no' => strtoupper($veh['vehicle_no']), 'driver_id' => $drv['driver_id'],'driver_name' => ucwords($drv['driver_name']),'driver_contact' => $drv['driver_contact'],'supervisor_id' => $fuel['supervisor_id'],'supervisor_name' => $sup['supervisor_name'],'supervisor_contact' => $sup['supervisor_contact'],'cost' =>$fuel['cost'],'filled_cost' =>$row['filled_cost'],'fuel_limit' =>$fuel['fuel_limit'],'date' =>$row['date'],'receipt' => $row['receipt_path']);
                        }  
                  }
                   array_push($data, $veh_entry);
            }
            echo json_encode($data);
        }
        
         /******GET VENDORWISE FUEL DATA END*******/
        
        /******GET VENDORWISE DATEWISE FUEL RECEIPT DATA*******/
        
         public function getVendorfuelReceiptsByDates(){
             $id  = $this->input->post('vendor_id');
             $fromdate  = $this->input->post('fromdate');
             $todate = $this->input->post('todate');
              $data = array();
              $this->db->where('date >=', $fromdate);
                $this->db->where('date <=', $todate);
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
                             $veh_entry = array('fuel_receipt_id' => $row['fuel_receipt_id'],'vehicle_id' => $veh['vehicle_id'], 'vehicle_no' => strtoupper($veh['vehicle_no']), 'driver_id' => $drv['driver_id'],'driver_name' => ucwords($drv['driver_name']),'driver_contact' => $drv['driver_contact'],'supervisor_id' => $fuel['supervisor_id'],'supervisor_name' => $sup['supervisor_name'],'supervisor_contact' => $sup['supervisor_contact'],'cost' =>$fuel['cost'],'filled_cost' =>$row['filled_cost'],'fuel_limit' =>$fuel['fuel_limit'],'date' =>$row['date'],'receipt' => $row['receipt_path']);
                        }  
                  }
                   array_push($data, $veh_entry);
            }
            echo json_encode($data);
        }
        
         /******GET VENDORWISE DATEWISE FUEL DATA END*******/
        
/*******APP API'S END************/        




}
