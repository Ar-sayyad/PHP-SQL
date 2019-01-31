<?php



if (!defined('BASEPATH'))

    exit('No direct script access allowed');



class Receptionist extends CI_Controller {



    public function __construct() {

        parent::__construct();

        $this->load->database();

        $this->load->library('session');

    }



    function index() {

        if ($this->session->userdata('receptionist_login') != 1) {

            $this->session->set_userdata('last_page', current_url());

            redirect(base_url(), 'refresh');

        }



        $data['page_name'] = 'dashboard';

        $data['page_title'] = get_phrase('receptionist_dashboard');

        $this->load->view('backend/index', $data);

    }

	/*****operator list*******/
	function operator($task = "", $operator_list_id = "") {

        if ($this->session->userdata('receptionist_login') != 1) {

            $this->session->set_userdata('last_page', current_url());

            redirect(base_url(), 'refresh');

        }
        if ($task == "create") {
				$this->crud_model->save_operator_list_info();

                $this->session->set_flashdata('message', get_phrase('operator_list_info_saved_successfuly'));

            redirect(base_url() . 'index.php?receptionist/operator');

        }
        if ($task == "delete") {

            $this->crud_model->delete_operator_list_info($operator_list_id);

            redirect(base_url() . 'index.php?receptionist/operator');

        }
        $data['operator_list_info'] = $this->crud_model->select_single_operator_list_info();

        $data['page_name'] = 'manage_operator_doctor';

        $data['page_title'] = get_phrase('doctor_list');

        $this->load->view('backend/index', $data);

    }



    
    function profile($task = "") {

        if ($this->session->userdata('receptionist_login') != 1) {

            $this->session->set_userdata('last_page', current_url());

            redirect(base_url(), 'refresh');

        }



        $receptionist_id = $this->session->userdata('login_user_id');

        if ($task == "update") {

                $this->crud_model->update_receptionist_info($receptionist_id);

                $this->session->set_flashdata('message', get_phrase('profile_info_updated_successfuly'));

                redirect(base_url() . 'index.php?receptionist/profile');

        }



        if ($task == "change_password") {

            $password = $this->db->get_where('receptionist', array('receptionist_id' => $receptionist_id))->row()->password;

            $old_password = sha1($this->input->post('old_password'));

            $new_password = $this->input->post('new_password');

            $confirm_new_password = $this->input->post('confirm_new_password');



            if ($password == $old_password && $new_password == $confirm_new_password) {

                $data['password'] = sha1($new_password);



                $this->db->where('receptionist_id', $receptionist_id);

                $this->db->update('receptionist', $data);



                $this->session->set_flashdata('message', get_phrase('password_info_updated_successfuly'));

                redirect(base_url() . 'index.php?receptionist/profile');

            } else {

                $this->session->set_flashdata('message', get_phrase('password_update_failed'));

                redirect(base_url() . 'index.php?receptionist/profile');

            }

        }



        $data['page_name'] = 'edit_profile';

        $data['page_title'] = get_phrase('profile');

        $this->load->view('backend/index', $data);

    }



}
