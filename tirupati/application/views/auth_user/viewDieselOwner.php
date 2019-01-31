<?php  $sites=$this->db->get('sites')->result(); 
 $diesel_owner_info = $this->db->get_where('vehicle_owner', array('vehicle_owner_id' => $param2))->result_array();
 foreach ($diesel_owner_info as $row) {
     $test_entries    = json_decode($row['site_id']);
     $diesel_vehicles_info = $this->db->get_where('tbl_vehicle', array('vehicle_owner_id' => $param2))->result_array();
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
                                        <h4>Diesel Owner Information</h4>                                        
                                    </div>
                                </div>
                               <div class="row">
                                     <table class="table table-bordered" style="">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <td><?php echo $row['owner_full_name']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Contact No</th>
                                            <td><?php echo $row['contact_no'];?></td>
                                        </tr>
                                        <tr>
                                            <th>Email</th>
                                            <td><?php echo $row['Email_id'];?></td>
                                        </tr>
                                        <tr>
                                            <th>Company Name</th>
                                            <td><?php echo $row['company_name'];?></td>
                                        </tr>
                                        <tr>
                                            <th>Vehicles</th>
                                         
                                            <td> 
                                                <table class="table table-bordered table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>Vehicle No</th>
                                                            <th style="text-align:left">Seat No.</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                           <?php foreach ($diesel_vehicles_info as $veh) { ?>
                                                        <tr>
                                                            <td><?php echo $veh['vehicle_no']?></td>
                                                            <td style="text-align:left"><?php echo $veh['seat_type']?></td>
                                                        </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </td>
                                    
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
                                </form>
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