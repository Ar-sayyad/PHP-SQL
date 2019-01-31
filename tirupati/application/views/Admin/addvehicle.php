<div id="content-wrapper">
<div class="row">
<div class="col-lg-12">
<div class="row">
<div class="col-lg-12">
<ol class="breadcrumb">
<li><a href="<?php echo base_url().'home';?>">Home</a></li>
<li class="active"><span>VEHICLE</span></li>
</ol>
<h1>Vehicle</h1>
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
<a href="#vehiclemodal" data-toggle="modal" class="btn btn-primary pull-right">
<i class="fa fa-plus-circle fa-lg"></i> Add Vehicle
</a>
</header>

<div class="main-box-body clearfix">
<div class="table-responsive">
<table id="table-example" class="table table-hover">
<thead>
<tr>
<th>SR No</th>
<th>Vehicle No</th>
 <th>Owner Name</th>
 <th>Fuel Limit</th>
<th>Added date</th>
<th>Action</th> 
</tr>
</thead>
<tbody>
<?php
if($vehicle)
{
	$sr=1;
	foreach ($vehicle as $key => $value) {
		?>
<tr>
<td><?php echo $sr;?></td>
<td><?php echo $value->vehicle_no;?></td>
<td><?php echo $value->owner_full_name;?></td>
<td><?php echo $value->fuel_limit;?></td>
<td><?php echo $value->created_on;?></td>
<td>
	<a href="#vehicleeditmodal_<?php echo $value->vehicle_id;?>" data-toggle="modal" class="table-link">
<span class="fa-stack">
<i class="fa fa-square fa-stack-2x"></i>
<i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
</span>
</a>
<a href="<?php echo base_url().'home/deleteVehicle/'.$value->vehicle_id;?>" onClick="return doconfirm();" class="table-link danger">
<span class="fa-stack">
<i class="fa fa-square fa-stack-2x"></i>
<i class="fa fa-trash-o fa-stack-1x fa-inverse"></i>
</span>
</a>
</td>
</tr>
<!-- edit user modal -->
  <div class="modal fade" id="vehicleeditmodal_<?php echo $value->vehicle_id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h4 class="modal-title">Update Vehicle</h4>
</div>
<form method="post" enctype="multipart/form-data">
<div class="modal-body">

<div class="row">
<div class="col-md-6">
<div class="form-group">
<label for="exampleInputEmail1">Vehicle No</label><span style="color:red">*</span>
<input type="text" class="form-control" id="editvno" placeholder="Enter Vehicle No" name="vehicle_no" onchange="editval()" value="<?php echo $value->vehicle_no;?>" required>
<input type="hidden" class="form-control" id="exampleInputEmail1" name="vehicle_id" value="<?php echo $value->vehicle_id;?>">
</div>
<div class="form-group">
<label for="exampleInputEmail1">Vehicle Owner</label>
<select class="form-control etype" name="vehicle_owner_id" id="vehicle_owner_id">
<option value="">Select Owner</option>
<?php
foreach($owner as $each)
{
	
	echo "<option ";
	 echo "value='".$each->vehicle_owner_id."'";
	                    if($each->vehicle_owner_id == $value->vehicle_owner_id)
	                    {
	                      echo " selected ";  
	                    }
	                    echo ">".$each->owner_full_name."</option>"; 
}
?>
</select> 
</div>



</div>
<div class="col-md-6">
<div class="form-group">
<label for="exampleInputEmail1">Fuel Limit</label>
<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Vehicle Fuel Limit" name="fuel_limit" onkeypress="return isNumberKey(event)" value="<?php echo $value->fuel_limit;?>" is>
</div>
<div class="form-group">
<label for="exampleInputEmail1">Description</label>
<textarea class="form-control" id="exampleInputEmail1" placeholder="Enter Vehicle Description" name="description" rows="3"><?php echo $value->description;?></textarea> 
</div>







</div>







</div> 
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
<input type="submit" class="btn btn-primary" name="update_vehicle" id="update_vehicle">
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
  <div class="modal fade" id="vehiclemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h4 class="modal-title">Add Vehicle</h4>
</div>
<form method="post" enctype="multipart/form-data">
<div class="modal-body">

<div class="row">
<div class="col-md-6">
<div class="form-group">
<label for="exampleInputEmail1">Vehicle No</label><span style="color:red">*</span>
<input type="text" class="form-control" id="vno" placeholder="Enter Vehicle No" name="vehicle_no" required="" onchange="val()">
</div>
 <div class="form-group">
<label for="exampleInputEmail1">Owner Name</label>
<select class="form-control type" name="vehicle_owner_id" id="vehicle_owner_id">
<option value="">Select Owner</option>
<?php
foreach($owner as $each)
{
	
	echo "<option ";
	 echo "value='".$each->vehicle_owner_id."'";
	                    if($each->vehicle_owner_id == set_value('vehicle_owner_id'))
	                    {
	                      echo " selected ";  
	                    }
	                    echo ">".$each->owner_full_name."</option>"; 
}
?>
</select> 
</div>

</div>
<div class="col-md-6">
<div class="form-group">
<label for="exampleInputEmail1">Fuel Limit</label>
<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Vehicle Fuel Limit" name="fuel_limit" onkeypress="return isNumberKey(event)">
</div>
<div class="form-group">
<label for="exampleInputEmail1">Description</label>
<textarea class="form-control" id="exampleInputEmail1" placeholder="Enter Vehicle Description" name="description" rows="3"></textarea> 
</div>



</div>




</div> 
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
<input type="submit" class="btn btn-primary" name="add_vehicle" id="add_vehicle">
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
<script src="<?php echo base_url().'assets/js/bootstrap-datepicker.js';?>"></script>
 <script type="text/javascript">
							 $(document).ready( function() {
		$('#datepickerDate1').datepicker({
		  format: 'mm-dd-yyyy'
		});
		$('#datepickerDate2').datepicker({
		  format: 'mm-dd-yyyy'
		});
		$('#datepickerDate3').datepicker({
		  format: 'mm-dd-yyyy'
		});
		$('#datepickerDate4').datepicker({
		  format: 'mm-dd-yyyy'
		});
		$('#datepickerDate5').datepicker({
		  format: 'mm-dd-yyyy'
		});
		$('#datepickerDate6').datepicker({
		  format: 'mm-dd-yyyy'
		});
		$('#datepickerDate7').datepicker({
		  format: 'mm-dd-yyyy'
		});
		$('#datepickerDate8').datepicker({
		  format: 'mm-dd-yyyy'
		});
      $('#deletesuccess').delay(3000).fadeOut();    
      $('#deletesuccess1').delay(3000).fadeOut();
    });
    </script>

    <script type="text/javascript">
      $(".type").change(function(e){
     	
    var id=document.getElementById("type_id").value;
    //alert(id);
  $.post('<?php echo base_url("home/getmodel")?>',
    {
      id : id,
    },
    function(data)
    {
     var result=JSON.parse(data);
     alert(result);
            $('.model').find('option').remove().end();    
            if(result != ''){
            	$(".model").append('<option value=" ">Select Model</option>');   
              $.each(result, function (index, value) {
                $(".model").append('<option value="'+value.model_id+'">'+ value.model_name +'</option>');    
              });
            }else{
              $(".model").append('<option>No Model Available</option>');    
            }

           
    } 
  );
});


  </script>
  <script type="text/javascript">
  	 $(".etype").change(function(e){
     	
  	
    var id=document.getElementById("type").value;
    
  $.post('<?php echo base_url("home/getmodel")?>',
    {
      id : id,
    },
    function(data)
    {
     var result=JSON.parse(data);
     alert(result);
            $('.emodel').find('option').remove().end();    
            if(result != ''){
            	$(".emodel").append('<option value=" ">Select Model</option>');   
              $.each(result, function (index, value) {
                $(".emodel").append('<option value="'+value.model_id+'">'+ value.model_name +'</option>');    
              });
            }else{
              $(".emodel").append('<option>No Model Available</option>');    
            }

           
    } 
  );
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
    $('#rc1').change(function(){         
       readURL1(this);         
    }); 
    $('#avatar1').on('click',function(){
       $('#rc1').click();           
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
    $('#insurances1').change(function(){         
       readURL2(this);         
    }); 
    $('#avatar2').on('click',function(){
       $('#insurances1').click();           
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
    $('#puc1').change(function(){         
       readURL3(this);         
    }); 
    $('#avatar3').on('click',function(){
       $('#puc1').click();           
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
    $('#rc2').change(function(){         
       readURL4(this);         
    }); 
    $('#avatar4').on('click',function(){
       $('#rc2').click();           
    });
}); 


function readURL5(input) 
{
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#avatar5')
                .attr('src', e.target.result)

            $("#avatar5").css("width", 180);
			$("#avatar5").css("height", 200);
        };
        reader.readAsDataURL(input.files[0]);
    }
}

$(function(){      
    $('#insurances2').change(function(){         
       readURL5(this);         
    }); 
    $('#avatar5').on('click',function(){
       $('#insurances2').click();           
    });
});


  function readURL6(input) 
{
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#avatar6')
                .attr('src', e.target.result)

            $("#avatar6").css("width", 180);
			$("#avatar6").css("height", 200);
        };
        reader.readAsDataURL(input.files[0]);
    }
}

$(function(){      
    $('#puc2').change(function(){         
       readURL6(this);         
    }); 
    $('#avatar6').on('click',function(){
       $('#puc2').click();           
    });
});


  function readURL7(input) 
{
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#avatar7')
                .attr('src', e.target.result)

            $("#avatar7").css("width", 180);
			$("#avatar7").css("height", 200);
        };
        reader.readAsDataURL(input.files[0]);
    }
}

$(function(){      
    $('#tax1').change(function(){         
       readURL7(this);         
    }); 
    $('#avatar7').on('click',function(){
       $('#tax1').click();           
    });
});


  function readURL8(input) 
{
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#avatar8')
                .attr('src', e.target.result)

            $("#avatar8").css("width", 180);
			$("#avatar8").css("height", 200);
        };
        reader.readAsDataURL(input.files[0]);
    }
}

$(function(){      
    $('#tax2').change(function(){         
       readURL8(this);         
    }); 
    $('#avatar8').on('click',function(){
       $('#tax2').click();           
    });
});


 
</script>
<script>
function val()
{
num=document.getElementById("vno").value;

expr="^[A-Za-z]{2}([ \-])[0-9]{2}[ ,][A-Za-z]{2}([ \-])[0-9]{4}$";
r=new RegExp(expr);
b=r.test(num);
if(b){
	//alert("valid");
}

else{
alert("In-valid");

$("#vno").val("");
$("#vno").focus();
}
}
function editval()
{
num=document.getElementById("editvno").value;

expr="^[A-Za-z]{2}([ \-])[0-9]{2}[ ,][A-Za-z]{2}([ \-])[0-9]{4}$";
r=new RegExp(expr);
b=r.test(num);
if(b){
  //alert("valid");
}

else{
alert("In-valid");

$("#editvno").val("");
$("#editvno").focus();
}
}
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