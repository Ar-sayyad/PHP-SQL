  <?php 
$single_environment_info = $this->db->get_where('environment', array('environment_id' => $param2))->result_array();
foreach ($single_environment_info as $row) {
?>
<style type="text/css">

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
                    <h5><b>Update Environment</b></h5>
                </div>
            </div>

             <div class="panel-body">

              <form role="form" class="form-horizontal form-groups-bordered" action="<?php echo base_url(); ?>index.php/testapp/testEnvironment/update/<?php echo $row['environment_id'];?>" method="post" enctype="multipart/form-data">
			  
					<div class="row">
					   <div class="col-md-12 col-xs-12 col-lg-12">
					   
							<div class="col-md-12">
								<div class="form-group">
								<label for="exampleInputEmail1">Environment Name</label> <span style="color:red">*</span>
								<input type="text"  name="environment" required="" value="<?php echo $row['environment_name'];?>" class="form-control col-md-3" placeholder="Enter Environment Name">
								</div>
								
								
							</div>
							
						
						
						</div> 
							<div class="col-sm-3 control-label col-sm-offset-2">
								<input type="submit" class="btn btn-primary" value="Update">
							</div>
					</div>
                </form>

			</div>

        </div>

    </div>
</div>
<?php } ?>