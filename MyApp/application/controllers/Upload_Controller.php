<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Upload_Controller extends CI_Controller {
public function __construct() {
parent::__construct();
$this->load->model('test_model');
$this->load->library('session');
}

public function do_upload(){
    $appname = $this->test_model->get_test_application($this->input->post('application_id'));
	$appname = str_replace(' ', '', $appname);
    $testname = $this->test_model->get_test_case_name($this->input->post('selectTestCase'));
	$testname = str_replace(' ', '', $testname);
    $compnayname = $this->session->userdata('name');
	$compnayname = str_replace(' ', '', $compnayname);
    $foldername = $testname;
    $pathname = 'F:/TestIT/wamp/www/TestApps/SeleniumAutomation_V1/TestData/'.$compnayname.'/'.$appname.'/'.$foldername;                   
    
    /**changes**/
            $config = array(
            'upload_path' => $pathname,
            'allowed_types' => "xls|xlsx|csv",
            'overwrite' => TRUE,
            'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
            'max_height' => "768",
            'max_width' => "1024",
			'file_name' => "TestCase"
            );
            $this->load->library('upload', $config);
            if($this->upload->do_upload())
            {
                            $this->session->set_flashdata('msg', 'File Uploaded Successfully.');							
                            $account_type   =	$this->session->userdata('login_type');	
                            redirect(base_url() . 'index.php/TestApp/testUpload');
            }
            else
            {
                            
                             $this->session->set_flashdata('err_msg',  $this->upload->display_errors());							
                            $account_type   =	$this->session->userdata('login_type');	
                            redirect(base_url() . 'index.php/TestApp/testUpload');
            }
        }
		public function LoadFile(){
			$appname = $this->test_model->get_test_application($this->input->post('application_id'));
			$appname = str_replace(' ', '', $appname);
			$testname = $this->test_model->get_test_case_name($this->input->post('selectTestCase'));
			$testname = str_replace(' ', '', $testname);
			$compnayname = $this->test_model->get_company_name($this->session->userdata('login_company_id'));
			$compnayname = str_replace(' ', '', $compnayname);
			$foldername = $testname;
                        $pathname= 'SeleniumAutomation_V1/TestData/'.$compnayname.'/'.$appname.'/'.$foldername.'/TestCase.xlsx';
                        if ((file_exists($pathname))) {   
                           echo base_url().$pathname;                       
                            }
                            else{
                                echo 0;
                            }
			//echo $pathname = base_url().'SeleniumAutomation_V1/TestData/'.$compnayname.'/'.$appname.'/'.$foldername.'/TestCase.xlsx';  
		}
    }
?>