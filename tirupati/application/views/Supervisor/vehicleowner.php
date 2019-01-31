
<div id="content-wrapper">
<div class="row">
<div class="col-lg-12">
<div class="row">
<div class="col-lg-12">
<ol class="breadcrumb">
<li><a href="<?php echo base_url().'Supervisor';?>">Home</a></li>
<li class="active"><span>Vehicle Owner</span></li> 
</ol>
<h1>Vehicle Owner</h1>
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
<a href="#ownermodal" data-toggle="modal" class="btn btn-primary pull-right">
<i class="fa fa-plus-circle fa-lg"></i> Add Vehicle Owner
</a>
</header>

<div class="main-box-body clearfix">
<div class="table-responsive">
<table id="table-example" class="table table-hover">
<thead>
<tr>
<th>SR No</th>
<th>Name</th>
<th>Contact Number</th>
<th>Email Id</th>
<th>Added date</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php
if($vehicle_owner)
{
	$sr=1;
	foreach ($vehicle_owner as $key => $value) {
		?>
<tr>
<td><?php echo $sr;?></td>
<td><?php echo $value->owner_full_name;?></td>
<td><?php echo $value->contact_no;?></td>
<td><?php echo $value->Email_id;?></td>
<td><?php echo $value->created_on;?></td>
<td>
<?php if($this->session->userdata('supervisor_id')==$value->supervisor_id){?>

	<a href="#ownereditmodal_<?php echo $value->vehicle_owner_id;?>" data-toggle="modal" class="table-link">
<span class="fa-stack">
<i class="fa fa-square fa-stack-2x"></i>
<i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
</span>
</a>
<a href="<?php echo base_url().'Supervisor/deleteOwner/'.$value->vehicle_owner_id;?>" onClick="return doconfirm();" class="table-link danger">
<span class="fa-stack">
<i class="fa fa-square fa-stack-2x"></i>
<i class="fa fa-trash-o fa-stack-1x fa-inverse"></i>
</span>
</a>
<?php }?>
</td>

</tr>
<!-- edit user modal -->

  <div class="modal fade" id="ownereditmodal_<?php echo $value->vehicle_owner_id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h4 class="modal-title">Update Vehicle Owner</h4>
</div>
<form method="post" enctype="multipart/form-data" id="editdriver_<?php echo $value->vehicle_owner_id;?>" >
<div class="modal-body">

<div class="row">
<div class="col-md-6">
<div class="form-group">
<label for="exampleInputEmail1">Name</label><span style="color:red">*</span>
<input type="hidden" name="vehicle_owner_id" id="vehicle_owner_id" value="<?php echo $value->vehicle_owner_id;?>">
<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Full Name" name="owner_name" value="<?php echo $value->owner_full_name;?>" onKeyPress="return ValidateAlpha(event);" required>
</div>

<div class="form-group">
<label for="exampleInputPassword1">Contact No</label><span style="color:red">*</span>
<input type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter Contact No" name="owner_contact" maxlength="10" minlength="10" value="<?php echo $value->contact_no;?>"onkeypress="return isNumberKey(event)"required >
</div>
<div class="form-group">
<label for="exampleTextarea">Alternate  Contact No</label>
<input type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter Alternate  Contact" name="alternat_contact" maxlength="10" minlength="10" value="<?php echo $value->Alternat_no;?>" onkeypress="return isNumberKey(event)">
</div>

<!--<div class="form-group">
	<label class="control-label no-padding-right" for="form-field-1">License</label>
		<div class="col-sm-9">
			<input type="file"  class="form-control hidden" id="license2" name="license" >
			<span class="profile-picture">
			<img id="avatar3" style="height:150px;" class="	editable img-responsive" alt="Alex's Avatar" src="<?php echo base_url();?>assets/uploads/driver/license/<?php echo $value->license ?>"  onError="this.src ='<?php echo base_url().'assets/img/uploadimg.png';?>'" />
			<input type="hidden" class="form-control" id="old_license" name="old_license" value="<?php echo $value->license;?>">
			</span> 
		</div>
</div>-->
</div>
<div class="col-md-6">
<div class="form-group">
<label for="exampleInputEmail1">Email</label>

<input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter Email Id" name="owner_email" value="<?php echo $value->Email_id;?>" onKeyPress="return ValidateAlpha(event);">
</div>
<div class="form-group">
<label for="exampleTextarea">Address</label>
<textarea class="form-control" placeholder="Enter Address" id="exampleTextarea" rows="3" name="owner_address"><?php echo $value->owner_address;?></textarea>
</div>



</div>

</div> 
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
<input type="submit" class="btn btn-primary" name="update_owner" id="update_owner">
</div>
</form>


</div> 
</div> 
</div>
<!-- end edit user modal -->
		
<?php
 $sr++;
}
}
?>


 
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
  <div class="modal fade" id="ownermodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h4 class="modal-title">Add Vehicle Owner</h4>
</div>
<form method="post" enctype="multipart/form-data">
<div class="modal-body">

<div class="row">
<div class="col-md-6">
<div class="form-group">
<label for="exampleInputEmail1">Name</label><span style="color:red">*</span>
<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Full Name" name="owner_name" onKeyPress="return ValidateAlpha(event);" required="">
</div>
<div class="form-group">
<label for="exampleInputPassword1">Contact No</label><span style="color:red">*</span>
<input type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter Contact No" name="owner_contact" maxlength="10" minlength="10" onkeypress="return isNumberKey(event)" required="">
</div>
<div class="form-group">
<label for="exampleTextarea">Alternate  Contact No</label>
<input type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter Alternate  Contact" name="alternat_contact" maxlength="10" minlength="10" onkeypress="return isNumberKey(event)">
</div>


</div>
<div class="col-md-6">
<div class="form-group">
<label for="exampleInputEmail1">Email</label>
<input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter Email Id" name="owner_email">
</div>
<div class="form-group">
<label for="exampleTextarea">Address</label>
<textarea class="form-control" placeholder="Enter Address" id="exampleTextarea" rows="3" name="owner_address"></textarea>
</div>



</div>
</div> 
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
<input type="submit" class="btn btn-primary" name="add_owner" id="add_owner">
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

    <script type="text/javascript">
function readURL1(input) 
{
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#avatar1')
                .attr('src', e.target.result)

            $("#avatar1").css("width", 180);
			$("#avatar1").css("height", 200);
        };
        reader.readAsDataURL(input.files[0]);
    }
}

$(function(){      
    $('#license1').change(function(){         
       readURL1(this);         
    }); 
    $('#avatar1').on('click',function(){
       $('#license1').click();           
    });
}); 


function readURL2(input) 
{
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#avatar2')
                .attr('src', e.target.result)

            $("#avatar2").css("width", 180);
			$("#avatar2").css("height", 200);
        };
        reader.readAsDataURL(input.files[0]);
    }
}

$(function(){      
    $('#id_proof1').change(function(){         
       readURL2(this);         
    }); 
    $('#avatar2').on('click',function(){
       $('#id_proof1').click();           
    });
}); 


  function readURL3(input) 
{
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#avatar3')
                .attr('src', e.target.result)

            $("#avatar3").css("width", 180);
			$("#avatar3").css("height", 200);
        };
        reader.readAsDataURL(input.files[0]);
    }
}

$(function(){      
    $('#license2').change(function(){         
       readURL3(this);         
    }); 
    $('#avatar3').on('click',function(){
       $('#license2').click();           
    });
});


function readURL4(input) 
{
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#avatar4')
                .attr('src', e.target.result)

            $("#avatar4").css("width", 180);
			$("#avatar4").css("height", 200);
        };
        reader.readAsDataURL(input.files[0]);
    }
}

$(function(){      
    $('#id_proof2').change(function(){         
       readURL4(this);         
    }); 
    $('#avatar4').on('click',function(){
       $('#id_proof2').click();           
    });
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