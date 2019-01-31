<?php 
$driver_info = $this->db->get('tbl_driver')->result_array();
$vehicle_info = $this->db->get('tbl_vehicle')->result_array();
?>
<!-- Styles -->
   <section id="main-content">
        
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card alert">
                                <div class="card-body">
                                    <div class="card-header m-b-20">
                                        <h4>Assign Driver To Vehicle</h4>                                        
                                    </div>
                                </div>
                                <form action="<?php echo base_url();?>Adminity/assignedDrivers/assignDriverToVehicle" method="post">   
                                <div class="row">                                     
                                    <div class="col-md-6">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                <label>Select Driver <span class="required">*</span></label>
                                                <select class="form-control etype" required="" name="driver_id" id="driver_id">
                                                    <option value=""> ---Select Driver--- </option>
                                                    <?php
                                                    foreach($driver_info as $drv)
                                                    {
                                                     $drive = $this->db->get_where('tbl_assign',array('driver_id' =>$drv['driver_id']))->result_array();
                                                        if($drive){}
                                                        else{?>
                                                     <option value="<?php echo $drv['driver_id'];?>"><?php echo $drv['driver_name'].' - ['.$drv['driver_contact'].']';?></option>
                                                    <?php }
                                                    }
                                                    ?>
                                                </select> 
                                               
                                            </div>
                                        </div>
                                    </div>  
                                    
                                    <div class="col-md-6">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                <label>Select Vehicle <span class="required">*</span></label>
                                                <select class="form-control etype" required="" name="vehicle_id" id="vehicle_id">
                                                    <option value=""> ---Select Vehicle--- </option>
                                                    <?php
                                                    foreach($vehicle_info as $veh)
                                                    {
                                                      $vehi = $this->db->get_where('tbl_assign',array('vehicle_id' =>$veh['vehicle_id']))->result_array();
                                                        if($vehi){}
                                                        else{?>
                                                     <option value="<?php echo $veh['vehicle_id'];?>"><?php echo $veh['vehicle_no'];?></option>
                                                    <?php }
                                                    }
                                                    ?>
                                                </select> 
                                               
                                            </div>
                                        </div>
                                    </div> 
                                    
                                                         
                                                                       
                                    <div class="col-md-12">
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-info btn-lg  border-none sbmt-btn"><i class="ti-save"></i> Assign Driver To Vehicle</button>
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
