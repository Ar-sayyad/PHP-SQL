<?php  
$sites=$this->db->get('sites')->result(); 
$sumlist=$this->db->get('sumlist_table')->result(); 
$owner = $this->db->get('vehicle_owner')->result_array();
?>
<!-- Styles -->
<style>
.table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
    line-height: 12px;
    vertical-align: top;
}
.m-b-20 {
    margin-bottom: 0px!important;
}
.form-control {
    height: 34px;
    }
</style>
  <section id="main-content">
        
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card alert">
                                <div class="card-body">
                                    <div class="card-header m-b-20">
                                        <h4>Add Summation</h4>                                        
                                    </div>
                                </div>
                                <form action="<?php echo base_url();?>Auth/summation/makesum" method="post">   
                                <div class="row">                                   
                                    <div class="col-md-6">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                <label>Select Vehicle Owner <span class="required">*</span></label>
                                                <select class="form-control etype" required="" name="vehicle_owner_id" onchange="loadVehicleDate(this.value);" id="vehicle_owner_id">
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
                                                <label>Select Vehicle <span class="required">*</span></label>
                                                <select class="form-control etype" required="" name="vehicle_id" id="vehicle_id">
                                                     <option value=""> Select Vehicle </option>
                                                </select> 
                                               
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="basic-form">
                                        <div class="col-md-6">
                                            <div class="form-group">                                            	
                                                <label>Route <span class="required">*</span></label>
                                               <input type="text" class="form-control" name="route" required="" placeholder="Route: 1/1">
                                               </div>
                                            </div>
                                           
                                            <div class="col-md-6">
                                            	<div class="form-group">
                                                <label>Month <span class="required">*</span></label>
                                               <input type="month" class="form-control" name="month" required="">
                                               </div>
                                            </div>
                                     	</div>
                                    </div>
                                    
                                     <div class="col-md-6">
                                        <div class="basic-form">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>From <span class="required">*</span></label>
                                               <input type="date" class="form-control" name="from" required="">
                                               </div>
                                         </div>
                                         <div class="col-md-6">
                                            <div class="form-group">
                                                <label>To <span class="required">*</span></label>
                                               <input type="date" class="form-control" name="to" required="">
                                               </div>
                                         </div>
                                        </div>
                                    </div>
                                      
                                    <div class="col-md-3">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                    <label>Select Company: <span class="required">*</span></label>                                                    
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
                                                               <input type="radio" style="height: 17px;width: 17px;" name="site_id" value="<?php echo $each->site_id;?>"> <?php echo $each->site_name;?>
                                                           </div>
                                                        </div>
                                                        </div>                                                        
                                                        <?php }
                                                        ?> 
                                         </div> 
                                    <div class="col-md-12">
                                        <table class="table table-bordered table-stripped">
                                            <thead>
                                            <tr><th>
                                                #List
                                            </th>
                                            <th style="text-align: left">
                                                Amount(<i class="fa fa-inr"></i>)
                                            </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                    <?php                       
                                    foreach($sumlist as $sum)
                                    { 
                                     ?>
                                         <tr>
                                             <td><?php echo $sum->sum_name;?> :</td>
                                             <td>
                                                 <input type="hidden" name="sum_id[]" value="<?php echo $sum->sumlist_id; ?>"/>
                                                  <input type="hidden" name="sum_name[]" value="<?php echo $sum->sum_name; ?>"/>
                                                 <input type="text" style="height: 34px;" class="form-control sum" autocomplete="off" name="sum[]" value="0" placeholder="<?php echo $sum->sum_name;?>"></td>
                                       </tr>
                                    <?php }?>
                                       <tr>
                                           <td><b>Total Amount (<i class="fa fa-inr"></i>) :</b></td>
                                           <td><input type="text" name="total" id="thisTotal" class="form-control" value="0" style="font-size: large;font-weight: 600;" required="" readonly="" ></td>
                                       </tr>
                                            </tbody>
                                                
                                        </table>
                                    </div>
                                    
                                                                       
                                    <div class="col-md-12">
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-info btn-lg  border-none sbmt-btn"><i class="ti-save"></i> Add Summation</button>
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
        function loadVehicleDate($id){ 
            $.post("<?php echo base_url(); ?>Adminity/getVehicleData",
             {
               owner_id : $id,
             },
             function(data)
             {
                 $('#vehicle_id').html(data);
             });
        }
        $(document).ready(function(){
       
        $('.sum').keyup(function(){
             var sum = 0;
             $('.sum').each(function(){
            sum += +$(this).val();          
        });
        $("#thisTotal").val(sum);
        });
    });
       
        </script>