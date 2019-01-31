<div id="invoice_print">
        <table width="100%" border="0">
            <tr>
                <td width="50%"><img src="assets/images/logo.png" style="max-height:80px;"></td>
                <td align="right">
                    &nbsp;
                </td>
            </tr>
        </table>
        <hr>
        <table width="100%" border="0">    
           
            <tr>
                <td align="left" valign="top">
                    <?php echo $this->db->get_where('settings', array('type' => 'system_name'))->row()->description; ?><br>
                    <?php echo $this->db->get_where('settings', array('type' => 'address'))->row()->description; ?><br>
                    <?php echo $this->db->get_where('settings', array('type' => 'phone'))->row()->description; ?><br> 
                    <?php echo'email : '. $this->db->get_where('settings', array('type' => 'paypal_email'))->row()->description; ?><br> 
                </td>
                <td align="right" valign="top">
                    <?php echo 'Operator: '. get_phrase($this->db->get_where('receptionist', array('receptionist_id' => $param2))->row()->name); ?><br>
                    <?php echo 'Address: '.$this->db->get_where('receptionist', array('receptionist_id' => $param2))->row()->address; ?><br>
                    <?php echo 'Phone: '.$this->db->get_where('receptionist', array('receptionist_id' => $param2))->row()->phone; ?><br>
                </td>
            </tr>
        </table>
        <hr>
        <h4><?php echo get_phrase('doctor_list'); ?></h4>
        <table class="table table-bordered" width="100%" border="1" style="border-collapse:collapse;">
            <thead>
                <tr>
                    <th class="text-center">#</th>
                    <th><?php echo get_phrase('name'); ?></th>
                    <th><?php echo get_phrase('email'); ?></th>
                    <th><?php echo get_phrase('phone'); ?></th>
                    
                </tr>
            </thead>

            <tbody>
                <!-- INVOICE ENTRY STARTS HERE-->
            <div id="invoice_entry">
                <?php
				$operator_data = $this->db->get_where('operator_list', array('receptionist_id' => $param2))->result_array();
				$i=1;
foreach ($operator_data as $row){?>
	<tr>
                        <td class="text-center"><?php echo $i; ?></td>
                        <td>
						<?php $name = $this->db->get_where('doctor' , array('doctor_id' => $row['doctor_id'] ))->row()->name;

                        echo ucwords($name);?>
                           
                        </td>
                        <td>
                            <?php $email = $this->db->get_where('doctor' , array('doctor_id' => $row['doctor_id'] ))->row()->email;

                        echo ucwords($email);?>
                        </td>
                        <td>
                            <?php $phone = $this->db->get_where('doctor' , array('doctor_id' => $row['doctor_id'] ))->row()->phone;

                        echo ucwords($phone);?>
                        </td>
                        
                    </tr>
<?php $i++; } ?>
                
            </div>
            <!-- INVOICE ENTRY ENDS HERE-->
            </tbody>
        </table>
        

         <br>
       
    </div>
    <br>

    <a onClick="PrintElem('invoice_print')" class="btn btn-primary btn-icon icon-left hidden-print">
        Print
        <i class="entypo-doc-text"></i>
    </a>










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