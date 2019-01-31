<?php $admin_info = $this->db->get_where('tbl_vendor', array('vendor_id' => $param2))->result_array();
 foreach ($admin_info as $row) {

?>
<!-- Styles -->
<link href="<?php echo base_url();?>mypanel/assets/css/lib/calendar2/pignose.calendar.min.css" rel="stylesheet">      
   <section id="main-content">
        
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card alert">
                                <div class="card-body">
                                    <div class="card-header m-b-20">
                                        <h4>Change Profile Info</h4>                                        
                                    </div>
                                </div>
                                <form action="<?php echo base_url();?>Vendor/profile/updateAdminProfile/<?php echo $row['vendor_id'];?>" method="post" enctype="multipart/form-data">   
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="col-md-4">
                                            <div class="basic-form">
                                                <div class="form-group">
                                                        <label>Name <span class="required">*</span></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="basic-form">
                                                <div class="form-group">
                                                    <input type="text" name="vendor_name" required="" class="form-control" value="<?php echo $row['vendor_name'];?>" placeholder="Name"/>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4">
                                            <div class="basic-form">
                                                <div class="form-group">
                                                        <label>Email <span class="required">*</span></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="basic-form">
                                                <div class="form-group">
                                                    <input type="email" name="vendor_email" readonly required=""  class="form-control" value="<?php echo $row['vendor_email'];?>" placeholder="Email Address"/>
                                                </div>
                                            </div>
                                        </div>                                        
                                        
                                        <div class="col-md-4">
                                            <div class="basic-form">
                                                <div class="form-group">
                                                        <label>Contact No <span class="required">*</span></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="basic-form">
                                                <div class="form-group">
                                                    <input type="text" name="vendor_contact" readonly required="" class="form-control" pattern="[0-9]{10,10}" maxlength="10" minlength="10" value="<?php echo $row['vendor_contact'];?>" placeholder="Contact Number"/>
                                                </div>
                                            </div>
                                        </div>                                        
                                            <div class="col-md-4">
                                            <div class="basic-form">
                                                <div class="form-group">
                                                        <label>Alternate Contact No </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="basic-form">
                                                <div class="form-group">
                                                    <input type="text" name="vendor_alternate_contact" class="form-control" pattern="[0-9]{10,10}" maxlength="10" minlength="10" value="<?php echo $row['vendor_alternate_contact'];?>" placeholder="Alternate Contact Number"/>
                                                </div>
                                            </div>
                                        </div>                                        
                                            
                                        
                                        
                                        <div class="col-md-4">
                                            <div class="basic-form">
                                                <div class="form-group">
                                                        <label>City</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="basic-form">
                                                <div class="form-group">
                                                     <input type="text" name="city" class="form-control" value="<?php echo $row['city'];?>" placeholder="City"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="basic-form">
                                                <div class="form-group">
                                                        <label>Address</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="basic-form">
                                                <div class="form-group">
                                                    <textarea name="vendor_address" class="form-control" placeholder="Address"><?php echo $row['vendor_address'];?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4">
                                            <div class="basic-form">
                                                <div class="form-group">
                                                        <label>Pincode</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="basic-form">
                                                <div class="form-group">
                                                     <input type="text" name="pincode"  pattern="[0-9]{6,6}" maxlength="6" class="form-control" value="<?php echo $row['pincode'];?>" placeholder="Pincode"/>
                                                </div>
                                            </div>
                                        </div>  
                                       
                                      
                                    <div class="col-md-12">
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-info btn-lg  border-none sbmt-btn"><i class="ti-pencil-alt"></i> Update Profile</button>
                                            <button type="button" class="btn btn-primary btn-lg border-none sbmt-btn" data-dismiss="modal"><i class="ti-close"></i> Close</button>
                                        </div>  
                                   </div>
                                </div>                                
                                </form>
                            </div>
                        </div>
                    </div>
              
   </section>
 <?php } ?>

<!--    <script src="<?php echo base_url();?>mypanel/assets/js/lib/calendar-2/moment.latest.min.js"></script>
     scripit init
    <script src="<?php echo base_url();?>mypanel/assets/js/lib/calendar-2/semantic.ui.min.js"></script>
     scripit init
    <script src="<?php echo base_url();?>mypanel/assets/js/lib/calendar-2/prism.min.js"></script>
     scripit init
    <script src="<?php echo base_url();?>mypanel/assets/js/lib/calendar-2/pignose.calendar.min.js"></script>
     scripit init
    <script src="<?php echo base_url();?>mypanel/assets/js/lib/calendar-2/pignose.init.js"></script>
     scripit init-->