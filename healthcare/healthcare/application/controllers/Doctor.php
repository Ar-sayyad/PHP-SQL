<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Doctor extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
    }

    function index() {
        if ($this->session->userdata('doctor_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(), 'refresh');
        }

        $data['page_name'] = 'dashboard';
        $data['page_title'] = get_phrase('doctor_dashboard');
        $this->load->view('backend/index', $data);
    }
	
	/*****patient_data*********/

   function patient($task = "", $patient_id = "") {

        if ($this->session->userdata('doctor_login') != 1) {

            $this->session->set_userdata('last_page', current_url());

            redirect(base_url(), 'refresh');

        }
        if ($task == "create") {

        $this->crud_model->save_patient_bydoctor_info();

		$this->session->set_flashdata('message', get_phrase('patient_info_saved_successfuly'));
        
		redirect(base_url() . 'index.php?doctor/patient');

        }
        if ($task == "update") {

                $this->crud_model->update_patient_info($patient_id);

                $this->session->set_flashdata('message', get_phrase('patient_info_updated_successfuly'));

                redirect(base_url() . 'index.php?doctor/patient');

        }
        if ($task == "delete") {

            $this->crud_model->delete_patient_info($patient_id);

            redirect(base_url() . 'index.php?doctor/patient');

        }
        $data['patient_info'] = $this->crud_model->select_patient_bydoctor_info();

        $data['page_name'] = 'manage_patient';

        $data['page_title'] = get_phrase('patient');

        $this->load->view('backend/index', $data);

    }

	/*******patients prescription by doctor********/
	
    function prescript($patient_id = "")

    {
        if ($this->session->userdata('doctor_login') != 1)

        {
			$this->session->set_userdata('last_page' , current_url());
             redirect(base_url(), 'refresh');

        }
        		
		$data['prescription_info'] = $this->crud_model->select_prescription_by_patient_doctor($patient_id);
        $data['menu_check'] = 'from_prescription';
        $data['page_name'] = 'manage_prescription';
        $data['page_title'] = get_phrase('prescription');
        $this->load->view('backend/index', $data);
		

    }  
   
    

    /******doctor profile******/
	
    function profile($task = "") {
        if ($this->session->userdata('doctor_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(), 'refresh');
        }

        $doctor_id = $this->session->userdata('login_user_id');
        if ($task == "update") {
                $this->crud_model->update_doctor_self_info($doctor_id);
                redirect(base_url() . 'index.php?doctor/profile');
        }

        if ($task == "change_password") {
            $password = $this->db->get_where('doctor', array('doctor_id' => $doctor_id))->row()->password;
            $old_password = sha1($this->input->post('old_password'));
            $new_password = $this->input->post('new_password');
            $confirm_new_password = $this->input->post('confirm_new_password');

            if ($password == $old_password && $new_password == $confirm_new_password) {
                $data['password'] = sha1($new_password);

                $this->db->where('doctor_id', $doctor_id);
                $this->db->update('doctor', $data);

                $this->session->set_flashdata('message', get_phrase('password_info_updated_successfuly'));
                redirect(base_url() . 'index.php?doctor/profile');
            } else {
                $this->session->set_flashdata('message', get_phrase('password_update_failed'));
                redirect(base_url() . 'index.php?doctor/profile');
            }
        }

        $data['page_name'] = 'edit_profile';
        $data['page_title'] = get_phrase('profile');
        $this->load->view('backend/index', $data);
    }

    

   /********prescription*************/
   
     function newprescription($task = "", $prescription_id = "") {
        if ($this->session->userdata('doctor_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(), 'refresh');
        }

        if ($task == "create") {
            $this->crud_model->save_newprescription_info();
            $this->session->set_flashdata('message', get_phrase('prescription_info_saved_successfuly'));
            redirect(base_url() . 'index.php?doctor/newprescription');
        }

        if ($task == "update") {
            $this->crud_model->update_newprescription_info($prescription_id);
            $this->session->set_flashdata('message', get_phrase('prescription_info_updated_successfuly'));
             redirect(base_url() . 'index.php?doctor/newprescription');
            }

        if ($task == "delete") {
            $this->crud_model->delete_newprescription_info($prescription_id);
				redirect(base_url() . 'index.php?doctor/newprescription');
           
		   }

        $data['prescription_info'] = $this->crud_model->select_newprescription_info_by_doctor_id();
        $data['menu_check'] = 'from_prescription';
        $data['page_name'] = 'manage_newprescription';
        $data['page_title'] = get_phrase('prescription');
        $this->load->view('backend/index', $data);
    }
	
	


    function GetMedName(){
        $keyword=$this->input->post('keyword');
        $data=$this->crud_model->GetRow($keyword);        
        echo json_encode($data);
        //echo '<a><div style="border-bottom:1px solid #ccc;padding-left: 10px;cursor:pointer">'.json_encode($data).'</div></a>';
    }

}
