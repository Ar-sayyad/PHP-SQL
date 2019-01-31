<?php $pass_info = $this->db->get_where('passes', array('pass_id' => $param2))->result_array();
 foreach ($pass_info as $row) {
?>
 <section id="registration" class="">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>
                                    <h6 style="float: left">Ticket Price :<strike><i class="fa fa-inr"></i><?php echo $row['price'];?></strike></h6>
                                </th>
                                <th>
                                    <h6 style="float: right;color: blueviolet">Your are a Early Bird : <i class="fa fa-inr"></i><?php echo $row['early_bird'];?></h6>
                                </th>
                            </tr>
                            <tr>
                                <th>
                                    <h5><?php echo $row['category_name'];?></h5>
                                </th>
                                <th>
                                    <h6 style="font-size:12px;font-weight: 200"><?php $pack_entries    = json_decode($row['package_id']);
                                            foreach ($pack_entries as $package_id)
                                        { ?>
                                            -<?php echo $package_name = $this->db->get_where('packages',array('package_id' => $package_id))->row()->package_name;?>
                                            <br>                            
                                        <?php } ?>
                                    </h6>
                                </th>
                            </tr>
                        </thead>
                    </table>
                   
                
                </div>
                <!-- end col -->
                <div class="col-lg-12">
                    <div class="registration-wrapper">
                        <form action="<?php echo base_url();?>Events/submit" method="post">
                            <div class="row">
                                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-12">
                                    <select class="form-control" name="tickets" id="tickets" required="required">
                                        <option value="1" selected="">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>                                        
                                    </select>                                    
                                    <span class="input_bar"></span>
                                </div>
                                <input type="hidden" name="earlybird" id="earlybird" value="<?php echo $row['early_bird'];?>"/>
                                <input type="hidden" name="price" id="price" value="<?php echo $row['price'];?>"/>
                                <input type="hidden" name="pass_id" id="pass_id" value="<?php echo $row['pass_id'];?>"/>
                                <input type="hidden" name="category" id="category" value="<?php echo $row['category_name'];?>"/>
                                <input type="hidden" name="package_id" id="package_id" value="<?php echo $row['package_id'];?>"/>
                                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-12">
                                    <input name="firstName" class="form-control" id="rfirst-name" placeholder="First Name" required="required" type="text">
                                    <span class="input_bar"></span>
                                </div>
                                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-12">
                                    <input name="lastName" class="form-control" id="rfirst-name" placeholder="Last Name" required="required" type="text">
                                    <span class="input_bar"></span>
                                </div>
                                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-12">
                                    <input name="email" class="form-control" id="remail" placeholder="Your Email" required="required" type="email">
                                    <span class="input_bar"></span>
                                </div>
                                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-12">
                                    <input name="mobile" class="form-control" id="rphone-number" pattern="[0-9]{10,10}" maxlength="10" minlength="10" placeholder="Your Mobile Number" required="required" type="text">
                                    <span class="input_bar"></span>
                                </div>
                                 <div class="form-group col-lg-4 col-md-4 col-sm-4 col-4">
                                     <label><h6>Amount:</h6></label>
                                     <span class="input_bar"></span>
                                </div>
                                <div class="form-group col-lg-8 col-md-8 col-sm-8 col-8">
                                    <label><h6 id="totalcostshow"><i class="fa fa-inr"></i><?php echo $row['early_bird'];?></h6></label>
                                    <input name="totalCost" class="form-control" id="totalcost" readonly="" value="<?php echo $row['early_bird'];?>" placeholder="Total Cost" required="required" type="hidden">
                                    <span class="input_bar"></span>
                                </div>
                                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-12">
                                    <button type="submit" class="btn regisbtn">Book Now <i class="icofont icofont-caret-right"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!--- END ROW -->
        </div>
        <!--- END CONTAINER -->
    </section>

 <?php } ?>
<script>
    
    $("#tickets").change(function() {
         $tickets= parseFloat($('#tickets').val());
          $earlybird= parseFloat($('#earlybird').val());
          $amount=($earlybird * $tickets);          //alert($amount);
           $('#totalcost').val($amount);
           $('#totalcostshow').html('<i class="fa fa-inr"></i>'+$amount);
    });
</script>