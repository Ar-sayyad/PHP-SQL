<?php
$edit_data = $this->db->get_where('invoice', array('invoice_id' => $param2))->result_array();
foreach ($edit_data as $row):
?>
    <div id="invoice_print">
        <table width="100%" border="0">
            <tr>
                <td width="50%"><img src="assets/images/logo.png" style="max-height:80px;"></td>
                <td align="right">
                    <h4><?php echo get_phrase('invoice_number'); ?> : <?php echo $row['invoice_number']; ?></h4>
                    <h5><?php echo get_phrase('admission'); ?> : <?php echo $row['creation_timestamp']; ?></h5>
                    <h5><?php echo get_phrase('discharge'); ?> : <?php echo $row['due_timestamp']; ?></h5>
                    <h5><?php echo get_phrase('status'); ?> : <?php echo get_phrase($row['status']); ?></h5>
                </td>
            </tr>
        </table>
        <hr>
        <table width="100%" border="0">    
            <tr>
                <td align="left"><h4><?php echo get_phrase('payment_to'); ?> </h4></td>
                <td align="right"><h4><?php echo get_phrase('bill_to'); ?> </h4></td>
            </tr>

            <tr>
                <td align="left" valign="top">
                    <?php echo $this->db->get_where('settings', array('type' => 'system_name'))->row()->description; ?><br>
                    <?php echo $this->db->get_where('settings', array('type' => 'address'))->row()->description; ?><br>
                    <?php echo $this->db->get_where('settings', array('type' => 'phone'))->row()->description; ?><br> 
                    <?php echo'email : '. $this->db->get_where('settings', array('type' => 'paypal_email'))->row()->description; ?><br> 
                </td>
                <td align="right" valign="top">
                    <?php echo get_phrase($this->db->get_where('patient', array('patient_id' => $row['patient_id']))->row()->name); ?><br>
                    <?php echo $this->db->get_where('patient', array('patient_id' => $row['patient_id']))->row()->address; ?><br>
                    <?php echo $this->db->get_where('patient', array('patient_id' => $row['patient_id']))->row()->phone; ?><br>
                </td>
            </tr>
        </table>
        <hr>
        <h4><?php echo get_phrase('invoice_entries'); ?></h4>
        <table class="table table-bordered" width="100%" border="1" style="border-collapse:collapse;">
            <thead>
                <tr>
                    <th class="text-center">#</th>
                    <th width="60%"><?php echo get_phrase('Description'); ?></th>
                    <th><?php echo get_phrase('qty'); ?></th>
                    <th><?php echo get_phrase('amount'); ?></th>
                    <th><?php echo get_phrase('total'); ?></th>
                </tr>
            </thead>

            <tbody>
                <!-- INVOICE ENTRY STARTS HERE-->
            <div id="invoice_entry">
                <?php
                $system_currency_id = $this->db->get_where('settings', array('type' => 'system_currency_id'))->row()->description;
                $currency_symbol    = '<i class="fa fa-inr"></i>';//$this->db->get_where('currency', array('currency_id' => $system_currency_id))->row()->currency_symbol;
                $total_amount       = 0;
                $invoice_entries    = json_decode($row['invoice_entries']);
                $i = 1;
                foreach ($invoice_entries as $invoice_entry)
                {
                    $total_amount += $invoice_entry->amount; ?>
                    <tr>
                        <td class="text-center"><?php echo $i++; ?></td>
                        <td>
                            <?php echo $invoice_entry->description; ?>
                        </td>
                        <td>
                            <?php echo $invoice_entry->qty; ?>
                        </td>
                        <td>
                            <?php echo $invoice_entry->amt; ?>
                        </td>
                        <td class="text-right">
                            <?php echo $currency_symbol . $invoice_entry->amount; ?>
                        </td>
                    </tr>
                <?php } 
                $grand_total = $this->crud_model->calculate_invoice_total_amount($row['invoice_number']); ?>
            </div>
            <!-- INVOICE ENTRY ENDS HERE-->
            </tbody>
        </table>
        <table width="100%" border="0">    
            <!--<tr>
                <td align="right" width="80%"><?php echo get_phrase('sub_total'); ?> :</td>
                <td align="right"><?php echo $currency_symbol . $total_amount; ?></td>
            </tr>-->
            <!--<tr>
                <td align="right" width="80%"><?php echo get_phrase('vat_percentage'); ?> :</td>
                <td align="right"><?php echo $row['vat_percentage']; ?>% </td>
            </tr>
            <tr>
                <td align="right" width="80%"><?php echo get_phrase('discount'); ?> :</td>
                <td align="right"><?php echo $currency_symbol . $row['discount_amount']; ?> </td>
            </tr>-->
           
            <tr>
                <td align="right" width="80%"><h4><?php echo get_phrase('grand_total'); ?> :</h4></td>
                <td align="right"><h4><?php echo $currency_symbol . $grand_total; ?> </h4></td>
            </tr>
            <tr>
                <td colspan="2"><hr style="margin:0px;"></td>
            </tr>
            <tr>
                <td align="right" width="80%"><h4><?php echo get_phrase('deposit'); ?> :</h4></td>
                <td align="right"><h4><?php echo $currency_symbol . $row['deposit']; ?> </h4></td>
            </tr>
            <tr>
                <td colspan="2"><hr style="margin:0px;"></td>
            </tr>
            <tr>
                <td align="right" width="80%"><h4><?php echo get_phrase('Payable_total'); ?> :</h4></td>
                <td align="right"><h4><?php echo $currency_symbol . ($grand_total-$row['deposit']); ?> </h4></td>
            </tr>
            <tr>
                <td colspan="2"><hr style="margin:0px;"></td>
            </tr>
            <tr>
                <td align="right" width="80%"><h4><?php echo get_phrase('paid_total'); ?> :</h4></td>
                <td align="right"><h4><?php echo $currency_symbol . $row['paid_total']; ?> </h4></td>
            </tr>
            <tr>
                <td colspan="2"><hr style="margin:0px;"></td>
            </tr>
            <tr>
                <td align="right" width="80%"><h4><?php echo get_phrase('remain_total'); ?> :</h4></td>
                <td align="right"><h4><?php echo $currency_symbol . $row['remain_total']; ?> </h4></td>
            </tr>
        </table>

         <br>
        <br>
         <?php $doctor_id        = $this->session->userdata('login_user_id');
         $dname = $this->db->get_where('doctor' , array('doctor_id' => $doctor_id ))->row()->name;?>
        <div style="float: right;">
            <span style="float: right;">---------------------------------------------------</span>
            <br> <span style="float: right;margin-right: 50px"><b><?php  echo $dname;?></b></span>
                <br>
            <?php echo $this->db->get_where('settings', array('type' => 'system_name'))->row()->description; ?>
            </div>
    </div>
    <br>

    <a onClick="PrintElem('invoice_print')" class="btn btn-primary btn-icon icon-left hidden-print">
        Print Invoice
        <i class="entypo-doc-text"></i>
    </a>


<?php endforeach; ?>







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