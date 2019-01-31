<div class="row">
    <div class="col-md-12">

        <div class="panel panel-primary" data-collapsed="0">

            <div class="panel-heading">
                <div class="panel-title">
                    <h3><?php echo get_phrase('add_operator'); ?></h3>
                </div>
            </div>

            <div class="panel-body">

                <form role="form" enctype="multipart/form-data" class="form-horizontal form-groups-bordered"
                    action="<?php echo base_url(); ?>index.php?admin/receptionist/create" method="post">

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
                        <label for="field-ta" class="col-sm-3 control-label"><?php echo get_phrase('address'); ?></label>

                        <div class="col-sm-7">
                            <textarea name="address" class="form-control" id="field-ta"></textarea>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('phone'); ?> <span style="color:red">*</span></label>

                        <div class="col-sm-5">
                            <input type="text" name="phone" required="" pattern="[0-9]{10,10}"  autocomplete="off" maxlength="10" class="form-control" id="field-1" >
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