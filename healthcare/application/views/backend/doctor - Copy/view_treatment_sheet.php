<?php
$edit_data      = $this->db->get_where('treatment_sheet', array('treatment_sheet_id' => $param2))->result_array();
foreach ($edit_data as $row):
$patient_info   = $this->db->get_where('patient' , array('patient_id' => $row['patient_id'] ))->result_array();
?>
    <div id="prescription_print">
        <table width="100%" border="0">
            <tr>
                <td align="left" valign="top">
                    <?php foreach ($patient_info as $row2){ ?>
                        <?php echo 'Patient Name: '.strtoupper($row2['name']); ?><br>
                        <?php echo 'Age: '.$row2['age']; ?><br>
                        <?php echo 'Sex: '.strtoupper($row2['sex']); ?><br>
                         

                    <?php $bed_id = $this->db->get_where('bed_allotment' , array('bed_allotment_id' => $row['bed_allotment_id'] ))->row()->bed_id;
                        $bed_number = $this->db->get_where('bed' , array('bed_id' => $bed_id ))->row()->bed_number;
                        echo 'Bed No:'.$bed_number;?>


                    <?php $type = $this->db->get_where('bed' , array('bed_id' => $bed_id ))->row()->type;

                    $name = $this->db->get_where('bed_category' , array('bed_category_id' => $type ))->row()->name;

                        echo'-'. $name;?><br>
                        <?php echo'Date: '. $row['date_given'];?>
              
                    <?php } ?>
                </td>
                <td align="right" valign="top">
                    <?php $dname = $this->db->get_where('doctor' , array('doctor_id' => $row['doctor_id'] ))->row()->name;
                          echo 'Doctor Name: '.strtoupper($dname);?><br>
                          <?php $dphone = $this->db->get_where('doctor' , array('doctor_id' => $row['doctor_id'] ))->row()->phone;
                          echo 'Phone: '.$dphone;?><br>
                </td>
            </tr>
        </table>
        <hr>
        <div class="row">
            <div class="col-md-12">

                <div class="panel panel-primary" data-collapsed="0">
                        
                    <div class="panel-body">
                     
                         
                  <h4><?php echo get_phrase('treatment_sheet'); ?></h4>
        <table class="table table-bordered" width="100%" border="1" style="border-collapse:collapse;">
            <thead>
                <tr>
                    <th class="text-center">#</th>
                    <th width="60%"><?php echo get_phrase('Medicine & I/V Fluid'); ?></th>
                    <th><?php echo get_phrase('Route'); ?></th>
                    <th colspan="4"><?php echo get_phrase('time_of_administration'); ?></th>
                    
                </tr>
            </thead>

            <tbody>
                <!-- INVOICE ENTRY STARTS HERE-->
            <div id="invoice_entry">
               <?php   //echo $row['medicine_entries']; 
                         $treatment_entries   = json_decode($row['treatment_entry']);
                $i = 1;
                foreach ($treatment_entries as $medicine_entry)
                {
                    //$total_amount += $invoice_entry->amount; ?>
                    <tr>
                        <td class="text-center"><?php echo $i++; ?></td>
                        <td>
                            <?php echo strtoupper($medicine_entry->medicine); ?>
                        </td>
                        <td>
                            <?php echo $medicine_entry->route; ?>
                        </td>
                        <td>
                            <?php echo $medicine_entry->time_one; ?>
                        </td>
                        <td>
                            <?php echo $medicine_entry->time_two; ?>
                        </td>
                        <td>
                            <?php echo $medicine_entry->time_three; ?>
                        </td>
                        <td>
                            <?php echo $medicine_entry->time_four; ?>
                        </td>
                        
                    </tr>
                <?php } 
                ?>
            </div>
            </tbody>
        </table>
                        

                    </div>

                </div>

            </div>
        </div>
        <br>
        <br>
        
        <div style="float: right;">
            <span style="float: right;">---------------------------------------------------</span>
            <br> <span style="float: right;margin-right: 50px"><b><?php  echo $dname;?></b></span>
                <br>
            <?php echo $this->db->get_where('settings', array('type' => 'system_name'))->row()->description; ?>
            </div>
    </div>
    <br>

   <a onClick="PrintElem('prescription_print')" class="btn btn-primary btn-icon icon-left hidden-print">
        Print Prescription
        <i class="entypo-doc-text"></i>
    </a>
<?php endforeach; ?>

   

<link rel="stylesheet" href="assets/css/neon-theme.css" type="text/css" />
<link rel="stylesheet" href="assets/js/datatables/responsive/css/datatables.responsive.css" type="text/css" />
<script type="text/javascript">
function PrintElem(el){
    
	var restorepage = document.body.innerHTML;
	var printcontent = document.getElementById(el).innerHTML;
	document.body.innerHTML = printcontent;
        
	window.print();
	document.body.innerHTML = restorepage;
        window.location.reload();
      // return true;
}
    

    
</script>