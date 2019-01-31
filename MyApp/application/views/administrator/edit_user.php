  <?php 
$single_user_info = $this->db->get_where('user', array('user_id' => $param2))->result_array();
foreach ($single_user_info as $row) {
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
                    <h5><b>Update User</b></h5>
                </div>
            </div>

             <div class="panel-body">

              <form role="form" class="form-horizontal form-groups-bordered" action="<?php echo base_url(); ?>index.php/Administrator/users/update/<?php echo $row['user_id'];?>" method="post" enctype="multipart/form-data">
			  
					<div class="row">
					   <div class="col-md-12 col-xs-12 col-lg-12">
					   
							<div class="col-md-6">
								<div class="form-group">
								<label for="exampleInputEmail1">First Name</label> <span style="color:red">*</span>
								<input type="text"  name="firstname" required="" value="<?php echo $row['fname'];?>" class="form-control col-md-3" placeholder="Enter First Name">
								</div>
								
								<div class="form-group">
								<label for="exampleInputEmail1">Last Name</label> <span style="color:red">*</span>
								<input type="text" class="form-control" required="" name="lastname" value="<?php echo $row['lname'];?>" placeholder="Enter Last Name">
								</div>
							</div>
							
							<div class="col-md-6">
								<div class="form-group">
								<label for="exampleInputPassword1">Contact No</label> 
								<input type="text" class="form-control"  name="contact"  pattern="[0-9]{10,10}"  autocomplete="off" maxlength="10" size="10"  value="<?php echo $row['contact'];?>"  placeholder="Enter Contact No">
								</div>
								
								<div class="form-group">
								<label for="exampleTextarea">Role</label> <span style="color:red">*</span>
									<select name="user_type"  id="user_type" required class="form-control">
									<option value="">--Select Role--</option>
									<option value="1" <?php if($row['user_type']==1){ echo "selected";} else { }?> >Administrator</option>
									<option value="3" <?php if($row['user_type']==3){ echo "selected";} else { }?>>Tester</option>
									</select>
								</div>
							</div>
							
							<div class="col-md-6">
								<div class="form-group">
								<label for="exampleInputEmail1">Email</label> <span style="color:red">*</span>
								<input type="email" class="form-control" required="" readonly name="email" value="<?php echo $row['email'];?>"  placeholder="Enter email">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
								<label for="exampleTextarea">Address</label>
								<textarea class="form-control" placeholder="Enter Address" name="address" id="exampleTextarea" rows="3"><?php echo $row['address'];?></textarea>
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