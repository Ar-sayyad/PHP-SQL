<div id="content-wrapper">
<div class="row">
<div class="col-lg-12">
<div class="row">
<div class="col-lg-12">
<ol class="breadcrumb">
<li><a href="<?php echo base_url().'home';?>">Home</a></li>
<li class="active"><span>Supervisors</span></li>
</ol>
<h1>Supervisor</h1>
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
<a href="#supervisormodal" data-toggle="modal" class="btn btn-primary pull-right">
<i class="fa fa-plus-circle fa-lg"></i> Supervisors
</a>
</header>

<div class="main-box-body clearfix">
<div class="table-responsive">
<table id="table-example" class="table table-hover">
<thead>
<tr>
<th>SR No</th>
<th>Supervisor Name</th>
<th>Contact No</th>
<th>Email Id</th>
<th>Added date</th>
<!-- <th>Status</th> -->
<th>Action</th> 
</tr>
</thead>
<tbody>
<?php
if($supervisor)
{
	$sr=1;
	foreach ($supervisor as $key => $value) {
		?>
<tr>
<td><?php echo $sr;?></td>
<td><?php echo $value->supervisor_name;?></td>
<td><?php echo $value->supervisor_contact;?></td>
<td><?php echo $value->supervisor_email;?></td>
<td><?php echo $value->created_on;?></td>
<!--<td>
<?php if($value->is_active==0){?>
  <a href="<?php echo base_url(); ?>Home/publishSupervisor/<?php echo $value->supervisor_id;?>"><button class="btn btn-warning" title="Inactive">Inactive</button></a>
  <?php 
    }else { ?>
	  <a href="<?php echo base_url(); ?>Home/inactiveSupervisor/<?php echo $value->supervisor_id;?>"><button class="btn btn-info" title="Active">Active </button></a>
	<?php     }?>
</td>-->
<td>
	<a href="#vendoreditmodal_<?php echo $value->supervisor_id;?>" data-toggle="modal" class="table-link">
<span class="fa-stack">
<i class="fa fa-square fa-stack-2x"></i>
<i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
</span>
</a>
<a href="<?php echo base_url().'home/deleteSupervisor/'.$value->supervisor_id;?>" onClick="return doconfirm();" class="table-link danger">
<span class="fa-stack">
<i class="fa fa-square fa-stack-2x"></i>
<i class="fa fa-trash-o fa-stack-1x fa-inverse"></i>
</span>
</a>
</td>
</tr>
<!-- edit user modal -->
  <div class="modal fade" id="vendoreditmodal_<?php echo $value->supervisor_id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h4 class="modal-title">Update Supervisor</h4>
</div>
<form method="post">
<div class="modal-body">

<div class="row">
<div class="col-md-6">
<div class="form-group">
<label for="exampleInputEmail1">Supervisor Name</label><span style="color:red">*</span>
<input type="hidden" id="supervisor_id" name="supervisor_id" value="<?php echo $value->supervisor_id;?>">
<input type="text" name="supervisor_name" id="supervisor_name" class="form-control" value="<?php echo $value->supervisor_name;?>" placeholder="Enter Name" required>
</div>

<div class="form-group">
<label for="exampleInputEmail1">Supervisor Email</label><span style="color:red">*</span>

<input type="email" name="supervisor_email" id="supervisor_email" class="form-control" value="<?php echo $value->supervisor_email;?>" placeholder="Enter Email" required>
</div>



</div>
<div class="col-md-6">
<div class="form-group">
<label for="exampleInputEmail1">Contact No</label><span style="color:red">*</span>
<input type="text" name="supervisor_contact" id="supervisor_contact" class="form-control" value="<?php echo $value->supervisor_contact;?>" placeholder="Enter Contact No" onkeypress="return isNumberKey(event)" maxlength="10" minlength="10" required>
</div>
<div class="form-group">
<label for="exampleInputEmail1">Alternate Contact No</label>
<input type="text" name="supervisor_alternet_contact" id="supervisor_alternet_contact" class="form-control" value="<?php echo $value->supervisor_alternet_contact?>" placeholder="Enter Alternate Contact No" onkeypress="return isNumberKey(event)" maxlength="10" minlength="10">
</div>
<div class="form-group">
<label for="exampleInputEmail1">Address</label>

<textarea name="supervisor_address" id="supervisor_address" class="form-control" placeholder="Enter Address"><?php echo $value->supervisor_address;?></textarea>
</div>
</div>
</div> 
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
<input type="submit" class="btn btn-primary" name="update_supervisor" id="update_supervisor">
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
  <div class="modal fade" id="supervisormodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h4 class="modal-title">Add Supervisor</h4>
</div>
<form method="post">
<div class="modal-body">

<div class="row">
<div class="col-md-6">
<div class="form-group">
<label for="exampleInputEmail1">Supervisor Name</label><span style="color:red">*</span>

<input type="text" name="supervisor_name" id="supervisor_name" class="form-control"  placeholder="Enter Name" required="">
</div>

<div class="form-group">
<label for="exampleInputEmail1">Supervisor Email</label><span style="color:red">*</span>

<input type="email" name="supervisor_email" id="supervisor_email" class="form-control"  placeholder="Enter Email" required="">
</div>
<div class="form-group">
<label for="exampleInputEmail1">Password</label><span style="color:red">*</span>

<input type="password" name="pass" id="pass" class="form-control"  placeholder="Enter Password" required="">
</div>
<div class="form-group">
<label for="exampleInputEmail1">Confirm Password</label><span style="color:red">*</span>

<input type="password" name="cpass" id="cpass" class="form-control"  placeholder="Enter Password" required="" onchange="checkpass();">
</div>

</div>
<div class="col-md-6">
<div class="form-group">
<label for="exampleInputEmail1">Contact No</label><span style="color:red">*</span>
<input type="text" name="supervisor_contact" id="supervisor_contact" class="form-control"  placeholder="Enter Contact No" onkeypress="return isNumberKey(event)" maxlength="10" minlength="10" required="">
</div>
<div class="form-group">
<label for="exampleInputEmail1">Alternate Contact No</label>
<input type="text" name="supervisor_alternet_contact" id="supervisor_alternet_contact" class="form-control"  placeholder="Enter Alternate Contact No" onkeypress="return isNumberKey(event)" maxlength="10" minlength="10">
</div>
<div class="form-group">
<label for="exampleInputEmail1">Address</label>

<textarea name="supervisor_address" id="supervisor_address" class="form-control" placeholder="Enter Address"></textarea>
</div>
</div>
</div> 
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
<input type="submit" class="btn btn-primary" name="add_supervisor" id="add_supervisor">
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
	function checkpass(value)
{

  var value = document.getElementById("cpass").value;
  var value1 = document.getElementById("pass").value;
 if(value1!= value)
    {
      alert('Password And Confirm Password Are Not same');
         $('#cpass').val("");
         $('#pass').val("");
          $("#pass").focus();
       }
}
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