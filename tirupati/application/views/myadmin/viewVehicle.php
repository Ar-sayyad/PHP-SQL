<?php $vehicle_info = $this->db->get_where('tbl_vehicle', array('vehicle_id' => $param2))->result_array();
 foreach ($vehicle_info as $row) {
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
                                        <h4>Vehicle Information</h4>                                        
                                    </div>
                                </div>
                                <div class="row">
                                     <table class="table table-bordered" style="">
                                    <thead>
                                        <tr>
                                            <th>Vehicle No</th>
                                            <td><?php echo $row['vehicle_no'];?></td>
                                        </tr>
                                        <tr>
                                            <th>Owner Name</th>
                                            <td><?php echo ucwords($this->tadmin_model->getVehicleOwnerName($row['vehicle_owner_id']));?></td>
                                        </tr>
                                        <tr>
                                            <th>Fuel Limit(<i class="fa fa-inr"></i>)</th>
                                            <td><i class="fa fa-inr"></i><?php echo $row['fuel_limit'];?></td>
                                        </tr>
                                        <tr>
                                            <th>Description</th>
                                            <td><?php echo $row['description'];?></td>
                                        </tr>
                                        <tr>
                                            <th>Assigned Sites</th>
                                            <td> 
                                                <table class="table table-bordered table-striped">
                                                            <tbody>
                                                                <?php $test_entries    = json_decode($row['site_id']);
                                                                $sr=1; foreach ($test_entries as $site_id)
                                                            { ?>
                                                            <tr>
                                                                <td style="width: 10%"><?php echo $sr;?></td>
                                                                <td style="text-align: left"><?php echo $this->admin->getSiteName($site_id);?></td>
                                                            </tr>                                        
                                                            <?php $sr++; } ?>
                                                            </tbody>
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