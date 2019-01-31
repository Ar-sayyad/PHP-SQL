<div id="content-wrapper">
<div class="row">
<div class="col-lg-12">
<div class="row">
<div class="col-lg-12">
<ol class="breadcrumb">
<li><a href="<?php echo base_url().'Supervisor';?>">Home</a></li>
<li class="active"><span>ASSIGN FUEL</span></li>
</ol>
<h1>ASSIGN FUEL</h1>
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
<i class="fa fa-plus-circle fa-lg"></i> Assign Fuel
</a> 
</header>

<div class="main-box-body clearfix">
<div class="table-responsive">
<table id="table-example" class="table table-hover">
<thead>
<tr>
<th>SR No</th>
<th>Vendor Name</th>
<th>supervisor name</th>
<th>Vehicle No</th>
<th>Driver Name</th>
<th>Cost</th>
<th>Date</th>
<!-- <th>Receipt</th> -->

 
</tr>
</thead>
<tbody>
<?php
if($fuel_mgt)
{
	$sr=1;
	foreach ($fuel_mgt as $key => $value) {
		?>
<tr>
<td><?php echo $sr;?></td>
<td><?php echo $value->vendor_name;?></td>
<td><?php echo $value->supervisor_name;?><br><?php echo $value->supervisor_contact;?></td>
<td><?php echo $value->vehicle_no;?></td>
<td><?php echo $value->driver_name;?><br><?php echo $value->driver_contact ?></td>
<td><?php echo number_format($value->cost,2);?></td>
<td><?php echo $value->date;?></td>
<!--<td>
	<a href="#assgineditmodal_<?php echo $value->fuel_receipt_id;?>" data-toggle="modal" class="btn btn-primary">
<span>
<i class="fa fa-eye"></i>

</span>
view
</a>
</td>-->
</tr>
<!-- edit user modal --> 
 
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
<select class="form-control" name="assign_id" id="assign_id" required="">
<option value="">Select vehicle</option>
<?php
foreach($assign as $each)
{
	echo "<option ";
	 echo "value='".$each->assign_id."'";
	                    if($each->assign_id == set_value('assign_id'))
	                    {
	                      echo " selected ";  
	                    }
	                    echo ">".$each->vehicle_no."</option>"; 
}
?>
</select> 
</div>
<div class="form-group">
<label>Cost</label><span style="color:red">*</span>
<input type="text" class="form-control" name="cost" id="cost" required="">
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<label for="exampleInputEmail1">Vendor</label><span style="color:red">*</span>
<select class="form-control" name="vendor_id" id="vendor_id" required="">
<option value="">Select Vendor</option>
<?php
foreach($vendor as $each)
{
	echo "<option ";
	echo "value='".$each->vendor_id."'";
	if($each->vendor_id == set_value('vendor_id'))
	{
		echo "selected";

	}
	echo ">".$each->vendor_name."</option>";
}
?>
</select>
</div>
<div class="form-group">
<label>Date</label><span style="color:red">*</span>
<input type="text" class="form-control" id="datepickerDate2"  placeholder="Enter Date" name="date">
</div>
</div>
</div> 
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
<input type="submit" class="btn btn-primary" name="assign_fuel" id="assign_fuel">
</div>
</form>
</div> 
</div> 
</div> 
<!-- end user modal -->
<script type="text/javascript">
 function PrintElem(el){
    
	var restorepage = document.body.innerHTML;
	var printcontent = document.getElementById(el).innerHTML;
	document.body.innerHTML = printcontent;
        
	window.print();
        
	document.body.innerHTML = restorepage;
        window.location.reload();
      // return true;
}
</script> 

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
<script src="<?php echo base_url().'assets/js/bootstrap-datepicker.js';?>"></script>
 <script type="text/javascript">
		$(document).ready( function() {
			
      $('#deletesuccess').delay(3000).fadeOut();    
      $('#deletesuccess1').delay(3000).fadeOut();
    });
		$('#datepickerDate2').datepicker({
		  format: 'mm-dd-yyyy'
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