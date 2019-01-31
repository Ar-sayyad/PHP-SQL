<?php  $sites=$this->db->get('sites')->result(); 
$owner = $this->db->get('vehicle_owner')->result_array();
?>
<!-- Styles -->
  <section id="main-content">
        
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card alert">
                                <div class="card-body">
                                    <div class="card-header m-b-20">
                                        <h4>Add Vehicle</h4>                                        
                                    </div>
                                </div>
                                <form action="<?php echo base_url();?>Adminity/vehicles/addVehicle" method="post">   
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                    <label>Vehicle No <span class="required">*</span></label>
                                                    <input type="text"  name="vehicle_no" required="Use Proper Format of Vehicle Number" maxlength="13" pattern="^[A-Z]{2} [0-9]{2} [A-Z]{1,2} [0-9]{4}$" class="form-control border-none input-flat  bg-ash" placeholder="Ex.MH 12 XY 0000 / MH 12 X 0000">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                <label>Select Vehicle Owner <span class="required">*</span></label>
                                                <select class="form-control etype" required="" name="vehicle_owner_id" id="vehicle_owner_id">
                                                    <option value=""> ---Select Vehicle Owner--- </option>
                                                    <?php
                                                    foreach($owner as $row)
                                                    {?>
                                                     <option value="<?php echo $row['vehicle_owner_id'];?>"><?php echo $row['owner_full_name'];?></option>
                                                    <?php }
                                                    ?>
                                                </select> 
                                               
                                            </div>
                                        </div>
                                    </div>  
                                
                                    <div class="col-md-6">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                <label>Fuel Limit (<i class="fa fa-inr"></i>)<span class="required">*</span></label>
                                                <input type="text" name="fuel_limit" required="" class="form-control border-none input-flat bg-ash" placeholder="Fuel Limit">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                <label>Seat Qty</label>
                                                <input type="text" name="seat_type" class="form-control border-none input-flat bg-ash"  placeholder="Seat Qty">
                                            </div>
                                        </div>
                                    </div>        
                                    <div class="col-md-3">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                    <label>Select Sites: <span class="required">*</span></label>                                                    
                                            </div>
                                        </div>
                                    </div>
                                     <div class="col-md-9"> 
                                                        <?php                       
                                                        foreach($sites as $each)
                                                        { 
                                                         ?>                                         
                                                        <div class="col-md-6">                                                            
                                                        <div class="basic-form">
                                                           <div class="form-group">
                                                             <input type="checkbox" style="height: 17px;width: 17px;" name="site_id[]" value="<?php echo $each->site_id;?>"> <?php echo $each->site_name;?>
                                                           </div>
                                                        </div>
                                                        </div>                                                        
                                                        <?php }
                                                        ?> 
                                         </div>    
                                                                       
                                    <div class="col-md-12">
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-info btn-lg  border-none sbmt-btn"><i class="ti-save"></i> Add Vehicle</button>
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
