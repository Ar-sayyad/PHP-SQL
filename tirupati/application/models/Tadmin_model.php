<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Tadmin_model extends CI_Model {
	
    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->database();
        $this->load->library('email');
        $this->load->helper('file');
    }

    function clear_cache() {
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
    }
    
    /*****login funtionality start********/
    
	function validate_login_info($email,$password){
		
		
		 // Checking login credential for admin
		$password = strrev(sha1(md5($password)));
                $admin = $this->db->get_where('tbl_admin', array('admin_email' => $email,'password' => $password));
		$subadmin = $this->db->get_where('tbl_subadmin', array('subadmin_email' => $email,'password' => $password));		
		$user = $this->db->get_where('user_auth', array('subadmin_email' => $email,'password' => $password));
		if($admin->num_rows() > 0) {
                        $row = $admin->row();
                        $this->session->set_userdata('admin_login', '1');
                        $this->session->set_userdata('log_admin_id', $row->admin_id);
                        $this->session->set_userdata('log_email_id', $row->admin_email);
                        $this->session->set_userdata('log_admin_name', $row->admin_name);
                        $this->session->set_userdata('log_image', $row->profile_pic);
                        $this->session->set_userdata('log_address', $row->admin_address);
                        $this->session->set_userdata('log_type', 'admin');
                        echo '1';
                }elseif($subadmin->num_rows() > 0) {
                        $row = $subadmin->row();
                        $this->session->set_userdata('subadmin_login', '1');
                        $this->session->set_userdata('log_admin_id', $row->subadmin_id);
                        $this->session->set_userdata('login_email_id', $row->subadmin_email);
                        $this->session->set_userdata('log_admin_name', $row->subadmin_name);
                        $this->session->set_userdata('log_image', $row->profile_pic);
                        $this->session->set_userdata('log_address', $row->address);
                        $this->session->set_userdata('login_type', 'subadmin');
                        echo '1';
                }elseif($user->num_rows() > 0) {
                        $row = $user->row();
                        $this->session->set_userdata('authuser_login', '1');
                        $this->session->set_userdata('log_admin_id', $row->subadmin_id);
                        $this->session->set_userdata('login_email_id', $row->subadmin_email);
                        $this->session->set_userdata('log_admin_name', $row->subadmin_name);
                        $this->session->set_userdata('log_image', $row->profile_pic);
                        $this->session->set_userdata('log_address', $row->address);
                        $this->session->set_userdata('login_type', 'authuser');
                        echo '1';
                }else{
			echo 'Invalid Login Details.';
		}
		
		/*elseif($vendor->num_rows() > 0) {
                        $row = $vendor->row();
                        $this->session->set_userdata('vendor_login', '1');
                        $this->session->set_userdata('log_admin_id', $row->vendor_id);
                        $this->session->set_userdata('login_email_id', $row->vendor_email);
                        $this->session->set_userdata('log_admin_name', $row->vendor_name);
                        $this->session->set_userdata('log_image', $row->profile_pic);
                        $this->session->set_userdata('log_address', $row->vendor_address);
                        $this->session->set_userdata('login_type', 'vendor');
                        echo '1';
                }*/
	}
	 /*****login funtionality end********/
	
        public function checkOldPassword($oldPassword,$table,$where)
{
	$oldPassword= strrev(sha1(md5($oldPassword)));
		
	$password = $this->db->get_where($table , $where)->row()->password;

	if($oldPassword == $password)
        {
            return true;
        }
        else
        {
            return false;
        }
    
}
/*********get data**********/
        public function getVehicleOwnerName($vehicle_owner_id){
            
            return $this->db->get_where('vehicle_owner',array('vehicle_owner_id' => $vehicle_owner_id))->row()->owner_full_name;
            
        }
        public function getDieselOwnerName($diesel_owner_id){
           
            return $this->db->get_where('diesel_owners',array('diesel_owner_id' => $diesel_owner_id))->row()->diesel_owner_name;
        }

        public function getVendorName($vendor_id){
            
            return $this->db->get_where('tbl_vendor',array('vendor_id' => $vendor_id))->row()->vendor_name;
            
        }
        
         public function getVehicleNumber($vehicle_id){
            
            return $this->db->get_where('tbl_vehicle',array('vehicle_id' => $vehicle_id))->row()->vehicle_no;
            
        }
         public function getDriverName($driver_id){
            
            return $this->db->get_where('tbl_driver',array('driver_id' => $driver_id))->row()->driver_name;
            
        }
         public function getDriverContact($driver_id){
            
            return $this->db->get_where('tbl_driver',array('driver_id' => $driver_id))->row()->driver_contact;
            
        }

	
}
