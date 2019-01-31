<?php $patient_info = $this->db->get_where('patient', array('patient_id' => $param2))->result_array(); ?>
<div class="row">
    <div class="col-md-12">

        <div class="panel panel-primary" data-collapsed="0">

            <div class="panel-heading">
                <div class="panel-title">
                    <h3><?php echo get_phrase('add_attachment'); ?></h3>
                </div>
            </div>

            <div class="panel-body">

                <form role="form" class="form-horizontal form-groups-bordered" action="<?php echo base_url(); ?>index.php?doctor/add_attachment/create" method="post" enctype="multipart/form-data">

                   
                    <div class="form-group">

                        <label for="field-ta" class="col-sm-3 control-label"><?php echo get_phrase('patient'); ?> <span style="color:red">*</span></label>



                        <div class="col-sm-7">

                            <select name="patient_id" required="" class="select2">

                                <option value="" disabled><?php echo get_phrase('select_patient'); ?></option>

                                <?php foreach ($patient_info as $row) { ?>

                                        <option value="<?php echo $row['patient_id']; ?>" selected><?php echo ucwords($row['name']); ?></option>

                                <?php } ?>

                            </select>

                        </div>

                    </div>
                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('date'); ?><span style="color:red">*</span></label>

                        <div class="col-sm-7">
                            <input type="text" name="date" required="" class="form-control datepicker" id="field-1" >
                        </div>
                    </div>
                    
                    
                   
                    
                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo get_phrase('attachment'); ?></label>

                        <div class="col-sm-7">

                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;" data-trigger="fileinput">
                                    <img src="http://placehold.it/200x150" alt="...">
                                </div>
                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
                                <div>
                                    <span class="btn btn-white btn-file">
                                        <span class="fileinput-new">Select attachment</span>
                                        <span class="fileinput-exists">Change</span>
                                        <input type="file" name="attachment" accept="image/*">
                                    </span>
                                    <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
                                </div>
                            </div>

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