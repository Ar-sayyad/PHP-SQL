<?php
$doctor_id          = $this->session->userdata('login_user_id');
$single_doctor_info = $this->db->get_where('doctor', array('doctor_id' => $doctor_id))->result_array();
foreach ($single_doctor_info as $row) {
?>
    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-primary" data-collapsed="0">

                <div class="panel-heading">
                    <div class="panel-title">
                        <h3><?php echo get_phrase('edit_profile'); ?></h3>
                    </div>
                </div>

                <div class="panel-body">

                    <form role="form" class="form-horizontal form-groups-bordered" action="<?php echo base_url(); ?>index.php?doctor/profile/update" method="post" enctype="multipart/form-data">

                        <div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('name'); ?> <span style="color:red">*</span></label>

                            <div class="col-sm-5">
                                <input type="text" name="name" required="" class="form-control" id="field-1" value="<?php echo $row['name']; ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('email'); ?> <span style="color:red">*</span></label>

                            <div class="col-sm-5">
                                <input type="email" name="email" required="" class="form-control" id="field-1" value="<?php echo $row['email']; ?>">
                            </div>
                        </div>
						<div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('licence_no'); ?> <span style="color:red">*</span></label>

                            <div class="col-sm-5">
                                <input type="text" name="licence_no" required="" class="form-control" id="field-1" value="<?php echo $row['licence_no']; ?>">
                            </div>
                        </div>
						
						<div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('hospital_name'); ?> <span style="color:red">*</span></label>

                            <div class="col-sm-5">
                                <input type="text" name="hospital_name" required="" class="form-control" id="field-1" value="<?php echo $row['hospital_name']; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="field-ta" class="col-sm-3 control-label"><?php echo get_phrase('address'); ?></label>

                            <div class="col-sm-5">
                                <textarea name="address" class="form-control " 
                                    id="field-ta"><?php echo $row['address']; ?></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('phone'); ?> <span style="color:red">*</span></label>

                            <div class="col-sm-5">
                                <input type="text" name="phone" required="" pattern="[0-9]{10,10}"  autocomplete="off" maxlength="10" class="form-control" id="field-1" value="<?php echo $row['phone']; ?>">
                            </div>
                        </div>

                       
                        
                        <div class="col-sm-3 control-label col-sm-offset-1">
                            <input type="submit" class="btn btn-success" value="Update">
                        </div>
                    </form>

                </div>

            </div>

        </div>
    </div>

    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-primary" data-collapsed="0">

                <div class="panel-heading">
                    <div class="panel-title">
                        <h3><?php echo get_phrase('change_password'); ?></h3>
                    </div>
                </div>

                <div class="panel-body">

                    <form role="form" class="form-horizontal form-groups-bordered" action="<?php echo base_url(); ?>index.php?doctor/profile/change_password" method="post" enctype="multipart/form-data">

                        <div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('old_password'); ?> <span style="color:red">*</span></label>

                            <div class="col-sm-5">
                                <input type="password" name="old_password" required="" class="form-control" id="field-1">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('new_password'); ?> <span style="color:red">*</span></label>

                            <div class="col-sm-5">
                                <input type="password" name="new_password" required="" class="form-control" id="field-1">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('confirm_new_password'); ?> <span style="color:red">*</span></label>

                            <div class="col-sm-5">
                                <input type="password" name="confirm_new_password" required="" class="form-control" id="field-1">
                            </div>
                        </div>
                        
                        <div class="col-sm-3 control-label col-sm-offset-1">
                            <input type="submit" class="btn btn-success" value="Update">
                        </div>
                    </form>

                </div>

            </div>

        </div>
    </div>
<?php } ?>