<div id="content-wrapper">
<div class="row">
<div class="col-lg-12">
<div class="row">
<div class="col-lg-12">
<ol class="breadcrumb">
<li><a href="<?php echo base_url().'Supervisor';?>">Home</a></li>
<li class="active"><span>FUEL RECEIPT</span></li>
</ol>
<h1>FUEL RECEIPT</h1>
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
<!-- <a href="#assignmodal" data-toggle="modal" class="btn btn-primary pull-right">
<i class="fa fa-plus-circle fa-lg"></i> FULE RECEIPT
</a> -->
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
<th>Receipt</th>

 
</tr>
</thead>
<tbody>
<?php
if($fule_Receipt)
{
	$sr=1;
	foreach ($fule_Receipt as $key => $value) {
		?>
<tr>
<td><?php echo $sr;?></td>
<td><?php echo $value->vendor_name;?></td>
<td><?php echo $value->supervisor_name;?><br><?php echo $value->supervisor_contact;?></td>
<td><?php echo $value->vehicle_no;?></td>
<td><?php echo $value->driver_name;?><br><?php echo $value->driver_contact ?></td>
<td><?php echo number_format($value->cost,2);?></td>
<td><?php echo $value->date;?></td>
<td>
	<a href="#assgineditmodal_<?php echo $value->fuel_receipt_id;?>" data-toggle="modal" class="btn btn-primary">
<span>
<i class="fa fa-eye"></i>

</span>
view
</a>
</td>
</tr>
<!-- edit user modal --> 
  <div class="modal fade" id="assgineditmodal_<?php echo $value->fuel_receipt_id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h4 class="modal-title">View Receipt</h4>
</div>
<form method="post">
<div id="invoice_print">
<div class="modal-body">
<div class="row">
<div class="col-md-6">
<span>Vendor Name : </span><?php echo $value->vendor_name;?><br>
<span>Vendor No : </span><?php echo $value->vendor_contact;?><br><br>
</div>
<div class="col-md-6">
<span>Supervisor Name : </span><?php echo $value->supervisor_name;?><br>
<span>Supervisor No : </span><?php echo $value->supervisor_contact;?><br><br>
</div>
<div class="col-md-6">
<span>Driver Name : </span><?php echo $value->driver_name;?><br>
<span>Driver No : </span><?php echo $value->driver_contact;?><br><br>
</div>
<div class="col-md-6">
<span>Vehicle No : </span><?php echo $value->vehicle_no;?><br>
<span>Cost : </span><?php echo number_format($value->cost,2);?><br><br>
</div>
</div>
<div class="row">
<img width="70%" height="50%" src="<?php echo base_url().'assets/uploads/receipts/'.$value->receipt_path;?>">
 </div>
</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
<a onClick="PrintElem('invoice_print')" class="btn btn-primary btn-icon icon-left hidden-print">
        Print 
        <i class="entypo-doc-text"></i>
    </a>
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