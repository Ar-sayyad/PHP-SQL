  <?php 
$single_browser_info = $this->db->get_where('browser', array('browser_id' => $param2))->result_array();
foreach ($single_browser_info as $row) {
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
                    <h5><b>Update Browser</b></h5>
                </div>
            </div>

             <div class="panel-body">

              <form role="form" class="form-horizontal form-groups-bordered" action="<?php echo base_url(); ?>index.php/testapp/testBrowser/update/<?php echo $row['browser_id'];?>" method="post" enctype="multipart/form-data">
			  
					<div class="row">
					   <div class="col-md-12 col-xs-12 col-lg-12">
					   
							<div class="col-md-12">
								<div class="form-group">
								<label for="exampleInputEmail1">Browser Name</label> <span style="color:red">*</span>
								<input type="text"  name="browser" required="" value="<?php echo $row['browser_name'];?>" class="form-control col-md-3" placeholder="Enter Browser Name">
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