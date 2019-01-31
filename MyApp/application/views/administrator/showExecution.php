<?php include('header.php');?>
<style>
    #uploadFile{        
    border: 1px solid #ccc;
    border-radius: 5px;
    padding: 30px;
    background-color: #eee;
}
</style>
<div id="page-wrapper" class="container">
<div class="row">

<?php include('navigation.php');?>

<div class="row">
<div class="col-lg-12">
<div class="main-box clearfix">
<header class="main-box-header clearfix">
 &nbsp;
  <?php if ($this->session->flashdata('msg')){?>
     <div id="mssg" style="margin-bottom:0px;margin-top:5px;color: green;text-align: center;background-color: #fff; width: 75%;margin-left: 100px;padding: 7px; border: 1px solid green;border-radius: 2px;">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
            <i class="fa fa-times-circle fa-fw fa-lg" style="color:green"></i>
        </button><?php echo $this->session->flashdata('msg'); ?>
    </div>  
<?php $this->session->set_flashdata('msg', '');}?>
 
    <?php if ($this->session->flashdata('err_msg')){?>
  <div id="mssg" style="margin-bottom:0px;margin-top:5px;color: RED;text-align: center;background-color: #fff; width: 75%;margin-left: 100px;padding: 7px; border: 1px solid red;border-radius: 2px;">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
            <i class="fa fa-times-circle fa-fw fa-lg" style="color:RED"></i>
        </button><?php echo$this->session->flashdata('err_msg'); ?>
    </div> 
<?php $this->session->set_flashdata('err_msg', '');}?> 
  
 
</header>

<div class="main-box-body clearfix">
<div class="row">
    <form role="form" method="post" action="<?php echo base_url();?>index.php/TestApp/startExecution/Administrator">
        <div class="col-md-6">
            <div class="form-group">
            <label for="exampleInputEmail1">Execution Name</label> <span style="color:red">*</span>
            <input type="text" class="form-control" id="exampleInputEmail1" name="execution_name"  required value="<?php echo $this->session->userdata('name').date("Y_m_d-h_i_s");;?>" placeholder="Enter Execution Name">
            </div>

            <div class="form-group">
            <label for="exampleTextarea">Select Environment</label> <span style="color:red">*</span>
            <select class="form-control" name="environment_id" id="environment_id"  required onchange="show_url_datashow_url_data(this.value)">
            <option value="">---Select Environment---</option>
            <?php foreach ($environment_info as $row) { ?>   
            <option value="<?php echo $row['environment_id'];?>" data-id="<?php echo $row['environment_name'];?>"><?php echo $row['environment_name'];?></option>
            <?php } ?>
            </select>
            </div>

            <div class="form-group">
            <label for="exampleTextarea">Select Browser</label> <span style="color:red">*</span>
            <select name="browser_id" class="form-control" required>
            <option value="">---Select Browser---</option>
            <?php foreach ($browser_info as $row1) { ?>   
            <option value="<?php echo $row1['browser_id'];?>"><?php echo $row1['browser_name'];?></option>
            <?php } ?>
            </select>
            </div>
            <input type="hidden" name="failure_attempt" value="1"/>
           <!-- <div class="form-group">
            <label for="exampleInputEmail1">No of Failure Attempt</label> 
                    <select name="failure_attempt" id="failure_attempt"  required  class="form-control" >
                    <option value=""> Please select Failure Attempt </option>
                    <option value="1"> 1 </option>
                    <option value="2"> 2 </option>
                    <option value="3"> 3</option>
                    <option value="4"> 4 </option>
                    <option value="5">5</option>
                    </select> 
            </div>-->

            <div class="form-group">
            <label for="exampleInputEmail1">Select Test Cases</label> <span style="color:red">*</span>
            <div class="panel-group accordion" id="accordion">
            <?php  $no_of_category= $this->administrator_model->get_testcases_count();
             $no_of_category= count($no_of_category);
            ?>
                    <input type="hidden" name="no_of_category" id="no_of_category"  value="<?php echo $no_of_category;?>" >
            <?php $ta=1; foreach ($application_info as $apps) { ?>  

            <div class="panel panel-default">

            <!--<input type="checkbox" style="float: left;margin: 10px;overflow: hidden;width: 20px;height: 17px;" />-->
            <div class="panel-heading">

            <h4 class="panel-title">

            <input type="checkbox" style="float: left;width: 17px;height:15px" value="<?php echo $apps['application_id']; ?>" class="selectcheck select_all<?php echo $apps['application_id']; ?>" 
            onClick="new_call_onselect(<?php echo $apps['application_id']; ?>)" data-id="<?php echo $apps['application_id']; ?>" name="select_all_<?php echo $apps['application_id']; ?>">
             <input  type="hidden" name="category_check<?php echo $ta; ?>" value="<?php echo $apps['application_id']; ?>">
                    <input  type="hidden" name="category_check_name<?php echo $ta; ?>" value="<?php echo $apps['application_name']; ?>">

            <a class="accordion-toggle collapsed" style="margin-left:25px" data-toggle="collapse"  href="#collapseOne<?php echo $apps['application_id'];?>">
            <?php echo $apps['application_name'];?> 
            <span  class="value_show<?php echo $ta;?>" value="<?php echo $apps['application_id']; ?>"></span>
            <input type="hidden" value="" id="value_show_text<?php echo $ta;?>" name="app_url<?php echo $ta;?>">

            </a>
            </h4>
            </div>
            <div id="collapseOne<?php echo $apps['application_id'];?>" class="panel-collapse collapse">
            <div class="panel-body">
            <div class="form-group">
            <?php   $appname= $this->administrator_model->get_testcases_application($apps['application_id']);
             $count= count($appname);
            ?>

            <input type="hidden" name="no_of_sub_category_category" id="no_of_sub_category_category"  value="<?php echo $count;?>" >
            <?php
            foreach ($appname as $test) { 
            ?>

            <!--<input type="checkbox" id="checkbox-<?php echo $test['testcase_id'];?>"/>
            <label for="checkbox-<?php echo $test['testcase_id'];?>">
            <?php echo $test['testcase_name'];?>
            </label>-->
            <p title="<?php echo $test['description'];?>"> 
			<input type="checkbox" class="checkes subSelection<?php echo $test['application_id']; ?>" name="sub_category<?php echo $test['application_id'];?>[]" data-id="<?php echo $test['testcase_id'];?>" 
			value="<?php echo $test['application_id'];?>___<?php echo $test['class_name'];?>___<?php echo $test['testcase_name'];?>"> <label> <?php echo $test['testcase_name'];?></label></p>
            <?php }?>

            </div>
            </div>
            </div>
            </div>
            <?php $ta++; } ?>

            </div> 
            </div>  
			<div class="form-group">
			 
			 <div class="col-md-12">
              <input type="checkbox" class="col-md-6"  id="get_group" style="float: left;width: 17px;height:16px;margin:3px">
			  
			 <label style="float: left;font-weight: bold; font-size: 13px;" class="col-md-6"> Create Logical Group</label>
			  </div>
			  <br>
			  <div class="col-md-12" id="show_group_content" style="display:none">
			  <input type="text" class="col-md-9 form-control" id="logical_group_name" style="float: left; width:70%;margin-bottom: 12px;margin-top:5px;border-color: #03a9f4;" placeholder="Enter Logical Group Name" >
			  <button type="button" id="submit_group" style="float: right;background-color:#1abc9c;margin-top: 5px;" class="col-md-3 btn btn-info">Create Group</button>			  
			  </div>
			  <span id="msg"></span>
            </div> 
			
            <div class="form-group">
               <input type="submit" id="submit_btn" disabled="disabled" class="btn btn-primary" name="Execution" value="Execution">
              <!--<button type="reset" class="btn btn-default">Reset</button>-->
            </div> 
        </div>
    </form>


<div class="col-md-6">
<h1>Download Test Case: </h1>
    <div id="uploadFile">
        <?php echo form_open_multipart('AdminUpload/do_upload');?>
        <!--<form role="form"  enctype="multipart/form-data" method="post" action="<?php echo base_url();?>index.php/TestApp/do_upload">-->
            <div class="form-group">
            <label for="exampleTextarea">Select Application</label>
            <select class="form-control" name="application_id" id="application_id" onchange="show_selected_app_test(this.value)">
            <option value="">---Select Application---</option>
            <?php foreach ($application_info as $row2) { ?>   
            <option value="<?php echo $row2['application_id'];?>"><?php echo $row2['application_name'];?></option>
            <?php } ?>
            </select>
            </div>
        
            <div class="form-group">
            <label for="exampleTextarea">Select Test Case</label>
            <div id="filetest">
            <select class="form-control" name="selectTestCase" id="selectTestCase"  onchange="show_TestCase_data(this.value)">
            <option value="">Select Test Case</option>
            </select>
            </div>
            </div>
            <div class="form-group">
            <!--<label for="exampleTextarea">Select File</label>
             <input type="file" name="userfile" size="20"  class="form-control">
			 <span id="filenameshow"></span>-->
            </div>
            <div class="form-group">
                <span id="filenameshow"></span>
            </div>
        </form>
      
    </div>
</div>
</div> 

</div>
</div>
</div>
</div>
 
</div>
</div>



<!----footer-min start********-->

<?php include('footer-min.php');?>
<script type="text/javascript">
     var elems = new Array();
      var Names = new Array();
    $('.checkes').change(function(){
   this.checked ? elems.push($(this).attr("data-id")) : elems.pop($(this).attr("data-id"));
   //alert(elems);
   if (elems.length == 0 && Names.length == 0) {
            $("#submit_btn").attr("disabled", "disabled");
     } else {
          $("#submit_btn").removeAttr("disabled");
     }
});


$(document).ready(function(){
	$(".my-link").removeAttr('href');
	
});

$("#get_group").click(function(){
		
		if ($(this).is(':checked')== true) {
			$("#msg").hide();
			$("#show_group_content").show();
    } else {
			$("#show_group_content").hide();
    }	
		
	});
	
	$("#submit_group").click(function(){
		$group_name = $("#logical_group_name").val();
		$environment_id = $("#environment_id").val();
		 $myCheckboxes = new Array();
        $(".checkes:checked").each(function() {
           $myCheckboxes.push($(this).attr('data-id'));
        });
		//alert($myCheckboxes);
		//alert($logical_group_name);
		$.post('<?php echo base_url();?>index.php/Administrator/createLogicalGroup', { group_name: $group_name,environment_id:$environment_id,testcase_id:$myCheckboxes}, function(data){
						  if(data==1)
							{
								//alert(data);
								$("#show_group_content").hide();
								$("#msg").html('<p id="mssg" style="margin-bottom:-10px;margin-top:5px;color: green;text-align: center;background-color: #f5f5f5; width: 80%;margin-left: 50px;padding: 7px; border: 1px solid #8bc34a;border-radius: 2px;"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times-circle fa-fw fa-lg" style="color:green"></i></button>Logical Group Created Successfully.</p>');
								$("#msg").show();
								$('#get_group').prop('checked', false);
								$("#logical_group_name").val('');
								//$("#msg").hide(5000);
			
							}
							else{
								$("#show_group_content").hide();
								$("#msg").html('<div id="mssg" style="margin-bottom:-10px;margin-top:5px;color: red;text-align: center;background-color: #fff; width: 80%;margin-left: 50px;padding: 4px; border: 1px solid red;border-radius: 2px;"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times-circle fa-fw fa-lg" style="color:red"></i></button>'+data+'</div>');
								$("#msg").show();
								$('#get_group').prop('checked', false);
								$("#logical_group_name").val('');
								//$("#msg").hide(5000);
								
							}
		});
	});
	
$('.selectcheck').click(function(){
	$id = $(this).attr("data-id");
	//alert($id);
	if ($(this).is(':checked')== true) {		
        $('.subSelection'+$id).prop('checked', true);
        Names.push($(this).attr("data-id"));
        
    } else {
        $('.subSelection'+$id).prop('checked', false);
         Names.pop($(this).attr("data-id"));
         elems=[];
    }
	 if (Names.length == 0 && elems.length==0) {
            $("#submit_btn").attr("disabled", "disabled");
     } else {
          $("#submit_btn").removeAttr("disabled");
     }
});


					 function show_url_datashow_url_data(value){
						 
						$(".value_show").html('('+value+')');
						$environment=value;
						$name=$("#environment_id").find('option:selected').attr('data-id');
                      	//alert($environment);
						//alert($name);
						$.post('<?php echo base_url();?>index.php/Administrator/check_environment', { environment: $environment }, function(data){
						
						   if(data)
							{
						 var exploade = data.split("_____");
							for(i=1;i < exploade.length;i++ ){
									var j= i+1;
									var title = $(".value_show"+i).attr( "value" );
									
									if(exploade[i]==""){
										$(".select_all"+title).attr("disabled", true);
										$(".subSelection"+title).attr("disabled", true);	
										var check_name_validation="No Url Added";
									}else{
										$(".select_all"+title).attr("disabled", false);
										$(".subSelection"+title).attr("disabled", false);	
										var check_name_validation="";
									}									
									
		$(".value_show"+i).html('(<b style="font-size:13px;">'+$name+'</b>:<span     style="font-size:11px;"> '+exploade[i]+ " "+check_name_validation+'</span> )');
		$("#value_show_text"+i).val(exploade[i]+ " "+check_name_validation);					 	
									}
							}	
						});
						
					 }
					 
			function show_selected_app_test(application_id){
				$application_id = application_id;
				//alert($application_id);
				$.post('<?php echo base_url();?>index.php/Administrator/check_testcase', { application_id: $application_id }, function(data){
					//alert(data);
					$("#filetest").html(data);
				});	
			}
			
			

	function show_TestCase_data(file_name){
		$selectTestCase=$("#selectTestCase").val();
				$application_id = $("#application_id").val();
				$.post('<?php echo base_url();?>index.php/AdminUpload/LoadFile/', { selectTestCase: $selectTestCase, application_id:$application_id }, function(data){
					if(data==0)
					{      
					    alert("File Not Found..!"); 
                                            $("#filenameshow").hide();
					}
				   else{
                                       var file_name= "<a href='"+data+"'><button type='button' class='btn btn-primary'><i class='fa fa-download'></i> Download</button></a>";
					   $("#filenameshow").html(file_name);
                                           $("#filenameshow").show();				                  
					  
                                        }
				
				});
		
		
	}
					 
					 </script>
					 
	