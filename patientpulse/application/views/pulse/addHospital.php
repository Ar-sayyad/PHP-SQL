<div class="row main-section">			
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-content">
                <form action="" method="POST" enctype="multipart/form-data">
                    <table class="table table-striped  form">                                                
                        <thead class="">
                            <tr class="sect2">
                                <th> Hospital Name:<span class="required">*</span></th>
                                <th>
                                    <input type="text" id="hospital_name" name="hospital_name"  autocomplete="off" required=""  class="form-control" placeholder="Hospital Name">
                                </th>

                                <th> Speciality :<span class="required">*</span></th>
                                <th>
                                    <select id="Speciality" name="Speciality" placeholder="Speciality" required="" class="form-control">
                                        <option value="">---Select Speciality---</option>
                                        <option value="Allergy & Clinical Immunology">Allergy & Clinical Immunology</option>
                                        <option value="Anaesthesia">Anaesthesia</option>
                                        <option value="Audiometry And Speech Therapy">Audiometry And Speech Therapy</option>
                                        <option value="Breast Surgery">Breast Surgery</option>
                                          <option value="Cardiology">Cardiology</option>
                                            <option value="Dental Sciences">Dental Sciences</option>
                                              <option value="Dermatology / Cosmetology">Dermatology / Cosmetology</option>
                                    </select>
                                </th>
                            </tr>
                            <tr class="sect2">
                                <th> Slogan:<span class="required"></span></th>
                                <th>
                                    <input type="text" id="Slogan" name="Slogan"  autocomplete="off"  class="form-control" placeholder="Slogan">
                                </th>

                                <th> Email :<span class="required">*</span></th>
                                <th>
                                    <input type="text" id="email" name="email"  autocomplete="off" required="" class="form-control" placeholder="Email">
                                </th>
                            </tr>
                           <tr class="sect2">
                                <th> Branches:<span class="required"></span></th>
                                <th>
                                    <input type="text" id="branches" name="branches"  autocomplete="off"  class="form-control" placeholder="No. of Branches">
                                </th>

                                <th> Schedule :<span class="required">*</span></th>
                                <th>
                                    <select id="Schedule" name="Schedule" placeholder="Schedule" required="" class="form-control">
                                        <option value="">---Select Schedule---</option>
                                        <option value="All Days">All Days</option>
                                        <option value="Mon-Sat">Mon-Sat</option>
                                        <option value="Mon-Fri">Mon-Fri</option>
                                        <option value="Mon-Thur">Mon-Thu</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </th>
                            </tr>
                             <tr class="sect2">
                                <th> Contact 1:<span class="required">*</span></th>
                                <th>
                                    <input type="text" id="office_contact_one" name="office_contact_one" required="" autocomplete="off"  class="form-control" placeholder="Contact 1">
                                </th>

                               <th> Contact 2:<span class="required"></span></th>
                                <th>
                                    <input type="text" id="office_contact_two" name="office_contact_two"  autocomplete="off"  class="form-control" placeholder="Contact 2">
                                </th>
                            </tr>
                            <tr class="sect2">
                                <th> City:<span class="required">*</span></th>
                                <th>
                                     <select id="city_id" name="city_id" placeholder="City" required="" class="form-control">
                                        <option value="">---Select City---</option>
                                        <option value="Mumbai">Mumbai</option>
                                        <option value="Delhi">Delhi</option>
                                        <option value="Pune">Pune</option>
                                        <option value="Kolkata">Kolkata</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </th>

                               <th> Main Branch Address:<span class="required"></span></th>
                                <th>
                                    <textarea id="main_branch_address" name="main_branch_address"  autocomplete="off"  class="form-control" placeholder="Main Branch Address"></textarea>
                                </th>
                            </tr>
                            <tr class="sect2">
                                <th> Website :<span class="required"></span></th>
                                <th> 
                                    <input type="text" id="website" name="website"  autocomplete="off"  class="form-control" placeholder="Website">
                                </th>

                               <th> Fax Number:<span class="required"></span></th>
                                <th>
                                     <input type="text" id="fax" name="fax"  autocomplete="off"  class="form-control" placeholder="Fax Number">
                                </th>
                            </tr>
                            
                            <tr class="sect2">
                                <th> Map Location:<span class="required">*</span></th>
                                <th>
                                    <input type="text" id="map_location" name="map_location"  autocomplete="on"  class="form-control" placeholder="Map Location">
                                </th>

                               <th> Map <span class="required"></span></th>
                                <th>
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15135.462229354805!2d73.89726487969129!3d18.489747996832005!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bc2ea76f4fd68e3%3A0xcac9c2a9349894f8!2sRuby+Hall+Clinic+Wanowarie!5e0!3m2!1sen!2sin!4v1537434875484" width="300" height="70" frameborder="0" style="border:1" allowfullscreen></iframe>
                                </th>
                            </tr>
                             
                            <tr>
                                <th colspan="4" style="text-align:center">
                                    <button type="button" name="save" data-id="hello" id="saveBudget" class="btn btn-success" value="save"><i class="zmdi zmdi-file-plus"></i> Save</button>
                                     <button type="reset" name="Reset" class="btn btn-primary" value="reset"><i class="zmdi zmdi-replay"></i> Reset</button>
                                </th>
                            </tr>

                        </thead>

                    </table>
                </form>
                </div>
            </div>
        </div>	


</div>


<script>
    
   $(document).ready(function(){ 
        $("#saveBudget").click(function(){
            confirm('Project is Under Development...!');
        });
    $("#savBudget").click(function(){
      $("#saveBudget").html('<img src="<?php echo base_url();?>site/content/img/loading.gif" style="width:25px;height:20px;" />');
      $Month= $("#Month").val();
      $year= $("#year").val();      
        $Name = new Array();
        $(".Name").each(function() {
           $Name.push($(this).val());
        });
         $UOM= new Array();
        $(".UOM").each(function() {
           $UOM.push($(this).val());
        });
         $Budget = new Array();
        $(".Budget").each(function() {
           $Budget.push($(this).val());
        });                         
           
      $.post('<?php echo base_url();?>budget/save', { Month: $Month,year:$year,Name:$Name,UOM:$UOM,Budget:$Budget }, function(data){
          //alert(data);
                    if(data==1)
                          {                                  
                                $(".success_msg").html('<i class="material-icons">check_circle_outline</i> Budget Data Added Successfully');
                                $(".success_msg").show();
                                window.location.reload();
                                setTimeout(hidetab,4000);
                          }
                          else{
                                  $(".error_msg").html(data);
                                  $(".error_msg").show();
                                  setTimeout(hidetab,4000);
                                  $("#saveBudget").html('<i class="material-icons">save</i> Save');
                          }
		});
      
    });
    $('.Budget').keypress(function (event) {
            return isNumber(event, this);
        });        
    // THE SCRIPT THAT CHECKS IF THE KEY PRESSED IS A NUMERIC OR DECIMAL VALUE.
    function isNumber(evt, element) {

        var charCode = (evt.which) ? evt.which : event.keyCode;

        if (
            (charCode !== 45 || $(element).val().indexOf('-') !== -1) &&      // “-” CHECK MINUS, AND ONLY ONE.
            (charCode !== 46 || $(element).val().indexOf('.') !== -1) &&      // “.” CHECK DOT, AND ONLY ONE.
            (charCode < 48 || charCode > 57)){
                $(".error_msg").html('Characters Not Allowed..!');
                $(".error_msg").show();
                //$(element).val('');
                setTimeout(hidetab,2000);
            return false;
        }

        return true;
    }
});
</script>