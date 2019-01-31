<?php $vehicle_owner_info = $this->db->get_where('vehicle_owner', array('vehicle_owner_id' => $param2))->result_array();
 foreach ($vehicle_owner_info as $row) {
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
                                        <h4>Vehicle Owner Information</h4>                                        
                                    </div>
                                </div>
                                <form action="<?php echo base_url();?>Adminity/vehicleOwners/update/<?php echo $row['vehicle_owner_id'];?>" method="post">   
                                <div class="row">
                                     <table class="table table-bordered" style="">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <td><?php echo $row['owner_full_name'];?></td>
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
                                            <th>Alternate No</th>
                                            <td><?php echo $row['Alternat_no'];?></td>
                                        </tr>
                                        <tr>
                                            <th>Company Name</th>
                                            <td><?php echo $row['company_name'];?></td>
                                        </tr>
                                        <tr>
                                            <th>Business Site</th>
                                            <td><?php echo $row['business_site'];?></td>
                                        </tr>
                                        <tr>
                                            <th>Address</th>
                                            <td><?php echo $row['owner_address'];?></td>
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