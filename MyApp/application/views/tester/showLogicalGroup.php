<?php include('header.php');?>

<div id="page-wrapper" class="container">
<div class="row">

<?php include('navigation.php');?>

<div class="row">
<div class="col-lg-12">
<div class="main-box clearfix">
<header class="main-box-header clearfix" style="min-height: 20px;">
<?php if ($this->session->flashdata('msg')){?>
    <div id="mssg" style="margin-bottom:0px;margin-top:5px;color: green;text-align: center;background-color: #fff; width: 75%;margin-left: 100px;padding: 7px; border: 1px solid green;border-radius: 2px;">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
            <i class="fa fa-times-circle fa-fw fa-lg" style="color:green"></i>
        </button><?php echo $this->session->flashdata('msg'); ?>
    </div> 
<?php $this->session->set_flashdata('msg', '');}?>
    <div id="msg" style="display:none"></div>
   
</header>
<form method="post" action="<?php echo base_url();?>index.php/TestApp/startGroupExecution/Tester">           
<div class="main-box-body clearfix">
    <div class="row">
        <div class="col-lg-6" style="background-color: #eee;padding: 10px;border: 1px solid #ccc;">
            <div class="col-lg-6">
           <input type="text" class="form-control"  id="execution_name" name="execution_name"  required value="" placeholder="Execution Name (Required)">
           </div> 
            <div class="col-lg-6">
               <select name="browser_id" class="form-control"  required>
                <option value="">---Select Browser (Required)---</option>
                <?php foreach ($browser_info as $row1) { ?>   
                <option value="<?php echo $row1['browser_id'];?>"><?php echo $row1['browser_name'];?></option>
               <?php } ?>
               </select>
            </div> 
        </div>
		<div class="col-lg-8" style="margin-top: 7px;">
			 <div class="col-lg-5">
				<select  name="logical_group" id="logical_group_id"  class="form-control" id="sel2">
				<option value="">---Select Logical Group Name---</option>
				<?php foreach ($logical_group_info as $row1) { ?>
				<option value="<?php echo $row1['logical_group_id'];?>"><?php echo $row1['logical_group_name'];?></option>
				<?php } ?>  
				</select>
			</div>
			 <div class="col-lg-3">
				<span class="btn btn-info" style="cursor:pointer" onclick="show_test_case(0,1);" id="showid">View Group</span>
			</div>
		</div>	
    </div>

<div class="table-responsive" id="displayNoneMain"  style="display:block">
<table id="table-example" class="table table-hover">
   
        <thead>
            <tr>
            <th style="width: 125px;">Select</th>
            <th>Group Name</th>
            <th>Environment</th>
            <th>Created By</th>	  
            <th>Actions</th> 
	
            </tr>
            </thead>
            <tbody>
            <?php $sr=1; foreach ($logical_group_info as $row) { ?>  
            <tr>
                <td><input type="checkbox" name="logical_group_id[]" value="<?php echo $row['logical_group_id'];?>" style="margin-left:  10px;width: 16px;height: 16px;"></td>
            
            <td><span class="grp_name<?php echo $sr;?>"><?php echo $row['logical_group_name'];?></span>
			<?php $test_entries    = json_decode($row['testcase_id']);
					$test="[";
					 foreach ($test_entries as $test_id){
						$test.=$test_id;
						$test.=",";
					}
					$test = rtrim($test,',');
					$test.="]";	
					?>			
			<div class="grp_edit<?php echo $sr;?>" style="display:none">
			<input type="hidden" class="test<?php echo $sr;?>" value="<?php print_r($test);?>"/>
			<input class="form-control group_name<?php echo $sr;?>" type="text" value="<?php echo $row['logical_group_name'];?>" name="logical_group_name"></div>
			</td>
			
			
                        <td><span class="env_name<?php echo $sr;?>"><?php echo $env_name= $this->test_model->get_env_url($row['environment_id']);?></span>
                <div class="env_edit<?php echo $sr;?>" style="display:none">
                    <select class="form-control" name="environment_id<?php echo $sr;?>" id="environment_id<?php echo $sr;?>"  required onchange="show_url_datashow_url_data(this.value)">
                        <option value="" disabled="">---Select Environment---</option>
            <?php foreach ($environment_info as $row1) { ?>   
            <option value="<?php echo $row1['environment_id'];?>" <?php if($row['environment_id']==$row1['environment_id']){echo "selected";}else{}?> data-id="<?php echo $row1['environment_name'];?>"><?php echo $row1['environment_name'];?></option>
            <?php } ?>
            </select>
                </div>
            </td>
            <td><?php echo $row['created_by_name'];?></td> 
	
			
            <td>             	
			<a style="cursor:pointer" title="View Group" onclick="showAjaxModal('<?php echo base_url();?>index.php/modal/popup/viewLogicalGroup/<?php echo $row['logical_group_id'];?>');"  class="table-link info">
				<span class="fa-stack">
					<i class="fa fa-square fa-stack-2x"></i>
					<i class="fa fa-eye fa-stack-1x fa-inverse" style="background-color:#2980b9;border-radius:3px"></i>
					</span>
			</a>
			<a style="cursor:pointer" title="Clone Group" class="table-link clone<?php echo $sr;?>" onclick="showClone(<?php echo $sr;?>,<?php echo $row['logical_group_id'];?>);" >
				<span class="fa-stack">
					<i class="fa fa-square fa-stack-2x"></i>
					<i class="fa fa-clone fa-stack-1x fa-inverse" style="background-color:#ffa000;border-radius:3px"></i>
					</span>
			</a>
			<a style="cursor:pointer;display:none" title="Save Group" class="table-link save<?php echo $sr;?>" onclick="saveClone(<?php echo $sr;?>,<?php echo $row['logical_group_id'];?>,<?php echo $row['environment_id'];?>);" >
				<span class="fa-stack">
					<i class="fa fa-square fa-stack-2x"></i>
					<i class="fa fa-save fa-stack-1x fa-inverse" style="background-color:#3c763d;border-radius:3px"></i>
					</span>
					
			</a>
			<a style="cursor:pointer;display:none" class="reset<?php echo $sr;?>"  title="Reset" onclick="reset(<?php echo $sr;?>);"><i class="fa fa-undo" aria-hidden="true"></i></a>
			
			
			<a  style="cursor:pointer" title="Delete Group" href="<?php echo base_url(); ?>index.php/Tester/LogicalGroup/delete/<?php echo $row['logical_group_id'];?>" class="table-link danger">
				<span class="fa-stack" onclick="return checkDelete();">
					<i class="fa fa-square fa-stack-2x"></i>
					<i class="fa fa-trash-o fa-stack-1x fa-inverse" style="background-color:#ff0000;border-radius:3px"></i>
				</span>
			</a>

            </td> 

            </tr>
            <?php $sr++; } ?>
            <tr><td> <input type="submit" value="Execution" onclick="" class="btn btn-primary"></td>
                <td><input type="reset" value="Reset" class="btn"></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                
            </tr>
            </tbody>
           
   
</table>

</div>
</div>
</form>    
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
	
	function showClone(sr){
		$(".grp_name"+sr).hide();
		$(".clone"+sr).hide();
                $(".env_name"+sr).hide();
		$(".grp_edit"+sr).show();
                $(".env_edit"+sr).show();
		$(".save"+sr).show();
		$(".reset"+sr).show();
		//alert(id);
		
	}
	function reset(sr){
		$(".grp_name"+sr).show();
		$(".clone"+sr).show();
                $(".env_name"+sr).show();
		$(".grp_edit"+sr).hide();
                $(".env_edit"+sr).hide();
		$(".save"+sr).hide();
		$(".reset"+sr).hide();
	}
	function saveClone(sr,lg_id,env_id){
		$group_name= $(".group_name"+sr).val();
		$environment_id = $("#environment_id"+sr).val();
		 $myCheckboxes = new Array();
		$myCheckboxes=$(".test"+sr).val();	
			//alert($environment_id);
		$.post('<?php echo base_url();?>index.php/TestApp/createCloneGroup', { group_name: $group_name,environment_id:$environment_id,testcase_id:$myCheckboxes}, function(data){
						  if(data==1)
							{
								window.location.reload();
			
							}
							else{
								$("#msg").html('<div id="mssg" style="margin-bottom:0px;margin-top:5px;color: red;text-align: center;background-color: #fff; width: 75%;margin-left: 100px;padding: 4px; border: 1px solid red;border-radius: 2px;"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times-circle fa-fw fa-lg" style="color:red"></i></button>'+data+'</div>');
								$("#msg").show();								
								
							}
		});
		
	}
	function  show_test_case(no, one){		
		if(no=="0"){
			$logical_group_id= $("#logical_group_id").val();
			
		}else{
			$logical_group_id= no;
		}
		if($logical_group_id !=''){
			showAjaxModal('<?php echo base_url();?>index.php/modal/popup/viewLogicalGroup/'+$logical_group_id);
		
                    }
                    else{
                        alert("Select Logical Group Name");
                    }
                }
	
	function reset_test_case(no){
		$('#executionReport').css("display","none");
		$("#displayNoneMain").css("display","block");
		
	}
	</script>
