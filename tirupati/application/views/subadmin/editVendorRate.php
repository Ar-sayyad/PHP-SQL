<?php $vendor_info = $this->db->get_where('tbl_vendor', array('vendor_id' => $param2))->result_array();
 foreach ($vendor_info as $row) {
?><!-- Styles -->
    <link href="<?php echo base_url();?>mypanel/assets/css/lib/calendar2/pignose.calendar.min.css" rel="stylesheet">
       <section id="main-content">
        
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card alert">
                                <div class="card-body">
                                    <div class="card-header m-b-20">
                                        <h4>Update Fuel Rate</h4>                                        
                                    </div>
                                </div>
                                <form action="<?php echo base_url();?>Subadmin/vendors/editVendorRate/<?php echo $row['vendor_id'];?>" method="post">   
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                    <label>Fuel Pump Name <span class="required">*</span></label>
                                                    <input type="text"  name="vendor_name" value="<?php echo $row['vendor_name'];?>" readonly="" required="" class="form-control border-none input-flat  bg-ash" placeholder="Fuel Pump Name">
                                            </div>
                                        </div>
                                    </div>
                                                                       
                                    <div class="col-md-6">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                <label>Todays Rate (<i class="fa fa-inr"></i>)<span class="required">*</span></label>
                                                <input type="text" name="todays_rate" value="<?php echo $row['todays_rate'];?>" class="form-control border-none input-flat bg-ash" placeholder="Todays Rate">
                                            </div>
                                        </div>
                                    </div>                      
                                                                       
                                    <div class="col-md-12">
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-info btn-lg  border-none sbmt-btn"><i class="ti-pencil-alt"></i> Update Fuel Rate</button>
                                            <button type="button" class="btn btn-primary btn-lg border-none sbmt-btn" data-dismiss="modal"><i class="ti-close"></i> Close</button>
                                        </div>  
                                   </div>
                                </div>                                
                                </form>
                            </div>
                        </div>
                    </div>
                  
                    
         
                    
   </section>
 <?php }?>
    <!-- scripit init-->
