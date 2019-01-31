<?php $patient_info = $this->db->get_where('patient', array('patient_id' => $param2))->result_array();?>

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
                    <h3><?php echo get_phrase('new_prescription'); ?></h3>
                </div>
            </div>

            <div class="panel-body">

                <form role="form" class="form-horizontal form-groups-bordered" action="<?php echo base_url(); ?>index.php?doctor/newprescription/create" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('date'); ?><span style="color:red">*</span></label>
                        <?php date_default_timezone_set('Asia/Calcutta');?>
                        <div class="col-sm-5">
                            <div class="date-and-time">
                                <input type="text" required="" name="date_timestamp" readonly="" value="<?php echo $date = date('d/m/Y h:i a', time()); ?>"  class="form-control" data-format="D, dd MM yyyy" placeholder="date here">
                                <input type="hidden" name="time_timestamp" class="form-control timepicker" data-template="dropdown" data-show-seconds="false" data-default-time="00:05 AM" data-show-meridian="false" data-minute-step="5"  placeholder="time here">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="field-ta" class="col-sm-3 control-label"><?php echo get_phrase('patient'); ?> <span style="color:red">*</span></label>

                        <div class="col-sm-5">
                            <select name="patient_id" required="" class="select2">
                                <option value="" disabled><?php echo get_phrase('select_patient'); ?></option>
                                <?php foreach ($patient_info as $row) { ?>
                                        <option value="<?php echo $row['patient_id']; ?>" <?php if($row['patient_id']==$param2) { echo 'selected';} else {} ?>><?php echo $row['name']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    
					<div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('doses_per_day'); ?></label>

                        <div class="col-sm-5">
                            <input type="text"  name="doses" placeholder="Doses per Day" class="form-control" id="field-1" >
                        </div>
                    </div>


<!-- FORM ENTRY STARTS HERE-->
<div class="col-sm-12" style="">
      <label for="field-1" style="float: left" class="col-sm-8 control-label"><?php echo get_phrase('Load_prescription'); ?> <span style="color:red">*</span></label>
      <br> <hr>
</div>
                <div id="invoice_entry">
                    <div class="form-group">
                     <div class="col-sm-4">
                         <input type="search" class="form-control search" name="entry_medicine[]"  onkeyup="searchdata(this.value)" placeholder="Enter Medicine" /> 
                          <ul class="dropdown-menu txtcountry result"
                          style=""  role="menu" aria-labelledby="dropdownMenu"  id="DropdownCountry">
                         </ul>
                        </div>
                         <div class="col-sm-2">
                             <input type="number" min="1" class="form-control" name="entry_morning[]"  value="" 
                                   placeholder="<?php echo get_phrase('morn.qty'); ?>" >
                        </div>
                        <div class="col-sm-2">
                            <input type="number" min="1" class="form-control" name="entry_afternoon[]"  value="" 
                                   placeholder="<?php echo get_phrase('aft.qty'); ?>" >
                        </div>
                        <div class="col-sm-2">
                            <input type="number" min="1"  class="form-control" name="entry_evening[]"  value="" 
                                   placeholder="<?php echo get_phrase('even.qty'); ?>" >
                        </div>
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

    // REMOVING INVOICE ENTRY
    function deleteParentElement(n) {
        n.parentNode.parentNode.parentNode.removeChild(n.parentNode.parentNode);
    }
    function searchdata(str){
        var str;
        //alert(str);
             $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>index.php?doctor/GetMedName/",
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
                        $('.result').append('<li role="presentation" onclick="addmed(\'' +name+'\')" style="cursor:pointer" data-id="name">' + name + '</li>');
                });
             }
            
        });
    }
 function addmed(str){
     //alert(str);
    $('.search:last').val(str);
   }
 
    </script>
   

 