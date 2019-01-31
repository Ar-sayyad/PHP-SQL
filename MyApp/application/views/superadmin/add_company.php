
<style type="text/css">
.modal-dialog {
    width: 70% !important;
    padding-top: 20px;
    padding-bottom: 20px;
}
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
                    <h5><b>Add New Company</b></h5>
                </div>
            </div>

        <div class="panel-body">

			<form role="form" method="post" action="<?php echo base_url();?>index.php/admin/createCompany">
				<div class="modal-body">
					<center><div id="res"></div></center>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
							<label for="exampleInputEmail1">Company Name</label> <span style="color:red">*</span>
							<input type="text" class="form-control" id="company_name" required name="company_name" placeholder="Enter Company Name">
							</div>
							
							<div class="form-group">
							<label for="exampleInputPassword1">Contact No</label>
							<input type="text" class="form-control" id="usercontact"  name="contact" pattern="[0-9]{10,10}"  autocomplete="off" maxlength="10" placeholder="Enter Contact No">
							</div>
							
							
							<div class="form-group">
							<label for="exampleInputEmail1">Email</label> <span style="color:red">*</span>
							<input type="email" class="form-control" id="useremail" required name="email" placeholder="Enter email">
							</div>
							
						</div>
						<div class="col-md-6">
							
							<div class="form-group">
							<label for="exampleTextarea">Password</label> <span style="color:red">*</span>
							<input type="password" class="form-control" required id="password"  name="password" placeholder="Password">
							</div>
							
							<div class="form-group">
							<label for="exampleTextarea">Confirm Password</label> <span style="color:red">*</span>
							<input type="password" class="form-control" required id="confirm" name="confirm" placeholder="Confirm Password">
							</div>
							
							<div class="form-group">
							<label for="exampleTextarea">Address</label>
							<textarea class="form-control" placeholder="Enter Address" id="address" name="address" rows="3"></textarea>
							</div>
						</div>
					</div> 
				<div class="modal-footer">
				<button type="submit" id="" class="btn btn-primary">Add Company</button>
				</div>
				</div>
				
			</div> 
		</form>

	</div>

    </div>

    </div>
</div>
