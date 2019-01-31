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
  <div class="col-md-7">
    <div id="uploadFile">
        <?php echo form_open_multipart('AdminUpload/do_upload');?>
        <!--<form role="form"  enctype="multipart/form-data" method="post" action="<?php echo base_url();?>index.php/TestApp/do_upload">-->
            <div class="form-group">
            <label for="exampleTextarea">Select Application</label><span style="color:red">*</span>
            <select class="form-control" required="" name="application_id" id="application_id" onchange="show_selected_app_test(this.value)">
            <option value="">---Select Application---</option>
            <?php foreach ($application_info as $row2) { ?>   
            <option value="<?php echo $row2['application_id'];?>"><?php echo $row2['application_name'];?></option>
            <?php } ?>
            </select>
            </div>
        
            <div class="form-group">
            <label for="exampleTextarea">Select Test Case</label><span style="color:red">*</span>
            <div id="filetest">
                <select class="form-control" required="" name="selectTestCase" id="selectTestCase"  onchange="show_TestCase_data(this.value)">
            <option value="">Select Test Case</option>
            </select>
            </div>
            </div>
            <div class="form-group">
            <label for="exampleTextarea">Select File (Allowed Type: xls/xlsx/csv)</label><span style="color:red">*</span>
            <input type="file" required="" name="userfile" size="20"  class="form-control">
			<span id="filenameshow"></span>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary"><i class="fa fa-upload"></i> Upload</button>
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
$(document).ready(function(){
	$(".my-link").removeAttr('href');
	
});
$('.selectcheck').click(function(){
	$id = $(this).attr("data-id");
	//alert($id);
	if ($(this).is(':checked')== true) {
		
        $('.subSelection'+$id).prop('checked', true);
    } else {
        $('.subSelection'+$id).prop('checked', false);
    }
	
});
/*$('.selectcheck').change(function() {
	//$name = $(this).data("data-id");
				//= $(this).attr('name');//subSelection<?php echo $test['application_id']; ?>
		alert("hii");
   /* 
});*/

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
				$.post('<?php echo base_url();?>index.php/Administrator/check_testcase_data', { application_id: $application_id }, function(data){
					//alert(data);
					$("#filetest").html(data);
                                         $("#filenameshow").hide();
				});	
			}
			
			

	function show_TestCase_data(file_name){
		 $selectTestCase=$("#selectTestCase").val();
				$application_id = $("#application_id").val();
				$.post('<?php echo base_url();?>index.php/AdminUpload/LoadFile/', { selectTestCase: $selectTestCase, application_id:$application_id }, function(data){
					if(data)
					{      
					   var file_name= "<a href='"+data+"'>(Download File)</a>";
					   $("#filenameshow").html(file_name);
                                            $("#filenameshow").show();
					}
				   else{
					   alert("File Empty");                 
					   
				   }
				});
		
	}
					 
					 </script>
					 
	