<?php 
$bed_category_info = $this->db->get('bed_category')->result_array(); 
$bed_info = $this->db->get('bed')->result_array();

$menu_check                 = $param3;

//$patient_info = $this->db->get('patient')->result_array(); 

$single_patient_info   = $this->db->get_where('patient', array('patient_id' => $param2))->result_array();

foreach ($single_patient_info as $row) {

?>

<div class="row">

    <div class="col-md-12">



        <div class="panel panel-primary" data-collapsed="0">



            <div class="panel-heading">

                <div class="panel-title">

                    <h3><?php echo get_phrase('admit_patient'); ?></h3>

                </div>

            </div>



            <div class="panel-body">



                <form role="form" class="form-horizontal form-groups-bordered" action="<?php echo base_url(); ?>index.php?doctor/bed_allotment/create" method="post" enctype="multipart/form-data">

                    

                    <div class="form-group">

                        <label for="field-ta" class="col-sm-3 control-label"><?php echo get_phrase('bed_number'); ?> <span style="color:red">*</span></label>



                        <div class="col-sm-5">

                            <select name="bed_id" required="" class="select2">

                                <option value=""><?php echo get_phrase('select_bed_number'); ?></option>

                                <?php foreach ($bed_info as $row) { ?>

                                   

                                    <option value="<?php echo $row['bed_id']; ?>"

                                   <?php $bedav_info = $this->db->get_where('bed_allotment', array('bed_id' => $row['bed_id'],'discharge_status' => 0))->result_array();

                                    foreach ($bedav_info as $row2) {?>

                                     <?php if ($row['bed_id'] == $row2['bed_id']) echo 'disabled';?>

                                <?php }

                               ?> ><?php echo $row['bed_number'] ; ?>-<?php $name = $this->db->get_where('bed_category' , array('bed_category_id' => $row['type'] ))->row()->name;

                        echo $name;?></option>

                               <?php }?>

                            </select>

                        </div>

                    </div>

                    

                    <div class="form-group">

                        <label for="field-ta" class="col-sm-3 control-label"><?php echo get_phrase('patient'); ?> <span style="color:red">*</span></label>



                        <div class="col-sm-5">

                            <select name="patient_id" required="" class="select2">

                                <option value=""><?php echo get_phrase('select_patient'); ?></option>

                                <?php foreach ($single_patient_info as $row) { ?>

                                <option value="<?php echo $row['patient_id']; ?>" selected=""><?php echo $row['name']; ?></option>

                                <?php }

                                ?>

                            </select>

                        </div>

                    </div>

                    

                     <div class="form-group">

                        <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('referred_by'); ?></label>



                        <div class="col-sm-5">

                           <input type="text" name="refered_by" class="form-control" id="field-1" >

                        </div>

                    </div>
                    
                    
                    
                    <div class="form-group">

                        <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('provisional_diagnosis'); ?></label>



                        <div class="col-sm-5">

                            <textarea name="provisional_diagnosis"  class="form-control" id="field-1" ></textarea>

                        </div>

                    </div>
                    <div class="form-group">

                        <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('final_diagnosis'); ?></label>



                        <div class="col-sm-5">

                            <textarea name="final_diagnosis"  class="form-control" id="field-1" ></textarea>

                        </div>

                    </div>

                    <div class="form-group">

                        <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('date_of_admission'); ?> <span style="color:red">*</span></label>



                        <div class="col-sm-5">

                            <input type="text" required="" name="allotment_timestamp" class="form-control datepicker" id="field-1" >

                        </div>

                    </div>
                    
                    
                    <div class="form-group">

                        <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('name_of_relative'); ?></label>



                        <div class="col-sm-5">

                           <input type="text" required="" name="relative" class="form-control" id="field-1" >

                        </div>

                    </div>
                    
                    <div class="form-group">

                        <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('relation_with_patient'); ?></label>



                        <div class="col-sm-5">

                           <input type="text" required="" name="relation_with_patient" class="form-control" id="field-1" >

                        </div>

                    </div>
                    
                    <div class="form-group">

                        <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('relative_phone_no'); ?></label>



                        <div class="col-sm-5">

                           <input type="text" required="" name="relative_phone" class="form-control" id="field-1" >

                        </div>

                    </div>



                    <div class="col-sm-3 control-label col-sm-offset-2">

                        <input type="submit" class="btn btn-success" value="Submit">

                    </div>

                </form>



            </div>



        </div>



    </div>

</div>

<?php } ?>