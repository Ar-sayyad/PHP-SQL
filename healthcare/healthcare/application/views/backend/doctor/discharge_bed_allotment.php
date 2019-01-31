<?php
//$bed_info = $this->db->get_where('bed')->result_array();

$single_bed_allotment_info = $this->db->get_where('bed_allotment', array('bed_allotment_id' => $param2))->result_array();
foreach ($single_bed_allotment_info as $row) {
    $bed_info = $this->db->get_where('bed', array('bed_id' => $row['bed_id']))->result_array();
   
?>

    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-primary" data-collapsed="0">

                <div class="panel-heading">
                    <div class="panel-title">
                        <h3><?php echo get_phrase('Discharge_patient'); ?></h3>
                    </div>
                </div>

                <div class="panel-body">

                    <form role="form" class="form-horizontal form-groups-bordered" action="<?php echo base_url(); ?>index.php?doctor/bed_allotment/discharge/<?php echo $row['bed_allotment_id']; ?>" method="post" enctype="multipart/form-data">
                        
                        <div class="form-group">

                            <label for="field-ta" class="col-sm-3 control-label"><?php echo get_phrase('bed_number'); ?> <span style="color:red">*</span></label>



                            <div class="col-sm-5">

                                <select name="bed_id" required="" class="select2">

                                    <option value=""><?php echo get_phrase('select_bed_number'); ?></option>

                                    <?php foreach ($bed_info as $row3) { ?>

                                  

                                    <option value="<?php echo $row['bed_id']; ?>" selected="" ><?php echo $row3['bed_number'] ; ?>--<?php $name = $this->db->get_where('bed_category' , array('bed_category_id' => $row3['type'] ))->row()->name;

                        echo $name;?></option>

                               <?php }?>

                                </select>

                            </div>

                        </div>



                        <div class="form-group">

                            <label for="field-ta" class="col-sm-3 control-label"><?php echo get_phrase('patient'); ?> <span style="color:red">*</span></label>



                            <div class="col-sm-5">

                                <select name="patient_id" required="" class="select2">

                                  <?php $patient_info =  $this->db->get_where('patient', array('patient_id' => $row['patient_id']))->result_array();?>

                                    <option value=""><?php echo get_phrase('select_patient'); ?></option>

                                    <?php foreach ($patient_info as $row2) { 

                                  ?>

                                    <option value="<?php echo $row2['patient_id']; ?>"  selected=""><?php echo $row2['name']; ?></option>

                                <?php }

                                

                                ?>

                                </select>

                            </div>

                        </div>


                        <div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('allotment_time'); ?> <span style="color:red">*</span></label>

                            <div class="col-sm-5">
                                <input type="text" required="" name="allotment_timestamp" readonly="" class="form-control" id="field-1" value="<?php echo  $row['allotment_timestamp']; ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('discharge_time'); ?> <span style="color:red">*</span></label>

                            <div class="col-sm-5">
                                <input type="text" name="discharge_timestamp" required=""  class="form-control datepicker" id="field-1" value="<?php echo  $row['discharge_timestamp']; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('consultancy'); ?></label>

                            <div class="col-sm-5">
                                <input type="text" name="consultancy"   class="form-control" id="field-1"> 
                        </div>
                        </div>
                        <div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('surgery_date'); ?></label>

                            <div class="col-sm-5">
                                <input type="text" name="surgery_date"   class="form-control datepicker" id="field-1">  
                        </div>
                        </div>
			<div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('drug_allergies'); ?></label>

                            <div class="col-sm-5">
                                <input type="text" name="drug_allergies"   class="form-control" id="field-1">  
                        </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('final_dignosis'); ?></label>

                            <div class="col-sm-5">
                                <input type="text" name="final_dignosis"   class="form-control" id="field-1">  
                        </div>
                        </div>
                        
                        
                        <div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('chief_complaints'); ?></label>

                            <div class="col-sm-5">
                                <input type="text" name="chief_complaints"   class="form-control" id="field-1"> 
                        </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('temperature'); ?></label>

                            <div class="col-sm-5">
                                <input type="text" name="temperature"   class="form-control" id="field-1">
                        </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('pulse'); ?></label>

                            <div class="col-sm-5">
                                <input type="text" name="pulse"   class="form-control" id="field-1">
                        </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('blood_pressure'); ?></label>

                            <div class="col-sm-5">
                                <input type="text" name="blood_pressure"   class="form-control" id="field-1">
                        </div>
                        </div>
                        <div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('clinical_examination'); ?></label>

                            <div class="col-sm-5">
                                <input type="text" name="clinical_exam"   class="form-control" id="field-1">
                        </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('investigation_detail'); ?></label>

                            <div class="col-sm-5">
                                <textarea name="investigation_detail"   class="form-control" id="field-1"></textarea>
                        </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('consultation_reference'); ?></label>

                            <div class="col-sm-5">
                                <input type="text" name="consultation_ref"   class="form-control" id="field-1">
                        </div>
                        </div>
                        <div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('treatment_given'); ?></label>

                            <div class="col-sm-5">
                                 <textarea  name="treatment_given"   class="form-control" id="field-1"></textarea>
                        </div>
                        </div>
                        <div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('condition_of_discharge'); ?></label>

                            <div class="col-sm-5">
                                 <textarea  name="condition_of_discharge"   class="form-control" id="field-1"></textarea>
                        </div>
                        </div>
                        <div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('advice'); ?></label>

                            <div class="col-sm-5">
                                <textarea  name="advice"   class="form-control" id="field-1"></textarea>
                        </div>
                        </div>
                        <div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('mediation'); ?></label>

                            <div class="col-sm-5">
                                <textarea name="mediation"   class="form-control" id="field-1"></textarea>
                        </div>
                        </div>
                        <div class="col-sm-3 control-label col-sm-offset-2">
                            <input type="submit" class="btn btn-success" value="Discharge">
                        </div>
                    </form>

                </div>

            </div>

        </div>
    </div>
<?php } ?>