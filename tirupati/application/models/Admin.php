<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Model {
	
	public function record_insert($tbl_name,$data_array)
	{
		$insert_id=$this->db->insert($tbl_name,$data_array);
		//echo $insert_id;die;
		if($insert_id)
		{
			return $insert_id;
		}
		return false;
	}
        
	public function record_count($tbl_name,$where1=null)
	{		
		if($where1!=null)
		{
			$this->db->where($where1);
		}
		
		$count=$this->db->get($tbl_name)->num_rows();
		
		if($count)
		{
			return $count;
		} 
		return false;	
		
	}


	public function getOtp($fuel_mgt_id){
        	echo $otp = $this->db->get_where('otp',array('fuel_mgt_id' => $fuel_mgt_id))->row()->OTP;
        }
        
         public function getMsg($fuel_mgt_id){
        	echo $msg = $this->db->get_where('otp',array('fuel_mgt_id' => $fuel_mgt_id))->row()->msg;
        }
        public function getVendorname($vendor_id){
        	echo $vendor_name = $this->db->get_where('tbl_vendor',array('vendor_id' => $vendor_id))->row()->vendor_name;
        }
         public function getSiteName($site_id){
        	return $site_name = $this->db->get_where('sites',array('site_id' => $site_id))->row()->site_name;
        }
        
    public function get_today_cnt($id)
    {
         $date = date('m/d/Y');
        $this->db->select('fuel_receipt.*, sum(fuel_receipt.filled_cost) as costs,fuel_mgt.fuel_mgt_id');
        // $this->db->select_sum('fuel_mgt.cost');  
        $this->db->join('fuel_mgt',"fuel_mgt.fuel_mgt_id=fuel_receipt.fuel_mgt_id");
        $this->db->where('fuel_receipt.vendor_id',$id);
     //$this->db->where('fuel_receipt.date ',date('d/m/Y',strtotime($date)));
           // $this->db->where('fuel_receipt.date <',date('Y/m/d',strtotime($date)));
       /* $this->db->get('fuel_receipt')->row()->costs;
          echo $this->db->last_query();die;*/

                 $cost = $this->db->get('fuel_receipt')->row()->costs;
     		return round($cost);

    }
    
    
    /*********chart data**********/
    
    
 public function get_year()
    {
       $date = date('1/1/2017');
        $this->db->select('fuel_receipt.*, sum(fuel_receipt.filled_cost) as costs,fuel_mgt.fuel_mgt_id');
        $this->db->join('fuel_mgt',"fuel_mgt.fuel_mgt_id=fuel_receipt.fuel_mgt_id");
        $this->db->where('fuel_receipt.vendor_id',19);
        $to=str_replace('/','-', $date);
$futureDate=date('Y-m-d', strtotime('+1 year', strtotime($to)) );
   $this->db->where('fuel_receipt.createdAt >=',date('Y-m-d 00:00:00',strtotime($to)));
 $this->db->where('fuel_receipt.createdAt <=',date('Y-m-d 23:59:59',strtotime($futureDate)));
       return $this->db->get('fuel_receipt')->row()->costs;
    }
  public function getmonthwise($month)
    {  
        if($this->input->post('fromdate')!="")
        {
             //echo $this->input->post('fromdate');die; 
               $date =$this->input->post('fromdate'); 
        }
     
         $this->db->select('fuel_receipt.*, sum(fuel_receipt.filled_cost) as costs,fuel_mgt.fuel_mgt_id');
        $this->db->join('fuel_mgt',"fuel_mgt.fuel_mgt_id=fuel_receipt.fuel_mgt_id");
          if($this->input->post('vendor_id')!="")
        {
        $this->db->where('fuel_receipt.vendor_id',$this->input->post('vendor_id'));
      }
                $v=explode("-",$date);
                $futureDate=date('Y-m-d', strtotime('+1 year', strtotime($date )) );
                 $f=explode("-",$futureDate);
             //   print_r($f); die;
                $where[]='month(fuel_receipt.createdAt)="'.$month.'"';
                 $where[]='YEAR(fuel_receipt.createdAt)>="'.$v[0].'"';
                   $where[]='YEAR(fuel_receipt.createdAt)<="'.$f[0].'"';
                   if(!empty($where)){
                 $_SESSION['search1']=implode(" AND ",$where);
             }
             $this->db->where($_SESSION["search1"]);
                  /* $this->db->get('fuel_receipt')->row()->costs;
                   echo $this->db->last_query();die;*/
return $this->db->get('fuel_receipt')->row()->costs;

    }

    public function get_days_cnt($days,$month,$year)
    {

        $this->db->select('fuel_receipt.*, sum(fuel_receipt.filled_cost) as costs,fuel_mgt.fuel_mgt_id');
        $this->db->join('fuel_mgt',"fuel_mgt.fuel_mgt_id=fuel_receipt.fuel_mgt_id");
       if($this->input->post('vendor_id')!="")
        {
        $this->db->where('fuel_receipt.vendor_id',$this->input->post('vendor_id'));
      }
        $where[]='DAY(fuel_receipt.createdAt)="'.$days.'"';
        $where[]='month(fuel_receipt.createdAt)="'.$month.'"';
         $where[]='YEAR(fuel_receipt.createdAt)="'.$year.'"';

         if(!empty($where)){
                 $_SESSION['search2']=implode(" AND ",$where);
             }
             $this->db->where($_SESSION["search2"]);
/*$this->db->get('fuel_receipt')->row()->costs;
                   echo $this->db->last_query();die;*/
       return $this->db->get('fuel_receipt')->row()->costs;

    }
    public function gettoday_month()
    {
    $date=date('Y-m-d');
      $v=explode("-",$date);
          $this->db->select('fuel_receipt.*, sum(fuel_receipt.filled_cost) as costs,fuel_mgt.fuel_mgt_id');
        $this->db->join('fuel_mgt',"fuel_mgt.fuel_mgt_id=fuel_receipt.fuel_mgt_id");
       if($this->input->post('vendor')!="")
        {
        $this->db->where('fuel_receipt.vendor_id',$this->input->post('vendor'));
      }
      if($this->input->post('supervisor')!="")
        {
        $this->db->where('fuel_receipt.supervisor_id',$this->input->post('supervisor'));
      }
  $where[]='month(fuel_receipt.createdAt)="'.$v[1].'"';

         if(!empty($where)){
                 $_SESSION['search2']=implode(" AND ",$where);
             }
             $this->db->where($_SESSION["search2"]);

       return $this->db->get('fuel_receipt')->row()->costs;

        
    }

      public function getnext_month()
    {
    $date=date('Y-m-d');
     $futureDate=date('Y-m-d', strtotime('-1 month', strtotime($date )) );
                 $f=explode("-",$futureDate);
     
          $this->db->select('fuel_receipt.*, sum(fuel_receipt.filled_cost) as costs,fuel_mgt.fuel_mgt_id');
        $this->db->join('fuel_mgt',"fuel_mgt.fuel_mgt_id=fuel_receipt.fuel_mgt_id");
       if($this->input->post('vendor')!="")
        {
        $this->db->where('fuel_receipt.vendor_id',$this->input->post('vendor'));
      }

       if($this->input->post('supervisor')!="")
        {
        $this->db->where('fuel_receipt.supervisor_id',$this->input->post('supervisor'));
      }
  $where[]='month(fuel_receipt.createdAt)="'.$f[1].'"';

         if(!empty($where)){
                 $_SESSION['search2']=implode(" AND ",$where);
             }
             $this->db->where($_SESSION["search2"]);

       return $this->db->get('fuel_receipt')->row()->costs;

        
    }


  public function gettoday_year()
    {
    $date=date('Y-m-d');
      $v=explode("-",$date);
          $this->db->select('fuel_receipt.*, sum(fuel_receipt.filled_cost) as costs,fuel_mgt.fuel_mgt_id');
        $this->db->join('fuel_mgt',"fuel_mgt.fuel_mgt_id=fuel_receipt.fuel_mgt_id");
       if($this->input->post('vendor')!="")
        {
        $this->db->where('fuel_receipt.vendor_id',$this->input->post('vendor'));
      }
      if($this->input->post('supervisor')!="")
        {
        $this->db->where('fuel_receipt.supervisor_id',$this->input->post('supervisor'));
      }
  $where[]='YEAR(fuel_receipt.createdAt)="'.$v[0].'"';

         if(!empty($where)){
                 $_SESSION['search2']=implode(" AND ",$where);
             }
             $this->db->where($_SESSION["search2"]);

       return $this->db->get('fuel_receipt')->row()->costs;

        
    }

      public function getnext_year()
    {
    $date=date('Y-m-d');
     $futureDate=date('Y-m-d', strtotime('+1 year', strtotime($date )) );
                 $f=explode("-",$futureDate);
     
          $this->db->select('fuel_receipt.*, sum(fuel_receipt.filled_cost) as costs,fuel_mgt.fuel_mgt_id');
        $this->db->join('fuel_mgt',"fuel_mgt.fuel_mgt_id=fuel_receipt.fuel_mgt_id");
       if($this->input->post('vendor')!="")
        {
        $this->db->where('fuel_receipt.vendor_id',$this->input->post('vendor'));
      }

       if($this->input->post('supervisor')!="")
        {
        $this->db->where('fuel_receipt.supervisor_id',$this->input->post('supervisor'));
      }
  $where[]='YEAR(fuel_receipt.createdAt)="'.$f[0].'"';

         if(!empty($where)){
                 $_SESSION['search2']=implode(" AND ",$where);
             }
             $this->db->where($_SESSION["search2"]);

       return $this->db->get('fuel_receipt')->row()->costs;

        
    }

    
    
    /********chart data end***********/
    
	public function record_list($tbl_name,$where1=null)
	{
		if($where1!=null)
		{
			$this->db->where($where1);
		}
		
		$details=$this->db->get($tbl_name)->result();

		if($details)
		{
			return $details;
		} 
		return false;			
	}
	public function records_update($tbl_name,$data,$where1)
	{
		$this->db->where($where1);
		$details=$this->db->update($tbl_name,$data);
		//echo "<pre>";print_r($details);die;
		if($details)
		{
			return $details;
		} 
		return false;			
	}
        
        public function delete_record($tbl_name,$where){
                    $this->db->where($where);
		$details= $this->db->delete($tbl_name);
		//echo "<pre>";print_r($details);die;
		if($details)
		{
			return $details;
		} 
		return false;
        }

	public function Sendmail($email,$password)
    {

    
        $supervisor = $this->db->get_where('tbl_supervisor', array('supervisor_email' => $email));
       $vendor = $this->db->get_where('tbl_vendor', array('vendor_email' => $email));
       $subadmin = $this->db->get_where('tbl_subadmin', array('subadmin_email' => $email));
        $username="nikhil@tirupatitravels.com";
        $pass="asbsplshop@123";
        $name="Tirupati Travels";
        $sub="Welcome to Tirupati Travels";
        $host_name="ssl://smtp.googlemail.com"; 
        $port="465";
        $protocol="smtp";
        
        if($supervisor->num_rows() > 0) {
                        $row = $supervisor->row();                      
                        $forgot_user_id = $row->supervisor_id;
                        $forgot_email_id = $row->supervisor_email;
                        $forgot_name = $row->supervisor_name;
                        $forgot_password = $password;
                        $forgot_type = 'Supervisor';
                        $body=$this->getBody($forgot_email_id,$forgot_user_id,$forgot_name,$forgot_password,$forgot_type);
                        $this->activate_mail($forgot_email_id,$username,$pass,$name,$sub,$body,$host_name,$port,$protocol);
                             
                        return 1;
                        
        }
        elseif($vendor->num_rows() > 0) {
                        $row = $vendor->row();                      
                        $forgot_user_id = $row->vendor_id;
                        $forgot_email_id = $row->vendor_email;
                        $forgot_name = $row->vendor_name;
                        $forgot_password = $password;
                        $forgot_type = 'Vendor';
                        $body=$this->getBody($forgot_email_id,$forgot_user_id,$forgot_name,$forgot_password,$forgot_type);
                        $this->activate_mail($forgot_email_id,$username,$pass,$name,$sub,$body,$host_name,$port,$protocol);
                             
                        return 1;
                        
        }
        elseif($subadmin->num_rows() > 0) {
                        $row = $subadmin->row();                      
                        $forgot_user_id = $row->subadmin_id;
                        $forgot_email_id = $row->subadmin_email;
                        $forgot_name = $row->subadmin_name;
                        $forgot_password = $password;
                        $forgot_type = 'Subadmin';
                        $body=$this->getBody($forgot_email_id,$forgot_user_id,$forgot_name,$forgot_password,$forgot_type);
                        $this->activate_mail($forgot_email_id,$username,$pass,$name,$sub,$body,$host_name,$port,$protocol);
                             
                        return 1;
                        
        }

        else{
            return 0;
        }
        
    
        //return $this->db->get_where('company', array('email' => $email))->result_array();
    }

    function getBody($email,$forgot_user_id,$name,$password,$type){
        
        $act=md5($email);
        $key=strrev(sha1($act))."esd15876wq12WEAS1asO4";
        $config=strrev($key);
        $passkey = md5($forgot_user_id);
        return $body="<body>
            <div class='row'>
                    <div class='col-sm-4'></div>
                            <div class='col-sm-4 center' style='border: 2px solid #EC971F;padding-bottom:10px;background-color: rgb(254, 250, 249);'>
                                    <div id='nediv' style='float: left;
                                        align-content: center;
                                        width: 90%;
                                        margin-left: 20%;

                                        font-family: cursive;
                                        margin-top: 1%;'>
                                        <h2>Welcome to Tirupati Travels</h2></div>
                                            <hr style='width:70%;
                                                border: 0;
                                                height: 1px;
                                                background-image: linear-gradient(to right, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0));'>

                                        <div id='mbody' style='width: 70%;
                                        margin-left: 20%;
                                        text-align: justify;
                                        font-family: cursive;
                                            line-height: 20px;
                                            margin-bottom:3%;'>
                                           
                                          <center style='text-align: left;margin-left: 5%;'>
                                          <b>Hello $name,</b><br>
                                          You are Successfully Registered to Tirupati Travels .<br/>
                                          Use Below Credentials to Login.<br/>
                                            Your Email is : $email <br/>
                                            Your Password  is : $password <br/>
                                              </center>
                                          </div>
                                          <hr style='width:70%;
                                                border: 0;
                                                height: 1px;
                                                margin-bottom:3%;
                                                background-image: linear-gradient(to right, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0));'>

                                       
                                        

                                         <div style='font-family: cursive;
                                            line-height: 22px;
                                                margin-left: 30%;'>

                                          <h5>Team Tirupati Travels</h5>


                                        </div>

                            </div>
                    <div class='col-sm-4'></div>
            </div>
    </body>";
    }


     
    function activate_mail($email,$username,$pass,$name,$sub,$body,$host_name="ssl://smtp.googlemail.com",$port="465",$protocol="smtp") {

         $config = array();
                $config['protocol'] = 'sendmail';
                $config['mailpath'] = '/usr/sbin/sendmail';
                $config['charset'] = 'utf-8';
                $config['mailtype'] = 'html';

                $this->load->library('email');
                $this->email->initialize($config);

                $this->email->set_newline("\r\n");

                $this->email->from($username, $name);
                $this->email->to($email);
                $this->email->subject($sub);
                $this->email->message($body);
                $this->email->send();
    
        // $config = array();
        // $config['protocol'] = 'smtp';
        // $config['smtp_host'] = 'ssl://smtp.googlemail.com';
        // $config['smtp_port'] = '465';
        // //$config['smtp_user'] = "teamautoit@gmail.com";
        // //$config['smtp_pass'] = "P@ssword1!";
        // $config['smtp_user'] = $username;
        // $config['smtp_pass'] = $pass;
        // $config['mailtype'] = 'html';
        // $config['charset'] = 'utf-8';
        // $config['newline'] = "\r\n";
        // $config['wordwrap'] = TRUE;

        // $this->load->library('email');

        // $this->email->initialize($config);
        // $this->email->from($username, $name);
        // $this->email->to($email);
        // $this->email->subject($sub);
        // $this->email->message($body);

        // $this->email->send();   
    
    }

	public function send_message($web_url,$mob,$msg)
	{
	 $url = $web_url.http_build_query(
						array(
									'username'=> "CONSTRO",'password' => "CONSTRO",
									'mob' => $mob,'msg' => $msg,'sender' => "MVNDRS"
								));	
	 	$ch = curl_init();					
		if($ch)
		{					
			curl_setopt($ch, CURLOPT_URL, $url); 
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
			$result = curl_exec($ch );
		
			curl_close( $ch );
			return true;
		}
		else
		{
			return true;
		}
	}


	public function records_delete($tbl_name,$where1)
	{
		$this->db->where($where1);
		$details=$this->db->delete($tbl_name);
			
		if($details)
		{
			return $details;
		} 
		return false;			
	}

	public function upload_image($img_name,$img_path,$old_img)
	{	
		
        $filename2      = $_FILES[$img_name]['name'];                
        $filename2      = explode(".", $filename2); 
                $new_filename2  = $img_name."_".date('Ymd').time().".".end($filename2);
        $thumb2 = $new_filename2;
        $_FILES['imag']['name']         = $new_filename2;
        $_FILES['imag']['type']         = $_FILES[$img_name]['type'];
        $_FILES['imag']['tmp_name']    = $_FILES[$img_name]['tmp_name'];
        $_FILES['imag']['error'] = $_FILES [$img_name]['error'];
        $_FILES['imag']['size']  = $_FILES [$img_name]['size'];

        $config = array();
        $config['upload_path'] = './assets/uploads/'.$img_path;
        $config['allowed_types'] = 'gif|jpg|jpeg|png|pdf';
        //$config['max_size']      = '0';             
        $config['overwrite']     = FALSE;

        $this->upload->initialize($config);
       
        if($this->upload->do_upload ('imag')){ 
                         
            $imagedata2 = $this -> upload -> data();
            $newimagename2 = $imagedata2["file_name"];
            $newimagename2 = str_replace (" ", "", $newimagename2);
            $this -> load -> library("image_lib");
            $config['image_library'] = 'gd2';
            $config['source_image'] = $imagedata2["full_path"];
            $config['create_thumb'] = false;
            $config['maintain_ratio'] = TRUE;
            $config['new_image'] = './assets/uploads/'.$img_path.'/100X100';
            $config['width']  = 180;
            $config['height'] = 200;
            $this -> image_lib -> initialize($config);
            $this -> image_lib -> resize();
        }    
        
        if($old_img!="")
		{
			$filename='assets/uploads/'.$img_path.'/'.$old_img;
			
			if (file_exists($filename)) 
			{
		 	unlink('assets/uploads/'.$img_path.'/'.$old_img);
			unlink('assets/uploads/'.$img_path.'/100X100/'.$old_img); 
		}
		}
        //echo $new_filename2;die;        
		return $new_filename2;	

	}


	

	
}
