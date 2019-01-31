<?php $company_id        = $this->session->userdata('login_company_id');
$application_info = $this->db->get_where('application', array('company_id' => $company_id ))->result_array();
$environment_info = $this->db->get_where('environment', array('company_id' => $company_id ))->result_array();
$single_company_info = $this->db->get_where('company_environment', array('company_env_id' => $param2))->result_array();
foreach ($single_company_info as $com) {?>
<style type="text/css">

.panel-body,.panel-heading {
       padding-top: 0px !important;
}
.form-control {
    display: block;
    width: 90% !important;
}
</style>
 <div class="row">
 
    <div class="col-md-12 col-xs-12 col-lg-12">

        <div class="" data-collapsed="0">
		
            <div class="panel-heading">
                <div class="panel-title">
                    <h5><b>Update Company URL</b></h5>
                </div>
            </div>

        <div class="panel-body">

			<form role="form" method="post" action="<?php echo base_url();?>index.php/TestApp/companyUrl/update/<?php echo $com['company_env_id'];?>" method="post" enctype="multipart/form-data">
				<div class="modal-body">
					<center><div id="res"></div></center>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label for="exampleTextarea">Select Application</label> <span style="color:red">*</span>
								<select name="application_id" required class="form-control">
								<option value="">---Select Application---</option>
								  <?php 

                               	foreach ($application_info as $row) { ?>                               

                                    <option value="<?php echo $row['application_id']; ?>"
                                     <?php if ($row['application_id'] == $com['application_id']) echo 'selected'; else echo 'disabled';?>
                               ><?php echo $row['application_name'] ; ?></option>

                               <?php }?>
							   				
								</select>
							</div>
							<?php $single_company_url_info = $this->db->get_where('company_environ_url', array('company_env_id' => $param2))->result_array();
										foreach ($single_company_url_info as $url) {
							?>
							
							<div class="form-group">
							<label for="exampleInputEmail1"><?php echo $url['environment_type'];?></label>					
							<input type="hidden" class="form-control" value="<?php echo $url['environment_id'];?>" id="environment_id" name="environment_id[]"> 
							<input type="hidden" class="form-control" value="<?php echo $url['environment_type'];?>"  id="environment_type" name="environment_type[]"> 
							<input type="text" class="form-control" id="env_url" value="<?php echo $url['env_url'];?>" name="env_url[]" placeholder="<?php echo $url['environment_type'];?>">
							</div>
							<?php } ?>
							
								

							
							
							
						</div>
						
					
				</div> 
				
				<div class="modal-footer">
				<button type="submit" id="" class="btn btn-primary">Update Company URL</button>
				</div>
				</div>
				
			</div> 
		</form>

	</div>

    </div>

    </div>
</div>
<?php } ?>