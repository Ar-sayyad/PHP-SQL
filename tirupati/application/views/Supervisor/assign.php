<div id="content-wrapper">
<div class="row">
<div class="col-lg-12">
<div class="row">
<div class="col-lg-12">
<ol class="breadcrumb">
<li><a href="<?php echo base_url().'Supervisor';?>">Home</a></li>
<li class="active"><span>ASSIGN</span></li>
</ol>
<h1>Assign</h1>
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
<a href="#assignmodal" data-toggle="modal" class="btn btn-primary pull-right">
<i class="fa fa-plus-circle fa-lg"></i> Assign
</a>
</header>

<div class="main-box-body clearfix">
<div class="table-responsive">
<table id="table-example" class="table table-hover">
<thead>
<tr>
<th>SR No</th>
<th>Vehicle No</th>
<th>Driver Name</th>
<th>Driver Contact</th>
<th>Added date</th>
<th>Action</th> 
</tr>
</thead>
<tbody>
<?php
$sr=1;
if($assign)
{
	foreach ($assign as $key => $value) {
		?>
<tr>
<td><?php echo $value->assign_id;?></td>
<td><?php echo $value->vehicle_no;?></td>
<td><?php echo $value->driver_name;?></td>
<td><?php echo $value->driver_contact;?></td>
<td><?php echo $value->created_on;?></td>
<td>
	<!--<a href="#assgineditmodal_<?php echo $value->assign_id;?>" data-toggle="modal" class="table-link">
<span class="fa-stack">
<i class="fa fa-square fa-stack-2x"></i>
<i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
</span>
</a>-->
<a href="<?php echo base_url().'Supervisor/deleteAssignEntry/'.$value->assign_id.'/'.$value->vehicle_id.'/'.$value->driver_id;?>" onClick="return doconfirm();" class="btn btn-danger">
<span>
Release
</span>
</a>
</td>
</tr>
<!-- edit user modal -->
  <div class="modal fade" id="assgineditmodal_<?php echo $value->assign_id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h4 class="modal-title">Update Assign Entry</h4>
</div>
<form method="post">
<div class="modal-body">

<div class="row">
<div class="col-md-6">
<div class="form-group">
<label for="exampleInputEmail1">Vehicle No</label><span style="color:red">*</span>
<input type="hidden" id="assign_id" name="assign_id" value="<?php echo $value->assign_id?>">
<select class="form-control" name="vehicle_id" id="vehicle_id" required>
<option value="">Select vehicle</option>
<?php
foreach($vehicle as $each)
{
	echo "<option ";
	 echo "value='".$each->vehicle_id."'";
	  echo "name='".$each->vehicle_id."'";
	                    if($each->vehicle_id == $value->vehicle_id)
	                    {
	                      echo " selected ";  
	                    }
	                    echo ">".$each->vehicle_no."</option>"; 
}
?>
</select> 
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<label for="exampleInputEmail1">Driver</label><span style="color:red">*</span>
<select class="form-control" name="driver_id" id="driver_id" required>
<option value="">Select Driver</option>
<?php
foreach($driver as $each)
{
	echo "<option ";
	echo "value='".$each->driver_id."'";
	echo "name='".$each->driver_id."'";
	if($each->driver_id == $value->driver_id )
	{
		echo "selected";

	}
	echo ">".$each->driver_name."</option>";
}
?>
</select>
</div>
</div>
</div> 
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
<input type="submit" class="btn btn-primary" name="update_assign" id="update_assign">
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
  <div class="modal fade" id="assignmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h4 class="modal-title">Add Assign Entry</h4>
</div>
<form method="post">
<div class="modal-body">

<div class="row">
<div class="col-md-6">
<div class="form-group">
<label for="exampleInputEmail1">Vehicle No</label><span style="color:red">*</span>
<select class="form-control" name="vehicle_id" id="vehicle_id" required="">
<option value="">Select vehicle</option>
<?php
foreach($vehicle as $each)
{
	echo "<option ";
	 echo "value='".$each->vehicle_id."'";
	                    if($each->vehicle_id == set_value('vehicle_id'))
	                    {
	                      echo " selected ";  
	                    }
	                    echo ">".$each->vehicle_no."</option>"; 
}
?>
</select> 
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<label for="exampleInputEmail1">Driver</label><span style="color:red">*</span>
<select class="form-control" name="driver_id" id="driver_id" required="">
<option value="">Select Driver</option>
<?php
foreach($driver as $each)
{
	echo "<option ";
	echo "value='".$each->driver_id."'";
	if($each->driver_id == set_value('driver_id'))
	{
		echo "selected";

	}
	echo ">".$each->driver_name."</option>";
}
?>
</select>
</div>
</div>
</div> 
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
<input type="submit" class="btn btn-primary" name="add_assign" id="add_assign">
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
      job=confirm("Are you sure to Release?");
      if(job!=true)
      {
          return false;
      }
  } 
</script>

</body>

<!-- Mirrored from cube.adbee.technology/tables-advanced.html by HTTrack Website Copier/3.x [XR&CO'2013], Wed, 18 Nov 2015 07:07:44 GMT -->
</html>