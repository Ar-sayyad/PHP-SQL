<div id="content-wrapper">
<div class="row">
<div class="col-lg-12">
<div class="row">
<div class="col-lg-12">
<ol class="breadcrumb">
<li><a href="<?php echo base_url().'home';?>">Home</a></li>
<li class="active"><span>Subadmin</span></li>
</ol>
<h1>Subadmin</h1>
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
<a href="#subadminmodal" data-toggle="modal" class="btn btn-primary pull-right">
<i class="fa fa-plus-circle fa-lg"></i> Subadmin
</a>
</header>

<div class="main-box-body clearfix">
<div class="table-responsive">
<table id="table-example" class="table table-hover">
<thead>
<tr>
<th>SR No</th>
<th>Subadmin Name</th>
<th>Contact No</th>
<th>Email Id</th>
<th>Added date</th>
<th>Action</th> 
</tr>
</thead>
<tbody>
<?php
if($subadmin)
{
	$sr=1;
	foreach ($subadmin as $key => $value) {
		?>
<tr>
<td><?php echo $sr;?></td>
<td><?php echo $value->subadmin_name;?></td>
<td><?php echo $value->subadmin_contact;?></td>
<td><?php echo $value->subadmin_email;?></td>
<td><?php echo $value->created_at;?></td>
<td>
	<a href="#subadmineditmodal_<?php echo $value->subadmin_id;?>" data-toggle="modal" class="table-link">
<span class="fa-stack">
<i class="fa fa-square fa-stack-2x"></i>
<i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
</span>
</a>
<a href="<?php echo base_url().'home/deleteSubAdmin/'.$value->subadmin_id;?>" onClick="return doconfirm();" class="table-link danger">
<span class="fa-stack">
<i class="fa fa-square fa-stack-2x"></i>
<i class="fa fa-trash-o fa-stack-1x fa-inverse"></i>
</span>
</a>
</td>
</tr>
<!-- edit user modal -->
  <div class="modal fade" id="subadmineditmodal_<?php echo $value->subadmin_id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h4 class="modal-title">Update SubAdmin</h4>
</div>
<form method="post">
<div class="modal-body">

<div class="row">
<div class="col-md-6">
<div class="form-group">
<label for="exampleInputEmail1">Subadmin Name</label><span style="color:red">*</span>
<input type="hidden" id="subadmin_id" name="subadmin_id" value="<?php echo $value->subadmin_id;?>">
<input type="text" name="subadmin_name" id="subadmin_name" class="form-control" value="<?php echo $value->subadmin_name;?>" placeholder="Enter Name" required>
</div>

<div class="form-group">
<label for="exampleInputEmail1">Subadmin Email</label><span style="color:red">*</span>

<input type="email" name="subadmin_email" id="subadmin_email" class="form-control" value="<?php echo $value->subadmin_email;?>" placeholder="Enter Email" required>
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<label for="exampleInputEmail1">Contact No</label><span style="color:red">*</span>
<input type="text" name="subadmin_contact" id="subadmin_contact" class="form-control" value="<?php echo $value->subadmin_contact;?>" placeholder="Enter Contact No" onkeypress="return isNumberKey(event)" maxlength="10" minlength="10" required>
</div>
<div class="form-group">
<label for="exampleInputEmail1">Alternate  Contact No</label>
<input type="text" name="subadmin_alt_contact" id="subadmin_alt_contact" class="form-control" value="<?php echo $value->subadmin_alt_contact?>" placeholder="Alternate  Contact" onkeypress="return isNumberKey(event)" maxlength="10" minlength="10">
</div>
<div class="form-group">
<label for="exampleInputEmail1">Address</label>

<textarea name="address" id="address" class="form-control" placeholder="Enter Address"><?php echo $value->address;?></textarea>
</div>
</div>
</div> 
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
<input type="submit" class="btn btn-primary" name="update_subadmin" id="update_subadmin">
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
  <div class="modal fade" id="subadminmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h4 class="modal-title">Add Subadmin</h4>
</div>
<form method="post">
<div class="modal-body">

<div class="row">
<div class="col-md-6">
<div class="form-group">
<label for="exampleInputEmail1">Subadmin Name</label><span style="color:red">*</span>

<input type="text" name="subadmin_name" id="subadmin_name" class="form-control"  placeholder="Enter Name" required="">
</div>

<div class="form-group">
<label for="exampleInputEmail1">Subadmin Email</label><span style="color:red">*</span>

<input type="email" name="subadmin_email" id="subadmin_email" class="form-control"  placeholder="Enter Email" required="">
</div>
<div class="form-group">
<label for="exampleInputEmail1">Subadmin Password</label><span style="color:red">*</span>

<input type="password" name="password" id="password" class="form-control"  placeholder="Enter Password" required="">
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<label for="exampleInputEmail1">Contact No</label><span style="color:red">*</span>
<input type="text" name="subadmin_contact" id="subadmin_contact" class="form-control"  placeholder="Enter Contact No" onkeypress="return isNumberKey(event)" maxlength="10" minlength="10" required="">
</div>
<div class="form-group">
<label for="exampleInputEmail1">Alternate  Contact No</label>
<input type="text" name="subadmin_alt_contact" id="subadmin_alt_contact" class="form-control"  placeholder="Enter Alternate  Contact" onkeypress="return isNumberKey(event)" maxlength="10" minlength="10">
</div>
<div class="form-group">
<label for="exampleInputEmail1">Address</label>

<textarea name="address" id="address" class="form-control" placeholder="Enter Address"></textarea>
</div>
</div>
</div> 
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
<input type="submit" class="btn btn-primary" name="add_subadmin" id="add_subadmin">
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