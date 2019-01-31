<?php $patient_info = $this->db->get('patient')->result_array(); ?>
<div class="row">
    <div class="col-md-12">

        <div class="panel panel-primary" data-collapsed="0">

            <div class="panel-heading">
                <div class="panel-title">
                    <h3><?php echo get_phrase('add_report'); ?></h3>
                </div>
            </div>

            <div class="panel-body">

                <form role="form" class="form-horizontal form-groups-bordered" action="<?php echo base_url(); ?>index.php?doctor/report/create" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="field-ta" class="col-sm-3 control-label"><?php echo get_phrase('type'); ?> <span style="color:red">*</span></label>

                        <div class="col-sm-5">
                            <select name="type" required="" class="form-control">
                                <option value=""><?php echo get_phrase('select_type'); ?></option>
                                <option value="operation"><?php echo get_phrase('operation'); ?></option>
                                <option value="birth"><?php echo get_phrase('birth'); ?></option>
                                <option value="death"><?php echo get_phrase('death'); ?></option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="field-ta" class="col-sm-3 control-label"><?php echo get_phrase('description'); ?> <span style="color:red">*</span></label>

                        <div class="col-sm-9">
                            <textarea name="description" required="" class="form-control" id="field-ta"></textarea>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('date'); ?> <span style="color:red">*</span></label>

                        <div class="col-sm-5">
                            <input type="text" required="" name="timestamp" class="form-control datepicker" id="field-1" >
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="field-ta" class="col-sm-3 control-label"><?php echo get_phrase('patient'); ?> <span style="color:red">*</span></label>

                        <div class="col-sm-5">
                            <select name="patient_id" required="" class="form-control">
                                <option value=""><?php echo get_phrase('select_patient'); ?></option>
                                <?php foreach ($patient_info as $row) { ?>
                                    <option value="<?php echo $row['patient_id']; ?>"><?php echo $row['name']; ?></option>
                                <?php } ?>
                            </select>
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