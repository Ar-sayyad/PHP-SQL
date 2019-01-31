<?php $state_info = $this->db->get('state')->result_array(); ?>
<div class="row">
    <div class="col-md-12">

        <div class="panel panel-primary" data-collapsed="0">

            <div class="panel-heading">
                <div class="panel-title">
                    <h3><?php echo get_phrase('add_city'); ?></h3>
                </div>
            </div>

            <div class="panel-body">

                <form role="form" class="form-horizontal form-groups-bordered" action="<?php echo base_url(); ?>index.php?admin/city/create" method="post" enctype="multipart/form-data">
					
					<div class="form-group">
                            <label for="field-ta" class="col-sm-3 control-label"><?php echo get_phrase('state'); ?> <span style="color:red">*</span></label>

                            <div class="col-sm-5">
                                <select name="state_id" class="form-control select2">
                                    <option value=""><?php echo get_phrase('select_state'); ?></option>
                                    <?php foreach ($state_info as $row2) { ?>
                                        <option value="<?php echo $row2['state_id']; ?>">
                                            <?php echo $row2['name']; ?>
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

                   
                   
						
                    <div class="col-sm-3 control-label col-sm-offset-2">
                        <input type="submit" class="btn btn-success" value="Submit">
                    </div>
                </form>

            </div>

        </div>

    </div>
</div>