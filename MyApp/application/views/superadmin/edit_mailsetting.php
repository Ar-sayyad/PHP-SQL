  <?php 
$admin_info = $this->db->get_where('admin', array('admin_id' => $param2))->result_array();
foreach ($admin_info as $row) {
?>
<style type="text/css">
.modal-dialog {
    width: 60% !important;
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
                    <h5><b>Manage Mail Setting</b></h5>
                </div>
            </div>

             <div class="panel-body">

              <form role="form" class="form-horizontal form-groups-bordered" action="<?php echo base_url(); ?>index.php/Admin/profile/updatemail/<?php echo $row['admin_id'];?>" method="post" enctype="multipart/form-data">
			  
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
							<label for="exampleInputEmail1">Host Name</label> <span style="color:red">*</span>
                                                        <input type="text" class="form-control" required="" id="host_name" name="host_name" 
							value="<?php echo $row['host_name'];?>" placeholder="Enter Host Name">
							</div>
							
							<div class="form-group">
							<label for="exampleInputEmail1">Port No</label> <span style="color:red">*</span>
                                                        <input type="text" class="form-control" required="" id="port" name="port" value="<?php echo $row['port'];?>" placeholder="Enter Port No">
							</div>
							
							<div class="form-group">
							<label for="exampleInputEmail1">Setting Email</label> <span style="color:red">*</span>
                                                        <input type="text" class="form-control" required="" id="email" name="email" value="<?php echo $row['setting_email'];?>" placeholder="Enter Email">
							</div>
							
						
						</div>
						<div class="col-md-6"> 
							
							<div class="form-group">
							<label for="exampleTextarea">Password</label> <span style="color:red">*</span>
                                                        <input type="password" class="form-control" required="" id="password" value="<?php echo strrev($row['code']);?>" name="password" placeholder="Enter Password">
							</div>
							
							<div class="form-group">
							<label for="exampleTextarea">Security Protocol</label> <span style="color:red">*</span>
                                                        <select name="secuirity_protocol" required="" class="form-control">
							<option value="">---Select Protocol---</option>
							<option value="SMTP" <?php if($row['secuirity_protocol']=='SMTP'){echo "selected";}?>>SMTP</option>
							<option value="POP3" <?php if($row['secuirity_protocol']=='POP3'){echo "selected";}?>>POP3</option>
							<option value="IMAP" <?php if($row['secuirity_protocol']=='IMAP'){echo "selected";}?>>IMAP</option>
							</select>
							</div>
						 
						</div>
						</div> 
					<div class="modal-footer">
				<button type="submit" id="" class="btn btn-primary">Update Mail</button>
				</div>
                </form>

			</div>

        </div>

    </div>
</div>
<?php } ?>