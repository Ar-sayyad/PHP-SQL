  <?php 
$single_company_info = $this->db->get_where('company', array('company_id' => $param2))->result_array();
foreach ($single_company_info as $row) {
?>
<style type="text/css">
.modal-dialog {
    width: 70% !important;
    padding-top: 20px;
    padding-bottom: 20px;
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
                    <h5><b>Update Company</b></h5>
                </div>
            </div>

             <div class="panel-body">

              <form role="form" class="form-horizontal form-groups-bordered" action="<?php echo base_url(); ?>index.php/admin/company/update/<?php echo $row['company_id'];?>" method="post" enctype="multipart/form-data">
			  
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
							<label for="exampleInputEmail1">Company Name</label> <span style="color:red">*</span>
							<input type="text" class="form-control" readonly id="company_name" value="<?php echo $row['company_name'];?>" required name="company_name" placeholder="Enter Company Name">
							</div>
													
							
							<div class="form-group">
							<label for="exampleInputEmail1">Email</label> <span style="color:red">*</span>
							<input type="email" class="form-control" readonly id="useremail" value="<?php echo $row['email'];?>" required name="email" placeholder="Enter email">
							</div>
							
						</div>
						<div class="col-md-6">
							
							<div class="form-group">
							<label for="exampleInputPassword1">Contact No</label>
							<input type="text" class="form-control" id="usercontact" value="<?php echo $row['contact'];?>"  name="contact" pattern="[0-9]{10,10}"  autocomplete="off" maxlength="10" placeholder="Enter Contact No">
							</div>
							
							<div class="form-group">
							<label for="exampleTextarea">Address</label>
							<textarea class="form-control" placeholder="Enter Address" id="address" name="address" rows="3"><?php echo $row['address'];?></textarea>
							</div>
						</div>
					</div> 
					<div class="modal-footer">
				<button type="submit" id="" class="btn btn-primary">Update Company</button>
				</div>
                </form>

			</div>

        </div>

    </div>
</div>
<?php } ?>