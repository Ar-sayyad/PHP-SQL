<?php 
$nagrik_info = $this->db->get_where('nagrik')->result_array();
$building_type_info = $this->db->get_where('building_type')->result_array();
$nagrik_malmatta_info = $this->db->get_where('nagrik_malmatta', array('nagrik_malmatta_id' => $param2))->result_array();

$grampanchayat_id        = $this->session->userdata('login_user_id');
$taluka_id = $this->db->get_where('grampanchayat' , array('grampanchayat_id' => $grampanchayat_id ))->row()->taluka_id;
$taluka = $this->db->get_where('taluka' , array('taluka_id' => $taluka_id ))->row()->name;

$district_id = $this->db->get_where('taluka' , array('taluka_id' => $taluka_id ))->row()->district_id;
$district = $this->db->get_where('district' , array('district_id' => $district_id ))->row()->name;

$department_id = $this->db->get_where('district' , array('district_id' => $district_id ))->row()->department_id;      
$department = $this->db->get_where('department' , array('department_id' => $department_id ))->row()->name;

$region_id = $this->db->get_where('grampanchayat' , array('grampanchayat_id' => $grampanchayat_id ))->row()->region_id;
$region = $this->db->get_where('region' , array('region_id' => $region_id ))->row()->name;

$land_prat_type_info=$this->db->get_where('land_prat_type')->result_array();

$building_type_info = $this->db->get_where('building_type')->result_array();
$this->db->where('grampanchayat_id',$grampanchayat_id);
$rates_info = $this->db->get('gram_varshik_rate')->result_array();
				 
$bharank_info = $this->db->get_where('bharank')->result_array();
foreach ($nagrik_malmatta_info as $row) {
?>
<style type="text/css">
.modal-dialog {
    width: 750px !important;
    padding-top: 30px;
    padding-bottom: 30px;
}
</style>
<div class="row">
    <div class="col-md-12">

        <div class="panel panel-primary" data-collapsed="0">

            <div class="panel-heading">
                <div class="panel-title">
                    <h3><center>मालमत्ता माहिती बदल</center></h3>
                </div>
            </div>

            <div class="panel-body">

              <form role="form" class="form-horizontal form-groups-bordered" action="<?php echo base_url(); ?>index.php?grampanchayat/malmatta/update/<?php echo $row['nagrik_malmatta_id'];?>" method="post" enctype="multipart/form-data">
					
					
                   <div class="form-group">
                        <label for="field-ta" class="col-sm-3 control-label"><?php echo get_phrase('नागरिक निवडा'); ?> <span style="color:red">*</span></label>

                        <div class="col-sm-8">
                            <select name="nagrik_id" required="" class="form-control">
                                
                                <?php foreach ($nagrik_info as $row1) { ?>
								<?php if($row['nagrik_id']==$row1['nagrik_id']){?>
                                    <option value="<?php echo $row1['nagrik_id'];?>" selected><?php echo $row1['name']; ?></option>
                                <?php }
								} ?>
                            </select>
                        </div>
                    </div>
                <div class="form-group">
                       			<label for="field-1" class="col-sm-3 control-label">आर्थिक वर्ष<span style="color:red">*</span></label>
			                        	<div class="col-sm-8">
				                            <select name="year" required id = "dis_left_cyl" class="form-control">
				                            >
											<option value="" disabled>आर्थिक वर्ष निवडा</option>	
				                          <?php $p=strtotime("-1 Year"); $n=strtotime("+1 Year");?>
				      		 <option value="<?php echo date('Y',$p).'-'.date('y');?>" <?php if($row['year']==date('Y',$p).'-'.date('y')) echo'selected';?>><?php echo date('Y',$p).'-'.date('y');?></option>
				      		 <option value="<?php echo date('Y').'-'.date('y',$n);?>" <?php if($row['year']==date('Y').'-'.date('y',$n)	) echo'selected';?>><?php echo date('Y').'-'.date('y',$n);?></option>
			                           
			                           </select>
			                           
			                       </div>
                    </div>
				
                  
						    <div class="form-group">
                        
						<label for="field-1" class="col-sm-3 control-label">रस्त्याचे नाव <span style="color:red">*</span></label>

                        <div class="col-sm-8">
                            <input type="text" name="rastyache_nav" required="" value="<?php echo $row['rastyache_nav']; ?>" class="form-control" id="field-1" >
                        </div>
                    </div>
					
						                     <div class="form-group">
                        
						<label for="field-1" class="col-sm-3 control-label">सिटी सर्व्हे नंबर <span style="color:red">*</span></label>

                        <div class="col-sm-8">
                            <input type="text" name="city_surve_no" value="<?php echo $row['city_surve_no']; ?>" required="" class="form-control" id="field-1" >
                        </div>
                    </div>
					
							                     <div class="form-group">
                        
						<label for="field-1" class="col-sm-3 control-label">गट नंबर <span style="color:red">*</span></label>

                        <div class="col-sm-8">
                            <input type="text" name="gat_no" value="<?php echo $row['gat_no']; ?>" required="" class="form-control" id="field-1" >
                        </div>
                    </div>
					
									                     <div class="form-group">
                        
						<label for="field-1" class="col-sm-3 control-label">मिळकत क्रमांक<span style="color:red">*</span></label>

                        <div class="col-sm-4">
                            <input type="text" name="milkat_no" value="<?php echo $row['milkat_no']; ?>" required="" placeholder="मेन मिळकत क्रमांक" class="form-control" id="field-1" >
                        
                        </div>
						<div class="col-sm-4">
                            <input type="text" name="sub_milkat_no" value="<?php echo $row['sub_milkat_no']; ?>" placeholder="उप-मिळकत क्रमांक (असेल तरच)" class="form-control" id="field-1" >
                        </div>
                    </div>
					
									                    
					
									                     <div class="form-group">
                        
						<label for="field-1" class="col-sm-3 control-label">भोगवटदाराचे नाव <span style="color:red">*</span></label>

                        <div class="col-sm-8">
                            <input type="text" name="bogwatdar_name" value="<?php echo $row['bogwatdar_name']; ?>" required="" class="form-control" id="field-1" >
                        </div>
                    </div>

						<div class="form-group">
                       			<label for="field-1" class="col-sm-3 control-label">मिळकतीचा प्रकार <span style="color:red">*</span></label>
			                        	<div class="col-sm-8">
				                            <select  name="milkat_prakar" id = "dis_left_cyl" class="form-control">
				                               <option value="इमारत" <?php if($row['year']=='इमारत') echo'selected';?>>इमारत </option>
												<option value="खुली जमीन" <?php if($row['year']=='खुली जमीन') echo'selected';?>>खुली जमीन</option>
												<option value="पवनचक्की / मनोरा" <?php if($row['year']=='पवनचक्की / मनोरा') echo'selected';?>>पवनचक्की / मनोरा </option>
													
												
				                            </select>
			                           
			                       </div>
                    </div>
					
					
					
					
									                     <div class="form-group">
                        
						<label for="field-1" class="col-sm-3 control-label">बांधकामाचे वर्ष<span style="color:red">*</span></label>

                        <div class="col-sm-8">
                            <input type="text" name="built_year" id="built_year" value="<?php echo $row['built_year']; ?>" required="" class="form-control" id="field-1" >
                        </div>
                    </div>
					
					 <div class="form-group">
                       			<label for="field-1" class="col-sm-3 control-label">घसारा दर निवडा <span style="color:red">*</span></label>
			                        	<div class="col-sm-8">
				                            <select  name="deduction" id = "deduction" class="deduction form-control">
				                              <option value="">घसारा दर निवडा</option>
								 </select>
			                           
			                       </div>
                    </div>
					
								<div class="form-group">
                       			<label for="field-1" class="col-sm-3 control-label">इमारतीच्या बांधकामाचा प्रकार <span style="color:red">*</span></label>
			                        	<div class="col-sm-8">
							<select name="building_type_id" id="building_type" required="" class="form-control">
												<option value=""><?php echo get_phrase('इमारतीचा बांधकामाचा प्रकार निवडा'); ?></option>
												<?php foreach ($building_type_info as $row2) { ?>
													<option value="<?php echo $row2['building_type_id']; ?>" <?php if($row['building_type_id']== $row2['building_type_id']) echo'selected';?>><?php echo $row2['name']; ?></option>
												<?php } ?>
											</select>
			                           
			                       </div>
			                         </div>
									 
					<div class="form-group">
                       			<label for="field-1" class="col-sm-3 control-label">बांधकामाचे मूल्य दर <span style="color:red">*</span></label>
			                        	<div class="col-sm-8">
							<select name="rate" id="varshik_mulya_dar" required="" class="form-control">
								<option value=""><?php echo get_phrase('बांधकामाचे मूल्य दर निवडा'); ?></option>
								<?php foreach ($rates_info as $rows4) { ?>
								
					<option data-id="1" value="<?php echo $rows4['zopdi_rates'];?>" <?php if($row['building_type_id']== 1) echo'selected';?>>झोपडी किंवा मातीची इमारत (Rs.<?php echo $rows4['zopdi_rates'];?>)</option>
					
					<option data-id="2" value="<?php echo $rows4['dagad_vita_rates'];?>" <?php if($row['building_type_id']== 2) echo'selected';?>>दगड, किंवा विटा वापरलेली मातीची इमारत (Rs.<?php echo $rows4['dagad_vita_rates'];?>)</option>
					
					<option data-id="3" value="<?php echo $rows4['vita_chuna_rates'];?>" <?php if($row['building_type_id']== 3) echo'selected';?>>दगड, विटांची व चुना किंवा सिमेंट वापरून उभारलेली इमारत (Rs.<?php echo $rows4['vita_chuna_rates'];?>)</option>
					
					<option data-id="4" value="<?php echo $rows4['rcc_rates'];?>" <?php if($row['building_type_id']== 4) echo'selected';?>>आरसीसी पद्धतीची इमारत (Rs.<?php echo $rows4["rcc_rates"];?>)</option>
					
							<?php } ?>
				
							</select>
			                           
			                       </div>
                    </div>
                    
						
					
											                     <div class="form-group">
                        
						<label for="field-1" class="col-sm-3 control-label">इमारतीची लांबी<span style="color:red">*</span></label>

                        <div class="col-sm-8">
						
                            <input type="text" name="building_length" value="<?php echo $row['building_length']; ?>" required="" class="form-control" id="length">     
                        </div>
					
                    </div>
					
											                     <div class="form-group">
                        
						<label for="field-1" class="col-sm-3 control-label">इमारतीची रुंदी <span style="color:red">*</span></label>

                        <div class="col-sm-8">
                            <input type="text" name="building_breadth" value="<?php echo $row['building_breadth']; ?>" required="" class="form-control" id="breadth" >
                        </div>
                    </div>
					
											                     <div class="form-group">
                        
						<label for="field-1" class="col-sm-3 control-label">इमारतीचे क्षेत्रफळ (चौ मी)<span style="color:red">*</span></label>

                        <div class="col-sm-8">
                            <input type="text" name="building_area" readonly value="<?php echo $row['building_area']; ?>"  required="" class="form-control" id="area" >
                        </div>
                    </div>
					
					
							<div class="form-group">
                       			<label for="field-1" class="col-sm-3 control-label">इमारतीच्या वापराचा प्रकार <span style="color:red">*</span></label>
			                        	<div class="col-sm-8">
				                           <select name="building_use_type" required id = "bharank" class="form-control">
				                            	<option value="" disabled>इमारतीच्या वापराचा प्रकार निवडा</option>
								<?php foreach ($bharank_info as $row5) { ?>
									<option value="<?php echo $row5['bharank']; ?>" <?php if($row['building_use_type']==$row5['bharank']) echo'selected';?>><?php echo $row5['building_use']; ?></option>
								<?php } ?>
													
												
				                            </select>
			                           
			                       </div>
                    </div>
					
								<div class="form-group">
                        
						<label for="field-1" class="col-sm-3 control-label">इमारतीचे भांडवली मूल्य <span style="color:red">*</span></label>

                        <div class="col-sm-8">
                            <input type="text" name="building_rate_amt" id="bhandwali_mulya" value="<?php echo $row['building_rate_amt']; ?>" readonly  required="" class="form-control" id="field-1" >
                        </div>
                    </div>
					
												                     <div class="form-group">
																	 <label for="field-1" class="col-sm-3 control-label">कराचा दर भरा (पैसे) <span style="color:red">*</span></label>
							<div class="col-sm-8">
								
								<input type="text" name="building_tax_rate" required="" id="rates" value="<?php echo $row['building_tax_rate']; ?>" class="form-control" id="field-1" placeholder="इमारतीवरील कराचा दर भरा (पैसे) " >
							</div>
                    </div>
                        <div class="form-group">
						<label for="field-1" class="col-sm-3 control-label">जमीन वार्षिक मूल्यदर <span style="color:red">*</span></label>

                        <div class="col-sm-8">
                            <input type="text" name="land_year_rate" value="<?php echo $row['land_year_rate']; ?>" required="" class="form-control" id="field-1" >
                        </div>
                    </div>
					
												                     <div class="form-group">
                        
						<label for="field-1" class="col-sm-3 control-label">इमारतीचे भांडवली मूल्य <span style="color:red">*</span></label>

                        <div class="col-sm-8">
                            <input type="text" name="building_rate_amt" value="<?php echo $row['building_rate_amt']; ?>" required="" class="form-control" id="bhandwali_mulya" >
                        </div>
                    </div>
					
													                     <div class="form-group">
                        
						<label for="field-1" class="col-sm-3 control-label">इमारतीवरील कराचा दर <span style="color:red">*</span></label>

                        <div class="col-sm-8">
							<select name="building_tax_rate" required id = "rates" class="form-control">
						 <option value="" disabled>इमारतीवरील कराचा दर निवडा</option>
						 <option value="<?php echo $row['building_tax_rate']; ?>" selected><?php echo $row['building_tax_rate']; ?></option>
                            </select>
                           
                        </div>
                    </div>
					
															                     <div class="form-group">
                        
						<label for="field-1" class="col-sm-3 control-label">इमारतीचा कर <span style="color:red">*</span></label>

                        <div class="col-sm-8">
                            <input type="text" name="building_tax" value="<?php echo $row['building_tax']; ?>" required="" class="form-control" id="build_tax" placeholder="रुपये " >
                        </div>
                    </div>
					<div class="form-group">
							
							<label for="field-1" class="col-sm-3 control-label">आरोग्य कर </label>

							<div class="col-sm-8">
								<input type="checkbox" name="health_check" id="health_check" value="1" class=""  >
							</div>
					</div>
					
					<div id="h_tax" class="form-group">
						
							
							<label for="field-1" class="col-sm-3 control-label">आरोग्य कर (रुपयांमध्ये)<span style="color:red">*</span></label>

							<div class="col-sm-8">
								<input type="text" name="health_tax" id="health_tax_amt" value="<?php echo $row['health_tax']; ?>" readonly  class="form-control" >
							</div>
						
					</div>
					
					<div class="form-group">
							
							<label for="field-1" class="col-sm-3 control-label">वीज कर </label>

							<div class="col-sm-8">
								<input type="checkbox" name="light_check" id="light_check" value="1" class="" >
							</div>
					</div>
					
					<div id="li_tax" class="form-group">
						
							
							<label for="field-1" class="col-sm-3 control-label">वीज कर (रुपयांमध्ये)<span style="color:red">*</span></label>

							<div class="col-sm-8">
								<input type="text" name="light_tax" id="light_tax_amt" value="<?php echo $row['light_tax']; ?>" readonly  class="form-control" >
							</div>
						
					</div>
					<div class="form-group">
							
							<label for="field-1" class="col-sm-3 control-label">पाणीपट्टी </label>

							<div class="col-sm-8">
								<select  name="water_check" id = "water_check" class="form-control">
				                            <option value="">पाणीपट्टी प्रकार निवडा </option>
												<option value="1">पाणीपट्टी </option>
												<option value="2">स्पेशल पाणीपट्टी</option>
								</select>
							</div>
					</div>
					
					<div id="wt_tax" class="form-group">
						
							
							<label for="field-1" class="col-sm-3 control-label">पाणीपट्टी (रुपयांमध्ये)<span style="color:red">*</span></label>

							<div class="col-sm-8">
								<input type="text" name="water_tax" id="water_tax_amt" value="<?php echo $row['water_tax']; ?>" readonly  class="form-control" >
							</div>
						
					</div>
					
					
											                     <div class="form-group">
                        
						<label for="field-1" class="col-sm-3 control-label">मिळकतीचे वर्णन <span style="color:red">*</span></label>

                        <div class="col-sm-8">
                            <textarea name="milkat_description"  required="" class="form-control"  ><?php echo $row['milkat_description']; ?></textarea>
                        </div>
                    </div>
					<div class="form-group">
                        
						<label for="field-1" class="col-sm-3 control-label">शेरा / बोजा </label>

                        <div class="col-sm-8">
                            <textarea name="shera" value="<?php echo $row['shera']; ?>"  class="form-control" id="shera" ></textarea>
                        </div>
                    </div>
                    <div class="col-sm-3 control-label col-sm-offset-2">
                        <input type="submit" class="btn btn-success" value="बदल करा">
                    </div>
                </form>

            </div>

        </div>

    </div>
</div>
<?php } ?>
  <script>
$(document).ready(function(){
	$("#land_prat_type_div").hide();
	$("#h_tax").hide();
	$("#li_tax").hide();
	$("#wt_tax").hide();
	
	$('#health_check').click(function(){
		
		if($('#health_check').is(':checked')) {
		$length=$('#length').val();
		 $breadth=$('#breadth').val();
		 $area=$length*$breadth;
		  if($area > 0){
				 $.post('<?php echo base_url();?>index.php?grampanchayat/GethealthRates/', { keyword: $area}, function(data){
						if(data=='')
						{      
							alert("आरोग्य कराची माहिती भरलेले नाही.");
							$('#health_check').attr('checked', false);
								//$('#response').html(data);
						}
					   else{
						   $('#health_tax_amt').val(data);
						   $("#h_tax").show();
					   }
					});
				}
				else{
					alert("क्षेत्रफळ भरलेले नाही.");
					$('#health_check').attr('checked', false);
				}
		}
		else {
			$('#health_tax_amt').val('');
			$("#h_tax").hide();
		}
		
	});
	
	$('#light_check').click(function(){
		
		if($('#light_check').is(':checked')) {
		$length=$('#length').val();
		 $breadth=$('#breadth').val();
		 $area=$length*$breadth;
		 if($area > 0){
		 $.post('<?php echo base_url();?>index.php?grampanchayat/GetlightRates/', { keyword: $area}, function(data){
				if(data=='')
				{      
					alert("वीज कराची माहिती भरलेले नाही.");
					$('#light_check').attr('checked', false);
						//$('#response').html(data);
				}
			   else{
				   $('#light_tax_amt').val(data);
				   $("#li_tax").show();
			   }
			});
			}
				else{
					alert("क्षेत्रफळ भरलेले नाही.");
					$('#light_check').attr('checked', false);
				}
		}	else {
			 $('#light_tax_amt').val('');
			$("#li_tax").hide();
		}
		
	});
	
	$('#water_check').click(function(){
		$water_check=$('#water_check').val();
		if($water_check == 1 || $water_check == 2) {
		$water_check=$('#water_check').val();
		
		 $.post('<?php echo base_url();?>index.php?grampanchayat/GetwaterRates/', { keyword: $water_check }, function(data){
				if(data=='')
				{      
					alert("पाणीपट्टी माहिती भरलेले नाही.");
					$('#water_check').val('');
						//$('#response').html(data);
				}
			   else{
				   $('#water_tax_amt').val(data);
				   $("#wt_tax").show();
			   }
			});
		}	else {
			 $('#water_tax_amt').val('');
			$("#wt_tax").hide();
		}
		
	});
	
	
		$('#land_prat_type_id').change(function(){
		//alert('hello');
		$land_prat_type_id=$('#land_prat_type_id').val();
		 $.post('<?php echo base_url();?>index.php?grampanchayat/GetJaminRates/', { keyword: $land_prat_type_id}, function(data){
			  if(data=='')
		{      
                      alert("जमीनीचे वार्षिक दर भरलेले नाहीत.");
				//$('#response').html(data);
                               
		}
               else{
				   $('#land_varshik_rate_amt').val(data);
			   }
		 });
	});
	
	$('#deduction').change(function(){
		
		   $str=$(this).find('option:selected').attr('data-id');
		
        //alert($str);
           $.post('<?php echo base_url();?>index.php?grampanchayat/GetBuilding/', { keyword: $str}, function(data){
           //alert(data);
           if(data=='')
		{      
                      alert("something wrong.");
				//$('#response').html(data);
                               
		}
               else{
                       $('#building_type').html(data);
					    $str=$('#building_type').val();
					//alert('hello');
					   $.post('<?php echo base_url();?>index.php?grampanchayat/GetRates/', { keyword: $str}, function(data){
					  // alert(data);
					   if(data=='')
					{      
								  alert("something wrong.");
							//$('#response').html(data);
										   
					}
						   else{
								   $('#ratess').html(data);
						   }
					 });
               }
         });
    });
	
	$('#deduction').change(function(){
		$department_id=$('#department_id').val();
		$region_id=$('#region_id').val();
		$str=$(this).find('option:selected').attr('data-id');
		$bandkam_rate=$('#bandkam_rate').val();
								  //alert($bandkam_rate);
			if($bandkam_rate == undefined){
        //alert($str);
							   $.post('<?php echo base_url();?>index.php?grampanchayat/GetVarshik/', { keyword: $str, department_id : $department_id ,region_id : $region_id }, function(data){
							   //alert(data);
							   if(data=='')
							{      
										  alert("something wrong.");
									//$('#response').html(data);
												   
							}
								   else{
										   $('#varshik_mulya_dar').html(data);
										 
								   }
							 });
			}
			else{
						$.post('<?php echo base_url();?>index.php?grampanchayat/GetGramVarshik/', { keyword: $str }, function(data){
							   //alert(data);
							   if(data=='')
							{      
										  alert("something wrong.");
									//$('#response').html(data);
												   
							}
								   else{
										   $('#varshik_mulya_dar').html(data);
										 
								   }
							 });
				
			}
    });
	
     $('#length').change(function(){
		 $length=$('#length').val();
		 $breadth=$('#breadth').val();
		 $area1=$length*$breadth;
		 $area=($area1/10.76).toFixed(2);
		// $area =   parseFloat($area);
		 $('#area').val($area);
		 $('#milkat_description').val('बांधकाम:  लांबी - '+$length + ' फुट   *  रुंदी - '+ $breadth + ' फुट');
	 });
	  $('#breadth').change(function(){
		 $length=$('#length').val();
		 $breadth=$('#breadth').val();
		 $area1=$length*$breadth;
		 $area=($area1/10.76).toFixed(2);
		 //$area =   parseFloat($area);
		 $('#area').val($area);
		 $('#milkat_description').val('बांधकाम:  लांबी - '+$length + ' फुट   *  रुंदी - '+ $breadth + ' फुट');
	 });
	 $('#rates').change(function(){
		 $kiman=$('#kiman').val();
		 //	alert($kiman);
		 $kamal=$('#kamal').val();
		 $rates=$('#rates').val();
		 if($rates < parseInt($kiman)){
			 alert('कृपया कराचा दर व्यवस्थित भरा.');
			 $('#rates').val('');
			 $('#build_tax').val('');
		 }
		 else if($rates > parseInt($kamal)){
			alert('कृपया कराचा दर व्यवस्थित भरा.');
			 $('#rates').val('');
			  $('#build_tax').val('');
		 }
		 
	});
	 $('#built_year').change(function(){
	 	
	 	$built_year= $('#built_year').val();
	 	$currentYear = (new Date).getFullYear();
	 	$year=$currentYear-$built_year;
	 	//alert($year);
	 	 $.post('<?php echo base_url();?>index.php?grampanchayat/GetDeduction/', { keyword: $year}, function(data){
          // alert(data);
           	if(data=='')
		{      
                      alert("something wrong.");
				//$('#response').html(data);
                               
		}
               else{
                       $('#deduction').html(data);
                       //alert(data);
					   $('#bharank').val('');
					$('#bhandwali_mulya').val('');
				  $('#build_tax').val('');
				  $('#rates').val('');
               }
       		 
		});
	 });
	 
	  $('#bhandkam_mulya').change(function(){
	  $bhandkam_mulya= $('#bhandkam_mulya').val();
	  $grampanchayat_id=$('#grampanchayat_id').val();
	  //alert($bhandvali_mulya);
	  	if($bhandkam_mulya == 2){
			$("#land_prat_type_div").show();
	  	//$('#bandkam').addClass("form-group");
				$.post('<?php echo base_url();?>index.php?grampanchayat/GetBandkam/', { keyword: $grampanchayat_id }, function(data){
						if(data=='')
				{      
							  alert("something wrong.");
						//$('#response').html(data);
									   
				}
					   else{
							   $('#bandkam').html(data);
							   
							   $area=$('#area').val();
								  $ghasara= $('#deduction').val();
								  $varshik_mulya_dar=$('#varshik_mulya_dar').val();
								  $bharank=$('#bharank').val();
								  $bandkam_rate=$('#bandkam_rate').val();
								  $land_varshik_rate_amt=$('#land_varshik_rate_amt').val();
								  //alert($bandkam_rate);
								  if($bandkam_rate == undefined)
											{
											   $bhandwali_mulya=($area * $varshik_mulya_dar * $ghasara / 100 * $bharank).toFixed(0);
											  
											  $('#bhandwali_mulya').val($bhandwali_mulya);
											  $rates=$('#rates').val();
											  $building_tax= ($bhandwali_mulya/1000)*$rates;
											  $build_tax=($building_tax/100).toFixed(0);
											  $('#build_tax').val($build_tax);
											}
										  else
											{
											  //$bhandwali_mulya=[($area * $land_varshik_rate_amt ) + ($area * $varshik_mulya_dar * $ghasara / 100)] * $bharank;
											  $cal1=($area * $land_varshik_rate_amt);
												$cal2=($area * $varshik_mulya_dar * $ghasara / 100);
											  $bhandwali_mulya=(($cal1 + $cal2) * $bharank).toFixed(0);
											  $('#bhandwali_mulya').val($bhandwali_mulya);
											  $rates=$('#rates').val();
											  $building_tax= ($bhandwali_mulya/1000)*$rates;
											  $build_tax=($building_tax/100).toFixed(0);
											  $('#build_tax').val($build_tax);
											}
								
					   }
				});
	  	//$('#bandkam').html('<label for="field-1" class="col-sm-3 control-label">बांधकामाचे दर <span style="color:red">*</span></label><div class="col-sm-8"><input type="text" name="bandkam_rate" id="bandkam_rate" required="" readonly class="form-control"   value="1" id="field-1" ></div>');
	  	
		  }
		  else{
			  $("#land_prat_type_div").hide();
		  //$('#bandkam').removeClass("form-group");
			$('#bandkam').html('');
			
				$area=$('#area').val();
			  $ghasara= $('#deduction').val();
			  $varshik_mulya_dar=$('#varshik_mulya_dar').val();
			  $bharank=$('#bharank').val();
			  $bandkam_rate=$('#bandkam_rate').val();
			  $land_varshik_rate_amt=$('#land_varshik_rate_amt').val();
			  //alert($bandkam_rate);
			  if($bandkam_rate == undefined)
						{
						   $bhandwali_mulya=($area * $varshik_mulya_dar * $ghasara / 100 * $bharank).toFixed(0);
						  
						  $('#bhandwali_mulya').val($bhandwali_mulya);
						  $rates=$('#rates').val();
						  $building_tax= ($bhandwali_mulya/1000)*$rates;
						  $build_tax=($building_tax/100).toFixed(0);
						  $('#build_tax').val($build_tax);
						}
					  else
						{
						  //$bhandwali_mulya=[($area * $land_varshik_rate_amt) + ($area * $varshik_mulya_dar * $ghasara / 100)] * $bharank;
						  $cal1=($area * $land_varshik_rate_amt);
					$cal2=($area * $varshik_mulya_dar * $ghasara / 100);
				  $bhandwali_mulya=(($cal1 + $cal2) * $bharank).toFixed(0);
						  $('#bhandwali_mulya').val($bhandwali_mulya);
						  $rates=$('#rates').val();
						  $building_tax= ($bhandwali_mulya/1000)*$rates;
						  $build_tax=($building_tax/100).toFixed(0);
						  $('#build_tax').val($build_tax);
						}
	
		  }
	   
	  
	  });
	/*****/
	
	  $('#length').change(function(){
               $area=$('#area').val();
	  $ghasara= $('#deduction').val();
	  $varshik_mulya_dar=$('#varshik_mulya_dar').val();
	  $bharank=$('#bharank').val();
	  $bandkam_rate=$('#bandkam_rate').val();
	   $land_varshik_rate_amt=$('#land_varshik_rate_amt').val();
			  if($bandkam_rate == undefined)
				{
				   $bhandwali_mulya=($area * $varshik_mulya_dar * $ghasara / 100 * $bharank).toFixed(0);
				  
				  $('#bhandwali_mulya').val($bhandwali_mulya);
				  $rates=$('#rates').val();
				  $building_tax= ($bhandwali_mulya/1000)*$rates;
				  $build_tax=($building_tax/100).toFixed(0);
				  $('#build_tax').val($build_tax);
				}
			  else
				{
				  //$bhandwali_mulya=[($area * $land_varshik_rate_amt) + ($area * $varshik_mulya_dar * $ghasara / 100)] * $bharank;
				  $cal1=($area * $land_varshik_rate_amt);
					$cal2=($area * $varshik_mulya_dar * $ghasara / 100);
				  $bhandwali_mulya=(($cal1 + $cal2) * $bharank).toFixed(0);
				  $('#bhandwali_mulya').val($bhandwali_mulya);
				  $rates=$('#rates').val();
				  $building_tax= ($bhandwali_mulya/1000)*$rates;
				  $build_tax=($building_tax/100).toFixed(0);
				  $('#build_tax').val($build_tax);
				}
           });
           
           $('#breadth').change(function(){
               $area=$('#area').val();
	  $ghasara= $('#deduction').val();
	  $varshik_mulya_dar=$('#varshik_mulya_dar').val();
	  $bharank=$('#bharank').val();
	  $bandkam_rate=$('#bandkam_rate').val();
	  $land_varshik_rate_amt=$('#land_varshik_rate_amt').val();
	   if($bandkam_rate == undefined)
				{
				  $bhandwali_mulya=($area * $varshik_mulya_dar * $ghasara / 100 * $bharank).toFixed(0);
				  
				  $('#bhandwali_mulya').val($bhandwali_mulya);
				  $rates=$('#rates').val();
				  $building_tax= ($bhandwali_mulya/1000)*$rates;
				  $build_tax=($building_tax/100).toFixed(0);
				  $('#build_tax').val($build_tax);
				}
			  else
				{
				  //$bhandwali_mulya=[($area * $land_varshik_rate_amt) + ($area * $varshik_mulya_dar * $ghasara / 100)] * $bharank;
				  $cal1=($area * $land_varshik_rate_amt);
					$cal2=($area * $varshik_mulya_dar * $ghasara / 100);
				  $bhandwali_mulya=(($cal1 + $cal2) * $bharank).toFixed(0);
				  $('#bhandwali_mulya').val($bhandwali_mulya);
				  $rates=$('#rates').val();
				  $building_tax= ($bhandwali_mulya/1000)*$rates;
				  $build_tax=($building_tax/100).toFixed(0);
				  $('#build_tax').val($build_tax);
				}
           });
           
           $('#deduction').change(function(){
					$('#bharank').val('');
					$('#bhandwali_mulya').val('');
				  $('#build_tax').val('');
				  $('#rates').val('');
				
           });
           
           
        
           
            $('#bharank').change(function(){
               $area=$('#area').val();
	  $ghasara= $('#deduction').val();
	  $varshik_mulya_dar=$('#varshik_mulya_dar').val();
	  $bharank=$('#bharank').val();
	  $bandkam_rate=$('#bandkam_rate').val();
	  $land_varshik_rate_amt=$('#land_varshik_rate_amt').val();
	  if($bandkam_rate == undefined)
				{
				  $bhandwali_mulya=($area * $varshik_mulya_dar * $ghasara / 100 * $bharank).toFixed(0);
				  
				  $('#bhandwali_mulya').val($bhandwali_mulya);
				  $rates=$('#rates').val();
				  $building_tax= ($bhandwali_mulya/1000)*$rates;
				  $build_tax=($building_tax/100).toFixed(0);
				  $('#build_tax').val($build_tax);
				}
			  else
				{
					$cal1=($area * $land_varshik_rate_amt);
					$cal2=($area * $varshik_mulya_dar * $ghasara / 100);
				  $bhandwali_mulya=(($cal1 + $cal2) * $bharank).toFixed(0);
				  $('#bhandwali_mulya').val($bhandwali_mulya);
				  $rates=$('#rates').val();
				  $building_tax= ($bhandwali_mulya/1000)*$rates;
				  $build_tax=($building_tax/100).toFixed(0);
				  $('#build_tax').val($build_tax);
				}
           });
           
           $('#rates').change(function(){
			   //alert('hello');
               $area=$('#area').val();
	  $ghasara= $('#deduction').val();
	  $varshik_mulya_dar=$('#varshik_mulya_dar').val();
	  $bharank=$('#bharank').val();
	  $bandkam_rate=$('#bandkam_rate').val();
	  $land_varshik_rate_amt=$('#land_varshik_rate_amt').val();
	   if($bandkam_rate == undefined)
				{
				   $bhandwali_mulya=($area * $varshik_mulya_dar * $ghasara / 100 * $bharank).toFixed(0);
				  
				  $('#bhandwali_mulya').val($bhandwali_mulya);
				  $rates=$('#rates').val();
				  $building_tax= ($bhandwali_mulya/1000)*$rates;
				  $build_tax=($building_tax/100).toFixed(0);
				  $('#build_tax').val($build_tax);
				}
			  else
				{
				   //$bhandwali_mulya=[($area * $land_varshik_rate_amt) + ($area * $varshik_mulya_dar * $ghasara / 100)] * $bharank;
				   $cal1=($area * $land_varshik_rate_amt);
					$cal2=($area * $varshik_mulya_dar * $ghasara / 100);
				  $bhandwali_mulya=(($cal1 + $cal2) * $bharank).toFixed(0);
				  $('#bhandwali_mulya').val($bhandwali_mulya);
				  $rates=$('#rates').val();
				  $building_tax= ($bhandwali_mulya/1000)*$rates;
				  $build_tax=($building_tax/100).toFixed(0);
				  $('#build_tax').val($build_tax);
				}
           });
		   
		   $('#deduction').change(function(){
               $area=$('#area').val();
	  $ghasara= $('#deduction').val();
	  $varshik_mulya_dar=$('#varshik_mulya_dar').val();
	  $bharank=$('#bharank').val();
	  $bandkam_rate=$('#bandkam_rate').val();
	  $land_varshik_rate_amt=$('#land_varshik_rate_amt').val();
	   if($bandkam_rate == undefined)
				{
				   $bhandwali_mulya=($area * $varshik_mulya_dar * $ghasara / 100 * $bharank).toFixed(0);
				  
				  $('#bhandwali_mulya').val($bhandwali_mulya);
				  $rates=$('#rates').val();
				  $building_tax= ($bhandwali_mulya/1000)*$rates;
				  $build_tax=($building_tax/100).toFixed(0);
				  $('#build_tax').val($build_tax);
				}
			  else
				{
				  //$bhandwali_mulya=[($area * $land_varshik_rate_amt) + ($area * $varshik_mulya_dar * $ghasara / 100)] * $bharank;
				  $cal1=($area * $land_varshik_rate_amt);
					$cal2=($area * $varshik_mulya_dar * $ghasara / 100);
				  $bhandwali_mulya=(($cal1 + $cal2) * $bharank).toFixed(0);
				  $('#bhandwali_mulya').val($bhandwali_mulya);
				  $rates=$('#rates').val();
				  $building_tax= ($bhandwali_mulya/1000)*$rates;
				  $build_tax=($building_tax/100).toFixed(0);
				  $('#build_tax').val($build_tax);
				}
           });
	 
	
	
	
	
	/******/
	 
});
</script>