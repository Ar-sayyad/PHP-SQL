<?php
$edit_data      = $this->db->get_where('selling', array('selling_id' => $param2))->result_array();
foreach ($edit_data as $row):
$patient_info   = $this->db->get_where('patient' , array('patient_id' => $row['patient_id'] ))->result_array();
?>
    <div id="sale_print">
        <table width="100%" border="0">
            <tr>
                <td align="left" valign="top">
                    <?php foreach ($patient_info as $row2){ ?>
                        <?php echo 'Patient Name: '.strtoupper($row2['name']); ?><br>
                        
                    <?php } ?>
                </td>
                <td align="right" valign="top">
                    <?php $dname = $this->db->get_where('pharmacist' , array('pharmacist_id' => $row['pharmacist_id'] ))->row()->name;
                          echo 'Pharmacist: '.strtoupper($dname);?><br>
                    <?php echo 'Date: '. $row['date']; ?><br>
                </td>
            </tr>
        </table>
        <hr>
        <div class="row">
            <div class="col-md-12">

                <div class="panel panel-primary" data-collapsed="0">
                        
                    <div class="panel-body">
                     
                         
                  <h4><?php echo get_phrase('Medicine_entries'); ?></h4>
        <table class="table table-bordered" width="100%" border="1" style="border-collapse:collapse;">
            <thead>
                <tr>
                    <th class="text-center">#</th>
                    <th width="60%"><?php echo get_phrase('Medicine'); ?></th>
                    <th><?php echo get_phrase('unit_price'); ?></th>
                    <th><?php echo get_phrase('quantity'); ?></th>
                    <th><?php echo get_phrase('total'); ?></th>
                </tr>
            </thead>

            <tbody>
                <!-- INVOICE ENTRY STARTS HERE-->
            <div id="invoice_entry">
               <?php   //echo $row['medicine_entries']; 
                        $currency_symbol    = '<i class="fa fa-inr"></i>';
                         $medicine_entries   = json_decode($row['medicine_entries']);
                         $total_amount       = 0;
                $i = 1;
                foreach ($medicine_entries as $medicine_entry)
                {
                    $total_amount += $medicine_entry->total; ?>
                    <tr>
                        <td class="text-center"><?php echo $i++; ?></td>
                        <td>
                            <?php
                            $mname = $this->db->get_where('medicine' , array('medicine_id' => $medicine_entry->medicine ))->row()->name;
                            echo $mname; ?>
                        </td>
                        <td>
                            <?php echo $currency_symbol . $medicine_entry->price; ?>
                        </td>
                        <td>
                            <?php echo $medicine_entry->quantity; ?>
                        </td>
                        <td class="text-right">
                            <?php echo $currency_symbol . $medicine_entry->total; ?>
                        </td>
                                               
                    </tr>
                <?php } 
                ?>
                    <tr>
                        <td colspan="5" class="text-right">
                            <h4>Grand Total : <?php echo $currency_symbol . $total_amount; ?></h4>
                        </td>
                    </tr>
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

    <a onClick="PrintElem('sale_print')" class="btn btn-primary btn-icon icon-left hidden-print">
        Print
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