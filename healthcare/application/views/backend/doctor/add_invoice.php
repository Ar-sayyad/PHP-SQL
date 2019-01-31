<?php $data = $this->db->get_where('data')->result_array(); ?>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title" >
                    <i class="entypo-plus-circled"></i>
                    <?php echo get_phrase('add_invoice'); ?>
                </div>
            </div>
            <div class="panel-body">
                <form role="form" class="form-horizontal form-groups validate invoice-add" action="<?php echo base_url(); ?>index.php?doctor/invoice_add/create" method="post" enctype="multipart/form-data">
                <?php //echo form_open('index.php?accountant/invoice_add/create', array('class' => 'form-horizontal form-groups validate invoice-add', 'enctype' => 'multipart/form-data')); ?>

                <div class="form-group">
                    <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('invoice_title'); ?> <span style="color:red">*</span></label>

                    <div class="col-sm-5">
                        <input type="text" required="" class="form-control" name="title" id="title" data-validate="required" 
                               data-message-required="<?php echo get_phrase('value_required'); ?>" value="" autofocus>
                    </div>
                </div>

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
                            <span class="input-group-addon"><i class="entypo-calendar"></i></span>
                            <input type="text" class="form-control datepicker" name="creation_timestamp" >
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('discharge_date'); ?> <span style="color:red">*</span></label>

                    <div class="col-sm-5">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="entypo-calendar"></i></span>
                            <input type="text" required="" class="form-control datepicker" name="due_timestamp"  
                                   value="" >
                        </div>
                    </div>
                </div>

               <!-- <div class="form-group">
                    <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('vat_percentage'); ?></label>

                    <div class="col-sm-5">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="entypo-info-circled"></i></span>
                            <input type="text" class="form-control" name="vat_percentage"  
                                   value="" >
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('discount_amount'); ?></label>

                    <div class="col-sm-5">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="entypo-info-circled"></i></span>
                            <input type="text" class="form-control" name="discount_amount"  
                                   value="" >
                        </div>
                    </div>
                </div>
               -->
               <input type="hidden" class="form-control" name="vat_percentage"  
                                   value="" >
                 <input type="hidden" class="form-control" name="discount_amount"  
                                   value="" >

                <hr>

                <!-- FORM ENTRY STARTS HERE-->
                <div id="invoice_entry">
                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('invoice_entry'); ?> <span style="color:red">*</span></label>

                        <div class="col-sm-3">
                            <select name="entry_description[]" required="" class="form-control">
                                <option value=""><?php echo get_phrase('select_Description'); ?></option>
                           <?php foreach ($data as $row){ ?>
                             <option value="<?php echo $row['name']; ?>"><?php echo $row['name']; ?></option>
                        <?php   } ?>
                              </select>
                            
                        </div>
                        <div class="col-sm-1">
                            <input type="number" required="" min="1" class="form-control qty" name="entry_qty[]"  value="1" 
                                   placeholder="<?php echo get_phrase('qty'); ?>" >
                        </div>
					
                        <div class="col-sm-1">
                            <input type="text" required="" class="form-control amt" name="entry_amt[]"  value="" 
                                   placeholder="<?php echo get_phrase('amt'); ?>" >
                        </div>
                        <div class="col-sm-2">
                            <input type="text" required="" readonly class="form-control total" name="entry_amount[]"  value="" 
                                   placeholder="<?php echo get_phrase('total'); ?>" >
                        </div>
                        <script>
					$(document).ready(function(){
					    $sum = 0;
					      $(".qty:last").on('change', function() {
					        $qty=$(".qty:last").val();
					         $amt=$(".amt:last").val();
					          $total=$qty*$amt;
					        //$qty=$(this).val();
					       // alert($total);
					         $(".total:last").val($total);
                                                
                                                
					         });
					      $(".amt:last").on('keyup', function() {
					        $qty=$(".qty:last").val();
					         $amt=$(".amt:last").val();
					          $total=$qty*$amt;
					        //$qty=$(this).val();
					        //alert($total);
					         $(".total:last").val($total);
                                              
                                                
					         });
                                               
                                                $(".amt").on('keyup',  function() {
                                                  var sum = 0;
                                                    $(".total").each(function(){
                                                        sum += +$(this).val();
                                                    });
                                                    $("#grand_total").val(sum);
                                                });
                                             //$('#grand_total').val($sum);
                                                 
                                                
					  });
                                           
					</script>
                        <div class="col-sm-2">
                            <button type="button" class="btn btn-default" onclick="deleteParentElement(this)">
                                <i class="entypo-trash"></i>
                            </button>
                        </div>

                    </div>
                </div>
                <!-- FORM ENTRY ENDS HERE-->
                 <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-8">
                        <button type="button" class="btn btn-default btn-sm btn-icon icon-left"
                                onClick="add_entry()">
                                    <?php echo get_phrase('add_invoice_entry'); ?>
                            <i class="entypo-plus"></i>
                        </button>
                    </div>
                </div>
                <hr>
                    <div class="form-group">
                    <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('Grand_total'); ?></label>

                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="grand_total" id="grand_total" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('Paid_total'); ?></label>

                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="paid_total" id="paid_total">
                    </div>
                </div>
                <div class="form-group">
                    <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('remain_total'); ?></label>

                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="remain_total" id="remain_total" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('payment_status'); ?> <span style="color:red">*</span></label>

                    <div class="col-sm-5">
                        <select name="status" required="" id="status" class="form-control">
                            <option value="" disabled="" selected><?php echo get_phrase('select_a_status'); ?></option>
                            <option value="paid"><?php echo get_phrase('paid'); ?></option>
                            <option value="unpaid"><?php echo get_phrase('unpaid'); ?></option>
                            <option value="partially_paid"><?php echo get_phrase('partially_paid'); ?></option>
                        </select>
                    </div>
                </div>
                <hr>
               

                

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