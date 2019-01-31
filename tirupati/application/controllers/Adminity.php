<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adminity extends CI_Controller {
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
             if ($this->session->userdata('admin_login') == 1) {
                 $this->session->set_userdata('last_page', current_url());                  
                 $data['page_title'] = 'Dashboard';               
                 

             $vendor= $this->db->get('tbl_vendor')->result_array();
             
             
             
             /**data**/
             
             $jan=$this->admin->getmonthwise(1);
             $data["jan"] = (int)$jan;
           $feb=$this->admin->getmonthwise(2);
           $data["feb"]=(int)$feb;
            $mar=$this->admin->getmonthwise(3);
            $data["mar"]=(int)$mar;
             $apr=$this->admin->getmonthwise(4);
             $data["apr"]=(int)$apr;
              $may=$this->admin->getmonthwise(5);
               $data["may"]=(int)$may;
               $jun=$this->admin->getmonthwise(6);
               $data["jun"]=(int)$jun;
                  $jul=$this->admin->getmonthwise(7);
                     $data["jul"]=(int)$jul;
               $aug=$this->admin->getmonthwise(8);
                  $data["aug"]=(int)$aug;
            $sep=$this->admin->getmonthwise(9);
             $data["sep"]=(int)$sep;
             $oct=$this->admin->getmonthwise(10);
              $data["oct"]=(int)$oct;
            $nov=$this->admin->getmonthwise(11);
            $data["nov"]=(int)$nov;
                $dec=$this->admin->getmonthwise(12);
                 $data["dec"]=(int)$dec;
               
                   //  $l=$this->admin->getmonthwise(12);
             $xyz=$this->admin->get_year();
            $date =$this->input->post('fromdate');
          $v=explode("-",$date);

             for($i=1;$i<13;$i++)
             {

                           $monthNum  = $i;
     $monthName = date('F', mktime(0, 0, 0, $monthNum, 10));
       $maain="{name:'".$monthName."',id:'".$monthName."',data:[";
     
              $days=cal_days_in_month(CAL_GREGORIAN,$i,$v[0]);
              for($j=1;$j<=$days;$j++)
              {
                 $days_cnt=$this->admin->get_days_cnt($j,$i,$v[0]);
                 $days_cnts = (int)$days_cnt;
         
    
              $maain.=" ['".$j."',".$days_cnts." ],";
                 
              }
             $maain.=" ]},";
            $finaal=$finaal."\n".$maain;
                 
     
             }
              $data['maain']= $finaal;
             
             /**data end**/
             
             foreach($vendor as $v)
            {
                $count=$this->admin->get_today_cnt($v['vendor_id']);
                $int = (int)$count;         
                $maaindata="{ name:'".$v['vendor_name']."', y:".$int .", drilldown:"."'".$v['vendor_name']."' },";
                $finaalMain=$finaalMain."\n".$maaindata;
            }     
                $data['maainseries']= $finaalMain;     
                 $this->load->view('myadmin/index',$data);			
            }
            elseif($this->session->userdata('subadmin_login') == 1){
                 redirect(base_url().'Subadmin');
                
            }
            elseif($this->session->userdata('authuser_login') == 1){
                 redirect(base_url().'Auth');
                
            }else{
                    $data['page_title'] = 'Login';
                    $this->load->view('myadmin/login',$data);
		}


	}       
        
         public function monthwise()
    {
   // echo $this->input->post('vendor');die; 
     $count=$this->admin->gettoday_month();
        $data['current_month']= (int)$count; 
      //  echo "<pre>";print_r($data['current_month']);die;
        $count1=$this->admin->getnext_month();
         $data['next_month']=(int)$count1;

                  $data['page_title'] = 'Monthwise Report';
                    $this->load->view('myadmin/monthwise_report',$data);
    }   
      

        public function yearwise()
    {  $count=$this->admin->gettoday_year();
        $data['current_month']= (int)$count; 
      //  echo "<pre>";print_r($data['current_month']);die;
        $count1=$this->admin->getnext_year();
         $data['next_month']=(int)$count1;

                  $data['page_title'] = 'YearWise Report';
                    $this->load->view('myadmin/yearwise_report',$data);
    }   
    
    /******GENERATE OTP****/
        public function generateOtp(){
            $date = date('Y-m-d');           
            $this->db->order_by('otp_id','desc');
            $this->db->limit(1);
            $otp_data = $this->db->get_where('otp')->result_array();  
            foreach($otp_data as $ot){
                 $otp_id = $ot['otp_id'];
                 $sys_date = $ot['date'];               
            }
             $code = rand(0,999999);
            if ($date != $sys_date) {               
                $data=array('OTP'=>$code,'date'=>date('Y-m-d'));
                $where =array('otp_id'=>$otp_id);
                $details=$this->admin->records_update('otp',$data,$where);
                                       // $this->session->set_flashdata('msg_ok','<i class="ti-check-box"></i> OTP Generated Successfully.');
                                        //redirect(base_url().'Adminity/generateOtp'); 
                $subadmins = $this->db->get('tbl_subadmin')->result_array();
                foreach($subadmins as $sub){
                 $contact = $sub['subadmin_contact']; 
                 $msg ="Use $code for todays vendor transactions. This is system generated.";
                 $data = $this->send_message($contact,$msg);
                }
           }      
                       
        }
        
        public function systemOTP(){
            if ($this->session->userdata('admin_login') != 1) {
                        $this->session->set_userdata('last_page', current_url());
                        redirect(base_url());
                       }
                       
             	$data['page_title']='System OTP';
                $this->db->order_by("otp_id","desc");
                $data['otp_info']=$this->admin->record_list('otp');
                $this->load->view('myadmin/otp_data',$data);
        }

        function  sendsms(){
            $code = 123456;
            $date = date('Y-m-d');
            $contact = 9922031316;
             $msg ="Use $code for todays vendor transactions. This is system generated.";
            $data = $this->send_message($contact,$msg);   
            echo $data;
        }

        public function send_message($mob,$msg)
	{
               $web_url = "http://www.sms123.in/QuickSend.aspx?";
                $url = $web_url.http_build_query(array('username'=> "tirupati",'password' => "tirupati",
                    'mob' => $mob,'msg' => $msg,'sender' => "TRTRVL"));	
                	
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



        /********GENERATE OTP END******/
        
        /*************VEHICLE OWNERS*********/
        
                public function vehicleOwners($task='',$vehicle_owner_id='')
                {
                    if ($this->session->userdata('admin_login') != 1) {
                        $this->session->set_userdata('last_page', current_url());
                        redirect(base_url());
                       }
                                        
                    if ($task == "delete") {
                        $where =array('vehicle_owner_id'=>$vehicle_owner_id);
                        $this->admin->delete_record('vehicle_owner',$where);
                        $this->session->set_flashdata('msg_ok', ('<i class="ti-check-box"></i> Record Removed Successfully.'));
                        redirect(base_url() .'Adminity/vehicleOwners');
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
                                            redirect(base_url().'Adminity/vehicleOwners');		
                            }
                        else {
                            $this->session->set_flashdata('err_msg',validation_errors());
                            redirect(base_url().'Adminity/vehicleOwners');
                        }
                    }
                    
                        $data['page_title']='Vehicle Owner';
                        $this->db->where('own_diesel_filler',0);
                        $this->db->order_by("vehicle_owner_id","desc");
                        $data['vehicle_owner_info']=$this->admin->record_list('vehicle_owner');
                        $this->load->view('myadmin/vehicle-owners',$data);
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
					redirect(base_url().'Adminity/vehicleOwners');		
			}
                    else {
                        $this->session->set_flashdata('err_msg',validation_errors());
                        redirect(base_url().'Adminity/vehicleOwners');
                    }
        }
                                
       public function vehicles($task='',$vehicle_id='')
	{
            if ($this->session->userdata('admin_login') != 1) {
                        $this->session->set_userdata('last_page', current_url());
                        redirect(base_url());
                       }
                       
                if ($task == "addVehicle") 
               {
                   $this->form_validation->set_rules('vehicle_no', 'Vehicle No', 'required|is_unique[tbl_vehicle.vehicle_no]');
		   $this->form_validation->set_rules('site_id[]', 'Site Name', 'required');	 
			 if ($this->form_validation->run())
			{
                             $site_list  = $this->input->post('site_id');       
                                $site_id  = json_encode($site_list);
                             $data=array( 	  
	        			'vehicle_no'=>strtoupper($this->input->post('vehicle_no')),
	        			'vehicle_owner_id'=>$this->input->post('vehicle_owner_id'),
	        			'seat_type'=>$this->input->post('seat_type'),
	        			'fuel_limit'=>$this->input->post('fuel_limit'),
                                        'site_id'=>$site_id,
	        			'is_active'=>1
	        			);					

					$details=$this->admin->record_insert('tbl_vehicle',$data);
					$this->session->set_flashdata('msg_ok','<i class="ti-check-box"></i> Vehicle Added Successfully.');
					redirect(base_url().'Adminity/vehicles');	
			}
                    else {
                        $this->session->set_flashdata('err_msg',validation_errors());
                        redirect(base_url().'Adminity/vehicles');
                    }                    
                 }
                 if($task == "editVehicle"){
                     $this->form_validation->set_rules('vehicle_no', 'Vehicle No', 'required');
                     $this->form_validation->set_rules('site_id[]', 'Site Name', 'required');
			 if ($this->form_validation->run())
                            {
				$site_list  = $this->input->post('site_id');       
                                $site_id  = json_encode($site_list);
                                
				$where =array('vehicle_id'=>$vehicle_id);
				
					$data=array( 	        			
	        			'vehicle_no'=>strtoupper($this->input->post('vehicle_no')),
	        			'vehicle_owner_id'=>$this->input->post('vehicle_owner_id'),
                                        'seat_type'=>$this->input->post('seat_type'),
                                        'fuel_limit'=>$this->input->post('fuel_limit'),
                                        'site_id'=>$site_id,
	        			'is_active'=>1
	        			);

					$details=$this->admin->records_update('tbl_vehicle',$data,$where);
					$this->session->set_flashdata('msg_ok','<i class="ti-check-box"></i> Vehicle Updated Successfully.');
					redirect(base_url().'Adminity/vehicles');		
                         }else{
                             $this->session->set_flashdata('err_msg',validation_errors());
                             redirect(base_url().'Adminity/vehicles');
                         }
			
                 }
                 if ($task == "delete") {
                        $where =array('vehicle_id'=>$vehicle_id);
                        $this->admin->delete_record('tbl_vehicle',$where);
                        $this->session->set_flashdata('msg_ok', ('<i class="ti-check-box"></i> Record Removed Successfully.'));
                        redirect(base_url() .'Adminity/vehicles');
                    }
                 
                $this->db->where('own_diesel_filler',0);    
                $this->db->order_by("vehicle_id","desc");
                $data['vehicle_info']=$this->admin->record_list('tbl_vehicle');
		$data['page_title']='Vehicles';
		$this->load->view('myadmin/vehicles',$data);
	}
        
        
        
        /*****diesel owners****/
         public function dieselOwners($task='',$vehicle_owner_id='')
                {
                    if ($this->session->userdata('admin_login') != 1) {
                        $this->session->set_userdata('last_page', current_url());
                        redirect(base_url());
                       }
                      
                      if ($task == "add") {
                                  $this->form_validation->set_rules('owner_name', 'Owner Name', 'required');
                                  $this->form_validation->set_rules('owner_contact','Contact No','required|is_unique[vehicle_owner.contact_no]');
                                  $this->form_validation->set_rules('vehicle_no[]', 'Vehicle Number', 'required');
                                  $this->form_validation->set_rules('site_id[]', 'Site Name', 'required');
                                       if ($this->form_validation->run())
                                      {
                                            $site_list  = $this->input->post('site_id');       
                                            $site_id  = json_encode($site_list);
                                           $data=array( 	  
                                                      'owner_full_name'=>ucwords(strtolower($this->input->post('owner_name'))),
                                                      'contact_no'=>$this->input->post('owner_contact'),
                                                      'Email_id'=>$this->input->post('owner_email'),
                                                      'company_name'=>$this->input->post('company_name'),
                                                      'own_diesel_filler'=>1,
                                                      'site_id'=>$site_id
                                                      );
                                                      $details=$this->admin->record_insert('vehicle_owner',$data);
                                                      
                                                      /****Add Diesel Vehicle code****/
                                                      $vehicle_owner_id = $this->db->insert_id();
                                                      $vehicle_entries = array();
                                                      $vehicle_no  = $this->input->post('vehicle_no'); 
                                                      $seat_type  = $this->input->post('seat_type');
                                                      $nums     = sizeof($vehicle_no);
                                                      for ($i = 0; $i < $nums; $i++)
                                                      {
                                                          $dat =array('vehicle_no'=>$vehicle_no[$i],'seat_type'=>$seat_type[$i],'vehicle_owner_id'=>$vehicle_owner_id,'site_id'=>$site_id,'own_diesel_filler'=>'1');
                                                          $this->admin->record_insert('tbl_vehicle',$dat);
                                                      }
                                                      /****Add Diesel Vehicle code****/
                                                      
                                                      $this->session->set_flashdata('msg_ok','<i class="ti-check-box"></i> Diesel Owner Added Successfully.');
                                                      redirect(base_url().'Adminity/dieselOwners');		
                                      }
                                  else {
                                      $this->session->set_flashdata('err_msg',validation_errors());
                                      redirect(base_url().'Adminity/dieselOwners');
                                  }
                      }  
                    if ($task == "delete") {
                        $where =array('vehicle_owner_id'=>$vehicle_owner_id);
                        $this->admin->delete_record('tbl_vehicle',$where);
                        $this->session->set_flashdata('msg_ok', ('<i class="ti-check-box"></i> Record Removed Successfully.'));
                        redirect(base_url() .'Adminity/dieselOwners');
                    }
                    
                    if ($task == "update") {
                       
                        $this->form_validation->set_rules('owner_name', 'Owner Name', 'required');
                        $this->form_validation->set_rules('owner_contact','Contact No','required');
                       // $this->form_validation->set_rules('vehicle_no[]', 'Vehicle Number', 'required');
                        //$this->form_validation->set_rules('site_id[]', 'Site Name', 'required');
                             if ($this->form_validation->run())
                            {
                                 //$site_list  = $this->input->post('site_id');       
                                 //$site_id  = json_encode($site_list);
                                 $data=array( 	  
                                            'owner_full_name'=>ucwords(strtolower($this->input->post('owner_name'))),
                                            'contact_no'=>$this->input->post('owner_contact'),
                                            'Email_id'=>$this->input->post('owner_email'),
                                            'company_name'=>$this->input->post('company_name'),
                                            'own_diesel_filler'=>1
                                            //'site_id'=>$site_id
                                            );
                                             $where =array('vehicle_owner_id'=>$vehicle_owner_id);
                                            $details=$this->admin->records_update('vehicle_owner',$data,$where);
                                            
                                            //$where =array('diesel_owner_id'=>$diesel_owner_id);
                                            //$this->admin->delete_record('diesel_vehicles',$where);
                                            
                                            /*$vehicle_entries = array();
                                            $vehicle_no  = $this->input->post('vehicle_no'); 
                                            $seat_type  = $this->input->post('seat_type');
                                            $nums     = sizeof($vehicle_no);
                                            for ($i = 0; $i < $nums; $i++)
                                            {
                                                $dat =array('diesel_vehicle_no'=>$vehicle_no[$i],'seat_type'=>$seat_type[$i],'diesel_owner_id'=>$diesel_owner_id,'site_id'=>$site_id);
                                                $this->admin->record_insert('diesel_vehicles',$dat);
                                            }*/
                                            
                                            $this->session->set_flashdata('msg_ok','<i class="ti-check-box"></i> Diesel Owner Data Updated Successfully.');
                                            redirect(base_url().'Adminity/dieselOwners');	
                            }
                        else {
                            $this->session->set_flashdata('err_msg',validation_errors());
                            redirect(base_url().'Adminity/dieselOwners');
                        }
                    }
                    
                        $data['page_title']='Diesel Owners';
                        $this->db->where("own_diesel_filler",'1');
                        //$this->db->order_by("vehicle_owner_id","desc");
                        $data['diesel_owner_info']=$this->admin->record_list('vehicle_owner');
                        $this->load->view('myadmin/diesel-owners',$data);
                }
                
               
        
        /****diesel owners end*******/
        
        public function dieselVehicles($task='',$vehicle_id=''){
            if ($this->session->userdata('admin_login') != 1) {
                        $this->session->set_userdata('last_page', current_url());
                        redirect(base_url());
                       }
            if ($task == "addVehicle") 
               {
                   $this->form_validation->set_rules('vehicle_no', 'Vehicle No', 'required|is_unique[diesel_vehicles.diesel_vehicle_no]');
		   $this->form_validation->set_rules('site_id[]', 'Site Name', 'required');	 
			 if ($this->form_validation->run())
			{
                             $site_list  = $this->input->post('site_id');       
                             $site_id  = json_encode($site_list);
                             $data=array( 	  
	        			'vehicle_no'=>strtoupper($this->input->post('vehicle_no')),
	        			'vehicle_owner_id'=>$this->input->post('vehicle_owner_id'),
                                        'seat_type'=>$this->input->post('seat_type'),
                                        'own_diesel_filler'=>1,
                                        'site_id'=>$site_id
	        			);					

					$details=$this->admin->record_insert('tbl_vehicle',$data);
					$this->session->set_flashdata('msg_ok','<i class="ti-check-box"></i> Vehicle Added Successfully.');
					redirect(base_url().'Adminity/dieselVehicles');	
			}
                    else {
                        $this->session->set_flashdata('err_msg',validation_errors());
                        redirect(base_url().'Adminity/dieselVehicles');
                    }                    
                 }
                 if($task == "editVehicle"){
                     $this->form_validation->set_rules('vehicle_no', 'Vehicle No', 'required');
                     $this->form_validation->set_rules('site_id[]', 'Site Name', 'required');
			 if ($this->form_validation->run())
                            {
				$site_list  = $this->input->post('site_id');       
                                $site_id  = json_encode($site_list);
                                
				$where =array('vehicle_id'=>$vehicle_id);				
					$data=array( 	        			
	        			'vehicle_no'=>strtoupper($this->input->post('vehicle_no')),
	        			'vehicle_owner_id'=>$this->input->post('vehicle_owner_id'),
                                        'seat_type'=>$this->input->post('seat_type'),
                                        'own_diesel_filler'=>1,
                                        'site_id'=>$site_id
	        			);

					$details=$this->admin->records_update('tbl_vehicle',$data,$where);
					$this->session->set_flashdata('msg_ok','<i class="ti-check-box"></i> Vehicle Updated Successfully.');
					redirect(base_url().'Adminity/dieselVehicles');		
                         }else{
                             $this->session->set_flashdata('err_msg',validation_errors());
                             redirect(base_url().'Adminity/dieselVehicles');
                         }
			
                 }
                 if ($task == "delete") {
                        $where =array('vehicle_id'=>$vehicle_id);
                        $this->admin->delete_record('tbl_vehicle',$where);
                        $this->session->set_flashdata('msg_ok', ('<i class="ti-check-box"></i> Record Removed Successfully.'));
                        redirect(base_url() .'Adminity/dieselVehicles');
                    }
                 
                //$this->db->order_by("diesel_vehicle_id","desc");
                $this->db->where("own_diesel_filler",'1');
                $data['vehicle_info']=$this->admin->record_list('tbl_vehicle');
		$data['page_title']='Diesel Vehicles';
		$this->load->view('myadmin/diesel-vehicles',$data);
        }
        
        /******diesel vehicle end*****/
        
         public function sumList($task='',$sumlist_id=''){
        
        	 if ($this->session->userdata('admin_login') != 1) {
                        $this->session->set_userdata('last_page', current_url());
                        redirect(base_url());
                       }
                   if($task == 'addSumlist')
                {
                	$this->form_validation->set_rules('sum_name','sum name','required|is_unique[sumlist_table.sum_name]');
                	
                	 if ($this->form_validation->run())
			{
			    
                             $data=array( 	  
	        			'sum_name'=>ucwords($this->input->post('sum_name'))
	        			);					

					$details=$this->admin->record_insert('sumlist_table',$data);
					$this->session->set_flashdata('msg_ok','<i class="ti-check-box"></i> Sum List Added Successfully.');
					redirect(base_url().'Adminity/sumList');
				}
	                    else {
	                        $this->session->set_flashdata('err_msg',validation_errors());
	                        redirect(base_url().'Adminity/sumList');
	                    }           
		}
		 if($task == "editSumlist"){
                     $this->form_validation->set_rules('sum_name', 'sum name', 'required');
			 if ($this->form_validation->run())
                            {
                                
				$where =array('sumlist_id'=>$sumlist_id);				
					$data=array( 	        			
	        			'sum_name'=>strtoupper($this->input->post('sum_name'))
	        			);

					$details=$this->admin->records_update('sumlist_table',$data,$where);
					$this->session->set_flashdata('msg_ok','<i class="ti-check-box"></i> Sum List Updated Successfully.');
					redirect(base_url().'Adminity/sumList');		
                         }else{
                             $this->session->set_flashdata('err_msg',validation_errors());
                             redirect(base_url().'Adminity/sumList');
                         }
               }
		
		if ($task == "delete") {
                        $where =array('sumlist_id'=>$sumlist_id);
                        $this->admin->delete_record('sumlist_table',$where);
                        $this->session->set_flashdata('msg_ok', ('<i class="ti-check-box"></i> Record Removed Successfully.'));
                        redirect(base_url() .'Adminity/sumList');
                    }       
                 
                $data['sum_list_info']=$this->admin->record_list('sumlist_table');
		$data['page_title']='Sum List';
		$this->load->view('myadmin/sum_list',$data);
                       
        }
        
        public function summation($task='',$sum_id=''){
            if ($this->session->userdata('admin_login') != 1) {
                        $this->session->set_userdata('last_page', current_url());
                        redirect(base_url());
                       }
               if($task == 'makesum')
                {
                  $this->form_validation->set_rules('vehicle_owner_id', 'Owner Name', 'required');
                    $this->form_validation->set_rules('vehicle_id','Vehicle No','required');
                    $this->form_validation->set_rules('site_id','Site Name','required');
                    $this->form_validation->set_rules('sum_id[]','Sum Id','required');
                    $this->form_validation->set_rules('sum_name[]','Sum Name','required');
                    $this->form_validation->set_rules('total','Total Amount','required');
			 if ($this->form_validation->run())
			{
                             
                                //$site_id  = json_encode($site_list);
                                
                                $sum_entries      = array();
                                $sum_id           = $this->input->post('sum_id'); 
                                $sum_name         = $this->input->post('sum_name'); 
                                $sum              = $this->input->post('sum'); 
                                $no_of_entry = sizeof($sum_id);
                                
                                $arr =": ";
                                for ($i = 0; $i < $no_of_entry; $i++)
                                {
                                    $new_entry  = array('sum_name' => $sum_name[$i], 'sum' => $sum[$i]);
                                    array_push($sum_entries, $new_entry);
                                    
                                     $arr.=  implode(' = ', $new_entry);//msg
                                     $arr.=', ';
                                } 
                                $arr = rtrim($arr,', ');
                               	$arr.='.';
                               
                                $sumlist   = json_encode($sum_entries);
                              
                                $vehicle_id = $this->input->post('vehicle_id');
                                $where = array('vehicle_id'=>$vehicle_id);
                                $veh_info =$this->admin->record_list('tbl_vehicle',$where);
                                foreach($veh_info as $veh){
                                    $vehicle_no = $veh->vehicle_no;//msg
                                    $seat_type = $veh->seat_type;//msg
                                  }
                                $vehicle_owner_id = $this->input->post('vehicle_owner_id');
                                $where = array('vehicle_owner_id'=>$vehicle_owner_id);
                                $owner_info =$this->admin->record_list('vehicle_owner',$where);
                                foreach($owner_info as $own){
                                    $name = $own->owner_full_name;//msg
                                    $contact = 9225732186;//$own->contact_no;//msg
                                  }
                                $month =$this->input->post('month');//date('M-y');//msg
                                $total = $this->input->post('total');//msg
                                $site_id  = $this->input->post('site_id'); 
                             	$sitename= $this->admin->getSiteName($site_id);//msg
                                $data=array(
                                    'vehicle_owner_id'=>$vehicle_owner_id,
                                    'vehicle_id'=>$vehicle_id, 
                                    'site_id'=>$site_id,
                                    'month'=>$month,
                                    'route'=>$this->input->post('route'),
                                    'from_date'=>$this->input->post('from'),
                                    'to_date'=>$this->input->post('to'),
                                    'vehicle_no'=>$vehicle_no,
                                    'seat_type'=>$seat_type,
                                    'sumlist'=>$sumlist,
                                    'total'=>$total
                                    );                                     
                                        $details=$this->admin->record_insert('summation',$data);
                                        /***msg data***/   
                                        $com = $sitename." ".$month;
                                        $msg ="Hi , $name $vehicle_no $com $arr Total Amount $total Tirupati Travels."; 
                                        //$msg ="Hello , Name $name vehicle $vehicle_no seat $seat_type company $sitename month $month total $total . summary $arr";
                                        
                                        $sent = $this->send_message($contact,$msg);
                                        
                                        /***msg end***/
                                        
					$this->session->set_flashdata('msg_ok','<i class="ti-check-box"></i> Summation Data Added Successfully.');
					redirect(base_url().'Adminity/summation');	
                        } else {
                            $this->session->set_flashdata('err_msg',validation_errors());
                             redirect(base_url().'Adminity/summation');
                        }
              }
                            
              if ($task == "delete") {
                        $where =array('sum_id'=>$sum_id);
                        $this->admin->delete_record('summation',$where);
                        $this->session->set_flashdata('msg_ok', ('<i class="ti-check-box"></i> Record Removed Successfully.'));
                        redirect(base_url() .'Adminity/summation');
                    }
            
            //$this->db->order_by("driver_id","desc");
            $data['summation_info']=$this->admin->record_list('summation');
            $data['page_title']='Summation';
            $this->load->view('myadmin/summation',$data); 
        }


        public function getVehicleData(){
            $veh_owner_id = $this->input->post('owner_id');
            $where = array('vehicle_owner_id' =>$veh_owner_id);
            $vehicle_info=$this->admin->record_list('tbl_vehicle',$where);
            $data = '<select class="form-control etype" required="" name="vehicle_id" id="vehicle_id">
                <option value=""> ---Select Vehicle--- </option>';                
                foreach($vehicle_info as $row)
                {
                 $data.= '<option value="'.$row->vehicle_id.'">'.$row->vehicle_no.'</option>';
                }                
            $data.= '</select> ';            
            echo $data;            
        }

        
        
        public function drivers($task='',$driver_id='')
        {
            if ($this->session->userdata('admin_login') != 1) {
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
					redirect(base_url().'Adminity/drivers');	
                        } else {
                            $this->session->set_flashdata('err_msg',validation_errors());
                             redirect(base_url().'Adminity/drivers');
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
					redirect(base_url().'Adminity/drivers');		
			 }else {
                            $this->session->set_flashdata('err_msg',validation_errors());
                             redirect(base_url().'Adminity/drivers');
                        }
                }
                if ($task == "delete") {
                        $where =array('driver_id'=>$driver_id);
                        $this->admin->delete_record('tbl_driver',$where);
                        $this->session->set_flashdata('msg_ok', ('<i class="ti-check-box"></i> Record Removed Successfully.'));
                        redirect(base_url() .'Adminity/drivers');
                    }
            
            $this->db->order_by("driver_id","desc");
            $data['driver_info']=$this->admin->record_list('tbl_driver');
            $data['page_title']='Drivers';
            $this->load->view('myadmin/drivers',$data);            
        }
        
        
        public function vendors($task='',$vendor_id='')
        {
            if ($this->session->userdata('admin_login') != 1) {
                        $this->session->set_userdata('last_page', current_url());
                        redirect(base_url());
                       }
                       
            if($task == 'addVendor'){
                         $this->form_validation->set_rules('vendor_name', 'Vendor Name', 'required');
			 $this->form_validation->set_rules('vendor_contact','Vendor Contact','required|is_unique[tbl_vendor.vendor_contact]');
			 $this->form_validation->set_rules('vendor_email', 'Vendor Email', 'required|valid_email');
			 $this->form_validation->set_rules('vendor_pass', 'Vendor Password', 'required');
			 $this->form_validation->set_rules('vendor_cpass', 'Vendor Confirm Password', 'required|matches[vendor_pass]');
			 $email=$this->input->post('vendor_email');
			 $password=$this->input->post('vendor_pass');
			
			 if ($this->form_validation->run())
			{
                            $data=array( 	  
	        			'vendor_name'=>ucwords(strtolower($this->input->post('vendor_name'))),
	        			'vendor_address'=>$this->input->post('vendor_address'),
	        			'vendor_contact'=>$this->input->post('vendor_contact'),
	        			'vendor_alternate_contact'=>$this->input->post('vendor_alternate_contact'),
	        			'password'=>strrev(sha1(md5($this->input->post('vendor_pass')))),
	        			'vendor_email'=>strtolower($this->input->post('vendor_email')),
	        			'GST_NO'=>$this->input->post('GST_NO'),
	        			'is_active'=>1
	        			);
					$details=$this->admin->record_insert('tbl_vendor',$data);
					$findemail = $this->admin->Sendmail($email,$password);

					$this->session->set_flashdata('msg_ok','<i class="ti-check-box"></i> Vendor Added Successfully.');
					redirect(base_url().'Adminity/vendors');		
			}else {
                            $this->session->set_flashdata('err_msg',validation_errors());
                             redirect(base_url().'Adminity/vendors');
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
					redirect(base_url().'Adminity/vendors');		
			}else {
                            $this->session->set_flashdata('err_msg',validation_errors());
                             redirect(base_url().'Adminity/vendors');
                        }                 
             }
             if($task == 'delete'){
                        $where =array('vendor_id'=>$vendor_id);
                        $this->admin->delete_record('tbl_vendor',$where);
                        $this->session->set_flashdata('msg_ok', ('<i class="ti-check-box"></i> Record Removed Successfully.'));
                        redirect(base_url() .'Adminity/vendors');
             }
             
            $this->db->order_by("vendor_id","desc");
            $data['vendor_info']=$this->admin->record_list('tbl_vendor');
            $data['page_title']='Fuel Pumps';
            $this->load->view('myadmin/vendors',$data);
        }
        
        
	 public function sites($task='',$site_id='')
        {
            if ($this->session->userdata('admin_login') != 1) {
                        $this->session->set_userdata('last_page', current_url());
                        redirect(base_url());
                       }
                       
            if($task == 'addSite'){
                         $this->form_validation->set_rules('site_name', 'Site Name', 'required|is_unique[sites.site_name]');
			 $this->form_validation->set_rules('vendor_id[]', 'Vendor Name', 'required');
			 if ($this->form_validation->run())
			{
                                $vendor_list  = $this->input->post('vendor_id');       
                                $vendor_id  = json_encode($vendor_list);
                                $data=array( 	  
	        			'site_name'=>ucwords(strtolower($this->input->post('site_name'))),
	        			'vendor_id'=>$vendor_id
	        			);
					$details=$this->admin->record_insert('sites',$data);					
					$this->session->set_flashdata('msg_ok','<i class="ti-check-box"></i> Site data Added Successfully.');
					redirect(base_url().'Adminity/sites');		
			}else {
                            $this->session->set_flashdata('err_msg',validation_errors());
                             redirect(base_url().'Adminity/sites');
                        }
           }
             if($task == 'editSite'){
                         $this->form_validation->set_rules('site_name', 'Site Name', 'required');
                         $this->form_validation->set_rules('vendor_id[]', 'Vendor Name', 'required');
			 if ($this->form_validation->run())
			{
                             $vendor_list  = $this->input->post('vendor_id');       
                                $vendor_id  = json_encode($vendor_list);
                                $data=array(
					'site_name'=>ucwords(strtolower($this->input->post('site_name'))),
	        			'vendor_id'=>$vendor_id
                                        );                             
                                        $where =array('site_id'=>$site_id);
					$sites=$this->admin->records_update('sites',$data,$where);
					$this->session->set_flashdata('msg_ok','<i class="ti-check-box"></i> Site data Updated Successfully.');
					redirect(base_url().'Adminity/sites');		
			}else {
                            $this->session->set_flashdata('err_msg',validation_errors());
                             redirect(base_url().'Adminity/sites');
                        }                 
             }
             if($task == 'delete'){
                        $where =array('site_id'=>$site_id);
                        $this->admin->delete_record('sites',$where);
                        $this->session->set_flashdata('msg_ok', ('<i class="ti-check-box"></i> Record Removed Successfully.'));
                        redirect(base_url() .'Adminity/sites');
             }
             
            $this->db->order_by("site_id","desc");
            $data['site_info']=$this->admin->record_list('sites');
            $data['page_title']='Sites';
            $this->load->view('myadmin/sites',$data);
        }
        
        
        
	public function supervisors($task='',$supervisor_id='')
        {
            if ($this->session->userdata('admin_login') != 1) {
                        $this->session->set_userdata('last_page', current_url());
                        redirect(base_url());
                       }
                       
            if($task == 'addSupervisor'){
                        $this->form_validation->set_rules('supervisor_name', 'Supervisor Name', 'required');
			$this->form_validation->set_rules('supervisor_email', 'Supervisor Email', 'required|valid_email');
			$this->form_validation->set_rules('pass', 'Password', 'required');
			$this->form_validation->set_rules('cpass', 'Confirm Password', 'required|matches[pass]');
			$this->form_validation->set_rules('supervisor_contact', 'Supervisor Contact', 'required|numeric|is_unique[tbl_supervisor.supervisor_contact]'); 
                        $this->form_validation->set_rules('site_id[]', 'Site Name', 'required');
			
			 if ($this->form_validation->run())
			{
                             $site_list  = $this->input->post('site_id');       
                                $site_id  = json_encode($site_list);
                                $data=array( 	  
	        			'supervisor_name'=>ucwords(strtolower($this->input->post('supervisor_name'))),
	        			'supervisor_contact'=>$this->input->post('supervisor_contact'),
	        			'supervisor_alternet_contact'=>$this->input->post('supervisor_alternet_contact'),
	        			'supervisor_email'=>strtolower($this->input->post('supervisor_email')),
	        			'password'=>strrev(sha1(md5($this->input->post('pass')))),
                                        'site_id'=>$site_id,
	        			'is_active'=>1
	        			);
					
                                        $email=$this->input->post('supervisor_email');
                                        $password=$this->input->post('pass');			
					$details=$this->admin->record_insert('tbl_supervisor',$data);
					 $findemail = $this->admin->Sendmail($email,$password); 
					$this->session->set_flashdata('msg_ok','<i class="ti-check-box"></i> Supervisor Added Successfully.');
					redirect(base_url().'Adminity/supervisors');		
			}else {
                            $this->session->set_flashdata('err_msg',validation_errors());
                             redirect(base_url().'Adminity/supervisors');
                        } 
             }
             
             if($task == 'editSupervisor'){
                 $this->form_validation->set_rules('supervisor_name', 'Supervisor Name', 'required');
			$this->form_validation->set_rules('supervisor_email', 'Supervisor Email', 'required|valid_email');
			$this->form_validation->set_rules('supervisor_contact', 'Supervisor Contact', 'required|numeric');
                        $this->form_validation->set_rules('site_id[]', 'Site Name', 'required');
			 if ($this->form_validation->run())
			{
                             $site_list  = $this->input->post('site_id');       
                                $site_id  = json_encode($site_list);
				$data=array(
					'supervisor_name'=>ucwords(strtolower($this->input->post('supervisor_name'))),
	        			'supervisor_contact'=>$this->input->post('supervisor_contact'),
	        			'supervisor_alternet_contact'=>$this->input->post('supervisor_alternet_contact'),
	        			'supervisor_email'=>strtolower($this->input->post('supervisor_email')),
                                        'site_id'=>$site_id
                                        );
                                
                                        $where =array('supervisor_id'=>$supervisor_id);
					$vendors=$this->admin->records_update('tbl_supervisor',$data,$where);
					$this->session->set_flashdata('msg_ok','<i class="ti-check-box"></i> Supervisor Updated Successfully.');
					redirect(base_url().'Adminity/supervisors');		
			}else {
                            $this->session->set_flashdata('err_msg',validation_errors());
                             redirect(base_url().'Adminity/supervisors');
                        } 
             }
             
            if($task == 'delete'){
                        $where =array('supervisor_id'=>$supervisor_id);
                        $this->admin->delete_record('tbl_supervisor',$where);
                        $this->session->set_flashdata('msg_ok', ('<i class="ti-check-box"></i> Record Removed Successfully.'));
                        redirect(base_url() .'Adminity/supervisors');
             }
             
            $this->db->order_by("supervisor_id","desc");
            $data['supervisor_info']=$this->admin->record_list('tbl_supervisor');
            $data['page_title']='Supervisors';
            $this->load->view('myadmin/supervisors',$data);
        }
        
        
        
        public function subadmin($task='',$subadmin_id='')
        {
            if ($this->session->userdata('admin_login') != 1) {
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
					redirect(base_url().'Adminity/subadmin');		
			}else {
                            $this->session->set_flashdata('err_msg',validation_errors());
                             redirect(base_url().'Adminity/subadmin');
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
					redirect(base_url().'Adminity/subadmin');		
			}else {
                            $this->session->set_flashdata('err_msg',validation_errors());
                             redirect(base_url().'Adminity/subadmin');
                        }
             }
            
             if($task == 'delete'){
                        $where =array('subadmin_id'=>$subadmin_id);
                        $this->admin->delete_record('tbl_subadmin',$where);
                        $this->session->set_flashdata('msg_ok', ('<i class="ti-check-box"></i> Record Removed Successfully.'));
                        redirect(base_url() .'Adminity/subadmin');
             }
            $this->db->order_by("subadmin_id","desc");
            $data['subadmin_info']=$this->admin->record_list('tbl_subadmin');
            $data['page_title']='Subadmin';
            $this->load->view('myadmin/subadmin',$data);
        }
        
        
        public function assignedDrivers($task = '',$assign_id = '',$is_active = '')
        {
            if ($this->session->userdata('admin_login') != 1) {
                        $this->session->set_userdata('last_page', current_url());
                        redirect(base_url(). 'Adminity');
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
					redirect(base_url().'Adminity/assignedDrivers');		
			}else {
                            $this->session->set_flashdata('err_msg',validation_errors());
                             redirect(base_url().'Adminity/assignedDrivers');
                        }
            }
            if($task == 'delete'){
                        $where =array('assign_id'=>$assign_id);
                        $this->admin->delete_record('tbl_assign',$where);
                        $this->session->set_flashdata('msg_ok', ('<i class="ti-check-box"></i> Record Release Successfully.'));
                        redirect(base_url() .'Adminity/assignedDrivers');
             }
             
             if($task == 'block'){
             		$data=array('is_active'=>$is_active);	        			
                        $where =array('assign_id'=>$assign_id);
                        $subadmin=$this->admin->records_update('tbl_assign',$data,$where);
                        //$this->admin->delete_record('tbl_assign',$where);
                        $this->session->set_flashdata('msg_ok', ('<i class="ti-check-box"></i> Vehicle Status Updated Successfully.'));
                        redirect(base_url() .'Adminity/assignedDrivers');
             }
             if($task == 'reassign'){
             		$data=array('block'=>$is_active);	        			
                        $where =array('assign_id'=>$assign_id);
                        $subadmin=$this->admin->records_update('tbl_assign',$data,$where);
                        $this->session->set_flashdata('msg_ok', ('<i class="ti-check-box"></i> Vehicle Status Updated Successfully.'));
                        redirect(base_url() .'Adminity/assignedDrivers');
             }
                
                
		$this->db->select('tbl_assign.*,tbl_vehicle.vehicle_no,tbl_driver.driver_name,tbl_driver.driver_contact');
		$this->db->join('tbl_vehicle','tbl_vehicle.vehicle_id = tbl_assign.vehicle_id');
		$this->db->join('tbl_driver','tbl_driver.driver_id = tbl_assign.driver_id');
		$this->db->order_by('assign_id','desc');
            $data['assignedDrivers_info']=$this->admin->record_list('tbl_assign');
            $data['page_title']='Assigned Driver to Vehicle';
            $this->load->view('myadmin/assignedDrivertoVehicle',$data);
        }
        
        
        
        public function vehiclestoFuel($task='',$fuel_mgt_id='')
        {
            if ($this->session->userdata('admin_login') != 1) {
                        $this->session->set_userdata('last_page', current_url());
                        redirect(base_url());
                       }
if($task == 'delete'){
                        $where =array('fuel_mgt_id'=>$fuel_mgt_id);
                        $this->admin->delete_record('fuel_mgt',$where);
                        $this->session->set_flashdata('msg_ok', ('<i class="ti-check-box"></i> Record Deleted Successfully.'));
                        redirect(base_url() .'Adminity/vehiclestoFuel');
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
            $this->load->view('myadmin/assignedVehiclestoFuel',$data);
        }
        
        
        public function fuelReceipts()
        {
            if ($this->session->userdata('admin_login') != 1) {
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
            $this->load->view('myadmin/fuelReceipts',$data);
        }
        
         public function fuelReceiptByDate($task='',$startdate='',$enddate='')
        {
            if ($this->session->userdata('admin_login') != 1) {
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
            $this->load->view('myadmin/fuelReceiptsByDate',$data);
        }
        public function filterfuelReceiptByDate()
        {
            if ($this->session->userdata('admin_login') != 1) {
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
                $this->db->where('fuel_receipt.createdAt>=', $fromdate);
                $this->db->where('fuel_receipt.createdAt<=', $todate);      
            $this->db->order_by("fuel_receipt_id","desc");
            $data['fuel_Receipt_info']=$this->admin->record_list('fuel_receipt');
            $data['page_title']='Fuel Receipts By Date';
            $this->load->view('myadmin/filterfuelReceiptsByDate',$data);
                    
               }
               else
                {
                     $this->session->set_flashdata('err_msg',validation_errors());
                     redirect(base_url().'Adminity/fuelReceiptByDate');
                }      
            
        }
        
        
        public function profile($task = '',$admin_id = '')
        {
            if ($this->session->userdata('admin_login') != 1) {
                        $this->session->set_userdata('last_page', current_url());
                        redirect(base_url());
                       }
                       
            if($task == 'updateImage'){
                if($_FILES['userfile']['name']!= ""){
                      $img_name='userfile';
                      $img_path='profile';
                      $old_img=$this->input->post('old_admin_profile');
                      $profile=$this->admin->upload_image($img_name,$img_path,$old_img);  
                }
                        if($profile)
                        {
                            $data=array('profile_pic'=>$profile);                            
                                $where =array('admin_id'=>$admin_id);
                                $subadmin=$this->admin->records_update('tbl_admin',$data,$where);
                                $this->session->set_userdata('log_image', $profile);
                                $this->session->set_flashdata('msg_ok','<i class="ti-check-box"></i> Profile Image Updated Successfully.');
                                redirect(base_url().'Adminity/profile');

                        }
                        else
                        {
                                    $this->session->set_flashdata('err_msg',$this->upload->display_errors());
                                    redirect(base_url() .'Adminity/profile');

                        }
            }
            
            if($task == 'updateAdminProfile'){
                        $this->form_validation->set_rules('admin_name', 'Admin Name', 'required');
			$this->form_validation->set_rules('admin_email','Admin Email ID','required|valid_email');
			$this->form_validation->set_rules('admin_mobile_no', 'Contact No', 'required|numeric');
                         if ($this->form_validation->run())
			{
                            $data=array(
					'admin_name'=>ucwords(strtolower($this->input->post('admin_name'))),
	        			'admin_email'=>strtolower($this->input->post('admin_email')),
	        			'admin_mobile_no'=>$this->input->post('admin_mobile_no'),
	        			'admin_alternatemobile'=>$this->input->post('admin_alternatemobile'),
	        			'DOB'=>$this->input->post('DOB'),
                                        'gender'=>$this->input->post('gender'),
                                        'state'=>$this->input->post('state'),
                                        'city'=>$this->input->post('city'),
                                        'admin_address'=>$this->input->post('admin_address'),
                                        'pincode'=>$this->input->post('pincode'),
                                        'website'=>$this->input->post('website'),
                                        'skype_id'=>$this->input->post('skype_id'),
	        			'is_active'=>1);
                            
                                        $where =array('admin_id'=>$admin_id);
					$subadmin=$this->admin->records_update('tbl_admin',$data,$where);
					$this->session->set_flashdata('msg_ok','<i class="ti-check-box"></i> Admin Profile Updated Successfully.');
					redirect(base_url().'Adminity/profile');		
			}else {
                            $this->session->set_flashdata('err_msg',validation_errors());
                             redirect(base_url().'Adminity/profile');
                        }
            }
            
            if($task =='updateAdminPassword'){
                
                $this->form_validation->set_rules('old_password', 'Old Password', 'required');
                $this->form_validation->set_rules('password', 'Password', 'required');
                $this->form_validation->set_rules('confirm', 'Password Confirmation', 'required|matches[password]');

		if ($this->form_validation->run() == FALSE)
                {
                       $this->session->set_flashdata('err_msg', validation_errors());
                        redirect(base_url() . 'Adminity/profile');
                }
                else
                {
                    $query = $this->tadmin_model->checkOldPassword($this->input->post('old_password'),$admin_id);

                            if($query)
                                    {
                                      $data=array('password'=> strrev(sha1(md5($this->input->post('password')))));
                                            $where =array('admin_id'=>$admin_id);
                                            $subadmin=$this->admin->records_update('tbl_admin',$data,$where);
                                            $this->session->sess_destroy();
                                            $this->session->set_flashdata('msg_ok', ('Password Updated Successfully'));
                                            redirect(base_url() . 'Adminity/profile');
                                    }
                                    else
                                    {
                                         $this->session->set_flashdata('err_msg', 'Please Enter the correct password');
                                            redirect(base_url() . 'Adminity/profile');
                                    }

				 
		}
                
            }
            $admin_id = $this->session->userdata('log_admin_id');
           
            $where =array('admin_id'=> $admin_id );
            $data['admin_info']=$this->admin->record_list('tbl_admin',$where);
            $data['page_title']='Profile Setting';
            $this->load->view('myadmin/myprofile',$data);
        }
        
        
        public function login()
        {
            if ($this->session->userdata('admin_login') == 1) {
                 $this->session->set_userdata('last_page', current_url());                 
                 redirect(base_url());
			
            }else{
                    $data['page_title'] = 'Login';
                    $this->load->view('myadmin/login',$data);
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
