<?php $patient_info = $this->db->get('patient')->result_array(); ?>

      <script src="<?php echo base_url(); ?>assets/js/custom.js"></script>
  
<style type="text/css">
.modal-dialog {
    width: 750px !important;
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
                <div class="panel-title">
                    <h3><?php echo get_phrase('selling'); ?></h3>
                </div>
            </div>

            <div class="panel-body">

                <form role="form" class="form-horizontal form-groups-bordered" action="<?php echo base_url(); ?>index.php?pharmacist/selling/create" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('date'); ?><span style="color:red">*</span></label>
                        <?php date_default_timezone_set('Asia/Calcutta');?>
                        <div class="col-sm-5">
                            <div class="date-and-time">
                                <input type="text" required="" name="date" readonly="" value="<?php echo $date = date('d/m/Y', time()); ?>"  class="form-control" data-format="D, dd MM yyyy" placeholder="date here">
                               
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="field-ta" class="col-sm-3 control-label"><?php echo get_phrase('patient'); ?> <span style="color:red">*</span></label>

                        <div class="col-sm-5">
                            <select name="patient_id" required="" class="select2">
                                <option value=""><?php echo get_phrase('select_patient'); ?></option>
                                <?php foreach ($patient_info as $row) { ?>
                                        <option value="<?php echo $row['patient_id']; ?>"><?php echo $row['name']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                   
<!-- FORM ENTRY STARTS HERE-->
<div class="col-sm-12" style="">
    <h4><?php echo get_phrase('Add Medicine'); ?> </h4>
 </div>
<hr>
<div class="form-group" style="margin-top:-25px !important;">
         <div class="col-sm-4">
             <b> <label class="control-label" style="margin-left:  10px !important;">Medicine</label></b>
                     </div>
                     <div class="col-sm-1" style="width:70px;margin-right: 20px !important;margin-left: -20px">
                         <b>  <label class="control-label">Stock</label></b>
                     </div>
                     <div class="col-sm-1" style="width:70px;margin-right: 5px !important;">
                         <b><label class="control-label">Price</label></b>
                     </div>
                     <div class="col-sm-1" style="width:70px;margin-right: 20px !important;">
                         <b> <label class="control-label">Quantity</label></b>
                     </div>
          <div class="col-sm-2" style="width:80px;margin-right: 10px !important;">
              <b><label class="control-label">Total</label></b>
                     </div>
                      <div class="col-sm-2">
                           <b><label class="control-label">Delete</label></b>
                      </div>
      </div>
   

                <div id="invoice_entry">
                    <div class="form-group">
                     <div class="col-sm-4">
                         <input type="search" class="form-control search" name="entry_medicine[]"  onkeyup="searchdata(this.value)" placeholder="Enter Medicine" />
                          <input type="hidden" class="form-control med_id" name="medicine[]" placeholder="Enter Medicine" /> 
                          <ul class="dropdown-menu txtcountry result"
                          style=""  role="menu" aria-labelledby="dropdownMenu"  id="DropdownCountry">
                         </ul>
                        </div>
                        <div class="col-sm-1" style="margin-right: 20px !important;margin-left: -20px">
                            <input type="number" min="1" style="width:70px;" readonly="" class="form-control stk" name="stk[]"
                                   placeholder="<?php echo get_phrase('stock'); ?>" >
                        </div>
                         <div class="col-sm-1" style="margin-right: 20px !important;">
                             <input type="number" min="1" style="width:70px;" readonly=""  class="form-control uprice" name="uprice[]"
                                   placeholder="<?php echo get_phrase('price'); ?>" >
                        </div>
                        <div class="col-sm-1" style="margin-right: 20px !important;">
                            <input type="text" min="1" style="width:70px;" required="" class="form-control qty" name="qty[]" 
                                   placeholder="<?php echo get_phrase('qty'); ?>" >
                        </div>
                        <div class="col-sm-2">
                            <input type="number" min="1" style="width:80px" readonly="" class="form-control total" name="total[]" 
                                   placeholder="<?php echo get_phrase('total'); ?>" >
                        </div>
                        
                        <script>
					$(document).ready(function(){
					    $sum = 0;
					      $(".qty:last").on('keyup', function() {
					        $qty= parseFloat($(".qty:last").val());
                                                $stk= parseFloat($(".stk:last").val());
                                                if($qty > $stk){
                                                    alert('Entered Quantity is more than Stock...!');
                                                    $('.qty:last').val('');
                                                    $(".total:last").val('');
                                                     //$('#remain_total').val('');
                                                }
                                                else{
					         $amt= parseFloat($(".uprice:last").val());
					          $total=$qty*$amt;
					        //$qty=$(this).val();
					       // alert($total);
					         $(".total:last").val($total);
                                             }
                                                
					         });
					     
                                               $('.qty').keyup( function(){
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
                                    <?php echo get_phrase('add_entry'); ?>
                            <i class="entypo-plus"></i>
                        </button>
                       
                    </div>
                </div>
                
                    <div class="form-group">
                    <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('Grand_total'); ?></label>

                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="grand_total" id="grand_total" readonly>
                    </div>
                </div>
                
              
                    <div class="col-sm-3 control-label col-sm-offset-2">
                        <input type="submit" class="btn btn-success" value="Submit">
                        <!--<button type="button" onclick="alert('Be Patience. This is under construction....!')" class="btn btn-success"> Submit </button>-->
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
        //$('#invoice_entry_temp').remove();
    });

    function add_entry()
    {
        
        $("#invoice_entry").append(blank_invoice_entry);
    }
    $('#load_total').click( function(){
         var sum = 0;
          $(".total").each(function(){
              sum += +$(this).val();
          });
          $("#grand_total").val(sum);
    });
       
   

    // REMOVING INVOICE ENTRY
    function deleteParentElement(n) {
        n.parentNode.parentNode.parentNode.removeChild(n.parentNode.parentNode);
    }
    function searchdata(str){
        var str;
        //alert(str);
             $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>index.php?pharmacist/GetMedName/",
            data: {
                keyword: str
            },
            dataType: "json",
            success: function (data) {
                if (data.length > 0) {
                    $('.result').empty();
                    $('.result').attr("data-toggle", "dropdown");
                    $('.result').dropdown('toggle');
                }
                else if (data.length == 0) {
                    $('.result').attr("data-toggle", "");
                }
                $.each(data, function (key,value) {
                    if (data.length >= 0)
                       var name= value['name'];
                       var id= value['medicine_id'];
                       var qty= value['quantity'];
                       var price= value['price'];
                        $('.result').append('<li role="presentation" onclick="addmed(\'' +name+'\',\''+id+'\',\''+qty+'\',\''+price+'\')" style="cursor:pointer" data-id="name">' + name + '</li>');
                });
             }
            
        });
    }
 function addmed(str,id,qty,price){
     //alert(str);
    $('.search:last').val(str);
    $('.med_id:last').val(id);
    $('.stk:last').val(qty);
    $('.uprice:last').val(price);
   }
 
    </script>
   

 