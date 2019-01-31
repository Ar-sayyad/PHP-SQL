<?php
$city_info = $this->db->get('city')->result_array();
$disease_info = $this->db->get('disease')->result_array();

$single_patient_info = $this->db->get_where('patient', array('patient_id' => $param2))->result_array();

foreach ($single_patient_info as $row) {

?>

    <div class="row">

        <div class="col-md-12">



            <div class="panel panel-primary" data-collapsed="0">



                <div class="panel-heading">

                    <div class="panel-title">

                        <h3><?php echo get_phrase('edit_patient'); ?></h3>

                    </div>

                </div>



                <div class="panel-body">



                    <form role="form" class="form-horizontal form-groups-bordered" action="<?php echo base_url(); ?>index.php?admin/patient/update/<?php echo $row['patient_id']; ?>" method="post" enctype="multipart/form-data">



                        <div class="form-group">

                            <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('name'); ?> <span style="color:red">*</span></label>



                            <div class="col-sm-5">

                                <input type="text" name="name" required="" class="form-control" id="field-1" value="<?php echo $row['name']; ?>">
								
								<input type="hidden" name="doctor_id" required="" value="<?php echo  $row['doctor_id'];?>" class="form-control" id="field-1" >
								
								<input type="hidden" name="pharmacist_id" value="<?php echo  $row['pharmacist_id'];?>" class="form-control" id="field-1" >
								


                            </div>

                        </div>

					<div class="form-group">

                            <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('phone'); ?> </label>



                            <div class="col-sm-5">

                                <input type="text" name="phone"  pattern="[0-9]{10,10}"  autocomplete="off" maxlength="10" class="form-control" id="field-1" value="<?php echo $row['phone']; ?>">

                            </div>

                        </div>
						

                        <div class="form-group">

                            <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('aadhar_no'); ?> </label>



                            <div class="col-sm-5">

                                <input type="text" name="aadhar_card"  class="form-control" id="field-1" value="<?php echo $row['aadhar_card']; ?>">

                            </div>

                        </div>



                        <div class="form-group">

                            <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('age'); ?></label>



                            <div class="col-sm-5">

                                <input type="number" name="age" class="form-control" id="field-1" value="<?php echo $row['age']; ?>">

                            </div>

                        </div>
							<div class="form-group">
                            <label for="field-ta" class="col-sm-3 control-label"><?php echo get_phrase('city'); ?> <span style="color:red">*</span></label>

                            <div class="col-sm-5">
                                <select name="city_id" class="form-control select2">
                                    <option value=""><?php echo get_phrase('select_city'); ?></option>
                                    <?php foreach ($city_info as $row3) { ?>
                                        <option value="<?php echo $row3['city_id']; ?>" <?php if ($row['city_id'] == $row3['city_id']) echo 'selected'; ?>>
                                            <?php echo $row3['name']; ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
						
						<div class="form-group">
                            <label for="field-ta" class="col-sm-3 control-label"><?php echo get_phrase('disease'); ?> <span style="color:red">*</span></label>

                            <div class="col-sm-5">
                                <select name="disease_id" class="form-control select2">
                                    <option value=""><?php echo get_phrase('select_disease'); ?></option>
                                    <?php foreach ($disease_info as $row4) { ?>
                                        <option value="<?php echo $row4['disease_id']; ?>" <?php if ($row['disease_id'] == $row4['disease_id']) echo 'selected'; ?>>
                                            <?php echo $row4['name']; ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-3 control-label col-sm-offset-2">

                            <input type="submit" class="btn btn-success" value="Update">

                        </div>

                    </form>



                </div>



            </div>



        </div>

    </div>

<?php } ?>