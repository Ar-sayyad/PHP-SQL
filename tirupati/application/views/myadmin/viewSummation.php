<?php $summation_info = $this->db->get_where('summation', array('sum_id' => $param2))->result_array();
 foreach ($summation_info as $row) {
?>
<style>
        .required{
            color:red;
        }
    </style>
    <section id="main-content">
        
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card alert">
                                <div class="card-body">
                                    <div class="card-header m-b-20">
                                        <h4>Summation Summary</h4>                                        
                                    </div>
                                </div>
                                <div class="row">
                                     <table class="table table-bordered" style="">
                                    <thead>
                                        <tr>
                                            <th>Vehicle Owner Name</th>
                                            <td><?php echo ucwords($this->tadmin_model->getVehicleOwnerName($row['vehicle_owner_id']));?></td>
                                        </tr>
                                        <tr>
                                            <th>Vehicle No</th>
                                            <td><?php echo $row['vehicle_no'];?></td>
                                        </tr>
                                        
                                        <tr>
                                            <th>Seat Qty.</th>
                                            <td><?php echo $row['seat_type'];?></td>
                                        </tr>
                                        
                                        <tr>
                                            <th style="width: 30%">Company</th>
                                            <td><?php echo $this->admin->getSiteName($row['site_id']);?></td>
                                        </tr>
                                        <tr>
                                            <th>Route</th>
                                            <td><?php echo $row['route'];?></td>
                                        </tr>
                                        <tr>
                                            <th>Month</th>
                                            <td><?php echo $row['month'];?></td>
                                        </tr>
                                        <tr>
                                            <th>From</th>
                                            <td><?php echo $row['from_date'];?></td>
                                        </tr>
                                         <tr>
                                            <th>To</th>
                                            <td><?php echo $row['to_date'];?></td>
                                        </tr>
                                        <tr>
                                            <th style="width: 30%">Summation</th>
                                            <td> 
                                                <table class="table table-bordered table-striped">
                                                                <thead>
                                                                <tr>
                                                                    <th>Sr.</th>
                                                                    <th>Sum List</th>
                                                                    <th style="text-align: left">Amount</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                <?php $sum_entries    = json_decode($row['sumlist']);
                                                                $sr=1; foreach ($sum_entries as $sum)
                                                            { ?>
                                                            <tr>
                                                                <td style="width: 10%"><?php echo $sr;?></td>
                                                                <td style="text-align: left;width: 60%"><?php echo $sum->sum_name;?></td>
                                                                <td style="text-align: left"><?php echo $sum->sum;?></td>
                                                            </tr>                                        
                                                            <?php $sr++; } ?>
                                                            </tbody>
                                                             <thead>
                                                            <tr>
                                                                <th colspan="2" style="text-align: right"><b>Total Amount:</b></th>
                                                                <th style="text-align: left"><b><i class="fa fa-inr"></i><?php echo $row['total'];?></b></th>
                                                            </tr>
                                                             </thead>
                                                            
                                                    </table></td>
                                        </tr>
                                        
                                    </thead>
                                    
                                </table>                                   
                                    <div class="modal-footer">
                                        <button type="button" onClick="PrintElem('main-content')" class="btn btn-info btn-lg  border-none sbmt-btn"><i class="ti-printer"></i> Print</button>
                                            <button type="button" class="btn btn-primary btn-lg border-none sbmt-btn" data-dismiss="modal"><i class="ti-close"></i> Close</button>
                                        </div> 
                                </div>                                
                              
                            </div>
                        </div>
                    </div>
                  
                    
         
                    
   </section>

    <!-- scripit init-->
<?php }?>
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