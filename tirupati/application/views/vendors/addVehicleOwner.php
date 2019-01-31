<!-- Styles -->
    <link href="<?php echo base_url();?>mypanel/assets/css/lib/calendar2/pignose.calendar.min.css" rel="stylesheet">
    
    <section id="main-content">
        
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card alert">
                                <div class="card-body">
                                    <div class="card-header m-b-20">
                                        <h4>Add Vehicle Owner</h4>                                        
                                    </div>
                                </div>
                                <form action="<?php echo base_url();?>Subadmin/addVehicleOwner" method="post">   
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                    <label>Name <span class="required">*</span></label>
                                                    <input type="text"  name="owner_name" required="" class="form-control border-none input-flat  bg-ash" placeholder="Vehicle Owner Name">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                <label>Contact No <span class="required">*</span></label>
                                                <input type="text" name="owner_contact" required="" pattern="[0-9]{10,10}" maxlength="10" minlength="10" class="form-control border-none input-flat bg-ash" placeholder="Contact Number">
                                            </div>
                                        </div>
                                    </div>                                  
                                    
                                
                                    <div class="col-md-6">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                <label>Email </label>
                                                <input type="email" name="owner_email" class="form-control border-none input-flat bg-ash" placeholder="Email Address">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                         <div class="basic-form">
                                            <div class="form-group">
                                                <label>Alternate Contact No</label>
                                                <input type="text" name="alternat_contact" pattern="[0-9]{10,10}" maxlength="10" minlength="10"  class="form-control border-none input-flat bg-ash" placeholder="Alternate Contact No">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                <label>Address</label>
                                                <textarea class="form-control border-none input-flat bg-ash"  placeholder="Enter Owner Address with Proper Details" rows="6" name="owner_address"></textarea>
                                            </div>
                                        </div>
                                    </div>                                   
                                                                  
                                    <div class="col-md-6">
                                         <div class="basic-form">
                                            <div class="form-group">
                                                <label>Company Name</label>
                                                <input type="text" name="company_name"  class="form-control border-none input-flat bg-ash" placeholder="Company Name">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                         <div class="basic-form">
                                            <div class="form-group">
                                                <label>Business Site</label>
                                                <input type="text" name="business_site"  class="form-control border-none input-flat bg-ash" placeholder="Business Site URL">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-info btn-lg  border-none sbmt-btn"><i class="ti-save"></i> Add Vehicle Owner</button>
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

<!--
    <script src="<?php echo base_url();?>mypanel/assets/js/lib/calendar-2/moment.latest.min.js"></script>
     scripit init
    <script src="<?php echo base_url();?>mypanel/assets/js/lib/calendar-2/semantic.ui.min.js"></script>
     scripit init
    <script src="<?php echo base_url();?>mypanel/assets/js/lib/calendar-2/prism.min.js"></script>
     scripit init
    <script src="<?php echo base_url();?>mypanel/assets/js/lib/calendar-2/pignose.calendar.min.js"></script>
     scripit init
    <script src="<?php echo base_url();?>mypanel/assets/js/lib/calendar-2/pignose.init.js"></script>
     scripit init-->
