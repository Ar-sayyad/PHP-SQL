<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title" >
                    <i class="entypo-plus-circled"></i>
                    <?php echo get_phrase('add_invoice_data'); ?>
                </div>
            </div>
            <div class="panel-body">
                <form role="form" class="form-horizontal form-groups validate invoice-add" action="<?php echo base_url(); ?>index.php?doctor/data_add/create" method="post" enctype="multipart/form-data">
                <?php //echo form_open('index.php?accountant/invoice_add/create', array('class' => 'form-horizontal form-groups validate invoice-add', 'enctype' => 'multipart/form-data')); ?>

                <div class="form-group">
                    <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('name'); ?> <span style="color:red">*</span></label>

                    <div class="col-sm-5">
                        <input type="text" required="" class="form-control" name="name" id="title" data-validate="required" 
                               data-message-required="<?php echo get_phrase('value_required'); ?>" value="" autofocus>
                    </div>
                </div>

               
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-8">
                        <button type="submit" class="btn btn-info" id="submit-button">
                            <?php echo get_phrase('add_invoice_data'); ?></button>
                        <span id="preloader-form"></span>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>

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