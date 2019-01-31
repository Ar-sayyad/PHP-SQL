<?php $company_id        = $this->session->userdata('login_company_id');
$multiple_url_info = $this->db->get_where('company_environ_url', array('company_env_id' => $param2))->result_array();
						$this->db->group_by('application_id');
$single_company_info = $this->db->get_where('company_environ_url', array('company_env_id' => $param2))->result_array();
?>
		
<style type="text/css">
.modal-dialog {
    width: 70% !important;
    height:600px;	
	
}    .modal-body{
		
        padding-top: 0px;
    }
.panel-body,.panel-heading {
       padding-top: 0px !important;
}
.panel-body{
    padding: 10px;
    padding-bottom: 0px;
}

</style>
<?php   foreach ($single_company_info as $com) { ?> 

<div id="page-wrapper" class="container">
<div class="panel-heading">
                <div class="panel-title">
                    <h5><b>Application Name : <?php echo $this->test_model->get_test_application($com['application_id']);?> </b></h5>
                </div>
            </div>
<?php } ?>
             <div class="panel-body">
			  
<div class="table-responsive">
<table id="table-example" class="table table-hover table-bordered table-stripped">

	<tbody>
	
		<tr>				
			<th>Sr.No.</th>
                        <th>Environment</th>
                        <th>Company URL</th>
		</tr>
		
				<?php 
					$sr=1; foreach ($multiple_url_info as $com) { ?>
					<tr> 
					<td><?php echo $sr;?></td>
                     <td><?php echo $this->test_model->get_env_url($com['environment_id']);?></td>
					<td><?php echo $this->test_model->get_url_name_application($com['application_id'],$com['environment_id']);?></td>
					</tr>
				<?php $sr++; } ?>
				
		
	
		<?php  ?>
		</tbody>
		</table>
		</div>


</div>
</div>




