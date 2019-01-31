<?php 
$city_info = $this->db->get('city')->result_array();
$type_info = $this->db->get('type')->result_array();
$speciality_info = $this->db->get('speciality')->result_array();
$single_doctor_info = $this->db->get_where('doctor', array('doctor_id' => $param2))->result_array();
foreach ($single_doctor_info as $row) {
?>
    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-primary" data-collapsed="0">

                <div class="panel-heading">
                    <div class="panel-title">
                        <h3><?php echo get_phrase('edit_doctor'); ?></h3>
                    </div>
                </div>

                <div class="panel-body">

                    <form role="form" class="form-horizontal form-groups-bordered" action="<?php echo base_url(); ?>index.php?admin/doctor/update/<?php echo $row['doctor_id']; ?>" method="post" enctype="multipart/form-data">
					<div class="form-group">
                            <label for="field-ta" class="col-sm-3 control-label"><?php echo get_phrase('type'); ?> <span style="color:red">*</span></label>

                            <div class="col-sm-5">
                                <select name="type_id" class="form-control select2">
                                    <option value=""><?php echo get_phrase('select_type'); ?></option>
                                    <?php foreach ($type_info as $row2) { ?>
                                        <option value="<?php echo $row2['type_id']; ?>" <?php if ($row['type_id'] == $row2['type_id']) echo 'selected'; ?>>
                                            <?php echo $row2['name']; ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
						<div class="form-group">
                            <label for="field-ta" class="col-sm-3 control-label"><?php echo get_phrase('speciality'); ?> <span style="color:red">*</span></label>

                            <div class="col-sm-5">
                                <select name="speciality_id" class="form-control select2">
                                    <option value=""><?php echo get_phrase('select_speciality'); ?></option>
                                    <?php foreach ($speciality_info as $rows) { ?>
                                        <option value="<?php echo $rows['speciality_id']; ?>" <?php if ($row['speciality_id'] == $rows['speciality_id']) echo 'selected'; ?>>
                                            <?php echo $rows['name']; ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('name'); ?> <span style="color:red">*</span></label>

                            <div class="col-sm-5">
                                <input type="text" name="name" required="" class="form-control" id="field-1" value="<?php echo $row['name']; ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('email'); ?> <span style="color:red">*</span></label>

                            <div class="col-sm-5">
                                <input type="email" required="" name="email" class="form-control" id="field-1" value="<?php echo $row['email']; ?>">
                            </div>
                        </div>                       

                        <div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('phone'); ?> <span style="color:red">*</span></label>

                            <div class="col-sm-5">
                                <input type="text" name="phone" class="form-control" required="" pattern="[0-9]{10,10}"  autocomplete="off" maxlength="10" id="field-1" value="<?php echo $row['phone']; ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="field-ta" class="col-sm-3 control-label"><?php echo get_phrase('city'); ?> <span style="color:red">*</span></label>

                            <div class="col-sm-5">
                                <select name="city_id" class="form-control select2">
                                    <option value=""><?php echo get_phrase('select_city'); ?></option>
                                    <?php foreach ($city_info as $row3) { ?>
                                        <option value="<?php echo $row3['city_id']; ?>" <?php if ($row['city_id'] == $row3['city_id']) echo 'selected'; ?>>
                                            <?php echo $row3['name']; ?>
                                        </option>
                                    <?php } ?>
                                </select>
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

                            <div class="col-sm-9">
                                <textarea name="address" class="form-control" id="field-ta">
                                    <?php echo $row['address']; ?>
                                </textarea>
                            </div>
                        </div>

                        <!--<div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('image'); ?></label>

                            <div class="col-sm-5">

                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;" data-trigger="fileinput">
                                        <img src="<?php echo $this->crud_model->get_image_url('doctor' , $row['doctor_id']);?>" alt="...">
                                    </div>
                                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
                                    <div>
                                        <span class="btn btn-white btn-file">
                                            <span class="fileinput-new">Select image</span>
                                            <span class="fileinput-exists">Change</span>
                                            <input type="file" name="image" accept="image/*">
                                        </span>
                                        <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
                                    </div>
                                </div>

                            </div>
                        </div>-->

                        <div class="col-sm-3 control-label col-sm-offset-2">
                            <input type="submit" class="btn btn-success" value="Update">
                        </div>
                    </form>

                </div>

            </div>

        </div>
    </div>
<?php } ?>