<?php 
		//$this->db->where('logical_group_id',$param2);		
		
		$logical_group_info = $this->db->get_where('logical_group',array('logical_group_id'=> $param2))->result_array();
		
		?>
		
<style type="text/css">
.modal-dialog {
    width: 70% !important;
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
<?php   foreach ($logical_group_info as $row) { ?> 

<div id="page-wrapper" class="container">
<div class="panel-heading">
                <div class="panel-title">
                    <h5><b>Group Name : <?php echo $row['logical_group_name'];?> </b></h5>
                </div>
            </div>

             <div class="panel-body">
			  
<div class="table-responsive">
<table id="table-example" class="table table-hover table-bordered table-stripped">

	<tbody>
	
		<tr>				
			<th>Sr.No.</th>
                        <th>Application</th>
                        <th>Test Cases</th>
		</tr>
		
				<?php $test_entries    = json_decode($row['testcase_id']);
					$sr=1; foreach ($test_entries as $test_id)
                        { ?>
					<tr> 	<td><?php echo $sr;?></td>
                                            <td><?php echo$this->test_model->get_test_application_name($test_id);?></td>
					<td><?php echo $this->test_model->get_test_case_name($test_id);?></td>
					</tr>
				<?php $sr++; } ?>
				
		
	
		<?php } ?>
		</tbody>
		</table>
		</div>


</div>
</div>




