
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
                    <h5><b>Add New Environment</b></h5>
                </div>
            </div>

        <div class="panel-body">

			<form role="form" method="post" action="<?php echo base_url();?>index.php/Administrator/createEnvironment">
				<div class="modal-body">
					<center><div id="res"></div></center>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
							<label for="exampleInputEmail1">Environment Name</label> <span style="color:red">*</span>
							<input type="text" class="form-control" id="environment" required name="environment" placeholder="Enter Environment Name">
							</div>
														
						</div>
						
					</div> 
				<div class="modal-footer">
				<button type="submit" id="" class="btn btn-primary">Add Environment</button>
				</div>
				</div>
				
			</div> 
		</form>

	</div>

    </div>

    </div>
</div>
