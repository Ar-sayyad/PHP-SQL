<!-- Styles -->
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
                                <form action="<?php echo base_url();?>Subadmin/vendors/addVendor" method="post">   
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                    <label>Fuel Pump Name <span class="required">*</span></label>
                                                    <input type="text"  name="vendor_name" required="" class="form-control border-none input-flat  bg-ash" placeholder="Fuel Pump Name">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                    <label>Contact No.<span class="required">*</span></label>
                                                    <input type="text"  name="vendor_contact" required="" pattern="[0-9]{10,10}" maxlength="10" minlength="10"  class="form-control border-none input-flat  bg-ash" placeholder="Contact Number">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                    <label>Email <span class="required">*</span></label>
                                                    <input type="email"  name="vendor_email" required="" class="form-control border-none input-flat  bg-ash" placeholder="Email Address">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                    <label>Alternate No.</label>
                                                    <input type="text"  name="vendor_alternate_contact"  pattern="[0-9]{10,10}" maxlength="10" minlength="10"  class="form-control border-none input-flat  bg-ash" placeholder="Alternate Number">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                    <label>Password <span class="required">*</span></label>
                                                    <input type="password"  name="vendor_pass" required="" class="form-control border-none input-flat  bg-ash" placeholder="Password">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                    <label>Confirm Password <span class="required">*</span></label>
                                                    <input type="password"  name="vendor_cpass" required="" class="form-control border-none input-flat  bg-ash" placeholder="Confirm Password">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                <label>Address</label>
                                                <textarea class="form-control border-none input-flat bg-ash"  placeholder="Enter Vendor Address" rows="6" name="vendor_address"></textarea>
                                            </div>
                                        </div>
                                    </div>  
                                    
                                    <div class="col-md-6">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                <label>GSTIN No.</label>
                                                <input type="text" name="GST_NO" class="form-control border-none input-flat bg-ash" placeholder="GSTIN Number">
                                            </div>
                                        </div>
                                    </div>                      
                                          
                                    <div class="col-md-6">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                <label>Todays Fuel Rate (<i class="fa fa-inr"></i>)<span class="required">*</span></label>
                                                <input type="text" name="todays_rate" class="form-control border-none input-flat bg-ash" placeholder="Current Fuel Rate">
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="col-md-12">
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-info btn-lg  border-none sbmt-btn"><i class="ti-save"></i> Add Fuel Pump</button>
                                            <button type="button" class="btn btn-primary btn-lg border-none sbmt-btn" data-dismiss="modal"><i class="ti-close"></i> Close</button>
                                        </div>  
                                   </div>
                                </div>                                
                                </form>
                            </div>
                        </div>
                    </div>
                  
                    
         
                    
   </section>

    <!-- scripit init-->
