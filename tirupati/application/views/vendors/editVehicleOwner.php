<?php $vehicle_owner_info = $this->db->get_where('vehicle_owner', array('vehicle_owner_id' => $param2))->result_array();
 foreach ($vehicle_owner_info as $row) {
?>

    <section id="main-content">
        
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card alert">
                                <div class="card-body">
                                    <div class="card-header m-b-20">
                                        <h4>Update Vehicle Owner</h4>                                        
                                    </div>
                                </div>
                                <form action="<?php echo base_url();?>Subadmin/vehicleOwners/update/<?php echo $row['vehicle_owner_id'];?>" method="post">   
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                    <label>Name <span class="required">*</span></label>
                                                    <input type="text"  name="owner_name" value="<?php echo $row['owner_full_name'];?>" required="" class="form-control border-none input-flat  bg-ash" placeholder="Vehicle Owner Name">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                <label>Contact No <span class="required">*</span></label>
                                                <input type="text" name="owner_contact" value="<?php echo $row['contact_no'];?>" required="" pattern="[0-9]{10,10}" maxlength="10" minlength="10" class="form-control border-none input-flat bg-ash" placeholder="Contact No">
                                            </div>
                                        </div>
                                    </div>                                  
                                    
                                
                                    <div class="col-md-6">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                <label>Email </label>
                                                <input type="email" name="owner_email" value="<?php echo $row['Email_id'];?>" class="form-control border-none input-flat bg-ash" placeholder="Email Address">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                         <div class="basic-form">
                                            <div class="form-group">
                                                <label>Alternate Contact No</label>
                                                <input type="text" name="alternat_contact" value="<?php echo $row['Alternat_no'];?>" pattern="[0-9]{10,10}" maxlength="10" minlength="10"  class="form-control border-none input-flat bg-ash" placeholder="Alternate Contact No">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                <label>Address</label>
                                                <textarea class="form-control border-none input-flat bg-ash"  placeholder="Enter Owner Address with Proper Details" rows="6" name="owner_address"><?php echo $row['owner_address'];?></textarea>
                                            </div>
                                        </div>
                                    </div>                                   
                                                                  
                                    <div class="col-md-6">
                                         <div class="basic-form">
                                            <div class="form-group">
                                                <label>Company Name</label>
                                                <input type="text" name="company_name" value="<?php echo $row['company_name'];?>" class="form-control border-none input-flat bg-ash" placeholder="Company Name">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                         <div class="basic-form">
                                            <div class="form-group">
                                                <label>Business Site</label>
                                                <input type="text" name="business_site" value="<?php echo $row['business_site'];?>"  class="form-control border-none input-flat bg-ash" placeholder="Business Site URL">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-info btn-lg  border-none sbmt-btn"><i class="ti-pencil-alt"></i> Update Vehicle Owner</button>
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
<?php }?>
