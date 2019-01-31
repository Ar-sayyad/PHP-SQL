<?php

$patient_info = $this->db->get('patient')->result_array();

$single_appointment_info = $this->db->get_where('appointment', array('appointment_id' => $param2))->result_array();

foreach ($single_appointment_info as $row) {

?>

    <div class="row">

        <div class="col-md-12">



            <div class="panel panel-primary" data-collapsed="0">



                <div class="panel-heading">

                    <div class="panel-title">

                        <h3><?php echo get_phrase('edit_appointment'); ?></h3>

                    </div>

                </div>



                <div class="panel-body">



                    <form role="form" class="form-horizontal form-groups-bordered" 

                        action="<?php echo base_url(); ?>index.php?doctor/appointment/update/<?php echo $row['appointment_id']; ?>" 

                        method="post" enctype="multipart/form-data">



                        <div class="form-group">

                            <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('date'); ?> <span style="color:red">*</span></label>



                            <div class="col-sm-7">
                                 <?php //date_default_timezone_set('Asia/Calcutta');?>
                                <div class="date-and-time">

                                    <input type="text" required="" name="date_timestamp" class="form-control " data-format="D, dd MM yyyy" 

                                           placeholder="date here" value="<?php echo date("d/m/Y h:i a", $row['timestamp']); ?>">

                                 
                                </div>

                            </div>

                        </div>

                        

                        <div class="form-group">

                            <label for="field-ta" class="col-sm-3 control-label"><?php echo get_phrase('patient'); ?> <span style="color:red">*</span></label>



                            <div class="col-sm-7">

                                <select name="patient_id" required="" class="select2">

                                    <option value=""><?php echo get_phrase('select_patient'); ?></option>

                                    <?php foreach ($patient_info as $row2) { ?>

                                            <option value="<?php echo $row2['patient_id']; ?>" <?php if ($row['patient_id'] == $row2['patient_id']) echo 'selected'; ?>>

                                                <?php echo $row2['name']; ?>

                                            </option>

                                    <?php } ?>

                                </select>

                            </div>

                        </div>

                        

                        <div class="form-group">

                            <div class="col-sm-7 col-sm-offset-3">

                                <input type="checkbox" id="notify" name="notify" value="checked" >

                                <label class="control-label" for="notify"><?php echo get_phrase('notify_patient_with_') . 'SMS'; ?></label>

                            </div>

                        </div>



                        <div class="col-sm-3 control-label col-sm-offset-2">

                            <input type="submit" class="btn btn-success" value="Update">

                        </div>

                    </form>



                </div>



            </div>



        </div>

    </div>

<?php } ?>