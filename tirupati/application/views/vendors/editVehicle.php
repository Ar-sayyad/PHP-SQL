<?php $owner = $this->db->get('vehicle_owner')->result_array();
$vehicle_info = $this->db->get_where('tbl_vehicle', array('vehicle_id' => $param2))->result_array();
 foreach ($vehicle_info as $row) {

?>
<!-- Styles -->
    <link href="<?php echo base_url();?>mypanel/assets/css/lib/calendar2/pignose.calendar.min.css" rel="stylesheet">
       <section id="main-content">
        
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card alert">
                                <div class="card-body">
                                    <div class="card-header m-b-20">
                                        <h4>Add Vehicle</h4>                                        
                                    </div>
                                </div>
                                <form action="<?php echo base_url();?>Subadmin/vehicles/editVehicle/<?php echo $row['vehicle_id'];?>" method="post">   
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                    <label>Vehicle No <span class="required">*</span></label>
                                                    <input type="text"  name="vehicle_no" value="<?php echo $row['vehicle_no'];?>" required="Use Proper Format of Vehicle Number" maxlength="13" pattern="^[A-Z]{2} [0-9]{2} [A-Z]{1,2} [0-9]{4}$" class="form-control border-none input-flat  bg-ash" placeholder="Ex.MH 12 XY 0000 / MH 12 X 0000">
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
                                                    foreach($owner as $row1)
                                                    {?>
                                                     <option value="<?php echo $row1['vehicle_owner_id'];?>" <?php if($row1['vehicle_owner_id'] == $row['vehicle_owner_id']){echo 'selected';} ?>><?php echo $row1['owner_full_name'];?></option>
                                                    <?php }
                                                    ?>
                                                </select> 
                                               
                                            </div>
                                        </div>
                                    </div>  
                                
                                    <div class="col-md-6">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                <label>Fuel Limit (Ltr.)<span class="required">*</span></label>
                                                <input type="text" name="fuel_limit" value="<?php echo $row['fuel_limit'];?>" required="" class="form-control border-none input-flat bg-ash" placeholder="Fuel Limit">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                <label>Description</label>
                                                <textarea class="form-control border-none input-flat bg-ash"  placeholder="Vehicle Description" rows="3" name="description"><?php echo $row['description'];?></textarea>
                                            </div>
                                        </div>
                                    </div>                        
                                                                       
                                    <div class="col-md-12">
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-info btn-lg  border-none sbmt-btn"><i class="ti-pencil-alt"></i> Update Vehicle</button>
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
