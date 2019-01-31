<?php
$data = $this->db->get_where('data')->result_array();
$edit_data = $this->db->get_where('invoice', array('invoice_id' => $param2))->result_array();
$patient_info               = $this->db->get('patient')->result_array();
foreach ($edit_data as $row):
?>
 <style>
    .modal-dialog {
    width: 900px !important;
    padding-top: 30px;
    padding-bottom: 30px;
}
.txtcountry{
        margin-left: 15px;
    margin-right: 10px;
    padding: 5px 5px 3px 5px;
    margin-top: -1px;
    font-size: 14px;
    width: 87%;
    text-transform: capitalize;
}
.search{
    
    font-size: 14px;
    
    text-transform: capitalize;
}
</style>
   <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary" data-collapsed="0">
                <div class="panel-heading">
                    <div class="panel-title" >
                        <i class="entypo-plus-circled"></i>
                        <?php echo get_phrase('edit_invoice'); ?>
                    </div>
                </div>
                <div class="panel-body">

                    <form role="form" class="form-horizontal form-groups validate invoice-edit" action="<?php echo base_url(); ?>index.php?doctor/invoice_manage/update/<?php echo $param2;?>" method="post" enctype="multipart/form-data">
 <?php //echo form_open('index.php?accountant/invoice_manage/update/' . $param2, array('class' => 'form-horizontal form-groups validate invoice-edit', 'enctype' => 'multipart/form-data')); ?>

                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('invoice_title'); ?> <span style="color:red">*</span></label>

                        <div class="col-sm-5">
                            <input type="text" required="" class="form-control" name="title" id="title" data-validate="required" 
                                   data-message-required="<?php echo get_phrase('value_required'); ?>" 
                                   value="<?php echo $row['title']; ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('invoice_number'); ?></label>

                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="invoice_number"  value="<?php echo $row['invoice_number']; ?>"  readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('patient'); ?> <span style="color:red">*</span></label>

                        <div class="col-sm-5">
                            <select name="patient_id" required="" class="select2">
                                <option value=""><?php echo get_phrase('select_patient'); ?></option>
                                    <?php foreach ($patient_info as $row2) { ?>
                                            <option value="<?php echo $row2['patient_id']; ?>" <?php if ($row['patient_id'] == $row2['patient_id']) echo 'selected'; ?>>
                                                <?php echo $row2['name']; ?>
                                            </option>
                                    <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('Admission_date'); ?></label>

                        <div class="col-sm-5">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="entypo-calendar"></i></span>
                                <input type="text" class="form-control datepicker" name="creation_timestamp"  
                                       value="<?php echo $row['creation_timestamp']; ?>" >
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('discharge_date'); ?></label>

                        <div class="col-sm-5">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="entypo-calendar"></i></span>
                                <input type="text" class="form-control datepicker" name="due_timestamp"  
                                       value="<?php echo $row['due_timestamp']; ?>" >
                            </div>
                        </div>
                    </div>

                   <!-- <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('vat_percentage'); ?></label>

                        <div class="col-sm-5">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="entypo-info-circled"></i></span>
                                
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('discount_amount'); ?></label>

                        <div class="col-sm-5">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="entypo-info-circled"></i></span>
                                
                            </div>
                        </div>
                    </div>
                   -->
                   <input type="hidden" class="form-control" name="vat_percentage"  
                                       value="<?php echo $row['vat_percentage']; ?>" >
                    <input type="hidden" class="form-control" name="discount_amount"  
                                       value="<?php echo $row['discount_amount']; ?>" >

                    <hr>
                    <!-- INVOICE ENTRY STARTS HERE-->
                    
                    <div id="invoice_entry">
                        <?php
                        $invoice_entries = json_decode($row['invoice_entries']);
                        $sr=1;
                        foreach ($invoice_entries as $invoice_entry) {
                            
                            ?>
                        
                            <div class="form-group">
                                <label for="field-1" class="col-sm-3 control-label">
                                    <?php echo get_phrase('invoice_entry'); ?> <span style="color:red">*</span></label>

                                <div class="col-sm-3">
                                    <select name="entry_description[]" required="" class="form-control">
                                <option value=""><?php echo get_phrase('select_Description'); ?></option>
                                    <?php foreach ($data as $row3){ ?>
                                         <option value="<?php echo $row3['name']; ?>" <?php if($row3['name']==$invoice_entry->description) {echo 'selected';} ?>><?php echo $row3['name']; ?></option>
                                     <?php   } ?>
                                 </select>
                                    
                                </div>
                                 <div class="col-sm-1">
                            	<input type="number" required="" min="1" style="width:60px" class="form-control qty<?php echo $sr; ?>" name="entry_qty[]" 
                                   value="<?php echo $invoice_entry->qty; ?>" placeholder="<?php echo get_phrase('qty'); ?>" >
                        </div>
					
                        <div class="col-sm-1">
                            <input type="text" required="" style="width:60px" class="form-control amt amt<?php echo $sr; ?>" name="entry_amt[]"
                                  value="<?php echo $invoice_entry->amt; ?>"  placeholder="<?php echo get_phrase('amt'); ?>" >
                        </div>
                                <div class="col-sm-2">
                                    <input type="text" required="" readonly class="form-control total total<?php echo $sr; ?>" name="entry_amount[]"  
                                           value="<?php echo $invoice_entry->amount; ?>" 
                                           placeholder="<?php echo get_phrase('amount'); ?>" >
                                </div>
                                 <script>
					$(document).ready(function(){
					   
					      $(".qty<?php echo $sr; ?>").on('change', function() {
					        $qty=$(".qty<?php echo $sr; ?>").val();
					         $amt=$(".amt<?php echo $sr; ?>").val();
					          $total=$qty*$amt;
					        //$qty=$(this).val();
					       // alert($total);
					         $(".total<?php echo $sr; ?>").val($total);
					         });
					      $(".amt<?php echo $sr; ?>").on('keyup', function() {
					        $qty=$(".qty<?php echo $sr; ?>").val();
					         $amt=$(".amt<?php echo $sr; ?>").val();
					          $total=$qty*$amt;
					        //$qty=$(this).val();
					        //alert($total);
					         $(".total<?php echo $sr; ?>").val($total);
					         });
					  });
					</script>
                                <div class="col-sm-2">
                                    <button type="button" class="btn btn-default" onclick="deleteParentElement(this)">
                                        <i class="entypo-trash"></i>
                                    </button>
                                </div>

                            </div>
                            <?php
                            $sr++;
                        }
                        ?>
                        
                    </div>
                    <!-- INVOICE ENTRY ENDS HERE-->

                    <!-- TEMPORARY INVOICE ENTRY STARTS HERE-->
                    <div id="invoice_entry_temp">
                        <div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('invoice_entry'); ?> <span style="color:red">*</span></label>

                            <div class="col-sm-3">
                                <select name="entry_description[]" required="" class="form-control">
                                <option value=""><?php echo get_phrase('select_Description'); ?></option>
                           <?php foreach ($data as $row3){ ?>
                             <option value="<?php echo $row3['name']; ?>"><?php echo $row3['name']; ?></option>
                        <?php   } ?>
                              </select>
                            </div>
                             <div class="col-sm-1">
                            <input type="number" required="" min="1" style="width:60px" class="form-control qty1" name="entry_qty[]"  value="1" 
                                   placeholder="<?php echo get_phrase('qty'); ?>" >
                        </div>
					
                        <div class="col-sm-1">
                            <input type="text" required="" style="width:60px" class="form-control amt amt1" name="entry_amt[]"  value="" 
                                   placeholder="<?php echo get_phrase('amt'); ?>" >
                        </div>
                            <div class="col-sm-2">
                                <input type="text" required="" readonly class="form-control total total1" name="entry_amount[]"  value="" 
                                       placeholder="<?php echo get_phrase('amount'); ?>" >
                            </div>
                             <script>
					$(document).ready(function(){
					   
					      $(".qty1:last").on('change', function() {
					        $qty1=$(".qty1:last").val();
					         $amt1=$(".amt1:last").val();
					          $total1=$qty1*$amt1;
					        //$qty=$(this).val();
					       // alert($total);
					         $(".total1:last").val($total1);
                                                 $deposit=parseFloat($('#deposit').val());
                                                    $grand_total=parseFloat($('#grand_total').val());
                                                    $pay=($grand_total-$deposit);
                                                    $payable_total=$('#payable_total').val($pay);
					         });
					      $(".amt1:last").on('keyup', function() {
					        $qty1=$(".qty1:last").val();
					         $amt1=$(".amt1:last").val();
					          $total1=$qty1*$amt1;
					        //$qty=$(this).val();
					        //alert($total);
					         $(".total1:last").val($total1);
                                                 $deposit=parseFloat($('#deposit').val());
                                                    $grand_total=parseFloat($('#grand_total').val());
                                                   $pay=($grand_total-$deposit);
                                                    $payable_total=$('#payable_total').val($pay);
					         });
                                                  $(".amt").on('keyup',  function() {
                                                  var sum = 0;
                                                    $(".total").each(function(){
                                                        sum += +$(this).val();
                                                    });
                                                    
                                                    $("#grand_total").val(sum);
                                                    $deposit=parseFloat($('#deposit').val());
                                                    $grand_total=parseFloat($('#grand_total').val());
                                                    $pay=($grand_total-$deposit);
                                                    $payable_total=$('#payable_total').val($pay);
                                                    
                                                });
					  });
					</script>
                            <div class="col-sm-2">
                                <button type="button" class="btn btn-default" onclick="deleteParentElement(this)">
                                    <i class="entypo-trash"></i>
                                </button>
                            </div>

                        </div>
                    </div>
                    <!-- TEMPORARY INVOICE ENTRY ENDS HERE-->


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
                        <input type="text" class="form-control" value="<?php echo $row['grand_total']; ?>" name="grand_total" id="grand_total" readonly>
                    </div>
                </div>
                    
                     <div class="form-group">
                    <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('Deposit'); ?></label>

                    <div class="col-sm-5">
                        <input type="text" class="form-control" value="<?php echo $row['deposit']; ?>" name="deposit" id="deposit" readonly>
                    </div>
                </div>
                    <div class="form-group">
                    <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('payable_total'); ?></label>

                    <div class="col-sm-5">
                        <input type="text" class="form-control" value="<?php echo $row['grand_total']-$row['deposit']; ?>" name="payable_total" id="payable_total" readonly>
                    </div>
                </div>
                    
                <div class="form-group">
                    <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('Paid_total'); ?></label>

                    <div class="col-sm-5">
                        <input type="text" class="form-control" value="<?php echo $row['paid_total']; ?>" name="paid_total" id="paid_total">
                    </div>
                </div>
                <div class="form-group">
                    <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('remain_total'); ?></label>

                    <div class="col-sm-5">
                        <input type="text" class="form-control" value="<?php echo $row['remain_total']; ?>" name="remain_total" id="remain_total" readonly>
                    </div>
                </div>
               
                    
                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('payment_status'); ?> <span style="color:red">*</span></label>

                        <div class="col-sm-5">
                            <select name="status" required="" id="status" class="form-control">
                                <option value="" disabled=""><?php echo get_phrase('select_a_status'); ?></option>
                                <option value="paid" <?php if ($row['status'] == 'paid') echo 'selected'; ?>>
                                    <?php echo get_phrase('paid'); ?>
                                </option>
                                <option value="unpaid"<?php if ($row['status'] == 'unpaid') echo 'selected'; ?>>
                                    <?php echo get_phrase('unpaid'); ?>
                                </option>
                                <option value="partially_paid"<?php if ($row['status'] == 'partially_paid') echo 'selected'; ?>>
                                    <?php echo get_phrase('partially_paid'); ?>
                                </option>
                            </select>
                        </div>
                    </div>
                    
                <hr>
               
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-8">
                            <button type="submit" class="btn btn-info" id="submit-button">
                                <?php echo get_phrase('update_invoice'); ?></button>
                            <span id="preloader-form"></span>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>	



<script>
$(document).ready(function(){
     $("#paid_total").change(function() {
         $paid_total= parseFloat($('#paid_total').val());
         $payable_total= parseFloat($('#payable_total').val());
         if($paid_total > $payable_total){
             alert('Entered Amount is more than Grand Total...!');
             $('#paid_total').val('');
              $('#remain_total').val('');
         }
         else if($paid_total <= $payable_total){
             $remain_total=($payable_total-$paid_total);
             $('#remain_total').val($remain_total);
             $rem= parseFloat($('#remain_total').val());
             if($rem==0){
                    $(function () {
                    $('#status').val('paid');
                    //alert(1);
                    $("#status option[value='paid']").attr("selected", true);
                    //$("#status option[value='unpaid']").attr("disabled", true);
                   // $("#status option[value='partially_paid']").attr("disabled", true);
                });
             }
             else if($rem > 0 && $rem!=$payable_total){
                  $(function () {
                 $('#status').val('partially_paid');
                 //alert(3);
                  $("#status option[value='partially_paid']").attr("selected", true);
                  // $("#status option[value='unpaid']").attr("disabled", true);
                   // $("#status option[value='paid']").attr("disabled", true);
              });
             }
             else if($rem == $payable_total){
                 $(function () {
                 $('#status').val('unpaid');
                // alert(2);
                 $("#status option[value='unpaid']").attr("selected", true);
                 // $("#status option[value='partially_paid']").attr("disabled", true);
                  //  $("#status option[value='paid']").attr("disabled", true);
             });
             }
             
         }
         
     });
});
    // CREATING BLANK INVOICE ENTRY
    var blank_invoice_entry = '';
    $(document).ready(function () {
        blank_invoice_entry = $('#invoice_entry_temp').html();
        $('#invoice_entry_temp').remove();
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