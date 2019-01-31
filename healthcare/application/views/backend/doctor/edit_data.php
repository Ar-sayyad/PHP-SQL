<?php
$edit_data = $this->db->get_where('data', array('data_id' => $param2))->result_array();
//$patient_info               = $this->db->get('patient')->result_array();
foreach ($edit_data as $row){
?>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title" >
                    <i class="entypo-plus-circled"></i>
                    <?php echo get_phrase('edit_invoice_data'); ?>
                </div>
            </div>
            <div class="panel-body">
                <form role="form" class="form-horizontal form-groups validate invoice-add" action="<?php echo base_url(); ?>index.php?doctor/data_manage/update/<?php echo $param2;?>" method="post" enctype="multipart/form-data">
                <?php //echo form_open('index.php?accountant/invoice_add/create', array('class' => 'form-horizontal form-groups validate invoice-add', 'enctype' => 'multipart/form-data')); ?>

                <div class="form-group">
                    <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('name'); ?> <span style="color:red">*</span></label>

                    <div class="col-sm-5">
                        <input type="text" required="" class="form-control" name="name" id="title" data-validate="required" 
                               data-message-required="<?php echo get_phrase('value_required'); ?>" value="<?php echo $row['name']; ?>" autofocus>
                    </div>
                </div>

               
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-8">
                        <button type="submit" class="btn btn-info" id="submit-button">
                            <?php echo get_phrase('update_invoice_data'); ?></button>
                        <span id="preloader-form"></span>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php } ?>
<script>

    // CREATING BLANK INVOICE ENTRY
    var blank_invoice_entry = '';
    $(document).ready(function () {
        blank_invoice_entry = $('#invoice_entry').html();
    });

    function add_entry()
    {
        $("#invoice_entry").append(blank_invoice_entry);
    }

    // REMOVING INVOICE ENTRY
    function deleteParentElement(n) {
        n.parentNode.parentNode.parentNode.removeChild(n.parentNode.parentNode);
    }

</script>