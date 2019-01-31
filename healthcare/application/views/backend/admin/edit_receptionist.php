<?php
$single_receptionist_info = $this->db->get_where('receptionist', array('receptionist_id' => $param2))->result_array();
foreach ($single_receptionist_info as $row) {
?>
    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-primary" data-collapsed="0">

                <div class="panel-heading">
                    <div class="panel-title">
                        <h3><?php echo get_phrase('edit_operator'); ?></h3>
                    </div>
                </div>

                <div class="panel-body">

                    <form role="form" class="form-horizontal form-groups-bordered" action="<?php echo base_url(); ?>index.php?admin/receptionist/update/<?php echo $row['receptionist_id']; ?>" method="post" enctype="multipart/form-data">

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
                            <label for="field-ta" class="col-sm-3 control-label"><?php echo get_phrase('address'); ?></label>

                            <div class="col-sm-7">
                                <textarea name="address" class="form-control" 
                                    id="field-ta"><?php echo $row['address']; ?></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('phone'); ?> <span style="color:red">*</span></label>

                            <div class="col-sm-5">
                                <input type="text" name="phone" required="" pattern="[0-9]{10,10}"  autocomplete="off" maxlength="10" class="form-control" id="field-1" value="<?php echo $row['phone']; ?>">
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