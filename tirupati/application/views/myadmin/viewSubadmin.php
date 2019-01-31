<?php $subadmin_info = $this->db->get_where('tbl_subadmin', array('subadmin_id' => $param2))->result_array();
 foreach ($subadmin_info as $row) {
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
                                        <h4>Subadmin Information</h4>                                        
                                    </div>
                                </div>
                                <div class="row">
                                     <table class="table table-bordered" style="">
                                    <thead>
                                        <tr>
                                            <th>Subadmin Name</th>
                                            <td><?php echo $row['subadmin_name'];?></td>
                                        </tr>
                                        <tr>
                                            <th>Contact No.</th>
                                            <td><?php echo $row['subadmin_contact'];?></td>
                                        </tr>
                                        <tr>
                                            <th>Alternate No.</th>
                                            <td><?php echo $row['subadmin_alt_contact'];?></td>
                                        </tr>
                                        <tr>
                                            <th>Email</th>
                                            <td><?php echo $row['subadmin_email'];?></td>
                                        </tr>                                        
                                        <tr>
                                            <th>Address</th>
                                            <td><?php echo $row['address'];?></td>
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