<?php 
		$this->db->where('runner_id',$param2);		
		$this->db->order_by('ID','DESC');
		$exe_info = $this->db->get_where('tce_testcases_results')->result_array();
		
		?>
		
<style type="text/css">
.modal-dialog {
    width: 95% !important;
    height:600px;
	
	
}    .modal-body{
		
        padding-top: 0px;
    }
.panel-body,.panel-heading {
       padding-top: 0px !important;
}
.panel-body{
    padding: 10px;
    padding-bottom: 0px;
}

</style>

<div id="page-wrapper" class="container">
<div class="panel-heading">
                <div class="panel-title">
                    <h5><b>Test Case Result</b></h5>
                </div>
            </div>

             <div class="panel-body">


<div class="main-box-body clearfix">
<div class="table-responsive">
<table id="table-example" class="table table-hover">
<thead>
			<tr>
				<th>Sr.No.</th>
				<th>Run Name</th>
				<th>Test Name</th>
				<th>Result</th>
				<th>Elapse Time</th>
				<th>Execution Time</th> 
			</tr>
		</thead>
		<tbody>
		<?php  
		
		$sr=1; foreach ($exe_info as $row) { ?>  
		<tr>
		<td><?php echo $sr;?></td>
		<td><?php echo $row['RUNNAME'];?></td>
		<td><?php echo $row['TESTCASENAME'];?></td>
		<?php if($row["RESULT"]=='Passed'){ ?>
		<td style="color:green"><b><?php echo $row["RESULT"];?></b></td>
			<?php	}else{ ?>
		<td style="color:red"><b style="cursor:pointer" onclick="showTestImage('<?php echo base_url();?>index.php/modal/popup/showimage/<?php echo $row['COMPANY'];?>/<?php echo $row['RUNNAME'];?>/<?php echo $row['TESTCASENAME'];?>');">
		<?php echo $row["RESULT"];?></b></td>
			<?php	} ?>
		<td><?php echo $row['ELAPSETIME'];?></td> 
		<td><?php echo $row['EXECUTIONDATE'];?></td> 
		</tr>
		<?php $sr++; } ?>
		</tbody>
		</table>
</div>
</div>
</div>
</div>




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
		var table = $('.table-example').dataTable({
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