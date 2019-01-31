<?php $city_info = $this->db->get('city')->result_array();
$type_info = $this->db->get('type')->result_array();
$speciality_info = $this->db->get('speciality')->result_array(); ?>
<div class="row">
    <div class="col-md-12">

        <div class="panel panel-primary" data-collapsed="0">

            <div class="panel-heading">
                <div class="panel-title">
                    <h3><?php echo get_phrase('add_doctor'); ?></h3>
                </div>
            </div>

            <div class="panel-body">

                <form role="form" class="form-horizontal form-groups-bordered" action="<?php echo base_url(); ?>index.php?admin/doctor/create" method="post" enctype="multipart/form-data">
					
					<div class="form-group">
                            <label for="field-ta" class="col-sm-3 control-label"><?php echo get_phrase('type'); ?> <span style="color:red">*</span></label>

                            <div class="col-sm-5">
                                <select name="type_id" class="form-control select2">
                                    <option value=""><?php echo get_phrase('select_type'); ?></option>
                                    <?php foreach ($type_info as $row2) { ?>
                                        <option value="<?php echo $row2['type_id']; ?>">
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
                                        <option value="<?php echo $rows['speciality_id']; ?>">
                                            <?php echo $rows['name']; ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('name'); ?> <span style="color:red">*</span></label>

                        <div class="col-sm-5">
                            <input type="text" name="name" required="" class="form-control" id="field-1" >
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('email'); ?> <span style="color:red">*</span></label>

                        <div class="col-sm-5">
                            <input type="email" name="email" required="" class="form-control" id="field-1" >
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('password'); ?> <span style="color:red">*</span></label>

                        <div class="col-sm-5">
                            <input type="password" name="password" required="" class="form-control" id="field-1" >
                        </div>
                    </div>
                    
                    
                    
                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('phone'); ?> <span style="color:red">*</span></label>

                        <div class="col-sm-5">
                            <input type="text" name="phone" required="" pattern="[0-9]{10,10}"  autocomplete="off" maxlength="10" class="form-control" id="field-1" >
                        </div>
                    </div>
					<div class="form-group">
                            <label for="field-ta" class="col-sm-3 control-label"><?php echo get_phrase('city'); ?> <span style="color:red">*</span></label>

                            <div class="col-sm-5">
                                <select name="city_id" class="form-control select2">
                                    <option value=""><?php echo get_phrase('select_city'); ?></option>
                                    <?php foreach ($city_info as $row3) { ?>
                                        <option value="<?php echo $row3['city_id']; ?>">
                                            <?php echo $row3['name']; ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
						
						<div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('licence_no'); ?> <span style="color:red">*</span></label>

                            <div class="col-sm-5">
                                <input type="text" name="licence_no" required="" class="form-control" id="field-1">
                            </div>
                        </div>
						
						<div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('hospital_name'); ?> <span style="color:red">*</span></label>

                            <div class="col-sm-5">
                                <input type="text" name="hospital_name" required="" class="form-control" id="field-1">
                            </div>
                        </div>
						
						<div class="form-group">
                        <label for="field-ta" class="col-sm-3 control-label"><?php echo get_phrase('address'); ?></label>

                        <div class="col-sm-9">
                            <textarea name="address" class="form-control" id="field-ta"></textarea>
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