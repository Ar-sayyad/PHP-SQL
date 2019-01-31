<?php
$edit_data      = $this->db->get_where('newprescription', array('newpres_id' => $param2))->result_array();
foreach ($edit_data as $row):
$patient_info   = $this->db->get_where('patient' , array('patient_id' => $row['patient_id'] ))->result_array();
?>
    <div id="prescription_print">
        <table width="100%" border="0">
            <tr>
                <td align="left" valign="top">
                    <?php foreach ($patient_info as $row2){ ?>
                        <?php echo 'Patient : '.ucwords($row2['name']); ?><br>
                        <?php echo 'Age : '.$row2['age']; ?><br>
                        <?php echo 'Aadhar No. : '.strtoupper($row2['aadhar_card']); ?><br>												 <?php $city = $this->db->get_where('city' , array('city_id' => $row2['city_id'] ))->row()->name;                          echo 'City : '.ucwords($city);?><br>
                    <?php } ?>
                </td>
                <td align="right" valign="top">
                    <?php $dname = $this->db->get_where('pharmacist' , array('pharmacist_id' => $row['pharmacist_id'] ))->row()->name;
                          echo 'Pharmacist : '.ucwords($dname);?><br>
                    <?php echo 'Date : '. $row['timestamp']; ?><br>
                </td>
            </tr>
        </table>
        <hr>
        <div class="row">
            <div class="col-md-12">

                <div class="panel panel-primary" data-collapsed="0">
                        
                    <div class="panel-body">
                     
                         
                  <h4><?php echo get_phrase('Rx.'); ?></h4>
        <table class="table table-bordered" width="100%" border="1" style="border-collapse:collapse;">
            <thead>
                <tr>
                    <th class="text-center">#</th>
                    <th width="60%"><?php echo get_phrase('Medicine'); ?></th>
                    <th><?php echo get_phrase('Morning'); ?></th>
                    <th><?php echo get_phrase('Afternoon'); ?></th>
                    <th><?php echo get_phrase('Evening'); ?></th>										<th><?php echo get_phrase('Doses'); ?></th>
                </tr>
            </thead>

            <tbody>
                <!-- INVOICE ENTRY STARTS HERE-->
            <div id="invoice_entry">
               <?php   //echo $row['medicine_entries']; 
                         $medicine_entries   = json_decode($row['medicine_entries']);
                $i = 1;
                foreach ($medicine_entries as $medicine_entry)
                { ?>
                    <tr>
                        <td class="text-center"><?php echo $i++; ?></td>
                        <td>
                            <?php echo strtoupper($medicine_entry->medicine); ?>
                        </td>
                        <td>
                            <?php echo $medicine_entry->morning; ?>
                        </td>
                        <td>
                            <?php echo $medicine_entry->afternoon; ?>
                        </td>
                        <td>
                            <?php echo $medicine_entry->evening; ?>
                        </td>						<td>                            <?php echo $medicine_entry->doses; ?>                        </td>
                        
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
            <span style="float: right;margin-right: 50px"><?php echo $this->db->get_where('settings', array('type' => 'system_name'))->row()->description; ?></span>
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