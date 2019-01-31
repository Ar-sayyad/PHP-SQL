  <?php 
$single_company_info = $this->db->get_where('email_setting', array('company_id' => $param2))->result_array();
foreach ($single_company_info as $row) {
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

              <form role="form" class="form-horizontal form-groups-bordered" action="<?php echo base_url(); ?>index.php/Testapp/profile/updatemail/<?php echo $row['company_id'];?>" method="post" enctype="multipart/form-data">
			  
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
							<label for="exampleInputEmail1">Username</label> <span style="color:red">*</span>
                                                        <input type="text" class="form-control" required="" id="username" name="username" value="<?php echo $row['username'];?>" placeholder="Enter Username">
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