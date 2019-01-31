<?php $data = $this->db->get_where('data')->result_array(); ?>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title" >
                    <i class="entypo-plus-circled"></i>
                    <?php echo get_phrase('add_deposit'); ?>
                </div>
            </div>
            <div class="panel-body">
                <form role="form" class="form-horizontal form-groups validate invoice-add" action="<?php echo base_url(); ?>index.php?doctor/deposit/create" method="post" enctype="multipart/form-data">
                <?php //echo form_open('index.php?accountant/invoice_add/create', array('class' => 'form-horizontal form-groups validate invoice-add', 'enctype' => 'multipart/form-data')); ?>

                
                <div class="form-group">
                    <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('invoice_number'); ?></label>

                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="invoice_number"  value="<?php echo rand(10000, 100000); ?>"  readonly>
                    </div>
                </div>

                <div class="form-group">
                    <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('patient'); ?> <span style="color:red">*</span></label>

                    <div class="col-sm-5">
                        <select name="patient_id" required="" class="select2">
                            <option><?php echo get_phrase('select_a_patient'); ?></option>
                            <?php
                            $patients = $this->db->get('patient')->result_array();
                            foreach ($patients as $row2):
                                ?>
                                <option value="<?php echo $row2['patient_id']; ?>">
                                    <?php echo $row2['name']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('Admission_date'); ?></label>

                    <div class="col-sm-5">
                        <div class="input-group">
                            <span class="input-group-addon"><i style="color: black" class="entypo-calendar"></i></span>
                            <input type="text" class="form-control datepicker" name="creation_timestamp" >
                        </div>
                    </div>
                </div>

              

                <div class="form-group">
                    <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('Deposit'); ?></label>

                    <div class="col-sm-5">
                        <div class="input-group">
                            <span class="input-group-addon"><i style="color: black" class="fa fa-inr"></i></span>
                            <input type="text" class="form-control" name="deposit" value="" >
                        </div>
                    </div>
                </div>
              

             

                

                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-8">
                        <button type="submit" class="btn btn-info" id="submit-button">
                            <?php echo get_phrase('create_new_invoice'); ?></button>
                        <span id="preloader-form"></span>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
 
<script>
$(document).ready(function(){
     $("#paid_total").change(function() {
         $paid_total= parseFloat($('#paid_total').val());
         $grand_total= parseFloat($('#grand_total').val());
         if($paid_total > $grand_total){
             alert('Entered Amount is more than Grand Total...!');
             $('#paid_total').val('');
              $('#remain_total').val('');
         }
         else if($paid_total <= $grand_total){
             $remain_total=($grand_total-$paid_total);
             $('#remain_total').val($remain_total);
             $rem= parseFloat($('#remain_total').val());
             if($rem==0){
                    $(function () {
                    $('#status').val('paid');
                    //alert(1);
                    $("#status option[value='paid']").attr("selected", true);
                    $("#status option[value='unpaid']").attr("disabled", true);
                    $("#status option[value='partially_paid']").attr("disabled", true);
                });
             }
             else if($rem > 0 && $rem!=$grand_total){
                  $(function () {
                 $('#status').val('partially_paid');
                 //alert(3);
                  $("#status option[value='partially_paid']").attr("selected", true);
                   $("#status option[value='unpaid']").attr("disabled", true);
                    $("#status option[value='paid']").attr("disabled", true);
              });
             }
             else if($rem == $grand_total){
                 $(function () {
                 $('#status').val('unpaid');
                // alert(2);
                 $("#status option[value='unpaid']").attr("selected", true);
                  $("#status option[value='partially_paid']").attr("disabled", true);
                    $("#status option[value='paid']").attr("disabled", true);
             });
             }
             
         }
         
     });
});
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