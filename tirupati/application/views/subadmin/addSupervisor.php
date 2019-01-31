<!-- Styles -->
    <link href="<?php echo base_url();?>mypanel/assets/css/lib/calendar2/pignose.calendar.min.css" rel="stylesheet">
       <section id="main-content">
        
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card alert">
                                <div class="card-body">
                                    <div class="card-header m-b-20">
                                        <h4>Add Supervisor</h4>                                        
                                    </div>
                                </div>
                                <form action="<?php echo base_url();?>Subadmin/supervisors/addSupervisor" method="post">   
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                    <label>Supervisor Name <span class="required">*</span></label>
                                                    <input type="text"  name="supervisor_name" required="" class="form-control border-none input-flat  bg-ash" placeholder="Supervisor Name">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                    <label>Contact No.<span class="required">*</span></label>
                                                    <input type="text"  name="supervisor_contact" required="" pattern="[0-9]{10,10}" maxlength="10" minlength="10"  class="form-control border-none input-flat  bg-ash" placeholder="Contact Number">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                    <label>Email <span class="required">*</span></label>
                                                    <input type="email"  name="supervisor_email" required="" class="form-control border-none input-flat  bg-ash" placeholder="Email Address">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                    <label>Alternate No.</label>
                                                    <input type="text"  name="supervisor_alternet_contact" pattern="[0-9]{10,10}" maxlength="10" minlength="10" autocomplete="off" class="form-control border-none input-flat  bg-ash" placeholder="Alternate Number">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                <label>Address</label>
                                                <textarea class="form-control border-none input-flat bg-ash"  placeholder="Enter Supervisor Address" rows="6" name="supervisor_address"></textarea>
                                            </div>
                                        </div>
                                    </div>  
                                    <div class="col-md-6">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                    <label>Password <span class="required">*</span></label>
                                                    <input type="password"  name="pass" required="" autocomplete="off" class="form-control border-none input-flat  bg-ash" placeholder="Password">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                    <label>Confirm Password <span class="required">*</span></label>
                                                    <input type="password"  name="cpass" required="" autocomplete="off" class="form-control border-none input-flat  bg-ash" placeholder="Confirm Password">
                                            </div>
                                        </div>
                                    </div>
                                                      
                                                                       
                                    <div class="col-md-12">
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-info btn-lg  border-none sbmt-btn"><i class="ti-save"></i> Add Supervisor</button>
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
