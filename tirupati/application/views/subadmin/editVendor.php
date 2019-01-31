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
                                        <h4>Add Fuel Pump</h4>                                        
                                    </div>
                                </div>
                                <form action="<?php echo base_url();?>Subadmin/vendors/editVendor/<?php echo $row['vendor_id'];?>" method="post">   
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                    <label>Fuel Pump Name <span class="required">*</span></label>
                                                    <input type="text"  name="vendor_name" value="<?php echo $row['vendor_name'];?>" required="" class="form-control border-none input-flat  bg-ash" placeholder="Fuel Pump Name">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                    <label>Contact No.<span class="required">*</span></label>
                                                    <input type="text"  name="vendor_contact" value="<?php echo $row['vendor_contact'];?>" readonly  required="" pattern="[0-9]{10,10}" maxlength="10" minlength="10"  class="form-control border-none input-flat  bg-ash" placeholder="Contact Number">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                    <label>Email <span class="required">*</span></label>
                                                    <input type="email"  name="vendor_email" value="<?php echo $row['vendor_email'];?>" readonly required="" class="form-control border-none input-flat  bg-ash" placeholder="Email Address">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                    <label>Alternate No.</label>
                                                    <input type="text"  name="vendor_alternate_contact" value="<?php echo $row['vendor_alternate_contact'];?>"  pattern="[0-9]{10,10}" maxlength="10" minlength="10"  class="form-control border-none input-flat  bg-ash" placeholder="Alternate Number">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                <label>Address</label>
                                                <textarea class="form-control border-none input-flat bg-ash"  placeholder="Enter Vendor Address" rows="2" name="vendor_address"><?php echo $row['vendor_address'];?></textarea>
                                            </div>
                                        </div>
                                    </div>  
                                    
                                    <div class="col-md-6">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                <label>GSTIN No.</label>
                                                <input type="text" name="GST_NO" value="<?php echo $row['GST_NO'];?>" class="form-control border-none input-flat bg-ash" placeholder="GSTIN Number">
                                            </div>
                                        </div>
                                    </div>                      
                                                                       
                                    <div class="col-md-12">
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-info btn-lg  border-none sbmt-btn"><i class="ti-pencil-alt"></i> Update Fuel Pump</button>
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
