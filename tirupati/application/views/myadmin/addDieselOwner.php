<?php  $sites=$this->db->get('sites')->result(); ?>
<!-- Styles -->
  <section id="main-content">
        
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card alert">
                                <div class="card-body">
                                    <div class="card-header m-b-20">
                                        <h4>Add Diesel Owner</h4>                                        
                                    </div>
                                </div>
                                <form action="<?php echo base_url();?>Adminity/dieselOwners/add" method="post">   
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
                                                <label>Company Name</label>
                                                <input type="text" name="company_name"  class="form-control border-none input-flat bg-ash" placeholder="Company Name">
                                            </div>
                                        </div>
                                    </div>
                                     <div id="invoice_entry">
                                    <div  class="col-md-12">
                                         <div class="col-md-2">
                                            <div class="basic-form">
                                               <div class="form-group">
                                                   <label>Add Vehicle : <span class="required">*</span></label>                                                  
                                               </div>
                                           </div>
                                       </div>
                                           <div class="col-md-4">
                                                   <input type="text" name="vehicle_no[]" required="" maxlength="13" pattern="^[A-Z]{2} [0-9]{2} [A-Z]{1,2} [0-9]{4}$"  class="form-control border-none input-flat bg-ash" placeholder="Ex.MH 12 XY 0000 / MH 12 X 0000">
                                               
                                            </div>
                                            <div class="col-md-3">
                                                   <input type="text" name="seat_type[]" required="" class="form-control border-none input-flat bg-ash" placeholder="Seat Type">
                                            </div>
                                             <div class="col-sm-3">
                                                 <button type="button" class="btn btn-danger" onclick="deleteParentElement(this)">                                                       
                                                    <i class="ti-trash"></i> 
                                                </button>
                                            </div>
                                    </div>
                                     </div>
                                    <div  class="col-md-11">
                                        <div class="basic-form" style="text-align: right">
                                            <div class="form-group">
                                            <button type="button" style="" class="btn btn-warning" onClick="add_entry()">                                                       
                                                    <i class="ti-plus"></i> 
                                                </button>
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
                                    <br>
                                    <div class="col-md-12">
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-info btn-lg  border-none sbmt-btn"><i class="ti-save"></i> Add Diesel Owner</button>
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

    
    <script>
         // CREATING BLANK INVOICE ENTRY
    var blank_invoice_entry = '';
    $(document).ready(function () {
        blank_invoice_entry = $('#invoice_entry').html();
    });

    function add_entry()
    {
        $("#invoice_entry").append(blank_invoice_entry);
    }

    // REMOVING INVOICE ENTRY
    function deleteParentElement(n) {
        n.parentNode.parentNode.parentNode.removeChild(n.parentNode.parentNode);
    }
        
        </script>
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
