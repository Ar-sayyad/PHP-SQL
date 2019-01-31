<?php include('header.php');?>

<div id="page-wrapper" class="container">
<div class="row">

<?php include('navigation.php');?>

<div class="row">
<div class="col-lg-12">
<div class="main-box clearfix">
<header class="main-box-header clearfix">
<?php if ($this->session->flashdata('msg')){?>
    <div id="mssg" style="margin-bottom:0px;margin-top:5px;color: green;text-align: center;background-color: #fff; width: 75%;margin-left: 100px;padding: 7px; border: 1px solid green;border-radius: 2px;">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
            <i class="fa fa-times-circle fa-fw fa-lg" style="color:green"></i>
        </button><?php echo $this->session->flashdata('msg'); ?>
    </div>  
<?php $this->session->set_flashdata('msg', '');}?>
<br>
<div class="form-group form-group-select2"> 

<div style="float:left;margin-right:20px">
<select  name="executed_testCases" id="execution_test_id" style="width:300px" class="form-control" id="sel2">
<option value="">---Select Execution Name---</option>
<?php foreach ($execute_info as $row1) { ?>
<option value="<?php echo $row1['email_log_id'];?>"><?php echo $row1['runname'];?></option>
<?php } ?>  
</select>
</div>
<div style="float:left">
<button class="btn btn-info" onclick="show_test_case(0,1);" id="showid">Show</button>&nbsp;&nbsp;
<!--<button class="btn btn-danger dropdown-toggle" type="reset">Reset</button>-->
</div>

</div>
</header>

<div class="main-box-body clearfix">

<div class="table-responsive">
	 <div id="executionReport"></div>
</div>

<div class="table-responsive" id="displayNoneMain" style="display:block">
<table id="table-example" class="table table-hover">
<thead>
<tr>
<th>Sr.No.</th>
<th>Run Name</th>
<th>Executed By</th>
<th>Execution Time</th> 
<th>View</th> 
</tr>
</thead>
<tbody>
<?php $sr=1; foreach ($email_log_info as $row) { ?>  
<tr>
<td><?php echo $sr;?></td>
<td><?php echo $row['runname'];?></td>
<td><?php echo $row['email'];?></td>
<td><?php echo $row['execution_time'];?></td> 
<td>
	<!--<button onclick="show_test_case('<?php echo $row["runname"]; ?>',1)" type="button" class="btn btn-info">View</button>-->
	<button style="cursor:pointer" onclick="showAjaxModal('<?php echo base_url();?>index.php/modal/popup/showTestReports/<?php echo $row['email_log_id'];?>');"  class="btn btn-info">
			View
	</button>
	
</td> 
</tr>
<?php $sr++; } ?>
</tbody>
</table>

</div>
</div>
</div>
</div>
</div>
 
</div>
</div>





<?php //include('skin.php');?>

<!----footer-min start********-->

<?php include('footer-min.php');?>


<script>
	$(document).ready(function() {
		$('#sel2').select2();
		$("#searchtable").hide();
		$("#showid").click(function(){
			$("#searchtable").show();
			$('#table-example').hide();
			$("#table-example_wrapper").hide();
			$(".DTTT").hide();
		});
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
	
	function  show_test_case(no, one){		
		if(no=="0"){
			$execution_id= $("#execution_test_id").val();
			
		}else{
			$execution_id= no;
		}
		if($execution_id !=''){
			showAjaxModal('<?php echo base_url();?>index.php/modal/popup/showTestReports/'+$execution_id);
		/*$.post('<?php echo base_url();?>index.php/testapp/show_execution', { execution_id: $execution_id }, function(data){
			//alert(data);
                            if(data)
                                         {
                                                 $('#executionReport').css("display","block");
                                                 $('#executionReport').html(data);
                                                 $("#displayNoneMain").css("display","none");
                                                // alert(data);
                                         }		           

                         }).fail(function() {

                             alert( "Posting failed." );

                         });*/
                    }
                    else{
                        alert("Please Select Execution Name");
                    }
            }
	
	function reset_test_case(no){
		$('#executionReport').css("display","none");
		$("#displayNoneMain").css("display","block");
		
	}
	</script>
