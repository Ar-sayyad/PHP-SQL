<!-- Styles -->
    <link href="<?php echo base_url();?>mypanel/assets/css/lib/calendar2/pignose.calendar.min.css" rel="stylesheet">
       <section id="main-content">
        
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card alert">
                                <div class="card-body">
                                    <div class="card-header m-b-20">
                                        <h4>Add Fuel Filler</h4>                                        
                                    </div>
                                </div>
                                <form action="<?php echo base_url();?>Vendor/fuelFillers/addFiller" method="post">   
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                    <label>Fuel Filler Name <span class="required">*</span></label>
                                                    <input type="text"  name="fillerboy_name" required="" class="form-control border-none input-flat  bg-ash" placeholder="Fuel Filler Name">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                    <label>Contact No.<span class="required">*</span></label>
                                                    <input type="text"  name="filler_contact" required="" pattern="[0-9]{10,10}" maxlength="10" minlength="10"  class="form-control border-none input-flat  bg-ash" placeholder="Contact Number">
                                            </div>
                                        </div>
                                    </div>
                                  
                                  
                                    <div class="col-md-6">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                    <label>Password <span class="required">*</span></label>
                                                    <input type="password"  name="password" required="" class="form-control border-none input-flat  bg-ash" placeholder="Password">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                    <label>Confirm Password <span class="required">*</span></label>
                                                    <input type="password"  name="confirm" required="" class="form-control border-none input-flat  bg-ash" placeholder="Confirm Password">
                                            </div>
                                        </div>
                                    </div>
                                    
                                   
                                    <div class="col-md-12">
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-info btn-lg  border-none sbmt-btn"><i class="ti-save"></i> Add Fuel Filler</button>
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
