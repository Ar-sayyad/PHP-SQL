<?php $bed_category_info = $this->db->get('bed_category')->result_array(); ?><div class="row">    <div class="col-md-12">        <div class="panel panel-primary" data-collapsed="0">            <div class="panel-heading">                <div class="panel-title">                    <h3><?php echo get_phrase('add_bed'); ?></h3>                </div>            </div>            <div class="panel-body">                <form role="form" class="form-horizontal form-groups-bordered" action="<?php echo base_url(); ?>index.php?admin/bed/create" method="post" enctype="multipart/form-data">                                    <div class="form-group">                        <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('bed_number'); ?> <span style="color:red">*</span></label>                        <div class="col-sm-5">                            <input type="number" required="" name="bed_number" class="form-control" id="field-1" >                        </div>                    </div>                                         <div class="form-group">                        <label for="field-ta" class="col-sm-3 control-label"><?php echo get_phrase('bed_category'); ?> <span style="color:red">*</span></label>                        <div class="col-sm-5">                            <select name="type" required="" class="form-control">                                <option value=""><?php echo get_phrase('select_bed_category'); ?></option>                                <?php foreach ($bed_category_info as $row) { ?>                                    <option value="<?php echo $row['bed_category_id']; ?>"><?php echo $row['name']; ?></option>                                <?php } ?>                            </select>                        </div>                    </div>                                        <div class="form-group">                        <label for="field-ta" class="col-sm-3 control-label"><?php echo get_phrase('description'); ?></label>                        <div class="col-sm-9">                            <textarea name="description" class="form-control" id="field-ta"></textarea>                        </div>                    </div>                    <div class="col-sm-3 control-label col-sm-offset-1">                        <input type="submit" class="btn btn-success" value="Submit">                    </div>                </form>            </div>        </div>    </div></div>