<?php $company_id        = $this->session->userdata('login_company_id');
$application_info = $this->db->get_where('application', array('company_id' => $company_id ))->result_array();
$environment_info = $this->db->get_where('environment', array('company_id' => $company_id ))->result_array();?>
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
                    <h5><b>Add Company URL</b></h5>
                </div>
            </div>

        <div class="panel-body">

			<form role="form" method="post" action="<?php echo base_url();?>index.php/Administrator/createCompanyUrl">
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
                                   <?php $com_url_info = $this->db->get_where('company_environ_url', array('application_id' => $row['application_id'],'company_id' => $company_id))->result_array();
										foreach ($com_url_info as $row2) { ?>
                                     <?php if ($row['application_id'] == $row2['application_id']) echo 'disabled';?>
                                <?php } ?>><?php echo $row['application_name'] ; ?></option>

                               <?php }?>
							   				
								</select>
							</div>
							
							<?php foreach ($environment_info as $row2) { ?>
							<div class="form-group">
							<label for="exampleInputEmail1"><?php echo $row2['environment_name'];?></label>					
							<input type="hidden" class="form-control" value="<?php echo $row2['environment_id'];?>" id="environment_id" name="environment_id[]"> 
							<input type="hidden" class="form-control" value="<?php echo $row2['environment_name'];?>"  id="environment_type" name="environment_type[]"> 
							<input type="text" class="form-control" id="env_url" name="env_url[]" placeholder="<?php echo $row2['environment_name'];?>">
							</div>
							<?php }?>
							
						</div>
						
					
				</div> 
				
				<div class="modal-footer">
				<button type="submit" id="" class="btn btn-primary">Add Company URL</button>
				</div>
				</div>
				
			</div> 
		</form>

	</div>

    </div>

    </div>
</div>
