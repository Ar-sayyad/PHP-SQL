<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Crud_model extends CI_Model {

    function __construct() {
        parent::__construct();
		
    }

    function clear_cache() {
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
    }

    function get_type_name_by_id($type, $type_id = '', $field = 'name') {
        $this->db->where($type . '_id', $type_id);
        $query = $this->db->get($type);
        $result = $query->result_array();
        foreach ($result as $row)
            return $row[$field];
        //return	$this->db->get_where($type,array($type.'_id'=>$type_id))->row()->$field;	
    }


    function select_user_info()
    {
       
		return $this->db->get('user')->result_array();
    }
	
	function save_user_info() {
		$filename=$_FILES["file"]["tmp_name"];
			if($_FILES["file"]["size"] > 0)
		 {

		  	$file = fopen($filename, "r");
	         while (($emapData = fgetcsv($file, 10000, ",")) !== FALSE)
	         {
				 $data['grampanchayat_id']=$this->session->userdata('login_user_id');
				 $data['name']= get_phrase($emapData[0]);
				 $data['wife']=get_phrase($emapData[1]);
				 $data['mobile']=get_phrase($emapData[2]);
				 $data['aadhar_no']=get_phrase($emapData[3]);
				 $data['toilet']=get_phrase($emapData[4]);
				 
				  $this->db->insert('nagrik', $data);
			 }
			 
		 }
	}
	


    // Create a new invoice.
    function create_invoice() 
    {
        $data['title']              = $this->input->post('title');
        $data['invoice_number']     = $this->input->post('invoice_number');
        $data['grampanchayat_id']   = $this->input->post('grampanchayat_id');
        $data['creation_timestamp'] = $this->input->post('creation_timestamp');
        $data['due_timestamp']      = $this->input->post('due_timestamp');
        $data['vat_percentage']     = $this->input->post('vat_percentage');
        $data['discount_amount']    = $this->input->post('discount_amount');
        $data['status']             = $this->input->post('status');

        $invoice_entries            = array();
        $descriptions               = $this->input->post('entry_description');
        $amounts                    = $this->input->post('entry_amount');
        $number_of_entries          = sizeof($descriptions);
        
        for ($i = 0; $i < $number_of_entries; $i++)
        {
            if ($descriptions[$i] != "" && $amounts[$i] != "")
            {
                $new_entry          = array('description' => $descriptions[$i], 'amount' => $amounts[$i]);
                array_push($invoice_entries, $new_entry);
            }
        }
        $data['invoice_entries']    = json_encode($invoice_entries);

        $this->db->insert('invoice', $data);
    }
    
    function select_invoice_info()
    {
        return $this->db->get('invoice')->result_array();
    }
    function create_data() 
    {
        $data['name']         = $this->input->post('name');
        
        $this->db->insert('data', $data);
    }
     function update_data($data_id)
    {
        $data['name']        = $this->input->post('name');
        $this->db->where('data_id', $data_id);
        $this->db->update('data', $data);
    }

    function delete_data($data_id)
    {
        $this->db->where('data_id', $data_id);
        $this->db->delete('data');
    }
     function select_data_info()
    {
        return $this->db->get('data')->result_array();
    }
    
//    function select_invoice_info_by_district_id()
//    {
//        $grampanchayat_id = $this->session->userdata('login_user_id');
//        return $this->db->get_where('invoice', array('grampanchayat_id' => $grampanchayat_id))->result_array();
//    }

    
    function select_invoice_info_by_grampanchayat_id()
    {
        $grampanchayat_id = $this->session->userdata('login_user_id');
        return $this->db->get_where('invoice', array('grampanchayat_id' => $grampanchayat_id))->result_array();
    }

    function update_invoice($invoice_id)
    {
        $data['title']              = $this->input->post('title');
        $data['invoice_number']     = $this->input->post('invoice_number');
        $data['grampanchayat_id']         = $this->input->post('grampanchayat_id');
        $data['creation_timestamp'] = $this->input->post('creation_timestamp');
        $data['due_timestamp']      = $this->input->post('due_timestamp');
        $data['vat_percentage']     = $this->input->post('vat_percentage');
        $data['discount_amount']    = $this->input->post('discount_amount');
        $data['status']             = $this->input->post('status');

        $invoice_entries            = array();
        $descriptions               = $this->input->post('entry_description');
        $amounts                    = $this->input->post('entry_amount');
        $number_of_entries          = sizeof($descriptions);
        
        for ($i = 0; $i < $number_of_entries; $i++)
        {
            if ($descriptions[$i] != "" && $amounts[$i] != "")
            {
                $new_entry          = array('description' => $descriptions[$i], 'amount' => $amounts[$i]);
                array_push($invoice_entries, $new_entry);
            }
        }
        $data['invoice_entries']    = json_encode($invoice_entries);

        $this->db->where('invoice_id', $invoice_id);
        $this->db->update('invoice', $data);
    }

    function delete_invoice($invoice_id)
    {
        $this->db->where('invoice_id', $invoice_id);
        $this->db->delete('invoice');
    }

    function calculate_invoice_total_amount($invoice_number)
    {
        $total_amount           = 0;
        $invoice                = $this->db->get_where('invoice', array('invoice_number' => $invoice_number))->result_array();
        foreach ($invoice as $row)
        {
            $invoice_entries    = json_decode($row['invoice_entries']);
            foreach ($invoice_entries as $invoice_entry)
                $total_amount  += $invoice_entry->amount;

            $vat_amount         = $total_amount * $row['vat_percentage'] / 100;
            $grand_total        = $total_amount + $vat_amount - $row['discount_amount'];
        }

        return $grand_total;
    }

  

    //////system settings//////
    function update_system_settings() {
        $data['description'] = $this->input->post('system_name');
        $this->db->where('type', 'system_name');
        $this->db->update('settings', $data);

        $data['description'] = $this->input->post('system_title');
        $this->db->where('type', 'system_title');
        $this->db->update('settings', $data);

        $data['description'] = $this->input->post('address');
        $this->db->where('type', 'address');
        $this->db->update('settings', $data);

        $data['description'] = $this->input->post('phone');
        $this->db->where('type', 'phone');
        $this->db->update('settings', $data);

        $data['description'] = $this->input->post('paypal_email');
        $this->db->where('type', 'paypal_email');
        $this->db->update('settings', $data);

        $data['description'] = $this->input->post('currency');
        $this->db->where('type', 'currency');
        $this->db->update('settings', $data);

        $data['description'] = $this->input->post('system_email');
        $this->db->where('type', 'system_email');
        $this->db->update('settings', $data);

        $data['description'] = $this->input->post('buyer');
        $this->db->where('type', 'buyer');
        $this->db->update('settings', $data);

        $data['description'] = $this->input->post('system_name');
        $this->db->where('type', 'system_name');
        $this->db->update('settings', $data);

        $data['description'] = $this->input->post('purchase_code');
        $this->db->where('type', 'purchase_code');
        $this->db->update('settings', $data);

        $data['description'] = $this->input->post('language');
        $this->db->where('type', 'language');
        $this->db->update('settings', $data);

        $data['description'] = $this->input->post('text_align');
        $this->db->where('type', 'text_align');
        $this->db->update('settings', $data);
    }
    
    // SMS settings.
    function update_sms_settings() {
        
        $data['description'] = $this->input->post('clickatell_user');
        $this->db->where('type', 'clickatell_user');
        $this->db->update('settings', $data);
        
        $data['description'] = $this->input->post('clickatell_password');
        $this->db->where('type', 'clickatell_password');
        $this->db->update('settings', $data);
        
        $data['description'] = $this->input->post('clickatell_api_id');
        $this->db->where('type', 'clickatell_api_id');
        $this->db->update('settings', $data);
    }

    /////creates log/////
    function create_log($data) {
        $data['timestamp'] = strtotime(date('Y-m-d') . ' ' . date('H:i:s'));
        $data['ip'] = $_SERVER["REMOTE_ADDR"];
        $location = new SimpleXMLElement(file_get_contents('http://freegeoip.net/xml/' . $_SERVER["REMOTE_ADDR"]));
        $data['location'] = $location->City . ' , ' . $location->CountryName;
        $this->db->insert('log', $data);
    }

    ////////BACKUP RESTORE/////////
    function create_backup($type) {
        $this->load->dbutil();


        $options = array(
            'format' => 'txt', // gzip, zip, txt
            'add_drop' => TRUE, // Whether to add DROP TABLE statements to backup file
            'add_insert' => TRUE, // Whether to add INSERT data to backup file
            'newline' => "\n"               // Newline character used in backup file
        );


        if ($type == 'all') {
            $tables = array('');
            $file_name = 'system_backup';
        } else {
            $tables = array('tables' => array($type));
            $file_name = 'backup_' . $type;
        }

        $backup = & $this->dbutil->backup(array_merge($options, $tables));


        $this->load->helper('download');
        force_download($file_name . '.sql', $backup);
    }

    /////////RESTORE TOTAL DB/ DB TABLE FROM UPLOADED BACKUP SQL FILE//////////
    function restore_backup() {
        move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/backup.sql');
        $this->load->dbutil();


        $prefs = array(
            'filepath' => 'uploads/backup.sql',
            'delete_after_upload' => TRUE,
            'delimiter' => ';'
        );
        $restore = & $this->dbutil->restore($prefs);
        unlink($prefs['filepath']);
    }

    /////////DELETE DATA FROM TABLES///////////////
    function truncate($type) {
        if ($type == 'all') {
            $this->db->truncate('student');
            $this->db->truncate('mark');
            $this->db->truncate('teacher');
            $this->db->truncate('subject');
            $this->db->truncate('class');
            $this->db->truncate('exam');
            $this->db->truncate('grade');
        } else {
            $this->db->truncate($type);
        }
    }

    ////////IMAGE URL//////////
    function get_image_url($type = '', $id = '') {
        if (file_exists('uploads/' . $type . '_image/' . $id . '.jpg'))
            $image_url = base_url() . 'uploads/' . $type . '_image/' . $id . '.jpg';
        else
            $image_url = base_url() . 'uploads/user.jpg';

        return $image_url;
    }
    
    function save_department_info()
    {
        $data['name'] 		= $this->input->post('name');
        $data['description']    = $this->input->post('description');
        
        $this->db->insert('department',$data);
    }
    
    function select_department_info()
    {
        return $this->db->get('department')->result_array();
    }
    
    function update_department_info($department_id)
    {
        $data['name'] 		= $this->input->post('name');
        $data['description'] 	= $this->input->post('description');
        
        $this->db->where('department_id',$department_id);
        $this->db->update('department',$data);
    }
    
    function delete_department_info($department_id)
    {
        $this->db->where('department_id',$department_id);
        $this->db->delete('department');
    }
    
    function save_district_info()
    {
        $data['name'] 		= $this->input->post('name');
        //$data['email'] 		= $this->input->post('email');
       // $data['password']       = sha1($this->input->post('password'));
        
        //$data['phone']          = $this->input->post('phone');
        $data['department_id'] 	= $this->input->post('department_id');
       
        
        $this->db->insert('district',$data);
        
    }
    
    function select_district_info()
    {
		$this->db->order_by('department_id');
        return $this->db->get('district')->result_array();
    }
    
    function update_district_info($district_id)
    {
        $data['name'] 		= $this->input->post('name');
        
        $data['department_id'] 	= $this->input->post('department_id');
       
        
        $this->db->where('district_id',$district_id);
        $this->db->update('district',$data);
        
       
    }
    
    function delete_district_info($district_id)
    {
        $this->db->where('district_id',$district_id);
        $this->db->delete('district');
    }
    
    function save_grampanchayat_info()
    {
        $data['name'] 		= $this->input->post('name');
        $data['email'] 		= $this->input->post('email');
        $data['password']       = sha1($this->input->post('password'));
       
        $data['phone']          = $this->input->post('phone');
         $data['mobile'] 	= $this->input->post('mobile');
         $data['region_id']            = $this->input->post('region_id');
        $data['taluka_id']            = $this->input->post('taluka_id');
        
        
        $this->db->insert('grampanchayat',$data);
        
       
    }
    
    function select_grampanchayat_info()
    {
		$this->db->order_by('taluka_id');
        return $this->db->get('grampanchayat')->result_array();
    }
    
    function select_grampanchayat_info_by_grampanchayat_id( $grampanchayat_id = '' )
    {
        return $this->db->get_where('grampanchayat', array('grampanchayat_id' => $grampanchayat_id))->result_array();
    }
            
    function update_grampanchayat_info($grampanchayat_id)
    {
        $data['name'] 		= $this->input->post('name');
        $data['email'] 		= $this->input->post('email');
       
        //$data['phone']          = $this->input->post('phone');
         $data['mobile'] 	= $this->input->post('mobile');
        // $data['region_id']            = $this->input->post('region_id');
        //$data['taluka_id']            = $this->input->post('taluka_id');
        
        $this->db->where('grampanchayat_id',$grampanchayat_id);
        $this->db->update('grampanchayat',$data);
        
           }
    function update_admin_info($admin_id)
    {
        $data['name'] 		= $this->input->post('name');
        $data['email'] 		= $this->input->post('email');
       
        $data['phone']          = $this->input->post('phone');
      
        
        $this->db->where('admin_id',$admin_id);
        $this->db->update('admin',$data);
        
           }
    
    function delete_grampanchayat_info($grampanchayat_id)
    {
        $this->db->where('grampanchayat_id',$grampanchayat_id);
        $this->db->delete('grampanchayat');
    }
    
    function save_taluka_info()
    {
        $data['name'] 		= $this->input->post('name');
        $data['department_id'] 		= $this->input->post('department_id');
        //$data['district_id']       = sha1($this->input->post('district_id'));
        $data['district_id'] 	= $this->input->post('district_id');
        //$data['phone']          = $this->input->post('phone');
        
        $this->db->insert('taluka',$data);
        
    }
    
    function select_taluka_info()
    {
		$this->db->order_by('district_id');
        return $this->db->get('taluka')->result_array();
    }
    
    function update_taluka_info($taluka_id)
    {
         $data['name'] 		= $this->input->post('name');
        $data['department_id'] 		= $this->input->post('department_id');
        //$data['district_id']       = sha1($this->input->post('district_id'));
        $data['district_id'] 	= $this->input->post('district_id');
        
        $this->db->where('taluka_id',$taluka_id);
        $this->db->update('taluka',$data);
        
        //move_uploaded_file($_FILES["image"]["tmp_name"], "uploads/taluka_image/" . $taluka_id . '.jpg');
    }
    
    function delete_taluka_info($taluka_id)
    {
        $this->db->where('taluka_id',$taluka_id);
        $this->db->delete('taluka');
    }
    
    function save_region_info()
    {
        $data['name'] 		= $this->input->post('name');
       
        $this->db->insert('region',$data);
    }
    
    function select_region_info()
    {
        return $this->db->get('region')->result_array();
    }
    
    function update_region_info($region_id)
    {
        $data['name'] 		= $this->input->post('name');
       
        
        $this->db->where('region_id',$region_id);
        $this->db->update('region',$data);
        
       
    }
    
    function delete_region_info($region_id)
    {
        $this->db->where('region_id',$region_id);
        $this->db->delete('region');
    }
    
    function save_rates_info()
    {
        $data['department_id'] 		= $this->input->post('department_id');
        $data['region_id'] 		= $this->input->post('region_id');
        $data['rcc'] 			= $this->input->post('rcc');
        $data['other_fix']          = $this->input->post('other_fix');
        $data['half_fix']          = $this->input->post('half_fix');
        $data['temporary']          = $this->input->post('temporary');
        
        $this->db->insert('rates',$data);
       
    }
    
    function select_rates_info()
    {
    	$this->db->order_by('rates_id');
        return $this->db->get('rates')->result_array();
    }
    
    function update_rates_info($rates_id)
    {
        $data['department_id'] 		= $this->input->post('department_id');
        $data['region_id'] 		= $this->input->post('region_id');
        $data['rcc'] 			= $this->input->post('rcc');
        $data['other_fix']          = $this->input->post('other_fix');
        $data['half_fix']          = $this->input->post('half_fix');
        $data['temporary']          = $this->input->post('temporary');
        
        $this->db->where('rates_id',$rates_id);
        $this->db->update('rates',$data);
    }
    
    function delete_rates_info($rates_id)
    {
        $this->db->where('rates_id',$rates_id);
        $this->db->delete('rates');
    }
    
    function save_building_tax_info()
    {
        $data['building_type_id'] 		= $this->input->post('building_type_id');
        $data['maximum_rate'] 			= $this->input->post('maximum_rate');
        $data['minimum_rate'] 			= $this->input->post('minimum_rate');
        
        $this->db->insert('building_tax',$data);
       
    }
    
    function select_building_tax_info()
    {
    	$this->db->order_by('building_tax_id');
        return $this->db->get('building_tax')->result_array();
    }
    
    function update_building_tax_info($building_tax_id)
    {
        $data['building_type_id'] 		= $this->input->post('building_type_id');
        $data['maximum_rate'] 			= $this->input->post('maximum_rate');
        $data['minimum_rate'] 			= $this->input->post('minimum_rate');
        
        
        $this->db->where('building_tax_id',$building_tax_id);
        $this->db->update('building_tax',$data);
    }
    
    function delete_building_tax_info($building_tax_id)
    {
        $this->db->where('building_tax_id',$building_tax_id);
        $this->db->delete('building_tax');
    }
    
    function save_building_deduction_info() 
    {
         
         $data['building_id']     = $this->input->post('building_id');
        $deduction_entries            = array();
        $building_type               = $this->input->post('entry_building_type');
        $rate                    = $this->input->post('entry_rate');
        $number_of_entries          = sizeof($building_type);
        
        for ($i = 0; $i < $number_of_entries; $i++)
        {
            if ($building_type[$i] != "")
            {
                $new_entry          = array('building' => $building_type[$i], 'rate' => $rate[$i]);
                array_push($deduction_entries, $new_entry);
            }
        }
        $data['deduction_entries']    = json_encode($deduction_entries);

        $this->db->insert('building_deduction', $data);
    }
     function update_building_deduction_info($building_deduction_id)
    {
        $data['building_id']     = $this->input->post('building_id');
        $deduction_entries            = array();
        $building_type               = $this->input->post('entry_building_type');
        $rate                    = $this->input->post('entry_rate');
        $number_of_entries          = sizeof($building_type);
        
        for ($i = 0; $i < $number_of_entries; $i++)
        {
            if ($building_type[$i] != "")
            {
                $new_entry          = array('building' => $building_type[$i], 'rate' => $rate[$i]);
                array_push($deduction_entries, $new_entry);
            }
        }
         $data['deduction_entries']    = json_encode($deduction_entries);
         $this->db->where('building_deduction_id', $building_deduction_id);
        $this->db->update('building_deduction', $data);
     }
      function delete_building_deduction_info($building_deduction_id)
    {
        $this->db->where('building_deduction_id',$building_deduction_id);
        $this->db->delete('building_deduction');
    }
     function select_building_deduction_info()
    {
    	$this->db->order_by('building_deduction_id');
        return $this->db->get('building_deduction')->result_array();
    }
    
	/******gram tax rate*****/
	
	 function save_gram_building_tax_info() 
    {
         
         $data['building_type_id']     = $this->input->post('building_type_id');
		 $data['grampanchayat_id'] = $this->session->userdata('login_user_id');
        $tax_entries            = array();
        $bharank_type               = $this->input->post('entry_bharank_type');
        $rate                    = $this->input->post('entry_rate');
        $number_of_entries          = sizeof($bharank_type);
        
        for ($i = 0; $i < $number_of_entries; $i++)
        {
            if ($bharank_type[$i] != "")
            {
                $new_entry          = array('bharank' => $bharank_type[$i], 'rate' => $rate[$i]);
                array_push($tax_entries, $new_entry);
            }
        }
        $data['tax_entries']    = json_encode($tax_entries);

        $this->db->insert('gram_tax_rate', $data);
    }
     function update_gram_building_tax_info($gram_tax_rate_id)
    {
        $data['building_type_id']     = $this->input->post('building_type_id');
		$data['grampanchayat_id'] = $this->session->userdata('login_user_id');
        $tax_entries            = array();
        $bharank_type               = $this->input->post('entry_bharank_type');
        $rate                    = $this->input->post('entry_rate');
        $number_of_entries          = sizeof($bharank_type);
        
        for ($i = 0; $i < $number_of_entries; $i++)
        {
            if ($bharank_type[$i] != "")
            {
                $new_entry          = array('bharank' => $bharank_type[$i], 'rate' => $rate[$i]);
                array_push($tax_entries, $new_entry);
            }
        }
         $data['tax_entries']    = json_encode($tax_entries);
         $this->db->where('gram_tax_rate_id', $gram_tax_rate_id);
        $this->db->update('gram_tax_rate', $data);
     }
      function delete_gram_building_tax_info($gram_tax_rate_id)
    {
        $this->db->where('gram_tax_rate_id',$gram_tax_rate_id);
        $this->db->delete('gram_tax_rate');
    }
     function select_gram_building_tax_info()
    {
		$grampanchayat_id = $this->session->userdata('login_user_id');
		$this->db->where('grampanchayat_id',$grampanchayat_id);
    	$this->db->order_by('gram_tax_rate_id');
        return $this->db->get('gram_tax_rate')->result_array();
    }
    
	
	
    function save_land_tax_info()
    {
        $data['maximum_rate'] 			= $this->input->post('maximum_rate');
        $data['minimum_rate'] 			= $this->input->post('minimum_rate');
        
        $this->db->insert('land_tax',$data);
       
    }
    
    function select_land_tax_info()
    {
    	$this->db->order_by('land_tax_id');
        return $this->db->get('land_tax')->result_array();
    }
    
    function update_land_tax_info($land_tax_id)
    {
        $data['maximum_rate'] 			= $this->input->post('maximum_rate');
        $data['minimum_rate'] 			= $this->input->post('minimum_rate');
        
        
        $this->db->where('land_tax_id',$land_tax_id);
        $this->db->update('land_tax',$data);
    }
    
    function delete_land_tax_info($land_tax_id)
    {
        $this->db->where('land_tax_id',$land_tax_id);
        $this->db->delete('land_tax');
    }
    
    function save_accountant_info()
    {
        $data['name'] 		= $this->input->post('name');
        $data['email'] 		= $this->input->post('email');
        $data['password']       = sha1($this->input->post('password'));
        $data['address'] 	= $this->input->post('address');
        $data['phone']          = $this->input->post('phone');
        
        $this->db->insert('accountant',$data);
        
        $accountant_id  =   $this->db->insert_id();
        move_uploaded_file($_FILES["image"]["tmp_name"], "uploads/accountant_image/" . $accountant_id . '.jpg');
    }
    
    function select_accountant_info()
    {
        return $this->db->get('accountant')->result_array();
    }
    
    function update_accountant_info($accountant_id)
    {
        $data['name'] 		= $this->input->post('name');
        $data['email'] 		= $this->input->post('email');
        $data['address'] 	= $this->input->post('address');
        $data['phone']          = $this->input->post('phone');
        
        $this->db->where('accountant_id',$accountant_id);
        $this->db->update('accountant',$data);
        
        move_uploaded_file($_FILES["image"]["tmp_name"], "uploads/accountant_image/" . $accountant_id . '.jpg');
    }
    
    function delete_accountant_info($accountant_id)
    {
        $this->db->where('accountant_id',$accountant_id);
        $this->db->delete('accountant');
    }
    
    function save_building_info()
    {
        $data['name'] 		= $this->input->post('name');
        
        
        $this->db->insert('building',$data);
        
    }
    
    function select_building_info()
    {
        return $this->db->get('building')->result_array();
    }
    
    function update_building_info($building_id)
    {
        $data['name'] 		= $this->input->post('name');
       
        $this->db->where('building_id',$building_id);
        $this->db->update('building',$data);
        
       
    }
    
    function delete_building_info($building_id)
    {
        $this->db->where('building_id',$building_id);
        $this->db->delete('building');
    }
    
     function save_building_type_info()
    {
        $data['name'] 		= $this->input->post('name');
        
        
        $this->db->insert('building_type',$data);
        
    }
    
    function select_building_type_info()
    {
        return $this->db->get('building_type')->result_array();
    }
    
    function update_building_type_info($building_type_id)
    {
        $data['name'] 		= $this->input->post('name');
       
        $this->db->where('building_type_id',$building_type_id);
        $this->db->update('building_type',$data);
        
       
    }
    
    function delete_building_type_info($building_type_id)
    {
        $this->db->where('building_type_id',$building_type_id);
        $this->db->delete('building_type');
    }
    
    function save_bharank_info()
    {
        $data['building_use'] 		= $this->input->post('building_use');
        $data['bharank'] 			= $this->input->post('bharank');
        
        
        $this->db->insert('bharank',$data);
       
    }
    
    function select_bharank_info()
    {
    	$this->db->order_by('bharank_id');
        return $this->db->get('bharank')->result_array();
    }
    
    function update_bharank_info($bharank_id)
    {
         $data['building_use'] 		= $this->input->post('building_use');
        $data['bharank'] 			= $this->input->post('bharank');
        
        
        $this->db->where('bharank_id',$bharank_id);
        $this->db->update('bharank',$data);
    }
    
    function delete_bharank_info($bharank_id)
    {
        $this->db->where('bharank_id',$bharank_id);
        $this->db->delete('bharank');
    }
    
     function save_tower_info()
    {
        $data['name'] 		= $this->input->post('name');
        
        
        $this->db->insert('tower',$data);
        
    }
    
    function select_tower_info()
    {
        return $this->db->get('tower')->result_array();
    }
    
    function update_tower_info($tower_id)
    {
        $data['name'] 		= $this->input->post('name');
       
        $this->db->where('tower_id',$tower_id);
        $this->db->update('tower',$data);
        
       
    }
    
    function delete_tower_info($tower_id)
    {
        $this->db->where('tower_id',$tower_id);
        $this->db->delete('tower');
    }
    function save_tower_tax_info()
    {
        $data['tower_id'] 		= $this->input->post('tower_id');
        $data['gram_type_id'] 		= $this->input->post('gram_type_id');
        $data['maximum_rate'] 			= $this->input->post('maximum_rate');
        $data['minimum_rate'] 			= $this->input->post('minimum_rate');
        
        $this->db->insert('tower_tax',$data);
       
    }
    
    function select_tower_tax_info()
    {
    	$this->db->order_by('tower_tax_id');
        return $this->db->get('tower_tax')->result_array();
    }
    
    function update_tower_tax_info($tower_tax_id)
    {
        $data['tower_id'] 		= $this->input->post('tower_id');
        $data['gram_type_id'] 		= $this->input->post('gram_type_id');
        $data['maximum_rate'] 			= $this->input->post('maximum_rate');
        $data['minimum_rate'] 			= $this->input->post('minimum_rate');
        
        
        $this->db->where('tower_tax_id',$tower_tax_id);
        $this->db->update('tower_tax',$data);
    }
    
    function delete_tower_tax_info($tower_tax_id)
    {
        $this->db->where('tower_tax_id',$tower_tax_id);
        $this->db->delete('tower_tax');
    }
    
    function save_bed_allotment_info()
    {
        $data['bed_id']                 = $this->input->post('bed_id');
        $data['grampanchayat_id'] 		    = $this->input->post('grampanchayat_id');
        $data['allotment_timestamp'] 	= $this->input->post('allotment_timestamp');
        $data['discharge_timestamp']    = $this->input->post('discharge_timestamp');
        
        $this->db->insert('bed_allotment',$data);
    }
    
    function select_bed_allotment_info()
    {
        return $this->db->get_where('bed_allotment',array('discharge_status'=>0))->result_array();
    }
    function select_discharge_info()
    {
        return $this->db->get_where('bed_allotment',array('discharge_status'=>1))->result_array();
    }
    
    function update_bed_allotment_info($bed_allotment_id)
    {
        $data['bed_id']                 = $this->input->post('bed_id');
        $data['grampanchayat_id'] 		= $this->input->post('grampanchayat_id');
        $data['allotment_timestamp'] 	= $this->input->post('allotment_timestamp');
        $data['discharge_timestamp']    = $this->input->post('discharge_timestamp');
        
        $this->db->where('bed_allotment_id',$bed_allotment_id);
        $this->db->update('bed_allotment',$data);
    }
    function discharge_bed_allotment_info($bed_allotment_id)
    {
        $data['bed_id']                 = $this->input->post('bed_id');
        $data['grampanchayat_id'] 		= $this->input->post('grampanchayat_id');
        $data['allotment_timestamp'] 	= $this->input->post('allotment_timestamp');
        $data['discharge_timestamp']    = $this->input->post('discharge_timestamp');
        $data['discharge_status'] =1;
        $this->db->where('bed_allotment_id',$bed_allotment_id);
        $this->db->update('bed_allotment',$data);
    }
    
    function delete_bed_allotment_info($bed_allotment_id)
    {
        $this->db->where('bed_allotment_id',$bed_allotment_id);
        $this->db->delete('bed_allotment');
    }
    
    function select_blood_bank_info()
    {
        return $this->db->get('blood_bank')->result_array();
    }
    
    function update_blood_bank_info($blood_group_id)
    {
        $data['status']    = $this->input->post('status');
        
        $this->db->where('blood_group_id',$blood_group_id);
        $this->db->update('blood_bank',$data);
    }
    
    function save_report_info()
    {
        $data['type'] 		= $this->input->post('type');
        $data['description']    = $this->input->post('description');
        $data['timestamp']      = strtotime($this->input->post('timestamp'));
        $data['grampanchayat_id']     = $this->input->post('grampanchayat_id');
        
        $login_type             = $this->session->userdata('login_type');
        if($login_type=='taluka')
            $data['district_id']  = $this->input->post('district_id');
        else $data['district_id'] = $this->session->userdata('login_user_id');
        
        $this->db->insert('report',$data);
    }
    
    function select_report_info()
    {
        return $this->db->get('report')->result_array();
    }
    
    function update_report_info($report_id)
    {
        $data['type'] 		= $this->input->post('type');
        $data['description']    = $this->input->post('description');
        $data['timestamp']      = strtotime($this->input->post('timestamp'));
        $data['grampanchayat_id']     = $this->input->post('grampanchayat_id');
        
        $login_type             = $this->session->userdata('login_type');
        if($login_type=='taluka')
            $data['district_id']  = $this->input->post('district_id');
        else $data['district_id'] = $this->session->userdata('login_user_id');
        
        $this->db->where('report_id',$report_id);
        $this->db->update('report',$data);
    }
    
    function delete_report_info($report_id)
    {
        $this->db->where('report_id',$report_id);
        $this->db->delete('report');
    }
    
    function save_bed_info()
    {
        $data['bed_number']     = $this->input->post('bed_number');
        $data['type'] 		= $this->input->post('type');
        $data['description']    = $this->input->post('description');
        
        $this->db->insert('bed',$data);
    }
    
    function select_bed_info()
    {
        return $this->db->get('bed')->result_array();
    }
    
    function update_bed_info($bed_id)
    {
        $data['bed_number']     = $this->input->post('bed_number');
        $data['type'] 		= $this->input->post('type');
        $data['description']    = $this->input->post('description');
        
        $this->db->where('bed_id',$bed_id);
        $this->db->update('bed',$data);
    }
    
    function delete_bed_info($bed_id)
    {
        $this->db->where('bed_id',$bed_id);
        $this->db->delete('bed');
    }
    
    function save_blood_donor_info()
    {
        $data['name']                       = $this->input->post('name');
        $data['email']                      = $this->input->post('email');
        $data['address']                    = $this->input->post('address');
        $data['phone']                      = $this->input->post('phone');
        $data['sex']                        = $this->input->post('sex');
        $data['age']                        = $this->input->post('age');
        $data['blood_group']                = $this->input->post('blood_group');
        $data['last_donation_timestamp']    = strtotime($this->input->post('last_donation_timestamp'));
        
        $this->db->insert('blood_donor',$data);
    }
    
    function select_blood_donor_info()
    {
        return $this->db->get('blood_donor')->result_array();
    }
    
    function update_blood_donor_info($blood_donor_id)
    {
        $data['name']                       = $this->input->post('name');
        $data['email']                      = $this->input->post('email');
        $data['address']                    = $this->input->post('address');
        $data['phone']                      = $this->input->post('phone');
        $data['sex']                        = $this->input->post('sex');
        $data['age']                        = $this->input->post('age');
        $data['blood_group']                = $this->input->post('blood_group');
        $data['last_donation_timestamp']    = strtotime($this->input->post('last_donation_timestamp'));
        
        $this->db->where('blood_donor_id',$blood_donor_id);
        $this->db->update('blood_donor',$data);
    }
    
    function delete_blood_donor_info($blood_donor_id)
    {
        $this->db->where('blood_donor_id',$blood_donor_id);
        $this->db->delete('blood_donor');
    }
    
    function save_medicine_category_info()
    {
        $data['name'] 		= $this->input->post('name');
        $data['description']    = $this->input->post('description');
        
        $this->db->insert('medicine_category',$data);
    }
    
    function select_medicine_category_info()
    {
        return $this->db->get('medicine_category')->result_array();
    }
    
    function update_medicine_category_info($medicine_category_id)
    {
        $data['name'] 		= $this->input->post('name');
        $data['description'] 	= $this->input->post('description');
        
        $this->db->where('medicine_category_id',$medicine_category_id);
        $this->db->update('medicine_category',$data);
    }
    
    function delete_medicine_category_info($medicine_category_id)
    {
        $this->db->where('medicine_category_id',$medicine_category_id);
        $this->db->delete('medicine_category');
    }
    
    function save_medicine_info()
    {
        $data['name']                   = $this->input->post('name');
        $data['medicine_category_id']   = $this->input->post('medicine_category_id');
        $data['price']                  = $this->input->post('price');
        $data['quantity']                  = $this->input->post('quantity');
        $data['manufacturing_company']  = $this->input->post('manufacturing_company');
        $data['description']            = $this->input->post('description');
        $data['status'] 		= $this->input->post('status');
        
        $this->db->insert('medicine',$data);
    }
    
    function select_medicine_info()
    {
        return $this->db->get('medicine')->result_array();
    }
    
    function update_medicine_info($medicine_id)
    {
        $data['name']                   = $this->input->post('name');
        $data['medicine_category_id']   = $this->input->post('medicine_category_id');
        
        $data['price']                  = $this->input->post('price');
        $data['quantity']                  = $this->input->post('quantity');
        $data['manufacturing_company']  = $this->input->post('manufacturing_company');
        $data['description']            = $this->input->post('description');
        $data['status'] 		= $this->input->post('status');
        
        $this->db->where('medicine_id',$medicine_id);
        $this->db->update('medicine',$data);
    }
    
    function delete_medicine_info($medicine_id)
    {
        $this->db->where('medicine_id',$medicine_id);
        $this->db->delete('medicine');
    }
    
    function save_appointment_info()
    {
        $data['timestamp']  = strtotime($this->input->post('date_timestamp').' '.$this->input->post('time_timestamp') );
        $data['status']     = 'approved';
        $data['grampanchayat_id'] = $this->input->post('grampanchayat_id');
        
        if($this->session->userdata('login_type') == 'district')
            $data['district_id']  = $this->session->userdata('login_user_id');
        else
            $data['district_id']  = $this->input->post('district_id');
        
        $this->db->insert('appointment',$data);
        
        // Notify grampanchayat with sms.
        $notify = $this->input->post('notify');
        if($notify != '') {
            $grampanchayat_name   =   $this->db->get_where('grampanchayat',
                                array('grampanchayat_id' => $data['grampanchayat_id']))->row()->name;
            $district_name    =   $this->db->get_where('district',
                                array('district_id' => $data['district_id']))->row()->name;
            $date           =   date('l, d F Y', $data['timestamp']);
            $time           =   date('g:i a', $data['timestamp']);
            $message        =   $grampanchayat_name . ', you have an appointment with district ' . $district_name . ' on ' . $date . ' at ' . $time . '.';
            $receiver_phone =   $this->db->get_where('grampanchayat',
                                array('grampanchayat_id' => $data['grampanchayat_id']))->row()->phone;
            
            $this->sms_model->send_sms($message, $receiver_phone);
        }
    }
    
    function save_requested_appointment_info()
    {
        $data['timestamp']  = strtotime($this->input->post('date_timestamp').' '.$this->input->post('time_timestamp') );
        $data['district_id']  = $this->input->post('district_id');
        $data['grampanchayat_id'] = $this->session->userdata('login_user_id');
        $data['status']     = 'pending';
        
        $this->db->insert('appointment',$data);
    }
    
    function select_appointment_info_by_district_id()
    {
        $district_id = $this->session->userdata('login_user_id');
        
        $this->db->order_by('timestamp' , 'desc');
        $this->db->where('district_id' , $district_id);
        $this->db->where('status' , 'approved');
        $this->db->where('completed_status' , 0);
        return $this->db->get('appointment')->result_array();
    }
    
    function select_appointment_info_by_grampanchayat_id()
    {
        $grampanchayat_id = $this->session->userdata('login_user_id');
        return $this->db->get_where('appointment', array('grampanchayat_id' => $grampanchayat_id, 'status' => 'approved'))->result_array();
    }
    
    function select_appointment_info($district_id = '', $start_timestamp = '', $end_timestamp = '')
    {
        $response = array();
        if($district_id == 'all') {
            $this->db->order_by('district_id', 'asc');
            $this->db->order_by('timestamp', 'desc');
            $appointments = $this->db->get_where('appointment', array('status' => 'approved'))->result_array();
            foreach ($appointments as $row) {
                if($row['timestamp'] >= $start_timestamp && $row['timestamp'] <= $end_timestamp)
                    array_push ($response, $row);
            }
        }
        else {
            $this->db->order_by('timestamp', 'desc');
            $appointments = $this->db->get_where('appointment', array('district_id' => $district_id, 'status' => 'approved'))->result_array();
            foreach ($appointments as $row) {
                if($row['timestamp'] >= $start_timestamp && $row['timestamp'] <= $end_timestamp)
                    array_push ($response, $row);
            }
        }
        return $response;
    }
    
    function select_pending_appointment_info_by_grampanchayat_id()
    {
        $grampanchayat_id = $this->session->userdata('login_user_id');
        return $this->db->get_where('appointment', array('grampanchayat_id' => $grampanchayat_id, 'status' => 'pending'))->result_array();
    }
    
    function select_requested_appointment_info_by_district_id()
    {
        $district_id = $this->session->userdata('login_user_id');
        return $this->db->get_where('appointment', array('district_id' => $district_id, 'status' => 'pending'))->result_array();
    }
    
    function select_requested_appointment_info()
    {
        $this->db->order_by('district_id', 'asc');
        return $this->db->get_where('appointment', array('status' => 'pending'))->result_array();
    }
    
    function select_grampanchayat_info_by_district_id()
    {
        $district_id = $this->session->userdata('login_user_id');
        
        $this->db->group_by('grampanchayat_id');
        return $this->db->get_where('appointment', array('district_id' => $district_id, 'status' => 'approved','completed_status'=>0))->result_array();
    }
    
    function select_appointments_between_loggedin_grampanchayat_and_district()
    {
        $grampanchayat_id = $this->session->userdata('login_user_id');
        
        $this->db->group_by('district_id');
        return $this->db->get_where('appointment', array('grampanchayat_id' => $grampanchayat_id, 'status' => 'approved','completed_status'=>0))->result_array();
    }
    
    function update_appointment_info($appointment_id)
    {
        $data['timestamp']  = strtotime($this->input->post('date_timestamp').' '.$this->input->post('time_timestamp') );
        $data['grampanchayat_id'] = $this->input->post('grampanchayat_id');
        
        $this->db->where('appointment_id',$appointment_id);
        $this->db->update('appointment',$data);
        
        // Notify grampanchayat with sms.
        $notify = $this->input->post('notify');
        if($notify != '') {
            $district_id      =   $this->session->userdata('login_user_id');
            $grampanchayat_name   =   $this->db->get_where('grampanchayat',
                                array('grampanchayat_id' => $data['grampanchayat_id']))->row()->name;
            $district_name    =   $this->db->get_where('district',
                                array('district_id' => $district_id))->row()->name;
            $date           =   date('l, d F Y', $data['timestamp']);
            $time           =   date('g:i a', $data['timestamp']);
            $message        =   $grampanchayat_name . ', your appointment with district ' . $district_name . ' has been updated to ' . $date . ' at ' . $time . '.';
            $receiver_phone =   $this->db->get_where('grampanchayat',
                                array('grampanchayat_id' => $data['grampanchayat_id']))->row()->phone;
            
            $this->sms_model->send_sms($message, $receiver_phone);
        }
    }
    function complete_appointment_info($appointment_id)
    {
        $data['timestamp']  = strtotime($this->input->post('date_timestamp').' '.$this->input->post('time_timestamp') );
        $data['grampanchayat_id'] = $this->input->post('grampanchayat_id');
        $data['completed_status'] = 1;
        $this->db->where('appointment_id',$appointment_id);
        $this->db->update('appointment',$data);
        
        // Notify grampanchayat with sms.
        $notify = $this->input->post('notify');
        if($notify != '') {
            $district_id      =   $this->session->userdata('login_user_id');
            $grampanchayat_name   =   $this->db->get_where('grampanchayat',
                                array('grampanchayat_id' => $data['grampanchayat_id']))->row()->name;
            $district_name    =   $this->db->get_where('district',
                                array('district_id' => $district_id))->row()->name;
            $date           =   date('l, d F Y', $data['timestamp']);
            $time           =   date('g:i a', $data['timestamp']);
            $message        =   $grampanchayat_name . ', your appointment with district ' . $district_name . ' has been updated to ' . $date . ' at ' . $time . '.';
            $receiver_phone =   $this->db->get_where('grampanchayat',
                                array('grampanchayat_id' => $data['grampanchayat_id']))->row()->phone;
            
            $this->sms_model->send_sms($message, $receiver_phone);
        }
    }
    function approve_appointment_info($appointment_id)
    {
        $data['timestamp']  = strtotime($this->input->post('date_timestamp').' '.$this->input->post('time_timestamp') );
        $data['status']     = 'approved';
        
        if($this->session->userdata('login_type') == 'building')
            $data['district_id'] = $this->input->post('district_id');
        
        $this->db->where('appointment_id',$appointment_id);
        $this->db->update('appointment',$data);
        
        // Notify grampanchayat with sms.
        $notify = $this->input->post('notify');
        if($notify != '') {
            $district_id      =   $this->db->get_where('appointment',
                                array('appointment_id' => $appointment_id))->row()->district_id;
            $grampanchayat_id     =   $this->db->get_where('appointment',
                                array('appointment_id' => $appointment_id))->row()->grampanchayat_id;
            $grampanchayat_name   =   $this->db->get_where('grampanchayat',
                                array('grampanchayat_id' => $grampanchayat_id))->row()->name;
            $district_name    =   $this->db->get_where('district',
                                array('district_id' => $district_id))->row()->name;
            $date           =   date('l, d F Y', $data['timestamp']);
            $time           =   date('g:i a', $data['timestamp']);
            $message        =   $grampanchayat_name . ', your requested appointment with district ' . $district_name . ' on ' . $date . ' at ' . $time . ' has been approved.';
            $receiver_phone =   $this->db->get_where('grampanchayat',
                                array('grampanchayat_id' => $grampanchayat_id))->row()->phone;
            
            $this->sms_model->send_sms($message, $receiver_phone);
        }
    }
    
    function delete_appointment_info($appointment_id)
    {
        $this->db->where('appointment_id',$appointment_id);
        $this->db->delete('appointment');
    }
    
    function save_prescription_info()
    {
        $data['timestamp']      = strtotime($this->input->post('date_timestamp').' '.$this->input->post('time_timestamp') );
        $data['grampanchayat_id']     = $this->input->post('grampanchayat_id');
        $data['case_history']   = $this->input->post('case_history');
        $data['medication']     = $this->input->post('medication');
        $data['note']           = $this->input->post('note');
        $data['district_id']      = $this->session->userdata('login_user_id');
        
        $this->db->insert('prescription',$data);
    }
    function save_newprescription_info() 
    {
         $data['timestamp']      = strtotime($this->input->post('date_timestamp').' '.$this->input->post('time_timestamp') );
        $data['charges']     = $this->input->post('charges');
         $data['grampanchayat_id']     = $this->input->post('grampanchayat_id');
        $data['district_id']      = $this->session->userdata('login_user_id');
        $medicine_entries            = array();
        $medicine               = $this->input->post('entry_medicine');
        $morning                    = $this->input->post('entry_morning');
        $afternoon                    = $this->input->post('entry_afternoon');
        $evening                  = $this->input->post('entry_evening');
        $number_of_entries          = sizeof($medicine);
        
        for ($i = 0; $i < $number_of_entries; $i++)
        {
            if ($medicine[$i] != "")
            {
                $new_entry          = array('medicine' => $medicine[$i], 'morning' => $morning[$i], 'afternoon' => $afternoon[$i], 'evening' => $evening[$i]);
                array_push($medicine_entries, $new_entry);
            }
        }
        $data['medicine_entries']    = json_encode($medicine_entries);

        $this->db->insert('newprescription', $data);
    }
    function update_newprescription_info($prescription_id)
    {
        $data['timestamp']      = strtotime($this->input->post('date_timestamp').' '.$this->input->post('time_timestamp') );
        $data['grampanchayat_id']     = $this->input->post('grampanchayat_id');
        $data['charges']     = $this->input->post('charges');
        $data['district_id']      = $this->session->userdata('login_user_id');

       $medicine_entries            = array();
        $medicine               = $this->input->post('entry_medicine');
        $morning                    = $this->input->post('entry_morning');
        $afternoon                    = $this->input->post('entry_afternoon');
        $evening                  = $this->input->post('entry_evening');
        $number_of_entries          = sizeof($medicine);
        
        for ($i = 0; $i < $number_of_entries; $i++)
        {
            if ($medicine[$i] != "")
            {
                $new_entry          = array('medicine' => $medicine[$i], 'morning' => $morning[$i], 'afternoon' => $afternoon[$i], 'evening' => $evening[$i]);
                array_push($medicine_entries, $new_entry);
            }
        }
        $data['medicine_entries']    = json_encode($medicine_entries);

        $this->db->where('newpres_id', $prescription_id);
        $this->db->update('newprescription', $data);
    }
    
    function delete_newprescription_info($prescription_id)
    {
        $this->db->where('newpres_id',$prescription_id);
        $this->db->delete('newprescription');
    }
    function select_newprescription_info_by_district_id()
    {
        $district_id = $this->session->userdata('login_user_id');
        return $this->db->get_where('newprescription', array('district_id' => $district_id))->result_array();
    }
    
    function select_prescription_info_by_district_id()
    {
        $district_id = $this->session->userdata('login_user_id');
        return $this->db->get_where('prescription', array('district_id' => $district_id))->result_array();
    }
    
    function select_medication_history( $grampanchayat_id = '' )
    {
        return $this->db->get_where('prescription', array('grampanchayat_id' => $grampanchayat_id))->result_array();
    }
    
    function select_prescription_info_by_grampanchayat_id()
    {
        $grampanchayat_id = $this->session->userdata('login_user_id');
        return $this->db->get_where('prescription', array('grampanchayat_id' => $grampanchayat_id))->result_array();
    }
    
    function update_prescription_info($prescription_id)
    {
        $data['timestamp']      = strtotime($this->input->post('date_timestamp').' '.$this->input->post('time_timestamp') );
        $data['grampanchayat_id']     = $this->input->post('grampanchayat_id');
        $data['case_history']   = $this->input->post('case_history');
        $data['medication']     = $this->input->post('medication');
        $data['note']           = $this->input->post('note');
        $data['district_id']      = $this->session->userdata('login_user_id');
        
        $this->db->where('prescription_id',$prescription_id);
        $this->db->update('prescription',$data);
    }
    
    function delete_prescription_info($prescription_id)
    {
        $this->db->where('prescription_id',$prescription_id);
        $this->db->delete('prescription');
    }
    
    function save_diagnosis_report_info()
    {
        $data['timestamp']          = strtotime($this->input->post('date_timestamp').' '.$this->input->post('time_timestamp') );
        $data['report_type']        = $this->input->post('report_type');
        $data['file_name']          = $_FILES["file_name"]["name"];
        $data['document_type']      = $this->input->post('document_type');
        $data['description']        = $this->input->post('description');
        $data['prescription_id']    = $this->input->post('prescription_id');
        
        $this->db->insert('diagnosis_report',$data);
        
        $diagnosis_report_id        = $this->db->insert_id();
        move_uploaded_file($_FILES["file_name"]["tmp_name"], "uploads/diagnosis_report/" . $_FILES["file_name"]["name"]);
    }
    
    function select_diagnosis_report_info()
    {
        return $this->db->get('diagnosis_report')->result_array();
    }
    
    function delete_diagnosis_report_info($diagnosis_report_id)
    {
        $this->db->where('diagnosis_report_id',$diagnosis_report_id);
        $this->db->delete('diagnosis_report');
    }
    
    function save_notice_info()
    {
        $data['title']              = $this->input->post('title');
        $data['description']        = $this->input->post('description');
        if($this->input->post('start_timestamp') != '')
            $data['start_timestamp']    = strtotime($this->input->post('start_timestamp'));
        else 
            $data['start_timestamp']    = '';
        if($this->input->post('end_timestamp') != '')
            $data['end_timestamp']      = strtotime($this->input->post('end_timestamp'));
        else
            $data['end_timestamp']      = $data['start_timestamp'];
        
        $this->db->insert('notice',$data);
    }
    
    function select_notice_info()
    {
        return $this->db->get('notice')->result_array();
    }
    
    function update_notice_info($notice_id)
    {
        $data['title']              = $this->input->post('title');
        $data['description']        = $this->input->post('description');
        if($this->input->post('start_timestamp') != '')
            $data['start_timestamp']    = strtotime($this->input->post('start_timestamp'));
        else 
            $data['start_timestamp']    = '';
        if($this->input->post('end_timestamp') != '')
            $data['end_timestamp']      = strtotime($this->input->post('end_timestamp'));
        else
            $data['end_timestamp']      = $data['start_timestamp'];
        
        $this->db->where('notice_id',$notice_id);
        $this->db->update('notice',$data);
    }
    
    function delete_notice_info($notice_id)
    {
        $this->db->where('notice_id',$notice_id);
        $this->db->delete('notice');
    }
    /*****grampanchayat***/
    
    function save_nagrik_info()
    {
		$data['grampanchayat_id']        = $this->session->userdata('login_user_id');
        $data['name'] 		= $this->input->post('name');
        $data['wife']    = $this->input->post('wife');
        $data['mobile']    = $this->input->post('mobile');
        $data['aadhar_no']    = $this->input->post('aadhar_no');
        $data['toilet']    = $this->input->post('toilet');
        
        $this->db->insert('nagrik',$data);
    }
    
    function select_nagrik_info()
    {
        //return $this->db->get('nagrik')->result_array();		
		$grampanchayat_id = $this->session->userdata('login_user_id');
        return $this->db->get_where('nagrik', array('grampanchayat_id' => $grampanchayat_id))->result_array();
    }
    
    function update_nagrik_info($nagrik_id)
    {
        $data['grampanchayat_id']        = $this->session->userdata('login_user_id');
        $data['name'] 	 = $this->input->post('name');
        $data['wife']    = $this->input->post('wife');
        $data['mobile']    = $this->input->post('mobile');
        $data['aadhar_no']    = $this->input->post('aadhar_no');
        $data['toilet']    = $this->input->post('toilet');
        
        $this->db->where('nagrik_id',$nagrik_id);
        $this->db->update('nagrik',$data);
       //  echo "<script>alert('hello'+$nagrik_id);</script>"; 
    }
    
    function delete_nagrik_info($nagrik_id)
    {
        $this->db->where('nagrik_id',$nagrik_id);
        $this->db->delete('nagrik');
    }
	
	
	/********new nagrik*********/
	
	function save_new_nagrik_info()
    {
		$data['grampanchayat_id']        = $this->session->userdata('login_user_id');
        $data['name'] 		= $this->input->post('name');
        $data['wife']    = $this->input->post('wife');
        $data['mobile']    = $this->input->post('mobile');
        $data['aadhar_no']    = $this->input->post('aadhar_no');
        $data['toilet']    = $this->input->post('toilet');
        
        $this->db->insert('new_nagrik',$data);
    }
    
    function select_new_nagrik_info()
    {
        //return $this->db->get('nagrik')->result_array();		
		$grampanchayat_id = $this->session->userdata('login_user_id');
        return $this->db->get_where('new_nagrik', array('grampanchayat_id' => $grampanchayat_id))->result_array();
    }
    
    function update_new_nagrik_info($new_nagrik_id)
    {
        $data['grampanchayat_id']        = $this->session->userdata('login_user_id');
        $data['name'] 	 = $this->input->post('name');
        $data['wife']    = $this->input->post('wife');
        $data['mobile']    = $this->input->post('mobile');
        $data['aadhar_no']    = $this->input->post('aadhar_no');
        $data['toilet']    = $this->input->post('toilet');
        
        $this->db->where('new_nagrik_id',$new_nagrik_id);
        $this->db->update('new_nagrik',$data);
       //  echo "<script>alert('hello'+$nagrik_id);</script>"; 
    }
    
    function delete_new_nagrik_info($new_nagrik_id)
    {
        $this->db->where('new_nagrik_id',$new_nagrik_id);
        $this->db->delete('new_nagrik');
    }
    
    
    function save_malmatta_info()
    {
        $data['grampanchayat_id']        = $this->session->userdata('login_user_id');
        $data['year']                    = $this->input->post('year');
        $data['rastyache_nav']           = $this->input->post('rastyache_nav');
        $data['city_surve_no']           = $this->input->post('city_surve_no');
        $data['gat_no']                  = $this->input->post('gat_no');
        $data['milkat_no']               = $this->input->post('milkat_no');
		$data['sub_milkat_no']               = $this->input->post('sub_milkat_no');
        $data['nagrik_id']               = $this->input->post('nagrik_id');
        $data['bogwatdar_name']          = $this->input->post('bogwatdar_name');
        $data['milkat_prakar']           = $this->input->post('milkat_prakar');
        $data['rate']                    = $this->input->post('rate');
        $data['built_year']              = $this->input->post('built_year');
        $data['ghasara']              = $this->input->post('deduction');
        //$data['bandwal_rate_type']       = $this->input->post('bandwal_rate_type');
        $data['building_type_id']        = $this->input->post('building_type_id');
        $data['building_floor']          = $this->input->post('building_floor');
        $data['building_length']         = $this->input->post('building_length');
        $data['building_breadth']        = $this->input->post('building_breadth');
        $data['building_area']           = $this->input->post('building_area');
        $data['building_use_type']       = $this->input->post('building_use_type');
        //$data['land_prat_type']          = $this->input->post('land_prat_type');
        //$data['land_year_rate']          = $this->input->post('land_year_rate');
        $data['building_rate_amt']       = $this->input->post('building_rate_amt');
        $data['building_tax_rate']       = $this->input->post('building_tax_rate'); 
        $data['building_tax']            = $this->input->post('building_tax');
		$data['health_tax']            = $this->input->post('health_tax');
		$data['light_tax']            = $this->input->post('light_tax');
		$data['water_tax']            = $this->input->post('water_tax');
		$data['milkat_description']            = $this->input->post('milkat_description');
		$data['shera']            = $this->input->post('shera');
        
        $this->db->insert('nagrik_malmatta',$data);
    }
	function save_jamin_info()
    {
        $data['grampanchayat_id']        = $this->session->userdata('login_user_id');
        $data['year']                    = $this->input->post('year');
        $data['rastyache_nav']           = $this->input->post('rastyache_nav');
        $data['city_surve_no']           = $this->input->post('city_surve_no');
        $data['gat_no']                  = $this->input->post('gat_no');
        $data['milkat_no']               = $this->input->post('milkat_no');
		$data['sub_milkat_no']               = $this->input->post('sub_milkat_no');
        $data['nagrik_id']               = $this->input->post('nagrik_id');
        $data['bogwatdar_name']          = $this->input->post('bogwatdar_name');
        $data['milkat_prakar']           = $this->input->post('milkat_prakar');
        //$data['milkat_description']      = $this->input->post('milkat_description');
        //$data['built_year']              = $this->input->post('built_year');
        //$data['ghasara']              = $this->input->post('deduction');
        //$data['bandwal_rate_type']       = $this->input->post('bandwal_rate_type');
        //$data['building_type_id']        = $this->input->post('building_type_id');
        //$data['building_floor']          = $this->input->post('building_floor');
        $data['building_length']         = $this->input->post('building_length');
        $data['building_breadth']        = $this->input->post('building_breadth');
        $data['building_area']           = $this->input->post('building_area');
        //$data['building_use_type']       = $this->input->post('building_use_type');
        $data['land_prat_type']          = $this->input->post('land_prat_type');
        $data['land_year_rate']          = $this->input->post('land_year_rate');
        $data['building_rate_amt']       = $this->input->post('building_rate_amt');
        $data['building_tax_rate']       = $this->input->post('building_tax_rate'); 
        $data['building_tax']            = $this->input->post('building_tax');
		$data['health_tax']            = $this->input->post('health_tax');
		$data['light_tax']            = $this->input->post('light_tax');
		$data['water_tax']            = $this->input->post('water_tax');
		$data['milkat_description']            = $this->input->post('milkat_description');
		$data['shera']            = $this->input->post('shera');
        
        $this->db->insert('nagrik_malmatta',$data);
    }
    function save_manora_info()
    {
        $data['grampanchayat_id']        = $this->session->userdata('login_user_id');
        $data['year']                    = $this->input->post('year');
        $data['rastyache_nav']           = $this->input->post('rastyache_nav');
        $data['city_surve_no']           = $this->input->post('city_surve_no');
        $data['gat_no']                  = $this->input->post('gat_no');
        $data['milkat_no']               = $this->input->post('milkat_no');
		$data['sub_milkat_no']               = $this->input->post('sub_milkat_no');
        $data['nagrik_id']               = $this->input->post('nagrik_id');
        $data['bogwatdar_name']          = $this->input->post('bogwatdar_name');
        $data['milkat_prakar']           = $this->input->post('milkat_prakar');
        //$data['milkat_description']      = $this->input->post('milkat_description');
        //$data['built_year']              = $this->input->post('built_year');
        //$data['ghasara']              = $this->input->post('deduction');
        //$data['bandwal_rate_type']       = $this->input->post('bandwal_rate_type');
        //$data['building_type_id']        = $this->input->post('building_type_id');
        //$data['building_floor']          = $this->input->post('building_floor');
        $data['building_length']         = $this->input->post('building_length');
        $data['building_breadth']        = $this->input->post('building_breadth');
        $data['building_area']           = $this->input->post('building_area');
        //$data['building_use_type']       = $this->input->post('building_use_type');
        $data['manora_type']         	 = $this->input->post('manora_type');
        $data['gram_type	']          = $this->input->post('gram_type');
        //$data['building_rate_amt']       = $this->input->post('building_rate_amt');
        $data['building_tax_rate']       = $this->input->post('building_tax_rate'); 
        $data['building_tax']            = $this->input->post('building_tax');
		$data['health_tax']            = $this->input->post('health_tax');
		$data['light_tax']            = $this->input->post('light_tax');
		$data['water_tax']            = $this->input->post('water_tax');
		$data['milkat_description']            = $this->input->post('milkat_description');
		$data['shera']            = $this->input->post('shera');
        
        $this->db->insert('nagrik_malmatta',$data);
    }
    
	 function save_govt_info()
    {
        $data['grampanchayat_id']        = $this->session->userdata('login_user_id');
        $data['year']                    = $this->input->post('year');
        $data['rastyache_nav']           = $this->input->post('rastyache_nav');
        $data['city_surve_no']           = $this->input->post('city_surve_no');
        $data['gat_no']                  = $this->input->post('gat_no');
        $data['milkat_no']               = $this->input->post('milkat_no');
		$data['sub_milkat_no']               = $this->input->post('sub_milkat_no');
        $data['nagrik_id']               = 0;
		 $data['gram_name']               = $this->input->post('gram_name');
        $data['bogwatdar_name']          = $this->input->post('bogwatdar_name');
        $data['milkat_prakar']           = $this->input->post('milkat_prakar');
        
        $data['building_length']         = $this->input->post('building_length');
        $data['building_breadth']        = $this->input->post('building_breadth');
        $data['building_area']           = $this->input->post('building_area');
        //$data['building_use_type']       = $this->input->post('building_use_type');
       
        
		$data['milkat_description']      = $this->input->post('milkat_description');
		$data['shera']            = $this->input->post('shera');
        
        $this->db->insert('nagrik_malmatta',$data);
    }
    
	
    function select_malmatta_info()
    {
        //return $this->db->get('nagrik_malmatta')->result_array();
		$grampanchayat_id = $this->session->userdata('login_user_id');
        return $this->db->get_where('nagrik_malmatta', array('grampanchayat_id' => $grampanchayat_id))->result_array();
    }
    
	 function select_export_info()
    {
        //return $this->db->get('nagrik_malmatta')->result_array();
		$grampanchayat_id = $this->session->userdata('login_user_id');
		$this->db->order_by('milkat_no');
        return $this->db->get_where('nagrik_malmatta', array('grampanchayat_id' => $grampanchayat_id))->result_array();
    }
	
	 function select_export_nine_info()
    {
        //return $this->db->get('nagrik_malmatta')->result_array();
		$grampanchayat_id = $this->session->userdata('login_user_id');
        return $this->db->get_where('namuna_nine', array('grampanchayat_id' => $grampanchayat_id))->result_array();
    }
    
    function update_malmatta_info($nagrik_malmatta_id)
    {
      $data['grampanchayat_id']        = $this->session->userdata('login_user_id');
        $data['year']                    = $this->input->post('year');
        $data['rastyache_nav']           = $this->input->post('rastyache_nav');
        $data['city_surve_no']           = $this->input->post('city_surve_no');
        $data['gat_no']                  = $this->input->post('gat_no');
        $data['milkat_no']               = $this->input->post('milkat_no');
		$data['sub_milkat_no']               = $this->input->post('sub_milkat_no');
        $data['nagrik_id']               = $this->input->post('nagrik_id');
		$data['gram_name']               = $this->input->post('gram_name');
        $data['bogwatdar_name']          = $this->input->post('bogwatdar_name');
        $data['milkat_prakar']           = $this->input->post('milkat_prakar');
        $data['rate']                    = $this->input->post('rate');
        $data['built_year']              = $this->input->post('built_year');
        $data['ghasara']              = $this->input->post('deduction');
        //$data['bandwal_rate_type']       = $this->input->post('bandwal_rate_type');
        $data['building_type_id']        = $this->input->post('building_type_id');
        $data['building_floor']          = $this->input->post('building_floor');
        $data['building_length']         = $this->input->post('building_length');
        $data['building_breadth']        = $this->input->post('building_breadth');
        $data['building_area']           = $this->input->post('building_area');
        $data['building_use_type']       = $this->input->post('building_use_type');
		/*jamin***/
		 $data['land_prat_type']          = $this->input->post('land_prat_type');
        $data['land_year_rate']          = $this->input->post('land_year_rate');
		/***jamin*/
		/*manora****/
		$data['manora_type']         	 = $this->input->post('manora_type');
        $data['gram_type	']          = $this->input->post('gram_type');
		/****manora*/
        $data['building_rate_amt']       = $this->input->post('building_rate_amt');
        $data['building_tax_rate']       = $this->input->post('building_tax_rate'); 
        $data['building_tax']            = $this->input->post('building_tax');
		$data['health_tax']            = $this->input->post('health_tax');
		$data['light_tax']            = $this->input->post('light_tax');
		$data['water_tax']            = $this->input->post('water_tax');
		$data['milkat_description']            = $this->input->post('milkat_description');
		$data['shera']            = $this->input->post('shera');
        
        
        $this->db->where('nagrik_malmatta_id',$nagrik_malmatta_id);
        $this->db->update('nagrik_malmatta',$data);
        // echo "<script>alert('hello'+$nagrik_id);</script>"; 
    }
    
    function delete_malmatta_info($nagrik_malmatta_id)
    {
        $this->db->where('nagrik_malmatta_id',$nagrik_malmatta_id);
        $this->db->delete('nagrik_malmatta');
    }
    /****namuna-nine****/
	
	 function save_namuna_nine_info()
    {
        $data['grampanchayat_id']        = $this->session->userdata('login_user_id');
		$data['nagrik_id']               = $this->input->post('nagrik_id');
        $data['year']                    = $this->input->post('year');
		$data['current_patti']          = $this->input->post('current_patti');
		 $data['sut_id']         		= $this->input->post('sut_id');
		 $data['sut_milkat_id']         = $this->input->post('sutt_milkat_id');
		 $data['sut_milkat_amt']         = $this->input->post('sut_milkat_amt');
        $data['sut_deduct_patti']        = $this->input->post('sut_deduct_patti');
		$data['old_patti']             = $this->input->post('old_patti');
		$data['total_patti']           = $this->input->post('total_patti');
		
		$data['current_health_patti']           = $this->input->post('current_health_patti');
		$data['old_health_patti']           = $this->input->post('old_health_patti');
		$data['current_light_patti']           = $this->input->post('current_light_patti');
		$data['old_light_patti']           = $this->input->post('old_light_patti');
		$data['current_water_patti']           = $this->input->post('current_water_patti');
		$data['old_water_patti']           = $this->input->post('old_water_patti');
		
        $data['built_year']            = $this->input->post('built_year');
		$data['calculated_patti']      = $this->input->post('calculated_patti');
		$data['rem_patti']             = $this->input->post('rem_patti');
		$data['total_pay_patti']             = $this->input->post('total_pay_patti');
		$data['add_year']             =  date('Y');
		
        $this->db->insert('namuna_nine',$data);
    }
    
    function select_namuna_nine_info()
    {
        //return $this->db->get('nagrik_malmatta')->result_array();
		$grampanchayat_id = $this->session->userdata('login_user_id');
        return $this->db->get_where('namuna_nine', array('grampanchayat_id' => $grampanchayat_id))->result_array();
    }
    
    function update_namuna_nine_info($namuna_nine_id)
    {
      $data['grampanchayat_id']        = $this->session->userdata('login_user_id');
		$data['nagrik_id']               = $this->input->post('nagrik_id');
        $data['year']                    = $this->input->post('year');
		$data['current_patti']          = $this->input->post('current_patti');
		 $data['sut_id']         		= $this->input->post('sut_id');
		 $data['sut_milkat_id']         = $this->input->post('sutt_milkat_id');
		 $data['sut_milkat_amt']         = $this->input->post('sut_milkat_amt');
        $data['sut_deduct_patti']             = $this->input->post('sut_deduct_patti');
		$data['old_patti']             = $this->input->post('old_patti');
		$data['total_patti']           = $this->input->post('total_patti');
        $data['built_year']            = $this->input->post('built_year');
		$data['calculated_patti']      = $this->input->post('calculated_patti');
		$data['rem_patti']             = $this->input->post('rem_patti');
		$data['total_pay_patti']             = $this->input->post('total_pay_patti');
        
        
        $this->db->where('namuna_nine_id',$namuna_nine_id);
        $this->db->update('namuna_nine',$data);
        // echo "<script>alert('hello'+$nagrik_id);</script>"; 
    }
    
    function delete_namuna_nine_info($namuna_nine_id)
    {
        $this->db->where('namuna_nine_id',$namuna_nine_id);
        $this->db->delete('namuna_nine');
    }
	
	
	
	/****namuna-nine****/
	/****payment***/
	function pay_namuna_nine_info($namuna_nine_id){
		
		$data['paid_old_patti']            		 = $this->input->post('paid_old_patti');
		$data['paid_total_patti']             	 = $this->input->post('paid_total_patti');
		$data['paid_old_health_patti']           = $this->input->post('paid_old_health_patti');
        $data['paid_current_health_patti']       = $this->input->post('paid_current_health_patti');
		$data['paid_old_light_patti']     		 = $this->input->post('paid_old_light_patti');
		$data['paid_current_light_patti']        = $this->input->post('paid_current_light_patti');
		$data['paid_old_water_patti']            = $this->input->post('paid_old_water_patti');
		$data['paid_current_water_patti']        = $this->input->post('paid_current_water_patti');
		
		
        $this->db->where('namuna_nine_id',$namuna_nine_id);
        $this->db->update('namuna_nine',$data);
	}
	function select_pay_namuna_nine_info(){
		$grampanchayat_id = $this->session->userdata('login_user_id');
        return $this->db->get_where('namuna_nine', array('grampanchayat_id' => $grampanchayat_id))->result_array();
	}
	/****payment***/
    function save_land_prat_info()
    {
        $data['name'] 		= $this->input->post('name');
        $data['min_range'] 	= $this->input->post('min');
        $data['max_range'] 	= $this->input->post('max');        
        $data['rate'] 	= $this->input->post('rate');
        $this->db->insert('land_prat_type',$data);
       
    }
    
    function select_land_prat_info()
    {
    	$this->db->order_by('land_prat_type_id');
        return $this->db->get('land_prat_type')->result_array();
    }
    
    function update_land_prat_info($land_prat_type_id)
    {
        $data['name'] 		= $this->input->post('name');
        $data['min_range'] 	= $this->input->post('min');
        $data['max_range'] 	= $this->input->post('max');
        $data['rate'] 	= $this->input->post('rate');
        $this->db->where('land_prat_type_id',$land_prat_type_id);
        $this->db->update('land_prat_type',$data);
    }
    
    function delete_land_prat_info($land_prat_type_id)
    {
        $this->db->where('land_prat_type_id',$land_prat_type_id);
        $this->db->delete('land_prat_type');
    }
	
	
	
    function save_bandhkam_rate_info(){
		
		$data['grampanchayat_id']        = $this->session->userdata('login_user_id');
        $data['bandkam_rate'] 	= $this->input->post('bandkam_rate');
        $this->db->insert('bandhkam_rate',$data);
		
	}
	function update_bandhkam_rate_info($bandhkam_rate_id)
    {
        $data['grampanchayat_id']        = $this->session->userdata('login_user_id');
        $data['bandkam_rate'] 	= $this->input->post('bandkam_rate');
        
        $this->db->where('bandhkam_rate_id',$bandhkam_rate_id);
        $this->db->update('bandhkam_rate',$data);
    }
    function select_bandhkam_rate_info()
    {
		$grampanchayat_id        = $this->session->userdata('login_user_id');
		$this->db->where('grampanchayat_id',$grampanchayat_id);
    	
        return $this->db->get('bandhkam_rate')->result_array();
    }
	
	
	function save_building_rates_info(){
		
		$data['grampanchayat_id']        = $this->session->userdata('login_user_id');
        $data['zopdi_rates'] 			 = $this->input->post('zopdi_rates');
		$data['dagad_vita_rates'] 		 = $this->input->post('dagad_vita_rates');
		$data['vita_chuna_rates'] 		 = $this->input->post('vita_chuna_rates');
		$data['rcc_rates'] 				 = $this->input->post('rcc_rates');
        $this->db->insert('gram_varshik_rate',$data);
		
	}
	function update_building_rates_info($gram_varshik_rate_id)
    {
        $data['grampanchayat_id']        = $this->session->userdata('login_user_id');
        $data['zopdi_rates'] 			 = $this->input->post('zopdi_rates');
		$data['dagad_vita_rates'] 		 = $this->input->post('dagad_vita_rates');
		$data['vita_chuna_rates'] 		 = $this->input->post('vita_chuna_rates');
		$data['rcc_rates'] 				 = $this->input->post('rcc_rates');
        
        $this->db->where('gram_varshik_rate_id',$gram_varshik_rate_id);
        $this->db->update('gram_varshik_rate',$data);
    }
    function select_building_rates_info()
    {
		$grampanchayat_id        = $this->session->userdata('login_user_id');
		$this->db->where('grampanchayat_id',$grampanchayat_id);
    	
        return $this->db->get('gram_varshik_rate')->result_array();
    }
	
	
	
	function save_land_rates_info(){
		
		$data['grampanchayat_id']        = $this->session->userdata('login_user_id');
		$data['land_prat_type_id'] 			 = $this->input->post('land_prat_type_id');
        $data['land_rates'] 			 = $this->input->post('land_rates');
		
        $this->db->insert('gram_land_rates',$data);
		
	}
	function update_land_rates_info($gram_land_rates_id)
    {
        $data['grampanchayat_id']        = $this->session->userdata('login_user_id');
		$data['land_prat_type_id'] 			 = $this->input->post('land_prat_type_id');
        $data['land_rates'] 			 = $this->input->post('land_rates');
		
        $this->db->where('gram_land_rates_id',$gram_land_rates_id);
        $this->db->update('gram_land_rates',$data);
    }
    function select_land_rates_info()
    {
		$grampanchayat_id        = $this->session->userdata('login_user_id');
		$this->db->where('grampanchayat_id',$grampanchayat_id);
    	$this->db->order_by('land_prat_type_id');
        return $this->db->get('gram_land_rates')->result_array();
    }
	
	
	
	function save_health_rates_info(){
		
		$data['grampanchayat_id']        = $this->session->userdata('login_user_id');
        $data['below_300'] 			 = $this->input->post('below_300');
		$data['301_to_700'] 		 = $this->input->post('301_to_700');
		$data['701_above']  		 = $this->input->post('701_above');
		
        $this->db->insert('gram_health_patti',$data);
		
	}
	function update_health_rates_info($gram_health_patti_id)
    {
        $data['grampanchayat_id']        = $this->session->userdata('login_user_id');
        $data['below_300'] 			 = $this->input->post('below_300');
		$data['301_to_700'] 		 = $this->input->post('301_to_700');
		$data['701_above']  		 = $this->input->post('701_above');
        
        $this->db->where('gram_health_patti_id',$gram_health_patti_id);
        $this->db->update('gram_health_patti',$data);
    }
    function select_health_rates_info()
    {
		$grampanchayat_id        = $this->session->userdata('login_user_id');
		$this->db->where('grampanchayat_id',$grampanchayat_id);
    	
        return $this->db->get('gram_health_patti')->result_array();
    }
	
	
	function save_light_rates_info(){
		
		$data['grampanchayat_id']        = $this->session->userdata('login_user_id');
        $data['below_300'] 			 = $this->input->post('below_300');
		$data['301_to_700'] 		 = $this->input->post('301_to_700');
		$data['701_above']  		 = $this->input->post('701_above');
		
        $this->db->insert('gram_light_patti',$data);
		
	}
	function update_light_rates_info($gram_light_patti_id)
    {
        $data['grampanchayat_id']        = $this->session->userdata('login_user_id');
        $data['below_300'] 			 = $this->input->post('below_300');
		$data['301_to_700'] 		 = $this->input->post('301_to_700');
		$data['701_above']  		 = $this->input->post('701_above');
        
        $this->db->where('gram_light_patti_id',$gram_light_patti_id);
        $this->db->update('gram_light_patti',$data);
    }
    function select_light_rates_info()
    {
		$grampanchayat_id        = $this->session->userdata('login_user_id');
		$this->db->where('grampanchayat_id',$grampanchayat_id);
    	
        return $this->db->get('gram_light_patti')->result_array();
    }
	
	function save_panipatti_rates_info(){
		
		$data['grampanchayat_id']        = $this->session->userdata('login_user_id');
        $data['panipatti'] 			 = $this->input->post('panipatti');
		$data['special_panipatti'] 		 = $this->input->post('special_panipatti');
		
        $this->db->insert('gram_panipatti',$data);
		
	}
	function update_panipatti_rates_info($gram_panipatti_id)
    {
        $data['grampanchayat_id']        = $this->session->userdata('login_user_id');
        $data['panipatti'] 			 = $this->input->post('panipatti');
		$data['special_panipatti'] 		 = $this->input->post('special_panipatti');
        
        $this->db->where('gram_panipatti_id',$gram_panipatti_id);
        $this->db->update('gram_panipatti',$data);
    }
    function select_panipatti_rates_info()
    {
		$grampanchayat_id        = $this->session->userdata('login_user_id');
		$this->db->where('grampanchayat_id',$grampanchayat_id);
    	
        return $this->db->get('gram_panipatti')->result_array();
    }
	
    /****grampanchayat***/
    
    
    ////////private message//////
    function send_new_private_message() {
        $message    = $this->input->post('message');
        $timestamp  = strtotime(date("Y-m-d H:i:s"));

        $reciever   = $this->input->post('reciever');
        $sender     = $this->session->userdata('login_type') . '-' . $this->session->userdata('login_user_id');

        //check if the thread between those 2 users exists, if not create new thread
        $num1 = $this->db->get_where('message_thread', array('sender' => $sender, 'reciever' => $reciever))->num_rows();
        $num2 = $this->db->get_where('message_thread', array('sender' => $reciever, 'reciever' => $sender))->num_rows();

        if ($num1 == 0 && $num2 == 0) {
            $message_thread_code                        = substr(md5(rand(100000000, 20000000000)), 0, 15);
            $data_message_thread['message_thread_code'] = $message_thread_code;
            $data_message_thread['sender']              = $sender;
            $data_message_thread['reciever']            = $reciever;
            $this->db->insert('message_thread', $data_message_thread);
        }
        if ($num1 > 0)
            $message_thread_code = $this->db->get_where('message_thread', array('sender' => $sender, 'reciever' => $reciever))->row()->message_thread_code;
        if ($num2 > 0)
            $message_thread_code = $this->db->get_where('message_thread', array('sender' => $reciever, 'reciever' => $sender))->row()->message_thread_code;


        $data_message['message_thread_code']    = $message_thread_code;
        $data_message['message']                = $message;
        $data_message['sender']                 = $sender;
        $data_message['timestamp']              = $timestamp;
        $this->db->insert('message', $data_message);

        return $message_thread_code;
    }

    function send_reply_message($message_thread_code) {
        $message    = $this->input->post('message');
        $timestamp  = strtotime(date("Y-m-d H:i:s"));
        $sender     = $this->session->userdata('login_type') . '-' . $this->session->userdata('login_user_id');


        $data_message['message_thread_code']    = $message_thread_code;
        $data_message['message']                = $message;
        $data_message['sender']                 = $sender;
        $data_message['timestamp']              = $timestamp;
        $this->db->insert('message', $data_message);
    }

    function mark_thread_messages_read($message_thread_code) {
        // mark read only the oponnent messages of this thread, not currently logged in user's sent messages
        $current_user = $this->session->userdata('login_type') . '-' . $this->session->userdata('login_user_id');
        $this->db->where('sender !=', $current_user);
        $this->db->where('message_thread_code', $message_thread_code);
        $this->db->update('message', array('read_status' => 1));
    }

    function count_unread_message_of_thread($message_thread_code) {
        $unread_message_counter = 0;
        $current_user = $this->session->userdata('login_type') . '-' . $this->session->userdata('login_user_id');
        $messages = $this->db->get_where('message', array('message_thread_code' => $message_thread_code))->result_array();
        foreach ($messages as $row) {
            if ($row['sender'] != $current_user && $row['read_status'] == '0')
                $unread_message_counter++;
        }
        return $unread_message_counter;
    }
    function GetRow($keyword) {        
        $this->db->order_by('medicine_id');
        $this->db->like("name", $keyword);
        return $this->db->get('medicine')->result_array();
    }
    function getMainCategories($keyword) {
    $district_info=$this->db->get_where('district' , array('department_id' => $keyword ))->result_array();
    
    echo'<select name="district_id" id="district_id" required="" onchange="loadTaluka(this.value)" class="form-control">';
                                    echo'<option value="">---'.get_phrase('जिल्हा निवडा').'---</option>';
                                   foreach ($district_info as $row3) { 
                                        echo'<option value="'. $row3['district_id'].'">'.$row3['name'].'</option>';
                                     } 
                                echo'</select>';
}
	function getMainTaluka($keyword) {
    $taluka_info=$this->db->get_where('taluka' , array('district_id' => $keyword ))->result_array();
    
    echo'<select name="taluka_id" id="taluka_id" required="" class="form-control">';
                                    echo'<option value="">---'.get_phrase('तालुका निवडा').'---</option>';
                                   foreach ($taluka_info as $row3) { 
                                        echo'<option value="'. $row3['taluka_id'].'">'.$row3['name'].'</option>';
                                     } 
                                echo'</select>';
}
function getRates($keyword) {
    $building_tax_info=$this->db->get_where('building_tax' , array('building_type_id' => $keyword ))->result_array();
     foreach ($building_tax_info as $row3) { 
    echo' <table class="table table-bordered"><tr><th>किमान दर (पैश्यामधे)</th><th>कमाल दर (पैश्यामधे)</th></tr>
		<tr><td><input type="text" name="kiman" readonly value="'. $row3['minimum_rate'].'" id="kiman" class="col-sm-3 form-control"></td>';
		echo'<td><input type="text" name="kamal" readonly value="'.$row3['maximum_rate'].'" id="kamal" class="col-sm-3 form-control"></td></tr></table>';
		//echo '<label for="field-1" class="col-sm-3 control-label">इमारतीवरील कराचा दर (पैसे)<span style="color:red">*</span></label>';
		/* echo'<select name="building_tax_rate" id="rates" required=""  class="form-control">';
                                    echo'<option value="">---'.get_phrase('इमारतीवरील कराचा दर निवडा').'---</option>';
                                   foreach ($building_tax_info as $row3) { 
                                       	echo'<option value="'. $row3['minimum_rate'].'">किमान दर '.$row3['minimum_rate'].' पैसे</option>';
										 echo'<option value="'. $row3['maximum_rate'].'">कमाल दर '.$row3['maximum_rate'].' पैसे</option>';
                                     } 
                                echo'</select>';*/
		
		
	}
	
}


function getDeductions($keyword) {

	 $query = $this->db->query("SELECT * FROM building where ".$keyword." BETWEEN min_year and max_year;");
	  foreach ($query->result() as $row)
	{
            $building_id= $row->building_id;
	}
         $deduction_info=$this->db->get_where('building_deduction' , array('building_id' => $building_id ))->result_array();
          foreach ($deduction_info as $row1) {
          $deduction_entries    = json_decode($row1['deduction_entries']);
          }
    echo'<select  name="deduction" id = "deduction" class="deduction form-control">';
                                    echo'<option value="">---'.get_phrase('घसारा दर निवडा').'---</option>';
                                   foreach ($deduction_entries as $deduction_entry) { 
                                       $name = $this->db->get_where('building_type' , array('building_type_id' => $deduction_entry->building ))->row()->name; 
                                       	echo'<option data-id="'.$deduction_entry->building.'" value="'.$deduction_entry->rate.'">'.$name." (".$deduction_entry->rate.'%) </option>';
										 
                                     } 
                                echo'</select>';
                                
  	
    }
	function getBuildingtype($keyword) {
		
	
	
		$building_types_info = $this->db->get_where('building_type', array('building_type_id' => $keyword ))->result_array();

         //$deduction_info=$this->db->get_where('building_deduction' , array('building_id' => $building_id ))->result_array();
         
    echo'<select name="building_type_id" id="building_type" required="" class="form-control">';
                                   // echo'<option value="">'.get_phrase('इमारतीच्या बांधकामाचा प्रकार निवडा').'</option>';
                                    foreach ($building_types_info as $rowss){ 
                                       //$name = $this->db->get_where('building_type' , array('building_type_id' => $deduction_entry->building ))->row()->name; 
                                       	echo'<option value="'.$rowss['building_type_id'].'" selected>'.$rowss['name'].'</option>';
										 
                                     } 
                                echo'</select>';
                                
  	
    }
	function getVarshikdata($keyword,$department_id,$region_id) {
		
	echo'<select name="rate" id="varshik_mulya_dar" required="" class="form-control">';
								//<option value=""><?php echo get_phrase('वार्षिक मूल्य दर निवडा'); </option>
								
			 		$this->db->where('department_id',$department_id);
						$this->db->where('region_id',$region_id);
				 $rates_info = $this->db->get('rates')->result_array();

					foreach ($rates_info as $rows) { 
					if($keyword=='1'){ 
					echo'<option data-id="1" value="'.$rows['temporary'].'">झोपडी किंवा मातीची इमारत (Rs.</i>'.$rows['temporary'].')</option>';
					}elseif($keyword=='2'){
					echo'<option data-id="2" value="'.$rows['half_fix'].'">दगड, किंवा विटा वापरलेली मातीची इमारत (Rs.'. $rows['half_fix'].')</option>';
					}elseif($keyword=='3'){
					echo'<option data-id="3" value="'.$rows['other_fix'].'">दगड, विटांची व चुना किंवा सिमेंट वापरून उभारलेली इमारत (Rs.'. $rows['other_fix'].')</option>';
					}elseif($keyword=='4'){
					echo'<option data-id="4" value="'.$rows['rcc'].'">आरसीसी पद्धतीची इमारत (Rs.'.$rows["rcc"].')</option>';
					}
				
					 } 
						echo'	</select>';
                                
  	
    }
	
	
	function getGramvarshik($keyword) {
		$grampanchayat_id        = $this->session->userdata('login_user_id');
		
	echo'<select name="rate" id="varshik_mulya_dar" required="" class="form-control">';
								//<option value=""><?php echo get_phrase('वार्षिक मूल्य दर निवडा'); </option>
								
			 		$this->db->where('grampanchayat_id',$grampanchayat_id);
						//$this->db->where('region_id',$region_id);
				 $rates_info = $this->db->get('gram_varshik_rate')->result_array();

					foreach ($rates_info as $rows) { 
					if($keyword=='1'){ 
					echo'<option data-id="1" value="'.$rows['zopdi_rates'].'">झोपडी किंवा मातीची इमारत (Rs.</i>'.$rows['zopdi_rates'].')</option>';
					}elseif($keyword=='2'){
					echo'<option data-id="2" value="'.$rows['dagad_vita_rates'].'">दगड, किंवा विटा वापरलेली मातीची इमारत (Rs.'. $rows['dagad_vita_rates'].')</option>';
					}elseif($keyword=='3'){
					echo'<option data-id="3" value="'.$rows['vita_chuna_rates'].'">दगड, विटांची व चुना किंवा सिमेंट वापरून उभारलेली इमारत (Rs.'. $rows['vita_chuna_rates'].')</option>';
					}elseif($keyword=='4'){
					echo'<option data-id="4" value="'.$rows['rcc_rates'].'">आरसीसी पद्धतीची इमारत (Rs.'.$rows["rcc_rates"].')</option>';
					}
				
					 } 
						echo'	</select>';
                                
  	
    }
	
	
	
	
	function getManoraRates($manora,$gram) {
		$this->db->where('tower_id',$manora);
			$this->db->where('gram_type_id',$gram);
				 $tower_tax_info = $this->db->get('tower_tax')->result_array();
     foreach ($tower_tax_info as $row3) { 
    echo' <table class="table table-bordered"><tr><th>किमान दर (पैश्यामधे)</th><th>कमाल दर (पैश्यामधे)</th></tr>
		<tr><td><input type="text" name="kiman" readonly value="'. ($row3['minimum_rate']* 100).'" id="kiman" class="col-sm-3 form-control"></td>';
		echo'<td><input type="text" name="kamal" readonly value="'.($row3['maximum_rate']* 100).'" id="kamal" class="col-sm-3 form-control"></td></tr></table>';
	 }
		
		
	}
	
	function getBandkam($keyword) {
		 
					echo '
					<input type="hidden" name="bandkam_rate" id="bandkam_rate" required="" readonly class="form-control" value="1" id="field-1" >
					';
					            
    } 
	
	function getCurrentPatti($keyword) {
		$this->db->where('nagrik_id',$keyword);
    $nagrik_malmatta_info=$this->db->get('nagrik_malmatta')->result_array();
    $tax=0;
	foreach ($nagrik_malmatta_info as $row3) { 
				
			$tax=$tax+$row3['building_tax'];
			}      
			echo $tax;	
    } 
	
	function getCurrenthealthPatti($keyword) {
		$this->db->where('nagrik_id',$keyword);
    $nagrik_malmatta_info=$this->db->get('nagrik_malmatta')->result_array();
    $tax=0;
	foreach ($nagrik_malmatta_info as $row3) { 
				
			$tax=$tax+$row3['health_tax'];
			}      
			echo $tax;	
    } 
	function getCurrentlightPatti($keyword) {
		$this->db->where('nagrik_id',$keyword);
    $nagrik_malmatta_info=$this->db->get('nagrik_malmatta')->result_array();
    $tax=0;
	foreach ($nagrik_malmatta_info as $row3) { 
				
			$tax=$tax+$row3['light_tax'];
			}      
			echo $tax;	
    } 
	
	function getCurrentwaterPatti($keyword) {
		$this->db->where('nagrik_id',$keyword);
    $nagrik_malmatta_info=$this->db->get('nagrik_malmatta')->result_array();
    $tax=0;
	foreach ($nagrik_malmatta_info as $row3) { 
				
			$tax=$tax+$row3['water_tax'];
			}      
			echo $tax;	
    } 
	
	
	
	
	
	function getJaminRates($keyword) {
		$grampanchayat_id    = $this->session->userdata('login_user_id');
		$this->db->where('land_prat_type_id',$keyword);
		$this->db->where('grampanchayat_id',$grampanchayat_id);
    $gram_land_rates_info=$this->db->get('gram_land_rates')->result_array();
   // $tax=0;
	foreach ($gram_land_rates_info as $row3) { 
				
			echo $row3['land_rates'];
			}      
//echo round($tax);	
    } 
	
	
	function getMilkatno($keyword) {
		$this->db->where('nagrik_id',$keyword);
    $milkat_info=$this->db->get('nagrik_malmatta')->result_array();
    
	echo'<label for="field-1" class="col-sm-3 control-label">सूट असेल तरच मिळकत क्र. निवडा</label>';
		echo'<div class="col-sm-8">
				        <select name="sut_milkat_no" id="sut_milkat_id" class="form-control">
				                <option value="">मिळकत क्रमांक निवडा</option>';
							foreach ($milkat_info as $row5) { 
							if($row5['milkat_prakar']==1){
								$typ="इमारत";
							}else if($row5['milkat_prakar']==2)
							{
								$typ="जमीन";
							}
							else if($row5['milkat_prakar']==3)
							{
								$typ="पवनचक्की / मनोरा";
							}
							echo'<option value="'.$row5['nagrik_malmatta_id'].'">'.$row5['milkat_no']." (".$typ.")".'</option>';
								} 
							echo'</select> </div>';
	            
    } 
	function getMilkatamt($keyword) {
		$this->db->where('nagrik_malmatta_id',$keyword);
    $nagrik_malmatta_info=$this->db->get('nagrik_malmatta')->result_array();
  
	foreach ($nagrik_malmatta_info as $row3) { 
				
			echo $row3['building_tax'];
			}      
			
    } 
                               
    function gethealthRates($keyword) {
		$grampanchayat_id        = $this->session->userdata('login_user_id');
	
			 		$this->db->where('grampanchayat_id',$grampanchayat_id);
						//$this->db->where('region_id',$region_id);
				 $rates_info = $this->db->get('gram_health_patti')->result_array();

					foreach ($rates_info as $rows) { 
							if($keyword <= 300){ 
							echo $rows['below_300'];
							}elseif($keyword >= 301 && $keyword <= 700){
							echo $rows['301_to_700'];
							}elseif($keyword >= 701){
							echo $rows['701_above'];
							}
				
					 } 
						
    }
	
	function getlightRates($keyword) {
		$grampanchayat_id        = $this->session->userdata('login_user_id');
	
			 		$this->db->where('grampanchayat_id',$grampanchayat_id);
						//$this->db->where('region_id',$region_id);
				 $rates_info = $this->db->get('gram_light_patti')->result_array();

					foreach ($rates_info as $rows) { 
							if($keyword <= 300){ 
							echo $rows['below_300'];
							}elseif($keyword >= 301 && $keyword <= 700){
							echo $rows['301_to_700'];
							}elseif($keyword >= 701){
							echo $rows['701_above'];
							}
				
					 } 
						
    }
	
	function getwaterRates($keyword) {
		$grampanchayat_id        = $this->session->userdata('login_user_id');
	
			 		$this->db->where('grampanchayat_id',$grampanchayat_id);
						//$this->db->where('region_id',$region_id);
				 $rates_info = $this->db->get('gram_panipatti')->result_array();

					foreach ($rates_info as $rows) { 
							if($keyword == 1){ 
							echo $rows['panipatti'];
							}elseif($keyword== 2){
							echo $rows['special_panipatti'];
							}				
					 } 
						
    }
	
	
	/*********current**************/
	
	
	/*******लेखा शिर्ष***********/
	
	function save_lekha_shirsh_info(){
		$data['grampanchayat_id']        = $this->session->userdata('login_user_id');
		$data['computer_no']               = $this->input->post('computer_no');
		$data['name']               = $this->input->post('name');
		$this->db->insert('lekha_shirsh',$data);
	}
	function select_lekha_shirsh_info(){
		
		$grampanchayat_id = $this->session->userdata('login_user_id');
        return $this->db->get_where('lekha_shirsh', array('grampanchayat_id' => $grampanchayat_id))->result_array();
		
	}
	
	 function save_andajpatrak_info()
    {
        $data['grampanchayat_id']        = $this->session->userdata('login_user_id');
		$data['computer_id']               = $this->input->post('computer_id');
        $data['collection']                    = $this->input->post('collection');
		$data['panchayat_income']          = $this->input->post('panchayat_income');
		$data['sanction_amt']         		= $this->input->post('sanction_amt');
		$data['prev_actual_collection']         = $this->input->post('prev_actual_collection');
		$data['cur_actual_collection']         = $this->input->post('cur_actual_collection');
		$data['computer_id2']         = $this->input->post('computer_id2');
		$data['expenditure']         = $this->input->post('expenditure');
		$data['panchayat_exp']         = $this->input->post('panchayat_exp');
		$data['sanction_exp']         = $this->input->post('sanction_exp');
		$data['prev_actual_exp']         = $this->input->post('prev_actual_exp');
		$data['cur_actual_exp']         = $this->input->post('cur_actual_exp');	
		
        $this->db->insert('andajpatrak',$data);
    }
    
    function select_andajpatrak_info()
    {
        //return $this->db->get('nagrik_malmatta')->result_array();
		$grampanchayat_id = $this->session->userdata('login_user_id');
        return $this->db->get_where('andajpatrak', array('grampanchayat_id' => $grampanchayat_id))->result_array();
    }
    
    function update_andajpatrak_info($andajpatrak_id)
    {
      $data['grampanchayat_id']        = $this->session->userdata('login_user_id');
		$data['computer_id']               = $this->input->post('computer_id');
        $data['collection']                    = $this->input->post('collection');
		$data['panchayat_income']          = $this->input->post('panchayat_income');
		$data['sanction_amt']         		= $this->input->post('sanction_amt');
		$data['prev_actual_collection']         = $this->input->post('prev_actual_collection');
		$data['cur_actual_collection']         = $this->input->post('cur_actual_collection');
		$data['computer_id2']         = $this->input->post('computer_id2');
		$data['expenditure']         = $this->input->post('expenditure');
		$data['panchayat_exp']         = $this->input->post('panchayat_exp');
		$data['sanction_exp']         = $this->input->post('sanction_exp');
		$data['prev_actual_exp']         = $this->input->post('prev_actual_exp');
		$data['cur_actual_exp']         = $this->input->post('cur_actual_exp');	
        
        $this->db->where('andajpatrak_id',$andajpatrak_id);
        $this->db->update('andajpatrak',$data);
        // echo "<script>alert('hello'+$nagrik_id);</script>"; 
    }
    
    function delete_andajpatrak_info($andajpatrak_id)
    {
        $this->db->where('andajpatrak_id',$andajpatrak_id);
        $this->db->delete('andajpatrak');
    }
	
	/*******5 and 5k***********/
	
	function save_namuna_five_k_info()
    {
        $data['grampanchayat_id']    = $this->session->userdata('login_user_id');
		/*$this->db->select_max('counter_id');
			$this->db->limit(1);
		    $counter_id = $this->db->get('namuna_no_5')->row()->counter_id;  */
		$data['counter_id']               =  $this->input->post('counter_id');
	    $data['date']                    = $this->input->post('date');
		$data['namuna_no_10_id']         = $this->input->post('namuna_no_10_id');
		$data['namuna_no_7_id']        = $this->input->post('namuna_no_7_id');
		$data['nagrik_name']         = $this->input->post('nagrik_name');
		$data['amt_details']         = $this->input->post('amt_details');
		$data['cash_amt_take']         = $this->input->post('cash_amt_take');
		$data['cheque_amt']         = $this->input->post('cheque_amt');
		$data['cheque_no']         = $this->input->post('cheque_no');
		$data['cheque_submit_date']   = $this->input->post('cheque_submit_date');
		$data['cheque_clear_date']    = $this->input->post('cheque_clear_date');
		
        $this->db->insert('namuna_no_5',$data);
    }
    
    function select_namuna_five_info()
    {
        //return $this->db->get('nagrik_malmatta')->result_array();
		$grampanchayat_id = $this->session->userdata('login_user_id');
        return $this->db->get_where('namuna_no_5', array('grampanchayat_id' => $grampanchayat_id))->result_array();
    }
	
	function save_namuna_five_info($namuna_five_id)
    {
        $data['grampanchayat_id']        = $this->session->userdata('login_user_id');
		$data['counter_id']               =  $this->input->post('counter_id');
		$num = ($namuna_five_id-1);
		$this->db->where('namuna_no_5_id',$num);
			$this->db->limit(1);
		    $total_amt_post = $this->db->get('namuna_no_5')->row()->total_amt_post;  
		
		$data['initial_amt']               = $total_amt_post;
        $data['why_get_reason']           = $this->input->post('why_get_reason');
		$data['lekha_shirsh_id']          = $this->input->post('lekha_shirsh_id');
		$initial_plus_amt         		= ($total_amt_post + $this->input->post('cash_amt_take') +$this->input->post('cheque_amt'));
		$data['initial_plus_amt']  =  $initial_plus_amt;
		//$data['cash_paid_date']         = $this->input->post('cash_paid_date');
		//$data['voucher_no']         = $this->input->post('voucher_no');
		$data['whom_give']         = $this->input->post('whom_give');
		$data['given_reason']         = $this->input->post('given_reason');
		$data['lekha_shirsh_id2']         = $this->input->post('lekha_shirsh_id2');
		$data['given_amt']         = $this->input->post('given_amt');
		$data['total_amt_post'] =   ($initial_plus_amt - $this->input->post('given_amt'));
		$data['status']         = 1;
		
         $this->db->where('namuna_no_5_id',$namuna_five_id);
        $this->db->update('namuna_no_5',$data);
    }
	
	function save_namuna_five_details_info(){
		$data['grampanchayat_id']        = $this->session->userdata('login_user_id');
		$data['counter_id']               =  $this->input->post('counter_id');
		$data['banket']               =  $this->input->post('banket');
		$data['bank']               =  $this->input->post('bank');
		$data['post']               =  $this->input->post('post');
		$data['cheque']               =  $this->input->post('cheque');
		$data['cash']               =  $this->input->post('cash');
		$data['other']               =  $this->input->post('other');
	$data['total'] = ($data['banket'] + $data['bank'] + $data['post'] + $data['cheque'] + $data['cash'] + $data['other']) ;
		
		$this->db->insert('amt_details_of_five',$data);
		
		
		
	}
    
    function update_namuna_five_info($namuna_five_id)
    {
      $data['grampanchayat_id']        = $this->session->userdata('login_user_id');
		/******/
        
        $this->db->where('namuna_no_5_id',$namuna_five_id);
        $this->db->update('namuna_no_5',$data);
        // echo "<script>alert('hello'+$nagrik_id);</script>"; 
    }
    
    function delete_namuna_five_info($namuna_five_id)
    {
        $this->db->where('namuna_no_5_id',$namuna_five_id);
        $this->db->delete('namuna_no_5');
    }
	
	
	/********6***********/
	
	function save_namuna_six_info()
    {
        $data['grampanchayat_id']        = $this->session->userdata('login_user_id');
		$data['counter_id']               = 1;//$this->input->post('counter_id');
        $data['lekha_shirsh_id']                    = $this->input->post('lekha_shirsh_id');
		$data['anudan']          = $this->input->post('anudan');
		$data['one']         		= $this->input->post('1');/******json*****/
		$data['two']         		= $this->input->post('2');
		$data['three']         		= $this->input->post('3');
		$data['four']         		= $this->input->post('4');
		$data['five']         		= $this->input->post('5');
		$data['six']         		= $this->input->post('6');
		$data['seven']         		= $this->input->post('7');
		$data['eight']         		= $this->input->post('8');
		$data['nine']         		= $this->input->post('9');
		$data['ten']         	= $this->input->post('10');
		$data['eleven']         	= $this->input->post('11');
		$data['twelve']         	= $this->input->post('12');
		$data['thirteen']         	= $this->input->post('13');
		$data['fourteen']         	= $this->input->post('14');
		$data['fifteen']         	= $this->input->post('15');
		$data['sixteen']         	= $this->input->post('16');
		$data['seventeen']         	= $this->input->post('17');
		$data['eighteen']         	= $this->input->post('18');
		$data['nineteen']         	= $this->input->post('19');
		$data['twenty']         	= $this->input->post('20');
		$data['twenty1']         	= $this->input->post('21');
		$data['twenty2']         	= $this->input->post('22');
		$data['twenty3']         	= $this->input->post('23');
		$data['twenty4']         	= $this->input->post('24');
		$data['twenty5']         	= $this->input->post('25');
		$data['twenty6']         	= $this->input->post('26');
		$data['twenty7']         	= $this->input->post('27');
		$data['twenty8']         	= $this->input->post('28');
		$data['twenty9']         	= $this->input->post('29');
		$data['thirty']         	= $this->input->post('30');
		$data['thirty1']         	= $this->input->post('31');
		
		$total_month_amt        = ($data['anudan'] + $data['one'] +	$data['two']  + $data['three']  +	$data['four']  +
		$data['five']  + $data['six']  +	$data['seven']  +	$data['eight']  +	$data['nine']  +	$data['ten'] +	$data['eleven'] +	$data['twelve'] + $data['thirteen'] +	$data['fourteen'] +	$data['fifteen'] +	$data['sixteen'] +	$data['seventeen'] +	$data['eighteen'] +	$data['nineteen'] + $data['twenty'] +	$data['twenty1'] +	$data['twenty2'] +	$data['twenty3'] +	$data['twenty4'] +	$data['twenty5'] + $data['twenty6'] + $data['twenty7'] +	$data['twenty8'] +	$data['twenty9'] +	$data['thirty'] +	$data['thirty1']);
		
		$data['total_month_amt']     = $total_month_amt;
		$data['pre_month_amt']         = ($data['anudan'] + $total_month_amt);//$this->input->post('pre_month_amt');
		//$data['chadti_beriz']         = $this->input->post('chadti_beriz');
		//$data['initial_amt']         = $this->input->post('initial_amt');
		//$data['total_credit']         = $this->input->post('total_credit');
		//$data['final_amt']         = $this->input->post('final_amt');
		//$data['total_exp']         = $this->input->post('total_exp');
		//$data['last_balance']         = $this->input->post('last_balance');
        $this->db->insert('namuna_no_6',$data);
    }
    
    function select_namuna_six_info()
    {
        //return $this->db->get('nagrik_malmatta')->result_array();
		$grampanchayat_id = $this->session->userdata('login_user_id');
        return $this->db->get_where('namuna_no_6', array('grampanchayat_id' => $grampanchayat_id))->result_array();
    }
    
    function update_namuna_six_info($namuna_six_id)
    {
      $data['grampanchayat_id']        = $this->session->userdata('login_user_id');
		$data['nagrik_name']               = $this->input->post('nagrik_name');
        $data['address']                    = $this->input->post('address');
		$data['details']          = $this->input->post('details');
		 $data['amount']         		= $this->input->post('amount');
		 $data['date']         = $this->input->post('date');
        
        $this->db->where('namuna_no_6_id',$namuna_six_id);
        $this->db->update('namuna_no_6',$data);
        // echo "<script>alert('hello'+$nagrik_id);</script>"; 
    }
    
    function delete_namuna_six_info($namuna_six_id)
    {
        $this->db->where('namuna_no_6_id',$namuna_six_id);
        $this->db->delete('namuna_no_6');
    }
	
	/**********7********/
	 function save_namuna_seven_info()
    {
        $data['grampanchayat_id']        = $this->session->userdata('login_user_id');
		$data['nagrik_name']               = $this->input->post('nagrik_name');
        $data['address']                    = $this->input->post('address');
		$data['details']          = $this->input->post('details');
		 $data['amount']         		= $this->input->post('amount');
		 $data['date']         = $this->input->post('date');
				
        $this->db->insert('namuna_no_7',$data);
    }
    
    function select_namuna_seven_info()
    {
        //return $this->db->get('nagrik_malmatta')->result_array();
		$grampanchayat_id = $this->session->userdata('login_user_id');
        return $this->db->get_where('namuna_no_7', array('grampanchayat_id' => $grampanchayat_id))->result_array();
    }
    
    function update_namuna_seven_info($namuna_seven_id)
    {
      $data['grampanchayat_id']        = $this->session->userdata('login_user_id');
		$data['nagrik_name']               = $this->input->post('nagrik_name');
        $data['address']                    = $this->input->post('address');
		$data['details']          = $this->input->post('details');
		 $data['amount']         		= $this->input->post('amount');
		 $data['date']         = $this->input->post('date');
        
        $this->db->where('namuna_no_7_id',$namuna_seven_id);
        $this->db->update('namuna_no_7',$data);
        // echo "<script>alert('hello'+$nagrik_id);</script>"; 
    }
    
    function delete_namuna_seven_info($namuna_seven_id)
    {
        $this->db->where('namuna_no_7_id',$namuna_seven_id);
        $this->db->delete('namuna_no_7');
    }
	
	
	
	/*********नमूना १९**************/
	
	
	 function save_namuna_nineteen_info()
    {
        $data['grampanchayat_id']        = $this->session->userdata('login_user_id');
		$data['emp_id']               = $this->input->post('nagrik_id');
		$data['date']         = $this->input->post('date');
       // $data['total_days']                    = $this->input->post('total_days');
		$data['rate']          = $this->input->post('rate');
		 $data['amt']         		= $this->input->post('amt');
		 $data['fine']         = $this->input->post('fine');
		 $data['remain']         = $this->input->post('remain');
		
        $this->db->insert('namuna_no_19',$data);
    }
    
    function select_namuna_nineteen_info()
    {
        //return $this->db->get('nagrik_malmatta')->result_array();
		$grampanchayat_id = $this->session->userdata('login_user_id');
        return $this->db->get_where('namuna_no_19', array('grampanchayat_id' => $grampanchayat_id))->result_array();
    }
    
    function update_namuna_nineteen_info($namuna_nineteen_id)
    {
       $data['grampanchayat_id']        = $this->session->userdata('login_user_id');
		$data['emp_id']               = $this->input->post('emp_id');
		$data['date']         = $this->input->post('date');
        //$data['total_days']                    = $this->input->post('total_days');
		$data['rate']          = $this->input->post('rate');
		 $data['amt']         		= $this->input->post('amt');
		 $data['fine']         = $this->input->post('fine');
		 $data['remain']         = $this->input->post('remain');
        
        $this->db->where('namuna_no_19_id',$namuna_nineteen_id);
        $this->db->update('namuna_no_19',$data);
        // echo "<script>alert('hello'+$nagrik_id);</script>"; 
    }
    
    function delete_namuna_nineteen_info($namuna_nineteen_id)
    {
        $this->db->where('namuna_no_19_id',$namuna_nineteen_id);
        $this->db->delete('namuna_no_19');
    }
	
	/*********नमूना 21***********/
	
	 function save_namuna_twenty_one_info()
    {
        $data['grampanchayat_id']        = $this->session->userdata('login_user_id');
		$data['emp_name']               = $this->input->post('emp_name');
		$data['emp_post']         = $this->input->post('emp_post');
        $data['salary_class']                    = $this->input->post('salary_class');
		$data['salary']          = $this->input->post('salary');
		 $data['leave_salary']         		= $this->input->post('leave_salary');
		 $data['stanapann_salary']         = $this->input->post('stanapann_salary');
		 $data['bhatte']         = $this->input->post('bhatte');
		$data['adhidan_amt']         = $this->input->post('adhidan_amt');
		$data['vasuli_v_dand']         = $this->input->post('vasuli_v_dand');
		$data['future_anshdan']         = $this->input->post('future_anshdan');
		$data['other_vajati']         = $this->input->post('other_vajati');
		$data['shera']         = $this->input->post('shera');
		
        $this->db->insert('namuna_no_21',$data);
    }
    
    function select_namuna_twenty_one_info()
    {
        //return $this->db->get('nagrik_malmatta')->result_array();
		$grampanchayat_id = $this->session->userdata('login_user_id');
        return $this->db->get_where('namuna_no_21', array('grampanchayat_id' => $grampanchayat_id))->result_array();
    }
    
    function update_namuna_twenty_one_info($namuna_twenty_one_id)
    {
        $data['grampanchayat_id']        = $this->session->userdata('login_user_id');
		$data['emp_name']               = $this->input->post('emp_name');
		$data['emp_post']         = $this->input->post('emp_post');
        $data['salary_class']                    = $this->input->post('salary_class');
		$data['salary']          = $this->input->post('salary');
		 $data['leave_salary']         		= $this->input->post('leave_salary');
		 $data['stanapann_salary']         = $this->input->post('stanapann_salary');
		 $data['bhatte']         = $this->input->post('bhatte');
		$data['adhidan_amt']         = $this->input->post('adhidan_amt');
		$data['vasuli_v_dand']         = $this->input->post('vasuli_v_dand');
		$data['future_anshdan']         = $this->input->post('future_anshdan');
		$data['other_vajati']         = $this->input->post('other_vajati');
		$data['shera']         = $this->input->post('shera');
        
        $this->db->where('namuna_no_21_id',$namuna_twenty_one_id);
        $this->db->update('namuna_no_21',$data);
        // echo "<script>alert('hello'+$nagrik_id);</script>"; 
    }
    
    function delete_namuna_twenty_one_info($namuna_twenty_one_id)
    {
        $this->db->where('namuna_no_21_id',$namuna_twenty_one_id);
        $this->db->delete('namuna_no_21');
    }
	
	
	/****नमूना २४********/
	
	 function save_namuna_twenty_four_info()
    {
        $data['grampanchayat_id']        = $this->session->userdata('login_user_id');
		$data['hast_date']               = $this->input->post('date');
		$data['reason']         = $this->input->post('reason');
        $data['whom']                    = $this->input->post('whom');
		$data['kararnama']          = $this->input->post('kararnama');
		 $data['land_area']         		= $this->input->post('land_area');
		 $data['bhumapan_kr']         = $this->input->post('bhumapan_kr');
		 $data['aakarani']         = $this->input->post('aakarani');
		$data['jaminichi_sima']         = $this->input->post('jaminichi_sima');
		$data['jaminisah_kharedi']         = $this->input->post('jaminisah_kharedi');
		$data['jamin_vilhevat']         = $this->input->post('jamin_vilhevat');
		$data['selling_cost']         = $this->input->post('selling_cost');
		$data['praman_kr_date']         = $this->input->post('praman_kr_date');
		$data['pan_tharav_kr_date']         = $this->input->post('pan_tharav_kr_date');
		$data['kalam_55_kr_date']         = $this->input->post('kalam_55_kr_date');
		$data['shera']         = $this->input->post('shera');
		
        $this->db->insert('namuna_no_24',$data);
    }
    
    function select_namuna_twenty_four_info()
    {
        //return $this->db->get('nagrik_malmatta')->result_array();
		$grampanchayat_id = $this->session->userdata('login_user_id');
        return $this->db->get_where('namuna_no_24', array('grampanchayat_id' => $grampanchayat_id))->result_array();
    }
    
    function update_namuna_twenty_four_info($namuna_twenty_four_id)
    {
        $data['grampanchayat_id']        = $this->session->userdata('login_user_id');
		$data['hast_date']               = $this->input->post('hast_date');
		$data['reason']         = $this->input->post('reason');
        $data['whom']                    = $this->input->post('whom');
		$data['kararnama']          = $this->input->post('kararnama');
		 $data['land_area']         		= $this->input->post('land_area');
		 $data['bhumapan_kr']         = $this->input->post('bhumapan_kr');
		 $data['aakarani']         = $this->input->post('aakarani');
		$data['jaminichi_sima']         = $this->input->post('jaminichi_sima');
		$data['jaminisah_kharedi']         = $this->input->post('jaminisah_kharedi');
		$data['jamin_vilhevat']         = $this->input->post('jamin_vilhevat');
		$data['selling_cost']         = $this->input->post('selling_cost');
		$data['praman_kr_date']         = $this->input->post('praman_kr_date');
		$data['pan_tharav_kr_date']         = $this->input->post('pan_tharav_kr_date');
		$data['kalam_55_kr_date']         = $this->input->post('kalam_55_kr_date');
		$data['shera']         = $this->input->post('shera');
        
        $this->db->where('namuna_no_24_id',$namuna_twenty_four_id);
        $this->db->update('namuna_no_24',$data);
        // echo "<script>alert('hello'+$nagrik_id);</script>"; 
    }
    
    function delete_namuna_twenty_four_info($namuna_twenty_four_id)
    {
        $this->db->where('namuna_no_24_id',$namuna_twenty_four_id);
        $this->db->delete('namuna_no_24');
    }
	
	
	/*******२९**********/
	
	 function save_namuna_twenty_nine_info()
    {
        $data['grampanchayat_id']        = $this->session->userdata('login_user_id');
		$data['loan_sadhan']               = $this->input->post('loan_sadhan');
		$data['loan_sanc_kr_date']         = $this->input->post('loan_sanc_kr_date');
        $data['loan_prayojan']                    = $this->input->post('loan_prayojan');
		$data['loan_amt']          = $this->input->post('loan_amt');
		 $data['intt_rate']         		= $this->input->post('intt_rate');
		 $data['loan_sanc_date']         = $this->input->post('loan_sanc_date');
		 $data['8_a_mudat']         = $this->input->post('8_a_mudat');
		$data['8_b_intt']         = $this->input->post('8_b_intt');
		$data['9_a_loan']         = $this->input->post('9_a_loan');
		$data['9_b_intt']         = $this->input->post('9_b_intt');
		$data['pradan_date']         = $this->input->post('pradan_date');
		$data['pradan_mudat']         = $this->input->post('pradan_mudat');
		$data['pradan_intt']         = $this->input->post('pradan_intt');
		$data['pradan_total']         = $this->input->post('pradan_total');
		$data['rem_amt_mudat']         = $this->input->post('rem_amt_mudat');
		$data['rem_amt_intt']         = $this->input->post('rem_amt_intt');
		$data['shera']         = $this->input->post('shera');
		
        $this->db->insert('namuna_no_29',$data);
    }
    
    function select_namuna_twenty_nine_info()
    {
        //return $this->db->get('nagrik_malmatta')->result_array();
		$grampanchayat_id = $this->session->userdata('login_user_id');
        return $this->db->get_where('namuna_no_29', array('grampanchayat_id' => $grampanchayat_id))->result_array();
    }
    
    function update_namuna_twenty_nine_info($namuna_twenty_nine_id)
    {
        $data['grampanchayat_id']        = $this->session->userdata('login_user_id');
		$data['loan_sadhan']               = $this->input->post('loan_sadhan');
		$data['loan_sanc_kr_date']         = $this->input->post('loan_sanc_kr_date');
        $data['loan_prayojan']                    = $this->input->post('loan_prayojan');
		$data['loan_amt']          = $this->input->post('loan_amt');
		 $data['intt_rate']         		= $this->input->post('intt_rate');
		 $data['loan_sanc_date']         = $this->input->post('loan_sanc_date');
		 $data['8_a_mudat']         = $this->input->post('8_a_mudat');
		$data['8_b_intt']         = $this->input->post('8_b_intt');
		$data['9_a_loan']         = $this->input->post('9_a_loan');
		$data['9_b_intt']         = $this->input->post('9_b_intt');
		$data['pradan_date']         = $this->input->post('pradan_date');
		$data['pradan_mudat']         = $this->input->post('pradan_mudat');
		$data['pradan_intt']         = $this->input->post('pradan_intt');
		$data['pradan_total']         = $this->input->post('pradan_total');
		$data['rem_amt_mudat']         = $this->input->post('rem_amt_mudat');
		$data['rem_amt_intt']         = $this->input->post('rem_amt_intt');
		$data['shera']         = $this->input->post('shera');
		
        
        $this->db->where('namuna_no_29_id',$namuna_twenty_nine_id);
        $this->db->update('namuna_no_29',$data);
        // echo "<script>alert('hello'+$nagrik_id);</script>"; 
    }
    
    function delete_namuna_twenty_nine_info($namuna_twenty_nine_id)
    {
        $this->db->where('namuna_no_29_id',$namuna_twenty_nine_id);
        $this->db->delete('namuna_no_29');
    }
	
	
	/**********३३**********/
	
	 function save_namuna_thirty_three_info()
    {
        $data['grampanchayat_id']        = $this->session->userdata('login_user_id');
		$data['land_tapsil']               = $this->input->post('land_tapsil');
		$data['trees_type']         = $this->input->post('trees_type');
        $data['trees_description']                    = $this->input->post('trees_description');
		$data['trees_count']          = $this->input->post('trees_count');
		 $data['est_yearly_income']         		= $this->input->post('est_yearly_income');
		 $data['actual_income']         = $this->input->post('actual_income');
		 $data['trees_cuts_tapsil']         = $this->input->post('trees_cuts_tapsil');
		
		$data['shera']         = $this->input->post('shera');
		
        $this->db->insert('namuna_no_33',$data);
    }
    
    function select_namuna_thirty_three_info()
    {
        //return $this->db->get('nagrik_malmatta')->result_array();
		$grampanchayat_id = $this->session->userdata('login_user_id');
        return $this->db->get_where('namuna_no_33', array('grampanchayat_id' => $grampanchayat_id))->result_array();
    }
    
    function update_namuna_thirty_three_info($namuna_thirty_three_id)
    {
        $data['grampanchayat_id']        = $this->session->userdata('login_user_id');
		$data['land_tapsil']               = $this->input->post('land_tapsil');
		$data['trees_type']         = $this->input->post('trees_type');
        $data['trees_description']                    = $this->input->post('trees_description');
		$data['trees_count']          = $this->input->post('trees_count');
		 $data['est_yearly_income']         		= $this->input->post('est_yearly_income');
		 $data['actual_income']         = $this->input->post('actual_income');
		 $data['trees_cuts_tapsil']         = $this->input->post('trees_cuts_tapsil');
		
		$data['shera']         = $this->input->post('shera');
		
        
        $this->db->where('namuna_no_33_id',$namuna_thirty_three_id);
        $this->db->update('namuna_no_33',$data);
        // echo "<script>alert('hello'+$nagrik_id);</script>"; 
    }
    
    function delete_namuna_thirty_three_info($namuna_thirty_three_id)
    {
        $this->db->where('namuna_no_33_id',$namuna_thirty_three_id);
        $this->db->delete('namuna_no_33');
    }
	
	
    
}