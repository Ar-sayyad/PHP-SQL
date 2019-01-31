<div id="content-wrapper">
<div class="row">
<div class="col-lg-12">
<div class="row">
<div class="col-lg-12">
<ol class="breadcrumb">
<li><a href="<?php echo base_url().'Supervisor';?>">Home</a></li>
<li class="active"><span>Vendors</span></li>
</ol>
<h1>Vendors</h1>
</div>
</div>

<?php
	 if($this->session->userdata('message_success'))
		{
		 ?> 
		<div class="col-md-6 col-md-offset-3 text-center alert" id="deletesuccess"> 
			 <div class="alert alert-block alert-success">           
			 <div class="kode-alert kode-alert-icon alert3" >
				 <i class="fa fa-check"></i>
				<?php echo $this->session->userdata('message_success'); ?>
			</div>
			</div>
		</div>
	 <?php
		 }
	?>
	 <?php
		 if($this->session->userdata('message_failed'))
	 {
	 ?> 
		<div class="col-md-6 col-md-offset-3 text-center alert" id="deletesuccess1">  
				<div class="alert alert-block alert-success">          
					<div class="kode-alert btn-danger" >
						<?php echo $this->session->userdata('message_failed'); ?>
					</div>
				 </div> 
			 </div> 
	 <?php
		  }
	 ?>
<div class="row">
<div class="col-lg-12">
<div class="main-box clearfix">
<header class="main-box-header clearfix">
<!-- <a href="#vendormodal" data-toggle="modal" class="btn btn-primary pull-right">
<i class="fa fa-plus-circle fa-lg"></i> Vendors
</a> -->
</header>

<div class="main-box-body clearfix">
<div class="table-responsive">
<table id="table-example" class="table table-hover">
<thead>
<tr>
<th>SR No</th>
<th>Vendor Name</th>
<th>Contact No</th>
<th>Email Id</th>
<th>Added date</th>

</tr>
</thead>
<tbody>
<?php
if($vendors)
{
	$sr=1;
	foreach ($vendors as $key => $value) {
		?>
<tr>
<td><?php echo $sr;?></td>
<td><?php echo $value->vendor_name;?></td>
<td><?php echo $value->vendor_contact;?></td>
<td><?php echo $value->vendor_email;?></td>
<td><?php echo $value->created_on;?></td>

</tr>
<!-- edit user modal -->
  <div class="modal fade" id="vendoreditmodal_<?php echo $value->vendor_id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h4 class="modal-title">Update Vendor</h4>
</div>
<form method="post">
<div class="modal-body">

<div class="row">
<div class="col-md-6">
<div class="form-group">
<label for="exampleInputEmail1">Vendor Name</label><span style="color:red">*</span>
<input type="hidden" id="vendor_id" name="vendor_id" value="<?php echo $value->vendor_id;?>">
<input type="text" name="vendor_name" id="vendor_name" class="form-control" value="<?php echo $value->vendor_name;?>" placeholder="Enter Name" required>
</div>

<div class="form-group">
<label for="exampleInputEmail1">Vendor Email</label><span style="color:red">*</span>

<input type="email" name="vendor_email" id="vendor_email" class="form-control" value="<?php echo $value->vendor_email;?>" placeholder="Enter Email" required>
</div>

<div class="form-group">
<label for="exampleInputEmail1">GST NO</label>

<input type="text" name="GST_NO" id="GST_NO" class="form-control"  placeholder="Enter GST NO" value="<?php echo $value->GST_NO;?>">
</div>

</div>
<div class="col-md-6">
<div class="form-group">
<label for="exampleInputEmail1">Contact No</label><span style="color:red">*</span>
<input type="text" name="vendor_contact" id="vendor_contact" class="form-control" value="<?php echo $value->vendor_contact;?>" placeholder="Enter Contact No" onkeypress="return isNumberKey(event)" maxlength="10" minlength="10" required>
</div>
<div class="form-group">
<label for="exampleInputEmail1">Alternate  Contact No</label>
<input type="text" name="vendor_alternate_contact" id="vendor_alternate_contact" class="form-control" value="<?php echo $value->vendor_alternate_contact?>" placeholder="Enter Alternate  Contact" onkeypress="return isNumberKey(event)" maxlength="10" minlength="10">
</div>
<div class="form-group">
<label for="exampleInputEmail1">Address</label>

<textarea name="vendor_address" id="vendor_address" class="form-control" placeholder="Enter Address"><?php echo $value->vendor_address;?></textarea>
</div>
</div>
</div> 
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
<input type="submit" class="btn btn-primary" name="update_vendor" id="update_vendor">
</div>
</form>
</div> 
</div> 
</div> 
<!-- end edit user modal -->
<?php
$sr++;
}
}?>
</tbody>
</table>
</div>
</div>
</div>
</div>
</div>
 
</div>
</div>
<footer id="footer-bar" class="row">
<p id="footer-copyright" class="col-xs-12">
Powered by Cube Theme.
</p>
</footer>
</div>
</div>
</div>
</div>



<!-- user modal -->
  <div class="modal fade" id="vendormodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h4 class="modal-title">Add Vendor</h4>
</div>
<form method="post">
<div class="modal-body">

<div class="row">
<div class="col-md-6">
<div class="form-group">
<label for="exampleInputEmail1">Vendor Name</label><span style="color:red">*</span>

<input type="text" name="vendor_name" id="vendor_name" class="form-control"  placeholder="Enter Name" required="">
</div>

<div class="form-group">
<label for="exampleInputEmail1">Vendor Email</label><span style="color:red">*</span>

<input type="email" name="vendor_email" id="vendor_email" class="form-control"  placeholder="Enter Email" required="">
</div>
<div class="form-group">
<label for="exampleInputEmail1">Vendor Password</label><span style="color:red">*</span>

<input type="password" name="vendor_pass" id="vendor_pass" class="form-control"  placeholder="Enter Password" required="">
</div>
<div class="form-group">
<label for="exampleInputEmail1">GST NO</label>

<input type="text" name="GST_NO" id="GST_NO" class="form-control"  placeholder="Enter GST NO">
</div>

</div>
<div class="col-md-6">
<div class="form-group">
<label for="exampleInputEmail1">Contact No</label><span style="color:red">*</span>
<input type="text" name="vendor_contact" id="vendor_contact" class="form-control"  placeholder="Enter Contact No" onkeypress="return isNumberKey(event)" maxlength="10" minlength="10" required="">
</div>
<div class="form-group">
<label for="exampleInputEmail1">Alternate  Contact No</label>
<input type="text" name="vendor_alternate_contact" id="vendor_alternate_contact" class="form-control"  placeholder="Enter Alternate  Contact" onkeypress="return isNumberKey(event)" maxlength="10" minlength="10">
</div>
<div class="form-group">
<label for="exampleInputEmail1">Address</label>

<textarea name="vendor_address" id="vendor_address" class="form-control" placeholder="Enter Address"></textarea>
</div>
</div>
</div> 
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
<input type="submit" class="btn btn-primary" name="add_vendor" id="add_vendor">
</div>
</form>
</div> 
</div> 
</div> 
<!-- end user modal -->


<script src="<?php echo base_url().'assets/js/validation.js';?>"></script>
<script src="<?php echo base_url().'assets/js/demo-skin-changer.js';?>"></script>  
<script src="<?php echo base_url().'assets/js/jquery.js';?>"></script>
<script src="<?php echo base_url().'assets/js/bootstrap.js';?>"></script>
<script src="<?php echo base_url().'assets/js/jquery.nanoscroller.min.js';?>"></script>
<script src="<?php echo base_url().'assets/js/demo.js';?>"></script>  
 
<script src="<?php echo base_url().'assets/js/jquery.dataTables.js';?>"></script>
<script src="<?php echo base_url().'assets/js/dataTables.fixedHeader.js';?>"></script>
<script src="<?php echo base_url().'assets/js/dataTables.tableTools.js';?>"></script>
<script src="<?php echo base_url().'assets/js/jquery.dataTables.bootstrap.js';?>"></script>
<script src="<?php echo base_url().'assets/js/modernizr.custom.js';?>"></script>
<script src="<?php echo base_url().'assets/js/classie.js';?>"></script>
<script src="<?php echo base_url().'assets/js/modalEffects.js';?>"></script>
<script src="<?php echo base_url().'assets/js/scripts.js';?>"></script>
<script src="<?php echo base_url().'assets/js/pace.min.js';?>"></script>
 <script type="text/javascript">
		$(document).ready( function() {
			
      $('#deletesuccess').delay(3000).fadeOut();    
      $('#deletesuccess1').delay(3000).fadeOut();
    });
    </script>
<script>
	$(document).ready(function() {
		var table = $('#table-example').dataTable({
			'info': false,
			'sDom': 'lTfr<"clearfix">tip',
			'oTableTools': {
	            'aButtons': [
	                {
	                    'sExtends':    'collection',
	                    'sButtonText': '<i class="fa fa-cloud-download"></i>&nbsp;&nbsp;&nbsp;<i class="fa fa-caret-down"></i>',
	                    'aButtons':    [ 'csv', 'xls', 'pdf', 'copy', 'print' ]
	                }
	            ]
	        }
		});
		
	    var tt = new $.fn.dataTable.TableTools( table );
		$( tt.fnContainer() ).insertBefore('div.dataTables_wrapper');
		
		var tableFixed = $('#table-example-fixed').dataTable({
			'info': false,
			'pageLength': 50
		});
		
		new $.fn.dataTable.FixedHeader( tableFixed );
	});
	</script>
	<script type="text/javascript"> 
    function doconfirm()
  {
    //alert("hiii");
      job=confirm("Are you sure to delete permanently?");
      if(job!=true)
      {
          return false;
      }
  } 
</script>

</body>

<!-- Mirrored from cube.adbee.technology/tables-advanced.html by HTTrack Website Copier/3.x [XR&CO'2013], Wed, 18 Nov 2015 07:07:44 GMT -->
</html>