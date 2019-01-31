<?php 
		$this->db->where('runner_id',$param2);		
		$this->db->order_by('ID','DESC');
		$exe_info = $this->db->get_where('tce_testcases_results')->result_array();
		
		?>

  
  
	
<div class="modal fade" id="showImage" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
      
        <div class="modal-body">
        
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
		<image src="images/login-bg.jpg" width="100%">
  </div>
  
</div>

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
			<?php	}else{
					//$imgpath="F:/SeleniumAutomation_V1/ScreenShots/".$this->session->userdata('name')."/".$row['RUNNAME']."/".$row['TESTCASENAME'].".png";?>
		<td style="color:red">
		<b style="cursor:pointer" onclick="showTestImage('<?php echo base_url();?>index.php/modal/popup/showimage/<?php echo $row['COMPANY'];?>/<?php echo $row['RUNNAME'];?>/<?php echo $row['TESTCASENAME'];?>');">
		<?php echo $row["RESULT"];?></b>
		
		</td>
		
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




