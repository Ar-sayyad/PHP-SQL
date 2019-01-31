<?php
$menu_check                 = $param3;
$patient_info               = $this->db->get('patient')->result_array();
$single_prescription_info   = $this->db->get_where('newprescription', array('newpres_id' => $param2))->result_array();
foreach ($single_prescription_info as $row) {
?>
<style>
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
                        <h3><?php echo get_phrase('edit_new_prescription'); ?></h3>
                    </div>
                </div>

                <div class="panel-body">

                    <form role="form" class="form-horizontal form-groups-bordered"  method="post" 
                        action="<?php echo base_url(); ?>index.php?doctor/newprescription/update/<?php echo $row['newpres_id']; ?>/<?php echo $menu_check; ?>/<?php echo $row['patient_id']; ?>"
                        enctype="multipart/form-data">

                        <div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('date'); ?> <span style="color:red">*</span></label>

                            <div class="col-sm-7">
                                <div class="date-and-time">
                                    <input type="text" required="" name="date_timestamp" class="form-control datepicker" data-format="D, dd MM yyyy" 
                                           placeholder="date here" value="<?php echo date("d/m/Y h:i a", $row['timestamp']); ?>">
                                    <input type="hidden" name="time_timestamp" class="form-control timepicker" data-template="dropdown" 
                                           data-show-seconds="false" data-default-time="00:05 AM" data-show-meridian="false" 
                                           data-minute-step="5"  placeholder="time here" value="<?php echo date("H", $row['timestamp']); ?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="field-ta" class="col-sm-3 control-label"><?php echo get_phrase('patient'); ?> <span style="color:red">*</span></label>

                            <div class="col-sm-7">
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
                        <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('charges'); ?> <span style="color:red">*</span></label>

                        <div class="col-sm-5">
                            <input type="number" required="" value="<?php echo $row['charges'];?>" name="charges" placeholder="Doctor Charges in Rupees" min="1" class="form-control" id="field-1" >
                        </div>
                    </div>
                        <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('blood_pressure'); ?></label>

                        <div class="col-sm-5">
                            <input type="text"  name="blood_pressure" value="<?php echo $row['blood_pressure'];?>"   placeholder="Blood Pressure"  class="form-control" id="field-1" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('weight'); ?></label>

                        <div class="col-sm-5">
                            <input type="text"  name="weight" value="<?php echo $row['weight'];?>" placeholder="Patient Weight in Kg" min="1" class="form-control" id="field-1" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('pulse'); ?></label>

                        <div class="col-sm-5">
                            <input type="text"  name="pulse" value="<?php echo $row['pulse'];?>" placeholder="Enter Pulse" min="1" class="form-control" id="field-1" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('select_BSL'); ?></label>

                        <div class="col-sm-5">
                            <select name="bsl" required="" class="select2">
                                <option value=""><?php echo get_phrase('select_BSL'); ?></option>
                                <option value="FF" <?php if($row['bsl']=='FF') echo 'selected';?>>FF</option>
                                <option value="PP" <?php if($row['bsl']=='PP') echo 'selected';?>>PP</option>
                            </select>
                        </div>
                    </div>
                        
                        <!-- INVOICE ENTRY STARTS HERE-->
                        <div class="col-sm-12" style="">
      <label for="field-1" style="float: left" class="col-sm-8 control-label"><?php echo get_phrase('Load_prescription'); ?> <span style="color:red">*</span></label>
      <br> <hr>
</div>
                    <div id="invoice_entry">
                        <?php
                        $medicine_entries = json_decode($row['medicine_entries']);
                        foreach ($medicine_entries as $medicine_entry) {
                            ?>
                            <div class="form-group">
                              

                                <div class="col-sm-4">
                                    <input type="search" required="" class="form-control search" name="entry_medicine[]" onkeyup="searchdata(this.value)"  
                                           value="<?php echo $medicine_entry->medicine; ?>" 
                                           placeholder="<?php echo get_phrase('medicine'); ?>" >
                                    <ul class="dropdown-menu txtcountry result"
                          style=""  role="menu" aria-labelledby="dropdownMenu"  id="DropdownCountry">
                         </ul>
                                </div>
                                <div class="col-sm-2">
                                    <input type="text" min="1"  class="form-control" name="entry_morning[]"  
                                           value="<?php echo $medicine_entry->morning; ?>" 
                                           placeholder="<?php echo get_phrase('morning'); ?>" >
                                </div>
                                <div class="col-sm-2">
                                    <input type="text" min="1"  class="form-control" name="entry_afternoon[]"  
                                           value="<?php echo $medicine_entry->afternoon; ?>" 
                                           placeholder="<?php echo get_phrase('afternoon'); ?>" >
                                </div>
                                <div class="col-sm-2">
                                    <input type="text" min="1"  class="form-control" name="entry_evening[]"  
                                           value="<?php echo $medicine_entry->evening; ?>" 
                                           placeholder="<?php echo get_phrase('evening'); ?>" >
                                </div>
                                <div class="col-sm-2">
                                    <button type="button" class="btn btn-default" onclick="deleteParentElement(this)">
                                        <i class="entypo-trash"></i>
                                    </button>
                                </div>

                            </div>
                            <?php
                        }
                        ?>
                    </div>
                    <!-- INVOICE ENTRY ENDS HERE-->
                     <!-- TEMPORARY INVOICE ENTRY STARTS HERE-->
                    <div id="invoice_entry_temp">
                    <div class="form-group">
                     <div class="col-sm-4">
                       <input type="search" required="" class="form-control search" name="entry_medicine[]" onkeyup="searchdata(this.value)"  value="" 
                                   placeholder="<?php echo get_phrase('Select medicine'); ?>" >
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
                    <!-- TEMPORARY INVOICE ENTRY ENDS HERE-->


                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-8">
                            <button type="button" class="btn btn-default btn-sm btn-icon icon-left"
                                    onClick="add_entry()">
                                        <?php echo get_phrase('add_entry'); ?>
                                <i class="entypo-plus"></i>
                            </button>
                        </div>
                    </div>

                    <hr>
                        <div class="col-sm-3 control-label col-sm-offset-2">
                            <input type="submit" class="btn btn-success" value="Update">
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