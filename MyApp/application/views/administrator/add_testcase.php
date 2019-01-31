<?php $company_id        = $this->session->userdata('login_company_id');
$application_info = $this->db->get_where('application', array('company_id' => $company_id ))->result_array();?>
<style type="text/css">

    .modal-body{
        padding-top: 0px;
    }
.panel-body,.panel-heading {
       padding-top: 0px !important;
}
.panel-body{
    padding: 30px;
    padding-bottom: 0px;
}
.form-control {
    display: block;
    
}
</style>
 <div class="row">
 
    <div class="col-md-12 col-xs-12 col-lg-12">

        <div class="" data-collapsed="0">
		
            <div class="panel-heading">
                <div class="panel-title">
                    <h5><b>Add New Test Case</b></h5>
                </div>
            </div>

        <div class="panel-body">

			<form role="form" method="post" action="<?php echo base_url();?>index.php/Administrator/createTestCase">
				<div class="modal-body">
					<center><div id="res"></div></center>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
                                                            <label for="exampleTextarea">Select Application</label><span style="color:red">*</span>
								<select name="application_id" required class="form-control">
                                                                    <option value="">---Select Application---</option>
								<?php foreach ($application_info as $row) { ?>
								<option value="<?php echo $row['application_id']; ?>"><?php echo $row['application_name']; ?></option>
								<?php } ?>
												
								</select>
							</div>
							
							<div class="form-group">
							<label for="exampleInputEmail1">Test Case Name</label><span style="color:red">*</span>
							<input type="text" class="form-control" required id="testcase_name" name="testcase_name" placeholder="Enter Test Case Name">
							</div>
						
							<div class="form-group">
							<label for="exampleInputEmail1">Class Name</label><span style="color:red">*</span>
							<input type="text" class="form-control" required id="class_name" name="class_name" placeholder="Enter Class Name">
							</div>

							<div class="form-group">
							<label for="exampleTextarea">Description</label><span style="color:red">*</span>
							<textarea class="form-control" required placeholder="Enter Description" id="description"  name="description" rows="3"></textarea>
							</div>
                                                    
                                                        <div class="form-group">
                                                            <label>Is Test Data Available</label>
                                                            <br>
                                                            <div class="radio">
                                                                   <input type="hidden" name="is_Availbale" value="0">
                                                            <input type="checkbox"  name="is_Availbale" id="is_Availbale" value="1">

                                                            </div> 
                                                        </div>
                                                    
                                                    <!--hidden fields-->
                                                    <input type="hidden" name="user_type" value="1"/>
                                                    <input type="hidden" name="status_type" value="1"/>
						</div>
						
<!--					<div class="col-md-6">
				
						<div class="form-group">
						<label for="exampleTextarea">Select Role</label>
							<select name="user_type" required class="form-control">
							<option value="">---Select Role---</option>
							<option value="1">Administrator</option>
							<option value="3">Tester</option>
							<option value="4">Super User</option>						
							</select>
						</div>
						
						<div class="form-group">
						<label for="exampleTextarea">Test Case Status</label>
						<select name="status_type" required class="form-control">
						<option value="">---Select Status---</option>
						<option value="1">Public</option>
						<option value="0">Private</option> 
						</select>
						</div>
						
						
						
					</div>-->
					<div class="form-group" style="float:right;margin-top: -25px">
                                            <input type="submit" id="" class="btn btn-primary" name="Add Test Case" value="Add Test Case">
                                                    </div>
				</div> 
				
				
				</div>
				
			
		</form>
            </div> 
            
	</div>

    </div>

    </div>
</div>
